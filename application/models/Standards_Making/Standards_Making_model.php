<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Standards_Making_model extends CI_Model {

    public function conversationForm($formdata)
    {
        $this->db->insert('tbl_inconversation_with_expert',$formdata); 
        return $insert_id = $this->db->insert_id();
    }
    public function getConversationAll()
    {   
        $this->db->select('tbl_inconversation_with_expert.*,tbl_mst_status.status_name'); 
         $this->db->where_not_in('status ',9); 
        $this->db->join('tbl_mst_status','tbl_mst_status.id = tbl_inconversation_with_expert.status'); 
        return $this->db->get('tbl_inconversation_with_expert')->result_array();  
    } 

     public function conversationView($id)
    { 
        $this->db->where('id ',$id);  
        return $this->db->get("tbl_inconversation_with_expert")->row_array();
    }
     public function getConversation($id)
    {
        $this->db->where('id',$id); 
        return $quiz = $this->db->get('tbl_inconversation_with_expert')->row_array();
    }

    public function updateConversation($id,$formdata)
    {
        $this->db->where('id', $id);
         
        return $this->db->update('tbl_inconversation_with_expert', $formdata);
    }
    public function deleteConversation($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('tbl_inconversation_with_expert');
    }

    public function ChangeStatusConversation($id,$formdata)
    {
        $this->db->where('id', $id);
        return $this->db->update('tbl_inconversation_with_expert', $formdata);
    }

    public function getConversationArchives()
    {   
        $this->db->select('tbl_inconversation_with_expert.*,tbl_mst_status.status_name'); 
        $this->db->where('tbl_inconversation_with_expert.status',9); 
        $this->db->join('tbl_mst_status','tbl_mst_status.id = tbl_inconversation_with_expert.status'); 
        return $this->db->get('tbl_inconversation_with_expert')->result_array();  
    }

    public function joinclassroomForm($formdata)
    {
        $this->db->insert('tbl_join_the_classroom',$formdata); 
        return $insert_id = $this->db->insert_id();
    }

    public function getLiveSessionList()
    {   
        $this->db->select('tbl_join_the_classroom.*,tbl_mst_status.status_name'); 
         $this->db->where_not_in('status ',9); 
        $this->db->join('tbl_mst_status','tbl_mst_status.id = tbl_join_the_classroom.status'); 
        return $this->db->get('tbl_join_the_classroom')->result_array();  
    }

    public function liveSessionViewView($id)
    { 
        $this->db->where('id ',$id);  
        return $this->db->get("tbl_join_the_classroom")->row_array();
    }
    public function joinclassroomFormUpdate($formdata,$id)
    {

        $this->db->where('id', $id);
        return $this->db->update('tbl_join_the_classroom', $formdata);
    }
     public function deleteConvesationFile($id,$formdata){
        $this->db->where('id', $id);
         if ($this->db->update('tbl_inconversation_with_expert',$formdata)) {
             return true;
         } else {
             return false;
         }
    }
    
    public function deleteLiveSessionFile($id,$formdata){
        $this->db->where('id', $id);
         if ($this->db->update('tbl_join_the_classroom',$formdata)) {
             return true;
         } else {
             return false;
         }
    }

    public function updateStatusLiveSession($id,$formdata){
        $this->db->where('id', $id);
         if ($this->db->update('tbl_join_the_classroom',$formdata)) {
             return true;
         } else {
             return false;
         }
    }

    public function getPublishSessionList()
    {   
        $this->db->select('tbl_join_the_classroom.*,tbl_mst_status.status_name'); 
         $this->db->where('status ',5); 
        $this->db->join('tbl_mst_status','tbl_mst_status.id = tbl_join_the_classroom.status'); 
        return $this->db->get('tbl_join_the_classroom')->result_array();  
    }

    public function getArchivedSessionList()
    {   
        $this->db->select('tbl_join_the_classroom.*,tbl_mst_status.status_name'); 
         $this->db->where('status ',9); 
        $this->db->join('tbl_mst_status','tbl_mst_status.id = tbl_join_the_classroom.status'); 
        return $this->db->get('tbl_join_the_classroom')->result_array();  
    }
    public function getLiveSession()
    { 
        $this->db->where('status ',0);  
        return $this->db->get('tbl_join_the_classroom')->result_array();
    }
    public function getnewRequest()
    { 
        $this->db->where('status ',2);  
        return $this->db->get('tbl_join_the_classroom')->result_array();
    }
    public function getApprovedRequest()
    { 
        $this->db->where('status ',3);  
        return $this->db->get('tbl_join_the_classroom')->result_array();
    }
    public function getRejectedRequest()
    { 
        $this->db->where('status ',4);  
        return $this->db->get('tbl_join_the_classroom')->result_array();
    }
    public function getPublishedRequest()
    { 
        $this->db->where('status ',5);  
        return $this->db->get('tbl_join_the_classroom')->result_array();
    }
    public function getArchiveRequest()
    { 
        $this->db->where('status ',9);  
        return $this->db->get('tbl_join_the_classroom')->result_array();
    }
     

     public function deleteLiveSession($id){
        $this->db->where('id', $id);
         if ($this->db->delete('tbl_join_the_classroom')) {
             return true;
         } else {
             return false;
         }
    }
    
     
}