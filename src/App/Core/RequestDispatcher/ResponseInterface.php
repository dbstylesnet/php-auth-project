<?php
namespace App\Core\RequestDispatcher;

interface ResponseInterface
{   
    /**
     * Timeout added to the salt
     */
    const COOKIE_TIMEOUT = 60 * 60 * 24 * 180;

    /**
     * Sets HTTP code (fe. 200)
     */
    public function setHTTPCode(int $code);

    /**
     * Sets content type (fe. JSON, XML)
     */
    public function setContentType(string $contentType);

    /**
     * Sets provided cookie
     */
    public function setCookie(string $name, ?string $value, int $time = self::COOKIE_TIMEOUT);

    /**
     * Sets provided header (pair of name, value)
     */
    public function setHeader(string $name, ?string $value);

    /**
     * Sets content of response
     */    
    public function setContent($content);

    /**
     * Sends the response
     */
    public function send();
}
