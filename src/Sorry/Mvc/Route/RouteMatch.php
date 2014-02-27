<?php

namespace Sorry\Mvc\Route;

class RouteMatch {

    protected $matchedRouteName;

    protected $route;

    protected $params = array();

    public function __construct($route, array $params) {
        $this->route = $route;
        $this->params = $params;
    }

    public function setParam($name, $value) {
        $this->params[$name] = $value;
    }

    public function getParam($name, $default = null) {
        if (array_key_exists($name, $this->params)) {
            return $this->params[$name];
        }

        return $default;
    }

    public function getParams() {
        return $this->params;
    }

    public function setMatchedRouteName($matchedRouteName) {
        $this->matchedRouteName = $matchedRouteName;
    }

    public function getMatchedRouteName() {
        return $this->matchedRouteName;
    }

    public function getRoute() {
        return $this->route;
    }

    public function getController() {
        return new $this->params['controller']();
    }

    public function getMethod() {
        return $this->params['action'];
    }

}
