<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Default_Plugin_Helpers extends Zend_Controller_Plugin_Abstract {

    public function postDispatch(Zend_Controller_Request_Abstract $request) {
        $viewRenderer = Zend_Controller_Action_HelperBroker::getStaticHelper('viewRenderer');
        if (null === $viewRenderer->view) {
            $viewRenderer->initView();
        }

        $viewRenderer->view->addHelperPath(APPLICATION_PATH . DS . 'modules' . DS . 'default' . DS . 'views' . DS . 'helpers', 'Default_View_Helper');
    }

}
