<?php
namespace App\Core\RequestDispatcher;

class Request implements RequestInterface
{
    private $requestMethod;

    private $requestUri;

    private $serverProtocol;

    private $userAgent;

    private $cookie;

    private $query;

    private $post;

    public function __construct(
        $requestMethod,
        $requestUri,
        $serverProtocol,
        $userAgent,
        $cookie,
        $query,
        $post
    ) {
        $this->requestMethod = $requestMethod;
        $this->requestUri = $requestUri;
        $this->serverProtocol = $serverProtocol;
        $this->userAgent = $userAgent;
        $this->cookie = $cookie;
        $this->query = $query;
        $this->post = $post;
    }

    public static function createFromGlobals()
    {
        return new Request(
            $_SERVER['REQUEST_METHOD'],
            $_SERVER['REQUEST_URI'],
            $_SERVER['SERVER_PROTOCOL'],
            $_SERVER['HTTP_USER_AGENT'],
            $_COOKIE,
            $_GET,
            $_POST
        );
    }

    /**
     * @inheritdoc
     */
    public function getRequestMethod(): string
    {
        return $this->requestMethod;
    }

    public function getQuery(): array
    {
        return $this->query;
    }

    public function getCookie(): array
    {
        return $this->cookie;
    }

    public function getQueryParam(string $name)
    {
        return $this->query[$name] ?? null;
    }

    public function getRequestUri(): string
    {
        return $this->requestUri;
    }

    public function getUserAgent(): string
    {
        return $this->userAgent;
    }
    
    public function getServerProtocol(): string
    {
        return $this->serverProtocol;
    }

    public function getPost(): array
    {
        return $this->post;
    }
}
