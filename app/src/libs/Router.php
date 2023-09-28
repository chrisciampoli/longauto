<?php

namespace LongAuto\Libs;

use LongAuto\Attributes\Route;
use LongAuto\Services\DependencyContainer;

class Router
{
    private array $routes = [];
    private DependencyContainer $container;

    public function __construct(DependencyContainer $container)
    {
        $this->container = $container;
    }

    public function registerController(string $controllerClass): void
    {
        $reflector = new \ReflectionClass($controllerClass);
        foreach ($reflector->getMethods() as $method) {
            $route = $method->getAttributes(Route::class)[0] ?? null;
            if ($route) {
                $routeInstance = $route->newInstance();
                // Convert paths with dynamic segments into regex patterns
                $pattern = "@^" . preg_replace('/\:[a-zA-Z0-9_]+/', '([a-zA-Z0-9_]+)', $routeInstance->path) . "$@D";
                $this->routes[$pattern] = [$controllerClass, $method->getName(), $routeInstance->method];
            }
        }
    }

    public function dispatch(string $uri, string $method): void
    {
        $cleanUri = str_replace('/index.php', '', $uri); // Remove 'index.php' from the URI
        foreach ($this->routes as $pattern => [$controllerClass, $action, $httpMethod]) {
            if (preg_match($pattern, $cleanUri, $matches) && $method === $httpMethod) {
                array_shift($matches);  // remove the entire match
                // Use the container to get the instance of the controller
                $controller = $this->container->get($controllerClass);
                echo $controller->$action(...$matches);
                return;
            }
        }
        echo "404 Not Found";
    }
}
