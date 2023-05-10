<style>
    .proposal_view {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 1px solid #e3e6f0;
    border-radius: 0.35rem;
    border-top: 3px solid #2957a3!important;
}
</style>    
<link href="<?php echo base_url();?>assets/admin/css/jquery.dataTables.min.css" rel="stylesheet">
    <!-- Begin Page Content -->
    <div class="container">
        <!-- Content Row -->
      
        <div class="row mt-5">
           <div class="bloginfo">
                <h3 style="margin-bottom: 0px;margin-top:20px;color: #0086b2!important;font-weight: 600;">New Work Item Proposals</h3>
            </div>
            <div class="heading-underline" style="width: 200px;">
                <div class="left"></div><div class="right"></div>
             </div>
            <div class="proposal_view">
            <div class="col-12 mt-3">
                    <div class="row">
                            <div class="mb-2 col-md-4">
                                    <label class="d-block text-font" style="font-weight: 600;">Subject</label>
                                    <div>
                                        <p><?= $itemProposal['standard_subject']?></p>
                                    </div>    
                            </div>
                            <div class="mb-2 col-md-4">
                                    <label class="d-block text-font" style="font-weight: 600;">Name of proposer</label>
                                    <div>
                                        <p><?= $itemProposal['proposer_name']?></p>
                                    </div>    
                            </div>
                            <div class="mb-2 col-md-4">
                                    <label class="d-block text-font" style="font-weight: 600;">Organization Type</label>
                                    <div>
                                        <p><?= $itemProposal['org_type']?></p>
                                    </div>    
                            </div>
                            <div class="mb-2 col-md-4">
                                    <label class="d-block text-font" style="font-weight: 600;">Date of receipt</label>
                                    <div> 
                                        <p><?= date("d-m-Y", strtotime($itemProposal['date_of_receipt']));?></p>
                                    </div>    
                            </div>
                            <div class="mb-2 col-md-4">
                                    <label class="d-block text-font" style="font-weight: 600;">Current Stage</label>
                                    <div>
                                        <p><?= $itemProposal['current_stage']?></p>
                                    </div>    
                            </div>
                            <div class="mb-2 col-md-4">
                                    <label class="d-block text-font" style="font-weight: 600;">Concerned BIS Department</label>
                                    <div>
                                        <p><?= $itemProposal['current_bis_dept']?></p>
                                    </div>    
                            </div> 
                            <div class="mb-2 col-md-8">
                                    <label class="d-block text-font" style="font-weight: 600;">Proposed Title of Standard</label>
                                    <div>
                                        <p><?= $itemProposal['current_bis_dept']?></p>
                                    </div>    
                            </div>
                            <div class="mb-2 col-md-4">
                                    <label class="d-block text-font" style="font-weight: 600;">Aspect</label>
                                    <div>
                                        <p><?= $itemProposal['current_bis_dept']?></p>
                                    </div>    
                            </div>
                            <div class="mb-2 col-md-4">
                                    <label class="d-block text-font" style="font-weight: 600;">Subject of Standard</label>
                                    <div>
                                        <p><?= $itemProposal['current_bis_dept']?></p>
                                    </div>    
                            </div>
                            <div class="mb-2 col-md-4">
                                    <label class="d-block text-font" style="font-weight: 600;">Scope of proposed Standard</label>
                                    <div>
                                        <p><?= $itemProposal['current_bis_dept']?></p>
                                    </div>    
                            </div>
                            <div class="mb-2 col-md-4">
                                    <label class="d-block text-font" style="font-weight: 600;">Purpose and Justification</label>
                                    <div>
                                        <p><?= $itemProposal['current_bis_dept']?></p>
                                    </div>    
                            </div>
                            <div class="mb-2 col-md-4">
                                    <label class="d-block text-font" style="font-weight: 600;">Likely users of standards and their inputs</label>
                                    <div>
                                        <p><?= $itemProposal['current_bis_dept']?></p>
                                    </div>    
                            </div>
                
                    </div>    
             </div>
             <div class="col-md-12 submit_btn p-3" style="text-align: end;">
                               <a class="btn btn-primary btn-sm text-white" onclick="location.href='<?php echo base_url();?>users/item_proposal_list'">Back</a>
                          </div>  
             </div>
        </div>
       </div>
    <!-- /.container-fluid -->
    <script src="<?php echo base_url();?>assets/admin/js/jquery.dataTables.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url();?>assets/admin/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script>
    $(document).ready(function () {
    $('#example').DataTable();
    });
   </script>
