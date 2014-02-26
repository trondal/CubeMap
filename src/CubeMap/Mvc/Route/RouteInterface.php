<?php

namespace CubeMap\Mvc\Route;

use CubeMap\Mvc\RequestInterface;

interface RouteInterface {

    public function matches(RequestInterface $request);

    public function getController();

    public function getMethod();
}
