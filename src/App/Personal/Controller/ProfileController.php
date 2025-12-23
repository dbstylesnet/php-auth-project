<?php
namespace App\Personal\Controller;

use App\Authentication\Service\AuthenticationServiceInterface;
use App\Core\RequestDispatcher\BaseController;
use App\Core\RequestDispatcher\RequestInterface;

class ProfileController extends BaseController
{
    public function __construct(AuthenticationServiceInterface $authService)
    {
        parent::__construct($authService);
    }

    public function index(RequestInterface $request)
    {
        $token = $this->getUserToken($request);

        if ($token->isAnonymous()) {
            return $this->redirect("/auth");
        }

        return $this->renderTemplate('/personal/profile.inc.php', [
            'user' => $token->getUser(),
            'pageTitle' => 'User Profile'
        ]);
    }

    public function mockIndex(RequestInterface $request)
    {
        return $this->response()->setContent("Mock authorize");
    }
}
