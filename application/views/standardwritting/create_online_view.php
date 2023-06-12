<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Competition View</h1>
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo base_url().'Admin/dashboard';?>" >Sub Admin Dashboard</a></li>
        <li class="breadcrumb-item"><a href="<?php echo base_url().'Admin/dashboard';?>" >Sub Admin Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'admin/exchange_forum';?>" >Exchange Forum</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'quiz/organizing_quiz';?>" >Competition</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'Standardswritting/standard_offline_dashboard';?>" >Standard Writting Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'Standardswritting/standard_online_dashboard';?>" >Standard Writting</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'Standardswritting/create_online_list';?>" >Competition</a></li>
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
                       
                        <div class="mb-2 col-md-12">
                            <label class="d-block text-font">Title of Competition</label>
                            <div>
                                  <p><?=$getData['title']?></p>
                            </div>
                        </div>
                        <div class="mb-2 col-md-12">
                            <label class="d-block text-font">Title of Competition in Hindi</label>
                            <div>
                                <p><?=$getData['title_hindi']?></p>
                            </div>
                        </div>
                        <div class="mb-2 col-md-12">
                            <label class="d-block text-font">Description/About Competition</label>
                            <div>
                                <p><?=$getData['description']?></p>
                            </div>
                        </div>
                        <div class="mb-2 col-md-12">
                            <label class="d-block text-font">Terms & Conditions</label>
                            <div>
                                <p><?=$getData['terms_conditions']?></p>
                            </div>
                        </div>
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Start Date</label>
                            <div>
                                <p><?= date("d-m-Y", strtotime($getData['start_date']));?></p>
                            </div>
                        </div>
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Start Time</label>
                            <div>
                                <p><?=$getData['start_time']?></p>
                            </div>
                        </div>
                       
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">End Date</label>
                            <div>
                                <p><?= date("d-m-Y", strtotime($getData['end_date']));?></p>
                            </div>
                        </div>
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">End Time</label>
                            <div>
                                <p><?=$getData['end_time']?></p>
                            </div>
                        </div>
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Upload Banner</label>
                            <div>
                                <p><img src="<?=base_url()?><?=$getData['banner_img']?>" alt="" width="60%"></p>
                            </div>
                        </div>
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Total Marks</label>
                            <div>
                                <p><?=$getData['total_mark']?></p>
                            </div>
                        </div>
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Qualifying Marks</label>
                            <div>
                                <p><?=$getData['qualifying_mark']?></p>
                            </div>
                        </div>
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Level of Competition</label>
                            <div>
                                <p><?=$getData['level']?></p>
                            </div>
                        </div>
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Availabile for</label>
                            <div>
                                <p><?=$getData['availability']?></p>
                            </div>
                        </div>
                    </div>
                 </div>


                 <div class="card-header p-2" style="background-color: #cdd4e0; text-align: center;">
            	     <h4 class="m-0">Prize Details</h4>
                </div>
                 <div class="card-body">
                    <div class="row mt-2">
                        <div class="col-md-4 prizes-section">
                            <h4 class="m-2">1<sup>st</sup> Prize</h4>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="mb-2 col-md-4 ">
                            <label class="d-block text-font">Number of Prize</label>
                                <div>
                                <p><?=$getData['fprize']?></p>
                            </div>
                        </div>
                        <div class="mb-2 col-md-4 ">
                            <label class="d-block text-font">Name of Prize</label>
                                <div>
                                <p><?=$getData['fdetails']?></p>
                            </div>
                        </div>
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Prize Image</label>
                            <div>
                                 <p><img src="<?php echo base_url(); ?><?=$getData['fprize_img']?>" alt="#" width="60%"></p>
                            </div>
                        </div>
                    </div>
                    <?php if (!empty($getData['sprize'])): ?>
                    <div class="row mt-2">
                        <div class="col-md-4 prizes-section">
                            <h4 class="m-2">2<sup>nd</sup>Prizes</h4>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Number of Prize</label>
                            <div>
                                <p><?=$getData['sdetails']?></p>
                            </div>
                        </div>
                        <div class="mb-2 col-md-4 ">
                            <label class="d-block text-font">Name of Prize</label>
                                <div>
                                <p><?=$getData['sprize']?></p>
                            </div>
                        </div>
                       <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Prize Image</label>
                            <div>
                               <p><img src="<?php echo base_url(); ?><?=$getData['sprize_img']?>" alt="#" width="60%"></p>
                            </div>
                        </div>
                    </div>
                        
                    <?php endif ?>
                    <?php if (!empty($getData['tprize'])): ?>
                    
                    <div class="row mt-2">
                        <div class="col-md-4 prizes-section">
                            <h4 class="m-2">3<sup>nd</sup>Prizes</h4>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Number of Prize</label>
                            <div>
                                <p><?=$getData['tprize']?></p>
                            </div>
                        </div>
                        <div class="mb-2 col-md-4 ">
                            <label class="d-block text-font">Name of Prize</label>
                                <div>
                                <p><?=$getData['tdetails']?></p>
                            </div>
                        </div>
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Prize Image</label>
                            <div>
                                    <p><img src="<?php echo base_url(); ?><?=$getData['tprize_img']?>" alt="#" width="60%"></p>
                            </div>
                        </div>
                    </div>
                    <?php endif ?>
                    <?php if (!empty($getData['cprize'])): ?>
                    <div class="row mt-2">
                        <div class="col-md-4 prizes-section">
                            <h4 class="m-2">Consolation Prizes</h4>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Number of Prize</label>
                            <div>
                                <p><?=$getData['cprize']?></p>
                            </div>
                        </div>
                        <div class="mb-2 col-md-4 ">
                            <label class="d-block text-font">Name of Prize</label>
                                <div>
                                <p><?=$getData['tdetails']?></p>
                            </div>
                        </div>
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Prize Image</label>
                            <div>
                                  <p><img src="<?php echo base_url(); ?><?=$getData['cprize_img']?>" alt="#" width="60%"></p>
                            </div>
                        </div> 
                    </div>
                    <?php endif ?>

                     <?php if (encryptids("D", $_SESSION['admin_type']) == 2) { ?>
            <div class="col-12 mt-3">
                
                    <div class="row" id="remarkdiv">
                        <div class="mb-2 col-md-8">
                            <label class="d-block text-font" text-font>Remarks<sup class="text-danger">*</sup></label>
                            <textarea class="form-control input-font" placeholder="Enter Remark" name="remark" id="remark"> </textarea>
                            <span class="error_text"><?= form_error('terms_conditions'); ?></span>
                            <input type="hidden" name="status_id" value="3" id="status_id">
                        </div>
                    </div>
            </div>
            <?php if( $getData['status']==2){?>
            <div class="col-md-12 submit_btn p-3"> 
                <input type="submit" name="Approval" value="Approve" class="btn btn-success btn-sm text-white" id="approve" onclick="updateStatus() ">
                <input type="submit" name="Approval" value="Submit" class="btn btn-success btn-sm text-white" id="submit" onclick="updateStatus() "> 
                <a class="btn btn-danger btn-sm text-white" id="reject" onclick="rejectFun()">Reject</a>
                <a class="btn btn-primary btn-sm text-white" onclick="location.href='<?= base_url(); ?>Standardswritting/create_online_list/'">Back</a>
            </div>
            <?php } ?>
           
        <?php } ?>


                  
                </div>
                <?php if (encryptids("D", $_SESSION['admin_type']) == 3) { ?>
                <div class="col-md-12 submit_btn p-3">
                <button onclick="history.back()" class="btn btn-primary btn-sm text-white submit">Back</button>
                </div>
                <?php } ?>
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
        $("#remark").val("NA");
    });
    function rejectFun()
     {
        $("#submit").show();
        $("#remarkdiv").show();
        $("#approve").hide();
        $("#reject").hide();
        $("#status_id").val(4);
        $("#remark").val('');

    }

    function updateStatus() {

        status=$("#status_id").val();
        remark=$("#remark").val();
        id="<?=$getData['id']?>"; 

    if (status==1) { statusdata='Update'; }
    if (status==9) { statusdata='Archive'; }
    Swal.fire({
      title: 'Do you want to Update?',
      showDenyButton: true,
      showCancelButton: false,
      confirmButtonText: 'Update',
      denyButtonText: `Cancel`,
    }).then((result) => 
    { 
      if (result.isConfirmed) 
      { 
        $.ajax({
        type: 'POST',
        url: '<?php echo base_url(); ?>standardswritting/updateOnlineStatus',
        data: {
          id: id,
          status: status, 
          remark: remark, 
        },
        success: function(result)
        {
          Swal.fire('Saved!', '', 'success');
          location.reload();
        },
        error: function(result) 
        {
          alert("Error,Please try again.");
        }
      });
      } 
    })
  }
</script>