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
        printf('<link rel="stylesheet" type="text/css" href="%s">', $path);
    }

    public function includeJS($path)
    {
        printf('<script type="text/javascript" src="%s" defer="defer"/></script>', $path);
    }
}