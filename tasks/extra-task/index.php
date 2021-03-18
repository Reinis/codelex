<?php

use App\Controllers\GardenController;
use App\Controllers\HomeController;
use App\Controllers\ShopController;
use FastRoute\RouteCollector;

require_once 'vendor/autoload.php';

//$page = $_GET['page'] ?? 'home';
//
//$routes = [
//    'home' => HomeController::class,
//    'shop' => ShopController::class,
//];
//
//$controller = $routes[$page] ?? $routes['home'];
//$controller = (new $controller)->index();

//$home_handler = (new HomeController())->index();

$dispatcher = FastRoute\simpleDispatcher(
    function (RouteCollector $routeCollector) {
        $routeCollector->addRoute('GET', '/', [HomeController::class, 'index']);
        $routeCollector->addRoute('GET', '/garden', [GardenController::class, 'index']);
        $routeCollector->addRoute('GET', '/shop', [ShopController::class, 'index']);
    }
);

$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

// Strip query string (?foo=bar) and decode URI
if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);
switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        // ... 404 Not Found
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        // ... 405 Method Not Allowed
        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
        [$class, $method] = $handler;
        $handler = new $class();
        $handler->$method($vars);
        break;
}
