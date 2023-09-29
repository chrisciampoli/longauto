<?php

namespace LongAuto\Controllers;

abstract class AbstractController
{

    protected function render(?string $viewName = null, array $parameters = []): string
    {
        $viewName ??= $this->getDefaultViewName();
        $controllerName = strtolower(str_replace('Controller', '', (new \ReflectionClass($this))->getShortName()));
        $viewPath = __DIR__ . '/../views/' . $controllerName . '/' . $viewName . '.php';

        if (!file_exists($viewPath)) {
            throw new \Exception("View '{$viewName}' not found!");
        }

        extract($parameters, EXTR_SKIP); // Extract parameters to variables for the view

        ob_start();
        include $viewPath;
        $content = ob_get_clean(); // Get the content of the specific view

        $layoutPath = __DIR__ . '/../views/layout.php'; // Path to your base view
        if (file_exists($layoutPath)) {
            include $layoutPath; // Include the base view
        } else {
            throw new \Exception("Layout '{$layoutPath}' not found!");
        }

        return ob_get_clean(); // Return the final rendered view
    }

    private function getDefaultViewName(): string
    {
        $backtrace = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 2);
        $actionName = $backtrace[1]['function'];

        // Extract controller name from the current class name (removing "Controller" suffix)
        $controllerName = strtolower(
            str_replace('Controller', '', (new \ReflectionClass($this))->getShortName())
        );

        return $controllerName . '/' . $actionName;
    }
}
