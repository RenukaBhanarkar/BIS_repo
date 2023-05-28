    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Create New Competition</h1>
            <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url().'admin/exchange_forum';?>" >Exchange Forum</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'quiz/organizing_quiz';?>" >Competition</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'Standardswritting/standard_offline_dashboard';?>" >Standard Writting Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'Standardswritting/standard_online_dashboard';?>" >Standard Writting</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'Standardswritting/create_online_list';?>" >Create New Competition</a></li>
                <!-- <li class="breadcrumb-item active" aria-current="page">Create New Competition</li> -->
                
                </ol>
            </nav>
        </div>

        <!-- Content Row -->
       <div class="row">
            <div class="col-12 mt-3">
                <div class="card border-top card-body">
                    <!-- <div class="row">
                    <div class="mb-2 col-4">
                                <label class="d-block text-font">Standard Club<sup class="text-danger">*</sup></label>
                                <select id="Available" name="Available" class="form-control input-font" value="">
                                <option value="" selected disabled>--select--</option>
                                    <option value="1">Standard</option>
                                    <option value="1">Standard</option>
                                    <option value="1">Standard</option>
                                    <option value="1">Standard</option>
                                    <option value="1">Standard</option>
                                </select>
                        </div>
                    </div> -->
                    <div class="row">
                            <div class="mb-2 col-md-12">
                                <label class="d-block text-font">Title of Competition</label>
                                <input type="text" class="form-control input-font" name="Competition" id="Competition" placeholder="Enter Title of Competition" value="" required="">
                            </div>
                    </div>
                    <div class="row">
                            <div class="mb-2 col-md-12">
                                <label class="d-block text-font">Title of Competition in Hindi</label>
                                <input type="text" class="form-control input-font" name="Competition" id="Competition" placeholder="Enter Topic of Activity" value="" required="">
                            </div>
                    </div>
                    <div class="row">
                        <div class="mb-2 col-md-12">
                             <label class="d-block text-font">Description/About Competition<sup class="text-danger">*</sup></label>
                             <textarea name="description" id="description" required></textarea>
                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-2 col-md-12">
                             <label class="d-block text-font">Terms & Conditions<sup class="text-danger">*</sup></label>
                             <textarea name="terms_conditions" id="terms" ></textarea>
                             
                        </div>
                    </div>
                    <div class="row">
                            <div class="mb-2 col-md-4">
                                <label class="d-block text-font">Start Date</label>
                                <input type="date" class="form-control input-font" name="Date" id="Date"  value="" required="">
                            </div>
                            <div class="mb-2 col-md-4">
                                <label class="d-block text-font">Start Time</label>
                                <input type="time" class="form-control input-font" name="Time"  id="Time"  value="" required="">
                            </div>
                            <div class="mb-2 col-md-4">
                                <label class="d-block text-font">End Date</label>
                                <input type="date" class="form-control input-font" name="Date"  id="Date"  value="" required="">
                            </div>
                            <div class="mb-2 col-md-4">
                                <label class="d-block text-font">End Time</label>
                                <input type="time" class="form-control input-font" name="time"  id="time"  value="" required="">
                            </div>
                            <div class="mb-2 col-md-4">
                                <label class="d-block text-font">Upload Thumbnail<sup class="text-danger">*</sup><sup class="text-danger">*</sup></label>
                                <div class="d-flex">
                                <div class="col-9">
                                    <input type="file" id="thumbnail" name="thumbnail" class="form-control-file" accept="image/png, image/jpeg,image/jpg" required="" onchange="loadThumbnail(event)">
                                    <span class="error_text"></span>
                                    <div class="invalid-feedback">
                                    This value is required
                                    </div>
                                </div>
                                <div class="col-2">
                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#ThumbnailModal" fdprocessedid="3a6f0r">
                                    Preview 
                                </button>
                                </div>
                                </div>
                            </div>
                            <div class="mb-2 col-md-4">
                                <label class="d-block text-font">Total Marks</label>
                                <input type="text" class="form-control input-font" name="Marks" id="Marks" placeholder="Enter Total Marks" value="" required="">
                            </div>
                            <div class="mb-2 col-md-4">
                                <label class="d-block text-font">Qualifying Marks</label>
                                <input type="text" class="form-control input-font" name="Marks" id="Marks" placeholder="Enter Qualifying Marks" value="" required="">
                            </div>
                            <div class="mb-2 col-4">
                                <label class="d-block text-font">Level of Competition<sup class="text-danger">*</sup></label>
                                <select id="Competition" name="Competition" class="form-control input-font" value="">
                                <option value="" selected disabled>--select--</option>
                                    <option value="1">Region Level</option>
                                    <option value="1">Branch Level</option>
                                    <option value="1">State Level</option>
                                    <option value="1">All India Level</option>
                                </select>
                            </div>
                            <div class="mb-2 col-4">
                                <label class="d-block text-font">Branch Level<sup class="text-danger">*</sup></label>
                                <select id="Competition" name="Competition" class="form-control input-font" value="">
                                <option value="" selected disabled>--select--</option>
                                    <option value="1">Branch</option>
                                    <option value="1">Branch</option>
                                    <option value="1">Branch</option>
                                </select>
                            </div>
                    </div>
                    <div class="row">
                            <div class="mb-2 col-4">
                                <label class="d-block text-font">Availabile for<sup class="text-danger">*</sup></label>
                                <select id="Competition" name="Competition" class="form-control input-font" value="">
                                <option value="" selected disabled>--select--</option>
                                    <option value="1">School</option>
                                    <option value="1">Higher Institution</option>
                                    <option value="1">Branch</option>
                                </select>
                            </div>
                            <div class="mb-2 col-8">
                        <label class="d-block text-font">Standard<sup class="text-danger">*</sup></label>
                                <div class="d-flex">
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="1" name="" class="custom-control-input"  id="Standard_1"  >
                                        <label class="custom-control-label" for="Standard_1">9<sup>th</sup>Standard</label>
                                    </div>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="1" name="" class="custom-control-input"  id="Standard_2"  >
                                        <label class="custom-control-label" for="Standard_2">10<sup>th</sup>Standard</label>
                                    </div>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="1" name="" class="custom-control-input"  id="Standard_3"  >
                                        <label class="custom-control-label" for="Standard_3">11<sup>th</sup>Standard</label>
                                    </div>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="1" name="" class="custom-control-input"  id="Standard_4">
                                        <label class="custom-control-label" for="Standard_4">12s<sup>th</sup>Standard</label>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
                <div class="card-header p-2" style="background-color: #cdd4e0; text-align: center;">
            	     <h4 class="m-0">Prize Details</h4>
                </div>
                <div class="card card-body">
                    <div class="col-md-3 prizes-section" style="margin-left: -21px;">
                                <h4 class="m-2">First Prize</h4>
                    </div>
                    <div class="row">
                            <div class="mb-2 col-md-4">
                                <label class="d-block text-font">Number of Prize</label>
                                <input type="text" class="form-control input-font" name="Prizes" id="Prizes" placeholder="Enter Prizes" value="" required="">
                            </div>
                            <div class="mb-2 col-md-4">
                                <label class="d-block text-font">Number of Prize</label>
                                <input type="text" class="form-control input-font" name="Prizes" id="Prizes" placeholder="Enter Prizes" value="" required="">
                            </div>
                            <div class="mb-2 col-md-4">
                                <label class="d-block">Uploads<sup class="text-danger">*</sup></label>
                                <div class="d-flex">
                                <div>
                                    <input type="file" id="thumbnail" name="thumbnail" class="form-control-file" accept="image/png, image/jpeg,image/jpg" onchange="loadThumbnail(event)">
                                    <span class="error_text"></span>
                                </div>
                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#ThumbnailModal" fdprocessedid="3a6f0r">
                                    Preview 
                                </button>
                                </div>
                        </div>
                    </div>
                    <div class="col-md-3 prizes-section mt-2" style="margin-left: -21px;">
                                <h4 class="m-2">Second Prize</h4>
                    </div>
                    <div class="row">
                            <div class="mb-2 col-md-4">
                                <label class="d-block text-font">Number of Prize</label>
                                <input type="text" class="form-control input-font" name="Prizes" id="Prizes" placeholder="Enter Prizes" value="" required="">
                            </div>
                            <div class="mb-2 col-md-4">
                                <label class="d-block text-font">Number of Prize</label>
                                <input type="text" class="form-control input-font" name="Prizes" id="Prizes" placeholder="Enter Prizes" value="" required="">
                            </div>
                            <div class="mb-2 col-md-4">
                                <label class="d-block">Uploads<sup class="text-danger">*</sup></label>
                                <div class="d-flex">
                                <div>
                                    <input type="file" id="thumbnail" name="thumbnail" class="form-control-file" accept="image/png, image/jpeg,image/jpg" onchange="loadThumbnail(event)">
                                    <span class="error_text"></span>
                                </div>
                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#ThumbnailModal" fdprocessedid="3a6f0r">
                                    Preview 
                                </button>
                                </div>
                        </div>
                    </div>
                    <div class="col-md-3 prizes-section mt-2" style="margin-left: -21px;">
                                <h4 class="m-2">Third Prize</h4>
                    </div>
                    <div class="row">
                            <div class="mb-2 col-md-4">
                                <label class="d-block text-font">Number of Prize</label>
                                <input type="text" class="form-control input-font" name="Prizes" id="Prizes" placeholder="Enter Prizes" value="" required="">
                            </div>
                            <div class="mb-2 col-md-4">
                                <label class="d-block text-font">Number of Prize</label>
                                <input type="text" class="form-control input-font" name="Prizes" id="Prizes" placeholder="Enter Prizes" value="" required="">
                            </div>
                            <div class="mb-2 col-md-4">
                                <label class="d-block">Uploads<sup class="text-danger">*</sup></label>
                                <div class="d-flex">
                                <div>
                                    <input type="file" id="thumbnail" name="thumbnail" class="form-control-file" accept="image/png, image/jpeg,image/jpg" onchange="loadThumbnail(event)">
                                    <span class="error_text"></span>
                                </div>
                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#ThumbnailModal" fdprocessedid="3a6f0r">
                                    Preview 
                                </button>
                                </div>
                        </div>
                    </div>
                    <div class="col-md-3 prizes-section mt-2" style="margin-left: -21px;">
                                <h4 class="m-2">Consolation Prize</h4>
                    </div>
                    <div class="row">
                            <div class="mb-2 col-md-4">
                                <label class="d-block text-font">Number of Prize</label>
                                <input type="text" class="form-control input-font" name="Prizes" id="Prizes" placeholder="Enter Prizes" value="" required="">
                            </div>
                            <div class="mb-2 col-md-4">
                                <label class="d-block text-font">Number of Prize</label>
                                <input type="text" class="form-control input-font" name="Prizes" id="Prizes" placeholder="Enter Prizes" value="" required="">
                            </div>
                            <div class="mb-2 col-md-4">
                                <label class="d-block">Uploads<sup class="text-danger">*</sup></label>
                                <div class="d-flex">
                                <div>
                                    <input type="file" id="thumbnail" name="thumbnail" class="form-control-file" accept="image/png, image/jpeg,image/jpg" onchange="loadThumbnail(event)">
                                    <span class="error_text"></span>
                                </div>
                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#ThumbnailModal" fdprocessedid="3a6f0r">
                                    Preview 
                                </button>
                                </div>
                        </div>
                    </div>
                    <div class="col-md-12 submit_btn p-3">
                            <a class="btn btn-success btn-sm text-white" data-bs-toggle="modal" data-bs-target="#submitForm">Update</a>
                            <a class="btn btn-danger btn-sm text-white" data-bs-toggle="modal" data-bs-target="#cancelForm">Cancel</a>
                            <input type="reset" name="Reset" class="btn btn-warning btn-sm text-white">
                    </div>
                </div>
                
                
            </div>
            
        </div>
        
    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
 </body>
                                  <!-- Modal -->
                                    <div class="modal fade" id="archivesForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Archive</h5>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Are you sure you want to Archive?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                                    <button type="button" class="btn btn-primary" data-dismiss="modal" id="saveQueBank">Archive</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal -->
                                      <!-- Modal -->
                                      <div class="modal fade" id="createForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Create Form</h5>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Are you sure you want to Create?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                                    <button type="button" class="btn btn-primary" data-dismiss="modal" id="saveQueBank">Create</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal -->
                                      <!-- Modal -->
                                      <div class="modal fade" id="editForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Edit Form</h5>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Are you sure you want to Edit?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                                    <button type="button" class="btn btn-primary" data-dismiss="modal" id="saveQueBank">Edit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal -->
                                      <!-- Modal -->
                                      <div class="modal fade" id="deleteForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">delete</h5>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Are you sure you want to delete?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                                    <button type="button" class="btn btn-primary" data-dismiss="modal" id="saveQueBank">delete</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal -->
<script>
        CKEDITOR.replace( 'description' );
        CKEDITOR.replace( 'terms' );
</script>