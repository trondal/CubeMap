<?php

return array(
    'router' => array(
        'routes' => array(
            'home' => array(
                'type' => 'CubeMap\Mvc\Route\SimpleRoute',
                'options' => array(
                    'path' => 'foo',
                    'controller' => 'CubeMap\Controller\IndexController',
                    'action' => 'index'
                )
            ),
            'index' => array(
                'type' => 'CubeMap\Mvc\Route\SimpleRoute',
                'options' => array(
                    'path' => 'index/index',
                    'controller' => 'CubeMap\Controller\IndexController',
                    'action' => 'index'
                )
            ),
            'test' => array(
                'type' => 'CubeMap\Mvc\Route\SimpleRoute',
                'options' => array(
                    'path' => 'index/test',
                    'controller' => 'CubeMap\Controller\IndexController',
                    'action' => 'test'
                )
            )
        )
    )
);
