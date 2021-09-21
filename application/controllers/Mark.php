<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Mark extends CI_Controller
{
	public function __construct()
    {
        parent::__construct();
        $user_id = $this->session->userdata('student_id');
        if ($user_id == NULL) {
            redirect('admin');
        }

        $this->load->model('Admin_model'); 
        $this->load->model('Mark_model');       
    }

    public function add_marks()
    {
        
        $data['student_list'] = $student_list = $this->Mark_model->get_student_list();
        $data['informations'] = (object) array('id' => '');

        $data['content'] = $this->load->view('pages/add_marks', $data, TRUE);
        $this->load->view('wrapper_main', $data);
    }

    public function get_student_details()
    {
        $student_id = $_REQUEST['student_id'];
        $data = $this->Mark_model->get_student_details($student_id);
        echo json_encode($data);
        die();
    }

    public function mark_save(){

         $student_id = $this->input->post('student_id');
         $grade = $this->input->post('grade');
         $maths = $this->input->post('maths');
         $english = $this->input->post('english');
         $science = $this->input->post('science');


         $saveData = array(
            'student_id' => $student_id,
            'grade' => $grade,
            'maths' => $maths,
            'english' => $english,
            'science' => $science,
        );

        $sucess =  $this->Mark_model->mark_save($saveData);


        if ($sucess) {
            $this->session->set_flashdata('success', 'Recorded Succesfully');
        } else {
            $this->session->set_flashdata('success', 'Error');
        }


        redirect('mark/add_marks');
    }
}