<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"> World of Standard Banner Image List</h1>
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
            <!-- <li class="breadcrumb-item"><a href="<?php echo base_url().'admin/';?>" >Home</a></li> -->
            <?php if (encryptids("D", $_SESSION['admin_type']) == 3) { ?>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'admin/dashboard';?>" >Sub Admin Dashboard</a></li>
                <?php }else{ ?>
                    <li class="breadcrumb-item"><a href="<?php echo base_url().'admin/dashboard';?>" >Admin Dashboard</a></li>
              <?php  } ?>
  <li class="breadcrumb-item active" aria-current="page"><a href="<?php echo base_url().'admin/exchange_forum';?>" >Exchange Forum</a></li>
  <li class="breadcrumb-item active" aria-current="page"><a href="<?php echo base_url().'admin/cmsManagenent_dashboard';?>" >CMS</a></li>
            </ol>
        </nav>

    </div>


    <!-- Content Row -->
    <?php if (encryptids("D", $_SESSION['admin_type']) == 3) {   ?>
        <?php  if(in_array(2,$permissions)){ ?>
        <div class="col-12">
            <div class="card border-top card-body">
                <div>
                    <button type="button" class="btn btn-primary btn-sm mr-2" data-toggle="modal" data-target="#newform">Add New Banner</button>
                    <form id="add_admin" class="" action="<?php echo base_url(); ?>subadmin/addbannerimg" method="post" enctype="multipart/form-data">
                        <div class="modal fade " id="newform" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Add Banner Image</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="mb-2 col-md-6">
                                                <label class="d-block text-font">Upload Image<sup class="text-danger">*</sup></label>
                                                <div class="row">
                                                    <div class="col-6">
                                                    <input type="file" class="form-control input-font" accept="image/jpeg,image/png,image/jpg" name="bannerimg" id="bannerimg" onchange="loadFileThumbnail1(event)" required="">
                                                    <span class="text-danger">
                                                    </span>
                                                    <div class="invalid-feedback">
                                                        This value is required
                                                    </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <button type="button" id="preview123456" class="btn btn-primary btn-sm ml-2" data-bs-toggle="modal" data-bs-target="#Previewimg1">
                                                            Preview
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="mb-2 col-md-4">
                                                <label class="d-block text-font">Caption</label>
                                                <input type="text" class="form-control input-font" name="banner_caption" id="banner_caption" required="">
                                                <span class="error_text">
                                                    <?php //echo form_error('title'); 
                                                    ?>
                                                </span>
                                                <div class="invalid-feedback">
                                                                        This value require
                                                                        </div>
                                            </div>
                                            <div class="mb-2 col-md-4">
                                                <label class="d-block text-font">Link</label>
                                                <input type="text" class="form-control input-font" name="banner_link" id="banner_link">
                                                <span class="error_text">
                                                    <?php //echo form_error('title'); 
                                                    ?>
                                                </span>
                                                <div class="invalid-feedback">
                                                                        This value require
                                                                        </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                            <!-- <button class="btn btn-primary">Submit</button> -->
                                            <a class="btn btn-primary submit">Submit</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
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
                    <table id="banner_image" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Sr. No.</th>
                                <th>Image</th>
                                <th>Caption</th>
                                <th>Link</th>
                                <?php if (encryptids("D", $_SESSION['admin_type']) == 3) {   ?>
                                <th>Action</th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($banner_data)) {
                                $i = 1;
                                foreach ($banner_data as $list_banner) { ?>
                                    <tr>
                                        <td><?php echo $i++ ?></td>
                                        <td><?php if ($list_banner['banner_images']) { ?>
                                                <img src="<?php echo base_url(); ?>uploads/cms/banner/<?php echo $list_banner['banner_images'] ?>" width="50">
                                            <?php } else {
                                                echo "No Uploaded";
                                            } ?>
                                        </td>
                                        <td><?php echo $list_banner['caption']; ?></td>
                                        <td><?php echo $list_banner['link']; ?></td>
                                        <?php if (encryptids("D", $_SESSION['admin_type']) == 3) {   ?>
                                        <td class="d-flex border-bottom-0">
                                        <?php  if(in_array(3,$permissions)){ ?>
                                            <button onclick="edit('<?php echo $list_banner['id']; ?>')" class="btn btn-info btn-sm mr-2 text-white" data-toggle="modal" data-target="#editform">Edit</button>
                                            <?php } ?>
                                            <?php  if(in_array(4,$permissions)){ ?>
                                            <button onclick="deleteBanner(' <?php echo $list_banner['id']; ?> ');" data-id='<?php echo $list_banner['id']; ?>' class="btn btn-danger btn-sm mr-2 delete_img">Delete</button>
                                            <?php } ?>
                                            <!-- Modal -->

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
        <!-- <div class="col-md-12 submit_btn p-3">
    <a class="btn btn-primary btn-sm text-white" onclick="location.href='<?php echo base_url();?>admin/cmsManagenent_dashboard'">Back</a>
</div> -->
</div>
<div class="col-md-12 submit_btn p-3" >
                               <a class="btn btn-primary btn-sm text-white" style=" margin-right: 37px;" onclick="history.back()">Back</a>
                          </div>
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
                <img src="" alt="" width="100%">
            </div>

        </div>
    </div>
</div>
<div class="modal fade" id="Previewimg1" tabindex="-1" aria-labelledby="PreviewimgLabel" aria-hidden="true">
                                    <div class="modal-dialog" style="max-width:700px;">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Image Preview</h5>

                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                        </button>
                                        </div>
                                        <div class="modal-body">
                                        <img src="" id="outputThumbnail1" width="100%"/>
                                        </div>
                                        <div class="modal-footer">
                                        <!-- <button type="button"  onclick="resetbanner()" class="btn btn-secondary" data-bs-dismiss="modal">ReSet</button>
                                        <button type="button" class="btn btn-primary"data-bs-dismiss="modal">Save changes</button> -->
                                        </div> 
                                    </div>
                                    </div>
                                </div>
<div class="modal fade " id="editform" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Banner Image
                </h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
            <form action="<?php echo base_url(); ?>subadmin/update_bannnerimage" class="was-validated" method="post" enctype="multipart/form-data" id="update_banner" >
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
                                                                                        <img src="" id="outputicon" width="100%"/>
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
                                                            <div class="row" id="add_file">
                                                            


                                                            <!-- <input type="file" class="form-control input-font" name="image"
                                                                id="icon_file" value=""  accept="image/*">
                                                            <input type="hidden" name="old_img" id="image" value="">
                                                            <input type="hidden" name="id" id="id" value="">
                                                            <span class="error_text">
                                                                <?php //echo form_error('title'); ?>
                                                            </span> -->

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

                                                            <button type="button" class="btn btn-primary btn-sm mb-4" data-bs-toggle="modal" data-bs-target="#Previewimg"> Preview 
                                                                </button>
                                                            </div>


                        
                    </div>
                    <div class="mb-2 col-md-4">
                        <label class="d-block text-font">Caption</label>
                        <input type="text" class="form-control input-font" name="banner_caption" id="caption1" required="">
                        <span class="error_text">
                            <?php //echo form_error('title'); 
                            ?>
                        </span>
                        <div class="invalid-feedback">
                            This value is required
                        </div>
                    </div>
                    <div class="mb-2 col-md-4">
                                                <label class="d-block text-font">Link</label>
                                                <input type="text" class="form-control input-font" name="banner_link" id="banner_link_edit">
                                                <span class="error_text">
                                                    <?php //echo form_error('title'); 
                                                    ?>
                                                </span>
                                                <div class="invalid-feedback">
                                                                        This value require
                                                                        </div>
                                            </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary update">Update</a>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
<!-- End of Main Content -->
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
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary abcd" data-bs-dismiss="modal">Delete</button>
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
                                        <img id="outputThumbnail" width="100%"/>
                                        </div>
                                        <div class="modal-footer">
                                        <!-- <button type="button"  onclick="resetbanner()" class="btn btn-secondary" data-bs-dismiss="modal">ReSet</button>
                                        <button type="button" class="btn btn-primary"data-bs-dismiss="modal">Save</button> -->
                                        </div>
                                    </div>
                                    </div>
                                    </div> 
                                    <script type="text/javascript">
                                        $(document).ready(function(){
                                            $('#banner_image').DataTable();
                                        })
var loadFileThumbnail = function(event) 
    {
        var fileSize = $('#icon_file')[0].files[0].size;
       var validExtensions = ['jpg', 'jpeg', 'png']; //array of valid extensions
        var fileName = $("#icon_file").val();;
        var fileNameExt = fileName.substr(fileName.lastIndexOf('.') + 1);
                   
            console.log(fileSize);
        if(fileSize < 20480){
            $('#icon_file').val('');
            // $('#lessSize').modal('show');
            Swal.fire("File size should be more than 20KB")
            $('#err_update_banner').text('This value is required');
        }else if(fileSize > 204800){
            $('#icon_file').val('');
            // $('#greaterSize').modal('show');
            Swal.fire("File size should be less than 200KB")
            $('#err_update_banner').text('This value is required');
        }else if($.inArray(fileNameExt, validExtensions) == -1){
            $('#icon_file').val('');
            // $('#invalidfiletype').modal('show');
            Swal.fire("Only jpg,jpeg,png files allowed")
            $('#err_update_banner').text('This value is required');
        }else{
            $('#err_update_banner').text('');
        }
       //  $("#Previewimg").show();
        var outputThumbnail = document.getElementById('outputThumbnail');
        
        outputThumbnail.src = URL.createObjectURL(event.target.files[0]);
        console.log(outputThumbnail.src);
        outputThumbnail.onload = function()
        {
            URL.revokeObjectURL(outputThumbnail.src);
        }
    };
    var loadFileThumbnail1 = function(event) 
    {
        var fileSize = $('#bannerimg')[0].files[0].size;
       var validExtensions = ['jpg', 'jpeg', 'png']; //array of valid extensions
        var fileName = $("#bannerimg").val();;
        var fileNameExt = fileName.substr(fileName.lastIndexOf('.') + 1);
                   
            console.log(fileSize);
        if(fileSize < 20480){
            $('#bannerimg').val('');
            // $('#lessSize').modal('show');
            Swal.fire("File size should be more than 20KB")
            $('#err_update_banner').text('This value is required');
        }else if(fileSize > 204800){
            $('#bannerimg').val('');
            // $('#greaterSize').modal('show');
            Swal.fire("File size should be less than 200KB")
            $('#err_update_banner').text('This value is required');
        }else if($.inArray(fileNameExt, validExtensions) == -1){
            $('#bannerimg').val('');
            // $('#invalidfiletype').modal('show');
            Swal.fire("Only jpg,jpeg,png files allowed")
            $('#err_update_banner').text('This value is required');
        }else{
            $('#err_update_banner').text('');
        }
       //  $("#Previewimg").show();
        var outputThumbnail = document.getElementById('outputThumbnail1');
        
        outputThumbnail.src = URL.createObjectURL(event.target.files[0]);
        console.log(outputThumbnail.src);
        outputThumbnail.onload = function()
        {
            URL.revokeObjectURL(outputThumbnail.src);
        }
    };
    function resetimg()
    {
         
        $("#outputThumbnail").hide(); 
    }
    </script>
<script>
    // function deleteBanner(que_id) {
    //     // var c = confirm("Are you sure to delete this survey details? ");
    //     $('#delete').modal('show');
    //     $('.abcd').on('click', function() {
    //         console.log("jhgjhgjh");
    //         $.ajax({
    //             type: 'POST',
    //             url: '<?php echo base_url(); ?>subadmin/deleteBanner',
    //             data: {
    //                 que_id: que_id,
    //             },
    //             success: function(result) {
    //                 location.reload();
    //             },
    //             error: function(result) {
    //                 alert("Error,Please try again.");
    //             }
    //         });
    //     });
    // }

   
    function edit(que_id){
        $('#delete_preview').show();
                    $('#add_file').hide();
                    $('#icon_file').attr('required',false);
                    // $('#outputicon').attr('src',)
            $('.del_icon').on('click',function(){
                                $('#delete_preview').hide();
                                $('#add_file').show();
                                // $('#icon_file').add('attr','required');
                                $('#icon_file').attr('required',true);
            });
         //  $('#editform').modal('show');
            $.ajax({
                            url: '<?php echo base_url(); ?>subadmin/edit_bannerimage/'+que_id,
                            type:"JSON",
                            method:"get",
                            success: function(result) {
                                var res = JSON.parse(result); 
                                console.log(res);
                                $('#id1').val(res.id);
                                $('#bannerimg1').val(res.banner_images);
                                $('#caption1').val(res.caption);
                                $('#banner_link_edit').val(res.link);
                                
                               
                              var img=res.image;
                              $('#old_img').attr('href','<?php echo base_url()."uploads/cms/banner/"; ?>'+img);
                              $('#outputicon').attr('src','<?php echo base_url(); ?>uploads/cms/banner/'+res.banner_images);
                            },
                            error: function(result) {
                                alert("Error,Please try again.");
                            }
                        });          
        }

    $('#banner_image').on('click','.delete_img',function(){
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
                            url: '<?php echo base_url(); ?>subadmin/deleteBanner',
                            data: {
                                que_id: id,
                            },
                            success: function(result) {
                                Swal.fire("Record Deleted Successfully.");
                                location.reload();
                            },
                            error: function(result) {
                                alert("Error,Please try again.");
                            }
                        });
                        Swal.fire('Saved!', '', 'success')                                
                    } else if (result.isDenied) {
                        // Swal.fire('Changes are not saved', '', 'info')
                    }
                    })

    })

    $('#add_admin').click(function(){
        $(this).addClass('was-validated');
    });
    $('.submit').click(function(){
        var bannerImage = $('#bannerimg').val();
        var bannerCaption = $('#banner_caption').val();
        var is_valid = true;

        if(bannerImage==""){
            var is_valid = false;
        }else{

        }

        if(bannerCaption==""){
            var is_valid = false;
        }else{

        }

        if(is_valid){
            Swal.fire({
                    title: 'Do you want to Submit?',
                    showDenyButton: true,
                    showCancelButton: false,
                    confirmButtonText: 'Submit',
                    denyButtonText: `Cancel`,
                    }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {   
                        $('.loader-div').show(); 
                        $('#add_admin').submit(); 
                    } else if (result.isDenied) {
                        // Swal.fire('Changes are not saved', '', 'info')
                    }
                    })
        }
    });

    $('.update').click(function(){
        // alert("jhgjh");
        var bannerImage = $('#icon_file').val();
        var bannerCaption = $('#caption1').val();
        var atribute =$('#icon_file').attr('required');
        var is_valid = true;

        // alert(atribute);

        if(atribute=='required'){
            if(bannerImage==""){
            var is_valid = false;
            }else{

            }
        }

        if(bannerCaption==""){
            var is_valid = false;
        }else{

        }

        if(is_valid){
            // alert("jhgjh");
            Swal.fire({
                    title: 'Do you want to Update?',
                    showDenyButton: true,
                    showCancelButton: false,
                    confirmButtonText: 'Update',
                    denyButtonText: `Cancel`,
                    }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {   
                        $('.loader-div').show(); 
                        $('#update_banner').submit(); 
                    } else if (result.isDenied) {
                        // Swal.fire('Changes are not saved', '', 'info')
                    }
                    })
        }
    });

</script>