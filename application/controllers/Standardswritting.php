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
    public function review_competition_dashboard()
    {
        $this->load->view('admin/headers/admin_header');
        $this->load->view('standardwritting/review_competition_dashboard');
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
    public function competition_reg(){
        $this->load->model('Quiz/Quiz_model');
        $quizlavel = $this->Quiz_model->getQuizLevel();
        $formdataall['quizlavel']=$quizlavel;
    //    print_r($_POST); 
        // print_r($_FILES);
    //    die;

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

            $start = $this->input->post('start_time');
            $formdata['start_time'] = date("H:i:s", strtotime($start));
            $end = $this->input->post('end_time');
            $formdata['end_time'] = date("H:i:s", strtotime($end));

            if($this->input->post('quiz_level_id')== 1){
                $formdata['region'] = 0;   
                $formdata['branch'] = 0;              
            }
            if($this->input->post('quiz_level_id')== 2){               
                $formdata['region'] = $this->input->post('region_id');
                $formdata['branch'] = 0; 
            }
            if($this->input->post('quiz_level_id')== 3){
                $formdata['region'] = 0;   
                $formdata['branch'] = $this->input->post('branch_id');
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
      //  echo $id;
       // print_r($_POST); 
    //    echo "<br>";
    //     print_r($_FILES); 
     //  die;
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
            }else if($formdata['comp_level']=='3'){
                $formdata['branch'] = $this->input->post('Branch');
                $formdata['region']='0';
            }else{
                $formdata['branch']='0';
                $formdata['region']='0';
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
    echo "success";
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
        $data = $this->Miscellaneous_competition->viewCompetition($id);
      // print_r($data['branch']); die;
       $level=$data['comp_level'];
       $branch=$data['branch'];
        $this->load->model('Quiz/Quiz_model');
        $quizlavel = $this->Quiz_model->getQuizLevel();
        $data['quizlavel']=$quizlavel;
        // $getAllRegions = array();
        // $getAllBranches = array();
      //  $data=array();
       // $quiz = $this->Quiz_model->getQuiz($id);
        
        if($level == 2){
           // $region_id = $quiz['region_id'];
            $data['getAllRegions'] = $this->Quiz_model->getAllRegions(); 
        }
        if($level == 3){
           // $region_id = $quiz['branch_id'];
            $data['getAllBranches'] = $this->Quiz_model->getAllBranches(); 
        }

         $data['competition'] = $this->Miscellaneous_competition->viewCompetition($id);
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
    public function create_online_list()
    {
        $this->load->view('admin/headers/admin_header');
        $this->load->view('standardwritting/create_online_list');
        $this->load->view('admin/footers/admin_footer');
    }
    public function create_online_form()
    {
        $this->load->view('admin/headers/admin_header');
        $this->load->view('standardwritting/create_online_form');
        $this->load->view('admin/footers/admin_footer');
    }
    public function create_online_edit()
    {
        $this->load->view('admin/headers/admin_header');
        $this->load->view('standardwritting/create_online_edit');
        $this->load->view('admin/footers/admin_footer');
    }
    public function Manage_online_list()
    {
        $this->load->view('admin/headers/admin_header');
        $this->load->view('standardwritting/Manage_online_list');
        $this->load->view('admin/footers/admin_footer');
    }
    public function ongoing_online_list()
    {
        $this->load->view('admin/headers/admin_header');
        $this->load->view('standardwritting/ongoing_online_list');
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
 

}
