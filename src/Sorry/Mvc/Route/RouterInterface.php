<?php

namespace Sorry\Mvc\Route;

use Sorry\Mvc\Route\RouteInterface;
use Sorry\Mvc\Stdlib\RequestInterface;
use Sorry\Mvc\Stdlib\ResponseInterface;

interface RouterInterface {

    public function addRoute($name, RouteInterface $route);

    public function addRoutes(array $routes);

    public function getRoutes();

    /**
     * @return Sorry\Mvc\Route\RouteMatch | null
     */
    public function route(RequestInterface $request, ResponseInterface $response);
}
