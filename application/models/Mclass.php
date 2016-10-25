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
}
