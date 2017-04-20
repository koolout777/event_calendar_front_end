<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Events_Model extends CI_Model
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

	public function get_all_data_active($type)
	{
		$this->db->select('*');
	    $this->db->from('events');
	    $this->db->where('event_type',$type);
	     $this->db->where('status','ACTIVE');
		$query=$this->db->get();

		return $query->result();
	}
	public function get_all_data_pending()
	{
		$this->db->where('status', 'PENDING');
		$query=$this->db->get('events');
		return $query->result();
	}
	public function get_all_data_blocked()
	{
		$this->db->where('status', 'BLOCKED');
		$query=$this->db->get('events');
		return $query->result();
	}
	public function get_all_data_assigned()
	{
		$this->db->select('*');
	    $this->db->from('event_receivers');
		$query=$this->db->get();

		return $query->result();
	}
	public function add_event ( $data )
	{
		
		$data['date_added']= date("Y-m-d H:i:s");
		$data['admin_username']=( !empty($this->session->userdata['user_name']) ) ? $this->session->userdata['user_name'] : '' ;

		$result = $this->db->insert('events', $data);
		return $result;
		
	}

	public function check_title( $title )
	{
		#Query
		$result = $this->CI->db->query( "SELECT *FROM events WHERE event_title = '$title'" );

		# Check if row exists
		if( $result->num_rows() >=1 ) 
		{
			return 0;
		} 
		else return 1;
	}

	public function approve_event_acc($id)
	{
		return $this->db->query("UPDATE events SET status='ACTIVE' WHERE event_id='$id'")->result;
	}
	public function block_event_acc($id)
	{
		return $this->db->query("UPDATE events SET status='BLOCKED' WHERE event_id='$id'")->result;
	}
	public function unblock_event_acc($id)
	{
		return $this->db->query("UPDATE events SET status='ACTIVE' WHERE event_id='$id'")->result;
	}
	public function delete($id)
	{
		$this->db->query("DELETE FROM event_receivers WHERE event_id='$id'");
		return $this->db->delete('events', array('event_id' => $id));
	}
	public function delete_assigned($id, $event_id)
	{
		return $this->db->query("DELETE FROM event_receivers WHERE receiver_id='$id' AND event_id='$event_id'")->result;
	}
	public function get_event_data($id){
		
		$query = $this->db->get_where('events', array('event_id' => $id));
		return $query->row();
	}
	public function update_data($id, $data)
	{
		$data['date_added']= date("Y-m-d H:i:s");
		$data['admin_username']=( !empty($this->session->userdata['user_name']) ) ? $this->session->userdata['user_name'] : '' ;
		$this->db->update('events', array('event_title' => $data['event_title'], 'event_description' => $data['event_description'], 'event_type' => $data['event_type'], 'event_start_date' => $data['event_start_date'], 'event_end_date' => $data['event_end_date'], 'admin_username' => $data['admin_username'], 'date_added' => $data['date_added']), array('event_id' => $id));
	}
}