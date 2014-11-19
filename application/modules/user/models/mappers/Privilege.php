<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Default_Model_Mapper_Privilege extends Sky_Model_Mapper_Abstract {

    protected $_dbTable = "Default_Model_DbTable_Privilege";

    public function find($id, Default_Model_Privilege $privilege) {
        $result = $this->getDbTable()->find($id);

        if (is_null($result)) {
            return null;
        }

        $row = $result->current();
        $privilege->setId($row->resource_id)
                ->setModule($row->module)
                ->setController($row->controller)
                ->setName($row->controller)
                ->setDescription($row->description)
                ->setOrder($row->order)
                ->setIsVisible($row->is_visible);
        
        return $privilege;
    }
    
    public function fetchAll($limit=null,$offset=null,$order=array('order ASC ','description ASC')){
        $result = $this->getDbTable()->fetchAll('status=1',$order,$limit,$offset);
        
        if (is_null($result)) {
            return null;
        }

        $data = new ArrayObject();
        
        foreach ($result as $row){
            $privilege = new Default_Model_Privilege();
            $privilege->setId($row->resource_id)
                ->setModule($row->module)
                ->setController($row->controller)
                ->setName($row->controller)
                ->setDescription($row->description)
                ->setOrder($row->order)
                ->setIsVisible($row->is_visible);
            
            $data[] = $privilege;
        }
        
        return $data;
    }
    
}
