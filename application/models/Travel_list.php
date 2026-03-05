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

    public function selectsBuch()
    {
        $sql1 = "SELECT DISTINCT travel_list.*, 
       applications.*, 
       contracts.*,
       cars.*,
       drivers.*
FROM travel_list
LEFT JOIN applications ON applications.id_application = travel_list.id_application
LEFT JOIN contracts ON contracts.id_application = applications.id_application
LEFT JOIN drivers ON drivers.id_driver = travel_list.id_driver
LEFT JOIN cars ON cars.id_car = travel_list.id_car
WHERE travel_list.status_list = 'Завершен' OR travel_list.status_list = 'В пути'  ;";
        $result = $this->db->query($sql1);
        return $result->result_array();
    }

    public function selectsBuchFIlter($date1, $date2, $id_driver)
    {
        $sql1 = "SELECT DISTINCT travel_list.*, 
       applications.*, 
       contracts.*,
       cars.*,
       drivers.*
FROM travel_list
LEFT JOIN applications ON applications.id_application = travel_list.id_application
LEFT JOIN contracts ON contracts.id_application = applications.id_application
LEFT JOIN drivers ON drivers.id_driver = travel_list.id_driver
LEFT JOIN cars ON cars.id_car = travel_list.id_car
WHERE (travel_list.status_list = 'Завершен' OR travel_list.status_list = 'В пути')
  AND travel_list.dispatch_date >= ? 
  AND travel_list.the_factual_delivery_date <= ? 
  AND travel_list.id_driver = ?;";
        $result = $this->db->query($sql1, array($date1, $date2, $id_driver));
        return $result->result_array();
    }
}
