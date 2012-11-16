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
            'aliases' => array(
                'atcms_zend_db_adapter' => 'Zend\Db\Adapter\Adapter',
            ),

            'factories' => array(
                'atcms_module_options' => function ($sm) {
                    $config = $sm->get('Config');
                    return new Options\ModuleOptions(isset($config['atcms']) ? $config['atcms'] : array());
                },

                'atcms_page_hydrator' => function () {
                    $hydrator = new PageHydrator();
                    return $hydrator;
                },

                'atcms_page_mapper' => function ($sm) {
                    $mapper = new Mapper\Page();
                    $mapper->setDbAdapter($sm->get('atcms_zend_db_adapter'));
                    $options = $sm->get('atcms_module_options');
                    $entityClass = $options->getPageEntityClass();
                    $mapper->setEntityPrototype(new $entityClass);
                    $mapper->setHydrator($sm->get('atcms_page_hydrator'));
                    return $mapper;
                },
            ),
        );
    }
}