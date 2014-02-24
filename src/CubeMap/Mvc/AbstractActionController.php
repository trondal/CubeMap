<?php

namespace CubeMap\Mvc;

abstract class AbstractActionController {

    protected $route;
    protected $request;
    protected $response;

    protected $view;

    public function dispatch(Route $route, Request $request, Response $response = null) {

        $this->route = $route;
        $this->request = $request;
        if (!$response) {
            $response = new Response();
        }
        $this->response = $response;

        $method = $route->getMethod();
        $controller = $route->getController();

        // Where to do this?
        $this->view = new CompositeView($this->route->getPath());

        $reflector = new \ReflectionClass($controller);
        $actionName = strtolower($method) . 'Action';
        if (!$reflector->hasMethod($actionName)) {
            throw new InvalidArgumentException(
                    'The action '. $actionName .' has not been defined');
        }

        return $this->$actionName();
    }
}
