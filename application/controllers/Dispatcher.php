<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('UTC');
class Dispatcher extends CI_Controller
{
    public function not_applications(){
		$this->load->model('Application_model');
		$this->load->model('Contract_model');
		if(isset($_POST['contract'])){
			$number_contract = $_POST['number_contract'];
			$conclusion_date = $_POST['conclusion_date'];
			$due_date = $_POST['due_date'];
			$id_application = $_POST['id_application'];
			 $this->Contract_model->insert_contract($id_application, $number_contract, $conclusion_date, $due_date);
			
		}
		$this->load->view('temp/head');
		$this->load->view('dispatcher/navbar');
        
        $data['appli'] = $this->Application_model->not_get_application();
        
		$this->load->view('dispatcher/not_applications', $data);
		$this->load->view('temp/footer');
	}

	public function applications(){
		$this->load->model('Application_model');

		if(isset($_GET['date'])){
			
        	$data['applis'] = $this->Application_model->get_application($_GET['date']);

		}else{
        	$data['applis'] = $this->Application_model->get_application();

		}


		$this->load->view('temp/head');
		$this->load->view('dispatcher/navbar');
        $this->load->model('Application_model');
        
		$this->load->view('dispatcher/applications', $data);
		$this->load->view('temp/footer');
	}

	public function put_list(){
		 $this->load->model('Application_model');
		
		if (isset($_POST['put'])) {
			$id_application = $_POST['id_application'];
			$id_driver = $_POST['id_driver'];
			$id_car = $_POST['id_car'];
			$number_list = $_POST['number_list'];
			$transported = $_POST['transported'];
			$dispatch_date = $_POST['dispatch_date'];
			$the_factual_delivery_date = $_POST['the_factual_delivery_date'];

			$this->Application_model->insert_put_list($number_list, $id_application, $transported, $dispatch_date, $the_factual_delivery_date, $id_car, $id_driver);
		}

		$this->load->view('temp/head');
		$this->load->view('dispatcher/navbar');
	     $data['appli'] =  $this->Application_model->put_list();
		 $data['driv'] = $this->Application_model->spisok_drivers();
		$data['car'] = $this->Application_model->spisok_cars();
		$data['list'] = $this->Application_model->select_put_list();
        
		$this->load->view('dispatcher/put_list', $data);
		$this->load->view('temp/footer');
	}

	public function slisok(){
		


		$this->load->view('temp/head');
		$this->load->view('dispatcher/navbar');
       $this->load->model('Application_model');
        $data['driv'] = $this->Application_model->spisok_drivers();
		$data['car'] = $this->Application_model->spisok_cars();
        
		$this->load->view('dispatcher/slisok', $data);
		$this->load->view('temp/footer');
	}


}
