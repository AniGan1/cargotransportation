<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('UTC');
class Travel_list extends CI_Model
{
    public function selects()
    {
        $sql1 = "SELECT * FROM travel_list";
        $result = $this->db->query($sql1);
        return $result->result_array();
    }
}
