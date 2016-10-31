<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('madmin');
	}
	function index(){
		if($this->session->userdata('loginAdmin')!=TRUE){
			redirect(base_url('dashboard/login'));
		}
		$data['title_web']= 'adminpanel | Stradaa';
		$data['path_content'] = 'admin/module/dashboard';
		$this->load->view('admin/index',$data);
	}
		public function login(){
			$this->form_validation->set_rules('username','Username','required');
			$this->form_validation->set_rules('password','Password','required|callback_validLogin');
			if(!$this->form_validation->run()){
				$this->load->view('admin/login');
			}else{
				/*redirect(base_url('dashboard'));*/
				if($this->session->userdata('permission')==1)
					redirect(base_url('admin'));
				elseif($this->session->userdata('permission')==2)
					redirect(base_url('teacher'));
				elseif($this->session->userdata('permission')==3)
					redirect(base_url('student'));
			}
		}

		function validLogin(){
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$data = $this->madmin->validLogin($username,$password);
			if($data == false){
				$this->form_validation->set_message('validLogin','Username or Password is not found');
				return false;
			}
			else{
				$session = array(
						'loginAdmin' => TRUE,
						'idUser' => $data['id_user'],
						'username'=> $data['username'],
						'permission' => $data['permission']
					);
				$this->session->set_userdata($session);
				return TRUE;
			}
		}
		function logout(){
			$session = array(
						'loginAdmin' => FALSE,
						'idAdmin' => NULL
					);
				$this->session->set_userdata($session);
			redirect(base_url($this->uri->segment(1).'/login'));
		}

}
