<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Default_Model_Resource extends Sky_Model_Abstract {

    protected $_filters = array(
        '_set' => array('*' => 'StringTrim',
            'module' => array(
                'StringToLower',
                'Word_SeparatorToSeparator'
            ),
            'controller' => array(
                'StringToLower',
                'Word_SeparatorToSeparator'
            ),
            'description' => 'Alnum',
            'nav' => 'Alnum'
        ),
        'resource_id' => 'Int',
        'order' => 'Int',
        'is_visible' => 'Boolean'
    );
    protected $_validators = array(
        'resource_id' => array('default' => null),
        'module' => array(
            'Alnum',
            'presence' => 'required'
        ),
        'controller' => array(
            'Alnum',
            'presence' => 'required'
        ),
        'is_visible' => array(
            'default' => true,
            'allowEmpty' => true,
            'presence' => 'required'
        )
    );

    public function getId() {
        return $this->_getData('resource_id');
    }

    public function setId($id) {
        $this->_setData('resource_id', $id);

        return $this;
    }

    public function getModule() {
        return $this->_getData('module');
    }

    public function setModule($module) {
        $this->_setData('module', $module);

        return $this;
    }

    public function getController() {
        return $this->_getData('controller');
    }

    public function setController($controller) {
        $this->_setData('controller', $controller);

        return $this;
    }

    public function getDescription() {
        return $this->_getData('description');
    }

    public function setDescription($description) {
        $this->_setData('description', $description);

        return $this;
    }

    public function getNav() {
        return $this->_getData('nav');
    }

    public function setNav($nav) {
        $this->_setData('nav', $nav);

        return $this;
    }

    public function getOrder() {
        return $this->_getData('order');
    }

    public function setOrder($order) {
        $this->_setData('order', $order);

        return $this;
    }

    public function getIsVisible() {
        return $this->_getData('is_visible');
    }

    public function setIsVisible($is_visible) {
        $this->_setData('is_visible', $is_visible);

        return $this;
    }
    
    public function setPrivileges(ArrayObject $privileges) {
        $this->_setMapper('privileges', $privileges);

        return $this;
    }

    public function getPrivilege() {
        if (is_null($this->_getMapper('privileges'))) {
            $privileges = new ArrayObject();
            $this->_setMapper('privileges', $privileges);
        }

        return $this->_getMapper('privileges');
    }

}
