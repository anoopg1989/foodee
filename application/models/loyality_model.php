<?php
class Loyality_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	
	//inserting cntry,state,city,locations
	
	public function set_loyality($l_name,$l_image,$r_point)
	{
		
	
		//$this->load->helper('url');
	
		$loyality = array(
			's_name' => $l_name,
			's_img' => $l_image,
			'i_point' => $r_point,
		);
	
		return $this->db->insert('loyality', $loyality);
	}
	
	
	//getting values from tables
	public function get_loyality($id = FALSE)
	{
		
		if ($id === FALSE)
		{
			$query = $this->db->get_where('loyality',array('i_status' => 0));
			return $query->result_array();
		}
	
		$query = $this->db->get_where('loyality', array('pk_id' => $id));
		return $query->row_array();
	}
	
	
	
	//update
	public function update_loyality($id,$l_name,$l_image,$r_point)
	{
		if($l_image != "")
		{
				$loyality = array(
					's_name' => $l_name,
					's_img' => $l_image,
					'i_point' => $r_point,
			 );
		}
		else
		{
			$loyality = array(
					's_name' => $l_name,
					'i_point' => $r_point,
			 );
		}
		$query = $this->db->where('pk_id', $id);
		$query = $this->db->update('loyality', $loyality); 
		return true;
	}
	
	//delete
	public function delete_loyality($id)
	{
		$loyality = array(
               	'i_status' => 1
         );
		$query = $this->db->where('pk_id', $id);
		$query = $this->db->update('loyality', $loyality); 
		return true;
	}
	
	
	
}
?>