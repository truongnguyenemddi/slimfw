<?php

declare(strict_types=1);

namespace App\Domain\Auth;

use App\Domain\User\UserRepository;
use App\Domain\User\User;

class AuthService
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function authenticate(string $username, string $password): ?User
    {
        // Gọi hàm mới từ Repository
        $user = $this->userRepository->findUserByUsername($username);

        if (!$user) {
            return null;
        }

        // So khớp mật khẩu
        if (!password_verify($password, $user->getPasswordHash())) {
            return null;
        }

        return $user;
    }
}
