<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model {

    public function mainModulePermission($id){
        $admin_id = encryptids("D", $id);
     
        $this->db->select('main_module_id');
        $this->db->from('tbl_set_permissions');
        $this->db->where('user_id',$admin_id);
        $this->db->group_by('main_module_id');
        $query = $this->db->get();
        $rs = array();
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                array_push($rs,$row['main_module_id']);
            }
        }
        //$result = array_values($rs);
       // echo json_encode($rs);exit();
       return $rs;
       
    }
    public function subModulePermission($id){
        $admin_id = encryptids("D", $id);
     
        $this->db->select('sub_module_id');
        $this->db->from('tbl_set_permissions');
        $this->db->where('user_id',$admin_id);
        $this->db->where('sub_module_id !=',0);
        $query = $this->db->get();
        $rs = array();
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                array_push($rs,$row['sub_module_id']);
            }
        }
       // echo json_encode($rs);exit();
       return $rs;
        
    }
    public function activityPermission($id){
        $admin_id = encryptids("D", $id);
        
        $this->db->select('main_module_id,sub_module_id,permissions');
        $this->db->from('tbl_set_permissions');
        $this->db->where('user_id',$admin_id);
       
        $query = $this->db->get();
        $rs = array();
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                array_push($rs,$row);
            }
        }
     //  echo json_encode($rs);exit();
       return $rs;
        
    }
    public function getUsersPermissions($sub_module_id){
         $admin_id =encryptids("D", $_SESSION['admin_id']);
        
        $this->db->select('permissions');
        $this->db->from('tbl_set_permissions');
        $this->db->where('user_id',$admin_id);
        $this->db->where('sub_module_id',$sub_module_id);
        $query = $this->db->get();
        $rs = array();
        if ($query->num_rows() > 0) {

            $result = $query->row_array();
            $rs = $result['permissions'];           
            $rs = explode(',',$rs);
        }
     //  echo json_encode($rs);exit();
       
       return $rs;
        
    }
    public function getLoginUsers($username,$password)
    {
        $this->db->where('username',$username);
		$this->db->where('password',$password);
        //$this->db->where('is_active',1);
		$query=$this->db->get('tbl_admin');  
        $row=array();
        if ($query->num_rows() > 0){
            $row = $query->row_array();
        }
        return $row;          	
       
    }
    public function getDetailsById($id){
        $query = $this->db->select('*')
        ->from('tbl_admin')
        ->where('id',$id)       
        ->get();
   
        $rs = array();
        if ($query->num_rows() > 0) {
        $rs = $query->row_array();
        }
        return $rs;
    }
    public function getDetailsAdminById($id){
        $query = $this->db->select('admin.*,r.role')
        ->from('tbl_admin admin')
        ->join('tbl_mst_admin_role r','r.admin_type = admin.designation')
        
        ->where('admin.id',$id)       
        ->get();
   
        $rs = array();
        if ($query->num_rows() > 0) {
        $rs = $query->row_array();
        }
        return $rs;
    }
    public function checkAdminLogin()
    {
        $enc_admin_id = $this->session->userdata('admin_id');       
        if ($enc_admin_id ) {
            $dec_admin_id = encryptids("D", $enc_admin_id);
            if ($dec_admin_id > 0) {
                $is_gen_user = $this->db->get_where("tbl_admin", array("id" => $dec_admin_id,"is_active"=>1))->num_rows();
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
    public function getAllAdmin(){      
        $this->db->select('*');
        $this->db->from('tbl_admin');
        $this->db->where('is_active',1); 
        $this->db->where('admin_type',2); 
        $this->db->order_by('id', 'ASC');
         $query = $this->db->get();
        $rs = array();
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                array_push($rs,$row);
            }
        }
        return $rs;
    }
    public function getAdminDetail($id){
        $this->db->select('ta.*,tmar.*');
        $this->db->from('tbl_admin ta');
        $this->db->join('tbl_mst_admin_role tmar','tmar.admin_type=ta.designation','left');
        $this->db->where('ta.id',$id);        
         $query = $this->db->get();
         $result=$query->result_array();
         return $result[0];       
    }
    public function getAllSubAdmin(){      
        $this->db->select('a.*,r.role,r.admin_type');
        $this->db->from('tbl_admin a');
        $this->db->join('tbl_mst_admin_role r','r.admin_type = a.designation');
        $this->db->where('a.is_active',1); 
        $this->db->where_in('a.designation',array(3,4,5,6,7,8)); 
        $this->db->order_by('a.id', 'ASC');
         $query = $this->db->get();
        $rs = array();
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                
                array_push($rs,$row);
            }
        }
        return $rs;
    }
    public function getAllSubAdminNew(){      
        $this->db->select('a.*,r.role,r.admin_type');
        $this->db->from('tbl_admin a');
        $this->db->join('tbl_mst_admin_role r','r.admin_type = a.designation');
        $this->db->where('a.is_active',1); 
        $this->db->where_in('a.designation',array(3,4,5,6,7,8)); 
        $this->db->order_by('a.id', 'ASC');
         $query = $this->db->get();
        // echo json_encode($query->result_array());exit();
        $rs = array();
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $this->db->select('*');
                $this->db->from('tbl_set_permissions');
                $this->db->where('user_id',$row['id']);      
                $q = $this->db->get();
       
                if ($q->num_rows() > 0) {
                  $row['set_permissions']= 1;
                }else{
                  $row['set_permissions']= 0;
                }
                array_push($rs,$row);
            }
        }
        return $rs;
    }
    public function getAllRoles(){
        $this->db->select('*');
        $this->db->from('tbl_mst_admin_role');
        $this->db->where('assign_role',1);         
        $this->db->order_by('id', 'ASC');
         $query = $this->db->get();
        $rs = array();
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                array_push($rs,$row);
            }
        }
        return $rs;
    }

    public function adminLogout(){        
        // print_r($this->session); die;
       
        $this->session->unset_userdata('admin_id');
        $this->session->unset_userdata('admin_email');
        $this->session->unset_userdata('admin_name');       
        $this->session->unset_userdata('admin_type');
        $this->session->unset_userdata('admin_post');
        //$this->session->unset_userdata('is_loggedin');
      
     }
    
     public function  insertData($data)
     {
         if ($this->db->insert('tbl_admin', $data)) {
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
         if ($this->db->update('tbl_admin', $data)) {
             return true;
         } else {
             return false;
         }
     }
 
     public function deleteData($id)
     {
         $this->db->where('id', $id);
         if ($this->db->delete('tbl_admin')) {
             return true;
         } else {
             return false;
         }
     }
    public function checkUniqueEmail($email)
    {
        $myQuery = "SELECT email_id FROM  tbl_admin  WHERE email_id = '{$email}' ";
        $query = $this->db->query($myQuery);
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function  bannerinsertData($data)
     {
         if ($this->db->insert('tbl_banner_img', $data)) {
             return $this->db->insert_id();
         } else {
             return false;
         }
     }

     public function  bannerAllData()
     {
        $myQuery = "SELECT * FROM  tbl_banner_img ";
        $query = $this->db->query($myQuery);
        $result=$query->result_array();
        return $result;
     }

     public function deleteBanner($id){
        $this->db->where('id', $id);
         if ($this->db->delete('tbl_banner_img')) {
             return true;
         } else {
             return false;
         }
     }
     public function edit_bannerimage($id){
        $this->db->select('*');
        $this->db->from('tbl_banner_img');
        $this->db->where('id',$id);
        $query= $this->db->get();       
        $result=$query->result_array();
        return json_encode($result[0]);
     }
     public function updateBannerImage($data){
        $this->db->where('id', $data['id']);
         if ($this->db->update('tbl_banner_img', $data)) {
             return true;
         } else {
             return false;
         }
     }

     public function aboutExchangeForuminsertData($data){
        if ($this->db->insert('tbl_about_exchange_forum', $data)) {
            return $this->db->insert_id();
        } else {
            return false;
        }
     }

     public function aboutExchangeForumupdateData($data){
        $this->db->where('id', $data['id']);
         if ($this->db->update('tbl_about_exchange_forum', $data)) {
             return true;
         } else {
             return false;
         }
     }

     public function aboutExchangeForumData(){
        $myQuery = "SELECT * FROM  tbl_about_exchange_forum";
        $query = $this->db->query($myQuery);
        $result=$query->result_array();
        return $result;
     }
     public function deletExngForum($id){
        $this->db->where('id', $id);
        if ($this->db->delete('tbl_about_exchange_forum')) {
            return true;
        } else {
            return false;
        }
     }

     public function contactUsData(){
        $myQuery = "SELECT * FROM  tbl_contact_us_detail";
        $query = $this->db->query($myQuery);
        $result=$query->result_array();
        return $result;
     }

     public function addContactUsData($data){
        if ($this->db->insert('tbl_contact_us_detail', $data)) {
            return $this->db->insert_id();
        } else {
            return false;
        }
     }
     public function edit_contactus($id){
        $this->db->select('*');
        $this->db->from('tbl_contact_us_detail');
        $this->db->where('id',$id);
        $query= $this->db->get();
        // $myQuery = "SELECT * FROM  tbl_contact_us_detail where 'id'= $id";
        // $query = $this->db->query($myQuery);
        $result=$query->result_array();
        return json_encode($result[0]);
     }
     public function updateContactUsData($data){
        $this->db->where('id', $data['id']);
         if ($this->db->update('tbl_contact_us_detail', $data)) {
             return true;
         } else {
             return false;
         }
     }
     public function deletContactus($id){
        $this->db->where('id', $id);
        if ($this->db->delete('tbl_contact_us_detail')) {
            return true;
        } else {
            return false;
        }
     }

     public function addLegalData($data){
        if ($this->db->insert('tbl_legel', $data)) {
            return $this->db->insert_id();
        } else {
            return false;
        }
     }

     public function legal(){
        $myQuery = "SELECT * FROM  tbl_legel";
        $query = $this->db->query($myQuery);
        $result=$query->result_array();
        return $result[0];
     }

     public function update_legal($data){
        $this->db->where('id', '1');
         if ($this->db->update('tbl_legel', $data)) {
             return true;
         } else {
             return false;
         }
     }
     

     public function useful_links(){
        $myQuery = "SELECT * FROM  tbl_useful_links";
        $query = $this->db->query($myQuery);
        $result=$query->result_array();
        return $result;
     }
     public function useful_links_web(){
        $myQuery = "SELECT * FROM  tbl_useful_links";
        $query = $this->db->query($myQuery);
        $result=$query->result_array();
        return json_encode($result);
     }

     public function edit_useful_links($id){
        $this->db->select('*');
        $this->db->from('tbl_useful_links');
        $this->db->where('id',$id);
        $query= $this->db->get();        
        $result=$query->result_array();
        return json_encode($result[0]);
     }

     public function updateUsefulLinks($data){
        $this->db->where('id', $data['id']);
        if ($this->db->update('tbl_useful_links', $data)) {
            return true;
        } else {
            return false;
        }
     }

     public function add_useful_links($data){
        if ($this->db->insert('tbl_useful_links', $data)) {
            return $this->db->insert_id();
        } else {
            return false;
        }
     }
     public function deleteUsefulLinks($id){
        $this->db->where('id', $id);
         if ($this->db->delete('tbl_useful_links')) {
             return true;
         } else {
             return false;
         }
     }

     public function follow_us(){
        $myQuery = "SELECT * FROM  tbl_follow_us_link";
        $query = $this->db->query($myQuery);
        $result=$query->result_array();
        return $result;
     }

     public function add_follow_us($data){
        if ($this->db->insert('tbl_follow_us_link', $data)) {
            return $this->db->insert_id();
        } else {
            return false;
        }
     }
     public function edit_followus($id){
        $this->db->select('*');
        $this->db->from('tbl_follow_us_link');
        $this->db->where('id',$id);
        $query= $this->db->get();        
        $result=$query->result_array();
        if(count($result) > 0){
            return json_encode($result[0]);
        }else{
            return json_encode($result);
        }     
        
     }
     public function updateFollowUs($data){
        $this->db->where('id', $data['id']);
        if ($this->db->update('tbl_follow_us_link', $data)) {
            return true;
        } else {
            return false;
        }
     }

     public function deleteFollowUs($id)
     {
         $this->db->where('id', $id);
         if ($this->db->delete('tbl_follow_us_link')) {
             return true;
         } else {
             return false;
         }
     }
     public function followus_links_web(){
        $myQuery = "SELECT * FROM  tbl_follow_us_link";
        $query = $this->db->query($myQuery);
        $result=$query->result_array();
        return json_encode($result);
     }

     public function allPhotos(){
        $myQuery = "SELECT * FROM  tbl_photos";
        $query = $this->db->query($myQuery);
        $result=$query->result_array();
        return $result;
     }
     public function addPhotos($formdata)
     {
        // $this->db->insert('tbl_photos', $data) 
        //     return $this->db->insert_id();
        // print_r($formdata);

            $this->db->insert('tbl_photos',$formdata); 
        return $insert_id = $this->db->insert_id();
         
     }
     public function deletePhotos($id){
        $this->db->where('id', $id);
         if ($this->db->delete('tbl_photos')) {
             return true;
         } else {
             return false;
         }
     }

     public function updateQuizStatus($id,$formdata)
    {
        $this->db->where('id',$id); 
        $quiz = $this->db->get('tbl_quiz_details')->row_array();
        if ($quiz) 
        {
            $this->db->where('id', $id);
            return $this->db->update('tbl_quiz_details', $formdata);
        }
        else
        {
            return 2;
        } 
    }
    public function getAllQuize()
    { 
        $this->db->select('tbl_quiz_details.*,tbl_mst_status.status_name'); 
        $this->db->where_in('tbl_quiz_details.status',array(2,3));
        $this->db->join('tbl_mst_status','tbl_mst_status.id = tbl_quiz_details.status'); 
        return $this->db->get('tbl_quiz_details')->result_array(); 

    }
    public function getAllManageQuiz()
    { 
        $this->db->select('tbl_quiz_details.*,tbl_mst_status.status_name,tbl_que_bank.no_of_ques'); 
        $this->db->join('tbl_mst_status','tbl_mst_status.id = tbl_quiz_details.status');
        $this->db->join('tbl_que_bank','tbl_que_bank.que_bank_id = tbl_quiz_details.que_bank_id');  
        $this->db->where_in('tbl_quiz_details.status',array(2,3,4,5,6,1));
        $this->db->where('tbl_quiz_details.start_date >=' ,date("Y-m-d")); 
        $this->db->order_by('tbl_quiz_details.created_on','desc');
        return $this->db->get('tbl_quiz_details')->result_array(); 

    }
   
    public function onGoingQuiz()
    {
        $this->db->select('tbl_quiz_details.*,tbl_mst_status.status_name');
        $this->db->where('(NOW() BETWEEN start_date AND end_date)'); 
        $this->db->where('tbl_quiz_details.status',5); 
        $this->db->where('tbl_quiz_details.start_date <=' ,date("Y-m-d"));
        $this->db->where('tbl_quiz_details.end_date >=' ,date("Y-m-d"));
        $this->db->order_by('tbl_quiz_details.created_on','desc');
        $this->db->join('tbl_mst_status','tbl_mst_status.id = tbl_quiz_details.status');  
         return $this->db->get('tbl_quiz_details')->result_array(); 
    }

    public function onGoingQuizNew(){
        $t=time();

        $current_time = (date("H:i:s",$t));
        $this->db->select('quiz.*,st.status_name,que.no_of_ques'); 
        $this->db->from('tbl_quiz_details quiz');
        $this->db->join('tbl_mst_status st','st.id = quiz.status'); 
        $this->db->join('tbl_que_bank que','que.que_bank_id = quiz.que_bank_id'); 
        //$this->db->where('(date(now()) BETWEEN quiz.start_date AND quiz.end_date)'); 
        // $this->db->where('('.$current_time.' BETWEEN quiz.start_time AND quiz.end_time)');
        $this->db->where('quiz.start_date <=' ,date("Y-m-d")); 
        $this->db->where('quiz.end_date >=' ,date("Y-m-d"));  
        //$this->db->where('quiz.start_time <=' ,$current_time); 
        //$this->db->where('quiz.end_time >=' ,$current_time); 
        $this->db->where('quiz.status',5); 
        $this->db->order_by('quiz.created_on','desc');
        
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
    public function images(){
        $this->db->select('*');
        $this->db->from('tbl_photos');
        $this->db->order_by('created_on','desc');
        $this->db->limit('8');
        $query=$this->db->get();
        if($query->num_rows() > 0){
            return $query->result_array();
        }else{
            return FALSE;
        }
    }
    public function videos(){
        $this->db->select('*');
        $this->db->from('tbl_videos');
        $this->db->order_by('created_on','desc');
        $this->db->limit('8');
        $query=$this->db->get();
        if($query->num_rows() > 0){
            return $query->result_array();
        }else{
            return FALSE;
        }
    }
    public function allVideos(){
        $myQuery = "SELECT * FROM  tbl_videos";
        $query = $this->db->query($myQuery);
        $result=$query->result_array();
        return $result;
     }
     public function addVideos($data){
       // print_r($data); die;
        if ($this->db->insert('tbl_videos', $data)) {
            return $this->db->insert_id();
        } else {
            return false;
        }
     }
     public function deleteVideos($id){
        $this->db->where('id', $id);
         if ($this->db->delete('tbl_videos')) {
             return true;
         } else {
             return false;
         }
     }
     public function prises(){
        $this->db->select('*');
        $this->db->from('tbl_mst_prizes');
       // $this->db->order_by('created_on','ASC');
        $query=$this->db->get();
        if($query->num_rows() > 0){
            return $query->result_array();
        }else{
            return FALSE;
        }
    }
    public function winner_wall_list(){
        $this->db->select('tmw.*,tmp.title');
        $this->db->from('tbl_mst_winner tmw');
        $this->db->join('tbl_mst_prizes tmp','tmp.id=tmw.prise');
        //$this->db->order_by('created_on','ASC');
        $query=$this->db->get();
        if($query->num_rows() > 0){
            return $query->result_array();
        }else{
            return FALSE;
        }
    }
    public function add_winner($data){
        if ($this->db->insert('tbl_mst_winner', $data)) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }
    public function deleteWinner($id){
        $this->db->where('id', $id);
        if ($this->db->delete('tbl_mst_winner')) {
            return true;
        } else {
            return false;
        }
    }

    public function toCheckNoOfQueInBank($que_bank_id,$no_of_que)
    {
        $arr = array();
        $myQuery = "SELECT COUNT(que_id) AS cnt FROM  tbl_que_details  WHERE que_bank_id = '{$que_bank_id}' ";
        $query = $this->db->query($myQuery);
        if ($query->num_rows() > 0) {
            $arr = $query->row_array();
            $cnt =  $arr['cnt'];
        
        if ($cnt == $no_of_que) {
            return true;
        } else {
            return false;
        }
        }
    }
    public function bannerwosAllData(){
        $myQuery = "SELECT * FROM  tbl_wos_banner ";
        $query = $this->db->query($myQuery);
        $result=$query->result_array();
        return $result;
    }
    public function  wowInsertBanner($data)
     {
         if ($this->db->insert('tbl_wos_banner', $data)) {
             return $this->db->insert_id();
         } else {
             return false;
         }
     }
     public function edit_wos_banner($id){
        $this->db->select('*');
        $this->db->from('tbl_wos_banner');
        $this->db->where('id',$id);
        $query= $this->db->get();       
        $result=$query->result_array();
        return json_encode($result[0]);
     }
     public function delete_wos_Banner($id){
        $this->db->where('id', $id);
         if ($this->db->delete('tbl_wos_banner')) {
             return true;
         } else {
             return false;
         }
     }

     public function updatewosBannerImage($data){
        $this->db->where('id', $data['id']);
         if ($this->db->update('tbl_wos_banner', $data)) {
             return true;
         } else {
             return false;
         }
     }
     public function edit_photos($id){
        $this->db->select('*');
        $this->db->from('tbl_photos');
        $this->db->where('id',$id);
        $query= $this->db->get();       
        $result=$query->result_array();
        return json_encode($result[0]);
     }
     public function updatePhoto($data){
        $this->db->where('id', $data['id']);
         if ($this->db->update('tbl_photos', $data)) {
             return true;
         } else {
             return false;
         }
     }

     public function updateLiveSessiionStatus($id,$formdata)
    {
        $this->db->where('id',$id); 
        $quiz = $this->db->get('tbl_join_the_classroom')->row_array();
        if ($quiz) 
        {
            $this->db->where('id', $id);
            return $this->db->update('tbl_join_the_classroom', $formdata);
        }
        else
        {
            return 2;
        } 
    }

    public function addLetestNews($data){
        $result=$this->db->insert('tbl_mst_letest_news',$data);
        if($result){
            return true;
        }else{
            return false;
        }
    }
    public function getLetestNews(){
        $this->db->select('*');
        $this->db->from('tbl_mst_letest_news');
        $this->db->order_by('created_on','desc');
       $this->db->where('status!=','9');
        $query= $this->db->get();       
        $result=$query->result_array();
       
        return $result;
    }
    public function getLetestNewsDetail($id){
        $this->db->select('*');
        $this->db->from('tbl_mst_letest_news');
       $this->db->where('id',$id);
        $query= $this->db->get();       
        $result=$query->result_array();
       
        return $result[0];
    }

    public function deleteLetestNews($id){
        $result=$this->db->delete('tbl_mst_letest_news',['id'=>$id]);
        if($result){
            return true;
        }else{
            return false;
        } 
    }
    public function publishLetestNews($id){
        //echo $id; die;
        $this->db->where('id',$id);
        $result=$this->db->update('tbl_mst_letest_news',['status'=>'5']);
        if($result){
            return true;
        }else{
            return false;
        }
    }
    public function unpublishLetestNews($id){

        $this->db->where('id',$id);
        $result=$this->db->update('tbl_mst_letest_news',['status'=>'6']);
        if($result){
            return true;
        }else{
            return false;
        }
    }
    public function archiveLetestNews($id){
        $this->db->where('id',$id);
        $result=$this->db->update('tbl_mst_letest_news',['status'=>'9']);
        if($result){
            return true;
        }else{
            return false;
        } 
    }
    public function archivedLetestNews(){
        $this->db->select('*');
        $this->db->from('tbl_mst_letest_news');
       $this->db->where('status','9');
       $this->db->order_by('created_on','desc');
        $query= $this->db->get();       
        $result=$query->result_array();
       
        return $result;
    }
    public function restoreLetestNews($id){
        $this->db->where('id',$id);
        $result=$this->db->update('tbl_mst_letest_news',['status'=>'1']);
        if($result){
            return true;
        }else{
            return false;
        } 
    }
    public function news(){
        $this->db->select('*');
        $this->db->from('tbl_mst_letest_news');
       $this->db->where('status','5');
       $this->db->order_by('created_on','desc');
       $this->db->limit('2');
        $query= $this->db->get();       
        $result=$query->result_array();
       
        return $result;
    }
    public function editLetestNews($id){
        $this->db->select('*');
        $this->db->from('tbl_mst_letest_news');   
        $this->db->where('id',$id);   
        $query= $this->db->get();       
        $result=$query->result_array();

       return json_encode($result[0]);
       
    }
    public function updateLetestNews($data){
        $this->db->where('id', $data['id']);
        if ($this->db->update('tbl_mst_letest_news', $data)) {
            return true;
        } else {
            return false;
        }
    }

    public function addEvent($data){
        $result=$this->db->insert('tbl_mst_events',$data);
        if($result){
            return true;
        }else{
            return false;
        }
    }
    public function getEvent(){
        $this->db->select('*');
        $this->db->from('tbl_mst_events');
       $this->db->where('status!=','9');
       $this->db->order_by('created_on','desc');
        $query= $this->db->get();       
        $result=$query->result_array();
       
        return $result;
    }
    public function deleteEvents($id){
        $result=$this->db->delete('tbl_mst_events',['id'=>$id]);
        if($result){
            return true;
        }else{
            return false;
        } 
    }

    public function publishEvent($id){
        //echo $id; die;
        $this->db->where('id',$id);
        $result=$this->db->update('tbl_mst_events',['status'=>'5']);
        if($result){
            return true;
        }else{
            return false;
        }
    }
    public function unpublishEvent($id){

        $this->db->where('id',$id);
        $result=$this->db->update('tbl_mst_events',['status'=>'6']);
        if($result){
            return true;
        }else{
            return false;
        }
    }
    public function archiveEvent($id){
        $this->db->where('id',$id);
        $result=$this->db->update('tbl_mst_events',['status'=>'9']);
        if($result){
            return true;
        }else{
            return false;
        } 
    }
    public function restoreEvent($id){
        $this->db->where('id',$id);
        $result=$this->db->update('tbl_mst_events',['status'=>'1']);
        if($result){
            return true;
        }else{
            return false;
        } 
    }
    public function archivedEvents(){
        $this->db->select('*');
        $this->db->from('tbl_mst_events');
       $this->db->where('status','9');
       $this->db->order_by('created_on','desc');
        $query= $this->db->get();       
        $result=$query->result_array();
       
        return $result;
    }
    public function events(){
        $this->db->select('*');
        $this->db->from('tbl_mst_events');
       $this->db->where('status','5');
       $this->db->order_by('created_on','desc');
    //    $this->db->limit('2');
        $query= $this->db->get();       
        $result=$query->result_array();
       
        return $result;
    }
    public function editEvents($id){
        $this->db->select('*');
        $this->db->from('tbl_mst_events');   
        $this->db->where('id',$id);   
        $query= $this->db->get();       
        $result=$query->result_array();

       return json_encode($result[0]);
    }
    public function updateEvents($data){
        $this->db->where('id', $data['id']);
        if ($this->db->update('tbl_mst_events', $data)) {
            return true;
        } else {
            return false;
        }
    }
    public function getEventDetail($id){
        $this->db->select('*');
        $this->db->from('tbl_mst_events');   
        $this->db->where('id',$id);   
        $query= $this->db->get();       
        $result=$query->result_array();
        return $result[0];
    }
    public function insertPermissionData($data)
    {
       
        if($this->db->insert('tbl_set_permissions',$data)){
			return $this->db->insert_id();
		}else{
			return false;
		}
    }

}