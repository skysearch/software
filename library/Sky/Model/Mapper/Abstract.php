<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
abstract class Sky_Model_Mapper_Abstract {
    
    protected $_dbTable;
    protected $_data;

    public function __construct() {
        
    }

    public function setDbTable($dbTable) {
        if (is_string($dbTable)) {
            $dbTable = new $dbTable();
        }
        if (!$dbTable instanceof Zend_Db_Table_Abstract) {
            throw new Exception('Invalid table data user provided');
        }
        $this->_dbTable = $dbTable;
        
        return $this;
    }

    public function getDbTable() {
        if (is_string($this->_dbTable)) {
            $table = $this->_dbTable;
            $dbTable = new $table();
            
            $this->_dbTable = $dbTable;
        }
        if (null === $this->_dbTable) {
            throw new Exception('Invalid table data user provided');
        }
        
        return $this->_dbTable;
    }
    
}
