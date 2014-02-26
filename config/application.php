<?php

return array(
    'router' => array(
        'route' => array(
            'home' => array(
              'path' => '',
              'controller' => 'CubeMap\Controller\IndexController',
              'action' => 'index'
            ),
            'index' => array(
                'path' => 'index/index',
                'controller' => 'CubeMap\Controller\IndexController',
                'action' => 'index'
            ),
            'test' => array(
                'path' => 'index/test',
                'controller' => 'CubeMap\Controller\IndexController',
                'action' => 'test'
            )
        )
    )
);
