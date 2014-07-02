<?php
class User_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	
	
		
	 public function admin_login($username,$password)
	 {
	   $this -> db -> select('username, password');
	   $this -> db -> from('admin');
	   $this -> db -> where('username', $username);
	   $this -> db -> where('password', MD5($password));
	   $this -> db -> limit(1);
	
	   $query = $this -> db -> get();
	
	   if($query -> num_rows() == 1)
	   {
		 return $query->result();
	   }
	   else
	   {
		 return false;
	   }
	 }
	//getting values from tables
	public function get_user($id = FALSE)
	{
		
		if ($id === FALSE)
		{
			$this->db->select('user.*,user_type.s_type as type');
			$this->db->from('user');
			$this->db->join('user_type', 'user_type.pk_id = user.fk_i_type');
			$this->db->where('user.i_status',0);
			$query = $this->db->get();
			
			return $query->result_array();
			//var_dump($query->result_array());
		}
		
		$this->db->select('user.*,user_type.s_type as type');
		$this->db->from('user');
		$this->db->join('user_type', 'user_type.pk_id = user.fk_i_type');
		$this->db->where('user.pk_id',$id);
		
		$query = $this->db->get();
		//$query = $this->db->get_where('offer', array('pk_id' => $id));
		return $query->row_array();
		//var_dump($query->row_array());
	}
	
	
	
	
	//delete
	public function delete_user($id)
	{
		$user = array(
               	'i_status' => 1
         );
		$query = $this->db->where('pk_id', $id);
		$query = $this->db->update('user', $user); 
		return true;
	}
	
	//Hide/Block
	public function hide_user($id)
	{
		
			 $user = array(
					'i_hide' => 2
			 );
		
		$query = $this->db->where('pk_id', $id);
		$query = $this->db->update('user', $user); 
		return true;
	}
	//show/Unblock
	public function show_user($id)
	{
		
			 $user = array(
					'i_hide' => 0
			 );
		
		$query = $this->db->where('pk_id', $id);
		$query = $this->db->update('user', $user); 
		return true;
	}
	
	
}
?>