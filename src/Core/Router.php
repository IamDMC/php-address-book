<?php

namespace Iamdmc\PhpAddressBook\Core;

class Router
{
    private array $routes = [];

    public function get($uri, $action)
    {
        $this->routes['GET'][$uri] = $action;
    }

    public function post($uri, $action)
    {
        $this->routes['POST'][$uri] = $action;
    }

    public function dispatch()
    {
        $method = $_SERVER['REQUEST_METHOD'];
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        $action = $this->routes[$method][$uri] ?? null;

        if (! $action){
            http_response_code(404);
            echo "404 Not found";
            return;
        }

        // CSRF protection for all post requests
        if ($method === 'POST' && !Csrf::verify()) {
            http_response_code(403);
            echo "CSRF validation failed";
            return;
        }

        [$controller, $method] = $action;

        $controllerInstance = new $controller();

        call_user_func([$controllerInstance, $method]);
    }
}