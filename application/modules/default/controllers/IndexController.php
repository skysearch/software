<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Default_IndexController extends Zend_Controller_Action {

    public function init() {
        
    }

    /*public function navigationAction() {
        $mapper = new Default_Model_Mapper_Navigation();
        $navigation = $mapper->getNavigation();
        $modules = $navigation->getNavigation();

        $this->view->assign('navigation', $modules);
        $this->_helper->viewRenderer->setResponseSegment('navigation');
    }*/

    public function dashboardAction() {
        $this->view->assign('title', 'Dashboard');
    }
    
    public function indexAction() {
        return $this->_forward('dashboard');
    }
}
