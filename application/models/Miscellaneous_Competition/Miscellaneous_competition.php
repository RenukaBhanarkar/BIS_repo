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
        // commented for indexing below line
        // $this->db->select('tmcd.*,tms.status_name,tmql.title,tmql.title,tmqa.title as avai_for,tmct.comp_type_name');
        $this->db->select('tmcd.id,tmcd.comp_id,tmcd.competiton_name,tmcd.start_date,tmcd.end_date,tmcd.start_time,tmcd.end_time,tmcd.thumbnail,tmcd.status,tms.status_name,tmql.title,tmql.title,tmqa.title as avai_for,tmct.comp_type_name');
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
    public function manageCompetition_old_before_index(){
        $t=time();
        $current_time = (date("H:i:s",$t));

        // $this->db->select('tbl_mst_competition_detail.*,tbl_mst_status.status_name,tmql.title,tmqa.title as avai_for,tmct.comp_type_name'); //commented for indexing
        $this->db->select('tbl_mst_competition_detail.*,tbl_mst_status.status_name,tmql.title,tmqa.title as avai_for,tmct.comp_type_name');
        $this->db->join('tbl_mst_status','tbl_mst_status.id = tbl_mst_competition_detail.status'); 
        $this->db->where_in('tbl_mst_competition_detail.status',array(2,3,4,5,6,1));
        $this->db->join('tbl_mst_quiz_level tmql','tmql.id=tbl_mst_competition_detail.comp_level');
        $this->db->join('tbl_mst_quiz_availability tmqa','tmqa.id=tbl_mst_competition_detail.available_for');
        $this->db->join('tbl_mst_competition_type tmct','tmct.id=tbl_mst_competition_detail.type');
        $this->db->where('tbl_mst_competition_detail.end_date >=' ,date("Y-m-d"));
        $this->db->order_by('created_on','desc');

       // $this->db->where('tbl_mst_competition_detail.start_date >=' ,date("Y-m-d")); 
        // return $this->db->get('tbl_mst_competition_detail')->result_array();
        $rs=array();
        $res=$this->db->get('tbl_mst_competition_detail')->result_array();

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
    }
    public function manageCompetition(){
        $t=time();
        $current_time = (date("H:i:s",$t));

        // $this->db->select('tbl_mst_competition_detail.*,tbl_mst_status.status_name,tmql.title,tmqa.title as avai_for,tmct.comp_type_name'); //commented for indexing
        $this->db->select('tmcd.id,tmcd.comp_id,tmcd.competiton_name,tmcd.start_date,tmcd.end_date,tmcd.start_time,tmcd.end_time,tmcd.thumbnail,tmcd.type,tmcd.available_for,tmcd.comp_level,tmcd.status,tmcd.reject_reason,tbl_mst_status.status_name,tmql.title,tmqa.title as avai_for,tmct.comp_type_name');
        $this->db->join('tbl_mst_status','tbl_mst_status.id = tmcd.status'); 
        $this->db->where_in('tmcd.status',array(2,3,4,5,6,1));
        $this->db->join('tbl_mst_quiz_level tmql','tmql.id=tmcd.comp_level');
        $this->db->join('tbl_mst_quiz_availability tmqa','tmqa.id=tmcd.available_for');
        $this->db->join('tbl_mst_competition_type tmct','tmct.id=tmcd.type');
        $this->db->where('tmcd.end_date >=' ,date("Y-m-d"));
        $this->db->order_by('created_on','desc');

       // $this->db->where('tbl_mst_competition_detail.start_date >=' ,date("Y-m-d")); 
        // return $this->db->get('tbl_mst_competition_detail')->result_array();
        $rs=array();
        $res=$this->db->get('tbl_mst_competition_detail tmcd')->result_array();

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
    }
    public function closedCompetition(){
        $t = time();

        $current_time = (date("H:i:s", $t));
        $this->db->select('tbl_mst_competition_detail.*,tbl_mst_status.status_name'); 
        $this->db->join('tbl_mst_status','tbl_mst_status.id = tbl_mst_competition_detail.status'); 
        $this->db->where_in('tbl_mst_competition_detail.status',array(2,3,4,5,6,1));

      //  $this->db->where('tbl_mst_competition_detail.end_date <' ,date("Y-m-d")); 
       $this->db->where('tbl_mst_competition_detail.end_date <=' ,date("Y-m-d")); 
       $this->db->order_by('created_on','desc');
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
       // return $rs;  
        $abcd=array();
        // if(count($rs) > 0){
        //     foreach($rs as $list){

                
        //     }
        // }
        if(!empty($rs)){
          //  $res = $query->result_array();
            foreach($rs as $list){
                $this->db->select('tucar.*');
                $this->db->from('tbl_users_competition_attempt_record tucar');
                $this->db->where('tucar.competiton_id',$list['comp_id']);
                $que=$this->db->get();
                $query=$que->result_array();
                // print_r($query[0]['ev_name']); die;
                $list['total_task']=count($query);

                $this->db->select('tucar.*');
                $this->db->from('tbl_users_competition_attempt_record tucar');
                $this->db->where('tucar.competiton_id',$list['comp_id']);
                $this->db->where('tucar.status','2');
                $que=$this->db->get();
                $query1=$que->result_array();
                // print_r($query[0]['ev_name']); die;
                $list['total_task_under_review']=count($query1);

                $this->db->select('tucar.*');
                $this->db->from('tbl_users_competition_attempt_record tucar');
                $this->db->where('tucar.competiton_id',$list['comp_id']);
                $this->db->where('tucar.status','3');
                $que=$this->db->get();
                $query1=$que->result_array();
                // print_r($query[0]['ev_name']); die;
                $list['total_task_reviewed']=count($query1);


                    array_push($abcd,$list);
                
            }
        }
        return $abcd;
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
    $this->db->order_by('created_on','desc');
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
    public function getPublishedComp1($limit,$type){
        $t = time();

        $current_time = (date("H:i:s", $t));
        $this->db->select('tbl_mst_competition_detail.*,tbl_mst_status.status_name,tbl_mst_competition_prize.*'); 
        $this->db->join('tbl_mst_status','tbl_mst_status.id = tbl_mst_competition_detail.status'); 
        $this->db->join('tbl_mst_competition_prize','tbl_mst_competition_prize.competitionn_id=tbl_mst_competition_detail.comp_id');
        $this->db->where_in('tbl_mst_competition_detail.status','5');
        $this->db->where('tbl_mst_competition_detail.end_date >=' ,date("Y-m-d")); 
    //   $this->db->where('tbl_mst_competition_detail.end_time >=' ,date("H:i:s")); 
    //    $this->db->where('tbl_mst_competition_detail.start_date <=' ,date("Y-m-d")); 
     ///  $this->db->where('tbl_mst_competition_detail.start_time <=' ,date("H:i:s")); 
     $this->db->order_by('tbl_mst_competition_detail.created_on', 'DESC');
       $this->db->where_in('tbl_mst_competition_detail.type',$type);
       $this->db->limit($limit);
     //   return $this->db->get('tbl_mst_competition_detail')->result_array();

        $res = array();
        $rs = array();
        $query=$this->db->get('tbl_mst_competition_detail');
        if($query->num_rows() > 0){
            $res = $query->result_array();
            // foreach($res as $row){
            //     if(($row['start_date'] == date("Y-m-d") &&  $row['end_date'] == date("Y-m-d")) ){
            //         if(($row['start_time'] <= $current_time) && ($row['end_time'] >= $current_time) ){
            //             array_push($rs,$row);
            //         }
            //     }else if(($row['start_date'] == date("Y-m-d") ) &&  $row['end_date'] > date("Y-m-d")){
            //         if($row['start_time'] <= $current_time){
            //             array_push($rs,$row);
            //         }
            //     }else if(($row['start_date'] < date("Y-m-d") ) && ($row['end_date'] == date("Y-m-d") )){
            //         if($row['end_time'] >= $current_time){
            //             array_push($rs,$row);
            //         }
            //     }else{
            //         array_push($rs,$row);
            //     }
            // }
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
        $this->db->join('tbl_users tu','tu.user_id=tucar.user_id','left');
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
        $this->db->select('tucar.user_id,tucar.competiton_id,tucar.score,tucar.status as submission_status,tucar.id,tmcd.competiton_name,tmcd.score as total_marks,tmcd.comp_id,tmcd.review_status,tucar.ev_assigned_on,tucar.evaluator,admin.name');
        //$this->db->distinct('ta.name as evaluator_name');
        $this->db->from('tbl_users_competition_attempt_record tucar');
        // $this->db->join('tbl_users tu','tu.user_id=tucar.user_id');
        $this->db->join('tbl_mst_competition_detail tmcd','tmcd.comp_id=tucar.competiton_id');
        $this->db->join('tbl_admin admin','admin.id=tucar.evaluator','left');
        // $this->db->join('tbl_mst_quiz_availability tmqa','tmqa.id=tmcd.available_for');
        //   $this->db->join('tbl_admin ta','ta.user_uid=tucar.evaluator','left');
        $this->db->where('tucar.competiton_id',$comp_id);
        $this->db->where_in('tucar.status',array(0,1));
        $this->db->order_by('tucar.id','ASC');
       
        // $query=$this->db->get();
        // return $query->result_array(); 

        $res = array();
        $rs = array();
        $query=$this->db->get();
                if($query->num_rows() > 0){
                    $res = $query->result_array();
                    foreach($res as $row){
                        // $this->db->select('ta.name as ev_name');
                        // $this->db->from('tbl_admin ta');
                        // $this->db->where('ta.user_uid',$row['evaluator']);
                        // $que=$this->db->get();
                        // $query=$que->result_array();
                        // // print_r($query[0]['ev_name']); die;
                        // if(!empty($query)){
                        // $row['ev_name']=$query[0]['ev_name'];
                        // }else{
                        //     $row['ev_name']="Not Assigned";
                        // }
                            array_push($rs,$row);
                        
                    }
                }
                return $rs;
     }

     public function SubmittedAttemptsUnderReview($comp_id){
        // $this->db->select('tucar.user_id,tucar.competiton_id,tucar.score,tucar.status,tucar.id,tu.user_mobile,tu.email,tu.user_name,tmcd.competiton_name,tmqa.title as avai_for,tmcd.score as total_marks,tmcd.comp_id,tmcd.review_status,ta.name as evaluator_name,tucar.ev_assigned_on');
        $this->db->select('tucar.user_id,tucar.competiton_id,tucar.score,tucar.status as submission_status,tucar.id,tmcd.competiton_name,tmcd.score as total_marks,tmcd.comp_id,tmcd.review_status,tucar.ev_assigned_on,tucar.evaluator,admin.name');
        //$this->db->distinct('ta.name as evaluator_name');
        $this->db->from('tbl_users_competition_attempt_record tucar');
        // $this->db->join('tbl_users tu','tu.user_id=tucar.user_id');
        $this->db->join('tbl_mst_competition_detail tmcd','tmcd.comp_id=tucar.competiton_id');
        $this->db->join('tbl_admin admin','admin.id=tucar.evaluator','left');
        // $this->db->join('tbl_mst_quiz_availability tmqa','tmqa.id=tmcd.available_for');
        //   $this->db->join('tbl_admin ta','ta.user_uid=tucar.evaluator','left');
        $this->db->where('tucar.competiton_id',$comp_id);
        // $this->db->where_in('tucar.status',array(2));
        $this->db->order_by('tucar.id','ASC');
       
        // $query=$this->db->get();
        // return $query->result_array(); 

        $res = array();
        $rs = array();
        $query=$this->db->get();
                if($query->num_rows() > 0){
                    $res = $query->result_array();
                    foreach($res as $row){
                        // $this->db->select('ta.name as ev_name');
                        // $this->db->from('tbl_admin ta');
                        // $this->db->where('ta.user_uid',$row['evaluator']);
                        // $que=$this->db->get();
                        // $query=$que->result_array();
                        // // print_r($query[0]['ev_name']); die;
                        // if(!empty($query)){
                        // $row['ev_name']=$query[0]['ev_name'];
                        // }else{
                        //     $row['ev_name']="Not Assigned";
                        // }
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
        $this->db->order_by('created_on','desc');      
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
                        $this->db->where('tucar.status','1');
                        $que=$this->db->get();
                        $query1=$que->result_array();
                        // print_r($query[0]['ev_name']); die;
                        $row['total_task_under_review']=count($query1);

                        $this->db->select('tucar.*');
                        $this->db->from('tbl_users_competition_attempt_record tucar');
                        $this->db->where('tucar.competiton_id',$row['comp_id']);
                        $this->db->where('tucar.status','2');
                        $que=$this->db->get();
                        $query1=$que->result_array();
                        // print_r($query[0]['ev_name']); die;
                        $row['total_task_assigned']=count($query1);

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

    //   $this->db->select('tucar.*,tmcd.competiton_name,tu.StdClubMemberClass,ta.name,tmcd.score,tucar.score as marks');
    //   $this->db->from('tbl_users_competition_attempt_record tucar');
    //   $this->db->join('tbl_mst_competition_detail tmcd','tmcd.comp_id=tucar.competiton_id','left');
    //   $this->db->join('tbl_users tu','tu.user_id=tucar.user_id','left');
    //   $this->db->join('tbl_admin ta','ta.id=tucar.evaluator');
    //   $this->db->where('tucar.evaluator',$data);
    //  $this->db->where('tucar.status !=','3');
    //   $this->db->select('tucar.*,tmcd.competiton_name,tu.StdClubMemberClass,ta.name,tmcd.score,tucar.score as marks');
    //   $this->db->from('tbl_users_competition_attempt_record tucar');
    //   $this->db->join('tbl_mst_competition_detail tmcd','tmcd.comp_id=tucar.competiton_id','left');
    //  $this->db->join('tbl_users tu','tu.user_id=tucar.user_id','left');
    //   $this->db->join('tbl_admin ta','ta.user_uid=tucar.evaluator');
    //   $this->db->where('tucar.evaluator',$data);
    //  $this->db->where('tucar.status !=','3');

     $this->db->select('tucar.*,tucar.score as marks,tmcd.competiton_name,tu.StdClubMemberClass,ta.name,tmcd.score as total_marks');
     $this->db->from('tbl_users_competition_attempt_record tucar');
     $this->db->join('tbl_mst_competition_detail tmcd','tmcd.comp_id=tucar.competiton_id','left');
     $this->db->join('tbl_users tu','tu.user_id=tucar.user_id','left');
     $this->db->join('tbl_admin ta','ta.id=tucar.evaluator','left');
     $this->db->where('tucar.evaluator',$data);
     $this->db->where('tucar.status !=','3');
      $res=$this->db->get();
      $result= $res->result_array();
      return $result;

    }
    public function evaluatedSubmissionsByEvaluator($data){
            
          $this->db->select('tucar.*,tmcd.competiton_name,tu.StdClubMemberClass,ta.name,tmcd.score,tucar.score as marks,tucar.created_on');
          $this->db->from('tbl_users_competition_attempt_record tucar');
          $this->db->join('tbl_mst_competition_detail tmcd','tmcd.comp_id=tucar.competiton_id');
          $this->db->join('tbl_users tu','tu.user_id=tucar.user_id','left');
          $this->db->join('tbl_admin ta','ta.id=tucar.evaluator');
          $this->db->where('tucar.evaluator',$data);
          $this->db->where('tucar.status','3');
          $res=$this->db->get();
          $result= $res->result_array();
          return $result;
    
        }
    public function CompSubmittedRecordDetail($id){
        $this->db->select('tucar.*,tmcd.competiton_name,tu.StdClubMemberClass,ta.name,tmcd.score,tucar.score as marks,tmcd.start_date,tmcd.end_date');
      $this->db->from('tbl_users_competition_attempt_record tucar');
      $this->db->join('tbl_mst_competition_detail tmcd','tmcd.comp_id=tucar.competiton_id','left');
      $this->db->join('tbl_users tu','tu.user_id=tucar.user_id','left');
      $this->db->join('tbl_admin ta','ta.id=tucar.evaluator');
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
    public function addDummyCompRecord($data){
        if($this->db->insert('tbl_users_competition_attempt_record',$data)){
			// return $this->db->insert_id();
            return true;
		}else{
			return false;
		}
    }
    public function resultDeclarationList($id)
    {
        $rs = array();
        $this->db->select('*');
        $this->db->from('tbl_mst_competition_detail tmcd');
        $this->db->join('tbl_mst_competition_prize tmcp','tmcp.competitionn_id=tmcd.comp_id');
        $this->db->where('tmcd.comp_id', $id);
        $query = $this->db->get();
        // echo json_encode($query->result_array());
        // exit();
        $prizes_details = array();
        $comp_details = array();
        $count = 0;
        if ($query->num_rows() > 0) {

            $comp_details = $query->row_array();

            $count =  $count + $comp_details['fprize_no'] + $comp_details['sprize_no'] + $comp_details['tprize_no'] + $comp_details['cprize_no'];

            if ($comp_details['fprize_no'] != "" && $comp_details['fprize_no'] > 0) {
                $fprize_arr = array(
                    'prize_id' => 1,
                    'no_of_prize' => $comp_details['fprize_no']
                );
                array_push($prizes_details, $fprize_arr);
            }
            if ($comp_details['sprize_no'] != "" && $comp_details['sprize_no'] > 0) {
                $sprize_arr = array(
                    'prize_id' => 2,
                    'no_of_prize' => $comp_details['sprize_no']
                );
                array_push($prizes_details, $sprize_arr);
            }
            if ($comp_details['tprize_no'] != "" && $comp_details['tprize_no'] > 0) {
                $tprize_arr = array(
                    'prize_id' => 3,
                    'no_of_prize' => $comp_details['tprize_no']
                );
                array_push($prizes_details, $tprize_arr);
            }
            if ($comp_details['cprize_no'] != "" && $comp_details['cprize_no'] > 0) {
                $cprize_arr = array(
                    'prize_id' => 4,
                    'no_of_prize' => $comp_details['cprize_no']
                );
                array_push($prizes_details, $cprize_arr);
            }
        }
        $this->db->select('tbl_users_competition_attempt_record.*,tbl_users.*');
        $this->db->where('tbl_users_competition_attempt_record.competiton_id', $id);
        $this->db->where('tbl_users_competition_attempt_record.score !=', 0);
        $this->db->join('tbl_users', 'tbl_users.user_id =  tbl_users_competition_attempt_record.user_id', 'right');
        $this->db->order_by('tbl_users_competition_attempt_record.score', 'DESC');
        $this->db->order_by('tbl_users_competition_attempt_record.time_taken', 'Asc');
        $this->db->limit($count);
        //return  $this->db->get(' tbl_standard_writing_competition_online')->result_array();
        $result =  $this->db->get('tbl_users_competition_attempt_record')->result_array();
        // $usersCont = $this->db->get('tbl_standard_writing_competition_online')->num_rows();
        $first = 0;
        $second = 0;
        $third = 0;
        $fourth = 0;
        // echo json_encode($prizes_details);

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
        $this->db->where('quiz_id', $comp_id);
        return $this->db->get("tbl_comp_result_declaration")->result_array();
    }
    public function getQuizinfo($id)
    {
        $this->db->where('comp_id', $id);
        return $quiz = $this->db->get('tbl_mst_competition_detail')->row_array();
    }
    // public function isExistResultDeclaration($comp_id)
    // {
    //     $this->db->where('comp_id', $comp_id);
    //     return $this->db->get("tbl_standard_result_declaration")->result_array();
    // }
    public function insertResultDesc($data)
    {
        if ($this->db->insert('tbl_comp_result_declaration', $data)) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }
    public function updateResultDeclaration($quiz_id, $data)
    {

        $this->db->where('quiz_id', $quiz_id);
        if ($this->db->update('tbl_comp_result_declaration', $data)) {
            $this->db->update('tbl_mst_competition_detail',['result_declared'=>'1'],['comp_id'=>$quiz_id]);
            return true;
        } else {
            return false;
        }
    }
    public function resultDeclarationListdata()
    { 

        $myQuery = "SELECT distinct res.quiz_id ,res.created_on AS declared_on ,quiz.start_date,quiz.score,quiz.result_declared,quiz.competiton_name
        FROM  tbl_comp_result_declaration AS res INNER JOIN tbl_mst_competition_detail  As quiz
        ON res.quiz_id = quiz.comp_id order by res.created_on desc";
        $query = $this->db->query($myQuery);
        $result=$query->result_array();
        // echo json_encode($result);exit();
         

         $rs = array();
         foreach($result as $row){
            // $myQue = "SELECT `id` from `tbl_users_competition_attempt_record`  where `competiton_id` = {$row['quiz_id']} ";
            $this->db->select('id')->from('tbl_users_competition_attempt_record');
            $this->db->where('competiton_id',$row['quiz_id']);
            $myQue=$this->db->get();
            // $query = $this->db->query($myQue);
            $total_submissions = $myQue->result_array();
            // echo count($total_submissions); die;
            $row['total_submissions'] = $total_submissions;
            // echo json_encode($total_submissions);exit();
            // $myQue1 = "SELECT * from tbl_mst_competition_prize  where competiton_id = {$row['quiz_id']} ";

            $this->db->select('*')->from('tbl_mst_competition_prize');
            $this->db->where('competitionn_id',$row['quiz_id']);
            $myQue1=$this->db->get();
            // $query = $this->db->query($myQue1);
            
           

            // $query1 = $this->db->query($myQue1);
            $result1=$myQue1->result_array();
            $cnt = 0;
            // print_r($result1); die;
            foreach ($result1 as $r){
                $cnt = $cnt + $r['fprize_no']+$r['sprize_no']+$r['tprize_no']+$r['cprize_no'];
            }
            $row['total_winners'] = $cnt;

           
            array_push($rs,$row);
           
         }
        //  print_r($rs); die;
         return $rs;
 
        
    }
    public function reviewedCompetition(){
        $this->db->select('tmcd.*,tmcd.competiton_name,tmqa.title as avai_for,tmql.title');
        $this->db->from('tbl_mst_competition_detail tmcd');
        $this->db->join('tbl_mst_quiz_level tmql','tmql.id=tmcd.comp_level');
        //$this->db->join('tbl_mst_competition_detail tmcd','tmcd.comp_id=tucar.competiton_id');
        $this->db->join('tbl_mst_quiz_availability tmqa','tmqa.id=tmcd.available_for');
        $this->db->where('tmcd.review_status !=','0');        
            //         $query=$this->db->get();
            //         return $query->result_array(); 
            // die;
        
        $res = array();
        $rs = array();
        $query=$this->db->get();
                if($query->num_rows() > 0){
                    $res = $query->result_array();
                    foreach($res as $row){
                        $this->db->select('tucar.competiton_id,tucar.score as marks');
                        $this->db->from('tbl_users_competition_attempt_record tucar');
                        $this->db->where('tucar.competiton_id',$row['comp_id']);
                        $this->db->where('tucar.score !=','0');
                        $que=$this->db->get();
                        $query=$que->result_array();
                        // print_r($query[0]['ev_name']); die;
                        $row['total_reviewed']=count($query);

                        $this->db->select('tucar.*');
                        $this->db->from('tbl_users_competition_attempt_record tucar');
                        $this->db->where('tucar.competiton_id',$row['comp_id']);
                        // $this->db->where('tucar.status','2');
                        $que=$this->db->get();
                        $query1=$que->result_array();
                        // print_r($query[0]['ev_name']); die;
                        $row['total_submission']=count($query1);                        

                     array_push($rs,$row);
             
                    }

                    $abcd=array();
                    foreach($rs as $list){
                        // echo $list['total_reviewed']." ".$list['total_submission']."\n";
                        if($list['total_reviewed']==$list['total_submission']){
                          array_push($abcd,$list);
                            // echo "equal".$list['id']."\n";
                        }

                    }
                }
                return $abcd;
    }
    public function underReviewedCompetition(){
        $this->db->select('tmcd.*,tmcd.competiton_name,tmqa.title as avai_for,tmql.title');
        $this->db->from('tbl_mst_competition_detail tmcd');
        $this->db->join('tbl_mst_quiz_level tmql','tmql.id=tmcd.comp_level');
        //$this->db->join('tbl_mst_competition_detail tmcd','tmcd.comp_id=tucar.competiton_id');
        $this->db->join('tbl_mst_quiz_availability tmqa','tmqa.id=tmcd.available_for');
        $this->db->order_by('created_on','desc');
        $this->db->where('tmcd.review_status !=','0');        
            //         $query=$this->db->get();
            //         return $query->result_array(); 
            // die;
        
        $res = array();
        $rs = array();
        $query=$this->db->get();
                if($query->num_rows() > 0){
                    $res = $query->result_array();
                    foreach($res as $row){
                        $this->db->select('tucar.competiton_id,tucar.score as marks');
                        $this->db->from('tbl_users_competition_attempt_record tucar');
                        $this->db->where('tucar.competiton_id',$row['comp_id']);
                        // $this->db->where('tucar.score !=','0');
                        $this->db->where('tucar.status','3');
                        $que=$this->db->get();
                        $query=$que->result_array();
                        // print_r($query[0]['ev_name']); die;
                        $row['total_reviewed']=count($query);

                        $this->db->select('tucar.*');
                        $this->db->from('tbl_users_competition_attempt_record tucar');
                        $this->db->where('tucar.competiton_id',$row['comp_id']);
                        // $this->db->where('tucar.status','2');
                        $que=$this->db->get();
                        $query1=$que->result_array();
                        // print_r($query[0]['ev_name']); die;
                        $row['total_submission']=count($query1);                        

                     array_push($rs,$row);
             
                    }

                    $abcd=array();
                    foreach($rs as $list){
                        // echo $list['total_reviewed']." ".$list['total_submission']."\n";
                        if(!($list['total_reviewed']==$list['total_submission'])){
                          array_push($abcd,$list);
                            // echo "equal".$list['id']."\n";
                        }

                    }
                }
                return $abcd;
    }
    public function compAssignedEvaluator(){
        $this->db->select('tmcd.*,tmcd.competiton_name,tmqa.title as avai_for,tmql.title');
        $this->db->from('tbl_mst_competition_detail tmcd');
        $this->db->join('tbl_mst_quiz_level tmql','tmql.id=tmcd.comp_level');
        //$this->db->join('tbl_mst_competition_detail tmcd','tmcd.comp_id=tucar.competiton_id');
        $this->db->join('tbl_mst_quiz_availability tmqa','tmqa.id=tmcd.available_for');
        $this->db->order_by('created_on','desc');
        $this->db->where('tmcd.review_status !=','0');        
            //         $query=$this->db->get();
            //         return $query->result_array(); 
            // die;
        
        $res = array();
        $rs = array();
        $query=$this->db->get();
                if($query->num_rows() > 0){
                    $res = $query->result_array();
                    foreach($res as $row){
                        $this->db->select('tucar.competiton_id,tucar.score as marks,tucar.status');
                        $this->db->from('tbl_users_competition_attempt_record tucar');
                        $this->db->where('tucar.competiton_id',$row['comp_id']);
                        // $this->db->where('tucar.score !=','0');
                        $this->db->where('tucar.status','3');
                        $que=$this->db->get();
                        $query=$que->result_array();
                        // print_r($query[0]['ev_name']); die;
                        $row['total_reviewed']=count($query);

                        $this->db->select('tucar.*');
                        $this->db->from('tbl_users_competition_attempt_record tucar');
                        $this->db->where('tucar.competiton_id',$row['comp_id']);
                        $this->db->where('tucar.status','2');
                        $que=$this->db->get();
                        $query1=$que->result_array();
                        // print_r($query[0]['ev_name']); die;
                        $row['total_assigned']=count($query1); 

                        $this->db->select('tucar.*');
                        $this->db->from('tbl_users_competition_attempt_record tucar');
                        $this->db->where('tucar.competiton_id',$row['comp_id']);
                        // $this->db->where('tucar.status','2');
                        $que=$this->db->get();
                        $query1=$que->result_array();
                        // print_r($query[0]['ev_name']); die;
                        $row['total_submission']=count($query1);                        

                     array_push($rs,$row);
             
                    }

                    $abcd=array();
                    foreach($rs as $list){
                        // echo $list['total_reviewed']." ".$list['total_submission']."\n";
                        if(!($list['total_reviewed']==$list['total_submission'])){
                          array_push($abcd,$list);
                            // echo "equal".$list['id']."\n";
                        }

                    }
                }else{
                    $abcd=array();
                }
                return $abcd;
    }
    public function compToBeReciewed(){
        $this->db->select('tmcd.*,tmcd.competiton_name,tmqa.title as avai_for,tmql.title');
        $this->db->from('tbl_mst_competition_detail tmcd');
        $this->db->join('tbl_mst_quiz_level tmql','tmql.id=tmcd.comp_level');
        //$this->db->join('tbl_mst_competition_detail tmcd','tmcd.comp_id=tucar.competiton_id');
        $this->db->join('tbl_mst_quiz_availability tmqa','tmqa.id=tmcd.available_for');
        $this->db->order_by('created_on','desc');
        $this->db->where('tmcd.review_status !=','0');        
            //         $query=$this->db->get();
            //         return $query->result_array(); 
            // die;
        
        $res = array();
        $rs = array();
        $query=$this->db->get();
                if($query->num_rows() > 0){
                    $res = $query->result_array();
                    foreach($res as $row){
                        $this->db->select('tucar.competiton_id,tucar.score as marks');
                        $this->db->from('tbl_users_competition_attempt_record tucar');
                        $this->db->where('tucar.competiton_id',$row['comp_id']);
                        // $this->db->where('tucar.score !=','0');
                        $this->db->where('tucar.status','2');
                        $que=$this->db->get();
                        $query=$que->result_array();
                        // print_r($query[0]['ev_name']); die;
                        $row['total_task_assigned']=count($query);

                        $this->db->select('tucar.competiton_id,tucar.score as marks');
                        $this->db->from('tbl_users_competition_attempt_record tucar');
                        $this->db->where('tucar.competiton_id',$row['comp_id']);
                        // $this->db->where('tucar.score !=','0');
                        $this->db->where('tucar.status','3');
                        $que3=$this->db->get();
                        $query3=$que3->result_array();
                        // print_r($query[0]['ev_name']); die;
                        $row['total_task_reviewed']=count($query3);

                        $this->db->select('tucar.*');
                        $this->db->from('tbl_users_competition_attempt_record tucar');
                        $this->db->where('tucar.competiton_id',$row['comp_id']);
                        // $this->db->where('tucar.status','2');
                        $que=$this->db->get();
                        $query1=$que->result_array();
                        // print_r($query[0]['ev_name']); die;
                        $row['total_task']=count($query1);                        

                     array_push($rs,$row);
             
                    }

                    $abcd=array();
                    foreach($rs as $list){
                        // echo $list['total_reviewed']." ".$list['total_submission']."\n";
                        if(($list['total_task_assigned'] < $list['total_task']) && ($list['total_task_reviewed']=='0')){
                          array_push($abcd,$list);
                            // echo "equal".$list['id']."\n";
                        }

                    }
                }else{
                    $abcd=array();
                }
                return $abcd;
    }
}