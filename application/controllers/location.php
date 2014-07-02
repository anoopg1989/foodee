<?php
session_start();
class Location extends CI_Controller 
{


	public function __construct()
	{
			parent::__construct();
			//admin login checking
			if($this->session->userdata('logged_in'))
			   {
				 //logged in
			   }
			   else
			   {
				 //If no session, redirect to login page
				 redirect('pages/view', 'refresh');
			   }
			$this->load->model('country_model');
			
	}
		
	public function create_country()
	{
		
		$country = $this->input->post('country');
		
		return $this->country_model->set_country($country);
		
	}
	public function create_state()
	{
		
		$country = $this->input->post('country');
		$state = $this->input->post('state');
		
		return $this->country_model->set_state($country,$state);
		
	}
	public function create_city()
	{
		
		$state = $this->input->post('state');
		$city = $this->input->post('city');
		return $this->country_model->set_city($state,$city);
		
	}
	public function create_location()
	{
		
		$city = $this->input->post('city');
		$location = $this->input->post('location');
		return $this->country_model->set_location($city,$location);
		
	}
	public function view_state()
	{
		$country = $this->input->post('country');
		//$country =1;
		$data['state'] = $this->country_model->get_state($country);
		//var_dump($data['state']);
		echo json_encode($data);
		
	}
	public function view_city()
	{
		$state = $this->input->post('state');
		//$country =1;
		$data['city'] = $this->country_model->get_city($state);
		//var_dump($data['state']);
		echo json_encode($data);
		
	}
	public function view_location()
	{
		$city = $this->input->post('city');
		//$country =1;
		$data['location'] = $this->country_model->get_location($city);
		//var_dump($data['state']);
		echo json_encode($data);
		
	}
	
	//edit all loc items
	public function edit_location()
	{
		$type = $this->input->post('type');
		$pk_id = $this->input->post('pk_id');
		$name = $this->input->post('name');
		if($type == 1)
			return $this->country_model->update_country($pk_id,$name);
		else if($type == 2)
			return $this->country_model->update_state($pk_id,$name);
		else if($type == 3)
			return $this->country_model->update_city($pk_id,$name);
		else if($type == 4)
			return $this->country_model->update_location($pk_id,$name);
		
	}
	
}
?>