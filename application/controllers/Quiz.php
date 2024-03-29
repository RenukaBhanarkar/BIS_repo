<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Quiz extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // if(empty($this->session->userdata("sess_arr")))
        // {
        //     // redirect(site_url(),'refresh');
        //     redirect(base_url() . "Users/logout", 'refresh');
        // }
        $this->load->model('Admin/Admin_model');
        $this->load->model('Quiz/Quiz_model');
        $this->load->model('Subadmin/Que_bank_model');
        // if ($this->Admin_model->checkAdminLogin()) {
        //     redirect(base_url() . "Admin/dashboard", 'refresh');
        // } else {
        //     redirect(base_url() . "Users/login", 'refresh');
        // }
        date_default_timezone_set("Asia/Calcutta");
    }
     public function deleteQuiz()
    {
        try {

            $id = $this->input->post('id');

            $linked_que_bank_id = $this->Quiz_model->getLinkedQueBankId($id);
            $data=array(
                'quiz_linked_id' => 0,
                'status'=> 1
            );
            $updateStatus = $this->Que_bank_model->updateData($linked_que_bank_id,$data);

            $login_admin_id = encryptids("D", $this->session->userdata('admin_id'));
         

            $dbObj = array(
               'modify_by' => $login_admin_id,
            );
            $uid = $this->Quiz_model->updateDataQuiz($id, $dbObj);

            
            $res = $this->Quiz_model->deleteData($id);
           
            if ($res) {
                $data['status'] = 1;
                $data['message'] = 'Deleted successfully.';
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
  
    public function index()
    {
        $this->load->view('admin/headers/admin_header');
        $this->load->view('quiz/organizing_quiz_dashboard');
        $this->load->view('admin/footers/admin_footer');
    }
    public function organizing_quiz()
    {
        $this->load->view('admin/headers/admin_header');
        $this->load->view('quiz/organizing_quiz_dashboard');
        $this->load->view('admin/footers/admin_footer');
    }
    public function quiz_dashboard()
    {
        $this->load->view('admin/headers/admin_header');
        $this->load->view('quiz/quiz_dashboard');
        $this->load->view('admin/footers/admin_footer');
    }
    public function ongoing_quiz_list()
    {
        $allquize = $this->Admin_model->onGoingQuizNew();
        $data = array();
        $data['allquize'] = $allquize;
        $permissions = array();
        if (encryptids("D", $_SESSION['admin_type']) == 3) { 
            if (in_array(3, $_SESSION['sub_mod_per'])) { 
                $sub_model_id = 3;
                $permissions = $this->Admin_model->getUsersPermissions($sub_model_id);
            }
            $data['permissions'] =  $permissions;
        }
        $this->load->view('admin/headers/admin_header');;
        $this->load->view('quiz/ongoing_quiz_list', $data);
        $this->load->view('admin/footers/admin_footer');
    }
    public function ongoing_quiz_view() 
    {
        // $data=array();
        // $quiz = $this->Quiz_model->viewQuiz($id);
        // $quizdata=array();
        // $data['quizdata']=$quiz; 
        
        $this->load->view('admin/headers/admin_header');
        $this->load->view('quiz/ongoing_quiz_view'); 
        $this->load->view('admin/footers/admin_footer');
    }
    public function closed_quiz_list()
    {
        $ClosedQuiz = $this->Quiz_model->getAllClosedQuizeNew();
        $data = array();
        $data['ClosedQuiz'] = $ClosedQuiz; 
        $permissions = array();
        if (encryptids("D", $_SESSION['admin_type']) == 3) { 
            if (in_array(4, $_SESSION['sub_mod_per'])) { 
                $sub_model_id = 4;
                $permissions = $this->Admin_model->getUsersPermissions($sub_model_id);
            }
            $data['permissions'] =  $permissions;
        }

        $this->load->view('admin/headers/admin_header');
        $this->load->view('quiz/closed_quiz_list',$data);
        $this->load->view('admin/footers/admin_footer');
    }
   
    
   /* public function editquiz($id)
    {
       $this->load->view('admin/headers/admin_header');
      
        $quizlavel = $this->Quiz_model->getQuizLevel();
        $getAvailability = $this->Quiz_model->getAvailability();
        $getQuizLanguage = $this->Quiz_model->getQuizLanguage(); 
        //$getAllQb = $this->Quiz_model->getAllQb();       
            
        //quize Data 
        $getAllRegions = array();
        $data=array();
        $quiz = $this->Quiz_model->getQuiz($id);
        if($quiz['quiz_level_id'] != 1){
            $region_id = $quiz['region_id'];
            $getAllRegions = $this->Quiz_model->getAllRegions($region_id); 
        }
       // echo json_encode($quiz);exit();
        $data['quizdata']=$quiz; 
        //End Quize Data

        //Get First Prize data
        $prize_id=1;
        $prize = $this->Quiz_model->getPrizeId($prize_id,$id); 
        $data['firstprize']=$prize;
        //end First Prizr Data

        //get Second Prize Data
        $prize_id=2;
        $prize = $this->Quiz_model->getPrizeId($prize_id,$id); 
        $data['secondprize']=$prize;
        //End Second Prize data

        //get Third Prize Data
        $prize_id=3;
        $prize = $this->Quiz_model->getPrizeId($prize_id,$id); 
        $data['thirdprize']=$prize;
        //End Third Prize data

        //get Fourth Prize Data
        $prize_id=4;
        $prize = $this->Quiz_model->getPrizeId($prize_id,$id); 
        $data['fourthprize']=$prize; 

        $data['quizlavel']=$quizlavel;
        $data['getAvailability']=$getAvailability;
        $data['getQuizLanguage']=$getQuizLanguage;
        $data['getAllRegions']=$getAllRegions;
         
        if ($this->form_validation->run('quiz_form_validation_rule') == FALSE) 
        {
            $this->load->view('quiz/edit_quiz',$data);
        } 
        else 
        {
            $banner_imgsize=$_FILES['banner_img']['size'];
            $fprize_imgsize=$_FILES['fprize_img']['size'];
            $sprize_imgsize=$_FILES['sprize_img']['size'];
            $tprize_imgsize=$_FILES['tprize_img']['size'];
            if ($banner_imgsize > 0 ) 
            {
                $bannerpath = 'uploads/quiz_img/'; 
                $banner_imglocation = $bannerpath . time() .'quiz_banner_img'. $_FILES['banner_img']['name']; 
                move_uploaded_file($_FILES['banner_img']['tmp_name'], $banner_imglocation);
            }
            else
            {
                $banner_imglocation=$this->input->post('lastbanner');
            }
            $prizepath = 'uploads/prize_img/';
            if ($fprize_imgsize > 0) 
            {
                $fprize_imglocation = $prizepath . time() .'prize_img'. $_FILES['fprize_img']['name']; 
                move_uploaded_file($_FILES['fprize_img']['tmp_name'], $fprize_imglocation); 
            }
            else
            {
                $fprize_imglocation=$this->input->post('lastfprize_img');
            }

            if ($sprize_imgsize > 0) 
            {
                $sprize_imglocation = $prizepath . time()  .'prize_img'.$_FILES['sprize_img']['name']; 
                move_uploaded_file($_FILES['sprize_img']['tmp_name'], $sprize_imglocation);
            } 
            else
            {
                $sprize_imglocation=$this->input->post('lastsprize_img');
            }

            if ($tprize_imgsize > 0) 
            {
                $tprize_imglocation = $prizepath . time() .'prize_img'. $_FILES['tprize_img']['name']; 
                move_uploaded_file($_FILES['tprize_img']['tmp_name'], $tprize_imglocation);
            } 
            else
            {
                $tprize_imglocation=$this->input->post('lasttprize_img');
            }
                             
            $formdata = array(); 
            $formdata['title'] = $this->input->post('title');
            $formdata['title_hindi'] = $this->input->post('title_hindi');
            $formdata['description'] = $this->input->post('description');
            $formdata['terms_conditions'] = $this->input->post('terms_conditions');
            $formdata['duration'] = $this->input->post('duration');
            $formdata['total_question'] = $this->input->post('total_question');
            $formdata['total_mark'] = $this->input->post('total_mark');
            $formdata['start_date'] = $this->input->post('start_date');
            $formdata['start_time'] = $this->input->post('start_time');
            $formdata['end_date'] = $this->input->post('end_date');
            $formdata['end_time'] = $this->input->post('end_time');
            $formdata['quiz_level_id'] = $this->input->post('quiz_level_id');
            if($this->input->post('quiz_level_id')!= 1){
                $formdata['region_id'] = $this->input->post('region_id');
            }  else{
                $formdata['region_id'] = 0;
            }       
            $formdata['switching_type'] = $this->input->post('switching_type');
           
            $formdata['banner_img'] = $banner_imglocation;
            $formdata['language_id'] = $this->input->post('language_id');
            $formdata['availability_id'] = $this->input->post('availability_id');
          
            $formdata['qbquestion'] = $this->input->post('qbquestion');
            $formdata['status'] = 1;
            $que_bank_id = $this->input->post('que_bank_id');
            $formdata['que_bank_id']  = $que_bank_id;

            $old_que_bank_id= $this->input->post('old_que_bank_id');
            

            $encAdminId = $this->session->userdata('admin_id');
            $modify_by = encryptids("D", $encAdminId);
            $formdata['modify_by'] = $modify_by;
            $formdata['modify_on'] = date('Y-m-d : h:i:s');

            $quiz_id = $this->Quiz_model->updateQuiz($id,$formdata);
            if($old_que_bank_id != $que_bank_id){
                $dbArray = array(
                    'quiz_linked_id' => $id
                );
               
                $this->Que_bank_model->updateQueBankbyQuizid($que_bank_id,$dbArray);
                $dbArray = array(
                    'quiz_linked_id' => 0
                );
                $this->Que_bank_model->updateQueBankbyQuizid($old_que_bank_id,$dbArray);
            }    
            if ($quiz_id) 
            { 
                $fprize_id = 1;
                $formdata1['no_of_prize'] = $this->input->post('fprize');
                $formdata1['prize_details'] = $this->input->post('fdetails'); 
                $formdata1['prize_img'] = $fprize_imglocation;

                $sprize_id = 2;
                $formdata2['no_of_prize'] = $this->input->post('sprize');
                $formdata2['prize_details'] = $this->input->post('sdetails');
                $formdata2['prize_img'] = $sprize_imglocation;

                $tprize_id = 3;
                $formdata3['no_of_prize'] = $this->input->post('tprize');
                $formdata3['prize_details'] = $this->input->post('tdetails');
                $formdata3['prize_img'] =$tprize_imglocation;
     
                $cprize_id = 4;
                $formdata4['no_of_prize'] = $this->input->post('cprize');
                $formdata4['prize_details'] = $this->input->post('cdetails');
                $formdata4['prize_img'] = "NA";

                $this->Quiz_model->updatePrize($fprize_id,$id,$formdata1);
                $this->Quiz_model->updatePrize($sprize_id,$id,$formdata2);
                $this->Quiz_model->updatePrize($tprize_id,$id,$formdata3);
                $this->Quiz_model->updatePrize($cprize_id,$id,$formdata4);  

                $this->session->set_flashdata('MSG', ShowAlert("Record Update Successfully", "SS"));
                redirect(base_url() . "quiz/quiz_list", 'refresh');
            } 
            else
            {
                $this->session->set_flashdata('MSG', ShowAlert("Failed to quiz Updation  ,Please try again", "DD"));
                redirect(base_url() . "quiz/editquiz", 'refresh');
            }
        }
        $this->load->view('admin/footers/admin_footer');
    }*/

   /* public function oldeditquiz($id)
    {
       $this->load->view('admin/headers/admin_header');
      
        $quizlavel = $this->Quiz_model->getQuizLevel();
        $getAvailability = $this->Quiz_model->getAvailability();
        $getQuizLanguage = $this->Quiz_model->getQuizLanguage(); 
        //$getAllQb = $this->Quiz_model->getAllQb();       
            
        //quize Data 
        $getAllRegions = array();
        $getAllBranches = array();
        $data=array();
        $quiz = $this->Quiz_model->getQuiz($id);
        
        if($quiz['quiz_level_id'] == 2){
         
            $getAllRegions = $this->Quiz_model->getAllRegions(); 
        }
        if($quiz['quiz_level_id'] == 3){
         
            $getAllBranches = $this->Quiz_model->getAllBranches(); 
        }
       
        $data['quizdata']=$quiz; 
        //End Quize Data

        //Get First Prize data
        $prize_id=1;
        $prize1 = $this->Quiz_model->getPrizeId($prize_id,$id); 
        
        $data['firstprize']=$prize1;
        $old_first_prize = $prize1['no_of_prize'];
        //end First Prizr Data

        //get Second Prize Data
        $prize_id=2;
        $prize2 = $this->Quiz_model->getPrizeId($prize_id,$id); 
        $data['secondprize']=$prize2;
        if(empty($prize2)){
            $old_sec_prize = 0;
        }else{
            $old_sec_prize = $prize2['no_of_prize'];
        }
       
        //End Second Prize data

        //get Third Prize Data
        $prize_id=3;
        $prize3 = $this->Quiz_model->getPrizeId($prize_id,$id); 
        $data['thirdprize']=$prize3;
        if(empty($prize3)){
            $old_third_prize = 0;
        }else{
            $old_third_prize = $prize3['no_of_prize'];
        }
        //End Third Prize data

        //get Fourth Prize Data
        $prize_id=4;
        $prize4 = $this->Quiz_model->getPrizeId($prize_id,$id); 
        $data['fourthprize']=$prize4; 
        if(empty($prize4)){
            $old_fourth_prize = 0;
        }else{
            $old_fourth_prize = $prize4['no_of_prize'];
        }

        $data['quizlavel']=$quizlavel;
        $data['getAvailability']=$getAvailability;
        $data['getQuizLanguage']=$getQuizLanguage;
        $data['getAllRegions']=$getAllRegions;
        $data['getAllBranches']=$getAllBranches;
         
        if ($this->form_validation->run('quiz_form_validation_rule') == FALSE) 
        {
            $this->load->view('quiz/edit_quiz',$data);
        } 
        else 
        {
            $banner_imgsize=$_FILES['banner_img']['size'];

            if(!empty($_FILES['fprize_img']['size'] )){
                $fprize_imgsize=$_FILES['fprize_img']['size'];
            }else{
                $fprize_imgsize=0;
            }
            //$fprize_imgsize=$_FILES['fprize_img']['size'];

            if(!empty($_FILES['sprize_img']['size'] )){
                $sprize_imgsize=$_FILES['sprize_img']['size'];
            }else{
                $sprize_imgsize=0;
            }
            //            $sprize_imgsize=$_FILES['sprize_img']['size'];

            if(!empty($_FILES['tprize_img']['size'] )){
                $tprize_imgsize=$_FILES['tprize_img']['size'];
            }else{
                $tprize_imgsize=0;
            }
            //$tprize_imgsize=$_FILES['tprize_img']['size'];
            if(!empty($_FILES['cprize_img']['size'] )){
                $cprize_imgsize=$_FILES['cprize_img']['size'];
            }else{
                $cprize_imgsize=0;
            }
            //$cprize_imgsize=$_FILES['cprize_img']['size'];

            if ($banner_imgsize > 0 ) 
            {
                $bannerpath = 'uploads/quiz_img/'; 
                $banner_imglocation = $bannerpath . time() .'quiz_banner_img'. $_FILES['banner_img']['name']; 
                move_uploaded_file($_FILES['banner_img']['tmp_name'], $banner_imglocation);
            }
            else
            {
                $banner_imglocation=$this->input->post('lastbanner');
            }
            $prizepath = 'uploads/prize_img/';
            if ($fprize_imgsize > 0) 
            {
                $fprize_imglocation = $prizepath . time() .'prize_img'. $_FILES['fprize_img']['name']; 
                move_uploaded_file($_FILES['fprize_img']['tmp_name'], $fprize_imglocation); 
            }
            else
            {
                $fprize_imglocation=$this->input->post('lastfprize_img');
            }

            if ($sprize_imgsize > 0) 
            {
                $sprize_imglocation = $prizepath . time()  .'prize_img'.$_FILES['sprize_img']['name']; 
                move_uploaded_file($_FILES['sprize_img']['tmp_name'], $sprize_imglocation);
            } 
            else
            {
                $sprize_imglocation=$this->input->post('lastsprize_img');
            }

            if ($tprize_imgsize > 0) 
            {
                $tprize_imglocation = $prizepath . time() .'prize_img'. $_FILES['tprize_img']['name']; 
                move_uploaded_file($_FILES['tprize_img']['tmp_name'], $tprize_imglocation);
            } 
            else
            {
                $tprize_imglocation=$this->input->post('lasttprize_img');
            }

            if ($cprize_imgsize > 0) 
            {
                $cprize_imglocation = $prizepath . time() .'prize_img'. $_FILES['cprize_img']['name']; 
                move_uploaded_file($_FILES['cprize_img']['tmp_name'], $cprize_imglocation);
            } 
            else
            {
                $cprize_imglocation=$this->input->post('lastcprize_img');
            }
                             
            $formdata = array(); 
            $formdata['title'] = $this->input->post('title');
            $formdata['title_hindi'] = $this->input->post('title_hindi');
            $formdata['description'] = $this->input->post('description');
            $formdata['terms_conditions'] = $this->input->post('terms_conditions');
            $formdata['duration'] = $this->input->post('duration');
            $formdata['total_question'] = $this->input->post('total_question');
            $formdata['total_mark'] = $this->input->post('total_mark');
            $formdata['start_date'] = $this->input->post('start_date');
            $formdata['start_time'] = $this->input->post('start_time');
            $formdata['end_date'] = $this->input->post('end_date');
            $formdata['end_time'] = $this->input->post('end_time');
            $formdata['quiz_level_id'] = $this->input->post('quiz_level_id');
            if($this->input->post('quiz_level_id')== 2){
                $formdata['region_id'] = $this->input->post('region_id');
            }  else{
                $formdata['region_id'] = 0;
            }      
            if($this->input->post('quiz_level_id')== 3){
                $formdata['branch_id'] = $this->input->post('branch_id');
            }  else{
                $formdata['branch_id'] = 0;
            }       
            $formdata['switching_type'] = $this->input->post('switching_type');
           
            $formdata['banner_img'] = $banner_imglocation;
            $formdata['language_id'] = $this->input->post('language_id');
            $formdata['availability_id'] = $this->input->post('availability_id');
          
            $formdata['qbquestion'] = $this->input->post('qbquestion');
            $formdata['status'] = 10;
            $que_bank_id = $this->input->post('que_bank_id');
            $formdata['que_bank_id']  = $que_bank_id;

            $old_que_bank_id= $this->input->post('old_que_bank_id');
            

            $encAdminId = $this->session->userdata('admin_id');
            $modify_by = encryptids("D", $encAdminId);
            $formdata['modify_by'] = $modify_by;
            $formdata['modify_on'] = date('Y-m-d : h:i:s');

            $quiz_id = $this->Quiz_model->updateQuiz($id,$formdata);
            if($old_que_bank_id != $que_bank_id){
                $dbArray = array(
                    'quiz_linked_id' => $id
                );
               
                $this->Que_bank_model->updateQueBankbyQuizid($que_bank_id,$dbArray);
                $dbArray = array(
                    'quiz_linked_id' => 0
                );
                $this->Que_bank_model->updateQueBankbyQuizid($old_que_bank_id,$dbArray);
            }    
            if ($quiz_id) 
            { 
                $fprize_id = 1;
                $formdata1['no_of_prize'] = $this->input->post('fprize');
                $formdata1['prize_details'] = $this->input->post('fdetails'); 
                $formdata1['prize_img'] = $fprize_imglocation;
                $this->Quiz_model->updatePrize($fprize_id,$id,$formdata1);

                $sprize_id = 2;
                $sprize = $this->input->post('sprize');
                $formdata2['no_of_prize'] = $this->input->post('sprize');               
                $formdata2['prize_details'] = $this->input->post('sdetails');
                $formdata2['prize_img'] = $sprize_imglocation;
                
                if( $sprize != 0){
                    if($old_sec_prize != 0){
                        $this->Quiz_model->updatePrize($sprize_id,$id,$formdata2);
                    }else{
                        $this->Quiz_model->insertPrize($sprize_id,$id,$formdata2);
                    }
                    
                }
               

                $tprize_id = 3;
                $tprize = $this->input->post('tprize');
                $formdata3['no_of_prize'] = $this->input->post('tprize');
                $formdata3['prize_details'] = $this->input->post('tdetails');
                $formdata3['prize_img'] =$tprize_imglocation;

                if( $tprize != 0){
                    if($old_third_prize != 0){
                        $this->Quiz_model->updatePrize($tprize_id,$id,$formdata3);
                    }else{
                        $this->Quiz_model->insertPrize($tprize_id,$id,$formdata3);
                    }
                    
                }              

                $cprize_id = 4;
                $cprize = $this->input->post('cprize');
                $formdata4['no_of_prize'] = $this->input->post('cprize');
                $formdata4['prize_details'] = $this->input->post('cdetails');
                $formdata4['prize_img'] = $cprize_imglocation;
                if( $cprize != 0){
                    if($old_third_prize != 0){
                        $this->Quiz_model->updatePrize($cprize_id,$id,$formdata4); 
                    }else{
                        $this->Quiz_model->insertPrize($cprize_id,$id,$formdata4);
                    }
                    
                }    

                $this->session->set_flashdata('MSG', ShowAlert("Record Update Successfully", "SS"));
                redirect(base_url() . "quiz/quiz_list", 'refresh');
            } 
            else
            {
                $this->session->set_flashdata('MSG', ShowAlert("Failed to quiz Updation  ,Please try again", "DD"));
                redirect(base_url() . "quiz/editquiz", 'refresh');
            }
        }
        $this->load->view('admin/footers/admin_footer');
    } */

    public function editquiz($id)
    {
        
        $id = encryptids("D", $id);
        $quizlavel = $this->Quiz_model->getQuizLevel();
        $getAvailability = $this->Quiz_model->getAvailability();
        $getQuizLanguage = $this->Quiz_model->getQuizLanguage(); 
        //$getAllQb = $this->Quiz_model->getAllQb();       
            
        //quize Data 
        $getAllRegions = array();
        $getAllBranches = array();
        $getAllStates = array();
        $data=array();
        $quiz = $this->Quiz_model->getQuiz($id);
        
        if($quiz['quiz_level_id'] == 2){
          
            $getAllRegions = $this->Quiz_model->getAllRegions(); 
        }
        if($quiz['quiz_level_id'] == 3){
           
            $getAllBranches = $this->Quiz_model->getAllBranches(); 
        }
        if($quiz['quiz_level_id'] == 4){
           
            $getAllStates = $this->Quiz_model->getAllStates(); 
        }
        $data['quizlavel']=$quizlavel;
        $data['getAvailability']=$getAvailability;
        $data['getQuizLanguage']=$getQuizLanguage;
        $data['getAllRegions']=$getAllRegions;
        $data['getAllBranches']=$getAllBranches;
        $data['getAllStates']=$getAllStates;

        $data['quizdata']=$quiz; 
        //End Quize Data

        //Get First Prize data
        $prize_id=1;
        $prize1 = $this->Quiz_model->getPrizeId($prize_id,$id);         
        $data['firstprize']=$prize1;
         //get Second Prize Data
         $prize_id=2;
         $prize2 = $this->Quiz_model->getPrizeId($prize_id,$id); 
         $data['secondprize']=$prize2;
         //get Third Prize Data
         $prize_id=3;
         $prize3 = $this->Quiz_model->getPrizeId($prize_id,$id); 
         $data['thirdprize']=$prize3;
        //get Fourth Prize Data
        $prize_id=4;
        $prize4 = $this->Quiz_model->getPrizeId($prize_id,$id); 
        $data['fourthprize']=$prize4; 

        if(empty($prize1['prize_img'])){
            $exist_fp = 0;
        }else{
            $exist_fp = 1;
        }
        $data['exist_fp']=$exist_fp; 


        if(empty($prize2['prize_img'])){
            $exist_sp = 0;
        }else{
            $exist_sp = 1;
        }
        $data['exist_sp']=$exist_sp; 



        if(empty($prize3['prize_img'])){
            $exist_tp = 0;
        }else{
            $exist_tp = 1;
        }
        $data['exist_tp']=$exist_tp; 


        if(empty($prize4['prize_img'])){
            $exist_cp = 0;
        }else{
            $exist_cp = 1;
        }
        $data['exist_cp']=$exist_cp; 
        
         
        $this->load->view('admin/headers/admin_header');
        $this->load->view('quiz/edit_quiz',$data);
        $this->load->view('admin/footers/admin_footer');
    }
    public function editquizsubmit($id){
        // $quizlavel = $this->Quiz_model->getQuizLevel();
        // $getAvailability = $this->Quiz_model->getAvailability();
        // $getQuizLanguage = $this->Quiz_model->getQuizLanguage(); 
        //$getAllQb = $this->Quiz_model->getAllQb();       
            
        //quize Data 
        // $getAllRegions = array();
        // $getAllBranches = array();
        // $getAllStates = array();
       
        
        // if($quiz['quiz_level_id'] == 2){
          
        //     $getAllRegions = $this->Quiz_model->getAllRegions(); 
        // }
        // if($quiz['quiz_level_id'] == 3){
           
        //     $getAllBranches = $this->Quiz_model->getAllBranches(); 
        // }
        // if($quiz['quiz_level_id'] == 4){
           
        //     $getAllStates = $this->Quiz_model->getAllStates(); 
        // }
        // $data['quizlavel']=$quizlavel;
        // $data['getAvailability']=$getAvailability;
        // $data['getQuizLanguage']=$getQuizLanguage;
        // $data['getAllRegions']=$getAllRegions;
        // $data['getAllBranches']=$getAllBranches;
        // $data['getAllStates']=$getAllStates;
        // $data['quizdata']=$quiz; 
        // //End Quize Data
        $data=array();
        $quiz = $this->Quiz_model->getQuiz($id);
       // Get First Prize data
        $prize_id=1;
        $prize1 = $this->Quiz_model->getPrizeId($prize_id,$id);         
        $data['firstprize']=$prize1;
         //get Second Prize Data
         $prize_id=2;
         $prize2 = $this->Quiz_model->getPrizeId($prize_id,$id); 
         $data['secondprize']=$prize2;
         //get Third Prize Data
         $prize_id=3;
         $prize3 = $this->Quiz_model->getPrizeId($prize_id,$id); 
         $data['thirdprize']=$prize3;
        //get Fourth Prize Data
        $prize_id=4;
        $prize4 = $this->Quiz_model->getPrizeId($prize_id,$id); 
        $data['fourthprize']=$prize4; 
       


           
            if ($this->form_validation->run('quiz_form_validation_rule') == FALSE) 
            {
                $this->load->view('quiz/editquiz/'.$id,$data);
            } 
            else 
            {
                $banner_imgsize=$_FILES['banner_img']['size'];

               
                $fp_img = $this->input->post('fp_img');

                if($fp_img == 1){
                    if(!file_exists($_FILES['fprize_img']['tmp_name']) || !is_uploaded_file($_FILES['fprize_img']['tmp_name'])) {
                        $fprize_imgsize = 0;
                    }else{
                        $fprize_imgsize = 1;
                    }
                }else{
                    $fprize_imgsize = 0;
                }
                
                $sp_img = $this->input->post('sp_img');

                if($sp_img == 1){
                    if(!file_exists($_FILES['sprize_img']['tmp_name']) || !is_uploaded_file($_FILES['sprize_img']['tmp_name'])) {
                        $sprize_imgsize = 0;
                    }else{
                        $sprize_imgsize = 1;
                    }
                }else{
                    $sprize_imgsize = 0;
                }
                $tp_img = $this->input->post('tp_img');

                if($tp_img == 1){
                    if(!file_exists($_FILES['tprize_img']['tmp_name']) || !is_uploaded_file($_FILES['tprize_img']['tmp_name'])) {
                        $tprize_imgsize = 0;
                    }else{
                        $tprize_imgsize = 1;
                    }
                }else{
                    $tprize_imgsize = 0;
                }
                $cp_img = $this->input->post('cp_img');

                if($cp_img == 1){
                    if(!file_exists($_FILES['cprize_img']['tmp_name']) || !is_uploaded_file($_FILES['cprize_img']['tmp_name'])) {
                        $cprize_imgsize = 0;
                    }else{
                        $cprize_imgsize = 1;
                    }
                }else{
                    $cprize_imgsize = 0;
                }
                
    
                if ($banner_imgsize > 0 ) 
                {
                    $bannerpath = 'uploads/quiz_img/'; 
                    $banner_imglocation = $bannerpath . time() .'quiz_banner_img'. $_FILES['banner_img']['name']; 
    
                    move_uploaded_file($_FILES['banner_img']['tmp_name'], $banner_imglocation);
                }
                else
                {
                    $banner_imglocation=$this->input->post('lastbanner');
                }
    
                $prizepath = 'uploads/prize_img/';
                if ($fprize_imgsize > 0) 
                {
                    $fprize_imglocation = $prizepath . time() .'prize_img'. $_FILES['fprize_img']['name']; 
    
                    move_uploaded_file($_FILES['fprize_img']['tmp_name'], $fprize_imglocation);                     
                }
                else
                {
                    $fprize_imglocation=$this->input->post('lastfprize_img');
                }
    
                if ($sprize_imgsize > 0) 
                {
                    $sprize_imglocation = $prizepath . time()  .'prize_img'.$_FILES['sprize_img']['name'];
    
                    move_uploaded_file($_FILES['sprize_img']['tmp_name'], $sprize_imglocation);
                } 
                else
                {
                    $sprize_imglocation=$this->input->post('lastsprize_img');
                }
              
                if ($tprize_imgsize > 0) 
                {
                    $tprize_imglocation = $prizepath . time() .'prize_img'. $_FILES['tprize_img']['name']; 
                    move_uploaded_file($_FILES['tprize_img']['tmp_name'], $tprize_imglocation);
                } 
                else
                {
                    $tprize_imglocation=$this->input->post('lasttprize_img');
                }
    
                if ($cprize_imgsize > 0) 
                {
                    $cprize_imglocation = $prizepath . time() .'prize_img'. $_FILES['cprize_img']['name']; 
                    move_uploaded_file($_FILES['cprize_img']['tmp_name'], $cprize_imglocation);
                } 
                else
                {
                    $cprize_imglocation=$this->input->post('lastcprize_img');
                }
                                 
                $formdata = array(); 
                $formdata['title'] = $this->input->post('title');
                $formdata['title_hindi'] = $this->input->post('title_hindi');
                $formdata['description'] = $this->input->post('description');
                $formdata['terms_conditions'] = $this->input->post('terms_conditions');
                $formdata['duration'] = $this->input->post('duration');
                $formdata['total_question'] = $this->input->post('total_question');
                $formdata['total_mark'] = $this->input->post('total_mark');
                $formdata['start_date'] = $this->input->post('start_date');
                $formdata['start_time'] = $this->input->post('start_time');
                $formdata['end_date'] = $this->input->post('end_date');
                $formdata['end_time'] = $this->input->post('end_time');
                $formdata['quiz_level_id'] = $this->input->post('quiz_level_id');
                if($this->input->post('quiz_level_id')== 2){
                    $formdata['region_id'] = $this->input->post('region_id');
                }  else{
                    $formdata['region_id'] = 0;
                }      
                if($this->input->post('quiz_level_id')== 3){
                    $formdata['branch_id'] = $this->input->post('branch_id');
                }  else{
                    $formdata['branch_id'] = 0;
                }       
                if($this->input->post('quiz_level_id')== 4){
                    $formdata['state_id'] = $this->input->post('state_id');
                }  else{
                    $formdata['state_id'] = 0;
                }       
                $formdata['switching_type'] = $this->input->post('switching_type');
               
                $formdata['banner_img'] = $banner_imglocation;
                $formdata['language_id'] = $this->input->post('language_id');
                $formdata['availability_id'] = $this->input->post('availability_id');
                if($this->input->post('availability_id')== 1){               
                    $standard = $this->input->post('standard');  
                    $formdata['standard'] = implode(',',$standard);    
                }else{
                    $formdata['standard'] = 0;
                }
              
                $formdata['qbquestion'] = $this->input->post('qbquestion');
                $formdata['status'] = 10;
                $que_bank_id = $this->input->post('que_bank_id');
                $formdata['que_bank_id']  = $que_bank_id;
    
                $old_que_bank_id= $this->input->post('old_que_bank_id');
                
    
                $encAdminId = $this->session->userdata('admin_id');
                $modify_by = encryptids("D", $encAdminId);
                $formdata['modify_by'] = $modify_by;
                $formdata['modify_on'] = date('Y-m-d : h:i:s');
    
                $quiz_id = $this->Quiz_model->updateQuiz($id,$formdata);
                if($old_que_bank_id != $que_bank_id){
                    $dbArray = array(
                        'quiz_linked_id' => $id
                    );
                   
                    $this->Que_bank_model->updateQueBankbyQuizid($que_bank_id,$dbArray);
                    $dbArray = array(
                        'quiz_linked_id' => 0
                    );
                    $this->Que_bank_model->updateQueBankbyQuizid($old_que_bank_id,$dbArray);
                }    
                if ($quiz_id) 
                { 
                    $fprize_id = 1;
                    $formdata1['no_of_prize'] = $this->input->post('fprize');
                    $formdata1['prize_details'] = $this->input->post('fdetails'); 
                    $formdata1['prize_img'] = $fprize_imglocation;
                    $this->Quiz_model->updatePrize($fprize_id,$id,$formdata1);
    
                    $sprize_id = 2;
                    $sprize = $this->input->post('sprize');
                    if(!empty($prize2)){
                        $old_no_sec_prize = $prize2['no_of_prize'];
                    }else{
                        $old_no_sec_prize = 0;
                    }
                   
                    if($sprize != 0 || $sprize != ""){
                        if($old_no_sec_prize != 0){
                            $formdata2['no_of_prize'] = $this->input->post('sprize');               
                            $formdata2['prize_details'] = $this->input->post('sdetails');
                            $formdata2['prize_img'] = $sprize_imglocation;                         
                            $this->Quiz_model->updatePrize($sprize_id,$id,$formdata2);
                        }else{
                            $formdata2['quiz_id'] = $id;
                            $formdata2['prize_id'] = 2;                        
                            $formdata2['no_of_prize'] = $this->input->post('sprize');               
                            $formdata2['prize_details'] = $this->input->post('sdetails');
                            $formdata2['prize_img'] = $sprize_imglocation;                            
                            $this->Quiz_model->insertPrize($formdata2);
                        }
                        
                    }
                    if($sprize == 0  || $sprize == ""){
                        $this->Quiz_model->deletePrize($sprize_id,$id);
                    }
                   
    
                    $tprize_id = 3;
                    $tprize = $this->input->post('tprize');
                    if(!empty($prize3)){
                        $old_no_third_prize = $prize3['no_of_prize'];
                    }else{
                        $old_no_third_prize = 0;
                    }
    
                    if( $tprize != 0  || $tprize != ""){
                        if($old_no_third_prize != 0){
                            $formdata3['no_of_prize'] = $this->input->post('tprize');
                            $formdata3['prize_details'] = $this->input->post('tdetails');
                            $formdata3['prize_img'] =$tprize_imglocation;
                            $this->Quiz_model->updatePrize($tprize_id,$id,$formdata3);
                        }else{
                            $formdata3['quiz_id'] = $id;
                            $formdata3['prize_id'] = 3;  
                            $formdata3['no_of_prize'] = $this->input->post('tprize');
                            $formdata3['prize_details'] = $this->input->post('tdetails');
                            $formdata3['prize_img'] =$tprize_imglocation;
                            $this->Quiz_model->insertPrize($formdata3);
                        }
                        
                    }              
                    if($tprize == 0  || $tprize == ""){
                        $this->Quiz_model->deletePrize($tprize_id,$id);
                    }
                    $cprize_id = 4;
                    $cprize = $this->input->post('cprize');
                    if(!empty($prize4)){
                        $old_no_fourth_prize = $prize3['no_of_prize'];
                    }else{
                        $old_no_fourth_prize = 0;
                    }
                    if( $cprize != 0  || $cprize != ""){
                        if($old_no_fourth_prize != 0){
                            $formdata4['no_of_prize'] = $this->input->post('cprize');
                            $formdata4['prize_details'] = $this->input->post('cdetails');
                            $formdata4['prize_img'] = $cprize_imglocation;
                            $this->Quiz_model->updatePrize($cprize_id,$id,$formdata4); 
                        }else{
                            $formdata4['quiz_id'] = $id;
                            $formdata4['prize_id'] = 4;  
                            $formdata4['no_of_prize'] = $this->input->post('cprize');
                            $formdata4['prize_details'] = $this->input->post('cdetails');
                            $formdata4['prize_img'] = $cprize_imglocation;
                            $this->Quiz_model->insertPrize($formdata4);
                        }
                        
                    }    
                    if($cprize == 0  || $cprize == ""){
                        $this->Quiz_model->deletePrize($cprize_id,$id);
                    }
                    $this->session->set_flashdata('MSG', ShowAlert("Record Update Successfully", "SS"));
                    redirect(base_url() . "quiz/quiz_list", 'refresh');
                } 
                else
                {
                    $this->session->set_flashdata('MSG', ShowAlert("Failed to quiz Updation  ,Please try again", "DD"));
                    redirect(base_url() . "quiz/editquiz/".$id, 'refresh');
                }
            }     
        
    }
    //ajax delete banner 
    public function deleteBanner(){
        try {
            $quiz_id = $this->input->post('id');    
            $img_name = $this->input->post('img_name');         
         

            $data1 = array(
                'banner_img' => "",               
                'modify_on' => GetCurrentDateTime('Y-m-d h:i:s'),
                'modify_by' => encryptids("D", $_SESSION['admin_type']),
            );

            $id = $this->Quiz_model->updateDataQuiz($quiz_id, $data1);
            if ($id) {
                $data['status'] = 1;
                $data['message'] = 'Banner deleted successfully.';
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
    public function deletePrizeImg(){
        try {
            $quiz_id = $this->input->post('quiz_id');    
            $img_name = $this->input->post('img_name');
           
            $prize_id = $this->input->post('prize_id'); 
            $data1 = array(
                'prize_img' => "",               
                'modified_on' => GetCurrentDateTime('Y-m-d h:i:s'),
                'modified_by' => encryptids("D", $_SESSION['admin_type']),
            );
            $id = $this->Quiz_model->updatePrizeImg($quiz_id,$prize_id, $data1);
            if ($id) {
                $data['status'] = 1;
                $data['message'] = 'Prize Image deleted successfully.';
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
    public function getAllBranches(){
        $level_id = $this->input->post('id');
    
        $details = array();
        $details = $this->Quiz_model->getAllBranches();
        if (empty($details)) {
            $data['status'] = 0;
            $data['message'] = 'Failed to get details , Please try again.';
            $data['region'] = $details;
        } else {
            $data['status'] = 1;
            $data['message'] = 'Details Available.';
            $data['region'] = $details;
        }
        echo  json_encode($data);
        exit();
    }
    public function getAllStates(){
        $level_id = $this->input->post('id');
    
        $details = array();
        $details = $this->Quiz_model->getAllStates();
        if (empty($details)) {
            $data['status'] = 0;
            $data['message'] = 'Failed to get details , Please try again.';
            $data['state'] = $details;
        } else {
            $data['status'] = 1;
            $data['message'] = 'Details Available.';
            $data['state'] = $details;
        }
        echo  json_encode($data);
        exit();
    }

    
    


  
   
    public function quiz_edit()
    {
        $this->load->view('admin/headers/admin_header');
        $this->load->view('quiz/quiz_edit');
        $this->load->view('admin/footers/admin_footer');
    }
 
   
   //ajax
   public function getAllRegions(){
    $region_id = $this->input->post('id');

    $details = array();
    $details = $this->Quiz_model->getAllRegions($region_id);
    if (empty($details)) {
        $data['status'] = 0;
        $data['message'] = 'Failed to get details , Please try again.';
        $data['region'] = $details;
    } else {
        $data['status'] = 1;
        $data['message'] = 'Details Available.';
        $data['region'] = $details;
    }
    echo  json_encode($data);
    exit();
   }
   //Ajax
   public function fetchQueBankForQuiz(){
    $total_question = $this->input->post('total_question');
    $language_id = $this->input->post('language_id');

    $details = array();
    $details = $this->Quiz_model->fetchQueBankForQuiz($total_question,$language_id);
    if (empty($details)) {
        $data['status'] = 0;
        $data['message'] = 'Failed to get details , Please try again.';
        $data['queBanks'] = $details;
    } else {
        $data['status'] = 1;
        $data['message'] = 'Details Available.';
        $data['queBanks'] = $details;
    }
    echo  json_encode($data);
    exit();
   }
   
    // public function quiz_reg()
    // {
         
    //     $quizlavel = $this->Quiz_model->getQuizLevel();
    //     $getAvailability = $this->Quiz_model->getAvailability();
    //     $getQuizLanguage = $this->Quiz_model->getQuizLanguage();
    //    // $getAllQb = $this->Quiz_model->getAllQb();
       
    //     $formdataall=array();
    //     $formdataall['quizlavel']=$quizlavel;
    //     $formdataall['getAvailability']=$getAvailability;
    //     $formdataall['getQuizLanguage']=$getQuizLanguage;
    //    // $formdataall['getAllQb']=$getAllQb;
       

    //     $this->load->view('admin/headers/admin_header'); 
    //     if ($this->form_validation->run('quiz_form_validation_rule') == FALSE) 
    //     {
    //         $this->load->view('quiz/quiz_form',$formdataall);
    //     }
    //     else
    //     {
    //         $bannerpath = 'uploads/quiz_img/'; 
    //         $banner_imglocation = $bannerpath . time() .'quiz_banner_img'. $_FILES['banner_img']['name']; 
    //         move_uploaded_file($_FILES['banner_img']['tmp_name'], $banner_imglocation);

    //         $prizepath = 'uploads/prize_img/'; 
    //         if (!empty($_FILES['fprize_img']['tmp_name'])) {
    //         $fprize_imglocation = $prizepath . time() .'prize_img'. $_FILES['fprize_img']['name']; 
    //         move_uploaded_file($_FILES['fprize_img']['tmp_name'], $fprize_imglocation); }
    //         $sprize_imglocation ="";
    //         if (!empty($_FILES['sprize_img']['tmp_name'])) {
    //         $sprize_imglocation = $prizepath . time()  .'prize_img'.$_FILES['sprize_img']['name']; 
    //         move_uploaded_file($_FILES['sprize_img']['tmp_name'], $sprize_imglocation);}
    //         $tprize_imglocation ="";
    //         if (!empty($_FILES['tprize_img']['tmp_name'])) {
    //         $tprize_imglocation = $prizepath . time() .'prize_img'. $_FILES['tprize_img']['name']; 
    //         move_uploaded_file($_FILES['tprize_img']['tmp_name'], $tprize_imglocation);}
    //         $cprize_imglocation = "";
    //         if (!empty($_FILES['cprize_img']['tmp_name'])) {
    //             $cprize_imglocation = $prizepath . time() .'prize_img'. $_FILES['cprize_img']['name']; 
    //             move_uploaded_file($_FILES['cprize_img']['tmp_name'], $cprize_imglocation);}

    //         $encAdminId = $this->session->userdata('admin_id');
    //         $created_by = encryptids("D", $encAdminId);            
           
    //         $formdata = array();
    //         $formdata['quiz_id'] = date('mdy').$this->random_strings(4);
    //         $formdata['title'] = $this->input->post('title');
    //         $formdata['title_hindi'] = $this->input->post('title_hindi');
    //         $formdata['description'] = $this->input->post('description');
    //         $formdata['terms_conditions'] = $this->input->post('terms_conditions');
    //         $formdata['duration'] = $this->input->post('duration');
    //         $formdata['total_question'] = $this->input->post('total_question');
    //         $formdata['total_mark'] = $this->input->post('total_mark');
    //         $formdata['start_date'] = $this->input->post('start_date');
    //         $formdata['start_time'] = $this->input->post('start_time');
    //         $formdata['end_date'] = $this->input->post('end_date');
    //         $formdata['end_time'] = $this->input->post('end_time');
    //         $formdata['quiz_level_id'] = $this->input->post('quiz_level_id');
    //         if($this->input->post('quiz_level_id')!= 1){
    //             $formdata['region_id'] = $this->input->post('region_id');
    //         }else{
    //             $formdata['region_id'] = 0;
    //         }
         
    //         $formdata['switching_type'] = $this->input->post('switching_type');
    //         $formdata['banner_img'] = $banner_imglocation;
    //         $formdata['language_id'] = $this->input->post('language_id');
    //         $formdata['availability_id'] = $this->input->post('availability_id');
    //         $que_bank_id = $this->input->post('que_bank_id');
    //         $formdata['que_bank_id']  = $que_bank_id;
            

    //         $formdata['created_by'] = $created_by;
    //         $formdata['status'] = 1;

    //         $quiz_id = $this->Quiz_model->insertQuiz($formdata);
    //         $dbArray = array(
    //             'quiz_linked_id' => $quiz_id
    //         );
    //         $this->Que_bank_model->updateQueBankbyQuizid($que_bank_id,$dbArray);
           
    //         if ($quiz_id) {
    //             $formdata1 = array();
    //             $formdata2 = array();
    //             $formdata3 = array();
    //             $formdata4 = array();
    //             if($this->input->post('fprize')!= ""){
    //             $formdata1['quiz_id'] = $quiz_id;
    //             $formdata1['prize_id'] = 1;
    //             $formdata1['no_of_prize'] = $this->input->post('fprize');
    //             $formdata1['prize_details'] = $this->input->post('fdetails');
    //             $formdata1['prize_img'] = $fprize_imglocation;
    //             $this->Quiz_model->insertPrize($formdata1);
    //             }
    //             if($this->input->post('sprize')!= ""){
    //                 $formdata2['quiz_id'] = $quiz_id;
    //                 $formdata2['prize_id'] = 2;
    //                 $formdata2['no_of_prize'] = $this->input->post('sprize');
    //                 $formdata2['prize_details'] = $this->input->post('sdetails');
    //                 $formdata2['prize_img'] = $sprize_imglocation; 
    //                 $this->Quiz_model->insertPrize($formdata2);
    //             }
              
    //             if($this->input->post('tprize')!= ""){
    //             $formdata3['quiz_id'] = $quiz_id;
    //             $formdata3['prize_id'] = 3;
    //             $formdata3['no_of_prize'] = $this->input->post('tprize');
    //             $formdata3['prize_details'] = $this->input->post('tdetails');
    //             $formdata3['prize_img'] =$tprize_imglocation; 
    //             $this->Quiz_model->insertPrize($formdata3);
    //             }

    //             if($this->input->post('cprize')!= ""){
    //             $formdata4['quiz_id'] = $quiz_id;
    //             $formdata4['prize_id'] = 4;
    //             $formdata4['no_of_prize'] = $this->input->post('cprize');
    //             $formdata4['prize_details'] = $this->input->post('cdetails');
    //             $formdata4['prize_img'] = $cprize_imglocation;
    //             $this->Quiz_model->insertPrize($formdata4);
    //             }

               
               
             
              

    //             $this->session->set_flashdata('MSG', ShowAlert("Record Inserted Successfully", "SS"));
    //             redirect(base_url() . "quiz/quiz_list", 'refresh');
    //         }
    //         else
    //         {
    //             $this->session->set_flashdata('MSG', ShowAlert("Failed to create new admin,Please try again", "DD"));
    //             redirect(base_url() . "quiz/quiz_reg", 'refresh');
    //         }
    //     }
    //     $this->load->view('admin/footers/admin_footer');
    // }
    public function quiz_reg()
    {
         
        $quizlavel = $this->Quiz_model->getQuizLevel();
        $getAvailability = $this->Quiz_model->getAvailability();
        $getQuizLanguage = $this->Quiz_model->getQuizLanguage();
       // $getAllQb = $this->Quiz_model->getAllQb();
       
        $formdataall=array();
        $formdataall['quizlavel']=$quizlavel;
        $formdataall['getAvailability']=$getAvailability;
        $formdataall['getQuizLanguage']=$getQuizLanguage;

       // $formdataall['getAllQb']=$getAllQb;
       

        $this->load->view('admin/headers/admin_header'); 
        if ($this->form_validation->run('quiz_form_validation_rule') == FALSE) 
        {
            $this->load->view('quiz/quiz_form',$formdataall);
        }
        else
        {
            $bannerpath = 'uploads/quiz_img/'; 
            $banner_imglocation = $bannerpath . time() .'quiz_banner_img'. $_FILES['banner_img']['name']; 
            move_uploaded_file($_FILES['banner_img']['tmp_name'], $banner_imglocation);

            $prizepath = 'uploads/prize_img/'; 
            $fprize_imglocation ="";
            if (!empty($_FILES['fprize_img']['tmp_name'])) {
            $fprize_imglocation = $prizepath . time() .'prize_img'. $_FILES['fprize_img']['name']; 
            move_uploaded_file($_FILES['fprize_img']['tmp_name'], $fprize_imglocation); }

            $sprize_imglocation ="";
            if (!empty($_FILES['sprize_img']['tmp_name'])) {
            $sprize_imglocation = $prizepath . time()  .'prize_img'.$_FILES['sprize_img']['name']; 
            move_uploaded_file($_FILES['sprize_img']['tmp_name'], $sprize_imglocation);}
            $tprize_imglocation ="";
            if (!empty($_FILES['tprize_img']['tmp_name'])) {
            $tprize_imglocation = $prizepath . time() .'prize_img'. $_FILES['tprize_img']['name']; 
            move_uploaded_file($_FILES['tprize_img']['tmp_name'], $tprize_imglocation);}
            $cprize_imglocation = "";
            if (!empty($_FILES['cprize_img']['tmp_name'])) {
                $cprize_imglocation = $prizepath . time() .'prize_img'. $_FILES['cprize_img']['name']; 
                move_uploaded_file($_FILES['cprize_img']['tmp_name'], $cprize_imglocation);}

            $encAdminId = $this->session->userdata('admin_id');
            $created_by = encryptids("D", $encAdminId);            
           
            $formdata = array();
            $formdata['quiz_id'] = date('mdy').$this->random_strings(4);
            $formdata['title'] = $this->input->post('title');
            $formdata['title_hindi'] = $this->input->post('title_hindi');
            $formdata['description'] = $this->input->post('description');
            $formdata['terms_conditions'] = $this->input->post('terms_conditions');
            $formdata['duration'] = $this->input->post('duration');
            $formdata['total_question'] = $this->input->post('total_question');
            $formdata['total_mark'] = $this->input->post('total_mark');

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
            // echo  "time =".$this->input->post('start_time');
            // echo "new date";
            // echo date("H:i:s", strtotime($re));
            // exit();
           
           
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
         
            $formdata['switching_type'] = $this->input->post('switching_type');
            $formdata['banner_img'] = $banner_imglocation;
            $formdata['language_id'] = $this->input->post('language_id');
            $formdata['availability_id'] = $this->input->post('availability_id');
            if($this->input->post('availability_id')== 1){               
                $standard = $this->input->post('standard');  
                $formdata['standard'] = implode(',',$standard);    
            }else{
                $formdata['standard'] = 0;
            }
            $que_bank_id = $this->input->post('que_bank_id');
            $formdata['que_bank_id']  = $que_bank_id;
            

            $formdata['created_by'] = $created_by;
            $formdata['status'] = 10;

            $quiz_id = $this->Quiz_model->insertQuiz($formdata);
            $dbArray = array(
                'quiz_linked_id' => $quiz_id
            );
            $this->Que_bank_model->updateQueBankbyQuizid($que_bank_id,$dbArray);
           
            if ($quiz_id) {
                $formdata1 = array();
                $formdata2 = array();
                $formdata3 = array();
                $formdata4 = array();
                if($this->input->post('fprize')!= ""){
                $formdata1['quiz_id'] = $quiz_id;
                $formdata1['prize_id'] = 1;
                $formdata1['no_of_prize'] = $this->input->post('fprize');
                $formdata1['prize_details'] = $this->input->post('fdetails');

                $formdata1['prize_img'] = $fprize_imglocation;
                $this->Quiz_model->insertPrize($formdata1);
                }
                if($this->input->post('sprize')!= ""){
                    $formdata2['quiz_id'] = $quiz_id;
                    $formdata2['prize_id'] = 2;
                    $formdata2['no_of_prize'] = $this->input->post('sprize');
                    $formdata2['prize_details'] = $this->input->post('sdetails');
                    $formdata2['prize_img'] = $sprize_imglocation; 
                    $this->Quiz_model->insertPrize($formdata2);
                }
              
                if($this->input->post('tprize')!= ""){
                $formdata3['quiz_id'] = $quiz_id;
                $formdata3['prize_id'] = 3;
                $formdata3['no_of_prize'] = $this->input->post('tprize');
                $formdata3['prize_details'] = $this->input->post('tdetails');
                $formdata3['prize_img'] =$tprize_imglocation; 
                $this->Quiz_model->insertPrize($formdata3);
                }

                if($this->input->post('cprize')!= ""){
                $formdata4['quiz_id'] = $quiz_id;
                $formdata4['prize_id'] = 4;
                $formdata4['no_of_prize'] = $this->input->post('cprize');
                $formdata4['prize_details'] = $this->input->post('cdetails');
                $formdata4['prize_img'] = $cprize_imglocation;
                $this->Quiz_model->insertPrize($formdata4);
                }      
                $this->session->set_flashdata('MSG', ShowAlert("Record Inserted Successfully", "SS"));
                redirect(base_url() . "quiz/quiz_list", 'refresh');
            }
            else
            {
                $this->session->set_flashdata('MSG', ShowAlert("Failed to create new admin,Please try again", "DD"));
                redirect(base_url() . "quiz/quiz_reg", 'refresh');
            }
        }
        $this->load->view('admin/footers/admin_footer');
    }
     public function sendToCreate($id)
    {
            
        $encAdminId = $this->session->userdata('admin_id');
        $modify_by = encryptids("D", $encAdminId);

        $formdata['modify_by'] = $modify_by;
        $formdata['modify_on'] = date('Y-m-d : h:i:s');
        $formdata['status']=1;
        
        $quiz_id = $this->Quiz_model->sendToCreate($id,$formdata);
        if ($quiz_id==1) 
        {
            $this->session->set_flashdata('MSG', ShowAlert("Quiz Sent for Approval", "SS"));
            redirect(base_url() . "quiz/quiz_list", 'refresh');
        }
        else 
        {
            $this->session->set_flashdata('MSG', ShowAlert("Failed to Send for Approve admin,Please try again", "DD"));
            redirect(base_url() . "quiz/quiz_list", 'refresh');
        }
    }

    public function quiz_list()
    {
        
      
        $allquize = $this->Quiz_model->getAllQuize();
        $data = array();
        $data['allquize'] = $allquize;
        $permissions = array();
        if (encryptids("D", $_SESSION['admin_type']) == 3) { 
            if (in_array(1, $_SESSION['sub_mod_per'])) { 
                $sub_model_id = 1;
                $permissions = $this->Admin_model->getUsersPermissions($sub_model_id);
            }
            $data['permissions'] =  $permissions;
        }

      

        $this->load->view('admin/headers/admin_header');
        $this->load->view('quiz/quiz_list', $data);
        $this->load->view('admin/footers/admin_footer');
    }
    public function quiz_competition_dashboard()
    {
        $this->load->view('admin/headers/admin_header');
        $this->load->view('quiz/quiz_competition_dashboard');
        $this->load->view('admin/footers/admin_footer');
    }
    public function quiz_view($id)
    {
         $id = encryptids("D", $id);
        $this->load->view('admin/headers/admin_header');
      
         
        $data=array();
        $quiz = $this->Quiz_model->viewQuiz($id);
        //echo json_encode($quiz);exit();
        $quizdata=array();
        $data['quizdata']=$quiz; 
        //End Quize Data
          
        //Get First Prize data
        $prize_id=1;
        $prize1 = $this->Quiz_model->getPrizeId($prize_id,$id); 
        $data['firstprize']=$prize1;
       // echo json_encode($prize1);exit();
        //end First Prizr Data

        //get Second Prize Data
        $prize_id=2;
        $prize2 = $this->Quiz_model->getPrizeId($prize_id,$id); 
        $data['secondprize']=$prize2;
        //End Second Prize data

        //get Third Prize Data
        $prize_id=3;
        $prize3 = $this->Quiz_model->getPrizeId($prize_id,$id); 
        $data['thirdprize']=$prize3;
        //End Third Prize data

        //get Fourth Prize Data
        $prize_id=4;
        $prize4 = $this->Quiz_model->getPrizeId($prize_id,$id); 
        $data['fourthprize']=$prize4;
        
        $this->load->view('quiz/quiz_view',$data);
        $this->load->view('admin/footers/admin_footer');
    }
    
    // Ajax Call Function
    public function getQbdata($id)
    {
      
        $data['result'] = $this->Quiz_model->getQbdataa($id);
        echo  json_encode($data); 
    }

    public function sendApprove($id)
    {
            
        $encAdminId = $this->session->userdata('admin_id');
        $modify_by = encryptids("D", $encAdminId);

        $formdata['modify_by'] = $modify_by;
        $formdata['modify_on'] = date('Y-m-d : h:i:s');
        $formdata['status']=2;
        
        $quiz_id = $this->Quiz_model->sendToApprove($id,$formdata);
        if ($quiz_id==1) 
        {
            $this->session->set_flashdata('MSG', ShowAlert("Quiz Sent for Approval", "SS"));
            redirect(base_url() . "quiz/manage_quiz_list", 'refresh');
        }
        else 
        {
            $this->session->set_flashdata('MSG', ShowAlert("Failed to Send for Approve admin,Please try again", "DD"));
            redirect(base_url() . "quiz/manage_quiz_list", 'refresh');
        }
    }
   
    public function publishQuiz($id)
    {
      

        $encAdminId = $this->session->userdata('admin_id');
        $modify_by = encryptids("D", $encAdminId);
        $formdata['modify_by'] = $modify_by;
        $formdata['modify_on'] = date('Y-m-d : h:i:s'); 
        $formdata['status']=5;
        $quiz_id = $this->Quiz_model->updatepublish($id,$formdata);
        if ($quiz_id==1) 
        {
            $this->session->set_flashdata('MSG', ShowAlert("Quiz Published", "SS"));
            redirect(base_url() . "quiz/manage_quiz_list", 'refresh');
        }
        else 
        {
            $this->session->set_flashdata('MSG', ShowAlert("Failed to Send for Approve admin,Please try again", "DD"));
            redirect(base_url() . "quiz/quiz_reg", 'refresh');
        }
    }
    public function unPublishQuiz($id)
    {
      
        $encAdminId = $this->session->userdata('admin_id');
        $modify_by = encryptids("D", $encAdminId);
        $formdata['modify_by'] = $modify_by;
        $formdata['modify_on'] = date('Y-m-d : h:i:s'); 
        $formdata['status']=6;
        $quiz_id = $this->Quiz_model->updatepublish($id,$formdata);
        if ($quiz_id==1) 
        {
            $this->session->set_flashdata('MSG', ShowAlert("Quiz Un-Published", "SS"));
            redirect(base_url() . "quiz/manage_quiz_list", 'refresh');
        }
        else 
        {
            $this->session->set_flashdata('MSG', ShowAlert("Failed to Send for Approve admin,Please try again", "DD"));
            redirect(base_url() . "quiz/quiz_reg", 'refresh');
        }
    }

    public function manage_quiz_list()
    {       
        $allquize = $this->Admin_model->getAllManageQuiz();
        $data = array();
        $data['allquize'] = $allquize; 
        //echo json_encode($allquize);exit();
        $permissions = array();
        if (encryptids("D", $_SESSION['admin_type']) == 3) { 
            if (in_array(2, $_SESSION['sub_mod_per'])) { 
                $sub_model_id = 2;
                $permissions = $this->Admin_model->getUsersPermissions($sub_model_id);
            }
            $data['permissions'] =  $permissions;
        }

        $this->load->view('admin/headers/admin_header');
        $this->load->view('quiz/manage_quiz_list',$data);
        $this->load->view('admin/footers/admin_footer');
    }
    public function manage_quiz_view($id)
    {
             
        $data=array();
        $quiz = $this->Quiz_model->viewQuiz($id);
        $quizdata=array();
        $data['quizdata']=$quiz; 
        //End Quize Data

        //Get First Prize data
        $prize_id=1;
        $prize = $this->Quiz_model->getPrizeId($prize_id,$id); 
        $data['firstprize']=$prize;
        //end First Prizr Data

        //get Second Prize Data
        $prize_id=2;
        $prize = $this->Quiz_model->getPrizeId($prize_id,$id); 
        $data['secondprize']=$prize;
        //End Second Prize data

        //get Third Prize Data
        $prize_id=3;
        $prize = $this->Quiz_model->getPrizeId($prize_id,$id); 
        $data['thirdprize']=$prize;
        //End Third Prize data

        //get Fourth Prize Data
        $prize_id=4;
        $prize = $this->Quiz_model->getPrizeId($prize_id,$id); 
        $data['fourthprize']=$prize;

        $this->load->view('admin/headers/admin_header');
        $this->load->view('quiz/manage_quiz_view',$data);
        $this->load->view('admin/footers/admin_footer');
    }
    
    
    public function closed_quiz_submission($id)
    {
        $data=array();
        $id= encryptids('D', $id);
        $users = $this->Quiz_model->getQuizSubmissionUsers($id); 
        $data['UsersDetails']=$users; 

        $this->load->view('admin/headers/admin_header');
        $this->load->view('quiz/closed_quiz_submission',$data);
        $this->load->view('admin/footers/admin_footer');
    }

    public function result_declaration_list(){
        // $users = $this->Quiz_model->resultDeclarationListdata(); 
        // $data['UsersDetails']=$users; 

        $users = $this->Quiz_model->resultDeclarationListdata(); 
        $data['DeclarationList']=$users; 
        $permissions = array();
        if (encryptids("D", $_SESSION['admin_type']) == 3) { 
            if (in_array(6, $_SESSION['sub_mod_per'])) { 
                $sub_model_id = 6;
                $permissions = $this->Admin_model->getUsersPermissions($sub_model_id);
            }
            $data['permissions'] =  $permissions;
        }
        $this->load->view('admin/headers/admin_header');;
        $this->load->view('quiz/result_declaration_list',$data);
        $this->load->view('admin/footers/admin_footer');
    }
    // public function answer_key_list($user_id,$quiz_id){
    //     $answerKey = $this->Quiz_model->getAnswerKeyForUser($user_id,$quiz_id); 
    //     $data['answerKey']=$answerKey; 
    //    // echo json_encode($answerKey);exit();
    //     $this->load->view('admin/headers/admin_header');;
    //     $this->load->view('Quiz/answer_key_list',$data);
    //     $this->load->view('admin/footers/admin_footer');
    // }
    public function answer_key_list($user_id,$quiz_id){
        $user_id= encryptids('D', $user_id);
        $quiz_id= encryptids('D', $quiz_id);
        $answerKey = $this->Quiz_model->getAnswerKeyForUser($user_id,$quiz_id); 
        $data['answerKey']=$answerKey; 
        $this->load->view('admin/headers/admin_header');;
        $this->load->view('quiz/answer_key_new',$data);
        $this->load->view('admin/footers/admin_footer');
    }

    public function random_strings($length_of_string)
    {
        $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
        return substr(str_shuffle($str_result), 0, $length_of_string );
    }
    public function quiz_archive(){       
        $data = array();
        $data['allRecords'] = $this->Quiz_model->getListOfArchiveQuiz();
        $this->load->view('admin/headers/admin_header');;
        $this->load->view('quiz/quiz_archive',$data);
        $this->load->view('admin/footers/admin_footer');
    }
   
    //ajax
    public function changeStatus()
    {
        try {
            $quiz_id = $this->input->post('id');
            $status = $this->input->post('status');        

            $data = array(
                'status' => $status,               
                'modify_on' => GetCurrentDateTime('Y-m-d h:i:s'),
                'modify_by' => encryptids("D", $_SESSION['admin_type']),
            );

            $id = $this->Quiz_model->updateDataQuiz($quiz_id,$data);
            if ($id) {
                $data['status'] = 1;
                $data['message'] = 'Quiz Status updated successfully.';
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
    public function result_declaration_view($id)
    { 
        $id = encryptids("D", $id);
        $ResultData = $this->Quiz_model->getResultDeclarationList($id);
        //$quiz_id= $ResultData['quiz_id']; 
        $data['ResultData']=$ResultData; 

        $users = $this->Quiz_model->resultDeclareUser($id); 
        $data['UsersDetails']=$users;
        $this->load->view('admin/headers/admin_header');
        $this->load->view('quiz/result_declaration_view',$data);
        $this->load->view('admin/footers/admin_footer');
    } 

    public function  close_declaration_list($quiz_id)
    {
        $quiz_id = encryptids("D", $quiz_id);
        $users = $this->Quiz_model->resultDeclarationList($quiz_id); 
       
        $data['UsersDetails']=$users; 
        $getQuizinfo = $this->Quiz_model->getQuizinfo($quiz_id); 
        $data['Quizinfo']=$getQuizinfo;                

            $Declaration=$this->Quiz_model->isExistResultDeclaration($quiz_id);
            //echo json_encode($Declaration);exit();
           
            if (empty($Declaration)) {
                    
                    foreach ($users as $r1){
                    $formdata['user_id']= $r1['user_id'];
                    $formdata['prize']= $r1['prize'];
                    $formdata['quiz_id']= $r1['quiz_id'];
                    $formdata['created_on']= date('Y-m-d h:i:s'); 
                    $this->Quiz_model->insertResultDesc($formdata);
                    }   
                    $login_admin_id = encryptids("D", $this->session->userdata('admin_id'));
                    $dbobj = array(
                        "result_declared" =>1,
                        'modify_by' => $login_admin_id,
                    );
                    $this->Quiz_model->updateResultDeclaration($quiz_id,$dbobj);                          
            }
          

       

        // if ($this->input->server('REQUEST_METHOD') === 'POST') 
        // {
        //    $user_id = $this->input->post("user_id");
        //     $quizId = $this->input->post("quiz_id");
        //     $prize = $this->input->post("prize");
        //     $number = count($user_id);
        //     if ($number > 0) 
        //     {
        //         $successCount = 0;
        //         $j = 1;
        //         for ($i = 0; $i < $number; $i++) 
        //         {
        //             $formdata['user_id']= $user_id[$i];
        //             $formdata['prize']= $prize[$i];
        //             $formdata['quiz_id']= $quiz_id;
        //             $this->Quiz_model->insertResultDesc($formdata);
        //             $successCount++;
        //             if ($successCount == $number) 
        //             {
                        
        //             }
        //         }
        //     }

        //     $Declaration=$this->Quiz_model->getMstResultDeclaration($quizId);
        //     if (empty($Declaration)) {
        //     $Submission=$this->Quiz_model->getSubmission($quizId);
        //     $totalgetSubmission=count($Submission);
        //     $Winners=$this->Quiz_model->getWinners($quizId);
        //     $totalgetWinners=count($Winners);
        //     $formdata2['quiz_id']=$quizId;
        //     $formdata2['total_submission']=$totalgetSubmission;
        //     $formdata2['total_winner']=$totalgetWinners;
        //     $formdata2['declare_on']=date('Y-m-d h:i:s');
        //     // print_r($formdata2);
        //     $this->Quiz_model->insertMstResultDeclaration($formdata2);

           
        //         // code...
        //     }
        //      $this->session->set_flashdata('MSG', ShowAlert("Record Inserted Successfully","SS"));
        //     redirect(base_url() . "quiz/result_declaration_list/" , 'refresh');


        // }
        // print_r($data);exit;
        $this->load->view('admin/headers/admin_header');;
        $this->load->view('quiz/close_declaration_list',$data);
        $this->load->view('admin/footers/admin_footer');
    }


}
