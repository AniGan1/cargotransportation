<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('UTC');
class Main extends CI_Controller
{

	public function index()
	{
		$id_role = $this->session->userdata('id_role');
		if (!empty($id_role) &&  $id_role == 1) {
			$this->load->view('temp/navbar_student');
		}elseif(!empty($id_role) &&  $id_role == 2){
			$this->load->view('temp/navbar_teacher');
		}elseif(!empty($id_role) &&  $id_role == 3){
			$this->load->view('temp/navbar_admin');
		}else{
			$this->load->view('temp/navbar');
		}
		$this->load->view('temp/head');

		$this->load->view('index');
		$this->load->view('temp/footer');
	}
	public function reg()
	{
	
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
	public function login()
	{
		if (!empty($_POST)) {
			$this->load->model('users');
			$user = $this->users->selectUser($_POST);
			if ($user) {
				$this->session->set_userdata($user);
				if($user['id_role'] == 1){
					redirect('student/person_cabinet');
				}else if($user['id_role'] == 2){
					redirect('teacher/person_cabinet');
				}else if($user['id_role'] == 3){
					redirect('main/index');
				}
			}else{
				$this->session->set_flashdata('error_auth', "Неправильный логин либо пароль");
				redirect('main/login');
			}
		} else {
			$this->load->view('temp/head');
			$this->load->view('temp/navbar');
			$this->load->view('login');
			$this->load->view('temp/footer');
		}
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('main/index');
	}
}
