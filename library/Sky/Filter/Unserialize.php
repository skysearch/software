<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Sky_Filter_Unserialize implements Zend_Filter_Interface {

    public function filter($value,$adapter='PhpSerialize') {
        $filter = Zend_Serializer::factory($adapter);
        
        return $filter->unserialize($value);
    }

}