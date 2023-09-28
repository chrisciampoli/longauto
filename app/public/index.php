<?php
declare(strict_types=1);
error_reporting(E_ALL);
ini_set('display_errors', '1');
// Require the Composer autoloader
require_once '../vendor/autoload.php';
session_start(); // Start the session
$config = require_once '../src/config/config.php';

$router = new LongAuto\Libs\Router();
$router->registerController(LongAuto\Controllers\HomeController::class);
$router->registerController(LongAuto\Controllers\UserController::class);
// ... Register more controllers as needed

$router->dispatch($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);