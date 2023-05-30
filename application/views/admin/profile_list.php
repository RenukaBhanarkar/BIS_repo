<div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Profile</h1>
                        
                    </div>
<!-- Content Row -->
                    <div class="row"> 
                        <div class="col-12 mt-3">
                        <div class="card border-top">
                           <div class="card-body"> 
                            <div class="row">  
                                
                                <?php if($admin_type  == 1 || $admin_type  == 2 || $admin_type  == 3) { ?> 
                                <div class="mb-2 col-md-4">
                                   
                                    <label class="d-block text-font">Name</label>
                                    <div>
                                        <p><?= $details['name'];?></p>
                                    </div> 
                                  
                                </div>
                                <div class="mb-2 col-md-4">
                                    <label class="d-block text-font">Email Id</label>
                                    <div>
                                    <p><?= $details['email_id'];?></p>
                                    </div>    
                                </div>
                                <div class="mb-2 col-md-4">
                                        <label class="d-block text-font">Designation</label>
                                        <div>
                                        <p><?= $details['role'];?></p>
                                        </div> 
                                </div>
                                
                                <?php } ?>   
                                <?php if( $admin_type  == 3) { ?> 
                                <div class="mb-2 col-md-4">
                                        <label class="d-block text-font">Department</label>
                                        <div>
                                        <p><?= $details['uvc_department_name'];?></p>
                                        </div> 
                                </div>
                                <div class="mb-2 col-md-4">
                                        <label class="d-block text-font">Branch</label>
                                        <div>
                                        <p><?= $details['branchnew'];?></p>
                                        </div> 
                                </div>
                               
                              
                                <?php } ?>  
                         </div>
                    </div>
            </div>
                          <div class="col-md-12 submit_btn p-3">
                               <a class="btn btn-primary btn-sm text-white" onclick="location.href='<?php echo base_url();?>Admin/Dashboard'">Back</a>
                          </div>  
                        </div> 
                      </div>
                    </div>
                   