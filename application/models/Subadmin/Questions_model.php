<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Questions_model extends CI_Model {

    public function  insertData($data)
    {
        if ($this->db->insert('tbl_que_details', $data)) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }      
    public function updateData($id, $data)
    {
        $this->db->where('que_id', $id);
        if ($this->db->update('tbl_que_details', $data)) {
            return true;
        } else {
            return false;
        }
    }
    public function deleteData($id)
    {
        $this->db->where('que_id', $id);
        if ($this->db->delete('tbl_que_details')) {
            return true;
        } else {
            return false;
        }
    }
    public function deleteQueByQueBankID($que_bank_id)
    {
        $this->db->where('que_bank_id', $que_bank_id);
        if ($this->db->delete('tbl_que_details')) {
            return true;
        } else {
            return false;
        }
    }
  
    // public function getQuestionListByQueBankId($que_bank_id){
    //     $query = $this->db->select('*')
    //     ->from('tbl_que_details')
    //     ->where('que_bank_id', $que_bank_id)
    //     ->get();
    //     $rs = array();
    //     if ($query->num_rows() > 0) {
    //         foreach ($query->result_array() as $row) {
    //             array_push($rs, $row);
    //         }          
    //     }
    //     return $rs;
    // }

    public function getQuestionListByQueBankId($que_bank_id){
    $query = $this->db->select('que.*,bank.language')
    ->from('tbl_que_details que')
    ->join('tbl_que_bank bank', 'que.que_bank_id = bank.que_bank_id', 'inner')  
    ->where('bank.que_bank_id', $que_bank_id)         
    ->get();

        $rs = array();
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                array_push($rs,$row);
            }
        }
        return $rs;
    } 

    public function replicateQueByQueBankId($que_bank_id){
        $query = $this->db->select('*')
        ->from('tbl_que_details')
        ->where('que_bank_id', $que_bank_id)         
        ->get();

            $rs = array();
            if ($query->num_rows() > 0) {
                foreach ($query->result_array() as $row) {
                    array_push($rs,$row);
                }
            }
            return $rs;
    }
   
}?>
