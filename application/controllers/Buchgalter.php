<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('UTC');
class Buchgalter extends CI_Controller
{

    public function transportation()
    {
        $this->load->model('travel_list');
        $this->load->model('drivers');

        $data['drivers'] = $this->drivers->selects();
        $data['apps'] = $this->travel_list->selectsBuch();

        if (!empty($_POST)) {
            $date1 = $_POST['date1'];
            $date2 = $_POST['date2'];
            $id_driver = $_POST['id_driver'];
            $data['apps'] = $this->travel_list->selectsBuchFIlter($date1, $date2, $id_driver);
        }

        $id_role = $this->session->userdata('id_role');
        if (!empty($id_role) &&  $id_role == 3) {
            $this->load->view('buchgalter/navbar');
        } else {
            redirect('main/index');
        }
        $this->load->view('temp/head');

        $this->load->view('buchgalter/transportation', $data);
        $this->load->view('temp/footer');
    }
    public function applications()
    {
        $id_role = $this->session->userdata('id_role');
        $this->load->model('applications');
        $data['apps'] = $this->applications->selects();
        if (!empty($_POST)) {
            $date1 = $_POST['date1'];
            $date2 = $_POST['date2'];
            $data['apps'] = $this->applications->selectsFIlter($date1, $date2);
        }

        if (!empty($id_role) &&  $id_role == 3) {
            $this->load->view('buchgalter/navbar');
        } else {
            redirect('main/index');
        }
        $this->load->view('temp/head');

        $this->load->view('buchgalter/applications', $data);
        $this->load->view('temp/footer');
    }
    public function drivers()
    {
        $id_role = $this->session->userdata('id_role');
        $this->load->model('drivers');
        $data['drivers'] = $this->drivers->selects();
        $data['apps'] = $this->drivers->selectsBuch();

        if (!empty($_POST)) {
            $id_driver = $_POST['id_driver'];
            $data['apps'] = $this->drivers->selectsBuchFilter($id_driver);
            if ($id_driver == 0) $data['apps'] = $this->drivers->selectsBuch();
        }

        if (!empty($id_role) &&  $id_role == 3) {
            $this->load->view('buchgalter/navbar');
        } else {
            redirect('main/index');
        }
        $this->load->view('temp/head');

        $this->load->view('buchgalter/drivers', $data);
        $this->load->view('temp/footer');
    }
    public function traffic()
    {
        $id_role = $this->session->userdata('id_role');
        if (!empty($id_role) &&  $id_role == 3) {
            $this->load->view('buchgalter/navbar');
        } else {
            redirect('main/index');
        }
        $this->load->view('temp/head');

        $this->load->view('buchgalter/traffic');
        $this->load->view('temp/footer');
    }


    // ЗАРПЛАТА
     public function salary()
    {
        $id_role = $this->session->userdata('id_role');
        
        if (!empty($id_role) && $id_role == 3) {
            $this->load->view('buchgalter/navbar');
        } else {
            redirect('main/index');
        }
        
        $this->load->model('drivers');
        
        $data['drivers'] = $this->drivers->get_drivers_stats();
        
        $this->load->view('temp/head');
        $this->load->view('buchgalter/salary', $data);
        $this->load->view('temp/footer');
    }
    
    public function edit_salary($driver_id)
    {
        $id_role = $this->session->userdata('id_role');
        
        if (!empty($id_role) && $id_role == 3) {
            $this->load->view('buchgalter/navbar');
        } else {
            redirect('main/index');
        }
        
        $this->load->model('drivers');
        
        $data['driver'] = $this->drivers->get_driver($driver_id);
        
        $this->load->view('temp/head');
        $this->load->view('buchgalter/edit_salary', $data);
        $this->load->view('temp/footer');
    }
    
    public function update_salary()
    {
        $this->load->model('drivers');
        
        $driver_id = $this->input->post('driver_id');
        $new_salary = $this->input->post('salary');
        
        $this->drivers->update_salary($driver_id, $new_salary);
        
        redirect('buchgalter/salary');
    }
}
