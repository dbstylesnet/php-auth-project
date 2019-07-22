<?php

namespace App\Authentication\Controller;

use App\Core\RequestDispatcher\BaseController;
use App\Core\RequestDispatcher\Response;

class AuthentificationController extends BaseController
{
    public function index()
    {
        return $this->response()
            ->setContent(
                $this->renderTemplate('/auth/login.inc.php', [ 
                    "name" => "Jerry", 
                    "pageTitle" => "Authentication",
                    "description" => "Provide details in order to login",
                    "status" => "You have been",
                    "success" => "logged in",
                    "denied" => "not logged in"
                ])
            );

        // return $this->xmlResponse()
        //     ->setContent("Hello in Auth")
        //     ->setCookie("uid", null, time());
    }
}