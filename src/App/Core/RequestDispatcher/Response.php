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
        $httpCode = self::HTTP_OK,
        $contentType = null,
        $cookies = [],
        $headers = [],
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
        return $this;
    }

    public function setContentType($contentType)
    {
        $this->contentType = $contentType;
        return $this;
    }

    public function setCookie(string $name, ?string $value, ?int $time = self::COOKIE_TIMEOUT)
    {
        $this->cookies[$name] = [$value, $time]; 
        return $this;
    }

    // public function setHeader(string $name, $value)
    // {
        
    //     header($name.': '.$value);
    //     return $this;
    // }

    public function setHeader(string $name, ?string $value)
    {
        $this->headers[$name] = $value;
        return $this;
    }

    public function setContent($responseContent)
    {
        $this->content = $responseContent;
        return $this;
    }

    public function send()
    {
        foreach ($this->cookies as $name => [$value, $time]) {
            setcookie($name, $value, $time + time());
        }

        header("Status: {$this->httpCode}");
        // header("Content-type: {$this->contentType}; charset=utf-8");

        foreach ($this->headers as $name => $value) {
            header("$name: $value");
        }
        
        print $this->content;
    }      
}