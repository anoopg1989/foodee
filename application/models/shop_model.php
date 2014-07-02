<?php
class Shop_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	
	public function set_shop($name,$logo,$decription,$detail_description,$min_order,$min_delivery,$address,$shop_selectLocation,$shop_deliveryLocation,$lat,$long,$cntct_name,$scnd_cntct_name,$l_phone1,$l_phone2,$m_phone1,$m_phone2,$m_phone3)
	{
		
	
		$tdate = date('Y-m-d H:i:s');
	
		$shop = array(
			's_name' => $name,
			's_logo' => $logo,
			's_description' => $decription,
			's_detail_description' => $detail_description,
			'f_min_order_quantity' => $min_order,
			'i_min_delivery_time' => $min_delivery,
			's_address' => $address,
			'fk_i_location' => $shop_selectLocation,
			's_delivery_areas' => $shop_deliveryLocation,
			'dec_lat' => $lat,
			'dec_lng' => $long,
			's_conatct_name_1' => $cntct_name,
			's_conatct_name_2' => $scnd_cntct_name,
			's_contact_num_1' => $l_phone1,
			's_contact_num_2' => $l_phone2,
			's_contact_num_3' => $m_phone1,
			's_contact_num_4' => $m_phone2,
			's_contact_num_5' => $m_phone3,
			'd_date' => $tdate
		);
	
		return $this->db->insert('shop', $shop);
	}
	
	//update
	public function update_shop($pk_id,$name,$decription,$logo,$cat_name,$location,$lat,$long,$cntct_name,$email,$phone,$image,$video,$notification1,$notification2,$f_date,$t_date)
	{
		$tdate = date('Y-m-d H:i:s');
		if($image != "" && $logo != "")
		{
				$shop = array(
					's_name' => $name,
					's_decription' => $decription,
					's_logo' => $logo,
					'fk_i_category' => $cat_name,
					'fk_i_location' => $location,
					'dec_lat' => $lat,
					'dec_lng' => $long,
					's_cname' => $cntct_name,
					's_email' => $email,
					's_phone' => $phone,
					's_image' => $image,
					's_video' => $video,
					's_notification1' => $notification1,
					's_notification2' => $notification2,
					'd_from' => $f_date,
					'd_to' => $t_date,
					'd_date' => $tdate
				);
		}
		else if($image == '' && $logo != '')
		{
			$shop = array(
					's_name' => $name,
					's_decription' => $decription,
					's_logo' => $logo,
					'fk_i_category' => $cat_name,
					'fk_i_location' => $location,
					'dec_lat' => $lat,
					'dec_lng' => $long,
					's_cname' => $cntct_name,
					's_email' => $email,
					's_phone' => $phone,
					's_video' => $video,
					's_notification1' => $notification1,
					's_notification2' => $notification2,
					'd_from' => $f_date,
					'd_to' => $t_date,
					'd_date' => $tdate
				);
		}
		else if($logo == '' && $image != '')
		{
			$shop = array(
					's_name' => $name,
					's_decription' => $decription,
					'fk_i_category' => $cat_name,
					'fk_i_location' => $location,
					'dec_lat' => $lat,
					'dec_lng' => $long,
					's_cname' => $cntct_name,
					's_email' => $email,
					's_phone' => $phone,
					's_image' => $image,
					's_video' => $video,
					's_notification1' => $notification1,
					's_notification2' => $notification2,
					'd_from' => $f_date,
					'd_to' => $t_date,
					'd_date' => $tdate
				);
		}
		else
		{
			$shop = array(
					's_name' => $name,
					's_decription' => $decription,
					'fk_i_category' => $cat_name,
					'fk_i_location' => $location,
					'dec_lat' => $lat,
					'dec_lng' => $long,
					's_cname' => $cntct_name,
					's_email' => $email,
					's_phone' => $phone,
					's_video' => $video,
					's_notification1' => $notification1,
					's_notification2' => $notification2,
					'd_from' => $f_date,
					'd_to' => $t_date,
					'd_date' => $tdate
				);
		}
		$query = $this->db->where('pk_id', $pk_id);
		$query = $this->db->update('shop', $shop); 
		return true;
	}
	
	
	public function get_shop($id = FALSE)
	{
		$status = 0;
		if($id === FALSE)
		{
			$this->db->select('shop.pk_id as sid,shop.s_name as sname,city.s_name as cityname,location.s_name as lname,shop.i_hide');
			$this->db->from('shop');
			
			$this->db->join('location', 'location.pk_id = shop.fk_i_location');
			$this->db->join('city', 'city.pk_id = location.fk_city');
			$this->db->where('shop.i_status',0);
			$query = $this->db->get();
			
			return $query->result_array();
			
		}
			$this->db->select('shop.*,location.s_name as lname,city.s_name as cname,state.s_name as stname,country.s_name as cntryname');
			$this->db->from('shop');
			$this->db->join('location', 'location.pk_id = shop.fk_i_location');
			$this->db->join('city', 'city.pk_id = location.fk_city');
			$this->db->join('state', 'state.pk_id = city.fk_state');
			$this->db->join('country', 'country.pk_id = state.fk_country');
			$this->db->where('shop.pk_id',$id);
			$query = $this->db->get();
		return $query->row_array();
	}
	
	//delete
	public function delete_shop($id)
	{
		$shop = array(
               	'i_status' => 1
         );
		$query = $this->db->where('pk_id', $id);
		$query = $this->db->update('shop', $shop); 
		return true;
	}
	
	//Hide/Block
	public function hide_shop($id)
	{
		
			 $shop = array(
					'i_hide' => 2
			 );
		
		$query = $this->db->where('pk_id', $id);
		$query = $this->db->update('shop', $shop); 
		return true;
	}
	//show/Unblock
	public function show_shop($id)
	{
		
			 $shop = array(
					'i_hide' => 0
			 );
		
		$query = $this->db->where('pk_id', $id);
		$query = $this->db->update('shop', $shop); 
		return true;
	}
	
}
?>