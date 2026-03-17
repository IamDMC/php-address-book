<?php

/**
 * @throws \Exception
 */

function view(string $view, array $data = [])
{
    $layout = $data['layout'] ?? null;

    unset($data['layout']);

    extract($data);

    $path = BASE_PATH . '/views/' . str_replace('.', '/', $view) . '.php';

    if (! file_exists($path)){
        throw new Exception("View not found: $path");
    }

    // Render view into a buffer and store it in $content

    // start output buffering
    ob_start();

    // include the view file
    require $path;

    // get buffered output and clean the buffer
    $content = ob_get_clean();

    // render layout if defined, otherwise output content directly
    if ($layout){
        $layoutPath = BASE_PATH . '/views/layouts/' . $layout . '.php';

        if (! file_exists($layoutPath)){
            throw new Exception("Layout not found: $layoutPath");
        }

        require $layoutPath;
    }else{
        echo $content;
    }
}