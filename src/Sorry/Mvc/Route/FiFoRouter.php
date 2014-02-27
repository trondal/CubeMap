<?php

namespace Sorry\Mvc\Route;

use Sorry\Mvc\Stdlib\RequestInterface;
use Sorry\Mvc\Stdlib\ResponseInterface;

class FiFoRouter implements RouterInterface {

    protected $routes;

    public function __construct($routes) {
        $this->addRoutes($routes);
    }

    public function addRoute($name, RouteInterface $route) {
        $this->routes[$name] = $route;
        return $this;
    }

    public function addRoutes(array $routes) {
        foreach ($routes as $route) {
            $this->addRoute($route);
        }
        return $this;
    }

    public function getRoutes() {
        return $this->routes;
    }

    public function route(RequestInterface $request, ResponseInterface $response) {
        foreach ($this->routes as $routeName => $route) {
            if (($match = $route->match($request)) instanceOf RouteMatch) {
                $match->setMatchedRouteName($routeName);

                // set route Match params before ...
                return $match;
            }
        }
        $response->raiseRoutingError();
        return null;
    }

}
