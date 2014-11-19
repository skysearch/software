<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Auth_Plugin_Acl extends Zend_Controller_Plugin_Abstract
{
    public function preDispatch(Zend_Controller_Request_Abstract $request)
    {
        $front = Zend_Controller_Front::getInstance();
        
        if($request->getModuleName()=='auth'){
            return ;
        }
        
        $auth = Zend_Auth::getInstance();
        if(!$auth->hasIdentity()){
            $request->setActionName('login')
                    ->setControllerName('index')
                    ->setModuleName('auth')
                    ->setDispatched(false);
        }
        
        
    }
}
