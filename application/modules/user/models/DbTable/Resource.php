<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Default_Model_DbTable_Resource extends Zend_Db_Table_Abstract
{
    protected $_name = 'auth_resource';
    protected $_primary = array('resource_id');
    protected $_referenceMap     = array(
        'Module' => array(
            'columns'                   => array('module'),
            'refTableClass'             => 'Model_DbTable_Module',
            'refColumns'                => array('name'),
        )
     );
}
