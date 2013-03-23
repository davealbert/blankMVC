<?php

if (!defined('SITE_ROOT'))
    exit('No direct script access allowed!');
/*
 *  This is the Load class to load views and models for this MVC Framework
 *  By Dave Albert
 */

class Load {

    function view($file_name, $data = "") {
        if (is_array($data)) {
            extract($data);
        }
        require_once(SERVER_ROOT . SYSTEM_DIRECTORY . 'views/'. $file_name.'.php');
    }

    function model($file_name) {
        $that = Controller::get_instance();
        require_once(SERVER_ROOT . SYSTEM_DIRECTORY . 'models/'. $file_name.'.php');
        if (isset($that->$file_name)) {
            show_error('The model name you are loading is the name of a resource that is already being used: ' . $name);
        } else {
            $that->model->$file_name = new $file_name();
        }
    }

}