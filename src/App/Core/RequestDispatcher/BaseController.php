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

    /**
     * 
     */
    public function renderTemplate(string $pathToTemplate, array $bindings = []): ResponseInterface
    {
        return (new Response())
            ->setContent($this->renderTemplateWithLayout($pathToTemplate, $bindings));
    }

    /**
     * TODO
     */
    public function redirect($url): ResponseInterface
    {
        // TODO with header
        // $response = $this->response();
        // $response->setHeader("Location", ...)
        //$response->setHttpS
    }

    /**
     * 
     */
    private function renderTemplateWithLayout(string $pathToTemplate, array $bindings = [])
    {
        ob_start();

        include TEMPLATE_DIR . '/layout/header.inc.php';

        $view = new View();
        print $view->render($pathToTemplate, $bindings);

        include TEMPLATE_DIR . '/layout/footer.inc.php';

        $output = ob_get_contents();
        ob_end_clean();

        return $output;
    }
}