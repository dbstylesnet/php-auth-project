<?php

namespace App\Authentication\Controller;

use App\Core\RequestDispatcher\BaseController;
use App\Core\RequestDispatcher\Response;

class AuthentificationController extends BaseController
{
    public function index()
    {
        // return $this->response()
        //  ->setContent($this->renderTempalte('/templates/auth/login.inc.php'), []);

        return $this->xmlResponse()
            ->setContent("Hello in Auth")
            ->setCookie("uid", null, time());
    }
}