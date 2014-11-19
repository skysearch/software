<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Auth_Bootstrap extends Sky_Application_Module_Bootstrap {

    protected function _initPlugins() {
        /* $this->bootstrap('FrontController');
          $front = $this->getResource('FrontController');

          $front->registerPlugin(new Auth_Plugin_Acl()); */
    }

    protected function _initRewrite() {
        $front = Zend_Controller_Front::getInstance();

        $cache = Sky_Service::get('cache');
        $routes = APPLICATION_PATH . '/modules/auth/configs/routes.ini';
        
        if (file_exists($routes)) {
            if (!($router = $cache->load('auth_routes'))) {
                $router = new Zend_Controller_Router_Rewrite();
                $options = new Zend_Config_Ini($routes, APPLICATION_ENV);

                $router->addConfig($options, 'routes');
                $cache->save($router, 'auth_routes', array('config', 'router'));
            }
            $front->setRouter($router);
        }
    }

}
