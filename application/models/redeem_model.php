<?php
class Redeem_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	
	
	
	
	//inserting cntry,state,city,locations
	
	public function set_redeem()
	{
		
	
		
	}
	
	
	//getting values from tables
	public function get_redeem($id = FALSE)
	{
		
		if ($id === FALSE)
		{
			$this->db->select('redeem.*,user.s_name as uname,loyality.s_name as loyalname,loyality.s_img as loyalimage,loyality.i_point as loyalpoint');
			$this->db->from('redeem');
			$this->db->join('user', 'user.pk_id = redeem.fk_i_uid');
			$this->db->join('loyality', 'loyality.pk_id = redeem.fk_i_loyality');
			$this->db->where('redeem.i_status',0);
			$this->db->order_by("redeem.d_date","desc");
			$query = $this->db->get();
			
			return $query->result_array();
			//var_dump($query->result_array());
		}
		
			$this->db->select('redeem.*,user.s_name as uname,loyality.s_name as loyalname,loyality.s_img as loyalimage,loyality.i_point as loyalpoint');
			$this->db->from('redeem');
			$this->db->join('user', 'user.pk_id = redeem.fk_i_uid');
			$this->db->join('loyality', 'loyality.pk_id = redeem.fk_i_loyality');
			$this->db->where('redeem.pk_id',$id);
		
		$query = $this->db->get();
		return $query->row_array();
		
	}
	
	
	
	
	
	
	
	
}
?>