<?php
session_start();
class Settings extends CI_Controller 
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
			$this->load->model('settings_model');
			
	}
	
		
	
	
	public function view_settings()
	{
		//$pk_id = $this->input->post('pk_id');
		//$country =1;
		$data['settings'] = $this->settings_model->get_settings();
		$this->load->helper('html');
		$this->load->view('pages/settings', $data);
		//var_dump($data['state']);
		//echo json_encode($data);
		
	}
	
	
	
	public function edit_bonus_point()
	{
		
		$this->load->helper('form');
		
		
		
		
				$pk_id = $this->input->post('pk_id_bonus');
				
				$rupees = $this->input->post('rupees');
				
			
				$this->settings_model->update_bonus_point($pk_id,$rupees);
				$data['settings'] = $this->settings_model->get_settings();		
			
				$this->load->helper('html');
				$this->load->view('pages/settings', $data);
		
		
	}
	public function edit_coupon_expiry()
	{
		
		$this->load->helper('form');
		
		
		
		
				$pk_id = $this->input->post('pk_id_coupon');
				
				$hours = $this->input->post('hours');
				
			
				$this->settings_model->update_coupon_expiry($pk_id,$hours);
				$data['settings'] = $this->settings_model->get_settings();		
			
				$this->load->helper('html');
				$this->load->view('pages/settings', $data);
		
		
	}
	
	
}
?>