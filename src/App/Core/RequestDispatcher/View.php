<?php

namespace App\Core\RequestDispatcher;

class View 
{
    protected $pathToTemplate = null;

    public function __construct(string $pathToTemplate) 
    {
        $this->pathToTemplate = $pathToTemplate;
    }

    public function render(array $bindings)
    {
        ob_start();

        extract($bindings);

        include TEMPLATE_DIR . $this->pathToTemplate;

        $output = ob_get_contents();
        ob_end_clean();
        return $output;
    }

    public function sanitize($string)
    {
        # code...
    }
}