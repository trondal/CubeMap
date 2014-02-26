<?php

namespace CubeMap\Mvc\Controller;

use CubeMap\Mvc\RequestInterface;
use CubeMap\Mvc\ResponseInterface;
use CubeMap\Mvc\Route\RouteInterface;
use CubeMap\Mvc\View\ViewInterface;
use InvalidArgumentException;
use ReflectionClass;

abstract class AbstractActionController implements ActionControllerInterface {

    /**
     * @var RouteInterface
     */
    protected $route;

    /**
     * @var RequestInterface
     */
    protected $request;

    /**
     * @var ResponseInterface
     */
    protected $response;

    /**
     * @var ViewInterface
     */
    protected $view;

    public function execute(RouteInterface $route, RequestInterface $request, ResponseInterface $response, ViewInterface $view) {

        $this->route = $route;
        $this->request = $request;
        $this->response = $response;
        $this->view = $view;

        $method = $route->getMethod();
        $controller = $route->getController();

        $reflector = new ReflectionClass($controller);
        $actionName = strtolower($method) . 'Action';
        if (!$reflector->hasMethod($actionName)) {
            throw new InvalidArgumentException(
                    'The action '. $actionName .' has not been defined');
        }
        $this->view->setTemplate($route->getPath());

        $this->$actionName();
        return true;
    }

    /**
     * @return RequestInterface
     */
    public function getRequest() {
        return $this->request;
    }

    /**
     * @return RouteInterface
     */
    public function getRoute() {
        return $this->route;
    }

    /**
     * @return ResponseInterface
     */
    public function getResponse() {
        return $this->response;
    }
}
