<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Sky_View_Helper_Messages extends Zend_View_Helper_Abstract {

    public function messages() {
        $messages = Zend_Controller_Action_HelperBroker::getStaticHelper('FlashMessenger');
        
        if($messages->count() > 0) {
            return $messages->getHtmlMessages();
        }
    }

}
