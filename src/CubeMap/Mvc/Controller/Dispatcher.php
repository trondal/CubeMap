<?php

namespace CubeMap\Mvc\Controller;

use CubeMap\Mvc\RequestInterface;
use CubeMap\Mvc\ResponseInterface;
use CubeMap\Mvc\Route\RouteInterface;
use CubeMap\Mvc\View\ViewInterface;

class Dispatcher implements DispatcherInterface {

    public function dispatch(RouteInterface $route, RequestInterface $request, ResponseInterface $response, ViewInterface $view) {
        $controller = $route->getController();
        if ($controller->execute($route, $request, $response, $view)) {
            $request->stopDispatching();
        }
    }

}