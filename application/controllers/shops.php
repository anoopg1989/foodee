<?php
session_start();
class Shops extends CI_Controller 
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
			$this->load->model('shop_model');
			$this->load->model('country_model');
			
			$this->load->model('category_model');
	}
	
		
	public function create_shop()
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
		
		$org_logo = $_FILES["s_logo"]["name"]; //check logo is available or not.
		//upload logo
		if($org_logo != "")
		{
			if ( $this->upload->do_upload('s_logo'))
			{
				$data = array('upload_data' => $this->upload->data());
				$logo =  $data['upload_data']['file_name'];
				//echo $image;
			}
			else
			{
				$data = array('error_img' => $this->upload->display_errors());
				
				$data['category'] = $this->category_model->get_category();
				$data['city'] = $this->country_model->get_city();
				$data['locations'] = $this->country_model->get_location();
				
				$this->load->helper('url');
				//redirect('/pages/view/add_loyality',$data);
				$this->load->helper('html');
				$this->load->view('pages/add_shop', $data);
			}
		}
		else
		{
			$logo = "";
		}
		
		///update data base
			$name =  $this->input->post('sname');
			$decription =  $this->input->post('decription');
			$detail_description = $this->input->post('detail_description');
			$min_order =  $this->input->post('min_order');
			$min_delivery =  $this->input->post('min_delivery');
			$address = $this->input->post('address');
			
			$shop_selectLocation = $this->input->post('shop_selectLocation');
			
			foreach($this->input->post('shop_deliveryLocation') as $value)
			{
			  // append whatever values are found to the variable
			  $shop_deliveryLocation_values[]= $value;
			}
			//$shop_deliveryLocation_values['values'] = $this->input->post('shop_deliveryLocation');
			
			$shop_deliveryLocation  = implode(",", $shop_deliveryLocation_values);
			
			$lat =  $this->input->post('lat');
			$long = $this->input->post('long');
			$cntct_name = $this->input->post('cntct_name');
			$scnd_cntct_name = $this->input->post('scnd_cntct_name');
						
			$l_phone1 = $this->input->post('l_phone1');
			$l_phone2 = $this->input->post('l_phone2');
			
			//$image =  $data['upload_data']['file_name'];
			//$video = $this->input->post('video');
			$m_phone1 = $this->input->post('m_phone1');
			
			$m_phone2 = $this->input->post('m_phone2');
			$m_phone3 = $this->input->post('m_phone3');
			
			
			$this->shop_model->set_shop($name,$logo,$decription,$detail_description,$min_order,$min_delivery,$address,$shop_selectLocation,$shop_deliveryLocation,$lat,$long,$cntct_name,$scnd_cntct_name,$l_phone1,$l_phone2,$m_phone1,$m_phone2,$m_phone3);
			
			$data['shops'] = $this->shop_model->get_shop();		
		
			$this->load->helper('html');
			$this->load->view('pages/shops', $data);
	}
	
	public function view_shop($pk_id)
	{
		//$pk_id = $this->input->post('pk_id');
		//$country =1;
		$data['shops'] = $this->shop_model->get_shop($pk_id);
		$s_delivery_areas = $data['shops']['s_delivery_areas'];
		$delivery_areas = explode(",", $s_delivery_areas);
		$data['delivery_areas'] = array();
		foreach($delivery_areas as $value)
		{
			 $row_value = array();
		  // append whatever values are found to the variable
		  	 $row_value = $this->country_model->get_location_edit($value);
		 	array_push($data['delivery_areas'], $row_value);
		}
		//$data['delivery_areas'] = $s_delivery_areas;
		
		$this->load->helper('html');
		$this->load->view('pages/shop_view', $data);
		//var_dump($data['state']);
		//echo json_encode($data);
		
	}
	
	
	
	public function edit_shop()
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
		
		$org_img = $_FILES["s_image"]["name"];
		$org_logo = $_FILES["s_logo"]["name"];
		//upload shop image
		if($org_img != "")
		{
			if ( $this->upload->do_upload('s_image'))
			{
				$data = array('upload_data' => $this->upload->data());
				$image =  $data['upload_data']['file_name'];
				//echo $image;
			}
			else
			{
				$data = array('error_img' => $this->upload->display_errors());
				
				$data['category'] = $this->category_model->get_category();
				$data['city'] = $this->country_model->get_city();
				
				$this->load->helper('url');
				//redirect('/pages/view/add_loyality',$data);
				$this->load->helper('html');
				$this->load->view('pages/add_shop', $data);
			}
		}
		else
		{
			$image = "";
		}
		//upload logo
		if($org_logo != "")
		{
			if ( $this->upload->do_upload('s_logo'))
			{
				$data = array('upload_data' => $this->upload->data());
				$logo =  $data['upload_data']['file_name'];
				//echo $image;
			}
			else
			{
				$data = array('error_img' => $this->upload->display_errors());
				
				$data['category'] = $this->category_model->get_category();
				$data['city'] = $this->country_model->get_city();
				
				$this->load->helper('url');
				//redirect('/pages/view/add_loyality',$data);
				$this->load->helper('html');
				$this->load->view('pages/add_shop', $data);
			}
		}
		else
		{
			$logo = "";
		}
		///update data base
		
				$pk_id = $this->input->post('input_pk_id');
				
				
				$name =  $this->input->post('sname');
				$decription =  $this->input->post('decription');
				$cat_name = $this->input->post('cat_name');
				$location = $this->input->post('location');
				
				$lat =  $this->input->post('lat');
				$long = $this->input->post('long');
				$cntct_name = $this->input->post('cntct_name');
				
				$email = $this->input->post('email');
				$phone = $this->input->post('phone');
				
				
				$video = $this->input->post('video');
				$notification1 = $this->input->post('notification1');
				
				$notification2 = $this->input->post('notification2');
				$date_frm = $this->input->post('date_frm');
				$date_to = $this->input->post('date_to');
				
				$f_date = date('Y-m-d',strtotime($date_frm));
				$t_date = date('Y-m-d',strtotime($date_to));
				
				
				
				
				$this->shop_model->update_shop($pk_id,$name,$decription,$logo,$cat_name,$location,$lat,$long,$cntct_name,$email,$phone,$image,$video,$notification1,$notification2,$f_date,$t_date);
				
				
				$data['shops'] = $this->shop_model->get_shop();		
			
				$this->load->helper('html');
				$this->load->view('pages/shops', $data);
		
			
				
		
		
	}
	
	public function delete_shop($pk_id)
	{
		$this->shop_model->delete_shop($pk_id);
		
		$data['shops'] = $this->shop_model->get_shop();		
		
			$this->load->helper('html');
			$this->load->view('pages/shops', $data);
		
	}
	public function hide_shop($pk_id)
	{
		$this->shop_model->hide_shop($pk_id);
		$data['shops'] = $this->shop_model->get_shop();		
		
			$this->load->helper('html');
			$this->load->view('pages/shops', $data);
		
	}
	public function show_shop($pk_id)
	{
		$this->shop_model->show_shop($pk_id);
		$data['shops'] = $this->shop_model->get_shop();		
		
			$this->load->helper('html');
			$this->load->view('pages/shops', $data);
		
	}
	
}
?>