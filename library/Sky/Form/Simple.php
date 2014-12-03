<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Sky_Form_Simple extends Sky_Form {
    
    public function __construct($options = null)
    {
        $this->_initializePrefixes();
        
        $this->setElementDecorators(array(
            array('ViewHelper'),
            array('Description'),
            array('Errors')
        ));
        
        parent::__construct($options);
    }
    
}
