<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Admin extends CI_Controller {
	
	function __construct(){
        parent::__construct();
		$this->load->model('admin_model');
		$this->load->model('Mark_model');
        }

	public function index()
	{	
		redirect('admin/login');
	}
	public function login()
	{	   
		$this->load->view('wrapper_admin'); 
	}
	public function ck_login(){
		$student_id = $this->input->post('student_id');
		$password = $this->input->post('password');		
		$result   = $this->admin_model->user($student_id,$password); 
		$appSetting = $this->admin_model->app_setting();
		if($result)
		{ 
			$sdata = array(
				'id'     =>  $result->id,				
				'student_id'    =>  $result->student_id,
				'password'    =>  $result->password,				
				'isLogin'     =>	TRUE,
				'title'       =>  (!empty($appSetting->title)?$appSetting->title:null),
				'address'     =>  (!empty($appSetting->address)?$appSetting->address:null),
				'footer_text' => (!empty($appSetting->footer_text)?$appSetting->footer_text:null),
			); 

			$this->session->set_userdata($sdata);
                       // $data['user_view'] = $this->admin_model->user_view();
			$this->admin_model->update(array('id'=>$result->id,'last_log_date' => date("Y-m-d h:i:s")));
			redirect('dashboard',$sdata) ;
		}
		else{
			$sdata['exception']='Username/Password Incorrect!';
			$this->session->set_userdata($sdata);
			redirect('admin');
		} 
	}

	// student add 
	public function user_add(){ 
		if($this->session->userdata('isLogin') == FALSE){
			redirect('admin');
		}
		
		
		$this->form_validation->set_rules('student_id','Student ID','required|trim|is_unique[user.student_id]');
		$this->form_validation->set_rules('password','Password','required|trim|md5');
                $this->form_validation->set_rules('re_password', 'Repeat Password', 'required|md5|matches[password]');
		

		if($this->form_validation->run()==TRUE){
			
			$data = array(
				'student_id' => $this->input->post('student_id'),
				'initial' => $this->input->post('initial'),	
				'surname' => $this->input->post('surname'),			
				'password' =>  $this->input->post('password'),
				'gender' => $this->input->post('gender'),				
				'last_log_date' => date("Y-m-d h:i:s"),
				'log_status' => '0'
				); 

			// print_r($data);
			// $this->session->set_userdata($data);
			$this->admin_model->save($data); 
            $this->session->set_flashdata('success', 'Save Sucessfully');
			redirect('admin/user_view');
		}
        else{
			

			$data['content'] = $this->load->view('pages/user_add','',TRUE);
			$this->load->view('wrapper_main',$data);
		}
	}

	// student add end

	// student detais view start
	public function user_view(){ 
		if($this->session->userdata('isLogin') == FALSE ){
			redirect('admin');
		}
		#
		$data['user_view'] = $this->admin_model->user_view();

		
		$data['content'] = $this->load->view('pages/user_view',$data,TRUE);
		$this->load->view('wrapper_main',$data);

	}

	// student detais view end

	public function user_edit($id){ 

		$infoList = $this->admin_model->get_user_info($id);
		$data['informations'] = $infoList[0]  ; 
		$data['content'] = $this->load->view('pages/user_edit',$data,TRUE);
	    $this->load->view('wrapper_main',$data);
	}

	//Update student start
	public function user_update(){ 
		 
			$this->form_validation->set_rules('password','Password','required|trim|md5');
			$this->form_validation->set_rules('re_password', 'Repeat Password', 'required|md5|matches[password]');
          	$this->form_validation->set_rules('surname','Surname','required');    

		if($this->form_validation->run()==TRUE){
			$data = array(
				'id' => $this->input->post('id'),
				'student_id' => $this->input->post('student_id'),
				'initial' => $this->input->post('initial'),	
				'surname' => $this->input->post('surname'),			
				'password' => $this->input->post('password'),
				'gender' => $this->input->post('gender'),
				'last_log_date' => date("Y-m-d h:i:s"),
				'log_status' => '0'
				); 

			// print_r($data);
			$this->admin_model->update($data); 
            $this->session->set_flashdata('success', 'Update Suceessfully');
			redirect('admin/user_view'); 
		} else{
			 $this->session->set_flashdata('error', 'Update Not Suceessfully');
			redirect('admin/user_view'); 		
		}
	} 

	//update student end

	public function old_password($password){ 
		$row = $this->db->where('password',$password)
					->where('id',$this->session->userdata('user_id'))
					->get('user')
					->num_rows(); 
		if($row == 1){  
			return TRUE;
		}else{
			$this->form_validation->set_message('old_password', 'The %s field does not match');
			return FALSE;
		} 
	}

	public function user_delete(){ 
		if($this->session->userdata('isLogin') == FALSE ) {
			redirect('admin');
		}

		$id=$this->uri->segment(3);
		
		$this->admin_model->delete($id);
                $this->session->set_flashdata('success', 'Delete Sucessfully');
		redirect('admin/user_view');
	}

	

	

	public function logout(){ 
		$sdata = array(
			'user_id'   =>  '',
			'fullname'  =>  '',
			'username'  =>  '',
			'password'  =>  '',
			'user_type' =>  '',
			'isLogin'	=>	FALSE
			); 
		$this->session->set_userdata($sdata);
	    $this->session->sess_destroy();
	    redirect('admin');
	} 


	
} 
