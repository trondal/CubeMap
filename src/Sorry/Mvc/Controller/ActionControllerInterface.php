<?php

namespace Sorry\Mvc\Controller;

use Sorry\Mvc\Route\RouteMatch;
use Sorry\Mvc\Stdlib\RequestInterface;
use Sorry\Mvc\Stdlib\ResponseInterface;
use Sorry\Mvc\View\ViewInterface;

interface ActionControllerInterface {

    public function execute(RouteMatch $route, RequestInterface $request, ResponseInterface $response, ViewInterface $view);

}
