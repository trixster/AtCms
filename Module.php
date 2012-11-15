<?php

namespace AtCms;

use AtCms\Mapper\PageHydrator;

class Module
{
    /**
     * @return array
     */
    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__ . '/autoload_classmap.php',
            ),
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    /**
     * @return mixed
     */
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    /**
     * @param $moduleManager
     */
    public function init($moduleManager)
    {
        $moduleManager->loadModule('AtAdmin');
    }

    /**
     * @return array
     */
    public function getServiceConfig()
    {
        return array(
            'factories' => array(
                'atcms_page_hydrator' => function ($sm) {
                    $hydrator = new PageHydrator();
                    return $hydrator;
                },

                'atcms_page_mapper' => function ($sm) {
                    $mapper = new Mapper\Page();
                    $mapper->setDbAdapter($sm->get('db'));
                    //$entityClass = $options->getUserEntityClass();
                    $entityClass = '\AtCms\Entity\Page';
                    $mapper->setEntityPrototype(new $entityClass);
                    $mapper->setHydrator($sm->get('atcms_page_hydrator'));
                    return $mapper;
                },
            ),
        );
    }
}