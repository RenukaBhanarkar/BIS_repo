<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin/Admin_model');
        $this->load->model('subadmin/Que_bank_model');
        $this->load->model('subadmin/Questions_model');
        $this->load->model('Admin/Your_wall_model');
        $this->load->model('Standards_Making/Standards_Making_model');
        $this->load->model('Learningscience/Learningscience_model');
        date_default_timezone_set("Asia/Calcutta");
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
    public function index()
    {
        if ($this->Admin_model->checkAdminLogin()) {
            redirect(base_url() . "Admin/dashboard", 'refresh');
        } else {
            redirect(base_url() . "Users/login", 'refresh');
        }
        return true;
    }
    public function set_permission()
    {
        $data = array();
        $user_id =   encryptids("D", $this->input->get('id'));
        $data['user_id'] = $user_id;
        $data['user_details'] = $this->Admin_model->getDetailsAdminById($user_id);
        $main_mod_per = array();
        $sub_mod_per = array();
        $activity_per = array();
        $sub_mod_1 = array();
        $sub_mod_2 = array();
        $sub_mod_3 = array();
        $sub_mod_4 = array();
        $sub_mod_5 = array();
        $sub_mod_6 = array();
        $sub_mod_7 = array();
        $sub_mod_8 = array();
        $sub_mod_9 = array();
        $sub_mod_10 = array();
        $sub_mod_11 = array();
        $sub_mod_12 = array();
        $sub_mod_13 = array();
        $sub_mod_14 = array();


        $sub_mod_15 = array();
        $sub_mod_16 = array();
        $sub_mod_17 = array();
        $sub_mod_18 = array();
        $sub_mod_19 = array();
        $sub_mod_20 = array();
        $sub_mod_21 = array();
        $sub_mod_22 = array();
        $sub_mod_23 = array();
        $sub_mod_24 = array();
        $sub_mod_25 = array();
        $sub_mod_26 = array();
        $sub_mod_27 = array();
        $sub_mod_28 = array();

        $sub_mod_29 = array();
        $sub_mod_30 = array();
        $sub_mod_31 = array();
        $sub_mod_32 = array();
        $sub_mod_33 = array();
        $sub_mod_34 = array();
        $sub_mod_35 = array();
        $sub_mod_36 = array();
        $sub_mod_37 = array();
        $sub_mod_38 = array();
        $sub_mod_39 = array();
        $sub_mod_40 = array();

        $main_mod_4 = array();
        $main_mod_5 = array();
        $main_mod_7 = array();
        $main_mod_9 = array();
        $main_mod_13 = array();




        // to check user permissions 
        $set_permission = $this->Admin_model->toCheckSetPermissions($user_id);
        $id = encryptids("E", $user_id);
        if ($set_permission) {
            $main_mod_per = $this->Admin_model->mainModulePermission($id);
            $sub_mod_per = $this->Admin_model->subModulePermission($id);


            $sub_mod_1 = $this->Admin_model->getUsersPermissionsByUserid($user_id, 1);
            $sub_mod_2 = $this->Admin_model->getUsersPermissionsByUserid($user_id, 2);
            $sub_mod_3 = $this->Admin_model->getUsersPermissionsByUserid($user_id, 3);
            $sub_mod_4 = $this->Admin_model->getUsersPermissionsByUserid($user_id, 4);
            $sub_mod_5 = $this->Admin_model->getUsersPermissionsByUserid($user_id, 5);
            $sub_mod_6 = $this->Admin_model->getUsersPermissionsByUserid($user_id, 6);
            $sub_mod_7 = $this->Admin_model->getUsersPermissionsByUserid($user_id, 7);
            $sub_mod_8 = $this->Admin_model->getUsersPermissionsByUserid($user_id, 8);
            $sub_mod_9 = $this->Admin_model->getUsersPermissionsByUserid($user_id, 9);
            $sub_mod_10 = $this->Admin_model->getUsersPermissionsByUserid($user_id, 10);

            $sub_mod_11 = $this->Admin_model->getUsersPermissionsByUserid($user_id, 11);
            $sub_mod_12 = $this->Admin_model->getUsersPermissionsByUserid($user_id, 12);
            $sub_mod_13 = $this->Admin_model->getUsersPermissionsByUserid($user_id, 13);
            $sub_mod_14 = $this->Admin_model->getUsersPermissionsByUserid($user_id, 14);
            $sub_mod_15 = $this->Admin_model->getUsersPermissionsByUserid($user_id, 15);
            $sub_mod_16 = $this->Admin_model->getUsersPermissionsByUserid($user_id, 16);
            $sub_mod_17 = $this->Admin_model->getUsersPermissionsByUserid($user_id, 17);
            $sub_mod_18 = $this->Admin_model->getUsersPermissionsByUserid($user_id, 18);
            $sub_mod_19 = $this->Admin_model->getUsersPermissionsByUserid($user_id, 19);
            $sub_mod_20 = $this->Admin_model->getUsersPermissionsByUserid($user_id, 20);

            $sub_mod_21 = $this->Admin_model->getUsersPermissionsByUserid($user_id, 21);
            $sub_mod_22 = $this->Admin_model->getUsersPermissionsByUserid($user_id, 22);
            $sub_mod_23 = $this->Admin_model->getUsersPermissionsByUserid($user_id, 23);
            $sub_mod_24 = $this->Admin_model->getUsersPermissionsByUserid($user_id, 24);
            $sub_mod_25 = $this->Admin_model->getUsersPermissionsByUserid($user_id, 25);
            $sub_mod_26 = $this->Admin_model->getUsersPermissionsByUserid($user_id, 26);
            $sub_mod_27 = $this->Admin_model->getUsersPermissionsByUserid($user_id, 27);
            $sub_mod_28 = $this->Admin_model->getUsersPermissionsByUserid($user_id, 28);
            $sub_mod_29 = $this->Admin_model->getUsersPermissionsByUserid($user_id, 29);
            $sub_mod_30 = $this->Admin_model->getUsersPermissionsByUserid($user_id, 30);


            $sub_mod_31 = $this->Admin_model->getUsersPermissionsByUserid($user_id, 31);
            $sub_mod_32 = $this->Admin_model->getUsersPermissionsByUserid($user_id, 32);
            $sub_mod_33 = $this->Admin_model->getUsersPermissionsByUserid($user_id, 33);
            $sub_mod_34 = $this->Admin_model->getUsersPermissionsByUserid($user_id, 34);
            $sub_mod_35 = $this->Admin_model->getUsersPermissionsByUserid($user_id, 35);
            $sub_mod_36 = $this->Admin_model->getUsersPermissionsByUserid($user_id, 36);
            $sub_mod_37 = $this->Admin_model->getUsersPermissionsByUserid($user_id, 37);
            $sub_mod_38 = $this->Admin_model->getUsersPermissionsByUserid($user_id, 38);
            $sub_mod_39 = $this->Admin_model->getUsersPermissionsByUserid($user_id, 39);
            $sub_mod_40 = $this->Admin_model->getUsersPermissionsByUserid($user_id, 40);



            $main_mod_4  =  $this->Admin_model->permissionsByUseridMainModule($user_id, 4);
            $main_mod_5  =  $this->Admin_model->permissionsByUseridMainModule($user_id, 5);

            $main_mod_7  =  $this->Admin_model->permissionsByUseridMainModule($user_id, 7);

            $main_mod_9  =  $this->Admin_model->permissionsByUseridMainModule($user_id, 9);
            $main_mod_13  =  $this->Admin_model->permissionsByUseridMainModule($user_id, 13);
        }
        $data['main_mod_per'] = $main_mod_per;
        $data['sub_mod_per'] = $sub_mod_per;

        $data['sub_mod_1'] = $sub_mod_1;
        $data['sub_mod_2'] = $sub_mod_2;
        $data['sub_mod_3'] = $sub_mod_3;
        $data['sub_mod_4'] = $sub_mod_4;
        $data['sub_mod_5'] = $sub_mod_5;
        $data['sub_mod_6'] = $sub_mod_6;
        $data['sub_mod_7'] = $sub_mod_7;
        $data['sub_mod_8'] = $sub_mod_8;
        $data['sub_mod_9'] = $sub_mod_9;
        $data['sub_mod_10'] = $sub_mod_10;

        $data['sub_mod_11'] = $sub_mod_11;
        $data['sub_mod_12'] = $sub_mod_12;
        $data['sub_mod_13'] = $sub_mod_13;
        $data['sub_mod_14'] = $sub_mod_14;
        $data['sub_mod_15'] = $sub_mod_15;
        $data['sub_mod_16'] = $sub_mod_16;
        $data['sub_mod_17'] = $sub_mod_17;
        $data['sub_mod_18'] = $sub_mod_18;
        $data['sub_mod_19'] = $sub_mod_19;
        $data['sub_mod_20'] = $sub_mod_20;

        $data['sub_mod_21'] = $sub_mod_21;
        $data['sub_mod_22'] = $sub_mod_22;
        $data['sub_mod_23'] = $sub_mod_23;
        $data['sub_mod_24'] = $sub_mod_24;
        $data['sub_mod_25'] = $sub_mod_25;
        $data['sub_mod_26'] = $sub_mod_26;
        $data['sub_mod_27'] = $sub_mod_27;
        $data['sub_mod_28'] = $sub_mod_28;
        $data['sub_mod_29'] = $sub_mod_29;
        $data['sub_mod_30'] = $sub_mod_30;

        $data['sub_mod_31'] = $sub_mod_31;
        $data['sub_mod_32'] = $sub_mod_32;
        $data['sub_mod_33'] = $sub_mod_33;
        $data['sub_mod_34'] = $sub_mod_34;
        $data['sub_mod_35'] = $sub_mod_35;
        $data['sub_mod_36'] = $sub_mod_36;
        $data['sub_mod_37'] = $sub_mod_37;
        $data['sub_mod_38'] = $sub_mod_38;
        $data['sub_mod_39'] = $sub_mod_39;
        $data['sub_mod_40'] = $sub_mod_40;


        $data['main_mod_4'] = $main_mod_4;
        $data['main_mod_5'] = $main_mod_5;
        $data['main_mod_7'] = $main_mod_7;
        $data['main_mod_9'] = $main_mod_9;
        $data['main_mod_13'] = $main_mod_13;





        $this->load->view('admin/headers/admin_header');
        $this->load->view('admin/set_permission', $data);
        $this->load->view('admin/footers/admin_footer');
    }
    public function add_permissions()
    {
        $data = array();
        $mainModule = array();
        $subModule = array();
        // $createQuiz = array();
        // $manageQuiz = array();


        $user_id = $this->input->post('user_id');
        $set_permission = $this->Admin_model->toCheckSetPermissions($user_id);
        if ($set_permission) {
            $this->Admin_model->deleteSetPermissions($user_id);
        }

        $mainModule = $this->input->post('mainModule');
        $subModule = $this->input->post('subModule');

        // echo json_encode($mainModule);
        // echo json_encode($subModule);
        // exit();
        // 1 - QUIZ 1-6
        $createQuiz = $this->input->post('createQuiz');
        $manageQuiz = $this->input->post('manageQuiz');
        $ongoingQuiz = $this->input->post('ongoingQuiz');
        $closedQuiz = $this->input->post('closedQuiz');
        $queBank = $this->input->post('queBank');
        $result = $this->input->post('result');

        // 2 - STANDARD WRITING 7-11
        $createComp = $this->input->post('createComp');
        $manageComp = $this->input->post('manageComp');
        $ongoingComp = $this->input->post('ongoingComp');
        $closedComp = $this->input->post('closedComp');
        $reviewComp = $this->input->post('reviewComp');

        // 3 - Miscellaneous Competition 12-16
        $misCreateComp = $this->input->post('misCreateComp');
        $misManageComp = $this->input->post('misManageComp');
        $misOngoingComp = $this->input->post('misOngoingComp');
        $misClosedComp = $this->input->post('misClosedComp');
        $misReviewComp = $this->input->post('misReviewComp');
        // 4 - WALL OF WISDOM
        $wallOfWisdom = $this->input->post('wallOfWisdom');
        //  5 - Your Wall

        $yourWall = $this->input->post('yourWall');
        //   6 - Classroom 17-20
        $createClassroomPost = $this->input->post('createClassroomPost');
        $manageClassroomPost = $this->input->post('manageClassroomPost');
        $publishClassroomPost = $this->input->post('publishClassroomPost');
        $archiveClassroomPost = $this->input->post('archiveClassroomPost');
        //7 - By the Mentors
        $byTheMentors = $this->input->post('byTheMentors');

        // 8 - CMS 21- 28
        $bannerImage = $this->input->post('bannerImage');
        $exchangeForum = $this->input->post('exchangeForum');
        $contactUs = $this->input->post('contactUs');
        $footerLinks = $this->input->post('footerLinks');
        $gallery = $this->input->post('gallery');
        $feedback = $this->input->post('feedback');
        $latestNews = $this->input->post('latestNews');
        $UpcomingEvents = $this->input->post('UpcomingEvents');
        //  9 - Winners Wall
        $winnersWall = $this->input->post('winnersWall');
        // 10 - Share your thoughts 29-34
        $newWork = $this->input->post('newWork');
        $draft = $this->input->post('draft');
        $newStd = $this->input->post('newStd');
        $stdReview = $this->input->post('stdReview');
        $revisedStd = $this->input->post('revisedStd');
        $disForum = $this->input->post('disForum');
        // 11 - Join the Class Room 35-38   
        $liveSession = $this->input->post('liveSession');
        $manageSession = $this->input->post('manageSession');
        $publishedPost = $this->input->post('publishedPost');
        $archivedPost = $this->input->post('archivedPost');
        //12 - In Conversation with Expert 39-40
        $conExpert = $this->input->post('conExpert');
        $conArchive = $this->input->post('conArchive');

        //13 - Banner Image world of standard
        $worldOfStd = $this->input->post('worldOfStd');

        if (empty($mainModule)) {
            $data['status'] = 0;
            $data['message'] = 'Please enter atleast one Main Module and Sub module';
        }
        if (empty($data)) {
            /******************  
             * 1. QUIZ START 
             * ****************/ {
                if (in_array(1, $mainModule)) {
                    if (in_array(1, $subModule)) {
                        $createQuiz_per = implode(',', $createQuiz);
                        $mainM = 1;
                        $subM = 1;
                        $id = $this->insertPerData($user_id, $mainM, $subM, $createQuiz_per);
                    }
                }
                if (in_array(1, $mainModule)) {
                    if (in_array(2, $subModule)) {
                        $manageQuiz_per = implode(',', $manageQuiz);
                        $mainM = 1;
                        $subM = 2;
                        $id = $this->insertPerData($user_id, $mainM, $subM, $manageQuiz_per);
                    }
                }
                if (in_array(1, $mainModule)) {
                    if (in_array(3, $subModule)) {
                        $ongoingQuiz_per = implode(',', $ongoingQuiz);
                        $mainM = 1;
                        $subM = 3;
                        $id = $this->insertPerData($user_id, $mainM, $subM, $ongoingQuiz_per);
                    }
                }
                if (in_array(1, $mainModule)) {
                    if (in_array(4, $subModule)) {
                        $closedQuiz_per = implode(',', $closedQuiz);
                        $mainM = 1;
                        $subM = 4;
                        $id = $this->insertPerData($user_id, $mainM, $subM, $closedQuiz_per);
                    }
                }
                if (in_array(1, $mainModule)) {
                    if (in_array(5, $subModule)) {
                        $queBank_per = implode(',', $queBank);
                        $mainM = 1;
                        $subM = 5;
                        $id = $this->insertPerData($user_id, $mainM, $subM, $queBank_per);
                    }
                }
                if (in_array(1, $mainModule)) {
                    if (in_array(6, $subModule)) {
                        $result_per = implode(',', $result);
                        $mainM = 1;
                        $subM = 6;
                        $id = $this->insertPerData($user_id, $mainM, $subM, $result_per);
                    }
                }
            }
            /******************  
             * 2 .STANDARD WRITING
             * ****************/ {
                if (in_array(2, $mainModule)) {
                    if (in_array(7, $subModule)) {
                        $createComp = implode(',', $createComp);
                        $mainM = 2;
                        $subM = 7;
                        $id = $this->insertPerData($user_id, $mainM, $subM, $createComp);
                    }
                }
                if (in_array(2, $mainModule)) {
                    if (in_array(8, $subModule)) {
                        $manageComp = implode(',', $manageComp);
                        $mainM = 2;
                        $subM = 8;
                        $id = $this->insertPerData($user_id, $mainM, $subM, $manageComp);
                    }
                }
                if (in_array(2, $mainModule)) {
                    if (in_array(9, $subModule)) {
                        $ongoingComp = implode(',', $ongoingComp);
                        $mainM = 2;
                        $subM = 9;
                        $id = $this->insertPerData($user_id, $mainM, $subM, $ongoingComp);
                    }
                }
                if (in_array(2, $mainModule)) {
                    if (in_array(10, $subModule)) {
                        $closedComp = implode(',', $closedComp);
                        $mainM = 2;
                        $subM = 10;
                        $id = $this->insertPerData($user_id, $mainM, $subM, $closedComp);
                    }
                }
                if (in_array(2, $mainModule)) {
                    if (in_array(11, $subModule)) {
                        $reviewComp = implode(',', $reviewComp);
                        $mainM = 2;
                        $subM = 11;
                        $id = $this->insertPerData($user_id, $mainM, $subM, $reviewComp);
                    }
                }
            }
            /******************  
             * 3 .Miscellaneous Competition
             * ****************/ {
                if (in_array(3, $mainModule)) {
                    if (in_array(12, $subModule)) {
                        $misCreateComp = implode(',', $misCreateComp);
                        $mainM = 3;
                        $subM = 12;
                        $id = $this->insertPerData($user_id, $mainM, $subM, $misCreateComp);
                    }
                }
                if (in_array(3, $mainModule)) {
                    if (in_array(13, $subModule)) {
                        $misManageComp = implode(',', $misManageComp);
                        $mainM = 3;
                        $subM = 13;
                        $id = $this->insertPerData($user_id, $mainM, $subM, $misManageComp);
                    }
                }
                if (in_array(3, $mainModule)) {
                    if (in_array(14, $subModule)) {
                        $misOngoingComp = implode(',', $misOngoingComp);
                        $mainM = 3;
                        $subM = 14;
                        $id = $this->insertPerData($user_id, $mainM, $subM, $misOngoingComp);
                    }
                }
                if (in_array(3, $mainModule)) {
                    if (in_array(15, $subModule)) {
                        $misClosedComp = implode(',', $misClosedComp);
                        $mainM = 3;
                        $subM = 15;
                        $id = $this->insertPerData($user_id, $mainM, $subM, $misClosedComp);
                    }
                }
                if (in_array(3, $mainModule)) {
                    if (in_array(16, $subModule)) {
                        $misReviewComp = implode(',', $misReviewComp);
                        $mainM = 3;
                        $subM = 16;
                        $id = $this->insertPerData($user_id, $mainM, $subM, $misReviewComp);
                    }
                }
            }
            /******************  
             * 4 .Wall of wisdom
             * ****************/

            if (in_array(4, $mainModule)) {

                $wallOfWisdom = implode(',', $wallOfWisdom);
                $mainM = 4;
                $subM = 0;
                $id = $this->insertPerData($user_id, $mainM, $subM, $wallOfWisdom);
            }
            /******************  
             * 5 . Your Wall
             * ****************/

            if (in_array(5, $mainModule)) {

                $yourWall = implode(',', $yourWall);
                $mainM = 5;
                $subM = 0;
                $id = $this->insertPerData($user_id, $mainM, $subM, $yourWall);
            }

            /******************  
             * 6 - Classroom 17-20
             * ****************/ {
                if (in_array(6, $mainModule)) {
                    if (in_array(17, $subModule)) {
                        $createClassroomPost = implode(',', $createClassroomPost);
                        $mainM = 6;
                        $subM = 17;
                        $id = $this->insertPerData($user_id, $mainM, $subM, $createClassroomPost);
                    }
                }
                if (in_array(6, $mainModule)) {
                    if (in_array(18, $subModule)) {
                        $manageClassroomPost = implode(',', $manageClassroomPost);
                        $mainM = 6;
                        $subM = 18;
                        $id = $this->insertPerData($user_id, $mainM, $subM, $manageClassroomPost);
                    }
                }
                if (in_array(6, $mainModule)) {
                    if (in_array(19, $subModule)) {
                        $publishClassroomPost = implode(',', $publishClassroomPost);
                        $mainM = 6;
                        $subM = 19;
                        $id = $this->insertPerData($user_id, $mainM, $subM, $publishClassroomPost);
                    }
                }
                if (in_array(6, $mainModule)) {
                    if (in_array(20, $subModule)) {
                        $archiveClassroomPost = implode(',', $archiveClassroomPost);
                        $mainM = 6;
                        $subM = 20;
                        $id = $this->insertPerData($user_id, $mainM, $subM, $archiveClassroomPost);
                    }
                }
            }
            /******************  
             * 7 - By the Mentors
             * ****************/
            if (in_array(7, $mainModule)) {

                $byTheMentors = implode(',', $byTheMentors);
                $mainM = 7;
                $subM = 0;
                $id = $this->insertPerData($user_id, $mainM, $subM, $byTheMentors);
            }
            /******************  
             * 8 - CMS 21- 28
             * ****************/ {
                if (in_array(8, $mainModule)) {
                    if (in_array(21, $subModule)) {
                        $bannerImage = implode(',', $bannerImage);
                        $mainM = 8;
                        $subM = 21;
                        $id = $this->insertPerData($user_id, $mainM, $subM, $bannerImage);
                    }
                }
                if (in_array(8, $mainModule)) {
                    if (in_array(22, $subModule)) {
                        $exchangeForum = implode(',', $exchangeForum);
                        $mainM = 8;
                        $subM = 22;
                        $id = $this->insertPerData($user_id, $mainM, $subM, $exchangeForum);
                    }
                }
                if (in_array(8, $mainModule)) {
                    if (in_array(23, $subModule)) {
                        $contactUs = implode(',', $contactUs);
                        $mainM = 8;
                        $subM = 23;
                        $id = $this->insertPerData($user_id, $mainM, $subM, $contactUs);
                    }
                }
                if (in_array(8, $mainModule)) {
                    if (in_array(24, $subModule)) {
                        $footerLinks = implode(',', $footerLinks);
                        $mainM = 8;
                        $subM = 24;
                        $id = $this->insertPerData($user_id, $mainM, $subM, $footerLinks);
                    }
                }
                if (in_array(8, $mainModule)) {
                    if (in_array(25, $subModule)) {
                        $gallery = implode(',', $gallery);
                        $mainM = 8;
                        $subM = 25;
                        $id = $this->insertPerData($user_id, $mainM, $subM, $gallery);
                    }
                }
                if (in_array(8, $mainModule)) {
                    if (in_array(26, $subModule)) {
                        $feedback = implode(',', $feedback);
                        $mainM = 8;
                        $subM = 26;
                        $id = $this->insertPerData($user_id, $mainM, $subM, $feedback);
                    }
                }
                if (in_array(8, $mainModule)) {
                    if (in_array(27, $subModule)) {
                        $latestNews = implode(',', $latestNews);
                        $mainM = 8;
                        $subM = 27;
                        $id = $this->insertPerData($user_id, $mainM, $subM, $latestNews);
                    }
                }
                if (in_array(8, $mainModule)) {
                    if (in_array(28, $subModule)) {
                        $UpcomingEvents = implode(',', $UpcomingEvents);
                        $mainM = 8;
                        $subM = 28;
                        $id = $this->insertPerData($user_id, $mainM, $subM, $UpcomingEvents);
                    }
                }
            }
            /******************  
             * 9 - Winners Wall
             * ****************/
            if (in_array(9, $mainModule)) {

                $winnersWall = implode(',', $winnersWall);
                $mainM = 9;
                $subM = 0;
                $id = $this->insertPerData($user_id, $mainM, $subM, $winnersWall);
            }
            /******************  
             * 10 - Share your thoughts 29-34
             * ****************/ {
                if (in_array(10, $mainModule)) {
                    if (in_array(29, $subModule)) {
                        $newWork = implode(',', $newWork);
                        $mainM = 10;
                        $subM = 29;
                        $id = $this->insertPerData($user_id, $mainM, $subM, $newWork);
                    }
                }
                if (in_array(10, $mainModule)) {
                    if (in_array(30, $subModule)) {
                        $draft = implode(',', $draft);
                        $mainM = 10;
                        $subM = 30;
                        $id = $this->insertPerData($user_id, $mainM, $subM, $draft);
                    }
                }
                if (in_array(10, $mainModule)) {
                    if (in_array(31, $subModule)) {
                        $newStd = implode(',', $newStd);
                        $mainM = 10;
                        $subM = 31;
                        $id = $this->insertPerData($user_id, $mainM, $subM, $newStd);
                    }
                }
                if (in_array(10, $mainModule)) {
                    if (in_array(32, $subModule)) {
                        $stdReview = implode(',', $stdReview);
                        $mainM = 10;
                        $subM = 32;
                        $id = $this->insertPerData($user_id, $mainM, $subM, $stdReview);
                    }
                }
                if (in_array(10, $mainModule)) {
                    if (in_array(33, $subModule)) {
                        $revisedStd = implode(',', $revisedStd);
                        $mainM = 10;
                        $subM = 33;
                        $id = $this->insertPerData($user_id, $mainM, $subM, $revisedStd);
                    }
                }
                if (in_array(10, $mainModule)) {
                    if (in_array(34, $subModule)) {
                        $disForum = implode(',', $disForum);
                        $mainM = 10;
                        $subM = 34;
                        $id = $this->insertPerData($user_id, $mainM, $subM, $disForum);
                    }
                }
            }
            /******************  
             * 11 - Join the Class Room 35-38
             * ****************/ {
                if (in_array(11, $mainModule)) {
                    if (in_array(35, $subModule)) {
                        $liveSession = implode(',', $liveSession);
                        $mainM = 11;
                        $subM = 35;
                        $id = $this->insertPerData($user_id, $mainM, $subM, $liveSession);
                    }
                }
                if (in_array(11, $mainModule)) {
                    if (in_array(36, $subModule)) {
                        $manageSession = implode(',', $manageSession);
                        $mainM = 11;
                        $subM = 36;
                        $id = $this->insertPerData($user_id, $mainM, $subM, $manageSession);
                    }
                }
                if (in_array(11, $mainModule)) {
                    if (in_array(37, $subModule)) {
                        $publishedPost = implode(',', $publishedPost);
                        $mainM = 11;
                        $subM = 37;
                        $id = $this->insertPerData($user_id, $mainM, $subM, $publishedPost);
                    }
                }
                if (in_array(11, $mainModule)) {
                    if (in_array(38, $subModule)) {
                        $archivedPost = implode(',', $archivedPost);
                        $mainM = 11;
                        $subM = 38;
                        $id = $this->insertPerData($user_id, $mainM, $subM, $archivedPost);
                    }
                }
            }
            /******************  
             * 12 - In Conversation with Expert 39-40
             * ****************/ {
                if (in_array(12, $mainModule)) {
                    if (in_array(39, $subModule)) {
                        $conExpert = implode(',', $conExpert);
                        $mainM = 12;
                        $subM = 39;
                        $id = $this->insertPerData($user_id, $mainM, $subM, $conExpert);
                    }
                }
                if (in_array(12, $mainModule)) {
                    if (in_array(40, $subModule)) {
                        $conArchive = implode(',', $conArchive);
                        $mainM = 12;
                        $subM = 40;
                        $id = $this->insertPerData($user_id, $mainM, $subM, $conArchive);
                    }
                }
            }
            /******************  
             * 13 - Banner Image world of standard
             * ****************/
            if (in_array(13, $mainModule)) {
                $worldOfStd = implode(',', $worldOfStd);
                $mainM = 13;
                $subM = 0;
                $id = $this->insertPerData($user_id, $mainM, $subM, $worldOfStd);
            }
        }
        if ($id) {
            $data['status'] = 1;
            $data['message'] = 'Permissions added Successfully';
            $data['id'] = $id;
        } else {
            $data['status'] = 0;
            $data['message'] = 'Error, Please try again';
        }
        echo  json_encode($data);
        exit();
    }

    public function login()
    {
        $this->load->view('Users/headers/login_header');
        $this->load->view('Users/login');
        $this->load->view('Users/footers/login_footer');
    }

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
            $user        = $this->Admin_model->getLoginUsers($username, $password);
            //echo json_encode( $user ); exit();
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
                $sess_arr         = array("admin_id" => $admin_id, "admin_email" => $admin_email, "admin_type" => $admin_type, "admin_post" => $admin_post, "admin_name" => $admin_name);
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
    }
    public function logout()
    {
        $id = encryptids("D", $_SESSION['admin_id']);
        $user_log_id = encryptids("D", $_SESSION['user_log_id']);

        //  echo $id ; exit();
        $logs = array(
            'logout_on' => GetCurrentDateTime('Y-m-d H:i:s')

        );
        $insert_logs = $this->Admin_model->updateUsersLogs($id, $user_log_id, $logs);


        $this->Admin_model->adminLogout();
        //$this->session->session_unset();
        $this->session->sess_destroy();
        redirect(base_url() . 'Users');
        exit();
    }
    public function users()
    {
        $this->load->view('admin/headers/admin_header');
        $this->load->view('admin/user_management');
        $this->load->view('admin/footers/admin_footer');
    }
    public function feedback()
    {
        if (encryptids("D", $_SESSION['admin_type']) == 3) {
            //  print_r($_SESSION); die;
            if (in_array(26, $_SESSION['sub_mod_per'])) {
                $sub_model_id = 26;
                $permissions = $this->Admin_model->getUsersPermissions($sub_model_id);
            } else {
                $sub_model_id = 0;
                $permissions = $this->Admin_model->getUsersPermissions($sub_model_id);
            }
            $data['permissions'] =  $permissions;
        }
        //  print_r($data); die;
        $this->load->model('Users/Users_model');
        $data['feedback'] = $this->Users_model->get_feedback_data();
        $this->load->view('admin/headers/admin_header');
        $this->load->view('admin/feedback', $data);
        $this->load->view('admin/footers/admin_footer');
    }
    public function feedback_archive()
    {
        $this->load->model('Users/Users_model');
        $data['feedback'] = $this->Users_model->getArchivedFeedback();
        $this->load->view('admin/headers/admin_header');
        $this->load->view('admin/archive_feedback', $data);
        $this->load->view('admin/footers/admin_footer');
    }
    public function profile_list()
    {
        
        $this->load->view('admin/headers/admin_header');
        $this->load->view('admin/profile_list');
        $this->load->view('admin/footers/admin_footer');
    }
    public function archive_feedback($id)
    {
        $this->load->model('Users/Users_model');
        $result = $this->Users_model->feedback_archive($id);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    public function restore_feedback($id)
    {
        $this->load->model('Users/Users_model');
        $result = $this->Users_model->restore_feedback($id);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    public function feedback_view()
    {
        $this->load->view('admin/headers/admin_header');
        $this->load->view('admin/feedback_view');
        $this->load->view('admin/footers/admin_footer');
    }
    public function letest_news()
    {
        if (encryptids("D", $_SESSION['admin_type']) == 3) {
            //  print_r($_SESSION); die;
            if (in_array(27, $_SESSION['sub_mod_per'])) {
                $sub_model_id = 27;
                $permissions = $this->Admin_model->getUsersPermissions($sub_model_id);
            } else {
                $sub_model_id = 0;
                $permissions = $this->Admin_model->getUsersPermissions($sub_model_id);
            }
            $data['permissions'] =  $permissions;
        } else {
            $data['permissions'] = "";
        }
        // echo "hiiii"; die;
        $data['news'] = $this->Admin_model->getLetestNews();
        // print_r($data); die;
        $this->load->view('admin/headers/admin_header');
        $this->load->view('admin/letest_news', $data);
        $this->load->view('admin/footers/admin_footer');
    }
    public function editLetestNews($id)
    {
        $f_id = encryptids("D", $id);
        // return $f_id;die;
        $result = $this->Admin_model->editLetestNews($f_id);
        echo $result;
    }
    public function archived_news()
    {
        $data['news'] = $this->Admin_model->archivedLetestNews();
        $this->load->view('admin/headers/admin_header');
        $this->load->view('admin/archived_news', $data);
        $this->load->view('admin/footers/admin_footer');
    }
    public function addLetestNews()
    {
        $title =  $this->input->post('title');
        $description =  $this->input->post('description');

        if (!file_exists('uploads/letest_news')) {
            mkdir('uploads/letest_news', 0777, true);
        }

        $banner_img = "news" . time() . '.jpg';
        $config['upload_path'] = './uploads/letest_news';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size']    = '204800';
        $config['max_width']  = '3024';
        $config['max_height']  = '2024';

        $config['file_name'] = $banner_img;

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('thumbnail')) {
            $data['status'] = 0;
            $data['message'] = $this->upload->display_errors();
        }

        $formdata['thumbnail'] = $banner_img;
        $formdata['title'] = $title;
        $formdata['description'] = $description;

        $id = $this->Admin_model->addLetestNews($formdata);
        if ($id) {
            $this->session->set_flashdata('MSG',  ShowAlert("Letest news recorded successfully.", "DD"));
            redirect(base_url() . "Admin/letest_news", 'refresh');
        }
    }
    public function restoreLetestNews($id)
    {
        $f_id = encryptids("D", $id);
        $data = $this->Admin_model->restoreLetestNews($f_id);
        if ($data) {
            return true;
        } else {
            return false;
        }
    }
    public function letest_news_view($id)
    {
        $f_id = encryptids("D", $id);
        $data['result'] = $this->Admin_model->getLetestNewsDetail($f_id);
        // print_r($data); die;
        $this->load->view('admin/headers/admin_header');
        $this->load->view('admin/letest_news_view', $data);
        $this->load->view('admin/footers/admin_footer');
    }
    public function deleteLetestNews($id)
    {
        $f_id = encryptids("D", $id);
        $data = $this->Admin_model->deleteLetestNews($f_id);
        if ($data) {
            return true;
        } else {
            return false;
        }
    }
    public function publishLetestNews($id)
    {
        $f_id = encryptids("D", $id);
        // echo $f_id; die;
        // return $f_id; die;
        $data = $this->Admin_model->publishLetestNews($f_id);
        if ($data) {
            return true;
        } else {
            return false;
        }
    }
    public function unpublishLetestNews($id)
    {
        $f_id = encryptids("D", $id);
        $data = $this->Admin_model->unpublishLetestNews($f_id);
        if ($data) {
            return true;
        } else {
            return false;
        }
    }
    public function archiveLetestNews($id)
    {
        // echo $id; die;
        $f_id = encryptids("D", $id);
        $data = $this->Admin_model->archiveLetestNews($f_id);
        if ($data) {
            return true;
        } else {
            return false;
        }
    }
    public function updateNews()
    {
        // print_r($_FILES); die;
        if (!file_exists('uploads/letest_news')) {
            mkdir('uploads/letest_news', 0777, true);
        }
        //print_r([$_POST['old_image']]); die;
        $formdata['id'] = $this->input->post('edit_id');
        //$formdata['title'] = $this->input->post('title');
        $formdata['description'] = $this->input->post('description');
        $formdata['title'] = $this->input->post('banner_caption');
        $formdata['status'] = '1';

        $oldDocument = "";
        $oldDocument = $this->input->post('old_doc');
        $document = "";

        if (!empty($_FILES['document']['tmp_name'])) {
            $document = "letest_news" . time() . '.jpg';
            $config['upload_path'] = './uploads/letest_news';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size']    = '204800';
            $config['max_width']  = '3024';
            $config['max_height']  = '2024';
            $config['file_name'] = $document;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('document')) {
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
            $formdata['thumbnail'] = $document;
        }
        // $formdata['status']="1";
        $id = $this->Admin_model->updateLetestNews($formdata);
        if ($id) {
            $this->session->set_flashdata('MSG', ShowAlert("Record Updated Successfully", "SS"));
            redirect(base_url() . "admin/letest_news", 'refresh');
        } else {
            $this->session->set_flashdata('MSG', ShowAlert("Failed to update record,Please try again", "DD"));
            redirect(base_url() . "admin/letest_news", 'refresh');
        }
    }





    public function upcoming_events()
    {
        // print_r($_SESSION); die;
        if (encryptids("D", $_SESSION['admin_type']) == 3) {
            //  print_r($_SESSION); die;
            if (in_array(28, $_SESSION['sub_mod_per'])) {
                $sub_model_id = 28;
                $permissions = $this->Admin_model->getUsersPermissions($sub_model_id);
            } else {
                $sub_model_id = 0;
                $permissions = $this->Admin_model->getUsersPermissions($sub_model_id);
            }
            $data['permissions'] =  $permissions;
        }
        //print_r($data); die;
        $data['events'] = $this->Admin_model->getEvent();
        $this->load->view('admin/headers/admin_header');
        $this->load->view('admin/upcoming_events', $data);
        $this->load->view('admin/footers/admin_footer');
    }

    public function addEvents()
    {

        $data['title'] =  $this->input->post('title');
        $data['link'] =  $this->input->post('link');

        if (!file_exists('uploads/cms/events')) {
            mkdir('uploads/cms/events', 0777, true);
        }

        $banner_img = "events" . time() . '.jpg';
        $config['upload_path'] = './uploads/cms/events';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size']    = '204800';
        $config['max_width']  = '3024';
        $config['max_height']  = '2024';

        $config['file_name'] = $banner_img;

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('thumbnail')) {
            $data['status'] = 0;
            $data['message'] = $this->upload->display_errors();
        }

        $data['thumbnail'] = $banner_img;
        $data['status'] = '1';
        // print_r($data); die;

        $id = $this->Admin_model->addEvent($data);
        if ($id) {
            $this->session->set_flashdata('MSG',  ShowAlert("Letest event recorded successfully.", "DD"));
            redirect(base_url() . "admin/upcoming_events", 'refresh');
        }
    }
    public function deleteEvents($id)
    {
        $f_id = encryptids("D", $id);
        $data = $this->Admin_model->deleteEvents($f_id);
        if ($data) {
            return true;
        } else {
            return false;
        }
    }
    public function publishEvent($id)
    {
        $f_id = encryptids("D", $id);
        // echo $f_id; die;
        // return $f_id; die;
        $data = $this->Admin_model->publishEvent($f_id);
        if ($data) {
            return true;
        } else {
            return false;
        }
    }
    public function unpublishEvent($id)
    {
        $f_id = encryptids("D", $id);
        $data = $this->Admin_model->unpublishEvent($f_id);
        if ($data) {
            return true;
        } else {
            return false;
        }
    }
    public function archiveEvent($id)
    {
        // echo $id; die;
        $f_id = encryptids("D", $id);
        $data = $this->Admin_model->archiveEvent($f_id);
        if ($data) {
            return true;
        } else {
            return false;
        }
    }
    public function restoreEvent($id)
    {
        // echo $id; die;
        $f_id = encryptids("D", $id);
        $data = $this->Admin_model->restoreEvent($f_id);
        if ($data) {
            return true;
        } else {
            return false;
        }
    }
    public function archived_events()
    {
        $data['events'] = $this->Admin_model->archivedEvents();
        $this->load->view('admin/headers/admin_header');
        $this->load->view('admin/archived_events', $data);
        $this->load->view('admin/footers/admin_footer');
    }
    public function editEvents($id)
    {
        $f_id = encryptids("D", $id);
        // return $f_id;die;
        $result = $this->Admin_model->editEvents($f_id);
        echo $result;
    }
    public function updateEvents()
    {
        // print_r($_POST); 
        // print_r($_FILES); die;
        $formdata['title'] =  $this->input->post('title1');
        $formdata['link'] =  $this->input->post('link');

        if (!file_exists('uploads/cms/events')) {
            mkdir('uploads/cms/events', 0777, true);
        }

        //print_r([$_POST['old_image']]); die;
        $formdata['id'] = $this->input->post('id');

        $formdata['status'] = '1';

        $oldDocument = "";
        $oldDocument = $this->input->post('old_doc');
        $document = "";

        if (!empty($_FILES['document']['tmp_name'])) {
            $document = "events" . time() . '.jpg';
            $config['upload_path'] = './uploads/cms/events';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size']    = '204800';
            $config['max_width']  = '3024';
            $config['max_height']  = '2024';
            $config['file_name'] = $document;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('document')) {
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
            $formdata['thumbnail'] = $document;
        }
        // print_r($formdata); die;
        // $formdata['status']="1";
        $id = $this->Admin_model->updateEvents($formdata);
        if ($id) {
            $this->session->set_flashdata('MSG', ShowAlert("Record Updated Successfully", "SS"));
            redirect(base_url() . "admin/upcoming_events", 'refresh');
        } else {
            $this->session->set_flashdata('MSG', ShowAlert("Failed to update record,Please try again", "DD"));
            redirect(base_url() . "admin/upcoming_events", 'refresh');
        }
    }
    public function events_view($id)
    {
        $f_id = encryptids("D", $id);
        $data['result'] = $this->Admin_model->getEventDetail($f_id);
        // print_r($data); die;
        $this->load->view('admin/headers/admin_header');
        $this->load->view('admin/events_view', $data);
        $this->load->view('admin/footers/admin_footer');
    }



    public function insertPerData($user_id, $mainM, $subM, $permissions)
    {
        $admin_id = encryptids("D", $this->session->userdata('admin_id'));
        $dataObj = array(
            'user_id' => $user_id,
            'main_module_id' => $mainM,
            'sub_module_id' => $subM,
            'permissions' => $permissions,
            'status' => 1,
            'created_by' => $admin_id,
            'created_on' => GetCurrentDateTime('Y-m-d H:i:s')

        );
        $id = $this->Admin_model->insertPermissionData($dataObj);
        return $id;
    }
    public function log_dashboard()
    {
        $this->load->view('admin/headers/admin_header');
        $this->load->view('admin/log_dashboard');
        $this->load->view('admin/footers/admin_footer');
    }
    public function login_report_list()
    {
        $data = array();
        $allRecords = array();

        $allRecords = $this->Admin_model->getUsersLoginReport();
        $data['allRecords'] = $allRecords;
        $this->load->view('admin/headers/admin_header');
        $this->load->view('admin/login_report_list', $data);
        $this->load->view('admin/footers/admin_footer');
    }
    public function log_report_list()
    {
        $data = array();
        $adminallRecords = array();
        $allRecords = $this->Admin_model->getAllLogs();





        $data['allRecords'] = $allRecords;
        $this->load->view('admin/headers/admin_header');
        $this->load->view('admin/log_report_list', $data);
        $this->load->view('admin/footers/admin_footer');
    }
    public function feedback_detail($id)
    {
        $f_id = encryptids("D", $id);
        // echo $f_id; die;
        $this->load->model('Users/Users_model');
        $data['feedback'] = $this->Users_model->get_feedback_detail($f_id);
        $this->load->view('admin/headers/admin_header');
        // print_r($data); die;
        $this->load->view('admin/feedback_detail', $data);
        $this->load->view('admin/footers/admin_footer');
    }
    public function delete_feedback($id)
    {
        $this->load->model('Users/Users_model');
        $result = $this->Users_model->delete_feedback($id);
        if ($result) {
            return true;
        } else {
            return false;
        }
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
        curl_close($curl_req);
        // exit();
        // var_dump(json_decode($response, true));
        $output = json_decode($response, true);

        $token = $output['data']['auth_token'];
        //echo $token;
        // echo json_encode($output);
        $input = $this->input->post('uid');
        $uidtype = $this->input->post('uidtype');
        
        $curl_req1 = curl_init();
        $parametersNew = json_encode(array(
            "token" => $token,
            "input" => $input,
            "search_by" => $uidtype,
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
    public function admin_creation_form()
    {

        $this->load->view('admin/headers/admin_header');
        $this->load->view('admin/admin_creation_form');
        $this->load->view('admin/footers/admin_footer');
    }

    public function addAdmin()
    {
        $this->form_validation->set_rules('name', 'Name', 'required|trim|max_length[50]');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|max_length[30]|valid_email');
        // $this->form_validation->set_rules('designation', 'Designation', 'required|trim|max_length[50]');
        // $this->form_validation->set_rules('branch', 'Branch', 'required|trim|max_length[50]');
        // $this->form_validation->set_rules('post', 'Post', 'required|trim|max_length[50]');
        // $this->form_validation->set_rules('department', 'Department', 'required|trim|max_length[50]');
        // $this->form_validation->set_rules('username', 'Username', 'required|trim|max_length[50]');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('MSG', ShowAlert(validation_errors(), "DD"));
            redirect(base_url() . "Admin/admin_creation_form", 'refresh');
            return false;
        } else {
            $uid        = clearText($this->input->post('uid'));
            $name        = clearText($this->input->post('name'));
            $email_id        = clearText($this->input->post('email'));
            // $designation        = clearText($this->input->post('designation'));
            // $branch        = clearText($this->input->post('branch'));
            // $post        = clearText($this->input->post('post'));
            // $department        = clearText($this->input->post('department'));
            // $username        = clearText($this->input->post('username'));
            //$random_pass	 = $this->randomPassword();
            $random_pass     = 12345678;
            //$newPw = password_hash($random_pass, PASSWORD_BCRYPT);
            $admin_type = 2;
            $data = array(
                'user_uid' => $uid,
                'name' => $name,
                'email_id' => $email_id,
                'designation' => 2,
                // 'branch' => $branch,
                // 'post' => $post,
                // 'department' => $department,
                'is_active' => 1,
                'username' => $email_id,
                'password' => $random_pass,
                'admin_type' => $admin_type,
                'created_by' => 1
                // 'modified_by' => 1
                //'created_on' => GetCurrentDateTime('Y-m-d H:i:s'),
            );
            $admin_id = $this->Admin_model->insertData($data);

            if ($admin_id) {

                // email to Admin to notify  start
                $msg = "Dear " . $name .
                    " <p>You are added on the BIS Portal as Admin . Your login credentials for the portal are:
                    </p>
                    <p>Username: " . $email_id . "</p>
                    <p>Password: " . $random_pass . "</p>";
                $subject = "Login Credentials for the BIS Portal.";

                $config = array(
                    'protocol' => 'smtp',
                    'smtp_host' => 'ssl://smtp.googlemail.com',
                    'smtp_port' => 465,
                    'smtp_user' => 'exchangeforum1@gmail.com',
                    'smtp_pass' => 'niycbrjxnzfazrud',
                    'mailtype' => 'html',
                    'charset' => 'iso-8859-1',
                );

                $this->load->library('email', $config);
                $this->email->initialize($config); // add this line
                $this->email->set_newline("\r\n");
                $this->email->from('exchangeforum1@gmail.com', 'BIS');
                $this->email->to($email_id);
                $this->email->subject($subject);
                $this->email->message($msg);
                $this->email->send();
                // email code end


                $this->session->set_flashdata('MSG', ShowAlert("New Admin added successfully", "SS"));
                redirect(base_url() . "Admin/admin_creation_list", 'refresh');
            } else {
                $this->session->set_flashdata('MSG', ShowAlert("Failed to create new admin,Please try again", "DD"));
                redirect(base_url() . "Admin/admin_creation_list", 'refresh');
            }
        }
    }
    public function editAdmin()
    {
        $data = array();
        $id =   encryptids("D", $this->input->get('id'));
        $data['record'] = $this->Admin_model->getDetailsById($id);

        $this->load->view('admin/headers/admin_header');
        $this->load->view('admin/admin_creation_edit', $data);
        $this->load->view('admin/footers/admin_footer');
    }
    public function editAdminDetails()
    {
        $data = array();
        $admin_id = encryptids("D", $this->session->userdata('admin_id'));

        $id = clearText($this->input->post('admin_id'));
        $name = clearText($this->input->post('username'));
        $email = clearText($this->input->post('email'));


        if (!$name && !$email) {
            $data['status'] = 0;
            $data['message'] = 'Please enter all details';
        }
        if (empty($data)) {
            $dbObj = array(
                'name' =>  $name,
                'email_id' => $email,
                'username' => $email,
                'modified_on' => GetCurrentDateTime('Y-m-d H:i:s'),
                'modified_by' => $admin_id,
            );
            $id = $this->Admin_model->updateData($id, $dbObj);
        }
        if ($id) {
            $this->session->set_flashdata('MSG', ShowAlert("Admin Updated successfully", "SS"));
        } else {
            $this->session->set_flashdata('MSG', ShowAlert("Failed to update  admin,Please try again", "DD"));
        }
        redirect(base_url() . "Admin/admin_creation_list", 'refresh');
    }
    // ajax call
    public function deleteAdmin()
    {
        try {
            $login_admin_id = encryptids("D", $this->session->userdata('admin_id'));
            $admin_id = $this->input->post('id');

            $dbObj = array(
                'modified_by' => $login_admin_id,
                'modified_on' => GetCurrentDateTime('Y-m-d H:i:s'),
            );
            $uid = $this->Admin_model->updateData($admin_id, $dbObj);

            $id = $this->Admin_model->deleteData($admin_id);

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
    public function resetPassword()
    {
        try {
            $login_admin_id = encryptids("D", $this->session->userdata('admin_id'));
            $admin_id = $this->input->post('id');
            $email_id = $this->input->post('email');
            //$random_pass	 = $this->randomPassword();
            $random_pass     = 12345678;
            //$newPw = password_hash($random_pass, PASSWORD_BCRYPT);


            $dbObj = array(
                'password' =>  $random_pass,
                'modified_on' => GetCurrentDateTime('Y-m-d H:i:s'),
                'modified_by' => $login_admin_id,
            );

            $id = $this->Admin_model->updateData($admin_id, $dbObj);
            $adminDetails = $this->Admin_model->getAdminDetail($id);
            $name = $adminDetails['name'];

            if ($id) {
                $data['status'] = 1;
                $data['message'] = 'Reset password successfully.';

                // email to Admin to notify  start
                $msg = "Dear " . $name .
                    " <p>Your password has changed. Your login credentials for the portal are:
                    </p>
                    <p>Username: " . $email_id . "</p>
                    <p>Password: " . $random_pass . "</p>";
                $subject = "Login Credentials for the BIS Portal.";

                $config = array(
                    'protocol' => 'smtp',
                    'smtp_host' => 'ssl://smtp.googlemail.com',
                    'smtp_port' => 465,
                    'smtp_user' => 'exchangeforum1@gmail.com',
                    'smtp_pass' => 'niycbrjxnzfazrud',
                    'mailtype' => 'html',
                    'charset' => 'iso-8859-1',
                );

                $this->load->library('email', $config);
                $this->email->initialize($config); // add this line
                $this->email->set_newline("\r\n");
                $this->email->from('exchangeforum1@gmail.com', 'BIS');
                $this->email->to($email_id);
                $this->email->subject($subject);
                $this->email->message($msg);
                $this->email->send();
                // email code end





            } else {
                $data['status'] = 0;
                $data['message'] = 'Failed , Please try again.';
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


    public function addbannerimg()
    {

        $banner_img = "bannerimg" . time() . '.jpg';
        $config['upload_path'] = './uploads';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size']    = '10000';
        $config['max_width']  = '3024';
        $config['max_height']  = '2024';

        $config['file_name'] = $banner_img;

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('bannerimg')) {
            $data['status'] = 0;
            $data['message'] = $this->upload->display_errors();
        }
        $formdata['caption'] = $this->input->post('banner_caption');
        $formdata['banner_images'] = $banner_img;

        $this->Admin_model->bannerinsertData($formdata);
        $this->session->set_flashdata('MSG', ShowAlert("Record Inserted Successfully", "SS"));
        redirect(base_url() . "admin/banner_image_list", 'refresh');
    }

    public function dashboard()
    {
        $this->load->view('admin/headers/admin_header');
        $this->load->view('admin/dashboard');
        $this->load->view('admin/footers/admin_footer');
    }

    public function manageQuizList()
    {
        $this->load->view('admin/headers/admin_header');
        $this->load->view('quiz/manage_quiz_list');
        $this->load->view('admin/footers/admin_footer');
    }
    public function ongoingQuizList()
    {

        $getAllQb = $this->quiz_model->onGoingQuiz();
        print_r($getAllQb);
        exit;
        $this->load->view('admin/headers/admin_header');
        $this->load->view('quiz/ongoing_quiz_list');
        $this->load->view('admin/footers/admin_footer');
    }
    public function closedQuizList()
    {
        $this->load->view('admin/headers/admin_header');
        $this->load->view('quiz/closed_quiz_list');
        $this->load->view('admin/footers/admin_footer');
    }
    public function questionBankList()
    {
        $data = array();
        $data['allRecords'] = $this->Que_bank_model->getAllQueBankForApproval();
        $this->load->view('admin/headers/admin_header');
        $this->load->view('quebank/question_bank_list', $data);
        $this->load->view('admin/footers/admin_footer');
    }

    public function quiz()
    {
        $this->load->view('admin/headers/admin_header');
        $this->load->view('quiz/quiz_dashboard');
        $this->load->view('admin/footers/admin_footer');
    }

    public function exchange_forum()
    {
        $this->load->view('admin/headers/admin_header');
        $this->load->view('admin/exchange_forum');
        $this->load->view('admin/footers/admin_footer');
    }
    public function cmsManagenent_dashboard()
    {
        if (encryptids("D", $_SESSION['admin_type']) == 3) {
            // print_r($_SESSION);
            if (in_array(8, $_SESSION['sub_mod_per'])) {
                $sub_model_id = 8;
                $permissions = $this->Admin_model->getUsersPermissions($sub_model_id);
            } else {
                $sub_model_id = 0;
                $permissions = $this->Admin_model->getUsersPermissions($sub_model_id);
            }

            $data['permissions'] =  $_SESSION['sub_mod_per'];
        } else {
            $data[] = "";
        }
        // print_r($data); die;
        $this->load->view('admin/headers/admin_header');
        $this->load->view('admin/cmsManagenent_dashboard', $data);
        $this->load->view('admin/footers/admin_footer');
    }

    public function banner_image_list()
    {

        // if (encryptids("D", $_SESSION['admin_type']) == 3) { 
        //     //  print_r($_SESSION); die;
        //       if (in_array(21, $_SESSION['sub_mod_per'])) { 
        //           $sub_model_id = 21;
        //           $permissions = $this->Admin_model->getUsersPermissions($sub_model_id);
        //       }else{
        //           $sub_model_id = 0;
        //           $permissions = $this->Admin_model->getUsersPermissions($sub_model_id);
        //       }
        //       $data['permissions'] =  $permissions;
        //   }
        if (encryptids("D", $_SESSION['admin_type']) == 3) {
            //  print_r($_SESSION); die;
            if (in_array(21, $_SESSION['sub_mod_per'])) {
                $sub_model_id = 21;
                $permissions = $this->Admin_model->getUsersPermissions($sub_model_id);
            } else {
                $sub_model_id = 0;
                $permissions = $this->Admin_model->getUsersPermissions($sub_model_id);
            }
            $data['permissions'] =  $permissions;
        }
        // print_r($data); die;
        $data['banner_data'] = $this->Admin_model->bannerAllData();
        $this->load->view('admin/headers/admin_header');
        $this->load->view('admin/banner_image_list', $data);
        $this->load->view('admin/footers/admin_footer');
    }
    public function edit_bannerimage($id)
    {
        $data = $this->Admin_model->edit_bannerimage($id);
        //print_r($data); die;
        echo $data;
    }
    public function update_bannnerimage()
    {
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
            $config['upload_path'] = './uploads';
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
            $formdata['banner_images'] = $document;
        }
        // $formdata['status']="1";
        $id = $this->Admin_model->updateBannerImage($formdata);
        if ($id) {
            $this->session->set_flashdata('MSG', ShowAlert("Record Updated Successfully", "SS"));
            redirect(base_url() . "admin/banner_image_list", 'refresh');
        } else {
            $this->session->set_flashdata('MSG', ShowAlert("Failed to update record,Please try again", "DD"));
            redirect(base_url() . "admin/banner_image_list", 'refresh');
        }
    }
    public function deleteBanner()
    {
        try {
            $que_id = $this->input->post('que_id');
            $id = $this->Admin_model->deleteBanner($que_id);
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
        redirect(base_url() . "admin/banner_image_list", 'refresh');
    }

    public function about_exchange_forum()
    {
        if (encryptids("D", $_SESSION['admin_type']) == 3) {
            //  print_r($_SESSION); die;
            if (in_array(22, $_SESSION['sub_mod_per'])) {
                $sub_model_id = 22;
                $permissions = $this->Admin_model->getUsersPermissions($sub_model_id);
            } else {
                $sub_model_id = 0;
                $permissions = $this->Admin_model->getUsersPermissions($sub_model_id);
            }
            $data['permissions'] =  $permissions;
        }
        $this->load->model('admin_model');
        $data['about_exchange_forum'] = $this->admin_model->aboutExchangeForumData();
        $this->load->view('admin/headers/admin_header');
        $this->load->view('admin/about_exchange_forum', $data);
        $this->load->view('admin/footers/admin_footer');
    }

    public function add_about_exchange_forum()
    {
        if (!file_exists('uploads/cms/about_exchange_forum')) {
            mkdir('uploads/cms/about_exchange_forum', 0777, true);
        }


        $banner_img = "about_exchange_forum" . time() . '.jpg';
        $config['upload_path'] = './uploads/cms/about_exchange_forum';
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
        $formdata['status'] = "created";

        $this->Admin_model->aboutExchangeForuminsertData($formdata);
        $this->session->set_flashdata('MSG', ShowAlert("Record Inserted Successfully", "SS"));
        redirect(base_url() . "admin/about_exchange_forum", 'refresh');
    }
    public function update_about_exchange_forum()
    {
        if (!file_exists('uploads/cms/about_exchange_forum')) {
            mkdir('uploads/cms/about_exchange_forum', 0777, true);
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
            $document = "banner_image" . time() . '.jpg';
            $config['upload_path'] = './uploads/cms/about_exchange_forum';
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
        $id = $this->Admin_model->aboutExchangeForumupdateData($formdata);
        if ($id) {
            $this->session->set_flashdata('MSG', ShowAlert("Record Updated Successfully", "SS"));
            redirect(base_url() . "admin/about_exchange_forum", 'refresh');
        } else {
            $this->session->set_flashdata('MSG', ShowAlert("Failed to update record,Please try again", "DD"));
            redirect(base_url() . "admin/about_exchange_forum", 'refresh');
        }
    }
    public function deletExngForum()
    {
        try {
            $que_id = $this->input->post('que_id');
            $id = $this->Admin_model->deletExngForum($que_id);
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
        redirect(base_url() . "admin/about_exchange_forum", 'refresh');
    }

    public function contact_us()
    {
        if (encryptids("D", $_SESSION['admin_type']) == 3) {
            //  print_r($_SESSION); die;
            if (in_array(23, $_SESSION['sub_mod_per'])) {
                $sub_model_id = 23;
                $permissions = $this->Admin_model->getUsersPermissions($sub_model_id);
            } else {
                $sub_model_id = 0;
                $permissions = $this->Admin_model->getUsersPermissions($sub_model_id);
            }
            $data['permissions'] =  $permissions;
        }
        //  print_r($permissions); die;
        $this->load->model('admin_model');
        $data['contact_us'] = $this->admin_model->contactUsData();
        $this->load->view('admin/headers/admin_header');
        $this->load->view('admin/contact_us', $data);
        $this->load->view('admin/footers/admin_footer');
    }
    public function add_contact_us()
    {
        $formdata['contact_no'] = $this->input->post('contact_no');
        $formdata['address'] = $this->input->post('address');
        $formdata['email'] = $this->input->post('email');
        $formdata['tele_fax'] = $this->input->post('tele_tax');
        $formdata['location'] = $this->input->post('location_url');
        //$formdata['image'] = $banner_img;
        //$formdata['status']="created";

        $this->Admin_model->addContactUsData($formdata);
        $this->session->set_flashdata('MSG', ShowAlert("Record Inserted Successfully", "SS"));
        redirect(base_url() . "admin/contact_us", 'refresh');
    }
    public function edit_contactus($id)
    {
        //echo "hello"; die;
        $this->load->model('admin_model');
        $data = $this->admin_model->edit_contactus($id);
        //print_r($data); die;
        echo $data;
    }
    public function update_contactus()
    {
        $formdata['contact_no'] = $this->input->post('contact_no');
        $formdata['address'] = $this->input->post('address');
        $formdata['email'] = $this->input->post('email');
        $formdata['tele_fax'] = $this->input->post('tele_tax');
        $formdata['location'] = $this->input->post('location_url');
        $formdata['id'] = $this->input->post('id');

        $this->Admin_model->updateContactUsData($formdata);
        $this->session->set_flashdata('MSG', ShowAlert("Record Updated Successfully", "SS"));
        //die;
        redirect(base_url() . "admin/contact_us", 'refresh');
    }

    public function deletContactus()
    {
        try {
            $que_id = $this->input->post('que_id');
            $id = $this->Admin_model->deletContactus($que_id);
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
        redirect(base_url() . "admin/contact_us", 'refresh');
    }


    public function footer_links()
    {
        $this->load->view('admin/headers/admin_header');
        $this->load->view('admin/footer_links');
        $this->load->view('admin/footers/admin_footer');
    }

    public function accessibility_Help()
    {
        $this->load->view('admin/headers/admin_header');
        $this->load->view('admin/accessibility_Help');
        $this->load->view('admin/footers/admin_footer');
    }

    public function legal_view()
    {
        $this->load->model('admin_model');
        $data['legal'] = $this->admin_model->legal();
        $this->load->view('admin/headers/admin_header');
        $this->load->view('admin/legal_view', $data);
        $this->load->view('admin/footers/admin_footer');
    }

    public function other_links()
    {
        $this->load->view('admin/headers/admin_header');
        $this->load->view('admin/other_links');
        $this->load->view('admin/footers/admin_footer');
    }

    public function useful_links()
    {
        if (encryptids("D", $_SESSION['admin_type']) == 3) {
            //  print_r($_SESSION); die;
            if (in_array(24, $_SESSION['sub_mod_per'])) {
                $sub_model_id = 24;
                $permissions = $this->Admin_model->getUsersPermissions($sub_model_id);
            } else {
                $sub_model_id = 0;
                $permissions = $this->Admin_model->getUsersPermissions($sub_model_id);
            }
            $data['permissions'] =  $permissions;
        }
        $this->load->model('admin_model');
        $data['useful_link'] = $this->admin_model->useful_links();
        $this->load->view('admin/headers/admin_header');
        $this->load->view('admin/useful_links', $data);
        $this->load->view('admin/footers/admin_footer');
    }
    public function useful_links_web()
    {
        $this->load->model('admin_model');
        $data = $this->admin_model->useful_links_web();
        echo $data;
    }
    public function add_useful_links()
    {
        $banner_img = "useful_links" . time() . '.jpg';
        $config['upload_path'] = './uploads';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size']    = '500';
        $config['max_width']  = '3024';
        $config['max_height']  = '2024';

        $config['file_name'] = $banner_img;

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('image')) {
            $data['status'] = 0;
            $data['message'] = $this->upload->display_errors();
            $this->session->set_flashdata('MSG', ShowAlert($data['message'], "SS"));
            // print_r( $data['message']);
            // die;
        } else {
            $formdata['title'] = $this->input->post('title');
            $formdata['image'] = $banner_img;
            $formdata['link'] = $this->input->post('link');
            $this->load->model('admin_model');
            $this->Admin_model->add_useful_links($formdata);
            $this->session->set_flashdata('MSG', ShowAlert("Record Inserted Successfully", "SS"));
        }

        redirect(base_url() . "admin/useful_links", 'refresh');
    }

    public function edit_useful_links($id)
    {
        // $this->load->model('admin_model');     
        $data = $this->Admin_model->edit_useful_links($id);
        //print_r($data); die;
        echo $data;
    }
    public function update_useful_links()
    {
        $formdata['id'] = $this->input->post('id');
        $formdata['title'] = $this->input->post('title');
        // $formdata['caption'] = $this->input->post('banner_caption');  
        $formdata['link'] = $this->input->post('link');

        $oldDocument = "";
        $oldDocument = $this->input->post('old_img');
        $document = "";

        if (!empty($_FILES['image']['tmp_name'])) {
            $document = "banner_image" . time() . '.jpg';
            $config['upload_path'] = './uploads';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']    = '500';
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

        if ($document) {
            $formdata['image'] = $document;
        }
        // $formdata['status']="1";
        $id = $this->Admin_model->updateUsefulLinks($formdata);
        if ($id) {
            $this->session->set_flashdata('MSG', ShowAlert("Record Updated Successfully", "SS"));
            redirect(base_url() . "admin/useful_links", 'refresh');
        } else {
            $this->session->set_flashdata('MSG', ShowAlert("Failed to update record,Please try again", "DD"));
            redirect(base_url() . "admin/useful_links", 'refresh');
        }
    }
    public function deleteUsefulLinks()
    {
        try {
            $que_id = $this->input->post('que_id');
            $id = $this->Admin_model->deleteUsefulLinks($que_id);
            if ($id) {
                $data['status'] = 1;
                $data['message'] = 'Deleted successfully.';
            } else {
                $data['status'] = 0;
                $data['message'] = 'Failed to delete, Please try again.';
            }
            // echo  json_encode($data);
            // return true;
            $this->session->set_flashdata('MSG', ShowAlert("Record Deleted Successfully", "SS"));
        } catch (Exception $e) {
            echo json_encode([
                'status' => 'error',
                'message' => $e->getMessage(),
            ]);
            return true;
        }
        redirect(base_url() . "admin/useful_links", 'refresh');
    }

    public function follow_us()
    {
        if (encryptids("D", $_SESSION['admin_type']) == 3) {
            //  print_r($_SESSION); die;
            if (in_array(24, $_SESSION['sub_mod_per'])) {
                $sub_model_id = 24;
                $permissions = $this->Admin_model->getUsersPermissions($sub_model_id);
            } else {
                $sub_model_id = 0;
                $permissions = $this->Admin_model->getUsersPermissions($sub_model_id);
            }
            $data['permissions'] =  $permissions;
        }
        $this->load->model('admin_model');
        $data['follow_us'] = $this->admin_model->follow_us();
        $this->load->view('admin/headers/admin_header');
        $this->load->view('admin/follow_us', $data);
        $this->load->view('admin/footers/admin_footer');
    }
    public function followus_links_web()
    {
        $this->load->model('admin_model');
        $data = $this->admin_model->followus_links_web();
        // print_r($data); 
        echo $data;
    }
    public function add_follow_us()
    {
        $banner_img = "follow_us" . time() . '.jpg';
        $config['upload_path'] = './uploads';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size']    = '10000';
        $config['max_width']  = '3024';
        $config['max_height']  = '2024';

        $config['file_name'] = $banner_img;

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('follow_us')) {
            $data['status'] = 0;
            $data['message'] = $this->upload->display_errors();
        }
        //print_r($data); die;
        $formdata['title'] = $this->input->post('title');
        $formdata['icon'] = $banner_img;
        $formdata['link'] = $this->input->post('link');
        $this->load->model('admin_model');
        $this->Admin_model->add_follow_us($formdata);
        $this->session->set_flashdata('MSG', ShowAlert("Record Inserted Successfully", "SS"));
        redirect(base_url() . "admin/follow_us", 'refresh');
    }

    public function edit_followus($id)
    {
        $data = $this->Admin_model->edit_followus($id);
        //print_r($data); die;
        echo $data;
    }
    public function update_followus()
    {
        $formdata['id'] = $this->input->post('id');
        $formdata['title'] = $this->input->post('title');
        // $formdata['caption'] = $this->input->post('banner_caption');  
        $formdata['link'] = $this->input->post('link');

        $oldDocument = "";
        $oldDocument = $this->input->post('old_img');
        $document = "";

        if (!empty($_FILES['follow_us']['tmp_name'])) {
            $document = "banner_image" . time() . '.jpg';
            $config['upload_path'] = './uploads';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']    = '100000';
            $config['max_width']  = '3024';
            $config['max_height']  = '2024';
            $config['file_name'] = $document;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('follow_us')) {
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
            $formdata['icon'] = $document;
        }
        // $formdata['status']="1";
        $id = $this->Admin_model->updateFollowUs($formdata);
        if ($id) {
            $this->session->set_flashdata('MSG', ShowAlert("Record Updated Successfully", "SS"));
            redirect(base_url() . "admin/follow_us", 'refresh');
        } else {
            $this->session->set_flashdata('MSG', ShowAlert("Failed to update record,Please try again", "DD"));
            redirect(base_url() . "admin/follow_us", 'refresh');
        }
    }
    public function deleteFollowUs()
    {
        try {
            //$encUserId = $this->session->userdata('user_id');
            //$user = encryptids("D", $encUserId);
            $que_id = $this->input->post('que_id');
            $id = $this->Admin_model->deleteFollowUs($que_id);
            if ($id) {
                $data['status'] = 1;
                $data['message'] = 'Deleted successfully.';
            } else {
                $data['status'] = 0;
                $data['message'] = 'Failed to delete, Please try again.';
            }
            // echo  json_encode($data);
            // return true;
            $this->session->set_flashdata('MSG', ShowAlert("Record Deleted Successfully", "SS"));
        } catch (Exception $e) {
            echo json_encode([
                'status' => 'error',
                'message' => $e->getMessage(),
            ]);
            return true;
        }
        redirect(base_url() . "admin/follow_us", 'refresh');
    }


    public function gallery()
    {
        $this->load->view('admin/headers/admin_header');
        $this->load->view('admin/gallery');
        $this->load->view('admin/footers/admin_footer');
    }


    public function photos()
    {
        if (encryptids("D", $_SESSION['admin_type']) == 3) {
            //  print_r($_SESSION); die;
            if (in_array(25, $_SESSION['sub_mod_per'])) {
                $sub_model_id = 25;
                $permissions = $this->Admin_model->getUsersPermissions($sub_model_id);
            } else {
                $sub_model_id = 0;
                $permissions = $this->Admin_model->getUsersPermissions($sub_model_id);
            }
            $data['permissions'] =  $permissions;
        }
        $this->load->model('admin_model');
        $data['photos'] = $this->admin_model->allPhotos();
        $this->load->view('admin/headers/admin_header');
        $this->load->view('admin/photos', $data);
        $this->load->view('admin/footers/admin_footer');
    }
    public function add_photos()
    {
        //    print_r($_POST); die;
        $banner_img = "photos" . time() . '.jpg';
        $config['upload_path'] = './uploads';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size']    = '500';
        $config['max_width']  = '3024';
        $config['max_height']  = '2024';

        $config['file_name'] = $banner_img;

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('image')) {
            $data['status'] = 0;
            $data['message'] = $this->upload->display_errors();
        }
        //print_r($data); die;
        $formdata['title'] = $this->input->post('title');
        $formdata['image'] = $banner_img;
        //print_r($formdata); die;    
        $this->load->model('admin_model');
        $this->Admin_model->addPhotos($formdata);
        $this->session->set_flashdata('MSG', ShowAlert("Record Inserted Successfully", "SS"));
        redirect(base_url() . "admin/photos", 'refresh');
    }

    public function deletePhotos($que_id)
    {
        // echo $que_id; die;
        $id = encryptids("D", $que_id);
        try {

            $id = $this->Admin_model->deletePhotos($id);
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
        redirect(base_url() . "admin/photos", 'refresh');
    }
    public function edit_photos($id)
    {
        $data = $this->Admin_model->edit_photos($id);
        //print_r($data); die;
        echo $data;
    }

    public function update_photo()
    {
        // print_r($_POST); die;
        $formdata['id'] = $this->input->post('id');
        //$formdata['title'] = $this->input->post('title');
        $formdata['title'] = $this->input->post('banner_caption');
        //  $formdata['image'] = $this->input->post('old_doc');   

        $oldDocument = "";
        $oldDocument = $this->input->post('old_img');
        $document = "";

        if (!empty($_FILES['bannerimg']['tmp_name'])) {
            $document = "banner_image" . time() . '.jpg';
            $config['upload_path'] = './uploads';
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
            $formdata['image'] = $document;
        }
        // $formdata['status']="1";
        $id = $this->Admin_model->updatePhoto($formdata);
        if ($id) {
            $this->session->set_flashdata('MSG', ShowAlert("Record Updated Successfully", "SS"));
            redirect(base_url() . "admin/photos", 'refresh');
        } else {
            $this->session->set_flashdata('MSG', ShowAlert("Failed to update record,Please try again", "DD"));
            redirect(base_url() . "admin/photos", 'refresh');
        }
    }

    public function videos()
    {
        if ($this->Admin_model->checkAdminLogin()) {
            if (encryptids("D", $_SESSION['admin_type']) == 3) {
                //  print_r($_SESSION); die;
                if (in_array(25, $_SESSION['sub_mod_per'])) {
                    $sub_model_id = 25;
                    $permissions = $this->Admin_model->getUsersPermissions($sub_model_id);
                } else {
                    $sub_model_id = 0;
                    $permissions = $this->Admin_model->getUsersPermissions($sub_model_id);
                }
                $data['permissions'] =  $permissions;
            }
            // $this->load->model('Admin/Admin_model');
            $data['video'] = $this->Admin_model->allVideos();
            $this->load->view('admin/headers/admin_header');
            $this->load->view('admin/videos', $data);
            $this->load->view('admin/footers/admin_footer');
        } else {
            redirect(base_url() . "Admin/login", 'refresh');
        }
    }
    public function add_video()
    {
        if (!file_exists('uploads/cms/gallary/video')) {
            mkdir('uploads/cms/gallary/video', 0777, true);
        }

        $banner_img = "video" . time() . '.mp4';
        $config['upload_path'] = './uploads/cms/gallary/video';
        $config['allowed_types'] = 'avi|mp4|3gp|mpeg|mpg|mov|mp3|flv|wmv';
        $config['max_size']    = '';


        $config['file_name'] = $banner_img;

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('video')) {
            $data['status'] = 0;
            $data['message'] = $this->upload->display_errors();
        }
        //print_r($data); die;
        $formdata['title'] = $this->input->post('title');
        $formdata['video'] = $banner_img;
        //print_r($formdata); die;    
        $this->load->model('admin_model');
        $this->Admin_model->addVideos($formdata);
        $this->session->set_flashdata('MSG', ShowAlert("Record Inserted Successfully", "SS"));
        redirect(base_url() . "admin/videos", 'refresh');
    }
    public function delete_video($que_id)
    {
        $id = encryptids("D", $que_id);
        try {
            //$encUserId = $this->session->userdata('user_id');
            //$user = encryptids("D", $encUserId);
            $que_id = $this->input->post('que_id');
            $id = $this->Admin_model->deleteVideos($id);
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
        redirect(base_url() . "admin/videos", 'refresh');
    }
    public function quiz_competition_dashboard()
    {
        $this->load->view('admin/headers/admin_header');
        $this->load->view('quiz/quiz_competition_dashboard');
        $this->load->view('admin/footers/admin_footer');
    }
    public function quiz_dashboard()
    {
        $this->load->view('admin/headers/admin_header');
        $this->load->view('admin/quiz_dashboard');
        $this->load->view('admin/footers/admin_footer');
    }
    public function admin_manage_quiz_list()
    {



        $allquize = $this->Admin_model->getAllQuize();
        $data = array();
        $data['allquize'] = $allquize;
        $this->load->view('admin/headers/admin_header');
        $this->load->view('admin/admin_manage_quiz_list', $data);
        $this->load->view('admin/footers/admin_footer');
    }
    public function admin_manage_quiz_view($id)
    {
        $this->load->view('admin/headers/admin_header');
        $this->load->model('Quiz/quiz_model');
        $data = array();
        $quiz = $this->quiz_model->viewQuiz($id);
        $quizdata = array();
        $data['quizdata'] = $quiz;
        //End Quize Data

        //Get First Prize data
        $prize_id = 1;
        $prize = $this->quiz_model->getPrizeId($prize_id, $id);
        $data['firstprize'] = $prize;
        //end First Prizr Data

        //get Second Prize Data
        $prize_id = 2;
        $prize = $this->quiz_model->getPrizeId($prize_id, $id);
        $data['secondprize'] = $prize;
        //End Second Prize data

        //get Third Prize Data
        $prize_id = 3;
        $prize = $this->quiz_model->getPrizeId($prize_id, $id);
        $data['thirdprize'] = $prize;
        //End Third Prize data

        //get Fourth Prize Data
        $prize_id = 4;
        $prize = $this->quiz_model->getPrizeId($prize_id, $id);
        $data['fourthprize'] = $prize;

        $this->load->view('admin/admin_manage_quiz_view', $data);
        $this->load->view('admin/footers/admin_footer');
    }
    public function admin_ongoing_quiz_list()
    {
        $this->load->view('admin/headers/admin_header');;
        $this->load->model('admin_model');
        $allquize = $this->admin_model->onGoingQuiz();
        $data = array();
        $data['allquize'] = $allquize;
        $this->load->view('admin/admin_ongoing_quiz_list', $data);
        $this->load->view('admin/footers/admin_footer');
    }

    public function admin_ongoing_quiz_view()
    {

        $this->load->view('admin/headers/admin_header');
        $this->load->model('Admin/quiz_model');
        $data = array();
        $quiz = $this->quiz_model->viewQuiz($id);
        $quizdata = array();
        $data['quizdata'] = $quiz;


        $this->load->view('admin/admin_ongoing_quiz_view', $data);
        $this->load->view('admin/footers/admin_footer');
    }
    public function admin_closed_quiz_list()
    {

        $this->load->view('admin/headers/admin_header');
        $this->load->view('admin/admin_closed_quiz_list');
        $this->load->view('admin/footers/admin_footer');
    }
    public function admin_closed_quiz_view()
    {

        $this->load->view('admin/headers/admin_header');
        $this->load->view('admin/admin_closed_quiz_view');
        $this->load->view('admin/footers/admin_footer');
    }

    public function admin_closed_quiz_submission()
    {

        $this->load->view('admin/headers/admin_header');
        $this->load->view('admin/admin_closed_quiz_submission');
        $this->load->view('admin/footers/admin_footer');
    }
    public function question_bank_list()
    {

        $this->load->view('admin/headers/admin_header');
        $this->load->view('admin/question_bank_list');
        $this->load->view('admin/footers/admin_footer');
    }
    public function question_bank_view()
    {

        $this->load->view('admin/headers/admin_header');
        $this->load->view('admin/question_bank_view');
        $this->load->view('admin/footers/admin_footer');
    }
    public function admin_creation_list()
    {
        $pageData = array();
        $encAdminId = $this->session->userdata('admin_id');
        $admin_id = encryptids("D", $encAdminId);

        $pageData['page_menu_select'] = "view_admin";
        $admintype = encryptids("D", $this->session->userdata('admin_type'));
        $allRecords = $this->Admin_model->getAllAdmin();
        $pageData['allRecords'] = $allRecords;

        if ($admintype == 1) {
            if (!$this->Admin_model->checkAdminLogin()) {
                redirect(base_url() . "Admin", 'refresh');
                return true;
            }
            $pageData['page_title'] = 'Add Admin';
            $this->load->view('admin/headers/admin_header');
            $this->load->view('admin/admin_creation_list', $pageData);
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
        $this->load->view('admin/admin_creation_view', $data);
        $this->load->view('admin/footers/admin_footer');
    }

    public function updateQuizStatus($id)
    {
        //$this->load->model('Admin/Admin_model');
        $formdata['status'] = $this->input->post('status_id');
        //$formdata['remark'] = $this->input->post('remark');

        $encAdminId = $this->session->userdata('admin_id');
        $modify_by = encryptids("D", $encAdminId);

        $formdata['modify_by'] = $modify_by;
        $formdata['modify_on'] = date('Y-m-d H:i:s');
        $quiz_id = $this->Admin_model->updateQuizStatus($id, $formdata);
        if ($quiz_id == 1) {
            $this->session->set_flashdata('MSG', ShowAlert("Quiz approved successfully.", "SS"));
            redirect(base_url() . "Quiz/manage_quiz_list", 'refresh');
        } else {
            $this->session->set_flashdata('MSG', ShowAlert("Failed to approve by admin,Please try again", "DD"));
            redirect(base_url() . "Quiz/manage_quiz_list", 'refresh');
        }
    }
    public function rejectQuiz($id)
    {
        $encAdminId = $this->session->userdata('admin_id');
        $modify_by = encryptids("D", $encAdminId);
        $formdata['status'] = 4;
        $formdata['remark'] = $this->input->post('remark');
        $formdata['modify_by'] = $modify_by;
        $formdata['modify_on'] = date('Y-m-d H:i:s');

        $quiz_id = $this->Admin_model->updateQuizStatus($id, $formdata);
        if ($quiz_id == 1) {
            $this->session->set_flashdata('MSG', ShowAlert("Quiz rejected successfully.", "SS"));
            redirect(base_url() . "Quiz/manage_quiz_list", 'refresh');
        } else {
            $this->session->set_flashdata('MSG', ShowAlert("Failed to reject by admin,Please try again", "DD"));
            redirect(base_url() . "Quiz/manage_quiz_list", 'refresh');
        }
    }

    public function your_wall_list()
    {

        // $data['yourwall']=$this->Your_wall_model->allYourwall();
        //  print_r($data['yourwall']); die;
        $data['archive'] = $this->Your_wall_model->all_archievd();
        $data['created'] = $this->Your_wall_model->allbycreated();
        $data['approved'] = $this->Your_wall_model->allbyapproved();
        $data['rejected'] = $this->Your_wall_model->allbyrejected();
        // print_r($data); die;
        $this->load->view('admin/headers/admin_header');
        $this->load->view('admin/your_wall_list_new', $data);
        $this->load->view('admin/footers/admin_footer');
    }
    public function approve_yourwall()
    {
        try {
            $this->load->model('admin/Your_wall_model');
            $que_id = $this->input->post('que_id');
            $id = $this->Your_wall_model->approveYourwall($que_id);
            if ($id) {
                $data['status'] = 1;
                $data['message'] = 'Approved successfully.';
            } else {
                $data['status'] = 0;
                $data['message'] = 'Failed to approve, Please try again.';
            }
            // echo  json_encode($data);
            // return true;
            $this->session->set_flashdata('MSG', ShowAlert($data['message'], "SS"));
        } catch (Exception $e) {
            echo json_encode([
                'status' => 'error',
                'message' => $e->getMessage(),
            ]);
            return true;
        }
        redirect(base_url() . "admin/your_wall_list", 'refresh');
    }
    public function your_wall_view($id)
    {
        $id = encryptids("D", $id);
        $data['data'] = $this->Your_wall_model->get_yourwallData($id);
        // print_r($data); die;
        $this->load->view('admin/headers/admin_header');
        $this->load->view('admin/your_wall_view', $data);
        $this->load->view('admin/footers/admin_footer');
    }
    public function approveYourwall()
    {
        try {
            $this->load->model('admin/Your_wall_model');
            $que_id = $this->input->post('que_id');
            $id = $this->Your_wall_model->approveYourwall($que_id);
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
        redirect(base_url() . "admin/photos", 'refresh');
    }
    public function reject_yourwall()
    {
        $this->load->model('admin/Your_wall_model');
        $formdata['id'] = $this->input->post('id');
        $formdata['reject_reason'] = $this->input->post('reason');
        $formdata['status'] = "4";

        $id = $this->Your_wall_model->reject($formdata);
        //  print_r($id); die;
        if ($id) {
            $this->session->set_flashdata('MSG', ShowAlert("Record Rejected", "SS"));
            redirect(base_url() . "admin/your_wall_list", 'refresh');
        } else {
            $this->session->set_flashdata('MSG', ShowAlert("Failed to update reject,Please try again", "DD"));
            redirect(base_url() . "admin/your_wall_list", 'refresh');
        }
    }
    public function restore_yourwall()
    {
        try {
            $this->load->model('admin/Your_wall_model');
            $que_id = $this->input->post('que_id');
            $id = $this->Your_wall_model->restore($que_id);
            if ($id) {
                $data['status'] = 1;
                $data['message'] = 'Approved successfully.';
            } else {
                $data['status'] = 0;
                $data['message'] = 'Failed to approve, Please try again.';
            }
            // echo  json_encode($data);
            // return true;
            $this->session->set_flashdata('MSG', ShowAlert($data['message'], "SS"));
        } catch (Exception $e) {
            echo json_encode([
                'status' => 'error',
                'message' => $e->getMessage(),
            ]);
            return true;
        }
        redirect(base_url() . "admin/your_wall_list", 'refresh');
    }
    public function archive_yourwall()
    {
        try {
            $this->load->model('admin/Your_wall_model');
            $que_id = $this->input->post('que_id');
            $id = $this->Your_wall_model->archive($que_id);
            if ($id) {
                $data['status'] = 1;
                $data['message'] = 'Approved successfully.';
            } else {
                $data['status'] = 0;
                $data['message'] = 'Failed to approve, Please try again.';
            }
            // echo  json_encode($data);
            // return true;
            $this->session->set_flashdata('MSG', ShowAlert($data['message'], "SS"));
        } catch (Exception $e) {
            echo json_encode([
                'status' => 'error',
                'message' => $e->getMessage(),
            ]);
            return true;
        }
        redirect(base_url() . "admin/your_wall_list", 'refresh');
    }
    public function yourwallPublish()
    {
        try {
            $this->load->model('admin/Your_wall_model');
            $this->load->model('admin/By_the_mentor_model');
            $que_id = $this->input->post('que_id');
            // $id = $this->Your_wall_model->yourwallPublish($que_id);
            $email_id = $this->input->post('email');
            //$email_id="vol.bhagyashree@gmail.com";
            $msg = "Your content has been approved and published on the forum";
            $subject = "Exchange form noification.";
            $this->By_the_mentor_model->send_email($msg, $subject, $email_id);
            // $id = $this->By_the_mentor_model->btmPublish($que_id);
            $id = $this->Your_wall_model->yourwallPublish($que_id);
            if ($id) {
                $data['status'] = 1;
                $data['message'] = 'Yourwall Published successfully.';
            } else {
                $data['status'] = 0;
                $data['message'] = 'Failed to delete, Please try again.';
            }
            // echo  json_encode($data);
            // return true;
            $this->session->set_flashdata('MSG', ShowAlert("Record Published Successfully", "SS"));
        } catch (Exception $e) {
            echo json_encode([
                'status' => 'error',
                'message' => $e->getMessage(),
            ]);
            return true;
        }
        redirect(base_url() . "admin/view_yourwall", 'refresh');
    }
    public function deletYourwall()
    {
        try {

            $que_id = $this->input->post('que_id');
            $id = $this->Your_wall_model->deletYourwall($que_id);
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
        redirect(base_url() . "admin/yourwall", 'refresh');
    }
    public function yourwallUnpublish()
    {
        //  echo "hi"; die;
        try {

            $que_id = $this->input->post('que_id');
            $id = $this->Your_wall_model->yourwallUnpublish($que_id);
            if ($id) {
                $this->session->set_flashdata('MSG', ShowAlert("Record Deleted Successfully", "SS"));
            } else {
                $this->session->set_flashdata('MSG', ShowAlert("Record Deleted Successfully", "SS"));
            }
        } catch (Exception $e) {
            echo json_encode([
                'status' => 'error',
                'message' => $e->getMessage(),
            ]);
            return true;
        }
        redirect(base_url() . "admin/yourwall", 'refresh');
    }
    public function byTheMentors()
    {
        if (encryptids("D", $_SESSION['admin_type']) == 3) {
            //  print_r($_SESSION); die;
            if (in_array(4, $_SESSION['sub_mod_per'])) {
                $sub_model_id = 1;
                $permissions = $this->Admin_model->getUsersPermissions($sub_model_id);
            } else {
                $sub_model_id = 0;
                $permissions = $this->Admin_model->getUsersPermissions($sub_model_id);
            }
            $data['permissions'] =  $permissions;
        }
        $this->load->model('admin/By_the_mentor_model');
        // $this->load->model('admin/By_the_mentor_model');        
        $data['archive'] = $this->By_the_mentor_model->all_archievd_btm();
        // $data['bythementors']=$this->By_the_mentor_model->allbtm();
        $data['created'] = $this->By_the_mentor_model->allbtmbycreated();
        $data['approved'] = $this->By_the_mentor_model->allbtmbyapproved();
        $data['rejected'] = $this->By_the_mentor_model->allbtmbyrejected();
        // print_r($data); die;
        //    print_r($data['bythementors']); die;
        $this->load->view('admin/headers/admin_header');
        // $this->load->view('users/by_the_montor_list',$data);
        $this->load->view('users/btm_list_new', $data);
        $this->load->view('admin/footers/admin_footer');
    }
    public function rejectbtTheMentor()
    {
        // print_r($_POST);
        // die;
        $this->load->model('admin/By_the_mentor_model');
        $formdata['id'] = $this->input->post('id');
        $formdata['reject_reason'] = $this->input->post('reason');
        $formdata['status'] = "4";

        $id = $this->By_the_mentor_model->rejectbtm($formdata);
        //  print_r($id); die;
        if ($id) {
            $this->session->set_flashdata('MSG', ShowAlert("Record Rejected", "SS"));
            redirect(base_url() . "admin/byTheMentors", 'refresh');
        } else {
            $this->session->set_flashdata('MSG', ShowAlert("Failed to update reject,Please try again", "DD"));
            redirect(base_url() . "admin/byTheMentors", 'refresh');
        }
    }
    public function view_btm($id)
    {
        $this->load->model('admin/By_the_mentor_model');
        $data['data'] = $this->By_the_mentor_model->get_btm($id);
        // print_r($data); die;
        $this->load->view('admin/headers/admin_header');
        $this->load->view('users/view_by_the_mentors_details', $data);
        $this->load->view('admin/footers/admin_footer');
    }
    public function bythementor_archivelist()
    {
        $this->load->model('admin/By_the_mentor_model');
        $data['bythementors'] = $this->By_the_mentor_model->all_archievd_btm();
        $this->load->view('admin/headers/admin_header');
        $this->load->view('admin/archived_by_the_mentors', $data);
        $this->load->view('admin/footers/admin_footer');
    }
    public function btm_publish()
    {

        try {
            $this->load->model('admin/By_the_mentor_model');
            $que_id = $this->input->post('que_id');
            $email_id = $this->input->post('email');
            //$email_id="vol.bhagyashree@gmail.com";
            $msg = "Your content has been approved and published on the forum";
            $subject = "Exchange forum noification";
            $this->By_the_mentor_model->send_email($msg, $subject, $email_id);
            $id = $this->By_the_mentor_model->btmPublish($que_id);

            if ($id) {
                $data['status'] = 1;
                $data['message'] = 'Publish successfully.';
            } else {
                $data['status'] = 0;
                $data['message'] = 'Failed to publish, Please try again.';
                // $this->session->set_flashdata('MSG', ShowAlert("Failed!", "SS"));
            }
            $this->session->set_flashdata('MSG', ShowAlert("Record Published Successfully", "SS"));
        } catch (Exception $e) {
            echo json_encode([
                'status' => 'error',
                'message' => $e->getMessage(),
            ]);
            return true;
        }
        redirect(base_url() . "admin/view_btm", 'refresh');
    }
    public function btm_unpublish()
    {
        try {
            $this->load->model('admin/By_the_mentor_model');
            $que_id = $this->input->post('que_id');
            $id = $this->By_the_mentor_model->btm_Unpublish($que_id);
            if ($id) {

                $data['status'] = 1;
                $data['message'] = 'Record Unpublished.';
            } else {
                $data['status'] = 0;
                $data['message'] = 'Failed to unpublish.';
            }

            $this->session->set_flashdata('MSG', ShowAlert("Record UnPublished Successfully", "SS"));
        } catch (Exception $e) {
            echo json_encode([
                'status' => 'error',
                'message' => $e->getMessage(),
            ]);
            return true;
        }
        redirect(base_url() . "admin/view_btm", 'refresh');
    }
    public function btm_archive()
    {
        try {
            $this->load->model('admin/By_the_mentor_model');
            $que_id = $this->input->post('que_id');
            $id = $this->By_the_mentor_model->btm_archive($que_id);
            if ($id) {

                $data['status'] = 1;
                $data['message'] = 'Record Archived.';
            } else {
                $data['status'] = 0;
                $data['message'] = 'Failed to Archive.';
            }

            $this->session->set_flashdata('MSG', ShowAlert("Record Archives Successfully", "SS"));
        } catch (Exception $e) {
            echo json_encode([
                'status' => 'error',
                'message' => $e->getMessage(),
            ]);
            return true;
        }
        redirect(base_url() . "admin/bythementor_archivelist", 'refresh');
    }

    public function btm_unarchive()
    {
        try {
            $this->load->model('admin/By_the_mentor_model');
            $que_id = $this->input->post('que_id');
            $id = $this->By_the_mentor_model->btm_unarchive($que_id);
            if ($id) {

                $data['status'] = 1;
                $data['message'] = 'Record Unarchived.';
            } else {
                $data['status'] = 0;
                $data['message'] = 'Failed to Unarchive.';
            }
            return $data;

            // $this->session->set_flashdata('MSG', ShowAlert("Record Unarchives Successfully", "SS"));
        } catch (Exception $e) {
            echo json_encode([
                'status' => 'error',
                'message' => $e->getMessage(),
            ]);
            return true;
        }
        redirect(base_url() . "admin/byTheMentors", 'refresh');
    }
    public function approve_btm()
    {
        try {
            $this->load->model('admin/By_the_mentor_model');
            $que_id = $this->input->post('que_id');
            $id = $this->By_the_mentor_model->btm_approve($que_id);
            if ($id) {

                $data['status'] = 1;
                $data['message'] = 'Record Archived.';
            } else {
                $data['status'] = 0;
                $data['message'] = 'Failed to Archive.';
            }

            $this->session->set_flashdata('MSG', ShowAlert("Record Approve Successfully", "SS"));
        } catch (Exception $e) {
            echo json_encode([
                'status' => 'error',
                'message' => $e->getMessage(),
            ]);
            return true;
        }
        redirect(base_url() . "admin/byTheMentors", 'refresh');
    }

    public function deleteByTheMentor()
    {
        try {
            $this->load->model('admin/By_the_mentor_model');
            $que_id = $this->input->post('que_id');
            $id = $this->By_the_mentor_model->delet_btm($que_id);
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
        redirect(base_url() . "admin/view_btm", 'refresh');
    }
    // public function join_the_classroom(){
    //     $this->load->view('admin/headers/admin_header');
    //     $this->load->view('users/join_the_classroom',$data);
    //     $this->load->view('admin/footers/admin_footer');
    // }

    public function join_the_classroom_dashboard()
    {
        $this->load->view('admin/headers/admin_header');
        $this->load->view('admin/join_the_classroom_dashboard');
        $this->load->view('admin/footers/admin_footer');
    }
    public function share_your_dashboard()
    {
        $this->load->view('admin/headers/admin_header');
        $this->load->view('admin/share_your_dashboard');
        $this->load->view('admin/footers/admin_footer');
    }

    public function item_proposal_list()
    {
        $this->load->view('admin/headers/admin_header');
        $this->load->view('admin/item_proposal_list');
        $this->load->view('admin/footers/admin_footer');
    }
    public function item_proposal_view()
    {
        $this->load->view('admin/headers/admin_header');
        $this->load->view('admin/item_proposal_view');
        $this->load->view('admin/footers/admin_footer');
    }
    public function important_draft_list()
    {
        $this->load->view('admin/headers/admin_header');
        $this->load->view('admin/important_draft_list');
        $this->load->view('admin/footers/admin_footer');
    }
    public function important_draft_view()
    {
        $this->load->view('admin/headers/admin_header');
        $this->load->view('admin/important_draft_view');
        $this->load->view('admin/footers/admin_footer');
    }
    public function standard_publish_list()
    {
        $this->load->view('admin/headers/admin_header');
        $this->load->view('admin/standard_publish_list');
        $this->load->view('admin/footers/admin_footer');
    }
    public function standard_publish_view()
    {
        $this->load->view('admin/headers/admin_header');
        $this->load->view('admin/standard_publish_view');
        $this->load->view('admin/footers/admin_footer');
    }
    public function standard_under_list()
    {
        $this->load->view('admin/headers/admin_header');
        $this->load->view('admin/standard_under_list');
        $this->load->view('admin/footers/admin_footer');
    }
    public function standard_under_view()
    {
        $this->load->view('admin/headers/admin_header');
        $this->load->view('admin/standard_under_view');
        $this->load->view('admin/footers/admin_footer');
    }
    public function standard_revised_list()
    {
        $this->load->view('admin/headers/admin_header');
        $this->load->view('admin/standard_revised_list');
        $this->load->view('admin/footers/admin_footer');
    }
    public function standard_revised_view()
    {
        $this->load->view('admin/headers/admin_header');
        $this->load->view('admin/standard_revised_view');
        $this->load->view('admin/footers/admin_footer');
    }
    public function Manage_session_list()
    {

        $newRequest = $this->Standards_Making_model->getnewRequest();
        $ApprovedRequest = $this->Standards_Making_model->getApprovedRequest();
        $RejectedRequest = $this->Standards_Making_model->getRejectedRequest();
        $PublishedRequest = $this->Standards_Making_model->getPublishedRequest();
        $ArchiveRequest = $this->Standards_Making_model->getArchiveRequest();
        $data = array();
        $data['newRequest'] = $newRequest;
        $data['ApprovedRequest'] = $ApprovedRequest;
        $data['RejectedRequest'] = $RejectedRequest;
        $data['PublishedRequest'] = $PublishedRequest;
        $data['ArchiveRequest'] = $ArchiveRequest;
        $this->load->view('admin/headers/admin_header');
        $this->load->view('admin/Manage_session_list', $data);
        $this->load->view('admin/footers/admin_footer');
    }

    public function manage_lsv_standards_list()
    {

        $newRequest = $this->Learningscience_model->getnewRequest();
        $ApprovedRequest = $this->Learningscience_model->getApprovedRequest();
        $RejectedRequest = $this->Learningscience_model->getRejectedRequest();
        $PublishedRequest = $this->Learningscience_model->getPublishedRequest();
        $ArchiveRequest = $this->Learningscience_model->getArchiveRequest();

        $data = array();
        $data['newRequest'] = $newRequest;
        $data['ApprovedRequest'] = $ApprovedRequest;
        $data['RejectedRequest'] = $RejectedRequest;
        $data['PublishedRequest'] = $PublishedRequest;
        $data['ArchiveRequest'] = $ArchiveRequest;
        $this->load->view('admin/headers/admin_header');
        $this->load->view('admin/manage_lsv_standards_list', $data);
        $this->load->view('admin/footers/admin_footer');
    }
    public function live_session_view($id)
    {
        $id = encryptids("D", $id);
        $data = array();
        $liveSessionView = $this->Standards_Making_model->liveSessionViewView($id);
        $data['liveSession'] = $liveSessionView;

        $this->load->view('admin/headers/admin_header');
        $this->load->view('admin/live_session_view', $data);
        $this->load->view('admin/footers/admin_footer');
    }
    public function lsv_standards_view($id)
    {
        $id = encryptids("D", $id);
        $data = array();
        $liveSessionView = $this->Learningscience_model->lsvStandardsViewAdmin($id);
        $data['liveSession'] = $liveSessionView;

        $this->load->view('admin/headers/admin_header');
        $this->load->view('admin/lsv_standards_view', $data);
        $this->load->view('admin/footers/admin_footer');
    }

    public function live_session_list()
    {
        $this->load->view('admin/headers/admin_header');
        $this->load->view('admin/live_session_list');
        $this->load->view('admin/footers/admin_footer');
    }


    public function updateLiveSessiionStatus($id)
    {
        //$this->load->model('Admin/Admin_model');
        $formdata['status'] = $this->input->post('status_id');
        $formdata['reason'] = $this->input->post('remark');

        $encAdminId = $this->session->userdata('admin_id');
        $modify_by = encryptids("D", $encAdminId);

        $formdata['modify_by'] = $modify_by;
        $formdata['updated_on'] = date('Y-m-d  H:i:s');
        $quiz_id = $this->Admin_model->updateLiveSessiionStatus($id, $formdata);
        if ($quiz_id == 1) {
            $this->session->set_flashdata('MSG', ShowAlert("Status Updated", "SS"));
            redirect(base_url() . "admin/Manage_session_list", 'refresh');
        } else {
            $this->session->set_flashdata('MSG', ShowAlert("Failed to Update,Please try again", "DD"));
            redirect(base_url() . "Quiz/quiz_list", 'refresh');
        }
    }

    public function updateLvsStandarStatus($id)
    {
        //$this->load->model('Admin/Admin_model');
        $formdata['status'] = $this->input->post('status_id');
        $formdata['reason'] = $this->input->post('remark');

        $encAdminId = $this->session->userdata('admin_id');
        $modify_by = encryptids("D", $encAdminId);

        $formdata['modify_by'] = $modify_by;
        $formdata['updated_on'] = date('Y-m-d H:i:s');
        $quiz_id = $this->Learningscience_model->updateLvsStandarStatus($id, $formdata);
        if ($quiz_id == 1) {
            $this->session->set_flashdata('MSG', ShowAlert("Status Updated", "SS"));
            redirect(base_url() . "admin/manage_lsv_standards_list", 'refresh');
        } else {
            $this->session->set_flashdata('MSG', ShowAlert("Failed to Update,Please try again", "DD"));
            redirect(base_url() . "admin/manage_lsv_standards_list", 'refresh');
        }
    }


    public function learning_science_list()
    {
        $this->load->view('admin/headers/admin_header');
        $this->load->view('admin/learning_science_list');
        $this->load->view('admin/footers/admin_footer');
    }
    public function learning_science_form()
    {
        $this->load->view('admin/headers/admin_header');
        $this->load->view('admin/learning_science_form');
        $this->load->view('admin/footers/admin_footer');
    }
    public function learning_science_edit()
    {
        $this->load->view('admin/headers/admin_header');
        $this->load->view('admin/learning_science_edit');
        $this->load->view('admin/footers/admin_footer');
    }
    public function learning_science_view()
    {
        $this->load->view('admin/headers/admin_header');
        $this->load->view('admin/learning_science_view');
        $this->load->view('admin/footers/admin_footer');
    }
    public function learning_science_archived()
    {
        $this->load->view('admin/headers/admin_header');
        $this->load->view('admin/learning_science_archived');
        $this->load->view('admin/footers/admin_footer');
    }
    public function learning_science_dashboard()
    {
        $this->load->view('admin/headers/admin_header');
        $this->load->view('admin/learning_science_dashboard');
        $this->load->view('admin/footers/admin_footer');
    }
    public function bt_the_mentorList()
    {
        $this->load->view('admin/headers/admin_header');
        $this->load->view('admin/bt_the_mentorList');
        $this->load->view('admin/footers/admin_footer');
    }
}
