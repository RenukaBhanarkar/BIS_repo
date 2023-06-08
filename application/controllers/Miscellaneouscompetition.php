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
        $data = array();
        $admin_id= encryptids("D", $_SESSION['admin_id']);
        $abc=$this->Miscellaneous_competition->getAdminUserid($admin_id);
        $data['records']=$this->Miscellaneous_competition->evaluatedSubmissionsByEvaluator($abc['user_uid']);
        // print_r($data); die;
        $this->load->view('admin/headers/admin_header');
        $this->load->view('admin/task_reviewed',$data);
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
    public function CompetitionUnderReview(){
        $data['competition']=$this->Miscellaneous_competition->reviewCompetition();
        // print_r($data); die;
        $this->load->view('admin/headers/admin_header');
        $this->load->view('admin/competition_under_review',$data);
        $this->load->view('admin/footers/admin_footer');
    }
    public function CompetitionReviewed(){
        $data['competition']=$this->Miscellaneous_competition->CompetitionReviewed();
        // print_r($data); die;
        $this->load->view('admin/headers/admin_header');
        $this->load->view('admin/competition_reviewed');
        $this->load->view('admin/footers/admin_footer');
    }
    public function thanks(){
        $this->load->view('users/headers/header');
        $this->load->view('users/standard_writting_thanks');
        $this->load->view('users/footers/footer');
    }
    public function addDummyCompRecord($id){
        $i=1;
        $uid=2212274963;
        while($i < $id){
            

            $data['user_id']=$uid;
            $data['competiton_id']="C060623vzde";
            $data['answer_text']="answer text";
            $data['image']="uploads/competition/response_images/1685366899comp_response_img1234.jpg";
            $data['score']="0";
            $data['status']="0";
            $data['evaluator']="";

            $res=$this->Miscellaneous_competition->addDummyCompRecord($data);
            if($res){

            }else{
                die;
            }

            $uid=$uid+1;
            $i++;
        }
    }
    public function bulkassign($id){
        $data['competition']=$this->Miscellaneous_competition->SubmittedCompetition2($id);
        print_r($_POST); 
        echo count($_POST['evaluator']); die;
    }
}