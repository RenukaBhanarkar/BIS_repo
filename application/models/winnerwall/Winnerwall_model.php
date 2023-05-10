<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Winnerwall_model extends CI_Model {

    public function prises()
    {      
        return $this->db->get('tbl_mst_prizes')->result_array();  
    }

    public function published_quiz()
    {  
        $this->db->where('status ',5);    
        return $this->db->get('tbl_quiz_details')->result_array();  
    }

    public function insertWinnerwall($formdata)
    {
        $this->db->insert('tbl_winner_wall_details',$formdata); 
        return $insert_id = $this->db->insert_id();
    }

    public function displayWall($submit_id)
    {  
        $this->db->where('submit_id',$submit_id);    
        return $this->db->get('tbl_winner_wall_details')->result_array();  
    }
    public function DeleteData($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('tbl_winner_wall_details');
    }

    public function submitWinnerWall($submit_id)
    {
        $formdata['submit_flag']=1;
        $this->db->where('submit_id', $submit_id);
        return $this->db->update('tbl_winner_wall_details', $formdata); 
    }

    public function checkWinnerMaster($quiz_id)
    {
        $this->db->where('quiz_id',$quiz_id);    
        return $this->db->get('tbl_mst_winner_wall')->result_array(); 
    }
    public function insertWinnerMaster($formdata)
    {
        $this->db->insert('tbl_mst_winner_wall',$formdata); 
        return $insert_id = $this->db->insert_id();
    }
    public function getWinnerWallList()
    { 
    $this->db->select('tbl_mst_winner_wall.*,tbl_mst_status.status_name,tbl_quiz_details.title'); 
        $this->db->join('tbl_mst_status','tbl_mst_status.id = tbl_mst_winner_wall.status'); 
        $this->db->join('tbl_quiz_details','tbl_quiz_details.id = tbl_mst_winner_wall.quiz_id');
         $this->db->where_not_in('tbl_mst_winner_wall.status ',9);  
        return $this->db->get('tbl_mst_winner_wall')->result_array();  
    }

    public function updateWinnerWall($formdata,$id)
    { 
        $this->db->where('id', $id);
        return $this->db->update('tbl_mst_winner_wall', $formdata); 
    }
    public function deleteWinnerWall($id,$quiz_id)
    { 
        $this->db->where('id', $id);
        if($this->db->delete('tbl_mst_winner_wall'))
        {
            $this->db->where('quiz_id', $quiz_id);
        return $this->db->delete('tbl_winner_wall_details');
        }  
    }

    public function getArchiveWinnerWallList()
    { 
    $this->db->select('tbl_mst_winner_wall.*,tbl_mst_status.status_name,tbl_quiz_details.title'); 
        $this->db->join('tbl_mst_status','tbl_mst_status.id = tbl_mst_winner_wall.status'); 
        $this->db->join('tbl_quiz_details','tbl_quiz_details.id = tbl_mst_winner_wall.quiz_id');
         $this->db->where('tbl_mst_winner_wall.status ',9);  
        return $this->db->get('tbl_mst_winner_wall')->result_array();  
    }

public function getWinners($quiz_id)
    {
        $this->db->where('quiz_id',$quiz_id);    
        return $this->db->get('tbl_winner_wall_details')->result_array(); 
    }
public function getMasterWinnerWall($id)
{
    $this->db->select('tbl_mst_winner_wall.*,tbl_mst_status.status_name,tbl_quiz_details.title'); 
    $this->db->join('tbl_mst_status','tbl_mst_status.id = tbl_mst_winner_wall.status'); 
    $this->db->join('tbl_quiz_details','tbl_quiz_details.id = tbl_mst_winner_wall.quiz_id'); 
    $this->db->where('tbl_mst_winner_wall.id',$id);    
    return $this->db->get('tbl_mst_winner_wall')->row_array(); 
    }

public function viewWallWinner($quiz_id)
{  
    $this->db->where('quiz_id',$quiz_id);    
    return $this->db->get('tbl_winner_wall_details')->result_array();  
}
public function getWinnerData($id)
{ 
    $this->db->where('id ',$id);  
    return $this->db->get("tbl_winner_wall_details")->row_array();
}

public function updateWinnerwallDetails($formdata,$wall_id)
{
    $this->db->where('id', $wall_id);
    return $this->db->update('tbl_winner_wall_details', $formdata);
}
     
     
}