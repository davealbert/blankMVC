<?php

if (!defined('SITE_ROOT'))
    exit('No direct script access allowed!');
/*
 *  This is the main controller for this website
 *  By Dave Albert
 */

class Dr extends Controller {

    function Dr() {
        parent::Controller();
        $this->load->model('layout');
        $this->load->model('sysdr');
    }

    function index() {
        $this->header();
        $this->load->view('drlookup', $data);
    }

    function table($like=null) {
        $data['result'] = $this->model->sysdr->get_tables($like[0]);
        $data['tabcol'] = 'ajaxtable';
        $this->load->view('myview', $data);
    }

    function top100($table) {
        $data['result'] = $this->model->sysdr->get_top100($table[0]);
        $this->load->view('myview', $data);
    }

    function column($like=null) {
        $data['result'] = $this->model->sysdr->get_columns($like[0]);
        $data['tabcol'] = 'ajaxcol';
        $this->load->view('myview', $data);
    }

    function stable($like=null) {
        $data['result'] = $this->model->sysdr->sget_tables($like[0]);
        $data['tabcol'] = 'ajaxtable';
        $this->load->view('myview', $data);
    }

    function scolumn($like=null) {
        $data['result'] = $this->model->sysdr->sget_columns($like[0]);
        $data['tabcol'] = 'ajaxcol';
        $this->load->view('myview', $data);
    }

    function baracct($like=null) {
        $data['result'] = $this->model->sysdr->get_bar_acct($like[0]);
        $this->load->view('myview', $data);
    }

    function admacct($like=null) {
        $data['result'] = $this->model->sysdr->get_adm_acct($like[0]);
        $this->load->view('myview', $data);
    }

//    private function ulDumpCol($result) {
//        $first = TRUE;
//        if ($result->num_rows() > 0) {
//            echo '<table>';
//            while ($row = $result->row()) {
//                if (isset($row->Name)) {
//                    echo '<tr><td>',
//                    '<a href="javasctipt:return(false);" onclick="ajaxcol(\'', $row->TableID, '\')">', $row->TableID, '</a><td class="left10">',
//                    $row->Name, '<td class="left10">',
//                    $row->Application, '<td class="left10">',
//                    $row->NprDpm, '<td class="left10">',
//                    $row->NprSegment, '<td class="left10">',
//                    $row->NprElement;
//
//                    echo '</tr>';
//                }
//            }
//
//            $result->zero();
//
//            while ($row = $result->row()) {
//                echo '<tr><td>',
//                '<a href="javasctipt:return(false);" onclick="ajaxcol(\'', $row->TableID, '\')">', $row->TableID, '</a><td class="left10">',
//                $row->AccountNumber, '<td class="left10">',
//                $row->VisitID, '<td class="left10">',
//                $row->BillingID, '<td class="left10">',
//                $row->Patient;
//
//                echo '</tr>';
//            }
//        } else {
//            echo 'No resutls found.';
//        }
//    }
//
//    private function ulDumpTab($result) {
//        $first = TRUE;
//        echo '<table>';
//        while ($row = $result->row()) {
//            echo '<tr><td>',
//            '<a href="javasctipt:return(false);" onclick="ajaxtable(\'', $row->TableID, '\')">', $row->TableID, '</a><td class="left10">',
//            $row->Name, '<td class="left10">',
//            $row->Application, '<td class="left10">',
//            $row->NprDpm, '<td class="left10">',
//            $row->NprSegment, '<td class="left10">',
//            $row->NprElement;
//
//            echo '</tr>';
//        }
//    }

    private function header($which='DR | Column/Table Lookup') {
        $data = "";
        $this->model->layout->header($which, &$data);
        $this->load->view('header', $data);
    }

}