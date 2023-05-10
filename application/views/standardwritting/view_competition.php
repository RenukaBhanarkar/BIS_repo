<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Competition View</h1>
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url().'Admin/dashboard';?>" >Sub Admin Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'admin/exchange_forum';?>" >Exchange Forum</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'quiz/organizing_quiz';?>" >Competition</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'Standardswritting/miscellaneous_dashboard';?>" >Miscellaneous Competition</a></li>
                
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
                            <label class="d-block text-font">Competition ID</label>
                            <div>

                                <!-- <p><?= $quizdata['quiz_id']; ?></p> -->
                                <p>Dedicated id</p>
                            </div>
                        </div>
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Competition Title</label>
                            <div>
                                <p><?= $quizdata['competiton_name']; ?></p>
                            </div>
                        </div>
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Hindi Title</label>
                            <div>
                                <p><?= $quizdata['competition_hindi_name']; ?></p>
                            </div>
                        </div>
                        <div class="mb-2 col-md-12">
                            <label class="d-block text-font">Description</label>
                            <div>
                                <p><?php echo $quizdata['description']; ?></p>
                            </div>
                        </div>
                        <div class="mb-2 col-md-12">
                            <label class="d-block text-font">Terms and Conditions</label>
                            <div>
                                <p><?= $quizdata['terms_condition']; ?></p>
                            </div>
                        </div>

                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Competition Start Date</label>
                            <div>
                                
                                <p><?= date("d-m-Y", strtotime($quizdata['start_date']));?></p>
                                 
                            </div>
                        </div>
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Competition end Date</label>
                            <div>
                                <p><?= date("d-m-Y", strtotime($quizdata['end_date']));?></p>
                            </div>
                        </div>
                        <!-- <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Start Time</label>
                            <div>
                                <p><?= $quizdata['start_time']; ?></p>
                            </div>
                        </div> -->
                        <!-- <div class="mb-2 col-md-4">
                            <label class="d-block text-font">End Time</label>
                            <div>
                                <p><?= $quizdata['end_time']; ?></p>
                            </div>
                        </div> -->
                        <!-- <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Total Question in Quiz</label>
                            <div>
                                <p><?= $quizdata['total_question']; ?></p>
                            </div>
                        </div>
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Total Question in QB<sup class="text-danger">*</sup></label>
                            <div>
                                <p><?= $quizdata['no_of_ques']; ?></p>
                            </div>
                        </div>
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Total Marks<sup class="text-danger">*</sup></label>
                            <div>
                                <p><?= $quizdata['total_mark']; ?></p>
                            </div>
                        </div> -->
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Level of Competition<sup class="text-danger">*</sup></label>
                            <div>
                                <p><?= $quizdata['comp_level']; ?></p>
                            </div>
                        </div>
                        <!-- <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Language of Quiz<sup class="text-danger">*</sup></label>
                            <div>
                                <p><?= $quizdata['language']; ?></p>
                            </div>
                        </div>
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Switching Type<sup class="text-danger">*</sup></label>
                            <div>
                                <?php if ($quizdata['switching_type'] == 1){
                                    echo "Random"; }else {echo "Serially";}?>
                                
                            </div>
                        </div> -->
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Upload Competition Banner</label>
                            <div>
                                <p><img src="<?php echo base_url().$quizdata['thumbnail']; ?>" style="width:200px;"></p>
                            </div>
                        </div>
                    </div>
                    <?php if (!empty ($quizdata['fprize_image']) ){ ?> 
                    <div class="row mt-2">
                        <div class="col-md-4 prizes-section">
                            <h4 class="m-2">1<sup>st</sup> Prize</h4>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="mb-2 col-md-4 ">
                            <label class="d-block text-font">Number of Prizes</label>
                            <div>
                                <p><?= $quizdata['fprize_no']; ?></p>
                            </div>
                        </div>
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Prize Details</label>
                            <div>
                                <p><?= $quizdata['fprize_name']; ?></p>
                            </div>
                        </div>
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Image</label>
                            <div>
                            <?php if($quizdata['fprize_image']== '') { 
                                echo "NA";
                             } else { ?>
                                  <p><img src="<?php echo base_url().$quizdata['fprize_image']; ?>" style="width:200px;"></p>
                            <?php  } ?>
                              
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    <?php if (!empty ($quizdata['sprize_image']) ){ ?> 
                    <div class="row mt-2">
                        <div class="col-md-4 prizes-section">
                            <h4 class="m-2">2<sup>nd</sup>Prizes</h4>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Number of Prizes</label>
                            <div>
                                <p><?=  $quizdata['sprize_no']; ?></p>
                            </div>
                        </div>
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Prize Details</label>
                            <div>
                                <p><?=  $quizdata['sprize_name']; ?></p>
                            </div>
                        </div>
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Image</label>
                            <div>
                            <?php if($quizdata['sprize_image']== '') { 
                                echo "NA";
                             } else { ?>
                                  <p><img src="<?php echo base_url().$quizdata['sprize_image']; ?>" style="width:200px;"></p>
                            <?php  } ?>
                              
                            </div>
                        </div>
                    </div>
                    <?php }  else { echo "Second Prizes not available"; } ?>
                    <?php if (!empty ($quizdata['tprize_image']) ){ ?> 
                    <div class="row mt-2">
                        <div class="col-md-4 prizes-section">
                            <h4 class="m-2">3<sup>nd</sup>Prizes</h4>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Number of Prizes</label>
                            <div>
                                <p><?=  $quizdata['tprize_no']; ?></p>
                            </div>
                        </div>
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Prize Details</label>
                            <div>
                                <p><?= $quizdata['tprize_name']; ?></p>
                            </div>
                        </div>
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Image</label>
                            <div>
                            <?php if($quizdata['tprize_image']== '') { 
                                echo "NA";
                             } else { ?>
                                  <p><img src="<?php echo base_url().$quizdata['sprize_image']; ?>" style="width:200px;"></p>
                            <?php  } ?>
                              
                            </div>
                        </div>
                    </div>
                    <?php }  else { echo "Third Prizes not available"; } ?>
                    <?php if (!empty ($quizdata['cprize_image']) ){ ?> 
                    <div class="row mt-2">
                        <div class="col-md-4 prizes-section">
                            <h4 class="m-2">Consolation Prizes</h4>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Number of Prizes</label>
                            <div>
                                <p><?= $quizdata['cprize_no']; ?></p>
                            </div>
                        </div>
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Prize Details</label>
                            <div>
                                <p><?=  $quizdata['cprize_name']; ?></p>
                            </div>
                        </div>
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Image</label>
                            <div>
                            <?php if($quizdata['cprize_image']== '') { 
                                echo "NA";
                             } else { ?>
                                  <p><img src="<?php echo base_url().$quizdata['cprize_image']; ?>" style="width:200px;"></p>
                            <?php  } ?>
                              
                            </div>
                        </div>
                    </div>
                    <?php } else { echo "Consolation Prizes not available"; } ?>
                    <!-- <div class="row mt-2">
                        <div class="col-md-4 prizes-section">
                            <h4 class="m-2">Available for</h4>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="mb-2 col-md-4">                           
                            <div>
                                <p><?= $quizdata['availability']; ?></p>
                            </div>
                        </div>
                    </div> -->
                    
                    
                </div>
                <div class="col-md-12 submit_btn p-3">
                    <a class="btn btn-primary btn-sm text-white" onclick="location.href='<?= base_url(); ?>Standardswritting/manage_competition_list/'">Back</a>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="cancelForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Are you sure you want to cancel?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal -->
            </div>
        </div>
        <?php if (encryptids("D", $_SESSION['admin_type']) == 2) { ?>
            <div class="col-12 mt-3">
                <form name="quiz_reg" action="<?= base_url() . 'Admin/updateQuizStatus/' . $quizdata['id'] ?>" method="post" enctype="multipart/form-data">
                    <div class="row" id="remarkdiv">
                        <div class="mb-2 col-md-8">
                            <label class="d-block text-font" text-font>Remarks<sup class="text-danger">*</sup></label>
                            <textarea class="form-control input-font" placeholder="Enter Remark" name="remark" id="remark"><?= set_value('terms_conditions'); ?></textarea>
                            <span class="error_text"><?= form_error('terms_conditions'); ?></span>
                            <input type="hidden" name="status_id" value="3" id="status_id">
                        </div>
                    </div>
            </div>
            <?php if( $quizdata['status']==2){?>
            <div class="col-md-12 submit_btn p-3">
                <!-- <a id="approve" class="btn btn-success btn-sm text-white" data-toggle="modal" data-target="#approval">Approval</a> -->
                <input type="submit" name="Approval" value="Approve" class="btn btn-success btn-sm text-white" id="approve">
                <input type="submit" name="Approval" value="Submit" class="btn btn-success btn-sm text-white" id="submit">
                <!-- <a class="btn btn-success btn-sm text-white" data-toggle="modal" data-target="#approval" id="submit">Submit</a> -->
                <a class="btn btn-primary btn-sm text-white" id="reject" onclick="rejectFun()">Reject</a>
            </div>
            <?php } ?>
            </form>


<?php } ?>

</div>

</div>
<!-- <?php echo (encryptids("D", $_SESSION['admin_type'])); ?> -->
<!-- <?php echo $quizdata['status']; ?> -->
<?php if (encryptids("D", $_SESSION['admin_type']) == 2) { 
  if($quizdata['status']==2 ){  ?>
<button class="btn btn-primary btn-sm text-white approve" data-id="<?= $quizdata['competitionn_id'] ?>">Approve</button>
<button class="btn btn-danger btn-sm text-white reject" data-id="<?= $quizdata['competitionn_id'] ?>">Reject</button>
<?php } } ?>
</div>


</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>
<script>
    $('.approve').on('click',function(){
        id =$(this).attr('data-id');
    Swal.fire({
                title: 'Are you sure you want to Approve?',
                showDenyButton: true,
                showCancelButton: false,
                confirmButtonText: 'Approve',
                denyButtonText: `Cancel`,
                }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {                       
                    jQuery.ajax({
                                type: "POST",
                                url: '<?php echo base_url(); ?>Standardswritting/update_status',
                                // dataType: 'json',
                                data: {
                                "id": id,
                                "status": 3
                                },
                                success: function(res) {
                                if (res) {
                                  //  location.reload();
                                } else {
                                    alert("error");
                                }
                                },
                                error: function(xhr, status, error) {
                                console.log(error);
                                }
                            });
                                            
                } else if (result.isDenied) {
                    // Swal.fire('Changes are not saved', '', 'info')
                }
                })
    });

    $('.reject').on('click',function(){
        id =$(this).attr('data-id');
    Swal.fire({
                title: 'Are you sure you want to Reject?',
                showDenyButton: true,
                showCancelButton: false,
                confirmButtonText: 'Reject',
                denyButtonText: `Cancel`,
                }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {                       
                    alert('work remaining');
                                            
                } else if (result.isDenied) {
                    // Swal.fire('Changes are not saved', '', 'info')
                }
                })
    });
</script>
