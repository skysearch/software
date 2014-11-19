<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Sky_Service_Cache {
    
    const SKY_SERVICE_CACHE_RESOURCE = 'default';
    
    protected $_cache;
    protected $_configs;

    public function __construct($options) {
        $configs = Sky_Config::getConfig(false);
        $optionResource = (is_null($options))?self::SKY_SERVICE_CACHE_RESOURCE:$options;
        
        $manager = new Zend_Cache_Manager;
        $manager->setCacheTemplate($options, $configs->resources->cachemanager->$optionResource);
                
        $this->_cache = $manager->getCache($options);
        $this->_configs = $configs;
        return $this;
    }

    public function start($id=null){
        if($this->isEnabled()){
            return $this->_cache->start($id);
        }
        
        return false;
    }
    
    public function save($data, $id, $tags = array(), $specificLifetime = false, $priority = 8){
        if($this->isEnabled()){
            return $this->_cache->save($data,$id,$tags,$specificLifetime,$priority);
        }
        
        return false;
    }

    public function load($id, $doNotTestCacheValidity = false, $doNotUnserialize = false){
        if($this->isEnabled()){
            return $this->_cache->load($id,$doNotTestCacheValidity,$doNotUnserialize);
        }
        
        return false;
    }
    
    public function has($name){
        return Zend_Cache_Manager::hasCache($name);
    }
    
    public function getObject(){
        return $this->_cache;
    }
    
    public function isEnabled(){
        $configs = $this->_configs;
        if(!($configs->skyCache->enabled)){
            return false;
        }
        
        return true;
    }
    
    public function test($id){
        return $this->_cache->test($id);
    }
}