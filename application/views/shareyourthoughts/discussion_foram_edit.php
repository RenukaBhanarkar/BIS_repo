<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Discussion</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url().'Admin/dashboard';?>" >Sub Admin Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'admin/exchange_forum';?>" >Exchange Forum</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'Shareyourthoughts/share_your_dashboard';?>" >Share Your Thoughts</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'Shareyourthoughts/discussion_forum_dashboard';?>" >Discussion Forum</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Discussion</li>
                
            </ol>
        </nav>
    </div>
    <!-- Content Row -->
    <form name="discussion_foram_edit" id="discussion_foram_edit" action="<?php echo base_url().'Shareyourthoughts/discussion_foram_edit/'?><?= $getData['id']?>" method="post"enctype="multipart/form-data">
        <div class="row">
            <div class="col-12 mt-3">
                <div class="card border-top card-body table-responsive">
                    <div class="row">
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Discussion Title</label>
                            <input type="text" class="form-control input-font" name="title" id="title" placeholder="Enter discussion Title" value="<?= $getData['title']?>">
                            <input type="hidden" name="old_img" id="old_img" value="<?= $getData['image']?>">
                            <input type="hidden" name="id" id="id"  value="<?= $getData['id']?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-2 col-md-12">
                            <label class="d-block text-font">Description</label>
                            <textarea name="description" id="description"><?= $getData['description']?></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <?php if (empty($getData['image']) || $getData['image']=='' ) {?> 
                            <div class="mb-2 col-md-4">
                            <label class="d-block">Upload Thumbnail<sup class="text-danger">*</sup></label>
                            <div class="d-flex">
                                <div>
                                    <input type="file" id="image" name="image" class="form-control-file" accept="image/png, image/jpeg,image/jpg" onchange="loadImage(event)">
                                    <span class="error_text"></span>
                                </div>
                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#ThumbnailModal" fdprocessedid="3a6f0r">
                                Preview
                                </button>
                                <div class="modal fade" id="ThumbnailModal" tabindex="-1" aria-labelledby="ThumbnailModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" style="max-width:700px;">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="ThumbnailModalLabel">Upload Thumbnail</h5>
                                                <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span></button>
                                            </div>
                                            <div class="modal-body">
                                                <img id="outpuimage"width="100%"/>
                                            </div>
                                             
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } else {?>
                            <div class="mb-2 col-md-4">
                            <label class="d-block">Uploaded Thumbnail Image<sup class="text-danger">*</sup></label>
                            <div class="d-flex">
                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#ThumbnailModal2" fdprocessedid="3a6f0r"> View
                                </button>&nbsp;
                                <button type="button" class="btn btn-danger btn-sm" onclick="DeleteImageDiscussionForum(<?=$getData['id']?>)"> Delete </button>
                                <div class="modal fade" id="ThumbnailModal2" tabindex="-1" aria-labelledby="ThumbnailModalLabel2" aria-hidden="true">
                                    <div class="modal-dialog" style="max-width:700px;">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="ThumbnailModalLabel2">Upload Thumbnail</h5>
                                                <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span></button>
                                            </div>
                                            <div class="modal-body">
                                                <img id="outpuimage" src="<?= base_url();?><?=$getData['image']?>"width="100%"/>
                                            </div>
                                            <div class="modal-footer"> 
                                                <button type="button" class="btn btn-primary"data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Start Date</label>
                            <input type="date" class="form-control input-font" name="start_date" id="start_date" value="<?= $getData['start_date']?>">
                        </div>
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">End Date</label>
                            <input type="date" class="form-control input-font" name="end_date" id="end_date" value="<?= $getData['end_date']?>">
                        </div>
                    </div>
                    
                </div>
                
            </div>
            
        </div>
    </form>
    <div class="col-md-12 submit_btn p-3">
        <a class="btn btn-success btn-sm text-white" id="btnsubmitdata">Submit</a>
        <button onclick="history.back()" class="btn btn-primary btn-sm text-white">Back</button> 
    </div>
</div>

</div>
 

 
</body>
 
<script>
CKEDITOR.replace( 'description' );
</script>

<script type="text/javascript">
    $('#btnsubmitdata').click(function(e) 
    { 
        e.preventDefault();
        var focusSet = false;
        var allfields = true;

        var title = $("#title").val();
        if (title == "" || title== null) 
        {
            if ($("#title").next(".validation").length == 0) 
            {
                $("#title").after("<div class='validation' style='color:red;margin-bottom:15px;'>This value required.</div>");
            }
            if (!focusSet) { $("#title").focus(); }
            allfields = false;
        } 
        else 
        {
            $("#title").next(".validation").remove();
        } 


        var start_date = $("#start_date").val();
        if (start_date == "" || start_date== null) 
        {
            if ($("#start_date").next(".validation").length == 0) 
            {
                $("#start_date").after("<div class='validation' style='color:red;margin-bottom:15px;'>This value required.</div>");
            }
            if (!focusSet) { $("#start_date").focus(); }
            allfields = false;
        } 
        else 
        {
            $("#start_date").next(".validation").remove();
        }

        var end_date = $("#end_date").val();
        if (end_date == "" || end_date== null) 
        {
            if ($("#end_date").next(".validation").length == 0) 
            {
                $("#end_date").after("<div class='validation' style='color:red;margin-bottom:15px;'>This value required.</div>");
            }
            if (!focusSet) { $("#end_date").focus(); }
            allfields = false;
        } 
        else 
        {
            $("#end_date").next(".validation").remove();
        }
 

        var description = CKEDITOR.instances['description'].getData(); 
        if (description == "" || description== null) 
        {
            if ($("#description").next(".validation").length == 0)
            {
                $("#description").after("<div class='validation' style='color:red;margin-bottom:15px;'>This value required.</div>");
            }
            if (!focusSet) { $("#description").focus(); }
            allfields = false;
        }
        else 
        {
            $("#description").next(".validation").remove();
        }

        var oldimg="<?=$getData['image']?>";
        if (oldimg=='') {
            console.log("hi");

        var image = $("#image").val();
        if (image == "" || image== null) 
        {
            if ($("#image").next(".validation").length == 0) // only add if not added
            {
                $("#image").after("<div class='validation' style='color:red;margin-bottom:15px;'>This value required.</div>");
            }
            if (!focusSet) { $("#image").focus(); }
            allfields = false;
        } 
        else 
        {
            $("#image").next(".validation").remove();
        }
        if ($("#image").val() != '')
        {
            var fileSize = $('#image')[0].files[0].size;
            $("#image").next(".validation").remove();
            if (fileSize > 41943040)
            {
                if ($("#image").next(".validation").length == 0)
                {
                    $("#image").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please select  file of size less than 5 MB </div>");
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
            var validExtensions = ['jpeg','jpg','png','JPG', 'JPEG', 'PNG']; //array of valid extensions
            var fileName = $("#image").val();;
            var fileNameExt = fileName.substr(fileName.lastIndexOf('.') + 1);
            $("#image").next(".validation").remove();
            if ($.inArray(fileNameExt, validExtensions) == -1) 
            {
                if ($("#image").next(".validation").length == 0)
                {
                    $("#image").after("<div class='validation' style='color:red;margin-bottom:15px;'>Only Jpeg, jpg,png  file allowed. </div>");
                }
                allfields = false;
                if (!focusSet) { $("#image").focus(); }
            } 
            else 
            { $("#image").next(".validation").remove(); }
        }
    }
        

        if (allfields) {
    // $('#create_online_form').submit();
    Swal.fire({
    title: 'Are you sure you want to Update ?',
    showDenyButton: true,
    showCancelButton: false,
    confirmButtonText: 'Update',
    denyButtonText: `Cancel`,
    }).then((result) => {
    if (result.isConfirmed) {
    $('#discussion_foram_edit').submit();
    } else if (result.isDenied) {
    }
    })
    } else {
    return false;
    }
    });
</script>

<script type="text/javascript">
 
function DeleteImageDiscussionForum(id)
{ 
  Swal.fire({
    title: 'Do you want to Delete ?',
    showDenyButton: true,
    showCancelButton: false,
    confirmButtonText:'Delete',
    denyButtonText: `Cancel`,
  }).then((result) => { 
    if (result.isConfirmed) 
    { 
      $.ajax({
        type: 'POST',
        url: '<?php echo base_url(); ?>Shareyourthoughts/DeleteImageDiscussionForum',
        data: 
        {
            id: id, 
        },
        success: function(result)
        {
            alert("Image Deleted.");
            location.reload();
        },
        error: function(result) {
            alert("Error,Please try again.");
        }
    });
    }  
  })
}

 
</script> 

<script type="text/javascript">
var loadImage = function(event) {
    $("#loadImage").show();
    var fileSize = $('#image')[0].files[0].size;
    var validExtensions = ['jpg', 'jpeg', 'png','JPG', 'JPEG', 'PNG']; //array of valid extensions
    var fileName = $("#image").val();;
    var fileNameExt = fileName.substr(fileName.lastIndexOf('.') + 1);
    
    console.log(fileSize);
    if(fileSize < 20480){
    $('#image').val('');
    Swal.fire('File size should be between 20KB to 5MB')
    }else if(fileSize > 41943040){
    $('#image').val('');
    Swal.fire('File size should be between 20KB to 5MB')
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
         </script>
