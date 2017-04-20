<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller
{
	function __construct(){
		parent:: __construct();

		$this->load->model('users_model');
		$this->load->model('send_event_model');
	}
	/**
     * Default page
   	 * ============================= */
	function index ()
	{
		# Name of the view to load
		$data['view'] = 'users';

		# Data of the view
		$data['view_data'] = 0;

		# Load the template
		$this->load->view( 'templateAdmin', $data );
	}

	public function get_all_users_active()
	{
		if ( !$this->input->is_ajax_request() ) return;
		
		# Load Model
		$result = $this->users_model->get_all_data_active();
		
		# Print JSON
		print json_encode($result);	
	}
	public function get_all_users_pending()
	{
		if ( !$this->input->is_ajax_request() ) return;
		
		# Load Model
		$result = $this->users_model->get_all_data_pending();
		
		# Print JSON
		print json_encode($result);	
	}
	public function get_all_users_blocked()
	{
		if ( !$this->input->is_ajax_request() ) return;
		
		# Load Model
		$result = $this->users_model->get_all_data_blocked();
		
		# Print JSON
		print json_encode($result);	
	}

	public function ajax_signup ()
	{
		# Check if request is AJAX
		if ( !$this->input->is_ajax_request() ) show_404();

		# POST variables
		$data = $this->input->post();

		# Signup
		
		$result = $this->users_model->signup( $data );
		if($result)
			echo 1;
		else
			echo 0;
	}
	public function approve_user($id)
	{
		$this->users_model->approve_users_acc($id);

		$users=$this->users_model->get_user($id);

		foreach ($users as $user) {
			$year=$user['year'];
			$course=$user['course'];
		}

		$this->send_event_model->send_suggested($year, $course, $id);
		redirect(base_url() . 'users', 'location');
	}

	public function block_user($id)
	{
		$this->users_model->block_users_acc($id);

		#Redirect
		redirect(base_url() . 'users', 'location');
	}
	public function unblock_user($id)
	{
		$this->users_model->unblock_users_acc($id);

		#Redirect
		redirect(base_url() . 'users', 'location');
	}
	public function delete_user($id)
	{
		$this->users_model->delete($id);

		#Redirect
		redirect(base_url() . 'users', 'location');
	}
	
	public function delete_multiple()
	{
		foreach($this->input->post('id') as $id){
			$this->users_model->delete($id);
		}
		#Redirect
		redirect(base_url() . 'users', 'location');
	}

	public function approve_multiple()
	{
		foreach($this->input->post('id') as $id){
			$this->users_model->approve_users_acc($id);
			$users=$this->users_model->get_user($id);

			foreach ($users as $user) {
				$year=$user['year'];
				$course=$user['course'];
			}

			$this->send_event_model->send_suggested($year, $course, $id);
		}
		#Redirect
		redirect(base_url() . 'users', 'location');
	}
}