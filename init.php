<?php
session_start();

set_include_path(	
		__DIR__ . "/lib/" . PATH_SEPARATOR .
		get_include_path()
);

function iclefs_autoload($class_name) {
	@ $result = include($class_name . '.class.php');
	if ( ! $result ){
		return false;
	}
	return true;
}

spl_autoload_register('iclefs_autoload');

require_once("LocalSettings.php");

$franceConnect = new FranceConnect($france_connect_base_url, $client_id,$secret_id,$url_callback);

header("Content-type: text/html; charset=utf-8");
