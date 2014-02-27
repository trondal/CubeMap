<?php

use Sorry\Mvc\Controller\Dispatcher;
use Sorry\Mvc\Controller\FrontController;
use Sorry\Mvc\Http\Request as HttpRequest;
use Sorry\Mvc\Http\Response;
use Sorry\Mvc\View\View;

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

$routerFactory = new \Sorry\Mvc\Route\Factory\RouterFactory();
$router = $routerFactory->createService();

$view = new View();

$dispatcher = new Dispatcher();
$frontController = new FrontController($router, $dispatcher);
$frontController->run($request, $response, $view);