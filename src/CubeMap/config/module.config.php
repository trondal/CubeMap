<?php

namespace CubeMap;

return array(
    'router' => array(
        'routes' => array(
            'application' => array(
                'type' => 'Zend\Mvc\Router\Http\Hostname',
                'options' => array(
                    'route' => 'cubemap.trondal',
                    'defaults' => array(
                        '__NAMESPACE__' => __NAMESPACE__ . '\Controller',
                    )
                ),
                'may_terminate' => false,
                'child_routes' => array(
                    'index' => array(
                        'type' => 'Literal',
                        'options' => array(
                            'route' => '/',
                            'defaults' => array(
                                'controller' => __NAMESPACE__ . '\Controller\Index',
                                'action' => 'index',
                            )
                        )
                    )
                )
            )
        )
    ),
    'controllers' => array(
        'invokables' => array(
            __NAMESPACE__ . '\Controller\Index' => __NAMESPACE__ . '\Controller\IndexController'
        ),
    ),
    'service_manager' => array(
        'factories' => array()
    ),
    'view_manager' => array(
        'doctype' => 'HTML5',
        'template_map' => array(
            'cube-map/index/index' => __DIR__ . '/../view/index.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),

);
