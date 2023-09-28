<?php

namespace LongAuto\Attributes;

#[\Attribute(\Attribute::TARGET_METHOD)]
class Route {
    public function __construct(
        public string $path,
        public string $method = 'GET'
    ) {}
}