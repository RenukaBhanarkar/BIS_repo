<?php
defined('BASEPATH') or exit('No direct script access allowed');

class membership_panel extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // if(empty($this->session->userdata("sess_arr")))
        // {
        //     // redirect(site_url(),'refresh');
        //     redirect(base_url() . "Users/logout", 'refresh');
        // }
        // $this->load->model('Admin/Admin_model');
        // $this->load->model('subadmin/Que_bank_model');
        // $this->load->model('subadmin/Questions_model');
        // $this->load->model('Admin/Your_wall_model');
        // $this->load->model('Standards_Making/Standards_Making_model');
        // $this->load->model('Learningscience/Learningscience_model');
        // $this->load->model('Winnerwall/Winnerwall_model');
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
    
    public function working_panel_dashboard()
    {
        $this->load->view('admin/headers/admin_header');
        $this->load->view('membership_panel/working_panel_dashboard');
        $this->load->view('admin/footers/admin_footer');
    }
    public function create_vacancies_list()
    {
        $this->load->view('admin/headers/admin_header');
        $this->load->view('membership_panel/create_vacancies_list');
        $this->load->view('admin/footers/admin_footer');
    }
    public function create_vacancies_form()
    {
        $this->load->view('admin/headers/admin_header');
        $this->load->view('membership_panel/create_vacancies_form');
        $this->load->view('admin/footers/admin_footer');
    }
    
}
?>