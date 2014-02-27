<?php

namespace Sorry\Mvc\Controller;

use Sorry\Mvc\Stdlib\RequestInterface;
use Sorry\Mvc\Stdlib\ResponseInterface;
use Sorry\Mvc\Route\RouterInterface;

class FrontController {

    protected $router;
    protected $dispatcher;

    public function __construct(RouterInterface $router, DispatcherInterface $dispatcher) {
        $this->router = $router;
        $this->dispatcher = $dispatcher;
    }

    public function run(RequestInterface $request, ResponseInterface $response, $view) {
        $match = $this->router->route($request, $response);

        while (!$response->isError() && !$request->isDispatched()) {
            $this->dispatcher->dispatch($match, $request, $response, $view);
        }

        $layout = new \Sorry\Mvc\View\View('layout');
        $layout->content = function() use ($view){
            return $view->render();
        };

        $response->send($layout);

        //echo $this->convert(memory_get_usage(true));
    }

    function convert($size) {
        $unit = array('b', 'kb', 'mb', 'gb', 'tb', 'pb');
        return round($size / pow(1024, ($i = floor(log($size, 1024)))), 2) . ' ' . $unit[$i];
    }

}
