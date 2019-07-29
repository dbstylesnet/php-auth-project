<?php

namespace App\Authentication\Controller;

use App\Core\RequestDispatcher\BaseController;
use App\Core\RequestDispatcher\RequestInterface;

class AuthentificationController extends BaseController
{
    public function index(RequestInterface $request)
    {
        return $this->renderTemplate('/auth/login.inc.php', [ 
            "name" => $request->getQueryParam("name") ?: "Unknown", 
            "pageTitle" => "Authentication",
            "description" => "Provide details in order to login",
            "status" => "You have been",
            "success" => "logged in",
            "denied" => "not logged in"
        ]);
    }

    public function login(RequestInterface $request)
    {
        $form = $request->getPost();
        if (empty($form['username'])) {
            return $this->renderTemplate('/auth/login.inc.php', ['error' => 'Please specify the username']);
        }

        if (strlen($form['username']) < 3) {
            return $this->renderTemplate('/auth/login.inc.php', ['error' => 'Username is too short']);
        }

        if (strlen($form['password']) < 6) {
            return $this->renderTemplate('/auth/login.inc.php', ['error' => 'Password is too short', 'username' => $form['username']]);
        }

        return $this->redirect("/mockprofile");
    }

    public function signIn(RequestInterface $request)
    {
        // TODO
    }
}