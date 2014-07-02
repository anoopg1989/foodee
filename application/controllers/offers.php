<?php
session_start();
class Offers extends CI_Controller 
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
			$this->load->model('offer_model');
			
	}
	
		
	public function create_offer()
	{
		$this->load->helper('form');
		
		

		
		
			
			$precentage = $this->input->post('precentage');
			$shop = $this->input->post('shop');
			$f_date_v = $this->input->post('f_date');
			$t_date_v = $this->input->post('t_date');
			$f_date = date('Y-m-d',strtotime($f_date_v));
			$t_date = date('Y-m-d',strtotime($t_date_v));
			
			$this->offer_model->set_offer($precentage,$shop,$f_date,$t_date);
			$data['offers'] = $this->offer_model->get_offer();		
		
			$this->load->helper('html');
			$this->load->view('pages/offers', $data);
		
		
		
	}
	
	public function view_offer($pk_id)
	{
		//$pk_id = $this->input->post('pk_id');
		//$country =1;
		$data['offers'] = $this->offer_model->get_offer($pk_id);
		$this->load->helper('html');
		$this->load->view('pages/offers_view', $data);
		//var_dump($data['state']);
		//echo json_encode($data);
		
	}
	
	
	
	public function edit_offer()
	{
		
		$this->load->helper('form');
		
		
		
		
				$pk_id = $this->input->post('input_pk_id');
				
				$precentage = $this->input->post('precentage');
				$shop = $this->input->post('shop');
				
				$f_date_v = $this->input->post('f_date');
				$t_date_v = $this->input->post('t_date');
				$f_date = date('Y-m-d',strtotime($f_date_v));
				$t_date = date('Y-m-d',strtotime($t_date_v));
			
				$this->offer_model->update_offer($pk_id,$precentage,$shop,$f_date,$t_date);
				$data['offers'] = $this->offer_model->get_offer();		
			
				$this->load->helper('html');
				$this->load->view('pages/offers', $data);
		
		
	}
	
	public function delete_offer($pk_id)
	{
		$this->offer_model->delete_offer($pk_id);
		
		$data['offers'] = $this->offer_model->get_offer();		
		
			$this->load->helper('html');
			$this->load->view('pages/offers', $data);
		
	}
	public function hide_offer($pk_id)
	{
		$this->offer_model->hide_offer($pk_id);
		$data['offers'] = $this->offer_model->get_offer();		
		
			$this->load->helper('html');
			$this->load->view('pages/offers', $data);
		
	}
	public function show_offer($pk_id)
	{
		$this->offer_model->show_offer($pk_id);
		$data['offers'] = $this->offer_model->get_offer();		
		
			$this->load->helper('html');
			$this->load->view('pages/offers', $data);
		
	}
	
}
?>