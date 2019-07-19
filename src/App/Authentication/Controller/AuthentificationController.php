<?php

namespace App\Authentication\Controller;

use App\Core\RequestDispatcher\BaseController;
use App\Core\RequestDispatcher\Response;
use App\Core\RequestDispatcher\RequestInterface;

class AuthentificationController extends BaseController
{
    public function index(RequestInterface $request)
    {
        $name = $request->getQueryParam("name") ?: 'Stranger';

        return $this->response()
            ->setContent(
                $this->renderTemplate('/auth/login.inc.php', [
                    "name" => $name,
                ])
            );
    }
}