<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Shareyourthoughts_model extends CI_Model 
{
    /*public function ItemProposalData()
    {
        return $data = $this->db->get('tbl_item_proposal')->result_array(); 
    }*/


    public function ItemProposalData()
    {
        $result = array();
        $query = $this->db->get('tbl_item_proposal'); 
        if($query->num_rows() > 0){
            $res = $query->result_array();
            foreach ($res as $row){
                array_push($result,$row);
            }
        }
        return $result;
    }
    
    public function getItemProposalComments($id)
    { 
        $this->db->select('tbl_new_work_comments.*,tbl_users.user_name, tbl_users.email, tbl_users.user_mobile'); 
        $this->db->where('new_work_id',$id); 
        $this->db->join('tbl_users','tbl_users.user_id = tbl_new_work_comments.admin_id'); 
        $this->db->order_by('created_on', 'desc'); 
        return $this->db->get('tbl_new_work_comments')->result_array(); 
    }
    public function updateProposalComments($formdata,$id)
    {
        $this->db->where('id', $id);
        return $this->db->update('tbl_new_work_comments', $formdata);
    }
    public function deleteProposalComments($id)
    {
        $this->db->where('id', $id);
         if ($this->db->delete('tbl_new_work_comments')) { return true; } else { return false; }
    }





public function ImportantDraftData()
    {
        return $data = $this->db->get('tbl_important_draft_standards')->result_array(); 
    }
    public function getImportantDraftComments($id)
    { 
        $this->db->select('tbl_important_draft_comments.*,tbl_users.user_name, tbl_users.email, tbl_users.user_mobile'); 
        $this->db->where('doc_no',$id); 
        $this->db->join('tbl_users','tbl_users.user_id = tbl_important_draft_comments.admin_id'); 
        $this->db->order_by('created_on', 'desc'); 
        return $this->db->get('tbl_important_draft_comments')->result_array(); 
    }
    public function updateImportantDraftComments($formdata,$id)
    {
        $this->db->where('id', $id);
        return $this->db->update('tbl_important_draft_comments', $formdata);
    }
    public function deleteImportantDraftComments($id)
    {
        $this->db->where('id', $id);
         if ($this->db->delete('tbl_important_draft_comments')) { return true; } else { return false; }
    }











    public function StandardPublishData()
    {
        return $data = $this->db->get('tbl_new_standards_published')->result_array(); 
    }
    public function getStandardPublishComments($id)
    { 
        $this->db->select('tbl_standard_publish_comments.*,tbl_users.user_name, tbl_users.email, tbl_users.user_mobile'); 
        $this->db->where('pk_is_id',$id); 
        $this->db->join('tbl_users','tbl_users.user_id = tbl_standard_publish_comments.admin_id'); 
        $this->db->order_by('created_on', 'desc'); 
        return $this->db->get('tbl_standard_publish_comments')->result_array(); 
    }
    public function updateStandardPublishComments($formdata,$id)
    {
        $this->db->where('id', $id);
        return $this->db->update('tbl_standard_publish_comments', $formdata);
    }
    public function deleteStandardPublishComments($id)
    {
        $this->db->where('id', $id);
         if ($this->db->delete('tbl_standard_publish_comments')) { return true; } else { return false; }
    }











public function StandardsUnderReviewData()
    {
        return $data = $this->db->get('tbl_standard_under_review')->result_array(); 
    }
    public function getStandardsUnderReviewComments($id)
    { 
        $this->db->select('tbl_standard_under_review_comments.*,tbl_users.user_name, tbl_users.email, tbl_users.user_mobile'); 
        $this->db->where('pk_is_id',$id); 
        $this->db->join('tbl_users','tbl_users.user_id = tbl_standard_under_review_comments.admin_id'); 
        $this->db->order_by('created_on', 'desc'); 
        return $this->db->get('tbl_standard_under_review_comments')->result_array(); 
    }
    public function updateStandardsUnderReviewComments($formdata,$id)
    {
        $this->db->where('id', $id);
        return $this->db->update('tbl_standard_under_review_comments', $formdata);
    }
    public function deleteStandardsUnderReviewComments($id)
    {
        $this->db->where('id', $id);
         if ($this->db->delete('tbl_standard_under_review_comments')) { return true; } else { return false; }
    }







public function StandardRevisedData()
    {
        return $data = $this->db->get('tbl_standards_revised')->result_array(); 
    }
    public function getStandardRevisedComments($id)
    { 
        $this->db->select('tbl_standard_revised_comments.*,tbl_users.user_name, tbl_users.email, tbl_users.user_mobile'); 
        $this->db->where('pk_is_id',$id); 
        $this->db->join('tbl_users','tbl_users.user_id = tbl_standard_revised_comments.admin_id'); 
        $this->db->order_by('created_on', 'desc'); 
        return $this->db->get('tbl_standard_revised_comments')->result_array(); 
    }
    public function updateStandardRevisedComments($formdata,$id)
    {
        $this->db->where('id', $id);
        return $this->db->update('tbl_standard_revised_comments', $formdata);
    }
    public function deleteStandardRevisedComments($id)
    {
        $this->db->where('id', $id);
         if ($this->db->delete('tbl_standard_revised_comments')) { return true; } else { return false; }
    }



    public function ItemProposalCommnentsCount($id)
    { 
        $this->db->select('*');
        $this->db->from('tbl_new_work_comments');
        $this->db->where('new_work_id',$id); 
        $query= $this->db->get();
        return $query->num_rows();
    }
      



    public function DiscussionForumList()
    {
        $this->db->where('status', 0);
        return $data = $this->db->get('tbl_discussion_forum')->result_array(); 
    }
    public function ManageDiscussionList()
    {
        $this->db->where_not_in('status', 0);
        return $data = $this->db->get('tbl_discussion_forum')->result_array(); 
    }
    public function insertDiscussionForumData($formdata)
    {
       $this->db->insert('tbl_discussion_forum',$formdata); 
        return $insert_id = $this->db->insert_id();
    }
    public function updateDiscussionForum($formdata,$id)
    {
        $this->db->where('id', $id);
        return $this->db->update('tbl_discussion_forum', $formdata);
    }
    public function DeleteImageDiscussionForum($id)
    {
        $formdata['image']='';
        $this->db->where('id', $id);
        return $this->db->update('tbl_discussion_forum', $formdata);
    }
    public function deleteDiscussionForum($id)
    {
        $this->db->where('id', $id);
         if ($this->db->delete('tbl_discussion_forum')) { return true; } else { return false; }
    }
    public function updateStatusDiscussionForum($formdata,$id)
    {
        $this->db->where('id', $id);
        return $this->db->update('tbl_discussion_forum', $formdata);
    }

    public function OngoingDiscussionList()
    {   
        $this->db->select('tbl_discussion_forum.*,tbl_mst_status.status_name'); 
        $this->db->where('(date(now()) BETWEEN start_date AND end_date)'); 
        $this->db->where('tbl_discussion_forum.status',5); 
        $this->db->join('tbl_mst_status','tbl_mst_status.id = tbl_discussion_forum.status'); 
        return $this->db->get('tbl_discussion_forum')->result_array();  
    }

    public function CloseDiscussionList()
    {   
        $date=date('Y-m-d');
        $this->db->select('tbl_discussion_forum.*,tbl_mst_status.status_name'); 
        $this->db->where('end_date <' ,$date);  
        $this->db->join('tbl_mst_status','tbl_mst_status.id = tbl_discussion_forum.status'); 
        return $this->db->get('tbl_discussion_forum')->result_array();  
    }

    public function DiscussionView($id)
    { 
        $this->db->where('id ',$id);  
        return $this->db->get("tbl_discussion_forum")->row_array();
    }



    public function getDiscussionForumComments($id)
    { 
        $this->db->select('tbl_new_work_comments.*,tbl_users.user_name, tbl_users.email, tbl_users.user_mobile'); 
        $this->db->where('new_work_id',$id); 
        $this->db->join('tbl_users','tbl_users.user_id = tbl_new_work_comments.admin_id'); 
        $this->db->order_by('created_on', 'desc'); 
        return $this->db->get('tbl_new_work_comments')->result_array(); 
    }
    public function updateDiscussionForumComments($formdata,$id)
    {
        $this->db->where('id', $id);
        return $this->db->update('tbl_new_work_comments', $formdata);
    }
    public function deleteDiscussionForumComments($id)
    {
        $this->db->where('id', $id);
         if ($this->db->delete('tbl_new_work_comments')) { return true; } else { return false; }
    }

 public function ImportantDraftDataCommnentsCount($id)
    { 
        $this->db->select('*');
        $this->db->from('tbl_important_draft_comments');
        $this->db->where('doc_no',$id); 
        $query= $this->db->get();
        return $query->num_rows();
    }

    public function StandardPublishCommnentsCount($id)
    { 
        $this->db->select('*');
        $this->db->from('tbl_standard_publish_comments');
        $this->db->where('pk_is_id',$id); 
        $query= $this->db->get();
        return $query->num_rows();
    }

    public function StandardsUnderReviewCommnentsCount($id)
    { 
        $this->db->select('*');
        $this->db->from('tbl_standard_under_review_comments');
        $this->db->where('pk_is_id',$id); 
        $query= $this->db->get();
        return $query->num_rows();
    }

     public function StandardRevisedCommnentsCount($id)
    { 
        $this->db->select('*');
        $this->db->from('tbl_standard_revised_comments');
        $this->db->where('pk_is_id',$id); 
        $query= $this->db->get();
        return $query->num_rows();
    }
    
     
}