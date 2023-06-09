<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Competition View</h1>
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
        <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url().'Admin/dashboard';?>" >Sub Admin Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'admin/exchange_forum';?>" >Exchange Forum</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'quiz/organizing_quiz';?>" >Competition</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'Standardswritting/standard_writting_dashboard';?>" >Standard Writting</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'Standardswritting/create_standard_list';?>" >Create New Competition</a></li>
                <!-- <li class="breadcrumb-item active" aria-current="page">Create New Competition</li> -->
                
                </ol>
            </nav>
    </div>
    <!-- Content Row -->
    <div class="row">
        <div class="col-12 mt-3">
            <div class="card border-top">
                <div class="card-body">
                    <div class="row">
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Standard Club</label>
                            <div>
                                  <p><?=$getData['standard_club']?></p>
                            </div>
                        </div>
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Name of Activity</label>
                            <div>
                                <p><?=$getData['topic_of_activity']?></p> 
                            </div>
                        </div>
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Date of Activity</label>
                            <div>
                                <p><?=$getData['date_of_activity']?></p>
                            </div>
                        </div>
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Number of Participate</label>
                            <div>
                                <p><?=$getData['number_of_participants']?></p>
                            </div>
                        </div>
                    </div>
                 </div>
                 <div class="card-header p-2" style="background-color: #cdd4e0; text-align: center;">
            	     <h4 class="m-0">Winners Details</h4>
                </div>
                 <div class="card-body">
                    <div class="row mt-2">
                        <div class="col-md-4 prizes-section">
                            <h4 class="m-2">1<sup>st</sup> Prize</h4>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="mb-2 col-md-4 ">
                            <label class="d-block text-font">Name of Participant</label>
                                <div>
                                <p><?=$getData['first_paticipant']?></p>
                            </div>
                        </div>
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Document</label>
                            <div>
                                 <a href="<?php echo base_url(); ?><?= $getData['first_file']?>" target="_blank" ><p><img src="<?php echo base_url(); ?>assets/admin/img/pdf.png" alt="#" width="10%"></p></a>
                            </div>
                        </div>
                    </div> 

                    <?php if($getData['second_paticipant']!='' || !empty($getData['second_paticipant'])) {?>
                    <div class="row mt-2">
                        <div class="col-md-4 prizes-section">
                            <h4 class="m-2">2<sup>nd</sup> Prize</h4>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Name of Participant</label>
                            <div>
                                <p><?= $getData['second_paticipant']?></p>
                            </div>
                        </div>

                        <?php if($getData['second_file']!='' || !empty($getData['second_file'])) {?>
                       <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Document</label>
                            <div>
                              <a href="<?php echo base_url(); ?><?= $getData['second_file']?>" target="_blank" ><p><img src="<?php echo base_url(); ?>assets/admin/img/pdf.png" alt="#" width="10%"></p></a>
                            </div>
                        </div>
                        <?php } ?>


                    </div>
                <?php } ?>

                <?php if($getData['third_paticipant']!='' || !empty($getData['third_paticipant'])) {?>


                    <div class="row mt-2">
                        <div class="col-md-4 prizes-section">
                            <h4 class="m-2">3<sup>nd</sup>Prizes</h4>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Name of Participant</label>
                            <div>
                                <p><?=$getData['third_paticipant']?></p>
                            </div>
                        </div>

                        <?php if($getData['third_file']!='' || !empty($getData['third_file'])) {?>
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Document</label>
                            <div>
                                    <a href="<?php echo base_url(); ?><?= $getData['third_file']?>" target="_blank" ><p><img src="<?php echo base_url(); ?>assets/admin/img/pdf.png" alt="#" width="10%"></p></a>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                    <?php } ?>
                <?php if($getData['consolation_paticipant']!='' || !empty($getData['consolation_paticipant'])) {?>
                    <div class="row mt-2">
                        <div class="col-md-4 prizes-section">
                            <h4 class="m-2">Consolation Prizes</h4>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Name of Participant</label>
                            <div>
                                <p><?=$getData['consolation_paticipant']?></p>
                            </div>
                        </div>

                         <?php if($getData['consolation_file']!='' || !empty($getData['consolation_file'])) {?>
                            <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Document</label>
                            <div>
                                  <a href="<?php echo base_url(); ?><?= $getData['consolation_file']?>" target="_blank" ><p><img src="<?php echo base_url(); ?>assets/admin/img/pdf.png" alt="#" width="10%"></p></a>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                  
                </div>

                 <?php } ?>



        <?php if (encryptids("D", $_SESSION['admin_type']) == 2) { ?>
            <div class="col-12 mt-3">
                
                   <!--  <div class="row" id="remarkdiv">
                        <div class="mb-2 col-md-8">
                            <label class="d-block text-font" text-font>Remarks<sup class="text-danger">*</sup></label>
                            <textarea class="form-control input-font" placeholder="Enter Remark" name="remark" id="remark"> </textarea>
                            <span class="error_text"><?= form_error('terms_conditions'); ?></span>
                            <input type="hidden" name="status_id" value="3" id="status_id">
                        </div>
                    </div> -->
            </div>
            <?php } ?>
            
            <div class="col-md-12 submit_btn p-3"> 
                <?php if (encryptids("D", $_SESSION['admin_type']) == 2) { ?>
                <?php if( $getData['status']==2){?>
                <input type="submit" name="Approval" value="Approve" class="btn btn-success btn-sm text-white" id="approve" onclick="updateStatus() ">
                <input type="submit" name="Approval" value="Submit" class="btn btn-success btn-sm text-white" id="submit" onclick="updateStatus() "> 
                <!-- <a class="btn btn-primary btn-sm text-white" id="reject" onclick="rejectFun()">Reject</a> -->
                 <a class="btn btn-secondary btn-sm text-white" data-toggle="modal" data-target="#rejectForm" id="reject"onclick="rejectFun()" >Reject</a>
                <?php } ?>
                <?php } ?>
                <button onclick="history.back()" class="btn btn-primary btn-sm text-white">Back</button>
            </div>

             <div class="modal fade" id="rejectForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Reject Quiz</h5>
                                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body"> 
                            <textarea class="form-control input-font" placeholder="Enter Reason" name="remark" id="remark"></textarea>
                                                        
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" onclick="updateStatus2()" id="rejectBtn">Reject</button>
                            </div>
                        </div>
                    </div>
                </div>
            
           
        


         
        <div class="col-md-12 submit_btn p-3">
        
                </div>
                
                <!-- Modal -->
          </div>
        </div>
       </div>
   </div>



 <script type="text/javascript">
     $(document).ready(function () 
    {  
        $("#submit").hide();
        $("#remarkdiv").hide();
        $("#remark").val(" ");
    });
    function rejectFun()
     { 
        $("#remarkdiv").show(); 
        $("#status_id").val(4);
        $("#remark").val('');

    }

    function updateStatus() {

        status=$("#status_id").val();
        remark=$("#remark").val();
        id="<?=$getData['id']?>"; 

    if (status==1) { statusdata='Submit'; }
    if (status==9) { statusdata='Archive'; }
    Swal.fire({
      title: 'Do you want to approve ?',
      showDenyButton: true,
      showCancelButton: false,
      confirmButtonText: 'approve ',
      denyButtonText: `Cancel`,
    }).then((result) => 
    { 
      if (result.isConfirmed) 
      { 
        $.ajax({
        type: 'POST',
        url: '<?php echo base_url(); ?>standardswritting/updateStatusAdmin',
        data: {
          id: id,
          status: 3, 
          remark: remark, 
        },
        success: function(result)
        {
          Swal.fire('Saved!', '', 'success');
          history.back();
        },
        error: function(result) 
        {
          alert("Error,Please try again.");
        }
      });
      } 
    })
  }

  function updateStatus2() {

     status=$("#status_id").val();
        remark=$("#remark").val();
        id="<?=$getData['id']?>"; 

     var remark = $('#remark').val();
        allfields = true;
       
        if (remark == "" || remark == null || remark.length == 0) {
            if ($("#remark").next(".validation").length == 0) {
                $("#remark").after("<div class='validation' style='color:red;margin-bottom:15px;'>This value is required. </div>");
            }
            if (!focusSet) {
                $("#remark").focus();
            }
            allfields = false;
        } else {
            $("#remark").next(".validation").remove();
        }
        if(allfields){
            $.ajax({
        type: 'POST',
        url: '<?php echo base_url(); ?>standardswritting/updateStatusAdmin',
        data: {
          id: id,
          status: 4, 
          remark: remark, 
        },
        success: function(result)
        {
          Swal.fire('Saved!', '', 'success');
          history.back();
        },
        error: function(result) 
        {
          alert("Error,Please try again.");
        }
      });
        }



       

  

    
   
       
      
  }
</script>