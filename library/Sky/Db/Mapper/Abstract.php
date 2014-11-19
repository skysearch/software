<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

abstract class Sky_Db_Mapper_Abstract {
     
    public function __toString() {
        return __CLASS__;
    }

    static public function getHelper($helper) {
        $helper_name = self::_normalize($helper);
        $helper_class = "Sky_Db_Mapper_Helper_{$helper_name}";
        
        return new $helper_class;
    }

    protected function _normalize($name){
        $class_name = ucfirst(strtolower($name));
        
        return $class_name;
    }
    
}