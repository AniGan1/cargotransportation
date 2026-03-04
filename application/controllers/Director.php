<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('UTC');
class Director extends CI_Controller
{
    public function new_applications(){
		$this->load->view('temp/head');
		$this->load->view('director/navbar');
		$this->load->view('director/new_applications');
		$this->load->view('temp/footer');
	}

	public function otcte_appli(){
		$this->load->view('temp/head');
		$this->load->view('director/navbar');
		$this->load->model('Application_model');
        $data['otct'] = $this->Application_model->otcte_applis();
		$this->load->view('director/otcte_appli', $data);
		$this->load->view('temp/footer');
	}

	public function transp(){
		$this->load->view('temp/head');
		$this->load->view('director/navbar');
		$this->load->model('Application_model');
		if(isset($_GET['fio'])){
			
        	$data['transp'] = $this->Application_model->transp($_GET['fio']);

		}else{
        	$data['transp'] = $this->Application_model->transp();

		}
		$this->load->view('director/transp', $data);
		$this->load->view('temp/footer');
	}

}
