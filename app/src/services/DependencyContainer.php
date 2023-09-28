<?php

namespace LongAuto\Services;

class DependencyContainer {
    private $services = [];

    public function register(string $name, callable $resolver) {
        $this->services[$name] = $resolver;
    }

    public function get(string $name) {
        if (!isset($this->services[$name])) {
            throw new \Exception("Service {$name} is not registered.");
        }
        
        return $this->services[$name]($this);
    }
}
