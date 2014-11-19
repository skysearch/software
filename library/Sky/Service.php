<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Sky_Service {

    private static $_services;

    // O método singleton 
    public static function get($service,$options=null) {
        if (!(isset(self::$_services[$service]))) {
            $c = __CLASS__ ."_".ucfirst($service);
            self::$_services[$service] = new $c($options);
        }

        return self::$_services[$service];
    }
    
    public static function has($service){
        return (isset(self::$_services[$service]));
    }

    // Previne que o usuário clone a instância
    public function __clone() {
        trigger_error('Clone is not allowed.', E_USER_ERROR);
    }

}
