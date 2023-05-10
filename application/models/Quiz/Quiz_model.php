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
    public function getQuiz($id)
    {
        $this->db->where('id',$id); 
        return $quiz = $this->db->get('tbl_quiz_details')->row_array();
    }

    public function getPrizeId($prize_id,$quiz_id)
    {
        $this->db->where('prize_id',$prize_id); 
        $this->db->where('quiz_id',$quiz_id); 
        return $quiz = $this->db->get('tbl_prizes')->row_array();
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

    public function getAllQuize()
    {   
        $this->db->select('tbl_quiz_details.*,tbl_mst_status.status_name,tbl_que_bank.no_of_ques'); 
        $this->db->join('tbl_mst_status','tbl_mst_status.id = tbl_quiz_details.status'); 
        $this->db->join('tbl_que_bank','tbl_que_bank.quiz_linked_id = tbl_quiz_details.id'); 
        //$this->db->where_in('tbl_quiz_details.status',array(1,2,3,4,5,6)); 
        $this->db->where_in('tbl_quiz_details.status',array(10)); 
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
    public function getAllRegions()
    { 
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
    

public function updateQuiz($id,$formdata)
{
    $this->db->where('id', $id);
    return $this->db->update('tbl_quiz_details', $formdata);
}

public function updatePrize($prize_id,$quiz_id,$formdata)
{
   
    $this->db->where('prize_id', $prize_id);
    $this->db->where('quiz_id',$quiz_id);
    $this->db->update('tbl_prizes', $formdata);
}

 public function viewQuiz($id)
    { 
        $this->db->select('tbl_quiz_details.*,
            tbl_mst_language.title as language,
            tbl_mst_quiz_availability.title as availability,
            tbl_mst_quiz_level.title as level,
            tbl_que_bank.no_of_ques
            ');
        $this->db->where('tbl_quiz_details.id',$id);
        $this->db->join('tbl_mst_language','tbl_mst_language.id = tbl_quiz_details.language_id');
        $this->db->join('tbl_mst_quiz_availability','tbl_mst_quiz_availability.id = tbl_quiz_details.availability_id');
        $this->db->join('tbl_mst_quiz_level','tbl_mst_quiz_level.id = tbl_quiz_details.quiz_level_id');
        $this->db->join('tbl_que_bank','tbl_que_bank.que_bank_id = tbl_quiz_details.que_bank_id');
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
    public function  updateStatusQueBank($linked_que_bank_id){

    }
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
        tbl_user_quiz.selected_op,tbl_user_quiz.quiz_id,tbl_user_quiz.user_id,tbl_user_quiz.mark_review,
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
        $this->db->where('quiz.end_date <', $current_date); 
      
        
        //$this->db->where('quiz.end_time <=' ,$current_time); 
       
        $rs = array();
        $query=$this->db->get();
        if($query->num_rows() > 0){
            $rs = $query->result_array();
        }
        return $rs; 

       
    }
   

    public function getQuizSubmissionUsers($id)
    { 
       $this->db->select('tbl_quiz_submission_details.*,
            tbl_users.user_name,
            tbl_users.email,
            tbl_users.user_mobile'); 
        $this->db->where('tbl_quiz_submission_details.quiz_id',$id); 
        $this->db->join('tbl_users','tbl_users.user_id = tbl_quiz_submission_details.user_id');
        $this->db->order_by('score', 'desc');    
        return $this->db->get('tbl_quiz_submission_details')->result_array(); 
    }
    public function resultDeclarationList($id)
    { 
       $this->db->select('tbl_quiz_submission_details.*,
            tbl_users.user_name,
            tbl_users.email,
            tbl_users.user_mobile'); 
        $this->db->where('tbl_quiz_submission_details.quiz_id',$id); 
        $this->db->join('tbl_users','tbl_users.user_id = tbl_quiz_submission_details.user_id');
        $this->db->order_by('score', 'desc');    
        return $this->db->get('tbl_quiz_submission_details')->result_array(); 
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
        $this->db->select('tbl_quiz_details.*,tbl_mst_status.status_name'); 
        $this->db->join('tbl_mst_status','tbl_mst_status.id = tbl_quiz_details.status'); 
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
    public function getAllBranches()
    { 
         return $this->db->get("tbl_mst_branch")->result_array();
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
       $this->db->select('tbl_mst_result_declaration.*,
            tbl_quiz_details.title,
            tbl_quiz_details.quiz_id as quizId,
            tbl_quiz_details.start_date as startDate,
            tbl_quiz_details.total_mark'); 
        $this->db->join('tbl_quiz_details','tbl_quiz_details.id = tbl_mst_result_declaration.quiz_id'); 
        return $this->db->get('tbl_mst_result_declaration')->result_array(); 
    }

    public function getResultDeclarationList($id)
    { 
       $this->db->select('tbl_mst_result_declaration.*,
            tbl_quiz_details.title,
            tbl_quiz_details.quiz_id as quizId,
            tbl_quiz_details.start_date as startDate,
            tbl_quiz_details.total_mark');
        $this->db->where('tbl_mst_result_declaration.id', $id);
        $this->db->join('tbl_quiz_details','tbl_quiz_details.id = tbl_mst_result_declaration.quiz_id'); 
        return $quiz =$this->db->get('tbl_mst_result_declaration')->row_array(); 

        // $this->db->where('id',$id); 
        // return $quiz = $this->db->get('tbl_quiz_details')->row_array();
    }

    public function resultDeclareUser($id)
    { 
       $this->db->select('tbl_quiz_submission_details.*,
            tbl_users.user_name,
            tbl_result_declaration.prize as userprize,
            tbl_users.email,
            tbl_users.user_mobile'); 
        $this->db->where('tbl_quiz_submission_details.quiz_id',$id); 
        $this->db->where_not_in('tbl_result_declaration.prize',0); 
        $this->db->join('tbl_users','tbl_users.user_id = tbl_quiz_submission_details.user_id');
        $this->db->join('tbl_result_declaration','tbl_result_declaration.user_id = tbl_quiz_submission_details.user_id');
        $this->db->order_by('score', 'desc');    
        return $this->db->get('tbl_quiz_submission_details')->result_array(); 
    }

      public function getQuizinfo($id)
    {
        $this->db->where('id',$id); 
        return $quiz = $this->db->get('tbl_quiz_details')->row_array();
    }
     
}