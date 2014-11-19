<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Sky_Controller_Plugin_ActiveModule extends Zend_Controller_Plugin_Abstract {

    protected $_view;
    protected $_config;

    public function preDispatch(Zend_Controller_Request_Abstract $request) {

        $moduleName = $request->getModuleName();
        $options = $this->_getActiveBootstrap($moduleName)->getOptions();
        $config = $this->_getConfigs($options, $moduleName);

        $viewRenderer = Zend_Controller_Action_HelperBroker::getStaticHelper('viewRenderer');
        if (null === $viewRenderer->view) {
            $viewRenderer->initView();
        }

        $viewRenderer->view->addHelperPath('Sky' . DS . 'View' . DS . 'Helper', 'Sky_View_Helper');
        $viewRenderer->view->baseUrl = $config['layout']['baseUrl'];

        if (key_exists('layout', $config['resources'])) {
            Zend_Layout::startMvc($config['resources']['layout']);
        }

        if (isset($config['layout_helper']['view'])) {
            $viewRenderer->view->headScript()->setAllowArbitraryAttributes(true);

            foreach ($config['layout_helper']['view'] as $heads => $head) {
                foreach ($head as $append => $files) {
                    foreach ($files as $file) {
                        $params = $this->_prepare($file);
                        $viewRenderer->view->$heads()->$append($params[0], $params[1], $params[2]);
                    }
                }
            }
        }

        $this->_config = $config;
        $this->_view = $viewRenderer->view;
    }

    public function routeShutdown(Zend_Controller_Request_Abstract $request) {

        $activeModuleName = $request->getModuleName();
        $activeBootstrap = $this->_getActiveBootstrap($activeModuleName);
        $options = $activeBootstrap->getOptions();
        
        if (key_exists($activeModuleName, $options)) {
            if (key_exists('frontController', $options[$activeModuleName])) {
                $front = Zend_Controller_Front::getInstance();
                if (key_exists('plugin', $options[$activeModuleName]['frontController'])) {
                    $plugins = $options[$activeModuleName]['frontController']['plugin'];
                    foreach ($plugins as $pluginName) {
                        $front->registerPlugin(new $pluginName());
                    }
                }
            }
        }
        
        if (!is_null($activeBootstrap)) {
            $className = ucfirst($activeModuleName) . '_Bootstrap_Initializer';
            // don't assume that every module has an initializer...
            if (class_exists($className)) {
                $intializer = new $className($activeBootstrap);
                $intializer->initialize();
            }
        }
    }

    public function postDispatch(Zend_Controller_Request_Abstract $request) {
        if(!$request->isDispatched()){
            return;
        }
        if (!is_null($this->_view->title)) {
            $this->_view->headTitle($this->_view->title)
                    ->setSeparator(' | ');
        }
        $this->_view->headTitle($this->_config['layout']['title']);
    }

    /**
     * return the default bootstrap of the app
     * @return Zend_Application_Bootstrap_Bootstrap
     */
    protected function _getBootstrap() {
        $frontController = Zend_Controller_Front::getInstance();
        $bootstrap = $frontController->getParam('bootstrap');
        return $bootstrap;
    }

    /**
     * return the bootstrap object for the active module
     * @return Sky_Application_Module_Bootstrap
     */
    public function _getActiveBootstrap($activeModuleName) {
        $moduleList = $this->_getBootstrap()->getResource('modules');

        if (isset($moduleList[$activeModuleName])) {
            return $moduleList[$activeModuleName];
        }

        return null;
    }

    protected function _prepare($params) {
        $param = explode('|', $params);

        if (count($param) == 1) {
            $param = array($param[0], null, null);
        } else if (count($param) == 2) {
            $param = array($param[0], $param[1], null);
        }

        if (isset($param[2])) {
            $options = explode('=', $param[2]);
            if (count($options) > 1) {
                $param[2] = array($options[0] => $options[1]);
            }
        }

        return $param;
    }

    protected function _getConfigs($config, $moduleName) {
        if (isset($config[$moduleName])) {
            $config_module = $config[$moduleName];

            if (isset($config_module['resources']['layout'])) {
                $directory = Zend_Controller_Front::getInstance()
                        ->getModuleDirectory();
                $path = $directory . DS . $config_module['resources']['layout']['layoutPath'];

                $config_module['resources']['layout']['layoutPath'] = $path;
            }

            return array_replace_recursive(Sky_Config::getConfig()->toArray(),$config,$config_module);
        }

        return Sky_Config::getConfig()->toArray();
    }

}
