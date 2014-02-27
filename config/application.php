<?php

return array(
    'router' => array(
        'routes' => array(
            'home' => array(
                'type' => 'Sorry\Mvc\Route\LiteralRoute',
                'options' => array(
                    'route' => '/',
                    'defaults' => array(
                        'controller' => 'CubeMap\Controller\IndexController',
                        'action' => 'index'
                    )
                )
            ),
            'index' => array(
                'type' => 'Sorry\Mvc\Route\LiteralRoute',
                'options' => array(
                    'route' => 'index/index',
                    'defaults' => array(
                        'controller' => 'CubeMap\Controller\IndexController',
                        'action' => 'index'
                    )
                )
            ),
            'test' => array(
                'type' => 'Sorry\Mvc\Route\LiteralRoute',
                'options' => array(
                    'route' => 'index/test',
                    'defaults' => array(
                        'controller' => 'CubeMap\Controller\IndexController',
                        'action' => 'test',
                    )
                )
            )
        )
    )
);
