<?php

namespace App\Core\RequestDispatcher;

interface RequestInterface
{
    /**
     * Method returns HTTP method
     * @return string
     */
    public function getRequestMethod(): string;

    /**
     * Method returns URI
     * @return string
     */
    public function getRequestUri(): string;

    /**
     * Method returs array of Post data
     * @return array
     */
    public function getPost(): array;

    /**
     * Method returns array of cookies
     * @return array
     */
    public function getCookie(): array;

    /**
     * Method returns URI's parameters
     * @return array
     */
    public function getQuery(): array;

    /**
     * Method returns user's broweser data
     * @return string
     */
    public function getUserAgent(): string;   

    /**
     * Method returns provided parameter's @name string value
     * @param string
     */
    public function getQueryParam(string $name);  
      
    /**
     * Method returns user called protocol
     * @return string
     */
    public function getServerProtocol(): string;
}
