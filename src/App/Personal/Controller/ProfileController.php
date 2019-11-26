<?php
namespace App\Personal\Controller;

use App\Authentication\Service\AuthenticationServiceInterface;
use App\Core\RequestDispatcher\BaseController;
use App\Core\RequestDispatcher\RequestInterface;

class ProfileController extends BaseController
{
    protected $authService;

    public function __construct(
        AuthenticationServiceInterface $authService
    ) {
        $this->authService = $authService;
    }

    public function index(RequestInterface $request)
    {
        $token = $this->getUserToken($request);

        if ($token->isAnonymous()) {
            return $this->redirect("/auth");
        }

        return $this->response()->setContent("Hello {$token->getUser()->getLogin()}");
    }

    public function mockIndex(RequestInterface $request)
    {
        return $this->response()->setContent("Mock authorize");
    }
}
