<?php

return array(
    'router' => array(
        'routes' => array(
            'cms' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route'    => '/pages/:id',
                    'defaults' => array(
                        'controller' => 'AtCms\Controller\Index',
                        'action'     => 'index',
                    ),
                ),
            ),
            'zfcadmin' => array(
                'child_routes' => array(
                    'cms' => array(
                        'type' => 'Literal',
                        'options' => array(
                            'route' => '/cms',
                            'defaults' => array(
                                'controller' => 'AtCms\Controller\Admin\Index',
                                'action'     => 'index',
                            ),
                        ),
                        'may_terminate' => true,
                        'child_routes' => array(
                            'pages' => array(
                                'type' => 'Segment',
                                'options' => array(
                                    'route' => '/pages[/:action][/:id]',
                                    'defaults' => array(
                                        'controller' => 'AtCms\Controller\Admin\Page',
                                        'action'     => 'index',
                                    ),
                                ),
                                'may_terminate' => true,
                                'child_routes' => array(
                                    'filters' => array(
                                        'type' => 'Query',
                                        'options' => array(
                                            'defaults' => array(
                                                'page' => 1,
                                                'show_items'  => 20,
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                            'blocks' => array(
                                'type' => 'Segment',
                                'options' => array(
                                    'route' => '/blocks[/:action]',
                                    'defaults' => array(
                                        'controller' => 'AtCms\Controller\Admin\Block',
                                        'action'     => 'index',
                                    ),
                                ),
                                'may_terminate' => true,
                                'child_routes' => array(
                                    'filters' => array(
                                        'type' => 'Query',
                                        'options' => array(
                                            'defaults' => array(
                                                'page' => 1,
                                                'show_items'  => 20,
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),

    'controllers' => array(
        'invokables' => array(
            'AtCms\Controller\Index' => 'AtCms\Controller\IndexController',
            'AtCms\Controller\Admin\Index' => 'AtCms\Controller\Admin_IndexController',
            'AtCms\Controller\Admin\Page' => 'AtCms\Controller\Admin_PageController',
            'AtCms\Controller\Admin\Block' => 'AtCms\Controller\Admin_BlockController'
        )
    ),

    'navigation' => array(
        'admin' => array(
            'cms' => array(
                'label' => 'CMS',
                'route' => 'zfcadmin/cms',
                'pages' => array(
                    'pages-list' => array(
                        'label' => 'Manage Pages',
                        'route' => 'zfcadmin/cms/pages',
                        'params' => array('action' => 'list'),
                    ),
                    'blocks-list' => array(
                        'label' => 'Manage Blocks',
                        'route' => 'zfcadmin/cms/blocks',
                        'params' => array('action' => 'list'),
                    ),
                ),
            ),
        ),
    ),

    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
);