<?php

namespace CubeMap\Mvc\Controller;

use CubeMap\Mvc\RequestInterface;
use CubeMap\Mvc\ResponseInterface;
use CubeMap\Mvc\Route\RouterInterface;

class FrontController {

    protected $router;

    protected $dispatcher;

    public function __construct(RouterInterface $router, DispatcherInterface $dispatcher) {
        $this->router = $router;
        $this->dispatcher = $dispatcher;
    }

    public function run(RequestInterface $request, ResponseInterface $response, $view) {
        $route = $this->router->match($request, $response);
        while(! $response->isError() && ! $request->isDispatched()) {
            $this->dispatcher->dispatch($route, $request, $response, $view);
        }
        $response->send($view);
    }

}
