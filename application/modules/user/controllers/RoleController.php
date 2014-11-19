<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class User_RoleController extends Zend_Controller_Action {
    
    protected $_flashMessenger = null;
    protected $_redirector = null;

    public function init() {
        $this->_redirector = $this->_helper->getHelper('Redirector');
        $this->_flashMessenger = $this->_helper->getHelper('FlashMessenger');
        $this->initView();
    }
    
    
}