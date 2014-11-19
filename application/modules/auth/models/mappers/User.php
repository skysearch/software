<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Auth_Model_Mapper_User extends Sky_Model_Mapper_Abstract {

    protected $_dbTable = "Auth_Model_DbTable_User";

    public function save(Auth_Model_User $user) {
        $data = $user->toArray();
        $role = $user->getRole();
        $id = $user->getId();
        
        if (!is_null($role->getId())) {
            $data['role_id'] = $role->getId();
        }

        if (is_null($id)) {
            $id = $this->getDbTable()->insert($data);
        } else {
            $this->getDbTable()->update($data, array('user_id = ?' => $id));
        }

        return $user;
    }

    public function authenticate(Auth_Model_User $user, $field = 'username') {
        $table = $this->getDbTable();
        $select = $table->select()
                ->where("{$field} = (?)", $user->$field)
                ->where('status=1')
                ->limit(1);

        $row = $table->fetchRow($select);
        if (is_null($row)) {
            $user->setStatus(0);

            return $user;
        }
        
        $user->setId($row->user_id);
        $user->setUsername($row->username);
        $user->setPassword($row->password);
        $user->setEmail($row->email);
        $user->setStatus($row->status);
        
        $role_user = $row->findParentRow('Auth_Model_DbTable_Role');

        if (!is_null($role_user)) {
            $role = new Auth_Model_Role();
            $role->setId($role_user['role_id']);
            $role->setName($role_user['name']);
            $role->setDescription($role_user['description']);
            $role->setStatus($role_user['status']);

            $user->setRole($role);
        }

        return $user;
    }

}
