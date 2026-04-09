<?php

declare(strict_types=1);

namespace App\Application\Actions\Auth;

use App\Application\Actions\Action;
use App\Domain\Auth\AuthService;
use App\Helpers\Session;
use Psr\Http\Message\ResponseInterface as Response;

class LoginAction extends Action
{
    private $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    protected function action(): Response
    {
        $data = $this->getFormData();
        $username = $data['username'] ?? ''; // Lấy username thay vì email
        $password = $data['password'] ?? '';

        $user = $this->authService->authenticate($username, $password);

        if (!$user) {
            return $this->respondWithData([
                'success' => false,
                'message' => 'Tên đăng nhập hoặc mật khẩu không chính xác'
            ], 401);
        }

        $userData = [
            'user_id'    => $user->getId(),
            'username'   => $user->getUsername(),
            'logged_in'  => true,
            'login_time' => time(),
        ];
        Session::setMany($userData);

        return $this->respondWithData([
            'success' => true,
            'user' => [
                'id' => $user->getId(),
                'username' => $user->getUsername()
            ],
            'message' => 'Đăng nhập thành công',
        ]);
    }
}
