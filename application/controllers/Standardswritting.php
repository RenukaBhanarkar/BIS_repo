<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Standardswritting extends CI_Controller
{ 

    public function __construct()
    { 

        parent::__construct();
        $this->load->model('Admin/Admin_model');
        $this->load->helper('comman_fun_helper');
        $this->load->model('Quiz/quiz_model');
        $this->load->model('Standardswritting/Standardswritting_model');
        $this->load->model('Quiz/Quiz_model');

        $this->load->model('Miscellaneous_Competition/Miscellaneous_competition');
        date_default_timezone_set("Asia/Calcutta");
    }
    public function miscellaneous_dashboard()
    {
        $this->load->view('admin/headers/admin_header');
        $this->load->view('standardwritting/miscellaneous_dashboard');
        $this->load->view('admin/footers/admin_footer');
    }
    public function review_competition_dashboard()
    {
        $this->load->view('admin/headers/admin_header');
        $this->load->view('standardwritting/review_competition_dashboard');
        $this->load->view('admin/footers/admin_footer');
    }
    public function view_submission_competition($id)
    {
        $data['competition']=$this->Miscellaneous_competition->SubmittedCompetition2($id);
        $data['evaluators']=$this->Miscellaneous_competition->evaluators($id);
        //  print_r($data);die;
        $this->load->view('admin/headers/admin_header');
        $this->load->view('standardwritting/view_submission_competition',$data);
        $this->load->view('admin/footers/admin_footer');
    }
    public function assign_eveluator(){
      //  $t = date();
        $current_time = date("Y-m-d H:i:s");
        // $formdata['id']=$this->input->post('submission_id');
        $formdata['user_id']=$this->input->post('user_id');
        $formdata['competiton_id']=$this->input->post('comp_id');
        $formdata['evaluator']=$this->input->post('evaluator');
        $formdata['status']="2";
        $formdata['ev_assigned_on']=$current_time;

        $res=$this->Miscellaneous_competition->update_evaluator($formdata);
        if($res){
            echo "1";
           // return true;
        }else{
            echo "0";
          //  return false;
        }

    }
    public function view_submitted_comp_response($id){
        $data['response']=$this->Miscellaneous_competition->attemptResponse($id);
       // print_r($data); die;
        $this->load->view('admin/headers/admin_header');
        $this->load->view('standardwritting/view_submitted_comp_response',$data);
        $this->load->view('admin/footers/admin_footer');
    }
    public function standard_submission_competition()
    {
        $this->load->view('admin/headers/admin_header');
        $this->load->view('standardwritting/standard_submission_competition');
        $this->load->view('admin/footers/admin_footer');
    }
    public function Competition_Reviewed_list()
    {
        $this->load->view('admin/headers/admin_header');
        $this->load->view('standardwritting/Competition_Reviewed_list');
        $this->load->view('admin/footers/admin_footer');
    }
    public function Competition_Under_Review_list()
    {
        $this->load->view('admin/headers/admin_header');
        $this->load->view('standardwritting/Competition_Under_Review_list');
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
       // print_r($_POST); die;
        $data['comp_id']=$this->input->post('id');
        $data['status']=$this->input->post('status');
        if(isset($_POST['reject_reason'])){
            $data['reject_reason']=$this->input->post('reject_reason');
        }
        $result=$this->Miscellaneous_competition->update_status($data);
        if($result){
            return true;
        }else{
            return false;
        }

    }
    public function update_competition_status(){
        try {
            $comp_id = $this->input->post('id');    
            $status = $this->input->post('status');
          // echo $img_name;
           // $prize_id = $this->input->post('prize_id'); 
            $data = array(
                'comp_id' => $comp_id,            
                'review_status'=>$status,
            );
            //print_r($data); die;
            $id = $this->Miscellaneous_competition->update_competition_status($data);
            if ($id) {
                $data['status'] = 1;
                $data['message'] = 'Competition Send for reviewed successfully.';
                // if($img_name){
                //     @unlink($img_name);
                // }
    
            } else {
                $data['status'] = 0;
                $data['message'] = 'Failed to delete, Please try again.';
            }
            echo  json_encode($data);
            return true;
        } catch (Exception $e) {
            echo json_encode([
                'status' => 'error',
                'message' => $e->getMessage(),
            ]);
            return true;
        }
    }
    public function delete_comp(){
        try {
            $comp_id = $this->input->post('id');    
            $img_name = $this->input->post('img_name');
          // echo $img_name;
           // $prize_id = $this->input->post('prize_id'); 
            $data = array(
                'comp_id' => $comp_id,            
               
            );
            //print_r($data); die;
            $id = $this->Miscellaneous_competition->delete_comp($data);
            if ($id) {
                $data['status'] = 1;
                $data['message'] = 'Competition deleted successfully.';
                if($img_name){
                    @unlink($img_name);
                }
    
            } else {
                $data['status'] = 0;
                $data['message'] = 'Failed to delete, Please try again.';
            }
            echo  json_encode($data);
            return true;
        } catch (Exception $e) {
            echo json_encode([
                'status' => 'error',
                'message' => $e->getMessage(),
            ]);
            return true;
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
    public function getAllStates(){
       // $region_id = $this->input->post('id');
        $this->load->model('Miscellaneous_Competition/Miscellaneous_competition');
    
        $details = array();
        $details = $this->Miscellaneous_competition->getAllStates();
        if (empty($details)) {
            $data['status'] = 0;
            $data['message'] = 'Failed to get details , Please try again.';
            $data['states'] = $details;
        } else {
            $data['status'] = 1;
            $data['message'] = 'Details Available.';
            $data['states'] = $details;
        }
        echo  json_encode($data);
        exit();
       }
    public function competition_reg(){
        $this->load->model('Quiz/Quiz_model');
        $quizlavel = $this->Quiz_model->getQuizLevel();
        $formdataall['quizlavel']=$quizlavel;
        
     //print_r($_POST); 
        // print_r($formdata);
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
          
              $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
    
            $formdata = array();
           // $formdata['comp_id'] = date('mdy').$this->random_strings(4);
          // $formdata['comp_id'] = date('mdy').random_strings(4);
            $formdata['comp_id'] = 'C'.date('mdy').substr(str_shuffle($str_result), 0, 4 );
            $formdata['competiton_name'] = $this->input->post('name');
            $formdata['competition_hindi_name'] = $this->input->post('name_hindi');
            $formdata['description'] = $this->input->post('description');
            $formdata['terms_condition'] = $this->input->post('terms_conditions');
            $formdata['start_date'] = $this->input->post('start_date');
            $formdata['end_date'] = $this->input->post('end_date');
            $formdata['comp_level'] = $this->input->post('quiz_level_id');
            $formdata['type'] = $this->input->post('comp_type');
            $formdata['score'] = $this->input->post('score');
            $formdata['available_for'] = $this->input->post('Available');
            $formdata['thumbnail'] = $thumbnail_imglocation;
            $formdata['status'] = "0";

            if($this->input->post('Available')== 1){               
                $standard = $this->input->post('standard');  
                $formdata['standard'] = implode(',',$standard);    
            }else{
                $formdata['standard'] = 0;
            }

            $start = $this->input->post('start_time');
            $formdata['start_time'] = date("H:i:s", strtotime($start));
            $end = $this->input->post('end_time');
            $formdata['end_time'] = date("H:i:s", strtotime($end));

            if($this->input->post('quiz_level_id')== 1){
                $formdata['region'] = 0;   
                $formdata['branch'] = 0;    
                $formdata['state'] = 0;          
            }
            if($this->input->post('quiz_level_id')== 2){               
                $formdata['region'] = $this->input->post('region_id');
                $formdata['branch'] = 0; 
                $formdata['state'] = 0;
            }
            if($this->input->post('quiz_level_id')== 3){
                $formdata['region'] = 0;   
                $formdata['state'] = 0;
                $formdata['branch'] = $this->input->post('branch_id');
            }
            if($this->input->post('quiz_level_id')== 4){
                $formdata['region'] = 0;   
                $formdata['branch']= 0;
                $formdata['state'] = $this->input->post('state_id');
            }

       
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
                
                $res=$this->Miscellaneous_competition->getCompId($comp_id);
               // print_r($res); die;
                $formdata1['competitionn_id']=$res['comp_id'];
                $id = $this->Miscellaneous_competition->insertCompPrizes($formdata1);
                // print_r($formdata1);
                // die;
                if($id){
                   // echo "success";
                    $this->session->set_flashdata('MSG', ShowAlert("Record Inserted Successfully", "SS"));
                    redirect(base_url() . "Standardswritting/create_competition_list", 'refresh');
                }else{
                    $this->session->set_flashdata('MSG', ShowAlert("Something went wrong", "SS"));
                    redirect(base_url() . "Standardswritting/create_competition_list", 'refresh');
                }
            } 

    }
    public function competition_edit(){
      //  echo $id;
       // print_r($_POST); 
    //    echo "<br>";
    //     print_r($_FILES); 
     //  die;
            if($this->input->post('Available')== 1){               
                $standard = $this->input->post('standard');  
                $formdata['standard'] = implode(',',$standard);    
            }else{
                $formdata['standard'] = 0;
            }
            $formdata['comp_id'] = $this->input->post('comp_id');
            $formdata['competiton_name'] = $this->input->post('name');
            $formdata['competition_hindi_name'] = $this->input->post('name_hindi');
            $formdata['description'] = $this->input->post('description');
            $formdata['terms_condition'] = $this->input->post('terms_conditions');
            $formdata['start_date'] = $this->input->post('start_date');
            $formdata['end_date'] = $this->input->post('end_date');
            $formdata['comp_level'] = $this->input->post('Level');
            $formdata['start_time'] = $this->input->post('start_time');
            $formdata['end_time'] = $this->input->post('end_time');
            $formdata['score'] = $this->input->post('score');
            // $formdata['region'] = $this->input->post('Region');
            // $formdata['branch'] = $this->input->post('Branch');
            $formdata['available_for'] = $this->input->post('Available');
          //  $formdata['thumbnail'] = $thumbnail_imglocation;
            $formdata['status'] = "0";


            if($formdata['comp_level']=='2'){
                $formdata['region'] = $this->input->post('Region');
                $formdata['branch']='0';
                $formdata['state']='0';
            }else if($formdata['comp_level']=='3'){
                $formdata['branch'] = $this->input->post('Branch');
                $formdata['region']='0';
                $formdata['state']='0';
            }else if($formdata['comp_level']=='4'){
                $formdata['state'] = $this->input->post('state');
                $formdata['region']='0';
                $formdata['branch']='0';
            }else{
                $formdata['branch']='0';
                $formdata['region']='0';
                $formdata['state']='0';
            }


            $oldDocument = "";
            $oldDocument = $this->input->post('thumbnailold_image');
            $document = "";

        if (!empty($_FILES['thumbnail']['tmp_name'])) {
           
            $path='uploads/competition/thumbnail/';
            $document = 'comp_thumbnail' . time() . '.jpg';
            $config['upload_path'] = './uploads/competition/thumbnail/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size']    = '250';
            $config['max_width']  = '3024';
            $config['max_height']  = '2024';
            $config['file_name'] = $document;
            $document=$path.$document;
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('thumbnail')) {
                //$err[]=$this->upload->display_errors();
                $data['status'] = 0;
                $data['message'] = $this->upload->display_errors();
            }
        } else {
            if (!empty($oldDocument)) {
                $document =  $oldDocument;
            }
        }
        // print_r($formdata); die;
        if ($document) {
            $formdata['thumbnail'] = $document;
        }

        if(!empty($_FILES['fprize_image']['tmp_name'])){
            $fprize_imgsize=$_FILES['fprize_image']['size'];
        }else{
            $fprize_imgsize=0;
        }
        $prizepath = 'uploads/competition/prize_img/';
        if ($fprize_imgsize > 0) 
        {
            $fprize_imglocation = $prizepath . time() .'fprize_img'. $_FILES['fprize_image']['name']; 
            move_uploaded_file($_FILES['fprize_image']['tmp_name'], $fprize_imglocation); 
        }
        else
        {
            $fprize_imglocation=$this->input->post('fold_image');
        }


        if(!empty($_FILES['sprize_image']['tmp_name'])){
            $sprize_imgsize=$_FILES['sprize_image']['size'];
        }else{
            $sprize_imgsize=0;
        }
        $prizepath = 'uploads/competition/prize_img/';
        if ($sprize_imgsize > 0) 
        {
            $sprize_imglocation = $prizepath . time() .'sprize_img'. $_FILES['sprize_image']['name']; 
            move_uploaded_file($_FILES['sprize_image']['tmp_name'], $sprize_imglocation); 
        }
        else
        {
            $sprize_imglocation=$this->input->post('sold_image');
        }

        if(!empty($_FILES['tprize_image']['tmp_name'] )){
            $tprize_imgsize=$_FILES['tprize_image']['size'];
        }else{
            $tprize_imgsize=0;
        }
        $prizepath = 'uploads/competition/prize_img/';
        if ($tprize_imgsize > 0) 
        {
            $tprize_imglocation = $prizepath . time() .'tprize_img'. $_FILES['tprize_image']['name']; 
            move_uploaded_file($_FILES['tprize_image']['tmp_name'], $tprize_imglocation); 
        }
        else
        {
            $tprize_imglocation=$this->input->post('told_image');
        }


        if(!empty($_FILES['cprize_image']['tmp_name'] )){
            $cprize_imgsize=$_FILES['cprize_image']['size'];
        }else{
            $cprize_imgsize=0;
        }
        $prizepath = 'uploads/competition/prize_img/';
        if ($cprize_imgsize > 0) 
        {
            $cprize_imglocation = $prizepath . time() .'cprize_img'. $_FILES['cprize_image']['name']; 
            move_uploaded_file($_FILES['cprize_image']['tmp_name'], $cprize_imglocation); 
        }
        else
        {
            $cprize_imglocation=$this->input->post('cold_image');
        }

       
            // $formdata1 = array();
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

            $formdata1['competitionn_id']=$this->input->post('comp_id');

        //   print_r($formdata1); die;
            $this->Miscellaneous_competition->UpdateCompPrizes($formdata1);

//print_r($formdata); die;
           $this->load->model('Miscellaneous_Competition/Miscellaneous_competition');
           $id = $this->Miscellaneous_competition->updateCompetition($formdata);
//echo $comp_id; die;
if($id){
   // echo "success";
    $this->session->set_flashdata('MSG', ShowAlert("Record Updated Successfully", "SS"));
    redirect(base_url() . "Standardswritting/create_competition_list", 'refresh');
}else{
    $this->session->set_flashdata('MSG', ShowAlert("Something went wrong", "SS"));
    redirect(base_url() . "Standardswritting/create_competition_list", 'refresh');
}

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
        $data = $this->Miscellaneous_competition->viewCompetition2($id);
     // print_r($data); die;
       $level=$data['comp_level'];
       $branch=$data['branch'];
        $this->load->model('Quiz/Quiz_model');
        $quizlavel = $this->Quiz_model->getQuizLevel();
        $data['quizlavel']=$quizlavel;
       // print_r($data);die;
        // $getAllRegions = array();
        // $getAllBranches = array();
      //  $data=array();
       // $quiz = $this->Quiz_model->getQuiz($id);
        
        if($level == 2){
           // $region_id = $quiz['region_id'];
            $data['getAllRegions'] = $this->Quiz_model->getAllRegions(); 
           // $data['getAllBranches']="";
        }
        if($level == 3){
           // $region_id = $quiz['branch_id'];
         //  $data['getAllRegions']="";
            $data['getAllBranches'] = $this->Quiz_model->getAllBranches(); 
        }
        if($level == 1){
         //   $data['getAllRegions']="";
          //  $data['getAllBranches']="";
        }
        if($level == 4){
            $data['getAllStates'] = $this->Miscellaneous_competition->getAllStates();
        }

         $data['competition'] = $this->Miscellaneous_competition->viewCompetition2($id);
       // print_r($data); die;
        $this->load->view('admin/headers/admin_header');
        $this->load->view('standardwritting/create_competition_edit',$data);
        $this->load->view('admin/footers/admin_footer');
    }
    public function competition_submission_view($id)
    {
        $data['competition']=$this->Miscellaneous_competition->SubmittedCompetition($id);
        //  print_r($data); die;
        $this->load->view('admin/headers/admin_header');
        $this->load->view('standardwritting/competition_submission_view',$data);
        $this->load->view('admin/footers/admin_footer');
    }
    public function view_competition($id){
        $data['quizdata'] = $this->Miscellaneous_competition->viewCompetition2($id);
        //  print_r($data); die;
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
        $data['competition']=$this->Miscellaneous_competition->reviewCompetition();
        // print_r($data); die;
        $this->load->view('admin/headers/admin_header');
        $this->load->view('standardwritting/revised_competition_list',$data);
        $this->load->view('admin/footers/admin_footer');
    }
    public function standard_writting_dashboard()
    {
        $this->load->view('admin/headers/admin_header');
        $this->load->view('standardwritting/standard_writting_dashboard');
        $this->load->view('admin/footers/admin_footer');
    }
    public function create_online_list()
    {
        $data=array();
        $data['getData']=$this->Standardswritting_model->create_online_list();

        $this->load->view('admin/headers/admin_header');
        $this->load->view('standardwritting/create_online_list',$data);
        $this->load->view('admin/footers/admin_footer');
    }
    public function review_management_dashboard()
    {
        $this->load->view('admin/headers/admin_header');
        $this->load->view('standardwritting/review_management_dashboard');
        $this->load->view('admin/footers/admin_footer');
    }
    public function create_online_view($id)
    {
        $data=array();
        $data['getData']=$this->Standardswritting_model->create_online_view($id);

        $this->load->view('admin/headers/admin_header');
        $this->load->view('standardwritting/create_online_view',$data);
        $this->load->view('admin/footers/admin_footer');
    }
    public function create_online_archive()
    {
        $data=array();
        $data['getData']=$this->Standardswritting_model->create_online_archive();
        $this->load->view('admin/headers/admin_header');
        $this->load->view('standardwritting/create_online_archive',$data);
        $this->load->view('admin/footers/admin_footer');
    }
    public function create_online_form()
    { 
       
        $formdataall=array();
        $formdataall['quizlavel']=$this->Quiz_model->getQuizLevel();
        $formdataall['getAvailability']=$this->Quiz_model->getAvailability(); 
       
        $this->load->view('admin/headers/admin_header'); 
        if ($this->form_validation->run('create_online_form') == FALSE) 
        {
            $this->load->view('standardwritting/create_online_form',$formdataall);
        }
        else
        { 
            if (!file_exists('uploads/standardswrittingonline')) { mkdir('uploads/standardswrittingonline', 0777, true); }
            $bannerpath = 'uploads/standardswrittingonline/'; 
            $banner_imglocation = $bannerpath . time() .'quiz_banner_img'. $_FILES['banner_img']['name']; 
            move_uploaded_file($_FILES['banner_img']['tmp_name'], $banner_imglocation); 

            $fprize_imglocation ="";
            if (!empty($_FILES['fprize_img']['tmp_name'])) {
            $fprize_imglocation = $bannerpath . time() .'prize_img'. $_FILES['fprize_img']['name']; 
            move_uploaded_file($_FILES['fprize_img']['tmp_name'], $fprize_imglocation); }

            $sprize_imglocation ="";
            if (!empty($_FILES['sprize_img']['tmp_name'])) {
            $sprize_imglocation = $bannerpath . time()  .'prize_img'.$_FILES['sprize_img']['name']; 
            move_uploaded_file($_FILES['sprize_img']['tmp_name'], $sprize_imglocation);}
            $tprize_imglocation ="";
            if (!empty($_FILES['tprize_img']['tmp_name'])) {
            $tprize_imglocation = $bannerpath . time() .'prize_img'. $_FILES['tprize_img']['name']; 
            move_uploaded_file($_FILES['tprize_img']['tmp_name'], $tprize_imglocation);}
            $cprize_imglocation = "";
            if (!empty($_FILES['cprize_img']['tmp_name'])) {
                $cprize_imglocation = $bannerpath . time() .'prize_img'. $_FILES['cprize_img']['name']; 
                move_uploaded_file($_FILES['cprize_img']['tmp_name'], $cprize_imglocation);}

            $encAdminId = $this->session->userdata('admin_id');
            $created_by = encryptids("D", $encAdminId);            
           
            $formdata = array();
            $formdata['comp_id'] = date('dmy').$this->random_strings(4);
            $formdata['title'] = $this->input->post('title');
            $formdata['title_hindi'] = $this->input->post('title_hindi');
            $formdata['description'] = $this->input->post('description');
            $formdata['terms_conditions'] = $this->input->post('terms_conditions');
            $formdata['qualifying_mark'] = $this->input->post('qualifying_mark'); 
            $formdata['total_mark'] = $this->input->post('total_mark');
            $formdata['created_on'] = date("Y-m-d h:i:s");
            $formdata['updated_on'] = date("Y-m-d h:i:s");

            $start_d= $this->input->post('start_date');
            $start_date = date("Y-m-d", strtotime($start_d));
            $formdata['start_date'] = $start_date ;

            $end_d= $this->input->post('end_date');
            $end_date = date("Y-m-d", strtotime($end_d));
            $formdata['end_date'] =  $end_date;

             $start= $this->input->post('start_time');
             $start_time = date("H:i:s", strtotime($start));
             $end= $this->input->post('end_time');
             $end_time = date("H:i:s", strtotime($end));


           
            $formdata['start_time'] = $start_time ;
            $formdata['end_time'] =  $end_time;
                            
           
            $formdata['quiz_level_id'] = $this->input->post('quiz_level_id');
            if($this->input->post('quiz_level_id')== 1){
                $formdata['region_id'] = 0;   
                $formdata['branch_id'] = 0;  
                $formdata['state_id'] = 0;              
            }
            if($this->input->post('quiz_level_id')== 2){               
                $formdata['region_id'] = $this->input->post('region_id');
                $formdata['branch_id'] = 0; 
                $formdata['state_id'] = 0;      
            }
            if($this->input->post('quiz_level_id')== 3){
                $formdata['region_id'] = 0;
                $formdata['state_id'] = 0;         
               // $formdata['branch_id'] = $this->input->post('branch_id');
               $pki_id = $this->input->post('branch_id');
               $branch_details = $this->Quiz_model->getbranchDetailsByPkid($pki_id);
               $formdata['branch_id']  =   $branch_details['i_branch_id'];
            }
            if($this->input->post('quiz_level_id')== 4){               
                $formdata['region_id'] = 0;
                $formdata['branch_id'] = 0; 
                $formdata['state_id'] = $this->input->post('state_id');     
            } 
            $formdata['banner_img'] = $banner_imglocation; 
            $formdata['availability_id'] = $this->input->post('availability_id');
            if($this->input->post('availability_id')== 1){               
                $standard = $this->input->post('standard');  
                $formdata['standard'] = implode(',',$standard);    
            }else{
                $formdata['standard'] = 0;
            } 

            if($this->input->post('fprize')!= ""){ 
                $formdata['fprize'] = $this->input->post('fprize');
                $formdata['fdetails'] = $this->input->post('fdetails');
                $formdata['fprize_img'] = $fprize_imglocation; 
                }
                if($this->input->post('sprize')!= ""){ 
                    $formdata['sprize'] = $this->input->post('sprize');
                    $formdata['sdetails'] = $this->input->post('sdetails');
                    $formdata['sprize_img'] = $sprize_imglocation;  
                }
              
                if($this->input->post('tprize')!= ""){ 
                $formdata['tprize'] = $this->input->post('tprize');
                $formdata['tdetails'] = $this->input->post('tdetails');
                $formdata['tprize_img'] =$tprize_imglocation; 
                }

                if($this->input->post('cprize')!= ""){ 
                $formdata['cprize'] = $this->input->post('cprize');
                $formdata['cdetails'] = $this->input->post('cdetails');
                $formdata['cprize_img'] = $cprize_imglocation; 
                }   
            

            $formdata['created_by'] = $created_by;
            $formdata['modify_by'] = $created_by;
            $formdata['status'] = 10;

            $quiz_id = $this->Standardswritting_model->insertStandardsWrittingOnline($formdata);
             
            if ($quiz_id) { 
                   
                $this->session->set_flashdata('MSG', ShowAlert("Record Inserted Successfully", "SS"));
                redirect(base_url() . "Standardswritting/create_online_list", 'refresh');
            }
            else
            {
                $this->session->set_flashdata('MSG', ShowAlert("Failed to create new admin,Please try again", "DD"));
                redirect(base_url() . "Standardswritting/create_online_form", 'refresh');
            }
        } 
        $this->load->view('admin/footers/admin_footer');
    }
    public function create_online_edit($id)
    {


        $this->load->view('admin/headers/admin_header');

        $quizlavel = $this->Quiz_model->getQuizLevel();
        $getAvailability = $this->Quiz_model->getAvailability(); 


        $getAllRegions = array();
        $getAllBranches = array();
        $getAllStates = array();
        $data=array(); 

         $comp=$this->Standardswritting_model->create_online_view($id);
        
        if($comp['quiz_level_id'] == 2){
          
            $getAllRegions = $this->Quiz_model->getAllRegions(); 
        }
        if($comp['quiz_level_id'] == 3){
           
            $getAllBranches = $this->Quiz_model->getAllBranches(); 
        }
        if($comp['quiz_level_id'] == 4){
           
            $getAllStates = $this->Quiz_model->getAllStates(); 
        }
        $data['quizlavel']=$quizlavel;
        $data['getAvailability']=$getAvailability; 
        $data['getAllRegions']=$getAllRegions;
        $data['getAllBranches']=$getAllBranches;
        $data['getAllStates']=$getAllStates;

        $data['getData']=$comp;



        if ($this->form_validation->run('create_online_form') == FALSE) 
        {
            $this->load->view('standardwritting/create_online_edit',$data);
        }
        else
        { 
            if (!file_exists('uploads/standardswrittingonline')) { mkdir('uploads/standardswrittingonline', 0777, true); }
            $bannerpath = 'uploads/standardswrittingonline/'; 
            // $banner_imglocation = $bannerpath . time() .'quiz_banner_img'. $_FILES['banner_img']['name']; 
            // move_uploaded_file($_FILES['banner_img']['tmp_name'], $banner_imglocation); 


             $banner_imglocation =$comp['banner_img'];
            if (!empty($_FILES['banner_img']['tmp_name'])) {
            $banner_imglocation = $bannerpath . time() .'banner_img'. $_FILES['banner_img']['name']; 
            move_uploaded_file($_FILES['banner_img']['tmp_name'], $banner_imglocation); }




            $fprize_imglocation =$comp['fprize_img'];;
            if (!empty($_FILES['fprize_img']['tmp_name'])) {
            $fprize_imglocation = $bannerpath . time() .'prize_img'. $_FILES['fprize_img']['name']; 
            move_uploaded_file($_FILES['fprize_img']['tmp_name'], $fprize_imglocation); }

            $sprize_imglocation =$comp['sprize_img'];
            if (!empty($_FILES['sprize_img']['tmp_name'])) {
            $sprize_imglocation = $bannerpath . time()  .'prize_img'.$_FILES['sprize_img']['name']; 
            move_uploaded_file($_FILES['sprize_img']['tmp_name'], $sprize_imglocation);}


            $tprize_imglocation =$comp['tprize_img'];
            if (!empty($_FILES['tprize_img']['tmp_name'])) {
            $tprize_imglocation = $bannerpath . time() .'prize_img'. $_FILES['tprize_img']['name']; 
            move_uploaded_file($_FILES['tprize_img']['tmp_name'], $tprize_imglocation);}


             $cprize_imglocation =$comp['cprize_img'];

            if (!empty($_FILES['cprize_img']['tmp_name'])) {
                $cprize_imglocation = $bannerpath . time() .'prize_img'. $_FILES['cprize_img']['name']; 
                move_uploaded_file($_FILES['cprize_img']['tmp_name'], $cprize_imglocation);}




            $encAdminId = $this->session->userdata('admin_id');
            $created_by = encryptids("D", $encAdminId);            
           
            $formdata = array();
            $formdata['comp_id'] = date('dmy').$this->random_strings(4);
            $formdata['title'] = $this->input->post('title');
            $formdata['title_hindi'] = $this->input->post('title_hindi');
            $formdata['description'] = $this->input->post('description');
            $formdata['terms_conditions'] = $this->input->post('terms_conditions');
            $formdata['qualifying_mark'] = $this->input->post('qualifying_mark'); 
            $formdata['total_mark'] = $this->input->post('total_mark');
            $formdata['created_on'] = date("Y-m-d h:i:s");
            $formdata['updated_on'] = date("Y-m-d h:i:s");

            $start_d= $this->input->post('start_date');
            $start_date = date("Y-m-d", strtotime($start_d));
            $formdata['start_date'] = $start_date ;

            $end_d= $this->input->post('end_date');
            $end_date = date("Y-m-d", strtotime($end_d));
            $formdata['end_date'] =  $end_date;

             $start= $this->input->post('start_time');
             $start_time = date("H:i:s", strtotime($start));
             $end= $this->input->post('end_time');
             $end_time = date("H:i:s", strtotime($end));


           
            $formdata['start_time'] = $start_time ;
            $formdata['end_time'] =  $end_time;
                            
           
            $formdata['quiz_level_id'] = $this->input->post('quiz_level_id');
            if($this->input->post('quiz_level_id')== 1){
                $formdata['region_id'] = 0;   
                $formdata['branch_id'] = 0;  
                $formdata['state_id'] = 0;              
            }
            if($this->input->post('quiz_level_id')== 2){               
                $formdata['region_id'] = $this->input->post('region_id');
                $formdata['branch_id'] = 0; 
                $formdata['state_id'] = 0;      
            }
            if($this->input->post('quiz_level_id')== 3){
                $formdata['region_id'] = 0;
                $formdata['state_id'] = 0;         
               // $formdata['branch_id'] = $this->input->post('branch_id');
               $pki_id = $this->input->post('branch_id');
               $branch_details = $this->Quiz_model->getbranchDetailsByPkid($pki_id);
               $formdata['branch_id']  =   $branch_details['i_branch_id'];
            }
            if($this->input->post('quiz_level_id')== 4){               
                $formdata['region_id'] = 0;
                $formdata['branch_id'] = 0; 
                $formdata['state_id'] = $this->input->post('state_id');     
            } 
            $formdata['banner_img'] = $banner_imglocation; 
            $formdata['availability_id'] = $this->input->post('availability_id');
            if($this->input->post('availability_id')== 1){               
                $standard = $this->input->post('standard');  
                $formdata['standard'] = implode(',',$standard);    
            }else{
                $formdata['standard'] = 0;
            } 

            if($this->input->post('fprize')!= ""){ 
                $formdata['fprize'] = $this->input->post('fprize');
                $formdata['fdetails'] = $this->input->post('fdetails');
                $formdata['fprize_img'] = $fprize_imglocation; 
                }
                if($this->input->post('sprize')!= ""){ 
                    $formdata['sprize'] = $this->input->post('sprize');
                    $formdata['sdetails'] = $this->input->post('sdetails');
                    $formdata['sprize_img'] = $sprize_imglocation;  
                }
              
                if($this->input->post('tprize')!= ""){ 
                $formdata['tprize'] = $this->input->post('tprize');
                $formdata['tdetails'] = $this->input->post('tdetails');
                $formdata['tprize_img'] =$tprize_imglocation; 
                }

                if($this->input->post('cprize')!= ""){ 
                $formdata['cprize'] = $this->input->post('cprize');
                $formdata['cdetails'] = $this->input->post('cdetails');
                $formdata['cprize_img'] = $cprize_imglocation; 
                }   
            

            $formdata['created_by'] = $created_by;
            $formdata['modify_by'] = $created_by;
            $formdata['status'] = 10;

            $update_id = $this->input->post('update_id');


            $quiz_id = $this->Standardswritting_model->updateStandardsWrittingOnline($update_id,$formdata);
             
            if ($quiz_id) { 
                   
                $this->session->set_flashdata('MSG', ShowAlert("Record Inserted Successfully", "SS"));
                redirect(base_url() . "Standardswritting/create_online_list", 'refresh');
            }
            else
            {
                $this->session->set_flashdata('MSG', ShowAlert("Failed to create new admin,Please try again", "DD"));
                redirect(base_url() . "Standardswritting/create_online_form", 'refresh');
            }
        } 
        $this->load->view('admin/footers/admin_footer');
    }


 

     
    public function Manage_online_list()
    {
        $data=array();
        $data['getData']=$this->Standardswritting_model->Manage_online_list();

        $this->load->view('admin/headers/admin_header');
        $this->load->view('standardwritting/Manage_online_list',$data);
        $this->load->view('admin/footers/admin_footer');
    }
    public function ongoing_online_list()
    {

        $getDetails= $this->Standardswritting_model->Manage_online_list();
        $data = array();
        foreach ($getDetails as $row) 
        {
            $ids= $row['id'];
            $count= $this->Standardswritting_model->getSubmissionOnline($ids);
            $row['count'] = $count;
            array_push($data, $row);
        }         
        
        $data['getData'] = $data;



        // $data=array();
        // $data['getData']=$this->Standardswritting_model->ongoing_online_list();
        $this->load->view('admin/headers/admin_header');
        $this->load->view('standardwritting/ongoing_online_list',$data);
        $this->load->view('admin/footers/admin_footer');
    }
    public function standard_offline_dashboard()
    {
        $this->load->view('admin/headers/admin_header');
        $this->load->view('standardwritting/standard_offline_dashboard');
        $this->load->view('admin/footers/admin_footer');
    }
    public function standard_online_dashboard()
    {
        $this->load->view('admin/headers/admin_header');
        $this->load->view('standardwritting/standard_online_dashboard');
        $this->load->view('admin/footers/admin_footer');
    }
    public function create_standard_list()
    {
        $this->load->view('admin/headers/admin_header');
        $data = array();
        $data['getData'] = $this->Standardswritting_model->create_standard_list(); 

        $this->load->view('standardwritting/create_standard_list',$data);
        $this->load->view('admin/footers/admin_footer');
    }
    public function create_standard_archive()
    {
        $data = array();
        $data['getData'] = $this->Standardswritting_model->create_standard_archive(); 

        $this->load->view('admin/headers/admin_header');
        $this->load->view('standardwritting/create_standard_archive',$data);
        $this->load->view('admin/footers/admin_footer');
    }
    public function create_standard_form()
    {
        $ch = curl_init();
        $curlConfig = array(
            CURLOPT_URL            => "http://203.153.41.213:8071/php/BIS_2.0/consumerlive/Standard-Club/List",
            CURLOPT_POST           => true,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POSTFIELDS     => array('branch_id' => 11,'dept_id' => 105)
        );
        curl_setopt_array($ch, $curlConfig);
        $result = curl_exec($ch); 
        $data1 = json_decode($result, TRUE);
        curl_close($ch); 

         $data=array();
         $data['StdClb']=$data1['data'];

        $this->load->view('admin/headers/admin_header');
        if ($this->form_validation->run('create_standard_form') == FALSE) 
        {
           $this->load->view('standardwritting/create_standard_form',$data);
        } 
        else 
        {
            if (!file_exists('uploads/standardswritting/file')) { mkdir('uploads/standardswritting/file', 0777, true); }
            $first_filesize=$_FILES['first_file']['size'];  
            if ($first_filesize > 0 ) 
            {
                $first_filepath = 'uploads/standardswritting/file/'; 
                $first_filelocation = $first_filepath . time() .'first_file'. $_FILES['first_file']['name']; 
                move_uploaded_file($_FILES['first_file']['tmp_name'], $first_filelocation);
            }
            else
            {
                $first_filelocation=''; 
            }

            $second_filesize=$_FILES['second_file']['size']; 
            if ($second_filesize > 0 ) 
            {
                $second_filepath = 'uploads/standardswritting/file/'; 
                $second_filelocation = $second_filepath . time() .'second_file'. $_FILES['second_file']['name']; 
                move_uploaded_file($_FILES['second_file']['tmp_name'], $second_filelocation);
            }
            else
            {
                $second_filelocation=''; 
            }


             $third_filesize=$_FILES['third_file']['size']; 
            if ($third_filesize > 0 ) 
            {
                $third_filepath = 'uploads/standardswritting/file/'; 
                $third_filelocation = $third_filepath . time() .'third_file'. $_FILES['third_file']['name']; 
                move_uploaded_file($_FILES['third_file']['tmp_name'], $third_filelocation);
            }
            else
            {
                $third_filelocation=''; 
            }

            $consolation_filesize=$_FILES['consolation_file']['size']; 
            if ($consolation_filesize > 0 ) 
            {
                $consolation_filepath = 'uploads/standardswritting/file/'; 
                $consolation_filelocation = $consolation_filepath . time() .'consolation_file'. $_FILES['consolation_file']['name']; 
                move_uploaded_file($_FILES['consolation_file']['tmp_name'], $consolation_filelocation);
            }
            else
            {
                $consolation_filelocation=''; 
            } 

            $formdata = array(); 
            $formdata['standard_club'] = $this->input->post('standard_club');
            $formdata['topic_of_activity'] = $this->input->post('topic_of_activity');
            $formdata['date_of_activity'] = $this->input->post('date_of_activity'); 
            $formdata['number_of_participants'] = $this->input->post('number_of_participants'); 
            $formdata['first_paticipant'] = $this->input->post('first_paticipant');
            $formdata['first_file'] =$first_filelocation; 
            $formdata['second_paticipant'] = $this->input->post('second_paticipant'); 
            $formdata['second_file'] = $second_filelocation;
            $formdata['third_paticipant'] = $this->input->post('third_paticipant'); 
            $formdata['third_file'] = $third_filelocation;
            $formdata['consolation_paticipant'] = $this->input->post('consolation_paticipant'); 
            $formdata['consolation_file'] = $consolation_filelocation; 
             $formdata['created_on'] = date('Y-m-d h:i:s'); 
             $formdata['updated_on'] = date('Y-m-d h:i:s'); 
            $id = $this->Standardswritting_model->StandardswrittingSave($formdata);
            if ($id)
            {
                $this->session->set_flashdata('MSG', ShowAlert("Record Inserted Successfully", "SS"));
                redirect(base_url() . "Standardswritting/create_standard_list", 'refresh');
            }
            else
            {
                $this->session->set_flashdata('MSG', ShowAlert("Failed to create Create New Competition, Please try again", "DD"));
                redirect(base_url() . "standardswritting/create_standard_form", 'refresh');
            }
        } 

        $this->load->view('admin/footers/admin_footer');
    } 
    public function create_standard_edit($id)
    {

         $ch = curl_init();
        $curlConfig = array(
            CURLOPT_URL            => "http://203.153.41.213:8071/php/BIS_2.0/consumerlive/Standard-Club/List",
            CURLOPT_POST           => true,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POSTFIELDS     => array('branch_id' => 11,'dept_id' => 105)
        );
        curl_setopt_array($ch, $curlConfig);
        $result = curl_exec($ch); 
        $data1 = json_decode($result, TRUE);
        curl_close($ch); 

         $data=array();
         $data['StdClb']=$data1['data'];
       
        $data['getData'] = $this->Standardswritting_model->view_standards($id);  
        $this->load->view('admin/headers/admin_header');
        if ($this->form_validation->run('create_standard_form') == FALSE) 
        {
            $this->load->view('standardwritting/create_standard_edit',$data);
        } 
        else 
        {
            if (!file_exists('uploads/standardswritting/file')) { mkdir('uploads/standardswritting/file', 0777, true); }
            
            
            if (isset($_FILES['first_file']['size']) ) 
            {
                $first_filepath = 'uploads/standardswritting/file/'; 
                $first_filelocation = $first_filepath . time() .'first_file'. $_FILES['first_file']['name']; 
                move_uploaded_file($_FILES['first_file']['tmp_name'], $first_filelocation);
            }
            else
            {
                $first_filelocation=$this->input->post('first_fileold');; 
            }

             
            if (isset($_FILES['second_file']['size'])) 
            {
                $second_filepath = 'uploads/standardswritting/file/'; 
                $second_filelocation = $second_filepath . time() .'second_file'. $_FILES['second_file']['name']; 
                move_uploaded_file($_FILES['second_file']['tmp_name'], $second_filelocation);
            }
            else
            {
                $second_filelocation=$this->input->post('second_fileold');; 
            }


            
            if (isset($_FILES['third_file']['size'])) 
            {
                $third_filepath = 'uploads/standardswritting/file/'; 
                $third_filelocation = $third_filepath . time() .'third_file'. $_FILES['third_file']['name']; 
                move_uploaded_file($_FILES['third_file']['tmp_name'], $third_filelocation);
            }
            else
            {
                $third_filelocation=$this->input->post('third_fileold');; 
            }
 
            if (isset($_FILES['consolation_file']['size']) ) 
            {
                $consolation_filepath = 'uploads/standardswritting/file/'; 
                $consolation_filelocation = $consolation_filepath . time() .'consolation_file'. $_FILES['consolation_file']['name']; 
                move_uploaded_file($_FILES['consolation_file']['tmp_name'], $consolation_filelocation);
            }
            else
            {
                $consolation_filelocation=$this->input->post('consolation_fileold');; 
            } 

            $formdata = array(); 
            $formid = $this->input->post('id');
            $formdata['standard_club'] = $this->input->post('standard_club');
            $formdata['topic_of_activity'] = $this->input->post('topic_of_activity');
            $formdata['date_of_activity'] = $this->input->post('date_of_activity'); 
            $formdata['number_of_participants'] = $this->input->post('number_of_participants'); 
            $formdata['first_paticipant'] = $this->input->post('first_paticipant');
            $formdata['first_file'] =$first_filelocation; 
            $formdata['second_paticipant'] = $this->input->post('second_paticipant'); 
            $formdata['second_file'] = $second_filelocation;
            $formdata['third_paticipant'] = $this->input->post('third_paticipant'); 
            $formdata['third_file'] = $third_filelocation;
            $formdata['consolation_paticipant'] = $this->input->post('consolation_paticipant'); 
            $formdata['consolation_file'] = $consolation_filelocation;  
            $formdata['updated_on'] = date('Y-m-d h:i:s'); 
            $formdata['status'] = 1; 
            $id = $this->Standardswritting_model->StandardswrittingUpdate($formdata,$formid);
            if ($id)
            {
                $this->session->set_flashdata('MSG', ShowAlert("Record Inserted Successfully", "SS"));
                redirect(base_url() . "Standardswritting/manage_standard_list", 'refresh');
            }
            else
            {
                $this->session->set_flashdata('MSG', ShowAlert("Failed to create Create New Competition, Please try again", "DD"));
                redirect(base_url() . "standardswritting/create_standard_form", 'refresh');
            }
        } 

        $this->load->view('admin/footers/admin_footer');
    }
    public function manage_standard_list()
    {
        $data = array();
        $data['getData'] = $this->Standardswritting_model->manage_standard_list(); 
        $this->load->view('admin/headers/admin_header');
        $this->load->view('standardwritting/manage_standard_list',$data);
        $this->load->view('admin/footers/admin_footer');
    }

    public function admin_manage_standard_list()
    {
        $data = array();
        $data['getData'] = $this->Standardswritting_model->admin_manage_standard_list(); 
        $this->load->view('admin/headers/admin_header');
        $this->load->view('standardwritting/admin_manage_standard_list',$data);
        $this->load->view('admin/footers/admin_footer');
    }

     public function approved_standard_list()
    {
        $data = array();
        $data['getData'] = $this->Standardswritting_model->approved_standard_list(); 
        $this->load->view('admin/headers/admin_header');
        $this->load->view('standardwritting/approved_standard_list',$data);
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

         $getDetails= $this->Standardswritting_model->closed_standard_list();
        $data = array();
        foreach ($getDetails as $row) 
        {
            $ids= $row['id'];
            $count= $this->Standardswritting_model->getSubmissionOnline($ids);
            $row['count'] = $count;
            array_push($data, $row);
        }         
        
        $data['getData'] = $data;


        // $data = array();
        // $data['getData'] = $this->Standardswritting_model->closed_standard_list(); 
        $this->load->view('admin/headers/admin_header');
        $this->load->view('standardwritting/closed_standard_list',$data);
        $this->load->view('admin/footers/admin_footer');
    }
    public function revised_standard_list()
    {
        $this->load->view('admin/headers/admin_header');
        $this->load->view('standardwritting/revised_standard_list');
        $this->load->view('admin/footers/admin_footer');
    }
    public function view_standards($id)
    {

         $this->load->view('admin/headers/admin_header');
        $data = array();
        $data['getData'] = $this->Standardswritting_model->view_standards($id);  

        $this->load->view('standardwritting/view_standards',$data);
        $this->load->view('admin/footers/admin_footer');
    }
    public function submission_view($id)
    {
        $data = array();
        $data['getData'] = $this->Standardswritting_model->submission_view($id); 

        $this->load->view('admin/headers/admin_header');
        $this->load->view('standardwritting/submission_view',$data);
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
    public function delete($id){
      //  echo $id; die;
      $data['comp_id']=trim($id);
      $res1=$this->Miscellaneous_competition->viewCompetition2($id);
      $img1=$res1['thumbnail'];
      $img2=$res1['fprize_image'];
      if($res1['sprize_image']=="" || $res1['sprize_image']=NULL){
        $img3=$res1['sprize_image'];
      }else{
        $img3="";
      }
      if($res1['tprize_image']=="" || $res1['tprize_image']=NULL){
        $img4=$res1['tprize_image'];
      }else{
        $img4="";
      }
      if($res1['cprize_image']=="" || $res1['cprize_image']=NULL){
        $img5=$res1['cprize_image'];
      }else{
        $img5="";
      }
   //  print_r($res1); die;
    // echo $img1; die;
        $res=$this->Miscellaneous_competition->delete_comp($data);
        
        if($res){
            @unlink($img1);
            @unlink($img2);
            if($img3){
                @unlink($img3);  
            }
            if($img4){
                @unlink($img4);  
            }
            if($img5){
                @unlink($img5);  
            }
            return true;
        }else{
            return false;
        }
    }
 

public function updateStatus(){
        try {  

                 
            $id = $this->input->post('id');
            $formdata['status'] = $this->input->post('status'); 
            $formdata['updated_on'] = date('Y-m-d h:i:s');

            $id = $this->Standardswritting_model->updateStatus($formdata,$id);
            if ($id) {
                $data['status'] = 1;
                $data['message'] = 'Updated successfully.';
                
            } else {
                $data['status'] = 0;
                $data['message'] = 'Failed to delete, Please try again.';               
            }
            $this->session->set_flashdata('MSG', ShowAlert("Record Updated Successfully", "SS"));            
            
        } catch (Exception $e) {
            echo json_encode([
                'status' => 'error',
                'message' => $e->getMessage(),
            ]);
            return true;
        }
        redirect(base_url() . "Standardsmaking/manage_session_list", 'refresh');
    }

    public function updateStatusAdmin(){
        try {  

                 
            $id = $this->input->post('id');
            $formdata['status'] = $this->input->post('status'); 
            $formdata['reject_reasone'] = $this->input->post('remark'); 
            $formdata['updated_on'] = date('Y-m-d h:i:s');
            

            $id2 = $this->Standardswritting_model->updateStatus($formdata,$id);
            if ($id2) {
                $data['status'] = 1;
                $data['message'] = 'Updated successfully.';
                
            } else {
                $data['status'] = 0;
                $data['message'] = 'Failed to delete, Please try again.';               
            }
            $this->session->set_flashdata('MSG', ShowAlert("Record Updated Successfully", "SS"));            
            
        } catch (Exception $e) {
            echo json_encode([
                'status' => 'error',
                'message' => $e->getMessage(),
            ]);
            return true;
        }
        redirect(base_url() . "Standardsmaking/manage_session_list", 'refresh');
    }

    

    public function deleteData(){
        try {   
                 
            $id = $this->input->post('id');
            $id = $this->Standardswritting_model->deleteData($id);
            if ($id) {
                $data['status'] = 1;
                $data['message'] = 'Deleted successfully.';
                
            } else {
                $data['status'] = 0;
                $data['message'] = 'Failed to delete, Please try again.';               
            }
            $this->session->set_flashdata('MSG', ShowAlert("Record Deleted Successfully", "SS"));            
            
        } catch (Exception $e) {
            echo json_encode([
                'status' => 'error',
                'message' => $e->getMessage(),
            ]);
            return true;
        }
        redirect(base_url() . "Standardsmaking/manage_session_list", 'refresh');
    }

    public function deleteFile(){
        try {   
                 
            $id = $this->input->post('id');
            $val = $this->input->post('delete_id');
            if ($val==1) 
            {
                $formdata['first_file']='';
            }
            if ($val==2) 
            {
                $formdata['second_file']='';
            }
            if ($val==3) 
            {
                $formdata['third_file']='';
            }
            if ($val==4) 
            {
                $formdata['consolation_file']='';
            }

            $id = $this->Standardswritting_model->deleteFile($id,$formdata);
            if ($id) {
                $data['status'] = 1;
                $data['message'] = 'Deleted successfully.';
                
            } else {
                $data['status'] = 0;
                $data['message'] = 'Failed to delete, Please try again.';               
            }
            $this->session->set_flashdata('MSG', ShowAlert("Record Deleted Successfully", "SS"));            
            
        } catch (Exception $e) {
            echo json_encode([
                'status' => 'error',
                'message' => $e->getMessage(),
            ]);
            return true;
        }
        redirect(base_url() . "Standardswritting/create_standard_edit", 'refresh');
    }


    public function deleteOnlineFile(){
        try {   
                 
            $id = $this->input->post('id');
            $val = $this->input->post('status');
            if ($val==1) 
            {
                $formdata['banner_img']='';
            }
            if ($val==2) 
            {
                $formdata['fprize_img']='';
            }
            if ($val==3) 
            {
                $formdata['sprize_img']='';
            }
            if ($val==4) 
            {
                $formdata['tprize_img']='';
            }

            if ($val==5) 
            {
                $formdata['cprize_img']='';
            }

            $id = $this->Standardswritting_model->deleteOnlineFile($id,$formdata);
            if ($id) {
                $data['status'] = 1;
                $data['message'] = 'Deleted successfully.';
                
            } else {
                $data['status'] = 0;
                $data['message'] = 'Failed to delete, Please try again.';               
            }
            $this->session->set_flashdata('MSG', ShowAlert("Record Deleted Successfully", "SS"));            
            
        } catch (Exception $e) {
            echo json_encode([
                'status' => 'error',
                'message' => $e->getMessage(),
            ]);
            return true;
        }
        redirect(base_url() . "Standardswritting/create_standard_edit", 'refresh');
    }


    public function random_strings($length_of_string)
    {
        $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
        return substr(str_shuffle($str_result), 0, $length_of_string );
    }









    public function updateOnlineStatus(){
        try {
            $id = $this->input->post('id');
            $formdata['status'] = $this->input->post('status'); 
            $formdata['updated_on'] = date('Y-m-d h:i:s');

            $id = $this->Standardswritting_model->updateOnlineStatus($formdata,$id);
            if ($id) {
                $data['status'] = 1;
                $data['message'] = 'Updated successfully.';
                
            } else {
                $data['status'] = 0;
                $data['message'] = 'Failed to delete, Please try again.';               
            }
            $this->session->set_flashdata('MSG', ShowAlert("Record Updated Successfully", "SS"));            
            
        } catch (Exception $e) {
            echo json_encode([
                'status' => 'error',
                'message' => $e->getMessage(),
            ]);
            return true;
        }
        redirect(base_url() . "Standardsmaking/manage_session_list", 'refresh');
    }



    public function updateOnlineStatusReview(){
        try {
            $id = $this->input->post('id');
            $formdata['review_status'] = 1; 
            $formdata['updated_on'] = date('Y-m-d h:i:s');

            $id = $this->Standardswritting_model->updateOnlineStatus($formdata,$id);
            if ($id) {
                $data['status'] = 1;
                $data['message'] = 'Updated successfully.';
                
            } else {
                $data['status'] = 0;
                $data['message'] = 'Failed to delete, Please try again.';               
            }
            $this->session->set_flashdata('MSG', ShowAlert("Record Updated Successfully", "SS"));            
            
        } catch (Exception $e) {
            echo json_encode([
                'status' => 'error',
                'message' => $e->getMessage(),
            ]);
            return true;
        }
        redirect(base_url() . "Standardsmaking/manage_session_list", 'refresh');
    }

    public function updateOnlineStatusAdmin(){
        try {  

                 
            $id = $this->input->post('id');
            $formdata['status'] = $this->input->post('status'); 
            $formdata['reject_reasone'] = $this->input->post('remark'); 
            $formdata['updated_on'] = date('Y-m-d h:i:s');
            

            $id2 = $this->Standardswritting_model->updateOnlineStatus($formdata,$id);
            if ($id2) {
                $data['status'] = 1;
                $data['message'] = 'Updated successfully.';
                
            } else {
                $data['status'] = 0;
                $data['message'] = 'Failed to delete, Please try again.';               
            }
            $this->session->set_flashdata('MSG', ShowAlert("Record Updated Successfully", "SS"));            
            
        } catch (Exception $e) {
            echo json_encode([
                'status' => 'error',
                'message' => $e->getMessage(),
            ]);
            return true;
        }
        redirect(base_url() . "Standardsmaking/manage_session_list", 'refresh');
    }

    public function deleteOnlineData(){
        try {   
                 
            $id = $this->input->post('id');
            $id = $this->Standardswritting_model->deleteOnlineData($id);
            if ($id) {
                $data['status'] = 1;
                $data['message'] = 'Deleted successfully.';
                
            } else {
                $data['status'] = 0;
                $data['message'] = 'Failed to delete, Please try again.';               
            }
            $this->session->set_flashdata('MSG', ShowAlert("Record Deleted Successfully", "SS"));            
            
        } catch (Exception $e) {
            echo json_encode([
                'status' => 'error',
                'message' => $e->getMessage(),
            ]);
            return true;
        }
        redirect(base_url() . "Standardsmaking/manage_session_list", 'refresh');
    }
    public function evaluator_dashboard(){
        $this->load->view('admin/headers/admin_header');
        $this->load->view('standardwritting/evaluator_dashboard');
        $this->load->view('admin/footers/admin_footer');
    }
    public function task_recevied_list()
    {
        $this->load->view('admin/headers/admin_header');
        $this->load->view('standardwritting/task_recevied_list');
        $this->load->view('admin/footers/admin_footer');
    }
    public function task_recevied_view()
    {
        $this->load->view('admin/headers/admin_header');
        $this->load->view('standardwritting/task_recevied_view');
        $this->load->view('admin/footers/admin_footer');
    }
    public function task_recevied_reviewed()
    {
        $this->load->view('admin/headers/admin_header');
        $this->load->view('standardwritting/task_recevied_reviewed');
        $this->load->view('admin/footers/admin_footer');
    }
    public function task_view()
    {
        $this->load->view('admin/headers/admin_header');
        $this->load->view('standardwritting/task_view');
        $this->load->view('admin/footers/admin_footer');
    }
    public function ongoin_submission_view()
    {
        $this->load->view('admin/headers/admin_header');
        $this->load->view('standardwritting/ongoin_submission_view');
        $this->load->view('admin/footers/admin_footer');
    }
    public function standard_submission_view()
    {
        $this->load->view('admin/headers/admin_header');
        $this->load->view('standardwritting/standard_submission_view');
        $this->load->view('admin/footers/admin_footer');
    }
    
    
}
