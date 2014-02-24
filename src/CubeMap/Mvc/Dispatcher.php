<?php

namespace CubeMap\Mvc;

class Dispatcher {

    public function dispatch($route, $request, $response = null) {
        $controller = $route->getController();
        $view = $controller->dispatch($route, $request, $response);

        echo $view->render();
    }

}
