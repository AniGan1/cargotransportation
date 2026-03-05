<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('UTC');
class Applications extends CI_Model
{
    public function insertApp($data)
    {
        $sql1 = "INSERT INTO `applications`( `number_application`, `title_cargo`, `type_cargo`, `total_weight`, `departure_point`, `destination_point`, `id_client`, `total_cost`, `distance`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $result = $this->db->query($sql1, array($data['number_application'], $$data['title_cargo'], $$data['type_cargo'], $data['departure_point'], $data['destination_point'], $data['id_client'], $data['total_cost'], $data['distance']));
        return $result;
    }

    public function selects()
    {
        $sql1 = "SELECT * FROM applications
LEFT JOIN contracts ON applications.id_client = contracts.id_application
LEFT JOIN clients ON clients.id_client = applications.id_client
LEFT JOIN travel_list ON travel_list.id_application = applications.id_application
WHERE applications.status = 'Выполнено';";
        $result = $this->db->query($sql1);
        return $result->result_array();
    }
        public function selectsFIlter($date1, $date2)
    {
        $sql1 = "SELECT * FROM applications
LEFT JOIN contracts ON applications.id_client = contracts.id_application
LEFT JOIN clients ON clients.id_client = applications.id_client
LEFT JOIN travel_list ON travel_list.id_application = applications.id_application
WHERE applications.status = 'Выполнено' AND applications.date_created >= ?AND  applications.date_created <= ?;";
        $result = $this->db->query($sql1, array($date1,$date2));
        return $result->result_array();
    }
}

