<?php

declare(strict_types=1);

namespace App\Application\Middleware;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as Handler;
use Psr\Http\Message\ResponseFactoryInterface;
use Slim\Views\PhpRenderer;
use Slim\App; // Thêm cái này
use Throwable;

class ViewErrorMiddleware
{
    private ResponseFactoryInterface $responseFactory;
    private PhpRenderer $renderer;

    public function __construct(ResponseFactoryInterface $responseFactory, PhpRenderer $renderer)
    {
        $this->responseFactory = $responseFactory;
        $this->renderer = $renderer;
    }

    public function __invoke(Request $request, Handler $handler): Response
    {
        try {
            return $handler->handle($request);
        } catch (Throwable $e) {
            // --- BƯỚC 1: GHI LOG RA TERMINAL (GIỮ LUỒNG CŨ) ---
            // Thay vì add Middleware mới, ta dùng hàm error_log hoặc ghi vào stderr
            // Đây là cách Slim log mặc định khi không có bộ lọc tùy chỉnh.
            error_log(sprintf(
                "View Error [%s]: %s in %s on line %d",
                get_class($e),
                $e->getMessage(),
                $e->getFile(),
                $e->getLine()
            ));

            // Nếu bạn muốn log chi tiết cả Stack Trace ra Terminal như Slim mặc định:
            file_put_contents('php://stderr', $e->__toString() . PHP_EOL);

            // --- BƯỚC 2: HIỂN THỊ TRANG GENERAL (LUỒNG MỚI) ---
            $response = $this->responseFactory->createResponse();
            
            // Tắt layout hoàn toàn để tránh lỗi lồng nhau
            $this->renderer->setLayout(''); 

            // Đảm bảo đường dẫn file 'errors/general.php' là chính xác tính từ View Path
            return $this->renderer->render($response, 'errors/general.php', [
                'debug' => (bool)($_ENV['DEBUG'] ?? false) ? $e->getMessage() : null
            ])->withStatus(500);
        }
    }
}