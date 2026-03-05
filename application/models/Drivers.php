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
     // Получить всех водителей с их статистикой
    public function get_drivers_stats()
    {
        $this->load->database();
        
        $sql = "SELECT 
                    drivers.id_driver,
                    drivers.fio,
                    drivers.phone,
                    drivers.status,
                    drivers.salary,
                    SUM(CASE WHEN travel_list.status_list = 'Завершен' THEN applications.distance ELSE 0 END) as total_distance,
                    SUM(CASE WHEN travel_list.status_list = 'Завершен' THEN travel_list.transported ELSE 0 END) as total_weight,
                    COUNT(CASE WHEN travel_list.status_list = 'Завершен' THEN 1 ELSE NULL END) as trips_count,
                    SUM(CASE WHEN travel_list.status_list = 'Завершен' THEN (travel_list.transported * drivers.salary) ELSE 0 END) as total_salary
                FROM drivers
                LEFT JOIN travel_list ON drivers.id_driver = travel_list.id_driver
                LEFT JOIN applications ON travel_list.id_application = applications.id_application
                GROUP BY drivers.id_driver
                ORDER BY drivers.fio";
        
        $query = $this->db->query($sql);
        return $query->result();
    }
    
    // Получить данные одного водителя
    public function get_driver($driver_id)
    {
        $this->load->database();
        
        $sql = "SELECT * FROM drivers WHERE id_driver = ?";
        $query = $this->db->query($sql, array($driver_id));
        return $query->row();
    }
    
    // Обновить зарплату водителя
    public function update_salary($driver_id, $new_salary)
    {
        $this->load->database();
        
        $sql = "UPDATE drivers SET salary = ? WHERE id_driver = ?";
        return $this->db->query($sql, array($new_salary, $driver_id));
    }
}
