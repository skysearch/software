<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Auth_IndexController extends Zend_Controller_Action {

    protected $_flashMessenger = null;
    protected $_redirector = null;

    public function init() {
        $this->_redirector = $this->_helper->getHelper('Redirector');
        $this->_flashMessenger = $this->_helper->getHelper('FlashMessenger');
        $this->initView();
    }

    public function loginAction() {
        $form = new Auth_Form_Login();
        
        $this->view->assign('form', $form);
        if ($this->getRequest()->isPost()) {
            $post = $this->getRequest()->getPost();
            $user = new Auth_Model_User($post);
            
            if ($form->isValid($post)) {
                $auth = Zend_Auth::getInstance();
                $adapter = new Auth_Service_Adapter($user->getUsername(), $user->getPassword());
                $result = $auth->authenticate($adapter);
                
                if(!($result->isValid())){
                    $this->_flashMessenger->addMessage(implode("\n",$result->getMessages()),'warning');
                    $this->_redirector->gotoSimple('login','index','auth');
                }
                
                $this->_flashMessenger->addMessage('Usuário logado com sucesso.','success');
                $this->_redirector->gotoSimple('dashboard','index','default');
                
            } else {
                $form->populate($post);
            }
        }
        $this->view->assign('title', 'Autenticação');
        $this->view->assign('messages', $this->_flashMessenger->getMessages());
    }
    
    public function logoutAction() {
        $auth = Zend_Auth::getInstance();
        if($auth->hasIdentity()) {
            $auth->clearIdentity();
            $this->_flashMessenger->addMessage('Usuário deslogado com sucesso.','info');
        }
        return $this->_redirector->gotoSimple('login','index','auth');
    }

}
