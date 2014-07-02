<?php
session_start();
class Category extends CI_Controller 
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
			   
			$this->load->model('category_model');
			
	}
		
	public function create_category()
	{
		$this->load->helper('form');
		
		$attchment_num = str_replace('.', '', microtime(true));
		
		$config['upload_path'] = './assets/uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '8000';
		$config['max_width']  = '600';
		$config['max_height']  = '600';
		$config['file_name']  = $attchment_num;
		
		
		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('c_image'))
		{
			$data = array('error_img' => $this->upload->display_errors());
			
			$this->load->helper('url');
			//redirect('/pages/view/add_loyality',$data);
			$this->load->helper('html');
			$this->load->view('pages/add_category', $data);
		}
		else
		{
			//var_dump($this->upload->data());
			$data = array('upload_data' => $this->upload->data());
			
			$c_name = $this->input->post('c_name');
			$c_image = $data['upload_data']['file_name'];
			
			$this->category_model->set_category($c_name,$c_image);
			$data['category'] = $this->category_model->get_category();		
		
			$this->load->helper('html');
			$this->load->view('pages/categories', $data);
		}
		
		
	}
	
	public function view_category($pk_id)
	{
		//$pk_id = $this->input->post('pk_id');
		//$country =1;
		$data['loyality'] = $this->category_model->get_category($pk_id);
		//var_dump($data['state']);
		//echo json_encode($data);
		
	}
	
	
	
	public function edit_category()
	{
		
		$this->load->helper('form');
		
		$attchment_num = str_replace('.', '', microtime(true));
		
		$config['upload_path'] = './assets/uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '8000';
		$config['max_width']  = '600';
		$config['max_height']  = '600';
		$config['file_name']  = $attchment_num;
		
		
		$this->load->library('upload', $config);
		$org_img = $_FILES["c_image"]["name"];
		
		if($org_img != "")
		{
			if ( ! $this->upload->do_upload('c_image'))
			{
				$data = array('error_img' => $this->upload->display_errors());
				
				$this->load->helper('url');
				//redirect('/pages/view/add_loyality',$data);
				$this->load->helper('html');
				$pk_id = $this->input->post('input_pk_id');
				$data['edit_category'] = $this->category_model->get_category($pk_id);
				$this->load->view('pages/edit_category', $data);
			}
			else
			{
				//var_dump($this->upload->data());
				$data = array('upload_data' => $this->upload->data());
				$pk_id = $this->input->post('input_pk_id');
				$c_name = $this->input->post('c_name');
				$c_image = $data['upload_data']['file_name'];
				$this->category_model->update_category($pk_id,$c_name,$c_image);
				$data['category'] = $this->category_model->get_category();		
			
				$this->load->helper('html');
				$this->load->view('pages/categories', $data);
			}
		}
		else
		{
				$pk_id = $this->input->post('input_pk_id');
				
				$c_name = $this->input->post('c_name');
				$c_image = "";
				
				$this->category_model->update_category($pk_id,$c_name,$c_image);
				$data['category'] = $this->category_model->get_category();		
			
				$this->load->helper('html');
				$this->load->view('pages/categories', $data);
		}
		
	}
	
	public function delete_category($pk_id)
	{
		$this->category_model->delete_category($pk_id);
		
		$data['category'] = $this->category_model->get_category();		
		
			$this->load->helper('html');
			$this->load->view('pages/categories', $data);
		
	}
	public function hide_category($pk_id)
	{
		$this->category_model->hide_category($pk_id);
		$data['category'] = $this->category_model->get_category();		
		
			$this->load->helper('html');
			$this->load->view('pages/categories', $data);
		
	}
	public function show_category($pk_id)
	{
		$this->category_model->show_category($pk_id);
		$data['category'] = $this->category_model->get_category();		
		
			$this->load->helper('html');
			$this->load->view('pages/categories', $data);
		
	}
	
}
?>