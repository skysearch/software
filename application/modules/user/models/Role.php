<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Default_Model_Role extends Sky_Model_Abstract {

    protected $_filters = array(
        '_set' => array('*' => 'StringTrim',
            'name' => array(
                'StringToLower',
                'Word_SeparatorToSeparator'
            ),
            'description' => 'Alnum',
            'parent' => array(
                'Alnum',
                'StringToLower',
                'parent' => 'Alpha'
            )
        ),
        'role_id' => 'Int',
        'protected' => 'Boolean',
        'status' => 'Boolean',
    );
    protected $_validators = array(
        'role_id' => array('default' => null),
        'name' => array(
            'Alnum',
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
        ),
        'parent' => array(
            'Alnum'
        ),
    );

    public function getId() {
        return $this->_getData('role_id');
    }

    public function setId($id) {
        $this->_setData('role_id', $id);

        return $this;
    }

    public function getName() {
        return $this->_getData('name');
    }

    public function setName($name) {
        $this->_setData('name', $name);

        return $this;
    }

    public function getDescription() {
        return $this->_getData('description');
    }

    public function setDescription($description) {
        $this->_setData('description', $description);

        return $this;
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

    public function setParent(Default_Model_Role $role) {
        $this->_setMapper('parent', $role);

        return $this;
    }

    public function getParent() {
        if (is_null($this->_getMapper('parent'))) {
            $class = __CLASS__;
            $role = new $class();
            $this->_setMapper('parent', $role);
        }

        return $this->_getMapper('parent');
    }

    public function getData() {
        return parent::_getData();
    }

}
