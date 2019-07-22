<?php

namespace App\Core\RequestDispatcher;

interface RequestInterface
{
    /**
     * 
     */
    public function getRequestMethod(): string;

    public function getRequestUri(): string;

    public function getPost(): string;

    public function getCookie(): string;

    public function getQuery(): string;

    public function getUserAgent(): string;   

    public function getQueryParam(string $name);  
      
    public function getServerProtocol(): string;
}