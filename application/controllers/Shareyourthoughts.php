<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Shareyourthoughts extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Users/Users_model');
        $this->load->model('Shareyourthoughts/Shareyourthoughts_model');
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

    public function share_your_thoughts_dashboard()
    {
        $this->load->view('admin/headers/admin_header');
        $this->load->view('Shareyourthoughts/share_your_thoughts_dashboard');
        $this->load->view('admin/footers/admin_footer');
    }
    public function item_proposal_list()
    { 
         
        $getDetails= $this->Shareyourthoughts_model->ItemProposalData();
        $data = array();
        foreach ($getDetails as $row) 
        {
            $ids= $row['id'];
            $comments= $this->Shareyourthoughts_model->ItemProposalCommnentsCount($ids);
            $row['comments'] = $comments;
            array_push($data, $row);
        }         
        $data['getData'] = $data;
        $this->load->view('admin/headers/admin_header');
        $this->load->view('Shareyourthoughts/item_proposal_list',$data);
        $this->load->view('admin/footers/admin_footer');
    }
    public function item_proposal_view($id){
        $id = encryptids("D", $id);
        $data['getData']=$this->Shareyourthoughts_model->getItemProposalComments($id);
        $this->load->view('admin/headers/admin_header');
         $this->load->view('Shareyourthoughts/item_proposal_view',$data);
         $this->load->view('admin/footers/admin_footer');
    }

    public function updateProposalComments(){
        try {
            $id = $this->input->post('id');
            $formdata['status'] = $this->input->post('status'); 
            $id = $this->Shareyourthoughts_model->updateProposalComments($formdata,$id);
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
        redirect(base_url() . "Shareyourthoughts/item_proposal_view", 'refresh');
    }
     public function deleteProposalComments(){
        try {
            $id = $this->input->post('id');
            $id = $this->Shareyourthoughts_model->deleteProposalComments($id);
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
        redirect(base_url() . "Shareyourthoughts/item_proposal_view", 'refresh');
    }





    public function important_draft_list()
    { 
        $getDetails= $this->Shareyourthoughts_model->ImportantDraftData();
        $data = array();
        foreach ($getDetails as $row) 
        {
            $ids= $row['doc_no'];
            $comments= $this->Shareyourthoughts_model->ImportantDraftDataCommnentsCount($ids);
            $row['comments'] = $comments;
            array_push($data, $row);
        }         
        $data['getData'] = $data; 
        $this->load->view('admin/headers/admin_header');
        $this->load->view('Shareyourthoughts/important_draft_list',$data);
        $this->load->view('admin/footers/admin_footer');
    }
    public function important_draft_view($id){
        $id = encryptids("D", $id);
        $data['getData']=$this->Shareyourthoughts_model->getImportantDraftComments($id);
        $this->load->view('admin/headers/admin_header');
         $this->load->view('Shareyourthoughts/important_draft_view',$data);
         $this->load->view('admin/footers/admin_footer');
    }

    public function updateImportantDraftComments(){
        try {
            $id = $this->input->post('id');
            $formdata['status'] = $this->input->post('status'); 
            $id = $this->Shareyourthoughts_model->updateImportantDraftComments($formdata,$id);
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
        redirect(base_url() . "Shareyourthoughts/important_draft_view", 'refresh');
    }
     public function deleteImportantDraftComments(){
        try {
            $id = $this->input->post('id');
            $id = $this->Shareyourthoughts_model->deleteImportantDraftComments($id);
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
        redirect(base_url() . "Shareyourthoughts/important_draft_view", 'refresh');
    }



 





    public function standard_publish_list()
    {
        $getDetails= $this->Shareyourthoughts_model->StandardPublishData();
        $data = array();
        foreach ($getDetails as $row) 
        {
            $ids= $row['pk_is_id'];
            $comments= $this->Shareyourthoughts_model->StandardPublishCommnentsCount($ids);
            $row['comments'] = $comments;
            array_push($data, $row);
        }         
        $data['getData'] = $data; 
        $this->load->view('admin/headers/admin_header');
        $this->load->view('Shareyourthoughts/standard_publish_list',$data);
        $this->load->view('admin/footers/admin_footer');
    }
    public function standard_publish_view($id){
        $id = encryptids("D", $id);
        $data['getData']=$this->Shareyourthoughts_model->getStandardPublishComments($id);
        $this->load->view('admin/headers/admin_header');
         $this->load->view('Shareyourthoughts/standard_publish_view',$data);
         $this->load->view('admin/footers/admin_footer');
    }

    public function updateStandardPublishComments(){
        try {
            $id = $this->input->post('id');
            $formdata['status'] = $this->input->post('status'); 
            $id = $this->Shareyourthoughts_model->updateStandardPublishComments($formdata,$id);
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
        redirect(base_url() . "Shareyourthoughts/standard_publish_view", 'refresh');
    }
     public function deleteStandardPublishComments(){
        try {
            $id = $this->input->post('id');
            $id = $this->Shareyourthoughts_model->deleteStandardPublishComments($id);
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
        redirect(base_url() . "Shareyourthoughts/standard_publish_view", 'refresh');
    }














public function standard_under_list()
    {
    $getDetails= $this->Shareyourthoughts_model->StandardsUnderReviewData();
        $data = array();
        foreach ($getDetails as $row) 
        {
            $ids= $row['pk_is_id'];
            $comments= $this->Shareyourthoughts_model->StandardsUnderReviewCommnentsCount($ids);
            $row['comments'] = $comments;
            array_push($data, $row);
        }         
        $data['getData'] = $data;  
        $this->load->view('admin/headers/admin_header');
        $this->load->view('Shareyourthoughts/standard_under_list',$data);
        $this->load->view('admin/footers/admin_footer');
    }
    public function standard_under_view($id){
        $id = encryptids("D", $id);
        $data['getData']=$this->Shareyourthoughts_model->getStandardsUnderReviewComments($id);
        $this->load->view('admin/headers/admin_header');
         $this->load->view('Shareyourthoughts/standard_under_view',$data);
         $this->load->view('admin/footers/admin_footer');
    }

    public function updateStandardsUnderReviewComments(){
        try {
            $id = $this->input->post('id');
            $formdata['status'] = $this->input->post('status'); 
            $id = $this->Shareyourthoughts_model->updateStandardsUnderReviewComments($formdata,$id);
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
        redirect(base_url() . "Shareyourthoughts/standard_under_view", 'refresh');
    }
     public function deleteStandardsUnderReviewComments(){
        try {
            $id = $this->input->post('id');
            $id = $this->Shareyourthoughts_model->deleteStandardsUnderReviewComments($id);
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
        redirect(base_url() . "Shareyourthoughts/standard_under_view", 'refresh');
    }







public function standard_revised_list()
    { 
        $getDetails= $this->Shareyourthoughts_model->StandardRevisedData();
        $data = array();
        foreach ($getDetails as $row) 
        {
            $ids= $row['pk_is_id'];
            $comments= $this->Shareyourthoughts_model->StandardRevisedCommnentsCount($ids);
            $row['comments'] = $comments;
            array_push($data, $row);
        }         
        $data['getData'] = $data; 
        $this->load->view('admin/headers/admin_header');
        $this->load->view('Shareyourthoughts/standard_revised_list',$data);
        $this->load->view('admin/footers/admin_footer');
    }
    public function standard_revised_view($id){
        $id = encryptids("D", $id);
        $data['getData']=$this->Shareyourthoughts_model->getStandardRevisedComments($id);
        $this->load->view('admin/headers/admin_header');
         $this->load->view('Shareyourthoughts/standard_revised_view',$data);
         $this->load->view('admin/footers/admin_footer');
    }

    public function updateStandardRevisedComments(){
        try {
            $id = $this->input->post('id');
            $formdata['status'] = $this->input->post('status'); 
            $id = $this->Shareyourthoughts_model->updateStandardRevisedComments($formdata,$id);
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
        redirect(base_url() . "Shareyourthoughts/standard_revised_view", 'refresh');
    }
     public function deleteStandardRevisedComments(){
        try {
            $id = $this->input->post('id');
            $id = $this->Shareyourthoughts_model->deleteStandardRevisedComments($id);
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
        redirect(base_url() . "Shareyourthoughts/standard_revised_view", 'refresh');
    }


     
     public function discussion_forum_dashboard(){
        $this->load->view('admin/headers/admin_header');
         $this->load->view('Shareyourthoughts/discussion_forum_dashboard');
         $this->load->view('admin/footers/admin_footer');
    }


    public function create_discussion_list()
    {
        $data['getData'] = $this->Shareyourthoughts_model->DiscussionForumList();
        $this->load->view('admin/headers/admin_header');
        $this->load->view('Shareyourthoughts/create_discussion_list',$data);
        $this->load->view('admin/footers/admin_footer');
    }

    public function updateStatusDiscussionForum(){
        try {
            $id = $this->input->post('id');
            $formdata['status'] = $this->input->post('status'); 
            $id = $this->Shareyourthoughts_model->updateStatusDiscussionForum($formdata,$id);
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
        redirect(base_url() . "Shareyourthoughts/create_discussion_list", 'refresh');
    }
     public function deleteDiscussionForum(){
        try {
            $id = $this->input->post('id');
            $id = $this->Shareyourthoughts_model->deleteDiscussionForum($id);
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
        redirect(base_url() . "Shareyourthoughts/create_discussion_list", 'refresh');
    }


public function create_discussion_form()
{
    $this->load->view('admin/headers/admin_header'); 
    if ($this->form_validation->run('create_discussion_form') == FALSE) 
    {
        $this->load->view('Shareyourthoughts/create_discussion_form');
    } 
    else
    { 
        if(!file_exists('uploads/discussion_form')) { mkdir('uploads/discussion_form', 0777, true); }

        $imagesize=$_FILES['image']['size']; 
        if ($imagesize > 0 )
        {
            $imagepath = 'uploads/discussion_form/'; 
            $imagelocation = $imagepath . time() .'image'. $_FILES['image']['name']; 
            move_uploaded_file($_FILES['image']['tmp_name'], $imagelocation);
        }
        else
        {
            $imagelocation=''; 
        }
        $formdata = array(); 
        $formdata['title'] = $this->input->post('title');
        $formdata['description'] = $this->input->post('description');
        $formdata['start_date'] = $this->input->post('start_date'); 
        $formdata['end_date'] = $this->input->post('end_date');  
        $formdata['image'] = $imagelocation; 
        $formdata['created_on'] = date('Y-m-d h:i:s'); 
        $id = $this->Shareyourthoughts_model->insertDiscussionForumData($formdata);
        if ($id)
        {
            $this->session->set_flashdata('MSG', ShowAlert("Record Inserted Successfully", "SS"));
            redirect(base_url() . "Shareyourthoughts/create_discussion_list", 'refresh');
        }
        else
        {
            $this->session->set_flashdata('MSG', ShowAlert("Failed to create new Record/ live session, Please try again", "DD"));
            redirect(base_url() . "Shareyourthoughts/create_discussion_form", 'refresh');
        }
    } 
    $this->load->view('admin/footers/admin_footer');
} 


    public function Manage_discussion_list()
    {
        $data['getData'] = $this->Shareyourthoughts_model->ManageDiscussionList();
        $this->load->view('admin/headers/admin_header');
        $this->load->view('Shareyourthoughts/Manage_discussion_list',$data);
        $this->load->view('admin/footers/admin_footer');
    }
    
    public function ongoing_discussion_list(){
        $data['getData'] = $this->Shareyourthoughts_model->OngoingDiscussionList();
        $this->load->view('admin/headers/admin_header');
         $this->load->view('Shareyourthoughts/ongoing_discussion_list',$data);
         $this->load->view('admin/footers/admin_footer');
    }
    public function closed_discussion_list()
    {
        $data['getData'] = $this->Shareyourthoughts_model->CloseDiscussionList();
        $this->load->view('admin/headers/admin_header');
        $this->load->view('Shareyourthoughts/closed_discussion_list',$data);
        $this->load->view('admin/footers/admin_footer');
    }

    public function discussion_view($id)
    {
        $id = encryptids("D", $id);
        $data['getData'] = $this->Shareyourthoughts_model->DiscussionView($id);
        $this->load->view('admin/headers/admin_header');
        $this->load->view('Shareyourthoughts/discussion_view',$data);
        $this->load->view('admin/footers/admin_footer');
    }

 
public function discussion_foram_edit($id)
{
    $id = encryptids("D", $id);
    $data['getData'] = $this->Shareyourthoughts_model->DiscussionView($id);
    $this->load->view('admin/headers/admin_header'); 
    if ($this->form_validation->run('create_discussion_form') == FALSE) 
    {
        $this->load->view('Shareyourthoughts/discussion_foram_edit',$data);
    } 
    else
    { 
        if(!file_exists('uploads/discussion_form')) { mkdir('uploads/discussion_form', 0777, true); }
        if (isset($_FILES['image']['size']))
        {
            $imagepath = 'uploads/discussion_form/'; 
            $imagelocation = $imagepath . time() .'image'. $_FILES['image']['name']; 
            move_uploaded_file($_FILES['image']['tmp_name'], $imagelocation);
        }
        else
        {
            $imagelocation=$this->input->post('old_img'); 
        }
        $formdata = array(); 
        $fid = $this->input->post('id');
        $formdata['title'] = $this->input->post('title');
        $formdata['description'] = $this->input->post('description');
        $formdata['start_date'] = $this->input->post('start_date'); 
        $formdata['end_date'] = $this->input->post('end_date');  
        $formdata['status'] = 1;  
        $formdata['image'] = $imagelocation;  
        $id = $this->Shareyourthoughts_model->updateDiscussionForum($formdata,$fid);
        if ($id)
        {
            $this->session->set_flashdata('MSG', ShowAlert("Record Inserted Successfully", "SS"));
            redirect(base_url() . "Shareyourthoughts/create_discussion_list", 'refresh');
        }
        else
        {
            $this->session->set_flashdata('MSG', ShowAlert("Failed to create new Record/ live session, Please try again", "DD"));
            redirect(base_url() . "Shareyourthoughts/discussion_foram_edit", 'refresh');
        }
    } 
    $this->load->view('admin/footers/admin_footer');
} 

public function DeleteImageDiscussionForum(){
        try {
            $id = $this->input->post('id');
            $id = $this->Shareyourthoughts_model->DeleteImageDiscussionForum($id);
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
        redirect(base_url() . "Shareyourthoughts/discussion_foram_edit", 'refresh');
    }

    
}