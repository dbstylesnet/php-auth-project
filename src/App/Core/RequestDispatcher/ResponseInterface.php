<?php

namespace App\Core\RequestDispatcher;

interface ResponseInterface
{   
    const COOKIE_TIMEOUT = 60 * 60 * 24 *180; // 180 year

    public function setHTTPCode(int $code);
    public function setContentType(string $contentType);
    public function setCookie(string $name, ?string $value, int $time = self::COOKIE_TIMEOUT);
    // public function setHeaders(array $array);
    public function setContent($content);

    /**
     * 
     */
    // public function setCookie(string $name, ?string $value, int $time);

    public function send();
}