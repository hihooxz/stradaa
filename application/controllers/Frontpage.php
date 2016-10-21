<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Frontpage extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('madmin');
	}
	public function index(){
		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('password','Password','required|callback_validLogin');
		if(!$this->form_validation->run()){
			$this->load->view('admin/login');
		}else{
			if($this->session->userdata('permission')==1)
				redirect(base_url('admin'));
				elseif($this->session->userdata('permission')==2)
				redirect(base_url('guru'));
				elseif($this->session->userdata('permission')==3)
				redirect(base_url('murid'));

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
					'idAdmin' => $data['id_user'],
					'username'=> $data['username'],
					'permission' => $data['permission']
				);
			$this->session->set_userdata($session);
			return TRUE;
		}
	}
}
