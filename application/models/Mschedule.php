<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mschedule extends CI_Model {
	// constrcutor
	function __construct(){
		parent::__construct();
	}

  function fetchSchedule($limit,$start,$pagenumber) {

    if($pagenumber!="")
      $this->db->limit($limit,($pagenumber*$limit)-$limit);
    else
      $this->db->limit($limit,$start);
		$this->db->join('class','schedule.id_class = class.id_class');
		$this->db->join('subject','schedule.id_subject = subject.id_subject');
		$this->db->join('classroom','schedule.id_classroom = classroom.id_classroom');
    $this->db->order_by('date_schedule','ASC');
    $query = $this->db->get('schedule');
    if($query->num_rows()>0){
      return $query->result();
    }
    else return FALSE;
  }
  function countAllschedule() {
    return $this->db->count_all("schedule");
  }

  function saveSchedule($data){
    $array = array(
				'id_class' => $data['class'],
				'id_subject' => $data['subject'],
				'id_classroom' => $data['classroom'],
        'name_schedule' => $data['name_schedule'],
        'hour_start' => $data['hour_start'],
				'hour_end' => $data['hour_end'],
				'date_schedule' => date('Y-m-d',strtotime($data['date_schedule']))
      );
    $this->db->insert('schedule',$array);
    return 1;
  }
    function editSchedule($data,$id){
      $array = array(
				'id_class' => $data['class'],
				'id_subject' => $data['subject'],
				'id_classroom' => $data['classroom'],
				'name_schedule' => $data['name_schedule'],
				'hour_start' => $data['hour_start'],
				'hour_end' => $data['hour_end'],
				'date_schedule' =>date('Y-m-d',strtotime($data['date_schedule']))
        );


      $this->db->where('id_schedule',$id);
      $this->db->update('schedule',$array);
      return 1;
    }
		function fetchScheduleSearch($data) {
			$this->db->like($data['by'],$data['search']);
			$this->db->join('class','schedule.id_class = class.id_class');
			$this->db->join('subject','schedule.id_subject = subject.id_subject');
			$this->db->join('classroom','schedule.id_classroom = classroom.id_classroom');
			$this->db->order_by('date_schedule','ASC');
	    $query = $this->db->get('schedule');
	    if($query->num_rows()>0){
	      return $query->result();
	    }
	    else return FALSE;
		}
		function fetchAllClass(){
			$query = $this->db->get('class');
			if($query->num_rows()>0){
				return $query->result();
			}
			else return FALSE;
		}

		function fetchAllSubject(){
			$query = $this->db->get('subject');
			if($query->num_rows()>0){
				return $query->result();
			}
			else return FALSE;
		}

		function fetchAllSchedule(){
			$this->db->join('class','schedule.id_class = class.id_class');
			$this->db->join('subject','schedule.id_subject = subject.id_subject');
			$this->db->join('classroom','schedule.id_classroom = classroom.id_classroom');
			$query = $this->db->get('schedule');
			if($query->num_rows()>0){
				return $query->result();
			}
			else return FALSE;
		}

		function fetchAllClassroom(){
			$query = $this->db->get('classroom');
			if($query->num_rows()>0){
				return $query->result();
			}
			else return FALSE;
		}
}
