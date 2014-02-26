<?php

namespace CubeMap\Mvc\Route;

use CubeMap\Mvc\RequestInterface;
use CubeMap\Mvc\ResponseInterface;
use OutOfRangeException;

class FiFoRouter implements RouterInterface {

    protected $routes;

    public function __construct($routes) {
        $this->addRoutes($routes);
    }

    public function addRoute(RouteInterface $route) {
        $this->routes[] = $route;
        return $this;
    }

    public function addRoutes($routes) {
        foreach ($routes as $route) {
            $this->addRoute($route);
        }
        return $this;
    }

    public function getRoutes() {
        return $this->routes;
    }

    public function match(RequestInterface $request, ResponseInterface $response) {
        foreach ($this->routes as $route) {
            if ($route->matches($request)) {
                return $route;
            }
        }
        $response->addHeader('Status', '404 Not Found');
        //TODO: conditional catching of error and showing error file
        throw new OutOfRangeException('No route matched the given URI');
    }

}
