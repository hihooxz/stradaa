<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __construct(){
		parent::__construct();

		if($this->session->userdata('permission')!=1)
		redirect(base_url('dashboard/login'));

		$this->load->model('madmin');
		$this->load->model('muser','mus');
		$this->load->model('msubject','msub');
		$this->load->model('mclass');
		$this->load->model('msetting');


	}
	public function index(){
		$data['title_web']= 'adminpanel | Stradaa';
		$data['path_content'] = 'admin/module/dashboard';

		$this->load->view('admin/index',$data);
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


	function manage_user(){
    $data['title_web'] = 'View All User | Adminpanel Strada';
    $data['path_content'] = 'admin/user/manage_user';

		$this->form_validation->set_rules('search','Search','required');

		if(!$this->form_validation->run()){
    // Ngeload data
    $perpage = 10;
    $this->load->library('pagination'); // load libraray pagination
    $config['base_url'] = base_url($this->uri->segment(1).'/user/manage_user/'); // configurate link pagination
    $config['total_rows'] = $this->mod->countData('user');// fetch total record in databae using load
    $config['per_page'] = $perpage; // Total data in one page
    $config['uri_segment'] = 3; // catch uri segment where locate in 4th posisition
    $choice = $config['total_rows']/$config['per_page'] = $perpage; // Total record divided by total data in one page
    $config['num_links'] = round($choice); // Rounding Choice Variable
    $config['use_page_numbers'] = TRUE;
    $this->pagination->initialize($config); // intialize var config
    $page = ($this->uri->segment(3))? $this->uri->segment(3) : 0; // If uri segment in 4th = 0 so this program not catch the uri segment
    $data['results'] = $this->mus->fetchUser($config['per_page'],$page,$this->uri->segment(3)); // fetch data using limit and pagination
    $data['links'] = $this->pagination->create_links(); // Make a variable (array) link so the view can call the variable
    $data['total_rows'] = $this->mod->countData('user'); // Make a variable (array) link so the view can call the variable
    $this->load->view('admin/index',$data);
		}
		else{
			$data['results'] = $this->mus->fetchUserSearch($_POST); // fetch data using limit and pagination
			$data['links'] = false;
			$this->load->view('admin/index',$data);
		}
  }

		function add_user(){
			$data['title_web'] = 'Add User | Adminpanel Strada';
			$data['path_content'] = 'admin/user/add_user';
			$this->form_validation->set_rules('username','Username','required');
			$this->form_validation->set_rules('password','Password','required');
			$this->form_validation->set_rules('confirm_passowrd','Password Must Be Matches','required|matches[password]');
			$this->form_validation->set_rules('email','Email','required|valid_email');
			$this->form_validation->set_rules('full_name','full Name','required');
			$this->form_validation->set_rules('permission','Permission','required');

			if(!$this->form_validation->run()){
				$this->load->view('admin/index',$data);
			}
			else{
				$save = $this->mus->saveUser($_POST);
				redirect(base_url($this->uri->segment(1).'/manage_user'));
			}
		}

		function edit_user(){
			$data['title_web'] = 'Edit User | Adminpanel Strada';
			$data['path_content'] = 'admin/user/edit_user';
			$id=$this->uri->segment(3);
			$data['result']=$this->mod->getDataWhere('user','id_user',$id);
			if($data['result']==FALSE)
				redirect(base_url('user/manage_user'));

				$this->form_validation->set_rules('username','Username','required');
				$this->form_validation->set_rules('password','Password','required');
					$this->form_validation->set_rules('confirm_password','Password Must Be Matches','matches[password]');
				$this->form_validation->set_rules('email','Email','required|valid_email');
				$this->form_validation->set_rules('full_name','full Name','required');
				$this->form_validation->set_rules('permission','Permission','required');


			if(!$this->form_validation->run()){
				$this->load->view('admin/index',$data);
			}
			else{
				$save = $this->mus->editUser($_POST,$id);
				redirect(base_url($this->uri->segment(1).'/manage_user'));
			}
		}
		function delete_user(){
			$id = $this->uri->segment(3);
			$this->db->where('id_user',$id);
			$this->db->delete('user');
			redirect(base_url($this->uri->segment(1).'/manage_user'));
		}

		function manage_subject(){
		  $data['title_web'] = 'View All subject | Adminpanel Strada';
		  $data['path_content'] = 'admin/subject/manage_subject';

		  $this->form_validation->set_rules('search','Search','required');

		  if(!$this->form_validation->run()){
		  // Ngeload data
		  $perpage = 10;
		  $this->load->library('pagination'); // load libraray pagination
		  $config['base_url'] = base_url($this->uri->segment(1).'/manage_subject/'); // configurate link pagination
		  $config['total_rows'] = $this->mod->countData('subject');// fetch total record in databae using load
		  $config['per_page'] = $perpage; // Total data in one page
		  $config['uri_segment'] = 3; // catch uri segment where locate in 4th posisition
		  $choice = $config['total_rows']/$config['per_page'] = $perpage; // Total record divided by total data in one page
		  $config['num_links'] = round($choice); // Rounding Choice Variable
		  $config['use_page_numbers'] = TRUE;
		  $this->pagination->initialize($config); // intialize var config
		  $page = ($this->uri->segment(3))? $this->uri->segment(3) : 0; // If uri segment in 4th = 0 so this program not catch the uri segment
		  $data['results'] = $this->msub->fetchsubject($config['per_page'],$page,$this->uri->segment(3)); // fetch data using limit and pagination
		  $data['links'] = $this->pagination->create_links(); // Make a variable (array) link so the view can call the variable
		  $data['total_rows'] = $this->mod->countData('subject'); // Make a variable (array) link so the view can call the variable
		  $this->load->view('admin/index',$data);
		  }
		  else{
		    $data['results'] = $this->msub->fetchsubjectSearch($_POST); // fetch data using limit and pagination
		    $data['links'] = false;
		    $this->load->view('admin/index',$data);
		  }
		}

		  function add_subject(){
		    $data['title_web'] = 'Add subject | Adminpanel Strada';
		    $data['path_content'] = 'admin/subject/add_subject';
		    $this->form_validation->set_rules('subject','subject','required');
		    $this->form_validation->set_rules('description','Description','required');

		    if(!$this->form_validation->run()){
		      $this->load->view('admin/index',$data);
		    }
		    else{
		      $save = $this->msub->saveSubject($_POST);
		      redirect(base_url($this->uri->segment(1).'/manage_subject'));
		    }
		  }

		  function edit_subject(){
		    $data['title_web'] = 'Edit subject | Adminpanel Strada';
		    $data['path_content'] = 'admin/subject/edit_subject';
		    $id=$this->uri->segment(3);
		    $data['result']=$this->mod->getDataWhere('subject','id_subject',$id);
		    if($data['result']==FALSE)
		      redirect(base_url('subject/manage_subject'));

					$this->form_validation->set_rules('subject','subject','required');
					$this->form_validation->set_rules('description','Description','required');


		    if(!$this->form_validation->run()){
		      $this->load->view('admin/index',$data);
		    }
		    else{
		      $save = $this->msub->editSubject($_POST,$id);
		      redirect(base_url($this->uri->segment(1).'/manage-subject'));
		    }
		  }
		  function delete_subject(){
		    $id = $this->uri->segment(3);
		    $this->db->where('id_subject',$id);
		    $this->db->delete('subject');
		    redirect(base_url($this->uri->segment(1).'/manage-subject'));
		  }

			function manage_class(){
			  $data['title_web'] = 'View All Class | Adminpanel Strada';
			  $data['path_content'] = 'admin/class/manage_class';

			  $this->form_validation->set_rules('search','Search','required');

			  if(!$this->form_validation->run()){
			  // Ngeload data
			  $perpage = 10;
			  $this->load->library('pagination'); // load libraray pagination
			  $config['base_url'] = base_url($this->uri->segment(1).'/manage-class/'); // configurate link pagination
			  $config['total_rows'] = $this->mod->countData('class');// fetch total record in databae using load
			  $config['per_page'] = $perpage; // Total data in one page
			  $config['uri_segment'] = 3; // catch uri segment where locate in 4th posisition
			  $choice = $config['total_rows']/$config['per_page'] = $perpage; // Total record divided by total data in one page
			  $config['num_links'] = round($choice); // Rounding Choice Variable
			  $config['use_page_numbers'] = TRUE;
			  $this->pagination->initialize($config); // intialize var config
			  $page = ($this->uri->segment(3))? $this->uri->segment(3) : 0; // If uri segment in 4th = 0 so this program not catch the uri segment
			  $data['results'] = $this->mclass->fetchClass($config['per_page'],$page,$this->uri->segment(3)); // fetch data using limit and pagination
			  $data['links'] = $this->pagination->create_links(); // Make a variable (array) link so the view can call the variable
			  $data['total_rows'] = $this->mod->countData('class'); // Make a variable (array) link so the view can call the variable
			  $this->load->view('admin/index',$data);
			  }
			  else{
			    $data['results'] = $this->mclass->fetchClassSearch($_POST); // fetch data using limit and pagination
			    $data['links'] = false;
			    $this->load->view('admin/index',$data);
			  }
			}

			function add_class(){
		    $data['title_web'] = 'Add subject | Adminpanel Strada';
		    $data['path_content'] = 'admin/class/add_class';
		    $this->form_validation->set_rules('class_name','class','required');


		    if(!$this->form_validation->run()){
		      $this->load->view('admin/index',$data);
		    }
		    else{
		      $save = $this->mclass->saveClass($_POST);
		      redirect(base_url($this->uri->segment(1).'/manage-class'));
		    }
		  }

		  function edit_class(){
		    $data['title_web'] = 'Edit subject | Adminpanel Strada';
		    $data['path_content'] = 'admin/class/edit_class';
		    $id=$this->uri->segment(3);
		    $data['result']=$this->mod->getDataWhere('class','id_class',$id);
		    if($data['result']==FALSE)
		      redirect(base_url('class/manage_class'));

					$this->form_validation->set_rules('class_name','class','required');



		    if(!$this->form_validation->run()){
		      $this->load->view('admin/index',$data);
		    }
		    else{
		      $save = $this->mclass->editClass($_POST,$id);
		      redirect(base_url($this->uri->segment(1).'/manage-class'));
		    }
		  }
		  function delete_class(){
		    $id = $this->uri->segment(3);
		    $this->db->where('id_class',$id);
		    $this->db->delete('class');
		    redirect(base_url($this->uri->segment(1).'/manage-class'));
		  }

			function edit_setting(){
				$data['title_web'] = 'Edit setting | Adminpanel Strada';
				$data['path_content'] = 'admin/setting/edit_setting';
				$data['result']=$this->mod->getDataWhere('setting','id_setting',1);
				if($data['result']==FALSE)
				redirect(base_url('setting/manage_setting'));

					$this->form_validation->set_rules('title_website','Title','required');
					$this->form_validation->set_rules('downloadable_date','Date','required');

					if(!$this->form_validation->run()){
          $this->load->view('admin/index',$data);
        }
        else{
          $save = $this->msetting->editSetting($_POST,1);
          redirect(base_url($this->uri->segment(1).'/edit-setting'));
        }
			}

			function manage_schedule(){
				$data['title_web']= 'adminpanel | Stradaa';
				$data['path_content'] = 'admin/schedule/manage_schedule';

				$this->load->view('admin/index',$data);
			}

			function manage_schedule_grid(){
				$data['title_web']= 'adminpanel | Stradaa';
				$data['path_content'] = 'admin/schedule/manage_schedule_grid';

				$this->load->view('admin/index',$data);
			}




}
