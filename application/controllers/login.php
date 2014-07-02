<?php
session_start();
class Login extends CI_Controller 
{


	public function __construct()
	{
			parent::__construct();
			$this->load->model('user_model');
			
	}
	
		
	
	
	public function login_procees()//admin login
	{
		
		$this->load->helper('form');
		$u_name = $this->input->post('username');
		$pass = $this->input->post('password');
		$result = $this->user_model->admin_login($u_name,$pass);
		if($result)
	    {
		 
		 foreach($result as $row)
		 {
			 $username = $row->username;
		     $this->session->set_userdata('logged_in', $username);
		 }
		 redirect('pages/view/dashboard', 'refresh');
	   }
	   else
	   {
		
			$this->load->helper('html');
			$data['no_visible_elements']=true;
			$this->load->view('pages/index',$data);
		 
	   }
		
		
	}
	public function logout()
	 {
	   $this->session->unset_userdata('logged_in');
	   session_destroy();
	   redirect('pages/view/dashboard', 'refresh');
	 }
	
	
	
	
}
?>