<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Log_Bootstrap extends Sky_Application_Module_Bootstrap {

    protected function _initRewrite() {
        $front = Zend_Controller_Front::getInstance();

        $cache = Sky_Service::get('cache');
        $routes = APPLICATION_PATH . '/modules/log/configs/routes.ini';
        
        if (file_exists($routes)) {
            if (!($router = $cache->load('log_routes'))) {
                $router = new Zend_Controller_Router_Rewrite();
                $options = new Zend_Config_Ini($routes, APPLICATION_ENV);

                $router->addConfig($options, 'routes');
                $cache->save($router, 'log_routes', array('config', 'router'));
            }
            $front->setRouter($router);
        }
    }
    
}
