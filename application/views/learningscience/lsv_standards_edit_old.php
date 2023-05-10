<!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Create new post/ live session</h1>
        </div>

        <form name="lsv_standards_edit" id="lsv_standards_edit" action="<?php echo base_url().'Learningscience/lsv_standards_edit'?>/<?= $lsvStandardsView['id']?>" method="post"enctype="multipart/form-data">
      <!-- Content Row -->
        <div class="row">
            <div class="col-12 mt-3">
                <div class="card border-top">
                    <div class="card-body">
                        <div id="english_div">
                            <div class="row">
                                <input type="hidden" name="lastvideo" value="<?= $lsvStandardsView['video']?>">
                                <input type="hidden" name="lastthumbnail" value="<?= $lsvStandardsView['thumbnail']?>">
                                <input type="hidden" name="lastimage" value="<?= $lsvStandardsView['image']?>">
                                <input type="hidden" name="lastdoc_pdf" value="<?= $lsvStandardsView['doc_pdf']?>">
                                <input type="hidden" name="id" value="<?= $lsvStandardsView['id']?>">
                                <div class="mb-2 col-md-4">
                                    <label class="d-block text-font">Type of Post<sup class="text-danger">*</sup></label>
                                    <select id="type_of_post" name="type_of_post" class="form-control input-font" onchange="getval(this.value)">
                                        <option value="" disabled selected>--select--</option>
                                        <option value="1"
                                        <?php if ($lsvStandardsView['type_of_post'] == '1')  echo 'selected = "selected"'; ?>>Text Upload</option>
                                        <option value="2" <?php if ($lsvStandardsView['type_of_post'] == '2')  echo 'selected = "selected"'; ?>>Video Upload</option>
                                        <option value="3" <?php if ($lsvStandardsView['type_of_post'] == '3')  echo 'selected = "selected"'; ?>>Live session link</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-2 col-md-8">
                                    <label class="d-block text-font">Title<sup class="text-danger">*</sup></label>
                                    <input type="text" class="form-control input-font" name="title" id="title" value="<?= $lsvStandardsView['title']?>" placeholder="Enter Title">
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-2 col-md-12">
                                    <label class="d-block text-font" text-font>Description<sup class="text-danger">*</sup></label>
                                    <textarea class="form-control input-font" placeholder="Enter Description" name="description" id="description"><?= $lsvStandardsView['description']?></textarea>
                                    
                                </div>
                            </div>
                            <div class="row" id="link_session">
                                <div class="mb-2 col-md-8">
                                    <label class="d-block text-font">session link<sup class="text-danger">*</sup></label>
                                    <input type="text" class="form-control input-font" name="session_link" id="session_link" placeholder="Enter Title" value="<?= $lsvStandardsView['session_link']?>">
                                </div>
                            </div>
                            
                            <div class="row" id="text_image">
                                <div class="mb-2 col-md-4">
                                    <?php if(empty($lsvStandardsView['image'])){?>
                                    <label class="d-block">Upload Image<sup class="text-danger">*</sup></label>
                                    <div class="d-flex">
                                        <div>
                                            <input type="file" id="image" name="image" class="form-control-file"  accept="image/png, image/jpeg,image/jpg" onchange="loadFileImage(event)">
                                            <span class="error_text"></span>
                                        </div>
                                        
                                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#ImageModal">
                                        Preview
                                        </button>
                                        <?php } else {?>
                                        <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#LastImageModal">
                                        View Image
                                        </button>&nbsp;
                                        <a onclick="deleteLvsFile(' <?= $lsvStandardsView['id']?> ',1);" data-id='<?php echo $value["id"]; ?>' class="btn btn-danger btn-sm mr-2 delete_img">Delete</a>
                                        <?php } ?>
                                    </div>
                                </div>
                                <!-- Modal -->
                                <div class="modal fade" id="LastImageModal" tabindex="-1" aria-labelledby="LastimageModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" style="max-width:700px;">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="LastimageModalLabel">Last Uploaded Image</h5>
                                                <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span></button>
                                            </div>
                                            <div class="modal-body">
                                                <img src="<?= base_url()?><?= $lsvStandardsView['image']?>" width="100%"/>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-primary"data-bs-dismiss="modal">Save </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="ImageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" style="max-width:700px;">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="imageModalLabel">Upload Image</h5>
                                                <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span></button>
                                            </div>
                                            <div class="modal-body">
                                                <img id="outputimage"width="100%"/>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button"  onclick="resetimage()" class="btn btn-secondary" data-bs-dismiss="modal">ReSet</button>
                                                <button type="button" class="btn btn-primary"data-bs-dismiss="modal">Save changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                
                            </div>
                            <div class="row" id="video_thumbnail">
                                <div class="mb-2 col-md-4">
                                    <?php if(empty($lsvStandardsView['thumbnail'])){?>
                                    <label class="d-block">Upload Thumbnail<sup class="text-danger">*</sup></label>
                                    <div class="d-flex">
                                        <div>
                                            <input type="file" id="thumbnail" name="thumbnail" class="form-control-file"  accept="image/png, image/jpeg,image/jpg"onchange="loadFileThumbnail(event)">
                                            <span class="error_text"></span>
                                        </div>
                                        
                                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#ThumbnailModal">
                                        Preview
                                        </button>
                                        <?php } else {?>
                                        <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#LastThumbnailModal">
                                        View  Thumbnail
                                        </button>
                                        <a onclick="deleteLvsFile(' <?= $lsvStandardsView['id']?> ',2);" data-id='<?php echo $value["id"]; ?>' class="btn btn-danger btn-sm mr-2 delete_img">Delete</a>
                                        <?php }?>
                                    </div>
                                </div>
                                
                                <div class="modal fade" id="LastThumbnailModal" tabindex="-1" aria-labelledby="lastThumbnailModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" style="max-width:700px;">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="lastThumbnailModalLabel">Last Upload Thumbnail</h5>
                                                <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span></button>
                                            </div>
                                            <div class="modal-body">
                                                <img  src="<?= base_url()?><?= $lsvStandardsView['thumbnail']?>"width="100%"/>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-primary"data-bs-dismiss="modal">Close </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="ThumbnailModal" tabindex="-1" aria-labelledby="ThumbnailModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" style="max-width:700px;">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="ThumbnailModalLabel">Upload Thumbnail</h5>
                                                <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span></button>
                                            </div>
                                            <div class="modal-body">
                                                <img id="outputThumbnail"width="100%"/>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button"  onclick="resetThumbnail()" class="btn btn-secondary" data-bs-dismiss="modal">ReSet</button>
                                                <button type="button" class="btn btn-primary"data-bs-dismiss="modal">Save changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row" id="pdf_upload">
                                <div class="mb-2 col-md-4">
                                    <?php if(empty($lsvStandardsView['doc_pdf'])){?>
                                    <label class="d-block">Upload PDF<sup class="text-danger">*</sup></label>
                                    <div class="d-flex">
                                        <div>
                                            <input type="file" id="doc_pdf" name="doc_pdf" class="form-control-file"accept="application/pdf" / >
                                        </div>
                                        
                                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#ThumbnailModal">
                                        Preview
                                        </button>
                                        <?php } else {?>
                                        <a href="<?= base_url()?><?= $lsvStandardsView['doc_pdf']?>"class="btn btn-info  btn-sm" target="_blank" >View PDF</a>
                                        <a onclick="deleteLvsFile(' <?= $lsvStandardsView['id']?> ',3);" data-id='<?php echo $value["id"]; ?>' class="btn btn-danger btn-sm mr-2 delete_img">Delete</a>
                                        <?php }?>
                                    </div>
                                </div>
                                
                                
                                
                            </div>
                            <div class="row" id="video_show">
                                <div class="mb-2 col-md-4">
                                    
                                    <label class="d-block">Upload Video<sup class="text-danger">*</sup></label>
                                    <div class="d-flex">
                                        <div>
                                            <input type="file" id="video" name="video" class="form-control-file"accept="video/mp4,video/mkv"/ >
                                            <span class="error_text"></span>
                                        </div>
                                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#videoModal">
                                        Preview
                                        </button>
                                    </div>
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
                            <a class="btn btn-success btn-sm text-white" data-toggle="modal" data-target="#"id="btnsubmitdata">Submit</a>
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
                                        <input type="submit" name="Submit" class="btn btn-success btn-sm text-white" id="btnsubmit">
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
                                        <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Are you sure you want to cancel?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary" onclick="location.href='question_bank_list'">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal -->
                    </div>
                </div>
            </form>
        </div>
        <div class="modal fade" id="updatemodel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete <span class="sms"></span> </h5>
                        <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to Delete <span class="sms"> </span> ?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-danger updatestatus" data-bs-dismiss="modal">Delete</button>
                    </div>
                </div>
            </div>
        </div>
        <script>
        $(document).ready(function ()
        {   CKEDITOR.replace('description');
        
        
        var argument="<?= $lsvStandardsView['type_of_post']?>";
        getval(argument)
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
        $("#type_of_post").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please Select Type of Post </div>");
        }
        if (!focusSet) { $("#type_of_post").focus(); }
        allfields = false;
        } else {
        $("#type_of_post").next(".validation").remove(); // remove it
        }
        if (type_of_post==3)
        {
        var session_link = $("#session_link").val();
        if (session_link == "" || session_link== null) {
        if ($("#session_link").next(".validation").length == 0) // only add if not added
        {
        $("#session_link").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please Enter session link</div>");
        }
        if (!focusSet) { $("#session_link").focus(); }
        allfields = false;
        } else {
        $("#session_link").next(".validation").remove(); // remove it
        }
        }
        // type_of_post--3 end
        
        var title = $("#title").val();
        if (title == "" || title== null) {
        if ($("#title").next(".validation").length == 0) // only add if not added
        {
        $("#title").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please Enter  Title </div>");
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
        $("#description").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please Enter description </div>");
        }
        if (!focusSet) { $("#description").focus(); }
        allfields = false;
        } else {
        $("#description").next(".validation").remove(); // remove it
        }
        var doc_pdfdata="<?= $lsvStandardsView['doc_pdf']?>";
        if (type_of_post==1 && doc_pdfdata=='')
        {
        var doc_pdf=$("#doc_pdf").val();
        if (doc_pdf == "" || doc_pdf== null) {
        if ($("#doc_pdf").next(".validation").length == 0) // only add if not added
        {
        $("#doc_pdf").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please  Upload PDF </div>");
        }
        if (!focusSet) { $("#doc_pdf").focus(); }
        allfields = false;
        } else {
        $("#doc_pdf").next(".validation").remove(); // remove it
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
        var fileName = $("#doc_pdf").val();;
        var fileNameExt = fileName.substr(fileName.lastIndexOf('.') + 1);
        $("#doc_pdf").next(".validation").remove();
        if ($.inArray(fileNameExt, validExtensions) == -1)
        {
        if ($("#doc_pdf").next(".validation").length == 0) // only add if not added
        {
        $("#doc_pdf").after("<div class='validation' style='color:red;margin-bottom:15px;'>Only PDF  file allowed. </div>");
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
        }


        var thumbnaildata="<?= $lsvStandardsView['thumbnail']?>";
        if (thumbnaildata=='')
        {
        var thumbnail=$("#thumbnail").val();
        if (thumbnail == "" || thumbnail== null) {
        if ($("#thumbnail").next(".validation").length == 0) // only add if not added
        {
        $("#thumbnail").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please  Upload thumbnail Image </div>");
        }
        if (!focusSet) { $("#thumbnail").focus(); }
        allfields = false;
        } else {
        $("#thumbnail").next(".validation").remove(); // remove it
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
        var validExtensions = ['jpeg','jpg','png']; //array of valid extensions
        var fileName = $("#thumbnail").val();;
        var fileNameExt = fileName.substr(fileName.lastIndexOf('.') + 1);
        $("#thumbnail").next(".validation").remove();
        if ($.inArray(fileNameExt, validExtensions) == -1)
        {
        if ($("#thumbnail").next(".validation").length == 0) // only add if not added
        {
        $("#thumbnail").after("<div class='validation' style='color:red;margin-bottom:15px;'>Only Jpeg, jpg,png  file allowed. </div>");
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
        }



        var imagedata="<?= $lsvStandardsView['image']?>";
        if (type_of_post==1 && imagedata=='')
        {
        var image=$("#image").val();
        if (image == "" || image== null) {
        if ($("#image").next(".validation").length == 0) // only add if not added
        {
        $("#image").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please  Upload Image </div>");
        }
        if (!focusSet) { $("#image").focus(); }
        allfields = false;
        } else {
        $("#image").next(".validation").remove(); // remove it
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
        var validExtensions = ['jpeg','jpg','png']; //array of valid extensions
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
        }


        var videodata="<?= $lsvStandardsView['video']?>";
        if (type_of_post==2 && videodata=='')
        {
        var video=$("#video").val();
        if (video == "" || video== null) {
        if ($("#video").next(".validation").length == 0) // only add if not added
        {
        $("#video").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please  Upload video </div>");
        }
        if (!focusSet) { $("#video").focus(); }
        allfields = false;
        } else {
        $("#video").next(".validation").remove(); // remove it
        }
        if ($("#video").val() != '')
        { 
        var validExtensions = ['mp4','mkv']; //array of valid extensions
        var fileName = $("#video").val();;
        var fileNameExt = fileName.substr(fileName.lastIndexOf('.') + 1);
        $("#video").next(".validation").remove();
        if ($.inArray(fileNameExt, validExtensions) == -1)
        {
        if ($("#video").next(".validation").length == 0) // only add if not added
        {
        $("#video").after("<div class='validation' style='color:red;margin-bottom:15px;'>Only MP4, MKV  file allowed. </div>");
        }
        allfields = false;
        if (!focusSet)
        {
        $("#video").focus();
        }
        }
        else
        {
        $("#video").next(".validation").remove(); // remove it
        }
        }
        }


         
        if (allfields) {
        $("#submitForm").show();
        $('#lsv_standards_edit').submit();
        } else {
        return false;
        }
        });
        var loadFileImage = function(event)
        {
        $("#outputimage").show();
        var outputimage = document.getElementById('outputimage');
        outputimage.src = URL.createObjectURL(event.target.files[0]);
        outputimage.onload = function()
        {
        URL.revokeObjectURL(outputimage.src);
        }
        };
        function resetimage()
        {
        $("#image").val('');
        $("#outputimage").hide();
        }
        var loadFileThumbnail = function(event)
        {
        $("#outputThumbnail").show();
        var outputThumbnail = document.getElementById('outputThumbnail');
        outputThumbnail.src = URL.createObjectURL(event.target.files[0]);
        outputThumbnail.onload = function()
        {
        URL.revokeObjectURL(outputThumbnail.src);
        }
        };
        function resetThumbnail()
        {
        $("#thumbnail").val('');
        $("#outputThumbnail").hide();
        }
        var loadFilevideo = function(event)
        {
        $("#outputvideo").show();
        var outputvideo = document.getElementById('outputvideo');
        outputvideo.src = URL.createObjectURL(event.target.files[0]);
        outputvideo.onload = function()
        {
        URL.revokeObjectURL(outputvideo.src);
        }
        };
        function resetvideo()
        {
        $("#video").val('');
        $("#outputvideo").hide();
        }
        </script>
        <script type="text/javascript">
        function deleteLvsFile(id,val)
        {
        console.log(val)
        if (val==1)  { $(".sms").text('Image'); }
        if (val==2)  { $(".sms").text('Video'); }
        $('#updatemodel').modal('show');
        $('.updatestatus').on('click', function()
        {
        $.ajax({
        type: 'POST',
        url: '<?php echo base_url(); ?>Learningscience/deleteLvsFile',
        data: {
        id: id,
        val: val,
        },
        success: function(result)
        {
        location.reload();
        },
        error: function(result) {
        alert("Error,Please try again.");
        }
        });
        });
        }
        </script> 