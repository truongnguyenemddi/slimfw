<?php

declare(strict_types=1);

namespace App\Application\Middleware;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as Handler;
use Slim\Views\PhpRenderer;
use Throwable;

class ViewErrorMiddleware
{
    private PhpRenderer $renderer;

    public function __construct(PhpRenderer $renderer)
    {
        $this->renderer = $renderer;
    }

    public function __invoke(Request $request, Handler $handler): Response
    {
        try {
            // Chạy logic của Route (lấy data, render...)
            return $handler->handle($request);
        } catch (Throwable $e) {
            // Nếu có lỗi (DB sập, lỗi code...), tạo một Response mới để chứa trang lỗi
            $response = new \Slim\Psr7\Response();
            
            // Log lỗi lại để bạn kiểm tra sau (tùy chọn)
            // error_log($e->getMessage());

            // Tắt layout
            $this->renderer->setLayout('');

            return $this->renderer->render($response, 'errors/general.php', [
                'title' => 'Sự cố hiển thị',
                'message' => 'Không thể tải nội dung trang lúc này.',
                'debug' => (bool)($_ENV['DEBUG'] ?? false) ? $e->getMessage() : null
            ])->withStatus(500);
        }
    }
}