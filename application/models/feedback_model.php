<?php
class Feedback_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	
	
	
	
	//inserting cntry,state,city,locations
	
	public function set_feedback($u_id,$s_id,$bill_id,$bill_amnt,$bonus,$attachment)
	{
		
	
		
	}
	
	
	//getting values from tables
	public function get_feedback($id = FALSE)
	{
		
		if ($id === FALSE)
		{
			$this->db->select('feedback_bill.*,user.s_name as uname,shop.s_name as sname,location.s_name as lname');
			$this->db->from('feedback_bill');
			$this->db->join('user', 'user.pk_id = feedback_bill.fk_i_uid');
			$this->db->join('shop', 'shop.pk_id = feedback_bill.fk_i_shop');
			$this->db->join('location', 'location.pk_id = shop.fk_i_location');
			$this->db->where('feedback_bill.i_status',0);
			$this->db->where('feedback_bill.i_verify',0);
			$query = $this->db->get();
			
			return $query->result_array();
			//var_dump($query->result_array());
		}
		
			$this->db->select('feedback_bill.*,shop.s_name as sname,location.s_name as lname');
			$this->db->from('feedback_bill');
			$this->db->join('shop', 'shop.pk_id = feedback_bill.fk_i_shop');
			$this->db->join('location', 'location.pk_id = shop.fk_i_location');
			$this->db->where('feedback_bill.pk_id',$id);
		
		$query = $this->db->get();
		return $query->row_array();
		
	}
	
	
	
	//update
	public function verify_feedback($id)
	{
		
				$feedback = array(
					'i_verify' => 3
				);
		
		$query = $this->db->where('pk_id', $id);
		$query = $this->db->update('feedback_bill', $feedback); 
		return true;
	}
	
	//delete
	public function delete_feedback($id)
	{
		$feedback = array(
               	'i_status' => 1
         );
		$query = $this->db->where('pk_id', $id);
		$query = $this->db->update('feedback_bill', $feedback); 
		return true;
	}
	
	
	
	
}
?>