<?php

namespace App\Core\RequestDispatcher;

class Router
{
    private $request;
    private $supportedHttpMethods = array(
        "GET",
        "POST"
    );

    private $routes;

    public function __construct(RequestInterface $request)
    {
        $this->request = $request;
        $this->routes = $request['routes'];
        $this->getCurrentRoute();
        // var_dump($request);
    }

    public function __call($name, $args)
    {
        list($route, $method) = $args;

        if (!in_array(strtoupper($name), $this->supportedHttpMethods))
        {
            $this->invalidMethodHandler();
        }

        $this->{strtolower($name)}[$this->formatRoute($route)] = $method;
    }

    public function getCurrentRoute()
    {
        if (!isset($_SERVER['PATH_INFO'])) {
            $this->currentRoute = $_SERVER['PATH_INFO'];
        }
    }

    public function route()
    {
        $route = $this->currentRoute;

        if (!isset($this->routes[$route])) {
            $route = '/404';
        }

        if (is_callable($this->routes[$route])) {
            echo $this->routes[$route]();
        }
    }

    
    /**
     * Removes trailing forward slashes from the right of the route.
     * @param route (string)
     */
    private function formatRoute($route)
    {
        $result = rtrim($route, '/');
        if ($result === '')
        {
            return '/';
        }
    }

    private function invalidMethodHandler()
    {
        //sends a raw HTTP header to a client.
        //header(string,replace,http_response_code) 
        header("{$this->request->serverProtocol} 405 Method Not allowed");
    }

    private function defaultRequestHandler()
    {
        header("{$this->request->serverProtocol} 404 Not Found");
    }

    public function __destruct()
    {
        $this->resolve();
    }

        /**
     * Resolves a route
     */
    function resolve()
    {
        $methodDictionary = $this->{strtolower($this->request->requestMethod)};
        $formattedRoute = $this->formatRoute($this->request->requestUri);
        $method = $methodDictionary[$formattedRoute];

        if (is_null($method))
        {
            $this->defaultRequestHandler();
            return;
        }

        echo call_user_func_array($method, array($this->request));
    }
}