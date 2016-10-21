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
        'class_name' => $data['class_name']

      );
    $this->db->insert('class',$array);
    return 1;
  }
    function editClass($data,$id){
      $array = array(
          'class_name' => $data['class_name']

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
}
