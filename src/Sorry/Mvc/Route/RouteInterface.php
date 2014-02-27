<?php

namespace Sorry\Mvc\Route;

use Sorry\Mvc\Stdlib\RequestInterface;

interface RouteInterface {

    /**
     * Create a new route
     * @return void
     */
    public static function factory($options = array());

    /**
     * @return Sorry\Mvc\Route\RouteMatch|null
     */
    public function match(RequestInterface $request);

    /**
     * Assemble the route
     */
    public function assemble(array $params = array(), array $options = array());

}
