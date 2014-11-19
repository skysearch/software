<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Sky_Validate_Password extends Zend_Validate_Abstract {

    const PASS = 'password';

    protected $_messageTemplates = array(
        self::PASS => "'%value%' is not a password valid"
    );

    public function isValid($value) {
        $this->_setValue($value);

        if (!is_float($value)) {
            $this->_error(self::FLOAT);
            return false;
        }

        return true;
    }

}
