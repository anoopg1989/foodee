<?php
class Country_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	
	//inserting cntry,state,city,locations
	
	public function set_country($cntry_name)
	{
		
	
		//$this->load->helper('url');
	
		$cntry = array(
			's_name' => $cntry_name
		);
		
		return $this->db->insert('country', $cntry);
	}
	public function set_state($cntry_id,$state_name)
	{
		
	
			
		$state = array(
			'fk_country' => $cntry_id,
			's_name' => $state_name
		);
		
		return $this->db->insert('state', $state);
	}
	
	public function set_city($state_id,$city_name)
	{
		
	
			
		$city = array(
			'fk_state' => $state_id,
			's_name' => $city_name
		);
	
		return $this->db->insert('city', $city);
	}
	
	public function set_location($city_id,$loc_name)
	{
		
	
			
		$loaction = array(
			'fk_city' => $city_id,
			's_name' => $loc_name
		);
	
		return $this->db->insert('location',$loaction);
	}
	
	
	//getting values from tables
	public function get_country($id = FALSE)
	{
		
		if ($id === FALSE)
		{
			$query = $this->db->get('country');
			return $query->result_array();
		}
	
		$query = $this->db->get_where('country', array('pk_id' => $id));
		return $query->row_array();
	}
	public function get_country_edit($id)
	{
		$query = $this->db->get_where('country', array('pk_id' => $id));
		return $query->row_array();
	}
	public function get_state($id = FALSE)
	{
		
		if ($id === FALSE)
		{
			$query = $this->db->get('state');
			return $query->result_array();
		}
	
		$query = $this->db->get_where('state', array('fk_country' => $id));
		return $query->result_array();
	}
	public function get_state_edit($id)
	{
		$query = $this->db->get_where('state', array('pk_id' => $id));
		return $query->row_array();
	}
	public function get_city($id = FALSE)
	{
		
		if ($id === FALSE)
		{
			$query = $this->db->get('city');
			return $query->result_array();
		}
	
		$query = $this->db->get_where('city', array('fk_state' => $id));
		return $query->result_array();
	}
	public function get_city_edit($id)
	{
		$query = $this->db->get_where('city', array('pk_id' => $id));
		return $query->row_array();
	}
	public function get_location($id = FALSE)
	{
		
		if ($id === FALSE)
		{
			$query = $this->db->get('location');
			return $query->result_array();
		}
	
		$query = $this->db->get_where('location', array('fk_city' => $id));
		return $query->result_array();
	}
	public function get_location_edit($id)
	{
		$query = $this->db->get_where('location', array('pk_id' => $id));
		return $query->row_array();
	}
	
	//update loactions
	public function update_country($id,$name)
	{
		$data = array(
               's_name' => $name
         );
		$query = $this->db->where('pk_id', $id);
		$query = $this->db->update('country', $data); 
		return $query->row_array();
	}
	public function update_state($id,$name)
	{
		$data = array(
               's_name' => $name
         );
		$query = $this->db->where('pk_id', $id);
		$query = $this->db->update('state', $data); 
		return $query->row_array();
	}
	public function update_city($id,$name)
	{
		$data = array(
               's_name' => $name
         );
		$query = $this->db->where('pk_id', $id);
		$query = $this->db->update('city', $data); 
		return $query->row_array();
	}
	public function update_location($id,$name)
	{
		$data = array(
               's_name' => $name
         );
		$query = $this->db->where('pk_id', $id);
		$query = $this->db->update('location', $data); 
		return $query->row_array();
	}
	
	
}
?>