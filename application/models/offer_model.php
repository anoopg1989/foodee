<?php
class Offer_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	
	
	//getting values from shops table with location
	public function get_offer_shops($id = FALSE)
	{
		$this->db->select('shop.pk_id as sid,shop.s_name as sname,location.s_name as lname');
		$this->db->from('shop');
		$this->db->join('location', 'location.pk_id = shop.fk_i_location');
		
		$query = $this->db->get();
		
		return $query->result_array();
	}
	
	
	//inserting cntry,state,city,locations
	
	public function set_offer($precentage,$shop,$f_date,$t_date)
	{
		
	
		//$this->load->helper('url');
	
		$offer = array(
			'fk_i_shop' => $shop,
			'f_precentage' => $precentage,
			'd_from' => $f_date,
			'd_to' => $t_date
		);
	
		return $this->db->insert('offer', $offer);
	}
	
	
	//getting values from tables
	public function get_offer($id = FALSE)
	{
		
		if ($id === FALSE)
		{
			$this->db->select('offer.*,shop.pk_id as sid,shop.s_name as sname,shop.s_image as simage,location.s_name as lname,city.s_name as cname,state.s_name as stname,country.s_name as cntryname');
			$this->db->from('offer');
			$this->db->join('shop', 'shop.pk_id = offer.fk_i_shop');
			$this->db->join('location', 'location.pk_id = shop.fk_i_location');
			$this->db->join('city', 'city.pk_id = location.fk_city');
			$this->db->join('state', 'state.pk_id = city.fk_state');
			$this->db->join('country', 'country.pk_id = state.fk_country');
			$this->db->where('offer.i_status',0);
			$query = $this->db->get();
			
			return $query->result_array();
			//var_dump($query->result_array());
		}
		
		$this->db->select('offer.*,shop.s_name as sname,shop.s_image as simage');
		$this->db->from('offer');
		$this->db->join('shop', 'shop.pk_id = offer.fk_i_shop');
		$this->db->where('offer.pk_id',$id);
		
		$query = $this->db->get();
		//$query = $this->db->get_where('offer', array('pk_id' => $id));
		return $query->row_array();
		//var_dump($query->row_array());
	}
	
	
	
	//update
	public function update_offer($id,$precentage,$shop,$f_date,$t_date)
	{
		
				$offer = array(
					'fk_i_shop' => $shop,
					'f_precentage' => $precentage,
					'd_from' => $f_date,
					'd_to' => $t_date
				);
		
		$query = $this->db->where('pk_id', $id);
		$query = $this->db->update('offer', $offer); 
		return true;
	}
	
	//delete
	public function delete_offer($id)
	{
		$offer = array(
               	'i_status' => 1
         );
		$query = $this->db->where('pk_id', $id);
		$query = $this->db->update('offer', $offer); 
		return true;
	}
	
	//Hide/Block
	public function hide_offer($id)
	{
		
			 $offer = array(
					'i_hide' => 2
			 );
		
		$query = $this->db->where('pk_id', $id);
		$query = $this->db->update('offer', $offer); 
		return true;
	}
	//show/Unblock
	public function show_offer($id)
	{
		
			 $offer = array(
					'i_hide' => 0
			 );
		
		$query = $this->db->where('pk_id', $id);
		$query = $this->db->update('offer', $offer); 
		return true;
	}
	
	
}
?>