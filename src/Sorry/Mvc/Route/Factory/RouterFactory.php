<?php

namespace Sorry\Mvc\Route\Factory;

class RouterFactory /*implements FactoryInterface*/ {

    public function createService(/*ServiceLocatorInterface $locator*/) {
        //$config = $locator->get('Configuration');
        $config = include '../../../../../config/application.php';
        $router = new \Sorry\Mvc\Route\FiFoRouter(array());
        foreach ($config['router']['routes'] as $name => $options) {
            $route = new $options['type'](
                    $options['options']['route'],
                    $options['options']['defaults']
            );
            $router->addRoute($name, $route);
        }
        return $router;
    }

}