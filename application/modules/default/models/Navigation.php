<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Default_Model_Navigation {
    
    private $_navigation = array();
    
    
    
    public function getModules(){
        return $this->_navigation;
    }
    
    public function setModules(array $modules){
        $this->_navigation = $modules;
    }
    
    public function getResources($module){
        return $this->_navigation[$module];
    }
    
    public function setResources(array $resources,$module){
        $this->_navigation[$module] = $resources;
    }
    
    public function getPrivileges($resource,$module){
        return $this->_navigation[$module][$resource];
    }
    
    public function setPrivileges(array $privileges,$resource,$module){
        $this->_navigation[$module][$resource] = $privileges;
    }
    
    public function getModule($module){
        return $this->_navigation[$module];
    }
    
    public function setModule($value,$module,$ico=''){
        $this->_navigation[$module] = array('value'=>$value,'ico'=>$ico);
    }
    
    public function setResource($value,$resource,$module,$ico=''){
        $this->_navigation[$module][$resource] = array('value'=>$value,'ico'=>$ico);
    }
    
    public function getResource($resource,$module){
        return $this->_navigation[$module][$resource];
    }
    
    public function setPrivilege($value,$privilege,$resource,$module,$ico=''){
        $this->_navigation[$module][$resource][$privilege] = array('value'=>$value,'ico'=>$ico);
    }
    
    public function getPrivilege($privilege,$resource,$module){
        return $this->_navigation[$module][$resource][$privilege];
    }
    
    public function getNavigation(){
        return $this->_navigation;
    }
}

/*
 * private $_navigation = array();
    
    
    
    public function getModules(){
        return $this->_navigation;
    }
    
    public function setModules(array $modules){
        $this->_navigation = $modules;
    }
    
    public function getResources($module){
        return $this->_navigation[$module];
    }
    
    public function setResources(array $resources,$module){
        $this->_navigation[$module] = $resources;
    }
    
    public function getPrivileges($resource,$module){
        return $this->_navigation[$module][$resource];
    }
    
    public function setPrivileges(array $privileges,$resource,$module){
        $this->_navigation[$module][$resource] = $privileges;
    }
    
    
    
    public function getModule(){
        return $this->_navigation;
    }
    
    public function setModule($value,$module){
        $this->_navigation[$module] = $value;
    }
    
    public function setResource($value,$resource,$module){
        $this->_navigation[$module][$resource] = $value;
    }
    
    public function getResource($resource,$module){
        return $this->_navigation[$module][$resource];
    }
    
    public function setPrivilege($value,$privilege,$resource,$module){
        $this->_navigation[$module][$resource][$privilege] = $value;
    }
    
    public function getPrivilege($privilege,$resource,$module){
        return $this->_navigation[$module][$resource][$privilege];
    }
 */