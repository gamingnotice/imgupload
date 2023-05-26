<?php
declare(strict_types=1);

class Router
{
    private $path;
    private $routes = [];

    public function __construct($path)
    {
        $this->path = $path;
    }

    public function addRoute($route, $controller)
    {
        $this->routes[$route] = $controller . '.php';
    }

    public function dispatch()
    {
        foreach ($this->routes as $route => $controller) {
            if ($this->path === $route) {
                require $controller;
                return;
            }
        }

        http_response_code(404);
        echo "404 Seite nicht gefunden.";
    }
}
