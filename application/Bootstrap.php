<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap {
    /* protected function _initConfiguration() {
      $options = $this->getOptions();
      if (isset($options['phpsettings'])) {
      foreach ($options['phpsettings'] as $setting => $value) {
      //var_dump(extension_loaded($setting));
      ini_set($setting, $value);
      }
      }
      } */

    /**
     * Setup include file cache to increase performance
     *
     * @return void
     * @author Shane O’Grady
     * @link http://framework.zend.com/manual/en/zend.loader.pluginloader.html#zend.loader.pluginloader.performance.example
     */
    protected function _initFileIncludeCache() {
        $options = $this->getOption('pluginLoaderCache');
        if ($options['enabled']) {

            $router = new Zend_Controller_Router_Rewrite();
            $request = new Zend_Controller_Request_Http();
            $router->route($request);

            $classFileIncCache = DATA_PATH . DS . 'cache' . DS . APPLICATION_ENV . '_' . $request->getModuleName() . '_pluginLoaderCache.php';

            if (file_exists($classFileIncCache)) {
                include_once $classFileIncCache;
            }
            Zend_Loader_PluginLoader::setIncludeFileCache($classFileIncCache);
        }
    }

    /**
     * Autoload stuff from the default module (which is not in a `modules` subfolder in this project)
     *
     * @return Zend_Application_Module_Autoloader
     * @author Shane O’Grady
     */
    protected function _initAutoload() {
        $autoloader = Zend_Loader_Autoloader::getInstance();
        $autoloader->setFallbackAutoloader(true);
        
        return $autoloader;
    }

    /**
     * Initialize the ZFDebug toolbar / Register the ZFDebug plugin with the FrontController
     * 
     * @return void
     * @author Shane O’Grady
     */
    protected function _initZFDebug() {
        $options = $this->getOption('zfdebug');
        if ($options['enabled']) {

            $autoloader = Zend_Loader_Autoloader::getInstance();
            $autoloader->registerNamespace('ZFDebug');

            $options = array(
                'plugins' => array('Variables',
                    'File' => array('basePath' => ROOT_PATH),
                    'Log',
                    'Html',
                    'Exception')
            );

            if ($this->hasPluginResource('db')) {
                $this->bootstrap('db');
                $db = $this->getPluginResource('db')->getDbAdapter();
                $options['plugins']['Database']['adapter'] = $db;
            }

            # Setup the cache plugin
            if ($this->hasPluginResource('cachemanager')) {
                $this->bootstrap('cachemanager');
                $cache = $this->getPluginResource('cachemanager')->getCacheManager();
                $options['plugins']['Cache']['backend'] = $cache->getCache('default')->getBackend();
            }

            $zfdebug = new ZFDebug_Controller_Plugin_Debug($options);

            $this->bootstrap('FrontController');
            $front = $this->getResource('FrontController');
            $front->registerPlugin($zfdebug);
        }
    }

    protected function _initPlugins() {
        $this->bootstrap('FrontController');
        $front = $this->getResource('FrontController');

        $front->registerPlugin(new Sky_Controller_Plugin_ActiveModule());
        $front->registerPlugin(new Application_Plugin_Init());
        $front->registerPlugin(new Zend_Controller_Plugin_ErrorHandler(array(
            'module' => 'default',
            'controller' => 'error',
            'action' => 'error',
        )));
    }

}
