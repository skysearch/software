<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'Zend' . DS . 'Application.php';
class Sky_Application extends Zend_Application {

    /**
     *
     * @var Zend_Cache_Core|null
     */
    protected $_configCache;

    public function __construct($environment, $options = null, Zend_Cache_Core $configCache = null) {
        $this->_configCache = $configCache;
        parent::__construct($environment, $options);
    }

    protected function _cacheId($file) {
        return md5($file).'_application_config';
    }

    //Override
    protected function _loadConfig($file) {
        $suffix = strtolower(pathinfo($file, PATHINFO_EXTENSION));
        if ($this->_configCache === null || $suffix == 'php') { //No need for caching those
            return parent::_loadConfig($file);
        }

        $configMTime = filemtime($file);

        $cacheId = $this->_cacheId($file);
        $cacheLastMTime = $this->_configCache->test($cacheId);

        if ($cacheLastMTime !== false && $configMTime < $cacheLastMTime && $this->_environment == 'production') { //Valid cache?
            return $this->_configCache->load($cacheId, true);
        } else {
            $config = parent::_loadConfig($file);
            $this->_configCache->save($config, $cacheId, array('config'), null);

            return $config;
        }
    }

}
