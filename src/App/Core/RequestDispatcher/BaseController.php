<?php

namespace App\Core\RequestDispatcher;

class BaseController
{
    public function request(): RequestInterface
    {
        return $this->request;
    }

    public function response(): ResponseInterface
    {
        return new Response();
    }

    public function xmlResponse(): ResponseInterface
    {
        return new XmlResponse();
    }

    public function jsonResponse(): ResponseInterface
    {
        return new JsonResponse();
    }

    public function renderTemplate(string $pathToTemplate, array $bindings = [])
    {
        // $view = new View($pathToTemplate);
        // return $view->render($bindings);

        // DO IT
        // inside render
        // foreach ($bindings as $key => $value) { $this->$key = $value; }
    }
}