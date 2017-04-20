<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admins extends CI_Controller
{
	function __construct(){
		parent:: __construct();

		$this->load->model('admin_model');
	}

	/**
     * Default page
   	 * ============================= */
	function index ()
	{
		# Name of the view to load
		$data['view'] = 'admins';

		# Data of the view
		$data['view_data'] = 0;

		# Load the template
		$this->load->view( 'templateAdmin', $data );

	}

	public function ajax_adminlogin ()
	{
		# Check if request is AJAX
		if ( !$this->input->is_ajax_request() ) show_404();

		# POST variables
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		# Login
		$result = $this->admin_model->admin_login( $username, $password );

		# Set session if success
		if ( is_object($result) )
		{
			$this->session->set_userdata( 'user_id',  $result->admin_id );
			$this->session->set_userdata( 'user_name', $result->username );
			$this->session->set_userdata( 'type', $result->type);

			if ($result->type == 'Root Admin')
				echo 4;
			else 
				echo 1;
		} else {
			echo $result;
		}
	}

	public function ajax_logout ()
	{
		# Check if request is AJAX
		if ( !$this->input->is_ajax_request() ) show_404();

		# Logout
		$this->session->unset_userdata( 'user_id' );
		$this->session->unset_userdata( 'user_name' );
	}
	public function ajax_signup ()
	{
		# Check if request is AJAX
		if ( !$this->input->is_ajax_request() ) show_404();

		# POST variables
		$data = $this->input->post();
		$check_username = $this->admin_model->check_username($data['username']);

		if(strlen($data['username']) < 6){
			echo 2;
		}
		elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
			echo 3;
		}
		else if( !(preg_match( '~[A-Z]~', $data['password']) && preg_match( '~[a-z]~', $data['password']) && preg_match( '~\d~', $data['password']) && (strlen( $data['password']) > 6)) ){
			echo 4;
		}
		else if($check_username == 0){
			echo 5;
		}
		else{
		
			$result = $this->admin_model->signup( $data );
			if($result)
				echo 1;
			else
				echo 0;
		}
	}

	public function get_all_admins_active()
	{
		if ( !$this->input->is_ajax_request() ) return;
		
		# Load Model
		$result = $this->admin_model->get_all_data_active();
		
		# Print JSON
		print json_encode($result);	
	}
	public function get_all_admins_blocked()
	{
		if ( !$this->input->is_ajax_request() ) return;
		
		# Load Model
		$result = $this->admin_model->get_all_data_blocked();
		
		# Print JSON
		print json_encode($result);	
	}
	public function block_admin($id)
	{
		$this->admin_model->block_admin_acc($id);

		#Redirect
		redirect(base_url() . 'admins', 'location');
	}
	public function unblock_admin($id)
	{
		$this->admin_model->unblock_admin_acc($id);

		#Redirect
		redirect(base_url() . 'admins', 'location');
	}
	public function get_data($id)
	{
		$result = $this->admin_model->get_data($id);

		# Return Result
		return $result;
	}
	
	public function delete($id)
	{
		$this->admin_model->delete($id);

		#Redirect
		redirect(base_url() . 'admins', 'location');
	}

	public function delete_multiple()
	{
		foreach($this->input->post('id') as $id){
			$this->admin_model->delete($id);
		}
		#Redirect
		redirect(base_url() . 'admins', 'location');
	}

	public function block_multiple()
	{
		foreach($this->input->post('id') as $id){
			$this->admin_model->block_admin_acc($id);
		}
		#Redirect
		redirect(base_url() . 'admins', 'location');
	}
}