<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Learningscience_model extends CI_Model {

    public function getlsvstandardslist()
    {  
        $this->db->where('status ',0);   
        return $this->db->get('tbl_learning_science_via_standards')->result_array();  
    }

    public function lsvStandardsForm($formdata)
    {
        $this->db->insert('tbl_learning_science_via_standards',$formdata); 
        return $insert_id = $this->db->insert_id();
    }
    public function getlsvManageStandardsList()
    {   
        $this->db->select('tbl_learning_science_via_standards.*,tbl_mst_status.status_name'); 
         $this->db->where_not_in('status ',9); 
        $this->db->join('tbl_mst_status','tbl_mst_status.id = tbl_learning_science_via_standards.status'); 
        return $this->db->get('tbl_learning_science_via_standards')->result_array();  
    }
    public function getPublishLsvStandardsList()
    {   
        $this->db->select('tbl_learning_science_via_standards.*,tbl_mst_status.status_name'); 
         $this->db->where('status ',5); 
        $this->db->join('tbl_mst_status','tbl_mst_status.id = tbl_learning_science_via_standards.status'); 
        return $this->db->get('tbl_learning_science_via_standards')->result_array();  
    }

    public function getArchivedLsvStandardsList()
    {   
        $this->db->select('tbl_learning_science_via_standards.*,tbl_mst_status.status_name'); 
         $this->db->where('status ',9); 
        $this->db->join('tbl_mst_status','tbl_mst_status.id = tbl_learning_science_via_standards.status'); 
        return $this->db->get('tbl_learning_science_via_standards')->result_array();  
    }
    public function lsvStandardsView($id)
    { 
        $this->db->where('id ',$id);  
        return $this->db->get("tbl_learning_science_via_standards")->row_array();
    }
    public function updateLsvStandards($formdata,$id)
    {
        $this->db->where('id', $id);
        return $this->db->update('tbl_learning_science_via_standards', $formdata);
    }
     public function deleteLsvStandards($id){
        $this->db->where('id', $id);
         if ($this->db->delete('tbl_learning_science_via_standards')) {
             return true;
         } else {
             return false;
         }
    }

    public function updateLvsStandarStatus($id,$formdata){
        $this->db->where('id', $id);
         if ($this->db->update('tbl_learning_science_via_standards',$formdata)) {
             return true;
         } else {
             return false;
         }
    }

    
    
    public function getLiveSession()
    { 
        $this->db->where('status ',0);  
        return $this->db->get('tbl_learning_science_via_standards')->result_array();
    }
    public function getnewRequest()
    { 
        $this->db->where('status ',2);  
        return $this->db->get('tbl_learning_science_via_standards')->result_array();
    }
    public function getApprovedRequest()
    { 
        $this->db->where('status ',3);  
        return $this->db->get('tbl_learning_science_via_standards')->result_array();
    }
    public function getRejectedRequest()
    { 
        $this->db->where('status ',4);  
        return $this->db->get('tbl_learning_science_via_standards')->result_array();
    }
    public function getPublishedRequest()
    { 
        $this->db->where('status ',5);  
        return $this->db->get('tbl_learning_science_via_standards')->result_array();
    }
    public function getArchiveRequest()
    { 
        $this->db->where('status ',9);  
        return $this->db->get('tbl_learning_science_via_standards')->result_array();
    }
    public function lsvStandardsViewAdmin($id)
    { 
        $this->db->where('id ',$id);  
        return $this->db->get("tbl_learning_science_via_standards")->row_array();
    }
    public function deleteLvsFile($id,$formdata){
        $this->db->where('id', $id);
         if ($this->db->update('tbl_learning_science_via_standards',$formdata)) {
             return true;
         } else {
             return false;
         }
    }
     
    
     
}