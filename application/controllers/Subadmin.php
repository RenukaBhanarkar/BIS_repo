<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Subadmin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin/Admin_model');
        $this->load->model('Subadmin/Que_bank_model');
        $this->load->model('Subadmin/Questions_model');
        date_default_timezone_set("Asia/Calcutta");
    }
    public function index()
    {
        if ($this->Admin_model->checkAdminLogin()) {
            redirect(base_url() . "Admin/dashboard", 'refresh');
        } else {
            redirect(base_url() . "Users/login", 'refresh');
        }
        return true;
    }
    public function admin_creation_list()
    {
        $pageData = array();
        $encAdminId = $this->session->userdata('admin_id');
        $admin_id = encryptids("D", $encAdminId);

        $pageData['page_menu_select'] = "view_admin";
        $admintype = encryptids("D", $this->session->userdata('admin_type'));
        //$allRecords = $this->Admin_model->getAllSubAdmin();
        $allRecords = $this->Admin_model->getAllSubAdminNew();
        $pageData['allRecords'] = $allRecords;
       
        if ($admintype == 2) {
            if (!$this->Admin_model->checkAdminLogin()) {
                redirect(base_url() . "Admin", 'refresh');
                return true;
            }
            $pageData['page_title'] = 'Add Admin';
            $this->load->view('admin/headers/admin_header');
            $this->load->view('subadmin/admin_creation_list', $pageData);
            $this->load->view('admin/footers/admin_footer');
        } else {
            // echo "You are not allowed";
            $this->session->set_flashdata('MSG', ShowAlert("Sorry! You are Not eligible to perform this action", "DD"));
            redirect(base_url() . "Admin/dashboard", 'refresh');
        }
    }
    public function admin_creation_view($id)
    {
        $data['detail'] = $this->Admin_model->getAdminDetail($id);
        $this->load->view('admin/headers/admin_header');
        $this->load->view('subadmin/admin_creation_view',$data);
        $this->load->view('admin/footers/admin_footer');
    }
    public function admin_creation_form()
    {
        $data = array();
        $roles = $this->Admin_model->getAllRoles();
        $data['roles'] = $roles;
        $this->load->view('admin/headers/admin_header');
        $this->load->view('subadmin/admin_creation_form',$data);
        $this->load->view('admin/footers/admin_footer');
    }
    //ajax call 
    public function getDetailsByuserId()
    {
        $response = array();
        $user_id = 'EXF090323';
        $password = '7696a05fbec5e54051b2e617a9';
        $curl_req = curl_init();
        $parameters = json_encode(array("user_id" => $user_id, "password" => $password));
        curl_setopt_array($curl_req, array(
            CURLOPT_URL => 'http://203.153.41.213:8071/php/BIS_2.0/sso_api/Sso_exchange_api/Authenticate',
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
                'Content-Type: application/json',
                'Accept: application/json'
            ),
        ));
        $response = curl_exec($curl_req);
        // echo json_encode($response);exit();
        // if (curl_errno($curl_req)) {
        //     $error_msg = curl_error($curl_req);
        // }
        // curl_close($curl_req);

        // if (isset($error_msg)) {
        //     echo $error_msg;
        // }else{
        //     echo "Success";
        // }
        // curl_close($curl_req);
        // exit();
        // var_dump(json_decode($response, true));
        $output = json_decode($response, true);

        $token = $output['data']['auth_token'];
        //echo $token;
        // echo json_encode($output);
        $input = $this->input->post('uid');
        $curl_req1 = curl_init();
        $parametersNew = json_encode(array(
            "token" => $token,
            "input" => $input,
            "search_by" => 2,
            "user_id" => "EXF090323"
        ));
        curl_setopt_array($curl_req1, array(
            CURLOPT_URL => 'http://203.153.41.213:8071/php/BIS_2.0/sso_api/Sso_exchange_api/GetData',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_POSTFIELDS => $parametersNew,
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Accept: application/json'
            ),
        ));
        $responseNew = curl_exec($curl_req1);
        $responseNew = json_decode($responseNew, true);
        // echo json_encode($output);
        // exit();

        // $response = array(
        //     'user_id' => 1800003549,
        //     'name' => 'D K AGRAWAL',
        //     'email' => 'agrawal@bis.org.in',
        //     'designation' => 'dummy1',
        //     'branch' => 'dummy2',
        //     'post' => 'dummy3',
        //     'department' => 'dummy4',
        // );


        // echo json_encode($response);exit();
        if (empty($responseNew)) {
            $data['status'] = 0;
            $data['message'] = 'Failed to get details , Please enter valid USER ID.';
        } else {
            $data['status'] = 1;
            $data['message'] = 'Details Available.';
            $data['data'] = $responseNew;
            $data['user'] = $responseNew['data'][0];
        }
        echo  json_encode($data);
    }

    public function addSubAdmin()
    {
        $this->form_validation->set_rules('name', 'Name', 'required|trim|max_length[50]');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|max_length[30]|valid_email');
        $this->form_validation->set_rules('department', 'Department', 'required|trim|max_length[50]');
         $this->form_validation->set_rules('role', 'Role', 'required|trim|max_length[50]');
        // $this->form_validation->set_rules('branch', 'Branch', 'required|trim|max_length[50]');
        // $this->form_validation->set_rules('post', 'Post', 'required|trim|max_length[50]');
      
        // $this->form_validation->set_rules('username', 'Username', 'required|trim|max_length[50]');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('MSG', ShowAlert(validation_errors(), "DD"));
            redirect(base_url() . "subadmin/admin_creation_form", 'refresh');
            return false;
        } else {
            $uid        = clearText($this->input->post('uid'));
            $name        = clearText($this->input->post('name'));
            $email_id        = clearText($this->input->post('email'));
            $department        = clearText($this->input->post('department'));
            $designation        = clearText($this->input->post('role'));
            // $branch        = clearText($this->input->post('branch'));
            // $post        = clearText($this->input->post('post'));
          
            // $username        = clearText($this->input->post('username'));
            //$random_pass	 = $this->randomPassword();
            $random_pass     = 12345678;
            //$newPw = password_hash($random_pass, PASSWORD_BCRYPT);
            $admin_type = 3;
            $data = array(
                'user_uid' => $uid,
                'name' => $name,
                'email_id' => $email_id,
                'designation' => $designation,
                // 'branch' => $branch,
                // 'post' => $post,
                 'department' => $department,
                'is_active' => 1,
                'username' => $email_id,
                'password' => $random_pass,
                'admin_type' => $admin_type
                //'created_on' => GetCurrentDateTime('Y-m-d h:i:s'),
            );
            $admin_id = $this->Admin_model->insertData($data);

            if ($admin_id) {

                $this->session->set_flashdata('MSG', ShowAlert("New Admin added successfully", "SS"));
                redirect(base_url() . "subadmin/admin_creation_list", 'refresh');
            } else {
                $this->session->set_flashdata('MSG', ShowAlert("Failed to create new admin,Please try again", "DD"));
                redirect(base_url() . "subadmin/admin_creation_list", 'refresh');
            }
        }
    }
       public function editSubAdmin()
    {
        $data = array();
        $id =   encryptids("D", $this->input->get('id'));
        $data['record'] = $this->Admin_model->getDetailsById($id);

        $roles = $this->Admin_model->getAllRoles();
        $data['roles'] = $roles;

        $this->load->view('admin/headers/admin_header');
        $this->load->view('subadmin/subadmin_edit',$data);
        $this->load->view('admin/footers/admin_footer');
    }
    public function editSubAdminDetails()
    {
        $data = array();
        $admin_id = encryptids("D", $this->session->userdata('admin_id'));

        $id = clearText($this->input->post('admin_id'));
        $name= clearText($this->input->post('username'));
        $email = clearText($this->input->post('email'));

        $department= clearText($this->input->post('department'));
        $designation = clearText($this->input->post('role'));     

        if (!$name && !$email  && !$department && !$designation) {
            $data['status'] = 0;
            $data['message'] = 'Please enter all details';
        }

        if (empty($data)) {
            $dbObj = array(
                'name' =>  $name,
                'email_id' => $email,
                'username' => $email,
                'designation'    =>$designation,
                'department' => $department,

                'modified_on' => GetCurrentDateTime('Y-m-d h:i:s'),
                'modified_by' => $admin_id,
            );
            $id = $this->Admin_model->updateData($id, $dbObj);
        }
        if ($id) {
            $this->session->set_flashdata('MSG', ShowAlert("Subadmin Updated successfully", "SS"));
               
        } else {
            $this->session->set_flashdata('MSG', ShowAlert("Failed to update  subadmin,Please try again", "DD"));
           
        }
        redirect(base_url() . "subadmin/admin_creation_list", 'refresh');
    }
    public function getUniqueEmail()
    {
        $email = $this->input->get("email");
        $data = array();

        if ($email == '') {
            $data['status'] = 0;
            $data['message'] = 'Please enter email';
        } else if ($this->Admin_model->checkUniqueEmail($email)) {
            $data['status'] = 0;
            $data['message'] = 'This email already Exist.Please enter new Email address';
        } else {

            $data['status'] = 1;
            $data['message'] = 'New Email';
            //$data['data'] = $sub_categories;
        }
        echo  json_encode($data);
    }
    public function randomPassword()
    {
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }
    // public function question_bank_list()
    // {
    //     $data = array();
    //     $data['allRecords'] = $this->Que_bank_model->getListOfAllQueBank();
    //     // echo json_encode( $data['allRecords']);exit();
    //     $this->load->view('admin/headers/admin_header');
    //     $this->load->view('quebank/question_bank_list', $data);
    //     $this->load->view('admin/footers/admin_footer');
    // }
    public function question_bank_form()
    {
        $this->load->view('admin/headers/admin_header');
        $this->load->view('quebank/question_bank_form');
        $this->load->view('admin/footers/admin_footer');
    }
    public function question_bank_archive()
    {
        $data = array();
        $data['allRecords'] = $this->Que_bank_model->getListOfArchiveQueBank();
        $this->load->view('admin/headers/admin_header');
        $this->load->view('quebank/question_bank_archive', $data);
        $this->load->view('admin/footers/admin_footer');
    }
    public function question_bank_saved()
    {
        $data = array();
        $data['allRecords'] = $this->Que_bank_model->getListOfSavedQueBank();
        $permissions = array();
        if (encryptids("D", $_SESSION['admin_type']) == 3) { 
            if (in_array(1, $_SESSION['sub_mod_per'])) { 
                $sub_model_id = 1;
                $permissions = $this->Admin_model->getUsersPermissions($sub_model_id);
            }
            $data['permissions'] =  $permissions;
        }
        $this->load->view('admin/headers/admin_header');
        $this->load->view('quebank/question_bank_saved', $data);
        $this->load->view('admin/footers/admin_footer');
    }
    
    // public function question_bank_edit()
    // {
    //     $this->load->view('admin/headers/admin_header');
    //     $this->load->view('quebank/question_bank_edit');
    //     $this->load->view('admin/footers/admin_footer');
    // }
    // public function question_bank_view()
    // {
    //     $this->load->view('admin/headers/admin_header');
    //     $this->load->view('quebank/question_bank_view');
    //     $this->load->view('admin/footers/admin_footer');
    // }
    //ajax call
    public function createQueBank()
    {
        $data = array();
        $admin_id = encryptids("D", $this->session->userdata('admin_id'));
        $title = clearText($this->input->post('title'));
        $no_of_ques = clearText($this->input->post('no_of_ques'));
        $language = clearText($this->input->post('language'));
       // $total_marks = clearText($this->input->post('total_marks'));

        if (!$title && !$no_of_ques && !$language ) {
            $data['status'] = 0;
            $data['message'] = 'Please enter all details';
        }
        if (empty($data)) {
            $dbObj = array(
                'title' =>  $title,
                'no_of_ques' => $no_of_ques,
                'language' => $language,
                //'total_marks' => $total_marks,
                'created_by' => $admin_id,
                'is_active' => 1,
                'status' => 0
                //'created_on' => GetCurrentDateTime('Y-m-d h:i:s')
            );
            $id = $this->Que_bank_model->insertData($dbObj);
        }
        if ($id) {
            $data['status'] = 1;
            $data['message'] = 'Question Bank created Successfully';
            $data['id'] = $id;
        } else {
            $data['status'] = 0;
            $data['message'] = 'Error, Please try again';
        }
        echo  json_encode($data);
        exit();
    }

    //ajax call 
    public function createQuestions()
    {
        $data = array();
        $admin_id = encryptids("D", $this->session->userdata('admin_id'));
        $que_bank_id = $this->input->post('que_bank_id');
        $que_language = $this->input->post('que_language');
        $que_type = $this->input->post('que_type');
        $que = "";
        $que_h = "";
        $que = $this->input->post('que');
        // echo "fefbefbeb";
        // echo  $que ;exit();
        if ($que_language == 1) {
            if ($que_type == 1 || $que_type == 3) {
                $que = $this->input->post('que');
            }
        }
        if ($que_language == 2) {
            if ($que_type == 1 || $que_type == 3) {
                $que_h = $this->input->post('que_h');
            }
        }
        if ($que_language == 3) {
            if ($que_type == 1 || $que_type == 3) {
                $que = $this->input->post('que');
                $que_h = $this->input->post('que_h');
            }
        }
        //   echo "la".$que_language;
        //  echo "<br>fvbjfevbkjfenvfkjev".$que_h;exit();
        $no_of_options = clearText($this->input->post('no_of_options'));
        $option1 = "";
        $option2 = "";
        $option3 = "";
        $option4 = "";
        $option5 = "";
        $option1_h = "";
        $option2_h = "";
        $option3_h = "";
        $option4_h = "";
        $option5_h = "";

        if ($que_language == 1 || $que_language == 3) {
            if ($no_of_options == 2 || $no_of_options == 3 || $no_of_options == 4 || $no_of_options == 5) {
                $option1 = clearText($this->input->post('option1'));
                $option2 = clearText($this->input->post('option2'));
            }
            if ($no_of_options == 3 || $no_of_options == 4 || $no_of_options == 5) {
                $option3 = clearText($this->input->post('option3'));
            }
            if ($no_of_options == 4 || $no_of_options == 5) {
                $option4 = clearText($this->input->post('option4'));
            }
            if ($no_of_options == 5) {
                $option5 = clearText($this->input->post('option5'));
            }
        }
        if ($que_language == 2 || $que_language == 3) {
            if ($no_of_options == 2 || $no_of_options == 3 || $no_of_options == 4 || $no_of_options == 5) {
                $option1_h = clearText($this->input->post('option1_h'));
                $option2_h = clearText($this->input->post('option2_h'));
            }
            if ($no_of_options == 3 || $no_of_options == 4 || $no_of_options == 5) {
                $option3_h = clearText($this->input->post('option3_h'));
            }
            if ($no_of_options == 4 || $no_of_options == 5) {
                $option4_h = clearText($this->input->post('option4_h'));
            }
            if ($no_of_options == 5) {
                $option5_h = clearText($this->input->post('option5_h'));
            }
        }
        $que_image = "";
        //   if($this->input->post("que_image")){
        //     echo "sdcdvdf";exit();

        $foldername = "bankid" . $que_bank_id;
        if (!file_exists('./uploads/que_img/' . $foldername)) {
            mkdir('./uploads/que_img/' . $foldername);
        }

        if (!empty($_FILES['que_image']['tmp_name'])) {
            // echo $_FILES['que_image']['tmp_name'];exit();
            $que_image = $que_bank_id . '_' . time() . '.jpg';
            $config['upload_path'] = './uploads/que_img/' . $foldername;
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']    = '10000';
            $config['max_width']  = '3024';
            $config['max_height']  = '2024';
            $config['file_name'] = $que_image;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('que_image')) {
                // $data['status'] = 0;
                $data['msg'] = $this->upload->display_errors();
            }
        }
        //}
        $option1_image = "";
        $option2_image = "";
        $option3_image = "";
        $option4_image = "";
        $option5_image = "";
        $option1_h_image = "";
        $option2_h_image = "";
        $option3_h_image = "";
        $option4_h_image = "";
        $option5_h_image = "";
        $opt_type_1 = clearText($this->input->post('opt_type_1'));
        if($opt_type_1 == 2){
            if (!empty($_FILES['option1_image']['tmp_name'])) {
                $option1_image = $this->uploadImageEng($que_bank_id,1,$foldername);
            }
            if (!empty($_FILES['option1_h_image']['tmp_name'])) {
                $option1_h_image = $this->uploadImageHindi($que_bank_id,1,$foldername);
            }
        }
        $opt_type_2 = clearText($this->input->post('opt_type_2'));
        if($opt_type_2 == 2){
            if (!empty($_FILES['option2_image']['tmp_name'])) {
                $option2_image = $this->uploadImageEng($que_bank_id,2,$foldername);
            }
            if (!empty($_FILES['option2_h_image']['tmp_name'])) {
                $option2_h_image = $this->uploadImageHindi($que_bank_id,2,$foldername);
            }
        }
        $opt_type_3 = clearText($this->input->post('opt_type_3'));
        if($opt_type_3 == 2){
            if (!empty($_FILES['option3_image']['tmp_name'])) {
                $option3_image = $this->uploadImageEng($que_bank_id,3,$foldername);
            }
            if (!empty($_FILES['option3_h_image']['tmp_name'])) {
                $option3_h_image = $this->uploadImageHindi($que_bank_id,3,$foldername);
            }
        }
        $opt_type_4 = clearText($this->input->post('opt_type_4'));
        if($opt_type_4 == 2){
            if (!empty($_FILES['option4_image']['tmp_name'])) {
                $option4_image = $this->uploadImageEng($que_bank_id,4,$foldername);
            }
            if (!empty($_FILES['option4_h_image']['tmp_name'])) {
                $option4_h_image = $this->uploadImageHindi($que_bank_id,4,$foldername);
            }
        }
        $opt_type_5 = clearText($this->input->post('opt_type_5'));
        if($opt_type_5 == 2){
            if (!empty($_FILES['option5_image']['tmp_name'])) {
                $option5_image = $this->uploadImageEng($que_bank_id,5,$foldername);
            }
            if (!empty($_FILES['option5_h_image']['tmp_name'])) {
                $option5_h_image = $this->uploadImageHindi($que_bank_id,5,$foldername);
            }
        }    


        $corr_opt_e = clearText($this->input->post('correct_answer'));
        // $language = clearText($this->input->post('language')); 
        // if (!$title && !$no_of_ques && !$language && !$total_marks) {
        //     $data['status'] = 0;
        //     $data['message'] = 'Please enter all details';
        // }
        if (empty($data)) {
            $dbObj = array(
                'is_active'  => 1,
                'que_bank_id' =>  $que_bank_id,
                'que_type' => $que_type,
                'que' => $que,
                'que_h' => $que_h,
                'image' => $que_image,
                'no_of_options' => $no_of_options,
                'opt1_e' => $option1,
                'opt2_e' => $option2,
                'opt3_e' => $option3,
                'opt4_e' => $option4,
                'opt5_e' => $option5,
                'opt1_h' => $option1_h,
                'opt2_h' => $option2_h,
                'opt3_h' => $option3_h,
                'opt4_h' => $option4_h,
                'opt5_h' => $option5_h,
                'created_by' => $admin_id,
                'corr_opt_e' => $corr_opt_e,
                'option1_image'=>$option1_image,
                'option2_image'=>$option2_image,
                'option3_image'=>$option3_image,
                'option4_image'=>$option4_image,
                'option5_image'=>$option5_image,
                'option1_h_image' => $option1_h_image,
                'option2_h_image' => $option2_h_image,
                'option3_h_image' => $option3_h_image,
                'option4_h_image' => $option4_h_image,
                'option5_h_image' => $option5_h_image,
                //'language' =>$language
                //'created_on' => GetCurrentDateTime('Y-m-d h:i:s')
            );
            $id = $this->Questions_model->insertData($dbObj);
        }
        if ($id) {
            $data['status'] = 1;
            $data['message'] = 'Question  created Successfully';
        } else {
            $data['status'] = 0;
            $data['message'] = 'Error, Please try again';
        }
        echo  json_encode($data);
        exit();
    }
    function uploadImageEng($que_bank_id,$id,$foldername){
         // echo $_FILES['que_image']['tmp_name'];exit();
        
        
         $option_image = $que_bank_id . '_' . $id.'_'.time() . '.jpg';
         $config['upload_path'] = './uploads/que_img/' . $foldername;
         $config['allowed_types'] = 'gif|jpg|png|jpeg';
         $config['max_size']    = '10000';
         $config['max_width']  = '3024';
         $config['max_height']  = '2024';
         $config['file_name'] = $option_image;
         $this->load->library('upload', $config);
         $this->upload->initialize($config);
         if (!$this->upload->do_upload('option'.$id.'_image')) {
             // $data['status'] = 0;
             $data['msg'] = $this->upload->display_errors();
         }
        return  $option_image;
    }
    function uploadImageHindi($que_bank_id,$id,$foldername){
        // echo $_FILES['que_image']['tmp_name'];exit();
      
        $option_image = $que_bank_id . '_h_' . $id.'_'.time() . '.jpg';
        $config['upload_path'] = './uploads/que_img/' . $foldername;
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size']    = '10000';
        $config['max_width']  = '3024';
        $config['max_height']  = '2024';
        $config['file_name'] = $option_image;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('option'.$id.'_h_image')) {
            // $data['status'] = 0;
            $data['msg'] = $this->upload->display_errors();
        }
       return  $option_image;
   }

    //ajax call
    public function getQuestionListByQueBankId()
    {
        $data = array();
        $que_bank_id = $this->input->post('que_bank_id');

        $details = array();
        $details = $this->Questions_model->getQuestionListByQueBankId($que_bank_id);
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

    public function toCheckNoOfQueInBank()
    {
        $que_bank_id = $this->input->get("id");
        $no_of_que = $this->input->get("no");
        $data = array();

        if ($que_bank_id == '' &&  $no_of_que == '') {
            $data['status'] = 0;
            $data['message'] = 'Please enter all details';
        } else if ($this->Admin_model->toCheckNoOfQueInBank($que_bank_id, $no_of_que)) {
            $data['status'] = 1;
            $data['message'] = 'Correct';
            $dbObj = array(
                'status' => 1
            );
            $id = $this->Que_bank_model->updateData($que_bank_id, $dbObj);
        } else {
            $data['status'] = 0;
            $data['message'] = 'Please add questions equal to total no of questions in bank';
        }
        echo  json_encode($data);
    }


    //ajax call

    public function deleteQuestion()
    {
        try {
            //$encUserId = $this->session->userdata('user_id');
            //$user = encryptids("D", $encUserId);
            $que_id = $this->input->post('que_id');
            $id = $this->Questions_model->deleteData($que_id);
            if ($id) {
                $data['status'] = 1;
                $data['message'] = 'Deleted successfully.';
            } else {
                $data['status'] = 0;
                $data['message'] = 'Failed to delete, Please try again.';
            }
            echo  json_encode($data);
            return true;
        } catch (Exception $e) {
            echo json_encode([
                'status' => 'error',
                'message' => $e->getMessage(),
            ]);
            return true;
        }
    }

    public function deleteQueBank()
    {
        try {
            $que_bank_id = $this->input->post('que_bank_id');
            $id = $this->Que_bank_model->deleteData($que_bank_id);
            // delete all questions records 
            $quedelete = $this->Questions_model->deleteQueByQueBankID($que_bank_id);
            if ($id) {
                $data['status'] = 1;
                $data['message'] = 'Deleted successfully.';
            } else {
                $data['status'] = 0;
                $data['message'] = 'Failed to delete, Please try again.';
            }
            echo  json_encode($data);
            return true;
        } catch (Exception $e) {
            echo json_encode([
                'status' => 'error',
                'message' => $e->getMessage(),
            ]);
            return true;
        }
    }
    public function changeStatus()
    {
        try {
            $qui_bank_id = $this->input->post('id');
            $status = $this->input->post('status');
            $reason = "";
            if ($status == 4) {
                $reason = $this->input->post('reason');
            }

            $data = array(
                'status' => $status,
                'rejection_reason' => $reason,
                'modified_on' => GetCurrentDateTime('Y-m-d h:i:s'),
                'modified_by' => encryptids("D", $_SESSION['admin_type']),
            );

            $id = $this->Que_bank_model->updateData($qui_bank_id, $data);
            if ($id) {
                $data['status'] = 1;
                $data['message'] = 'Status updated successfully.';
            } else {
                $data['status'] = 0;
                $data['message'] = 'Failed to delete, Please try again.';
            }
            echo  json_encode($data);
            return true;
        } catch (Exception $e) {
            echo json_encode([
                'status' => 'error',
                'message' => $e->getMessage(),
            ]);
            return true;
        }
    }

    public function viewQuestionBank()
    {
        $data = array();
        $qui_bank_id =   encryptids("D", $this->input->get('id'));
        $data['allRecords'] = $this->Que_bank_model->getDetailsByQueBankId($qui_bank_id);
        // echo json_encode( $data['record']);exit();
        $this->load->view('admin/headers/admin_header');
        $this->load->view('quebank/question_bank_view', $data);
        $this->load->view('admin/footers/admin_footer');
    }


    public function replicateQuestionBank(){

        $data = array();
        $admin_id = encryptids("D", $this->session->userdata('admin_id'));
        $qui_bank_id =   encryptids("D", $this->input->get('id'));
        $original_que_bank_id = $qui_bank_id;
        $queBank= $this->Que_bank_model->replicateByQueBankId($qui_bank_id);
      //  echo json_encode($queBank).'<br>';
        if (!empty($queBank)) {
            $dbObj = array(
                'title' =>  $queBank['title'],
                'no_of_ques' =>  $queBank['no_of_ques'],
                'language' =>  $queBank['language'],
                //'total_marks' =>  $queBank['total_marks'],
                'created_by' => $admin_id,
                'is_active' => 1,
                'status' => 0,
                'replica_of_qb_id' => $original_que_bank_id
                //'created_on' => GetCurrentDateTime('Y-m-d h:i:s')
            );
           // echo json_encode($dbObj).'<br>';
            $newid = $this->Que_bank_model->insertData($dbObj);
            //echo $newid ;exit();
        }
        $questions= $this->Questions_model->replicateQueByQueBankId($qui_bank_id);
        foreach ( $questions as $row){
            if (!empty($row)) {
                $dbObj = array(
                    'is_active'  => 1,
                    'que_bank_id' =>  $newid,
                    'que_type' => $row['que_type'],
                    'que' => $row['que'],
                    'que_h' =>$row['que_h'],
                    'image' =>$row['image'],
                    'no_of_options' => $row['no_of_options'],
                    'opt1_e' =>$row['opt1_e'],
                    'opt2_e' =>$row['opt2_e'],
                    'opt3_e' => $row['opt3_e'],
                    'opt4_e' => $row['opt4_e'],
                    'opt5_e' => $row['opt5_e'],
                    'opt1_h' => $row['opt1_h'],
                    'opt2_h' => $row['opt2_h'],
                    'opt3_h' => $row['opt3_h'],
                    'opt4_h' => $row['opt4_h'],
                    'opt5_h' => $row['opt5_h'],
                    'created_by' => $admin_id,
                    'corr_opt_e' => $row['corr_opt_e'],
                    'option1_image'=>$row['option1_image'],
                    'option2_image'=>$row['option2_image'],
                    'option3_image'=>$row['option3_image'],
                    'option4_image'=>$row['option4_image'],
                    'option5_image'=>$row['option5_image'],
                    'option1_h_image' =>$row['option1_h_image'],
                    'option2_h_image' => $row['option2_h_image'],
                    'option3_h_image' => $row['option3_h_image'],
                    'option4_h_image' =>$row['option4_h_image'],
                    'option5_h_image' =>$row['option5_h_image'],
                    //'language' =>$language
                    //'created_on' => GetCurrentDateTime('Y-m-d h:i:s')
                );
                $id = $this->Questions_model->insertData($dbObj);

                
            }
        }
        ///////////////////
        $srcfolder = "bankid".$qui_bank_id;
        $foldername = "bankid".$newid;
        if (!file_exists('./uploads/que_img/' . $foldername)) {
            mkdir('./uploads/que_img/' . $foldername);
        }
       // $sourcePath = $_SERVER['DOCUMENT_ROOT'].
        $sourcePath = $_SERVER['DOCUMENT_ROOT']."/BIS/BIS_repo/uploads/que_img/" . $srcfolder;
        $targetPath = $_SERVER['DOCUMENT_ROOT']."/BIS/BIS_repo/uploads/que_img/" . $foldername;
        $dir = opendir($sourcePath);
        //@mkdir($dst);
            while(false !== ( $file = readdir($dir)) ) {
                if (( $file != '.' ) && ( $file != '..' )) {
                    if ( is_dir($sourcePath . '/' . $file) ) {
                       // recurse_copy($sourcePath . '/' . $file,$targetPath . '/' . $file);
                    }
                    else {
                        copy($sourcePath . '/' . $file,$targetPath . '/' . $file);
                    }
                }
            }
            closedir($dir);


        //$copied = copy($sourcePath , $targetPath);


        /////////////////////
        $qui_bank_id = $newid;
        $data['allRecords'] = $this->Que_bank_model->getDetailsByQueBankId($qui_bank_id);
        $this->load->view('admin/headers/admin_header');
        $this->load->view('quebank/question_bank_edit', $data);
        $this->load->view('admin/footers/admin_footer');

    }
    public function questionBankList()
    {
        $data = array();
        $data['allRecords'] = $this->Que_bank_model->getAllQueBankForSubadmin();
        $permissions = array();
        if (encryptids("D", $_SESSION['admin_type']) == 3) { 
            if (in_array(5, $_SESSION['sub_mod_per'])) { 
                $sub_model_id = 5;
                $permissions = $this->Admin_model->getUsersPermissions($sub_model_id);
            }
            $data['permissions'] =  $permissions;
        }
       // echo json_encode( $data['allRecords']);exit();
        $this->load->view('admin/headers/admin_header');
        $this->load->view('quebank/question_bank_list', $data);
        $this->load->view('admin/footers/admin_footer');
    }
    public function editQuestionBank()
    {
        $data = array();
        $qui_bank_id =   encryptids("D", $this->input->get('id'));
        $data['allRecords'] = $this->Que_bank_model->getDetailsByQueBankId($qui_bank_id);
         //echo json_encode( $data['allRecords']);exit();
        $this->load->view('admin/headers/admin_header');
        $this->load->view('quebank/question_bank_edit', $data);
        $this->load->view('admin/footers/admin_footer');
    }

    //ajax call
    public function editQueBank()
    {
        $data = array();
        $admin_id = encryptids("D", $this->session->userdata('admin_id'));
        $title = clearText($this->input->post('title'));
        $no_of_ques = clearText($this->input->post('no_of_ques'));
        $language = clearText($this->input->post('language_edit'));
       // echo   $language ; exit();
       // $total_marks = clearText($this->input->post('total_marks'));
        $que_bank_id = clearText($this->input->post('que_bank_id_edit'));

        if (!$title && !$no_of_ques && !$language ) {
            $data['status'] = 0;
            $data['message'] = 'Please enter all details';
        }
        if (empty($data)) {
            $dbObj = array(
                'title' =>  $title,
                'no_of_ques' => $no_of_ques,
                'language' => $language,
               // 'total_marks' => $total_marks,
                'is_active' => 1,
                'status' => 0,
                'modified_on' => GetCurrentDateTime('Y-m-d h:i:s'),
                'modified_by' => $admin_id,
            );
            $id = $this->Que_bank_model->updateData($que_bank_id, $dbObj);
        }
        if ($id) {
            $data['status'] = 1;
            $data['message'] = 'Question Bank details updated successfully';
            $data['id'] = $id;
        } else {
            $data['status'] = 0;
            $data['message'] = 'Error, Please try again';
        }
        echo  json_encode($data);
        exit();
    }

    public function legal()
    {
        if (encryptids("D", $_SESSION['admin_type']) == 3) { 
            //  print_r($_SESSION); die;
              if (in_array(24, $_SESSION['sub_mod_per'])) { 
                  $sub_model_id = 24;
                  $permissions = $this->Admin_model->getUsersPermissions($sub_model_id);
              }else{
                //   $sub_model_id = 0;
                //   $permissions = $this->Admin_model->getUsersPermissions($sub_model_id);
              }
              $data['permissions'] =  $permissions;
          }
         // print_r($permissions); die;
        $this->load->model('admin_model');
        $data['legal'] = $this->admin_model->legal();
        $this->load->view('admin/headers/admin_header');
        $this->load->view('admin/legal', $data);
        $this->load->view('admin/footers/admin_footer');
    }
    public function get_legal_data(){
        $this->load->model('admin_model');
        $data['legal']=$this->admin_model->get_legal_data('');
        print_r($data['legal']); die;
    }
   
    
    public function update_legal(){
        $formdata['tc'] = $this->input->post('terms_condition');
        $formdata['policy_p'] = $this->input->post('privacy_policy');
        $formdata['hlp'] = $this->input->post('hyper_linking_policy');
        $formdata['disclamer'] = $this->input->post('disclamer');

        $formdata['copyright_policy'] = $this->input->post('copyright_policy');
        $formdata['cmap'] = $this->input->post('cmap');
        $formdata['cap'] = $this->input->post('cap');
        $formdata['crp'] = $this->input->post('crp');

        $this->Admin_model->update_legal($formdata);
        $this->session->set_flashdata('MSG', ShowAlert("Record updated Successfully", "SS"));
        redirect(base_url() . "subadmin/legal", 'refresh');
        // print_r($formdata); die; 
    }
    public function winner_wall(){
        
        $data['winner_wall_list']=$this->Admin_model->winner_wall_list();
        //print_r($data); die;
        $this->load->view('admin/headers/admin_header');
        $this->load->view('quiz/winner_wall_list', $data);
        $this->load->view('admin/footers/admin_footer');
    }
    public function winner_wall_form(){
        //$data['prises']=$this->Admin_model->prises();
        //$data['winner_wall_list']=$this->Admin_model->winner_wall_list();
        $this->load->model('Quiz/Quiz_model');
        $data['prises']=$this->Admin_model->prises();
        $data['competation']=$this->Quiz_model->published_quiz();
        $data['prises']=$this->Admin_model->prises();
        //print_r($data); die;
        $this->load->view('admin/headers/admin_header');
        $this->load->view('quiz/winner_wall_form', $data);
        $this->load->view('admin/footers/admin_footer');
    }
    public function winner_wall_archive(){
        $this->load->view('admin/headers/admin_header');
        $this->load->view('quiz/winner_wall_archive');
        $this->load->view('admin/footers/admin_footer');
    }
    public function result_declaration_view(){
        $this->load->view('admin/headers/admin_header');
        $this->load->view('quiz/result_declaration_view');
        $this->load->view('admin/footers/admin_footer');
    }
    public function insertWinner(){
       // print_r($_POST);
        $formdata['competiton_name'] = clearText($this->input->post('competition'));
        $formdata['date'] = clearText($this->input->post('date'));
        $formdata['prise'] = clearText($this->input->post('prize'));
        $formdata['name'] = clearText($this->input->post('name'));
        $formdata['email'] = clearText($this->input->post('email'));
        $formdata['contact_no'] = clearText($this->input->post('contact_no'));

        $formdata['location'] = clearText($this->input->post('location'));

            $winner_photo = "winner_photo" . time() . '.jpg';
            $config['upload_path'] = './uploads';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']    = '1000000';
            $config['max_width']  = '3024';
            $config['max_height']  = '2024';
    
            $config['file_name'] = $winner_photo;
    
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('photo')) 
            {
                $data['status'] = 0;
                $data['message'] = $this->upload->display_errors();
            }
            //print_r($data); die;
            
            $formdata['photo'] =$winner_photo;    
           // print_r($formdata); die;    
            $this->load->model('admin_model');
            $this->Admin_model->add_winner($formdata);
            $this->session->set_flashdata('MSG', ShowAlert("Record Inserted Successfully", "SS"));
            redirect(base_url() . "subadmin/winner_wall", 'refresh');

    }
    public function deleteWinner(){
        try {

            $que_id = $this->input->post('que_id');
            $id = $this->Admin_model->deleteWinner($que_id);
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
        redirect(base_url() . "subadmin/winner_wall", 'refresh');
    }
    public function WordOfStandardBanner(){
        if (encryptids("D", $_SESSION['admin_type']) == 3) { 
             // print_r($_SESSION); die;
            //   if (in_array(13, $_SESSION['main_mod_per'])) { 
            //       $sub_model_id = 1;
            //       $permissions = $this->Admin_model->getUsersPermissions($sub_model_id);
            //   }else{
            //       $sub_model_id = 0;
            //       $permissions = $this->Admin_model->getUsersPermissions($sub_model_id);
            //   }
            //   $data['permissions'] =  $permissions;
            if (in_array(13, $_SESSION['sub_mod_per'])) { 
                $sub_model_id = 1;
                $permissions = $this->Admin_model->getUsersPermissions($sub_model_id);
            }else{
                $sub_model_id = 0;
                $permissions = $this->Admin_model->getUsersPermissions($sub_model_id);
            }
            $data['permissions'] =  $permissions;
          }else{
            $data[]="";
          }
         // print_r($data); die;
        $data['banner_data']=$this->Admin_model->bannerwosAllData();
        $this->load->view('admin/headers/admin_header');
        $this->load->view('admin/world_of_standard_banner_image_list',$data);
        $this->load->view('admin/footers/admin_footer');
    }
    public function addbannerimg()
    {
       
        $banner_img = "bannerimg" . time() . '.jpg';
        $config['upload_path'] = './uploads/cms/banner';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size']    = '10000';
        $config['max_width']  = '3024';
        $config['max_height']  = '2024';
   
        $config['file_name'] = $banner_img;
       
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('bannerimg')) 
        {
            $data['status'] = 0;
            $data['message'] = $this->upload->display_errors();
        }
        $formdata['caption'] = $this->input->post('banner_caption');
        $formdata['banner_images'] = $banner_img;
   
        $this->Admin_model->wowInsertBanner($formdata);
        $this->session->set_flashdata('MSG', ShowAlert("Record Inserted Successfully", "SS"));
        redirect(base_url() . "subadmin/WordOfStandardBanner", 'refresh');
    }
    public function edit_bannerimage($id){
        $data=$this->Admin_model->edit_wos_banner($id);
        //print_r($data); die;
        echo $data;
    }
    public function deleteBanner(){
        try {            
            $que_id = $this->input->post('que_id');
            $id = $this->Admin_model->delete_wos_Banner($que_id);
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
        redirect(base_url() . "subadmin/WordOfStandardBanner", 'refresh');
    }
    public function update_bannnerimage(){
        // print_r($_POST); die;
         $formdata['id'] = $this->input->post('id');
         //$formdata['title'] = $this->input->post('title');
         $formdata['caption'] = $this->input->post('banner_caption');  
       //  $formdata['image'] = $this->input->post('old_doc');   
 
        $oldDocument = "";
        $oldDocument = $this->input->post('old_img');
        $document = "";
 
             if (!empty($_FILES['bannerimg']['tmp_name'])) {
                 $document = "banner_image" . time() . '.jpg';
                 $config['upload_path'] = './uploads/cms/banner';
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
 
         if($document){          
             $formdata['banner_images']=$document;
         }
         // $formdata['status']="1";
         $id = $this->Admin_model->updatewosBannerImage($formdata);
         if($id){
             $this->session->set_flashdata('MSG', ShowAlert("Record Updated Successfully", "SS"));
             redirect(base_url() . "subadmin/WordOfStandardBanner", 'refresh');
         } else {
             $this->session->set_flashdata('MSG', ShowAlert("Failed to update record,Please try again", "DD"));
             redirect(base_url() . "subadmin/WordOfStandardBanner", 'refresh');
         }
     }
}
