<?php

namespace CubeMap\Mvc\Route;

use CubeMap\Mvc\RequestInterface;

/**
 * It is the routes responsibility to be able to match a request
 */
class SimpleRoute implements RouteInterface {

    protected $path;
    protected $controller;
    protected $method;

    public function __construct($path, $controller, $action) {
        $this->path = $path;
        $this->controller = $controller;
        $this->method = $action;
    }

    public function matches(RequestInterface $request) {
        $path = trim(parse_url($request->getUri(), PHP_URL_PATH), '/');

        return ($this->path === $path);
    }

    public function getController() {
        return new $this->controller;
    }

    public function getMethod() {
        return $this->method;
    }

    public function getPath() {
        return $this->path;
    }

}
