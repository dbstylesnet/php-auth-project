<?php

namespace App\Core\RequestDispatcher;

interface RequestInterface
{
    public function getBody();   
    public function getQueryParam(string $name);
    public function setChangeCookie(string $cookieName, string $cookieValue, date $time);
    public function setDifferentCookie();    
}