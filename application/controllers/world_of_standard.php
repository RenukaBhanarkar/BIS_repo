<?php
defined('BASEPATH') or exit('No direct script access allowed');

class world_of_standard extends CI_Controller
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

    public function projects_in_progress(){
        $this->load->view('users/headers/header');
        $this->load->view('world_of_standard/projects_in_progress');
        $this->load->view('users/footers/footer');
    }
    public function progress_list(){
        $this->load->view('users/headers/header');
        $this->load->view('world_of_standard/progress_list');
        $this->load->view('users/footers/footer');
      }
      public function project_complete(){
        $this->load->view('users/headers/header');
        $this->load->view('world_of_standard/project_complete');
        $this->load->view('users/footers/footer');
      }
      public function project_complete_list(){
        $this->load->view('users/headers/header');
        $this->load->view('world_of_standard/project_complete_list');
        $this->load->view('users/footers/footer');
      }
      public function upcoming_workshop(){
        $this->load->view('users/headers/header');
        $this->load->view('world_of_standard/upcoming_workshop');
        $this->load->view('users/footers/footer');
      }
      public function upcoming_workshop_details(){
        $this->load->view('users/headers/header');
        $this->load->view('world_of_standard/upcoming_workshop_details');
        $this->load->view('users/footers/footer');
      }
      public function workshop_seminars(){
        $this->load->view('users/headers/header');
        $this->load->view('world_of_standard/workshop_seminars');
        $this->load->view('users/footers/footer');
      }
}
?>