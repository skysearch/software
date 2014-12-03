<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

abstract class Sky_Model_Abstract {

    /**
     * Variavel que conterá os dados do objeto
     * 
     * @var type ArrayObject()
     */
    private $_data = array();

    /**
     * Variavel que conterá as opções adicionais do Zend_Filter_Input
     * 
     * @var type array
     */
    protected $_filterOptions = null;

    /**
     * Variavel que conterá os filtros do Zend_Filter_Input
     * 
     * @var type array
     */
    protected $_filters = null;

    /**
     * Variavel que conterá os validadores do Zend_Filter_Input
     * 
     * @var type array
     */
    protected $_validators = null;

    /**
     * Variavel que conterá as mensagens de erro do Zend_Filter_Input
     * 
     * @var type array
     */
    private $_messages = array();

    /**
     * Variavel que indica se o filter Zend_Filter_Input
     * será utilizado ou não
     * 
     * @var type bool
     */
    protected $_filter = true;

    /**
     * Array contendo os mappers do modelo
     * @var type Sky_Model_Mapper_Abstract
     */
    protected $_mapper = array();

    public function __construct(array $options = null) {
        if (is_array($options)) {
            $this->setOptions($options);
        }
    }

    public function __set($name, $value) {
        $method = 'set' . ucfirst(strtolower($name));
        if (('mapper' == $name) || !method_exists($this, $method)) {
            throw new Exception('Invalid user property');
        }
        $this->$method($value);
    }

    public function __get($name) {
        $method = 'get' . ucfirst(strtolower($name));
        if (('mapper' == $name) || !method_exists($this, $method)) {
            throw new Exception('Invalid user property');
        }
        return $this->$method();
    }

    public function setOptions($options) {
        $methods = get_class_methods($this);
        foreach ($options as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (in_array($method, $methods)) {
                $this->$method($value);
            }
        }
        return $this;
    }

    /**
     * Retorna se o objeto é valido. 
     * O objeto será inválido se algum 
     * valor não passar pelo validador
     * 
     * @return boolean
     */
    public function isValid() {
        $validators = $this->_validators;
        $data = array_intersect_key($this->_data, $validators);
        $input = new Zend_Filter_Input(null, $validators, $data, $this->_filterOptions);

        if (!$input->isValid()) {
            $this->_messages = $input->getMessages();

            return false;
        }

        return true;
    }

    /**
     * Possibilita habilitar ou desabilitar o
     * uso de filtros e validadores
     * 
     * @param bool $value
     */
    public function isFiltered($value) {
        $this->_filter = (bool) $value;
    }

    /**
     * Retorna um array contendo as mensagens de erro 
     * do validador
     * 
     * @return array $_messages
     */
    public function getMessages() {
        return (array) $this->_messages;
    }

    /**
     * Retorna o valor do array correspondente a
     * chave indicada por $field
     * 
     * @param string $field
     * @return string $_data
     */
    protected function _getData($field) {
        $value = $this->_data[$field];

        if ((bool) $this->_filter) {
            $filters = $this->_filters;

            if (key_exists('_get', $filters)) {
                $filters = $filters['_get'];
            }

            if (key_exists($field, $filters)) {
                $filters = array($field => $filters[$field]);
                $data = array($field => $this->_data[$field]);

                $input = new Zend_Filter_Input($filters, null, $data, $this->_filterOptions);

                $value = $input->$field;
            }
        }

        return $value;
    }

    /**
     * Atribui o valor ao array utilizando como 
     * chave o valor indicado por $field
     * 
     * @param string $field
     * @return mixed $value
     */
    protected function _setData($field, $value) {
        if ((bool) $this->_filter) {
            $filters = $this->_filters;

            if (key_exists('_set', $filters)) {
                $filters = $filters['_set'];
            }

            if (key_exists($field, $filters)) {
                $filters = array($field => $filters[$field]);
                $data = array($field => $value);

                $input = new Zend_Filter_Input($filters, null, $data, $this->_filterOptions);

                $value = $input->$field;
            }
        }

        $this->_data[$field] = $value;
    }

    /**
     * Adiciona o mapper ao array de mappers
     * @param string $name
     * @param Sky_Model_Mapper_Abstract $mapper
     */
    protected function _setMapper($name, $mapper) {
        $this->_mapper[$name] = $mapper;
    }

    /**
     * Retorna mapper do guardado no array de mappers
     * @param string $name
     * @return Sky_Model_Mapper_Abstract $mapper
     */
    protected function _getMapper($name) {
        if (!key_exists($name, $this->_mapper)) {
            return null;
        }
        return $this->_mapper[$name];
    }

    public function toArray() {
        if (count($this->_mapper) > 0) {
            $data = array_merge($this->_data, $this->_mapper);

            $array = array();
            foreach ($data as $key => $value) {
                if (is_object($value)) {
                    $array[$key] = $data[$key]->toArray($value);

                    continue;
                }
                $array[$key] = $value;
            }

            return $array;
        }
        
        return $this->_data;
    }
    
    public function getData(){
        return $this->_data;
    }

}
