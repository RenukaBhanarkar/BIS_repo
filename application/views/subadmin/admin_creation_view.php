    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Subadmin Details</h1>
                         <nav  aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url().'Admin/dashboard'; ?>"> Admin Dashboard</a></li>

                <li class="breadcrumb-item active" aria-current="page"><a href="<?php echo base_url().'admin/users'; ?>">User Management</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'subadmin/admin_creation_list'; ?>">Subadmin Creation</a></li>
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
                                    <label class="d-block text-font">Department</label>
                                    <div>
                                    <p><?php echo $detail['department']; ?></p>
                                    </div>    
                                </div>
                                <div class="mb-2 col-md-4">
                                    <label class="d-block text-font">Email ID</label>
                                    <div>
                                    <p><?php echo $detail['email_id']; ?></p>
                                    </div>    
                                </div>
                                <div class="mb-2 col-md-4">
                                    <label class="d-block text-font">Designation</label>
                                    <div>
                                    <p><?php echo $detail['role']; ?></p>
                                    </div>    
                                </div>
                                <div class="mb-2 col-md-4">
                                    <label class="d-block text-font">Branch</label>
                                    <div>
                                    <p><?php echo $detail['branch']; ?></p>
                                    </div>    
                                </div>
                                <div class="mb-2 col-md-4">
                                    <label class="d-block text-font">Post</label>
                                    <div>
                                    <p><?php echo $detail['post']; ?></p>
                                    </div>    
                                </div>
                                <div class="mb-2 col-md-4">
                                    <label class="d-block text-font">Department<sup class="text-danger">*</sup></label>
                                    <div>
                                    <p><?php echo $detail['department']; ?></p>
                                    </div>    
                                </div>
                                <div class="mb-2 col-md-4">
                                    <label class="d-block text-font">Username<sup class="text-danger">*</sup></label>
                                    <div>
                                    <p><?php echo $detail['username']; ?></p>
                                    </div>    
                                </div>
                              </div>
                          </div>
                          <?php if (encryptids("D", $_SESSION['admin_type']) == 1){ ?>
                          <div class="col-md-12 submit_btn p-3">
                               <a class="btn btn-primary btn-sm text-white" onclick="location.href='<?php echo base_url();?>admin/admin_creation_list'">Back</a>
                          </div>  
                          <?php }else if(encryptids("D", $_SESSION['admin_type']) == 2){ ?>
                            <div class="col-md-12 submit_btn p-3">
                            <a class="btn btn-primary btn-sm text-white" onclick="location.href='<?php echo base_url();?>subadmin/admin_creation_list'">Back</a>
                            <?php } ?>
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
                    </div>
                    </div>
<!-- /.container-fluid -->

<!-- </div>
</div>
                    </div>
                   </div> -->
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <!-- <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a> -->