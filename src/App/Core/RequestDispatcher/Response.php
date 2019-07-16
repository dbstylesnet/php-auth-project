<?php

namespace App\Core\RequestDispatcher;

class Response implements ResponseInterface
{
    const HTTP_OK = 200;
    const HTTP_NOT_FOUND = 404;
    const HTTP_INTERNAL_ERROR = 500;



    private $httpCode;

    protected $contentType;

    private $cookies = [];

    private $headers;

    private $content;

    private $time;

    public function __construct(
        $httpCode = null,
        $contentType = null,
        $cookies = [],
        $headers = null,
        $responseContent = null
    )
    {
        $this->httpCode = $httpCode;
        $this->contentType = $contentType;
        $this->cookies = $cookies;
        $this->headers = $headers;
        $this->content = $responseContent;
    }

    public function setHTTPCode($httpCode)
    {
        $this->httpCode = $httpCode; 
    }

    public function setContentType($contentType)
    {
        $this->contentType = $contentType;
    }

    public function setCookie(string $name, ?string $value, ?int $time = self::COOKIE_TIMEOUT)
    {
        $this->cookies[$name] = [$value, $time]; 
    }

    public function setHeaders($headers)
    {
        $this->headers = $headers;
    }

    public function setContent($responseContent)
    {
        $this->content = $responseContent;
    }

    //
    public function send()
    {
        header("Status: {$this->httpCode}");
        header("Content-type: {$this->contentType}; charset=utf-8");

        // $this->time = $time + SELF::COOKIE_TIMEOUT;
        // $this->time = time() + SELF::COOKIE_TIMEOUT;
        // $time = time() + SELF::COOKIE_TIMEOUT;
        foreach ($this->cookies as $name => [$value, $time]) {
            setcookie($name, $value, $time + time());
        }

        //setheaders($response->headers);

        print $this->content;
    }      
}