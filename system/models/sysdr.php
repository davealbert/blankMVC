<?php

/**
 * Description This is the model for use with databases.
 *
 * @author Dave Albert ~ 21/04/2011
 */
class sysdr extends Model {

    function sysdr() {
        // Call the Model constructor
        parent::Model();
    }

    public function get_top100($table) {
        $SQL = "SELECT Name FROM SysDrTables where TableID= '$table'";
        $result = $this->db->get($SQL);
        $SQL = "SELECT top 100 * FROM {$result->row()->Name}";       
        return ($this->db->get($SQL));
    }

    public function get_tables($likeData="") {
        $SQL = "SELECT top 50 TableID, Application, Name FROM SysDrTables
                WHERE (TableID COLLATE Latin1_General_CI_AI) like '%$likeData%'
                    OR (Application COLLATE Latin1_General_CI_AI) like '%$likeData%'
                    OR (Name COLLATE Latin1_General_CI_AI) like '%$likeData%'";
        return ($this->db->get($SQL));
    }

    public function get_columns($likeData="") {
        $SQL = "SELECT top 50 TableID, Name, NprDpm, NprSegment, NprElement FROM SysDrColumns
                WHERE (TableID COLLATE Latin1_General_CI_AI) like '%$likeData%'
                    OR (Name COLLATE Latin1_General_CI_AI) like '%$likeData%'
                    OR (NprDpm COLLATE Latin1_General_CI_AI) like '%$likeData%'
                    OR (NprSegment COLLATE Latin1_General_CI_AI) like '%$likeData%'
                    OR (NprElement COLLATE Latin1_General_CI_AI) like '%$likeData%'";
        return ($this->db->get($SQL));
    }

    public function sget_tables($likeData="") {
        $SQL = "SELECT TableID, Application, Name FROM SysDrTables
                WHERE (TableID COLLATE Latin1_General_CI_AI) = '$likeData'";
//                    OR (Application COLLATE Latin1_General_CI_AI) like '%$likeData%'
//                    OR (Name COLLATE Latin1_General_CI_AI) like '%$likeData%'";
        return ($this->db->get($SQL));
    }

    public function sget_columns($likeData="") {
        $SQL = "SELECT TableID, Name, NprDpm, NprSegment, NprElement FROM SysDrColumns
                WHERE (TableID COLLATE Latin1_General_CI_AI) = '$likeData'";
//                    OR (Name COLLATE Latin1_General_CI_AI) like '%$likeData%'
//                    OR (NprDpm COLLATE Latin1_General_CI_AI) like '%$likeData%'
//                    OR (NprSegment COLLATE Latin1_General_CI_AI) like '%$likeData%'
//                    OR (NprElement COLLATE Latin1_General_CI_AI) like '%$likeData%'";
        return ($this->db->get($SQL));
    }

    public function get_bar_acct($likeData="") {
        $SQL = "SELECT top 100 AccountNumber, VisitID, BillingID FROM BarVisits
                WHERE (AccountNumber COLLATE Latin1_General_CI_AI) like '%$likeData%'
                    OR (VisitID COLLATE Latin1_General_CI_AI) like '%$likeData%'
                    OR (BillingID COLLATE Latin1_General_CI_AI) like '%$likeData%'";
        return ($this->db->get($SQL));
    }

    public function get_adm_acct($likeData="") {
        $SQL = "SELECT top 100 a.PatientID as Patient,a.VisitAccountNumber as AccountNumber, a.VisitID as VisitID, b.UnitNumber BillingID FROM MriPatientVisitEvents a
                    JOIN MriPatientUnitNumbers b ON a.PatientID = b.PatientID
                    WHERE (a.PatientID COLLATE Latin1_General_CI_AI) like '%$likeData%'
                    OR (a.VisitAccountNumber COLLATE Latin1_General_CI_AI) like '%$likeData%'
                    OR (a.VisitID COLLATE Latin1_General_CI_AI) like '%$likeData%'
                    OR (b.UnitNumber COLLATE Latin1_General_CI_AI) like '%$likeData%'";
        return ($this->db->get($SQL));
    }

}