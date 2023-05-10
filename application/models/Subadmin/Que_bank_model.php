<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Que_bank_model extends CI_Model {

    public function  insertData($data)
    {
        if ($this->db->insert('tbl_que_bank', $data)) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }      
    public function updateData($id, $data)
    {
        $this->db->where('que_bank_id', $id);
        if ($this->db->update('tbl_que_bank', $data)) {
            return true;
        } else {
            return false;
        }
    }
    public function deleteData($id)
    {
        $this->db->where('que_bank_id', $id);
        if ($this->db->delete('tbl_que_bank')) {
            return true;
        } else {
            return false;
        }
    }
    
    public function getListOfAllQueBank(){      
        $query = $this->db->select('qb.*,s.status_name')
            ->from('tbl_que_bank qb')
            ->join('tbl_mst_status s', 'qb.status = s.id', 'left')           
            ->get();
        // $this->db->select('*');
        // $this->db->from('tbl_que_bank');
        // $this->db->where('is_active',1);        
        // $this->db->order_by('que_bank_id', 'ASC');
        // $query = $this->db->get();
        $rs = array();
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                array_push($rs,$row);
            }
        }
        return $rs;
    }
    public function getAllQueBankForApproval(){      
        $query = $this->db->select('qb.*,s.status_name,quiz.title as quiz_title')
            ->from('tbl_que_bank qb')
            ->join('tbl_mst_status s', 'qb.status = s.id', 'left')
            ->join('tbl_quiz_details quiz', 'quiz.que_bank_id = qb.que_bank_id', 'left')
            ->where_in('qb.status', array(2,3,4,5,6))
            ->get();
        // $this->db->select('*');
        // $this->db->from('tbl_que_bank');
        // $this->db->where('is_active',1);        
        // $this->db->order_by('que_bank_id', 'ASC');
        // $query = $this->db->get();
        $rs = array();
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                array_push($rs,$row);
            }
        }
        return $rs;
    }    
    public function getListOfArchiveQueBank(){
        $query = $this->db->select('qb.*,s.status_name,quiz.title as quiz_title')
            ->from('tbl_que_bank qb')
            ->join('tbl_mst_status s', 'qb.status = s.id', 'left')
            ->join('tbl_quiz_details quiz', 'quiz.que_bank_id = qb.que_bank_id', 'left')
            ->where_in('qb.status', array(9))
            ->get();
       
        $rs = array();
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                array_push($rs,$row);
            }
        }
        return $rs;
    }
    public function getAllQueBankForSubadmin(){      
        $query = $this->db->select('qb.*,s.status_name,quiz.title as quiz_title')
            ->from('tbl_que_bank qb')
            ->join('tbl_mst_status s', 'qb.status = s.id', 'left')
            ->join('tbl_quiz_details quiz', 'quiz.que_bank_id = qb.que_bank_id', 'left')
            ->where_in('qb.status', array(1,2,3,4,5,6))
            ->get();
        // $this->db->select('*');
        // $this->db->from('tbl_que_bank');
        // $this->db->where('is_active',1);        
        // $this->db->order_by('que_bank_id', 'ASC');
        // $query = $this->db->get();
        $rs = array();
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                array_push($rs,$row);
            }
        }
        return $rs;
    }    
    public function getDetailsByQueBankId($id){          
        $query = $this->db->select('qb.*,l.title as type')
        ->from('tbl_que_bank qb')
        ->join('tbl_mst_language l', 'qb.language = l.id', 'left')
        ->where('is_active', 1)
        ->where('que_bank_id', $id)
        ->get();
        $rs = array();
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $CI =& get_instance();
                $row['queList'] = $CI->Questions_model->getQuestionListByQueBankId($row['que_bank_id']);
                array_push($rs,$row);
            }
        }
        return $rs;
    }
    public function replicateByQueBankId($id){          
        $query = $this->db->select('*')
        ->from('tbl_que_bank')
        ->where('que_bank_id', $id)
        ->get();
        $rs = array();
        if ($query->num_rows() > 0) {
           $rs = $query->row_array();
        }
        return $rs;
    }
    public function updateQueBankbyQuizid($que_bank_id,$data){
        $this->db->where('que_bank_id', $que_bank_id);
		if($this->db->update('tbl_que_bank', $data)){
			return true;
		}else{
			return false;
		}
    }
    /*
    public function getAllSubAdmin(){      
        $this->db->select('*');
        $this->db->from('tbl_que_bank');
        $this->db->where('is_active',1); 
        $this->db->where('admin_type',3); 
        $this->db->order_by('id', 'ASC');
         $query = $this->db->get();
        $rs = array();
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                array_push($rs,$row);
            }
        }
        return $rs;
    }
*/
    
    
    
   
}?>