<?php

declare(strict_types=1);

namespace App\Application\Actions\Auth;

use App\Application\Actions\Action;
use App\Helpers\Session;
use Psr\Http\Message\ResponseInterface as Response;

class LogoutAction extends Action
{
    protected function action(): Response
    {
        Session::destroy();

        return $this->respondWithData([
            'message' => 'Đăng xuất thành công'
        ]);
    }
}