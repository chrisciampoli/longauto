<?php

namespace LongAuto\Libs;

use LongAuto\Attributes\Route;

class Router {
    private array $routes = [];

    public function registerController(string $controllerClass): void {
        $reflector = new \ReflectionClass($controllerClass);
        foreach ($reflector->getMethods() as $method) {
            $route = $method->getAttributes(Route::class)[0] ?? null;
            if ($route) {
                $routeInstance = $route->newInstance();
                $this->routes[$routeInstance->path] = [$controllerClass, $method->getName(), $routeInstance->method];
            }
        }
    }

    public function dispatch(string $uri, string $method): void {
        foreach ($this->routes as $path => [$controllerClass, $action, $httpMethod]) {
            $cleanUri = str_replace('/index.php', '', $uri); // Remove 'index.php' from the URI
    
            if (($cleanUri === $path || $uri === $path) && $method === $httpMethod) {
                $controller = new $controllerClass();
                echo $controller->$action();
                return;
            }
        }
        echo "404 Not Found";
    }
}
