<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Default_Model_DbTable_Role extends Zend_Db_Table_Abstract
{
    protected $_name = 'auth_role';
    protected $_primary = array('role_id');
    protected $_dependentTables = array('Model_DbTable_User','Model_DbTable_Rule');
}
