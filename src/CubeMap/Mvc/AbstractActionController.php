<?php

namespace CubeMap\Mvc;

class AbstractActionController {

    protected $route;
    protected $request;
    protected $response;

    public function dispatch(Route $route, Request $request, Response $response = null) {
        $this->route = $route;
        $this->request = $request;
        if (!$response) {
            $response = new Response();
        }
        $this->response = $response;

        $method = $route->getMethod();
        $controller = $route->getController();

        $reflector = new \ReflectionClass($controller);
        $actionName = strtolower($method) . 'Action';
        if (!$reflector->hasMethod($actionName)) {
            throw new InvalidArgumentException(
                    'The action '. $actionName .' has not been defined');
        }

        return $this->$actionName();
    }
}
