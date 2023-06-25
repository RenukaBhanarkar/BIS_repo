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
}
?>