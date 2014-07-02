<?php
class Notification_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	
	
	
	
	//inserting cntry,state,city,locations
	
	public function set_notification($sid,$description,$d_date)
	{
		
		$notification = array(
			'fk_i_sid' => $sid,
			's_description' => $description,
			'd_date' => $d_date,
		);
	
		return $this->db->insert('notifications', $notification);
		
	}
	
	
	//getting values from tables
	public function get_notification($id = FALSE)
	{
		
		if ($id === FALSE)
		{
			$this->db->select('notifications.*,shop.s_name as sname,location.s_name as lname');
			$this->db->from('notifications');
			$this->db->join('shop', 'shop.pk_id = notifications.fk_i_sid');
			$this->db->join('location', 'location.pk_id = shop.fk_i_location');
			$this->db->where('notifications.i_status',0);
			$this->db->order_by("notifications.d_date","desc");
			$query = $this->db->get();
			
			return $query->result_array();
			//var_dump($query->result_array());
		}
		
			$this->db->select('notifications.*,shop.s_name as sname,location.s_name as lname');
			$this->db->from('notifications');
			$this->db->join('shop', 'shop.pk_id = notifications.fk_i_sid');
			$this->db->join('location', 'location.pk_id = shop.fk_i_location');
			$this->db->where('notifications.pk_id',$id);
		
		$query = $this->db->get();
		return $query->row_array();
		
	}
	
	
	public function delete_notification($pk_id)
	{
		$notification = array(
               	'i_status' => 1
         );
		$query = $this->db->where('pk_id', $id);
		$query = $this->db->update('notifications', $notification); 
		return true;
	}
	
	
	
}
?>