<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Sky_Service_Log {

    protected $_log;
    protected $_columnMapping = array('priority' => 'priority', 
                                'message' => 'message', 
                                //'timestamp' => 'timestamp', 
                                'priorityName' => 'priorityName',
                                'uri' => 'uri',
                                'session' => 'session',
                                'ip' => 'ip',
                                'user' => 'user',
                                'pid' => 'pid',
                                'useragent' => 'useragent'
            );
    
    protected $_configs ;
    
    const SKY_SERVICE_LOG_TABLE = 'core_log';

    public function __construct() {
        $configs = Sky_Config::getConfig(true);
        $db = Sky_Service::get('db');

        $writer = new Zend_Log_Writer_Db($db->getAdapter(), self::SKY_SERVICE_LOG_TABLE, $this->_columnMapping);

        if (!($configs->skyLog->enabled)) {
            $writer = new Zend_Log_Writer_Null();
        }
        
        $logger = $this->_setEvents(new Zend_Log($writer));
        $this->_log = $logger;
        $this->_configs = $configs;
        
        return $this;
    }

    protected function _setEvents($logger){
        $request = new Zend_Controller_Request_Http();
        $uri = $request->getRequestUri();
        $ip = $request->getClientIp();
        $user_agent = new Zend_Http_UserAgent();
        
        $auth = Zend_Auth::getInstance();
        if($auth->hasIdentity()){
            $identity = $auth->getIdentity();
            $logger->setEventItem('ip', $identity['user']['name']);
        }
        
        $logger->setEventItem('uri', $uri);
        $logger->setEventItem('session', Zend_Session::getId());
        $logger->setEventItem('pid', getmypid());
        $logger->setEventItem('ip', $ip);
        $logger->setEventItem('useragent', $user_agent->getUserAgent());
        
        //$device = $user_agent->getDevice();
        //Zend_Debug::dump(serialize($device->getAllFeatures()));
        
        return $logger;
    }
    
    public function log($message, $priority, $extras = null){
        return $this->_log->log($message,$priority,$extras);
    }

}
