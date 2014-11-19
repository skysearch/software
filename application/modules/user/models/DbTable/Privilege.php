<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Default_Model_DbTable_Privilege extends Zend_Db_Table_Abstract
{
    protected $_name = 'auth_privilege';
    protected $_primary = array('privilege_id');
    protected $_dependentTables = array('Model_DbTable_Rule');
    protected $_referenceMap     = array(
        'Module' => array(
            'columns'                   => array('module_name'),
            'refTableClass'             => 'Model_DbTable_Module',
            'refColumns'                => array('name'),
        ),
        'Controller' => array(
            'columns'                   => array('controller_name'),
            'refTableClass'             => 'Model_DbTable_Resource',
            'refColumns'                => array('controller_name'),
        )
     );
}
