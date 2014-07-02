<?php
session_start();
class Loyality extends CI_Controller 
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
			$this->load->model('loyality_model');
			
	}
		
	public function create_loyality()
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

		if ( ! $this->upload->do_upload('l_image'))
		{
			$data = array('error_img' => $this->upload->display_errors());
			
			$this->load->helper('url');
			//redirect('/pages/view/add_loyality',$data);
			$this->load->helper('html');
			$this->load->view('pages/add_loyality', $data);
		}
		else
		{
			//var_dump($this->upload->data());
			$data = array('upload_data' => $this->upload->data());
			
			$l_name = $this->input->post('l_name');
			$l_image = $data['upload_data']['file_name'];
			$r_point = $this->input->post('r_point');
			$this->loyality_model->set_loyality($l_name,$l_image,$r_point);
			$data['loyality'] = $this->loyality_model->get_loyality();		
		
			$this->load->helper('html');
			$this->load->view('pages/loyalty_programs', $data);
		}
		/*$l_name = $this->input->post('l_name');
		$l_image = $this->input->post('l_image');
		$r_point = $this->input->post('r_point');
		//echo $l_name;
		$this->loyality_model->set_loyality($l_name,$l_image,$r_point);
		$data['loyality'] = $this->loyality_model->get_loyality();		
		
		$this->load->helper('html');
		$this->load->view('pages/loyalty_programs', $data);*/
		
	}
	
	public function view_loyality($pk_id)
	{
		//$pk_id = $this->input->post('pk_id');
		//$country =1;
		$data['loyality'] = $this->country_model->get_loyality($pk_id);
		//var_dump($data['state']);
		echo json_encode($data);
		
	}
	
	
	
	public function edit_loyality()
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
		$org_img = $_FILES["l_image"]["name"];
		
		if($org_img != "")
		{
			if ( ! $this->upload->do_upload('l_image'))
			{
				$data = array('error_img' => $this->upload->display_errors());
				
				$this->load->helper('url');
				//redirect('/pages/view/add_loyality',$data);
				$this->load->helper('html');
				$pk_id = $this->input->post('input_pk_id');
				$data['edit_loyal'] = $this->loyality_model->get_loyality($pk_id);
				$this->load->view('pages/edit_loyality', $data);
			}
			else
			{
				//var_dump($this->upload->data());
				$data = array('upload_data' => $this->upload->data());
				$pk_id = $this->input->post('input_pk_id');
				$l_name = $this->input->post('l_name');
				$l_image = $data['upload_data']['file_name'];
				$r_point = $this->input->post('r_point');
				$this->loyality_model->update_loyality($pk_id,$l_name,$l_image,$r_point);
				$data['loyality'] = $this->loyality_model->get_loyality();		
			
				$this->load->helper('html');
				$this->load->view('pages/loyalty_programs', $data);
			}
		}
		else
		{
				$pk_id = $this->input->post('input_pk_id');
				
				$l_name = $this->input->post('l_name');
				$l_image = "";
				$r_point = $this->input->post('r_point');
				$this->loyality_model->update_loyality($pk_id,$l_name,$l_image,$r_point);
				$data['loyality'] = $this->loyality_model->get_loyality();		
			
				$this->load->helper('html');
				$this->load->view('pages/loyalty_programs', $data);
		}
		
	}
	
	public function delete_loyality($pk_id)
	{
		$this->loyality_model->delete_loyality($pk_id);
		
		$data['loyality'] = $this->loyality_model->get_loyality();		
		
			$this->load->helper('html');
			$this->load->view('pages/loyalty_programs', $data);
		
	}
	
}
?>