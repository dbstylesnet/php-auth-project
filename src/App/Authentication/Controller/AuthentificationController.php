<?php

namespace App\Authentication\Controller;

use App\Core\RequestDispatcher\BaseController;
use App\Core\RequestDispatcher\RequestInterface;
use App\Authentication\Repository\UserRepositoryInterface;
use App\Authentication\User;
use App\Authentication\Encoder\UserPasswordEncoderInterface;
use App\Authentication\Service\AuthenticationServiceInterface;

class AuthentificationController extends BaseController
{
    private $userRepository;
    private $userPasswordEncoder;
    private $authService;

    public function __construct(
        UserRepositoryInterface $userRepository, 
        UserPasswordEncoderInterface $userPassword,
        AuthenticationServiceInterface $authService
    )
    {
        $this->userRepository = $userRepository;
        $this->userPasswordEncoder = $userPassword;
        $this->authService = $authService;
    }

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

        $hash = $this->userPasswordEncoder->encodePassword($form['password'], $user->getSalt()); 
        if (!hash_equals($hash, $user->getPassword())) {
            return $this->renderTemplate('/auth/login.inc.php', ['error' => 'Password or username is incorrect', 'username' => $form['username']]);
        }
    
        $credentials = $this->authService->generateCredentials($user);

        return $this->redirect("/profile")->setCookie('auth', $credentials);
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
            $this->userRepository->save($user); 

            $credentials = $this->authService->generateCredentials($user);
            //in test authService mock becouse we dont access to database
            // save this cookie
            return $this->redirect("/profile")->setCookie('auth', $credentials);
        }

        return $this->renderTemplate('/auth/login.inc.php', ['error' => 'Username already exists']);
    }
}