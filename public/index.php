<?php

use CubeMap\Mvc\Controller\Dispatcher;
use CubeMap\Mvc\Controller\FrontController;
use CubeMap\Mvc\Http\Request as HttpRequest;
use CubeMap\Mvc\Http\Response;
use CubeMap\Mvc\Route\SimpleRoute;
use CubeMap\Mvc\Route\FiFoRouter;
use CubeMap\Mvc\View\View;

chdir(dirname(__DIR__));

require_once __DIR__ . '/../vendor/autoload.php';

$options = require_once 'config/application.php';

$request = new HttpRequest(
        array(
            'GET' => filter_input_array(INPUT_GET),
            'POST' => filter_input_array(INPUT_POST),
            'COOKIE' => filter_input_array(INPUT_COOKIE),
            'SERVER' => filter_input_array(INPUT_SERVER),
            'ENV' => filter_input_array(INPUT_ENV),
        ), 'http://'. filter_input(INPUT_SERVER, 'HTTP_HOST') . filter_input(INPUT_SERVER, 'REQUEST_URI')
);

$response = new Response(Response::VERSION_11);

$route = $options['router']['route'];
$route1 = new SimpleRoute($route['home']['path'], $route['home']['controller'], $route['home']['action']);
$route2 = new SimpleRoute($route['index']['path'], $route['index']['controller'], $route['index']['action']);
$route3 = new SimpleRoute($route['test']['path'], $route['test']['controller'], $route['test']['action']);
$router = new FiFoRouter(array($route1, $route2, $route3));
$view = new View();

$dispatcher = new Dispatcher();
$frontController = new FrontController($router, $dispatcher);
$frontController->run($request, $response, $view);