<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Create new post/ live session</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url().'Admin/dashboard';?>" >Sub Admin Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'admin/exchange_forum';?>" >Exchange Forum</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'learningscience/lsv_standards_dashboard';?>" >Classroom</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'learningscience/lsv_standards_list';?>" >Create new</a></li>
                <li class="breadcrumb-item active" aria-current="page">Create new post/ live session</li>
                
            </ol>
        </nav>
    </div>
    <form name="lsv_standards_form" id="lsv_standards_form" action="<?php echo base_url().'learningscience/lsv_standards_form'?>" method="post"enctype="multipart/form-data">
        <!-- Content Row -->
        <!-- Content Row -->
        <div class="row">
            <div class="col-12 mt-3">
                <div class="card border-top">
                    <div class="card-body">
                        <div id="english_div">
                            <div class="row">
                                <div class="mb-2 col-md-4">
                                    <label class="d-block text-font">Type of Post<sup class="text-danger">*</sup></label>
                                    <select id="type_of_post" name="type_of_post" class="form-control input-font" onchange="getval(this.value)">
                                        <option value="" disabled selected>--select--</option>
                                        <option value="1" id="text_div">Text Upload</option>
                                        <option value="2" id="video_div">Video Upload</option>
                                        <option value="3" id="link_div">Live session link</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-2 col-md-8">
                                    <label class="d-block text-font">Title<sup class="text-danger">*</sup></label>
                                    <input type="text" class="form-control input-font" name="title" id="title" placeholder="Enter Title" maxlength="200">
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-2 col-md-12">
                                    <label class="d-block text-font" text-font>Description<sup class="text-danger">*</sup></label>
                                    <textarea class="form-control input-font" placeholder="Enter Description" name="description" id="description" maxlength="2000"></textarea>
                                    
                                </div>
                            </div>
                            <div class="row" id="link_session">
                                <div class="mb-2 col-md-8">
                                    <label class="d-block text-font">Session link<sup class="text-danger">*</sup></label>
                                    <input type="text" class="form-control input-font" name="session_link" id="session_link" placeholder="Enter Title">
                                </div>
                            </div>
                            
                            <div class="row" id="text_image">
                                <div class="mb-2 col-md-4">
                                    <label class="d-block">Upload Image<sup class="text-danger">*</sup></label>
                                    <div class="d-flex">
                                        <div>
                                            <input type="file" id="image" name="image" onchange="loadImage(event)" class="form-control-file"  accept="image/png, image/jpeg,image/jpg">
                                            
                                        </div>
                                        <div>
                                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#ImageModal">
                                            Preview
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal -->
                                <div class="modal fade" id="ImageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" style="max-width:700px;">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="imageModalLabel">Upload Image</h5>
                                                <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span></button>
                                            </div>
                                            <div class="modal-body">
                                                <img id="outpuimage"width="100%"/>
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
                                            <input type="file" id="thumbnail" name="thumbnail" class="form-control-file"  accept="image/png, image/jpeg,image/jpg"onchange="loadThumbnail(event)">
                                            <span class="error_text"></span>
                                        </div>
                                        <div>
                                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#ThumbnailModal">
                                            Preview
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal -->
                                <div class="modal fade" id="ThumbnailModal" tabindex="-1" aria-labelledby="ThumbnailModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" style="max-width:700px;">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="ThumbnailModalLabel">Upload Thumbnail</h5>
                                                <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span></button>
                                            </div>
                                            <div class="modal-body">
                                                <img id="outputhumbnail"width="100%"/>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                
                                
                            </div>
                            <div class="row" id="pdf_upload">
                                <div class="mb-2 col-md-4">
                                    <label class="d-block">Upload PDF</label>
                                    <div class="d-flex">
                                        <div>
                                            <input type="file" id="doc_pdf" name="doc_pdf" class="form-control-file"accept="application/pdf" onchange="loadFilepdf(event)" >
                                            <span class="error_text"></span>
                                        </div>
                                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#PDFModal">
                                        Preview
                                        </button>
                                    </div>
                                </div>
                                <!-- Modal -->
                                <div class="modal fade" id="PDFModal" tabindex="-1" aria-labelledby="PDFModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" style="max-width:1000px;">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabelImg">Upload Preview</h5>
                                                <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span></button>
                                            </div>
                                            <div class="modal-body">
                                                <iframe id="pdffiledata" frameborder="0" scrolling="no" width="950" height="500"></iframe>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                
                                
                            </div>
                            <div class="row" id="video_show">

                                <div class="mb-2 col-md-4">
                                    <label class="d-block">Select Option<sup class="text-danger">*</sup></label>
                                    <div class="d-flex">
                                        <div>
                                            <input type="radio" id="html" name="option" value="1">
                                            <label for="html">Upload Video</label><br>
                                            <input type="radio" id="css" name="option" value="2">
                                            <label for="css">Upload Video URL</label><br>  
                                        </div>
                                        
                                    </div>
                                    <span id="option_err"> </span>
                                </div>
                                </div>

                                 <div class="row" id="video_show2">
                                    <div class="mb-2 col-md-4"id="videoUpload">
                                    <label class="d-block">Upload Video<sup class="text-danger">*</sup></label>
                                    <div class="d-flex">
                                        <div>
                                            <input type="file" id="video" name="video" class="form-control-file"accept="video/mp4,video/mkv"/onchange="loadVideo(event)"  >
                                            <span class="error_text"></span>
                                        </div>
                                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#videoModal">
                                        Preview
                                        </button>
                                    </div>
                                </div>
                                <div class="mb-8 col-md-8" id="urlUpload">
                                    <label class="d-block">Video Link</label>
                                    <input type="url" id="video_url" name="video_url" class="form-control" >
                                    <span class="error_text"></span>
                                </div> 

                                <!-- Modal -->
                                <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="videoModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" style="max-width:700px;">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="videoModalLabel">Upload Video</h5>
                                                <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span></button>
                                            </div>
                                            <div class="modal-body">
                                            <video width="670" height="400" controls id="outputvideo"width="100%"/>  </video>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            
                            
                        </div>
                    </div>
                    <div class="col-md-12 submit_btn p-3">
                        <a class="btn btn-success btn-sm text-white" data-toggle="modal" data-target="#" id="btnsubmitdata">Submit</a>
                         <button onclick="history.back()" class="btn btn-danger btn-sm text-white">Cancel</button> 
                        <input type="reset" class="btn btn-warning btn-sm text-white"  name="Reset">
                        <!-- <a href="lsv_standards_list"class="btn btn-primary btn-sm text-white submit">Back</a> -->
                        <!-- <button onclick="history.back()" class="btn btn-primary btn-sm text-white submit">Back</button> -->
                    </div>
                    
                </div>
            </div>
        </form>
    </div>
    <script>
    $(document).ready(function ()
    {
    CKEDITOR.replace('description');
    $("#text_image").hide();
    $("#pdf_upload").hide();
    $("#link_session").hide();
    $("#video_show").hide();
    $("#video_thumbnail").hide();
    $("#video_show2").hide();

    });
    function getval(argument) {
    if (argument==1)
    {
    $("#text_image").show();
    $("#pdf_upload").show();
    $("#link_session").hide();
    $("#video_show").hide();
    $("#video_thumbnail").show();
    }
    if (argument==2)
    {
    $("#text_image").hide();
    $("#video_thumbnail").show();
    $("#pdf_upload").hide();
    $("#link_session").hide();
    $("#video_show").show();
    }
    if (argument==3)
    {
    $("#text_image").hide();
    $("#video_thumbnail").show();
    $("#pdf_upload").hide();
    $("#link_session").show();
    $("#video_show").hide();
    }
    
    }
    </script>
    <script type="text/javascript">
    $('#btnsubmitdata').click(function(e) {
    e.preventDefault();
    var focusSet = false;
    var allfields = true;
    var type_of_post = $("#type_of_post").val();
    if (type_of_post == "" || type_of_post== null) {
    if ($("#type_of_post").next(".validation").length == 0) // only add if not added
    {
    $("#type_of_post").after("<div class='validation' style='color:red;margin-bottom:15px;'>This value is required </div>");
    }
    if (!focusSet) { $("#type_of_post").focus(); }
    allfields = false;
    } else {
    $("#type_of_post").next(".validation").remove(); // remove it
    }
    // type_of_post--1
    if (type_of_post==1)
    {
    
    var image=$("#image").val();
    if (image == "" || image== null) {
    if ($("#image").next(".validation").length == 0) // only add if not added
    {
    $("#image").after("<div class='validation' style='color:red;margin-bottom:15px;'>This value is required </div>");
    }
    if (!focusSet) { $("#image").focus(); }
    allfields = false;
    } else {
    $("#image").next(".validation").remove(); // remove it
    }
    }
    // type_of_post--1 end
    // type_of_post--2
    if (type_of_post==2)
    {
    

    var option = $('input[name="option"]:checked').val(); 
    if (option == "" || option== null || option== 'undefined' ) {
    if ($("#option").next(".validation").length == 0) // only add if not added
    {
        $("#option_err").after("<div class='validation' style='color:red;margin-bottom:15px;'>This value is required</div>"); 
    }
    if (!focusSet) { $("#option").focus(); }
    allfields = false;
    } else {
    $("#option").next(".validation").remove(); // remove it
    }
    if (option != "" && option!= null && option!= 'undefined') {
    $('input:radio[name="option"]').change(
            function(){
                if (this.checked && this.value == '1') 
                {
                   var video = $("#video").val();
                   if (video == "" || video== null) {
                    if ($("#video").next(".validation").length == 0)
                    {
                        $("#video").after("<div class='validation' style='color:red;margin-bottom:15px;'>This value is required</div>");
                    }
                    if (!focusSet) { $("#video").focus(); }
                    allfields = false;
                    } else {
                    $("#video").next(".validation").remove(); // remove it
                    }
                }
                if (this.checked && this.value == '2') 
                {
                   var video_url = $("#video_url").val();
                   if (video_url == "" || video_url== null) {
                    if ($("#video_url").next(".validation").length == 0)
                    {
                        $("#video_url").after("<div class='validation' style='color:red;margin-bottom:15px;'>This value is required</div>");
                    }
                    if (!focusSet) { $("#video_url").focus(); }
                    allfields = false;
                    } else {
                    $("#video_url").next(".validation").remove(); // remove it
                    }

                }
    });
}
}
    // type_of_post--2 end
    // type_of_post--3
    if (type_of_post==3)
    {
    var session_link = $("#session_link").val();
    if (session_link == "" || session_link== null) {
    if ($("#session_link").next(".validation").length == 0) // only add if not added
    {
    $("#session_link").after("<div class='validation' style='color:red;margin-bottom:15px;'>This value is required</div>");
    }
    if (!focusSet) { $("#session_link").focus(); }
    allfields = false;
    } else {
    $("#session_link").next(".validation").remove(); // remove it
    }
    }
    var title = $("#title").val();
    if (title == "" || title== null) {
    if ($("#title").next(".validation").length == 0) // only add if not added
    {
    $("#title").after("<div class='validation' style='color:red;margin-bottom:15px;'>This value is required</div>");
    }
    if (!focusSet) { $("#title").focus(); }
    allfields = false;
    } else {
    $("#title").next(".validation").remove(); // remove it
    }
    
    var description = CKEDITOR.instances['description'].getData();
    if (description == "" || description== null) {
    if ($("#description").next(".validation").length == 0) // only add if not added
    {
    $("#description").after("<div class='validation' style='color:red;margin-bottom:15px;'>This value is required </div>");
    }
    if (!focusSet) { $("#description").focus(); }
    allfields = false;
    } else {
    $("#description").next(".validation").remove(); // remove it
    }
    var thumbnail = $("#thumbnail").val();
    if (thumbnail == "" || thumbnail== null) {
    if ($("#thumbnail").next(".validation").length == 0) // only add if not added
    {
    $("#thumbnail").after("<div class='validation' style='color:red;margin-bottom:15px;'>This value is required</div>");
    }
    if (!focusSet) { $("#thumbnail").focus(); }
    allfields = false;
    } else {
    $("#thumbnail").next(".validation").remove(); // remove it
    }
    if ($("#image").val() != '')
    {
    var fileSize = $('#image')[0].files[0].size;
    $("#image").next(".validation").remove();
    if (fileSize > 41943040)
    {
    if ($("#image").next(".validation").length == 0) // only add if not added
    {
    $("#image").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please select  file of size less than 5 MB </div>");
    }
    allfields = false;
    if (!focusSet) {
    $("#image").focus();
    }
    }
    else
    {
    $("#image").next(".validation").remove(); // remove it
    }
    var validExtensions = ['jpeg','jpg','png','JPG', 'JPEG', 'PNG']; //array of valid extensions
    var fileName = $("#image").val();;
    var fileNameExt = fileName.substr(fileName.lastIndexOf('.') + 1);
    $("#image").next(".validation").remove();
    if ($.inArray(fileNameExt, validExtensions) == -1)
    {
    if ($("#image").next(".validation").length == 0) // only add if not added
    {
    $("#image").after("<div class='validation' style='color:red;margin-bottom:15px;'>Only Jpeg, jpg,png  file allowed. </div>");
    }
    allfields = false;
    if (!focusSet)
    {
    $("#image").focus();
    }
    }
    else
    {
    $("#image").next(".validation").remove(); // remove it
    }
    }
    if ($("#thumbnail").val() != '')
    {
    var fileSize = $('#thumbnail')[0].files[0].size;
    $("#thumbnail").next(".validation").remove();
    if (fileSize > 41943040)
    {
    if ($("#thumbnail").next(".validation").length == 0) // only add if not added
    {
    $("#thumbnail").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please select  file of size less than 5 MB </div>");
    }
    allfields = false;
    if (!focusSet) {
    $("#thumbnail").focus();
    }
    }
    else
    {
    $("#thumbnail").next(".validation").remove(); // remove it
    }
    var validExtensions = ['jpeg','jpg','png','JPG', 'JPEG', 'PNG']; //array of valid extensions
    var fileName = $("#thumbnail").val();;
    var fileNameExt = fileName.substr(fileName.lastIndexOf('.') + 1);
    $("#thumbnail").next(".validation").remove();
    if ($.inArray(fileNameExt, validExtensions) == -1)
    {
    if ($("#thumbnail").next(".validation").length == 0) // only add if not added
    {
    $("#thumbnail").after("<div class='validation' style='color:red;margin-bottom:15px;'>Only Jpeg,jpg,png  file allowed. </div>");
    }
    allfields = false;
    if (!focusSet)
    {
    $("#thumbnail").focus();
    }
    }
    else
    {
    $("#thumbnail").next(".validation").remove(); // remove it
    }
    }
    if ($("#doc_pdf").val() != '')
    {
    var fileSize = $('#doc_pdf')[0].files[0].size;
    $("#doc_pdf").next(".validation").remove();
    if (fileSize > 41943040)
    {
    if ($("#doc_pdf").next(".validation").length == 0) // only add if not added
    {
    $("#doc_pdf").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please select  file of size less than 5 MB </div>");
    }
    allfields = false;
    if (!focusSet) {
    $("#doc_pdf").focus();
    }
    }
    else
    {
    $("#doc_pdf").next(".validation").remove(); // remove it
    }
    var validExtensions = ['pdf']; //array of valid extensions
    var fileName = $("#doc_pdf").val();
    var fileNameExt = fileName.substr(fileName.lastIndexOf('.') + 1);
    $("#doc_pdf").next(".validation").remove();
    if ($.inArray(fileNameExt, validExtensions) == -1)
    {
    if ($("#doc_pdf").next(".validation").length == 0) // only add if not added
    {
    $("#doc_pdf").after("<div class='validation' style='color:red;margin-bottom:15px;'>Only pdf file allowed. </div>");
    }
    allfields = false;
    if (!focusSet)
    {
    $("#doc_pdf").focus();
    }
    }
    else
    {
    $("#doc_pdf").next(".validation").remove(); // remove it
    }
    }
    if ($("#doc_pdf").val() != '')
    {
    var validExtensions = ['pdf']; //array of valid extensions
    var fileName = $("#doc_pdf").val();;
    var fileNameExt = fileName.substr(fileName.lastIndexOf('.') + 1);
    $("#doc_pdf").next(".validation").remove();
    if ($.inArray(fileNameExt, validExtensions) == -1)
    {
    if ($("#doc_pdf").next(".validation").length == 0) // only add if not added
    {
    $("#doc_pdf").after("<div class='validation' style='color:red;margin-bottom:15px;'>Only PDF file allowed.  </div>");
    }
    allfields = false;
    if (!focusSet)
    {
    $("#doc_pdf").focus();
    }
    }
    else
    {
    $("#doc_pdf").next(".validation").remove(); // remove it
    }
    }

 




   



    
    if (allfields) {
    // $('#create_online_form').submit();
    Swal.fire({
    title: 'Are you sure you want to Submit ?',
    showDenyButton: true,
    showCancelButton: false,
    confirmButtonText: 'Submit',
    denyButtonText: `Cancel`,
    }).then((result) => {
    if (result.isConfirmed) {
    $('#lsv_standards_form').submit();
    } else if (result.isDenied) {
    }
    })
    } else {
    return false;
    }
    
    });</script>
    <script type="text/javascript">
    var loadImage = function(event) {
    $("#loadImage").show();
    var fileSize = $('#image')[0].files[0].size;
    var validExtensions = ['jpg', 'jpeg', 'png','JPG', 'JPEG', 'PNG']; //array of valid extensions
    var fileName = $("#image").val();
    var fileNameExt = fileName.substr(fileName.lastIndexOf('.') + 1);
    
    console.log(fileSize);
    if(fileSize < 20480){
    $('#image').val('');
    Swal.fire('File size should be between 20KB to 200KB')
    }else if(fileSize > 41943040){
    $('#image').val('');
    Swal.fire('File size should be between 20KB to 200KB')
    //   $('#err_icon_file').text('This value is required');
    }else if($.inArray(fileNameExt, validExtensions) == -1){
    $('#image').val('');
    Swal.fire('Only jpg,jpeg,png allowed')
    $('#err_icon_file').text('This value is required');
    }else{
    $('#err_icon_file').text('');
    }
    var loadImage = document.getElementById('outpuimage');
    loadImage.src = URL.createObjectURL(event.target.files[0]);
    loadImage.onload = function() {
    URL.revokeObjectURL(loadImage.src);
    }
    };
    var loadThumbnail = function(event) {
    $("#loadThumbnail").show();
    var fileSize = $('#thumbnail')[0].files[0].size;
    var validExtensions = ['jpg', 'jpeg', 'png','JPG', 'JPEG', 'PNG']; //array of valid extensions
    var fileName = $("#thumbnail").val();;
    var fileNameExt = fileName.substr(fileName.lastIndexOf('.') + 1);
    
    console.log(fileSize);
    if(fileSize < 20480){
    $('#thumbnail').val('');
    Swal.fire('File size should be between 20KB to 200KB')
    }else if(fileSize > 41943040){
    $('#thumbnail').val('');
    Swal.fire('File size should be between 20KB to 200KB')
    //   $('#err_icon_file').text('This value is required');
    }else if($.inArray(fileNameExt, validExtensions) == -1){
    $('#thumbnail').val('');
    Swal.fire('Only jpg,jpeg,png allowed')
    $('#err_icon_file').text('This value is required');
    }else{
    $('#err_icon_file').text('');
    }
    var loadThumbnail = document.getElementById('outputhumbnail');
    loadThumbnail.src = URL.createObjectURL(event.target.files[0]);
    loadThumbnail.onload = function() {
    URL.revokeObjectURL(loadThumbnail.src);
    }
    };
    var loadVideo = function(event) {
    $("#loadThumbnail").show();
    var fileSize = $('#video')[0].files[0].size;
    var validExtensions = ['mkv', 'mp4']; //array of valid extensions
    var fileName = $("#video").val();;
    var fileNameExt = fileName.substr(fileName.lastIndexOf('.') + 1);
    
    console.log(fileSize);
    if(fileSize < 0){
    $('#video').val('');
    Swal.fire('File size should be between 5MB to 40MB1')
    }else if(fileSize > 335544320){
    $('#video').val('');
    Swal.fire('File size should be between 5MB to 40MB')
    //   $('#err_icon_file').text('This value is required');
    }else if($.inArray(fileNameExt, validExtensions) == -1){
    $('#video').val('');
    Swal.fire('Only mkv,mp4 allowed')
    $('#err_icon_file').text('This value is required');
    }else{
    $('#err_icon_file').text('');
    }
    var loadThumbnail = document.getElementById('outputvideo');
    loadThumbnail.src = URL.createObjectURL(event.target.files[0]);
    loadThumbnail.onload = function() {
    URL.revokeObjectURL(loadThumbnail.src);
    }
    };
    var loadFilepdf = function(event) {
    $("#loadThumbnail").show();
    var fileSize = $('#doc_pdf')[0].files[0].size;
    var validExtensions = ['pdf']; //array of valid extensions
    var fileName = $("#doc_pdf").val();;
    var fileNameExt = fileName.substr(fileName.lastIndexOf('.') + 1);
    
    console.log(fileSize);
    if(fileSize < 0){
    $('#doc_pdf').val('');
    Swal.fire('File size should be between 1kb to 5MB')
    }else if(fileSize > 41943040){
    $('#doc_pdf').val('');
    Swal.fire('File size should be between 1kb to 5MB')
    //   $('#err_icon_file').text('This value is required');
    }else if($.inArray(fileNameExt, validExtensions) == -1){
    $('#doc_pdf').val('');
    Swal.fire('Only PDF allowed')
    $('#err_icon_file').text('This value is required');
    }else{
    $('#err_icon_file').text('');
    }
    pdffile=document.getElementById("doc_pdf").files[0];
    pdffile_url=URL.createObjectURL(pdffile);
    $('#pdffiledata').attr('src',pdffile_url);
    
    };


    
    </script>
    <script type="text/javascript">
        $('input:radio[name="option"]').change(
            function(){
                if (this.checked && this.value == '1') 
                {
                    $("#video_show2").show();
                    $("#videoUpload").show();
                    $("#urlUpload").hide(); 

                }
                if (this.checked && this.value == '2') 
                {
                    $("#video_show2").show();
                    $("#urlUpload").show(); 
                    $("#videoUpload").hide();

                }
    });
    </script>