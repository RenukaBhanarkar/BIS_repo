<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Your_wall_model extends CI_Model {

    public function  addYourWall($data)
    {
        if ($this->db->insert('tbl_your_wall', $data)) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }

    public function allYourwall(){
        // $myQuery = "SELECT * FROM  tbl_your_wall ";
        // $query = $this->db->query($myQuery);
        // $result=$query->result_array();
        // return $result;
       // $this->db->select('tyw.title','tyw.description','tyw.image','tyw.status','tyw.created_on','tyw.user_id','ta.name','ta.email_id');
       $this->db->select('tyw.*,ta.name,ta.email_id,tms.status_name');
        $this->db->from('tbl_your_wall as tyw');
        $this->db->join('tbl_admin ta','ta.id=tyw.user_id','left');
        $this->db->join('tbl_mst_status tms','tms.id=tyw.status','left');
        $this->db->order_by('tyw.created_on','desc');
       // $this->db->where('status',$status);
        $query=$this->db->get();
        $res=$query->result_array();
        return $res;
    }
    public function get_yourwallData($id){
        
    //     $this->db->select('tyw.*,ta.name,ta.email_id,tms.status_name');
    //     // $this->db->select('tyw.*,tms.status_name');
    //     $this->db->from('tbl_your_wall as tyw');
    //    // $this->db->join('tbl_admin ta','ta.id=tyw.user_id');
    //     $this->db->join('tbl_mst_status tms','tms.id=tyw.status');
    //     $this->db->where('tyw.id',$id);
    //     $query=$this->db->get();
    //     $res=$query->result_array();
    //     return $res[0];

        $this->db->select('tyw.*,tms.status_name,tu.user_name,tu.email,tu.user_mobile');
        $this->db->from('tbl_your_wall tyw'); 
        $this->db->join('tbl_mst_status tms','tms.id=tyw.status');      
        $this->db->join('tbl_users tu','tu.user_id=tyw.user_id'); 
        $this->db->where('tyw.id',$id);
        // $this->db->order_by('created_on','desc');
        $query=$this->db->get();
        $res=$query->result_array();
        return $res[0];
    }

    public function approveYourwall($id){
        $this->db->update('tbl_your_wall',['status'=>'3'],['id'=>$id]);
    }
    public function yourwallPublish($id){
        $this->db->update('tbl_your_wall',['status'=>'5'],['id'=>$id]);
    }
    public function getPublishedWall(){
        $this->db->select('tyw.*,tms.status_name,tu.user_name');
        $this->db->from('tbl_your_wall tyw'); 
        $this->db->join('tbl_mst_status tms','tms.id=tyw.status');      
        $this->db->join('tbl_users tu','tu.user_id=tyw.user_id'); 
        //$this->db->where('tyw.id',$id);


        // $this->db->select('*');
        // $this->db->from('tbl_your_wall');        
        $this->db->where('status','5');
        $this->db->order_by('created_on','desc');
        $query=$this->db->get();
        $res=$query->result_array();
        return $res;
    }
    public function getSelfPublishedWall($user_id){
        $this->db->select('tyw.*,tms.status_name,tu.user_name');
        $this->db->from('tbl_your_wall tyw'); 
        $this->db->join('tbl_mst_status tms','tms.id=tyw.status');      
        $this->db->join('tbl_users tu','tu.user_id=tyw.user_id'); 
        $this->db->where('tu.user_id',$user_id);
        // $this->db->select('*');
        // $this->db->from('tbl_your_wall');        
        // $this->db->where('tyw.status','5');
        $this->db->order_by('created_on','desc');
        $query=$this->db->get();
        $res=$query->result_array();
        if(!empty($res)){
            return $res;
        }else{
            $res='';
        }       
    }
    public function deletYourwall($id){
        $this->db->where('id', $id);
         if ($this->db->delete('tbl_your_wall')) {
             return true;
         } else {
             return false;
         }
    }
    public function yourwallUnpublish($id){
        $this->db->update('tbl_your_wall',['status'=>'6'],['id'=>$id]);
    }
    public function all_archievd(){
        $this->db->select('tyw.*,tms.status_name,tu.user_name,tu.email');
        $this->db->from('tbl_your_wall tyw'); 
        $this->db->join('tbl_mst_status tms','tms.id=tyw.status');      
        $this->db->join('tbl_users tu','tu.user_id=tyw.user_id'); 
        $this->db->where('status','9');
        $this->db->order_by('created_on','desc');
        $query=$this->db->get();
        $res=$query->result_array();
        return $res;
    }
    public function allbycreated(){
        $this->db->select('tyw.*,tms.status_name,tu.user_name,tu.email');
        $this->db->from('tbl_your_wall tyw'); 
        $this->db->join('tbl_mst_status tms','tms.id=tyw.status');      
        $this->db->join('tbl_users tu','tu.user_id=tyw.user_id'); 
        $this->db->where('status','1');
        $this->db->order_by('created_on','desc');
        $query=$this->db->get();
        $res=$query->result_array();
        return $res;
    }
    public function allbyapproved(){
        $this->db->select('tyw.*,tms.status_name,tu.user_name,tu.email');
        $this->db->from('tbl_your_wall tyw'); 
        $this->db->join('tbl_mst_status tms','tms.id=tyw.status');      
        $this->db->join('tbl_users tu','tu.user_id=tyw.user_id'); 
        $this->db->where('status','5');
        $this->db->or_where('status','6');
        $this->db->or_where('status','3');
        $this->db->order_by('created_on','desc');
        $query=$this->db->get();
        $res=$query->result_array();
        return $res;
    }
    public function allbyrejected(){
        $this->db->select('tyw.*,tms.status_name,tu.user_name,tu.email');
        $this->db->from('tbl_your_wall tyw'); 
        $this->db->join('tbl_mst_status tms','tms.id=tyw.status');      
        $this->db->join('tbl_users tu','tu.user_id=tyw.user_id'); 
        $this->db->where('status','4');     
        $this->db->order_by('created_on','desc');
        $query=$this->db->get();
        $res=$query->result_array();
        return $res;
    }
    public function reject($data){
        $this->db->where('id',$data['id']);
        if($this->db->update('tbl_your_wall',$data)){
            return true;
        }else{
            return false;
        }
    }
    public function restore($id){
        $this->db->update('tbl_your_wall',['status'=>'1'],['id'=>$id]);
    }
    public function archive($id){
        $this->db->update('tbl_your_wall',['status'=>'9'],['id'=>$id]);
    }
    public function add_user($data){
        // print_r($data);die;
        $this->db->select('user_id');
        $this->db->from('tbl_users');
        $this->db->where('user_id',$data['user_id']);
        $query=$this->db->get();
       
        $result=$query->result_array();
        // print_r($result[0]['user_id']);die;
        if(!($data['user_id']==$result[0]['user_id'])){
        // if(!empty($result)){
            if ($this->db->insert('tbl_users', $data)) {
                return $this->db->insert_id();
            } else {
                return false;
            } 
        }
        return $data['user_id'];
        

    }

}