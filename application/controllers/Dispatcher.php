<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('UTC');
class Dispatcher extends CI_Controller
{
    public function not_applications(){
		$this->load->view('temp/head');
		$this->load->view('dispatcher/navbar');
        $this->load->model('Application_model');
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
		
		$this->load->view('temp/head');
		$this->load->view('dispatcher/navbar');
	     $data['appli'] =  $this->Application_model->put_list();
		 $data['driv'] = $this->Application_model->spisok_drivers();
		$data['car'] = $this->Application_model->spisok_cars();
        
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
