<?php

$cookieName = "user";
$cookieValue = "John Doe";
setcookie($cookieName, $cookieValue, time() + (30), "/"); // cookie for 30 sec

require_once './init.php';

use App\Core\RequestDispatcher\Router;
use App\Core\RequestDispatcher\Request;
use App\Core\RequestDispatcher\RequestInterface;


$request = Request::createFromGlobals();
$router = new Router($request);


$router->get('/');

$router->get('/profile', function(RequestInterface $request) {
    return 'Your profile';
});

$router->get('/sayhello', function(RequestInterface $request) {
    return 'HELLO ' . $request->getQueryParam('name');
});

$router->get('/figuretype', function(RequestInterface $request) {
    return 'Figure type: ' . $request->getQueryParam('circle');
});

// $router->post('/data', function(RequestInterface $request) {
//     return json_encode($request->getBody());
// });

$router->resolve();