<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Default_Model_Mapper_User extends Sky_Model_Mapper_Abstract {

    protected $_dbTable = "Default_Model_DbTable_User";

    public function find($id, Default_Model_User $user) {
        $result = $this->getDbTable()->find($id);
        if (is_null($result)) {
            return null;
        }
        $row = $result->current();
        $user->setId($row->user_id)
                ->setRole($row->role_id)
                ->setEmail($row->email)
                ->setUsername($row->username)
                ->setPassword($row->password)
                ->setProtected($row->protected)
                ->setStatus($row->status)
                ->setUserAgent($row->useragent);
        
        return $user;
    }

}
