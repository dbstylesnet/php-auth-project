<?php

namespace App\Core\RequestDispatcher;

class Request implements RequestInterface
{
    public $requestMethod;

    public $requestUri;

    private $serverProtocol;

    private $cookie;

    private $query;

    private $post;

    private $routes;


    public function __construct(array $routes)
    {
        $this->requestMethod = $_SERVER['REQUEST_METHOD'];
        $this->requestUri = $_SERVER['REQUEST_URI'];
        $this->serverProtocol = $_SERVER['SERVER_PROTOCOL'];
        $this->cookie = $_SERVER['HTTP_COOKIE'];

        // todo
        $this->cookie = $_COOKIE;
        $this->query = $_GET;
        $this->post = $_POST;

        $this->routes = $routes;
    }


    public function getGet() : string
    {
        return $this->query;
    }

    public function getPost()
    {
        return $this->post;
    }

    public function getCookie()
    {
        return $this->cookie;
    }


    public function getBody()
    {
        if ($this->requestMethod === "GET")
        {
            return;
        }

        if ($this->requestMethod === "POST")
        {
            $body = array();
            foreach ($_POST as $key => $value)
            {
                $body[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }

            return $body;
        }
    }






    public function getQueryParam(string $name)
    {
        return $this->query[$name] ?? null;
    }


    public function setChangeCookie(string $cookieName, string $cookieValue, date $time)
    {
        if (!$this->requestMethod === "POST")
        {
            var_dump($request);
            return;
        }

        if ($this->requestMethod === "POST")
        {
            $this->cookie = setcookie($cookieName, $cookieValue, time() + (30), "/");
            var_dump($request);
            return $this->cookie;
        }
        // return $this->cookie = setcookie($cookie_name, $cookieValue, time() + (30), "/");
    }

    public function setDifferentCookie()
    {
        {
            $cookieName = "user";
            $cookieValue = "Steph Curry";
            setcookie($cookieName, $cookieValue, time() + (30), "/");
            var_dump($request);
            return;
        }
        // return $this->cookie = setcookie($cookie_name, $cookieValue, time() + (30), "/");
    }




}


