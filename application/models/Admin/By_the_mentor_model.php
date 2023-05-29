<?php
defined('BASEPATH') or exit('No direct script access allowed');

class By_the_mentor_model extends CI_Model {

    public function  add_btm($data)
    {
        if ($this->db->insert('tbl_by_the_mentors', $data)) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }
    public function add_user($data){
        $this->db->select('user_id');
        $this->db->from('tbl_users');
        $this->db->where('user_id',$data['user_id']);
        $query=$this->db->get();
        $result=$query->result_array();
        if(empty($result)){
            if ($this->db->insert('tbl_users', $data)) {
                return $this->db->insert_id();
            } else {
                return false;
            } 
        }

        // $this->db->select('user_id');
        // $this->db->from('tbl_users');
        // $this->db->where('user_id',$data['user_id']);
        // $query=$this->db->get();
       
        // $result=$query->result_array();
        // // print_r($result[0]['user_id']);die;
        // if(!($data['user_id']==$result[0]['user_id'])){
        // // if(!empty($result)){
        //     if ($this->db->insert('tbl_users', $data)) {
        //         return $this->db->insert_id();
        //     } else {
        //         return false;
        //     } 
        // }
        // return $data['user_id'];
        

    }

    public function allbtm(){
        
        $this->db->select('btm.*,tms.status_name');
        $this->db->from('tbl_by_the_mentors as btm');
        $this->db->join('tbl_mst_status tms','tms.id=btm.status');
        $this->db->where('btm.status!=','9');
        $this->db->order_by('btm.created_on','desc');
        $query=$this->db->get();
        $result=$query->result_array();
        return $result;
       
    }
    public function allbtmbycreated(){
        // print_r($id); die;
        
        // $data=['btm.status'=>1];
        $this->db->select('btm.*,tms.status_name,tu.user_name,tu.email');
        $this->db->from('tbl_by_the_mentors as btm');
        $this->db->join('tbl_mst_status tms','tms.id=btm.status');
        $this->db->join('tbl_users tu','tu.user_id=btm.user_id');
        $this->db->where('btm.status','1');
        $this->db->order_by('btm.created_on','desc');
        $query=$this->db->get();
        $result=$query->result_array();
        return $result;
    }
    public function allbtmbyapproved(){     
        // print_r($id); die;
        
        //  $data=['btm.status'=>'5','btm.status'=>'6'];  
        $this->db->select('btm.*,tms.status_name,tu.user_name,tu.email');
        $this->db->from('tbl_by_the_mentors as btm');
        $this->db->join('tbl_mst_status tms','tms.id=btm.status'); 
        $this->db->join('tbl_users tu','tu.user_id=btm.user_id');
        $this->db->where('btm.status','5');
        $this->db->or_where('btm.status','6');
        $this->db->or_where('btm.status','3');
        $this->db->order_by('btm.created_on','desc');
        $query=$this->db->get();
        $result=$query->result_array();
        return $result;
    }
    public function rejectbtm($data){
        $this->db->where('id',$data['id']);
        if($this->db->update('tbl_by_the_mentors',$data)){
            return true;
        }else{
            return false;
        }
        
    }
    public function allbtmbyrejected(){        
        $this->db->select('btm.*,tms.status_name,tu.user_name,tu.email');
        $this->db->from('tbl_by_the_mentors as btm');
        $this->db->join('tbl_mst_status tms','tms.id=btm.status');
        $this->db->join('tbl_users tu','tu.user_id=btm.user_id');
        $this->db->where('btm.status','4');
        $this->db->order_by('btm.created_on','desc');
        $query=$this->db->get();
        $result=$query->result_array();
        return $result;
    }
    public function get_btm($id){
        
        //$this->db->select('tyw.*,ta.name,ta.email_id,tms.status_name');
        $this->db->select('btm.*,tms.status_name,tu.user_name,tu.email,tu.user_mobile,btm.created_on,tu.standard_club_name,tu.StandardClubState,tu.StandardClubDistrict');
        // $this->db->select('btm.*,tms.status_name');
        $this->db->from('tbl_by_the_mentors as btm');
       $this->db->join('tbl_users tu','tu.user_id=btm.user_id');
        $this->db->join('tbl_mst_status tms','tms.id=btm.status');
        $this->db->where('btm.id',$id);
        $query=$this->db->get();
        $res=$query->result_array();
        return $res[0];
    }

    public function approveYourwall($id){
        $this->db->update('tbl_your_wall',['status'=>'3'],['id'=>$id]);
    }
    public function btmPublish($id){
        $this->db->update('tbl_by_the_mentors',['status'=>'5'],['id'=>$id]);
    }
    public function getPublishedbtm(){
        $this->db->select('*');
        $this->db->from('tbl_by_the_mentors');        
        $this->db->where('status','5');
        $this->db->order_by('created_on','desc');
        $query=$this->db->get();
        $res=$query->result_array();
        return $res;
    }
    public function delet_btm($id){
        $this->db->where('id', $id);
         if ($this->db->delete('tbl_by_the_mentors')) {
             return true;
         } else {
             return false;
         }
    }
    public function btm_Unpublish($id){
        $this->db->update('tbl_by_the_mentors',['status'=>'6'],['id'=>$id]);
    }
    public function getThreeBTM(){
        $this->db->select('btm.*,tu.user_name');
        $this->db->from('tbl_by_the_mentors btm'); 
        $this->db->join('tbl_users tu','tu.user_id=btm.user_id');      
        $this->db->where('status','5');
        $this->db->order_by('created_on','desc');
        $this->db->limit(6);
        $query=$this->db->get();
        $res=$query->result_array();
        return $res;
    }
    public function btm_archive($id){
        $this->db->where('id', $id);
        if ($this->db->update('tbl_by_the_mentors',['status'=>'9'],['id'=>$id])) {
            return true;
        } else {
            return false;
        }
        // $this->db->update('tbl_by_the_mentors',['status'=>'9'],['id'=>$id]);
    }
    public function btm_unarchive($id){
        $this->db->where('id', $id);
        if ($this->db->update('tbl_by_the_mentors',['status'=>'1'],['id'=>$id])) {
            return true;
        } else {
            return false;
        }
    }
    public function btm_approve($id){
        $this->db->where('id', $id);
        if ($this->db->update('tbl_by_the_mentors',['status'=>'3'],['id'=>$id])) {
            return true;
        } else {
            return false;
        }
    }
    public function all_archievd_btm(){
        $this->db->select('btm.*,tms.status_name,tu.user_name,tu.email');
        $this->db->from('tbl_by_the_mentors btm'); 
        $this->db->join('tbl_mst_status tms','tms.id=btm.status');      
        $this->db->join('tbl_users tu','tu.user_id=btm.user_id'); 
        $this->db->where('status','9');
        $this->db->order_by('created_on','desc');
        $query=$this->db->get();
        $res=$query->result_array();
        return $res;
    }
    public function get_email($id){
        $this->db->select('email');
        $this->db->from('tbl_users');
        $this->db->where('user_id',$id);
        $query=$this->db->get();
        $res=$query->result_array();
        return $res[0];

    }
    public function send_email($msg,$subject,$email_id){
        // echo $msg."  ".$email_id." ".$subject;
        // die;
        // $msg = "Dear " . $name .
        //             " <p>You are added on the BIS Portal as Admin . Your login credentials for the portal are:
        //             </p>
        //             <p>Username: " . $email_id . "</p>
        //             <p>Password: " . $random_pass . "</p>";
             //   $subject = "Login Credentials for the BIS Portal.";

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
    }
    public function ckeckDailyLimit($user_id){
        //$from=date('Y-m-d');
        $query="select * from `tbl_by_the_mentors` where `user_id`=".$user_id." AND `created_on` LIKE "."'%".date('Y-m-d')."%'";
        $query1=$this->db->query($query);
         $res=$query1->result_array();
          return count($res);
        // die;
     
        // if(!empty($res)){
        //     return count($res);
        // }else{
        //     $res='0';
        // } 
    }

}