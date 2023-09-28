<?php

namespace LongAuto\Controllers;

abstract class AbstractController {

    protected function render(?string $viewName = null, array $parameters = []): string {
        // If no view name is provided, use the calling function's name
        $viewName ??= $this->getDefaultViewName();
        // Extract controller name from the current class name (removing "Controller" suffix)
        $controllerName = strtolower(
            str_replace('Controller', '', (new \ReflectionClass($this))->getShortName())
        );
        $viewPath = __DIR__ . '/../views/' . $controllerName . '/' . $viewName . '.php';

        if (!file_exists($viewPath)) {
            throw new \Exception("View '{$viewName}' not found!");
        }

        // Extract parameters to variables for the view
        extract($parameters, EXTR_SKIP);

        // Buffer the output
        ob_start();

        include $viewPath;

        return ob_get_clean();
    }

    private function getDefaultViewName(): string {
        $backtrace = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 2);
        $actionName = $backtrace[1]['function'];
    
        // Extract controller name from the current class name (removing "Controller" suffix)
        $controllerName = strtolower(
            str_replace('Controller', '', (new \ReflectionClass($this))->getShortName())
        );
    
        return $controllerName . '/' . $actionName;
    }
    
}
