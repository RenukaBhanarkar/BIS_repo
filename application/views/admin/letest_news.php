<!-- Begin Page Content -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Latest News</h1>
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url().'admin/';?>" >Home</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="<?php echo base_url().'admin/exchange_forum';?>" >Exchange Forum</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="<?php echo base_url().'admin/cmsManagenent_dashboard';?>" >CMS</a></li>
                <li class="breadcrumb-item active" aria-current="page">Latest News</li>
            </ol>
        </nav>

    </div>


    <!-- Content Row -->
  <div class="row">
        <div class="col-12">
            <div class="card border-top card-body">
                <div>
                    <button type="button" class="btn btn-primary btn-sm mr-2" data-toggle="modal" data-target="#latestform">New Post</button>
                    <a href="<?php echo base_url().'/admin/archived_news' ?>" type="button" class="btn btn-primary btn-sm mr-2" >Archived News</a>
                    <div class="modal fade" id="latestform" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        
                                        <div class="modal-dialog modal-xl">
                                        <form action="<?php echo base_url(); ?>admin/addLetestNews" method="post" id="news" class="needs-validation" name="news"  enctype="multipart/form-data">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Post Here</h5>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span></button>
                                                </div>
                                                <div class="modal-body">
                                                   <div class="row">
                                                        <div class="mb-2 col-md-4">
                                                            <label class="d-block text-font">Title</label>
                                                            <input type="text" class="form-control input-font" name="title" id="banner_caption" placeholder="Enter Title" value="" minlength="2" maxlength="200" required>
                                                            <!-- <span class="text-danger" id="err_title"></span> -->
                                                                <div class="invalid-feedback">
                                                                    This value is required
                                                                </div>
                                                        </div>
                                                   </div>
                                                   <div class="row">
                                                        <div class="mb-2 col-md-12">
                                                            <label class="d-block text-font">Description</label>
                                                            <textarea type="text" class="form-control input-font" name="description" id="description" placeholder="Enter description" value="" required></textarea>
                                                            <span class="text-danger" id="err_description"></span>
                                                            
                                                        </div>
                                                   </div>
                                                   <div class="mb-2 col-md-4">
                                                            <label class="d-block">Upload Thumbnail<sup class="text-danger">*</sup></label>
                                                            <div class="d-flex">
                                                            <div>
                                                                <input type="file" id="thumbnail" name="thumbnail" class="form-control-file" accept="image/png, image/jpeg,image/jpg" onchange="loadThumbnail(event)">
                                                                <span class="text-danger" id="err_thumbnail"></span>
                                                            </div>
                                                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#Previewimg" fdprocessedid="3a6f0r">
                                                                Preview 
                                                            </button>
                                                            </div>
                                                   </div>
                                                </div>
                                                <div class="modal-footer">
                                                <button  onclick="return submitButton(event)" type="submit" class="btn btn-success" >Submit</button>
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                                    <button onclick="return resetform(event)" type="button" class="btn btn-warning" >Reset</button>
                                                </div>
                                            </div>
                                            </form>
                                        </div>
                                        
                                    </div>
                   
                </div>

            </div>
            </div>
  </div>
        <div class="row">
            <div class="col-12 mt-3">
                <div class="card border-top card-body table-responsive">
                    <table id="example" class="table-bordered " style="width: 100%;">
                        <thead>
                            <tr>
                                <th>Sr. No.</th>
                                <th>Title</th>
                                <th>Image</th>
                                <th>Posted on</th>
                                <th>Action</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                               <!-- <tr>
                                        <td>1</td>
                                        <td>News Title</td>
                                        <td><img src="#" alt="#" class="" width="50%"></td>
                                        <td>12/03/2023</td>
                                        <td class="d-flex border-bottom-0">
                                            <button  onclick="location.href='letest_news_view'" class="btn btn-primary btn-sm mr-2 text-white">View</button>
                                            <button  class="btn btn-info btn-sm mr-2 text-white" data-toggle="modal" data-target="#editform">Edit</button>
                                            <button  class="btn btn-danger btn-sm mr-2 text-white" data-toggle="modal" data-target="#">Delete</button>
                                            <button  class="btn btn-success btn-sm mr-2 text-white" data-toggle="modal" data-target="#">Publish</button>
                                            <button  class="btn btn-warning btn-sm mr-2 text-white" data-toggle="modal" data-target="#">Unpublish</button>
                                            <button  class="btn btn-primary btn-sm mr-2 text-white" data-toggle="modal" data-target="#">Archive</button>
                                        </td>
                                    </tr> -->
                              
                                    <?php if(!(empty($news))){ $i=1;
                                        foreach($news as $list){ ?>
                                              <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $list['title']; ?></td>
                                    <td><img src="<?php echo base_url().'uploads/letest_news/'.$list['thumbnail']; ?>" alt="#" class="" width="100%" style="height:75px;"></td>
                                    <td><?php echo $list['created_on']; ?></td>
                                    
                                    <td class="d-flex border-bottom-0">
                                    <?php if(encryptids("D", $_SESSION['admin_type']) == 3){ ?>
                                    <a  href="letest_news_view/<?=encryptids("E",$list['id']);?>" class="btn btn-primary btn-sm mr-2 text-white">View</a>
                                    <?php if($list['status']=='5'){ ?>
                                        <button  class="btn btn-warning btn-sm mr-2 text-white unpublish" data-id="<?=encryptids("E",$list['id']);?>" >Unpublish</button>
                                   <?php }else if(!($list['status']=='5')){ ?>
                                    <button  class="btn btn-info btn-sm mr-2 text-white edit" data-id="<?=encryptids("E",$list['id']);?>" data-toggle="modal" data-target="#editform">Edit</button>
                                            <button  class="btn btn-danger btn-sm mr-2 text-white delete" data-id="<?=encryptids("E",$list['id']);?>" >Delete</button>
                                            <button  class="btn btn-success btn-sm mr-2 text-white publish" data-id="<?=encryptids("E",$list['id']);?>" >Publish</button>                                            
                                            <button  class="btn btn-primary btn-sm mr-2 text-white archive" data-id="<?=encryptids("E",$list['id']);?>" >Archive</button>

                                 <?php  } ?>
                                            
                                            <?php }else{ ?>
                                                <button  onclick="location.href='letest_news_view'" class="btn btn-primary btn-sm mr-2 text-white">View</button>
                                      <?php  } ?>
                                      <?php $i++; } } ?>
                                        </td>
                                        
                                            
                                      </tr>
                                   
                                  
                           

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        </div>
        <div class="modal fade" id="editform" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-xl">
                                            <div class="modal-content">
                                            <form action="<?php echo base_url().'admin/updateNews'; ?>" id="updateform" name="editdata" method="post" enctype="multipart/form-data">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Update Here</h5>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span></button>
                                                </div>
                                                <div class="modal-body">
                                                   <div class="row">
                                                        <div class="mb-2 col-md-4">
                                                            <label class="d-block text-font">Title</label>
                                                            <input type="text" class="form-control input-font" name="banner_caption" id="banner_caption1" placeholder="Enter Title" value="" required>
                                                            <input type="hidden" class="form-control input-font" name="edit_id" id="edit_id"/>
                                                            <span class="text-danger" id="err_title1"></span>
                                                        </div>
                                                   </div>
                                                   <div class="row">
                                                        <div class="mb-2 col-md-12">
                                                            <label class="d-block text-font">Description</label>
                                                            <textarea type="text" class="form-control input-font" name="description" id="description_1" placeholder="Enter description" value="" required></textarea>
                                                            <span class="text-danger" id="err_description_1"></span>
                                                        </div>
                                                   </div>
                                                   <div class="mb-2 col-md-4">
                                                            <label class="d-block">Upload Thumbnail<sup class="text-danger">*</sup></label>
                                                            <!-- <div class="d-flex">
                                                            <div>
                                                                <input type="file" id="thumbnail1" name="thumbnail" class="form-control-file" accept="image/png, image/jpeg,image/jpg" onchange="loadThumbnail1(event)">
                                                                <span class="error_text"></span>
                                                            </div>
                                                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#Previewimg" fdprocessedid="3a6f0r">
                                                                Preview 
                                                            </button>
                                                            </div> -->
                            <div class=""  id="add_file">
                                <div class="d-flex">
                                        <div>
                                            <input type="file" id="document2" name="document" class="form-control" onchange="loadFileThumbnail(event)" >
                                            <span  class="error_text" id="imgerror3" style="color:red;"></span>
                                            <input type="hidden" id="image1" name="old_doc" value="">
                                            <input type="hidden" id="id1" name="id">
                                            <span class="error_text"><?php echo form_error('banner_img');?></span>
                                        </div>
                                        <button type="button" id="preview123456" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#Previewimg">
                                            Preview
                                        </button>

                                        <div class="modal fade" id="Previewimg" tabindex="-1" aria-labelledby="PreviewimgLabel" aria-hidden="true">
                                            <div class="modal-dialog" style="max-width:700px;">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Image Preview</h5>

                                                    <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                    </button>
                                                    </div>
                                                    <div class="modal-body">
                                                    <img src="" id="outputThumbnail" width="100%"/>
                                                    </div>
                                                    <div class="modal-footer">
                                                    <!-- <button type="button"  onclick="resetbanner()" class="btn btn-secondary" data-bs-dismiss="modal">ReSet</button>
                                                    <button type="button" class="btn btn-primary"data-bs-dismiss="modal">Save changes</button> -->
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                
                                <!-- Modal -->
                                      
                                            <!-- Modal -->
                            </div>
                                                            <div class="active" id="delete_preview">
                                                                <button class="btn btn-danger btn-sm del_icon">Delete</button>
                                                                <button type="button" id="preview1" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                                    Preview
                                                                </button>
                                                                                                                <!-- Modal -->
                                                                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                                    <div class="modal-dialog" style="max-width:700px;">
                                                                                    <div class="modal-content">
                                                                                        <div class="modal-header">
                                                                                        <h5 class="modal-title" id="exampleModalLabel">Image Preview</h5>

                                                                                        <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                                                                                        <span aria-hidden="true">×</span>
                                                                                        </button>
                                                                                        </div>
                                                                                        <div class="modal-body">
                                                                                        <img src="" id="outputbanner" width="100%"/>
                                                                                        </div>
                                                                                        <div class="modal-footer">
                                                                                        <!-- <button type="button"  onclick="resetbanner()" class="btn btn-secondary" data-bs-dismiss="modal">ReSet</button>
                                                                                        <button type="button" class="btn btn-primary"data-bs-dismiss="modal">Save changes</button> -->
                                                                                        </div> 
                                                                                    </div>
                                                                                    </div>
                                                                                </div>       
                                                                                            <!-- Modal -->
                                                            </div>
                                                   </div>
                                                </div>
                                                <div class="modal-footer">
                                                <button onclick="return updateButton(event)" type="button" class="btn btn-success" >Update</button>
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                                    <button type="button" class="btn btn-warning" data-dismiss="modal" id="saveQueBank">Reset</button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
        <!-- /.container-fluid -->
        <div class="col-md-12 submit_btn p-3">
    <a class="btn btn-primary btn-sm text-white" onclick="location.href='<?php echo base_url();?>admin/cmsManagenent_dashboard'">Back</a>
</div>
</div>
<div class="modal fade" id="Previewimg" tabindex="-1" aria-labelledby="PreviewimgLabel" aria-hidden="true">
                                    <div class="modal-dialog" style="max-width:700px;">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="PreviewimgLabel">Image Preview of new uploaded</h5>

                                        <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span></button>
                                        </div>
                                        <div class="modal-body">
                                        <img id="outputThumbnail" width="100%"/>
                                        </div>
                                        <div class="modal-footer">
                                        <!-- <button type="button"  onclick="resetbanner()" class="btn btn-secondary" data-bs-dismiss="modal">ReSet</button>
                                        <button type="button" class="btn btn-primary"data-bs-dismiss="modal">Save</button> -->
                                        </div>
                                    </div>
                                    </div>
                                    </div> 
<script type='text/javascript'>
    $('#news').removeClass('was-validated');
    var loadThumbnail = function(event) 
    {
       //  $("#Previewimg").show();
        var outputThumbnail = document.getElementById('outputThumbnail');
        
        outputThumbnail.src = URL.createObjectURL(event.target.files[0]);
        console.log(outputThumbnail.src);
        outputThumbnail.onload = function()
        {
            URL.revokeObjectURL(outputThumbnail.src);
        }
    };

    var loadFileThumbnail = function(event) 
    {
       //  $("#Previewimg").show();
       if ($("#document2").val() != '') {
                   var fileSize = $('#document2')[0].files[0].size;
                   var fileName = $("#document2").val();
                   var validExtensions = ['jpg', 'jpeg', 'png']; //array of valid extensions
                   var fileNameExt = fileName.substr(fileName.lastIndexOf('.') + 1);

                   if(fileSize < 20480){
                    $('#document2').val('');
                    Swal.fire("File size should be more than 20KB");
                    $('#imgerror3').text('This value is required');
                   }else if(fileSize > 204800){
                    Swal.fire("File size should be less than 200KB");
                    $('#document2').val('');
                    $('#imgerror3').text('This value is required');
                   }else if($.inArray(fileNameExt, validExtensions) == -1){
                    Swal.fire("Only jpg,jpeg,png files allowed");
                    $('#document2').val('');
                    $('#imgerror3').text('This value is required');
                   }else{
                    $('#imgerror3').text('');
                   }
       }else{
        $('#imgerror3').text('This value is required');
       }
       
        var outputThumbnail = document.getElementById('outputThumbnail');
        
        outputThumbnail.src = URL.createObjectURL(event.target.files[0]);
        console.log(outputThumbnail.src);
        outputThumbnail.onload = function()
        {
            URL.revokeObjectURL(outputThumbnail.src);
        }
    };

 
    function resetform(event){
        event.preventDefault();
        Swal.fire({
                    title: 'Do you want to Reset?',
                    showDenyButton: true,
                    showCancelButton: false,
                    confirmButtonText: 'Reset',
                    denyButtonText: `Cancel`,
                    }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {  
                        $("#banner_caption").val(''); 
                        CKEDITOR.instances['description'].setData(''); 
                        $("#thumbnail").val('');
                                                  
                    } else if (result.isDenied) {
                        
                    }
                    })
    }
    
    function updateButton(event) {
    event.preventDefault();
    $('#updateform').addClass('was-validated');
           var title = $("#banner_caption1").val();
           // var description = $("#description").val();
           var description= CKEDITOR.instances['description_1'].getData(); 
           var is_valid = true;
           //var numbers = /[0-9]/g;
           //var upperCaseLetters = /[A-Z]/g;
           //var lowerCaseLetters = /[a-z]/g;

           if (title == "") {
               $("#err_title1").text("This value is required");
               $("#banner_caption1").focus();
                 is_valid = false;
           } else if (!(title.length > 4)) {
               $("#err_title1").text("Please Enter minimum 5 Characters");
               $("#banner_caption1").focus();
                is_valid = false;
           }else if (title.length > 200) {
               $("#err_title1").text("Maximum 200 characters allowed");
               $("#banner_caption1").focus();
                is_valid = false;
           } else {
               $("#err_title").text("");
           }
           if (description == "") {
               $("#err_description_1").text("This value is required");
               $("#description").focus();
                is_valid = false;
           } else if ((description.length < 10)) {
               $("#err_description_1").text("Please Enter minimum 5 Characters");
               $("#description").focus();
                is_valid = false;
           } else if ((description.length > 2000)) {
               is_valid = false;
               // alert('Description length must be less than 2000 characters ');
               $("#err_description_1").text("Maximum 2000 characters allowed");
               $("#description").focus();
               //  is_valid = false;
               
           } else {
               $("#err_description").text("");
           }


               if (is_valid) {
                Swal.fire({
                    title: 'Do you want to Update?',
                    showDenyButton: true,
                    showCancelButton: false,
                    confirmButtonText: 'Update',
                    denyButtonText: `Cancel`,
                    }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {   
                        $('#updateform').submit();
               return true;
                        // Swal.fire('Saved!', '', 'success')                                
                    } else if (result.isDenied) {
                        // Swal.fire('Changes are not saved', '', 'info')
                    }
                    })

              
           } else {
               return false;
           }
           };


 function submitButton(event) {
    event.preventDefault();
    $('#news').addClass('was-validated');
           var title = $("#banner_caption").val();
           // var description = $("#description").val();
           var description= CKEDITOR.instances['description'].getData(); 
           var is_valid = true;
           //var numbers = /[0-9]/g;
           //var upperCaseLetters = /[A-Z]/g;
           //var lowerCaseLetters = /[a-z]/g;

           if (title == "") {
               $("#err_title").text("This value is required");
               $("#u_email").focus();
                 is_valid = false;
           } else if (!(title.length > 4)) {
               $("#err_title").text("Please Enter minimum 5 Characters");
               $("#u_title").focus();
                is_valid = false;
           }else if (title.length > 250) {
               $("#err_title").text("Maximum 250 characters allowed");
               $("#u_title").focus();
                is_valid = false;
           } else {
               $("#err_title").text("");
           }
           if (description == "") {
               $("#err_description").text("This value is required");
               $("#description").focus();
                is_valid = false;
           } else if ((description.length < 10)) {
               $("#err_description").text("Please Enter minimum 5 Characters");
               $("#description").focus();
                is_valid = false;
           } else if ((description.length > 2000)) {
               is_valid = false;
               // alert('Description length must be less than 2000 characters ');
               $("#err_description").text("Maximum 2000 characters allowed");
               $("#description").focus();
               //  is_valid = false;
               
           } else {
               $("#err_description").text("");
           }
           


       if ($("#thumbnail").val() != '') {
                   var fileSize = $('#thumbnail')[0].files[0].size;

                   if (fileSize > 204800) {
                       is_valid = false;
                
                    Swal.fire("File size should be less than 200KB");
                       $("#thumbnail").val('');
                       $("#err_thumbnail").text('This value is required');  
                    //    if (!focusSet) {
                    //        $("#thumbnail").focus();
                    //    }
                   } else if(fileSize < 20480){
                       is_valid = false;
                       $("#thumbnail").val('');
                       Swal.fire("File size should be less than 20KB");  
                      
                   } else {
                    $("#err_thumbnail").text('');  
                   }
                //    check type  start 
                   var validExtensions = ['jpg', 'jpeg', 'png']; //array of valid extensions
                   var fileName = $("#thumbnail").val();
                   var fileNameExt = fileName.substr(fileName.lastIndexOf('.') + 1);
                   if ($.inArray(fileNameExt, validExtensions) == -1) {
                    $("#err_thumbnail").text('This value is required');                      
                       $('#thumbnail').val('');
                    //    Swal.fire("Invalid");
                         is_valid = false;
                   }else{
                    $("#err_thumbnail").text('');
                   }
               }else{
                   is_valid = false;
                   $("#err_thumbnail").text('This value is required');
                   $("#thumbnail").focus();
               }




               if (is_valid) {
                $('#news').submit();
               return true;
           } else {
               return false;
           }
           };
</script>

<script>
                        CKEDITOR.replace( 'description' );
                        CKEDITOR.replace( 'description_1' );

</script>
<script>
    $('#example').on('click','.delete',function(){
        var id=$(this).attr('data-id');
        Swal.fire({
                    title: 'Do you want to Delete?',
                    showDenyButton: true,
                    showCancelButton: false,
                    confirmButtonText: 'Delete',
                    denyButtonText: `Cancel`,
                    }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {   
                        $.ajax({
                             type: 'POST',
                            url: '<?php echo base_url(); ?>admin/deleteLetestNews/'+id,
                            // data: {
                            //     que_id: id,
                            // },
                            success: function(result) {
                                Swal.fire("Record Deleted Successfully.");
                                location.reload();
                            },
                            error: function(result) {
                                alert("Error,Please try again.");
                                return false;
                            }
                        });
                        Swal.fire('Saved!', '', 'success')                                
                    } else if (result.isDenied) {
                        // Swal.fire('Changes are not saved', '', 'info')
                    }
                    })
    });

    $('#example').on('click','.publish',function(){
        var id=$(this).attr('data-id');
        Swal.fire({
                    title: 'Do you want to Publish?',
                    showDenyButton: true,
                    showCancelButton: false,
                    confirmButtonText: 'Publish',
                    denyButtonText: `Cancel`,
                    }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {   
                        $.ajax({
                            //  type: 'POST',
                            url: '<?php echo base_url(); ?>admin/publishLetestNews/'+id,
                            // data: {
                            //     que_id: id,
                            // },
                            success: function(result) {
                                Swal.fire("Record Published Successfully.");
                                location.reload();
                            },
                            error: function(result) {
                                alert("Error,Please try again.");
                                return false;
                            }
                        });
                        Swal.fire('Saved!', '', 'success')                                
                    } else if (result.isDenied) {
                        // Swal.fire('Changes are not saved', '', 'info')
                    }
                    })
    });

    $('#example').on('click','.unpublish',function(){
        var id=$(this).attr('data-id');
        Swal.fire({
                    title: 'Do you want to Unpublish?',
                    showDenyButton: true,
                    showCancelButton: false,
                    confirmButtonText: 'Unpublish',
                    denyButtonText: `Cancel`,
                    }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {   
                        $.ajax({
                            //  type: 'POST',
                            url: '<?php echo base_url(); ?>admin/unpublishLetestNews/'+id,
                            // data: {
                            //     que_id: id,
                            // },
                            success: function(result) {
                                Swal.fire("Record Unpublished Successfully.");
                                location.reload();
                            },
                            error: function(result) {
                                alert("Error,Please try again.");
                                return false;
                            }
                        });
                        Swal.fire('Saved!', '', 'success')                                
                    } else if (result.isDenied) {
                        // Swal.fire('Changes are not saved', '', 'info')
                    }
                    })
    });

    $('#example').on('click','.archive',function(){
        var id=$(this).attr('data-id');
        Swal.fire({
                    title: 'Do you want to Archive?',
                    showDenyButton: true,
                    showCancelButton: false,
                    confirmButtonText: 'Archive',
                    denyButtonText: `Cancel`,
                    }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {   
                        $.ajax({
                            //  type: 'POST',
                            url: '<?php echo base_url(); ?>admin/archiveLetestNews/'+id,
                            // data: {
                            //     que_id: id,
                            // },
                            success: function(result) {
                                Swal.fire("Record Archived Successfully.");
                                location.reload();
                            },
                            error: function(result) {
                                alert("Error,Please try again.");
                                return false;
                            }
                        });
                        Swal.fire('Saved!', '', 'success')                                
                    } else if (result.isDenied) {
                        // Swal.fire('Changes are not saved', '', 'info')
                    }
                    })
    });


    $('#example').on('click','.edit',function(){
        $('#delete_preview').show();
                    $('#add_file').hide();
                    
        $('#banner_caption1').val("");                                
                                $('#outputbanner').attr('src','');
                                CKEDITOR.instances['description_1'].setData("");
        var id=$(this).attr('data-id');
        $.ajax({
                            //  type: 'POST',
                            url: '<?php echo base_url(); ?>admin/editLetestNews/'+id,
                            // data: {
                            //     que_id: id,
                            // },
                            success: function(result) {
                                console.log(result);
                                var res = JSON.parse(result); 
                                $('#image1').val(res.thumbnail);
                                $('#banner_caption1').val(res.title);   
                                $('#edit_id').val(res.id);                             
                                $('#outputbanner').attr('src','<?php echo base_url()."uploads/letest_news/" ?>'+res.thumbnail);
                                CKEDITOR.instances['description_1'].setData(res.description)
                                // $('#').val(res.thumbnail);
                            },
                            error: function(result) {
                                alert("Error,Please try again.");
                                return false;
                            }
                        });
    });

    $(document).ready(function(){
        $('#delete_preview').show();
                    $('#add_file').hide();
                    // $('#icon_file').removeAttr('required','true');
                    // $('#outputicon').attr('src',)
            $('.del_icon').on('click',function(){
                                $('#delete_preview').hide();
                                $('#add_file').show();
                                $('#document2').val('');
                                $('#document2').attr('required',true);

                                // $('#document2').attr('required');
                                // return false;
                                
                                // $('#icon_file').add('attr','required');
                                // $('#document2').attr('required',true);
            });
    });
</script>