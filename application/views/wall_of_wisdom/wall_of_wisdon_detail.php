<div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Wall of Wisdom Detail</h1>
                        <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url().'Admin/dashboard';?>" >Sub Admin Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'admin/exchange_forum';?>" >Exchange Forum</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'wall_of_wisdom';?>" >Wall Of Wisdom</a></li>
                <li class="breadcrumb-item active" aria-current="page">Wall of Wisdom Detail</li>
                
                </ol>
            </nav>
                        
                        
                    </div>
<!-- Content Row -->
<div class="row">
                    <div class="col-12 mt-3">
                        <div class="card border-top">
                           <!-- <div class="card-body"> 
                                <div class="row">
                                    <div class="mb-2 col-md-4">
                                            <label class="d-block text-font"> ID</label>
                                            <div>
                                                <p><?php  echo $wall_of_wisdom['id']; ?></p>
                                            </div>    
                                        </div>
                                        <div class="mb-2 col-md-4">
                                            <label class="d-block text-font"> Name</label>
                                            <div>
                                                <p><?php // echo $data['name']; ?></p>dummy_name
                                            </div>    
                                        </div>
                                        <div class="mb-2 col-md-4">
                                            <label class="d-block text-font">Email Id</label>
                                            <div>
                                                <p><?php // echo $data['email_id']; ?></p>dummy_email
                                            </div>    
                                        </div>
                                        <div class="mb-2 col-md-4">
                                            <label class="d-block text-font">Contact</label>
                                            <div>
                                                <p>Not Available</p>
                                            </div>    
                                        </div>
                                        <div class="mb-2 col-md-4">
                                            <label class="d-block text-font">Date and Time</label>
                                            <div>
                                                <p><?php echo $wall_of_wisdom['created_on']; ?></p>
                                            </div>    
                                        </div>
                               
                              </div> -->
                          <!-- </div> -->
                          <div class="col-12 mt-3">
                            <div >
                                    <label class="d-block text-font">Title<sup class="text-danger">*</sup></label>
                                    <div>
                                        <p><?php echo $wall_of_wisdom['title']; ?></p>
                                    </div> 
                            </div>
                            <div >
                                    <label class="d-block text-font">Description<sup class="text-danger">*</sup></label>
                                    <div>
                                        <p><?php echo $wall_of_wisdom['description']; ?></p>
                                    </div> 
                            </div>
                            <div >
                                    <label class="d-block text-font">Image<sup class="text-danger">*</sup></label>
                                    <div>
                                        <p><img src="<?php echo base_url().'uploads/admin/wall_of_wisdom/'.$wall_of_wisdom['image']; ?>" style="max-width: 590px;"></p>
                                    </div> 
                            </div>
                            <div class="d-flex">
                                    <label class="d-block text-font">Likes</label>-<?php echo $wall_of_wisdom['likes']; ?>
                                    <!-- <div>
                                        <p><?php echo $wall_of_wisdom['status_name']; ?></p>
                                    </div>  -->
                            </div>
                            

                            
                          </div>
                          <div class="col-md-12 submit_btn p-3">
                               <a class="btn btn-primary btn-sm text-white" onclick="location.href='<?php echo base_url();?>wall_of_wisdom'">Back</a>
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
                                // $('#row' + que_id).css({
                                //     'display': 'none'
                                // });
                               // alert('success' 'refresh');
                                location.reload();
                            },
                            error: function(result) {
                                alert("Error,Please try again.");
                            }
                        });

                    }
                }
        function sendPublish(que_id) {
            var c = confirm("Are you sure to Publish this survey details? ");
            if (c == true) {
                // const $loader = $('.igr-ajax-loader');
                //$loader.show();
                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url(); ?>admin/yourwallPublish',
                    data: {
                        que_id: que_id,
                    },
                    success: function(result) {
                        // $('#row' + que_id).css({
                        //     'display': 'none'
                        // });
                        // alert('success' 'refresh');
                        location.reload();
                    },
                    error: function(result) {
                        alert("Error,Please try again.");
                    }
                });

            }
        }
        function sendUnPublish(que_id) {
            var c = confirm("Are you sure to Unpublish this survey details? ");
            if (c == true) {               
                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url(); ?>admin/yourwallUnpublish',
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
<!-- /.container-fluid -->
