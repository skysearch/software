<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Auth_Model_DbTable_User extends Sky_Db_Table_Abstract
{
    protected $_name = 'auth_user';
    protected $_primary = array('user_id');
    protected $_referenceMap     = array(
        'Session' => array(
            'columns'                   => array('session_id'),
            'refTableClass'             => 'Auth_Model_DbTable_Session',
            'refColumns'                => array('session_id'),
            //Zend_Db_Table::ON_DELETE    => Zend_Db_Table::SET_NULL,
            //Zend_Db_Table::ON_UPDATE    => Zend_Db_Table::CASCADE
        ),
        'Role' => array(
            'columns'                   => array('role_id'),
            'refTableClass'             => 'Auth_Model_DbTable_Role',
            'refColumns'                => array('role_id'),
        )
     );
    
}
