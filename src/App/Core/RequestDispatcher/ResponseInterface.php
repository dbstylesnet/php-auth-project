<?php

namespace App\Core\RequestDispatcher;

interface RequestDispatcher
{   
    public function setHTTPCode(): string;
    public function setContentType(): string;
    public function setCookies(): string;
    public function setHeaders(): string;
    public function setResponseContent(): string;
    public function send(); // type?
}