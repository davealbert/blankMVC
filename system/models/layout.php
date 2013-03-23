<?php

if (!defined('SITE_ROOT'))
    exit('No direct script access allowed!');
/*
 *  This is the layout model for this site
 *  By Dave Albert
 */

class Layout extends Model {

    function Layout() {
// Call the Model constructor
        parent::Model();
    }

    function header($which, &$data) {
        if ($which == "main") {
            $data['title'] = 'Data Repository';
        } else if ($which == "incnt") {
            $data['title'] = 'Data Repository | Inpatient Count';
        } else if ($which == "in") {
            $data['title'] = 'Data Repository | Current Inpatients';
        } else {
            $data['title'] = $which;
        }

        $data['link'] = "<link REL='SHORTCUT ICON' HREF='http://intranet/images/favicon.ico'>";
        $data['css'] = "<link href='" . SITE_ROOT . '/' . APP_ROOT . "/css/non-ie.css' rel='stylesheet'>";
    }

}