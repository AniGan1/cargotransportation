<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('UTC');
class Drivers extends CI_Model
{
    public function selects()
    {
        $sql1 = "SELECT * FROM drivers";
        $result = $this->db->query($sql1);
        return $result->result_array();
    }

    public function selectsBuch()
    {
        $sql1 = "SELECT  
    drivers.fio,
    COUNT(travel_list.id_travel_list) as total_trips, 
    SUM(applications.total_cost) as total_sum, 
    SUM(travel_list.transported) as total_transported, 
    SUM(applications.distance) as total_distance 
FROM drivers
LEFT JOIN travel_list ON travel_list.id_driver = drivers.id_driver
LEFT JOIN applications ON applications.id_application = travel_list.id_application
LEFT JOIN contracts ON contracts.id_application = applications.id_application
GROUP BY drivers.fio;";
        $result = $this->db->query($sql1);
        return $result->result_array();
    }
    public function traffic()
    {
        $sql = "SELECT drivers.fio, COALESCE(contracts.id_contract, 'Отсутствует') AS id_contract,
         COALESCE(applications.distance, 'Отсутствует') AS distance,
          COUNT(travel_list.id_travel_list) AS count_travel_lists, 
          COALESCE(SUM(applications.total_cost), 0) AS total_sum FROM drivers 
          LEFT JOIN travel_list ON travel_list.id_driver = drivers.id_driver 
          LEFT JOIN applications ON applications.id_application = travel_list.id_application 
          LEFT JOIN contracts ON contracts.id_application = applications.id_application 
          WHERE travel_list.status_list = 'Завершен'
        GROUP BY drivers.id_driver, drivers.fio, contracts.id_contract, applications.distance;";
        $data = $this->db->query($sql);
        return $data->result_array();
    }
    public function trafficFilter($date1, $date2)
    {
        $sql = "SELECT 
drivers.fio, 
COALESCE(contracts.id_contract, 'Отсутствует') AS id_contract,
COALESCE(applications.distance, 'Отсутствует') AS distance,
COUNT(travel_list.id_travel_list) AS count_travel_lists, 
COALESCE(SUM(applications.total_cost), 0) AS total_sum FROM drivers 
LEFT JOIN travel_list ON travel_list.id_driver = drivers.id_driver 
LEFT JOIN applications ON applications.id_application = travel_list.id_application 
LEFT JOIN contracts ON contracts.id_application = applications.id_application 
WHERE travel_list.status_list = 'Завершен' AND travel_list.dispatch_date >= ? AND travel_list.the_factual_delivery_date <= ?
GROUP BY drivers.id_driver, drivers.fio, contracts.id_contract, applications.distance;";
        $data = $this->db->query($sql, array($date1, $date2));
        return $data->result_array();
    }
    public function selectsBuchFilter($id_driver)
    {
        $sql1 = "SELECT  
    drivers.fio,
    COUNT(travel_list.id_travel_list) as total_trips, 
    SUM(applications.total_cost) as total_sum, 
    SUM(travel_list.transported) as total_transported, 
    SUM(applications.distance) as total_distance 
FROM drivers
LEFT JOIN travel_list ON travel_list.id_driver = drivers.id_driver
LEFT JOIN applications ON applications.id_application = travel_list.id_application
LEFT JOIN contracts ON contracts.id_application = applications.id_application
WHERE drivers.id_driver = ?
GROUP BY drivers.fio;";
        $result = $this->db->query($sql1, array($id_driver));
        return $result->result_array();
    }
}
