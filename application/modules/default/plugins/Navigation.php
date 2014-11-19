<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Default_Plugin_Navigation extends Zend_Controller_Plugin_Abstract
{
    protected $_stack;
 
    public function dispatchLoopStartup(
        Zend_Controller_Request_Abstract $request
    ) {
        $stack = $this->getStack();
        $navigation = new Zend_Controller_Request_Simple();
        $navigation->setControllerName('index')
                     ->setActionName('navigation')
                     ->setModuleName('default')
                     ->setParam('responseSegment', 'navigation');
        
        //$this->_helper->viewRenderer->setResponseSegment('navigation');
        
        $stack->pushStack($navigation);
    }
 
    public function getStack()
    {
        if (null === $this->_stack) {
            $front = Zend_Controller_Front::getInstance();
            if (!$front->hasPlugin('Zend_Controller_Plugin_ActionStack')) {
                $stack = new Zend_Controller_Plugin_ActionStack();
                $front->registerPlugin($stack);
            } else {
                $stack = $front->getPlugin('ActionStack');
            }
            $this->_stack = $stack;
        }
        return $this->_stack;
    }
}