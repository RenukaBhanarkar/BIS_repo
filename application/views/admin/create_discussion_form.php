    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Create New Discussion</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url().'Admin/dashboard';?>" >Sub Admin Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'admin/exchange_forum';?>" >Exchange Forum</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'admin/share_your_dashboard';?>" >Share Your Thoughts</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'admin/discussion_forum_dashboard';?>" >Discussion Forum</a></li>
                <li class="breadcrumb-item active" aria-current="page">Create New Discussion</li>
                
                </ol>
            </nav>
        </div>

        <!-- Content Row -->
       <div class="row">
            <div class="col-12 mt-3">
                <div class="card border-top card-body table-responsive">
                    <div class="row">
                            <div class="mb-2 col-md-4">
                                <label class="d-block text-font">Discussion Title</label>
                                <input type="text" class="form-control input-font" name="banner_caption" id="banner_caption" placeholder="Enter discussion Title" value="" required="">
                            </div>
                    </div>
                    <div class="row">
                        <div class="mb-2 col-md-12">
                             <label class="d-block text-font">Description</label>
                             <textarea name="description" id="description"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-2 col-md-4">
                                <label class="d-block">Upload Thumbnail<sup class="text-danger">*</sup></label>
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
                        <div class="mb-2 col-md-4">
                                <label class="d-block text-font">Start Date</label>
                                <input type="date" class="form-control input-font" name="Start" id="Start" value="" required="">
                        </div>
                        <div class="mb-2 col-md-4">
                                <label class="d-block text-font">End Date</label>
                                <input type="date" class="form-control input-font" name="end" id="end" value="" required="">
                        </div>
                    </div>
                    <div class="col-md-12 submit_btn p-3">
                            <a class="btn btn-success btn-sm text-white" data-bs-toggle="modal" data-bs-target="#submitForm">Submit</a>
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
</script>