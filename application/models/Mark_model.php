<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mark_model extends CI_Model{

	function get_student_list(){

        $user=$this->session->userdata('student_id');

        if($user=='admin'){
            $this->db->select('*');        
            $this->db->order_by('id');            
            $query = $this->db->get('user');
            return $query->result();
                        
        }
        else{
            $this->db->select('*');
            $this->db->from('user');            
            $this->db->where('student_id',$user);
            $query = $this->db->get();
            // echo $this->db->last_query();
            if ($query->num_rows() > 0) {

                return $query->result();
            }
                else return false;          
        }      

    }

    function get_student_details($id){
        
        $this->db->select('*');      
        $this->db->where('id', $id);
        $query = $this->db->get('user');        

        if($query->num_rows()>0){
            return $query->row_array();
        }else{
            return false;
        } 
    }

    public function mark_save($data){ 
		 	
		return $this->db->insert('mark',$data);	
		
	}

	function get_marks($student_id)
    {
        $this->db->select('user.*,mark.*');           
        $this->db->join('mark','user.id=mark.student_id');
      	$this->db->where('mark.student_id',$student_id);      
        $query = $this->db->get('user');
        

        if($query->num_rows()>0){
            return $query->result();
        }else{
            return false;
        }


    }

    public function get_student($s_id)
    {
        return $this->db->select('*')
            ->from('user')
            ->where('id', $s_id)
            ->get()
            ->row();
    }


}