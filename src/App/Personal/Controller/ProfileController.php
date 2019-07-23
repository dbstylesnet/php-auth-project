<?php

namespace App\Personal\Controller;

use App\Core\RequestDispatcher\BaseController;
use App\Core\RequestDispatcher\RequestInterface;

class ProfileController extends BaseController
{
    public function index(RequestInterface $request)
    {
        return $this->redirect("/auth");
    }

    public function mockIndex(RequestInterface $request)
    {
        return $this->response()->setContent("Mock authorize");
    }
}