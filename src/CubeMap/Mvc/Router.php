<?php

namespace CubeMap\Mvc;

class Router {

    protected $routes;

    public function __construct($routes) {
        $this->addRoutes($routes);
    }

    public function addRoute(Route $route) {
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

    /**
     *
     * @param \CubeMap\Mvc\Request $request
     * @param \CubeMap\Mvc\Response $response
     * @return Route
     * @throws \OutOfRangeException
     */
    public function match(Request $request, Response $response) {
        foreach ($this->routes as $route) {
            if ($route->match($request)) {
                return $route;
            }
        }
        $response->addHeader('404 Page Not Found')->send();
        throw new \OutOfRangeException('No route matched the given URI');
    }

}
