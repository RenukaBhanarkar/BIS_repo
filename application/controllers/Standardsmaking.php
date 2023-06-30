<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Standardsmaking extends CI_Controller
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
        $this->load->model('subadmin/Que_bank_model');
        $this->load->model('subadmin/Questions_model');
        $this->load->model('Admin/Your_wall_model');
        $this->load->model('Standards_Making/Standards_Making_model');
        date_default_timezone_set("Asia/Calcutta");
         
    } 
    public function index()
    {
        if ($this->Admin_model->checkAdminLogin()) {
            redirect(base_url() . "Admin/dashboard", 'refresh');
        } else {
            redirect(base_url() . "Admin/login", 'refresh');
        }
        return true;
    }
  
     
    public function conversation_list()
    {


        $Conversation = $this->Standards_Making_model->getConversationAll();
        $data = array();
        $data['Conversation'] = $Conversation;

        $permissions = array();
        if (encryptids("D", $_SESSION['admin_type']) == 3) { 
            if (in_array(39, $_SESSION['sub_mod_per'])) { 
                $sub_model_id = 39;
                $permissions = $this->Admin_model->getUsersPermissions($sub_model_id);
            }
            $data['permissions'] =  $permissions;
        }

        $this->load->view('admin/headers/admin_header');
        $this->load->view('Standardsmaking/conversation_list',$data);
        $this->load->view('admin/footers/admin_footer');
    }
    public function conversation_form()
    {  
        $this->load->view('admin/headers/admin_header'); 
        if ($this->form_validation->run('conversation_form') == FALSE) 
        {
            $this->load->view('Standardsmaking/conversation_form');
        } 
        else 
        {
            if (!file_exists('uploads/Conversation_with_Experts/video')) 
            {
                mkdir('uploads/Conversation_with_Experts/video', 0777, true);
            }
            if (!file_exists('uploads/Conversation_with_Experts/video_thumbnail')) 
            {
                mkdir('uploads/Conversation_with_Experts/video_thumbnail', 0777, true);
            }

            $videopath = 'uploads/Conversation_with_Experts/video/'; 
            $videolocation = $videopath . time() .'video'. $_FILES['video']['name']; 
            move_uploaded_file($_FILES['video']['tmp_name'], $videolocation);

            $thumbnailpath = 'uploads/Conversation_with_Experts/video_thumbnail/'; 
            $thumbnaillocation = $thumbnailpath . time() .'video_thumbnail'. $_FILES['video_thumbnail']['name']; 
            move_uploaded_file($_FILES['video_thumbnail']['tmp_name'], $thumbnaillocation);

            $formdata = array(); 
            $formdata['title'] = $this->input->post('title');
            $formdata['description'] = $this->input->post('description'); 
            $formdata['video_thumbnail'] =$thumbnaillocation; 
            $formdata['video'] = $videolocation;
            $formdata['created_on'] = date('Y-m-d h:i:s'); 
            $id = $this->Standards_Making_model->conversationForm($formdata);
            if ($id)
            {
                $this->session->set_flashdata('MSG', ShowAlert("Record Inserted Successfully", "SS"));
                redirect(base_url() . "Standardsmaking/conversation_list", 'refresh');
            }
            else
            {
                $this->session->set_flashdata('MSG', ShowAlert("Failed to create new admin,Please try again", "DD"));
                redirect(base_url() . "Standardsmaking/conversation_form", 'refresh');
            }
        }
        
        $this->load->view('admin/footers/admin_footer');
    } 

    public function conversation_archives()
    {
        $Conversation = $this->Standards_Making_model->getConversationArchives();
        $data = array();
        $data['Conversation'] = $Conversation;

        $permissions = array();
        if (encryptids("D", $_SESSION['admin_type']) == 3) { 
            if (in_array(40, $_SESSION['sub_mod_per'])) { 
                $sub_model_id = 40;
                $permissions = $this->Admin_model->getUsersPermissions($sub_model_id);
            }
            $data['permissions'] =  $permissions;
        }

        $this->load->view('admin/headers/admin_header');
        $this->load->view('Standardsmaking/conversation_archives',$data);
        $this->load->view('admin/footers/admin_footer');
    }

    public function conversation_dashboard()
    {
        $this->load->view('admin/headers/admin_header');
        $this->load->view('Standardsmaking/conversation_dashboard');
        $this->load->view('admin/footers/admin_footer');
    }

    

    public function conversation_view($id)
    {
        $id = encryptids("D", $id);
        
        $data=array();
        $conversation = $this->Standards_Making_model->conversationView($id);
        $conversationdata=array();
        $data['conversationdata']=$conversation; 
        $this->load->view('admin/headers/admin_header');
        $this->load->view('Standardsmaking/conversation_view',$data);
        $this->load->view('admin/footers/admin_footer');
    }


     public function conversation_edit($id)
    {
        $data=array();
        $id = encryptids("D", $id);
        $conversation = $this->Standards_Making_model->getConversation($id);
        $conversationdata=array();
        $data['conversationdata']=$conversation;  

        $this->load->view('admin/headers/admin_header');

        if ($this->form_validation->run('conversation_form') == FALSE) 
        { 
             $this->load->view('Standardsmaking/conversation_edit',$data);
        } 
        else 
        {
             
            if (isset($_FILES['video']['size'])) 
            {
                $videosize=$_FILES['video']['size'];
            }
            else
            {
                $videosize=0;
            }

            if (isset($_FILES['video_thumbnail']['size'])) 
            {
                $video_thumbnailsize=$_FILES['video_thumbnail']['size'];
            }
            else
            {
                $video_thumbnailsize=0;
            } 
            if ($videosize > 0 ) 
            {
                $videopath = 'uploads/Conversation_with_Experts/video/'; 
                $videolocation = $videopath . time() .'video'. $_FILES['video']['name']; 
                move_uploaded_file($_FILES['video']['tmp_name'], $videolocation);
            }
            else
            {
                $videolocation=$this->input->post('lastvideo');
            }
            if ($video_thumbnailsize > 0 ) 
            {
                $thumbnailpath = 'uploads/Conversation_with_Experts/video_thumbnail/'; 
                $thumbnaillocation = $thumbnailpath . time() .'video_thumbnail'. $_FILES['video_thumbnail']['name']; 
                move_uploaded_file($_FILES['video_thumbnail']['tmp_name'], $thumbnaillocation);
            }
            else
            {
                $thumbnaillocation=$this->input->post('lastthumbnail');
            }
            $formdata = array(); 
            $formdata['title'] = $this->input->post('title');
            $id = $this->input->post('id');
            $formdata['description'] = $this->input->post('description'); 
            $formdata['video_thumbnail'] =$thumbnaillocation; 
            $formdata['video'] = $videolocation;
            $formdata['created_on'] = date('Y-m-d'); 
            $formdata['status'] = 1; 
            $id = $this->Standards_Making_model->updateConversation($id,$formdata);
            if ($id)
            {
                $this->session->set_flashdata('MSG', ShowAlert("Record Updated Successfully", "SS"));
                redirect(base_url() . "Standardsmaking/conversation_list", 'refresh');
            }
            else
            {
                $this->session->set_flashdata('MSG', ShowAlert("Failed to create new admin,Please try again", "DD"));
                redirect(base_url() . "Standardsmaking/conversation_form", 'refresh');
            }
        }
       
        $this->load->view('admin/footers/admin_footer');
    }
 
public function deleteConversation(){
        try {   
                 
            $id = $this->input->post('id');
            $id = $this->Standards_Making_model->deleteConversation($id);
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

public function updateStatusConversation()
    {
        $id = $this->input->post('id');
        $formdata['status'] = $this->input->post('status'); 
        $formdata['updated_on'] = date('Y-m-d h:i:s'); 
        $id = $this->Standards_Making_model->ChangeStatusConversation($id,$formdata);
        if ($id)
        {
            $this->session->set_flashdata('MSG', ShowAlert("Updated Successfully", "SS"));
            redirect(base_url() . "Standardsmaking/conversation_list", 'refresh');
        }
        else
        {
            $this->session->set_flashdata('MSG', ShowAlert("Failed to Updated,Please try again", "DD"));
            redirect(base_url() . "Standardsmaking/conversation_list", 'refresh');
        } 
    }
    

    public function join_the_classroom_dashboard(){
        $this->load->view('admin/headers/admin_header');
         $this->load->view('Standardsmaking/join_the_classroom_dashboard');
         $this->load->view('admin/footers/admin_footer');
    }
    public function live_session_list(){
        $LiveSessionList = $this->Standards_Making_model->getLiveSession();
        $data = array();
        $data['liveSessionList'] = $LiveSessionList;

        $permissions = array();
        if (encryptids("D", $_SESSION['admin_type']) == 3) { 
            if (in_array(35, $_SESSION['sub_mod_per'])) { 
                 $sub_model_id = 35;
                $permissions = $this->Admin_model->getUsersPermissions($sub_model_id);
            }
            $data['permissions'] =  $permissions;
        }

        $this->load->view('admin/headers/admin_header');
        $this->load->view('Standardsmaking/live_session_list',$data);
        $this->load->view('admin/footers/admin_footer');
    }
    public function live_session_form()
    {
        $this->load->view('admin/headers/admin_header'); 
        if ($this->form_validation->run('live_session_form') == FALSE) 
        {
            $this->load->view('Standardsmaking/live_session_form');
        } 
        else 
        {
            if (!file_exists('uploads/join_the_classroom/video')) { mkdir('uploads/join_the_classroom/video', 0777, true); }

            if (!file_exists('uploads/join_the_classroom/thumbnail')) { mkdir('uploads/join_the_classroom/thumbnail', 0777, true); }

            if (!file_exists('uploads/join_the_classroom/doc_pdf')) { mkdir('uploads/join_the_classroom/doc_pdf', 0777, true); }

            if (!file_exists('uploads/join_the_classroom/image')) { mkdir('uploads/join_the_classroom/image', 0777, true); }

            $videosize=$_FILES['video']['size'];  
            if ($videosize > 0 ) 
            {
                $videopath = 'uploads/join_the_classroom/video/'; 
                $videolocation = $videopath . time() .'video'. $_FILES['video']['name']; 
                move_uploaded_file($_FILES['video']['tmp_name'], $videolocation);
            }
            else
            {
                $videolocation='';
                // $videolocation=$this->input->post('lastvideo');
            }

            $thumbnailsize=$_FILES['thumbnail']['size']; 
            if ($thumbnailsize > 0 ) 
            {
                $thumbnailpath = 'uploads/join_the_classroom/thumbnail/'; 
                $thumbnaillocation = $thumbnailpath . time() .'thumbnail'. $_FILES['thumbnail']['name']; 
                move_uploaded_file($_FILES['thumbnail']['tmp_name'], $thumbnaillocation);
            }
            else
            {
                $thumbnaillocation='';
                // $videolocation=$this->input->post('lastvideo');
            }
             $imagesize=$_FILES['image']['size']; 
            if ($imagesize > 0 ) 
            {
                $imagepath = 'uploads/join_the_classroom/image/'; 
                $imagelocation = $imagepath . time() .'image'. $_FILES['image']['name']; 
                move_uploaded_file($_FILES['image']['tmp_name'], $imagelocation);
            }
            else
            {
                $imagelocation='';
                // $videolocation=$this->input->post('lastvideo');
            }

             $doc_pdfsize=$_FILES['doc_pdf']['size']; 
            if ($doc_pdfsize > 0 ) 
            {
                $doc_pdfpath = 'uploads/join_the_classroom/doc_pdf/'; 
                $doc_pdflocation = $doc_pdfpath . time() .'doc_pdf'. $_FILES['doc_pdf']['name']; 
                move_uploaded_file($_FILES['doc_pdf']['tmp_name'], $doc_pdflocation);
            }
            else
            {
                $doc_pdflocation='';
                // $videolocation=$this->input->post('lastvideo');
            } 

            $formdata = array(); 
            $formdata['type_of_post'] = $this->input->post('type_of_post');
            $formdata['title'] = $this->input->post('title');
            $formdata['description'] = $this->input->post('description'); 
            $formdata['session_link'] = $this->input->post('session_link'); 
            
            $formdata['option'] = $this->input->post('option'); 
            $option=$this->input->post('option');
            if($option==1)
            {
                $formdata['video'] = $videolocation;
            }
            if ($option==2) { 
                $formdata['video_url'] = $this->input->post('video_url'); 
            }
            $formdata['thumbnail'] =$thumbnaillocation; 
            
            $formdata['image'] = $imagelocation;
            $formdata['doc_pdf'] = $doc_pdflocation;
            $formdata['created_on'] = date('Y-m-d h:i:s'); 
            $id = $this->Standards_Making_model->joinclassroomForm($formdata);
            if ($id)
            {
                $this->session->set_flashdata('MSG', ShowAlert("Record Inserted Successfully", "SS"));
                redirect(base_url() . "Standardsmaking/live_session_list", 'refresh');
            }
            else
            {
                $this->session->set_flashdata('MSG', ShowAlert("Failed to create new post/ live session, Please try again", "DD"));
                redirect(base_url() . "Standardsmaking/live_session_form", 'refresh');
            }
        } 
        
        $this->load->view('admin/footers/admin_footer');
    }
    public function manage_session_list(){
        $LiveSessionList = $this->Standards_Making_model->getLiveSessionList();
        $data = array();
        $data['liveSessionList'] = $LiveSessionList;

        $permissions = array();
        if (encryptids("D", $_SESSION['admin_type']) == 3) { 
            if (in_array(36, $_SESSION['sub_mod_per'])) { 
                $sub_model_id = 36;
                $permissions = $this->Admin_model->getUsersPermissions($sub_model_id);
            }
            $data['permissions'] =  $permissions;
        }

        $this->load->view('admin/headers/admin_header');
        $this->load->view('Standardsmaking/manage_session_list',$data);
        $this->load->view('admin/footers/admin_footer');
    }
    public function publish_list(){
        $PublishSessionList = $this->Standards_Making_model->getPublishSessionList();
        $data = array();
        $data['liveSessionList'] = $PublishSessionList;

        $permissions = array();
        if (encryptids("D", $_SESSION['admin_type']) == 3) { 
            if (in_array(37, $_SESSION['sub_mod_per'])) { 
                $sub_model_id = 37;
                $permissions = $this->Admin_model->getUsersPermissions($sub_model_id);
            }
            $data['permissions'] =  $permissions;
        }
        
        $this->load->view('admin/headers/admin_header');
        $this->load->view('Standardsmaking/publish_list',$data);
        $this->load->view('admin/footers/admin_footer');
    }

    public function live_session_view($id){
        $id = encryptids("D", $id);
        $data=array();
        $liveSessionView = $this->Standards_Making_model->liveSessionViewView($id); 
        $data['liveSession']=$liveSessionView;


        $this->load->view('admin/headers/admin_header');
         $this->load->view('Standardsmaking/live_session_view',$data);
         $this->load->view('admin/footers/admin_footer');
    }
    public function live_session_edit($id){
         $id = encryptids("D", $id);
        $data=array();
        $liveSessionView = $this->Standards_Making_model->liveSessionViewView($id); 
        $data['liveSession']=$liveSessionView;

        $this->load->view('admin/headers/admin_header');  
        if ($this->form_validation->run('live_session_form') == FALSE) 
        {
            $this->load->view('Standardsmaking/live_session_edit',$data);
        } 
        else 
        {
            if (!file_exists('uploads/join_the_classroom/video')) { mkdir('uploads/join_the_classroom/video', 0777, true); }

            if (!file_exists('uploads/join_the_classroom/thumbnail')) { mkdir('uploads/join_the_classroom/thumbnail', 0777, true); }

            if (!file_exists('uploads/join_the_classroom/doc_pdf')) { mkdir('uploads/join_the_classroom/doc_pdf', 0777, true); }

            if (!file_exists('uploads/join_the_classroom/image')) { mkdir('uploads/join_the_classroom/image', 0777, true); }
            $val=$this->input->post('type_of_post');
            if ($val==2) 
            {
                $lastvideo=$this->input->post('lastvideo');
                if (!empty($_FILES['video']['tmp_name']))
                {   
                    $ext = pathinfo($_FILES['video']['name'], PATHINFO_EXTENSION);
                    $videopath = 'uploads/join_the_classroom/video/'; 
                    $videolocation = $videopath . time() .'join_the_classroom.'. $ext; 
                    move_uploaded_file($_FILES['video']['tmp_name'], $videolocation); 
                }
                else
                {
                    $videolocation=$lastvideo;
                }


            }
            else
            {
                $videolocation='';
            }

            if ($val==1) 
            {
                $lastdoc_pdf=$this->input->post('lastdoc_pdf');
                if (!empty($_FILES['doc_pdf']['tmp_name'])) 
                {
                    $doc_pdfpath = 'uploads/join_the_classroom/doc_pdf/'; 
                    $doc_pdflocation = $doc_pdfpath . time() .'doc_pdf'. $_FILES['doc_pdf']['name']; 
                    move_uploaded_file($_FILES['doc_pdf']['tmp_name'], $doc_pdflocation);
                }
                else
                {
                    $doc_pdflocation=$lastdoc_pdf;
                } 
                $imagelast=$this->input->post('lastimage');
                if(!empty($_FILES['image']['tmp_name'])){
                    $imagepath = 'uploads/join_the_classroom/image/'; 
                    $imagelocation = $imagepath . time() .'image'. $_FILES['image']['name'];
                    move_uploaded_file($_FILES['image']['tmp_name'], $imagelocation);
                }
                else
                {
                    $imagelocation=$imagelast; 
                }
            }
            else
            {
                $imagelocation='';
                $doc_pdflocation='';
            }
            if ($val==3) 
            {
                $imagelocation='';
                $doc_pdflocation='';
                $videolocation='';
            }
 
            $lastthumbnail=$this->input->post('lastthumbnail');
            if (!empty($_FILES['thumbnail']['tmp_name'])) 
            {
                $thumbnailpath = 'uploads/join_the_classroom/thumbnail/'; 
                $thumbnaillocation = $thumbnailpath . time() .'thumbnail'. $_FILES['thumbnail']['name']; 
                move_uploaded_file($_FILES['thumbnail']['tmp_name'], $thumbnaillocation);
            }
            else
            {
                $thumbnaillocation=$lastthumbnail; 
                // $videolocation=$this->input->post('lastvideo');
            }
            

            $formdata = array(); 
            $frmid = $this->input->post('id');
            $formdata['type_of_post'] = $this->input->post('type_of_post');
            $formdata['title'] = $this->input->post('title');
            $formdata['description'] = $this->input->post('description'); 
            $formdata['session_link'] = $this->input->post('session_link'); 
            $formdata['option'] = $this->input->post('option'); 
            $formdata['video_url'] = $this->input->post('video_url'); 
            $formdata['thumbnail'] =$thumbnaillocation; 
            $formdata['video'] = $videolocation;
            $formdata['image'] = $imagelocation;
            $formdata['doc_pdf'] = $doc_pdflocation; 
            $formdata['status'] = 1; 
            $formdata['updated_on'] = date('Y-m-d h:i:s');
            $id = $this->Standards_Making_model->joinclassroomFormUpdate($formdata,$frmid);
            if ($id)
            {
                $this->session->set_flashdata('MSG', ShowAlert("Record Updated Successfully", "SS"));
                redirect(base_url() . "Standardsmaking/manage_session_list", 'refresh');
            }
            else
            {
                $this->session->set_flashdata('MSG', ShowAlert("Failed to create new post/ live session, Please try again", "DD"));
                redirect(base_url() . "Standardsmaking/live_session_edit", 'refresh');
            }
        }


        
        $this->load->view('admin/footers/admin_footer');
    }
    public function live_session_archived(){
        $PublishSessionList = $this->Standards_Making_model->getArchivedSessionList();
        $data = array();
        $data['liveSessionList'] = $PublishSessionList;

        $permissions = array();
        if (encryptids("D", $_SESSION['admin_type']) == 3) { 
            if (in_array(38, $_SESSION['sub_mod_per'])) { 
                $sub_model_id = 38;
                $permissions = $this->Admin_model->getUsersPermissions($sub_model_id);
            }
            $data['permissions'] =  $permissions;
        }

        $this->load->view('admin/headers/admin_header');
        $this->load->view('Standardsmaking/live_session_archived',$data);
        $this->load->view('admin/footers/admin_footer');
    }

    public function deleteLiveSession(){
        try {   
                 
            $id = $this->input->post('id');
            $id = $this->Standards_Making_model->deleteLiveSession($id);
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

    public function deleteData(){
        try {   
                 
            $id = $this->input->post('id');
            $val = $this->input->post('val');
            if ($val==1) 
            {
                $formdata['image']='';
            }
            if ($val==2) 
            {
                $formdata['video']='';
            }
            $id = $this->Standards_Making_model->deleteData($id,$formdata);
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

    public function deleteLiveSessionFile(){
        try {   
                 
            $id = $this->input->post('id');
            $val = $this->input->post('val');
            if ($val==1) 
            {
                $formdata['image']='';
            }
            if ($val==2) 
            {
                $formdata['thumbnail']='';
            }
            if ($val==3) 
            {
                $formdata['doc_pdf']='';
            }
            if ($val==4) 
            {
                $formdata['video']='';
            }
            $id = $this->Standards_Making_model->deleteLiveSessionFile($id,$formdata);
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

    public function updateStatusLiveSession(){
        try {  

                 
            $id = $this->input->post('id');
            $formdata['status'] = $this->input->post('status'); 
            $formdata['updated_on'] = date('Y-m-d h:i:s');

            $id = $this->Standards_Making_model->updateStatusLiveSession($id,$formdata);
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

    public function deleteConvesationFile(){
        try {   
                 
            $id = $this->input->post('id');
            $val = $this->input->post('val');
            if ($val==1) 
            {
                $formdata['video_thumbnail']='';
            }
            if ($val==2) 
            {
                $formdata['video']='';
            }
             
            $id = $this->Standards_Making_model->updateConversation($id,$formdata);
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
     
}