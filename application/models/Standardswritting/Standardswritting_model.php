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
}