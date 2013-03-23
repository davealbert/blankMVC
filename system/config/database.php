<?php

if (!defined('SITE_ROOT'))
    exit('No direct script access allowed!');
/*
 *  This is the database config file for this MVC Framework
 *  By Dave Albert
 */

// Set database connection
define('MSSQL_SERVER', 'herasql001');
define('MSSQL_USER', 'WebAdmin');
define('MSSQL_PASS', 'furryfunny');
// The default database if no other is given.
define('MSSQL_DATABASE', 'livemdb');
