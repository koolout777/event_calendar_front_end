<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Adminlogin extends CI_Controller
{

	/**
     * Constructor
   	 * ============================= */
	public function __construct ()
	{
		# CodeIgniter
		parent::__construct();
               
		# Load Model
		$this->load->model('admin_model');
	}
	/**
     * Default page
   	 * ============================= */
	function index ()
	{

		$this->load->view( 'adminLogin' );
	}
	/**
	 * Logins via AJAX
	 * ============================= */
	
}			