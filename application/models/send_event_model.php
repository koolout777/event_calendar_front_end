<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class send_event_model extends CI_Model
{

	# CodeIgniter reference
	private $CI;

	/**
     * Constructor
   	 * ============================= */
	public function __construct()
	{
		# CodeIgniter
		parent::__construct();

		# Load Database Model
		$this->load->database();

		# Reference CodeIgniter
		$this->CI =& get_instance();
	}
	public function get_event_data($id){
		
		$query = $this->db->get_where('events', array('event_id' => $id));
		return $query->row();
	}
	public function get_details($id){
		
		$this->db->select('*');
	    $this->db->from('events');
	    $this->db->where('event_id',$id);
		$result=$this->db->get();
        return  $result->result_array();
	}
	public function get_all_colleges(){
		$query=$this->db->get('colleges');
		return $query->result_array();
	}
	public function get_college_courses($college_id){
		$this->db->select('*');
	    $this->db->from('college_courses');
	    $this->db->where('college_id',$college_id);
		$result=$this->db->get();
        return  $result->result_array();
	}
	public function get_users_levels($year){
		
		$this->db->select('*');
	    $this->db->from('user_accounts');
		
		if($year==0){}
		elseif ($year==1) {
	        $this->db->where('year',$year);
		}
		elseif ($year==2) {
	        $this->db->where('year',$year);
		}
		elseif ($year==3) {
	        $this->db->where('year',$year);
		}
		elseif ($year==4) {
	        $this->db->where('year',$year);
		}
		elseif ($year==5) {
	        $this->db->where('year',$year);
		}

		$this->db->where('status','ACTIVE');

		$result=$this->db->get();
        return  $result->result_array();
	}
	
	public function get_users_college($college_id){
	
		$result = $this->db->query("SELECT *FROM user_accounts WHERE course in(SELECT course_id FROM college_courses WHERE college_id = '$college_id') AND status='ACTIVE'");
	 	return  $result->result_array();
	}

	public function get_users_college_year($college_id, $year){
	
		$result = $this->db->query("SELECT *FROM user_accounts WHERE course in(SELECT course_id FROM college_courses WHERE college_id = '$college_id') AND status='ACTIVE' AND year='$year'");
	 	return  $result->result_array();
	}

	public function get_users_course($course){

		$this->db->select('*');
	    $this->db->from('user_accounts');
	    $this->db->where('course',$course);
	    $this->db->where('status','ACTIVE');
		$result=$this->db->get();
        return  $result->result_array();
	}

	public function get_users_course_year($course, $year){
	
		$this->db->select('*');
	    $this->db->from('user_accounts');
	    $this->db->where('course',$course);
	   	$this->db->where('year',$year);
	    $this->db->where('status','ACTIVE');
		$result=$this->db->get();
        return  $result->result_array();
	}

	public function get_students($course,$year){
		$this->db->select('*');
	    $this->db->from('user_accounts');
	    $this->db->where('course',$course);
	    $this->db->where('year',$year);
	    $this->db->where('status','ACTIVE');
		$result=$this->db->get();
        return  $result->result_array();
	}
	public function get_specific_student($id_no){
		$this->db->select('*');
	    $this->db->from('user_accounts');
	    $this->db->where('id_no',$id_no);
	    $this->db->where('status','ACTIVE');
		$result=$this->db->get();
        return  $result->result_array();
	}

	public function check_receiver($id_no, $event_id){
		$this->db->select('*');
	    $this->db->from('event_receivers');
	    $this->db->where('event_id',$event_id);
	    $this->db->where('receiver_id',$id_no);
		$result=$this->db->get();
        return  $result->result_array();
	}
	public function get_college($course)
	{
		$result=$this->db->query("SELECT college_id FROM college_courses WHERE course_id = '$course' ");
		return  $result->result_array();
	}

	public function select_suggestion($year, $course){
		$cy=$course."-".$year;
		$colleges= $this->get_college($course);
		foreach ($colleges as $college) {
			$college_name=$college['college_id'];
		}
		
		$result = $this->db->query("SELECT DISTINCT event_id, target FROM event_receivers WHERE target LIKE '$course' OR target LIKE '$cy' or target LIKE '$year' or target LIKE '0' or target LIKE '$college_name' ");
	 	var_dump($result->result_array());
		return  $result->result_array();
	}

	public function send_per_person ($users, $events, $id_no) {
		foreach ($events as $event) {
			$event_id=$event['event_id'];
			$title=$event['event_title'];
			$desc=$event['event_description'];
			$start=$event['event_start_date'];
			$end=$event['event_end_date'];
		}

		foreach ($users as $user) {
			$check=$this->check_receiver($user['id_no'], $event_id);

			if(empty($check)){
	        	$data['event_id']=$event_id;
	        	$data['event_title']=$title;
	        	$data['description']=$desc;
	        	$data['start_date']=$start;
	        	$data['end_date']=$end;
	        	$data['receiver_id']=$user['id_no'];
	        	$data['receiver_name']=$user['fname']." ".$user['lname'];
	        	$data['receiver_course']=$user['course']."-".$user['year'];
	        	$data['target']=$this->session->userdata['target'];
	        	$data['admin_username']=( !empty($this->session->userdata['user_name']) ) ? $this->session->userdata['user_name'] : '' ;
	        	$query = $this->db->insert('event_receivers', $data);
	        	$right=1;
        	}
        	else $right=0;
        }
        return $right;
	}

	public function send_to_levels($id, $year){
		
		$users=$this->get_users_levels($year);
		$events=$this->get_details($id);
		
		if(empty($users)) 
			return 0;
		
		else{
			$result=$this->send_per_person ($users, $events, $id);
			if ($result == 1) return 1;
			else return 3;
		}

	}

	public function send_to_colleges($id, $college_id){
		
		$users=$this->get_users_college($college_id);
		$events=$this->get_details($id);
		
		if(empty($users)) 
			return 0;
		
		else{	
			$result=$this->send_per_person ($users, $events, $id);
			if ($result == 1) return 1;
			else return 3;
		}
		
	}

	public function send_to_college_year($id, $college_id, $year){
		
		$users=$this->get_users_college_year($college_id, $year);
		$events=$this->get_details($id);
		
		if(empty($users)) 
			return 0;
		
		else{	
			$result=$this->send_per_person ($users, $events, $id);
			if ($result == 1) return 1;
			else return 3;
		}
		
	}

	public function send_to_courses($id, $course){
		
		$users=$this->get_users_course($course);
		$events=$this->get_details($id);

		if(empty($users)) 
			return 0;
		else{		
			$result=$this->send_per_person ($users, $events, $id);
			if ($result == 1) return 1;
			else return 3;
		} 
	}

	public function send_to_courses_year($id,$course,$year){
		
		$users=$this->get_users_course_year($course, $year);
		$events=$this->get_details($id);
		
		if(empty($users)) 
			return 0;
		else{		
			$result=$this->send_per_person ($users, $events, $id);
			if ($result == 1) return 1;
			else return 3;
		}
	}

	public function send_students($id_no, $event_id){
		$users=$this->get_specific_student($id_no);
		$events=$this->get_details($event_id);
		
		if(empty($users)) 
			return 0;
		
		else{
			$result=$this->send_per_person ($users, $events, $id_no);
			if ($result == 1) return 1;
			else return 3;
		}
	}
	
	public function send_suggested($year, $course, $id){
		$suggestion=$this->select_suggestion($year, $course);
		$users=$this->get_specific_student($id);

		foreach ($suggestion as $suggested) {
			$this->session->set_userdata( 'target',  $suggested['target']); 
			$events=$this->get_details($suggested['event_id']);
			$result=$this->send_per_person ($users, $events, $id);
		}
	}
}