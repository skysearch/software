<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Application_Plugin_Init extends Zend_Controller_Plugin_Abstract {
    
    #5
    public function postDispatch(Zend_Controller_Request_Abstract $request) {
        
    }
    
    #4
    public function preDispatch(Zend_Controller_Request_Abstract $request) {
       
    }
    
    #3
    public function dispatchLoopStartup(Zend_Controller_Request_Abstract $request) {
        
    }
    
    #1
    public function routeStartup(Zend_Controller_Request_Abstract $request) {
        
    }
    
    #2
    public function routeShutdown(Zend_Controller_Request_Abstract $request) {
        $path = LIBRARY_PATH . DS . 'Sky' . DS . 'Controller' . DS . 'Action' . DS . 'Helper';
        Zend_Controller_Action_HelperBroker::addPath($path, 'Sky_Controller_Action_Helper');
    }
}
