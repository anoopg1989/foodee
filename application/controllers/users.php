<?php
session_start();
class Users extends CI_Controller 
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
			$this->load->model('user_model');
			
	}
	
		
	
	
	public function view_user($pk_id)
	{
		//$pk_id = $this->input->post('pk_id');
		//$country =1;
		
		$data['users'] = $this->user_model->get_user($pk_id);
		$this->load->helper('html');
		$this->load->view('pages/user_view', $data);
		//var_dump($data['state']);
		//echo json_encode($data);
		
	}
	
	
	
	
	
	public function delete_user($pk_id)
	{
		$this->user_model->delete_user($pk_id);
		
		$data['users'] = $this->user_model->get_user();		
		
			$this->load->helper('html');
			$this->load->view('pages/users', $data);
		
	}
	public function hide_user($pk_id)
	{
		$this->user_model->hide_user($pk_id);
		$data['users'] = $this->user_model->get_user();		
		
			$this->load->helper('html');
			$this->load->view('pages/users', $data);
		
	}
	public function show_user($pk_id)
	{
		$this->user_model->show_user($pk_id);
		$data['users'] = $this->user_model->get_user();		
		
			$this->load->helper('html');
			$this->load->view('pages/users', $data);
		
	}
	
}
?>