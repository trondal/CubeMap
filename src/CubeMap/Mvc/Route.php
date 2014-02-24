<?php

namespace CubeMap\Mvc;

/**
 * It is the routes responsibility to be able to match a request
 */
class Route {

    protected $path;
    protected $controller;
    protected $method;

    public function __construct($path, $controller, $action) {
        $this->path = $path;
        $this->controller = $controller;
        $this->method = $action;
    }

    public function match(Request $request) {
        $path = trim(parse_url($request->getUri(), PHP_URL_PATH), '/');

        return ($this->path === $path);
    }

    public function getController() {
        return new $this->controller;
    }

    public function getMethod() {
        return $this->method;
    }
}