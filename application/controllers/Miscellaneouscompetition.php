<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Miscellaneouscompetition extends CI_Controller
{

    public function __construct()
    {

        parent::__construct();
        // $this->load->model('Admin/Admin_model');
        // $this->load->helper('comman_fun_helper');
        // $this->load->model('Quiz/quiz_model');
        // $this->load->model('Standardswritting/Standardswritting_model');
        // $this->load->model('Users/Users_model');
        // $this->load->model('Admin/Wall_of_wisdom_model', 'wow');
        // $this->load->model('Winnerwall/Winnerwall_model');
        $this->load->model('Miscellaneous_Competition/Miscellaneous_competition');
        date_default_timezone_set("Asia/Calcutta");
    }

    public function task_recevied_list()
    {
        //print_r($_SESSION); die;
        $data = array();
        $admin_id= encryptids("D", $_SESSION['admin_id']);
        $abc=$this->Miscellaneous_competition->getAdminUserid($admin_id);
        //echo $abc;
        // print_r($abc); die;
        //$data['admin_id'] = $admin_id;
        $data['records']=$this->Miscellaneous_competition->SubmissionForReview($abc['user_uid']);
    //    print_r($data); die;
        $this->load->view('admin/headers/admin_header');
        $this->load->view('admin/task_recevied_list',$data);
        $this->load->view('admin/footers/admin_footer');
    }
    public function task_reviewed()
    {
        $this->load->view('admin/headers/admin_header');
        $this->load->view('admin/task_reviewed');
        $this->load->view('admin/footers/admin_footer');
    }
    public function task_recevied_view($id)
    {
       $revirw_id = encryptids("D", $id);
    //    echo $revirw_id ; die;
       $data['records_details']=$this->Miscellaneous_competition->CompSubmittedRecordDetail($revirw_id);
        // print_r($data); die;
        $this->load->view('admin/headers/admin_header');
        $this->load->view('admin/task_recevied_view',$data);
        $this->load->view('admin/footers/admin_footer');
    }
    public function submitScore(){
        $data1['id']=$this->input->post('id');
        $data1['comment']=$this->input->post('comment');
        $data1['score']=$this->input->post('score');
        $data1['status']="3";
        $res=$this->Miscellaneous_competition->updateCompetitionScore($data1);
        echo $res;
    }
    public function evaluator_dashboard(){
        $this->load->view('admin/headers/admin_header');
        $this->load->view('EvaluatorForCompetition/evaluator_dashboard');
        $this->load->view('admin/footers/admin_footer');
    }
    public function viewRecord($id){
        $revirw_id = encryptids("D", $id);    
       $data['records_details']=$this->Miscellaneous_competition->CompSubmittedRecordDetail($revirw_id);  
    //    print_r($data); die;      
        $this->load->view('admin/headers/admin_header');
        $this->load->view('EvaluatorForCompetition/viewReviewedRecord',$data);
        $this->load->view('admin/footers/admin_footer');
    }
}