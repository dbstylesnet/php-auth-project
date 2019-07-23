<?php

namespace App\Core\RequestDispatcher;

interface RequestInterface
{
    /**
     * TODO write phpdoc
     */
    public function getRequestMethod(): string;

    public function getRequestUri(): string;

    public function getPost(): array;

    public function getCookie(): string;

    public function getQuery(): array;

    public function getUserAgent(): string;   

    public function getQueryParam(string $name);  
      
    public function getServerProtocol(): string;
}