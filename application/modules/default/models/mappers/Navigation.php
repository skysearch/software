<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Default_Model_Mapper_Navigation {

    public function getNavigation() {

        $cache = Sky_Service::get('cache');

        if (!($navigation = $cache->load('navigation'))) {
            $modules = new Default_Model_DbTable_Module();
            $select = $modules->select(Zend_Db_Table::SELECT_WITH_FROM_PART)
                    ->setIntegrityCheck(false)
                    ->join(array('r' => new Default_Model_DbTable_Resource()), "r.module = {$modules}.name AND r.is_visible=1", array('resource' => new Zend_Db_Expr("CONCAT(r.module,':',r.controller)"), 'rDescription' => 'r.description', 'r.help','r.nav','rIco'=>'r.ico'))
                    ->join(array('p' => new Default_Model_DbTable_Privilege()), "p.module = {$modules}.name AND p.controller = r.controller AND p.is_visible=1", array('p.privilege_id', 'action' => 'p.name', 'controller' => 'p.controller', 'module' => 'p.module', 'pDescription' => 'p.description','pIco'=>'p.ico'))
                    ->where("{$modules}.status=1")
                    ->order(array('r.order ASC', 'r.description ASC'))
                    ->order(array('p.order ASC', 'p.description ASC'));

            $rows = $modules->fetchAll($select);

            $navigation = new Default_Model_Navigation();
            foreach ($rows as $row) {
                $navigation->setPrivilege(array('action' => $row['action'], 'controller' => $row['controller'], 'module' => $row['module'], 'resource' => $row['resource']), $row['pDescription'], $row['rDescription'], $row['rIco'].'|'.$row['description'], $row['pIco']);
            }

            $cache->save($navigation, 'navigation', array('navigation', 'role', 'router'));
        }

        return $navigation;
    }

}
