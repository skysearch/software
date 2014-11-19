<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

abstract class Sky_Application_Module_Bootstrap extends Zend_Application_Module_Bootstrap {

    public function __construct($application) {
        parent::__construct($application);
        $this->_loadModuleConfig();
        $this->_loadInitializer();
    }

    /**
     *
     * load a module specific config file
     */
    protected function _loadModuleConfig() {

        $cache = Sky_Service::get('cache');

        $cache_id = $this->getModuleName() . '_config';
        //Zend_Debug::dump($this);
        if (!($options = $cache->load($cache_id))) {
            $configFile = APPLICATION_PATH
                    . '/modules/'
                    . strtolower($this->getModuleName())
                    . '/configs/application.ini';

            if (!file_exists($configFile)) {
                return;
            }

            $config = new Zend_Config_Ini($configFile, $this->getEnvironment());
            $options = $config->toArray();
            
            $cache->save($options, $cache_id);
        }

        $this->setOptions($options);
    }
    

    public function _loadInitializer() {
        $this->getResourceLoader()->addResourceType(
                'Bootstrap_Initializer', 'bootstrap', 'Bootstrap'
        );
    }

}
