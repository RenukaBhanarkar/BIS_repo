<style>
    .img_mentor {
    padding: 8px;
    border-radius: 15px;
    height: 201px;
}
.input_box {
    display: flex;
    justify-content: center;
    align-items: center;
    box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
    height: 201px;
    border-radius: 12px;
    position: relative;
}
</style>
<div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Feedback Detail</h1>
                        
                    </div>
<!-- Content Row -->
<div class="row">
                    <div class="col-12 mt-3">
                        <div class="card border-top">
                           <div class="card-body"> 
                                <div class="row">
                               <!-- <div class="mb-2 col-md-4">
                                <?php print_r($feedback); ?> 
                                    <label class="d-block text-font">ID</label>
                                    <div>
                                        <p><?php  echo $feedback['id']; ?></p>
                                    </div>    
                                </div> -->
                                <div class="mb-2 col-md-4">
                                    <label class="d-block text-font"> Name</label>
                                    <div>
                                        <p><?php  echo $feedback['name']; ?></p>
                                    </div>    
                                </div>
                                <div class="mb-2 col-md-4">
                                    <label class="d-block text-font">Email Id</label>
                                    <div>
                                        <p><?php  echo $feedback['email']; ?></p>
                                    </div>    
                                </div>
                                <div class="mb-2 col-md-4">
                                    <label class="d-block text-font">Contact</label>
                                    <div>
                                        <p><?php  echo $feedback['mobile']; ?></p>
                                    </div>    
                                </div>
                                <!-- <div class="mb-2 col-md-4">
                                    <label class="d-block text-font">Date and Time</label>
                                    <div>
                                        <p><?php echo $feedback['created_on']; ?></p>
                                    </div>    
                                </div> -->
                               
                              </div>
                           <div class="row">
                          
                           <div class="mb-2 col-md-12">
                                    <label class="d-block text-font">Subject<sup class="text-danger">*</sup></label>
                                    <div>
                                        <p><?php echo $feedback['subject']; ?></p>
                                    </div> 
                            </div>
                            <div class="mb-2 col-md-12">
                                    <label class="d-block text-font">Description<sup class="text-danger">*</sup></label>
                                    <div>
                                        <p><?php echo $feedback['description']; ?></p>
                                    </div> 
                            </div>
                            <!-- <div class="mb-2 col-md-4">
                                    <label class="d-block text-font">Image<sup class="text-danger">*</sup></label>
                                      <p><img src="<?php echo base_url().$data['image']; ?>" width="100%" style="height: 196px;"></p>
                                    
                            </div> -->
                           </div>
                           
                          
                      <!-- <div class="" style="text-align: end; margin-right: 23px;">
                            <a class="btn btn-info mb-4 mr-4"  href="<?php echo base_url().'uploads/by_the_mentors/doc/'.$data['document']; ?>" target="_blank"><img  src="<?php echo base_url().'assets/admin/img/pdf.png'; ?>" width="25px"/></a>
                            </a>
                        </div> -->
                          </div>
                          <div class="col-md-12 submit_btn p-3">
                               <a class="btn btn-primary btn-sm text-white" onclick="location.href='<?php echo base_url();?>admin/feedback'">Back</a>
                          </div>  
                        </div> 
                      </div>
                    </div>
                    </div>
<script>
    // function sendapproval(){

    // }
    function sendapproval(que_id) {
                    var c = confirm("Are you sure to Approve this survey details? ");
                    if (c == true) {
                        // const $loader = $('.igr-ajax-loader');
                        //$loader.show();
                        $.ajax({
                            type: 'POST',
                            url: '<?php echo base_url(); ?>admin/approveYourwall',
                            data: {
                                que_id: que_id,
                            },
                            success: function(result) {
                                
                                location.reload();
                            },
                            error: function(result) {
                                alert("Error,Please try again.");
                            }
                        });

                    }
                }
        function sendPublish(que_id) {
            var c = confirm("Are you sure to Publish By The Mentor details? ");
            if (c == true) {
                // const $loader = $('.igr-ajax-loader');
                //$loader.show();
                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url(); ?>admin/btm_publish',
                    data: {
                        que_id: que_id,
                    },
                    success: function(result) {
                        
                        location.reload();
                    },
                    error: function(result) {
                        alert("Error,Please try again.");
                    }
                });

            }
        }
        function sendUnPublish(que_id) {
            var c = confirm("Are you sure to Unpublish By The Mentor details? ");
            if (c == true) {               
                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url(); ?>admin/btm_unpublish',
                    data: {
                        que_id: que_id,
                    },
                    success: function(result) {                       
                        location.reload();
                    },
                    error: function(result) {
                        alert("Error,Please try again.");
                    }
                });

            }
        }
        
</script>