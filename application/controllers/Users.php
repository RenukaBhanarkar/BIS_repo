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

        $this->load->model('Winnerwall/Miscellaneous_winnerwall_model');
        $this->load->model('Winnerwall/Standard_winnerwall_model');
        $this->load->model('Standards_Making/Standards_Making_model');
        $this->load->model('Miscellaneous_Competition/Miscellaneous_competition');
        $this->load->model('Admin/your_wall_model');
        $this->load->model('Admin/by_the_mentor_model');
        $this->load->model('Standardswritting/Standardswritting_model');
        date_default_timezone_set("Asia/Calcutta");

       
       
        $sess_is_admin = encryptids("D", $this->session->userdata('is_admin'));
        $sess_admin_type = encryptids("D", $this->session->userdata('admin_type'));
        // if ($sess_is_admin == 1) {
        //         // if ($sess_admin_type == 1 || $sess_admin_type == 2 || $sess_admin_type == 3) {

        //         //     redirect(base_url() . "Admin/dashboard", 'refresh');
        //         // } else {
        //         //     redirect(base_url() . "Users/welcome", 'refresh');
        //         // }
        //     } else {
        //         redirect(base_url() . "Users/welcome", 'refresh');
        //     }
       
        if (isset($sess_is_admin)) {
            if($sess_is_admin == 1){

                if ($sess_admin_type == 1 || $sess_admin_type == 2 || $sess_admin_type == 3) {

                                redirect(base_url() . "Admin/dashboard", 'refresh');
                         } else {
                            redirect(base_url() . "Users/logout", 'refresh');
                     }
            }
            
           
        }else{
            redirect(base_url() . "Users/welcome", 'refresh');
        }
       
     

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
    public function loginQuiz($id){
        $data = array();
        $data['id'] = $id;
        $this->load->view('users/headers/login_header');
        $this->load->view('users/login',$data);
        $this->load->view('users/footers/login_footer');
    }
    public function loginCompetition($id){
        $data = array();
        $data['comp_id'] = $id;
        $this->load->view('users/headers/login_header');
        $this->load->view('users/login',$data);
        $this->load->view('users/footers/login_footer');
    }
  

    /****************************************************
     * 
     * correct auth user with  api call
     */
    public function earliercorrectauthUser()
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
            // commented $parameters = json_encode(array("userid" => $username, "password" => $password));


          
            $parameters  = "userid=" . $username . "&password=" . $password;
            curl_setopt_array($curl_req, array(
                CURLOPT_URL => 'http://203.153.41.213:8071/php/BIS_2.0/dgdashboard/Auth/login',
           // CURLOPT_URL => ' http://10.53.100.49/php/BIS_2.0/dgdashboard/Auth/login',
              
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
            //print_r($output); die;
            $userData = array();

            if(!empty($output)){ 
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

                        'StandardClubState' =>  $userData['StandardClubState'],
                        'StandardClubStateID' =>  $userData['StandardClubStateID'],
                        'StandardClubDistrict' =>  $userData['StandardClubDistrict'],
                        'StdClubMemberClass' =>  $userData['StdClubMemberClass'],
                        'change_password' =>  $userData['change_password'],
                        'assignedCommitte' =>  $userData['assignedCommitte'],


                        'comm_id' =>  $comm_id,
                        'comm_name' =>  $comm_name,

                    );
                    // echo json_encode($data); exit();
                    $userId = $this->Users_model->insertData($data);
                }
                $user_details = $this->Users_model->getUsersDetailsByUserId($user_id);
                $logs = array(
                    'user_id' => $user_details['id'],
                    'type' => 2,
                );
                $user_log_id = $this->Users_model->insertUsersLogs($logs);
              

                // new code start 
                //session_start();
                session_regenerate_id();
                $user_session_id = session_id();
                $session_data = array(
                    'user_session_id' => $user_session_id,
                );
                $update_session_id = $this->Users_model->updateSessionId($user_id,$session_data);

                $_SESSION['user_session_id'] = $user_session_id;    
                
                // new code end
                $user_log_id        = encryptids("E",$user_log_id);
                $admin_id_1        = encryptids("E", $user_details['id']);
                $admin_id        = encryptids("E", $user_details['user_id']);
                $admin_email        = encryptids("E", $user_details['email']);
                $admin_name      = encryptids("E", $user_details['user_name']);
                $admin_type        = encryptids("E", $user_details['user_type']);
                $admin_post        = encryptids("E", $user_details['emp_desi']);
                $club_id       = encryptids("E", $user_details['standard_club_id']);
                $branch_id       = encryptids("E", $user_details['standard_club_branch_id']);
                $state_id       = encryptids("E", $user_details['StandardClubStateID']);                
                $dept_id       = encryptids("E", $user_details['standard_club_dept_id']);
                $region_id       = encryptids("E", $user_details['standard_club_region']);
                $StandardClubStateID       = encryptids("E", $user_details['StandardClubStateID']);               
                $standard_club_category       = encryptids("E", $user_details['standard_club_category']);
                $user_profile       = encryptids("E", $user_details['profile_image']);
                $is_admin       = encryptids("E", 0);
               
                $sess_arr         = array(
                    "user_log_id" => $user_log_id,
                    "admin_id_1"=> $admin_id_1,
                    "admin_id" => $admin_id,
                    "admin_email" => $admin_email,
                    "admin_type" => $admin_type,
                    "admin_post" => $admin_post,
                    "admin_name" => $admin_name,
                    "is_admin" => $is_admin,
                    "club_id" => $club_id,
                    "branch_id" => $branch_id,
                    "state_id" => $state_id,
                    "region_id" => $region_id,
                    'StandardClubStateID' => $StandardClubStateID,
                    "dept_id" => $dept_id,
                    "standard_club_category"=>$standard_club_category ,  
                    "quiz_lang_id" => 0,
                    "profile_image"=>$user_profile
                );

                $this->session->set_userdata($sess_arr);
                //  exit();
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

                    $logs = array(
                        'user_id' => $user['id'],
                        'type' => 1,
                    );
                    $user_log_id = $this->Users_model->insertUsersLogs($logs);
                  
    
                    $user_log_id        = encryptids("E",$user_log_id);
                    $admin_id        = encryptids("E", $user['id']);
                    $admin_email        = encryptids("E", $user['email_id']);
                    $admin_name      = encryptids("E", $user['name']);
                    $admin_type        = encryptids("E", $user['admin_type']);
                    $admin_post        = encryptids("E", $user['post']);
                    $club_id       = encryptids("E", 0);
                    $branch_id       = encryptids("E", 0);
                    $state_id       = encryptids("E", 0);
                    $dept_id       = encryptids("E", 0);
                    $region_id       = encryptids("E", 0);
                    $is_admin       = encryptids("E", 1);

                    $sess_arr         = array(
                        "user_log_id" => $user_log_id,
                        "admin_id" => $admin_id,
                        "admin_email" => $admin_email,
                        "admin_type" => $admin_type,
                        "admin_post" => $admin_post,
                        "admin_name" => $admin_name,
                        "is_admin" => $is_admin,
                        "club_id" => $club_id,
                        "branch_id" => $branch_id,
                        "state_id" => $state_id,
                        "region_id" => $region_id,
                        "dept_id" => $dept_id,
                        "quiz_lang_id" => 0
                    );

                    if ($user['admin_type'] == 1 || $user['admin_type'] == 2 || $user['admin_type'] == 3) {
                          if ($user['admin_type'] == 3) {
                            // get permission 
                            $main_mod_per = $this->Admin_model->mainModulePermission($admin_id);
                            $sub_mod_per = $this->Admin_model->subModulePermission($admin_id);
                         //   $activity_per = $this->Admin_model->activityPermission($admin_id);
                            $sess_permissions = array(
                                "main_mod_per" => $main_mod_per,
                                "sub_mod_per" => $sub_mod_per,
                                //"activity_per" => $activity_per,
                             );
                             $this->session->set_userdata($sess_permissions);
                          }

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


        }}
    }
    //////////////////////////////////////////////////////////////
    /****************************************************
     * 
     * correct auth user with api call
     */
    /*public function correctauthUser()
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
            // commented $parameters = json_encode(array("userid" => $username, "password" => $password));


           
            $parameters  = "userid=" . $username . "&password=" . $password;
            curl_setopt_array($curl_req, array(
                CURLOPT_URL => 'http://203.153.41.213:8071/php/BIS_2.0/dgdashboard/Auth/login',
           // CURLOPT_URL => ' http://10.53.100.49/php/BIS_2.0/dgdashboard/Auth/login',
              
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
            //print_r($output); die;
            $userData = array();


           


            if(!empty($output)){ 
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




                        'StandardClubState' =>  $userData['StandardClubState'],
                        'StandardClubStateID' =>  $userData['StandardClubStateID'],
                        'StandardClubDistrict' =>  $userData['StandardClubDistrict'],
                        'StdClubMemberClass' =>  $userData['StdClubMemberClass'],
                        'change_password' =>  $userData['change_password'],
                        'assignedCommitte' =>  $userData['assignedCommitte'],


                        'comm_id' =>  $comm_id,
                        'comm_name' =>  $comm_name,

                    );
                    // echo json_encode($data); exit();
                    $userId = $this->Users_model->insertData($data);
                }
                $user_details = $this->Users_model->getUsersDetailsByUserId($user_id);
                $logs = array(
                    'user_id' => $user_details['id'],
                    'type' => 2,
                );
                $user_log_id = $this->Users_model->insertUsersLogs($logs);
              

                // new code start 
                //session_start();
                session_regenerate_id();
                $user_session_id = session_id();
                $session_data = array(
                    'user_session_id' => $user_session_id,
                );
                $update_session_id = $this->Users_model->updateSessionId($user_id,$session_data);

                $_SESSION['user_session_id'] = $user_session_id;    
                
                // new code end
                $user_log_id        = encryptids("E",$user_log_id);
                $admin_id_1        = encryptids("E", $user_details['id']);
                $admin_id        = encryptids("E", $user_details['user_id']);
                $admin_email        = encryptids("E", $user_details['email']);
                $admin_name      = encryptids("E", $user_details['user_name']);
                $admin_type        = encryptids("E", $user_details['user_type']);
                $admin_post        = encryptids("E", $user_details['emp_desi']);
                $club_id       = encryptids("E", $user_details['standard_club_id']);
                $branch_id       = encryptids("E", $user_details['standard_club_branch_id']);
                $state_id       = encryptids("E", $user_details['StandardClubStateID']);                
                $dept_id       = encryptids("E", $user_details['standard_club_dept_id']);
                $region_id       = encryptids("E", $user_details['standard_club_region']);
                $StandardClubStateID       = encryptids("E", $user_details['StandardClubStateID']);               
                $standard_club_category       = encryptids("E", $user_details['standard_club_category']);
                $is_admin       = encryptids("E", 0);

                // for class 
                $standard      = encryptids("E", $user_details['StdClubMemberClass']);

                $sess_arr         = array(
                    "user_log_id" => $user_log_id,
                    "admin_id_1"=> $admin_id_1,
                    "admin_id" => $admin_id,
                    "admin_email" => $admin_email,
                    "admin_type" => $admin_type,
                    "admin_post" => $admin_post,
                    "admin_name" => $admin_name,
                    "is_admin" => $is_admin,
                    "club_id" => $club_id,
                    "branch_id" => $branch_id,
                    "state_id" => $state_id,
                    "region_id" => $region_id,
                    'StandardClubStateID' => $StandardClubStateID,
                    "dept_id" => $dept_id,
                    "standard_club_category"=>$standard_club_category ,  
                    "quiz_lang_id" => 0,

                    "standard" => $standard,


                );

                $this->session->set_userdata($sess_arr);
               //  exit();
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

                    $logs = array(
                        'user_id' => $user['id'],
                        'type' => 1,
                    );
                    $user_log_id = $this->Users_model->insertUsersLogs($logs);
                  
    
                    $user_log_id        = encryptids("E",$user_log_id);
                    $admin_id        = encryptids("E", $user['id']);
                    $admin_email        = encryptids("E", $user['email_id']);
                    $admin_name      = encryptids("E", $user['name']);
                    $admin_type        = encryptids("E", $user['admin_type']);
                    $admin_post        = encryptids("E", $user['post']);
                    $club_id       = encryptids("E", 0);
                    $branch_id       = encryptids("E", 0);
                    $state_id       = encryptids("E", 0);
                    $dept_id       = encryptids("E", 0);
                    $region_id       = encryptids("E", 0);
                    $is_admin       = encryptids("E", 1);

                    $sess_arr         = array(
                        "user_log_id" => $user_log_id,
                        "admin_id" => $admin_id,
                        "admin_email" => $admin_email,
                        "admin_type" => $admin_type,
                        "admin_post" => $admin_post,
                        "admin_name" => $admin_name,
                        "is_admin" => $is_admin,
                        "club_id" => $club_id,
                        "branch_id" => $branch_id,
                        "state_id" => $state_id,
                        "region_id" => $region_id,
                        "dept_id" => $dept_id,
                        "quiz_lang_id" => 0
                    );

                    if ($user['admin_type'] == 1 || $user['admin_type'] == 2 || $user['admin_type'] == 3) {
                          if ($user['admin_type'] == 3) {
                            // get permission 
                            $main_mod_per = $this->Admin_model->mainModulePermission($admin_id);
                            $sub_mod_per = $this->Admin_model->subModulePermission($admin_id);
                         //   $activity_per = $this->Admin_model->activityPermission($admin_id);
                            $sess_permissions = array(
                                "main_mod_per" => $main_mod_per,
                                "sub_mod_per" => $sub_mod_per,
                                //"activity_per" => $activity_per,
                             );
                             $this->session->set_userdata($sess_permissions);
                          }

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


        }}
    }*/
   

     //////////////////////////////////////////////////////////////
    /****************************************************
     * 
     * correct auth user without api call
     */

    
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
            $quiz_id = $this->input->post('quizid');
            $comp_id = $this->input->post('compid');
            //$quizid = encryptids("D", $quiz_id);
            
            //////////////////////START/////////////
            $curl_req = curl_init();
            // commented $parameters = json_encode(array("userid" => $username, "password" => $password));


          
            $parameters  = "userid=" . $username . "&password=" . $password;
            curl_setopt_array($curl_req, array(
                // CURLOPT_URL => 'https://www.services.bis.gov.in/php/BIS_2.0/dgdashboard/Auth/login',
               CURLOPT_URL => 'http://203.153.41.213:8071/php/BIS_2.0/dgdashboard/Auth/login',
           // CURLOPT_URL => ' http://10.53.100.49/php/BIS_2.0/dgdashboard/Auth/login',
              
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
            //print_r($output); die;
            $userData = array();



            if(!empty($output)){ 
            if ($output['status_code'] == 1) {


                 $userData = $output['data'];
               
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




                        'StandardClubState' =>  $userData['StandardClubState'],
                        'StandardClubStateID' =>  $userData['StandardClubStateID'],
                        'StandardClubDistrict' =>  $userData['StandardClubDistrict'],
                        'StdClubMemberClass' =>  $userData['StdClubMemberClass'],
                        'change_password' =>  $userData['change_password'],
                        'assignedCommitte' =>  $userData['assignedCommitte'],


                        'comm_id' =>  $comm_id,
                        'comm_name' =>  $comm_name,

                    );
                    // echo json_encode($data); exit();
                    $userId = $this->Users_model->insertData($data);
                }
                $user_details = $this->Users_model->getUsersDetailsByUserId($user_id);
                $logs = array(
                    'user_id' => $user_details['id'],
                    'type' => 2,
                );
                $user_log_id = $this->Users_model->insertUsersLogs($logs);
              

                // new code start 
                //session_start();
                session_regenerate_id();
                $user_session_id = session_id();
                $session_data = array(
                    'user_session_id' => $user_session_id,
                );
                $update_session_id = $this->Users_model->updateSessionId($user_id,$session_data);

                $_SESSION['user_session_id'] = $user_session_id;    
                
                // new code end
                $user_log_id        = encryptids("E",$user_log_id);
                $admin_id_1        = encryptids("E", $user_details['id']);
                $admin_id        = encryptids("E", $user_details['user_id']);
                $admin_email        = encryptids("E", $user_details['email']);
                $admin_name      = encryptids("E", $user_details['user_name']);
                $admin_type        = encryptids("E", $user_details['user_type']);
                $admin_post        = encryptids("E", $user_details['emp_desi']);
                $club_id       = encryptids("E", $user_details['standard_club_id']);
                $branch_id       = encryptids("E", $user_details['standard_club_branch_id']);
                $state_id       = encryptids("E", $user_details['StandardClubStateID']);                
                $dept_id       = encryptids("E", $user_details['standard_club_dept_id']);
                $region_id       = encryptids("E", $user_details['standard_club_region']);
                $StandardClubStateID       = encryptids("E", $user_details['StandardClubStateID']);               
                $standard_club_category       = encryptids("E", $user_details['standard_club_category']);
                $is_admin       = encryptids("E", 0);
                $admin_designation       = encryptids("E",0);
               
                // for class 
                $standard      = encryptids("E", $user_details['StdClubMemberClass']);
                $user_profile  = encryptids("E", $user_details['profile_image']);

                $sess_arr         = array(
                    "user_log_id" => $user_log_id,
                    "admin_id_1"=> $admin_id_1,
                    "admin_id" => $admin_id,
                    "admin_email" => $admin_email,
                    "admin_type" => $admin_type,
                    "admin_post" => $admin_post,
                    "admin_name" => $admin_name,
                    "is_admin" => $is_admin,
                    "club_id" => $club_id,
                    "branch_id" => $branch_id,
                    "state_id" => $state_id,
                    "region_id" => $region_id,
                    'StandardClubStateID' => $StandardClubStateID,
                    "dept_id" => $dept_id,
                    "standard_club_category"=>$standard_club_category ,  
                    "quiz_lang_id" => 0,
                    "admin_designation"=>$admin_designation,
                    "standard" => $standard,
                    "profile_image" =>$user_profile


                );
if($user_details['change_password']==0){
    // $this->session->set_userdata($change_password['0']);
    $_SESSION["change_password"]="0";
}
                $this->session->set_userdata($sess_arr);
               //  exit();
// echo $comp_id;
// echo $quiz_id;
// echo $compid;
// die;
                if(isset($quiz_id) && !empty($quiz_id)){
                    redirect(base_url() . "users/about_quiz/".$quiz_id, 'refresh');
                   
                }else if(isset($comp_id) && !empty($comp_id)){
                    redirect(base_url() . "users/about_competition/".$comp_id, 'refresh');
                }else{
                    redirect(base_url() . "Users/welcome", 'refresh');
                }
              
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

                    $logs = array(
                        'user_id' => $user['id'],
                        'type' => 1,
                    );
                    $user_log_id = $this->Users_model->insertUsersLogs($logs);
                  
    
                    $user_log_id        = encryptids("E",$user_log_id);
                    $admin_id        = encryptids("E", $user['id']);
                    $admin_email        = encryptids("E", $user['email_id']);
                    $admin_name      = encryptids("E", $user['name']);
                    $admin_type        = encryptids("E", $user['admin_type']);
                    $admin_post        = encryptids("E", $user['post']);
                    $admin_designation       = encryptids("E", $user['designation']);
                    $club_id       = encryptids("E", 0);
                    $branch_id       = encryptids("E", 0);
                    $state_id       = encryptids("E", 0);
                    $dept_id       = encryptids("E", 0);
                    $region_id       = encryptids("E", 0);
                    $is_admin       = encryptids("E", 1);

                    $sess_arr         = array(
                        "user_log_id" => $user_log_id,
                        "admin_id" => $admin_id,
                        "admin_email" => $admin_email,
                        "admin_type" => $admin_type,
                        "admin_post" => $admin_post,
                        "admin_name" => $admin_name,
                        "is_admin" => $is_admin,
                        "club_id" => $club_id,
                        "branch_id" => $branch_id,
                        "state_id" => $state_id,
                        "region_id" => $region_id,
                        "dept_id" => $dept_id,
                        "admin_designation" => $admin_designation,
                        "quiz_lang_id" => 0
                    );

                    if ($user['admin_type'] == 1 || $user['admin_type'] == 2 || $user['admin_type'] == 3) {
                          if ($user['admin_type'] == 3) {
                            // get permission 
                            $main_mod_per = $this->Admin_model->mainModulePermission($admin_id);
                            $sub_mod_per = $this->Admin_model->subModulePermission($admin_id);
                         //   $activity_per = $this->Admin_model->activityPermission($admin_id);
                            $sess_permissions = array(
                                "main_mod_per" => $main_mod_per,
                                "sub_mod_per" => $sub_mod_per,
                                //"activity_per" => $activity_per,
                             );
                             $this->session->set_userdata($sess_permissions);
                          }

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


        }}
    }
    //////////////////////////////////////////////////////////////



  
    
    public function logout()
    {
        $id = encryptids("D", $_SESSION['admin_id_1']);
        $user_log_id = encryptids("D", $_SESSION['user_log_id']);
      
       // echo $id ; exit();
        $logs = array(
            'logout_on' => GetCurrentDateTime('Y-m-d h:i:s')           
           
        );
        $insert_logs = $this->Users_model->updateUsersLogs($id,$user_log_id,$logs);  
        
        $this->Admin_model->adminLogout();
        //$this->session->session_unset();

        //session_id($_SESSION['user_session_id']);
        $this->session->sess_destroy();
        redirect(base_url() . 'Users/login','refresh');
        exit();
    }

    public function checkLoginSession(){
        $result = $this->Users_model->checkLoginSession();
        if ($result) {
            $data['status'] = 1;
            $data['message'] = 'Authenticated User login';
            $data['output'] = 'login';
        } else {
            $data['status'] = 0;
            $data['message'] = 'Unathenticated login';
            $data['output'] = 'logout';
        }
        echo  json_encode($data);
        exit();
    }
    public function welcome()
    {
        
        $this->session->unset_userdata('set_nav');
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
 
        $data['Winnerwall'] = $this->Users_model->getWinnerWall();
        $data['allquize'] = $allquize;
        $data['essy_writing']=$this->Miscellaneous_competition->getPublishedComp1('4',array(1));
        $data['poster']=$this->Miscellaneous_competition->getPublishedComp1('4',array(2));
        $data['competition']=$this->Miscellaneous_competition->getPublishedComp1('4',array(3,4,5)); 

        $data['getOnlineCompData']=$this->Standardswritting_model->getPublishedOnlineCompitation();
        //print_r($data['competition']); die;
        // $data1['set_nav']="1";
        $_SESSION["set_nav"]="1";
        $this->load->view('users/headers/header');
        $this->load->view('users/standard_club',$data);
        $this->load->view('users/footers/footer');  
    }


    public function winner_wall(){
        $this->load->view('users/headers/header');
        $this->load->view('users/winner_wall');
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
    public function your_wall_posts(){
        $this->load->model('admin/your_wall_model');
        if(isset($_SESSION['admin_id'])){
        $user_id = encryptids("D", $_SESSION['admin_id']);
        //$data['published_wall'] = $this->your_wall_model->getSelfPublishedWall($user_id);
        $data['daily_limit']=$this->your_wall_model->ckeckDailyLimit($user_id);
        }else{
            $data['daily_limit']="0";  
        }
       // print_r($data); die;
         $data['published_wall'] = $this->your_wall_model->getPublishedWall();
        //   print_r($data); die;
        // $this->load->view('users/headers/header');
        // $this->load->view('users/yourwall_new', $data);
        // $this->load->view('users/footers/footer');
        // }else{
        //     redirect(base_url() . "users/login", 'refresh');
        // }


        $this->load->view('users/headers/header');
        $this->load->view('users/your_wall_28may',$data);
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
        if(isset($_SESSION['admin_id'])){
            $uid=encryptids("D",$_SESSION['admin_id']);
        }else{
            $uid="";
        }
        // $uid=encryptids("D",$_SESSION['admin_id']);
        $limit=100;
          $data['wow']=$this->wow->all_wallofwisdom3($uid,$limit);
        // $data['wow'] = $this->wow->get_allwow();
        $this->load->view('users/headers/header');
        $this->load->view('wall_of_wisdom/wall_of_wisdom_view_1', $data);
        $this->load->view('users/footers/footer');
    }
    public function searchWow(){
        if(isset($_SESSION['admin_id'])){
            $uid=encryptids("D",$_SESSION['admin_id']);
        }else{
            $uid="";
        }
        $select_period =  $this->input->post('select_period');
        $search_text =  $this->input->post('search_text');
        $select_type =  $this->input->post('select_type');
        $limit=100;
          $data['wow']=$this->wow->searchWallOfWisdom($uid,$limit,$select_period,$search_text,$select_type);
        //   print_r($data); die;
          $this->load->view('users/headers/header');
          $this->load->view('wall_of_wisdom/wall_of_wisdom_view_1',$data);
          $this->load->view('users/footers/footer');
      }
      public function searchBtm(){
        if(isset($_SESSION['admin_id'])){
            $uid=encryptids("D",$_SESSION['admin_id']);
        }else{
            $uid="";
        }
        $select_period =  $this->input->post('select_period');
        $search_text =  $this->input->post('search_text');
        $select_type =  $this->input->post('select_type');
        $limit=100;
          $data['by_the_mentor']=$this->by_the_mentor_model->searchByTheMentor($uid,$limit,$select_period,$search_text,$select_type);
        //   print_r($data); die;
          $this->load->view('users/headers/header');
          $this->load->view('users/all_by_the_mentors',$data);
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
       
        //$getUserAllQuize = $this->Users_model->getUserAllQuize();
        $getUserAllQuize = $this->Users_model->getStdClubQuizAllNew();
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
    public function help()
    {
        $this->load->view('users/headers/header');
        $this->load->view('users/help');
        $this->load->view('users/footers/footer');
    }
    public function change_password()
    {
       // $this->load->view('users/headers/header');
        $this->load->view('users/change_password');
      //  $this->load->view('users/footers/footer');
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
        $masterWinners= $this->Winnerwall_model->getWinnerWallListFront();
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

    public function standard_writting_winners()
    {
        $masterWinners= $this->Standard_winnerwall_model->getWinnerWallListFront();
        $masterArr = array();   
        foreach($masterWinners as $row)
        {
            $quiz_id= $row['quiz_id'];
            $WinnersArr= $this->Standard_winnerwall_model->getWinners($quiz_id);
            $row['Winners'] = $WinnersArr;
            array_push($masterArr, $row);
        } 
        $data['masterWinners']=$masterArr; 
        $this->load->view('users/headers/header');
        $this->load->view('users/winners', $data);
        $this->load->view('users/footers/footer');
    }

    public function miscellaneous_winners()
    {
        $masterWinners= $this->Miscellaneous_winnerwall_model->getWinnerWallListFront();
        $masterArr = array();   
        foreach($masterWinners as $row)
        {
            $quiz_id= $row['quiz_id'];
            $WinnersArr= $this->Miscellaneous_winnerwall_model->getWinners($quiz_id);
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
        
        $this->load->model('admin/your_wall_model');
        if(isset($_SESSION['admin_id'])){
        $user_id = encryptids("D", $_SESSION['admin_id']);
        //$data['published_wall'] = $this->your_wall_model->getSelfPublishedWall($user_id);
        $data['daily_limit']=$this->your_wall_model->ckeckDailyLimit($user_id);
        }else{
            $data['daily_limit']="0";  
        }
       // print_r($data); die;
         $data['published_wall'] = $this->your_wall_model->getPublishedWall();
        $this->load->view('users/headers/header');
        $this->load->view('users/yourwall_new', $data);
        $this->load->view('users/footers/footer');
        // }else{
        //     redirect(base_url() . "users/login", 'refresh');
        // }
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
            $email_id=encryptids("D", $_SESSION['admin_email']);
            $subject="Exchange forunm notification";        
            $msg="Your response has been submitted successfully and is under review.";
            $this->by_the_mentor_model->send_email($msg,$subject,$email_id);

            $this->session->set_flashdata('MSG', ShowAlert("Response Submitted Successfully", "SS"));
            // redirect(base_url() . "users/yourwall", 'refresh');
            redirect(base_url() . "users/your_wall_posts", 'refresh');
        } else {
        }
    }
    public function byTheMentor(){
        $this->load->model('Admin/by_the_mentor_model');
        if (isset($_SESSION['admin_id'])) {
            $user_id= encryptids("D", $_SESSION['admin_id']);
            $data['limit']=$this->by_the_mentor_model->ckeckDailyLimit($user_id);
        }else{
            $data['limit']="0";
        }
      //  print_r($_SESSION); die;
        // $formdata1['email']= encryptids("D", $_SESSION['admin_email']);
        // $formdata1['name']= encryptids("D", $_SESSION['admin_name']);
        // $formdata1['admin']= encryptids("D", $_SESSION['admin']);
       // $user_id= encryptids("D", $_SESSION['admin_id']);
        // $formdata1['admin_type']= encryptids("D", $_SESSION['admin_type']);
        //  print_r($formdata1); die;
        
        $data['by_the_mentor'] = $this->by_the_mentor_model->getThreeBTM();
       
       // print_r($data); die;
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

        // $this->load->model('admin/by_the_mentor_model');
        // $uid = $this->by_the_mentor_model->add_user($formdata1);

        // print_r($uid);

        $formdata['title'] = $title;
        $formdata['description'] = $description;
        $formdata['image'] = $thumbnail;
        $formdata['document'] = $btm_document;
        $formdata['status'] = "1";
        // print_r($formdata); die;
        
        $this->load->model('admin/by_the_mentor_model');
        $response=$this->by_the_mentor_model->get_email($formdata['user_id']);
        $email_id=$response['email'];
    //  $email_id="sakhare.akshay51@gmail.com";
   // $email_id="vol.bhagyashree@gmail.com";
        
        
        $id = $this->by_the_mentor_model->add_btm($formdata);
        if ($id) {
            
            $response=$this->by_the_mentor_model->get_email( $formdata['user_id']);
            //$email_id=$response['email'];
            $subject="Exchange forunm notification";        
            $msg="Your response has been submitted successfully and is under review.";
            $this->by_the_mentor_model->send_email($msg,$subject,$email_id);

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
        $data['competition']=$this->Miscellaneous_competition->viewCompetition2($id);
        $this->load->view('users/headers/header');
        $this->load->view('users/about_competition',$data);
        $this->load->view('users/footers/footer');
    }
    public function start_competition($id)
    {
        // $this->load->model('Miscellaneous_Competition/Miscellaneous_competition');
        // $data['competition']=$this->Miscellaneous_competition->viewCompetition2($id);
    //   print_r($data); die;
   
       $sess_admin_type = encryptids("D", $this->session->userdata('admin_type'));
    //    echo $sess_admin_type;
        {
        
            $quiz_id = $id;  
           
            $UserId = $this->session->userdata('admin_id');
            $user_id = encryptids("D", $UserId);
            $data = array();
            $userQuiz = array();
            ///////////////////// check available quiz ////////////////
           
               
                if (isset($_SESSION['admin_type']) && !empty($_SESSION['admin_type'])) {
        
                    $sess_admin_type = encryptids("D", $this->session->userdata('admin_type'));
                    $sess_is_admin = encryptids("D", $this->session->userdata('is_admin'));
                     //if Already login
                    //  echo $sess_admin_type; die;
                    if ($sess_is_admin == 0) {                  
                       
                        if ($this->Users_model->checkAdminLogin()) {
                           
                            if ($sess_admin_type == 2) {                    
                                 
                                $userQuiz = $this->Users_model->isCompetitionForThisUser($user_id,$quiz_id);
                                if(!empty($userQuiz)){
                                    $checkUserAvailable = $this->Miscellaneous_competition->checkUserAvailable($quiz_id, $user_id);
                                    if ($checkUserAvailable > 0) {
                                        $this->session->set_flashdata('MSG', ShowAlert("You have already appeared for this Competition.", "SS"));
                                        redirect(base_url() . "users/about_competition/". $quiz_id, 'refresh');
                                    } else {
                                        // print_r($data); die;
                                        $this->load->model('Miscellaneous_Competition/Miscellaneous_competition');
                                        $data['competition']=$this->Miscellaneous_competition->viewCompetition2($id);
                                        $data['is_allow']="1";
                                        $this->load->view('users/headers/header');
                                        $this->load->view('users/start_competition',$data);
                                        $this->load->view('users/footers/footer');
                                    }
    
                                }else{
                                    $this->session->set_flashdata('MSG', ShowAlert("You can not appear for this Competition as you are not authenticated.", "DD"));
                                    redirect(base_url() . "users/about_competition/".$quiz_id, 'refresh');
    
                                }
                            }   else{
                                $this->session->set_flashdata('MSG', ShowAlert("You can not appear for this Competition as you are not authenticated.", "DD"));
                                redirect(base_url() . "users/about_competition/".$quiz_id, 'refresh');
    
                            }                  
                            
                        } else {
                            redirect(base_url() . "Users/login", 'refresh');
                        }
                    }else{
                        $this->session->set_flashdata('MSG', ShowAlert("You can not appear for Competition as you are not authenticated.", "DD"));
                        redirect(base_url() . "users/about_competition/". $quiz_id, 'refresh');
                    }
            }else{
                $this->session->set_flashdata('MSG', ShowAlert("Please Login.", "SS"));
                redirect(base_url() . "users/about_competition/".$quiz_id, 'refresh');
            }
          
           
        }
        // $this->load->view('users/headers/header');
        // $this->load->view('users/start_competition',$data);
        // $this->load->view('users/footers/footer');
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
        $data['answer_text']=$this->input->post('myTextArea');
        $data['competiton_id']=$this->input->post('comp_id');

        
	 $start_time= $this->input->post('start_time');
     $end_t=date('h:i:s');

     $st_time = strtotime($start_time);
     $en_time = strtotime($end_t);
     $diff = $en_time - $st_time; 
     $time_taken =abs($diff); 
     $data['time_taken']=$time_taken;


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
            // echo "success";
            $this->session->set_flashdata('MSG', ShowAlert("Your response has benn recorded.", "SS"));
                redirect(base_url() . "Miscellaneouscompetition/thanks/", 'refresh');
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
    /*public function quiz_start($quiz_id)
    {
        $UserId = $this->session->userdata('admin_id');
        $user_id = encryptids("D", $UserId);
        $data = array();
        $userQuiz = array();
        ///////////////////// check available quiz ////////////////
       
           
            if (isset($_SESSION['admin_type']) && !empty($_SESSION['admin_type'])) {
    
                $sess_admin_type = encryptids("D", $this->session->userdata('admin_type'));
                $sess_is_admin = encryptids("D", $this->session->userdata('is_admin'));
                if ($sess_is_admin == 0) {
                    //if Already login
                   
                    if ($this->Users_model->checkAdminLogin()) {
                       
                        if ($sess_admin_type == 2) {                    
                             
                            $userQuiz = $this->Users_model->isQuizForThisUser($user_id,$quiz_id);
                            if(!empty($userQuiz)){
                                $checkUserAvailable = $this->Users_model->checkUserAvailable($quiz_id, $user_id);
                                if ($checkUserAvailable > 0) {
                                    $this->session->set_flashdata('MSG', ShowAlert("You have already appeared for this Quiz.", "SS"));
                                    redirect(base_url() . "users/about_quiz/$quiz_id", 'refresh');
                                } else {
                                   
                                    $que_details = $this->Users_model->viewQuestion($quiz_id);
                                    $data['que_details'] = $que_details;
                                    $quiz = $this->Users_model->viewQuiz($quiz_id);
                                    $data['quizdata'] = $quiz;
                                    $data['user_id'] = $user_id;
                                    $this->load->view('users/quiz_start', $data);
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
      
       
    }*/
    /*public function quiz_submit()
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
        $review = $this->input->post("review");
        $end_time = $this->input->post("end_time");
        $number = count($que_id);
        if ($number > 0) {
            $successCount = 0;
            $j = 1;
            for ($i = 0; $i < $number; $i++) {
                if (trim($que_id[$i] != '')) {
                    $ques_id =  $que_id[$i];
                    $corr_opt =  $corr_opts[$i];
                    $setForReview = in_array($ques_id, $review);

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
                    $formdata['mark_review'] = $setForReview;
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
                            $this->session->set_flashdata('MSG', ShowAlert("Quiz not submitted please contact admin OR try agen.", "SS"));
                            redirect(base_url() . "users/about_quiz/$quiz_id", 'refresh');
                        }
                    }
                }
                $j++;
            }
        }
    }*/


   
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
        //print_r($data); die;
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
        $data = array();
        $this->load->view('users/headers/header');

        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $search = $this->input->post('search');
            $Conversation = $this->Standards_Making_model->getPublishedConversationSearch($search);
            $data['Conversation'] = $Conversation;
        }
        else
        { 
            $Conversation = $this->Users_model->getPublishedConversation();
            $data['Conversation'] = $Conversation;

        }

        
        
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
        // if ($admin_id)  
        // {   
            $this->Users_model->checkClassroomView($id,$admin_id);  
            $data = array();    
            $data['WatchNow'] = $this->Users_model->getJoinTheClassroomContaint($id);   
            $this->load->view('users/join_the_classroom_watch_now',$data);  
        // }   
        // else    
        // {   
        //    redirect(base_url() . "users/login", 'refresh'); 
        // }   
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
        // if ($admin_id)  
        // {       
            $this->Users_model->checkClassroomView($id,$admin_id);  
            $ReadMore = $this->Users_model->getJoinTheClassroomContaint($id);   
            $data = array();    
            $data['ReadMore'] = $ReadMore;  
            $this->load->view('users/letest_post_readMore',$data);  
        // }   
        // else    
        // {    
        //    redirect(base_url() . "users/login", 'refresh'); 
        // }   
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
        // if ($admin_id)  
        // {   
            $this->Users_model->checkClassroomView($id,$admin_id);  
            $data = array();    
            $data['WatchNow'] = $this->Users_model->getJoinTheClassroomContaint($id);   
            $this->load->view('users/informative_video_watch',$data);   
        // }   
        // else    
        // {   
        //    redirect(base_url() . "users/login", 'refresh'); 
        // }   
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
        // if ($admin_id)  
        // {   

            // $this->Users_model->checkClassroomView($id,$admin_id);  
            $this->Users_model->checkleasrningView($id,$admin_id);
            $data = array(); 

            $data['WatchNow'] = $this->Users_model->getContaintlearningStanderd($id);   
             // print_r($data);exit;
            $this->load->view('users/learning_standerd_sessions_watch_now', $data);  
        // }   
        // else    
        // {   
        //    redirect(base_url() . "users/login", 'refresh'); 
        // }   
        
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
        //  if ($admin_id)     
        // {   
            $this->Users_model->checkleasrningView($id,$admin_id);  
            $data = array();    
            $data['ReadMore'] = $this->Users_model->getContaintlearningStanderd($id);   
            $this->load->view('users/learning_standerd_post_readMore',$data);   
        // }   
        // else    
        // {   
        //    redirect(base_url() . "users/login", 'refresh'); 
        // } 
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
        //  if ($admin_id)     
        // {   
            $this->Users_model->checkleasrningView($id,$admin_id);  
            $data = array();    
            $data['ReadMore'] = $this->Users_model->getContaintlearningStanderd($id);   
            $this->load->view('users/learning_standerd_informative_video_watch', $data);  
        // }   
        // else    
        // {   
        //    redirect(base_url() . "users/login", 'refresh'); 
        // }  
        
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
            $this->load->model('Admin/By_the_mentor_model');
            $msg="Your feedback has been submitted successfully. Thank you for reaching out to us. <br> Thanks<br>BIS.";
            $subject="Exchange forum notification";
            $email_id=$this->input->post('email');
           // echo $msg.'<br>'.$subject.'<br>',$email_id; die;
            $this->By_the_mentor_model->send_email($msg,$subject,$email_id);
            $this->session->set_flashdata('MSG', ShowAlert("Feedback Submitted Successfully.", "SS"));
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

        $id = encryptids("D", $id); 
        
        
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
  
    // with remaining time implementation
    public function quiz_start($quiz_id)
    {
        
        $quiz_id = encryptids("D",$quiz_id);  
       
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
                                    redirect(base_url() . "users/about_quiz/".encryptids('E', $quiz_id), 'refresh');
                                } else {
                                    
                                        // to check has partially appeared 
                                        $PartiallyAppeared = $this->Users_model->CheckUserPartiallyAppear($quiz_id, $user_id);
                                        //echo json_encode( $PartiallyAppeared );exit();

                                        if( !empty($PartiallyAppeared)){
                                            //to check time out or not 
                                            $PartiallyAppearedNotOut = $this->Users_model->CheckUserPartiallyAppearNew($quiz_id, $user_id);
                                            if(!empty($PartiallyAppearedNotOut)){
                                                // already partially done quiz and can reappear
                                                // get que list of ques bank
                                                $quiz = $this->Users_model->viewQuiz($quiz_id);
                                                $data['quizdata'] = $quiz;
                                                $data['user_id'] = $user_id;
                                                $data['msg'] =  "Partial Time";
                                                $user_duration = $PartiallyAppeared['user_quiz_duration'];

                                                $user_quiz_start_time = $PartiallyAppeared['user_quiz_start_time'];
                                               // echo "user_quiz_start_time ".$user_quiz_start_time.'<br>';
                                               
                                                $current_time_new = date("Y-m-d H:i:s");
                                               
                                                $already_time_taken_by_user =strtotime($current_time_new) -  strtotime($user_quiz_start_time);

                                                $remaining_time = $quiz['duration']*60 -  $already_time_taken_by_user;
                                               
                                                $minutes_taken  = $remaining_time / 60;
                                                $seconds_taken  = $remaining_time % 60;

                                                $data['minutes'] =  $minutes_taken;
                                                $data['seconds'] =  $seconds_taken;
                                                if( $minutes_taken >=  $quiz['duration'] ){
                                                    $duration_sec = 0;
                                                }else{
                                                    $duration_sec = 1;
                                                }
                                                if( $duration_sec != 0){
                                                    $question_list = explode(',',$PartiallyAppeared['question_list_id']);
                                                  
                                                    $que_details = $this->Users_model->getQuestionDetailsForPartiallyAppered($user_id,$quiz_id,$question_list);
                                                    $data['que_details'] = $que_details;
                                                    $this->load->view('users/quiz_start', $data);
                                                }else{
                                                    $this->session->set_flashdata('MSG', ShowAlert("You have already appeared for this quiz and quiz time is over.Please try another quiz.", "DD"));
                                                    redirect(base_url() . "users/about_quiz/".encryptids('E', $quiz_id), 'refresh');
                                                }
                                           
                                            }else{
                                                $this->session->set_flashdata('MSG', ShowAlert("You can not appear this quiz  as your quiz time is over.Please try another quiz.", "DD"));
                                                    redirect(base_url() . "users/about_quiz/".encryptids('E', $quiz_id), 'refresh');
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

                                            //$t = time();
                                            //$current_time = (date("H:i:s", $t));
                                            $current_time = date("Y-m-d H:i:s");
                                            $quiz_duration_new =  $quiz['duration'];
                                            ///////////
                                           // $time = strtotime($current_time);
                                           $time = strtotime(date("Y-m-d H:i:s"));
                                            $quiz_end_time = date("Y-m-d H:i:s", strtotime('+'.$quiz_duration_new.' minutes', $time));

                                            ///////////////////
                                          
                                            $dataObj = array(
                                                'user_id'=> $user_id,
                                                'quiz_id'=> $quiz_id,
                                                'question_list_id'=> $quistions_list_id,
                                                'que_bank_id'=> $quiz_details_new['que_bank_id'],
                                                'quiz_duration'=> $quiz_details_new['duration'],
                                                'user_quiz_start_time'=> $current_time,
                                                'quiz_end_time'=> $quiz_end_time
                                            );
                                            $result= $this->Users_model->insertQuizData($dataObj);
                                            // end     
                                           
                                            $this->load->view('users/quiz_start', $data);
                                        }
                                      
                                    /// end                                  
                                   
                                }

                            }else{
                                $this->session->set_flashdata('MSG', ShowAlert("You can not appear for this quiz as you are not authenticated.", "DD"));
                                redirect(base_url() . "users/about_quiz/".encryptids('E', $quiz_id), 'refresh');

                            }
                        }   else{
                            $this->session->set_flashdata('MSG', ShowAlert("You can not appear for this quiz as you are not authenticated.", "DD"));
                            redirect(base_url() . "users/about_quiz/".encryptids('E', $quiz_id), 'refresh');

                        }                  
                        
                    } else {
                        redirect(base_url() . "Users/login", 'refresh');
                    }
                }else{
                    $this->session->set_flashdata('MSG', ShowAlert("You can not appear for quiz as you are not authenticated.", "DD"));
                    redirect(base_url() . "users/about_quiz/".encryptids('E', $quiz_id), 'refresh');
                }
        }else{
            $this->session->set_flashdata('MSG', ShowAlert("Please Login.", "SS"));
            redirect(base_url() . "users/about_quiz/".encryptids('E', $quiz_id), 'refresh');
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
                    if(isset($_POST['option' . $ques_id . $j])){
                        if ($_POST['option' . $ques_id . $j] != "") {
                            $selected_op = $_POST['option' . $ques_id . $j];
                        } else {
                            $selected_op = 0;
                        }
                    }else{
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
                        $end_t = date('h:i:s');
                        $formdata2['end_time'] = $end_t;



                        $st_time = strtotime($start_time);
                        $en_time = strtotime($end_t);
                        $diff = $en_time - $st_time;
                        $time_taken =abs($diff);



                        $formdata2['correct_ques'] = $correct_ques;
                        $formdata2['wrong_ques'] = $wrong_ques;
                        $formdata2['not_ans_ques'] = $not_ans_ques;
                        $formdata2['selected_lang'] = $selected_lang;
                        $formdata2['time_taken'] = $time_taken;

                        $ans = $total_mark / $total_question;
                        
                        $score = $ans * $correct_ques;
                        
                        $formdata2['score'] = $score;                    
                        
                        if ($this->Users_model->insertQuziSubmission($formdata2)) {
                            $this->session->set_flashdata('MSG', ShowAlert("Submission Successfully", "SS"));
                           // exit();
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
        $mark_review_id = clearText($this->input->post('mark_review_id'));
        if($mark_review_id  == 0){
            $mark_review_id =0;
        }else{
            $mark_review_id = 1;
        }
        $toCheckExisted = $this->Users_model->toCheckExistedQuestion($user_id,$quiz_id,$ques_id);
        if($toCheckExisted){
            $dbObj = array(                        
                'selected_op' => $selected_op,
                'mark_review' =>$mark_review_id,
                'created_on' => GetCurrentDateTime('Y-m-d h:i:s')
            );
            $id = $this->Users_model->updateAttemptedQuesDetailsOfUser($user_id,$quiz_id,$ques_id,$dbObj);
        }else{
            
            $dbObj = array(
                'user_id' => $user_id,
                'quiz_id' => $quiz_id,
                'ques_id' => $ques_id,             
                'selected_op' =>$selected_op,
                'mark_review' =>$mark_review_id,
                'created_on' => GetCurrentDateTime('Y-m-d h:i:s')
            );
            $id = $this->Users_model->insertAttemptedQuesDetailsOfUser($dbObj);

        }
        
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
    public function my_profile_view()
    {
        $UserId = $this->session->userdata('admin_id');
        $user_id = encryptids("D", $UserId);
      //  echo $UserId; die;
        // $data['user_profile']=$this->Users_model->getUsersDetailsByUserId('1800003696');
        $data['user_profile']=$this->Users_model->getUsersDetailsByUserId( $user_id);
        // print_r($data); die;
        $this->load->view('users/headers/header');
        $this->load->view('users/my_profile_view',$data);
        $this->load->view('users/footers/footer');
    }
    public function my_activity_list()
    {
    //    print_r($_SESSION); die;
    $UserId = $this->session->userdata('admin_id');
    $user_id = encryptids("D", $UserId);
    $data['published_wall'] = $this->your_wall_model->getSelfPublishedWall($user_id);
    $data['by_the_mentor'] = $this->by_the_mentor_model->getAllBtmPulishedByUser($user_id);
      $this->load->model('Quiz_model');
    //  $data['quiz']=$this->Quiz_model->getQuizByUserid('2105239181');    
    $this->load->model('Miscellaneous_Competition/Miscellaneous_competition');
    $data['competition']= $this->Miscellaneous_competition->ckeckCompAttemptByUser($user_id);
    $data['quiz']=$this->Quiz_model->getQuizByUserid($user_id);   
    //  print_r($data); die;
        $this->load->view('users/headers/header');
        $this->load->view('users/my_activity_list',$data);
        $this->load->view('users/footers/footer');
    }    
    public function answerkey($user_id,$quiz_id){
        $this->load->model('Quiz_model');
        $data['answerKey'] = $this->Quiz_model->getAnswerKeyForUser($user_id,$quiz_id); 
     
        $this->load->view('users/headers/header');
       // $this->load->view('users/answer_key_list',$data);
        $this->load->view('users/answer_key_new',$data);
        $this->load->view('users/footers/footer');
    }
    public function answerkey_new(){
        $this->load->view('users/headers/header');
        $this->load->view('users/answerkey_new');
        $this->load->view('users/footers/footer');
    }
    public function essay_writing_comp(){
        $data['essy_writing']=$this->Miscellaneous_competition->getPublishedComp('4',array(1));
        // $data['poster']=$this->Miscellaneous_competition->getPublishedComp('4',array(2));
        // $data['competition']=$this->Miscellaneous_competition->getPublishedComp('4',array(3,4,5));
       // print_r($data); die;
        $this->load->view('users/headers/header');
        $this->load->view('users/essay_writing_comp',$data);
        $this->load->view('users/footers/footer');
    }
    public function poster_making_comp(){
        $data['poster_making']=$this->Miscellaneous_competition->getPublishedComp('100',array(2));        
       //print_r($data); die;
        $this->load->view('users/headers/header');
        $this->load->view('users/poster_making_comp',$data);
        $this->load->view('users/footers/footer');
    }
    public function more_copetition(){
        $data['more_copetition']=$this->Miscellaneous_competition->getPublishedComp1('100',array(3,4,5));        
       //print_r($data); die;
        $this->load->view('users/headers/header');
        $this->load->view('users/more_copetition',$data);
        $this->load->view('users/footers/footer');
    }
    public function standard_writting_details($id){

     $id= encryptids("D", $id);

         $region_id = encryptids("D", $this->session->userdata('region_id'));
        $branch_id = encryptids("D", $this->session->userdata('branch_id'));
        $state_id = encryptids("D", $this->session->userdata('state_id')); 
        $user_dept_id = encryptids("D", $this->session->userdata('dept_id'));
        $aval_for = encryptids("D", $this->session->userdata('standard_club_category'));
        $standard = encryptids("D", $this->session->userdata('standard'));
       
        $data=array();
        $getdata=$this->Standardswritting_model->create_online_view($id);

 $allFilds1=0;
 $allFilds2=0;
 $level=$getdata['quiz_level_id'];
if ($level==1) 
{
    $allFilds1=1;
}

if ($level==2) 
{
    if ($getdata['region_id']==$region_id) {
        $allFilds1=1;
    }
    else
    {
        $allFilds1=2;
    }
}
if ($level==3) 
{
    if ($getdata['branch_id']==$branch_id) {
        $allFilds1=1;
    }
    else
    {
        $allFilds1=2;
    }
}

if ($level==4) 
{
    if ($getdata['state_id']==$state_id) {
        $allFilds1=1;
    }
    else
    {
        $allFilds1=2;
    }
}

 $availability=$getdata['availability_id'];

if ($availability==2) 
{ 
    $allFilds2=1;
}

if ($availability==1) 
{
    $std = explode(',', $getdata['standard']);
    $standard = $standard;
    if($standard != 0){
        if(in_array($standard,$std))  
        {
            $allFilds2=1;
        }
        else
        {
            $allFilds2=2;
        }
    }
}

    if (isset($_SESSION['admin_id'])) 
    {
        $user_id = encryptids("D", $_SESSION['admin_id']);
        $attempt = $this->Standardswritting_model->checkAttemptCompetitionOnline($user_id,$id); 
        $data['attempt']=$attempt;
    }
    
        

        $data['getData']=$getdata;
        $data['allFilds1']=$allFilds1;
        $data['allFilds2']=$allFilds2;

        $this->load->view('users/headers/header');
        $this->load->view('users/standard_writting_details',$data);
        $this->load->view('users/footers/footer');
    }
    public function already_attempt(){
        $this->load->view('users/headers/header');
        $this->load->view('users/already_attempt');
        $this->load->view('users/footers/footer');
      }
    public function standard_writting_login($ids){ 
         $id= encryptids("D", $ids);
         $user_id = encryptids("D", $_SESSION['admin_id']);
         
         $attempt = $this->Standardswritting_model->checkAttemptCompetitionOnline($user_id,$id); 
         if (!empty($attempt)) 
         {
            $this->session->set_flashdata('MSG', ShowAlert("Record Inserted Successfully", "SS"));
                redirect(base_url() . "users/already_attempt", 'refresh'); 
         }


        $region_id = encryptids("D", $this->session->userdata('region_id'));
        $branch_id = encryptids("D", $this->session->userdata('branch_id'));
        $state_id = encryptids("D", $this->session->userdata('state_id')); 
        $user_dept_id = encryptids("D", $this->session->userdata('dept_id'));
        $aval_for = encryptids("D", $this->session->userdata('standard_club_category'));
        $standard = encryptids("D", $this->session->userdata('standard'));
        $data=array();
        $getdata=$this->Standardswritting_model->create_online_view($id);

        $data['getData']=$getdata;
        $data['attempt']=$attempt;
        // $data['allFilds1']=$allFilds1;
        // $data['allFilds2']=$allFilds2;

          
        if ($this->form_validation->run('standard_writting_login') == FALSE) 
        {
            

 $allFilds1=0;
 $allFilds2=0;
 $level=$getdata['quiz_level_id'];
if ($level==1) 
{
    $allFilds1=1;
}

if ($level==2) 
{
    if ($getdata['region_id']==$region_id) {
        $allFilds1=1;
    }
    else
    {
        $allFilds1=2;
    }
}
if ($level==3) 
{
    if ($getdata['branch_id']==$branch_id) {
        $allFilds1=1;
    }
    else
    {
        $allFilds1=2;
    }
}

if ($level==4) 
{
    if ($getdata['state_id']==$state_id) {
        $allFilds1=1;
    }
    else
    {
        $allFilds1=2;
    }
}

 $availability=$getdata['availability_id'];

if ($availability==2) 
{ 
    $allFilds2=1;
}

if ($availability==1) 
{
    $std = explode(',', $getdata['standard']);
    $standard = encryptids("D", $this->session->userdata('standard'));
    // if($standard != 0){
        if(in_array($standard,$std))  
        {
            $allFilds2=1;
        }
        else
        {
            $allFilds2=2;
        }
    // }
}
            if ($allFilds1==1 && $allFilds2==1) {
                $this->load->view('users/standard_writting_login',$data);
            }
            else
            {
                redirect(base_url() . "users/standard_writting_details/".$ids, 'refresh'); 
                
            }
           
        }
        else
        {

            $start_time= $this->input->post('start_time');
            $end_t=date('h:i:s');

            $st_time = strtotime($start_time);
            $en_time = strtotime($end_t);
            $diff = $en_time - $st_time; 
            $time_taken =abs($diff);  
            $formdata['user_id'] = encryptids("D", $_SESSION['admin_id']);
            $formdata['comp_id'] = $this->input->post('comp_id');
            $formdata['details'] = $this->input->post('details');
            $formdata['start_time'] = $start_time;
            $formdata['end_time'] = $end_t;
            $formdata['time_taken'] = $time_taken;

            $formdata['created_on'] = date('Y-m-d h:i:s'); 

            $id = $this->Standardswritting_model->StandardswrittingCompSave($formdata);
            if ($id)
            {
                $this->session->set_flashdata('MSG', ShowAlert("Record Inserted Successfully", "SS"));
                redirect(base_url() . "users/standard_writting_thanks", 'refresh');
            }
            else
            {
                $this->session->set_flashdata('MSG', ShowAlert("Failed to create Create New Competition, Please try again", "DD"));
                redirect(base_url() . "users/standard_writting_login/".$data, 'refresh');
            }

        }
    }
    public function standard_writting_thanks(){
        $this->load->view('users/headers/header');
        $this->load->view('users/standard_writting_thanks');
        $this->load->view('users/footers/footer');
      }
      public function edit_profile(){

        $UserId = $this->session->userdata('admin_id');
        $user_id = encryptids("D", $UserId);
      //  echo $UserId; die;
        // $data['user_profile']=$this->Users_model->getUsersDetailsByUserId('1800003696');
        $data['user_profile']=$this->Users_model->getUsersDetailsByUserId( $user_id);
       
        // print_r($data['user_profile']); die;

        $this->load->view('users/headers/header');
         $this->load->view('users/edit_profile',$data);
       $this->load->view('users/footers/footer');
     }
     public function update_profile(){
        // print_r($_POST); die;
        $oldDocument = "";
        $oldDocument = $this->input->post('old_img');
        $document = "";

        if (!file_exists('uploads/user/profile')) {
            mkdir('uploads/user/profile', 0777, true);
        }

        if (!empty($_FILES['bannerimg']['tmp_name'])) {
            $document = "user_profile" . time() . '.jpg';
            $config['upload_path'] = './uploads/user/profile/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']    = '100000';
            $config['max_width']  = '3024';
            $config['max_height']  = '2024';
            $config['file_name'] = $document;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('bannerimg')) {
                //$err[]=$this->upload->display_errors();
                $data['status'] = 0;
                $data['message'] = $this->upload->display_errors();
            }
        } else {
            if (!empty($oldDocument)) {
                $document =  $oldDocument;
            }
        }

        if ($document) {
            $data['profile_image'] = $document;
        }


        $UserId = $this->session->userdata('admin_id');
        $user_id = encryptids("D", $UserId);
        $data['user_name']=$this->input->post('user_name');
        $data['email']=$this->input->post('email');
        $data['date_of_birth']=$this->input->post('date_of_birth');
        $data['gender']=$this->input->post('gender');
        $data['user_mobile']=$this->input->post('user_mobile');
        $data['user_id']=$user_id;

        $response=$this->Users_model->updateProfile($data);
        if($response){
            $this->session->set_flashdata('MSG', ShowAlert("Profile updated successfully", "DD"));
            redirect(base_url() . "users/edit_profile/",'refresh');
        }else{
            $this->session->set_flashdata('MSG', ShowAlert("Failed to create Create New Competition, Please try again", "DD"));
            redirect(base_url() . "users/edit_profile/",'refresh');
        }

     }
     public function standard_writting_all(){
        $this->load->view('users/headers/header');
        $data['getOnlineCompData']=$this->Standardswritting_model->getPublishedOnlineCompitation();
        $this->load->view('users/standard_writting_all',$data);
        $this->load->view('users/footers/footer');
      }
      public function language(){
        $this->load->view('users/headers/header');
        $this->load->view('users/language');
        $this->load->view('users/footers/footer');
      }
      public function about_eBIS(){
        $data['about_ebis'] = $this->Admin_model->aboutEbisForumData();
        // print_r($data); die;
        $this->load->view('users/headers/header');
        $this->load->view('users/about_eBIS',$data);
        $this->load->view('users/footers/footer');
      }
      public function essay_writting_all(){
        $this->load->view('users/headers/header');
        $this->load->view('users/essay_writting_all');
        $this->load->view('users/footers/footer');
      }

    public function Deleteleasrninglike()    
    {   
        $id = $this->input->post('id'); 
        $admin_id = encryptids("D", $this->session->userdata('admin_id'));
        $info = $this->Users_model->getContaintlearningStanderd($id);
        $likes= $info['likes']-1; 
        $getuserlike = $this->Users_model->Deleteleasrninglike($id,$admin_id,$likes); 
        if ($getuserlike) {     
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


    public function Deletesessionlike()    
    {   
        $id = $this->input->post('id'); 
        $admin_id = encryptids("D", $this->session->userdata('admin_id')); 
        $info = $this->Users_model->getJoinTheClassroomContaint($id);
        $likes= $info['likes']-1; 
        $getuserlike = $this->Users_model->Deletesessionlike($id,$admin_id,$likes); 
        if ($getuserlike) {     
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
    public function consumer_bis(){
        $this->load->model('Admin/Cms_model');
        $data['consumer_bis']=$this->Cms_model->aboutConsumerBisData();
        // print_r($data); die;
        $this->load->view('users/headers/header');
        $this->load->view('users/consumer_bis',$data);
        $this->load->view('users/footers/footer');
      }
      public function standard_promotion(){
        $this->load->model('Admin/Cms_model');
        $data['standard_promotion']=$this->Cms_model->getData('2');
        $this->load->view('users/headers/header');
        $this->load->view('users/standard_promotion',$data);
        $this->load->view('users/footers/footer');
      }
      public function about_standards_club(){
        $this->load->model('Admin/Cms_model');
        $data['about_standards_club']=$this->Cms_model->getData('3');
        $this->load->view('users/headers/header');
        $this->load->view('users/about_standards_club',$data);
        $this->load->view('users/footers/footer');
      }
      public function Learning_via_standards(){
        $this->load->model('Admin/Cms_model');
        $data['Learning_via_standards']=$this->Cms_model->getData('4');
        $this->load->view('users/headers/header');
        $this->load->view('users/Learning_via_standards',$data);
        $this->load->view('users/footers/footer');
      }
      public function meeting_startup(){
        $this->load->view('users/headers/header');
        $this->load->view('users/meeting_startup');
        $this->load->view('users/footers/footer');
      }
      public function research_projects(){
        $this->load->view('users/headers/header');
        $this->load->view('users/research_projects');
        $this->load->view('users/footers/footer');
      }
      public function workshops_seminars(){
        $this->load->view('users/headers/header');
        $this->load->view('users/workshops_seminars');
        $this->load->view('users/footers/footer');
      }
      public function technical_committees(){
        $this->load->view('users/headers/header');
        $this->load->view('users/technical_committees');
        $this->load->view('users/footers/footer');
      }
      public function membership_panels(){
        $this->load->view('users/headers/header');
        $this->load->view('users/membership_panels');
        $this->load->view('users/footers/footer');
      }
      public function language_set($id){
        $_SESSION['language']=$id;
        return true;
      }
      public function news_list(){
        $this->load->view('users/headers/header');
        $this->load->view('users/news_list');
        $this->load->view('users/footers/footer');
      }
      public function event_list(){
        $this->load->view('users/headers/header');
        $this->load->view('users/event_list');
        $this->load->view('users/footers/footer');
      }
}
