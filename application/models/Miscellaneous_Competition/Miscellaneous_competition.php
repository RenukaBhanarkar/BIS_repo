<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Miscellaneous_competition extends CI_Model {

    public function insertCompetition($data)
    {
        if($this->db->insert('tbl_mst_competition_detail',$data)){
			return $this->db->insert_id();
		}else{
			return false;
		}
        
    }

    public function insertCompPrizes($data){
        if($this->db->insert('tbl_mst_competition_prize',$data)){
			return $this->db->insert_id();
		}else{
			return false;
		}
    }
    public function getCompetition($id){
        $this->db->select('*');
        $this->db->from('tbl_mst_competition_detail');
        $this->db->where('status',$id);
        $query=$this->db->get();
        return $query->result_array();


       // return $this->db->get("tbl_que_bank")->where('status',$id)->result_array();
    }
    public function update_status($data){

        if($this->db->where('id',$data['id'])){
            $this->db->update('tbl_mst_competition_detail',$data);
            return true;
        }else{
            return false;
        }
    }
    public function manageCompetition(){
        $this->db->select('tbl_mst_competition_detail.*,tbl_mst_status.status_name'); 
        $this->db->join('tbl_mst_status','tbl_mst_status.id = tbl_mst_competition_detail.status'); 
        $this->db->where_in('tbl_mst_competition_detail.status',array(2,3,4,5,6,1));

       // $this->db->where('tbl_mst_competition_detail.start_date >=' ,date("Y-m-d")); 
        return $this->db->get('tbl_mst_competition_detail')->result_array();
    }
    public function closedCompetition(){
        
        $this->db->select('tbl_mst_competition_detail.*,tbl_mst_status.status_name'); 
        $this->db->join('tbl_mst_status','tbl_mst_status.id = tbl_mst_competition_detail.status'); 
        $this->db->where_in('tbl_mst_competition_detail.status',array(2,3,4,5,6,1));

       $this->db->where('tbl_mst_competition_detail.end_date <' ,date("Y-m-d")); 
        return $this->db->get('tbl_mst_competition_detail')->result_array();
    }
    public function ongoingCompetition(){
        $this->db->select('tbl_mst_competition_detail.*,tbl_mst_status.status_name'); 
        $this->db->join('tbl_mst_status','tbl_mst_status.id = tbl_mst_competition_detail.status'); 
        $this->db->where_in('tbl_mst_competition_detail.status','5');
       $this->db->where('tbl_mst_competition_detail.end_date >=' ,date("Y-m-d")); 
        return $this->db->get('tbl_mst_competition_detail')->result_array();
    }
    public function viewCompetition($id){
        $this->db->select('tbl_mst_competition_detail.*,tbl_mst_status.status_name,tbl_mst_competition_prize.*'); 
        $this->db->join('tbl_mst_status','tbl_mst_status.id = tbl_mst_competition_detail.status'); 
        $this->db->join('tbl_mst_competition_prize','tbl_mst_competition_prize.competitionn_id = tbl_mst_competition_detail.id'); 
        $this->db->where('tbl_mst_competition_detail.id',$id);
        $result= $this->db->get('tbl_mst_competition_detail')->result_array();
        return $result[0];
    }
    public function viewCompetition1($id){
        $this->db->select('tbl_mst_competition_detail.*,tbl_mst_competition_prize.*'); 
        //$this->db->join('tbl_mst_status','tbl_mst_status.id = tbl_mst_competition_detail.status'); 
        $this->db->join('tbl_mst_competition_prize','tbl_mst_competition_prize.competitionn_id = tbl_mst_competition_detail.id'); 
        $this->db->where('tbl_mst_competition_detail.id',$id);
        $result= $this->db->get('tbl_mst_competition_detail')->result_array();
        return $result[0];
    }
    public function getPublishedComp($limit){
        $this->db->select('tbl_mst_competition_detail.*,tbl_mst_status.status_name,tbl_mst_competition_prize.*'); 
        $this->db->join('tbl_mst_status','tbl_mst_status.id = tbl_mst_competition_detail.status'); 
        $this->db->join('tbl_mst_competition_prize','tbl_mst_competition_prize.competitionn_id = tbl_mst_competition_detail.id');
        $this->db->where_in('tbl_mst_competition_detail.status','5');
       $this->db->where('tbl_mst_competition_detail.end_date >=' ,date("Y-m-d")); 
       $this->db->limit($limit);
        return $this->db->get('tbl_mst_competition_detail')->result_array();
    }

    public function submitCompResponse($data){
       // print_r($data); die;
        if($this->db->insert('tbl_users_competition_attempt_record',$data)){
			return $this->db->insert_id();
		}else{
			return false;
		}
    }

    public function ckeckCompAttempt($data){
       // print_r($data); die;
        $this->db->select('*');
        $this->db->from('tbl_users_competition_attempt_record');
        $this->db->where('competiton_id',$data['competiton_id']);
        $this->db->where('user_id',$data['user_id']);
        $query=$this->db->get();
        return $query->result_array();
    }
    public function ongoingCompetitionSubmission($comp_id){
        $this->db->select('tucar.*,tu.user_mobile,tu.email,tu.user_name,tmcd.competiton_name');
        $this->db->from('tbl_users_competition_attempt_record tucar');
        $this->db->join('tbl_users tu','tu.user_id=tucar.user_id');
        $this->db->join('tbl_mst_competition_detail tmcd','tmcd.id=tucar.competiton_id');
        $this->db->where('competiton_id',$comp_id);        
        $query=$this->db->get();
        return $query->result_array(); 

    //     $this->db->select('tbl_mst_competition_detail.*,tbl_mst_status.status_name,tbl_mst_competition_prize.*'); 
    //     $this->db->join('tbl_mst_status','tbl_mst_status.id = tbl_mst_competition_detail.status'); 
    //     $this->db->join('tbl_mst_competition_prize','tbl_mst_competition_prize.competitionn_id = tbl_mst_competition_detail.id');
    //     $this->db->where_in('tbl_mst_competition_detail.status','5');
    //    $this->db->where('tbl_mst_competition_detail.end_date >=' ,date("Y-m-d")); 
    //    $this->db->limit($limit);
    //     return $this->db->get('tbl_mst_competition_detail')->result_array();

      //  $this->db->select('tbl_users_competition_attempt_record.*');
       // $this->db->join('tbl_users','tbl_users.user_id = tbl_users_competition_attempt_record.user_id');
        // $this->db->where('tbl_users_competition_attempt_record.competiton_id',$comp_id); 
        // $query=$this->db->get();
        // return $query->result_array(); 

    }
}