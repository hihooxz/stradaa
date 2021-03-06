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
    $this->db->order_by('date_insert','DESC');
    $query = $this->db->get('schedule');
    if($query->num_rows()>0){
      return $query->result();
    }
    else return FALSE;
  }
  function countAllschedule() {
    return $this->db->count_all("schedule");
  }
  function lastScheduleInserted(){
  	$this->db->join('class','schedule.id_class = class.id_class');
	$this->db->join('subject','schedule.id_subject = subject.id_subject');
	$this->db->join('classroom','schedule.id_classroom = classroom.id_classroom');
    $this->db->order_by('date_insert','DESC');
    $query = $this->db->get('schedule');
    if($query->num_rows()>0){
      return $query->row_array();
    }
    else return FALSE;
  }
  function saveSchedule($data){
    $array = array(
				'id_class' => $data['class'],
				'id_subject' => $data['subject'],
				'id_classroom' => $data['classroom'],
        		'name_schedule' => $data['name_schedule'],
        		'hour_start' => $data['hour_start'],
				'hour_end' => $data['hour_end'],
				'date_schedule' => date('Y-m-d',strtotime($data['date_schedule'])),
				'date_insert' => date('Y-m-d')
      );
    $this->db->insert('schedule',$array);

    // save pengawas
    $pengawas[1] = $this->mod->getDataWhere('user','username',$data['pengawas1']);
    $pengawas[2] = $this->mod->getDataWhere('user','username',$data['pengawas2']);

    // get last schedule
    $schedule = $this->lastScheduleInserted();
    for($i=1;$i<=2;$i++){
    	if($pengawas[$i]!=""){
	    	$array2 = array(
	    			'id_user' => $pengawas[$i]['id_user'],
	    			'role' => $i,
	    			'id_schedule' => $schedule['id_schedule']
	    		);
	    	$this->db->insert('teacher',$array2);
    	}
    }
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


      // save pengawas
    $pengawas[1] = $this->mod->getDataWhere('user','username',$data['pengawas1']);
    $pengawas[2] = $this->mod->getDataWhere('user','username',$data['pengawas2']);

    for($i=1;$i<=2;$i++){
    	if($pengawas[$i]!=""){
    		$teacher = $this->getTeacher($id,$i);
    		if($teacher!=FALSE){
	    	$array2 = array(
	    			'id_user' => $pengawas[$i]['id_user'],
	    		);
	    	$this->db->where('id_schedule',$id);
	    	$this->db->where('role',$i);
	    	$this->db->update('teacher',$array2);
	    	}
	    	else{
	    		$array2 = array(
	    			'id_user' => $pengawas[$i]['id_user'],
	    			'id_schedule' => $id,
	    			'role' => $i
	    		);
	    		$this->db->insert('teacher',$array2);
	    	}
    	}
    }
      return 1;
    }
    function getTeacher($id_schedule,$role){
    	$this->db->where('id_schedule',$id_schedule);
	    $this->db->where('role',$role);
	    $query = $this->db->get('teacher');
	    if($query->num_rows()>0){
	    	return $query->row_array();
	    }
	    else return FALSE;
    }
		function fetchScheduleSearch($data) {
			$this->db->like($data['by'],$data['search']);
			$this->db->join('class','schedule.id_class = class.id_class');
			$this->db->join('subject','schedule.id_subject = subject.id_subject');
			$this->db->join('classroom','schedule.id_classroom = classroom.id_classroom');
			$this->db->order_by('date_insert','DESC');
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
		function fetchTeacher($id){
			$this->db->join('user','user.id_user = teacher.id_user');
			$this->db->where('id_schedule',$id);
			$this->db->order_by('role','ASC');
			$query = $this->db->get('teacher');
			if($query->num_rows()>0){
				return $query->result();
			}
			else return FALSE;
		}
	function fetchScheduleStudent($id){
			$this->db->join('class','schedule.id_class = class.id_class');
			$this->db->join('student','student.id_class = class.id_class');
			$this->db->join('subject','schedule.id_subject = subject.id_subject');
			$this->db->join('classroom','schedule.id_classroom = classroom.id_classroom');
			$this->db->where('student.id_user',$id);
			$this->db->order_by('date_schedule','ASC');
			$this->db->order_by('hour_start','ASC');
			$query = $this->db->get('schedule');
			if($query->num_rows()>0){
				return $query->result();
			}
			else return FALSE;
	}
	function fetchScheduleTeacher($id){
			$this->db->join('class','schedule.id_class = class.id_class');
			$this->db->join('teacher','teacher.id_schedule = schedule.id_schedule');
			$this->db->join('subject','schedule.id_subject = subject.id_subject');
			$this->db->join('classroom','schedule.id_classroom = classroom.id_classroom');
			$this->db->where('teacher.id_user',$id);
			$this->db->order_by('date_schedule','ASC');
			$this->db->order_by('hour_start','ASC');
			$query = $this->db->get('schedule');
			if($query->num_rows()>0){
				return $query->result();
			}
			else return FALSE;
	}
}
