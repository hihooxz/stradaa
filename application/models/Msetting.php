<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Msetting extends CI_Model {
	// constrcutor
	function __construct(){
		parent::__construct();
	}

  function fetchsetting($limit,$start,$pagenumber) {

    if($pagenumber!="")
      $this->db->limit($limit,($pagenumber*$limit)-$limit);
    else
      $this->db->limit($limit,$start);

    $this->db->order_by('title_web','ASC');
    $query = $this->db->get('setting');
    if($query->num_rows()>0){
      return $query->result();
    }
    else return FALSE;
  }
  function countAllsetting() {
    return $this->db->count_all("setting");
  }

	function edit_setting($data,$id=1){
		$array = array(
				'title_website' => $data['title_website'],
				'downloadable_date' => $data['downloadable_date']
			);


		$this->db->where('id_setting',$id);
		$this->db->update('setting',$array);
		return 1;
	}

}
