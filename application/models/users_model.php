<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users_Model extends CI_Model
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

	public function get_all_data_active()
	{
		$this->db->where('status', 'ACTIVE');
		$query=$this->db->get('user_accounts');
		return $query->result();
	}
	public function get_all_data_pending()
	{
		$this->db->where('status', 'PENDING');
		$query=$this->db->get('user_accounts');
		return $query->result();
	}
	public function get_all_data_blocked()
	{
		$this->db->where('status', 'BLOCKED');
		$query=$this->db->get('user_accounts');
		return $query->result();
	}

	public function get_user($id)
	{
		$this->db->select('*');
	    $this->db->from('user_accounts');
	    $this->db->where('id_no',$id);
		$result=$this->db->get();
        return  $result->result_array();
	}

	public function verifyusername( $username )
	{
		#Query
		$result = $this->CI->db->query( "SELECT username FROM user_accounts WHERE username = '$username'" );

		# Check if row exists
		if( !$result->num_rows() == 1 ) 
		{
			return 0;
		} 
		return 1;
	}

	public function signup( $data )
	{
		# Hash Password
		$data['last_login']= date("Y-m-d H:i:s");
		
		$result = $this->db->insert('user_accounts', $data);
		return $result;	
	}
	public function approve_users_acc($id)
	{
		$data = array('status' => 'ACTIVE');
		return $this->db->update('user_accounts', $data, array('id_no' => $id));	
	}
	public function block_users_acc($id)
	{
		return $this->db->query("UPDATE user_accounts SET status='BLOCKED' WHERE id_no='$id'")->result;
	}
	public function unblock_users_acc($id)
	{
		return $this->db->query("UPDATE user_accounts SET status='ACTIVE' WHERE id_no='$id'")->result;
	}
	public function delete($id)
	{
		return $this->db->delete('user_accounts', array('id_no' => $id));
	}

}