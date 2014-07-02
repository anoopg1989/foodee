<?php
session_start();
class Feedback extends CI_Controller 
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
			   
			$this->load->model('feedback_model');
			
	}
		
	public function create_feedback()
	{
		
		
	}
	
	public function view_feedback($pk_id)
	{
		//$pk_id = $this->input->post('pk_id');
		//$country =1;
		$data['feedbacks'] = $this->feedback_model->get_feedback($pk_id);
		//var_dump($data['state']);
		//echo json_encode($data);
		
	}
	
	
	
	public function verify_feedback($pk_id)
	{
		$this->feedback_model->verify_feedback($pk_id);
		$data['feedbacks'] = $this->feedback_model->get_feedback();		
		
			$this->load->helper('html');
			$this->load->view('pages/feedback', $data);
	}
	
	public function delete_feedback($pk_id)
	{
		$this->feedback_model->delete_feedback($pk_id);
		
		$data['feedbacks'] = $this->feedback_model->get_feedback();		
		
			$this->load->helper('html');
			$this->load->view('pages/feedback', $data);
		
	}
	
	
}
?>