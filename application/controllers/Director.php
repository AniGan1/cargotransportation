<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('UTC');
class Director extends CI_Controller
{
    public function new_applications(){
		$this->load->model('Contract_model');
		if(isset($_POST['dogovor'])){
			$id_application = $_POST['id_application'];
			$number_contract = $_POST['number_contract'];
			$conclusion_date = $_POST['conclusion_date'];
			$due_date = $_POST['due_date'];
			$this->Contract_model->insert_contract($id_application, $number_contract, $conclusion_date, $due_date);
		}
		$this->load->view('temp/head');
		$this->load->view('director/navbar');
        $data['appli'] = $this->Contract_model->select_appli();
		$data['sav'] = $this->Contract_model->prosmotr_appli();
		$this->load->view('director/new_applications', $data);
		$this->load->view('temp/footer');
	}

	public function otcte_appli(){
		$this->load->model('Application_model');
		if (isset($_GET['filter_trans'])) {
			$date_start = $_GET['date_start'];
			$date_end = $_GET['date_end'];

			$data['otct'] = $this->Application_model->otcte_applis($date_start, $date_end);
		}else{
			$data['otct'] = $this->Application_model->otcte_applis();
		}

		$this->load->view('temp/head');
		$this->load->view('director/navbar');
		$this->load->view('director/otcte_appli', $data);
		$this->load->view('temp/footer');
	}

	public function transp(){
				$this->load->model('Application_model');

		if (isset($_GET['filter'])) {
			$date_start = $_GET['date_start'];
			$date_end = $_GET['date_end'];
			$fio = $_GET['fio'];

			$data['transp'] = $this->Application_model->transp($date_start, $date_end, $fio);
		}else{
			$data['transp'] = $this->Application_model->transp();
		}

		$this->load->view('temp/head');
		$this->load->view('director/navbar');
		$data['drives'] = $this->Application_model->drivers();
		$this->load->view('director/transp', $data);
		$this->load->view('temp/footer');
	}

}
