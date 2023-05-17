<?php 
      renu_authUser()
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
                'status_code'=>1
            );
            if(!empty($output)){ 
            if ($output['status_code'] == 1) {
               // $userData = $output['data'];
                //echo json_encode($userData);echo "<br>";
               // $user_id = $userData['UserID'];
                //$exist_user = $this->Users_model->toCheckUserExist($user_id);
                $user_id = 
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
    ?>