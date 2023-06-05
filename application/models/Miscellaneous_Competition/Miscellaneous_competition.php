<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Miscellaneous_competition extends CI_Model {

    public function insertCompetition($data)
    {
        if($this->db->insert('tbl_mst_competition_detail',$data)){
			return $this->db->insert_id();
		}else{
			return false;
		}
        
    }
    public function getCompId($id){
        $this->db->select('comp_id');
        $this->db->from('tbl_mst_competition_detail');
        $this->db->where('id',$id);
        $query=$this->db->get();
        $result=$query->result_array();
        return $result[0];
    }
    public function delete_comp($data){
        $this->db->delete('tbl_mst_competition_detail',['comp_id'=>$data['comp_id']]);
        $this->db->delete('tbl_mst_competition_prize',['competitionn_id'=>$data['comp_id']]);
        return true;
    }

    public function insertCompPrizes($data){
        if($this->db->insert('tbl_mst_competition_prize',$data)){
			return $this->db->insert_id();
		}else{
			return false;
		}
    }
    public function getCompetition($id){
        //echo $id; die;
        $this->db->select('tmcd.*,tms.status_name,tmql.title,tmql.title,tmqa.title as avai_for,tmct.comp_type_name');
        $this->db->from('tbl_mst_competition_detail tmcd');
        $this->db->join('tbl_mst_status tms','tms.id=tmcd.status','left');
        //$this->db->join('tbl_mst_quiz_level tmql','tmql.id=tmcd.comp_level');
        $this->db->join('tbl_mst_quiz_level tmql','tmql.id=tmcd.comp_level');
        $this->db->join('tbl_mst_quiz_availability tmqa','tmqa.id=tmcd.available_for');
        $this->db->join('tbl_mst_competition_type tmct','tmct.id=tmcd.type');

        $this->db->where('tmcd.status',$id);
        $query=$this->db->get();
        return $query->result_array();


       // return $this->db->get("tbl_que_bank")->where('status',$id)->result_array();
    }
    public function update_status($data){

        if($this->db->where('comp_id',$data['comp_id'])){
            $this->db->update('tbl_mst_competition_detail',$data);
            return true;
        }else{
            return false;
        }
    }
    public function manageCompetition(){
        $this->db->select('tbl_mst_competition_detail.*,tbl_mst_status.status_name,tmql.title,tmqa.title as avai_for,tmct.comp_type_name'); 
        $this->db->join('tbl_mst_status','tbl_mst_status.id = tbl_mst_competition_detail.status'); 
        $this->db->where_in('tbl_mst_competition_detail.status',array(2,3,4,5,6,1));
        $this->db->join('tbl_mst_quiz_level tmql','tmql.id=tbl_mst_competition_detail.comp_level');
        $this->db->join('tbl_mst_quiz_availability tmqa','tmqa.id=tbl_mst_competition_detail.available_for');
        $this->db->join('tbl_mst_competition_type tmct','tmct.id=tbl_mst_competition_detail.type');
        $this->db->order_by('created_on','desc');

       // $this->db->where('tbl_mst_competition_detail.start_date >=' ,date("Y-m-d")); 
        return $this->db->get('tbl_mst_competition_detail')->result_array();
    }
    public function closedCompetition(){
        $t = time();

        $current_time = (date("H:i:s", $t));
        $this->db->select('tbl_mst_competition_detail.*,tbl_mst_status.status_name'); 
        $this->db->join('tbl_mst_status','tbl_mst_status.id = tbl_mst_competition_detail.status'); 
        $this->db->where_in('tbl_mst_competition_detail.status',array(2,3,4,5,6,1));

      //  $this->db->where('tbl_mst_competition_detail.end_date <' ,date("Y-m-d")); 
       $this->db->where('tbl_mst_competition_detail.end_date <=' ,date("Y-m-d")); 
      // $this->db->where('tbl_mst_competition_detail.end_time <=' ,date("H:i:s"));
       // return $this->db->get('tbl_mst_competition_detail')->result_array();
        $res = array();
        $rs = array();
        $query=$this->db->get('tbl_mst_competition_detail');
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
    public function ongoingCompetition(){
        $t = time();

        $current_time = (date("H:i:s", $t));
       // $this->db->select('tbl_mst_competition_detail.*'); 
       $this->db->select('tbl_mst_competition_detail.*,tbl_mst_status.status_name,tmql.title,tmqa.title as avai_for,tmct.comp_type_name'); 
        //  $this->db->select('COUNT(tbl_users_competition_attempt_record.id) as total_submission,tbl_mst_competition_detail.*,tbl_mst_status.status_name,tmql.title,tmqa.title as avai_for,tmct.comp_type_name'); 
         $this->db->join('tbl_mst_status','tbl_mst_status.id = tbl_mst_competition_detail.status'); 
       //  $this->db->join('tbl_users_competition_attempt_record','tbl_users_competition_attempt_record.competiton_id=tbl_mst_competition_detail.comp_id','left');
        $this->db->join('tbl_mst_quiz_level tmql','tmql.id=tbl_mst_competition_detail.comp_level','left');
        $this->db->join('tbl_mst_quiz_availability tmqa','tmqa.id=tbl_mst_competition_detail.available_for','left');
        $this->db->join('tbl_mst_competition_type tmct','tmct.id=tbl_mst_competition_detail.type','left');
        $this->db->where('tbl_mst_competition_detail.status','5');
        $this->db->where('tbl_mst_competition_detail.end_date >=' ,date("Y-m-d")); 
     //  $this->db->where('tbl_mst_competition_detail.end_time >=' ,date("H:i:s")); 
       $this->db->where('tbl_mst_competition_detail.start_date <=' ,date("Y-m-d")); 
    //   $this->db->where('tbl_mst_competition_detail.start_time <=' ,date("H:i:s"));
        $query= $this->db->get('tbl_mst_competition_detail')->result_array();
         // $res = $query->result_array();
      //  print_r($query); die;
     // $this->db->get('tbl_mst_competition_detail');
      $res = array();
      $rs = array();
     // $query=$this->db->get('tbl_mst_competition_detail');
      if(!(empty($query))){
        //  $res = $query->result_array();
          foreach($query as $row){
         //   echo $row['start_time']; die;
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
    public function viewCompetition($id){
        $this->db->select('tbl_mst_competition_detail.*,tbl_mst_status.status_name,tbl_mst_competition_prize.*,tbl_mst_quiz_level.title'); 
        $this->db->join('tbl_mst_status','tbl_mst_status.id = tbl_mst_competition_detail.status','left'); 
        $this->db->join('tbl_mst_competition_prize','tbl_mst_competition_prize.competitionn_id = tbl_mst_competition_detail.comp_id'); 
        $this->db->join('tbl_mst_quiz_level','tbl_mst_quiz_level.id=tbl_mst_competition_detail.comp_level');
        $this->db->where('tbl_mst_competition_detail.id',$id);
        $result= $this->db->get('tbl_mst_competition_detail')->result_array();
        return $result['0'];
    }
    public function viewCompetition2($id){
        $this->db->select('tbl_mst_competition_detail.*,tbl_mst_status.status_name,tbl_mst_competition_prize.*,tbl_mst_quiz_level.title,tbl_mst_branch.uvc_department_name,tbl_mst_regions.uvc_region_title,tbl_mst_states.state_name'); 
        $this->db->join('tbl_mst_status','tbl_mst_status.id = tbl_mst_competition_detail.status','left'); 
        $this->db->join('tbl_mst_competition_prize','tbl_mst_competition_prize.competitionn_id = tbl_mst_competition_detail.comp_id'); 
        $this->db->join('tbl_mst_quiz_level','tbl_mst_quiz_level.id=tbl_mst_competition_detail.comp_level');
        $this->db->join('tbl_mst_branch','tbl_mst_branch.pki_id = tbl_mst_competition_detail.branch','left');
        $this->db->join('tbl_mst_regions','tbl_mst_regions.pki_region_id = tbl_mst_competition_detail.region','left');
        $this->db->join('tbl_mst_states','tbl_mst_states.state_id_lgd = tbl_mst_competition_detail.state','left');
        $this->db->where('tbl_mst_competition_detail.comp_id',$id);
        $result= $this->db->get('tbl_mst_competition_detail')->result_array();
        return $result['0'];
    }
    public function viewCompetition1($id){
        $this->db->select('tbl_mst_competition_detail.*,tbl_mst_competition_prize.*'); 
        //$this->db->join('tbl_mst_status','tbl_mst_status.id = tbl_mst_competition_detail.status'); 
        $this->db->join('tbl_mst_competition_prize','tbl_mst_competition_prize.competitionn_id = tbl_mst_competition_detail.id'); 
        $this->db->where('tbl_mst_competition_detail.id',$id);
        $result= $this->db->get('tbl_mst_competition_detail')->result_array();
        return $result[0];
    }
    public function getPublishedComp($limit,$type){
        $t = time();

        $current_time = (date("H:i:s", $t));
        $this->db->select('tbl_mst_competition_detail.*,tbl_mst_status.status_name,tbl_mst_competition_prize.*'); 
        $this->db->join('tbl_mst_status','tbl_mst_status.id = tbl_mst_competition_detail.status'); 
        $this->db->join('tbl_mst_competition_prize','tbl_mst_competition_prize.competitionn_id=tbl_mst_competition_detail.comp_id');
        $this->db->where_in('tbl_mst_competition_detail.status','5');
        $this->db->where('tbl_mst_competition_detail.end_date >=' ,date("Y-m-d")); 
    //   $this->db->where('tbl_mst_competition_detail.end_time >=' ,date("H:i:s")); 
       $this->db->where('tbl_mst_competition_detail.start_date <=' ,date("Y-m-d")); 
     ///  $this->db->where('tbl_mst_competition_detail.start_time <=' ,date("H:i:s")); 
       $this->db->where_in('tbl_mst_competition_detail.type',$type);
       $this->db->limit($limit);
     //   return $this->db->get('tbl_mst_competition_detail')->result_array();

        $res = array();
        $rs = array();
        $query=$this->db->get('tbl_mst_competition_detail');
        if($query->num_rows() > 0){
            $res = $query->result_array();
            foreach($res as $row){
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

    public function submitCompResponse($data){
       // print_r($data); die;
        if($this->db->insert('tbl_users_competition_attempt_record',$data)){
			return $this->db->insert_id();
		}else{
			return false;
		}
    }

    public function ckeckCompAttempt($data){
       // print_r($data); die;
        $this->db->select('*');
        $this->db->from('tbl_users_competition_attempt_record');
        $this->db->where('competiton_id',$data['competiton_id']);
        $this->db->where('user_id',$data['user_id']);
        $query=$this->db->get();
        return $query->result_array();
    }
    public function ongoingCompetitionSubmission($comp_id){
        $this->db->select('tucar.*,tu.user_mobile,tu.email,tu.user_name,tmcd.competiton_name');
        $this->db->from('tbl_users_competition_attempt_record tucar');
        $this->db->join('tbl_users tu','tu.user_id=tucar.user_id');
        $this->db->join('tbl_mst_competition_detail tmcd','tmcd.id=tucar.competiton_id');
        $this->db->where('competiton_id',$comp_id);        
        $query=$this->db->get();
        return $query->result_array(); 

    //     $this->db->select('tbl_mst_competition_detail.*,tbl_mst_status.status_name,tbl_mst_competition_prize.*'); 
    //     $this->db->join('tbl_mst_status','tbl_mst_status.id = tbl_mst_competition_detail.status'); 
    //     $this->db->join('tbl_mst_competition_prize','tbl_mst_competition_prize.competitionn_id = tbl_mst_competition_detail.id');
    //     $this->db->where_in('tbl_mst_competition_detail.status','5');
    //    $this->db->where('tbl_mst_competition_detail.end_date >=' ,date("Y-m-d")); 
    //    $this->db->limit($limit);
    //     return $this->db->get('tbl_mst_competition_detail')->result_array();

      //  $this->db->select('tbl_users_competition_attempt_record.*');
       // $this->db->join('tbl_users','tbl_users.user_id = tbl_users_competition_attempt_record.user_id');
        // $this->db->where('tbl_users_competition_attempt_record.competiton_id',$comp_id); 
        // $query=$this->db->get();
        // return $query->result_array(); 

    }
    public function updateCompetition($data)
    {
        // print_r($data); die;
        $this->db->where('comp_id',$data['comp_id']);
        if($this->db->update('tbl_mst_competition_detail',$data)){
			return true;
		}else{
			return false;
		}
        
    }
    public function UpdateCompPrizes($data){
        $this->db->where('competitionn_id',$data['competitionn_id']);
        if($this->db->update('tbl_mst_competition_prize',$data)){
			return true;
		}else{
			return false;
		}
    }
    public function ckeckCompAttemptByUser($data){        
         $this->db->select('tucar.*,tmcd.competiton_name');
         $this->db->from('tbl_users_competition_attempt_record tucar');
         $this->db->join('tbl_mst_competition_detail tmcd','tmcd.comp_id=tucar.competiton_id','left');
        // $this->db->where('competiton_id',$data['competiton_id']);
         $this->db->where('tucar.user_id',$data);
         $query=$this->db->get();
         return $query->result_array();
     }
     public function SubmittedCompetition($comp_id){
        $this->db->select('tucar.*,tu.user_mobile,tu.email,tu.user_name,tu.StdClubMemberClass,tmcd.competiton_name,tmqa.title as avai_for,tmcd.score as total_marks,tmcd.comp_id');
        $this->db->from('tbl_users_competition_attempt_record tucar');
        $this->db->join('tbl_users tu','tu.user_id=tucar.user_id');
        $this->db->join('tbl_mst_competition_detail tmcd','tmcd.comp_id=tucar.competiton_id');
        $this->db->join('tbl_mst_quiz_availability tmqa','tmqa.id=tmcd.available_for');
        $this->db->where('tucar.competiton_id',$comp_id);        
        $query=$this->db->get();
        return $query->result_array(); 
     }
     public function SubmittedCompetition1($comp_id){
        $this->db->select('tucar.user_id,tucar.competiton_id,tucar.score,tucar.status,tucar.id,tu.user_mobile,tu.email,tu.user_name,tmcd.competiton_name,tmqa.title as avai_for,tmcd.score as total_marks,tmcd.comp_id,tmcd.review_status');
        $this->db->from('tbl_users_competition_attempt_record tucar');
        $this->db->join('tbl_users tu','tu.user_id=tucar.user_id');
        $this->db->join('tbl_mst_competition_detail tmcd','tmcd.comp_id=tucar.competiton_id');
        $this->db->join('tbl_mst_quiz_availability tmqa','tmqa.id=tmcd.available_for');
        $this->db->where('tucar.competiton_id',$comp_id);        
        $query=$this->db->get();
        return $query->result_array(); 
     }
     public function SubmittedCompetition2($comp_id){
        // $this->db->select('tucar.user_id,tucar.competiton_id,tucar.score,tucar.status,tucar.id,tu.user_mobile,tu.email,tu.user_name,tmcd.competiton_name,tmqa.title as avai_for,tmcd.score as total_marks,tmcd.comp_id,tmcd.review_status,ta.name as evaluator_name,tucar.ev_assigned_on');
        $this->db->select('tucar.user_id,tucar.competiton_id,tucar.score,tucar.status,tucar.id,tmcd.competiton_name,tmcd.score as total_marks,tmcd.comp_id,tmcd.review_status,tucar.ev_assigned_on,tucar.evaluator');
        //$this->db->distinct('ta.name as evaluator_name');
        $this->db->from('tbl_users_competition_attempt_record tucar');
        // $this->db->join('tbl_users tu','tu.user_id=tucar.user_id');
        $this->db->join('tbl_mst_competition_detail tmcd','tmcd.comp_id=tucar.competiton_id');
        // $this->db->join('tbl_mst_quiz_availability tmqa','tmqa.id=tmcd.available_for');
        //   $this->db->join('tbl_admin ta','ta.user_uid=tucar.evaluator','left');
        $this->db->where('tucar.competiton_id',$comp_id);        
        // $query=$this->db->get();
        // return $query->result_array(); 

        $res = array();
        $rs = array();
        $query=$this->db->get();
                if($query->num_rows() > 0){
                    $res = $query->result_array();
                    foreach($res as $row){
                        $this->db->select('ta.name as ev_name');
                        $this->db->from('tbl_admin ta');
                        $this->db->where('ta.user_uid',$row['evaluator']);
                        $que=$this->db->get();
                        $query=$que->result_array();
                        // print_r($query[0]['ev_name']); die;
                        $row['ev_name']=$query[0]['ev_name'];
                            array_push($rs,$row);
                        
                    }
                }
                return $rs;
     }

     public function getStdClubQuize()
        {
            $t = time();

            $current_time = (date("H:i:s", $t));


            $this->db->select('COUNT(tbl_users_competition_attempt_record.id) as total_submission,tbl_mst_competition_detail.*,tbl_mst_status.status_name,tmql.title,tmqa.title as avai_for,tmct.comp_type_name'); 
           // $this->db->from('tbl_mst_competition_detail','left');
            $this->db->join('tbl_mst_status','tbl_mst_status.id = tbl_mst_competition_detail.status'); 
            $this->db->join('tbl_users_competition_attempt_record','tbl_users_competition_attempt_record.competiton_id=tbl_mst_competition_detail.comp_id','left');
            $this->db->join('tbl_mst_quiz_level tmql','tmql.id=tbl_mst_competition_detail.comp_level');
            $this->db->join('tbl_mst_quiz_availability tmqa','tmqa.id=tbl_mst_competition_detail.available_for');
            $this->db->join('tbl_mst_competition_type tmct','tmct.id=tbl_mst_competition_detail.type');
            $this->db->where('tbl_mst_competition_detail.status','5');
             
            $this->db->where('tbl_mst_competition_detail.end_date >=' ,date("Y-m-d")); 
            $this->db->where('tbl_mst_competition_detail.start_date <=' ,date("Y-m-d"));
         //  $this->db->where('tbl_mst_competition_detail.end_time >=' ,date("H:i:s")); 
           
         //  $this->db->where('tbl_mst_competition_detail.start_time <=' ,date("H:i:s"));
        // $this->db->get('tbl_mst_competition_detail')->result_array();
           
            $res = array();
                $rs = array();
                $query=$this->db->get('tbl_mst_competition_detail');
                if($query->num_rows() > 0){
                    $res = $query->result_array();
                    foreach($res as $row){
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
        public function getAllStates()
    { 
         return $this->db->get("tbl_mst_states")->result_array();
    }
    public function update_competition_status($data){
        $this->db->where('comp_id',$data['comp_id']);
        if($this->db->update('tbl_mst_competition_detail',$data)){
			return true;
		}else{
			return false;
		}
    }
    public function reviewCompetition(){
        $this->db->select('tmcd.*,tmcd.competiton_name,tmqa.title as avai_for,tmql.title');
        $this->db->from('tbl_mst_competition_detail tmcd');
        $this->db->join('tbl_mst_quiz_level tmql','tmql.id=tmcd.comp_level');
        //$this->db->join('tbl_mst_competition_detail tmcd','tmcd.comp_id=tucar.competiton_id');
        $this->db->join('tbl_mst_quiz_availability tmqa','tmqa.id=tmcd.available_for');
        $this->db->where('tmcd.review_status','1');        
        // $query=$this->db->get();
        // return $query->result_array(); 

        
        $res = array();
        $rs = array();
        $query=$this->db->get();
                if($query->num_rows() > 0){
                    $res = $query->result_array();
                    foreach($res as $row){
                        $this->db->select('tucar.*');
                        $this->db->from('tbl_users_competition_attempt_record tucar');
                        $this->db->where('tucar.competiton_id',$row['comp_id']);
                        $que=$this->db->get();
                        $query=$que->result_array();
                        // print_r($query[0]['ev_name']); die;
                        $row['total_task']=count($query);

                        $this->db->select('tucar.*');
                        $this->db->from('tbl_users_competition_attempt_record tucar');
                        $this->db->where('tucar.competiton_id',$row['comp_id']);
                        $this->db->where('tucar.status','2');
                        $que=$this->db->get();
                        $query1=$que->result_array();
                        // print_r($query[0]['ev_name']); die;
                        $row['total_task_under_review']=count($query1);

                        $this->db->select('tucar.*');
                        $this->db->from('tbl_users_competition_attempt_record tucar');
                        $this->db->where('tucar.competiton_id',$row['comp_id']);
                        $this->db->where('tucar.status','3');
                        $que=$this->db->get();
                        $query1=$que->result_array();
                        // print_r($query[0]['ev_name']); die;
                        $row['total_task_reviewed']=count($query1);


                            array_push($rs,$row);
                        
                    }
                }
                return $rs;
    }
    public function attemptResponse($id){
        $this->db->select('*')->from('tbl_users_competition_attempt_record')->where('id',$id);
        $res=$this->db->get();
      $result= $res->result_array();
      return $result[0];
    }
    public function evaluators(){
        $this->db->select('*')->from('tbl_admin')->where('designation','4');
        $res=$this->db->get();
      $result= $res->result_array();
      return $result;
    }
    public function update_evaluator($data){
        $this->db->where('user_id',$data['user_id']);
        $this->db->where('competiton_id',$data['competiton_id']);
        $res=$this->db->update('tbl_users_competition_attempt_record',$data);
        if($res){
			return true;
		}else{
			return false;
		}
    }
    public function SubmissionForReview($data){
    //    print_r($data);
    //    die;
    //     $this->db->select('tbl_mst_competition_detail.competiton_name,tbl_users_competition_attempt_record.*')->from('tbl_users_competition_attempt_record')->where('evaluator',$data);
    //     $this->db->join('tbl_mst_competition_detail','tbl_mst_competition_detail.comp_id =tbl_users_competition_attempt_record.competiton_id');
    //     $res=$this->db->get();
    //   $result= $res->result_array();
    //   return $result;

      $this->db->select('tucar.*,tmcd.competiton_name,tu.StdClubMemberClass,ta.name,tmcd.score,tucar.score as marks');
      $this->db->from('tbl_users_competition_attempt_record tucar');
      $this->db->join('tbl_mst_competition_detail tmcd','tmcd.comp_id=tucar.competiton_id');
      $this->db->join('tbl_users tu','tu.user_id=tucar.user_id');
      $this->db->join('tbl_admin ta','ta.user_uid=tucar.evaluator');
      $this->db->where('tucar.evaluator',$data);
      $res=$this->db->get();
      $result= $res->result_array();
      return $result;

    }
    public function CompSubmittedRecordDetail($id){
        $this->db->select('tucar.*,tmcd.competiton_name,tu.StdClubMemberClass,ta.name,tmcd.score,tucar.score as marks,tmcd.start_date,tmcd.end_date');
      $this->db->from('tbl_users_competition_attempt_record tucar');
      $this->db->join('tbl_mst_competition_detail tmcd','tmcd.comp_id=tucar.competiton_id');
      $this->db->join('tbl_users tu','tu.user_id=tucar.user_id');
      $this->db->join('tbl_admin ta','ta.user_uid=tucar.evaluator');
      $this->db->where('tucar.id',$id);
      $res=$this->db->get();
      $result= $res->result_array();
      return $result[0];
    }
    public function updateCompetitionScore($data){
        $this->db->where('id',$data['id']);
        //$this->db->where('competiton_id',$data['competiton_id']);
        $res=$this->db->update('tbl_users_competition_attempt_record',$data);
        if($res){
			return true;
		}else{
			return false;
		}
    }
    public function getAdminUserid($id){
        $this->db->select('user_uid');
        $this->db->from('tbl_admin');
        $this->db->where('id',$id);
        $res=$this->db->get();
       $result =$res->result_array();
        return $result['0'];
    }
    public function checkUserAvailable($quiz_id, $user_id)
        {
            $query = $this->db->query("SELECT * FROM tbl_users_competition_attempt_record WHERE user_id='$user_id' AND competiton_id='$quiz_id'");
            return $query->num_rows();
        }
    public function CompetitionReviewed(){
        $this->db->select('*');
        $this->db->from('tbl_mst_competition_detail');
        $this->db->where('review_status','3');
        $res=$this->db->get();
       $result =$res->result_array();
        return $result;
    }
}