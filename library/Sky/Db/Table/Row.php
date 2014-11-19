<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Abstract
 *
 * @author Renato David
 */
class Sky_Db_Table_Row extends Zend_Db_Table_Row_Abstract {
    
    protected function _transformColumn($columnName)
    {
        parent::getTable();
        return $nativeColumnName;
    }
    
}

