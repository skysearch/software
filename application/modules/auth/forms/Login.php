<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Auth_Form_Login extends Sky_Form_Simple {

    public function init() {

        $this->setMethod('post')
                ->setAttrib('class', 'form')
                ->setAttrib('id','fom-user-login')
                ->setName('formUserLogin');

        $username = $this->createElement('email', 'username', array(
                    'placeholder' => '',
                    'label' => 'Usuário',
                    'required' => true))
                ->addFilter('StringToLower');

        $password = $this->createElement('password', 'password', array(
                    'placeholder' => '',
                    'label' => 'Senha',
                    'required' => true))
                ->addValidator('StringLength', false, array(6));

        $hash = $this->createElement('hash', 'logincsrf', array(
                    'timeout' => 1200,
                    'required' => true));

        $submit = $this->createElement('button', 'submit', array(
            'label' => 'Entrar',
            'type' => 'submit',
            'ignore' => true,
            'class' => 'small expand'
        ));

        $this->addElements(array($hash, $username, $password, $submit));

        $this->addDisplayGroup(
                array('username', 'password', 'login'), 'auth-form', array('legend' => 'Autenticação'));
        
        $this->setDecorators(array(
            array('ViewScript', array(
                    'viewScript' => 'forms/login.phtml',
                    'viewModule' => 'auth'
                ))
        ));
        
    }

}
