<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    protected function _initAutoLoad()
    {
        $autoloader = new Zend_Application_Module_Autoloader(array(
                    'namespace' => 'Application',
                    'basePath' => APPLICATION_PATH
        ));

        $autoloader = Zend_Loader_Autoloader::getInstance();
        $autoloader->setFallbackAutoloader(true);
        return $autoloader;
    }

    protected function _initConfig()
    {
        $config = new Zend_Config_Ini(APPLICATION_PATH.'/configs/application.ini', APPLICATION_ENV );
        Zend_Registry::getInstance()->set( 'config', $config );
    }
}