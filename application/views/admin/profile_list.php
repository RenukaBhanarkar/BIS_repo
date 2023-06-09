<div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Profile</h1>
                        
                    </div>
<!-- Content Row -->
                    <div class="row"> 
                    <?php
                        if ($this->session->flashdata('MSG')) {
                            echo $this->session->flashdata('MSG');
                        }
                        ?>
                        <div class="col-12 mt-3">
                        <div class="card border-top">
                            <form action="<?php echo base_url().'admin/update_profile/'; ?>" id="updateprofile" method="post">
                           <div class="card-body"> 
                            <div class="row">  
                                
                                <?php if($admin_type  == 1 || $admin_type  == 2 || $admin_type  == 3) { ?> 
                                <div class="mb-2 col-md-4">
                                   
                                    <label class="d-block text-font">Name</label>
                                 
                                        <input class="form-control input-font" type="text" name="name" id="name" value="<?= $details['name'];?>">
                                        <!-- <p><?= $details['name'];?></p> -->
                                   
                                  
                                </div>
                                
                                <div class="mb-2 col-md-4">
                                        <label class="d-block text-font">DOB</label>
                                        
                                        <!-- <p><?= $details['dob'];?></p> -->
                                        <input class="form-control input-font" type="date" name="dob" id="dob" value="<?= $details['dob'];?>">
                                        
                                </div>
                                <div class="mb-2 col-md-4">
                                        <label class="d-block text-font">Gender</label>
                                      
                                        <!-- <p><?= $details['gender'];?></p> -->
                                        <select class="form-control input-font" name="gender" id="gender">
                                            <option>-select-</option>
                                            <option value="1" <?php if($details['gender']==1){ echo "selected";} ?>>Male</option>
                                            <option value="2" <?php if($details['gender']==2){ echo "selected";} ?>>Female</option>
                                        </select>
                                       
                                </div>
                                <div class="mb-2 col-md-4">
                                        <label class="d-block text-font">Contact Number</label>
                                        <div>
                                        <!-- <p><?= $details['contact_number'];?></p> -->
                                        <input class="form-control input-font" type="text" name="contact_number" id="contact_number" value="<?= $details['contact_number'];?>">
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
                                        <p><?= $details['department'];?></p>
                                        </div> 
                                </div>
                                <div class="mb-2 col-md-4">
                                        <label class="d-block text-font">Branch</label>
                                        <div>
                                        <p><?= $details['branch'];?></p>
                                        </div> 
                                </div>
                                
                               
                              
                                <?php } ?>  
                         </div>
                    </div>
                    </form>
            </div>
                          <div class="col-md-12 submit_btn p-3">
                               <a class="btn btn-primary btn-sm text-white" onclick="location.href='<?php echo base_url();?>Admin/Dashboard'">Back</a>
                               <a class="btn btn-success btn-sm text-white update" >Update</a>
                          </div>  
                        </div> 
                      </div>
                    </div>
        <script>
            $(document).ready(function(){
                $('.update').click(function(){
                    var name = $('#name').val();
                    var dob = $('#dob').val();
                    var gender = $('#gender').val();
                    var mobile = $('#contact_number').val();
                    var isvalid=true;


                    if(isvalid){
                        $('#updateprofile').submit();
                    }


                })
            })
        </script>
                   