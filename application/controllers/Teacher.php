<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Teacher extends CI_Controller {
	public function __construct(){
		parent::__construct();

		if($this->session->userdata('permission')!=2)
			redirect(base_url('dashboard/login'));

		$this->load->model('madmin');
		$this->load->model('muser');
		$this->load->model('msubject','msub');
		$this->load->model('mclass');
		$this->load->model('msetting');
		$this->load->model('mschedule');
	}
	function index(){
		$data['title_web']= 'Teacher Panel | Stradaa';
		$data['path_content'] = 'admin/module/dashboard_member';

		$this->load->view('admin/index',$data);
	}
	function edit_profile(){
		$data['title_web']= 'Teacher Panel | Stradaa';
		$data['path_content'] = 'admin/user/edit_profile';

		$id = $this->session->userdata('idUser');
		$data['result'] = $this->mod->getDataWhere('user','id_user',$id);
		if($data['result'] == false)
			redirect(base_url($this->uri->segment(1)));

		$this->form_validation->set_rules('full_name','Full Name','required');
		$this->form_validation->set_rules('email','Email','required|valid_email');
		$this->form_validation->set_rules('address','Address','required');
			$this->form_validation->set_rules('telephone','Telephone','required|numeric');
			$this->form_validation->set_rules('gender','Gender','required');
			$this->form_validation->set_rules('birthday','Birthday','required');
		if(!$this->form_validation->run()){
			$this->load->view('admin/index',$data);
		}
		else{
			$this->muser->editProfile($_POST,$id);
			$this->session->set_flashdata(array('success'=>TRUE));
			redirect(base_url($this->uri->segment(1).'/edit-profile'));
		}
	}
	function change_password(){
		$data['title_web']= 'Teacher Panel | Stradaa';
		$data['path_content'] = 'admin/user/change_password';

		$id = $this->session->userdata('idUser');
		$data['result'] = $this->mod->getDataWhere('user','id_user',$id);
		if($data['result'] == false)
			redirect(base_url($this->uri->segment(1)));

		$this->form_validation->set_rules('current','Current Password','required|callback_currentPassword');
		$this->form_validation->set_rules('new','New Password','required');
		$this->form_validation->set_rules('confirm','Confirm Password','required|matches[new]');
		if(!$this->form_validation->run()){
			$this->load->view('admin/index',$data);
		}
		else{
			$this->muser->changePassword($_POST,$id);
			$this->session->set_flashdata(array('success'=>TRUE));
			redirect(base_url($this->uri->segment(1).'/change-password'));
		}
	}
	function currentPassword(){
		$id = $this->session->userdata('idUser');
		$current = $this->input->post('current');
		$user = $this->muser->checkPassword($current,$id);
		if($user !=FALSE){
			return TRUE;
		}
		else{
			$this->form_validation->set_message('currentPassword','Current Password is Wrong!');
			return FALSE;
		}
	}
	function view_schedule(){
		$data['title_web']= 'Teacher Panel | Stradaa';
		$data['path_content'] = 'admin/schedule/manage_schedule';
		$data['results'] = $this->mschedule->fetchScheduleTeacher($this->session->userdata('idUser'));

		$this->load->view('admin/index',$data);
	}
	function view_schedule_grid(){
		$data['title_web']= 'Teacher Panel | Stradaa';
		$data['path_content'] = 'admin/schedule/manage_schedule_grid';
		$data['results'] = $this->mschedule->fetchScheduleTeacher($this->session->userdata('idUser'));
		$data['links'] = false;
		$this->load->view('admin/index',$data);
	}
	function download_schedule(){
		$data['title_web']= 'Teacher Panel | Stradaa';
		$data['path_content'] = 'admin/schedule/download_schedule';
		$this->load->view('admin/index',$data);
	}
	function downloading(){
			$this->load->library('fpdf');
			 // Generate PDF by saying hello to the world
			$id = $this->uri->segment(3);
			$user_data = $this->mod->getDataWhere('user','id_user',$id);
	        $user = array('user'=>$user_data);
	        $schedule = array('schedule'=>$this->mschedule->fetchScheduleTeacher($id));
	        $permission = array('permission'=>$this->session->userdata('idUser'));
			$res['data'] = array_merge($user,$schedule,$permission);
	        $this->load->view('admin/schedule/downloading',$res);
		}
}