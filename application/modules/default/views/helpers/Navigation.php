<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Default_View_Helper_Navigation extends Zend_View_Helper_Abstract {

    public function navigation() {
        $mapper = new Default_Model_Mapper_Navigation();
        $navigation = $mapper->getNavigation();
        $modules = $navigation->getNavigation();

        $nav = '<li><a href="' . $this->view->url(array('action' => 'dashboard', 'controller' => 'index', 'module' => 'default'), null, true, true) . '"><i class="fa fa-home"></i> &nbsp; Dashboard</a></li>';
        foreach ($modules as $rName => $resources) {
            $prv = '';
            foreach ($resources as $resource) {
                foreach ($resource as $pName => $privilege) {
                    $prv .= '<li><a href="' . $this->view->url(array('action' => $privilege['value']['action'], 'controller' => $privilege['value']['controller'], 'module' => $privilege['value']['module']), null, true, true) . '"><i class="'.$privilege['ico'].'"></i>  &nbsp; ' . $this->view->escape($pName) . '</a></li>';
                }
            }
            $label = explode('|', $rName);
            $nav .= '<li><span><i class="'.$this->view->escape($label[0]).'"></i> &nbsp; ' . $this->view->escape($label[1]) . '</span><div><ul>' . $prv . '</ul></div></li>';
        }
        
        return '<nav id="menu"><ul>' . $nav . '</ul></nav>';
    }

}
