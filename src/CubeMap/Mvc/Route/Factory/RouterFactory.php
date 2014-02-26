<?php

namespace CubeMap\Mvc\Route\Factory;

class RouterFactory /*implements FactoryInterface*/ {

    public function createService(/*ServiceLocatorInterface $locator*/) {
        //$config = $locator->get('Configuration');
        $config = include '../../../../../config/application.php';
        $routes = array();
        foreach ($config['router']['routes'] as $routerOptions) {

            $params = array_values($routerOptions['options']);
            $reflect = new \ReflectionClass($routerOptions['type']);
            $routes[] = $reflect->newInstanceArgs($params);
        }
        return new \CubeMap\Mvc\Route\FiFoRouter($routes);
    }

}