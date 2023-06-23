<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cms extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
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
        
        $this->load->view('admin/headers/admin_header');
        $this->load->view('cms/consumer_list',$data);
        $this->load->view('admin/footers/admin_footer');
    }
    public function standard_promotion_list()
    {
        $this->load->view('admin/headers/admin_header');
        $this->load->view('cms/standard_promotion_list');
        $this->load->view('admin/footers/admin_footer');
    }
    public function about_standard_club()
    {
        $this->load->view('admin/headers/admin_header');
        $this->load->view('cms/about_standard_club');
        $this->load->view('admin/footers/admin_footer');
    }
    public function learning_science_via()
    {
        $this->load->view('admin/headers/admin_header');
        $this->load->view('cms/learning_science_via');
        $this->load->view('admin/footers/admin_footer');
    }
}
?>