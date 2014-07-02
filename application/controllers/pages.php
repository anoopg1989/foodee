<?php
session_start();
class Pages extends CI_Controller {

	public function __construct()
		{
			parent::__construct();
			$this->load->model('country_model');
			$this->load->model('loyality_model');
			$this->load->model('category_model');
			$this->load->model('offer_model');
			$this->load->model('shop_model');
			$this->load->model('user_model');
			$this->load->model('settings_model');
			$this->load->model('feedback_model');
			$this->load->model('redeem_model');
			$this->load->model('notification_model');
		}
		
	public function view($page = 'index')
	{
		$page = str_replace('.php', '', $page);
		
		
		
		
		
		
		
			
		if ( ! file_exists(APPPATH.'/views/pages/'.$page.'.php'))
			{
				// Whoops, we don't have a page for that!
				show_404();
			}
		
			//$data['title'] = ucfirst($page); // Capitalize the first letter
			if($page == 'index')
			{
				$data['no_visible_elements']=true;
			}
			else
			{
				
				if($this->session->userdata('logged_in'))
			   {
				 $data['no_visible_elements']=false;
			   }
			   else
			   {
				 //If no session, redirect to login page
				 redirect('pages/view', 'refresh');
			   }
				
			}
			
			if($page == 'add_offer')
				$data['offer_shops'] = $this->offer_model->get_offer_shops();
			
			
			if($page == 'offers')
				$data['offers'] = $this->offer_model->get_offer();
			
			if($page == 'add_shop')
			{
				$data['category'] = $this->category_model->get_category();
				$data['city'] = $this->country_model->get_city();
				$data['locations'] = $this->country_model->get_location();
			}
			
			if($page == 'shops')
				$data['shops'] = $this->shop_model->get_shop();
			
			if($page == 'categories') 
				$data['category'] = $this->category_model->get_category();
			
			if($page == 'locations')
				$data['country'] = $this->country_model->get_country();
			
			if($page == 'loyalty_programs')
				$data['loyality'] = $this->loyality_model->get_loyality();
			
			if($page == 'users')
				$data['users'] = $this->user_model->get_user();	
			
			if($page == 'settings')
				$data['settings'] = $this->settings_model->get_settings();	
			
			if($page == 'feedback')
				$data['feedbacks'] = $this->feedback_model->get_feedback();
					
			if($page == 'redeems')
				$data['redeems'] = $this->redeem_model->get_redeem();
				
			if($page == 'notifications')
				$data['notifications'] = $this->notification_model->get_notification();
				
			if($page == 'add_notification')
			{
				$data['category'] = $this->category_model->get_category();
				
			}
			$this->load->helper('html');
			
			$this->load->view('pages/'.$page, $data);
			
		
		
	}
	public function loc_edit($type,$pk_id)
	{
		$data['type'] = $type;
		if($type == 1) //cntry
			$data['edit_loc'] = $this->country_model->get_country_edit($pk_id);
		else if($type == 2) //state
			$data['edit_loc'] = $this->country_model->get_state_edit($pk_id);
		else if($type == 3) //city
			$data['edit_loc'] = $this->country_model->get_city_edit($pk_id);
		else if($type == 4) //location
			$data['edit_loc'] = $this->country_model->get_location_edit($pk_id);
		$this->load->helper('html');
		$this->load->view('pages/edit_location',$data);
	}
	public function loyality_edit($pk_id)
	{
		
		$data['edit_loyal'] = $this->loyality_model->get_loyality($pk_id);
		$this->load->helper('html');
		$this->load->view('pages/edit_loyality',$data);
	}
	public function category_edit($pk_id)
	{
		
		$data['edit_category'] = $this->category_model->get_category($pk_id);
		$this->load->helper('html');
		$this->load->view('pages/edit_category',$data);
	}
	public function offer_edit($pk_id)
	{
		$data['offer_shops'] = $this->offer_model->get_offer_shops();
		$data['edit_offer'] = $this->offer_model->get_offer($pk_id);
		$this->load->helper('html');
		$this->load->view('pages/edit_offer',$data);
	}
	public function shop_edit($pk_id)
	{
		$data['edit_shop'] = $this->shop_model->get_shop($pk_id);
		$data['category'] = $this->category_model->get_category();
		$data['city'] = $this->country_model->get_city();
		$city = $data['edit_shop']['cpid'];
		$data['location'] = $this->country_model->get_location($city);
		
		$this->load->helper('html');
		$this->load->view('pages/edit_shop',$data);
	}
}
?>