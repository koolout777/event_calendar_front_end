<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class view_account extends CI_Controller
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
		$data['userid']   = ( !empty($this->session->userdata['user_id']) ) ? $this->session->userdata['user_id'] : '' ;
		$id=$data['userid'];

		$data['admin'] = $this->get_admin($id);


		#Name of the view to load
		$data['view'] = 'viewAdminAccount';

		# Data of the view
		$data['view_data'] = 0;

		# Load the template
		$this->load->view( 'templateAdmin', $data );

	}
	public function get_admin($id)
	{
		$result = $this->admin_model->get_admin_data($id);

		# Return Result
		return $result;
	}
	
	public function update($id)
	{
		# Fetch POST data
		$data = $this->input->post();

		if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
			$validation=0;
		}
		else if( !(preg_match( '~[A-Z]~', $data['password']) && preg_match( '~[a-z]~', $data['password']) && preg_match( '~\d~', $data['password']) && (strlen( $data['password']) > 6)) ){
			$validation=2;
		}
		else{
			$this->admin_model->update_data($id, $data);
			$validation=1;
		}		

		$this->success_load($validation);
	}

	public function success_load($validation)
	{
		$data['userid']   = ( !empty($this->session->userdata['user_id']) ) ? $this->session->userdata['user_id'] : '' ;
		$id=$data['userid'];

		$data['admin'] = $this->get_admin($id);
		$data['validation']=$validation;


		#Name of the view to load
		$data['view'] = 'viewAdminAccount';

		# Data of the view
		$data['view_data'] = 0;

		# Load the template
		$this->load->view( 'templateAdmin', $data );
	}

 }
