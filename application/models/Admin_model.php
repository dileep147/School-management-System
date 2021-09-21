<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends CI_Model{
	
	public function user($student_id,$password){ 
		return	$this->db->select('*') 
			->from('user') 
			->where('student_id',$student_id) 
			->where('password',MD5($password))			 
			->where('active',1) 
			->get() 
			->row();
	} 
	
	public function user_view(){ 
		return	$this->db->select('*') 
			->from('user')			 
			->get() 
			->result();
	} 

	public function user_by_id($user_id){ 
	return	$this->db->select('*') 
			->from('user')  
			->where('id',$user_id) 
			->where('active',1) 
			->get() 
			->row();
	} 
	
	public function check_user(){ 
		return	$this->db->select('*') 
			->from('user')   
			->get() 
			->num_rows();
	} 

	public function save($data){ 
		 	
		return $this->db->insert('user',$data);
		// return $this->db->insert_id();
		
	}

	public function get_user_info($id){
		return $this->db->select('user.*')
			->from('user')			
			->where('id',$id)
			->get()
			->result(); 
	} 

	public function update($data){
		
        $this->db->where('id', $data['id']);
        $this->db->update('user', $data);     
		
	}

	public function delete($id){ 
		return $this->db->where('id',$id)
            ->delete('user');
	} 
	
	public function app_setting()
	{ 
		return	$this->db->select('*') 
			->from('setting')  
			->get() 
			->row();
	} 

	public function app_setting_update($data){ 
		return	$this->db->where('id',$data['id'])
					->update('setting',$data);
	} 

	

	public function get_log_status($id){
   
        return $this->db->select('*')
            ->from('user')
            ->where('id', $id)
            ->get()
            ->row()->log_status;
    }

    public function user_last_id(){
   
        return $this->db->select('*')
            ->from('user')
            ->order_by('id','desc')
            ->limit(1)
            ->get()
            ->row()->log_status;
    }
       
} 