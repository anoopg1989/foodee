<?php
class Category_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	
	//inserting cntry,state,city,locations
	
	public function set_category($c_name,$c_img)
	{
		
	
		//$this->load->helper('url');
	
		$category = array(
			's_name' => $c_name,
			's_img' => $c_img
		);
	
		return $this->db->insert('category', $category);
	}
	
	
	//getting values from tables
	public function get_category($id = FALSE)
	{
		
		if ($id === FALSE)
		{
			$query = $this->db->get_where('category', array('i_status' => 0));
			return $query->result_array();
		}
	
		$query = $this->db->get_where('category', array('pk_id' => $id));
		return $query->row_array();
	}
	
	
	
	//update
	public function update_category($id,$c_name,$c_image)
	{
		if($c_image != "")
		{
				$category = array(
					's_name' => $c_name,
					's_img' => $c_image,
					
			 );
		}
		else
		{
			$category = array(
					's_name' => $c_name
			 );
		}
		$query = $this->db->where('pk_id', $id);
		$query = $this->db->update('category', $category); 
		return true;
	}
	
	//delete
	public function delete_category($id)
	{
		$category = array(
               	'i_status' => 1
         );
		$query = $this->db->where('pk_id', $id);
		$query = $this->db->update('category', $category); 
		return true;
	}
	
	//Hide/Block
	public function hide_category($id)
	{
		
			 $category = array(
					'i_hide' => 2
			 );
		
		$query = $this->db->where('pk_id', $id);
		$query = $this->db->update('category', $category); 
		return true;
	}
	//show/Unblock
	public function show_category($id)
	{
		
			 $category = array(
					'i_hide' => 0
			 );
		
		$query = $this->db->where('pk_id', $id);
		$query = $this->db->update('category', $category); 
		return true;
	}
	
	
	
}
?>