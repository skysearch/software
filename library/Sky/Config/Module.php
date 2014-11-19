<?php

class Sky_Config_Module {

    const KEY = 'options_module';


    /**
     * Get application config object
     * 
     * @return Zend_Config
     */
    public static function getFile($module, $controller = null) {
        $key = self::KEY;
        $config = 'config.ini';

        if(!is_null($controller)) {
            $key = $key . '_controller_' . $controller;
            $config = strtolower($controller) . '.ini';
        }
        
        if (!Zend_Registry::isRegistered($key)) {
            $file = APPLICATION_PATH . DS . 'modules' . DS . $module . DS . 'configs' . DS . $config;

            if (!file_exists($file)) {
                return null;
            }
            
            $config = new Zend_Config_Ini($file);
            
            Zend_Registry::set($key, $config);
        }
        return Zend_Registry::get($key);
    }
    
    
    /**
     * Get table module config 
     * 
     * @return $config array
     */
    public static function getTable($module) {
        $key = self::KEY . '_' . ucfirst($module) . '_table';
        
        if (!Zend_Registry::isRegistered($key)) {
                $class = Sky_Model_Factory::getInstance()->setModule('admin')->getConfig();
                $configs = $class->getConfigByModule($module);
                
                foreach ($configs as $row) {
                    $config[$row['param']] = $row['value'];
                }
                
            Zend_Registry::set($key, $config);
        }
        
        return Zend_Registry::get($key);
    }

}
