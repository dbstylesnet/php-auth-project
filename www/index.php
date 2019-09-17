<?php
require_once './init.php';

use App\Core\RequestDispatcher\Router;
use App\Core\RequestDispatcher\Request;
use App\Core\RequestDispatcher\Response;
use App\Core\RequestDispatcher\JsonResponse;
use App\Core\RequestDispatcher\XmlResponse;
use App\Core\RequestDispatcher\XmlResponseDom;
use App\Core\RequestDispatcher\RequestInterface;
use App\Authentication\Controller\AuthentificationController;
use App\Personal\Controller\ProfileController;
use App\Authentication\Repository\UserRepository;
use App\Authentication\Encoder\UserPasswordEncoder;
use App\Authentication\Service\AuthenticationService;
use App\Core\Db\ConnectionFactory;

$request = Request::createFromGlobals();
$router = new Router($request);

// auth routes
$connectionFactory = new ConnectionFactory("mysql", "app", "app", "app");
$userRepository = new UserRepository($connectionFactory);
$userPasswordEncoder = new UserPasswordEncoder();
$authService = new AuthenticationService($userRepository);
$authController = new AuthentificationController($userRepository, $userPasswordEncoder, $authService);
$router->get('/auth', [$authController, 'index']);
$router->post('/login', [$authController, 'login']);
$router->post('/signin', [$authController, 'signin']);

// profile routes
$profileController = new ProfileController();
$router->get('/profile', [$profileController, 'index']);
$router->get('/mockprofile', [$profileController, 'mockIndex']);
$router->resolve();
