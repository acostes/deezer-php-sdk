<?php

define('DEEZER_API_DIR', realpath(dirname((__FILE__))));
define('DEEZER_API_VERSION', '2.0');
define('DEEZER_API_URL', 'http://api.deezer.com/' . DEEZER_API_VERSION);

set_include_path(implode(PATH_SEPARATOR, array(
    DEEZER_API_DIR . '/data/models',
    DEEZER_API_DIR . '/lib',
    get_include_path()
)));

function __autoload($name) {
    if(preg_match('/_/', $name)) {
        $file = str_replace('_', '/', $name) . '.php';
    } else {
        $file = $name . '.php';
    }

    if(!include_once($file)) {
        error_log('Unable to load class ' . $file);
    }
}
