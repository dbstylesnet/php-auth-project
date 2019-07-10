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
        // $this->route = $this->getCurrentRoute();
        // var_dump($this->route);  
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

    // private function getCurrentRoute()
    // {
    //     if (!isset($_SERVER['PATH_INFO'])) {
    //         // $this->currentRoute = $_SERVER['PATH_INFO'];
    //         // var_dump($this->currentRoute);
    //         $this->currentRoute = $_SERVER['REQUEST_URI'];
    //         var_dump($this->currentRoute);
    //     }
    // }

    // public function route()
    // {
    //     $route = $this->currentRoute;

    //     // if (!isset($this->routes[$route])) {
    //     //     $route = '/404';
    //     // }

    //     if ($route == '/profile') {
    //         var_dump($this->currentRoute);
    //     } elseif ($route == '/profiles') {
    //         var_dump($this->currentRoute);
    //     } elseif ($route == '/sayhello') {
    //         return 'HELLO ';
    //     } else {
    //         return $this->defaultRequestHandler();
    //     }


        // if (is_callable($this->routes[$route])) {
        //     var_dump($this->routes[$route]());
        //     echo $this->routes[$route]();
        // }
    // }






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
        /**
     * Resolves a route
     */
    public function resolve()
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