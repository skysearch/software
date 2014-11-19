<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Sky_Filter_Password implements Zend_Filter_Interface {

    public function filter($value) {
        $config = Sky_Config::getConfig();

        if (!is_null($config->crypt->salt)) {
            $value .= $config->crypt->salt;
        }
        return sha1($value);
    }

}
