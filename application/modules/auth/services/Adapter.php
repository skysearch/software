<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Auth_Service_Adapter implements Zend_Auth_Adapter_Interface {

    private $_username;
    private $_password;

    public function __construct($username, $password) {
        $this->_username = $username;
        $this->_password = $password;
    }

    /**
     * Performs an authentication attempt
     *
     * @throws Zend_Auth_Adapter_Exception If authentication cannot be performed
     * @return Zend_Auth_Result
     */
    public function authenticate() {
        $user = new Auth_Model_User();
        $user->setUsername($this->_username);

        $mapper = new Auth_Model_Mapper_User();
        $auth = $mapper->authenticate($user);

        $data = $auth->toArray();
        $message = array('Usuário autenticado com sucesso.');
        $result = Zend_Auth_Result::SUCCESS;

        if (!$auth->assertPassword($this->_password)) {
            $message = array('Usuário ou senha inválida.');
            $result = Zend_Auth_Result::FAILURE_CREDENTIAL_INVALID;
        }
        if ($auth->getStatus() === false) {
            $message = array('Usuário inativo.');
            $result = Zend_Auth_Result::FAILURE;
        }
        if ($auth->getRole()->getStatus() === false) {
            $message = array('Nivel de usuário inativo.');
            $result = Zend_Auth_Result::FAILURE;
        }
        
        if($result==1){
            $cliente = new Zend_Http_UserAgent();
            $brouser = $cliente->getUserAgent();
            $user->setSession(session_id());
            $user->setUserAgent($brouser);
            $mapper->save($user);
        }
        
        return new Zend_Auth_Result($result, $data, $message);
    }

}
