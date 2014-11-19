<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Auth_Model_DbTable_Role extends Zend_Db_Table_Abstract
{
    protected $_name = 'auth_role';
    protected $_primary = array('role_id');
    protected $_dependentTables = array('Auth_Model_DbTable_User','Auth_Model_DbTable_Rule');
}
