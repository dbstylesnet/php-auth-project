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

$request = Request::createFromGlobals();
$router = new Router($request);


/**
 * plain text content type
 */
$router->get('/texttest', function (RequestInterface $request) {
    $response = new Response();

    if (in_array($request->getQueryParam("user"), ['alex', 'kostya'])) {
        $response->setHTTPCode(Response::HTTP_OK);
        $response->setContentType("text/html");
        $response->setContent("Hello " . $request->getQueryParam("user"));
        $response->setCookie("uid", "someid", time());

        return $response;
    }

    $response->setHTTPCode(Response::HTTP_NOT_FOUND);
    $response->setContent("We don't know " . $request->getQueryParam("user"));
    $response->setCookie("uid", null, 0);

    return $response;
});

/**
 * json content type
 */
$router->get('/jsontest', function (RequestInterface $request) {
    $response = new JsonResponse();

    if (in_array($request->getQueryParam("user"), ['alex', 'kostya'])) {
        $response->setContent("Hello " . $request->getQueryParam("user"));
        $response->setCookie("uid", "someid");
        $response->setHeader("Status", Response::HTTP_OK);
        $response->setHeader("traceid", 12312312321); 
        $response->setHeader("Content-type", "application/json charset=utf-8"); 

        return $response;
    }

    $response->setHTTPCode(Response::HTTP_NOT_FOUND);
    $response->setContentType("application/json");
    $response->setContent("We don't know " . $request->getQueryParam("user"));
    $response->setCookie("uid", null);

    return $response;
});


$authController = new AuthentificationController();

$router->get('/auth', [$authController, 'index']);

/**
 * xml content type
 */
$router->get('/xmltest', function (RequestInterface $request) {
    $response = new XmlResponse();

    if (in_array($request->getQueryParam("user"), ['alex', 'kostya'])) {
        $response->setHTTPCode(Response::HTTP_OK);
        $response->setContentType("text/xml");
        $response->setHeader("traceid", 12312312321); 
        $response->setContent("Hello " . $request->getQueryParam("user"));
        $response->setCookie("uid", "someid");

        return $response;
    }

    $response->setHTTPCode(Response::HTTP_NOT_FOUND);
    $response->setContentType("text/xml");
    $response->setContent("We don't know " . $request->getQueryParam("user"));
    $response->setCookie("uid", null);

    return $response;
});


$router->get('/sayhello', function (RequestInterface $request) {
    $response = new XmlResponse();

    $response->setHTTPCode(Response::HTTP_OK);

    $response->setContent([
        'name' => $request->getQueryParam('name'),
        'surname' => "Unknown"
    ]);

    return $response;
});


$router->resolve();