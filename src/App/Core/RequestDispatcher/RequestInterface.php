<?php

namespace App\Core\RequestDispatcher;

interface RequestInterface
{
    public function getRequestMethod();
    public function getRequestUri();
    public function getPost();
    public function getCookie();
    public function getQuery();
    public function getUserAgent();    
    public function getQueryParam();    
    public function getServerProtocol();
}