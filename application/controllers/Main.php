<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('UTC');
class Main extends CI_Controller
{

	public function index(){
		$this->load->view('temp/head');
		$this->load->view('temp/navbar');
		$this->load->view('index');
		$this->load->view('temp/footer');
	}
	public function reg(){
			$this->load->view('temp/head');
			$this->load->view('temp/navbar');
			if(!empty($_POST)){
				$login = $_POST['login'];
				$password = $_POST['password'];
				$fio = $_POST['fio'];
				$phone = $_POST['phone'];
				$email = $_POST['email'];
				$address = $_POST['address'];
				$bank_details = $_POST['bank_details'];
				$this->load->model('users');
				$this->users->insertUser($login, $password, $fio, $phone, $email, $address, $bank_details);
				redirect('main/login');
			}
			$this->load->view('reg');
			$this->load->view('temp/footer');
	
	}

	public function login(){
		$this->load->view('temp/head');
		$this->load->view('temp/navbar');
		$this->load->view('login');
		$this->load->view('temp/footer');
	}

	public function check_login(){
		if (isset($_POST['chec_login'])) {
			$login = $_POST['login'];
			$password = $_POST['password'];
	

			$this->load->model('User_model');
            $user = $this->User_model->login($login,  $password);
            if ($user) {
                $_SESSION['id_role'] = $user['id_role'];
                $_SESSION['id_user'] = $user['id_user'];

                if ($user['id_role'] == 2) {
                    redirect('dispatcher/not_applications');
                }elseif ($user['id_role'] == 4) {
                    redirect('director/sapic');
                }
            }
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('main/index');
	}
}
