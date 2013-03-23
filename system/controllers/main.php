<?php

if (!defined('SITE_ROOT'))
    exit('No direct script access allowed!');
/*
 *  This is the main controller for this website
 *  By Dave Albert
 */

class Main extends Controller {

    function Main() {
        parent::Controller();
        $this->load->model('AdmVisists');
        $this->load->model('BarVisists');
        $this->load->model('layout');
    }

    function index() {
        $this->header();
    }

    function ip() {
        $this->header('in');
        $data['count'] = $this->model->AdmVisists->get_inpatient_count();
        $data['result'] = $this->model->AdmVisists->get_inpatients();
        $this->load->view('myview', $data);
    }

    function ip_count() {
        $this->header('incnt');

        echo $this->model->AdmVisists->get_inpatient_count();
    }

    function bar() {
        $this->header('Data From B/AR');
        $data['count'] = $this->model->BarVisists->get_bar_count();
        $data['result'] = $this->model->BarVisists->get_bar();

        $this->load->view('myview', $data);
    }

    function bar_count() {
        $this->header('Count From B/AR');
        echo $this->model->BarVisists->get_bar_count();
    }

    private function header($which='main') {
        $data = "";
        $this->model->layout->header($which, &$data);
        $this->load->view('header', $data);
    }

}