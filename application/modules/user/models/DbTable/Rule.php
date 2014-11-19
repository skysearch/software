<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Default_Model_DbTable_Rule extends Zend_Db_Table_Abstract
{
    protected $_name = 'auth_rule';
    protected $_primary = array('rule_id');
    protected $_referenceMap = array(
        'Privilege' => array(
            'columns' => array('privilege_id'),
            'refTableClass' => 'Model_DbTable_Privilege',
            'refColumns' => array('privilege_id')
        ),
        'Role' => array(
            'columns' => array('role_id'),
            'refTableClass' => 'Model_DbTable_Admin_Role',
            'refColumns' => array('role_id')
        )
    );
}
