<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Default_Model_DbTable_Module extends Zend_Db_Table_Abstract
{
    protected $_name = 'core_module';
    protected $_primary = array('module_id');
    protected $_dependentTables = array('Model_DbTable_Privilege','Model_DbTable_Resource');
    
    public function __toString() {
        return $this->_name;
    }
}
