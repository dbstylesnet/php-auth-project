<?php

namespace App\Core\RequestDispatcher;

class Request implements RequestInterface
{
    public $requestMethod;

    public $requestUri; // TODO private and add public getters

    private $serverProtocol;

    private $cookie;

    private $query;

    private $post;

    // private $routes;


    public function __construct(
        $requestMethod,
        $requestUri,
        $serverProtocol,
        $cookie,
        $query,
        $post
    ) {
        $this->requestMethod = $requestMethod;
        $this->requestUri = $requestUri;
        $this->serverProtocol = $serverProtocol;
        $this->cookie = $cookie;
        $this->query = $query;
        $this->post = $post;
    }

    /**
     * 
     */
    public static function createFromGlobals()
    {
        return new Request(
            $_SERVER['REQUEST_METHOD'],
            $_SERVER['REQUEST_URI'],
            $_SERVER['SERVER_PROTOCOL'],
            $_COOKIE,
            $_GET,
            $_POST
        );
    }

    public function getQuery(): array
    {
        return $this->query;
    }

    public function getPost(): array
    {
        return $this->post;
    }

    public function getCookie(): array
    {
        return $this->cookie;
    }

    public function getQueryParam(string $name)
    {
        return $this->query[$name] ?? null;
    }
}


