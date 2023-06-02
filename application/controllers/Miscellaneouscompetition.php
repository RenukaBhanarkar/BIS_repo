<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Miscellaneouscompetition extends CI_Controller
{

    public function __construct()
    {

        parent::__construct();
        // $this->load->model('Admin/Admin_model');
        // $this->load->helper('comman_fun_helper');
        // $this->load->model('Quiz/quiz_model');
        // $this->load->model('Standardswritting/Standardswritting_model');
        // $this->load->model('Users/Users_model');
        // $this->load->model('Admin/Wall_of_wisdom_model', 'wow');
        // $this->load->model('Winnerwall/Winnerwall_model');
        $this->load->model('Miscellaneous_Competition/Miscellaneous_competition');
        date_default_timezone_set("Asia/Calcutta");
    }

    public function task_recevied_list()
    {
        $data = array();
        $admin_id= encryptids("D", $_SESSION['admin_id']);
        //$data['admin_id'] = $admin_id;
        $data['records']=$this->Miscellaneous_competition->SubmissionForReview($admin_id);
        $this->load->view('admin/headers/admin_header');
        $this->load->view('admin/task_recevied_list');
        $this->load->view('admin/footers/admin_footer');
    }
    public function task_reviewed()
    {
        $this->load->view('admin/headers/admin_header');
        $this->load->view('admin/task_reviewed');
        $this->load->view('admin/footers/admin_footer');
    }
}