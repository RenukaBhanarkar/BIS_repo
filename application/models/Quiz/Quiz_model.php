<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Quiz_model extends CI_Model {

    public function insertQuiz($data)
    {
        if($this->db->insert('tbl_quiz_details',$data)){
			return $this->db->insert_id();
		}else{
			return false;
		}
        
    }
     public function sendToCreate($id,$formdata)
    {
        $this->db->where('id',$id); 
        $quiz = $this->db->get('tbl_quiz_details')->row_array();
        if ($quiz) 
        {
            $this->db->where('id', $id);
            return $this->db->update('tbl_quiz_details', $formdata);
        }
        else
        {
            return false;
        } 
    }
    // public function getQuiz($id)
    // {
    //     $this->db->where('id',$id); 
    //     return $quiz = $this->db->get('tbl_quiz_details')->row_array();
    // }

    public function getQuiz($id){
    $this->db->select('tbl_quiz_details.*,tbl_que_bank.title as quebanktitle'); 
        $this->db->join('tbl_que_bank','tbl_que_bank.que_bank_id = tbl_quiz_details.que_bank_id'); 
        $this->db->where('id',$id); 
        return $this->db->get('tbl_quiz_details')->row_array();  

    }

    public function getPrizeId($prize_id,$quiz_id)
    {
        $this->db->where('prize_id',$prize_id); 
        $this->db->where('quiz_id',$quiz_id); 
      
        $query = $this->db->get('tbl_prizes');
        $rs = array();
        if ($query->num_rows() > 0) {
            $rs =$query->row_array();
        }
       // echo json_encode($rs) ; exit();
        // return $quiz = $this->db->get('tbl_prizes')->row_array();
        return $rs;
    }
    public function deleteData($id)
    {
        $this->db->where('id', $id);
        if ($this->db->delete('tbl_quiz_details')) {
            return true;
        } else {
            return false;
        }
    }

    public function deletePrize($prize_id,$quiz_id)
    {
        $this->db->where('prize_id', $prize_id);
        $this->db->where('quiz_id',$quiz_id);
        if ($this->db->delete('tbl_prizes')) {
            return true;
        } else {
            return false;
        }
    }

    public function getAllQuize()
    {   
        $this->db->select('tbl_quiz_details.*,tbl_mst_status.status_name,tbl_que_bank.no_of_ques'); 
        $this->db->join('tbl_mst_status','tbl_mst_status.id = tbl_quiz_details.status'); 
        $this->db->join('tbl_que_bank','tbl_que_bank.quiz_linked_id = tbl_quiz_details.id'); 
        //$this->db->where_in('tbl_quiz_details.status',array(1,2,3,4,5,6)); 
        $this->db->where_in('tbl_quiz_details.status',array(10)); 
        $this->db->order_by('tbl_quiz_details.created_on','DESC'); 
        return $this->db->get('tbl_quiz_details')->result_array();  
    }
   /*  public function getAllQuizeCreated()
    {   
        $this->db->select('tbl_quiz_details.*,tbl_mst_status.status_name'); 
        $this->db->join('tbl_mst_status','tbl_mst_status.id = tbl_quiz_details.status');
        $this->db->where('tbl_quiz_details.status',1);
        return $this->db->get('tbl_quiz_details')->result_array();  
    }*/
    
    public function getAvailability()
    { 
         return $this->db->get("tbl_mst_quiz_availability")->result_array();
    }
    // public function getAllRegions()
    // { 
    //      return $this->db->get("tbl_mst_regions")->result_array();
    // }
    public function getAllRegions()
    {        
        $this->db->where('fki_status_id', 1);
        $this->db->where_in('pki_region_id', array(1,2,3,4,5));
        return $this->db->get("tbl_mst_regions")->result_array();
    }

    
    
    public function getQuizLevel()
    { 
         return $this->db->get("tbl_mst_quiz_level")->result_array();
    }
    public function getQuizLanguage()
    { 
         return $this->db->get("tbl_mst_language")->result_array();
    }
    public function getPrize()
    { 
         return $this->db->get("tbl_mst_prizes")->result();
    }
    public function insertPrize($data)
    {       
        if($this->db->insert('tbl_prizes',$data)){
			return $this->db->insert_id();
		}else{
			return false;
		}
    }
    
    public function updatePrize($prize_id,$quiz_id,$formdata)
{
   
    $this->db->where('prize_id', $prize_id);
    $this->db->where('quiz_id',$quiz_id);
    $this->db->update('tbl_prizes', $formdata);
}

public function updateQuiz($id,$formdata)
{
    $this->db->where('id', $id);
    return $this->db->update('tbl_quiz_details', $formdata);
}

 public function viewQuiz($id)
    { 
        $this->db->select('tbl_quiz_details.*,
            tbl_mst_language.title as language,
            tbl_mst_quiz_availability.title as availability,
            tbl_mst_quiz_level.title as level,
            tbl_que_bank.no_of_ques,
            b.uvc_department_name as branch,
            r.uvc_region_title as region,
            s.state_name as state,
            ');
        $this->db->where('tbl_quiz_details.id',$id);
        $this->db->join('tbl_mst_language','tbl_mst_language.id = tbl_quiz_details.language_id');
        $this->db->join('tbl_mst_quiz_availability','tbl_mst_quiz_availability.id = tbl_quiz_details.availability_id');
        $this->db->join('tbl_mst_quiz_level','tbl_mst_quiz_level.id = tbl_quiz_details.quiz_level_id');
        $this->db->join('tbl_que_bank','tbl_que_bank.que_bank_id = tbl_quiz_details.que_bank_id');

        $this->db->join('tbl_mst_branch b','b.pki_id = tbl_quiz_details.branch_id','left');
        $this->db->join('tbl_mst_regions r','r.pki_region_id = tbl_quiz_details.region_id','left');        
        $this->db->join('tbl_mst_states s','s.state_id = tbl_quiz_details.state_id','left');

        return $this->db->get('tbl_quiz_details')->row_array(); 
    }
    public function getAllQb()
    { 
         return $this->db->get("tbl_que_bank")->result_array();
    }
    public function getQbdataa($id)
    { 
        $this->db->where('que_bank_id ',$id); 
        return $this->db->get("tbl_que_bank")->row_array(); 
    }
    public function getLinkedQueBankId($quiz_id){
        $this->db->select('*'); 
        $this->db->where('id ',$quiz_id); 
        $query = $this->db->get('tbl_quiz_details' );
        $rs=array();
        if ($query->num_rows() > 0) {
            $rs = $query->row_array() ;
            return $rs['que_bank_id'];
        }else {
            return false; 
        }
        
    }
    // public function  updateStatusQueBank($linked_que_bank_id){

    // }
    public function sendToApprove($id,$formdata)
    {
        $this->db->where('id',$id); 
        $quiz = $this->db->get('tbl_quiz_details')->row_array();
        if ($quiz) 
        {
            $this->db->where('id', $id);
            return $this->db->update('tbl_quiz_details', $formdata);
        }
        else
        {
            return 2;
        } 
    }
    public function getAnswerKeyForUser($user_id,$quiz_id){

        $this->db->select(' 
        tbl_user_quiz.selected_op,tbl_user_quiz.quiz_id,tbl_user_quiz.user_id,
        tbl_que_details.*,
        tbl_quiz_details.language_id,
        tbl_quiz_submission_details.selected_lang,
        ');  
        $this->db->from('tbl_user_quiz');      
        $this->db->join('tbl_que_details','tbl_que_details.que_id = tbl_user_quiz.ques_id');    
        $this->db->join('tbl_quiz_details','tbl_quiz_details.id = tbl_user_quiz.quiz_id'); 
        $this->db->join('tbl_quiz_submission_details','tbl_quiz_submission_details.user_id = tbl_user_quiz.user_id AND tbl_quiz_submission_details.quiz_id = tbl_user_quiz.quiz_id');      
        $this->db->where('tbl_user_quiz.user_id',$user_id);
        $this->db->where('tbl_user_quiz.quiz_id',$quiz_id);           

        $query = $this->db->get();
        $rs=array();
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                array_push($rs,$row);
            }
        }
      //  echo json_encode($rs); exit();
        return $rs;
    } 
    

    public function updatepublish($id,$formdata)
    {
        $this->db->where('id',$id); 
        $quiz = $this->db->get('tbl_quiz_details')->row_array();
        if ($quiz) 
        {
            $this->db->where('id', $id);
            return $this->db->update('tbl_quiz_details', $formdata);
        }
        else
        {
            return 2;
        } 
    }

     // public function updateResultDeclaredStatus($quizId){
     //     $formdata = array(
     //        'status' =>11
     //     );
     //    $this->db->where('id',$quizId); 
               
     //    if($this->db->update('tbl_quiz_details', $formdata)){
     //        return true;
     //    } else
     //    {
     //        return false;
     //    } 

         
     // }


// SELECT `tbl_quiz_details`.*, `tbl_mst_status`.`status_name` FROM `tbl_quiz_details` JOIN `tbl_mst_status` ON `tbl_mst_status`.`id` = `tbl_quiz_details`.`status` WHERE `end_date` <= now() AND `end_time` >= TIME(now());

    public function getAllClosedQuize()
    { 
        $this->db->select('tbl_quiz_details.*,tbl_mst_status.status_name');
        $this->db->where('end_date <= now()'); 
        $this->db->where('end_time <= TIME(now())'); 
       
        $this->db->join('tbl_mst_status','tbl_mst_status.id = tbl_quiz_details.status');  
        return $this->db->get('tbl_quiz_details')->result_array(); 
    }
    public function getAllClosedQuizeNew()
    { 
        $t=time();

        $current_time = (date("H:i:s",$t));
        $current_date= date('Y-m-d');
        $this->db->select('quiz.*,st.status_name,que.no_of_ques'); 
        $this->db->from('tbl_quiz_details quiz');
        $this->db->join('tbl_mst_status st','st.id = quiz.status'); 
        $this->db->join('tbl_que_bank que','que.que_bank_id = quiz.que_bank_id'); 
        $this->db->where('quiz.end_date <=', $current_date);
       // $this->db->where('quiz.end_time <', $current_time); 
        $this->db->order_by('quiz.created_on','desc');
        
        //$this->db->where('quiz.end_time <=' ,$current_time); 
       
        $rs = array();
        $res = array();
        $query=$this->db->get();
        if($query->num_rows() > 0){

            $rs= $query->result_array();
            foreach ($rs as $row){
                /*
                 //////////////////
                 $myQuery = "SELECT count(*) AS cnt FROM  tbl_quiz_submission_details where quiz_id = {$row['id']}";
                 $query = $this->db->query($myQuery);
                 $cntDetails=$query->row_array();
                 $row['total_sub']  = $cntDetails['cnt'];
                 ////////////////////
                 array_push($res,$row);*/

                 if($row['end_date'] == date("Y-m-d") ){
                    if($row['end_time'] < $current_time){

                        //////////////////
                        $myQuery = "SELECT count(*) AS cnt FROM  tbl_quiz_submission_details where quiz_id = {$row['id']}";
                        $query = $this->db->query($myQuery);
                        $cntDetails=$query->row_array();
                        $row['total_sub']  = $cntDetails['cnt'];
                        ////////////////////
                     
                        array_push($res,$row);
                    }
                }else{
                    //////////////////
                    $myQuery = "SELECT count(*) AS cnt FROM  tbl_quiz_submission_details where quiz_id = {$row['id']}";
                    $query = $this->db->query($myQuery);
                    $cntDetails=$query->row_array();
                    $row['total_sub']  = $cntDetails['cnt'];
                    ////////////////////
                    array_push($res,$row);
                }
            }
        }
        return $res ; 

       
    }
    public function getbranchDetailsByPkid($id)
    { 
        $rs = array();
        $this->db->select('*'); 
        $this->db->from('tbl_mst_branch'); 
        $this->db->where('pki_id',$id); 
        $query=$this->db->get();
      
        if($query->num_rows() > 0){
           
            $rs = $query->row_array();
          
        }
        return $rs;
    }

    public function getQuizSubmissionUsers($id)
    { 
       $this->db->select('tbl_quiz_submission_details.*,
            tbl_users.user_name,
            tbl_users.email,
            tbl_users.user_mobile,tbl_users.member_id,tbl_users.stdClubMemberClass'); 
        $this->db->where('tbl_quiz_submission_details.quiz_id',$id); 
        $this->db->join('tbl_users','tbl_users.user_id = tbl_quiz_submission_details.user_id');
        $this->db->order_by('score', 'desc');   
        $this->db->order_by('time_taken', 'Asc');   
        return $this->db->get('tbl_quiz_submission_details')->result_array(); 
    }
    public function resultDeclarationList($id)
    { 
        $rs = array();
        $this->db->select('*'); 
        $this->db->from('tbl_prizes'); 
        $this->db->where('quiz_id',$id); 
        $query=$this->db->get();
       // echo json_encode($query->result_array());
        $prizes_details = array();
        $count =0;
        if($query->num_rows() > 0){
           
            foreach ($query->result_array() as $row) {
                $count =  $count + $row['no_of_prize'];
                array_push($rs,$row);
            }
            $prizes_details = $rs;
        }
        
        $this->db->select('tbl_quiz_submission_details.*,
            tbl_users.user_name,
            tbl_users.email,
            tbl_users.user_mobile,tbl_users.member_id,tbl_users.stdClubMemberClass'); 
        $this->db->where('tbl_quiz_submission_details.quiz_id',$id); 
        $this->db->where('tbl_quiz_submission_details.score !=',0); 
        $this->db->join('tbl_users','tbl_users.user_id = tbl_quiz_submission_details.user_id');
        $this->db->order_by('score', 'DESC'); 
        $this->db->order_by('time_taken', 'Asc');    
        $this->db->limit($count);   
        //return  $this->db->get('tbl_quiz_submission_details')->result_array();
        $result =  $this->db->get('tbl_quiz_submission_details')->result_array();
        $usersCont = $this->db->get('tbl_quiz_submission_details')->num_rows();
        $first = 0;
        $second = 0;
        $third = 0;
        $fourth = 0;
       // echo json_encode($prizes_details);
        foreach ($prizes_details as $prize) {
            if($prize['prize_id'] == 1 ){
                $first = $prize['no_of_prize'];
            }
            if($prize['prize_id'] == 2 ){
                $sec = $prize['no_of_prize'];
                $second = $first +  $sec;
            }
            if($prize['prize_id'] == 3){
                $thi = $prize['no_of_prize'];
                $third =  $second +  $thi;
            }
            if($prize['prize_id'] == 4 ){
                $fou= $prize['no_of_prize'];
                $fourth =  $third +  $fou;
            }
        }
        // echo "f".$first ;
        // echo "s".$second ;
        // echo "t".$third ;
        // echo "for".$fourth ;exit();
        $cnt = 1;
        $rsNew = array();
        //if($cnt <= $usersCont){}
        foreach ($result as $row){

           if($cnt <= $first){
            $row['prize'] = "First Prize";
           }else if($cnt > $first && $cnt <= $second){
            $row['prize'] = "Second Prize";
           }else if($cnt > $second && $cnt <= $third){
            $row['prize'] = "Third Prize";
           }else if($cnt > $third && $cnt <= $fourth){
            $row['prize'] = "Concelation Prize";
           }
           $cnt++;
           array_push($rsNew,$row);
        }
        return $rsNew;
    }
    
    public function isExistResultDeclaration($quiz_id){
        $this->db->where('quiz_id', $quiz_id);
        return $this->db->get("tbl_result_declaration")->result_array();
    }

    
    public function published_quiz(){
        $this->db->select('title,id');
        $this->db->from('tbl_quiz_details');
        $this->db->where('status','5');
        $query=$this->db->get();
        $result=$query->result_array();
        return $result;
    }
   /* public function getAllClosedQuize($id)
    {
        $this->db->where('status',7); 
        return $quiz = $this->db->get('tbl_quiz_details')->row_array();
    }*/

    // REnu ajax
    public function fetchQueBankForQuiz($total_question,$language_id){        
        if($language_id == 1){
            $lang =array(1,3);
        }else if($language_id == 2){
            $lang =array(2,3);
        } else{
            $lang =array(3);
        }
        //SELECT `qb`.`que_bank_id`, `qb`.`title` FROM `tbl_que_bank` `qb` WHERE `qb`.`status` = 3 AND `qb`.`is_active` = 1 AND `qb`.`quiz_linked_id` = `=` 0 AND `qb`.`no_of_ques` >= '4' AND `qb`.`language` IN(1, 3)
        $query = $this->db->select('qb.que_bank_id,qb.title')
            ->from('tbl_que_bank qb')  
            ->where('qb.status', 3)
            ->where ('qb.is_active', 1)
            ->where ('qb.quiz_linked_id ', 0)
            ->where ('qb.no_of_ques >=', $total_question)
            ->where_in ('qb.language', $lang)
            ->get();       
        $rs = array();
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                array_push($rs,$row);
            }
        }
        //echo json_encode($rs);exit();
        return $rs;
    }
    public function getListOfArchiveQuiz(){
        $this->db->select('tbl_quiz_details.*,tbl_mst_status.status_name,tbl_que_bank.no_of_ques'); 
        $this->db->join('tbl_mst_status','tbl_mst_status.id = tbl_quiz_details.status'); 
        $this->db->join('tbl_que_bank','tbl_que_bank.que_bank_id = tbl_quiz_details.que_bank_id');  
        $this->db->where('tbl_quiz_details.status',9);
        $query =  $this->db->get('tbl_quiz_details'); 
        // $query = $this->db->select('*')
        //     ->from('tbl_quiz_details')          
        //     ->where_in('status', array(9))
        //     ->get();
       
        $rs = array();
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                array_push($rs,$row);
            }
        }
        return $rs;
    }
    public function updateData($quiz_id, $data)
    {   
        
        $this->db->where('quiz_id', $quiz_id);
        if ($this->db->update('tbl_quiz_details', $data)) {
            return true;
        } else {
            return false;
        }
    }
    public function updateDataQuiz($quiz_id, $data)
    {   
        
        $this->db->where('id', $quiz_id);
        if ($this->db->update('tbl_quiz_details', $data)) {
            return true;
        } else {
            return false;
        }
    }

    public function updatePrizeImg($quiz_id,$prize_id, $data){
        $this->db->where('quiz_id', $quiz_id);
        $this->db->where('prize_id',$prize_id);
        if ($this->db->update('tbl_prizes', $data)) {
            return true;
        } else {
            return false;
        }
    }
    public function updateResultDeclaration($quiz_id, $data)
    {   
        
        $this->db->where('id', $quiz_id);
        if ($this->db->update('tbl_quiz_details', $data)) {
            return true;
        } else {
            return false;
        }
    }
    // public function getAllBranches()
    // { 
    //      return $this->db->get("tbl_mst_branch")->result_array();
    // }
    public function getAllBranches()
    { 
       
        $this->db->where('i_department_type', 4);
        $this->db->where('fki_status_id', 1);
        return $this->db->get("tbl_mst_branch")->result_array();
    }
    
    public function getAllStates()
    { 
        $this->db->select('state_id ,state_name');
        $this->db->where('status',1);  
        $this->db->order_by('state_name','ASC');
        return $this->db->get("tbl_mst_states")->result_array();
    }

    

     public function insertResultDesc($data)
    {
        if($this->db->insert('tbl_result_declaration',$data)){
            return $this->db->insert_id();
        }else{
            return false;
        }
    }

    public function getMstResultDeclaration($quiz_id)
    { 
        $this->db->where('quiz_id', $quiz_id);
        return $this->db->get("tbl_mst_result_declaration")->result_array();
    }
    public function getSubmission($quiz_id)
    { 
        $this->db->where('quiz_id', $quiz_id);
        return $this->db->get("tbl_result_declaration")->result_array();
    }

    public function getWinners($quiz_id)
    { 
        $this->db->where('quiz_id', $quiz_id);
        $this->db->where_not_in('prize', 0);
        return $this->db->get("tbl_result_declaration")->result_array();
    }
    public function insertMstResultDeclaration($data)
    {
        if($this->db->insert('tbl_mst_result_declaration',$data)){
            return $this->db->insert_id();
        }else{
            return false;
        }
       
    }
    public function resultDeclarationListdata()
    { 

        $myQuery = "SELECT distinct res.quiz_id ,res.created_on AS declared_on ,quiz.title, quiz.start_date,quiz.total_mark,quiz.result_declared
        FROM  tbl_result_declaration AS res INNER JOIN tbl_quiz_details  As quiz
        ON res.quiz_id = quiz.id order by res.created_on desc";
        $query = $this->db->query($myQuery);
        $result=$query->result_array();
        //echo json_encode($result);exit();
         

         $rs = array();
         foreach($result as $row){
            $myQue = "SELECT id from tbl_quiz_submission_details  where quiz_id = {$row['quiz_id']} ";
            $query = $this->db->query($myQue);
            $total_submissions = $query->num_rows();
            $row['total_submissions'] = $total_submissions;

            $myQue1 = "SELECT * from tbl_prizes  where quiz_id = {$row['quiz_id']} ";
            $query1 = $this->db->query($myQue1);
            $result1=$query1->result_array();
            $cnt = 0;
            foreach ($result1 as $r){
                $cnt = $cnt + $r['no_of_prize'];
            }
            $row['total_winners'] = $cnt;

           
            array_push($rs,$row);
           
         }
         return $rs;

       //  echo json_encode($rs);exit();

    //    $this->db->select('tbl_result_declaration.,
    //         tbl_quiz_details.title,
    //         tbl_quiz_details.quiz_id as quizId,
    //         tbl_quiz_details.start_date as startDate,
    //         tbl_quiz_details.total_mark'); 
    //     $this->db->join('tbl_quiz_details','tbl_quiz_details.id = tbl_mst_result_declaration.quiz_id'); 
    //     return $this->db->get('tbl_mst_result_declaration')->result_array(); 
    }

    public function getResultDeclarationList($id)
    { 


        $myQuery = "SELECT distinct res.quiz_id ,res.created_on AS declared_on ,quiz.title, quiz.start_date,quiz.total_mark,quiz.result_declared,
        qlevel.title as quizlevel,
        b.uvc_department_name as branch,
        r.uvc_region_title as region,
        s.state_name as statename
        FROM  tbl_result_declaration AS res 
        INNER JOIN tbl_quiz_details  As quiz ON res.quiz_id = quiz.id
        LEFT JOIN tbl_mst_quiz_level AS qlevel ON qlevel.id = quiz.quiz_level_id
        LEFT JOIN tbl_mst_branch b ON b.pki_id = quiz.branch_id
        LEFT JOIN tbl_mst_regions r ON r.pki_region_id = quiz.region_id       
        LEFT JOIN tbl_mst_states s ON s.state_id = quiz.state_id
        where res.quiz_id = $id ";
        $query = $this->db->query($myQuery);
        $result=$query->result_array();
        //echo json_encode($result);exit();
         

         $rs = array();
         foreach($result as $row){
            $myQue = "SELECT id from tbl_quiz_submission_details  where quiz_id = {$row['quiz_id']} ";
            $query = $this->db->query($myQue);
            $total_submissions = $query->num_rows();
            $row['total_submissions'] = $total_submissions;

            $myQue1 = "SELECT * from tbl_prizes  where quiz_id = {$row['quiz_id']} ";
            $query1 = $this->db->query($myQue1);
            $result1=$query1->result_array();
            $cnt = 0;
            foreach ($result1 as $r){
                $cnt = $cnt + $r['no_of_prize'];
            }
            $row['total_winners'] = $cnt;           
            array_push($rs,$row);
           
         }
         // echo json_encode($rs);exit();
         
         return $rs;




    //    $this->db->select('tbl_mst_result_declaration.*,
    //         tbl_quiz_details.title,
    //         tbl_quiz_details.quiz_id as quizId,
    //         tbl_quiz_details.start_date as startDate,
    //         tbl_quiz_details.total_mark');
    //     $this->db->where('tbl_mst_result_declaration.id', $id);
    //     $this->db->join('tbl_quiz_details','tbl_quiz_details.id = tbl_mst_result_declaration.quiz_id'); 
    //     return $quiz =$this->db->get('tbl_mst_result_declaration')->row_array(); 

      
    }

    public function resultDeclareUser($id)
    { 
        $rs = array();
        /*$this->db->select('tbl_quiz_submission_details.*,
            tbl_users.user_name,
            tbl_result_declaration.prize as userprize,
            tbl_users.email,
            tbl_users.user_mobile'); 
        $this->db->where('tbl_quiz_submission_details.quiz_id',$id); 
        //////////$this->db->where_not_in('tbl_result_declaration.prize',0); 
        $this->db->join('tbl_users','tbl_users.user_id = tbl_quiz_submission_details.user_id');
        $this->db->join('tbl_result_declaration','tbl_result_declaration.user_id = tbl_quiz_submission_details.user_id');
        $this->db->order_by('score', 'Asc'); 
        $this->db->order_by('time_taken', 'Asc');    
        $rs = $this->db->get('tbl_quiz_submission_details')->result_array(); 

      
        return $rs;*/





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
    }

      public function getQuizinfo($id)
    {
        $this->db->where('id',$id); 
        return $quiz = $this->db->get('tbl_quiz_details')->row_array();
    }
    public function getQuizByUserid($id){
        $t=time();

        $current_time = (date("H:i:s",$t));
        $current_date= date('Y-m-d');
        $this->db->select('tqsd.*,tqd.end_date,tqd.end_time,tqd.title');
        $this->db->from('tbl_quiz_submission_details tqsd');
        $this->db->join('tbl_quiz_details tqd','tqd.id=tqsd.quiz_id');
        //$this->db->where('tqd.end_date <=',$current_date);
        
        $this->db->where('user_id',$id);
       $query= $this->db->get();
       // return $this->db->get()->result_array(); 
        //return $query->result_array();

        $abcd=array();
        if($query->num_rows() > 0){

            $rs= $query->result_array();
            
            foreach ($rs as $row){
                

                 if($row['end_date'] == date("Y-m-d") ){
                    if($row['end_time'] < $current_time){

                        $row['visible']="1";                     
                        array_push($abcd,$row);
                    }else{
                        $row['visible']="0";
                        array_push($abcd,$row);
                    }
                }else{                   
                     $row['visible']="1";
                    array_push($abcd,$row);
                }

            }
        }
        return $abcd ; 
    }
     
}