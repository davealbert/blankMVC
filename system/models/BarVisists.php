<?php

/**
 * Description This is the model for use with databases.
 *
 * @author Dave Albert ~ 21/04/2011
 */
class BarVisists extends Model {

    function BarVisists() {
        // Call the Model constructor
        parent::Model();
    }

    public function get_bar_count() {
        $SQL = "SELECT count(*) as CNT FROM BarVisits";
        return $this->db->get($SQL)->row()->CNT;
    }

    public function get_bar() {
        $SQL = "SELECT top 100 a.* FROM BarVisits a";

        return ($this->db->get($SQL));
    }

}