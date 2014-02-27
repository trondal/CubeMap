<?php

namespace Sorry\Mvc\Controller;

use InvalidArgumentException;
use ReflectionClass;
use Sorry\Mvc\Route\RouteInterface;
use Sorry\Mvc\Route\RouteMatch;
use Sorry\Mvc\Stdlib\RequestInterface;
use Sorry\Mvc\Stdlib\ResponseInterface;
use Sorry\Mvc\View\ViewInterface;

abstract class AbstractActionController implements ActionControllerInterface {

    /**
     * @var RouteMatch
     */
    protected $match;

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

    public function execute(RouteMatch $match, RequestInterface $request, ResponseInterface $response, ViewInterface $view) {

        $this->match = $match;
        $this->request = $request;
        $this->response = $response;
        $this->view = $view;

        //return $controller->getEvent()->getRouteMatch()->getParams();

        $method = $match->getMethod();
        $controller = $match->getController();

        $reflector = new ReflectionClass($controller);
        $actionName = strtolower($method) . 'Action';
        if (!$reflector->hasMethod($actionName)) {
            throw new InvalidArgumentException(
                    'The action '. $actionName .' has not been defined');
        }

        $template = $this->getShortName() . '/' . $method;
        $this->view->setTemplate($template);

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

    public function getShortName() {
        $className = get_class($this);
        $pathArray = explode('\\', $className);
        $fileName = end($pathArray);

        $pos = strpos($fileName, 'Controller');
        return strtolower(substr($fileName, 0, $pos));
    }
}
