<?php

if (!defined('SITE_ROOT'))
    exit('No direct script access allowed!');
/*
 *  This is the Base controller which other controllers extend for this MVC Framework
 *  By Dave Albert
 */

class Controller {

    private static $instance;
    public $db;
    public $load;

    public static function &get_instance() {
        return self::$instance;
    }

    function __construct() {
        self::$instance = & $this;
    }

    public function Controller() {
        self::$instance = & $this;
        $this->db = new db();
        $this->load = new load();
    }

    public function br($num=1) {
        for ($i = 0; $i < $num; $i++) {
            echo "<br>";
        }
    }

    function __destruct() {
        if ($GLOBALS['DB_CONNECT'] == TRUE) {
            $this->db->close();
            $GLOBALS['DB_CONNECT'] = FALSE;
//            echo " -con- ";
        }
    }

}