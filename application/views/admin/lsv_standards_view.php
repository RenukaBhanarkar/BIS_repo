 <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">learning Science via Standards</h1>
                        
                    </div>
<!-- Content Row -->
                    <div class="row"> 
                        <div class="col-12 mt-3">
                        <div class="card border-top">
                           <div class="card-body"> 
                            <div class="row">
                               <div class="mb-2 col-md-12">
                                    <label class="d-block text-font">Type of Post</label>
                                    <div>
                                        <p> 
                                            <?php 
                                            if ($liveSession['type_of_post']==1) {  $data='Text Upload'; }
                                            if ($liveSession['type_of_post']==2) { $data='Video Upload'; }
                                            if ($liveSession['type_of_post']==3) { $data='Live session link'; }
                                            echo  $data;
                                            ?> 
                                        </p>
                                    </div>    
                                </div>
                            </div>    
                            <div class="row">   
                                <div class="mb-2 col-md-12">
                                    <label class="d-block text-font">Title</label>
                                    <div>
                                        <p><?= $liveSession['title']?></p>
                                    </div>    
                                </div>
                            </div>
                            <div class="row">   
                                <div class="mb-2 col-md-12">
                                    <label class="d-block text-font">Description</label>
                                    <div>
                                        <p><?= $liveSession['description']?></p>
                                    </div>    
                                </div>
                            </div>
                            <div class="row">   
                                    <div class="mb-2 col-md-12">
                                        <label class="d-block text-font">Thumbnail Image</label>
                                        <div>
                                            <img src="<?= base_url()?><?= $liveSession['thumbnail']?>" alt="#" class=""style="width: 200px;">
                                        </div> 
                                    </div>
                                </div>

                             <?php 
                             if ($liveSession['type_of_post']==1) { ?>
                                <div class="row">   
                                    <div class="mb-2 col-md-12">
                                        <label class="d-block text-font">View Image</label>
                                        <div>
                                            <img src="<?= base_url()?><?= $liveSession['image']?>" alt="#" class="" style="width: 200px;">
                                        </div> 
                                    </div>
                                </div>

                                <div class="row">   
                                    <div class="mb-2 col-md-12">
                                        <label class="d-block text-font">View PDF</label>
                                        <div> 
                                            <a href="<?= base_url()?><?= $liveSession['doc_pdf']?>" class="btn btn-primary" target="_blank">view PDF</a>
                                        </div> 
                                    </div>
                                </div>
                            <?php }?>
                            <?php 
                             if ($liveSession['type_of_post']==2) {?>
                                <div class="row">   
                                <div class="mb-2 col-md-12">
                                    <label class="d-block text-font">Upload Thumbnail</label>
                                    <div>
                                    <video width="100%" height="100%" controls>
                                            <source src="<?= base_url()?><?= $liveSession['video']?>" type="video/mp4">
                                            <source src="movie.ogg" type="video/ogg">
                                           
                                    </video>
                                    </div>    
                                </div>
                            </div>
                        <?php } ?>
                        <?php 
                        if ($liveSession['type_of_post']==3) { ?>
                            <div class="row">   
                                <div class="mb-2 col-md-12">
                                    <label class="d-block text-font">Live Session Link</label>
                                    <div>
                                        <p><?= $liveSession['session_link']?></p>
                                    </div>    
                                </div>
                            </div>

                        <?php } ?>

                        <?php if (encryptids("D", $_SESSION['admin_type']) == 2) { ?>
            <div class="col-12 mt-3">
                <form name="liveSession" action="<?= base_url() . 'Admin/updateLvsStandarStatus/' . $liveSession['id'] ?>" method="post" enctype="multipart/form-data">
                    <div class="row" id="remarkdiv">
                        <div class="mb-2 col-md-8">
                            <label class="d-block text-font" text-font>Remarks<sup class="text-danger">*</sup></label>
                            <textarea class="form-control input-font" placeholder="Enter Remark" name="remark" id="remark"><?= set_value('terms_conditions'); ?></textarea>
                            <span class="error_text"><?= form_error('terms_conditions'); ?></span>
                            <input type="hidden" name="status_id" value="3" id="status_id">
                        </div>
                    </div>
            </div>
            <?php if( $liveSession['status']==2){?>
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
                          <div class="col-md-12 submit_btn p-3">
                               <a class="btn btn-primary btn-sm text-white" onclick="location.href='<?php echo base_url();?>admin/Manage_session_list'">Back</a>
                          </div>  
                        </div> 
                      </div>
                    </div>
                    </div>


            </div> 
    <script type="text/javascript">
     $(document).ready(function () 
    {  
        $("#submit").hide();
        $("#remarkdiv").hide();
    });
    function rejectFun()
     {
        $("#submit").show();
        $("#remarkdiv").show();
        $("#approve").hide();
        $("#reject").hide();
        $("#status_id").val(4);

    }
</script>

            <!-- End of Main Content -->

            <!-- Footer -->
           