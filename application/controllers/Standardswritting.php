<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Standardswritting extends CI_Controller
{

    public function __construct()
    {

        parent::__construct();
        // $this->load->model('Admin/Admin_model');
        $this->load->model('Quiz/quiz_model');
        // $this->load->model('Users/Users_model');
        // $this->load->model('Admin/Wall_of_wisdom_model', 'wow');
        // $this->load->model('Winnerwall/Winnerwall_model');
        $this->load->model('Miscellaneous_Competition/Miscellaneous_competition');
        date_default_timezone_set("Asia/Calcutta");
    }
    public function miscellaneous_dashboard()
    {
        $this->load->view('admin/headers/admin_header');
        $this->load->view('standardwritting/miscellaneous_dashboard');
        $this->load->view('admin/footers/admin_footer');
    }
    public function create_competition_list()
    {
        $data['competition'] = $this->Miscellaneous_competition->getCompetition('0');
       // print_r($data); die;
        $this->load->view('admin/headers/admin_header');
        $this->load->view('standardwritting/create_competition_list',$data);
        $this->load->view('admin/footers/admin_footer');
    }
    public function create_competition_archive()
    {
        $data['competition'] = $this->Miscellaneous_competition->getCompetition('9');
         //print_r($data); die;
        $this->load->view('admin/headers/admin_header');
        $this->load->view('standardwritting/create_competition_archive',$data);
        $this->load->view('admin/footers/admin_footer');
    }
    public function update_status(){
        $data['id']=$this->input->post('id');
        $data['status']=$this->input->post('status');
        $result=$this->Miscellaneous_competition->update_status($data);
        if($result){
            return true;
        }else{
            return false;
        }

    }
    public function create_competition_form()
    {
        $this->load->model('Quiz/Quiz_model');
        $quizlavel = $this->Quiz_model->getQuizLevel();
        $formdataall['quizlavel']=$quizlavel;
        // print_r( $formdataall); die;
        $this->load->view('admin/headers/admin_header');

        if ($this->form_validation->run('create_competition_form_validation_rule') == FALSE) 
        {
        $this->load->view('standardwritting/create_competition_form',$formdataall);
        }else
        {
            print_r($_POST); 
        }

        $this->load->view('admin/footers/admin_footer');
    }
    public function competition_reg(){
        $this->load->model('Quiz/Quiz_model');
        $quizlavel = $this->Quiz_model->getQuizLevel();
        $formdataall['quizlavel']=$quizlavel;
        // print_r($_POST); 
        // print_r($_FILES);
        // die;

        if (!file_exists('uploads/competition/thumbnail')) { mkdir('uploads/competition/thumbnail', 0777, true); }
        if (!file_exists('uploads/competition/prize_img')) { mkdir('uploads/competition/prize_img', 0777, true); }
        $prizepath = 'uploads/competition/prize_img/'; 
        $thumbnailpath = 'uploads/competition/thumbnail/'; 
        if (!empty($_FILES['fprize_image']['tmp_name'])) {
            $fprize_imglocation = $prizepath . time() .'prize_img'. $_FILES['fprize_image']['name']; 
            move_uploaded_file($_FILES['fprize_image']['tmp_name'], $fprize_imglocation); }else{
                $fprize_imglocation ="";
            }
            
        
        if (!empty($_FILES['sprize_image']['tmp_name'])) {
            $sprize_imglocation = $prizepath . time() .'prize_img'. $_FILES['sprize_image']['name']; 
            move_uploaded_file($_FILES['sprize_image']['tmp_name'], $sprize_imglocation); }else{
                $sprize_imglocation ="";
            }
            

        if (!empty($_FILES['tprize_image']['tmp_name'])) {
            $tprize_imglocation = $prizepath . time() .'prize_img'. $_FILES['tprize_image']['name']; 
            move_uploaded_file($_FILES['tprize_image']['tmp_name'], $tprize_imglocation); }else{
                $tprize_imglocation ="";
            }
            
        if (!empty($_FILES['cprize_image']['tmp_name'])) {
            $cprize_imglocation = $prizepath . time() .'prize_img'. $_FILES['cprize_image']['name']; 
            move_uploaded_file($_FILES['cprize_image']['tmp_name'], $cprize_imglocation); }else{
                $cprize_imglocation ="";
            }
            
            // thumbnail
        if (!empty($_FILES['thumbnail']['tmp_name'])) {
            $thumbnail_imglocation = $thumbnailpath . time() .'thumbnail_img'. $_FILES['thumbnail']['name']; 
            move_uploaded_file($_FILES['thumbnail']['tmp_name'], $thumbnail_imglocation); 
        }else{
            $thumbnail_imglocation ="";
        }
           
          //  echo $thumbnail_imglocation; die;
    
            $formdata = array();
          //  $formdata['comp_id'] = date('mdy').$this->random_strings(4);
            $formdata['competiton_name'] = $this->input->post('name');
            $formdata['competition_hindi_name'] = $this->input->post('name_hindi');
            $formdata['description'] = $this->input->post('description');
            $formdata['terms_condition'] = $this->input->post('terms_conditions');
            $formdata['start_date'] = $this->input->post('start_date');
            $formdata['end_date'] = $this->input->post('end_date');
            $formdata['comp_level'] = $this->input->post('competition_level_id');
            $formdata['region'] = $this->input->post('Region');
            $formdata['branch'] = $this->input->post('Branch');
            $formdata['available_for'] = $this->input->post('Available');
            $formdata['thumbnail'] = $thumbnail_imglocation;
            $formdata['status'] = "0";

       
            $formdata1 = array();
            $formdata1['fprize_no']=$this->input->post('fprize');            
            $formdata1['fprize_name']=$this->input->post('fdetail');
            $formdata1['fprize_image']=$fprize_imglocation;

            $formdata1['sprize_no']=$this->input->post('sprize');            
            $formdata1['sprize_name']=$this->input->post('sdetail');
            $formdata1['sprize_image']=$sprize_imglocation;

            $formdata1['tprize_no']=$this->input->post('tprize');            
            $formdata1['tprize_name']=$this->input->post('tdetail');
            $formdata1['tprize_image']=$tprize_imglocation;

            $formdata1['cprize_no']=$this->input->post('cprize');            
            $formdata1['cprize_name']=$this->input->post('cdetail');
            $formdata1['cprize_image']=$cprize_imglocation;

           $this->load->model('Miscellaneous_Competition/Miscellaneous_competition');
           $comp_id = $this->Miscellaneous_competition->insertCompetition($formdata);
           // $id = $this->Miscellaneous_competition->insertCompPrizes($formdata1);
           
            if($comp_id){
                $formdata1['competitionn_id']=$comp_id;
                $id = $this->Miscellaneous_competition->insertCompPrizes($formdata1);
                // print_r($formdata1);
                // die;
                if($id){
                    echo "success";
                    $this->session->set_flashdata('MSG', ShowAlert("Record Inserted Successfully", "SS"));
                    redirect(base_url() . "Standardswritting/create_competition_list", 'refresh');
                }else{
                    $this->session->set_flashdata('MSG', ShowAlert("Something went wrong", "SS"));
                    redirect(base_url() . "Standardswritting/create_competition_list", 'refresh');
                }
            } 

    }
    public function competition_edit(){
        print_r($_POST); 
        print_r($_FILES); 
       // die;

        if (!file_exists('uploads/competition/thumbnail')) { mkdir('uploads/competition/thumbnail', 0777, true); }
        if (!file_exists('uploads/competition/prize_img')) { mkdir('uploads/competition/prize_img', 0777, true); }
        $prizepath = 'uploads/competition/prize_img/'; 
        $thumbnailpath = 'uploads/competition/thumbnail/'; 
        if (!empty($_FILES['fprize_image']['tmp_name'])) {
            $fprize_imglocation = $prizepath . time() .'prize_img'. $_FILES['fprize_image']['name']; 
            move_uploaded_file($_FILES['fprize_image']['tmp_name'], $fprize_imglocation); }else{
                $fprize_imglocation =$this->input->post('fold_image');
            }

            echo $fprize_imglocation;
            die;
        

    }
    public function create_competition_edit($id)
    {
        $data['competition'] = $this->Miscellaneous_competition->viewCompetition($id);
        // print_r($data); die;
        $this->load->view('admin/headers/admin_header');
        $this->load->view('standardwritting/create_competition_edit',$data);
        $this->load->view('admin/footers/admin_footer');
    }
    public function view_competition($id){
        $data['quizdata'] = $this->Miscellaneous_competition->viewCompetition($id);
        // print_r($data); die;
        $this->load->view('admin/headers/admin_header');
        $this->load->view('standardwritting/view_competition',$data);
        $this->load->view('admin/footers/admin_footer');
    }
    public function manage_competition_list()
    {
        $data['competition']=$this->Miscellaneous_competition->manageCompetition();
        $this->load->view('admin/headers/admin_header');
        $this->load->view('standardwritting/manage_competition_list',$data);
        $this->load->view('admin/footers/admin_footer');
    }
    public function ongoing_competition_list()
    {
        $data['competition']=$this->Miscellaneous_competition->ongoingCompetition();
        $this->load->view('admin/headers/admin_header');
        $this->load->view('standardwritting/ongoing_competition_list',$data);
        $this->load->view('admin/footers/admin_footer');
    }
    public function closed_competition_list()
    {   
        $data['competition']=$this->Miscellaneous_competition->closedCompetition();
       // print_r($data); die;
        $this->load->view('admin/headers/admin_header');
        $this->load->view('standardwritting/closed_competition_list',$data);
        $this->load->view('admin/footers/admin_footer');
    }
    public function revised_competition_list()
    {
        $this->load->view('admin/headers/admin_header');
        $this->load->view('standardwritting/revised_competition_list');
        $this->load->view('admin/footers/admin_footer');
    }
    public function standard_writting_dashboard()
    {
        $this->load->view('admin/headers/admin_header');
        $this->load->view('standardwritting/standard_writting_dashboard');
        $this->load->view('admin/footers/admin_footer');
    }
    public function create_standard_list()
    {
        $this->load->view('admin/headers/admin_header');
        $this->load->view('standardwritting/create_standard_list');
        $this->load->view('admin/footers/admin_footer');
    }
    public function create_standard_archive()
    {
        $this->load->view('admin/headers/admin_header');
        $this->load->view('standardwritting/create_standard_archive');
        $this->load->view('admin/footers/admin_footer');
    }
    public function create_standard_form()
    {
        $this->load->view('admin/headers/admin_header');
        $this->load->view('standardwritting/create_standard_form');
        $this->load->view('admin/footers/admin_footer');
    }
    public function create_standard_edit()
    {
        $this->load->view('admin/headers/admin_header');
        $this->load->view('standardwritting/create_standard_edit');
        $this->load->view('admin/footers/admin_footer');
    }
    public function manage_standard_list()
    {
        $this->load->view('admin/headers/admin_header');
        $this->load->view('standardwritting/manage_standard_list');
        $this->load->view('admin/footers/admin_footer');
    }
    public function ongoing_standard_list()
    {
        $this->load->view('admin/headers/admin_header');
        $this->load->view('standardwritting/ongoing_standard_list');
        $this->load->view('admin/footers/admin_footer');
    }
    public function closed_standard_list()
    {
        $this->load->view('admin/headers/admin_header');
        $this->load->view('standardwritting/closed_standard_list');
        $this->load->view('admin/footers/admin_footer');
    }
    public function revised_standard_list()
    {
        $this->load->view('admin/headers/admin_header');
        $this->load->view('standardwritting/revised_standard_list');
        $this->load->view('admin/footers/admin_footer');
    }
    public function view_standards()
    {
        $this->load->view('admin/headers/admin_header');
        $this->load->view('standardwritting/view_standards');
        $this->load->view('admin/footers/admin_footer');
    }
    public function submission_view()
    {
        $this->load->view('admin/headers/admin_header');
        $this->load->view('standardwritting/submission_view');
        $this->load->view('admin/footers/admin_footer');
    }
    public function assign_review()
    {
        $this->load->view('admin/headers/admin_header');
        $this->load->view('standardwritting/assign_review');
        $this->load->view('admin/footers/admin_footer');
    }
    public function task_under_review()
    {
        $this->load->view('admin/headers/admin_header');
        $this->load->view('standardwritting/task_under_review');
        $this->load->view('admin/footers/admin_footer');
    }
    public function task_reviewed()
    {
        $this->load->view('admin/headers/admin_header');
        $this->load->view('standardwritting/task_reviewed');
        $this->load->view('admin/footers/admin_footer');
    }
 

}
