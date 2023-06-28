<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Wall_of_wisdom_model extends CI_Model {

    public function insertWOW($data){
        if ($this->db->insert('tbl_wall_of_wisdom', $data)) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }
    public function getAllWOW(){
        $this->db->select('wow.*,tms.status_name');
        $this->db->from('tbl_wall_of_wisdom wow');
        $this->db->join('tbl_mst_status tms','tms.id=wow.status');
        $this->db->where('status!=',9); 
       // $this->db->where('admin_type',2); 
       // $this->db->order_by('id', 'ASC');
       $this->db->order_by('wow.created_on','desc');
         $query = $this->db->get();
        $rs = array();
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                array_push($rs,$row);
            }
        }
        return $rs;
    }
    public function wowPublish($id){
        $this->db->where('id', $id);
         if ($this->db->update('tbl_wall_of_wisdom', ['status'=>'5'])) {
             return true;
         } else {
             return false;
         }
    }
    public function wowDelete($id){
        $this->db->where('id', $id);
        if ($this->db->delete('tbl_wall_of_wisdom')) {
            return true;
        } else {
            return false;
        }
    }
    public function wowUnpublish($id){
        $this->db->where('id', $id);
        if ($this->db->update('tbl_wall_of_wisdom', ['status'=>'6'])) {
            return true;
        } else {
            return false;
        } 
    }
    public function all_wallofwisdom($uid){
        // $this->db->select('*');
        // $this->db->from('tbl_wall_of_wisdom');        
        // $this->db->where('status','5');
        // //$this->db->order_by('');
        // $this->db->limit(6);
        // $this->db->order_by('created_on','desc');
        // $query=$this->db->get();
        // $res=$query->result_array();
        // return $res;

        $this->db->select('wow.*,like.card_id,like.user_id,like.card_status');
        $this->db->from('tbl_wall_of_wisdom wow');
        $this->db->join('tbl_wall_of_wisdom_likes like','like.card_id=wow.id','left');
        // $this->db->where("like.user_id=$uid");
        // $this->db->where("wow.user_id=$uid");
        $this->db->where('wow.status','5');  
        $this->db->limit(6);
        $this->db->order_by('wow.created_on','desc');
        $query=$this->db->get();
        $res=$query->result_array();
        return $res;
    }
    public function all_wallofwisdom1(){       
        $this->db->select('wow.*');
        $this->db->from('tbl_wall_of_wisdom wow');
        //$this->db->join('tbl_wall_of_wisdom_likes like','like.card_id=wow.id','left');
        // $this->db->where("like.user_id=$uid");
        // $this->db->where("wow.user_id=$uid");
        $this->db->where('wow.status','5');  
        $this->db->limit(6);
        $this->db->order_by('wow.created_on','desc');
        $query=$this->db->get();
        $res=$query->result_array();
        return $res;
    }
    public function send_for_approval($id){
        $this->db->where('id', $id);
        if ($this->db->update('tbl_wall_of_wisdom', ['status'=>'2'])) {
            return true;
        } else {
            return false;
        } 
    }
    public function approve_activity($id){
        $this->db->where('id', $id);
        if ($this->db->update('tbl_wall_of_wisdom', ['status'=>'3'])) {
            return true;
        } else {
            return false;
        } 
    }
    public function get_wow($id){
        $this->db->select('*');
        $this->db->from('tbl_wall_of_wisdom');        
        $this->db->where('id',$id);
        //$this->db->order_by('');
        //$this->db->limit(6);
        $query=$this->db->get();
        $res=$query->result_array();
        return $res[0];
    }
    public function get_allwow(){
        $this->db->select('*');
        $this->db->from('tbl_wall_of_wisdom');        
        $this->db->where('status','5');
        $this->db->order_by('created_on','desc');
        //$this->db->order_by('');
        // $this->db->limit(6);
        $query=$this->db->get();
        $res=$query->result_array();
        return $res;
    }
    // public function get_wow($id){
    //     $this->db->select('*');
    //     $this->db->from('tbl_wall_of_wisdom'); 
    //     $this->db->where('id',$id);
    //     $query=$this->db->get();
    //     $res=$query->result_array();
    //     return $res[0];
    // }
    public function updateWOW($data){
        //print_r($data); die;
        $this->db->where('id', $data['id']);
         if ($this->db->update('tbl_wall_of_wisdom', $data)) {
             return true;
           //  die;
         } else {
             return false;
         }
    }
    public function detail($id){
        $this->db->select('wow.*,tms.status_name');
        $this->db->from('tbl_wall_of_wisdom wow');
        $this->db->join('tbl_mst_status tms','tms.id=wow.status');
        $this->db->where('wow.id',$id); 
       // $this->db->where('admin_type',2); 
       $this->db->order_by('created_on', 'ASC');
         $query = $this->db->get();
         $result=$query->result_array();
         return $result[0];
    }
    public function archive(){
        $this->db->select('wow.*,tms.status_name');
        $this->db->from('tbl_wall_of_wisdom wow');
        $this->db->join('tbl_mst_status tms','tms.id=wow.status');   
        $this->db->where('status',9);    
        $this->db->order_by('created_on','desc');
        $query=$this->db->get();
        $res=$query->result_array();
        return $res;
    }
    public function restore($id){
        // print_r($id); die;
        $this->db->where('id', $id);
        if ($this->db->update('tbl_wall_of_wisdom', ['status'=>'1'])) {
          //  return true;
            return "success";
        } else {
            return false;
        } 
    }
    public function sendarchive($id){
        $this->db->where('id', $id);
        if ($this->db->update('tbl_wall_of_wisdom', ['status'=>'9'])) {
          //  return true;
            return "success";
        } else {
            return false;
        } 
    }
    public function like($id){
        $this->db->select('likes');
        $this->db->from('tbl_wall_of_wisdom');
        $this->db->where('id',$id);
        $query=$this->db->get();
        $res=$query->result_array();
        // return $res[0]['likes'];
        $abc=$res[0]['likes'];
        $pqr=$abc+1;
        $this->db->where('id', $id);
        if ($this->db->update('tbl_wall_of_wisdom', ['likes'=>$pqr])) {
          //  return true;
            return "success";
        } else {
            return false;
        } 
        

    }
    public function liked($data){
        $this->db->select('likes');
        $this->db->from('tbl_wall_of_wisdom');
        $this->db->where('id',$data['card_id']);
        $query=$this->db->get();
        $res=$query->result_array();
        // return $res[0]['likes'];
        $abc=$res[0]['likes'];
        $pqr=$abc+1;
        $this->db->where('id', $data['card_id']);
        if ($this->db->update('tbl_wall_of_wisdom', ['likes'=>$pqr])) {
          //  return true;
          if ($this->db->insert('tbl_wall_of_wisdom_likes', $data)) {

            // return $this->db->insert_id();
            //return "success";
        } else {
            return false;
        }
            return "success";
        } else {
            return false;
        }
        
    }
    public function unliked($data){
        // print_r($data); 
        $this->db->select('likes');
        $this->db->from('tbl_wall_of_wisdom');
        $this->db->where('id',$data['card_id']);
        $query=$this->db->get();
        $res=$query->result_array();
        // return $res[0]['likes'];
        $abc=$res[0]['likes'];
        if($abc < 1){
            $abc=1;
        }else{

        }
        $pqr=$abc-1;
        $this->db->where('id', $data['card_id']);
        if ($this->db->update('tbl_wall_of_wisdom', ['likes'=>$pqr])) {
          //  return true;
            // return "success";
            // print_r($data); die;
            $this->db->where($data);
            if($this->db->delete('tbl_wall_of_wisdom_likes')){
                return "success";
            }else{
                return "failed";
            }
        
        return "success";
        } else {
            return false;
        } 

        // $this->db->where($data);
        // $this->db->delete('tbl_wall_of_wisdom_likes');
        // return "success";
    }
    public function all_wallofwisdom3($uid,$limit){
        // echo $uid; die;
        // $this->db->select('*');
        // $this->db->from('tbl_wall_of_wisdom');        
        // $this->db->where('status','5');
        // //$this->db->order_by('');
        // $this->db->limit(6);
        // $this->db->order_by('created_on','desc');
        // $query=$this->db->get();
        // $res=$query->result_array();
        // return $res;

        $this->db->select('wow.*');
        $this->db->from('tbl_wall_of_wisdom wow');
        // $this->db->join('tbl_wall_of_wisdom_likes like','like.card_id=wow.id','left');
        // $this->db->where("like.user_id=$uid");
        // $this->db->where("wow.user_id=$uid");
        $this->db->where('wow.status','5');  
        $this->db->limit($limit);
        $this->db->order_by('wow.created_on','desc');
        $query=$this->db->get();
        $res=$query->result_array();
        // return $res;
        // echo $uid;
        // die;
        $rs=array();
        if(!empty($res)){
            foreach($res as $list){
                $this->db->select('*');
                $this->db->from('tbl_wall_of_wisdom_likes');
                $this->db->where('card_id',$list['id']);
                $this->db->where('user_id',$uid);
                $query1=$this->db->get();
                $result=$query1->result_array();
                // return $result;
                if(!empty($result)){
                    $list['is_like']=1;
                    array_push($rs,$list);
                }else{
                    $list['is_like']=0;
                    array_push($rs,$list);
                }
// return $list;
                
            }
           
        }
        return $rs;
        // return $rs;
    }



    public function searchWallOfWisdom($uid,$limit,$select_period,$search_text,$select_type){
        if($select_type == 2){
            $ord = "ASC";
        }else{
            $ord = "DESC";
        }
        $today = date('Y-m-d');
        if($select_period == 1){

            $last_start_m = date('Y-m-d', strtotime('-7 days'));
            $last_start = $last_start_m.' 00:00:00';

            $last_end_m= date('Y-m-d',strtotime('-1 days'));
            $last_end = $last_end_m.' 00:00:00';

        }
        if($select_period == 2){
            ///// new start /////
            $last_m = date('m', strtotime('-1 month'));
            
          $year = date('Y');
          if($year % 4 == 0){
             if($last_m == 2){
                 $last_month = $last_m .'-29';
             }
             else if ($last_m == 1 || $last_m == 3 || $last_m == 5 || $last_m == 7 || $last_m == 8 || $last_m == 10 || $last_m == 12 ){
                 $last_month = $last_m .'-31';
             }else {
                 $last_month = $last_m .'-30';
             }
         }else{
             if($last_m == 2){
                 $last_month = $last_m .'-28';
             } else if ($last_m == 1 || $last_m == 3 || $last_m == 5 || $last_m == 7 || $last_m == 8 || $last_m == 10 || $last_m == 12 ){
                 $last_month = $last_m .'-31';
             }else {
                 $last_month = $last_m .'-30';
             }
         }
          ///// new end //////
         $last_start = $year.'-'.$last_m ."-01 00:00:00";
         $last_end = $year.'-'.$last_month ." 00:00:00";
        }
        if($select_period == 3){
            $last_y= date('Y', strtotime('-1 year'));
            $last_start =$last_y ."-01-01 00:00:00";
            $last_end=$last_y."-12-31 00:00:00";
           
        }      

        $this->db->select('wow.*');
        $this->db->from('tbl_wall_of_wisdom wow');
        $this->db->where('wow.status','5'); 
        if($select_period != 0){
        $this->db->where('wow.created_on >=',$last_start); 
        $this->db->where('wow.created_on <=',$last_end); 
        }
       
        if($search_text != ''){
            $this->db->group_start();
            $this->db->like('title',$search_text);
            $this->db->or_like('description',$search_text);
            $this->db->group_end();
        }
        $this->db->order_by('wow.created_on',$ord);
        $query=$this->db->get();
        $res=$query->result_array();
      
        $rs=array();
        if(!empty($res)){
            foreach($res as $list){
                $this->db->select('*');
                $this->db->from('tbl_wall_of_wisdom_likes');
                $this->db->where('card_id',$list['id']);
                $this->db->where('user_id',$uid);
                $query1=$this->db->get();
                $result=$query1->result_array();                
                if(!empty($result)){
                    $list['is_like']=1;
                    array_push($rs,$list);
                }else{
                    $list['is_like']=0;
                    array_push($rs,$list);
                }
            }           
        }
        return $rs;      
    }
}