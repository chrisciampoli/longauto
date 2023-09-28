<?php
declare(strict_types=1);
// Require the Composer autoloader
require_once '../vendor/autoload.php';
$config = require_once '../src/config/config.php';

$router = new LongAuto\Libs\Router();
$router->registerController(LongAuto\Controllers\HomeController::class);
// ... Register more controllers as needed

$router->dispatch($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);