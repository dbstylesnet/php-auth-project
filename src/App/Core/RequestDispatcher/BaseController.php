<?php
namespace App\Core\RequestDispatcher;

class BaseController
{
    private $authService;

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

    public function renderTemplate(
        string $pathToTemplate,
        array $bindings = []
    ): ResponseInterface {
        $callable = function () use ($pathToTemplate, $bindings) {
            return $this->renderTemplateWithLayout($pathToTemplate, $bindings);
        };

        return (new Response())
            ->setContent(
                new class($callable) {
                    private $callback;

                    public function __construct($callback) {
                        $this->callback = $callback;
                    }

                    public function __toString() {
                        try {
                            return call_user_func($this->callback);
                        } catch (\Exception $e) {
                            // 
                        }
                    }
                }
            );
    }

    /**
     * $param url 
     * redirect url
     */
    public function redirect($url): ResponseInterface
    {
        $response = $this->response();
        $response->setHeader("Location", $url);

        return $response;
    }

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

    protected function getUserToken()
    {
        $userToken = $this->authService->authenticate($request->getCookie('auth'));

        return $userToken;
    }
}