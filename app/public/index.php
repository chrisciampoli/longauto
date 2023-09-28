<?php
declare(strict_types=1);

use LongAuto\Controllers\HomeController;
use LongAuto\Services\DependencyContainer;
use LongAuto\Services\UserService;
use LongAuto\Repositories\UserRepository;
use LongAuto\Controllers\UserController;
use LongAuto\Libs\Router;
use LongAuto\Services\VehicleService;
use LongAuto\Repositories\VehicleRepository;
use LongAuto\Controllers\VehicleController;


error_reporting(E_ALL);
ini_set('display_errors', '1');
// Require the Composer autoloader
require_once '../vendor/autoload.php';
session_start(); // Start the session
$config = require_once '../src/config/config.php';

$container = new DependencyContainer();

$container->register(PDO::class, function($container) use ($config) {
    $dsn = "mysql:host=db;dbname={$config['db']['name']};charset=utf8";

    return new PDO($dsn, $config['db']['user'], $config['db']['password']);
});

$container->register(HomeController::class, function($container) {
    return new HomeController($container->get(VehicleService::class));
});

$container->register(UserRepository::class, function($container) {
    return new UserRepository($pdo = $container->get(PDO::class));
});

$container->register(UserService::class, function($container) {
    return new UserService($repo = $container->get(UserRepository::class));
});

$container->register(UserController::class, function($container) {
    return new UserController($container->get(UserService::class));
});

$container->register(VehicleRepository::class, function($container) {
    return new VehicleRepository($container->get(PDO::class));
});

$container->register(VehicleService::class, function($container) {
    return new VehicleService($container->get(VehicleRepository::class));
});

$container->register(VehicleController::class, function($container) {
    return new VehicleController($container->get(VehicleService::class));
});

$router = new Router($container);
$router->registerController(LongAuto\Controllers\HomeController::class);
$router->registerController(LongAuto\Controllers\UserController::class);
$router->registerController(LongAuto\Controllers\VehicleController::class);
// ... Register more controllers as needed

$router->dispatch($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);