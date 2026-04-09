<?php

declare(strict_types=1);

namespace App\Helpers;

class Session
{
    /**
     * Lấy toàn bộ dữ liệu session hiện tại
     */
    public static function all(): array
    {
        return $_SESSION ?? [];
    }

    /**
     * Đọc một giá trị từ session
     */
    public static function get(string $key, $default = null)
    {
        return $_SESSION[$key] ?? $default;
    }

    /**
     * Ghi một giá trị vào session
     */
    public static function set(string $key, $value): void
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $_SESSION[$key] = $value;
        session_write_close();
    }

    /**
     * Ghi nhiều giá trị cùng lúc (Truyền vào một mảng)
     * @param array $data Ví dụ: ['user_id' => 1, 'role' => 'admin']
     */
    public static function setMany(array $data): void
    {
        if (empty($data)) return;

        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        foreach ($data as $key => $value) {
            $_SESSION[$key] = $value;
        }

        session_write_close();
    }

    /**
     * Xóa một hoặc nhiều key
     */
    public static function delete($keys): void
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $keys = is_array($keys) ? $keys : [$keys];
        foreach ($keys as $key) {
            unset($_SESSION[$key]);
        }

        session_write_close();
    }

    /**
     * Hủy toàn bộ session (Dùng cho Logout)
     */
    public static function destroy(): void
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $_SESSION = [];
        session_destroy();

        if (isset($_COOKIE[session_name()])) {
            setcookie(session_name(), '', time() - 3600, '/');
        }
    }
}