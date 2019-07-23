<?php

namespace App\Core\RequestDispatcher;

class View 
{
    public function render($path, array $bindings)
    {
        ob_start();

        extract($bindings);

        include TEMPLATE_DIR . $path;

        $output = ob_get_contents();
        ob_end_clean();
        return $output;
    }

    public function includeCSS($path)
    {
        // collect all css links and render it inside footer
    }

    public function includeJS($path)
    {
        // the same as 
    }
}