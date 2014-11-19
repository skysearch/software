<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Default_Model_Mapper_Role extends Sky_Model_Mapper_Abstract {
    
    protected $_dbTable = "Default_Model_DbTable_Role";

    public function find($id, Default_Model_Role $role) {
        $result = $this->getDbTable()->find($id);
        $row = $result->current();

        $role->setId($row->role_id)
                ->setName($row->name)
                ->setDescription($row->description)
                ->setStatus($row->status);
        
        return $role;
    }
    
}
