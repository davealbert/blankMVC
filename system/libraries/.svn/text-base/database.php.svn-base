<?php

if (!defined('SITE_ROOT'))
    exit('No direct script access allowed!');
/*
 *  This is the database library for this MVC Framework
 *  By Dave Albert
 */

class DB {

    public $conn_id = FALSE;

    private function handleError() {
        // Do Nothing
    }

    private function openDB($dbn="") {
        if ($dbn == "") {
            $dbn = MSSQL_DATABASE;
        }
        try {
            $link = mssql_connect(MSSQL_SERVER, MSSQL_USER, MSSQL_PASS);
            if (!$link) {
                throw new Exception("Something went wrong while connecting to " . MSSQL_SERVER);
            }
        } catch (Exception $e) {
            die($e->getMessage());
        }
        mssql_select_db($dbn);
        $GLOBALS['DB_CONNECT'] = TRUE;
        return $link;
    }

    public function get($SQL) {
        $link = $this->openDB();
        $result = new myMVC_DB_RESULT();

        $result->data = mssql_query($SQL);

        return $result;
    }

    public function close() {
        mssql_close();
    }

    function __destruct() {
        if ($GLOBALS['DB_CONNECT'] == TRUE) {
            $this->close();
            $GLOBALS['DB_CONNECT'] = FALSE;
//            echo " -db- ";
        }
    }

}

class myMVC_DB_RESULT {

    public $data;

    public function row() {
        $object = mssql_fetch_object($this->data);
        return ($object);
    }

    public function zero() {
        if (mssql_num_rows($this->data) > 0) {
            $object = mssql_data_seek($this->data, 0);
        } else {
            $object = $this->data;
        }
        return ($object);
    }

    public function num_rows() {
        return mssql_num_rows($this->data);
    }

}