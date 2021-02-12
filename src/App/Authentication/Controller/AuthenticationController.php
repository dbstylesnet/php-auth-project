<?php
namespace App\Authentication\Controller;

use App\Core\RequestDispatcher\BaseController;
use App\Core\RequestDispatcher\RequestInterface;
use App\Authentication\Repository\UserRepositoryInterface;
use App\Authentication\User;
use App\Authentication\Encoder\UserPasswordEncoderInterface;
use App\Authentication\Service\AuthenticationServiceInterface;

class AuthenticationController extends BaseController
{
    private $userRepository;

    private $userPasswordEncoder;

    public function __construct(
        UserRepositoryInterface $userRepository, 
        UserPasswordEncoderInterface $userPassword,
        AuthenticationServiceInterface $authService
    ) {
        parent::__construct($authService);
        $this->userRepository = $userRepository;
        $this->userPasswordEncoder = $userPassword;
    }

    public function index(RequestInterface $request)
    {
         return $this->renderTemplate('/auth/login.inc.php', [ 
            "name" => $request->getQueryParam("name") ?: "", 
            "pageTitle" => "PHP Authentication page",
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
            return $this->renderTemplate('/auth/login.inc.php', [
                'error' => 'Please specify the username',
            ]);
        }

        if (strlen($form['username']) < 3) {
            return $this->renderTemplate('/auth/login.inc.php', ['error' => 'Username is too short']);
        }

        if (strlen($form['password']) < 6) {
            return $this->renderTemplate('/auth/login.inc.php', ['error' => 'Password is too short', 'username' => $form['username']]);
        }

        $user = $this->userRepository->findByLogin($form['username']);

        if (empty($user)) {
            return $this->renderTemplate('/auth/login.inc.php', ['error' => 'Password or username is incorrect', 'username' => $form['username']]);
        }

        if (!password_verify($form['password'], $user->getPassword())) {
            return $this->renderTemplate('/auth/login.inc.php', ['error' => 'Password or username is incorrect', 'username' => $form['username']]);
        }
    
        $credentials = $this->authService->generateCredentials($user);

        return $this->redirect("/profile")->setCookie(self::AUTHENTICATION, $credentials);
    }

    public function signin(RequestInterface $request)
    {
        $form = $request->getPost();
        if (empty($form['username'])) {
            return $this->renderTemplate('/auth/login.inc.php', ['error' => 'Please specify the username']);
        }

        if (strlen($form['username']) < 3 ) {
            return $this->renderTemplate('/auth/login.inc.php', ['error' => 'Username is too short']);
        }

        if (strlen($form['password']) < 6) {
            return $this->renderTemplate('/auth/login.inc.php', ['error' => 'Password is too short', 'username' => $form['username']]);
        }

        $user = $this->userRepository->findByLogin($form['username']);

        if (empty($user)) {
            $salt = time();
            $hashedPassword = $this->userPasswordEncoder->encodePassword($form['password'], $salt);

            $user = new User(
                $form['username'],
                $hashedPassword,
                $salt,
                NULL
            );
            $user = $this->userRepository->save($user); 

            $credentials = $this->authService->generateCredentials($user);
            return $this->redirect("/profile")->setCookie('auth', $credentials);
        }

        return $this->renderTemplate('/auth/login.inc.php', ['error' => 'Username already exists']);
    }
}
