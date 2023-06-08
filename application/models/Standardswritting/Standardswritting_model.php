<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Standardswritting_model extends CI_Model {

      public function StandardswrittingSave($formdata)
    {
        $this->db->insert('tbl_standards_writting_offline',$formdata); 
        return $insert_id = $this->db->insert_id();
    } 
    public function create_standard_list()
    {   
         $this->db->where('status ',0);  
        return $this->db->get('tbl_standards_writting_offline')->result_array();
    }
    public function manage_standard_list()
    { 
        $this->db->select('tbl_standards_writting_offline.*,tbl_mst_status.status_name'); 
        $this->db->where_not_in('status ',0); 
        $this->db->where_not_in('status ',9); 
        $this->db->join('tbl_mst_status','tbl_mst_status.id = tbl_standards_writting_offline.status'); 
        return $this->db->get('tbl_standards_writting_offline')->result_array(); 
    }
    public function admin_manage_standard_list()
    { 
        $this->db->select('tbl_standards_writting_offline.*,tbl_mst_status.status_name'); 
        $this->db->where('status ',2);  
        $this->db->join('tbl_mst_status','tbl_mst_status.id = tbl_standards_writting_offline.status'); 
        return $this->db->get('tbl_standards_writting_offline')->result_array(); 
    }
    public function view_standards($id)
    { 
        $this->db->where('id ',$id);  
        return $this->db->get("tbl_standards_writting_offline")->row_array();
    }

    public function updateStatus($formdata,$id)
    {
        $this->db->where('id', $id);
        return $this->db->update('tbl_standards_writting_offline', $formdata);
    }

    public function deleteData($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('tbl_standards_writting_offline');
    }

    public function deleteFile($id,$formdata)
    {
        $this->db->where('id', $id);
        return $this->db->update('tbl_standards_writting_offline', $formdata);
    }

    public function StandardswrittingUpdate($formdata,$id)
    {
        $this->db->where('id', $id);
        return $this->db->update('tbl_standards_writting_offline', $formdata);
    }
    public function create_standard_archive()
    { 
        $this->db->select('tbl_standards_writting_offline.*,tbl_mst_status.status_name');  
        $this->db->where('status ',9); 
        $this->db->join('tbl_mst_status','tbl_mst_status.id = tbl_standards_writting_offline.status'); 
        return $this->db->get('tbl_standards_writting_offline')->result_array(); 
    }

    public function approved_standard_list()
    { 
        $this->db->select('tbl_standards_writting_offline.*,tbl_mst_status.status_name');  
        $this->db->where('status ',3); 
        $this->db->join('tbl_mst_status','tbl_mst_status.id = tbl_standards_writting_offline.status'); 
        return $this->db->get('tbl_standards_writting_offline')->result_array(); 
    }
     
     // online part

      public function insertStandardsWrittingOnline($formdata)
    {
        $this->db->insert('tbl_standards_writting_online',$formdata); 
        return $insert_id = $this->db->insert_id();
    }

    public function create_online_list()
    { 
        $this->db->select('tbl_standards_writting_online.*,tbl_mst_status.status_name,tbl_mst_quiz_availability.title as availability,tbl_mst_quiz_level.title as level');  
        $this->db->where('status ',10); 
        $this->db->join('tbl_mst_status','tbl_mst_status.id = tbl_standards_writting_online.status'); 
        $this->db->join('tbl_mst_quiz_level','tbl_mst_quiz_level.id = tbl_standards_writting_online.quiz_level_id'); 
        $this->db->join('tbl_mst_quiz_availability','tbl_mst_quiz_availability.id = tbl_standards_writting_online.availability_id'); 
        return $this->db->get('tbl_standards_writting_online')->result_array(); 
    } 

    public function updateOnlineStatus($formdata,$id)
    {
        $this->db->where('id', $id);
        return $this->db->update('tbl_standards_writting_online', $formdata);
    }

    public function deleteOnlineData($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('tbl_standards_writting_online');
    }

    public function Manage_online_list()
    { 
        $this->db->select('tbl_standards_writting_online.*,tbl_mst_status.status_name,tbl_mst_quiz_availability.title as availability,tbl_mst_quiz_level.title as level');  
        $this->db->where_not_in('status ',7); 
        $this->db->where_not_in('status ',8); 
        $this->db->where_not_in('status ',9); 
        $this->db->where_not_in('status ',10);   
        $this->db->join('tbl_mst_status','tbl_mst_status.id = tbl_standards_writting_online.status'); 
        $this->db->join('tbl_mst_quiz_level','tbl_mst_quiz_level.id = tbl_standards_writting_online.quiz_level_id'); 
        $this->db->join('tbl_mst_quiz_availability','tbl_mst_quiz_availability.id = tbl_standards_writting_online.availability_id'); 
        return $this->db->get('tbl_standards_writting_online')->result_array(); 
    } 

    

    public function admin_manage_online_list()
    { 
        $this->db->select('tbl_standards_writting_online.*,tbl_mst_status.status_name,tbl_mst_quiz_availability.title as availability,tbl_mst_quiz_level.title as level');  
        $this->db->where('status ',2);     
        $this->db->join('tbl_mst_status','tbl_mst_status.id = tbl_standards_writting_online.status'); 
        $this->db->join('tbl_mst_quiz_level','tbl_mst_quiz_level.id = tbl_standards_writting_online.quiz_level_id'); 
        $this->db->join('tbl_mst_quiz_availability','tbl_mst_quiz_availability.id = tbl_standards_writting_online.availability_id'); 
        return $this->db->get('tbl_standards_writting_online')->result_array(); 
    } 

    public function create_online_view($id)
    { 
        $this->db->select('tbl_standards_writting_online.*,tbl_mst_status.status_name,tbl_mst_quiz_availability.title as availability,tbl_mst_quiz_level.title as level');  
        $this->db->where('tbl_standards_writting_online.id ',$id); 
        $this->db->join('tbl_mst_status','tbl_mst_status.id = tbl_standards_writting_online.status'); 
        $this->db->join('tbl_mst_quiz_level','tbl_mst_quiz_level.id = tbl_standards_writting_online.quiz_level_id'); 
        $this->db->join('tbl_mst_quiz_availability','tbl_mst_quiz_availability.id = tbl_standards_writting_online.availability_id'); 
        return $this->db->get('tbl_standards_writting_online')->row_array(); 
    } 
    public function create_online_archive()
    { 
        $this->db->select('tbl_standards_writting_online.*,tbl_mst_status.status_name,tbl_mst_quiz_availability.title as availability,tbl_mst_quiz_level.title as level');  
        $this->db->where('status ',9); 
        $this->db->join('tbl_mst_status','tbl_mst_status.id = tbl_standards_writting_online.status'); 
        $this->db->join('tbl_mst_quiz_level','tbl_mst_quiz_level.id = tbl_standards_writting_online.quiz_level_id'); 
        $this->db->join('tbl_mst_quiz_availability','tbl_mst_quiz_availability.id = tbl_standards_writting_online.availability_id'); 
        return $this->db->get('tbl_standards_writting_online')->result_array(); 
    } 


    public function deleteOnlineFile($id,$formdata)
    {
        $this->db->where('id', $id);
        return $this->db->update('tbl_standards_writting_online', $formdata);
    }

    public function updateStandardsWrittingOnline($id,$formdata)
    {
        $this->db->where('id', $id);
        return $this->db->update('tbl_standards_writting_online', $formdata);
    }

    public function getPublishedOnlineCompitation()
    { 
         $t = time();
        $current_time = (date("H:i:s", $t));          
       $this->db->select('tbl_standards_writting_online.*,tbl_mst_status.status_name,tbl_mst_quiz_availability.title as availability,tbl_mst_quiz_level.title as level');  
        $this->db->where('status ',5); 
        $this->db->where('end_date >=', date("Y-m-d"));
        $this->db->where('start_date <=', date("Y-m-d"));
        $this->db->join('tbl_mst_status','tbl_mst_status.id = tbl_standards_writting_online.status'); 
        $this->db->join('tbl_mst_quiz_level','tbl_mst_quiz_level.id = tbl_standards_writting_online.quiz_level_id'); 
        $this->db->join('tbl_mst_quiz_availability','tbl_mst_quiz_availability.id = tbl_standards_writting_online.availability_id'); 
        $query= $this->db->get('tbl_standards_writting_online')->result_array(); 
        $rs = array();  
        if(!(empty($query))){ 
          foreach($query as $row){ 
              if(($row['start_date'] == date("Y-m-d") &&  $row['end_date'] == date("Y-m-d")) ){
                  if(($row['start_time'] <= $current_time) && ($row['end_time'] >= $current_time) ){
                      array_push($rs,$row);
                  }
              }else if(($row['start_date'] == date("Y-m-d") ) &&  $row['end_date'] > date("Y-m-d")){
                  if($row['start_time'] <= $current_time){
                      array_push($rs,$row);
                  }
              }else if(($row['start_date'] < date("Y-m-d") ) && ($row['end_date'] == date("Y-m-d") )){
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

    public function StandardswrittingCompSave($formdata)
    {
        $this->db->insert('tbl_standard_writing_competition_online',$formdata); 
        return $insert_id = $this->db->insert_id();
    }

    public function ongoing_online_list(){
        $t = time();
        $current_time = (date("H:i:s", $t));          
       $this->db->select('tbl_standards_writting_online.*,tbl_mst_status.status_name,tbl_mst_quiz_availability.title as availability,tbl_mst_quiz_level.title as level');  
        $this->db->where('status ',5); 
        $this->db->where('end_date >=', date("Y-m-d"));
        $this->db->where('start_date <=', date("Y-m-d"));
        $this->db->join('tbl_mst_status','tbl_mst_status.id = tbl_standards_writting_online.status'); 
        $this->db->join('tbl_mst_quiz_level','tbl_mst_quiz_level.id = tbl_standards_writting_online.quiz_level_id'); 
        $this->db->join('tbl_mst_quiz_availability','tbl_mst_quiz_availability.id = tbl_standards_writting_online.availability_id'); 
        $query= $this->db->get('tbl_standards_writting_online')->result_array(); 
        $rs = array();  
        if(!(empty($query))){ 
          foreach($query as $row){ 
              if(($row['start_date'] == date("Y-m-d") &&  $row['end_date'] == date("Y-m-d")) ){
                  if(($row['start_time'] <= $current_time) && ($row['end_time'] >= $current_time) ){
                      array_push($rs,$row);
                  }
              }else if(($row['start_date'] == date("Y-m-d") ) &&  $row['end_date'] > date("Y-m-d")){
                  if($row['start_time'] <= $current_time){
                      array_push($rs,$row);
                  }
              }else if(($row['start_date'] < date("Y-m-d") ) && ($row['end_date'] == date("Y-m-d") )){
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

    public function getSubmissionOnline($id)
    { 
        $this->db->select('*');
        $this->db->from('tbl_standard_writing_competition_online');
        $this->db->where('comp_id',$id); 
        $query= $this->db->get();
        return $query->num_rows();
    }

    public function getSendReview($id)
    { 
        $this->db->select('*');
        $this->db->from('tbl_standard_writing_competition_online');
        $this->db->where('comp_id',$id); 
        $this->db->where('status',1); 
        $query= $this->db->get();
        return $query->num_rows();
    }

    public function getReviewd($id)
    { 
        $this->db->select('*');
        $this->db->from('tbl_standard_writing_competition_online');
        $this->db->where('comp_id',$id); 
        $this->db->where('status',2); 
        $query= $this->db->get();
        return $query->num_rows();
    }


    public function submission_view($comp_id){
        $this->db->select('tbl_standard_writing_competition_online.*,tbl_users.user_mobile,tbl_users.email,tbl_users.user_name,tbl_users.member_id');
        $this->db->from('tbl_standard_writing_competition_online');
        $this->db->join('tbl_users tbl_users','tbl_users.user_id=tbl_standard_writing_competition_online.user_id'); 
        $this->db->where('tbl_standard_writing_competition_online.comp_id',$comp_id);        
        $query=$this->db->get();
        return $query->result_array(); 
     }

     public function closed_standard_list(){
         $t = time();

        $current_time = (date("H:i:s", $t));
        $this->db->select('tbl_standards_writting_online.*,tbl_mst_status.status_name,tbl_mst_quiz_availability.title as availability,tbl_mst_quiz_level.title as level');  
        $this->db->join('tbl_mst_status','tbl_mst_status.id = tbl_standards_writting_online.status'); 
        $this->db->join('tbl_mst_quiz_level','tbl_mst_quiz_level.id = tbl_standards_writting_online.quiz_level_id'); 
        $this->db->join('tbl_mst_quiz_availability','tbl_mst_quiz_availability.id = tbl_standards_writting_online.availability_id'); 
        $this->db->where('tbl_standards_writting_online.status',5); 
       $this->db->where('tbl_standards_writting_online.end_date <=' ,date("Y-m-d"));  
        $res = array();
        $rs = array();
        $query=$this->db->get('tbl_standards_writting_online');
        if($query->num_rows() > 0){
            $res = $query->result_array();
            foreach($res as $row){
                if(($row['start_date'] == date("Y-m-d") &&  $row['end_date'] == date("Y-m-d")) ){
                    if(($row['start_time'] <= $current_time) && ($row['end_time'] <= $current_time) ){
                        array_push($rs,$row);
                    }
                }else if(($row['start_date'] == date("Y-m-d") ) &&  $row['end_date'] > date("Y-m-d")){
                    if($row['start_time'] <= $current_time){
                        array_push($rs,$row);
                    }
                }else if(($row['start_date'] < date("Y-m-d") ) && ($row['end_date'] == date("Y-m-d") )){
                    if($row['end_time'] <= $current_time){
                        array_push($rs,$row);
                    }
                }else{
                    array_push($rs,$row);
                }
            }
        }
        return $rs;  
    }



    public function revised_standard_list()
    { 
        $this->db->select('tbl_standards_writting_online.*,tbl_mst_status.status_name,tbl_mst_quiz_availability.title as availability,tbl_mst_quiz_level.title as level');  
        $this->db->where('review_status ',1); 
        $this->db->join('tbl_mst_status','tbl_mst_status.id = tbl_standards_writting_online.status'); 
        $this->db->join('tbl_mst_quiz_level','tbl_mst_quiz_level.id = tbl_standards_writting_online.quiz_level_id'); 
        $this->db->join('tbl_mst_quiz_availability','tbl_mst_quiz_availability.id = tbl_standards_writting_online.availability_id'); 
        return $this->db->get('tbl_standards_writting_online')->result_array(); 
    } 

    public function standard_submission_competition($id)
    { 
        $this->db->select('tbl_standards_writting_online.*,
             submit.id as submission_id,submit.score,submit.sssign_date, submit.status as assignStatus,

            tbl_mst_status.status_name,tbl_mst_quiz_availability.title as availability,tbl_mst_quiz_level.title as level,
            tbl_admin.name,tbl_users.member_id

            ');  
        $this->db->where('tbl_standards_writting_online.id ',$id); 
        $this->db->join('tbl_standard_writing_competition_online submit','submit.comp_id = tbl_standards_writting_online.id'); 

        $this->db->join('tbl_mst_status','tbl_mst_status.id = tbl_standards_writting_online.status');

        $this->db->join('tbl_admin','tbl_admin.id = submit.evaluator_id','left');
        $this->db->join('tbl_users','tbl_users.user_id = submit.user_id');
 
        $this->db->join('tbl_mst_quiz_level','tbl_mst_quiz_level.id = tbl_standards_writting_online.quiz_level_id'); 
        $this->db->join('tbl_mst_quiz_availability','tbl_mst_quiz_availability.id = tbl_standards_writting_online.availability_id'); 
        return $this->db->get('tbl_standards_writting_online')->result_array(); 
    } 

    public function standard_submission_view($id){
        $this->db->select('tbl_standard_writing_competition_online.*,tbl_users.user_mobile,tbl_users.email,tbl_users.user_name,tbl_users.member_id');
        $this->db->from('tbl_standard_writing_competition_online');
        $this->db->join('tbl_users tbl_users','tbl_users.user_id=tbl_standard_writing_competition_online.user_id'); 
        $this->db->where('tbl_standard_writing_competition_online.id',$id);        
        $query=$this->db->get();
        return $query->row_array(); 
     }


     public function task_recevied_list($evaluator_id){
        $this->db->select('tbl_standard_writing_competition_online.*, 
            tbl_standards_writting_online.comp_id as competetion_id,
            tbl_standards_writting_online.title,
            tbl_standards_writting_online.total_mark,
            tbl_mst_quiz_availability.title as avail,
            ');
        $this->db->from('tbl_standard_writing_competition_online');
        $this->db->join('tbl_standards_writting_online','tbl_standards_writting_online.id= tbl_standard_writing_competition_online.comp_id'); 

         $this->db->join('tbl_mst_quiz_availability','tbl_mst_quiz_availability.id= tbl_standards_writting_online.availability_id'); 

        $this->db->where('tbl_standard_writing_competition_online.evaluator_id',$evaluator_id); 
        $this->db->where('tbl_standard_writing_competition_online.status',1);        

        $query=$this->db->get();
        return $query->result_array(); 
     }

     public function task_reviewed($evaluator_id){
        $this->db->select('tbl_standard_writing_competition_online.*, 
            tbl_standards_writting_online.comp_id as competetion_id,
            tbl_standards_writting_online.title,
            tbl_standards_writting_online.total_mark,
            tbl_mst_quiz_availability.title as avail,
            ');
        $this->db->from('tbl_standard_writing_competition_online');
        $this->db->join('tbl_standards_writting_online','tbl_standards_writting_online.id= tbl_standard_writing_competition_online.comp_id'); 

         $this->db->join('tbl_mst_quiz_availability','tbl_mst_quiz_availability.id= tbl_standards_writting_online.availability_id'); 
         
        $this->db->where('tbl_standard_writing_competition_online.evaluator_id',$evaluator_id);        
        $this->db->where('tbl_standard_writing_competition_online.status',2);        
        $query=$this->db->get();
        return $query->result_array(); 
     }


     public function task_recevied_reviewed($id){
        $this->db->select('tbl_standard_writing_competition_online.*,
            tbl_standards_writting_online.title,
            tbl_standards_writting_online.comp_id as comp,
            tbl_standards_writting_online.standard,
            tbl_standards_writting_online.total_mark');
        $this->db->from('tbl_standard_writing_competition_online');
        $this->db->join('tbl_standards_writting_online','tbl_standards_writting_online.id =tbl_standard_writing_competition_online.comp_id'); 
        $this->db->where('tbl_standard_writing_competition_online.id',$id);        
        $query=$this->db->get();
        return $query->row_array();  
     }

     public function getEvaluator()
    {   
         $this->db->where('admin_type ',4);  
        return $this->db->get('tbl_admin')->result_array();
    }

     public function updateCompetition($id,$formdata)
    {
        $this->db->where('id', $id);
        return $this->db->update('tbl_standard_writing_competition_online', $formdata);
    }

public function task_reviewed_list($comp_id){
        $this->db->select('tbl_standard_writing_competition_online.*,tbl_users.user_mobile,tbl_users.email,tbl_users.user_name');
        $this->db->from('tbl_standard_writing_competition_online');
        $this->db->join('tbl_users tbl_users','tbl_users.user_id=tbl_standard_writing_competition_online.user_id'); 
        $this->db->where('tbl_standard_writing_competition_online.comp_id',$comp_id);        
        $this->db->where('tbl_standard_writing_competition_online.status',2);        
        $query=$this->db->get();
        return $query->result_array(); 
     }


}