<?php

namespace CubeMap\Mvc;

class Dispatcher {

    public function dispatch($route, $request, $response = null) {
        $controller = $route->getController();
        $controller->dispatch($route, $request, $response);
    }

}