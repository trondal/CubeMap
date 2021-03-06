<?php

namespace Sorry\Mvc\Controller;

use Sorry\Mvc\Route\RouteMatch;
use Sorry\Mvc\Stdlib\RequestInterface;
use Sorry\Mvc\Stdlib\ResponseInterface;
use Sorry\Mvc\View\ViewInterface;

interface DispatcherInterface {

    public function dispatch(RouteMatch $match, RequestInterface $request, ResponseInterface $response, ViewInterface $view);

}
