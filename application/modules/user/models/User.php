<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Default_Model_User extends Sky_Model_Abstract {

    protected $_filterOptions = array(
        'filterNamespace' => 'Sky_Filter',
        'validatorNamespace' => 'Sky_Validate'
    );
    
    protected $_filters = array(
        '_set' => array(
            '*' => 'StringTrim',
            'email' => 'StringToLower',
            'username' => array(
                'StringToLower'
            ),
        ),
        '_get' => array(
            'password' => 'Password'
        ),
        'user_id' => 'Int',
        'protected' => 'Boolean',
        'status' => 'Boolean',
        'session' => 'Alnum',
        'role' => 'Int',
    );
    
    protected $_validators = array(
        'user_id' => array('default' => null),
        'username' => array(
            'presence' => 'required'
        ),
        'email' => array(
            'EmailAddress',
            'presence' => 'required'
        ),
        'protected' => array(
            'default' => true,
            'allowEmpty' => true,
            'presence' => 'required'
        ),
        'status' => array(
            'default' => true,
            'allowEmpty' => true,
            'presence' => 'required'
        )
    );

    public function getId() {
        return $this->_getData('user_id');
    }

    public function setId($id) {
        $this->_setData('user_id', $id);

        return $this;
    }

    public function getUsername() {
        return $this->_getData('username');
    }

    public function setUsername($username) {
        $this->_setData('username', $username);

        return $this;
    }

    public function getPassword() {
        return $this->_getData('password');
    }

    public function setPassword($password) {
        $this->_setData('password', $password);

        return $this;
    }

    public function setEmail($email) {
        $this->_setData('email', $email);

        return $this;
    }

    public function getEmail() {
        return $this->_getData('email');
    }

    public function getProtected() {
        return $this->_getData('protected');
    }

    public function setProtected($protected) {
        $this->_setData('protected', $protected);

        return $this;
    }

    public function getStatus() {
        return $this->_getData('status');
    }

    public function setStatus($status) {
        $this->_setData('status', $status);

        return $this;
    }

    public function getSession() {
        return $this->_getData('session');
    }

    public function setSession($session) {
        $this->_setData('session', $session);

        return $this;
    }

    public function setUserAgent($useragent) {
        if (is_array($useragent)) {
            $useragent = serialize($useragent);
        }
        $this->_setData('useragent', $useragent);

        return $this;
    }

    public function getUserAgent() {
        return $this->_getData('useragent');
    }

    public function setRole(Auth_Model_Role $role) {
        $this->_setMapper('role', $role);

        return $this;
    }

    public function getRole() {
        if (is_null($this->_getMapper('role'))) {
            $role = new Auth_Model_Role();
            $this->_setMapper('role', $role);
        }

        return $this->_getMapper('role');
    }

    public function assertPassword($value) {
        if (empty($value)) {
            return false;
        }

        $password = $this->_getData('password');
        $input = new Zend_Filter_Input(array('confirm' => 'Password'), null, array('confirm' => $value));
        $input->setOptions($this->_filterOptions);

        return ($password === $input->confirm);
    }

}
