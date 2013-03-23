<?php

/**
 * Description This is the model for use with databases.
 *
 * @author Dave Albert ~ 21/04/2011
 */
class AdmVisists extends Model {

    function AdmVisists() {
        // Call the Model constructor
        parent::Model();
    }

    public function get_inpatient_count() {
        $SQL = "SELECT count(*) as CNT FROM AdmVisits where Status= 'ADM IN'";
        return $this->db->get($SQL)->row()->CNT;
    }

    public function get_inpatients() {
        $SQL = "SELECT a.*,b.* FROM AdmVisits a
        LEFT JOIN AdmittingData b
            ON a.SourceID = b.SourceID
            AND a.VisitID = b.VisitID
        WHERE a.Status = 'ADM IN'
        ORDER BY RoomID,BedID";

        return ($this->db->get($SQL));
    }

}