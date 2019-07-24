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

$request = Request::createFromGlobals();
$router = new Router($request);

// auth routes

$authController = new AuthentificationController();

$router->get('/auth', [$authController, 'index']);
$router->post('/auth', [$authController, 'enroll']);

// profile routes

$profileController = new ProfileController();
$router->get('/profile', [$profileController, 'index']);


$router->resolve();