<?php

if (version_compare(phpversion(), '5.3.0', '<') === true) {
    die('ERROR: Your PHP version is ' . phpversion() . '. Requires PHP 5.3.0 or newer.');
}

defined('DS') || define('DS', DIRECTORY_SEPARATOR);
defined('PS') || define('PS', PATH_SEPARATOR);

defined('PUBLIC_PATH') || define('PUBLIC_PATH', realpath(dirname(__FILE__)));
defined('ROOT_PATH') || define('ROOT_PATH', realpath(PUBLIC_PATH . DS . '..'));
defined('TEMP_PATH') || define('DATA_PATH', ROOT_PATH . DS . 'data');
defined('LIBRARY_PATH') || define('LIBRARY_PATH', ROOT_PATH . DS . 'library');
defined('APPLICATION_PATH') || define('APPLICATION_PATH', ROOT_PATH . DS . 'application');
defined('APPLICATION_ENV') || define('APPLICATION_ENV', (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'development'));

// Ensure library/ is on include_path
set_include_path(implode(PS, array(
    realpath(LIBRARY_PATH),
    get_include_path(),
    '.'
)));


/** Sky_Application extended Zend_Application */
require_once 'Sky' . DS . 'Application.php';
require_once 'Zend' . DS . 'Cache.php';

$configCache = Zend_Cache::factory('Core', 'File', 
        array('automatic_serialization' => true), 
        array('cache_dir' => DATA_PATH . DS . 'cache' . DS . 'configs')
);


$application = new Sky_Application(
        APPLICATION_ENV, APPLICATION_PATH . DS . 'configs' . DS . 'application.ini', $configCache
);
$application->bootstrap()->run();

