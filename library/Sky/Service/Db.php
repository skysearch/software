<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Sky_Service_Db {

    const SKY_SERVICE_DB_RESOURCE = 'db';
    
    protected $_db;

    public function __construct($options) {
        $configs = Sky_Config::getConfig();   
        $optionResource = (is_null($options))?self::SKY_SERVICE_DB_RESOURCE:$options;

        $this->_db = Zend_Db::factory($configs->resources->$optionResource);
        
        return $this;
    }
    
    public function getAdapter(){
        return $this->_db;
    }
    
}
