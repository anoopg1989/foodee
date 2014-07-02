<?php
class Settings_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	
	
	//getting all values from setting table
	public function get_settings()
	{
		$query = $this->db->get('setting');
		return $query->result_array();
	}
	
	
	//update Bonus Point value
	public function update_bonus_point($id,$rupees)
	{
		
				$settings = array(
					's_value' => $rupees
				);
		
		$query = $this->db->where('pk_id', $id);
		$query = $this->db->update('setting', $settings); 
		return true;
	}
	
	//update coupon expiry time
	public function update_coupon_expiry($id,$hours)
	{
		
				$settings = array(
					's_value' => $hours
				);
		
		$query = $this->db->where('pk_id', $id);
		$query = $this->db->update('setting', $settings); 
		return true;
	}
	
	
	
	
}
?>