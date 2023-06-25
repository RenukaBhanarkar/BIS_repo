<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cms_model extends CI_Model {

    public function consumerBisinsertData($data){
        if ($this->db->insert('tbl_mst_cms', $data)) {
            return $this->db->insert_id();
        } else {
            return false;
        }
     }

     public function consumerBisupdatedateData($data){
        $this->db->where('id', $data['id']);
         if ($this->db->update('tbl_mst_cms', $data)) {
             return true;
         } else {
             return false;
         }
     }

     public function aboutConsumerBisData(){
        // $myQuery = "SELECT * FROM  tbl_mst_cms";
        $this->db->select('*');
        $this->db->from('tbl_mst_cms');
        $this->db->where('type',1);
        $query = $this->db->get();
        $result=$query->result_array();
        return $result;
     }
     public function deletconsumerBis($id){
        $this->db->where('id', $id);
        if ($this->db->delete('tbl_mst_cms')) {
            return true;
        } else {
            return false;
        }
     }
     public function aboutStandardClub(){
        // $myQuery = "SELECT * FROM  tbl_mst_cms";
        $this->db->select('*');
        $this->db->from('tbl_mst_cms');
        $this->db->where('type',3);
        $query = $this->db->get();
        $result=$query->result_array();
        return $result;
     }
     public function aboutStandardClubinsertData($data){
        if ($this->db->insert('tbl_mst_cms', $data)) {
            return $this->db->insert_id();
        } else {
            return false;
        }
     }
     public function deletaboutStandardClub($id){
        $this->db->where('id', $id);
        if ($this->db->delete('tbl_mst_cms')) {
            return true;
        } else {
            return false;
        }
     }
     public function aboutStandardClubUpdateData($data){
        $this->db->where('id', $data['id']);
         if ($this->db->update('tbl_mst_cms', $data)) {
             return true;
         } else {
             return false;
         }
     }
     public function standardPromotionList(){
        $this->db->select('*');
        $this->db->from('tbl_mst_cms');
        $this->db->where('type',2);
        $query = $this->db->get();
        $result=$query->result_array();
        return $result;
     }
     public function standardPromotioninsertData($data){
        if ($this->db->insert('tbl_mst_cms', $data)) {
            return $this->db->insert_id();
        } else {
            return false;
        }
     }
     public function learningScienceVia(){
        $this->db->select('*');
        $this->db->from('tbl_mst_cms');
        $this->db->where('type',4);
        $query = $this->db->get();
        $result=$query->result_array();
        return $result;
     }
     public function getData($type){
        $this->db->select('*');
        $this->db->from('tbl_mst_cms');
        $this->db->where('type',$type);
        $this->db->order_by('created_on','desc');
        $query = $this->db->get();
        $result=$query->result_array();
        return $result;
     }
}
?>