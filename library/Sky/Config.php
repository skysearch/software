<?php

/**
 * @copyright	Copyright (c) 2009-2010 TIG Corporation (http://www.tig.vn)
 * @license		http://www.gnu.org/licenses/gpl-2.0.txt GNU GENERAL PUBLIC LICENSE Version 2
 * @version 	$Id: Config.php 3986 2010-07-25 16:32:46Z huuphuoc $
 * @since		2.0.0
 */
class Sky_Config {

    const FILE = 'application.ini';

    /**
     * Get application config object
     * 
     * @return Zend_Config
     */
    public static function getConfig($cached = true) {

        $file = self::FILE;
        
        if($cached){
            $key = md5($file) . '_application_config';
            $cache = Sky_Service::get('cache');
            
            if (!($config = $cache->load($key))) {
                $config = self::_loadConfigs();
                $cache->save($config, $key, array('config'));
            }
            
            return $config;
        } 
        
        return self::_loadConfigs();
    }

    protected function _loadConfigs() {
        $defaultConfig = APPLICATION_PATH . DS . 'configs' . DS . self::FILE;
        try {
            $config = new Zend_Config_Ini($defaultConfig, APPLICATION_ENV);
        } catch (Zend_Config_Exception $e) {
            return null;
        }
        
        return $config;
    }

}
