<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_Model extends CI_Model
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
	public function admin_login( $username, $password )
	{
		# Query
		$result = $this->CI->db->query( "SELECT *FROM admin_accounts WHERE username = '$username'" );

		# Check if row exists
		if( !$result->num_rows() == 1 ) return 0;

		$result = $result->row();


		# Hash Password
		$md5_password = md5( $password );

		# Check password
		if ( $md5_password != $result->password ) return 2;
		if($result->status == "BLOCKED") return 3;
	
		# Return success
		return $result;
	}

	public function signup( $data )
	{
		
		# Hash Password
		$data['password'] = md5( $data['password'] );
		$data['date_added']= date("Y-m-d H:i:s");

		$result = $this->db->insert('admin_accounts', $data);
		return $result;
		
	}


	public function check_username( $username )
	{
		#Query
		$result = $this->CI->db->query( "SELECT *FROM admin_accounts WHERE username = '$username'" );

		# Check if row exists
		if( $result->num_rows() >=1 ) 
		{
			return 0;
		} 
		else return 1;
	}
	
	public function get_all_data_active()
	{
		$this->db->where('status', 'ACTIVE');
		$query=$this->db->get('admin_accounts');
		return $query->result();
	}
	public function get_all_data_blocked()
	{
		$this->db->where('status', 'BLOCKED');
		$query=$this->db->get('admin_accounts');
		return $query->result();
	}

	public function block_admin_acc($id)
	{
		return $this->db->query("UPDATE admin_accounts SET status='BLOCKED' WHERE admin_id=$id")->result;
	}
	public function unblock_admin_acc($id)
	{
		return $this->db->query("UPDATE admin_accounts SET status='ACTIVE' WHERE admin_id=$id")->result;
	}
	public function delete($id)
	{
		return $this->db->delete('admin_accounts', array('admin_id' => $id));
	}
	public function get_admin_data($id){
		
		$query = $this->db->get_where('admin_accounts', array('admin_id' => $id));
		return $query->row();
	}
	public function update_data($id, $data)
	{
		$this->db->update('admin_accounts', array('email' => $data['email'], 'password' => md5($data['password'])), array('admin_id' => $id));
	}
}
