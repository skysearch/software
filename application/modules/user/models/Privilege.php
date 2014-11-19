<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Default_Model_Privilege extends Sky_Model_Abstract {

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
            'name' => array(
                'StringToLower',
                'Word_SeparatorToSeparator'
            ),
            'description' => 'Alnum'
        ),
        'privilege_id' => 'Int',
        'order' => 'Int',
        'is_visible' => 'Boolean'
    );
    protected $_validators = array(
        'privilege_id' => array('default' => null),
        'module' => array(
            'Alnum',
            'presence' => 'required'
        ),
        'controller' => array(
            'Alnum',
            'presence' => 'required'
        ),
        'name' => array(
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
        return $this->_getData('privilege_id');
    }

    public function setId($id) {
        $this->_setData('privilege_id', $id);

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

    public function getName() {
        return $this->_getData('name');
    }

    public function setName($name) {
        $this->_setData('name', $name);

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

}
