
<style>
        .error_text
        {
            color: red;
        }
    </style> 
        <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Winner Wall Form</h1> 
            
        </div> 
       
       
        <!-- Content Row -->
        
       
        <div class="row">
            <form action="<?php echo base_url().'subadmin/insertWinner'; ?>" method="post" enctype="multipart/form-data">
            <div class="col-12 mt-3">
            <div class="card border-top">
               <div class="card-body"> 
             <div class="row">
                <div class="mb-2 col-md-4">
                        <label class="d-block text-font">Name of Competition<sup class="text-danger">*</sup></label>
                        <!-- <input type="text" class="form-control input-font" name="competition" id="competition" placeholder="Enter Name of Competition" required> -->
                        
                        <select class="form-control input-font" name="competition" id="competition" aria-label="Default select example" required>
                        <option selected>--select--</option> 
                        <?php foreach($competation as $list){ ?>
                            <option value="<?php echo $list['id']; ?>"><?php echo $list['title']; ?></option>
                            <?php } ?>
                        </select>
                        <span class="error_competition"><?php echo form_error('competation');?></span> 
                        
                  </div>
                <div class="mb-2 col-md-4">
                        <label class="d-block text-font">Date of Competition<sup class="text-danger">*</sup></label>
                        <input type="date" class="form-control input-font" name="date" id="date" placeholder="Name of Competition Date" required>
                        <span class="error_text"><?php echo form_error('title');?></span>
                        
                    </div>
                </div>
                <div class="row mt-2">
                                <div class="prizes-section">
                                    <h4 class="m-2">Add Winners</h4>
                                </div>
                 </div>
                 <div class="row">
                    <div class="mb-2 col-md-4">
                                    <label class="d-block text-font">Select Prize<sup class="text-danger">*</sup></label>
                                    <select class="form-control input-font" id="prize" name="prize" aria-label="Default select example" required>
                                    <option selected>--select--</option>   
                                    <?php foreach($prises as $p_list){ ?>
                                        
                                        <option value="<?php echo $p_list['id']; ?>"><?php echo $p_list['title']; ?></option>
                                        <?php } ?>  
                                    </select>
                                    
                    </div>
                    <div class="mb-2 col-md-4">
                        <label class="d-block text-font">Name<sup class="text-danger">*</sup></label>
                        <input type="text" class="form-control input-font" name="name" id="name" placeholder="Enter Name" required>
                        <span class="error_text"><?php echo form_error('title');?></span>
                        
                    </div>
                    <div class="mb-2 col-md-4">
                        <label class="d-block text-font">Email ID<sup class="text-danger">*</sup></label>
                        <input type="text" class="form-control input-font" name="email" id="email" placeholder="Enter Email ID" required>
                        <span class="error_text"><?php echo form_error('title');?></span>
                        
                    </div>
                    <div class="mb-2 col-md-4">
                        <label class="d-block text-font">Mobile Number<sup class="text-danger">*</sup></label>
                        <input type="text" class="form-control input-font" name="contact_no" id="contact_no" placeholder="Enter Mobile Number" required>
                        <span class="error_text"><?php echo form_error('contact_no');?></span>
                        
                    </div>
                    <div class="mb-2 col-md-4">
                                <label class="d-block text-font">Photo</label>
                                <div class="d-flex">
                                    <div>
                                        <input type="file" id="fprize_img" accept="image/jpeg,image/png,image/jpg" onchange="loadFileFirst(event)" name="fprize_img" class="form-control-file">
                                        <span class="error_text"><?php echo form_error('fprize_img'); ?></span>
                                    </div>
                                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModalFirst">
                                        Preview
                                    </button>
                                </div>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModalFirst" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" style="max-width: 700px;">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Photo Preview</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <img id="outputFirst" width="100%" />
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal -->
                            </div>
                    <div class="mb-2 col-md-4">
                        <label class="d-block text-font">Location<sup class="text-danger">*</sup></label>
                        <input type="text" class="form-control input-font" name="location" id="location" placeholder="Enter Location"  required>
                        <span class="error_text"><?php echo form_error('location');?></span>
                        
                    </div>
                </div>
                <div class="col-md-12 submit_btn p-3" style="text-align: center;">
                       <button  class="btn btn-success btn-sm text-white" data-bs-toggle="modal" data-bs-target="#submitForm">Add</button>
               </div>
                <div class="row">
                    <div class="col-12 mt-3">
                       <table id="example" class="table-bordered display nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Sr. No.</th>
                                    <th>Prize</th>
                                    <th>Name</th>
                                    <th>Email id</th>
                                    <th>Photo</th>
                                    <th>Location</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                               <tr>
                                        <td>1</td>
                                        <td>First Prize</td>
                                        <td>Winner Name</td>
                                        <td>abc@gmail.com</td>
                                        <td><img src="" alt="" class="" width="60px;"></td>
                                        <td>Pune Maharashtra</td>
                                        <td class="d-flex border-bottom-0">
                                            <button onclick="submit()" class="btn btn-danger btn-sm mr-2">Delete</button>
                                            
                                        </td>
                               </tr>
                 </table>
               
          </div>
        </div>
                <div class="col-md-12 submit_btn p-3">
                       <button  class="btn btn-success btn-sm text-white" data-bs-toggle="modal" data-bs-target="#submitForm">Submit</button>
                       <a class="btn btn-danger btn-sm text-white" data-bs-toggle="modal" data-bs-target="#cancelForm">Cancel</a> 
                       <input type="reset" name="Reset" class="btn btn-warning btn-sm text-white">
               </div>
                
                     
                          <!-- Modal -->
                </div> 
            </div>
            </div>
            </form>
       </div>

       <div class="modal fade" id="submitForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Submit Form</h5>
                      <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span></button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to Submit?</p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary submitrecord" data-bs-dismiss="modal">Save</button>
                    </div>
                  </div>
                </div>
              </div> 
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->