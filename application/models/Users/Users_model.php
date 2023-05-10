 <?php
    defined('BASEPATH') or exit('No direct script access allowed');

    class Users_model extends CI_Model
    {
        public function  insertData($data)
        {
            if ($this->db->insert('tbl_users', $data)) {
                return $this->db->insert_id();
            } else {
                return false;
            }
        }

        //  public function checkUniqueEmail($email)
        //  {
        //      $myQuery = "SELECT a.email_id FROM  tbl_admin a WHERE a.user_email = '{$email}' ";
        //      $query = $this->db->query($myQuery);
        //      if ($query->num_rows() > 0) {
        //          return true;
        //      } else {
        //          return false;
        //      }
        //  }
        public function updateData($id, $data)
        {
            $this->db->where('id', $id);
            if ($this->db->update('tbl_users', $data)) {
                return true;
            } else {
                return false;
            }
        }
        public function updateUserTimeOfAppearedQuiz($user_id,$quiz_id, $data){
            $this->db->where('user_id', $user_id);
            $this->db->where('quiz_id', $quiz_id);
            if ($this->db->update('tbl_users_quiz_que_list', $data)) {
                return true;
            } else {
                return false;
            }
        }
        public function deleteData($id)
        {
            $this->db->where('id', $id);
            if ($this->db->delete('tbl_users')) {
                return true;
            } else {
                return false;
            }
        }

        public function toCheckUserExist($user_id)
        {
            $this->db->where('user_id', $user_id);

            $query = $this->db->get('tbl_users');
            $row = array();
            if ($query->num_rows() > 0) {
                return true;
            } else {
                return false;
            }
        }

       
        public function getUsersDetailsByUserId($user_id)
        {
            $this->db->where('user_id', $user_id);
            $this->db->where('status_id', 1);
            $query = $this->db->get('tbl_users');
            $row = array();
            if ($query->num_rows() > 0) {
                $row = $query->row_array();
            }
            return $row;
        }
        public function prizeDetails($quiz_id)
        {
            $this->db->where('quiz_id', $quiz_id);
            $query = $this->db->get('tbl_prizes');
            $rs = array();
            if ($query->num_rows() > 0) {
                foreach ($query->result_array() as $row) {
                    array_push($rs, $row);
                }
            }
            return $rs;
        }
        // public function getLoginUsers($username,$password)
        // {
        //     $this->db->where('username',$username);
        // 	$this->db->where('password',$password);
        //     //$this->db->where('is_active',1);
        // 	$query=$this->db->get('tbl_admin');  
        //     $row=array();
        //     if ($query->num_rows() > 0){
        //         $row = $query->row_array();
        //     }
        //     return $row;          	

        // }
       
       
        
        public function insertQuestion($formdata)
        {
            $this->db->insert('tbl_user_quiz', $formdata);
            return $insert_id = $this->db->insert_id();
        }


        public function getAllQuize()
        {
            $this->db->select('tbl_quiz_details.*,tbl_mst_status.status_name');
            $this->db->join('tbl_mst_status', 'tbl_mst_status.id = tbl_quiz_details.status');
            return $this->db->get('tbl_quiz_details')->result_array();
        }



        public function insertQuziSubmission($formdata)
        {
            $this->db->insert('tbl_quiz_submission_details', $formdata);
            return $insert_id = $this->db->insert_id();
        }
        public function getCorrectAns($quiz_id, $user_id)
        {
            $query = $this->db->query("SELECT * FROM tbl_user_quiz WHERE selected_op=corr_opt AND user_id='$user_id' AND quiz_id='$quiz_id'");
            return $query->num_rows();
        }
        public function getWrongAns($quiz_id, $user_id)
        {
            $query = $this->db->query("SELECT * FROM tbl_user_quiz WHERE selected_op!=corr_opt AND user_id='$user_id' AND quiz_id='$quiz_id'");
            return $query->num_rows();
        }

        public function getNotSelected($quiz_id, $user_id)
        {
            $query = $this->db->query("SELECT * FROM tbl_user_quiz WHERE selected_op=0 AND user_id='$user_id' AND quiz_id='$quiz_id'");
            return $query->num_rows();
        }
        public function getTotalmarkAndQuestion($id)
        {
            $this->db->where('id', $id);
            return $quiz = $this->db->get('tbl_quiz_details')->row_array();
        }


       

        public function getUserAllQuize()
        {
            $this->db->select('tbl_quiz_details.*,tbl_mst_status.status_name');
            $this->db->where('(date(now()) BETWEEN start_date AND end_date)');
            $this->db->where('tbl_quiz_details.status', 5);
            $this->db->join('tbl_mst_status', 'tbl_mst_status.id = tbl_quiz_details.status');
            return $this->db->get('tbl_quiz_details')->result_array();
        }

        public function getStdClubQuize($user_region_id, $user_branch_id)
        {
            $t = time();

            $current_time = (date("H:i:s", $t));
            $this->db->select('quiz.*,st.status_name');
            $this->db->from('tbl_quiz_details quiz');
            $this->db->join('tbl_mst_status st', 'st.id = quiz.status');
           // $this->db->where('(date(now()) BETWEEN quiz.start_date AND quiz.end_date)');
            // $this->db->where('('.$current_time.' BETWEEN quiz.start_time AND quiz.end_time)'); 
            $this->db->where('quiz.start_date <=' ,date("Y-m-d")); 
            $this->db->where('quiz.end_date >=' ,date("Y-m-d"));  
           // $this->db->where('quiz.start_time <=', $current_time);
           // $this->db->where('quiz.end_time >=', $current_time);
            $this->db->where('quiz.status', 5);

            $this->db->where_in('quiz.branch_id',array($user_branch_id,0));
            $this->db->where_in('quiz.region_id', array($user_region_id, 0));
            // $rs = array();
            // $query = $this->db->get();
            // if ($query->num_rows() > 0) {
            //     $rs = $query->result_array();
            // }
            // return $rs;
            $res = array();
                $rs = array();
                $query=$this->db->get();
                if($query->num_rows() > 0){
                    $res = $query->result_array();
                    foreach($res as $row){
                        if($row['start_date'] == date("Y-m-d") ){
                            if($row['start_time'] <= $current_time){
                                array_push($rs,$row);
                            }
                        }else if($row['end_date'] == date("Y-m-d") ){
                            if($row['end_time'] >= $current_time){
                                array_push($rs,$row);
                            }
                        }else{
                            array_push($rs,$row);
                        }
                    }
                }
                return $rs;  
                }
       
        public function getStdClubQuizAll()
        {
            $t = time();

            $current_time = (date("H:i:s", $t));
            $this->db->select('quiz.*,st.status_name');
            $this->db->from('tbl_quiz_details quiz');
            $this->db->join('tbl_mst_status st', 'st.id = quiz.status');
            //$this->db->where('(date(now()) BETWEEN quiz.start_date AND quiz.end_date)'); 
            $this->db->where('quiz.start_date <=', date("Y-m-d"));
            $this->db->where('quiz.end_date >=', date("Y-m-d"));

            // $this->db->where('quiz.start_time <=', $current_time);
            // $this->db->where('quiz.end_time >=', $current_time);
            $this->db->where('quiz.status', 5);

            // $rs = array();
            // $query = $this->db->get();
            // if ($query->num_rows() > 0) {
            //     $rs = $query->result_array();
            // }
            // return $rs;
            $res = array();
            $rs = array();
            $query=$this->db->get();
            if($query->num_rows() > 0){
                $res = $query->result_array();
                foreach($res as $row){
                    if($row['start_date'] == date("Y-m-d") ){
                        if($row['start_time'] <= $current_time){
                            array_push($rs,$row);
                        }
                    }else if($row['end_date'] == date("Y-m-d") ){
                        if($row['end_time'] >= $current_time){
                            array_push($rs,$row);
                        }
                    }else{
                        array_push($rs,$row);
                    }
                }
            }
            return $rs;  
        }

        public function contact_us()
        {
            $this->db->select('*');
            $this->db->from('tbl_contact_us_detail');
            $query = $this->db->get();
            $res = $query->result_array();
            return $res[0];
        }

        public function about_exchange_forum()
        {
            $this->db->select('*');
            $this->db->from('tbl_about_exchange_forum');
            $query = $this->db->get();
            $res = $query->result_array();
            return $res[0];
        }
        public function get_legal_data($data)
        {
            $this->db->select($data);
            $this->db->from('tbl_legel');
            $query = $this->db->get();
            $data = $query->result_array();
            return $data[0];
        }


        public function checkUserAttempt($user_id = '', $quiz_id = '')
        {
            $this->db->where('user_id', $user_id);
            $this->db->where('quiz_id', $quiz_id);
            $quiz = $this->db->get('tbl_user_quiz_attempt')->row_array();
            if (empty($quiz)) {
                $formdata['user_id'] = $user_id;
                $formdata['quiz_id'] = $quiz_id;
                $formdata['user_counter'] = 1;
                $this->db->insert('tbl_user_quiz_attempt', $formdata);
                $insert_id = $this->db->insert_id();
                if ($insert_id) {
                    $this->db->where('user_id', $user_id);
                    $this->db->where('quiz_id', $quiz_id);
                    return $this->db->get('tbl_user_quiz_attempt')->row_array();
                }
            } else {
                $formdata['user_counter'] = 2;
                $this->db->where('user_id', $user_id);
                $this->db->where('quiz_id', $quiz_id);
                $update = $this->db->update('tbl_user_quiz_attempt', $formdata);
                if ($update == 1) {
                    $this->db->where('user_id', $user_id);
                    $this->db->where('quiz_id', $quiz_id);
                    return $this->db->get('tbl_user_quiz_attempt')->row_array();
                }
            }
        }
        // In Conversation With Experts  Function Start For FrontEnd
        public function getPublishedConversation()
        {
            $this->db->select('tbl_inconversation_with_expert.*,tbl_mst_status.status_name');
            $this->db->where('status ', 5);
            $this->db->join('tbl_mst_status', 'tbl_mst_status.id = tbl_inconversation_with_expert.status');
            return $this->db->get('tbl_inconversation_with_expert')->result_array();
        }

        public function getRecentSearch()
        {
            $this->db->select('tbl_inconversation_with_expert.*,tbl_mst_status.status_name');
            $this->db->where('status ', 5);
            $this->db->join('tbl_mst_status', 'tbl_mst_status.id = tbl_inconversation_with_expert.status');
            $this->db->limit(5);
            return $this->db->get('tbl_inconversation_with_expert')->result_array();
        }
        public function getConversation($id)
        {
            $this->db->where('id', $id);
            return $quiz = $this->db->get('tbl_inconversation_with_expert')->row_array();
        }
        public function checkConversationView($id, $ip_address)
        {
            $this->db->where('conversation_id', $id);
            $this->db->where('ip_address', $ip_address);
            $info = $this->db->get('tbl_conversation_video_info')->row_array();
            if (empty($info)) {
                $formdata['conversation_id'] = $id;
                $formdata['ip_address'] = $ip_address;
                $formdata['user_view'] = 1;
                $this->db->insert('tbl_conversation_video_info', $formdata);
                $insert_id = $this->db->insert_id();
                if ($insert_id) {
                    $query = $this->db->query("SELECT * FROM tbl_conversation_video_info");
                    $viewcount = $query->num_rows();
                    $formdata2['views'] = $viewcount;
                    $this->db->where('id', $id);
                    return $update = $this->db->update('tbl_inconversation_with_expert', $formdata2);
                }
            } else {
                return 0;
            }
        }

        public function CheckLiveSessionlike($id, $admin_id)
        {

            $this->db->where('classroom_id', $id);
            $this->db->where('admin_id', $admin_id);
            return $info = $this->db->get('tbl_join_the_classroom_info')->row_array();
        }

        public function getLikes($id, $ip_address)
        {
            $this->db->where('conversation_id', $id);
            $this->db->where('ip_address', $ip_address);
            return $info = $this->db->get('tbl_conversation_video_info')->row_array();
        }

        public function updateLikes($id, $ip_address)
        {
            $this->db->where('conversation_id', $id);
            $this->db->where('ip_address', $ip_address);
            $data['user_like'] = 1;
            if ($this->db->update('tbl_conversation_video_info', $data)) {
                $query = $this->db->query("SELECT * FROM tbl_conversation_video_info WHERE user_like=1 AND conversation_id=$id");
                $viewcount = $query->num_rows();
                $formdata2['likes'] = $viewcount;
                $this->db->where('id', $id);
                $update = $this->db->update('tbl_inconversation_with_expert', $formdata2);
                if ($update) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }
        public function updateLiveSessionLikes($id, $admin_id)
        {
            $this->db->where('classroom_id', $id);
            $this->db->where('admin_id', $admin_id);
            $data['user_likes'] = 1;
            if ($this->db->update('tbl_join_the_classroom_info', $data)) {
                $query = $this->db->query("SELECT * FROM tbl_join_the_classroom_info WHERE user_likes=1 AND classroom_id=$id");
                $viewcount = $query->num_rows();
                $formdata2['likes'] = $viewcount;
                $this->db->where('id', $id);
                $update = $this->db->update('tbl_join_the_classroom', $formdata2);
                if ($update) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }
        // In Conversation With Experts  Function End For FrontEnd

        // Item Proposal Function Start For FrontEnd
        public function insertItemProposal($formdata)
        {
            $this->db->replace('tbl_item_proposal', $formdata);
            return $insert_id = $this->db->insert_id();
        }
        public function ItemProposalCount()
        {
            return $quiz = $this->db->get('tbl_item_proposal')->result_array();
        }
        public function getItemProposal($id)
        {
            $this->db->where('id', $id);
            return $quiz = $this->db->get('tbl_item_proposal')->row_array();
        }
        // Item Proposal Function End For FrontEnd

        // Join The classroom Function Start For FrontEnd
        public function getUpcomingsSessions()
        {
            $this->db->where('status ', 5);
            $this->db->order_by('created_on', 'desc');
            return $quiz = $this->db->get('tbl_join_the_classroom')->result_array();
        }
        public function getLiveSessions()
        {
            $this->db->where('type_of_post', 3);
            $this->db->where('status ', 5);
            $this->db->order_by('created_on', 'desc');
            return $quiz = $this->db->get('tbl_join_the_classroom')->result_array();
        }

        public function getLatestPosts()
        {
            $this->db->where('type_of_post', 1);
            $this->db->where('status ', 5);
            $this->db->order_by('created_on', 'desc');
            return $quiz = $this->db->get('tbl_join_the_classroom')->result_array();
        }
        public function getInformativeVideo()
        {
            $this->db->where('type_of_post', 2);
            $this->db->where('status ', 5);
            $this->db->order_by('created_on', 'desc');
            return $quiz = $this->db->get('tbl_join_the_classroom')->result_array();
        }

        public function getJoinTheClassroomContaint($id)
        {
            $this->db->where('id', $id);
            return $quiz = $this->db->get('tbl_join_the_classroom')->row_array();
        }
        // Join The classroom Function End For FrontEnd

        // learning Standerd Function Start For FrontEnd
        public function getlearningStanderdSessions()
        {
            $this->db->where('type_of_post', 3);
            $this->db->where('status ', 5);
            $this->db->order_by('created_on', 'desc');
            return $quiz = $this->db->get('tbl_learning_science_via_standards')->result_array();
        }

        public function getlearningStanderdPosts()
        {
            $this->db->where('type_of_post', 1);
            $this->db->where('status ', 5);
            $this->db->order_by('created_on', 'desc');
            return $quiz = $this->db->get('tbl_learning_science_via_standards')->result_array();
        }
        public function getlearningStanderdInformativeVideo()
        {
            $this->db->where('type_of_post', 2);
            $this->db->where('status ', 5);
            $this->db->order_by('created_on', 'desc');
            return $quiz = $this->db->get('tbl_learning_science_via_standards')->result_array();
        }

        public function getContaintlearningStanderd($id)
        {
            $this->db->where('id', $id);
            return $quiz = $this->db->get('tbl_learning_science_via_standards')->row_array();
        }
        // learning Standerd Function End For FrontEnd


        public function checkClassroomView($id, $admin_id)
        {
            $this->db->where('classroom_id', $id);
            $this->db->where('admin_id', $admin_id);
            $info = $this->db->get('tbl_join_the_classroom_info')->row_array();
            if (empty($info)) {
                $formdata['classroom_id'] = $id;
                $formdata['admin_id'] = $admin_id;
                $formdata['user_view'] = 1;
                $this->db->insert('tbl_join_the_classroom_info', $formdata);
                $insert_id = $this->db->insert_id();
                if ($insert_id) {
                    $query = $this->db->query("SELECT * FROM tbl_join_the_classroom_info WHERE classroom_id='$id'");
                    $viewcount = $query->num_rows();
                    $formdata2['views'] = $viewcount;
                    $this->db->where('id', $id);
                    return $update = $this->db->update('tbl_join_the_classroom', $formdata2);
                }
            } else {
                return 0;
            }
        }


        public function checkleasrningView($id, $admin_id)
        {
            $this->db->where('learning_id', $id);
            $this->db->where('admin_id', $admin_id);
            $info = $this->db->get('tbl_learning_science_info')->row_array();
            if (empty($info)) {
                $formdata['learning_id'] = $id;
                $formdata['admin_id'] = $admin_id;
                $formdata['user_view'] = 1;
                $this->db->insert('tbl_learning_science_info', $formdata);
                $insert_id = $this->db->insert_id();
                if ($insert_id) {
                    $query = $this->db->query("SELECT * FROM tbl_learning_science_info WHERE learning_id='$id'");
                    $viewcount = $query->num_rows();
                    $formdata2['views'] = $viewcount;
                    $this->db->where('id', $id);
                    return $update = $this->db->update('tbl_learning_science_via_standards', $formdata2);
                }
            } else {
                return 0;
            }
        }


        public function Checkleasrninglike($id, $admin_id)
        {
            $this->db->where('learning_id', $id);
            $this->db->where('admin_id', $admin_id);
            return $info = $this->db->get('tbl_learning_science_info')->row_array();
        }
        public function updateUpdateleasrningLikes($id, $admin_id)
        {
            $this->db->where('learning_id', $id);
            $this->db->where('admin_id', $admin_id);
            $data['user_like'] = 1;
            if ($this->db->update('tbl_learning_science_info', $data)) {
                $query = $this->db->query("SELECT * FROM tbl_learning_science_info WHERE user_like=1 AND learning_id=$id");
                $viewcount = $query->num_rows();
                $formdata2['likes'] = $viewcount;
                $this->db->where('id', $id);
                $update = $this->db->update('tbl_learning_science_via_standards', $formdata2);
                if ($update) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }
        public function add_feedback_data($data)
        {
            if ($this->db->insert('tbl_mst_feedback_data', $data)) {
                return $this->db->insert_id();
            } else {
                return false;
            }
        }
        public function get_feedback_data()
        {
            $this->db->select('*');
            $this->db->from('tbl_mst_feedback_data');
            $this->db->where('status!=', '9');
            $query = $this->db->get();
            $res = $query->result_array();
            return $res;
        }
        public function get_feedback_detail($id)
        {
            $this->db->select('*');
            $this->db->from('tbl_mst_feedback_data');
            $this->db->where('id', $id);
            $query = $this->db->get();
            $res = $query->result_array();
            return $res[0];
        }
        public function delete_feedback($id)
        {
            $id = $this->db->delete('tbl_mst_feedback_data', ['id' => $id]);
            if ($id) {
                return true;
            } else {
                return false;
            }
        }
        public function getArchivedFeedback()
        {
            $this->db->select('*');
            $this->db->from('tbl_mst_feedback_data');
            $this->db->where('status', '9');
            $query = $this->db->get();
            $res = $query->result_array();
            return $res;
        }
        public function feedback_archive($id)
        {
            $id = $this->db->update('tbl_mst_feedback_data', ['status' => '9'], ['id' => $id]);
            if ($id) {
                return true;
            } else {
                return false;
            }
        }
        public function restore_feedback($id)
        {
            $id = $this->db->update('tbl_mst_feedback_data', ['status' => '0'], ['id' => $id]);
            if ($id) {
                return true;
            } else {
                return false;
            }
        }


        /////////////////// quiz start functions  START ////////////////////////
        public function checkAdminLogin()
        {
            $enc_user_id = $this->session->userdata('admin_id');
            if ($enc_user_id) {
                $dec_user_id = encryptids("D", $enc_user_id);
                if ($dec_user_id > 0) {
                    $is_gen_user = $this->db->get_where("tbl_users", array("user_id" => $dec_user_id, "status_id" => 1))->num_rows();
                    if ($is_gen_user > 0) {
                        return true;
                    } else {
                        return false;
                    }
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }
        /* public function isQuizForThisUser($user_id,$quiz_id)
        {   
            $t=time();
            $current_time = (date("H:i:s",$t));

            $user_region_id = encryptids("D", $this->session->userdata('region_id'));
           // $user_branch_id = encryptids("D", $this->session->userdata('branch_id'));

            $this->db->select('quiz.*,st.status_name'); 
            $this->db->from('tbl_quiz_details quiz');
            $this->db->join('tbl_mst_status st','st.id = quiz.status'); 
            $this->db->where('(date(now()) BETWEEN quiz.start_date AND quiz.end_date)'); 
            // $this->db->where('('.$current_time.' BETWEEN quiz.start_time AND quiz.end_time)'); 
            $this->db->where('quiz.start_time <=' ,$current_time); 
            $this->db->where('quiz.end_time >=' ,$current_time); 
            $this->db->where('quiz.status',5); 

            //$this->db->where_in('quiz.branch_id',array($user_branch_id,0));
            $this->db->where_in('quiz.region_id',array($user_region_id,0));
            $this->db->where('quiz.id',$quiz_id); 
            $rs = array();
            $query=$this->db->get();
            if($query->num_rows() > 0){
                $rs = $query->result_array();
            }
            return $rs;  
        }*/
        public function isQuizForThisUser($user_id, $quiz_id)
        {
            $t = time();
            $current_time = (date("H:i:s", $t));

            $user_region_id = encryptids("D", $this->session->userdata('region_id'));
            $user_branch_id = encryptids("D", $this->session->userdata('branch_id'));
            $user_standard_club_category = encryptids("D", $this->session->userdata('standard_club_category'));
            if ($user_standard_club_category == 1) {
                $ava = 1;
            } else {
                $ava = 2;
            }
            $this->db->select('quiz.*,st.status_name');
            $this->db->from('tbl_quiz_details quiz');
            $this->db->join('tbl_mst_status st', 'st.id = quiz.status');
            //$this->db->where('(date(now()) BETWEEN quiz.start_date AND quiz.end_date)'); 
            $this->db->where('quiz.start_date <=', date("Y-m-d"));
            $this->db->where('quiz.end_date >=', date("Y-m-d"));
            // $this->db->where('('.$current_time.' BETWEEN quiz.start_time AND quiz.end_time)'); 

            //$this->db->where('quiz.start_time <=', $current_time);
            //$this->db->where('quiz.end_time >=', $current_time);
            $this->db->where('quiz.status', 5);

            $this->db->where_in('quiz.availability_id', $ava);
            $this->db->where_in('quiz.branch_id', array($user_branch_id, 0));
            $this->db->where_in('quiz.region_id', array($user_region_id, 0));
            $this->db->where('quiz.id', $quiz_id);
            // $rs = array();
            // $query = $this->db->get();
            // if ($query->num_rows() > 0) {
            //     $rs = $query->result_array();
            // }
            // return $rs;

            $res = array();
            $rs = array();
            $query=$this->db->get();
            if($query->num_rows() > 0){
                $res = $query->result_array();
                foreach($res as $row){
                    if($row['start_date'] == date("Y-m-d") ){
                        if($row['start_time'] <= $current_time){
                            array_push($rs,$row);
                        }
                    }else if($row['end_date'] == date("Y-m-d") ){
                        if($row['end_time'] >= $current_time){
                            array_push($rs,$row);
                        }
                    }else{
                        array_push($rs,$row);
                    }
                }
            }
            return $rs;  
        }
        public function checkUserAvailable($quiz_id, $user_id)
        {
            $query = $this->db->query("SELECT * FROM tbl_quiz_submission_details WHERE user_id='$user_id' AND quiz_id='$quiz_id'");
            return $query->num_rows();
        }
       
        public function  checkUserQuizForReplicaQueBank($quiz_id, $user_id)
        {
            // $this->db->where('id',$quiz_id); 
            // $quiz = $this->db->get('tbl_quiz_details')->row_array();
            // $curr_que_bank_id= $quiz['que_bank_id'];

            $this->db->where('quiz_linked_id', $quiz_id);
            $queBank = $this->db->get('tbl_que_bank')->row_array();
            $replica_of_qb_id = $queBank['replica_of_qb_id'];
            if ($replica_of_qb_id != 0) {
                // this is replica of que bank
                $this->db->where('que_bank_id', $replica_of_qb_id);
                $quiz = $this->db->get('tbl_quiz_details')->row_array();
                if (empty($quiz)) {
                    // this que bank not linked with any quiz
                    return 1;
                } else {
                    // if linked 
                    $quiz_id_new = $quiz['id']; // getting quiz id 
                    // now search for user
                    $query_new = $this->db->query("SELECT * FROM tbl_quiz_submission_details WHERE user_id='$user_id' AND quiz_id='$quiz_id_new'");
                    $count =  $query_new->num_rows();
                    if ($count > 0) {
                        // already given similar quiz
                        return 0;
                    } else {
                        return 1;
                    }
                }
            } else {
                // new
                return 1;
            }
        }
        public function CheckUserPartiallyAppear($quiz_id, $user_id)
        {
            $query = $this->db->query("SELECT * FROM  tbl_users_quiz_que_list WHERE user_id='$user_id' AND quiz_id='$quiz_id'");
            return $query->row_array();
        }
        public function oldgetQuestionDetailsForPartiallyAppered($question_list){
            $this->db->select('*');
            $this->db->from('tbl_que_details');
            $this->db->where_in('que_id',$question_list);
            $query = $this->db->get();
            //SELECT * FROM `tbl_que_details` WHERE `que_id` IN('24', '23', '28', '27', '26')
            $rs = array();
            if($query->num_rows() >0 ) {
                $res = $query->result_array();
                foreach ($res as $row){
                    array_push($rs,$row);
                }                
            }
            return $rs;
          
        }
        public function viewQuestion($id)
        {
            $this->db->where('id', $id);
            $quiz = $this->db->get('tbl_quiz_details')->row_array();
            $que_bank_id = $quiz['que_bank_id'];
            $total_question = $quiz['total_question'];
            $query = $this->db->query("SELECT * FROM tbl_que_details WHERE que_bank_id='$que_bank_id' ORDER BY RAND ( ) LIMIT $total_question");
            return $query->result_array();
        }
        public function getQuestionDetailsForPartiallyAppered($user_id,$quiz_id,$question_list){
            $this->db->select('*');
            $this->db->from('tbl_que_details');
            $this->db->where_in('que_id',$question_list);
            $query = $this->db->get();
            //SELECT * FROM `tbl_que_details` WHERE `que_id` IN('24', '23', '28', '27', '26')
            $result = array();
            if($query->num_rows() >0 ) {
                $res = $query->result_array();
                foreach ($res as $row){
                    $this->db->select('userquiz.selected_op');
                    $this->db->from('tbl_user_quiz_temp userquiz');
                   
                    $this->db->where('userquiz.ques_id',$row['que_id']);
                    $this->db->where('userquiz.user_id',$user_id);
                    $this->db->where('userquiz.quiz_id',$quiz_id);
                    $query1 = $this->db->get();
                   
                        if($query1->num_rows() >0 ) {
                            $queRow = $query1->row_array();
                            $row['selected_op'] =  $queRow['selected_op'];
                        }else{
                            $row['selected_op'] =  0;
                        }
                    array_push($result,$row);
                }                
            }
           // echo json_encode($result);exit();
            return $result;

        //     $this->db->select('userquiz.selected_op,que.*');
        //     $this->db->from('tbl_que_details que  ');
        //     $this->db->join('tbl_user_quiz_temp userquiz', 'que.que_id = userquiz.ques_id','left');
        //     $this->db->where_in('que.que_id',$question_list);
        //     $this->db->where('userquiz.user_id',$user_id);
        //     $this->db->where('userquiz.quiz_id',$quiz_id);
        //     $query = $this->db->get();
        //    // return $query->result_array();
        //     $rs = array();
        //     if($query->num_rows() >0 ) {
        //         $res = $query->result_array();
        //         foreach ($res as $row){
        //             array_push($rs,$row);
        //         }                
        //     }
      
        //     return $rs;
          
        }
        public function insertQuizData($data)
        {
            if ($this->db->insert('tbl_users_quiz_que_list', $data)) {
                return $this->db->insert_id();
            } else {
                return false;
            }
        }
       
     
       
        public function quizDetailsByQuizId($id)
        {
            $this->db->where('id', $id);
            return $this->db->get('tbl_quiz_details')->row_array();
        }
         public function getUserTimeOfAppearedQuiz($user_id,$quiz_id){
            $this->db->select('*');
            $this->db->from('tbl_users_quiz_que_list');
            $this->db->where('user_id',$user_id);
            $this->db->where('quiz_id',$quiz_id);
            $query = $this->db->get();
           
            $rs = array();
            if($query->num_rows() >0 ) {
                return  $query->row_array();                            
            }else{
                return $rs;
            }
          
          
         }
         public function viewQuiz($id)
         {
             $this->db->select('tbl_quiz_details.*,
             tbl_mst_language.title as language,
             tbl_mst_quiz_availability.title as availability,
             tbl_mst_quiz_level.title as level,
             tbl_mst_regions.uvc_region_title as region,
             tbl_mst_branch.uvc_department_name as branch
             
             ');
             $this->db->where('tbl_quiz_details.id', $id);
             $this->db->join('tbl_mst_language', 'tbl_mst_language.id = tbl_quiz_details.language_id');
             $this->db->join('tbl_mst_quiz_availability', 'tbl_mst_quiz_availability.id = tbl_quiz_details.availability_id');
             $this->db->join('tbl_mst_quiz_level', 'tbl_mst_quiz_level.id = tbl_quiz_details.quiz_level_id');
             $this->db->join('tbl_mst_regions', 'tbl_mst_regions.pki_region_id = tbl_quiz_details.region_id', 'left');
             $this->db->join('tbl_mst_branch', 'tbl_mst_branch.pki_id = tbl_quiz_details.branch_id', 'left');
             return $this->db->get('tbl_quiz_details')->row_array();
         }
         public function insertAttemptedQuesDetailsOfUser($data){
            if ($this->db->insert('tbl_user_quiz_temp', $data)) {
                return $this->db->insert_id();
            } else {
                return false;
            }
         }
         /////////////////// quiz start functions  END ////////////////////////

    // }
 
    // public function ItemProposalCount()
    // {
    //     return $quiz = $this->db->get('tbl_item_proposal')->result_array(); 
    // }
    // public function getItemProposal($id)
    // {   
    //     $this->db->where('id',$id); 
    //     return $quiz = $this->db->get('tbl_item_proposal')->row_array();
    // }
    // Item Proposal Function End For FrontEnd

    // Join The classroom Function Start For FrontEnd
    // public function getUpcomingsSessions()
    // {
    //     $this->db->where('status ',5); 
    //     $this->db->order_by('created_on', 'desc'); 
    //    return $quiz = $this->db->get('tbl_join_the_classroom')->result_array();
    // }
    // public function getLiveSessions()
    // {
    //     $this->db->where('type_of_post',3); 
    //     $this->db->where('status ',5); 
    //     $this->db->order_by('created_on', 'desc'); 
    //     return $quiz = $this->db->get('tbl_join_the_classroom')->result_array();
    // }

    // public function getLatestPosts()
    // {
    //     $this->db->where('type_of_post',1); 
    //     $this->db->where('status ',5); 
    //     $this->db->order_by('created_on', 'desc'); 
    //    return $quiz = $this->db->get('tbl_join_the_classroom')->result_array();
    // }
    // public function getInformativeVideo()
    // {
    //     $this->db->where('type_of_post',2); 
    //     $this->db->where('status ',5); 
    //     $this->db->order_by('created_on', 'desc'); 
    //    return $quiz = $this->db->get('tbl_join_the_classroom')->result_array();
    // }

    // public function getJoinTheClassroomContaint($id)
    // {   
    //     $this->db->where('id',$id);  
    //     return $quiz = $this->db->get('tbl_join_the_classroom')->row_array();
    // } 
    // Join The classroom Function End For FrontEnd

    // learning Standerd Function Start For FrontEnd
    // public function getlearningStanderdSessions()
    // {
    //     $this->db->where('type_of_post',3); 
    //     $this->db->where('status ',5); 
    //     $this->db->order_by('created_on', 'desc'); 
    //    return $quiz = $this->db->get('tbl_learning_science_via_standards')->result_array();
    // }

    // public function getlearningStanderdPosts()
    // {
    //     $this->db->where('type_of_post',1); 
    //     $this->db->where('status ',5); 
    //     $this->db->order_by('created_on', 'desc'); 
    //    return $quiz = $this->db->get('tbl_learning_science_via_standards')->result_array();
    // }
    // public function getlearningStanderdInformativeVideo()
    // {
    //     $this->db->where('type_of_post',2); 
    //     $this->db->where('status ',5); 
    //     $this->db->order_by('created_on', 'desc'); 
    //    return $quiz = $this->db->get('tbl_learning_science_via_standards')->result_array();
    // }

    // public function getContaintlearningStanderd($id)
    // {   
    //     $this->db->where('id',$id);  
    //     return $quiz = $this->db->get('tbl_learning_science_via_standards')->row_array();
    // }
    // learning Standerd Function End For FrontEnd


// public function checkClassroomView($id,$admin_id)
//     {
//         $this->db->where('classroom_id',$id); 
//         $this->db->where('admin_id',$admin_id); 
//         $info = $this->db->get('tbl_join_the_classroom_info')->row_array();
//         if (empty($info))
//         {
//             $formdata['classroom_id']=$id;
//             $formdata['admin_id']=$admin_id;
//             $formdata['user_view']=1; 
//              $this->db->insert('tbl_join_the_classroom_info',$formdata); 
//              $insert_id = $this->db->insert_id();
//              if ($insert_id) {
//                 $query = $this->db->query("SELECT * FROM tbl_join_the_classroom_info WHERE classroom_id='$id'");
//                 $viewcount=$query->num_rows();
//                 $formdata2['views']=$viewcount;
//                 $this->db->where('id',$id); 
//                 return $update = $this->db->update('tbl_join_the_classroom', $formdata2); 
//             }
//         }
//         else
//         {   
//             return 0;  
//         }
    // }


    // public function checkleasrningView($id,$admin_id)
    // {
    //     $this->db->where('learning_id',$id); 
    //     $this->db->where('admin_id',$admin_id); 
    //     $info = $this->db->get('tbl_learning_science_info')->row_array();
    //     if (empty($info))
    //     {
    //         $formdata['learning_id']=$id;
    //         $formdata['admin_id']=$admin_id;
    //         $formdata['user_view']=1; 
    //          $this->db->insert('tbl_learning_science_info',$formdata); 
    //          $insert_id = $this->db->insert_id();
    //          if ($insert_id) {
    //             $query = $this->db->query("SELECT * FROM tbl_learning_science_info WHERE learning_id='$id'");
    //             $viewcount=$query->num_rows();
    //             $formdata2['views']=$viewcount;
    //             $this->db->where('id',$id); 
    //             return $update = $this->db->update('tbl_learning_science_via_standards', $formdata2); 
    //         }
    //     }
    //     else
    //     {   
    //         return 0;  
    //     }
    // }


// public function Checkleasrninglike($id,$admin_id)
//     { 
//         $this->db->where('learning_id',$id); 
//         $this->db->where('admin_id',$admin_id); 
//         return $info = $this->db->get('tbl_learning_science_info')->row_array(); 
//     }
    //  public function updateUpdateleasrningLikes($id,$admin_id)
    //  {
    //     $this->db->where('learning_id', $id);
    //     $this->db->where('admin_id', $admin_id);
    //     $data['user_like']=1;
    //     if ($this->db->update('tbl_learning_science_info', $data)) 
    //     {
    //         $query = $this->db->query("SELECT * FROM tbl_learning_science_info WHERE user_like=1 AND learning_id=$id");
    //         $viewcount=$query->num_rows();
    //         $formdata2['likes']=$viewcount;
    //         $this->db->where('id',$id); 
    //         $update = $this->db->update('tbl_learning_science_via_standards', $formdata2);
    //         if ($update) 
    //         {
    //             return true;
    //         }
    //         else
    //         {
    //             return false;
    //         }
            
    //     } 
    //     else  { return false; }
    // }
    // public function add_feedback_data($data){
    //     if ($this->db->insert('tbl_mst_feedback_data', $data)) {
    //         return $this->db->insert_id();
    //     } else {
    //         return false;
    //     }
    // }
    // public function get_feedback_data(){
    //     $this->db->select('*');
    //     $this->db->from('tbl_mst_feedback_data');
    //     $this->db->where('status!=','9');
    //     $query=$this->db->get();
    //     $res=$query->result_array();
    //     return $res;
    // }
    // public function get_feedback_detail($id){
    //     $this->db->select('*');
    //     $this->db->from('tbl_mst_feedback_data');
    //     $this->db->where('id',$id);
    //     $query=$this->db->get();
    //     $res=$query->result_array();
    //     return $res[0];
    // }
    // public function delete_feedback($id){
    //     $id=$this->db->delete('tbl_mst_feedback_data',['id'=>$id]);
    //     if($id){
    //         return true;
    //     }else{
    //         return false;
    //     }
    // }
    // public function getArchivedFeedback(){
    //     $this->db->select('*');
    //     $this->db->from('tbl_mst_feedback_data');
    //     $this->db->where('status','9');
    //     $query=$this->db->get();
    //     $res=$query->result_array();
    //     return $res;
    // }
    // public function feedback_archive($id){
    //     $id=$this->db->update('tbl_mst_feedback_data',['status'=>'9'],['id'=>$id]);
    //     if($id){
    //         return true;
    //     }else{
    //         return false;
    //     }
    // }
    // public function restore_feedback($id){
    //     $id=$this->db->update('tbl_mst_feedback_data',['status'=>'0'],['id'=>$id]);
    //     if($id){
    //         return true;
    //     }else{
    //         return false;
    //     }
    // }

     public function insertImportantDraft($formdata)
    { 
        $this->db->replace('tbl_important_draft_standards',$formdata); 
        return $insert_id = $this->db->insert_id();
    }
    public function ImportantDraftCount()
    {
        return $quiz = $this->db->get('tbl_important_draft_standards')->result_array(); 
    }
    public function getImportantDraft($doc_no)
    {   
        $this->db->where('doc_no',$doc_no); 
        return $quiz = $this->db->get('tbl_important_draft_standards')->row_array();
    }

    public function insertNewStandardsPublished($formdata)
    { 
        $this->db->replace('tbl_new_standards_published',$formdata); 
        return $insert_id = $this->db->insert_id();
    }
    public function NewStandardsPublishedCount()
    {
        return $quiz = $this->db->get('tbl_new_standards_published')->result_array(); 
    }
    public function getNewStandardsPublished($pk_is_id)
    {   
        $this->db->where('pk_is_id',$pk_is_id); 
        return $quiz = $this->db->get('tbl_new_standards_published')->row_array();
    }

    public function insertStandardsRevised($formdata)
    { 
        $this->db->replace('tbl_standards_revised',$formdata); 
        return $insert_id = $this->db->insert_id();
    }
    public function StandardsRevisedCount()
    {
        return $quiz = $this->db->get('tbl_standards_revised')->result_array(); 
    }
    public function getStandardsRevised($pk_is_id)
    {   
        $this->db->where('pk_is_id',$pk_is_id); 
        return $quiz = $this->db->get('tbl_standards_revised')->row_array();
    }
 
    public function insertNewWorkCommnents($formdata)
    {
        $this->db->insert('tbl_new_work_comments',$formdata); 
        return $insert_id = $this->db->insert_id();
    }
    public function getItemProposalComments($id)
    { 
        $this->db->select('tbl_new_work_comments.*,tbl_users.user_name'); 
        // $this->db->where('status ',5); 
        $this->db->where('new_work_id',$id); 
        $this->db->join('tbl_users','tbl_users.user_id = tbl_new_work_comments.admin_id'); 
        $this->db->order_by('created_on', 'desc'); 
        return $this->db->get('tbl_new_work_comments')->result_array(); 
    }

    public function insertImportantDraftComments($formdata)
    {
        $this->db->insert('tbl_important_draft_comments',$formdata); 
        return $insert_id = $this->db->insert_id();
    }
    public function getImportantDraftComments($id)
    { 
        $this->db->select('tbl_important_draft_comments.*,tbl_users.user_name'); 
        // $this->db->where('status ',5); 
        $this->db->where('doc_no',$id); 
        $this->db->join('tbl_users','tbl_users.user_id = tbl_important_draft_comments.admin_id'); 
        $this->db->order_by('created_on', 'desc'); 
        return $this->db->get('tbl_important_draft_comments')->result_array(); 
    }

    public function insertStandardPublishComments($formdata)
    {
        $this->db->insert('tbl_standard_publish_comments',$formdata); 
        return $insert_id = $this->db->insert_id();
    }
    public function getStandardPublishComments($id)
    { 
        $this->db->select('tbl_standard_publish_comments.*,tbl_users.user_name'); 
        // $this->db->where('status ',5); 
        $this->db->where('pk_is_id',$id); 
        $this->db->join('tbl_users','tbl_users.user_id = tbl_standard_publish_comments.admin_id'); 
        $this->db->order_by('created_on', 'desc'); 
        return $this->db->get('tbl_standard_publish_comments')->result_array(); 
    }

    public function insertStandardRevisedComments($formdata)
    {
        $this->db->insert('tbl_standard_revised_comments',$formdata); 
        return $insert_id = $this->db->insert_id();
    }
    public function getStandardRevisedComments($id)
    { 
        $this->db->select('tbl_standard_revised_comments.*,tbl_users.user_name'); 
        // $this->db->where('status ',5); 
        $this->db->where('pk_is_id',$id); 
        $this->db->join('tbl_users','tbl_users.user_id = tbl_standard_revised_comments.admin_id'); 
        $this->db->order_by('created_on', 'desc'); 
        return $this->db->get('tbl_standard_revised_comments')->result_array(); 
    }

    public function insertStandardUnderReview($formdata)
    { 
        $this->db->replace('tbl_standard_under_review',$formdata); 
        return $insert_id = $this->db->insert_id();
    }
    public function StandardUnderReviewCount()
    {
        return $quiz = $this->db->get('tbl_standard_under_review')->result_array(); 
    }
    public function getStandardUnderReviewComments($id)
    { 
        $this->db->select('tbl_standard_under_review_comments.*,tbl_users.user_name'); 
        // $this->db->where('status ',5); 
        $this->db->where('pk_is_id',$id); 
        $this->db->join('tbl_users','tbl_users.user_id = tbl_standard_under_review_comments.admin_id'); 
        $this->db->order_by('created_on', 'desc'); 
        return $this->db->get('tbl_standard_under_review_comments')->result_array(); 
    }

    public function getStandardUnderReview($pk_is_id)
    {   
        $this->db->where('pk_is_id',$pk_is_id); 
        return $quiz = $this->db->get('tbl_standard_under_review')->row_array();
    }

    public function insertStandardUnderReviewComments($formdata)
    {
        $this->db->insert('tbl_standard_under_review_comments',$formdata); 
        return $insert_id = $this->db->insert_id();
    }
    public function DiscussionForumList()
    {
        $this->db->where('status ',5); 
        return $this->db->get('tbl_discussion_forum')->result_array(); 
    }
    public function DiscussionForumView($id)
    {
        $this->db->where('id ',$id); 
        $this->db->where('status ',5); 
        return $this->db->get('tbl_discussion_forum')->row_array(); 
    }
    public function insertDiscussionForumComments($formdata)
    {
        $this->db->insert('tbl_discussion_forum_comments',$formdata); 
        return $insert_id = $this->db->insert_id();
    }

    public function DiscussionForumComments($id)
    {

        $this->db->select('tbl_discussion_forum_comments.*,tbl_users.user_name'); 
        // $this->db->where('status ',5); 
        $this->db->where('forum_id',$id); 
        $this->db->join('tbl_users','tbl_users.user_id = tbl_discussion_forum_comments.admin_id'); 
        $this->db->order_by('created_on', 'desc'); 
        return $this->db->get('tbl_discussion_forum_comments')->result_array();
 
    }
}
// =======
// >>>>>>> 068af7e12f46c89299a5665cd129d7be617b43b1
