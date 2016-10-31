<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mclass extends CI_Model {
	// constrcutor
	function __construct(){
		parent::__construct();
	}

  function fetchClass($limit,$start,$pagenumber) {

    if($pagenumber!="")
      $this->db->limit($limit,($pagenumber*$limit)-$limit);
    else
      $this->db->limit($limit,$start);

    $this->db->order_by('class_name','ASC');
    $query = $this->db->get('class');
    if($query->num_rows()>0){
      return $query->result();
    }
    else return FALSE;
  }
  function countAllClass() {
    return $this->db->count_all("class");
  }

  function saveClass($data){
    $array = array(
        'class_name' => $data['class_name'],
				'status_class' => $data['status_class']

      );
    $this->db->insert('class',$array);
    return 1;
  }
    function editClass($data,$id){
      $array = array(
          'class_name' => $data['class_name'],
					'status_class' => $data['status_class']

        );

      $this->db->where('id_class',$id);
      $this->db->update('class',$array);
      return 1;
    }
		function fetchClassSearch($data) {
			$this->db->like($data['by'],$data['search']);
			$this->db->order_by('class_name','ASC');
	    $query = $this->db->get('class');
	    if($query->num_rows()>0){
	      return $query->result();
	    }
	    else return FALSE;
		}

		function fetchClassroom($limit,$start,$pagenumber) {

	    if($pagenumber!="")
	      $this->db->limit($limit,($pagenumber*$limit)-$limit);
	    else
	      $this->db->limit($limit,$start);

	    $this->db->order_by('name_classroom','ASC');
	    $query = $this->db->get('classroom');
	    if($query->num_rows()>0){
	      return $query->result();
	    }
	    else return FALSE;
	  }
	  function countAllClassroom() {
	    return $this->db->count_all("classroom");
	  }

	  function saveClassroom($data){
	    $array = array(
	        'name_classroom' => $data['name_classroom']


	      );
	    $this->db->insert('classroom',$array);
	    return 1;
	  }
	    function editClassroom($data,$id){
	      $array = array(
	          'name_classroom' => $data['name_classroom']


	        );

	      $this->db->where('id_classroom',$id);
	      $this->db->update('classroom',$array);
	      return 1;
	    }
			function fetchClassroomSearch($data) {
				$this->db->like($data['by'],$data['search']);
				$this->db->order_by('name_classroom','ASC');
		    $query = $this->db->get('classroom');
		    if($query->num_rows()>0){
		      return $query->result();
		    }
		    else return FALSE;
			}
	function saveStudentClass($data,$id){
		$student = $this->mod->getDataWhere('user','username',$data['student']);
		$array = array(
				'id_class' => $id,
				'id_user' => $student['id_user']
			);
		$this->db->insert('student',$array);
		return 1;
	}
	function fetchStudentClass($limit,$start,$pagenumber,$id) {

    if($pagenumber!="")
      $this->db->limit($limit,($pagenumber*$limit)-$limit);
    else
      $this->db->limit($limit,$start);

  	$this->db->where('student.id_class',$id);
  	$this->db->join('class','class.id_class = student.id_class');
  	$this->db->join('user','user.id_user = student.id_user');
    $this->db->order_by('username','ASC');
    $query = $this->db->get('student');
    if($query->num_rows()>0){
      return $query->result();
    }
    else return FALSE;
  }
  function fetchStudentNotInput($id){
  	$sql = "
			SELECT st_user.*
			FROM st_user
			WHERE st_user.id_user NOT IN (SELECT st_student.id_user from st_student WHERE id_class = '$id')
			AND permission = 3
			Order BY username ASC
		";
		$query = $this->db->query($sql);
		if($query->num_rows()>0){
			return $query->result();
		}
		else return FALSE;
  }
  function countStudentNotInput($id){
  	$sql = "
			SELECT count(*) as total_row
			FROM st_user
			WHERE st_user.id_user NOT IN (SELECT st_student.id_user from st_student WHERE id_class = '$id')
			AND permission = 3
			Order BY username ASC
		";
		$query = $this->db->query($sql);
		$data = $query->row_array();
		if($query->num_rows()>0){
			return $data['total_row'];
		}
		else return 0;
  }
}
