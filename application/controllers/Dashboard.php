<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	 
	public function __construct() {
         parent::__construct();
          if($this->session->userdata('isLogin') == FALSE){redirect('admin');}
          $this->load->model('dashboard_model');  
          $this->load->model('Mark_model');
          $this->load->model('Admin_model');
        } 

	public function index(){ 
            if($this->session->userdata('isLogin') == FALSE)
             {
                redirect('admin');
             } 


            $log_status=$this->session->userdata('id') ;
            $student_list = $this->Admin_model->get_log_status($log_status);

            
            if($student_list=='0'){
                $infoList = $this->Admin_model->get_user_info($log_status);
                $data['informations'] = $infoList[0]  ; 

                // print_r( $data['informations']);
                $data['content'] = $this->load->view('pages/password_edit',$data,true);
            }
            else{

              $data['data_list'] = null;

              $data['student_list'] = $student_list = $this->Mark_model->get_student_list();  
    
               $data['content'] = $this->load->view('dashboard',$data,true);
               

            }

            $this->load->view('wrapper_main',$data);
        
        
	}

    public function load_marks(){

        $data['data_list'] = null;
        $data['student_list'] = $student_list = $this->Mark_model->get_student_list();

        $student_id=$this->input->post('student_id');
        $data['data_list'] = $this->Mark_model->get_marks($student_id);

        // print_r($data['data_list']);

        $data['content'] = $this->load->view('dashboard',$data,true);
        $this->load->view('wrapper_main',$data);

    } 

    public function update_password(){

      $this->form_validation->set_rules('password','Password','required|trim|md5');
      $this->form_validation->set_rules('re_password', 'Repeat Password', 'required|md5|matches[password]');

      if($this->form_validation->run()==TRUE){
      $data = array(
        'id' => $this->input->post('id'),
        'password' => $this->input->post('password'),
        'last_log_date' => date("Y-m-d h:i:s"),
        'log_status' => '1'
        ); 

      // print_r($data);
        $this->Admin_model->update($data); 
            $this->session->set_flashdata('success', 'Update Suceessfully');
        redirect('dashboard'); 
      } else{
        $this->session->set_flashdata('error', 'Update Not Suceessfully');
        redirect('dashboard');    
      }
    }
}
