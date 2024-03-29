<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Learningscience extends CI_Controller
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
        $this->load->model('Subadmin/Que_bank_model');
        $this->load->model('Subadmin/Questions_model');
        $this->load->model('Admin/Your_wall_model');
        $this->load->model('Standards_Making/Standards_Making_model');
        $this->load->model('Learningscience/Learningscience_model');
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

    public function lsv_standards_dashboard()
    {
        $this->load->view('admin/headers/admin_header');
        $this->load->view('learningscience/lsv_standards_dashboard');
        $this->load->view('admin/footers/admin_footer');
    }
    public function lsv_standards_list()
    {
        $lsvstandardslist = $this->Learningscience_model->getlsvstandardslist();
        $data = array();
        $data['lsvstandardslist'] = $lsvstandardslist;

        $permissions = array();
        if (encryptids("D", $_SESSION['admin_type']) == 3) { 
            if (in_array(17, $_SESSION['sub_mod_per'])) { 
                $sub_model_id = 17;
                $permissions = $this->Admin_model->getUsersPermissions($sub_model_id);
            }
            $data['permissions'] =  $permissions;
        }

        $this->load->view('admin/headers/admin_header');
        $this->load->view('learningscience/lsv_standards_list',$data);
        $this->load->view('admin/footers/admin_footer');
    }
    public function lsv_standards_form()
    {
        $this->load->view('admin/headers/admin_header'); 
        if ($this->form_validation->run('lsv_standards_form') == FALSE) 
        {
            $this->load->view('learningscience/lsv_standards_form');
        } 
        else 
        {
            if (!file_exists('uploads/learning_Science/video')) { mkdir('uploads/learning_Science/video', 0777, true); }

            if (!file_exists('uploads/learning_Science/thumbnail')) { mkdir('uploads/learning_Science/thumbnail', 0777, true); }

            if (!file_exists('uploads/learning_Science/doc_pdf')) { mkdir('uploads/learning_Science/doc_pdf', 0777, true); }

            if (!file_exists('uploads/learning_Science/image')) { mkdir('uploads/learning_Science/image', 0777, true); }

            $videosize=$_FILES['video']['tmp_name'];  
            if ($videosize) 
            {
                $videopath = 'uploads/learning_Science/video/'; 
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
                $thumbnailpath = 'uploads/learning_Science/thumbnail/'; 
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
                $imagepath = 'uploads/learning_Science/image/'; 
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
                $doc_pdfpath = 'uploads/learning_Science/doc_pdf/'; 
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
            $formdata['created_on'] = date('Y-m-d H:i:s'); 
            $id = $this->Learningscience_model->lsvStandardsForm($formdata);
            if ($id)
            {
                $this->session->set_flashdata('MSG', ShowAlert("Record Inserted Successfully", "SS"));
                redirect(base_url() . "learningscience/lsv_standards_list", 'refresh');
            }
            else
            {
                $this->session->set_flashdata('MSG', ShowAlert("Failed to create new post/ live session, Please try again", "DD"));
                redirect(base_url() . "learningscience/lsv_standards_form", 'refresh');
            }
        } 
        
        $this->load->view('admin/footers/admin_footer');
    }

    public function lsv_standards_view($id){
        $id = encryptids("D", $id);
        $data=array();
        $lsvStandardsView = $this->Learningscience_model->lsvStandardsView($id); 
        $data['lsvStandardsView']=$lsvStandardsView;

        $this->load->view('admin/headers/admin_header');
         $this->load->view('learningscience/lsv_standards_view',$data);
         $this->load->view('admin/footers/admin_footer');
    }

    public function manage_lsv_standards_list()
    {
        $lsvStandardsList = $this->Learningscience_model->getlsvManageStandardsList();
        $data = array();
        $data['lsvStandardsList'] = $lsvStandardsList;
        $permissions = array();
        if (encryptids("D", $_SESSION['admin_type']) == 3) { 
            if (in_array(18, $_SESSION['sub_mod_per'])) { 
                $sub_model_id = 18;
                $permissions = $this->Admin_model->getUsersPermissions($sub_model_id);
            }
            $data['permissions'] =  $permissions;
        }

        $this->load->view('admin/headers/admin_header');
        $this->load->view('learningscience/manage_lsv_standards_list',$data);
        $this->load->view('admin/footers/admin_footer');
    }
    public function publish_lsv_standards_list(){
        $PublishLsvStandardsList = $this->Learningscience_model->getPublishLsvStandardsList();
        $data = array();

        $permissions = array();
        if (encryptids("D", $_SESSION['admin_type']) == 3) { 
            if (in_array(19, $_SESSION['sub_mod_per'])) { 
                $sub_model_id = 19;
                $permissions = $this->Admin_model->getUsersPermissions($sub_model_id);
            }
            $data['permissions'] =  $permissions;
        }

        $data['liveLsvStandardsList'] = $PublishLsvStandardsList;
        $this->load->view('admin/headers/admin_header');
        $this->load->view('learningscience/publish_lsv_standards_list',$data);
        $this->load->view('admin/footers/admin_footer');
    }

    public function lsv_standards_archived(){
        $ArchivedLsvStandardsList = $this->Learningscience_model->getArchivedLsvStandardsList();
        $data = array();
        $data['ArchivedLsvStandardsList'] = $ArchivedLsvStandardsList;

        $permissions = array();
        if (encryptids("D", $_SESSION['admin_type']) == 3) { 
            if (in_array(20, $_SESSION['sub_mod_per'])) { 
                $sub_model_id = 20;
                $permissions = $this->Admin_model->getUsersPermissions($sub_model_id);
            }
            $data['permissions'] =  $permissions;
        }

        $this->load->view('admin/headers/admin_header');
        $this->load->view('learningscience/lsv_standards_archived',$data);
        $this->load->view('admin/footers/admin_footer');
    }


    
    public function lsv_standards_edit($id){
         $id = encryptids("D", $id);
        $data=array();
        $lsvStandardsView = $this->Learningscience_model->lsvStandardsView($id); 
        $data['lsvStandardsView']=$lsvStandardsView;

        $this->load->view('admin/headers/admin_header');  
        if ($this->form_validation->run('lsv_standards_form') == FALSE) 
        {
            $this->load->view('learningscience/lsv_standards_edit',$data);
        } 
        else 
        {
            if (!file_exists('uploads/learning_Science/video')) { mkdir('uploads/learning_Science/video', 0777, true); }

            if (!file_exists('uploads/learning_Science/thumbnail')) { mkdir('uploads/learning_Science/thumbnail', 0777, true); }

            if (!file_exists('uploads/learning_Science/doc_pdf')) { mkdir('uploads/learning_Science/doc_pdf', 0777, true); }

            if (!file_exists('uploads/learning_Science/image')) { mkdir('uploads/learning_Science/image', 0777, true); }

            $val=$this->input->post('type_of_post');
            if ($val==2) 
            {
                $lastvideo=$this->input->post('lastvideo');
                if (!empty($_FILES['video']['tmp_name']))
                {   
                    $ext = pathinfo($_FILES['video']['name'], PATHINFO_EXTENSION);
                    $videopath = 'uploads/learning_Science/video/'; 
                    $videolocation = $videopath . time() .'learning_Science.'. $ext; 
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
                    $doc_pdfpath = 'uploads/learning_Science/doc_pdf/'; 
                    $doc_pdflocation = $doc_pdfpath . time() .'doc_pdf'. $_FILES['doc_pdf']['name']; 
                    move_uploaded_file($_FILES['doc_pdf']['tmp_name'], $doc_pdflocation);
                }
                else
                {
                    $doc_pdflocation=$lastdoc_pdf;
                } 
                $imagelast=$this->input->post('lastimage');
                if(!empty($_FILES['image']['tmp_name'])){
                    $imagepath = 'uploads/learning_Science/image/'; 
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
                $thumbnailpath = 'uploads/learning_Science/thumbnail/'; 
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
            $formdata['video_url'] = $this->input->post('video_url'); 
            $formdata['option'] = $this->input->post('option'); 
            $formdata['thumbnail'] =$thumbnaillocation; 
            $formdata['video'] = $videolocation;
            $formdata['image'] = $imagelocation;
            $formdata['doc_pdf'] = $doc_pdflocation;  
            $formdata['updated_on'] = date('Y-m-d H:i:s');

            $mydata=$this->Learningscience_model->lsvStandardsView($frmid); 

            if ($mydata['status']==0) {
                $formdata['status'] = 0;
                $mysts=0;
            }
            else
            {
                $formdata['status'] = 1;
                $mysts=1;

            } 
            $id = $this->Learningscience_model->updateLsvStandards($formdata,$frmid);
            if ($id)
            {

                 if ($mysts==1) 
                {
                     $this->session->set_flashdata('MSG', ShowAlert("Record Updated Successfully", "SS"));
                    redirect(base_url() . "learningscience/manage_lsv_standards_list", 'refresh');
                }
                else
                {
                    $this->session->set_flashdata('MSG', ShowAlert("Record Updated Successfully", "SS"));
                    redirect(base_url() . "learningscience/lsv_standards_list", 'refresh');
                } 
            }
            else
            {
                $this->session->set_flashdata('MSG', ShowAlert("Failed to create new post/ live session, Please try again", "DD"));
                redirect(base_url() . "learningscience/lsv_standards_edit", 'refresh');
            }
        }


        
        $this->load->view('admin/footers/admin_footer');
    }
    
    public function deleteLsvStandards(){
        try {   
                 
            $id = $this->input->post('id');
            $id = $this->Learningscience_model->deleteLsvStandards($id);
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
        redirect(base_url() . "learningscience/manage_lsv_standards_list", 'refresh');
    }

    public function updateLsvStandards(){
        try {  

                 
            $id = $this->input->post('id');
            $formdata['status'] = $this->input->post('status'); 
            $formdata['updated_on'] = date('Y-m-d H:i:s');

            $id = $this->Learningscience_model->updateLsvStandards($formdata,$id);
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
        redirect(base_url() . "learningscience/manage_lsv_standards_list", 'refresh');
    }

    public function deleteLvsFile(){
        try {   
                 
            echo $id = $this->input->post('id');
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
            $id = $this->Learningscience_model->deleteLvsFile($id,$formdata);
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
        redirect(base_url() . "learningscience/lsv_standards_edit", 'refresh');
    }

     
}