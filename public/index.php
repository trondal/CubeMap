<?php

use CubeMap\Mvc\Dispatcher;
use CubeMap\Mvc\FrontController;
use CubeMap\Mvc\Request;
use CubeMap\Mvc\Response;
use CubeMap\Mvc\Route;
use CubeMap\Mvc\Router;

chdir(dirname(__DIR__));

require_once __DIR__ . '/../vendor/autoload.php';

$options = require_once 'config/application.php';

$request = new Request();
$response = new Response();

$route = $options['router']['route'];
$route1 = new Route($route['index']['path'], $route['index']['controller'], $route['index']['action']);
$route2 = new Route($route['test']['path'], $route['test']['controller'], $route['test']['action']);

$router = new Router(array($route1, $route2));
$dispatcher = new Dispatcher();
$frontController = new FrontController($router, $dispatcher);
$frontController->run($request, $response);
//$httpResponse->send();