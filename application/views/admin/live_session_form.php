    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Create new post/ live session</h1>
        </div>
      <!-- Content Row -->
        <div class="row">
            <div class="col-12 mt-3">
                <div class="card border-top">
                    <div class="card-body">
                        <div id="english_div">
                        <div class="row">
                                <div class="mb-2 col-md-4">
                                            <label class="d-block text-font">Type of Post<sup class="text-danger">*</sup></label>
                                            <select id="Post" name="Post" class="form-control input-font">
                                                <option value="" selected>--select--</option>
                                                <option value="#" id="text_div">Text Upload</option>
                                                <option value="#" id="video_div">Video Upload</option>
                                                <option value="#" id="link_div">Live session link</option>
                                            </select>
                                </div>
                        </div>
                        <div class="row" id="text_title">
                                <div class="mb-2 col-md-8">
                                    <label class="d-block text-font">Title<sup class="text-danger">*</sup></label>
                                    <input type="text" class="form-control input-font" name="Title" id="Title" placeholder="Enter Title">
                                </div>
                        </div>
                        <div class="row" id="text_description">
                             <div class="mb-2 col-md-12">
                                <label class="d-block text-font" text-font>Description<sup class="text-danger">*</sup></label>
                                <textarea class="form-control input-font" placeholder="Enter Description" name="Description" id="Description"></textarea>
                                
                            </div>
                        </div>
                        <div class="row" id="link_session">
                                <div class="mb-2 col-md-8">
                                    <label class="d-block text-font">Live Session Link<sup class="text-danger">*</sup></label>
                                    <input type="text" class="form-control input-font" name="link" id="link" placeholder="Enter Live Session Link">
                                </div>
                        </div>
                        <div class="row" id="text_image">
                             <div class="mb-2 col-md-4">
                                <label class="d-block">Upload Image<sup class="text-danger">*</sup></label>
                                <div class="d-flex">
                                <div>
                                    <input type="file" id="banner_img" name="banner_img" class="form-control-file" required>
                                    <span class="error_text"></span>
                                </div>
                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    Preview 
                                </button>
                                </div>
                        </div> 
                          <!-- Modal -->
                          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" style="max-width:700px;">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Upload Image</h5>

                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span></button>
                                        </div>
                                        <div class="modal-body">
                                        <img id="outputbanner"width="100%"/>
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button"  onclick="resetbanner()" class="btn btn-secondary" data-bs-dismiss="modal">ReSet</button>
                                        <button type="button" class="btn btn-primary"data-bs-dismiss="modal">Save changes</button>
                                        </div>
                                    </div>
                                    </div>
                                </div>       
                                             
                             
                    </div> 
                    <div class="row" id="video_thumbnail">
                             <div class="mb-2 col-md-4">
                                <label class="d-block">Upload Thumbnail<sup class="text-danger">*</sup></label>
                                <div class="d-flex">
                                <div>
                                    <input type="file" id="banner_img" name="banner_img" class="form-control-file" required>
                                    <span class="error_text"></span>
                                </div>
                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    Preview 
                                </button>
                                </div>
                        </div> 
                          <!-- Modal -->
                          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" style="max-width:700px;">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Upload Thumbnail</h5>

                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span></button>
                                        </div>
                                        <div class="modal-body">
                                        <img id="outputbanner"width="100%"/>
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button"  onclick="resetbanner()" class="btn btn-secondary" data-bs-dismiss="modal">ReSet</button>
                                        <button type="button" class="btn btn-primary"data-bs-dismiss="modal">Save changes</button>
                                        </div>
                                    </div>
                                    </div>
                                </div>       
                                             
                             
                    </div>
                    <div class="row" id="video_show">
                             <div class="mb-2 col-md-4">
                                <label class="d-block">Upload Video<sup class="text-danger">*</sup></label>
                                <div class="d-flex">
                                <div>
                                    <input type="file" id="banner_img" name="banner_img" class="form-control-file" required>
                                    <span class="error_text"></span>
                                </div>
                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    Preview 
                                </button>
                                </div>
                        </div> 
                          <!-- Modal -->
                          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" style="max-width:700px;">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Upload Video</h5>

                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span></button>
                                        </div>
                                        <div class="modal-body">
                                        <img id="outputbanner"width="100%"/>
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button"  onclick="resetbanner()" class="btn btn-secondary" data-bs-dismiss="modal">ReSet</button>
                                        <button type="button" class="btn btn-primary"data-bs-dismiss="modal">Save changes</button>
                                        </div>
                                    </div>
                                    </div>
                                </div>       
                                             
                             
                    </div>
                    </div>
                    <div class="col-md-12 submit_btn p-3">
                                 <a class="btn btn-success btn-sm text-white" data-toggle="modal" data-target="#submitForm">Submit</a>
                                 <a class="btn btn-danger btn-sm text-white" data-toggle="modal" data-target="#cancelForm">Cancel</a>
                    </div> 
                   <!-- Modal -->
                   <div class="modal fade" id="submitForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Submit Form</h5>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Are you sure you want to Submit?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary" data-dismiss="modal" id="saveQueBank">Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal -->
                                    <!-- Modal -->
                                    <div class="modal fade" id="cancelForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Are you sure you want to cancel?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary" onclick="location.href='question_bank_list'">Save changes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal -->       
                </div>
            </div>
        </div>
        <script>
                $("#text_div").click(function() {
                    $("#text_title").show();
                    $("#text_description").show();
                    $("#text_image").show();
                    $("#link_session").hide();
                    $("#video_thumbnail").hide();
                    $("#video_show").hide();
                });
                $("#video_div").click(function() {
                    $("#text_title").show();
                    $("#text_description").show();
                    $("#text_image").show();
                    $("#link_session").hide();
                    $("#video_thumbnail").show();
                    $("#video_show").show();
                });
                $("#link_div").click(function() {
                    $("#text_title").show();
                    $("#text_description").show();
                    $("#text_image").show();
                    $("#link_session").hide();
                    $("#video_thumbnail").hide();
                    $("#video_show").hide();
                });
                
        </script>