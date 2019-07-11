<?php

namespace App\Core\RequestDispatcher;

class Router
{
    private $request;
    private $supportedHttpMethods = array(
        "GET",
        "POST"
    );

    private $route;

    /**
     * @var array;
     */
    // private $routes;

    private $currentRoute;


    public function __construct(RequestInterface $request)
    {
        $this->request = $request;
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
        header("{$this->request->getServerProtocol()} 405 Method Not allowed");
    }

    private function defaultRequestHandler()
    {
        header("{$this->request->getServerProtocol()} 404 Not Found");
    }


    /**
     * Resolves a route
     */
    public function resolve()
    {
        $methodDictionary = $this->{strtolower($this->request->getRequestMethod())};
        $formattedRoute = $this->formatRoute($this->request->getRequestUri());
        $method = $methodDictionary[$formattedRoute];

        if (is_null($method))
        {
            $this->defaultRequestHandler();
            return;
        }

        echo call_user_func_array($method, array($this->request));
    }
}