<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cms extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // if(empty($this->session->userdata("sess_arr")))
        // {
        //     // redirect(site_url(),'refresh');
        //     redirect(base_url() . "Users/logout", 'refresh');
        // }
        $this->load->model('Admin/Cms_model');
        $this->load->model('subadmin/Que_bank_model');
        $this->load->model('subadmin/Questions_model');
        $this->load->model('Admin/Your_wall_model');
        $this->load->model('Standards_Making/Standards_Making_model');
        $this->load->model('Learningscience/Learningscience_model');
        $this->load->model('Admin/By_the_mentor_model');
        date_default_timezone_set("Asia/Calcutta");
    }
    public function index()
    {
        if ($this->Admin_model->checkAdminLogin()) {
            redirect(base_url() . "Admin/cmsManagenent_dashboard", 'refresh');
        } else {
            redirect(base_url() . "Users/login", 'refresh');
        }
        return true;
    }
    public function consumer_list()
    {
       
        $data['aboutConsumerBisData'] = $this->Cms_model->aboutConsumerBisData();
        // print_r($data); die;
        $this->load->view('admin/headers/admin_header');
        $this->load->view('cms/consumer_list',$data);
        $this->load->view('admin/footers/admin_footer');
    }
    public function add_consumer_list()    
    {
     
        if (!file_exists('uploads/cms/consumer_bis')) {
            mkdir('uploads/cms/consumer_bis', 0777, true);
        }


        $banner_img = "consumer_bis" . time() . '.jpg';
        $config['upload_path'] = './uploads/cms/consumer_bis';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size']    = '10000';
        $config['max_width']  = '3024';
        $config['max_height']  = '2024';

        $config['file_name'] = $banner_img;

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('image')) {
            $data['status'] = 0;
            $data['message'] = $this->upload->display_errors();
        }
        $formdata['description'] = $this->input->post('description');
        $formdata['image'] = $banner_img;
        $formdata['type'] = "1";

        $this->Cms_model->consumerBisinsertData($formdata);
        $this->session->set_flashdata('MSG', ShowAlert("Record Inserted Successfully", "SS"));
        redirect(base_url() . "cms/consumer_list", 'refresh');
    }
    public function update_consumer_list()
    {
        if (!file_exists('uploads/cms/consumer_bis')) {
            mkdir('uploads/cms/consumer_bis', 0777, true);
        }
        //print_r([$_POST['old_image']]); die;
        $formdata['id'] = $this->input->post('id');
        //$formdata['title'] = $this->input->post('title');
        $formdata['description'] = $this->input->post('description');
        //  $formdata['image'] = $this->input->post('old_doc');   

        $oldDocument = "";
        $oldDocument = $this->input->post('old_image');
        $document = "";

        if (!empty($_FILES['image']['tmp_name'])) {
            $document = "consumer_bis" . time() . '.jpg';
            $config['upload_path'] = './uploads/cms/consumer_bis';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size']    = '250';
            $config['max_width']  = '3024';
            $config['max_height']  = '2024';
            $config['file_name'] = $document;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('image')) {
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
            $formdata['image'] = $document;
        }
        // $formdata['status']="1";
        // print_r($formdata);
        // print_r($_FILES); die;
        $id = $this->Cms_model->consumerBisupdatedateData($formdata);
        if ($id) {
            $this->session->set_flashdata('MSG', ShowAlert("Record Updated Successfully", "SS"));
            redirect(base_url() . "cms/consumer_list", 'refresh');
        } else {
            $this->session->set_flashdata('MSG', ShowAlert("Failed to update record,Please try again", "DD"));
            redirect(base_url() . "cms/consumer_list", 'refresh');
        }
    }
    public function delet_consumer_list()
    {
        try {
            $que_id = $this->input->post('que_id');
            $image = $this->input->post('banner');
            $image1= 'uploads/cms/ebis/'.$image;
            $id = $this->Cms_model->deletconsumerBis($que_id);
            if ($id) {
                $data['status'] = 1;
                $data['message'] = 'Deleted successfully.';
                @unlink($image1);
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
        redirect(base_url() . "admin/about_exchange_forum", 'refresh');
    }
    public function standard_promotion_list()
    {
        $data['aboutConsumerBisData'] = $this->Cms_model->standardPromotionList();
        $this->load->view('admin/headers/admin_header');
        $this->load->view('cms/standard_promotion_list',$data);
        $this->load->view('admin/footers/admin_footer');
    }
    public function add_standard_promotion_list()    
    {
        $formdata['description'] = $this->input->post('description');        
        $formdata['type'] = "2";

        $this->Cms_model->standardPromotioninsertData($formdata);
        $this->session->set_flashdata('MSG', ShowAlert("Record Inserted Successfully", "SS"));
        redirect(base_url() . "cms/standard_promotion_list", 'refresh');
    }
    public function update_standard_promotion_list()
    {
        $formdata['id'] = $this->input->post('id');        
        $formdata['description'] = $this->input->post('description');
        $id = $this->Cms_model->aboutStandardClubUpdateData($formdata);
        if ($id) {
            $this->session->set_flashdata('MSG', ShowAlert("Record Updated Successfully", "SS"));
            redirect(base_url() . "cms/standard_promotion_list", 'refresh');
        } else {
            $this->session->set_flashdata('MSG', ShowAlert("Failed to update record,Please try again", "DD"));
            redirect(base_url() . "cms/standard_promotion_list", 'refresh');
        }
    }
    public function delet_standard_promotion_list()
    {
        try {
            $que_id = $this->input->post('que_id');
            
            $id = $this->Cms_model->deletaboutStandardClub($que_id);
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
        redirect(base_url() . "admin/standard_promotion_list", 'refresh');
    }
    public function about_standard_club()
    {
        $data['aboutConsumerBisData'] = $this->Cms_model->aboutStandardClub();
        $this->load->view('admin/headers/admin_header');
        $this->load->view('cms/about_standard_club',$data);
        $this->load->view('admin/footers/admin_footer');
    }
    public function add_about_standard_club()    
    {
     
        if (!file_exists('uploads/cms/about_standard_club')) {
            mkdir('uploads/cms/about_standard_club', 0777, true);
        }


        $banner_img = "consumer_bis" . time() . '.jpg';
        $config['upload_path'] = './uploads/cms/about_standard_club';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size']    = '10000';
        $config['max_width']  = '3024';
        $config['max_height']  = '2024';

        $config['file_name'] = $banner_img;

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('image')) {
            $data['status'] = 0;
            $data['message'] = $this->upload->display_errors();
        }
        $formdata['description'] = $this->input->post('description');
        $formdata['image'] = $banner_img;
        $formdata['type'] = "3";

        $this->Cms_model->aboutStandardClubinsertData($formdata);
        $this->session->set_flashdata('MSG', ShowAlert("Record Inserted Successfully", "SS"));
        redirect(base_url() . "cms/about_standard_club", 'refresh');
    }
    public function update_about_standard_club()
    {
        if (!file_exists('uploads/cms/about_standard_club')) {
            mkdir('uploads/cms/about_standard_club', 0777, true);
        }
        //print_r([$_POST['old_image']]); die;
        $formdata['id'] = $this->input->post('id');
        //$formdata['title'] = $this->input->post('title');
        $formdata['description'] = $this->input->post('description');
        //  $formdata['image'] = $this->input->post('old_doc');   

        $oldDocument = "";
        $oldDocument = $this->input->post('old_image');
        $document = "";

        if (!empty($_FILES['image']['tmp_name'])) {
            $document = "consumer_bis" . time() . '.jpg';
            $config['upload_path'] = './uploads/cms/about_standard_club';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size']    = '250';
            $config['max_width']  = '3024';
            $config['max_height']  = '2024';
            $config['file_name'] = $document;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('image')) {
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
            $formdata['image'] = $document;
        }
        // $formdata['status']="1";
        // print_r($formdata);
        // print_r($_FILES); die;
        $id = $this->Cms_model->aboutStandardClubUpdateData($formdata);
        if ($id) {
            $this->session->set_flashdata('MSG', ShowAlert("Record Updated Successfully", "SS"));
            redirect(base_url() . "cms/about_standard_club", 'refresh');
        } else {
            $this->session->set_flashdata('MSG', ShowAlert("Failed to update record,Please try again", "DD"));
            redirect(base_url() . "cms/about_standard_club", 'refresh');
        }
    }
    public function delet_about_standard_club()
    {
        try {
            $que_id = $this->input->post('que_id');
            $image = $this->input->post('banner');
            $image1= 'uploads/cms/ebis/'.$image;
            $id = $this->Cms_model->deletaboutStandardClub($que_id);
            if ($id) {
                $data['status'] = 1;
                $data['message'] = 'Deleted successfully.';
                @unlink($image1);
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
        redirect(base_url() . "admin/about_standard_club", 'refresh');
    }
    public function learning_science_via()
    {
        $data['aboutConsumerBisData'] = $this->Cms_model->learningScienceVia();
        $this->load->view('admin/headers/admin_header');
        $this->load->view('cms/learning_science_via',$data);
        $this->load->view('admin/footers/admin_footer');
    }
    public function add_learning_science_via()    
    {
        $formdata['description'] = $this->input->post('description');        
        $formdata['type'] = "4";

        $this->Cms_model->standardPromotioninsertData($formdata);
        $this->session->set_flashdata('MSG', ShowAlert("Record Inserted Successfully", "SS"));
        redirect(base_url() . "cms/learning_science_via", 'refresh');
    }
    public function update_learning_science_via()
    {
        $formdata['id'] = $this->input->post('id');        
        $formdata['description'] = $this->input->post('description');
        $id = $this->Cms_model->aboutStandardClubUpdateData($formdata);
        if ($id) {
            $this->session->set_flashdata('MSG', ShowAlert("Record Updated Successfully", "SS"));
            redirect(base_url() . "cms/learning_science_via", 'refresh');
        } else {
            $this->session->set_flashdata('MSG', ShowAlert("Failed to update record,Please try again", "DD"));
            redirect(base_url() . "cms/learning_science_via", 'refresh');
        }
    }
    public function delet_learning_science_via()
    {
        try {
            $que_id = $this->input->post('que_id');
            
            $id = $this->Cms_model->deletaboutStandardClub($que_id);
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
        redirect(base_url() . "admin/learning_science_via", 'refresh');
    }
}
?>