<?php

namespace CubeMap\Mvc;

class FrontController {

    protected $router;

    protected $dispatcher;

    public function __construct($router, $dispatcher) {
        $this->router = $router;
        $this->dispatcher = $dispatcher;
    }

    public function run(Request $request, Response $response) {
        $route = $this->router->match($request, $response);
        $this->dispatcher->dispatch($route, $request, $response);
    }

}
