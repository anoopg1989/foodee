<?php
session_start();
class Notifications extends CI_Controller 
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
			   
			$this->load->model('notification_model');
			
	}
	
		
	public function create_notification()
	{
		$this->load->helper('form');
		
		

		
		
			
			
			$shop = $this->input->post('shop');
			$description = $this->input->post('description');
			$f_date_v = $this->input->post('d_date');
			$f_date = date('Y-m-d',strtotime($f_date_v));
			
			
			$this->notification_model->set_notification($shop,$description,$f_date);
			$data['notifications'] = $this->notification_model->get_notification();		
		
			$this->load->helper('html');
			$this->load->view('pages/notifications', $data);
		
		
		
	}
	
	public function view_notification($pk_id)
	{
		//$pk_id = $this->input->post('pk_id');
		//$country =1;
		$data['notifications'] = $this->notification_model->get_notification($pk_id);
		$this->load->helper('html');
		$this->load->view('pages/notifications', $data);
		//var_dump($data['state']);
		//echo json_encode($data);
		
	}
	
	
	
	
	
	public function delete_notification($pk_id)
	{
		$this->notification_model->delete_notification($pk_id);
		
		$data['notifications'] = $this->notification_model->get_notification();		
		
			$this->load->helper('html');
			$this->load->view('pages/notifications', $data);
		
	}
	
	
}
?>