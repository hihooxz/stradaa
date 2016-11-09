<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Muser extends CI_Model {
	// constrcutor
	function __construct(){
		parent::__construct();
	}

  function fetchUser($limit,$start,$pagenumber) {

    if($pagenumber!="")
      $this->db->limit($limit,($pagenumber*$limit)-$limit);
    else
      $this->db->limit($limit,$start);

    $this->db->order_by('full_name','ASC');
    $query = $this->db->get('user');
    if($query->num_rows()>0){
      return $query->result();
    }
    else return FALSE;
  }
  function countAllUser() {
    return $this->db->count_all("user");
  }

  function saveUser($data){
    $array = array(
        'username' => $data['username'],
        'password' => md5($data['password']),
        'email' => $data['email'],
        'full_name' => $data['full_name'],
				'last_login' => date('Y-m-d H:i:s'),
				'date_input' => date('Y-m-d H:i:s'),
        'permission' => $data['permission'],
				'address' => $data['address'],
				'telephone' => $data['telephone'],
        'gender' => $data['gender'],
        'birthday' => date('Y-m-d',strtotime($data['birthday']))
      );
    $this->db->insert('user',$array);
    return 1;
  }
    function editUser($data,$id){
      $array = array(
          'username' => $data['username'],
          'email' => $data['email'],
          'full_name' => $data['full_name'],
          'permission' => $data['permission'],
					'address' => $data['address'],
					'telephone' => $data['telephone'],
          'gender' => $data['gender'],
          'birthday' => date('Y-m-d',strtotime($data['birthday']))
        );
			if($data['password']!="")
			$array['password']=md5($data['password']);

      $this->db->where('id_user',$id);
      $this->db->update('user',$array);
      return 1;
    }
		function fetchUserSearch($data) {
			$this->db->like($data['by'],$data['search']);
			$this->db->order_by('full_name','ASC');
	    $query = $this->db->get('user');
	    if($query->num_rows()>0){
	      return $query->result();
	    }
	    else return FALSE;
		}
    function editProfile($data,$id){
      $array = array(
          'email' => $data['email'],
          'full_name' => $data['full_name'],
          'address' => $data['address'],
          'telephone' => $data['telephone'],
          'gender' => $data['gender'],
          'birthday' => date('Y-m-d',strtotime($data['birthday']))
        );
      $this->db->where('id_user',$id);
      $this->db->update('user',$array);
      return 1;
    }
    function checkPassword($current,$id){
      $this->db->where('password',md5($current));
      $this->db->where('id_user',$id);
      $query = $this->db->get('user');
      if($query->num_rows()>0){
        return $query->row_array();
      }
      else return FALSE;
    }
    function changePassword($data,$id){
      $array = array(
          'password' => md5($data['new'])
        );

      $this->db->where('id_user',$id);
      $this->db->update('user',$array);
    }
}
