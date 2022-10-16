<?php

namespace Pipe;

function view($views_path = "./"): callable
{
    $doRender = function (string $path, array $vars = []) use ($views_path): string {
        $__filepath = rtrim($views_path, '/') . "/" . ltrim($path, "/");

        if (! file_exists($__filepath)) {
            throw new \Exception("The file $path could not be found.");
        }

        $vars['render'] = view($views_path);
        ob_start();
        extract($vars);
        include $__filepath;
        return ob_get_clean();
    };

    return $doRender;
}
