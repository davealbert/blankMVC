<?php

if (!defined('SITE_ROOT'))
    exit('No direct script access allowed!');
/*
 *  This is the Base model which other controllers extend for this MVC Framework
 *  By Dave Albert
 */

class Model {

    public $db;

    function __construct() {
        $this->db = new db();
    }

    function Model() {
        $this->db = new db();
    }

    function __destruct() {
        if ($GLOBALS['DB_CONNECT'] == TRUE) {
            $this->close();
            $GLOBALS['DB_CONNECT'] = FALSE;
//            echo " -mo- ";
        }
    }

}