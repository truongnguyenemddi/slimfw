<?php

declare(strict_types=1);

namespace App\Application\Middleware;

use App\Domain\User\UserRepository;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface as Handler;
use Slim\Psr7\Response as SlimResponse;

class AuthMiddleware implements MiddlewareInterface
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        // Inject repository để check user thật trong DB nếu cần
        $this->userRepository = $userRepository;
    }

    public function process(Request $request, Handler $handler): Response
    {
        $session = $request->getAttribute('session');
        $userId = $session['user_id'] ?? null;

        if (!$userId) {
            return $this->handleUnauthorized($request);
        }

        return $handler->handle($request);
    }

    private function handleUnauthorized(Request $request): Response
    {
        $uri = $request->getUri()->getPath();
        $response = new SlimResponse();

        // Kiểm tra xem Request có phải là API hay không
        // (Dựa vào Header Accept hoặc tiền tố /api trong URL)
        if (strpos($uri, '/api') === 0 || $request->getHeaderLine('Accept') === 'application/json') {
            $response->getBody()->write(json_encode([
                'error' => 'Unauthorized',
                'message' => 'Vui lòng đăng nhập để tiếp tục.'
            ], JSON_UNESCAPED_UNICODE));
            
            return $response
                ->withHeader('Content-Type', 'application/json')
                ->withStatus(401);
        }

        // Nếu là View bình thường -> Redirect về trang Login
        return $response
            ->withHeader('Location', '/login')
            ->withStatus(302);
    }
}
