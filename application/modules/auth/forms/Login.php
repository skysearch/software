<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Auth_Form_Login extends Twitter_Bootstrap_Form_Vertical {

    public function init() {

        $this->setAction('')
                ->setMethod('post')
                ->setAttribs(array('class'=>'form','role'=>'form'));
        
        $username = $this->createElement('email', 'username',array(
            'placeholder'   => 'Usuário',
            'prepend'       => '<i class="fa fa-user"></i>',
            'class'         => 'focused form-control'
        ));
        $username->setRequired(true)
                ->addFilter('StringToLower');

        $password = $this->createElement('password', 'password',array(
            'class'         =>'form-control',
            'prepend'       => '<i class="fa fa-lock"></i>',
            'placeholder'   => 'Senha',
            ));
        $password->addValidator('StringLength', false, array(6))
                ->setRequired(true);
        
        $hash = $this->createElement('hash', 'login-csrf')
                ->setTimeout(1200);
        
        $submit = $this->createElement('button', 'login', array(
            'label'         => 'Login',
            'type'          => 'submit',
            'buttonType'    => 'primary',
            'icon'          => '',
            'class'         => 'pull-right',        
            'escape'        => false
        ));

        $this->addElements(array($hash,$username,$password,$submit));
        
        $this->addDisplayGroup(
                array('username','password','login'), 
                'auth-form',
                array('legend'=>'Autenticação'));
    }

}
