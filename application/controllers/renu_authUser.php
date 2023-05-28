<?php 
    
    public function  renu_authUser()
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
        //     curl_setopt_array($curl_req, array(
        //         CURLOPT_URL => 'http://203.153.41.213:8071/php/BIS_2.0/dgdashboard/Auth/login',
        //    //CURLOPT_URL => ' http://10.53.100.49/php/BIS_2.0/dgdashboard/Auth/login',
              
        //         CURLOPT_RETURNTRANSFER => true,
        //         CURLOPT_ENCODING => '',
        //         CURLOPT_MAXREDIRS => 10,
        //         CURLOPT_TIMEOUT => 0,
        //         CURLOPT_FOLLOWLOCATION => true,
        //         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        //         CURLOPT_CUSTOMREQUEST => 'POST',
        //         CURLOPT_SSL_VERIFYPEER => false,
        //         CURLOPT_POSTFIELDS => $parameters,
        //         CURLOPT_HTTPHEADER => array(
        //             'Content-Type: application/x-www-form-urlencoded',
        //             'Accept: application/json'
        //         ),
        //     ));
        //     $response = curl_exec($curl_req);
        //     curl_close($curl_req);
        //     $output = json_decode($response, true);
        //     //print_r($output); die;
            $userData = array();
            $output = array(
                'status_code'=>0
            );
            if(!empty($output)){ 
            if ($output['status_code'] == 1) {
               // $userData = $output['data'];
                //echo json_encode($userData);echo "<br>";
                $user_id ='2206274956';
                //$exist_user = $this->Users_model->toCheckUserExist($user_id);
               // $user_id = 
                $exist_user = 1;
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
                          if ($user['admin_type'] == 3) {
                            // get permission 
                            $main_mod_per = $this->Admin_model->mainModulePermission($admin_id);
                            $sub_mod_per = $this->Admin_model->subModulePermission($admin_id);
                         //   $activity_per = $this->Admin_model->activityPermission($admin_id);
                            $sess_permissions = array(
                                "main_mod_per" => $main_mod_per,
                                "sub_mod_per" => $sub_mod_per,
                                "activity_per" => $activity_per,
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

                                                $user_quiz_start_time = $PartiallyAppeared['user_quiz_start_time'];
                                                $t_new = time();
                                                $current_time_new = (date("H:i:s", $t_new));

                                                $already_time_taken_by_user = strtotime($user_quiz_start_time)-strtotime($current_time_new);
                                                $minutes_taken = date('i', $already_time_taken_by_user);
                                                $seconds_taken = date('s', $already_time_taken_by_user);
                                                // $duration_sec = $quiz['duration'] * 60 -  $user_duration  ;
                                                // $minutes =    $duration_sec / 60;
                                                // $seconds =  $duration_sec % 60;
                                                // $data['minutes'] =  $minutes;


                                                $data['minutes'] =  $minutes_taken;
                                                $data['seconds'] =  $seconds_taken;
                                                if( $minutes_taken >=  $quiz['duration'] ){
                                                    $duration_sec = 0;
                                                }
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

                                            $t = time();
                                            $current_time = (date("H:i:s", $t));

                                            $quiz_duration_new =  $quiz['duration'];
                                            ///////////
                                            $time = strtotime($current_time);
                                           
                                            $quiz_end_time = date("H:i:s", strtotime('+'.$quiz_duration_new.' minutes', $time));

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


       /****************************************************
     * 
     * without API call function correct auth user
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
            
            
            //////////////////////START/////////////
            $curl_req = curl_init();
            // commented $parameters = json_encode(array("userid" => $username, "password" => $password));


            /*********************************************************************************
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




            **************************************************************************/
            /********** part to comment  */
            $user_id = 2206274956;
            $output = array(
                'status_code'=>1
            );




            /********** part to comment end  */


            if(!empty($output)){ 
            if ($output['status_code'] == 1) {


               // to remove comment  $userData = $output['data'];
                //echo json_encode($userData);echo "<br>";
               // to remove comment $user_id = $userData['UserID'];





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
                    "quiz_lang_id" => 0
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
     * renu auth user
     */
    /*public function  authUser()
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
        //     curl_setopt_array($curl_req, array(
        //         CURLOPT_URL => 'http://203.153.41.213:8071/php/BIS_2.0/dgdashboard/Auth/login',
        //    //CURLOPT_URL => ' http://10.53.100.49/php/BIS_2.0/dgdashboard/Auth/login',
              
        //         CURLOPT_RETURNTRANSFER => true,
        //         CURLOPT_ENCODING => '',
        //         CURLOPT_MAXREDIRS => 10,
        //         CURLOPT_TIMEOUT => 0,
        //         CURLOPT_FOLLOWLOCATION => true,
        //         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        //         CURLOPT_CUSTOMREQUEST => 'POST',
        //         CURLOPT_SSL_VERIFYPEER => false,
        //         CURLOPT_POSTFIELDS => $parameters,
        //         CURLOPT_HTTPHEADER => array(
        //             'Content-Type: application/x-www-form-urlencoded',
        //             'Accept: application/json'
        //         ),
        //     ));
        //     $response = curl_exec($curl_req);
        //     curl_close($curl_req);
        //     $output = json_decode($response, true);
        //     //print_r($output); die;
            $userData = array();
            $output = array(
                'status_code'=>0
            );
            if(!empty($output)){ 
            if ($output['status_code'] == 1) {
               // $userData = $output['data'];
                //echo json_encode($userData);echo "<br>";
                $user_id ='2206274956';
                //$exist_user = $this->Users_model->toCheckUserExist($user_id);
               // $user_id = 
                $exist_user = 1;
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
                          if ($user['admin_type'] == 3) {
                            // get permission 
                            $main_mod_per = $this->Admin_model->mainModulePermission($admin_id);
                            $sub_mod_per = $this->Admin_model->subModulePermission($admin_id);
                         //   $activity_per = $this->Admin_model->activityPermission($admin_id);
                            $sess_permissions = array(
                                "main_mod_per" => $main_mod_per,
                                "sub_mod_per" => $sub_mod_per,
                                "activity_per" => $activity_per,
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



    /*  public function originalquiz_start($quiz_id)
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
    //  // without remaining time implementation
    public function without_quiz_start($quiz_id)
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
*/


  /*
    public function oldauthUser()
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
                //  $this->session->set_flashdata('MSG', ShowAlert("Invalid username or password.","DD"));
                //  if($param == "inslogin")
                //      redirect(base_url()."Administrator/iLogin", 'refresh');
                //  else
                //      redirect(base_url()."Administrator", 'refresh');
                //  return true;
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
    */
    /*
    public function authUser_old()
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
               // CURLOPT_URL => 'http://203.153.41.213:8071/php/BIS_2.0/dgdashboard/Auth/login',
            CURLOPT_URL => ' http://10.53.100.49/php/BIS_2.0/dgdashboard/Auth/login',
              
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
                        'standard_club_state' =>  $userData['StandardClubState'],
                        'standard_club_district' =>  $userData['StandardClubDistrict'],

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
            } }else {






                
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
                          if ($user['admin_type'] == 3) {
                            // get permission 
                            $main_mod_per = $this->Admin_model->mainModulePermission($admin_id);
                            $sub_mod_per = $this->Admin_model->subModulePermission($admin_id);
                         //   $activity_per = $this->Admin_model->activityPermission($admin_id);
                            $sess_permissions = array(
                                "main_mod_per" => $main_mod_per,
                                "sub_mod_per" => $sub_mod_per,
                                "activity_per" => $activity_per,
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


        }
    }*/
    
    ?>