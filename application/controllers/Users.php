<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
{

    public function __construct()
    {

        parent::__construct();
        $this->load->model('Admin/Admin_model');
        $this->load->model('Quiz/quiz_model');
        $this->load->model('Users/Users_model');
        $this->load->model('Admin/Wall_of_wisdom_model', 'wow');
        $this->load->model('Winnerwall/Winnerwall_model');
        date_default_timezone_set("Asia/Calcutta");
    }
    public function index()
    {
        if ($this->Users_model->checkAdminLogin()) {
            $sess_admin_type = encryptids("D", $this->session->userdata('admin_type'));
            $sess_is_admin = encryptids("D", $this->session->userdata('is_admin'));
            if ($sess_is_admin == 1) {
                if ($sess_admin_type == 1 || $sess_admin_type == 2 || $sess_admin_type == 3) {

                    redirect(base_url() . "Admin/dashboard", 'refresh');
                } else {
                    redirect(base_url() . "Users/welcome", 'refresh');
                }
            } else {
                redirect(base_url() . "Users/welcome", 'refresh');
            }
        } else {
            redirect(base_url() . "Users/welcome", 'refresh');
        }
        return true;
    }

    public function login()
    {
        $this->load->view('users/headers/login_header');
        $this->load->view('users/login');
        $this->load->view('users/footers/login_footer');
    }
    // public function authUser()
    // {

    //     $this->form_validation->set_rules('username', 'Username', 'required|trim|max_length[50]');
    //     $this->form_validation->set_rules('password', 'Password', 'required|trim|max_length[30]');
    //     if ($this->form_validation->run() == FALSE) {
    //         $this->session->set_flashdata('MSG', ShowAlert(validation_errors(), "DD"));
    //         redirect(base_url() . "Users/login", 'refresh');
    //         return false;
    //     } else {

    //         $username        = clearText($this->input->post('username'));
    //         $password        = clearText($this->input->post('password'));

    //         //////////////////////START/////////////

    //         $curl_req = curl_init();
    //         // $parameters = json_encode(array("userid" => $username, "password" => $password));
    //         $parameters  = "userid=" . $username . "&password=" . $password;
    //         curl_setopt_array($curl_req, array(
    //             CURLOPT_URL => 'http://203.153.41.213:8071/php/BIS_2.0/dgdashboard/Auth/login',
    //             CURLOPT_RETURNTRANSFER => true,
    //             CURLOPT_ENCODING => '',
    //             CURLOPT_MAXREDIRS => 10,
    //             CURLOPT_TIMEOUT => 0,
    //             CURLOPT_FOLLOWLOCATION => true,
    //             CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    //             CURLOPT_CUSTOMREQUEST => 'POST',
    //             CURLOPT_SSL_VERIFYPEER => false,
    //             CURLOPT_POSTFIELDS => $parameters,
    //             CURLOPT_HTTPHEADER => array(
    //                 'Content-Type: application/x-www-form-urlencoded',
    //                 'Accept: application/json'
    //             ),
    //         ));
    //         $response = curl_exec($curl_req);
    //         curl_close($curl_req);
    //         $output = json_decode($response, true);

    //         $userData = array();
    //         //if(!empty($output)){ }
    //         if ($output['status_code'] == 1) {
    //             $userData = $output['data'];
    //             //echo json_encode($userData);echo "<br>";
    //             $user_id = $userData['UserID'];
    //             $exist_user = $this->Users_model->toCheckUserExist($user_id);
    //             if (!$exist_user) {
    //                 $comm_id = "";
    //                 $comm_name = "";
    //                 if (!empty($userData['assignedCommitte'])) {
    //                     $comm_id = $userData['assignedCommitte']['comm_id'];
    //                     $comm_name = $userData['assignedCommitte']['comm_name'];
    //                 }
    //                 // echo  $user_id."<br>";
    //                 $data = array(
    //                     'user_id' => $userData['UserID'],
    //                     'emp_no' =>  $userData['EmployeeNumber'],
    //                     'status_id' =>  $userData['StatusID'],
    //                     'status_title' =>  $userData['StatusTitle'],

    //                     'user_title' =>  $userData['UserTitle'],
    //                     'user_name' =>  $userData['UserName'],
    //                     'user_doc_no' =>  $userData['UserDocumentNo'],

    //                     'date_of_birth' =>  $userData['DateOfBirth'],
    //                     'date_of_joining' =>  $userData['DateOfJoining'],
    //                     'user_mobile' =>  $userData['UserMobile'],
    //                     'email' =>  $userData['Email'],
    //                     'role' =>  $userData['role'],

    //                     'emp_desi_id' =>  $userData['EmployeeDesignationID'],
    //                     'emp_desi' =>  $userData['EmployeeDesignation'],


    //                     'created_on' =>  $userData['created_on'],
    //                     'user_type' =>  $userData['user_type'],
    //                     'member_id' =>  $userData['MemberID'],

    //                     'standard_club_id' =>  $userData['StandardClubID'],
    //                     'standard_club_name' =>  $userData['StandardClubName'],
    //                     'standard_club_branch_id' =>  $userData['StandardClubBranchID'],
    //                     'standard_club_dept_id' =>  $userData['StandardClubDeptID'],
    //                     'standard_club_region' =>  $userData['StandardClubRegion'],
    //                     'standard_club_category' =>  $userData['StandardClubCategory'],

    //                     'comm_id' =>  $comm_id,
    //                     'comm_name' =>  $comm_name,


    //                 );
    //                 // echo json_encode($data); exit();
    //                 $userId = $this->Users_model->insertData($data);
    //             }
    //             $user_details = $this->Users_model->getUsersDetailsByUserId($user_id);
    //             $admin_id        = encryptids("E", $user_details['user_id']);
    //             $admin_email        = encryptids("E", $user_details['email']);
    //             $admin_name      = encryptids("E", $user_details['user_name']);
    //             $admin_type        = encryptids("E", $user_details['user_type']);
    //             $admin_post        = encryptids("E", $user_details['emp_desi']);
    //             $club_id       = encryptids("E", $user_details['standard_club_id']);
    //             $branch_id       = encryptids("E", $user_details['standard_club_branch_id']);
    //             $dept_id       = encryptids("E", $user_details['standard_club_dept_id']);
    //             $region_id       = encryptids("E", $user_details['standard_club_region']);
    //             $is_admin       = encryptids("E", 0);
               
    //             $sess_arr         = array(
    //                 "admin_id" => $admin_id,
    //                 "admin_email" => $admin_email,
    //                 "admin_type" => $admin_type,
    //                 "admin_post" => $admin_post,
    //                 "admin_name" => $admin_name,
    //                 "is_admin" => $is_admin,
    //                 "club_id" => $club_id,
    //                 "branch_id" => $branch_id,
    //                 "region_id" => $region_id,
    //                 "dept_id" => $dept_id,
    //                 "quiz_lang_id" => 0
    //             );


    //             $this->session->set_userdata($sess_arr);

    //             redirect(base_url() . "Users/welcome", 'refresh');
    //             return true;
    //         } else {
    //             $user = $this->Admin_model->getLoginUsers($username, $password);
    //             if (empty($user)) {
    //                 $this->session->set_flashdata('MSG', ShowAlert("Invalid username or password.", "DD"));
    //                 redirect(base_url() . "Users/login", 'refresh');
    //                 return true;
    //             }
    //             // if(!password_verify($u_pass, $user_res[0]->user_password))
    //             // {
    //             //  $this->session->set_flashdata('MSG', ShowAlert("Invalid username or password.","DD"));
    //             //  if($param == "inslogin")
    //             //      redirect(base_url()."Administrator/iLogin", 'refresh');
    //             //  else
    //             //      redirect(base_url()."Administrator", 'refresh');
    //             //  return true;
    //             // }
    //             else {
    //                 $admin_id        = encryptids("E", $user['id']);
    //                 $admin_email        = encryptids("E", $user['email_id']);
    //                 $admin_name      = encryptids("E", $user['name']);
    //                 $admin_type        = encryptids("E", $user['admin_type']);
    //                 $admin_post        = encryptids("E", $user['post']);
    //                 $club_id       = encryptids("E", 0);
    //                 $branch_id       = encryptids("E", 0);
    //                 $dept_id       = encryptids("E", 0);
    //                 $region_id       = encryptids("E", 0);
    //                 $is_admin       = encryptids("E", 1);

    //                 $sess_arr         = array(
    //                     "admin_id" => $admin_id,
    //                     "admin_email" => $admin_email,
    //                     "admin_type" => $admin_type,
    //                     "admin_post" => $admin_post,
    //                     "admin_name" => $admin_name,
    //                     "is_admin" => $is_admin,
    //                     "club_id" => $club_id,
    //                     "branch_id" => $branch_id,
    //                     "region_id" => $region_id,
    //                     "dept_id" => $dept_id,
    //                     "quiz_lang_id" => 0
    //                 );

    //                 if ($user['admin_type'] == 1 || $user['admin_type'] == 2 || $user['admin_type'] == 3) {

    //                     $this->session->set_userdata($sess_arr);

    //                     redirect(base_url() . "Admin/Dashboard", 'refresh');
    //                     return true;
    //                 } else {
    //                     $this->session->set_flashdata('MSG',  ShowAlert("Invalid username or password.", "DD"));
    //                     redirect(base_url() . "Users/login", 'refresh');
    //                     return true;
    //                 }
    //             }
    //         }

    //         ///////////////////////END/////////////


    //     }
    // }
    public function authUser()
    {

        $this->form_validation->set_rules('username', 'Username', 'required|trim|max_length[50]');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|max_length[30]');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('MSG', ShowAlert(validation_errors(), "DD"));
            redirect(base_url() . "Users/login", 'refresh');
            return false;
        } else {

            $username        = clearText($this->input->post('username'));
            $password        = clearText($this->input->post('password'));

            //////////////////////START/////////////

            $curl_req = curl_init();
            // $parameters = json_encode(array("userid" => $username, "password" => $password));
            $parameters  = "userid=" . $username . "&password=" . $password;
            curl_setopt_array($curl_req, array(
                CURLOPT_URL => 'http://203.153.41.213:8071/php/BIS_2.0/dgdashboard/Auth/login',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_SSL_VERIFYPEER => false,
                CURLOPT_POSTFIELDS => $parameters,
                CURLOPT_HTTPHEADER => array(
                    'Content-Type: application/x-www-form-urlencoded',
                    'Accept: application/json'
                ),
            ));
            $response = curl_exec($curl_req);
            curl_close($curl_req);
            $output = json_decode($response, true);

            $userData = array();
            //if(!empty($output)){ }
            if ($output['status_code'] == 1) {
                $userData = $output['data'];
                //echo json_encode($userData);echo "<br>";
                $user_id = $userData['UserID'];
                $exist_user = $this->Users_model->toCheckUserExist($user_id);
                if (!$exist_user) {
                    $comm_id = "";
                    $comm_name = "";
                    if (!empty($userData['assignedCommitte'])) {
                        $comm_id = $userData['assignedCommitte']['comm_id'];
                        $comm_name = $userData['assignedCommitte']['comm_name'];
                    }
                    // echo  $user_id."<br>";
                    $data = array(
                        'user_id' => $userData['UserID'],
                        'emp_no' =>  $userData['EmployeeNumber'],
                        'status_id' =>  $userData['StatusID'],
                        'status_title' =>  $userData['StatusTitle'],

                        'user_title' =>  $userData['UserTitle'],
                        'user_name' =>  $userData['UserName'],
                        'user_doc_no' =>  $userData['UserDocumentNo'],

                        'date_of_birth' =>  $userData['DateOfBirth'],
                        'date_of_joining' =>  $userData['DateOfJoining'],
                        'user_mobile' =>  $userData['UserMobile'],
                        'email' =>  $userData['Email'],
                        'role' =>  $userData['role'],

                        'emp_desi_id' =>  $userData['EmployeeDesignationID'],
                        'emp_desi' =>  $userData['EmployeeDesignation'],


                        'created_on' =>  $userData['created_on'],
                        'user_type' =>  $userData['user_type'],
                        'member_id' =>  $userData['MemberID'],

                        'standard_club_id' =>  $userData['StandardClubID'],
                        'standard_club_name' =>  $userData['StandardClubName'],
                        'standard_club_branch_id' =>  $userData['StandardClubBranchID'],
                        'standard_club_dept_id' =>  $userData['StandardClubDeptID'],
                        'standard_club_region' =>  $userData['StandardClubRegion'],
                        'standard_club_category' =>  $userData['StandardClubCategory'],

                        'comm_id' =>  $comm_id,
                        'comm_name' =>  $comm_name,


                    );
                    // echo json_encode($data); exit();
                    $userId = $this->Users_model->insertData($data);
                }
                $user_details = $this->Users_model->getUsersDetailsByUserId($user_id);
                $admin_id        = encryptids("E", $user_details['user_id']);
                $admin_email        = encryptids("E", $user_details['email']);
                $admin_name      = encryptids("E", $user_details['user_name']);
                $admin_type        = encryptids("E", $user_details['user_type']);
                $admin_post        = encryptids("E", $user_details['emp_desi']);
                $club_id       = encryptids("E", $user_details['standard_club_id']);
                $branch_id       = encryptids("E", $user_details['standard_club_branch_id']);
                $dept_id       = encryptids("E", $user_details['standard_club_dept_id']);
                $region_id       = encryptids("E", $user_details['standard_club_region']);
               
                $standard_club_category       = encryptids("E", $user_details['standard_club_category']);
                $is_admin       = encryptids("E", 0);
               
                $sess_arr         = array(
                    "admin_id" => $admin_id,
                    "admin_email" => $admin_email,
                    "admin_type" => $admin_type,
                    "admin_post" => $admin_post,
                    "admin_name" => $admin_name,
                    "is_admin" => $is_admin,
                    "club_id" => $club_id,
                    "branch_id" => $branch_id,
                    "region_id" => $region_id,
                    "dept_id" => $dept_id,
                    "standard_club_category"=>$standard_club_category ,  
                    "quiz_lang_id" => 0
                );


                $this->session->set_userdata($sess_arr);

                redirect(base_url() . "Users/welcome", 'refresh');
                return true;
            } else {
                $user = $this->Admin_model->getLoginUsers($username, $password);
                if (empty($user)) {
                    $this->session->set_flashdata('MSG', ShowAlert("Invalid username or password.", "DD"));
                    redirect(base_url() . "Users/login", 'refresh');
                    return true;
                }
                // if(!password_verify($u_pass, $user_res[0]->user_password))
                // {
                // 	$this->session->set_flashdata('MSG', ShowAlert("Invalid username or password.","DD"));
                // 	if($param == "inslogin")
                // 		redirect(base_url()."Administrator/iLogin", 'refresh');
                // 	else
                // 		redirect(base_url()."Administrator", 'refresh');
                // 	return true;
                // }
                else {
                    $admin_id        = encryptids("E", $user['id']);
                    $admin_email        = encryptids("E", $user['email_id']);
                    $admin_name      = encryptids("E", $user['name']);
                    $admin_type        = encryptids("E", $user['admin_type']);
                    $admin_post        = encryptids("E", $user['post']);
                    $club_id       = encryptids("E", 0);
                    $branch_id       = encryptids("E", 0);
                    $dept_id       = encryptids("E", 0);
                    $region_id       = encryptids("E", 0);
                    $is_admin       = encryptids("E", 1);

                    $sess_arr         = array(
                        "admin_id" => $admin_id,
                        "admin_email" => $admin_email,
                        "admin_type" => $admin_type,
                        "admin_post" => $admin_post,
                        "admin_name" => $admin_name,
                        "is_admin" => $is_admin,
                        "club_id" => $club_id,
                        "branch_id" => $branch_id,
                        "region_id" => $region_id,
                        "dept_id" => $dept_id,
                        "quiz_lang_id" => 0
                    );

                    if ($user['admin_type'] == 1 || $user['admin_type'] == 2 || $user['admin_type'] == 3) {

                        $this->session->set_userdata($sess_arr);

                        redirect(base_url() . "Admin/Dashboard", 'refresh');
                        return true;
                    } else {
                        $this->session->set_flashdata('MSG',  ShowAlert("Invalid username or password.", "DD"));
                        redirect(base_url() . "Users/login", 'refresh');
                        return true;
                    }
                }
            }

            ///////////////////////END/////////////


        }
    }
    public function logout()
    {
        $this->Admin_model->adminLogout();
        //$this->session->session_unset();
        $this->session->sess_destroy();
        redirect(base_url() . 'Users/login');
        exit();
    }
    public function welcome()
    {
        $this->load->view('users/headers/header');
        $this->load->view('users/welcome');
        $this->load->view('users/footers/footer');
    }
    // public function login()
    // {
    //    $this->load->view('users/headers/login_header');
    //  $this->load->view('users/login');
    //     $this->load->view('users/footers/login_footer'); 
    // }
    public function contact_us()
    {
        $data['contact'] = $this->Users_model->contact_us();
        $this->load->view('users/headers/header');
        $this->load->view('users/contact_us', $data);
        $this->load->view('users/footers/footer');
    }
    public function about_exchange_forum()
    {
        $data['about_exchange_forum'] = $this->Users_model->about_exchange_forum();
        $data['about_exchange_forum'] = $this->Users_model->about_exchange_forum();
        $this->load->view('users/headers/header');
        $this->load->view('users/about_exchange_forum', $data);
        $this->load->view('users/footers/footer');
    }
    public function hyperlinking_policy()
    {
        $data = $this->Users_model->get_legal_data('hlp');
        $this->load->view('users/headers/header');
        $this->load->view('users/hyperlinking_policy', $data);
        $this->load->view('users/footers/footer');
    }
    // public function standard()
    // {
    //     $data = array();
    //     if (isset($_SESSION['admin_type']) && !empty($_SESSION['admin_type'])) {

    //         $sess_admin_type = encryptids("D", $this->session->userdata('admin_type'));
    //         $sess_is_admin = encryptids("D", $this->session->userdata('is_admin'));
    //         if ($sess_is_admin == 1) {
    //             if ($sess_admin_type == 1 || $sess_admin_type == 2 || $sess_admin_type == 3) {
    //                 redirect(base_url() . "Admin/dashboard", 'refresh');
    //             } else {
    //                 redirect(base_url() . "Users/welcome", 'refresh');
    //             }
    //         } else  if ($sess_is_admin == 0) {
    //             //if Already login
    //             $allquize = array();
    //             if ($this->Users_model->checkAdminLogin()) {
    //                 $data['banner_data'] = $this->Admin_model->bannerAllData();
    //                 $data['images'] = $this->Admin_model->images();
    //                 $data['videos'] = $this->Admin_model->videos();
    //                 if ($sess_admin_type == 2) {
    //                     $user_region_id = encryptids("D", $this->session->userdata('region_id'));
    //                     $user_branch_id = encryptids("D", $this->session->userdata('branch_id'));
    //                     $allquize = $this->Users_model->getStdClubQuize($user_region_id,$user_branch_id);
    //                 }

    //                 $data['allquize'] = $allquize;
                
    //                 $this->load->view('users/headers/header');
    //                 $this->load->view('users/standard_club', $data);
    //                 $this->load->view('users/footers/footer');
    //             } else {
    //                 redirect(base_url() . "Users/login", 'refresh');
    //             }
    //         }
    //     } else {
    //         redirect(base_url() . "Users/login", 'refresh');
    //     }
    // }
    public function standard(){
        $this->load->model('Miscellaneous_Competition/Miscellaneous_competition');
        $data = array();
        $data['banner_data'] = $this->Admin_model->bannerAllData();
        $data['images'] = $this->Admin_model->images();
        $data['videos'] = $this->Admin_model->videos();
        $data['news'] = $this->Admin_model->news();
        $data['events'] = $this->Admin_model->events();
        $allquize = $this->Users_model->getStdClubQuizAll();
        $data['allquize'] = $allquize;
        $data['competition']=$this->Miscellaneous_competition->getPublishedComp('4');
        $this->load->view('users/headers/header');
        $this->load->view('users/standard_club',$data);
        $this->load->view('users/footers/footer');  
    }
    public function quality_index()
    {
        $data = array();

        $data['banner_data'] = $this->Admin_model->bannerwosAllData();
        $data['images'] = $this->Admin_model->images();
        $data['videos'] = $this->Admin_model->videos();
        $this->load->view('users/headers/header');
        $this->load->view('users/world_of_standards', $data);
        $this->load->view('users/footers/footer');
    }
    public function privacy_policy()
    {
        $data = $this->Users_model->get_legal_data('policy_p');
        $this->load->view('users/headers/header');
        $this->load->view('users/privacy_policy', $data);
        $this->load->view('users/footers/footer');
    }
    
    public function important_draft(){
        $this->load->model('admin/admin_model');
        $data['banner_data']=$this->admin_model->bannerAllData();
        $data['images']=$this->admin_model->images();
        $data['videos']=$this->admin_model->videos();
        $this->load->view('users/headers/header');
        $this->load->view('users/important_draft',$data);
        $this->load->view('users/footers/footer'); 
    }
    public function important_draft_list()
    {
        $curl_req1 = curl_init(); 
        curl_setopt_array($curl_req1, array(
            CURLOPT_URL => 'http://203.153.41.213:8071/php/BIS_2.0/dgdashboard/Standards_master/get_standards_documents_stage_data',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_SSL_VERIFYPEER => false, 
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Accept: application/json'
            ),
        ));
        $responseNew = curl_exec($curl_req1);
        $responseNew = json_decode($responseNew, true); 
        $newCount =count($responseNew['stage_data']);
        $arr=array();
        $getAll= $this->Users_model->ImportantDraftCount();
        $arr['getAll']=$getAll;
        $insertedCount = count($getAll); 
        if ($newCount > $insertedCount ) 
        {
            foreach($responseNew['stage_data'] as $data)
                { 
                    $this->Users_model->insertImportantDraft($data);
                }
        }

        $this->load->view('users/headers/header');
        $this->load->view('users/important_draft_list',$arr);
        $this->load->view('users/footers/footer');
    }

    public function important_draft_comments($id)
     {
        
        $this->load->view('users/headers/header'); 
        $data['getData']=$this->Users_model->getImportantDraft($id);
        $data['commnets'] = $this->Users_model->getImportantDraftComments($id);
        if ($this->form_validation->run('important_draft_comments') == FALSE) 
        {
             $this->load->view('users/important_draft_comments',$data);
        } 
        else 
        { 
            $formdata = array(); 
            $formdata['admin_id'] = $this->input->post('admin_id');
            $formdata['description'] = $this->input->post('description');
            $formdata['doc_no'] = $id;  
            $formdata['created_on'] = date('Y-m-d h:i:s'); 
            $insert_id = $this->Users_model->insertImportantDraftComments($formdata);
            if ($insert_id)
            {
                $this->session->set_flashdata('MSG', ShowAlert("Comment Added Admin it will be Publish", "SS"));
                redirect(base_url() . "users/important_draft_comments/".$id, 'refresh');
            }
            else
            {
                $this->session->set_flashdata('MSG', ShowAlert("Comment Not Added,Please try again","DD"));
                redirect(base_url() . "users/important_draft_comments", 'refresh');
            }
        }
        $this->load->view('users/footers/footer');
    }
    public function discussion_list(){
        $this->load->view('users/headers/header');
        $this->load->view('users/discussion_list');
        $this->load->view('users/footers/footer'); 
    }
    public function important_draft_view($id)
    {
        $data['getData']=$this->Users_model->getImportantDraft($id);
        $this->load->view('users/headers/header');
        $this->load->view('users/important_draft_view',$data);
        $this->load->view('users/footers/footer');
    }
    public function standard_publish_List()
    {
        $curl_req1 = curl_init(); 
        curl_setopt_array($curl_req1, array(
            CURLOPT_URL => 'http://203.153.41.213:8071/php/BIS_2.0/dgdashboard/Standards_master/get_new_standards_data',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_SSL_VERIFYPEER => false, 
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Accept: application/json'
            ),
        ));
        $responseNew = curl_exec($curl_req1);
        $responseNew = json_decode($responseNew, true); 
        $newCount =count($responseNew['new_stndrds_data']);
        $arr=array();
        $getAll= $this->Users_model->NewStandardsPublishedCount();
        $arr['getAll']=$getAll;
        $insertedCount = count($getAll); 
        if ($newCount > $insertedCount ) 
        {
            foreach($responseNew['new_stndrds_data'] as $data)
                { 
                    $this->Users_model->insertNewStandardsPublished($data);
                }
        }
        $this->load->view('users/headers/header');
        $this->load->view('users/standard_publish_List',$arr);
        $this->load->view('users/footers/footer');
    }
    public function standard_publish_view($id)
    {
        $data['getData']=$this->Users_model->getNewStandardsPublished($id);

        $this->load->view('users/headers/header');
        $this->load->view('users/standard_publish_view',$data);
        $this->load->view('users/footers/footer');
    }

    public function standard_publish_comments($id)
     {
        
        $this->load->view('users/headers/header'); 
        $data['getData']=$this->Users_model->getNewStandardsPublished($id); 
        $data['commnets'] = $this->Users_model->getStandardPublishComments($id);
        if ($this->form_validation->run('standard_publish_comments') == FALSE) 
        {
             $this->load->view('users/standard_publish_comments',$data);
        } 
        else 
        { 
            $formdata = array(); 
            $formdata['admin_id'] = $this->input->post('admin_id');
            $formdata['description'] = $this->input->post('description');
            $formdata['pk_is_id'] = $id;  
            $formdata['created_on'] = date('Y-m-d h:i:s'); 
            $insert_id = $this->Users_model->insertStandardPublishComments($formdata);
            if ($insert_id)
            {
                $this->session->set_flashdata('MSG', ShowAlert("Comment Added Admin it will be Publish", "SS"));
                redirect(base_url() . "users/standard_publish_comments/".$id, 'refresh');
            }
            else
            {
                $this->session->set_flashdata('MSG', ShowAlert("Comment Not Added,Please try again","DD"));
                redirect(base_url() . "users/standard_publish_comments", 'refresh');
            }
        }
        $this->load->view('users/footers/footer');
    }
    public function standard_under_list()
    {

        //  $curl_req1 = curl_init(); 
        // curl_setopt_array($curl_req1, array(
        //     CURLOPT_URL => 'http://203.153.41.213:8071/php/BIS_2.0/dgdashboard/Standards_master/get_stndrds_due_for_review_data',
        //     CURLOPT_RETURNTRANSFER => true,
        //     CURLOPT_ENCODING => '',
        //     CURLOPT_MAXREDIRS => 10,
        //     CURLOPT_TIMEOUT => 0,
        //     CURLOPT_FOLLOWLOCATION => true,
        //     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        //     CURLOPT_CUSTOMREQUEST => 'POST',
        //     CURLOPT_SSL_VERIFYPEER => false, 
        //     CURLOPT_HTTPHEADER => array(
        //         'Content-Type: application/json',
        //         'Accept: application/json'
        //     ),
        // ));
        // $responseNew = curl_exec($curl_req1);
        // $responseNew = json_decode($responseNew, true); 
        // $newCount =count($responseNew['due_for_review_data']);
        $arr=array();
        $getAll= $this->Users_model->StandardUnderReviewCount();
        $arr['getAll']=$getAll;
        // $insertedCount = count($getAll); 
        // if ($newCount > $insertedCount ) 
        // {
        //     foreach($responseNew['due_for_review_data'] as $data)
        //         { 
        //             $this->Users_model->insertStandardUnderReview($data);
        //         }
        // }
        $this->load->view('users/headers/header');
        $this->load->view('users/standard_under_list',$arr);
        $this->load->view('users/footers/footer'); 
    }
    public function discussion_forum_list()
    { 
        $data['getData']=$this->Users_model->DiscussionForumList();

        $this->load->view('users/headers/header');
        $this->load->view('users/discussion_forum_list',$data);
        $this->load->view('users/footers/footer');
    }
    

    public function discussion_forum_view($id)
     {
        
        $this->load->view('users/headers/header'); 
        $data['getData']=$this->Users_model->DiscussionForumView($id); 
        $data['commnets'] = $this->Users_model->DiscussionForumComments($id);
        if ($this->form_validation->run('discussion_forum_view') == FALSE) 
        {
             $this->load->view('users/discussion_forum_view',$data);
        } 
        else 
        { 
            $formdata = array(); 
            $formdata['admin_id'] = $this->input->post('admin_id');
            $formdata['description'] = $this->input->post('description');
            $formdata['forum_id'] = $id;  
            $formdata['created_on'] = date('Y-m-d h:i:s'); 
            $insert_id = $this->Users_model->insertDiscussionForumComments($formdata);
            if ($insert_id)
            {
                $this->session->set_flashdata('MSG', ShowAlert("Comment Added Admin it will be Publish", "SS"));
                redirect(base_url() . "users/discussion_forum_view/".$id, 'refresh');
            }
            else
            {
                $this->session->set_flashdata('MSG', ShowAlert("Comment Not Added,Please try again","DD"));
                redirect(base_url() ."users/discussion_forum_view/".$id, 'refresh');
            }
        }
        $this->load->view('users/footers/footer');
    }

    public function standard_under_view($id)
    {
        $data['getData']=$this->Users_model->getStandardUnderReview($id);

        $this->load->view('users/headers/header');
        $this->load->view('users/standard_under_view',$data);
        $this->load->view('users/footers/footer');
    }
    public function standard_revised_list()
    {
        $curl_req1 = curl_init(); 
        curl_setopt_array($curl_req1, array(
            CURLOPT_URL => 'http://203.153.41.213:8071/php/BIS_2.0/dgdashboard/Standards_master/get_revised_standards_data',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_SSL_VERIFYPEER => false, 
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Accept: application/json'
            ),
        ));
        $responseNew = curl_exec($curl_req1);
        $responseNew = json_decode($responseNew, true); 
        $newCount =count($responseNew['revised_stndrds_data']);
        $arr=array();
        $getAll= $this->Users_model->StandardsRevisedCount();
        $arr['getAll']=$getAll;
        $insertedCount = count($getAll); 
        if ($newCount > $insertedCount ) 
        {
            foreach($responseNew['revised_stndrds_data'] as $data)
                {  
                    $this->Users_model->insertStandardsRevised($data);
                }
        }
        $this->load->view('users/headers/header');
        $this->load->view('users/standard_revised_list',$arr);
        $this->load->view('users/footers/footer');
    }
    public function standard_revised_view($id)
    {
        $data['getData']=$this->Users_model->getStandardsRevised($id);
        $this->load->view('users/headers/header');
        $this->load->view('users/standard_revised_view',$data);
        $this->load->view('users/footers/footer');
    }

    public function standard_revised_comments($id)
     {
        
        $this->load->view('users/headers/header'); 
        $data['getData']=$this->Users_model->getStandardsRevised($id);
        // print_r($data);
        $data['commnets'] = $this->Users_model->getStandardRevisedComments($id);
        if ($this->form_validation->run('standard_revised_comments') == FALSE) 
        {
             $this->load->view('users/standard_revised_comments',$data);
        } 
        else 
        { 
            $formdata = array(); 
            $formdata['admin_id'] = $this->input->post('admin_id');
            $formdata['description'] = $this->input->post('description');
            $formdata['pk_is_id'] = $id;  
            $formdata['created_on'] = date('Y-m-d h:i:s'); 
            $insert_id = $this->Users_model->insertStandardRevisedComments($formdata);
            if ($insert_id)
            {
                $this->session->set_flashdata('MSG', ShowAlert("Comment Added Admin it will be Publish", "SS"));
                redirect(base_url() . "users/standard_revised_comments/".$id, 'refresh');
            }
            else
            {
                $this->session->set_flashdata('MSG', ShowAlert("Comment Not Added,Please try again","DD"));
                redirect(base_url() . "users/standard_revised_comments", 'refresh');
            }
        }
        $this->load->view('users/footers/footer');
    }
    public function new_work_list()
    { 
        $curl_req1 = curl_init(); 
        curl_setopt_array($curl_req1, array(
            CURLOPT_URL => 'http://203.153.41.213:8071/php/BIS_2.0/dgdashboard/Standards_master/get_nwip_report_data',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_SSL_VERIFYPEER => false, 
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Accept: application/json'
            ),
        ));
        $responseNew = curl_exec($curl_req1);
        $responseNew = json_decode($responseNew, true); 
        $newCount =count($responseNew['nwip_data']);
        $arr=array();
        $getAll= $this->Users_model->ItemProposalCount();
        $arr['getAll']=$getAll;
        $insertedCount = count($getAll); 
        if ($newCount > $insertedCount ) 
        {
            foreach($responseNew['nwip_data'] as $data)
                { 
                    $this->Users_model->insertItemProposal($data);
                }
        }
        $this->load->view('users/headers/header');
        $this->load->view('users/new_work_list',$arr);
        $this->load->view('users/footers/footer'); 
    }
    public function new_work_view($id)
    {
        $itemProposal['getData'] = $this->Users_model->getItemProposal($id);
        $this->load->view('users/headers/header');
        $this->load->view('users/new_work_view',$itemProposal);
        $this->load->view('users/footers/footer');
    }
    public function new_work_view_comments($id)
    {
        $this->load->view('users/headers/header');
        $data['getData'] = $this->Users_model->getItemProposal($id);
        $data['commnets'] = $this->Users_model->getItemProposalComments($id);
        if ($this->form_validation->run('new_work_view_comments') == FALSE) 
        {
            $this->load->view('users/new_work_view_comments',$data);
        } 
        else 
        { 
            $formdata = array(); 
            $formdata['admin_id'] = $this->input->post('admin_id');
            $formdata['description'] = $this->input->post('description');
            $formdata['new_work_id'] = $id;  
            $formdata['created_on'] = date('Y-m-d h:i:s'); 
            $insert_id = $this->Users_model->insertNewWorkCommnents($formdata);
            if ($insert_id)
            {
                $this->session->set_flashdata('MSG', ShowAlert("Comment Added Admin it will be Publish", "SS"));
                redirect(base_url() . "users/new_work_view_comments/".$id, 'refresh');
            }
            else
            {
                $this->session->set_flashdata('MSG', ShowAlert("Comment Not Added,Please try again", "DD"));
                redirect(base_url() . "users/new_work_view_comments", 'refresh');
            }
        }
        $this->load->view('users/footers/footer');
    }
    public function share_your_thoughts()
    {
        $this->load->view('users/headers/header');
        $this->load->view('users/share_your_thoughts');
        $this->load->view('users/footers/footer');
    }
    public function wall_of_wisdom_view($id)
    {
        // $this->load->model('Admin/Wall_of_wisdom_model wow');
        $data['wow'] = $this->wow->get_wow($id);
        // print_r($data['wow']); die;
        $data['news'] = $this->Admin_model->news();
        $data['events'] = $this->Admin_model->events();
        $this->load->view('users/headers/header');
        $this->load->view('wall_of_wisdom/wall_of_wisdom_description', $data);
        $this->load->view('users/footers/footer');
    }
    public function all_wall_of_wisdom()
    {
        $data['wow'] = $this->wow->get_allwow();
        $this->load->view('users/headers/header');
        $this->load->view('wall_of_wisdom/wall_of_wisdom_view_1', $data);
        $this->load->view('users/footers/footer');
    }
    public function all_by_the_mentors()
    {
        $this->load->model('Admin/by_the_mentor_model');
        $data['by_the_mentor'] = $this->by_the_mentor_model->getPublishedbtm();
        $this->load->view('users/headers/header');
        $this->load->view('users/all_by_the_mentors', $data);
        $this->load->view('users/footers/footer');
    }
    public function get_legal_data()
    {

        $data = $this->Users_model->get_legal_data('cap');
        print_r($data);
    }

    public function cap()
    {
        $data = $this->Users_model->get_legal_data('cap');
        $this->load->view('users/headers/header');
        $this->load->view('users/content_archival_policy', $data);
        $this->load->view('users/footers/footer');
    }
    public function cmap()
    {
        $data = $this->Users_model->get_legal_data('cmap');
        $this->load->view('users/headers/header');
        $this->load->view('users/cmap', $data);
        $this->load->view('users/footers/footer');
    }
    public function copyright()
    {
        $data = $this->Users_model->get_legal_data('copyright_policy');
        $this->load->view('users/headers/header');
        $this->load->view('users/copyright', $data);
        $this->load->view('users/footers/footer');
    }
    public function content_review_policy()
    {
        $data = $this->Users_model->get_legal_data('crp');
        $this->load->view('users/headers/header');
        $this->load->view('users/content_review_policy', $data);
        $this->load->view('users/footers/footer');
    }
    public function disclaimer()
    {
        $data = $this->Users_model->get_legal_data('disclamer');
        $this->load->view('users/headers/header');
        $this->load->view('users/disclaimer', $data);
        $this->load->view('users/footers/footer');
    }
    public function quiz()
    {

        $getUserAllQuize = $this->Users_model->getUserAllQuize();
        $data = array();
        $data['getUserAllQuize'] = $getUserAllQuize;
        $this->load->view('users/headers/header');
        $this->load->view('users/quiz', $data);
        $this->load->view('users/footers/footer');
    }
    public function sitemap()
    {
        $this->load->view('users/headers/header');
        $this->load->view('users/sitemap');
        $this->load->view('users/footers/footer');
    }
    public function terms_condition()
    {
        $data = $this->Users_model->get_legal_data('tc');
        $this->load->view('users/headers/header');
        $this->load->view('users/terms_condition', $data);
        $this->load->view('users/footers/footer');
    }
    public function user_management()
    {
        $this->load->view('users/headers/header');
        $this->load->view('users/user_management');
        $this->load->view('users/footers/footer');
    }
     public function winners()
    {
        $masterWinners= $this->Winnerwall_model->getWinnerWallList();
        $masterArr = array();   
        foreach($masterWinners as $row)
        {
            $quiz_id= $row['quiz_id'];
            $WinnersArr= $this->Winnerwall_model->getWinners($quiz_id);
            $row['Winners'] = $WinnersArr;
            array_push($masterArr, $row);
        } 
        $data['masterWinners']=$masterArr; 
        $this->load->view('users/headers/header');
        $this->load->view('users/winners', $data);
        $this->load->view('users/footers/footer');
    }
    public function yourwall()
    {
        if(isset($_SESSION['admin_id'])){
        $this->load->model('admin/your_wall_model');
        $user_id = encryptids("D", $_SESSION['admin_id']);
        $data['published_wall'] = $this->your_wall_model->getSelfPublishedWall($user_id);
        // $data['published_wall'] = $this->your_wall_model->getPublishedWall();
        $this->load->view('users/headers/header');
        $this->load->view('users/yourwall_new', $data);
        $this->load->view('users/footers/footer');
        }else{
            redirect(base_url() . "users/login", 'refresh');
        }
    }
    public function yourwallview($id)
    {
        $data['news'] = $this->Admin_model->news();
        $data['events'] = $this->Admin_model->events();
        $this->load->model('admin/your_wall_model');
        $data['published_wall'] = $this->your_wall_model->get_yourwallData($id);
        $this->load->view('users/headers/header');
        $this->load->view('users/yourwallview', $data);
        $this->load->view('users/footers/footer');
    }
    // public function add_your_wall(){
    //     $formdata1['user_id']= encryptids("D", $_SESSION['admin_id']);
    //     $formdata1['email']= encryptids("D", $_SESSION['admin_email']);
    //     $formdata1['user_name']=  encryptids("D", $_SESSION['admin_name']);
    //     // $formdata1['admin']=  encryptids("D", $_SESSION['admin']);
    //     $formdata1['user_type']=  encryptids("D", $_SESSION['admin_type']);
    //     // $formdata1['user_post']= encryptids("D", $_SESSION['admin_post']);
    //     // print_r($formdata); 
    //     // die;
    //     if(isset($_SESSION['admin_id'])){
    //         // $formdata['user_id']=$_SESSION['admin_id'];
    //         $formdata['user_id']= encryptids("D", $_SESSION['admin_id']);
    //     }else{
    //         // die;
    //         $this->session->set_flashdata('MSG', ShowAlert("Please Login", "SS"));
    //         redirect(base_url() . "users/yourwall", 'refresh');
    //     }
    //     // $admin_id = encryptids("D", $this->session->userdata('admin_id'));
    //     // $formdata['user_id'] = $admin_id;
    //     // if(!$admin_id){
    //     //     redirect(base_url() . "users/login", 'refresh');
    //     // }
    //     $banner_img = "yourwall" . time() . '.jpg';
    //     $config['upload_path'] = './uploads/your_wall/';
    //     $config['allowed_types'] = 'gif|jpg|png|jpeg';
    //     $config['max_size']    = '10000';
    //     $config['max_width']  = '3024';
    //     $config['max_height']  = '2024';

    //     $config['file_name'] = $banner_img;

    //     $this->load->library('upload', $config);
    //     if (!$this->upload->do_upload('image')) 
    //     {
    //         $data['status'] = 0;
    //         $data['message'] = $this->upload->display_errors();
    //     }


    //     $formdata['title'] = $this->input->post('title');
    //     $formdata['description'] = $this->input->post('description');
    //     $formdata['status'] = '1';
    //     $formdata['image'] = $banner_img;   

    //     $this->load->model('admin/by_the_mentor_model');
    //     $uid=$this->by_the_mentor_model->add_user($formdata1);


    //     //print_r($formdata); die;    
    //     $this->load->model('admin/your_wall_model');
    //     $id=$this->your_wall_model->addYourWall($formdata);
    //     if($id){
    //         $this->session->set_flashdata('MSG', ShowAlert("Response Submitted Successfully", "SS"));
    //         redirect(base_url() . "users/yourwall", 'refresh');
    //     }else{

    //     }

    // }
    public function delete_yourwall($id){
        $this->load->model('Admin/Your_wall_model');
        $id = $this->Your_wall_model->deletYourwall($id);
        if ($id) {
            return true;
        }else{
            return false;
        }
    }
    public function add_your_wall()
    {
        if (!file_exists('uploads/your_wall')) { mkdir('uploads/your_wall', 0777, true); }
        // print_r($_FILES); die;
        if (isset($_SESSION['admin_id'])) {
            // $formdata['user_id']=$_SESSION['admin_id'];
            $formdata['user_id'] = encryptids("D", $_SESSION['admin_id']);
        } else {
            // die;
            $this->session->set_flashdata('MSG', ShowAlert("Please Login", "SS"));
            // redirect(base_url() . "users/byTheMentor", 'refresh');
            redirect(base_url() . "users/login", 'refresh');
            exit;
        }

        if (!($_FILES['image2']['name'] == "")) {

            $path = 'uploads/your_wall/';
            $other_image1 = $path . time() . 'ypurwall_image' . $_FILES['image2']['name'];
            move_uploaded_file($_FILES['image2']['tmp_name'], $other_image1);
        } else {
            $other_image1 = "";
        }



        if (!($_FILES['image3']['name'] == "")) {
            $path = 'uploads/your_wall/';
            $other_image2 = $path . time() . 'ypurwall_image' . $_FILES['image3']['name'];
            move_uploaded_file($_FILES['image3']['tmp_name'], $other_image2);
        } else {
            $other_image2 = "";
        }

        if (!($_FILES['image4']['name'] == "")) {
            $path = 'uploads/your_wall/';
            $other_image3 = $path . time() . 'ypurwall_image' . $_FILES['image4']['name'];
            move_uploaded_file($_FILES['image4']['tmp_name'], $other_image3);
        } else {
            $other_image3 = "";
        }

        if (!($_FILES['image5']['name'] == "")) {
            $path = 'uploads/your_wall/';
            $other_image4 = $path . time() . 'ypurwall_image' . $_FILES['image5']['name'];
            move_uploaded_file($_FILES['image5']['tmp_name'], $other_image4);
        } else {
            $other_image4 = "";
        }




        $formdata['other_image1'] = $other_image1;
        $formdata['other_image2'] = $other_image2;
        $formdata['other_image3'] = $other_image3;
        $formdata['other_image4'] = $other_image4;

        // echo $other_image1.'<br>';
        // echo $other_image2.'<br>';
        // echo $other_image3.'<br>';
        // echo $other_image4.'<br>';
        // print_r($formdata); die;
        if (!($_FILES['document']['name']) == "") {
            //  echo "document";


            $btm_path = "uploads/your_wall/";
            $btm_document = $btm_path . "yourwall_document" . time() . '.pdf';
            // $target_dir = "uploads/your_wall/";
            move_uploaded_file($_FILES["document"]["tmp_name"], $btm_document);
            // die;
        } else {
            $btm_document = "";
        }


        $formdata1['user_id'] = encryptids("D", $_SESSION['admin_id']);
        $formdata1['email'] = encryptids("D", $_SESSION['admin_email']);
        $formdata1['user_name'] =  encryptids("D", $_SESSION['admin_name']);
        // $formdata1['admin']=  encryptids("D", $_SESSION['admin']);
        $formdata1['user_type'] =  encryptids("D", $_SESSION['admin_type']);
        // $formdata1['user_post']= encryptids("D", $_SESSION['admin_post']);
        // print_r($formdata); 
        // die;
        if (isset($_SESSION['admin_id'])) {
            // $formdata['user_id']=$_SESSION['admin_id'];
            // $formdata['user_id'] = encryptids("D", $_SESSION['admin_id']);
            $formdata['user_id'] =$formdata1['user_id'];
        } else {
            // die;
            $this->session->set_flashdata('MSG', ShowAlert("Please Login", "SS"));
            redirect(base_url() . "users/yourwall", 'refresh');
        }
        // $admin_id = encryptids("D", $this->session->userdata('admin_id'));
        // $formdata['user_id'] = $admin_id;
        // if(!$admin_id){
        //     redirect(base_url() . "users/login", 'refresh');
        // }
        $banner_img = "yourwall" . time() . '.jpg';
        $config['upload_path'] = './uploads/your_wall/';
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


        $formdata['title'] = $this->input->post('title');
        $formdata['description'] = $this->input->post('description');
        $formdata['status'] = '1';
        $formdata['image'] = $banner_img;
        $formdata['document'] = $btm_document;

        $this->load->model('admin/by_the_mentor_model');
        $uid = $this->by_the_mentor_model->add_user($formdata1);


        // print_r($formdata); die;    
        $this->load->model('admin/your_wall_model');
        $id = $this->your_wall_model->addYourWall($formdata);
        if ($id) {
            $this->session->set_flashdata('MSG', ShowAlert("Response Submitted Successfully", "SS"));
            redirect(base_url() . "users/yourwall", 'refresh');
        } else {
        }
    }
    public function byTheMentor(){
      //  print_r($_SESSION); die;
        // $formdata1['email']= encryptids("D", $_SESSION['admin_email']);
        // $formdata1['name']= encryptids("D", $_SESSION['admin_name']);
        // $formdata1['admin']= encryptids("D", $_SESSION['admin']);
        // $formdata1['admin_id']= encryptids("D", $_SESSION['admin_id']);
        // $formdata1['admin_type']= encryptids("D", $_SESSION['admin_type']);
        //  print_r($formdata1); die;
        $this->load->model('Admin/by_the_mentor_model');
        $data['by_the_mentor'] = $this->by_the_mentor_model->getThreeBTM();
        $this->load->view('users/headers/header');
        $this->load->view('users/users_by_the_mentor', $data);
        $this->load->view('users/footers/footer');
    }

    public function add_btm(){
    //    print_r($_SESSION); die;
    //     $formdata1= encryptids("D", $_SESSION['admin']);
    //     print_r($formdata1); die;
        $path = 'uploads/by_the_mentors/img/'; 
            // $image = $path . time() .'video'. $_FILES['image']['name']; 
            // move_uploaded_file($_FILES['image']['tmp_name'], $videolocation);

        // // $thumbnailpath = 'uploads/by_the_mentors/img/'; 
        // $other_image1 = $path . time() .'video_thumbnail'. $_FILES['image2']['name']; 
        // move_uploaded_file($_FILES['image2']['tmp_name'], $thumbnaillocation);

        // $formdata['image'] =$image; 
        // $formdata['other_image1'] = $other_image1;



        // print_r($formdata); die;
        // $other_img1=$this->Users_model->upload('image2');
        // $other_img2=$this->Users_model->upload('image3');
        // $other_img3=$this->Users_model->upload('image4');
        // $other_img4=$this->Users_model->upload('image5');
        // $other_img5=$this->Users_model->upload('image');
        // // print_r($other_img3); die;
        // echo $other_img1.$other_img2.$other_img3.$other_img4.$other_img5; die;
        // if(!($_FILES['document']['name'])){
        //     echo "not set";
        // }
        // die;

        // $formdata1['user_post']= encryptids("D", $_SESSION['admin_post']);
        // print_r($formdata); 
        // die;
        if (isset($_SESSION['admin_id'])) {
            // $formdata['user_id']=$_SESSION['admin_id'];
            $type= encryptids("D", $_SESSION['admin_type']);
            if($type==3){
                $formdata['user_id']= encryptids("D", $_SESSION['admin_id']);
            }else{
                $this->session->set_flashdata('MSG', ShowAlert("Sorry! Only mentors can posts here", "SS"));
                redirect(base_url() . "users/byTheMentor", 'refresh');
                exit;
            }
            
        }else{
            // die;
            $this->session->set_flashdata('MSG', ShowAlert("Please Login", "SS"));
            // redirect(base_url() . "users/byTheMentor", 'refresh');
            redirect(base_url() . "users/login", 'refresh');
            exit;
        }

        $formdata1['user_id'] = encryptids("D", $_SESSION['admin_id']);
        $formdata1['email'] = encryptids("D", $_SESSION['admin_email']);
        $formdata1['user_name'] =  encryptids("D", $_SESSION['admin_name']);
        // $formdata1['admin']=  encryptids("D", $_SESSION['admin']);
        $formdata1['user_type'] =  encryptids("D", $_SESSION['admin_type']);



        $title = $this->input->post('title');
        $description = $this->input->post('description');

        if (!($_FILES['image']['name'] == "")) {
            // echo "image";
            // $btm_img = "btm_image" . time() . '.jpg';
            // $config['upload_path'] = './uploads/by_the_mentors/img/';
            // $config['allowed_types'] = 'gif|jpg|png|jpeg';
            // $config['max_size']    = '10000';
            // $config['max_width']  = '3024';
            // $config['max_height']  = '2024';

            // $config['file_name'] = $btm_img;

            // $this->load->library('upload', $config);
            // if (!$this->upload->do_upload('image')) 
            // {
            //     $data['status'] = 0;
            //     $data['message'] = $this->upload->display_errors();
            // }
            // $thumbnail=$this->Users_model->upload('image');
            // exit;
            $thumbnail = $path . time() . 'btm_image' . $_FILES['image']['name'];
            move_uploaded_file($_FILES['image']['tmp_name'], $thumbnail);
        } else {
            $thumbnail = "";
        }

        if (!($_FILES['image2']['name'] == "")) {
            // echo "image";
            //  $other_img1 = "other_image1" . time() . '.jpg';
            //  $config1['upload_path'] = './uploads/by_the_mentors/img/';
            //  $config1['allowed_types'] = 'gif|jpg|png|jpeg';
            //  $config1['max_size']    = '10000';
            //  $config1['max_width']  = '3024';
            //  $config1['max_height']  = '2024';

            //  $config1['file_name'] = $other_img1;

            //  $this->load->library('upload', $config1);
            //  if (!$this->upload->do_upload('image2')) 
            //  {
            //      $data['status'] = 0;
            //      $data['message'] = $this->upload->display_errors();
            //     //  die;
            //  }
            //  echo $config1['file_name'];
            // $other_img1=$this->Users_model->upload('image2');
            $other_img1 = $path . time() . 'btm_image' . $_FILES['image2']['name'];
            move_uploaded_file($_FILES['image2']['tmp_name'], $other_img1);
            // exit;
        } else {
            $other_img1 = "";
        }
        $formdata['other_image1'] = $other_img1;



        if (!($_FILES['image3']['name'] == "")) {
            // echo "image";
            //  $other_img2 = "other_image2" . time() . '.jpg';
            //  $config['upload_path'] = './uploads/by_the_mentors/img/';
            //  $config['allowed_types'] = 'gif|jpg|png|jpeg';
            //  $config['max_size']    = '10000';
            //  $config['max_width']  = '3024';
            //  $config['max_height']  = '2024';

            //  $config['file_name'] = $other_img2;

            //  $this->load->library('upload', $config);
            //  if (!$this->upload->do_upload('image3')) 
            //  {
            //      $data['status'] = 0;
            //      $data['message'] = $this->upload->display_errors();
            //  }
            // $other_img2=$this->Users_model->upload('image3');
            $other_img2 = $path . time() . 'btm_image' . $_FILES['image3']['name'];
            move_uploaded_file($_FILES['image3']['tmp_name'], $other_img2);
        } else {
            $other_img2 = "";
        }
        $formdata['other_image2'] = $other_img2;


        if (!($_FILES['image4']['name'] == "")) {
            // echo "image";
            //  $other_img3 = "other_image3" . time() . '.jpg';
            //  $config['upload_path'] = './uploads/by_the_mentors/img/';
            //  $config['allowed_types'] = 'gif|jpg|png|jpeg';
            //  $config['max_size']    = '10000';
            //  $config['max_width']  = '3024';
            //  $config['max_height']  = '2024';

            //  $config['file_name'] = $other_img3;

            //  $this->load->library('upload', $config);
            //  if (!$this->upload->do_upload('image4')) 
            //  {
            //      $data['status'] = 0;
            //      $data['message'] = $this->upload->display_errors();
            //  }
            // $other_img3=$this->Users_model->upload('image4');

            $other_img3 = $path . time() . 'btm_image' . $_FILES['image4']['name'];
            move_uploaded_file($_FILES['image4']['tmp_name'], $other_img3);
        } else {
            $other_img3 = "";
        }
        $formdata['other_image3'] = $other_img3;

        if (!($_FILES['image5']['name'] == "")) {
            // echo "image";
            // print_r($_FILES['image5']['name']); die;
            //  $other_img4 = "other_image4" . time() . '.jpg';
            //  $config['upload_path'] = './uploads/by_the_mentors/img/';
            //  $config['allowed_types'] = 'gif|jpg|png|jpeg';
            //  $config['max_size']    = '10000';
            //  $config['max_width']  = '3024';
            //  $config['max_height']  = '2024';

            //  $config['file_name'] = $other_img4;

            //  $this->load->library('upload', $config);
            //  if (!$this->upload->do_upload('image5')) 
            //  {
            //      $data['status'] = 0;
            //      $data['message'] = $this->upload->display_errors();
            //  }
            // $formdata['other_image4']=$this->Users_model->upload('image5');

            $other_img4 = $path . time() . 'btm_image' . $_FILES['image5']['name'];
            move_uploaded_file($_FILES['image5']['tmp_name'], $other_img4);
        } else {
            $other_img4 = "";
        }
        $formdata['other_image4'] = $other_img4;





        if (!($_FILES['document']['name']) == "") {
            //  echo "document";

            $btm_document = "btm_document" . time() . '.pdf';
            $btm_path = "uploads/by_the_mentors/doc/" . $btm_document;

            //         $config1['upload_path'] = './uploads';
            //         $config1['allowed_types'] = 'application/pdf';
            //         $config1['max_size']    = '100000000';
            //         $config1['max_width']  = '3024';
            //         $config1['max_height']  = '2024';

            //         $config1['file_name'] = $btm_document;
            //    // print_r($_FILES['document']); die;
            //         $this->load->library('upload', $config1);
            //         if (!$this->upload->do_upload('document')) 
            //         {
            //             $data['status'] = 0;
            //             $data['message'] = $this->upload->display_errors();
            //             $this->session->set_flashdata('MSG', ShowAlert($data['message'], "SS"));
            //             redirect(base_url() . "users/byTheMentor", 'refresh');
            //         }else{
            //             print_r($this->upload->data());
            //         }
            $target_dir = "uploads/by_the_mentots/doc";
            move_uploaded_file($_FILES["document"]["tmp_name"], $btm_path);
            // die;
        } else {
            $btm_document = "";
        }
        // print_r($formdata); die;

        $this->load->model('admin/by_the_mentor_model');
        $uid = $this->by_the_mentor_model->add_user($formdata1);

        // print_r($uid);

        $formdata['title'] = $title;
        $formdata['description'] = $description;
        $formdata['image'] = $thumbnail;
        $formdata['document'] = $btm_document;
        $formdata['status'] = "1";
        // print_r($formdata); die;
        $this->load->model('admin/by_the_mentor_model');
        $id = $this->by_the_mentor_model->add_btm($formdata);
        if ($id) {
            $this->session->set_flashdata('MSG', ShowAlert("Response Submitted Successfully", "SS"));
            redirect(base_url() . "users/byTheMentor", 'refresh');
        } else {
            $this->session->set_flashdata('MSG', ShowAlert("Failed! Response not submitted.", "SS"));
            redirect(base_url() . "users/byTheMentor", 'refresh');
        }
    }

    // public function about_quiz($id)
    // {

    //     $data = array();
    //     $quiz = $this->Users_model->viewQuiz($id);
        
    //     $data['quizdata'] = $quiz;

    //     $prizeDetails = $this->Users_model->prizeDetails($id);
        
    //     $data['prizeDetails'] = $prizeDetails;
    //     // echo json_encode($prizeDetails);exit();
    //     $this->load->view('users/headers/header');
    //     $this->load->view('users/about_quiz', $data);
    //     $this->load->view('users/footers/footer');
    // }
    public function about_competition($id)
    {
        $this->load->model('Miscellaneous_Competition/Miscellaneous_competition');
        $data['competition']=$this->Miscellaneous_competition->viewCompetition($id);
        // print_r($data); die;
        $this->load->view('users/headers/header');
        $this->load->view('users/about_competition',$data);
        $this->load->view('users/footers/footer');
    }
    public function start_competition($id)
    {
        $this->load->model('Miscellaneous_Competition/Miscellaneous_competition');
        $data['competition']=$this->Miscellaneous_competition->viewCompetition($id);
        $this->load->view('users/headers/header');
        $this->load->view('users/start_competition',$data);
        $this->load->view('users/footers/footer');
    }
    public function competition_response_record(){
        $this->load->model('Miscellaneous_Competition/Miscellaneous_competition');
      //  print_r($_SESSION);
        // die;
        $c_id=$this->input->post('comp_id');
       
        $user_id=$this->session->userdata('admin_id');     
        if($user_id=="" ||$user_id==null){
          //  $this->session->set_flashdata('MSG', ShowAlert("You have already appeared for this Competition.", "SS"));
          $this->session->set_flashdata('MSG', ShowAlert("You have not Loggedin", "SS"));
            redirect(base_url() . "users/login", 'refresh');
        }else{
            $data['user_id']=encryptids('D',$user_id);
            $data['competiton_id']=$this->input->post('comp_id');
            $response=$this->Miscellaneous_competition->ckeckCompAttempt($data);
            // print_r($response); die;
            if(!empty($response)){
                $this->session->set_flashdata('MSG', ShowAlert("You have already appeared for this Competition.", "SS"));
                redirect(base_url() . "users/start_competition/$c_id", 'refresh');
                die;
            }

        }
          
        $data['user_id']=encryptids('D',$user_id);
        $data['answer_text']=$this->input->post('answer');
        $data['competiton_id']=$this->input->post('comp_id');


        if (!file_exists('uploads/competition/response_images')) { mkdir('uploads/competition/response_images', 0777, true); }
        if (!($_FILES['image']['name'] == "")) {
            $path = 'uploads/competition/response_images/';
            $other_image1 = $path . time() . 'comp_response_img' . $_FILES['image']['name'];
            move_uploaded_file($_FILES['image']['tmp_name'], $other_image1);
        } else {
            $other_image1 = "";
        }

        $data['image']=$other_image1;

        
        $response=$this->Miscellaneous_competition->submitCompResponse($data);
        if($response){
            echo "success";
        }else{
            echo "Failed";
        }

    }
    public function all_creative_task()
    {
        $this->load->view('users/headers/header');
        $this->load->view('users/all_creative_task');
        $this->load->view('users/footers/footer');
    }
    public function all_standard_writting()
    {
        $this->load->view('users/headers/header');
        $this->load->view('users/all_standard_writting');
        $this->load->view('users/footers/footer');
    }
    // public function quiz_start($quiz_id)
    // {
    //     $UserId = $this->session->userdata('admin_id');
    //     $user_id = encryptids("D", $UserId);
    //     $data = array();
    //     $userQuiz = array();
    //     ///////////////////// check available quiz ////////////////
       
           
    //         if (isset($_SESSION['admin_type']) && !empty($_SESSION['admin_type'])) {
    
    //             $sess_admin_type = encryptids("D", $this->session->userdata('admin_type'));
    //             $sess_is_admin = encryptids("D", $this->session->userdata('is_admin'));
    //             if ($sess_is_admin == 0) {
    //                 //if Already login
                   
    //                 if ($this->Users_model->checkAdminLogin()) {
                       
    //                     if ($sess_admin_type == 2) {                    
                             
    //                         $userQuiz = $this->Users_model->isQuizForThisUser($user_id,$quiz_id);
    //                         if(!empty($userQuiz)){
    //                             $checkUserAvailable = $this->Users_model->checkUserAvailable($quiz_id, $user_id);
    //                             if ($checkUserAvailable > 0) {
    //                                 $this->session->set_flashdata('MSG', ShowAlert("You have already appeared for this Quiz.", "SS"));
    //                                 redirect(base_url() . "users/about_quiz/$quiz_id", 'refresh');
    //                             } else {
                                   
    //                                 $que_details = $this->Users_model->viewQuestion($quiz_id);
    //                                 $data['que_details'] = $que_details;
    //                                 $quiz = $this->Users_model->viewQuiz($quiz_id);
    //                                 $data['quizdata'] = $quiz;
    //                                 $data['user_id'] = $user_id;
    //                                 $this->load->view('users/quiz_start', $data);
    //                             }

    //                         }else{
    //                             $this->session->set_flashdata('MSG', ShowAlert("You can not appear for this quiz as you are not authenticated.", "SS"));
    //                             redirect(base_url() . "users/about_quiz/$quiz_id", 'refresh');

    //                         }
    //                     }   else{
    //                         $this->session->set_flashdata('MSG', ShowAlert("You can not appear for this quiz as you are not authenticated.", "SS"));
    //                         redirect(base_url() . "users/about_quiz/$quiz_id", 'refresh');

    //                     }                  
                        
    //                 } else {
    //                     redirect(base_url() . "Users/login", 'refresh');
    //                 }
    //             }else{
    //                 $this->session->set_flashdata('MSG', ShowAlert("You can not appear for quiz as you are not authenticated.", "SS"));
    //                 redirect(base_url() . "users/about_quiz/$quiz_id", 'refresh');
    //             }
    //     }else{
    //         $this->session->set_flashdata('MSG', ShowAlert("Please Login.", "SS"));
    //         redirect(base_url() . "users/about_quiz/$quiz_id", 'refresh');
    //     }




    //     ///////////////////////////////////
      
       
    // }
    // public function quiz_submit()
    // {

    //     $que_id = $this->input->post("que_id");
    //     $corr_opts = $this->input->post("corr_opt");
    //     $selected_lang = $_SESSION["quiz_lang_id"];
    //     //$mark_for_review = $this->input->post("mark_for_review");

    //    // echo json_encode($mark_for_review);exit();
        
    //     $user_id = $this->input->post("user_id");
    //   // echo  $user_id ;
    //     $quiz_id = $this->input->post("quiz_id");
    //     $start_time = $this->input->post("start_time");
    //     $review = $this->input->post("review");
    //     $end_time = $this->input->post("end_time");
    //     $number = count($que_id);
    //     if ($number > 0) {
    //         $successCount = 0;
    //         $j = 1;
    //         for ($i = 0; $i < $number; $i++) {
    //             if (trim($que_id[$i] != '')) {
    //                 $ques_id =  $que_id[$i];
    //                 $corr_opt =  $corr_opts[$i];
    //                 $setForReview = in_array($ques_id, $review);

    //                 if ($_POST['option' . $ques_id . $j] != "") {
    //                     $selected_op = $_POST['option' . $ques_id . $j];
    //                 } else {
    //                     $selected_op = 0;
    //                 }

    //                 $formdata = array();
    //                 $formdata['user_id'] = $user_id;
    //                 $formdata['quiz_id'] = $quiz_id;
    //                 $formdata['ques_id'] = $ques_id;
    //                 $formdata['selected_op'] = $selected_op;
    //                 $formdata['corr_opt'] = $corr_opt;
    //                 $formdata['mark_review'] = $setForReview;
    //                // print_r($formdata);exit();
    //                 $this->Users_model->insertQuestion($formdata);
    //                 $successCount++;
    //                 if ($successCount == $number) {
    //                     $wrong_ques = $this->Users_model->getWrongAns($quiz_id, $user_id);
    //                     $correct_ques = $this->Users_model->getCorrectAns($quiz_id, $user_id);
    //                     $not_ans_ques = $this->Users_model->getNotSelected($quiz_id, $user_id);
    //                     $quiz = $this->Users_model->getTotalmarkAndQuestion($quiz_id);

    //                     $formdata2 = array();
    //                     $formdata2['user_id'] = $user_id;
    //                     $formdata2['quiz_id'] = $quiz_id;
    //                     $total_question = $quiz['total_question'];
    //                     $total_mark = $quiz['total_mark'];

    //                     $formdata2['total_question'] = $total_question;
    //                     $formdata2['total_mark'] = $total_mark;
    //                     $formdata2['start_time'] = $start_time;
    //                     $formdata2['end_time'] = date('h:i:s');
    //                     $formdata2['correct_ques'] = $correct_ques;
    //                     $formdata2['wrong_ques'] = $wrong_ques;
    //                     $formdata2['not_ans_ques'] = $not_ans_ques;
    //                     $formdata2['selected_lang'] = $selected_lang;

    //                     $ans = $total_mark / $total_question;
                        
    //                     $score = $ans * $correct_ques;
                        
    //                     $formdata2['score'] = $score;                    
                        
    //                     if ($this->Users_model->insertQuziSubmission($formdata2)) {
    //                         $this->session->set_flashdata('MSG', ShowAlert("Submission Successfully", "SS"));
    //                        redirect(base_url() . "users/quiz_submission", 'refresh');
    //                     } else {
    //                         $this->session->set_flashdata('MSG', ShowAlert("Quiz not submitted please contact admin OR try agen.", "SS"));
    //                         redirect(base_url() . "users/about_quiz/$quiz_id", 'refresh');
    //                     }
    //                 }
    //             }
    //             $j++;
    //         }
    //     }
    // }


   
    public function quiz_submission()
    {
        $this->load->view('users/headers/header');
        $this->load->view('users/quiz_submission');
        $this->load->view('users/footers/footer');
    }
    public function by_the_mentor_detail($id)
    {
        $data['news'] = $this->Admin_model->news();
        $data['events'] = $this->Admin_model->events();
        $this->load->model('Admin/by_the_mentor_model');
        $data['by_the_mentor'] = $this->by_the_mentor_model->get_btm($id);
        $this->load->view('users/headers/header');
        $this->load->view('users/users_by_the_mentor_detail', $data);
        $this->load->view('users/footers/footer');
    }
    public function all_your_wall()
    {
        $this->load->model('admin/your_wall_model');
        $data['published_wall'] = $this->your_wall_model->getPublishedWall();
        $this->load->view('users/headers/header');
        $this->load->view('users/all_your_wall', $data);
        $this->load->view('users/footers/footer');
    }
    public function checkUserAttempt()
    {
        $user_id = $this->input->post('user_id');
        $quiz_id = $this->input->post('quiz_id');
        $attempt = $this->Users_model->checkUserAttempt($user_id, $quiz_id);
        $user_counter = $attempt['user_counter'];
        $data['userAttempt'] = $user_counter;
        echo  json_encode($data);
        return true;
    }
    public function user_attempt()
    {
        $this->load->view('users/headers/header');
        $this->load->view('users/user_attempt');
        $this->load->view('users/footers/footer');
    }


    // In Conversation With Experts function Start for frontend
    public function conversation_with_experts()
    {
        $Conversation = $this->Users_model->getPublishedConversation();
        $data = array();
        $data['Conversation'] = $Conversation;
        $this->load->view('users/headers/header');
        $this->load->view('users/conversation_with_experts', $data);
        $this->load->view('users/footers/footer');
    }
    public function conversation_video($id)
    {
        $getRecentSearch = $this->Users_model->getRecentSearch();
        $data = array();
        $data['getRecentSearch'] = $getRecentSearch;
        $id = encryptids("D", $id);
        $Conversation = $this->Users_model->getConversation($id);
        $data['Conversation'] = $Conversation;
        $ip = $_SERVER['REMOTE_ADDR'];
        $ConversationView = $this->Users_model->checkConversationView($id, $ip);
        $this->load->view('users/headers/header');
        $this->load->view('users/conversation_video', $data);
        $this->load->view('users/footers/footer');
    }
    public function updateLikes()
    {
        $id = $this->input->post('id');

        $ip=$_SERVER['REMOTE_ADDR'];    
        $getuserlike = $this->Users_model->getLikes($id,$ip);     
        if ($getuserlike['user_like']==1) {     
            $data['status'] = 0;    
            $data['message'] = 'Liked.';    
        }
         else   
        {   
            $return = $this->Users_model->updateLikes($id,$ip); 
             if ($return)   
                {   
                $Conversation = $this->Users_model->getConversation($id);   
                $data['likes'] = $Conversation['likes'];    
                $data['status'] = 1;    
                $data['message'] = 'Updated successfully.'; 
                }  
        }
        echo json_encode([
            'status' => '1',
            'data' => $data,
        ]);
    }
    public function Checklike() 
    {   
        $id = $this->input->post('id'); 
        $ip=$_SERVER['REMOTE_ADDR'];    
        $getuserlike = $this->Users_model->getLikes($id,$ip);   
        $getuserlike['user_like'];  
        if ($getuserlike['user_like']==1) {     
            $data['status'] = 1;    
            $data['message'] = 'Liked.';    
        }   
        else    
        {   
                $data['status'] = 0;    
                $data['message'] = 'Updated successfully.';     
        }   
        echo json_encode([  
            'status' => '1',    
            'data' => $data,    
        ]); 
    }   
    public function CheckLiveSessionlike()  
    {   
        $id = $this->input->post('id'); 
        $admin_id = encryptids("D", $this->session->userdata('admin_id'));  
        $getuserlike = $this->Users_model->CheckLiveSessionlike($id,$admin_id); 
        $getuserlike['user_likes']; 
        if ($getuserlike['user_likes']==1) {    
            $data['status'] = 1;    
            $data['message'] = 'Liked.';    
        }   
        else    
        {   
                $data['status'] = 0;    
                $data['message'] = 'Updated successfully.';     
        }   
        echo json_encode([  
            'status' => '1',    
            'data' => $data,    
        ]); 
    }   
    public function updateLiveSessionLikes()    
    {   
        $id = $this->input->post('id'); 
         $admin_id = encryptids("D", $this->session->userdata('admin_id'));     
        $getuserlike = $this->Users_model->CheckLiveSessionlike($id,$admin_id);     
        if ($getuserlike['user_likes']==1) {    
            $data['status'] = 0;    
            $data['message'] = 'Liked.';    
        }   
        else    
        {   
            $return = $this->Users_model->updateLiveSessionLikes($id,$admin_id);    
             if ($return)   
                {   
                $Conversation = $this->Users_model->getJoinTheClassroomContaint($id);   
                $data['likes'] = $Conversation['likes'];    
                $data['status'] = 1;    
                $data['message'] = 'Updated successfully.'; 
                }   
        }   
        echo json_encode([  
            'status' => '1',    
            'data' => $data,    
        ]); 
    }
    // In Conversation With Experts function End for frontend


    // item proposal function Start for frontend
    public function item_proposal_list()
    {
        $this->load->view('users/headers/header');
        $curl_req1 = curl_init(); 
        curl_setopt_array($curl_req1, array(
            CURLOPT_URL => 'http://203.153.41.213:8071/php/BIS_2.0/dgdashboard/Standards_master/get_nwip_report_data',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_SSL_VERIFYPEER => false, 
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Accept: application/json'
            ),
        ));
        $responseNew = curl_exec($curl_req1);
        $responseNew = json_decode($responseNew, true); 
        $newCount =count($responseNew['nwip_data']);
        // $newCount =1;
        $arr=array();
        $getAll= $this->Users_model->ItemProposalCount();
        $arr['getAll']=$getAll;
        $insertedCount = count($getAll); 
        if ($newCount > $insertedCount ) 
        {
            foreach($responseNew['nwip_data'] as $data)
                { 
                    $this->Users_model->insertItemProposal($data);
                }
        }
        $this->load->view('users/item_proposal_list', $arr);
        $this->load->view('users/footers/footer');
    }
    public function item_proposal_view($id)
    {
        $id = encryptids("D", $id);
        $itemProposal = $this->Users_model->getItemProposal($id);
        $data = array();
        $data['itemProposal'] = $itemProposal;
        $this->load->view('users/headers/header');
        $this->load->view('users/item_proposal_view', $data);
        $this->load->view('users/footers/footer');
    }
    // item proposal function End  for frontend

    // Join The classroom function Start for frontend
    public function join_the_classroom()
    {
        $data = array();
        $data['UpcomingsSessions'] = $this->Users_model->getUpcomingsSessions();
        $data['LiveSessions'] = $this->Users_model->getLiveSessions();
        $data['LatestPosts'] = $this->Users_model->getLatestPosts();
        $data['InformativeVideo'] = $this->Users_model->getInformativeVideo();
        $this->load->view('users/headers/header');
        $this->load->view('users/join_the_classroom', $data);
        $this->load->view('users/footers/footer');
    }
    public function join_the_classroom_view()
    {
        $data = array();
        $data['LiveSessions'] = $this->Users_model->getLiveSessions();
        $this->load->view('users/headers/header');
        $this->load->view('users/join_the_classroom_view', $data);
        $this->load->view('users/footers/footer');
    }
    public function join_the_classroom_watch_now($id)
    {

         $admin_id = encryptids("D", $this->session->userdata('admin_id')); 
        $id = encryptids("D", $id);     
        $this->load->view('users/headers/header');    
        if ($admin_id)  
        {   
            $this->Users_model->checkClassroomView($id,$admin_id);  
            $data = array();    
            $data['WatchNow'] = $this->Users_model->getJoinTheClassroomContaint($id);   
            $this->load->view('users/join_the_classroom_watch_now',$data);  
        }   
        else    
        {   
           redirect(base_url() . "users/login", 'refresh'); 
        }   
        $this->load->view('users/footers/footer'); 
    }
    public function letest_post_view()
    {
        $data = array();
        $data['letestPostView'] = $this->Users_model->getLatestPosts();
        $this->load->view('users/headers/header');
        $this->load->view('users/letest_post_view', $data);
        $this->load->view('users/footers/footer');
    }
    public function letest_post_readMore($id)
    {

         $admin_id = encryptids("D", $this->session->userdata('admin_id'));     
        $id = encryptids("D", $id); 
        $this->load->view('users/headers/header');  
        if ($admin_id)  
        {       
            $this->Users_model->checkClassroomView($id,$admin_id);  
            $ReadMore = $this->Users_model->getJoinTheClassroomContaint($id);   
            $data = array();    
            $data['ReadMore'] = $ReadMore;  
            $this->load->view('users/letest_post_readMore',$data);  
        }   
        else    
        {   
           redirect(base_url() . "users/login", 'refresh'); 
        }   
        $this->load->view('users/footers/footer');

    }
    public function informative_video_view()
    {
        $data = array();
        $data['informativeVideos'] = $this->Users_model->getInformativeVideo();
        $this->load->view('users/headers/header');
        $this->load->view('users/informative_video_view', $data);
        $this->load->view('users/footers/footer');
    }
    public function informative_video_watch($id)
    {
        $admin_id = encryptids("D", $this->session->userdata('admin_id'));  
        $id = encryptids("D", $id); 
        $this->load->view('users/headers/header');  
        if ($admin_id)  
        {   
            $this->Users_model->checkClassroomView($id,$admin_id);  
            $data = array();    
            $data['WatchNow'] = $this->Users_model->getJoinTheClassroomContaint($id);   
            $this->load->view('users/informative_video_watch',$data);   
        }   
        else    
        {   
           redirect(base_url() . "users/login", 'refresh'); 
        }   
        $this->load->view('users/footers/footer'); 
    }
    // Join The classroom function End for frontend


    //  learning standerd Function Start for Frontend 
    public function learning_standerd()
    {
        $data = array();
        $data['LiveSessions'] = $this->Users_model->getlearningStanderdSessions();
        $data['LatestPosts'] = $this->Users_model->getlearningStanderdPosts();
        $data['InformativeVideo'] = $this->Users_model->getlearningStanderdInformativeVideo();
        $this->load->view('users/headers/header');
        $this->load->view('users/learning_standerd', $data);
        $this->load->view('users/footers/footer');
    }
    public function learning_standerd_sessions_view_all()
    {
        $data = array();
        $data['LiveSessions'] = $this->Users_model->getlearningStanderdSessions();
        $this->load->view('users/headers/header');
        $this->load->view('users/learning_standerd_sessions_view_all', $data);
        $this->load->view('users/footers/footer');
    }

    public function learning_standerd_sessions_watch_now($id)
    {

        $admin_id = encryptids("D", $this->session->userdata('admin_id'));  
         $id = encryptids("D", $id); 
        $this->load->view('users/headers/header');  
        if ($admin_id)  
        {   

            // $this->Users_model->checkClassroomView($id,$admin_id);  
            $this->Users_model->checkleasrningView($id,$admin_id);
            $data = array(); 

            $data['WatchNow'] = $this->Users_model->getContaintlearningStanderd($id);   
             // print_r($data);exit;
            $this->load->view('users/learning_standerd_sessions_watch_now', $data);  
        }   
        else    
        {   
           redirect(base_url() . "users/login", 'refresh'); 
        }   
        
        $this->load->view('users/footers/footer');
    }
    public function learning_standerd_posts_all()
    {
        $data = array();
        $data['letestPostView'] = $this->Users_model->getlearningStanderdPosts();
        $this->load->view('users/headers/header');
        $this->load->view('users/learning_standerd_posts_all', $data);
        $this->load->view('users/footers/footer');
    }
    public function learning_standerd_post_readMore($id)
    {

        $admin_id = encryptids("D", $this->session->userdata('admin_id'));  
        $id = encryptids("D", $id);     
                
        $this->load->view('users/headers/header');  
         if ($admin_id)     
        {   
            $this->Users_model->checkleasrningView($id,$admin_id);  
            $data = array();    
            $data['ReadMore'] = $this->Users_model->getContaintlearningStanderd($id);   
            $this->load->view('users/learning_standerd_post_readMore',$data);   
        }   
        else    
        {   
           redirect(base_url() . "users/login", 'refresh'); 
        } 
        $this->load->view('users/footers/footer');
    }
    public function learning_standerd_informative_video_all()
    {
        $data = array();
        $data['informativeVideos'] = $this->Users_model->getlearningStanderdInformativeVideo();
        $this->load->view('users/headers/header');
        $this->load->view('users/learning_standerd_informative_video_all', $data);
        $this->load->view('users/footers/footer');
    }
    public function learning_standerd_informative_video_watch($id)
    {


        $admin_id = encryptids("D", $this->session->userdata('admin_id'));  
        $id = encryptids("D", $id);     
                
        $this->load->view('users/headers/header');  
         if ($admin_id)     
        {   
            $this->Users_model->checkleasrningView($id,$admin_id);  
            $data = array();    
            $data['ReadMore'] = $this->Users_model->getContaintlearningStanderd($id);   
            $this->load->view('users/learning_standerd_informative_video_watch', $data);  
        }   
        else    
        {   
           redirect(base_url() . "users/login", 'refresh'); 
        }  
        
        $this->load->view('users/footers/footer');
    }

    //  learning standerd Function End for Frontend 
    public function guidance_quest()
    {
        // $this->load->view('users/headers/header');
        $this->load->view('users/guidance_quest');
        // $this->load->view('users/footers/footer'); 
    }
    public function feedback_form()
    {
        $this->load->view('users/headers/header');
        $this->load->view('users/feedback_form');
        $this->load->view('users/footers/footer');
    }
    //AJAX
    public function add_feedback_form_data(){
        // print_r($_POST); die;
        $formdata['name']=$this->input->post('name');
        $formdata['mobile']=$this->input->post('mobile_no');
        $formdata['email']=$this->input->post('email');
        $formdata['subject']=$this->input->post('subject');
        $formdata['description']=$this->input->post('description');
        $this->load->model('Users/Users_model');
        $id=$this->Users_model->add_feedback_data($formdata);
        if($id){
            $this->session->set_flashdata('MSG', ShowAlert("Feedback recorded successfully.", "SS"));
            redirect(base_url() . "users/feedback_form", 'refresh');
        }
    }
    
    public function setSelectedLang(){
        $lang_id = $this->input->post('lang');
        
        $_SESSION["quiz_lang_id"] = $lang_id;

            $data['status'] = 1;
            $data['message'] = 'Lang set';
          
        echo  json_encode($data);
        exit();
       }

       public function updateUpdateleasrningLikes() 
    {   
        $id = $this->input->post('id'); 
        $admin_id = encryptids("D", $this->session->userdata('admin_id'));  
        $getuserlike = $this->Users_model->Checkleasrninglike($id,$admin_id);   
        $getuserlike['user_like'];  
        if ($getuserlike['user_like']==1) {     
            $data['status'] = 0;    
            $data['message'] = 'Liked.';    
        }   
        else    
        {   
            $return = $this->Users_model->updateUpdateleasrningLikes($id,$admin_id);    
             if ($return)   
                {   
                $Conversation = $this->Users_model->getContaintlearningStanderd($id);   
                $data['likes'] = $Conversation['likes'];    
                $data['status'] = 1;    
                $data['message'] = 'Updated successfully.'; 
                }   
        }   
        echo json_encode([  
            'status' => '1',    
            'data' => $data,    
        ]); 
    }   
    public function Checkleasrninglike()    
    {   
        $id = $this->input->post('id'); 
        $admin_id = encryptids("D", $this->session->userdata('admin_id'));  
        $getuserlike = $this->Users_model->Checkleasrninglike($id,$admin_id);   
        $getuserlike['user_like'];  
        if ($getuserlike['user_like']==1) {     
            $data['status'] = 1;    
            $data['message'] = 'Liked.';    
        }   
        else    
        {   
                $data['status'] = 0;    
                $data['message'] = 'Updated successfully.';     
        }   
        echo json_encode([  
            'status' => '1',    
            'data' => $data,    
        ]); 
    }

 
    public function standard_under_comments($id)
     {
        
        $this->load->view('users/headers/header'); 
        $data['getData']=$this->Users_model->getStandardUnderReview($id); 
        $data['commnets'] = $this->Users_model->getStandardUnderReviewComments($id);
        if ($this->form_validation->run('standard_under_comments') == FALSE) 
        {
             $this->load->view('users/standard_under_comments',$data);
        } 
        else 
        { 
            $formdata = array(); 
            $formdata['admin_id'] = $this->input->post('admin_id');
            $formdata['description'] = $this->input->post('description');
            $formdata['pk_is_id'] = $id;  
            $formdata['created_on'] = date('Y-m-d h:i:s'); 
            $insert_id = $this->Users_model->insertStandardUnderReviewComments($formdata);
            if ($insert_id)
            {
                $this->session->set_flashdata('MSG', ShowAlert("Comment Added Admin it will be Publish", "SS"));
                redirect(base_url() . "users/standard_under_comments/".$id, 'refresh');
            }
            else
            {
                $this->session->set_flashdata('MSG', ShowAlert("Comment Not Added,Please try again","DD"));
                redirect(base_url() . "users/standard_under_comments", 'refresh');
            }
        }
        $this->load->view('users/footers/footer');
    }





    //////////////////// FRONT END QUIZ START ////////////////////
    public function about_quiz($id)
    {

        $data = array();
        $quiz = $this->Users_model->viewQuiz($id);
        
        $data['quizdata'] = $quiz;

        $prizeDetails = $this->Users_model->prizeDetails($id);
        
        $data['prizeDetails'] = $prizeDetails;
        // echo json_encode($prizeDetails);exit();
        $this->load->view('users/headers/header');
        $this->load->view('users/about_quiz', $data);
        $this->load->view('users/footers/footer');
    }
    public function quiz_start($quiz_id)
    {
        $UserId = $this->session->userdata('admin_id');
        $user_id = encryptids("D", $UserId);
        $data = array();
        $userQuiz = array();
        ///////////////////// check available quiz ////////////////
       
           
            if (isset($_SESSION['admin_type']) && !empty($_SESSION['admin_type'])) {
    
                $sess_admin_type = encryptids("D", $this->session->userdata('admin_type'));
                $sess_is_admin = encryptids("D", $this->session->userdata('is_admin'));
                 //if Already login
                if ($sess_is_admin == 0) {                  
                   
                    if ($this->Users_model->checkAdminLogin()) {
                       
                        if ($sess_admin_type == 2) {                    
                             
                            $userQuiz = $this->Users_model->isQuizForThisUser($user_id,$quiz_id);
                            if(!empty($userQuiz)){
                                $checkUserAvailable = $this->Users_model->checkUserAvailable($quiz_id, $user_id);
                                if ($checkUserAvailable > 0) {
                                    $this->session->set_flashdata('MSG', ShowAlert("You have already appeared for this Quiz.", "SS"));
                                    redirect(base_url() . "users/about_quiz/$quiz_id", 'refresh');
                                } else {
                                    
                                    // this user can appear for this quiz 
                                    // now check for replica que_bank_id 
                                    //start 
                                    $CheckUserCanAppear = $this->Users_model->checkUserQuizForReplicaQueBank($quiz_id, $user_id);
                                    if($CheckUserCanAppear == 1 ){
                                        // can appear

                                        // to check has partially appeared 
                                        $PartiallyAppeared = $this->Users_model->CheckUserPartiallyAppear($quiz_id, $user_id);
                                        //echo json_encode( $PartiallyAppeared );exit();
                                        if( !empty($PartiallyAppeared)){
                                            if(count($PartiallyAppeared)> 0){
                                            // already partially done quiz
                                            // get que list of ques bank
                                            $quiz = $this->Users_model->viewQuiz($quiz_id);
                                            $data['quizdata'] = $quiz;
                                            $data['user_id'] = $user_id;
                                            $data['msg'] =  "Partial Time";
                                            $user_duration = $PartiallyAppeared['user_quiz_duration'];
                                            
                                            $duration_sec = $quiz['duration'] * 60 -  $user_duration  ;
                                            $minutes =    $duration_sec / 60;
                                            $seconds =  $duration_sec % 60;
                                            $data['minutes'] =  $minutes;
                                            $data['seconds'] =  $seconds;
                                            if( $duration_sec != 0){
                                                 $question_list = explode(',',$PartiallyAppeared['question_list_id']);
                                                // $que_details = $this->Users_model->oldgetQuestionDetailsForPartiallyAppered($question_list);
                                                $que_details = $this->Users_model->getQuestionDetailsForPartiallyAppered($user_id,$quiz_id,$question_list);
                                                $data['que_details'] = $que_details;
                                                $this->load->view('users/quiz_start', $data);
                                            }else{
                                                $this->session->set_flashdata('MSG', ShowAlert("You have already appeared for this quiz.Please try another quiz.", "SS"));
                                                redirect(base_url() . "users/about_quiz/$quiz_id", 'refresh');
                                            }
                                           
                                             }
                                        }else{
                                            // first time
                                            $que_details = $this->Users_model->viewQuestion($quiz_id);
                                            $data['que_details'] = $que_details;
                                            $quiz = $this->Users_model->viewQuiz($quiz_id);
                                            $data['quizdata'] = $quiz;
                                            $data['user_id'] = $user_id;
                                           // $data['duration'] =  $quiz['duration'];
                                           $data['minutes'] =  $quiz['duration'];
                                           $data['seconds'] =  '01';
                                            $data['msg'] =  "First Time";
                                            // new code to save ques for future reference
                                           
                                            $que_id_array = array();
                                            foreach ($que_details as $row){
                                                array_push($que_id_array, $row['que_id']);
                                            }
                                            $quistions_list_id = implode(",",$que_id_array);
                                            $quiz_details_new = $this->Users_model->quizDetailsByQuizId($quiz_id);
                                            $dataObj = array(
                                                'user_id'=> $user_id,
                                                'quiz_id'=> $quiz_id,
                                                'question_list_id'=> $quistions_list_id,
                                                'que_bank_id'=> $quiz_details_new['que_bank_id'],
                                                'quiz_duration'=> $quiz_details_new['duration'],
                                            );
                                            $result= $this->Users_model->insertQuizData($dataObj);
                                            // end     
                                           
                                            $this->load->view('users/quiz_start', $data);
                                        }
                                      
                                    }else{
                                        // can not 
                                        $this->session->set_flashdata('MSG', ShowAlert("You have already appeared similar type of quiz which consist of similar questions .", "SS"));
                                        redirect(base_url() . "users/about_quiz/$quiz_id", 'refresh');
                                    }



                                    /// end

                                   
                                   
                                }

                            }else{
                                $this->session->set_flashdata('MSG', ShowAlert("You can not appear for this quiz as you are not authenticated.", "SS"));
                                redirect(base_url() . "users/about_quiz/$quiz_id", 'refresh');

                            }
                        }   else{
                            $this->session->set_flashdata('MSG', ShowAlert("You can not appear for this quiz as you are not authenticated.", "SS"));
                            redirect(base_url() . "users/about_quiz/$quiz_id", 'refresh');

                        }                  
                        
                    } else {
                        redirect(base_url() . "Users/login", 'refresh');
                    }
                }else{
                    $this->session->set_flashdata('MSG', ShowAlert("You can not appear for quiz as you are not authenticated.", "SS"));
                    redirect(base_url() . "users/about_quiz/$quiz_id", 'refresh');
                }
        }else{
            $this->session->set_flashdata('MSG', ShowAlert("Please Login.", "SS"));
            redirect(base_url() . "users/about_quiz/$quiz_id", 'refresh');
        }




        ///////////////////////////////////
      
       
    }
    public function quiz_submit()
    {

        $que_id = $this->input->post("que_id");
        $corr_opts = $this->input->post("corr_opt");
        $selected_lang = $_SESSION["quiz_lang_id"];
        //$mark_for_review = $this->input->post("mark_for_review");

       // echo json_encode($mark_for_review);exit();
        
        $user_id = $this->input->post("user_id");
      // echo  $user_id ;
        $quiz_id = $this->input->post("quiz_id");
        $start_time = $this->input->post("start_time");
       // $review = $this->input->post("review");
        $end_time = $this->input->post("end_time");
        $number = count($que_id);
        if ($number > 0) {
            $successCount = 0;
            $j = 1;
            for ($i = 0; $i < $number; $i++) {
                if (trim($que_id[$i] != '')) {
                    $ques_id =  $que_id[$i];
                    $corr_opt =  $corr_opts[$i];
                    // if(!empty($review)){
                    //     $setForReview = in_array($ques_id, $review);
                    // }else{
                    //     $setForReview = 0;
                    // }
                    
                    if ($_POST['option' . $ques_id . $j] != "") {
                        $selected_op = $_POST['option' . $ques_id . $j];
                    } else {
                        $selected_op = 0;
                    }

                    $formdata = array();
                    $formdata['user_id'] = $user_id;
                    $formdata['quiz_id'] = $quiz_id;
                    $formdata['ques_id'] = $ques_id;
                    $formdata['selected_op'] = $selected_op;
                    $formdata['corr_opt'] = $corr_opt;
                    //$formdata['mark_review'] = $setForReview;
                   // print_r($formdata);exit();
                    $this->Users_model->insertQuestion($formdata);
                    $successCount++;
                    if ($successCount == $number) {
                        $wrong_ques = $this->Users_model->getWrongAns($quiz_id, $user_id);
                        $correct_ques = $this->Users_model->getCorrectAns($quiz_id, $user_id);
                        $not_ans_ques = $this->Users_model->getNotSelected($quiz_id, $user_id);
                        $quiz = $this->Users_model->getTotalmarkAndQuestion($quiz_id);

                        $formdata2 = array();
                        $formdata2['user_id'] = $user_id;
                        $formdata2['quiz_id'] = $quiz_id;
                        $total_question = $quiz['total_question'];
                        $total_mark = $quiz['total_mark'];

                        $formdata2['total_question'] = $total_question;
                        $formdata2['total_mark'] = $total_mark;
                        $formdata2['start_time'] = $start_time;
                        $formdata2['end_time'] = date('h:i:s');
                        $formdata2['correct_ques'] = $correct_ques;
                        $formdata2['wrong_ques'] = $wrong_ques;
                        $formdata2['not_ans_ques'] = $not_ans_ques;
                        $formdata2['selected_lang'] = $selected_lang;

                        $ans = $total_mark / $total_question;
                        
                        $score = $ans * $correct_ques;
                        
                        $formdata2['score'] = $score;                    
                        
                        if ($this->Users_model->insertQuziSubmission($formdata2)) {
                            $this->session->set_flashdata('MSG', ShowAlert("Submission Successfully", "SS"));
                           redirect(base_url() . "users/quiz_submission", 'refresh');
                        } else {
                            $this->session->set_flashdata('MSG', ShowAlert("Quiz not submitted please contact admin OR try again.", "SS"));
                            redirect(base_url() . "users/about_quiz/$quiz_id", 'refresh');
                        }
                    }
                }
                $j++;
            }
        }
    }
    //ajax call
    public function updateUserTime()
    {
        $data = array();
        $user_id = clearText($this->input->post('user_id'));
        $quiz_id = clearText($this->input->post('quiz_id'));
        $getusertime = $this->Users_model->getUserTimeOfAppearedQuiz($user_id,$quiz_id);  
       // echo json_encode($getusertime);exit();
        $user_quiz_duration =  $getusertime['user_quiz_duration'] + 5;

      
            $dbObj = array(
                'user_quiz_duration' => $user_quiz_duration             
            );
            $id = $this->Users_model->updateUserTimeOfAppearedQuiz($user_id,$quiz_id, $dbObj);
        
        if ($id) {
            $data['status'] = 1;
            $data['message'] = 'Time updated successfully';
            $data['id'] = $id;
        } else {
            $data['status'] = 0;
            $data['message'] = 'Error, Please try again';
        }
        echo  json_encode($data);
        exit();
    }

    //ajax call
    public function saveAttemptedQuesDetailsOfUser()
    {
        $data = array();
        $user_id = clearText($this->input->post('user_id'));
        $quiz_id = clearText($this->input->post('quiz_id'));
        $ques_id = clearText($this->input->post('ques_id'));
        $selected_op = clearText($this->input->post('selected_op'));
            $dbObj = array(
                'user_id' => $user_id,
                'quiz_id' => $quiz_id,
                'ques_id' => $ques_id,             
                'selected_op' => $selected_op,
                'created_on' => GetCurrentDateTime('Y-m-d h:i:s')
            );
            $id = $this->Users_model->insertAttemptedQuesDetailsOfUser($dbObj);
        
        if ($id) {
            $data['status'] = 1;
            $data['message'] = 'Data inserted successfully';
            $data['id'] = $id;
        } else {
            $data['status'] = 0;
            $data['message'] = 'Error, Please try again';
        }
        echo  json_encode($data);
        exit();
    }
    //////////////////// FRONT END QUIZ START ////////////////////
    
 
}
