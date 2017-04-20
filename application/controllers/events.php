<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Events extends CI_Controller
{
	function __construct(){
		parent:: __construct();

		$this->load->model('events_model');
	}

	/**
     * Default page
   	 * ============================= */
	function index ()
	{
		# Name of the view to load
		$data['view'] = 'events';

		# Data of the view
		$data['view_data'] = 0;

		# Load the template
		$this->load->view( 'templateAdmin', $data );

	}

	public function get_all_events_active()
	{
		$type=$_GET['type'];
		if ( !$this->input->is_ajax_request() ) return;
		
		# Load Model
		$result = $this->events_model->get_all_data_active($type);
		
		# Print JSON
		print json_encode($result);	
	}
	public function get_all_events_pending()
	{
		if ( !$this->input->is_ajax_request() ) return;
		
		# Load Model
		$result = $this->events_model->get_all_data_pending();
		
		# Print JSON
		print json_encode($result);	
	}
	public function get_all_events_blocked()
	{
		if ( !$this->input->is_ajax_request() ) return;
		
		# Load Model
		$result = $this->events_model->get_all_data_blocked();
		
		# Print JSON
		print json_encode($result);	
	}
	public function get_all_events_assigned()
	{
		if ( !$this->input->is_ajax_request() ) return;
		
		# Load Model
		$result = $this->events_model->get_all_data_assigned();
		
		# Print JSON
		print json_encode($result);	
	}

	public function ajax_addevent ()
	{
		# Check if request is AJAX
		if ( !$this->input->is_ajax_request() ) show_404();

		# POST variables
		$data = $this->input->post();
		$check_title = $this->events_model->check_title($data['event_title']);
		$start=$data['event_start_date'];
		$end=$data['event_end_date'];

		if(strlen($data['event_title']) < 6 || strlen($data['event_description']) < 10){
			echo 2;
		}

		else if($check_title == 0){
			echo 4;
		}

		elseif (strtotime($start) <= time() && strtotime($end) <= time()) {
			echo 3;
		}

		elseif (strtotime($start) > strtotime($end) && strtotime($end) < strtotime($start) ) {
			echo 3;
		}
		
		else{
		
			$result = $this->events_model->add_event( $data );
			if($result)
				echo 1;
			else
				echo 0;
		}
	}
	public function approve_event($id)
	{
		$this->events_model->approve_event_acc($id);

		#Redirect
		redirect(base_url() . 'events', 'location');
	}
	public function block_event($id)
	{
		$this->events_model->block_event_acc($id);

		#Redirect
		redirect(base_url() . 'events', 'location');
	}
	public function unblock_event($id)
	{
		$this->events_model->unblock_event_acc($id);

		#Redirect
		redirect(base_url() . 'events', 'location');
	}
	public function delete_event($id)
	{
		$this->events_model->delete($id);

		#Redirect
		redirect(base_url() . 'events', 'location');
	}
	public function delete_assigned($id, $event_id)
	{

		$this->events_model->delete_assigned($id, $event_id);

		#Redirect
		redirect(base_url() . 'events', 'location');
	}
	
	public function delete_multiple()
	{
		foreach($this->input->post('id') as $id){
			$this->events_model->delete($id);
		}
		#Redirect
		redirect(base_url() . 'events', 'location');
	}

	public function approve_multiple()
	{
		foreach($this->input->post('id') as $id){
			$this->events_model->approve_event_acc($id);
		}
		#Redirect
		redirect(base_url() . 'events', 'location');
	}

	public function get_event($id)
	{
		$result = $this->events_model->get_event_data($id);

		# Return Result
		return $result;
	}
	public function edit($id)
	{
		$data['event'] = $this->get_event($id);

		#Name of the view to load
		$data['view'] = 'editEvent';

		# Data of the view
		$data['view_data'] = 0;

		# Load the template
		$this->load->view( 'templateAdmin', $data );
	}
	
	public function update($id)
	{
		# Fetch POST data
		$data = $this->input->post();
		//$check_title = $this->events_model->check_title($data['event_title']);
		$start=$data['event_start_date'];
		$end=$data['event_end_date'];
		echo $data['event_type'];

		if(strlen($data['event_title']) < 6 || strlen($data['event_description']) < 10){
			$validation=0;
		}
		/*else if($check_title == 0){
			$validation=3;
		}*/
		elseif (strtotime($start) <= time() && strtotime($end) <= time()) {
			$validation=2;
		}
		elseif (strtotime($start) > strtotime($end) && strtotime($end) < strtotime($start) ) {
			$validation=2;
		}

		else {
			$this->events_model->update_data($id, $data);
			$validation=1;
		}	

		$data['event'] = $this->get_event($id);
		$data['validation']=$validation;
		#Name of the view to load
		$data['view'] = 'editEvent';

		# Data of the view
		$data['view_data'] = 0;

		# Load the template
		$this->load->view( 'templateAdmin', $data );
	}


}