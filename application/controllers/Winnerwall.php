<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Winnerwall extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin/Admin_model');
        $this->load->model('subadmin/Que_bank_model');
        $this->load->model('subadmin/Questions_model');
        $this->load->model('Admin/Your_wall_model');
        $this->load->model('Standards_Making/Standards_Making_model');
        $this->load->model('Learningscience/Learningscience_model');
        $this->load->model('Winnerwall/Winnerwall_model');
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

    public function winner_wall_list()
    {  
        $data = array();
        $data['winnerwall'] = $this->Winnerwall_model->getWinnerWallList();

        $this->load->view('admin/headers/admin_header');
        $this->load->view('winnerwall/winner_wall_list',$data);
        $this->load->view('admin/footers/admin_footer');
    }

    public function winner_wall_form()
    {   
        $this->load->view('admin/headers/admin_header');
        $data['prises']=$this->Winnerwall_model->prises();
        $data['competation']=$this->Winnerwall_model->published_quiz();

        if ($this->form_validation->run('winner_wall_form') == FALSE) 
        {
            $this->load->view('winnerwall/winner_wall_form',$data);
        } 
        else 
        {  
            if (!file_exists('uploads/winnerwall')) { mkdir('uploads/winnerwall', 0777, true); }
            $imagesize=$_FILES['image']['size'];  
            if ($imagesize > 0 ) 
            {
                $imagepath = 'uploads/winnerwall/'; 
                $imagelocation = $imagepath . time() .'image'. $_FILES['image']['name']; 
                move_uploaded_file($_FILES['image']['tmp_name'], $imagelocation);
            }

            $quiz_id = $this->input->post('quiz_id');
            $quiz_date = $this->input->post('quiz_date');
            $wall_title = $this->input->post('wall_title');
            $formdata['quiz_id'] = $quiz_id;
            $formdata['quiz_date'] = $quiz_date;
            $formdata['wall_title'] = $wall_title;

            $formdata['prize'] = $this->input->post('prize');
            $formdata['name'] = $this->input->post('name');
            $formdata['email'] = $this->input->post('email');
            $formdata['contact_no'] = $this->input->post('contact_no');
            $formdata['location'] = $this->input->post('location');
            $formdata['submit_id'] = $this->input->post('submit_id');
            $formdata['submit_flag'] = 0;
            $formdata['image'] = $imagelocation;
            $insertMasterData = $this->Winnerwall_model->checkWinnerMaster($quiz_id);
            if (empty($insertMasterData)) 
            {
                $formdata2['quiz_id'] = $quiz_id;
                $formdata2['quiz_date'] = $quiz_date;
                $formdata2['wall_title'] = $wall_title;
                $formdata2['status'] = 1;
                $formdata2['created_on'] = date('Y-m-d h:i:s');
                $this->Winnerwall_model->insertWinnerMaster($formdata2);
            }
            $dataadd = $this->Winnerwall_model->insertWinnerwall($formdata);
            if ($dataadd) {
                $data1['status'] = 1;
                $data1['message'] = 'Deleted successfully.'; 
                
            } else {
                $data1['status'] = 0;
                $data1['message'] = 'Failed to delete, Please try again.';              
            }
            echo json_encode($data1);
            exit;

        } 
        $this->load->view('admin/footers/admin_footer'); 
    }

public function displayWall()
    {
        $data = array();
         $submit_id = $this->input->post('submit_id');
       

        $details = array();
        // $details = '';
        $details = $this->Winnerwall_model->displayWall($submit_id);
        if (empty($details)) {
            $data['status'] = 0;
            $data['message'] = 'Failed to get details , Please try again.';
            $data['data'] = $details;
        } else {
            $data['status'] = 1;
            $data['message'] = 'Details Available.';
            $data['data'] = $details;
        }

        echo  json_encode($data);
        exit();
    }

    public function getWinnerData()
    {
        $data = array();
        $id = $this->input->post('id');
        $details = array(); 
        $details = $this->Winnerwall_model->getWinnerData($id);
        if (empty($details)) {
            $data['status'] = 0;
            $data['message'] = 'Failed to get details , Please try again.';
            $data['data'] = $details;
        } else {
            $data['status'] = 1;
            $data['message'] = 'Details Available.';
            $data['data'] = $details;
        }

        echo  json_encode($data);
        exit();
    }

    public function viewWallWinner()
    {
        $data = array();
         $quiz_id = $this->input->post('quiz_id');
       

        $details = array();
        // $details = '';
        $details = $this->Winnerwall_model->viewWallWinner($quiz_id);
        if (empty($details)) {
            $data['status'] = 0;
            $data['message'] = 'Failed to get details , Please try again.';
            $data['data'] = $details;
        } else {
            $data['status'] = 1;
            $data['message'] = 'Details Available.';
            $data['data'] = $details;
        }

        echo  json_encode($data);
        exit();
    }
    public function DeleteData(){
        try {   
                 
            $id = $this->input->post('id');
            $id = $this->Winnerwall_model->DeleteData($id);
            if ($id) {
                $data['status'] = 1;
                $data['message'] = 'Deleted successfully.';
                
            } else {
                $data['status'] = 0;
                $data['message'] = 'Failed to delete, Please try again.';               
            }
            echo  json_encode($data);
            exit();           
            
        } catch (Exception $e) {
            echo json_encode([
                'status' => 'error',
                'message' => $e->getMessage(),
            ]);
            return true;
        }
        redirect(base_url() . "winnerwall/winner_wall_form", 'refresh');
    }

     public function submitWinnerWall(){
        try {   
                 
            $submit_id = $this->input->post('submit_id');
            $id = $this->Winnerwall_model->submitWinnerWall($id);
            if ($id) {
                $data['status'] = 1;
                $data['message'] = 'Deleted successfully.';
                
            } else {
                $data['status'] = 0;
                $data['message'] = 'Failed to delete, Please try again.';               
            }
            echo  json_encode($data);
            exit();           
            
        } catch (Exception $e) {
            echo json_encode([
                'status' => 'error',
                'message' => $e->getMessage(),
            ]);
            return true;
        }
        redirect(base_url() . "winnerwall/winner_wall_form", 'refresh');
    }

     public function updateWinnerWall(){
        try {
            $id = $this->input->post('id');
            $formdata['status'] = $this->input->post('status');  

            $id = $this->Winnerwall_model->updateWinnerWall($formdata,$id);
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
        redirect(base_url() . "winnerwall/winner_wall_list", 'refresh');
    }

    public function deleteWinnerWall(){
        try {   
                 
            $id = $this->input->post('id');
            $quiz_id = $this->input->post('quiz_id');
            $delId = $this->Winnerwall_model->deleteWinnerWall($id,$quiz_id);
            if ($delId) {
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
        redirect(base_url() . "learningscience/manage_session_list", 'refresh');
    }



    public function winner_wall_archive()
    {
        $data = array();
        $data['winnerwall'] = $this->Winnerwall_model->getArchiveWinnerWallList();
 
        $this->load->view('admin/headers/admin_header');
        $this->load->view('winnerwall/winner_wall_archive',$data);
        $this->load->view('admin/footers/admin_footer');
    }

    public function winner_wall_view($id)
    {
        $id= encryptids("D", $id);
        $data = array();
        $data['masterWinners'] = $this->Winnerwall_model->getMasterWinnerWall($id);
 
        $this->load->view('admin/headers/admin_header');
        $this->load->view('winnerwall/winner_wall_view',$data);
        $this->load->view('admin/footers/admin_footer');
    }

    public function winner_wall_edit($id)
    {
        $this->load->view('admin/headers/admin_header');
        $id= encryptids("D", $id);
        $data['masterWinners']= $this->Winnerwall_model->getMasterWinnerWall($id);
        $data['prises']=$this->Winnerwall_model->prises();
        $data['competation']=$this->Winnerwall_model->published_quiz();

        if ($this->form_validation->run('winner_wall_form') == FALSE) 
        {
            $this->load->view('winnerwall/winner_wall_edit',$data);
        } 
        else 
        {  
            if (!file_exists('uploads/winnerwall')) { mkdir('uploads/winnerwall', 0777, true); }
            $imagesize=$_FILES['image']['size'];  
            if ($imagesize > 0 ) 
            {
                $imagepath = 'uploads/winnerwall/'; 
                $imagelocation = $imagepath . time() .'image'. $_FILES['image']['name']; 
                move_uploaded_file($_FILES['image']['tmp_name'], $imagelocation);
            }

            $quiz_id = $this->input->post('quiz_id');
            $quiz_date = $this->input->post('quiz_date');
            $wall_title = $this->input->post('wall_title');
            $formdata['quiz_id'] = $quiz_id;
            $formdata['quiz_date'] = $quiz_date;
            $formdata['wall_title'] = $wall_title;

            $formdata['prize'] = $this->input->post('prize');
            $formdata['name'] = $this->input->post('name');
            $formdata['email'] = $this->input->post('email');
            $formdata['contact_no'] = $this->input->post('contact_no');
            $formdata['location'] = $this->input->post('location');
            $wall_id = $this->input->post('wall_id'); 
            // $formdata['image'] = $imagelocation;
            $insertMasterData = $this->Winnerwall_model->checkWinnerMaster($quiz_id);
            if (empty($insertMasterData)) 
            {
                $formdata2['quiz_id'] = $quiz_id;
                $formdata2['quiz_date'] = $quiz_date;
                $formdata2['wall_title'] = $wall_title;
                $formdata2['status'] = 1;
                $formdata2['created_on'] = date('Y-m-d h:i:s');
                $this->Winnerwall_model->insertWinnerMaster($formdata2);
            }
            $updatedata = $this->Winnerwall_model->updateWinnerwallDetails($formdata,$wall_id);
            if ($updatedata) {
                $data1['status'] = 1;
                $data1['message'] = 'Deleted successfully.'; 
                
            } else {
                $data1['status'] = 0;
                $data1['message'] = 'Failed to delete, Please try again.';              
            }
            echo json_encode($data1);
            exit;

        } 
        $this->load->view('admin/footers/admin_footer'); 
    }

    public function winner_wall_edit2()
    {   
             $old_file = $this->input->post('old_file');
             if (!file_exists('uploads/winnerwall')) { mkdir('uploads/winnerwall', 0777, true); }
            if (isset($_FILES['image']['size'])) 
            {
                $imagesize=$_FILES['image']['size']; 
                if ($imagesize > 0 ) 
                {
                    $imagepath = 'uploads/winnerwall/'; 
                    $imagelocation = $imagepath . time() .'image'. $_FILES['image']['name'];
                    move_uploaded_file($_FILES['image']['tmp_name'], $imagelocation);
                }
            }
            else
            {
                $imagelocation = $old_file;
            }

            $quiz_id = $this->input->post('quiz_id');
            $quiz_date = $this->input->post('quiz_date');
            $wall_title = $this->input->post('wall_title');
            $formdata['quiz_id'] = $quiz_id;
            $formdata['quiz_date'] = $quiz_date;
            $formdata['wall_title'] = $wall_title;

            $formdata['prize'] = $this->input->post('prize');
            $formdata['name'] = $this->input->post('name');
            $formdata['email'] = $this->input->post('email');
            $formdata['contact_no'] = $this->input->post('contact_no');
            $formdata['location'] = $this->input->post('location');
            $wall_id = $this->input->post('wall_id'); 
            $formdata['image'] = $imagelocation;
            $insertMasterData = $this->Winnerwall_model->checkWinnerMaster($quiz_id);
            if (empty($insertMasterData)) 
            {
                $formdata2['quiz_id'] = $quiz_id;
                $formdata2['quiz_date'] = $quiz_date;
                $formdata2['wall_title'] = $wall_title;
                $formdata2['status'] = 1;
                $formdata2['created_on'] = date('Y-m-d h:i:s');
                $this->Winnerwall_model->insertWinnerMaster($formdata2);
            }
            $updatedata = $this->Winnerwall_model->updateWinnerwallDetails($formdata,$wall_id);
            if ($updatedata) {
                $data1['status'] = 1;
                $data1['message'] = 'Updated successfully.'; 
                
            } else {
                $data1['status'] = 0;
                $data1['message'] = 'Failed to Update, Please try again.';              
            }
            echo json_encode($data1);
            exit;
  
    }
}