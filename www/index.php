<?php

$cookieName = "user";
$cookieValue = "John Doe";
setcookie($cookieName, $cookieValue, time() + (30), "/"); // cookie for 30 sec

require_once './init.php';

use App\Core\RequestDispatcher\Router;
use App\Core\RequestDispatcher\Request;
use App\Core\RequestDispatcher\RequestInterface;


$routes = array (
    '/' => function() {
        return 'Main page';
    },
    '/figures' => function() {
        return 'Figures';
    },
    '/404' => function() {
        return '404';
    }
);


$request = new Request($routes);
$router = new Router($request);



// $router->get('/', );

// $router->get('/profile', function($request) {
//     return 'PROFILE';
// });

// $router->get('/sayhello', function(RequestInterface $request) {
//     return 'HELLO ' . $request->getQueryParam('name');
// });

// $router->post('/data', function(RequestInterface $request) {
//     return json_encode($request->getBody());
// });

// $router->post('/changecookie', function(RequestInterface $request) {
//     return $request->setChangeCookie($cookieName, 'Mike Smike', time() + (30));
// });

// $router->post('/diffcookie', function(RequestInterface $request) {
//     return $request->setDifferentCookie();
// });

// $router->get('/getnrfigures', function(RequestInterface $request) {
//     return 'There are ' . $request->getQueryParam('nrfigures') . ' figures';
// });

// $router->get('/getallfigures', function(RequestInterface $request) {
//     return 'These are the figures ' . $request->getAllFigures();
// });

// has to be 
// $router->get('/getfigure/{id}', function(RequestInterface $request) {
//     return 'This is figure nr ' . $request->figureId . ' $request->getFigure();
// });





$router->get('/dupa ', function() {});