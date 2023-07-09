<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Standardswritting_model extends CI_Model
{



    /***
     * new code start
     */
    public function resultDeclarationList($id)
    {
        $rs = array();
        $this->db->select('*');
        $this->db->from('tbl_standards_writting_online');
        $this->db->where('id', $id);
        $query = $this->db->get();
        // echo json_encode($query->result_array());
        $prizes_details = array();
        $comp_details = array();
        $count = 0;
        if ($query->num_rows() > 0) {

            $comp_details = $query->row_array();

            $count =  $count + $comp_details['fprize'] + $comp_details['sprize'] + $comp_details['tprize'] + $comp_details['cprize'];

            if ($comp_details['fprize'] != "" && $comp_details['fprize'] > 0) {
                $fprize_arr = array(
                    'prize_id' => 1,
                    'no_of_prize' => $comp_details['fprize']
                );
                array_push($prizes_details, $fprize_arr);
            }
            if ($comp_details['sprize'] != "" && $comp_details['sprize'] > 0) {
                $sprize_arr = array(
                    'prize_id' => 2,
                    'no_of_prize' => $comp_details['sprize']
                );
                array_push($prizes_details, $sprize_arr);
            }
            if ($comp_details['tprize'] != "" && $comp_details['tprize'] > 0) {
                $tprize_arr = array(
                    'prize_id' => 3,
                    'no_of_prize' => $comp_details['tprize']
                );
                array_push($prizes_details, $tprize_arr);
            }
            if ($comp_details['cprize'] != "" && $comp_details['cprize'] > 0) {
                $cprize_arr = array(
                    'prize_id' => 4,
                    'no_of_prize' => $comp_details['cprize']
                );
                array_push($prizes_details, $cprize_arr);
            }
        }
        $this->db->select('tbl_standard_writing_competition_online.*,
            tbl_users.user_name,
            tbl_users.email,
            tbl_users.user_mobile,tbl_users.member_id,tbl_users.stdClubMemberClass');
        $this->db->where('tbl_standard_writing_competition_online.comp_id', $id);
        $this->db->where('tbl_standard_writing_competition_online.score !=', 0);
        $this->db->join('tbl_users', 'tbl_users.user_id =  tbl_standard_writing_competition_online.user_id', 'left');
        $this->db->order_by('score', 'DESC');
        $this->db->order_by('time_taken', 'Asc');
        $this->db->limit($count);
        //return  $this->db->get(' tbl_standard_writing_competition_online')->result_array();
        $result =  $this->db->get('tbl_standard_writing_competition_online')->result_array();
        // $usersCont = $this->db->get('tbl_standard_writing_competition_online')->num_rows();
        $first = 0;
        $second = 0;
        $third = 0;
        $fourth = 0;
        //echo json_encode($prizes_details);

        //echo json_encode($result);

        // exit();

        foreach ($prizes_details as $prize) {
            if ($prize['prize_id'] == 1) {
                $first = $prize['no_of_prize'];
            }
            if ($prize['prize_id'] == 2) {
                $sec = $prize['no_of_prize'];
                $second = $first +  $sec;
            }
            if ($prize['prize_id'] == 3) {
                $thi = $prize['no_of_prize'];
                $third =  $second +  $thi;
            }
            if ($prize['prize_id'] == 4) {
                $fou = $prize['no_of_prize'];
                $fourth =  $third +  $fou;
            }
        }

        $cnt = 1;
        $rsNew = array();
        //if($cnt <= $usersCont){}
        foreach ($result as $row) {

            if ($cnt <= $first) {
                $row['prize'] = "First Prize";
            } else if ($cnt > $first && $cnt <= $second) {
                $row['prize'] = "Second Prize";
            } else if ($cnt > $second && $cnt <= $third) {
                $row['prize'] = "Third Prize";
            } else if ($cnt > $third && $cnt <= $fourth) {
                $row['prize'] = "Concelation Prize";
            }
            $cnt++;
            array_push($rsNew, $row);
        }
        return $rsNew;
    }

    public function isExistResultDeclaration($comp_id)
    {
        $this->db->where('comp_id', $comp_id);
        return $this->db->get("tbl_standard_result_declaration")->result_array();
    }
    public function getQuizinfo($id)
    {
        $this->db->where('id', $id);
        return $quiz = $this->db->get('tbl_standards_writting_online')->row_array();
    }
    public function insertResultDesc($data)
    {
        if ($this->db->insert('tbl_standard_result_declaration', $data)) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }
    public function updateResultDeclaration($quiz_id, $data)
    {

        $this->db->where('id', $quiz_id);
        if ($this->db->update('tbl_standards_writting_online', $data)) {
            return true;
        } else {
            return false;
        }
    }
    public function getResultDeclarationList($id)
    {


        $myQuery = "SELECT distinct res.comp_id ,res.created_on AS declared_on ,comp.title, comp.start_date,comp.total_mark,comp.result_declared
        FROM  tbl_standard_result_declaration AS res INNER JOIN tbl_standards_writting_online  As comp
        ON res.comp_id = comp.id
        where res.comp_id = $id ";
        $query = $this->db->query($myQuery);
        $result = $query->result_array();
        //echo json_encode($result);exit();


        $rs = array();
        foreach ($result as $row) {
            $myQue = "SELECT id from tbl_standard_writing_competition_online  where comp_id = {$row['comp_id']} ";
            $query = $this->db->query($myQue);
            $total_submissions = $query->num_rows();
            $row['total_submissions'] = $total_submissions;

            $this->db->select('*');
            $this->db->from('tbl_standards_writting_online');
            $this->db->where('id', $row['comp_id']);
            $query = $this->db->get();

            $count = 0;
            if ($query->num_rows() > 0) {
                $comp_details = $query->row_array();
                $count =  $count + $comp_details['fprize'] + $comp_details['sprize'] + $comp_details['tprize'] + $comp_details['cprize'];
            }
            $row['total_winners'] = $count;

            array_push($rs, $row);
        }
        return $rs;
    }

    public function resultDeclarationListdata()
    {

        $myQuery = "SELECT distinct res.comp_id ,res.created_on AS declared_on ,comp.title, comp.start_date,comp.total_mark,comp.result_declared
        FROM  tbl_standard_result_declaration AS res INNER JOIN tbl_standards_writting_online  As comp
        ON res.comp_id = comp.id order by res.created_on desc";
        $query = $this->db->query($myQuery);
        $result = $query->result_array();
        //echo json_encode($result);exit();


        $rs = array();
        foreach ($result as $row) {
            $myQue = "SELECT id from tbl_standard_writing_competition_online  where comp_id = {$row['comp_id']} ";
            $query = $this->db->query($myQue);
            $total_submissions = $query->num_rows();
            $row['total_submissions'] = $total_submissions;



            $this->db->select('*');
            $this->db->from('tbl_standards_writting_online');
            $this->db->where('id', $row['comp_id']);
            $query = $this->db->get();

            $count = 0;
            if ($query->num_rows() > 0) {
                $comp_details = $query->row_array();
                $count =  $count + $comp_details['fprize'] + $comp_details['sprize'] + $comp_details['tprize'] + $comp_details['cprize'];
            }
            $row['total_winners'] = $count;

            array_push($rs, $row);
        }
        return $rs;
    }

    public function resultDeclareUser($id)
    {
        $rs = array();

        $this->db->select('tbl_standard_writing_competition_online.*,       
        tbl_standard_result_declaration.prize as userprize,
        tbl_users.user_name,
        tbl_users.email,
        tbl_users.user_mobile,
        tbl_users.member_id,
        tbl_users.stdClubMemberClass   
        ');
        $this->db->where('tbl_standard_writing_competition_online.comp_id', $id);

        $this->db->join('tbl_users', 'tbl_users.user_id = tbl_standard_writing_competition_online.user_id');
        $this->db->join('tbl_standard_result_declaration', 'tbl_standard_result_declaration.user_id = tbl_standard_writing_competition_online.user_id');
        $this->db->order_by('score', 'DESC');
        $this->db->order_by('time_taken', 'ASC');
        $rs = $this->db->get('tbl_standard_writing_competition_online')->result_array();

        //echo json_encode($rs);exit();
        return $rs;
    }

    

    /*public function resultDeclareUser($id)
    { 
        $rs = array();
              $this->db->select('tbl_quiz_submission_details.*,
       
        tbl_result_declaration.prize as userprize,
        tbl_users.user_name,tbl_users.email,tbl_users.user_mobile,tbl_users.member_id,tbl_users.stdClubMemberClass
        
        '); 
    $this->db->where('tbl_quiz_submission_details.quiz_id',$id); 
    
    $this->db->join('tbl_users','tbl_users.user_id = tbl_quiz_submission_details.user_id');
    $this->db->join('tbl_result_declaration','tbl_result_declaration.user_id = tbl_quiz_submission_details.user_id');
    $this->db->order_by('score', 'DESC'); 
    $this->db->order_by('time_taken', 'ASC');    
    $rs = $this->db->get('tbl_quiz_submission_details')->result_array(); 

    //echo json_encode($rs);exit();
    return $rs;
    }*/

    public function getStdWriCompUsers($comp_id){
        $res = array();
        $myQue = "SELECT * from tbl_standard_writing_competition_online  where comp_id = {$comp_id} AND status= 0";
        $query = $this->db->query($myQue);
        $res = $query->result_array();
        return $res;

    }
    public function  getStdWriCompUsersNew($comp_id,$new_list_cnt){
        $res = array();
        $myQue = "SELECT * from tbl_standard_writing_competition_online  where comp_id = {$comp_id} AND status= 0 limit $new_list_cnt ";
        $query = $this->db->query($myQue);
        $res = $query->result_array();
        return $res;
    }
    public function getStdWriCompUsersRemaining($comp_id,$new_list_cnt,$renaming_users){
        $myQue = "SELECT * from tbl_standard_writing_competition_online  where comp_id = {$comp_id}  limit $new_list_cnt ,$renaming_users";
        $query = $this->db->query($myQue);
        $res = $query->result_array();
        return $res;
    }
   

    /**
     * start miscellaneous
     */
    public function getMisceCompUsers($comp_id){
        $res = array();
        $myQue = "SELECT * from tbl_users_competition_attempt_record  where competiton_id = '{$comp_id}' AND status= 0";
        $query = $this->db->query($myQue);
        $res = $query->result_array();
        return $res;

    }
    public function  getMisceCompUsersNew($comp_id,$new_list_cnt){
        $res = array();
        $myQue = "SELECT * from tbl_users_competition_attempt_record  where competiton_id = '{$comp_id}' AND status= 0 limit $new_list_cnt ";
        $query = $this->db->query($myQue);
        $res = $query->result_array();
        return $res; 
    }
    public function getMisceCompUsersRemaining($comp_id,$new_list_cnt,$renaming_users){
        $myQue = "SELECT * from tbl_users_competition_attempt_record  where competiton_id = '{$comp_id}' limit $new_list_cnt ,$renaming_users";
        $query = $this->db->query($myQue);
        $res = $query->result_array();
        return $res;
    }
    public function updateMisceCompetition($id, $formdata)
    {
        $this->db->where('id', $id);
        return $this->db->update('tbl_users_competition_attempt_record', $formdata);
    }
    
    /**
     * NEW CODE END
     */

    public function StandardswrittingSave($formdata)
    {
        $this->db->insert('tbl_standards_writting_offline', $formdata);
        return $insert_id = $this->db->insert_id();
    }
    public function create_standard_list()
    {
        $this->db->where('status ', 0);
        $this->db->order_by('tbl_standards_writting_offline.id', 'DESC');
        return $this->db->get('tbl_standards_writting_offline')->result_array();
    }
    public function manage_standard_list()
    {
        $this->db->select('tbl_standards_writting_offline.*,tbl_mst_status.status_name');
        $this->db->where_not_in('status ', 0);
        $this->db->where_not_in('status ', 9);
        $this->db->join('tbl_mst_status', 'tbl_mst_status.id = tbl_standards_writting_offline.status');
        $this->db->order_by('tbl_standards_writting_offline.id', 'DESC');
        return $this->db->get('tbl_standards_writting_offline')->result_array();
    }
    public function admin_manage_standard_list()
    {
        $this->db->select('tbl_standards_writting_offline.*,tbl_mst_status.status_name');
        $this->db->where_in('status ', array(2,3,4,5,6,7,8,9)) ; 
        $this->db->join('tbl_mst_status', 'tbl_mst_status.id = tbl_standards_writting_offline.status');
        $this->db->order_by('tbl_standards_writting_offline.id', 'DESC');
        return $this->db->get('tbl_standards_writting_offline')->result_array();
    }
    public function view_standards($id)
    {
        $this->db->where('id ', $id);
        return $this->db->get("tbl_standards_writting_offline")->row_array();
    }

    public function updateStatus($formdata, $id)
    {
        $this->db->where('id', $id);
        return $this->db->update('tbl_standards_writting_offline', $formdata);
    }

    public function deleteData($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('tbl_standards_writting_offline');
    }

    public function deleteFile($id, $formdata)
    {
        $this->db->where('id', $id);
        return $this->db->update('tbl_standards_writting_offline', $formdata);
    }

    public function StandardswrittingUpdate($formdata, $id)
    {
        $this->db->where('id', $id);
        return $this->db->update('tbl_standards_writting_offline', $formdata);
    }
    public function create_standard_archive()
    {
        $this->db->select('tbl_standards_writting_offline.*,tbl_mst_status.status_name');
        $this->db->where('status ', 9);
        $this->db->join('tbl_mst_status', 'tbl_mst_status.id = tbl_standards_writting_offline.status');
        return $this->db->get('tbl_standards_writting_offline')->result_array();
    }

    public function approved_standard_list()
    {
        $this->db->select('tbl_standards_writting_offline.*,tbl_mst_status.status_name');
        $this->db->where('status ', 3);
        $this->db->join('tbl_mst_status', 'tbl_mst_status.id = tbl_standards_writting_offline.status');
        $this->db->order_by('tbl_standards_writting_offline.id', 'DESC');
        return $this->db->get('tbl_standards_writting_offline')->result_array();
    }

    // online part

    public function insertStandardsWrittingOnline($formdata)
    {
        $this->db->insert('tbl_standards_writting_online', $formdata);
        return $insert_id = $this->db->insert_id();
    }

    public function create_online_list()
    {
        $this->db->select('tbl_standards_writting_online.*,tbl_mst_status.status_name,tbl_mst_quiz_availability.title as availability,tbl_mst_quiz_level.title as level');
        $this->db->where('status ', 10);
        $this->db->join('tbl_mst_status', 'tbl_mst_status.id = tbl_standards_writting_online.status');
        $this->db->join('tbl_mst_quiz_level', 'tbl_mst_quiz_level.id = tbl_standards_writting_online.quiz_level_id');
        $this->db->join('tbl_mst_quiz_availability', 'tbl_mst_quiz_availability.id = tbl_standards_writting_online.availability_id');
        $this->db->order_by('tbl_standards_writting_online.id', 'DESC');
        return $this->db->get('tbl_standards_writting_online')->result_array();
    }

    public function updateOnlineStatus($formdata, $id)
    {
        $this->db->where('id', $id);
        return $this->db->update('tbl_standards_writting_online', $formdata);
    }

    public function deleteOnlineData($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('tbl_standards_writting_online');
    }
public function getAllManageQuiz()
    { 

    }
    public function Manage_online_list()
    { 


        $t=time();
        $current_time = (date("H:i:s",$t));
        $rs = array();

        $this->db->select('tbl_standards_writting_online.*,tbl_mst_status.status_name,tbl_mst_quiz_availability.title as availability,tbl_mst_quiz_level.title as level');
        $this->db->where_in('tbl_standards_writting_online.status',array(2,3,4,5,6,1));
        $this->db->join('tbl_mst_status', 'tbl_mst_status.id = tbl_standards_writting_online.status');
        $this->db->join('tbl_mst_quiz_level', 'tbl_mst_quiz_level.id = tbl_standards_writting_online.quiz_level_id');
        $this->db->join('tbl_mst_quiz_availability', 'tbl_mst_quiz_availability.id = tbl_standards_writting_online.availability_id');
        $this->db->where('tbl_standards_writting_online.end_date >=' ,date("Y-m-d")); 
        $this->db->order_by('tbl_standards_writting_online.id','desc');
        $res = $this->db->get('tbl_standards_writting_online')->result_array(); 
            foreach($res as $row){
               if($row['end_date'] == date("Y-m-d") ){
                    if($row['end_time'] >= $current_time){
                        array_push($rs,$row);
                    }
                }else{
                    array_push($rs,$row);
                }
            }
            return $rs;



            
        // $this->db->select('tbl_standards_writting_online.*,tbl_mst_status.status_name,tbl_mst_quiz_availability.title as availability,tbl_mst_quiz_level.title as level');
        // $this->db->where_not_in('status ', 7);
        // $this->db->where_not_in('status ', 8);
        // $this->db->where_not_in('status ', 9);
        // $this->db->where_not_in('status ', 10);
        // $this->db->join('tbl_mst_status', 'tbl_mst_status.id = tbl_standards_writting_online.status');
        // $this->db->join('tbl_mst_quiz_level', 'tbl_mst_quiz_level.id = tbl_standards_writting_online.quiz_level_id');
        // $this->db->join('tbl_mst_quiz_availability', 'tbl_mst_quiz_availability.id = tbl_standards_writting_online.availability_id');
        // $this->db->order_by('tbl_standards_writting_online.id', 'DESC');
        // return $this->db->get('tbl_standards_writting_online')->result_array();
    }

     

    public function admin_manage_online_list()
    { 
        $this->db->select('tbl_standards_writting_online.*,tbl_mst_status.status_name,tbl_mst_quiz_availability.title as availability,tbl_mst_quiz_level.title as level');  
         
         $this->db->where_in('status', array(2,3,4,5,6));    
        $this->db->join('tbl_mst_status','tbl_mst_status.id = tbl_standards_writting_online.status'); 
        $this->db->join('tbl_mst_quiz_level','tbl_mst_quiz_level.id = tbl_standards_writting_online.quiz_level_id'); 
        $this->db->join('tbl_mst_quiz_availability','tbl_mst_quiz_availability.id = tbl_standards_writting_online.availability_id'); 
        $this->db->order_by('tbl_standards_writting_online.id', 'DESC');
        
        return $this->db->get('tbl_standards_writting_online')->result_array(); 
    } 

    public function create_online_view($id)
    {
        $this->db->select('tbl_standards_writting_online.*,
            tbl_mst_status.status_name,
            tbl_mst_quiz_availability.title as availability,
            tbl_mst_quiz_level.title as level,
            tbl_mst_regions.uvc_region_title as region,
             tbl_mst_branch.uvc_department_name as branch,
             tbl_mst_states.state_name as state,

            ');
        $this->db->where('tbl_standards_writting_online.id ', $id);
        $this->db->join('tbl_mst_status', 'tbl_mst_status.id = tbl_standards_writting_online.status');



        $this->db->join('tbl_mst_regions', 'tbl_mst_regions.pki_region_id = tbl_standards_writting_online.region_id', 'left');
        $this->db->join('tbl_mst_branch', 'tbl_mst_branch.pki_id= tbl_standards_writting_online.branch_id', 'left');
        $this->db->join('tbl_mst_states', 'tbl_mst_states.state_id= tbl_standards_writting_online.state_id', 'left');



        $this->db->join('tbl_mst_quiz_level', 'tbl_mst_quiz_level.id = tbl_standards_writting_online.quiz_level_id');
        $this->db->join('tbl_mst_quiz_availability', 'tbl_mst_quiz_availability.id = tbl_standards_writting_online.availability_id');
        return $this->db->get('tbl_standards_writting_online')->row_array();
    }
    public function create_online_archive()
    {
        $this->db->select('tbl_standards_writting_online.*,tbl_mst_status.status_name,tbl_mst_quiz_availability.title as availability,tbl_mst_quiz_level.title as level');
        $this->db->where('status ', 9);
        $this->db->join('tbl_mst_status', 'tbl_mst_status.id = tbl_standards_writting_online.status');
        $this->db->join('tbl_mst_quiz_level', 'tbl_mst_quiz_level.id = tbl_standards_writting_online.quiz_level_id');
        $this->db->join('tbl_mst_quiz_availability', 'tbl_mst_quiz_availability.id = tbl_standards_writting_online.availability_id');
        return $this->db->get('tbl_standards_writting_online')->result_array();
    }


    public function deleteOnlineFile($id, $formdata)
    {
        $this->db->where('id', $id);
        return $this->db->update('tbl_standards_writting_online', $formdata);
    }

    public function updateStandardsWrittingOnline($id, $formdata)
    {
        $this->db->where('id', $id);
        return $this->db->update('tbl_standards_writting_online', $formdata);
    }

    public function getPublishedOnlineCompitation()
    {
        $t = time();
        $current_time = (date("H:i:s", $t));
        $this->db->select('tbl_standards_writting_online.*,tbl_mst_status.status_name,tbl_mst_quiz_availability.title as availability,tbl_mst_quiz_level.title as level');
        $this->db->from('tbl_standards_writting_online');
        $this->db->where('status ', 5);
        $this->db->where('end_date >=', date("Y-m-d"));
        // $this->db->where('start_date <=', date("Y-m-d"));
        $this->db->join('tbl_mst_status', 'tbl_mst_status.id = tbl_standards_writting_online.status');
        $this->db->join('tbl_mst_quiz_level', 'tbl_mst_quiz_level.id = tbl_standards_writting_online.quiz_level_id');
        $this->db->join('tbl_mst_quiz_availability', 'tbl_mst_quiz_availability.id = tbl_standards_writting_online.availability_id');
        // $query = $this->db->get('tbl_standards_writting_online')->result_array();
       // $this->db->limit(4);

            // $rs = array();
            // $query = $this->db->get();
            // if ($query->num_rows() > 0) {
            //     $rs = $query->result_array();
            // }
            // return $rs;
            $res = array();
            $rs = array();
            $query=$this->db->get();
            // echo $query->num_rows();
            // exit();
            if($query->num_rows() > 0){
                $res = $query->result_array();

                //echo json_encode($res);exit();
                foreach($res as $row){
                    if(($row['start_date'] == date("Y-m-d") &&  $row['end_date'] == date("Y-m-d")) ){
                        // if(($row['start_time'] >= $current_time) && ($row['end_time'] >= $current_time) ){
                        //     array_push($rs,$row);
                        // }
                        if(($row['end_time'] >= $current_time) ){
                            array_push($rs,$row);
                        }
                    }
                    if(($row['start_date'] == date("Y-m-d") ) &&  $row['end_date'] > date("Y-m-d")){
                        // if($row['start_time'] <= $current_time){
                            array_push($rs,$row);
                       // }
                    }
                    if(($row['start_date'] < date("Y-m-d") ) && ($row['end_date'] > date("Y-m-d") )){
                       
                            array_push($rs,$row);
                        
                    }
                    if(($row['start_date'] < date("Y-m-d") ) && ($row['end_date'] == date("Y-m-d") )){
                        if($row['end_time'] >= $current_time){
                            array_push($rs,$row);
                        }
                    }
                    if(($row['start_date'] > date("Y-m-d") ) && ($row['end_date'] > date("Y-m-d") )){
                      
                        array_push($rs,$row);
                    
                }
                    // else{
                    //     array_push($rs,$row);
                    // }
                }
            }
            $res = array();
            if(count($rs) > 4){
                array_push($res,$rs[0]);
                array_push($res,$rs[1]);
                array_push($res,$rs[2]);
                array_push($res,$rs[3]);
                return $res;  
            }else {
                return $rs;
            }
            
            
        }
    public function StandardswrittingCompSave($formdata)
    {
        $this->db->insert('tbl_standard_writing_competition_online', $formdata);
        return $insert_id = $this->db->insert_id();
    }

    public function ongoing_online_list()
    {
        $t = time();
        $current_time = (date("H:i:s", $t));
        $this->db->select('tbl_standards_writting_online.*,tbl_mst_status.status_name,tbl_mst_quiz_availability.title as availability,tbl_mst_quiz_level.title as level');
        $this->db->where('status ', 5);
        $this->db->where('end_date >=', date("Y-m-d"));
        $this->db->where('start_date <=', date("Y-m-d"));
        $this->db->join('tbl_mst_status', 'tbl_mst_status.id = tbl_standards_writting_online.status');
        $this->db->join('tbl_mst_quiz_level', 'tbl_mst_quiz_level.id = tbl_standards_writting_online.quiz_level_id');
        $this->db->join('tbl_mst_quiz_availability', 'tbl_mst_quiz_availability.id = tbl_standards_writting_online.availability_id');
        $this->db->order_by('tbl_standards_writting_online.id', 'DESC');
        $query = $this->db->get('tbl_standards_writting_online')->result_array();
        $rs = array();
        if (!(empty($query))) {
            foreach ($query as $row) {
                if (($row['start_date'] == date("Y-m-d") &&  $row['end_date'] == date("Y-m-d"))) {
                    if (($row['start_time'] <= $current_time) && ($row['end_time'] >= $current_time)) {
                        array_push($rs, $row);
                    }
                } else if (($row['start_date'] == date("Y-m-d")) &&  $row['end_date'] > date("Y-m-d")) {
                    if ($row['start_time'] <= $current_time) {
                        array_push($rs, $row);
                    }
                } else if (($row['start_date'] < date("Y-m-d")) && ($row['end_date'] == date("Y-m-d"))) {
                    if ($row['end_time'] >= $current_time) {
                        array_push($rs, $row);
                    }
                } else {
                    array_push($rs, $row);
                }
            }
        }
        return $rs;
    }

    public function getSubmissionOnline($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_standard_writing_competition_online');
        $this->db->where('comp_id', $id);
        $query = $this->db->get();
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


    public function submission_view($comp_id)
    {
        $this->db->select('tbl_standard_writing_competition_online.*,tbl_users.user_mobile,tbl_users.email,tbl_users.user_name,tbl_users.stdClubMemberClass,tbl_users.member_id');
        $this->db->from('tbl_standard_writing_competition_online');
        $this->db->join('tbl_users tbl_users', 'tbl_users.user_id=tbl_standard_writing_competition_online.user_id');
        $this->db->where('tbl_standard_writing_competition_online.comp_id', $comp_id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function closed_standard_list()
    {
        $t = time();

        $current_time = (date("H:i:s", $t));
        $this->db->select('tbl_standards_writting_online.*,tbl_mst_status.status_name,tbl_mst_quiz_availability.title as availability,tbl_mst_quiz_level.title as level');
        $this->db->join('tbl_mst_status', 'tbl_mst_status.id = tbl_standards_writting_online.status');
        $this->db->join('tbl_mst_quiz_level', 'tbl_mst_quiz_level.id = tbl_standards_writting_online.quiz_level_id');
        $this->db->join('tbl_mst_quiz_availability', 'tbl_mst_quiz_availability.id = tbl_standards_writting_online.availability_id');
        $this->db->where('tbl_standards_writting_online.status', 5);
        $this->db->where('tbl_standards_writting_online.end_date <=', date("Y-m-d"));
        $this->db->order_by('tbl_standards_writting_online.id', 'DESC');
        $res = array();
        $rs = array();
        $query = $this->db->get('tbl_standards_writting_online');
        if ($query->num_rows() > 0) {
            $res = $query->result_array();
            foreach ($res as $row) {
                if (($row['start_date'] == date("Y-m-d") &&  $row['end_date'] == date("Y-m-d"))) {
                    if (($row['start_time'] <= $current_time) && ($row['end_time'] <= $current_time)) {
                        array_push($rs, $row);
                    }
                } else if (($row['start_date'] == date("Y-m-d")) &&  $row['end_date'] > date("Y-m-d")) {
                    if ($row['start_time'] <= $current_time) {
                        array_push($rs, $row);
                    }
                } else if (($row['start_date'] < date("Y-m-d")) && ($row['end_date'] == date("Y-m-d"))) {
                    if ($row['end_time'] <= $current_time) {
                        array_push($rs, $row);
                    }
                } else {
                    array_push($rs, $row);
                }
            }
        }
        return $rs;
    }

    public function revised_standard_list()
    {
        $this->db->select('tbl_standards_writting_online.*,tbl_mst_status.status_name,tbl_mst_quiz_availability.title as availability,tbl_mst_quiz_level.title as level');
        $this->db->where('review_status ', 1);
        $this->db->join('tbl_mst_status', 'tbl_mst_status.id = tbl_standards_writting_online.status');
        $this->db->join('tbl_mst_quiz_level', 'tbl_mst_quiz_level.id = tbl_standards_writting_online.quiz_level_id');
        $this->db->join('tbl_mst_quiz_availability', 'tbl_mst_quiz_availability.id = tbl_standards_writting_online.availability_id');
        return $this->db->get('tbl_standards_writting_online')->result_array();
    }

    public function standard_submission_competition($id)
    {
        $this->db->select('tbl_standards_writting_online.*,
             admin.name,
             users.member_id,users.StdClubMemberClass,
             submit.id as submission_id,submit.score,submit.sssign_date,submit.status as assignStatus,

            tbl_mst_status.status_name,tbl_mst_quiz_availability.title as availability,tbl_mst_quiz_level.title as level');
        $this->db->where('tbl_standards_writting_online.id ', $id);
        $this->db->join('tbl_standard_writing_competition_online submit', 'submit.comp_id = tbl_standards_writting_online.id');

        $this->db->join('tbl_mst_status', 'tbl_mst_status.id = tbl_standards_writting_online.status');
        $this->db->join('tbl_admin admin', 'admin.id = submit.evaluator_id','left');
        $this->db->join('tbl_users users', 'users.user_id = submit.user_id','left');
        $this->db->join('tbl_mst_quiz_level', 'tbl_mst_quiz_level.id = tbl_standards_writting_online.quiz_level_id');
        $this->db->join('tbl_mst_quiz_availability', 'tbl_mst_quiz_availability.id = tbl_standards_writting_online.availability_id');
        return $this->db->get('tbl_standards_writting_online')->result_array();
    }

    public function standard_submission_view($id)
    {
        $this->db->select('tbl_standard_writing_competition_online.*,tbl_users.user_mobile,tbl_users.email,tbl_users.user_name,tbl_users.member_id,tbl_users.stdClubMemberClass');
        $this->db->from('tbl_standard_writing_competition_online');
        $this->db->join('tbl_users tbl_users', 'tbl_users.user_id=tbl_standard_writing_competition_online.user_id');
        $this->db->where('tbl_standard_writing_competition_online.id', $id);
        $query = $this->db->get();
        return $query->row_array();
    }


    public function task_recevied_list($evaluator_id)
    {
        $this->db->select('tbl_standard_writing_competition_online.*, 
            tbl_standards_writting_online.comp_id as competetion_id,
            tbl_standards_writting_online.title,
            tbl_standards_writting_online.total_mark,
            tbl_mst_quiz_availability.title as avail,
            ');
        $this->db->from('tbl_standard_writing_competition_online');
        $this->db->join('tbl_standards_writting_online', 'tbl_standards_writting_online.id= tbl_standard_writing_competition_online.comp_id');

        $this->db->join('tbl_mst_quiz_availability', 'tbl_mst_quiz_availability.id= tbl_standards_writting_online.availability_id');

        $this->db->where('tbl_standard_writing_competition_online.evaluator_id', $evaluator_id);
        $this->db->where('tbl_standard_writing_competition_online.status', 1);

        $query = $this->db->get();
        return $query->result_array();
    }

    public function task_reviewed($evaluator_id)
    {
        $this->db->select('tbl_standard_writing_competition_online.*, 
            tbl_standards_writting_online.comp_id as competetion_id,
            tbl_standards_writting_online.title,
            tbl_standards_writting_online.total_mark,
            tbl_mst_quiz_availability.title as avail,
            ');
        $this->db->from('tbl_standard_writing_competition_online');
        $this->db->join('tbl_standards_writting_online', 'tbl_standards_writting_online.id= tbl_standard_writing_competition_online.comp_id');

        $this->db->join('tbl_mst_quiz_availability', 'tbl_mst_quiz_availability.id= tbl_standards_writting_online.availability_id');

        $this->db->where('tbl_standard_writing_competition_online.evaluator_id', $evaluator_id);
        $this->db->where('tbl_standard_writing_competition_online.status', 2);
        $query = $this->db->get();
        return $query->result_array();
    }


    public function task_recevied_reviewed($id)
    {
        $this->db->select('tbl_standard_writing_competition_online.*,
            tbl_standards_writting_online.title,
            tbl_standards_writting_online.comp_id as comp,
            tbl_standards_writting_online.standard,
            tbl_standards_writting_online.total_mark');
        $this->db->from('tbl_standard_writing_competition_online');
        $this->db->join('tbl_standards_writting_online', 'tbl_standards_writting_online.id =tbl_standard_writing_competition_online.comp_id');
        $this->db->where('tbl_standard_writing_competition_online.id', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function getEvaluator()
    {
        $this->db->where('designation ', 4);
        return $this->db->get('tbl_admin')->result_array();
    }

    public function updateCompetition($id, $formdata)
    {
        $this->db->where('id', $id);
        return $this->db->update('tbl_standard_writing_competition_online', $formdata);
    }

    public function task_reviewed_list($comp_id)
    {
        $this->db->select('tbl_standard_writing_competition_online.*,tbl_users.user_mobile,tbl_users.email,tbl_users.user_name');
        $this->db->from('tbl_standard_writing_competition_online');
        $this->db->join('tbl_users tbl_users', 'tbl_users.user_id=tbl_standard_writing_competition_online.user_id');
        $this->db->where('tbl_standard_writing_competition_online.comp_id', $comp_id);
        $this->db->where('tbl_standard_writing_competition_online.status', 2);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function checkAttemptCompetitionOnline($user_id,$comp_id)
    {
        $this->db->where('user_id ', $user_id);
        $this->db->where('comp_id ', $comp_id);
        return $this->db->get('tbl_standard_writing_competition_online')->result_array();
    }
}
