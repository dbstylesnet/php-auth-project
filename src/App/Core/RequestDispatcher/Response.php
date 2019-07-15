<?php

namespace App\Core\RequestDispatcher;

class Response implements ResponseInterface
{
    const HTTP_OK = '';

    private $HTTPCode;

    private $contentType;

    private $cookies;

    private $headers;

    private $responseContent;

    private $response;

    public function __construct(
        $HTTPCode = null,
        $contentType = null,
        $cookies = null,
        $headers = null,
        $responseContent = null
    )
    {
        $this->HTTPCode = $HTTPCode;
        $this->contentType = $contentType;
        $this->cookies = $cookies;
        $this->headers = $headers;
        $this->responseContent = $responseContent;
    }

    public function setHTTPCode($HTTPCode): string
    {
        $this->HTTPCode = $HTTPCode; 
    }

    public function setContentType($contentType): string
    {
        $this->contentType = $contentType;
    }

    public function setCookies($cookies): string
    {
        $this->cookies = $cookies;
    }

    public function setHeaders($headers): string
    {
        $this->headers = $headers;
    }

    public function setResponseContent($responseContent): string
    {
        $this->responseContent = $responseContent;
    }

    
    public function send(        
        $HTTPCode,
        $contentType,
        $cookies,
        $headers,
        $responseContent
    )
    {
        $this->response = array(
            $this->setHTTPCode($HTTPCode),
            $this->setContentType($contentType),
            $this->setHTTPCode($cookies),
            $this->setContentType($headers),
            $this->setHTTPCode($responseContent),
        );
        return $this->response;
    }


        

        //

        // Response::send = function () {
            // setcontent type, set encoding
            // setcookie($response->getCookie());
            // setheaders($response->getHeaders());
            // print $response->getContent();
            // 
        // }

}