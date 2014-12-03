<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Default_Bootstrap extends Sky_Application_Module_Bootstrap {

    /*protected function _initPlugins() {
        $this->bootstrap('FrontController');
        $front = $this->getResource('FrontController');

        $front->registerPlugin(new Default_Plugin_Helpers(),98);
    }
    
    protected function _initView(){
        $viewRenderer = Zend_Controller_Action_HelperBroker::getStaticHelper('viewRenderer');
        if (null === $viewRenderer->view) {
            $viewRenderer->initView();
        }
        
        $viewRenderer->view->headLink()->appendStylesheet('vendor/mmenu/src/css/jquery.mmenu.all.css','all')
                ->headLink()->appendStylesheet('vendor/mmenu/layout.css','all');
        
        $viewRenderer->view->inlineScript()->appendFile('vendor/mmenu/src/js/jquery.mmenu.min.all.js','text/javascript')
                ->inlineScript()->appendFile('vendor/mmenu/layout.js','text/javascript');
        
        return $viewRenderer->view;
    }*/

}
