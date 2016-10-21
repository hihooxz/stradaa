<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Msubject extends CI_Model {
	// constrcutor
	function __construct(){
		parent::__construct();
	}

  function fetchSubject($limit,$start,$pagenumber) {

    if($pagenumber!="")
      $this->db->limit($limit,($pagenumber*$limit)-$limit);
    else
      $this->db->limit($limit,$start);

    $this->db->order_by('subject','ASC');
    $query = $this->db->get('subject');
    if($query->num_rows()>0){
      return $query->result();
    }
    else return FALSE;
  }
  function countAllSubject() {
    return $this->db->count_all("subject");
  }

  function saveSubject($data){
    $array = array(
        'subject' => $data['subject'],
        'description' => $data['description']
      );
    $this->db->insert('Subject',$array);
    return 1;
  }
    function editSubject($data,$id){
      $array = array(
          'subject' => $data['subject'],
          'description' => $data['description']
        );


      $this->db->where('id_subject',$id);
      $this->db->update('subject',$array);
      return 1;
    }
		function fetchSubjectSearch($data) {
			$this->db->like($data['by'],$data['search']);
			$this->db->order_by('subject','ASC');
	    $query = $this->db->get('Subject');
	    if($query->num_rows()>0){
	      return $query->result();
	    }
	    else return FALSE;
		}
}
