<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Photos List</h1>
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
            <?php if (encryptids("D", $_SESSION['admin_type']) == 3) { ?>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'admin/dashboard';?>" >Sub Admin Dashboard</a></li>
                <?php }else{ ?>
                    <li class="breadcrumb-item"><a href="<?php echo base_url().'admin/dashboard';?>" >Admin Dashboard</a></li>
              <?php  } ?>
                <li class="breadcrumb-item active" aria-current="page"><a href="<?php echo base_url() . 'admin/exchange_forum'; ?>">Exchange Forum</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url() . 'admin/cmsManagenent_dashboard'; ?>">CMS</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="<?php echo base_url() . 'admin/gallery'; ?>">Gallery</a></li>
            </ol>
        </nav>

    </div>


    <!-- Content Row -->

    <div class="col-12">
        <?php if (encryptids("D", $_SESSION['admin_type']) == 3) {   ?>
            <?php  if(in_array(2,$permissions)){ ?>
            <div class="card border-top card-body">
                <div>
                    <button type="button" class="btn btn-primary btn-sm mr-2" data-toggle="modal" data-target="#newform">Add New Photo</button>
                    <div class="modal fade " id="newform" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl" role="document">
                            <form action="<?php echo base_url(); ?>admin/add_photos" class="was-validated" method="post" enctype="multipart/form-data" id="add_photo">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Add Photo</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="mb-2 col-md-4">
                                                <label class="d-block text-font">Upload Image<sup class="text-danger">*</sup></label>
                                                <div class="d-flex">
                                                    <div class="col-9">
                                                <input type="file" class="form-control input-font" name="image" id="add_new_photo" required="" accept="image/*" onchange="addphotos(event)">
                                                <div class="invalid-feedback">
                                                This value is required
                                                </div>
                                                <span class="text-danger" id="err_add_image">
                                                                                                
                                                </span>
                                                </div>
                                                <div class="col-2">
                                                <button type="button" class="btn btn-primary btn-sm mb-4" data-bs-toggle="modal" data-bs-target="#Previewimg1">
                                                    Preview
                                                </button>
                                                </div>
                                                </div>
                                            </div>
                                            <div class="mb-2 col-md-4">
                                                <label class="d-block text-font">Caption</label>
                                                <input type="text" class="form-control input-font" name="title" id="add_caption" required="">
                                                <div class="invalid-feedback">
                                                This value is required
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="modal-footer">
                                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                            <a class="btn btn-primary save">Submit</a>
                                        </div>
                                    </div>
                                </div>
                                </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php } } ?>

        <?php
        if ($this->session->flashdata('MSG')) {
            echo $this->session->flashdata('MSG');
        }
        ?>
        <div class="row">
            <div class="col-12 mt-3">
                <div class="card border-top card-body">
                    <table id="photos" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Sr. No.</th>
                                <th>Image</th>
                                <th>Caption</th>
                                <?php if (encryptids("D", $_SESSION['admin_type']) == 3) {   ?>
                                    <th>Action</th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($photos)) {
                                $i = 1;
                                foreach ($photos as $list_photos) { ?>
                                    <tr>
                                        <td><?php echo $i++ ?></td>
                                        <td><img src="<?php echo base_url() . "uploads/cms/gallary/photo/" . $list_photos['image']; ?>" data-toggle="modal" data-target="#viewImage" width="40px"></td>
                                        <td><?php echo $list_photos['title']; ?></td>
                                        <?php if (encryptids("D", $_SESSION['admin_type']) == 3) {   ?>
                                            <td class="d-flex border-bottom-0">
                                            <?php  if(in_array(4,$permissions)){ ?>
                                                <button data-id='<?php echo encryptids("E", $list_photos['id']); ?>' class="btn btn-danger btn-sm mr-2 delete">Delete</button>
                                                <?php } ?>
                                                <?php  if(in_array(3,$permissions)){ ?>
                                                <button onclick="edit('<?php echo $list_photos['id']; ?>')" class="btn btn-info btn-sm mr-2 text-white" data-toggle="modal" data-target="#editform1">Edit</button>
                                                <?php } ?>
                                                <!-- Modal -->
                                                <div class="modal fade" id="viewImage" tabindex="-1" role="dialog" aria-labelledby="viewImageLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="viewImageLabel">Image Preview</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <img src="<?php echo base_url() . "uploads/" . $list_photos['image']; ?>" alt="" width="100%">
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal fade " id="editform" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-xl" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Update Photo
                                                                </h5>
                                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="mb-2 col-md-4">
                                                                        <label class="d-block text-font">Upload Image<sup class="text-danger">*</sup></label>
                                                                        <input type="file" class="form-control input-font" name="" id="" >
                                                                        <span class="error_text">
                                                                            <?php //echo form_error('title'); 
                                                                            ?>
                                                                        </span>
                                                                    </div>
                                                                    <div class="mb-2 col-md-4">
                                                                        <label class="d-block text-font">Caption</label>
                                                                        <input type="text" class="form-control input-font" name="" id="">
                                                                        <span class="error_text">
                                                                            <?php //echo form_error('title'); 
                                                                            ?>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                                                    <button class="btn btn-primary">Update</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>

                                        <?php } ?>

                                    </tr>
                            <?php }
                            } ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
    <!-- /.container-fluid -->
    <div class="modal fade" id="delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Record</h5>
                    <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" id="close" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <a href="javascript:;" id="abcd"><button type="button" class="btn btn-primary abcd" data-bs-dismiss="modal">Delete</button></a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade " id="editform1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Photo
                </h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url(); ?>admin/update_photo" class="was-validated" method="post" enctype="multipart/form-data" id="update_photo_form">
                    <div class="row">
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Upload Image<sup class="text-danger">*</sup></label>

                            <div class="active" id="delete_preview">
                                <button class="btn btn-danger btn-sm del_icon">Delete</button>
                                <button type="button" id="preview" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
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
                                                <img src="" id="outputicon" width="100%" />
                                            </div>
                                            <div class="modal-footer">                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal -->
                            </div>
                            <div class="row" id="add_file">
                                <div class="col-9">
                                    <input type="file" class="form-control input-font" accept="image/jpeg,image/png,image/jpg" name="bannerimg" id="icon_file" onchange="loadFileThumbnail(event)">
                                    <span class="error_text">                                        
                                    </span>
                                    <div class="invalid-feedback">
                                        This value is required
                                    </div>
                                    <input type="hidden" name="old_img" value="" id="bannerimg1">
                                    <input type="hidden" name="id" value="" id="id1">
                                    <span class="error_text">
                                        <?php //echo form_error('title'); 
                                        ?>
                                    </span>
                                </div>

                                <button type="button" class="btn btn-primary btn-sm mb-4" data-bs-toggle="modal" data-bs-target="#Previewimg">
                                    Preview
                                </button>
                            </div>



                        </div>
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Caption</label>
                            <input type="text" class="form-control input-font" name="banner_caption" id="caption1" maxlength="200" required="">
                            <span class="error_text">
                                <?php //echo form_error('title'); 
                                ?>
                            </span>
                            <div class="invalid-feedback">
                                This value is required
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary update_photo">Update</a>
                    </div>
                </form>
            </div>
        </div>
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
                <img id="outputThumbnail" width="100%" />
            </div>
            <div class="modal-footer">              
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="Previewimg1" tabindex="-1" aria-labelledby="PreviewimgLabel1" aria-hidden="true">
    <div class="modal-dialog" style="max-width:700px;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="PreviewimgLabel">Image Preview </h5>

                <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <img id="outputThumbnail1" width="100%" />
            </div>
            <div class="modal-footer">              
            </div>
        </div>
    </div>
</div>
<!-- End of Main Content -->
<script>
    $(document).ready(function() {
        $('.delete').on('click', function() {
          //  $('#delete').modal('show');
            id = $(this).attr('data-id');
            // console.log(id);
            // $('#abcd').attr('href', '<?php echo base_url(); ?>admin/deletePhotos/' + id);
            Swal.fire({
                    title: 'Are you sure you want to Delete?',
                    showDenyButton: true,
                    showCancelButton: false,
                    confirmButtonText: 'Delete',
                    denyButtonText: `Cancel`,
                    }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {                       
                        $.ajax({
                            url:'<?php echo base_url()."admin/deletePhotos/"; ?>' + id,
                            success:function(result){
                                location.reload();
                            }
                        })
                       // Swal.fire('Saved!', '', 'success')                                
                    } else if (result.isDenied) {
                        // Swal.fire('Changes are not saved', '', 'info')
                    }
                    })
        })
    })

    var loadFileThumbnail = function(event) {
        //  $("#Previewimg").show();
        var fileSize = $('#icon_file')[0].files[0].size;
       var validExtensions = ['jpg', 'jpeg', 'png']; //array of valid extensions
        var fileName = $("#icon_file").val();;
        var fileNameExt = fileName.substr(fileName.lastIndexOf('.') + 1);
                   
            console.log(fileSize);
        if(fileSize < 20480){
            $('#icon_file').val('');          
            Swal.fire("File size should be more than 20KB")            
        }else if(fileSize > 204800){
            $('#icon_file').val('');            
            Swal.fire("File size should be less than 200KB")           
        }else if($.inArray(fileNameExt, validExtensions) == -1){
            $('#icon_file').val('');            
            Swal.fire("Only jpg,jpeg,png files allowed")           
        }else{
            $('#err_update_banner').text('');
        }

        var outputThumbnail = document.getElementById('outputThumbnail');

        outputThumbnail.src = URL.createObjectURL(event.target.files[0]);
        console.log(outputThumbnail.src);
        outputThumbnail.onload = function() {
            URL.revokeObjectURL(outputThumbnail.src);
        }
    };
    var addphotos = function(event) {
        $('#add_photo').addClass('was-validated');
        var fileSize = $('#add_new_photo')[0].files[0].size;
       var validExtensions = ['jpg', 'jpeg', 'png']; //array of valid extensions
        var fileName = $("#add_new_photo").val();;
        var fileNameExt = fileName.substr(fileName.lastIndexOf('.') + 1);
                   
            console.log(fileSize);
        if(fileSize < 20000){
            $('#add_new_photo').val('');
            // $('#lessSize').modal('show');
           // $('#err_add_image').text('This value is required');
            Swal.fire('File size should be greater than 20KB');
        }else if(fileSize > 204800){
            $('#add_new_photo').val('');
            // $('#greaterSize').modal('show');
            Swal.fire('File size should be less than 200KB')
           // $('#err_add_image').text('This value is required');
        }else if($.inArray(fileNameExt, validExtensions) == -1){
            $('#add_new_photo').val('');
            // $('#invalidfiletype').modal('show');
            Swal.fire('Only jpg,jpeg,png allowed')
          //  $('#err_add_image').text('This value is required');
        }else{
            $('#err_add_image').text('');
        }
        //  $("#Previewimg").show();
        var outputThumbnail = document.getElementById('outputThumbnail1');

        outputThumbnail.src = URL.createObjectURL(event.target.files[0]);
        console.log(outputThumbnail.src);
        outputThumbnail.onload = function() {
            URL.revokeObjectURL(outputThumbnail.src);
        }
    };

    function resetimg() {
        $("#outputThumbnail").hide();
    }
   
    function deletePhotos1(que_id) {
        var id = $(this).attr('data-id');
        $('#delete').modal('show');
        //   $("#delete").reset();
        $('#abcd').on('click', function() {
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url(); ?>admin/deletePhotos',
                data: {
                    id: que_id,
                },
                success: function(result) {
                    console.log(result);
                    //  location.reload();
                },
                error: function(result) {
                    alert("Error,Please try again.");
                }
            });
        })
    }

    function edit(que_id) {
        $('#delete_preview').show();
        $('#add_file').hide();
        $('#icon_file').attr('required', false);
        // $('#outputicon').attr('src',)
        $('.del_icon').on('click', function() {
            $('#delete_preview').hide();
            $('#add_file').show();
            // $('#icon_file').add('attr','required');
            $('#icon_file').attr('required', true);
        });
        //  $('#editform').modal('show');
        $.ajax({
            url: '<?php echo base_url(); ?>admin/edit_photos/' + que_id,
            type: "JSON",
            method: "get",
            success: function(result) {
                var res = JSON.parse(result);
                console.log(res);
                $('#id1').val(res.id);
                $('#bannerimg1').val(res.image);
                $('#caption1').val(res.title);
                var img = res.image;
                $('#old_img').attr('href', '<?php echo base_url() . "uploads/admin/wall_of_wisdom/"; ?>' + img);
                $('#outputicon').attr('src', '<?php echo base_url(); ?>uploads/cms/gallary/photo/' + res.image);
            },
            error: function(result) {
                alert("Error,Please try again.");
            }
        });
    }





    $(document).ready(function() {
        $('#add_photo').removeClass('was-validated');
        $('#example').on('click', '.delete', function() {
            $('#delete').modal('show');
            $('#add_photo').removeClass('was-validated');
            var id = $(this).attr('data-id');

            $('#abcd').attr('href', '<?php echo base_url(); ?>admin/deletePhotos/' + id);
        });
        $('.save').on('click', function() {
            $('#add_photo').addClass('was-validated');
        })

        $('#photos').DataTable();
    });

    $('.save').click(function(){
       var image = $('#add_new_photo').val();
       var caption = $('#add_caption').val();
       var isvalid = true;

       if(image==""){
        isvalid= false;
       }

       if(caption==""){
        isvalid= false;
       }

       if(isvalid){
        Swal.fire({
                    title: 'Are you sure you want to Submit?',
                    showDenyButton: true,
                    showCancelButton: false,
                    confirmButtonText: 'Submit',
                    denyButtonText: `Cancel`,
                    }).then((result) => {                    
                    if (result.isConfirmed) {                       
                       $('#add_photo').submit();
                                                   
                    } else if (result.isDenied) {
                      
                    }
                    })
       }
       
    });
    $('.update_photo').click(function(){
       
       var caption = $('#caption1').val();
       var isvalid = true;

       var abc = $('#icon_file').attr('required');
       if(abc=="required"){
        var image = $('#icon_file').val();
        if(image==""){
            isvalid = false;
        }
        
       }
       if(image==""){
        isvalid= false;
       }

       if(caption==""){
        isvalid= false;
       }

       if(isvalid){
        Swal.fire({
                    title: 'Are you sure you want to Update?',
                    showDenyButton: true,
                    showCancelButton: false,
                    confirmButtonText: 'Update',
                    denyButtonText: `Cancel`,
                    }).then((result) => {                    
                    if (result.isConfirmed) {                       
                       $('#update_photo_form').submit();
                                                   
                    } else if (result.isDenied) {
                      
                    }
                    })
       }
       
    });
</script>