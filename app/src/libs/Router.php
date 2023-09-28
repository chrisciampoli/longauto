<?php

namespace LongAuto\Libs;

use LongAuto\Attributes\Route;
use LongAuto\Services\DependencyContainer;

class Router {
    private array $routes = [];
    private DependencyContainer $container;

    public function __construct(DependencyContainer $container) {
        $this->container = $container;
    }

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
                // Use the container to get the instance of the controller
                $controller = $this->container->get($controllerClass);
                echo $controller->$action();
                return;
            }
        }
        echo "404 Not Found";
    }
}
