<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class send_event extends CI_Controller
{
	function __construct(){
		parent:: __construct();

		$this->load->model('send_event_model');
	}

	/**
     * Default page
   	 * ============================= */
	function index ()
	{
		# Name of the view to load
		$data['view'] = 'send_event';

		# Data of the view
		$data['view_data'] = 0;

		# Load the template
		$this->load->view( 'templateAdmin', $data );

	}
	public function get_data($id)
	{
		$result = $this->send_event_model->get_event_data($id);

		# Return Result
		return $result;
	}

	public function get_event($id)
	{
		$data['event'] = $this->get_data($id);
		$data['colleges'] = $this->send_event_model->get_all_colleges();
		
		#Name of the view to load
		$data['view'] = 'send';

		# Data of the view
		$data['view_data'] = 0;

		# Load the template
		$this->load->view( 'templateAdmin', $data );
	}

	public function send_target()
	{
		$id=$_GET['id'];
		$college=$this->input->post('category');
		$bulk_year=$this->input->post('bulk');

		if ($bulk_year!='' && $college==''){
			$this->session->set_userdata( 'target',  $bulk_year);
			$result=$this->send_event_model->send_to_levels($id,$bulk_year);
		}
		elseif ($college!='' && $bulk_year=='') {
			
			if($college != NULL && $this->input->post('choices') == NULL && $this->input->post('year') == NULL){
				$this->session->set_userdata( 'target',  $college); 
				$result=$this->send_event_model->send_to_colleges($id,$college);
			}

			elseif($college != NULL && $this->input->post('choices') == NULL && $this->input->post('year')!=NULL){
				$this->session->set_userdata( 'target',  $college); 
				$result=$this->send_event_model->send_to_college_year($id,$college,$this->input->post('year'));
			}

			else if($this->input->post('choices') != NULL && $this->input->post('year')==NULL){
				foreach($this->input->post('choices') as $course){
					$this->session->set_userdata( 'target',  $course); 
					$result=$this->send_event_model->send_to_courses($id,$course);
				}
			}

			elseif($this->input->post('choices') != NULL && $this->input->post('year')!=NULL){
				foreach($this->input->post('choices') as $course){
					$target=$course."-".$this->input->post('year');
					$this->session->set_userdata( 'target', $target);
					$result=$this->send_event_model->send_to_courses_year($id,$course,$this->input->post('year'));
				}
			}
		}

		else{
			$result=4;
		}
		
		$this->check_validation($result, $id);	
	}

	public function send_specific()
	{
		$this->session->set_userdata( 'event_id',  $_GET['id']);

		# Name of the view to load
		$data['view'] = 'viewAccounts';

		# Data of the view
		$data['view_data'] = 0;

		# Load the template
		$this->load->view( 'templateAdmin', $data );

	}

	public function send_students()
	{
		$event_id = $this->session->userdata['event_id'];
		$this->session->set_userdata( 'target', 'Specific');
		foreach($this->input->post('id') as $id){
			$result = $this->send_event_model->send_students($id, $event_id);
		}
	}

	public function goback($validation, $id)
	{
		$data['event'] = $this->get_data($id);
		$data['colleges'] = $this->send_event_model->get_all_colleges();
		
		#Name of the view to load
		$data['view'] = 'send';
		$data['validation'] = $validation;

		# Data of the view
		$data['view_data'] = 0;

		# Load the template
		$this->load->view( 'templateAdmin', $data );
	}

	public function check_validation($result, $id){
		if($result == 1){ 
			$validation=1;
			$this->goback($validation, $id);
		}
		else if ($result == 0) {
			$validation=0;
			$this->goback($validation, $id);
		}
		else if ($result == 3) {
			$validation=3;
			$this->goback($validation, $id);
		}
		else if ($result == 4) {
			$validation=4;
			$this->goback($validation, $id);
		}
	}
}