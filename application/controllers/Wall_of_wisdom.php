<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Wall_of_wisdom extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin/Wall_of_wisdom_model', 'wow');
        date_default_timezone_set("Asia/Calcutta");
    }

    public function index(){
        //echo "hello"; die;
        //$this->load->model('admin/Wall_of_wisdom_model');
        $data['wall_of_wisdom']=$this->wow->getAllWOW();
        $this->load->view('admin/headers/admin_header');
        $this->load->view('wall_of_wisdom/wall_of_wisdom',$data);
        $this->load->view('admin/footers/admin_footer');
    }
    public function insertWallOfWisdom(){
       // $this->load->model('admin_model');
            $formdata['title'] = $this->input->post('title');
            $formdata['description'] = $this->input->post('description');            
           $oldDocument = "";
           $oldDocument = $this->input->post('oldDocument');
           $document = "";
   
           if (!empty($_FILES['document']['tmp_name'])) {
               $document = "Admin_PIC_" . time() . '.jpg';
               $config['upload_path'] = './uploads/admin/wall_of_wisdom/';
               $config['allowed_types'] = 'gif|jpg|png|jpeg';
               $config['max_size']    = '10000';
               $config['max_width']  = '3024';
               $config['max_height']  = '2024';
               $config['file_name'] = $document;
   
               $this->load->library('upload', $config);
   
               if (!$this->upload->do_upload('document')) {
                   //$err[]=$this->upload->display_errors();
                   $data['status'] = 0;
                   $data['message'] = $this->upload->display_errors();
               }
            } else {
                if (!empty($oldDocument)) {
                    $document =  $oldDocument;
                }
            }          
            if($document){
              
            $formdata['image']=$document;
            }
            $formdata['status']="1";
            $id = $this->wow->insertWOW($formdata);
            if($id){
                $this->session->set_flashdata('MSG', ShowAlert("Record Inserted Successfully", "SS"));
                redirect(base_url() . "wall_of_wisdom", 'refresh');
            } else {
                $this->session->set_flashdata('MSG', ShowAlert("Failed to add wall of wisdom,Please try again", "DD"));
                redirect(base_url() . "wall_of_wisdom", 'refresh');
            }            
           // print_r($formdata);
    }

    public function wowPublish(){
        try {            
            $this->load->model('wall_of_wisdom_model');
            $que_id = $this->input->post('que_id');
            $id = $this->wall_of_wisdom_model->wowPublish($que_id);
            if ($id) {
                $data['status'] = 1;
                $data['message'] = 'Published successfully.';
                
            } else {
                $data['status'] = 0;
                $data['message'] = 'Failed to publish, Please try again.';
               
            }
            // echo  json_encode($data);
            // return true;
            $this->session->set_flashdata('MSG', ShowAlert("Record Published Successfully", "SS"));
            
            
        } catch (Exception $e) {
            echo json_encode([
                'status' => 'error',
                'message' => $e->getMessage(),
            ]);
            return true;
        }
        redirect(base_url() . "wall_of_wisdom", 'refresh');
    }
    public function wowDelete(){
        try {   
            $this->load->model('wall_of_wisdom_model');         
            $que_id = $this->input->post('que_id');
            $id = $this->wall_of_wisdom_model->wowDelete($que_id);
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
        redirect(base_url() . "wall_of_wisdom", 'refresh');
    }
    public function wowUnpublish(){
      //  echo "hi"; die;
        try {   
            $this->load->model('wall_of_wisdom_model');         
            $que_id = $this->input->post('que_id');
            $id = $this->wall_of_wisdom_model->wowUnpublish($que_id);
            if ($id) {
                $this->session->set_flashdata('MSG', ShowAlert("Record Deleted Successfully", "SS"));
                
            } else {
                $this->session->set_flashdata('MSG', ShowAlert("Record Deleted Successfully", "SS"));               
            }
            
            
        } catch (Exception $e) {
            echo json_encode([
                'status' => 'error',
                'message' => $e->getMessage(),
            ]);
            return true;
        }
        redirect(base_url() . "wall_of_wisdom", 'refresh');
    }
    
    // public function wallOfWisdom(){
    //     // $this->load->model('Admin/Wall_of_wisdom_model wow'); 
    //      $data['wow']=$this->wow->all_wallofwisdom();
    //      $this->load->view('users/headers/header');
    //      $this->load->view('wall_of_wisdom/users_wall_of_wisdom',$data);
    //      $this->load->view('users/footers/footer');
    //  }
    public function wallOfWisdom(){
       // print_r($_SESSION); die;
        if(isset($_SESSION['admin_id'])){
            $uid=encryptids("D",$_SESSION['admin_id']);
        }else{
            $uid="";
        }
        // $uid=encryptids("D",$_SESSION['admin_id']);
        // $this->load->model('Admin/Wall_of_wisdom_model wow'); 
        if($uid==""){
            $uid="";
        }else{
            $data['wow']=$this->wow->all_wallofwisdom($uid); 
        }
         $data['wow']=$this->wow->all_wallofwisdom($uid);
        //  print_r($data); die;
         $this->load->view('users/headers/header');
         $this->load->view('wall_of_wisdom/wall_of_wisdom_1',$data);
         $this->load->view('users/footers/footer');
     }
     public function approvewall_of_wisdom(){
        try {   
           // $this->load->model('Admin/Wall_of_wisdom_model wow');         
            $que_id = $this->input->post('que_id');
            $id = $this->wow->send_for_approval($que_id);
            if ($id) {
                $this->session->set_flashdata('MSG', ShowAlert("Record Approved Successfully", "SS"));
                
            } else {
                $this->session->set_flashdata('MSG', ShowAlert("Record Deleted Successfully", "SS"));               
            }
            
            
        } catch (Exception $e) {
            echo json_encode([
                'status' => 'error',
                'message' => $e->getMessage(),
            ]);
            return true;
        }
        redirect(base_url() . "wall_of_wisdom", 'refresh');
     }

     public function approve_activity(){
        try {   
            // $this->load->model('Admin/Wall_of_wisdom_model wow');         
             $que_id = $this->input->post('que_id');
             $id = $this->wow->approve_activity($que_id);
             if ($id) {
                 $this->session->set_flashdata('MSG', ShowAlert("Record Approved Successfully", "SS"));
                 
             } else {
                 $this->session->set_flashdata('MSG', ShowAlert("Record Deleted Successfully", "SS"));               
             }
             
             
         } catch (Exception $e) {
             echo json_encode([
                 'status' => 'error',
                 'message' => $e->getMessage(),
             ]);
             return true;
         }
         redirect(base_url() . "wall_of_wisdom", 'refresh');
     }
     public function get_wow($id){
        $data= $this->wow->get_wow($id);
        echo json_encode($data);
     }
     public function editWallOfWisdom(){
        // print_r($_POST);
        // print_r($_FILES);
        $formdata['id'] = $this->input->post('id');
        $formdata['title'] = $this->input->post('title');
        $formdata['description'] = $this->input->post('description');  
      //  $formdata['image'] = $this->input->post('old_doc');   

       $oldDocument = "";
       $oldDocument = $this->input->post('old_doc');
       $document = "";

            if (!empty($_FILES['document']['tmp_name'])) {
                $document = "wall_of_wisdom" . time() . '.jpg';
                $config['upload_path'] = './uploads/admin/wall_of_wisdom/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']    = '10000';
                $config['max_width']  = '3024';
                $config['max_height']  = '2024';
                $config['file_name'] = $document;

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('document')) {
                    //$err[]=$this->upload->display_errors();
                    $data['status'] = 0;
                    $data['message'] = $this->upload->display_errors();
                }
                } else {
                    if (!empty($oldDocument)) {
                        $document =  $oldDocument;
                    }
                }   

        if($document){          
            $formdata['image']=$document;
        }
        $formdata['status']="1";
        $id = $this->wow->updateWOW($formdata);
        if($id){
            $this->session->set_flashdata('MSG', ShowAlert("Record Updated Successfully", "SS"));
            redirect(base_url() . "wall_of_wisdom", 'refresh');
        } else {
            $this->session->set_flashdata('MSG', ShowAlert("Failed to update wall of wisdom,Please try again", "DD"));
            redirect(base_url() . "wall_of_wisdom", 'refresh');
        }            
     }

     public function rejectWallOfWisdom(){
       // print_r($_POST);
        $formdata['id'] = $this->input->post('id');
        $formdata['reject_reason'] = $this->input->post('reason');
        $formdata['status']="4";

        $id = $this->wow->updateWOW($formdata);
        if($id){
            $this->session->set_flashdata('MSG', ShowAlert("Record Rejected", "SS"));
            redirect(base_url() . "wall_of_wisdom", 'refresh');
        } else {
            $this->session->set_flashdata('MSG', ShowAlert("Failed to update wall of wisdom,Please try again", "DD"));
            redirect(base_url() . "wall_of_wisdom", 'refresh');
        } 
     }
     public function detail($id){
        $data['wall_of_wisdom'] = $this->wow->detail($id);
       // print_r($data['wall_of_wisdom']); die;
        $this->load->view('admin/headers/admin_header');
         $this->load->view('wall_of_wisdom/wall_of_wisdon_detail',$data);
         $this->load->view('admin/footers/admin_footer');
     }
     public function archive(){
        $data['archive'] = $this->wow->archive();
        $this->load->view('admin/headers/admin_header');
         $this->load->view('wall_of_wisdom/archive',$data);
         $this->load->view('admin/footers/admin_footer');
     }
     public function restore(){
        try {                     
             $que_id = $this->input->post('que_id');
             $id = $this->wow->restore($que_id);
             if ($id) {
                 $this->session->set_flashdata('MSG', ShowAlert("Record Restored Successfully", "SS"));
                 return true;
                 
             } else {
                 $this->session->set_flashdata('MSG', ShowAlert("Failed! Unable to perform action", "DD"));   
                 return false;            
             }
             
             
         } catch (Exception $e) {
             echo json_encode([
                 'status' => 'error',
                 'message' => $e->getMessage(),
             ]);
             return true;
         }
         redirect(base_url() . "wall_of_wisdom", 'refresh');
     }

     public function sendarchive(){
        try {                     
            $que_id = $this->input->post('que_id');
            $id = $this->wow->sendarchive($que_id);
            if ($id) {
                $this->session->set_flashdata('MSG', ShowAlert("Record Archived Successfully", "SS"));
                return true;
                
            } else {
                $this->session->set_flashdata('MSG', ShowAlert("Failed", "SS"));   
                return false;            
            }
            
            
        } catch (Exception $e) {
            echo json_encode([
                'status' => 'error',
                'message' => $e->getMessage(),
            ]);
            return true;
        }
        redirect(base_url() . "wall_of_wisdom", 'refresh');
     }

     public function like(){
        $que_id = $this->input->post('que_id');
        $id = $this->wow->like($que_id);
        // $increase=$id_1;
        // $res=$this->wow->update_like($increase);
        // return $id;
        // echo $id;
        // print_r($id);
        // if($id=="success"){
        //     return true;
        // }
     }
     public function likes(){
        $uid=$this->input->post('uid');
        $user_id=encryptids("D", $uid);
        $data['user_id'] =  $user_id;
        $data['card_id'] = $this->input->post('cid');
        $data['card_status'] = "1";
        // print_r($data);
        $id = $this->wow->liked($data);
        if($id){
            echo "success";
        }else{
            echo "failed";
        }
     }
     public function unlikes(){
        $uid=$this->input->post('uid');
        $user_id=encryptids("D", $uid);
        $data['user_id'] =  $user_id;
        $data['card_id'] = $this->input->post('cid');
        $data['card_status'] = "1";
        // print_r($data);
        $id = $this->wow->unliked($data);
        if($id=="success"){
            echo "success";
        }else{
            echo "failed";
        }
     }
 

}