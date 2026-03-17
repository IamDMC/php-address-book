<?php

/**
 * @throws \Exception
 */

function view(string $view, array $data = [])
{
    extract($data);

    $path = BASE_PATH . '/views/' . str_replace('.', '/', $view) . '.php';

    if (! file_exists($path)){
        throw new Exception("View not found: $path");
    }

    require $path;
}