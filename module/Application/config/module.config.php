<?php

namespace Application;

return array(
    'router' => array(
        'routes' => array(
            'home' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Index',
                        'action'     => 'index',
                    ),
                ),
            ),
            'rest' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/rest',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Rest',
                        'action'     => 'index',
                    ),
                ),
            ),
            'posts.create' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/posts-create',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Posts',
                        'action'     => 'create',
                    ),
                ),
            ),
            'posts.show' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route'    => '/posts/:id',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Posts',
                        'action'     => 'show',
                    ),
                ),
            ),
            'example.index' => array(
                'type' => 'Zend\Mvc\Router\Http\Hostname',
                'options' => array(
                    'route'    => 'example.com',
                    'defaults' => array(
                        'controller' => 'Application\Controller\ExampleDomain',
                        'action'     => 'index',
                    ),
                ),
            ),
            'example.subdomain' => array(
                'type' => 'Zend\Mvc\Router\Http\Hostname',
                'options' => array(
                    'route'    => ':subdomain.example.com',
                    'defaults' => array(
                        'controller' => 'Application\Controller\ExampleDomain',
                        'action'     => 'subdomain',
                    ),
                ),
            ),
            'child.route' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/posts-create',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Posts',
                        'action'     => 'create',
                    ),
                ),
                'may_terminate' => false,
                'child_routes' => array(
                    'posts.create.example2' =>  array(
                        'type' => 'Zend\Mvc\Router\Http\Hostname',
                        'options' => array(
                            'route'    => 'example2.com',
                            'defaults' => array(
                                'controller' => 'Application\Controller\ExampleDomain',
                                'action'     => 'createPost',
                            ),
                        ),
                    ),
                ),
            ),

            'form.index' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/form',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Form',
                        'action'     => 'index',
                    ),
                ),
            ),
            'form.post' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/form/post',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Form',
                        'action'     => 'post',
                    ),
                ),
            ),
            'doctrine.index' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/doctrine/',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Doctrine',
                        'action'     => 'index',
                    ),
                ),
            ),
            'doctrine.create-user' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/doctrine/create-user',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Doctrine',
                        'action'     => 'createUser',
                    ),
                ),
            ),
        ),
    ),
    'service_manager' => array(
        'abstract_factories' => array(
        ),
        'aliases' => array(
            'translator' => 'MvcTranslator',
        ),
    ),
    'translator' => array(
        'locale' => 'en_US',
        'translation_file_patterns' => array(
            array(
                'type'     => 'gettext',
                'base_dir' => __DIR__ . '/../language',
                'pattern'  => '%s.mo',
            ),
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'Application\Controller\Index' => 'Application\Controller\IndexController',
            'Application\Controller\Rest' => 'Application\Controller\RestController',
            'Application\Controller\Posts' => 'Application\Controller\PostsController',
            'Application\Controller\Form' => 'Application\Controller\FormController',
            'Application\Controller\ExampleDomain' => 'Application\Controller\ExampleDomainController',
            'Application\Controller\Doctrine' => 'Application\Controller\DoctrineController',
        ),
    ),
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => array(
            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
            'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
        'strategies' => array(
            'ViewJsonStrategy',
        ),
    ),
    // Placeholder for console routes
    'console' => array(
        'router' => array(
            'routes' => array(
            ),
        ),
    ),

    'doctrine' => array(
        'driver' => array(
            __NAMESPACE__ . '_driver' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(__DIR__ . '/../src/' . __NAMESPACE__ . '/Entity')
            ),
            'orm_default' => array(
                'drivers' => array(
                    __NAMESPACE__ . '\Entity' => __NAMESPACE__ . '_driver'
                )
            )
        )
    ),
);
