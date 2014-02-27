<?php

namespace Sorry\Mvc\Route;

use Sorry\Mvc\Stdlib\RequestInterface;

class LiteralRoute implements RouteInterface {

    protected $route;

    protected $defaults;

    public function __construct($route, array $defaults = array()) {
        $this->route = $route;
        $this->defaults = $defaults;
    }

    public static function factory($options = array()) {
        return new static($options['route'], $options['defaults']);
    }

    public function match(RequestInterface $request) {
        $uri = $request->getUri();
        $path = parse_url($uri, PHP_URL_PATH);

        if ($path === $this->route) {
            return new RouteMatch($this->route, $this->defaults);
        }
        return null;
    }

    public function assemble(array $params = array(), array $options = array()) {
        return $this->route;
    }
}
