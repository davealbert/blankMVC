<?php

if (!defined('SITE_ROOT'))
    exit('No direct script access allowed!');
/*
 *  This is the main router for this MVC Framework
 *  By Dave Albert
 */

/*
 *
 * LIBRARIES - This is the section for the libraries
 *
 */

require_once(SERVER_ROOT . SYSTEM_DIRECTORY . 'libraries/database.php');
require_once(SERVER_ROOT . SYSTEM_DIRECTORY . 'libraries/controller.php');
require_once(SERVER_ROOT . SYSTEM_DIRECTORY . 'libraries/load.php');
require_once(SERVER_ROOT . SYSTEM_DIRECTORY . 'libraries/model.php');



/*
 *
 * CONTROLLER - This is the section for the controller
 *
 */
// Get the URI
$uri = $GLOBALS['HTTP_SERVER_VARS']['REQUEST_URI'];
;

// Remove any trailing slashes
$uri = trim($uri, '/');

// Parse the URI to extract controller and method and parameters
$x = explode('/', $uri);

// Remove the APP_ROOT
if ($x[0] == APP_ROOT) {
    array_shift($x);
}

// Remove index.php if it exsists
if ($x[0] == 'index.php') {
    array_shift($x);
}

//Set a controller if we have one
if (isset($x[0])) {
    $controller = $x[0];
    array_shift($x);
}


//  If we have a controller passed to us the load it.
if (isset($controller)) {
    // Check that the file is really a controller
    $CONTROLLER_FILE = SERVER_ROOT . SYSTEM_DIRECTORY . 'controllers/' . $controller . '.php';
    if (file_exists($CONTROLLER_FILE)) {
        require_once($CONTROLLER_FILE);

        // instantiate new controller
        $MVC = new $controller();

        // Get method and/or pass variables
        if (isset($x[0])) {
            $method = $x[0];
            if (is_callable(array($MVC, $method))) {
                array_shift($x);
                $MVC->$method($x);
            } else {
                $MVC->index($x);
            }
        } else {
            $MVC->index('');
        }
    } else {
        // If not a controller launch default controller
        require_once(SERVER_ROOT . DEFAULT_CONTROLLER );
        $newController = DEFAULT_CONTROLLER_CLASS;
        $MVC = new $newController();
        
        $method = $controller;
        if (is_callable(array($MVC, $method))) {
            array_shift($x);
            $MVC->$method($x);
        } else {
            // Push the array back together
            array_unshift($x, $controller);
            $MVC->index($x);
        }
    }
} else {

// ELSE - Launch Default controller
    require_once(SERVER_ROOT . DEFAULT_CONTROLLER );
    $newController = DEFAULT_CONTROLLER_CLASS;
    $MVC = new $newController();
    $MVC->index('');
}

