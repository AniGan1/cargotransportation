<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client extends CI_Controller
{
    public function cabinet()
    {
        $this->load->view('temp/head');
        $this->load->view('client/navbar');
        $this->load->model('applications');
        
        if ($_POST) {
            $weight = $this->input->post('total_weight');
            $distance = $this->input->post('distance');
            $type_cargo = $this->input->post('type_cargo');
            
            $total_cost = $this->applications->calculate_cost($weight, $distance, $type_cargo);
            
            $app_data = array(
                'title_cargo' => $this->input->post('title_cargo'),
                'type_cargo' => $type_cargo,
                'total_weight' => $weight,
                'departure_point' => $this->input->post('departure_point'),
                'destination_point' => $this->input->post('destination_point'),
                'id_client' => 1,
                'total_cost' => $total_cost,
                'distance' => $distance,
                'status' => 'Новая'
            );
            
            $insert_id = $this->applications->insertApp($app_data);
            
            if ($insert_id) {
                // Получаем только что добавленную заявку чтобы узнать её номер
                $this->db->where('id_application', $insert_id);
                $query = $this->db->get('applications');
                $new_app = $query->row_array();
                $data['message'] = 'Заявка ' . $new_app['number_application'] . ' отправлена';
            } else {
                $data['message'] = 'Ошибка';
            }
        }
        
        $data['applications'] = $this->applications->client_application();
        $this->load->view('client/cabinet', $data);
        $this->load->view('temp/footer');
    }
}