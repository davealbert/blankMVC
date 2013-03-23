<?php

/**
 * WEB_ROOT_FOLDER is the name of the parent folder you created these
 * documents in.
 */

define('APP_ROOT', 'blankMVC');
define('SERVER_ROOT', 'C:\xampp\htdocs' . '\\' . APP_ROOT);

//yoursite.com is your webserver
define('SITE_ROOT', 'http://herxdsk074');

//The folder that the MVC is contained in.
define('SYSTEM_DIRECTORY', '/system/');

$GLOBALS['DB_CONNECT'] = FALSE;
/**
 * Fetch the config files
 */
require_once(SERVER_ROOT . SYSTEM_DIRECTORY . 'config/' . 'main.php');
require_once(SERVER_ROOT . SYSTEM_DIRECTORY . 'config/' . 'database.php');


/**
 * Fetch the router
 */
require_once(SERVER_ROOT . SYSTEM_DIRECTORY . 'router.php');
