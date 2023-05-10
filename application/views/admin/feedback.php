<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Feedback List</h1>
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url() . 'admin/'; ?>">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="<?php echo base_url() . 'admin/exchange_forum'; ?>">Exchange Forum</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url() . 'admin/cmsManagenent_dashboard'; ?>">CMS</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="#">Feedback List</a></li>
            </ol>
        </nav>

    </div>


    <!-- Content Row -->

    <div class="col-12">
    
            <!-- Content Row -->

            <!-- Content Row -->
            <div class="row">
                <div class="col-12">
                    <div class="card border-top card-body">
                        <div>
                            <!-- <button type="button" class="btn btn-primary btn-sm mr-2" data-bs-toggle="modal" data-bs-target="#exampleModal1" data-bs-whatever="@mdo">Add New Post</button> -->
                            <a href="<?php echo base_url(); ?>admin/feedback_archive" type="button" class="btn btn-primary btn-sm mr-2" >Archive</a>
                        </div>
                    </div>
                </div>
            </div>
    
         <!-- <div class="card border-top card-body">
                <div>
                    <button type="button" class="btn btn-primary btn-sm mr-2" data-toggle="modal" data-target="#newform">Add New Feedback</button>
                    <div class="modal fade " id="newform" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl" role="document">
                           <form action="<?php echo base_url(); ?>admin/add_photos" class="was-validated" method="post" enctype="multipart/form-data" id="add_photo"> 
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Add Feedback</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            
                                            <div class="mb-2 col-md-4">
                                                <label class="d-block text-font">Name</label>
                                                <input type="text" class="form-control input-font" name="name" id="name" placeholder="Enter Title"required="">
                                                
                                            </div>
                                            <div class="mb-2 col-md-4">
                                                <label class="d-block text-font">Mobile Number</label>
                                                <input type="text" class="form-control input-font" name="name" id="name" placeholder="Enter Mobile Number" required="">
                                                
                                            </div>
                                            <div class="mb-2 col-md-4">
                                                <label class="d-block text-font">Email</label>
                                                <input type="text" class="form-control input-font" name="name" id="name" placeholder="Enter Email" required="">
                                                
                                            </div>
                                            <div class="mb-2 col-md-4">
                                                <label class="d-block text-font">Subject</label>
                                                <input type="text" class="form-control input-font" name="name" id="name" placeholder="Enter Subject" required="">
                                                
                                            </div>
                                            <div class="mb-2 col-md-8">
                                                <label class="d-block text-font">Description</label>
                                                <textarea type="text" class="form-control input-font" name="name" id="name" placeholder="Enter Description" required=""></textarea>
                                                
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-primary save">Submit</button>
                                            <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
                                            <button class="btn btn-warning" type="button" data-dismiss="modal">Reset</button>
                                        </div>
                                    </div>
                                </div>
                           
                        </div>
                    </div>
                </div>
            </div> -->

        <div class="row">
            <div class="col-12 mt-3">
                <div class="card border-top card-body table-responsive">
                    <table id="photos" class="table-bordered display nowrap">
                        <thead>
                            <tr>
                                <th>Sr. No.</th>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Contact</th>
                                <th>Email</th>
                                <th>Subject</th>
                                <th>Date</th>
                                <?php if (encryptids("D", $_SESSION['admin_type']) == 3) { ?>
                                <th>Action</th>
                                <?php } ?>

                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(!empty($feedback)){ 
                                $i=1;
                                foreach($feedback as $list){
                                    ?>
                                <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $list['id']; ?></td>
                                        <td><?php echo $list['name']; ?></td>
                                        <td><?php echo $list['mobile']; ?></td>
                                        <td><?php echo $list['email']; ?></td>
                                        <td><?php echo $list['subject']; ?></td>
                                        <td><?php echo date("d-m-Y", strtotime($list['created_on'])); ?></td>
                                        <?php if (encryptids("D", $_SESSION['admin_type']) == 3) { ?>
                                        <td class="d-flex border-bottom-0">
                                        
                                            <a href="<?php echo base_url().'admin/feedback_detail/'.encryptids("E",$list['id']); ?>"  class="btn btn-primary btn-sm mr-2 text-white" >View</a>
                                            <button onclick="return delete_feedback('<?=$list['id']?>')" class="btn btn-danger btn-sm mr-2">Delete</button>
                                            <button onclick="return archive('<?=$list['id']?>')" class="btn btn-info btn-sm mr-2 archive" data-id="<?=$list['id']?>">Archive</button>

                                            
                                        </td>
                                        <?php } ?>
                                      
                                </tr>
                                <?php $i++;
                                }
                             } ?>
                         </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12 submit_btn p-3">
        <a class="btn btn-primary btn-sm text-white" onclick="location.href='<?php echo base_url(); ?>admin/cmsManagenent_dashboard'">Back</a>
    </div>
    <!-- /.container-fluid -->
    <div class="modal fade" id="delete_preview" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <a href="javascript:;" id="abcd"><button type="button" class="btn btn-danger abcd" data-bs-dismiss="modal">Delete</button></a>
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
                <form action="<?php echo base_url(); ?>admin/update_photo" class="was-validated" method="post" enctype="multipart/form-data">
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
                                        accept only jpg,jpeg,png
                                    </span>
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
                            <input type="text" class="form-control input-font" name="banner_caption" id="caption1" required="">
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
<div class="modal fade" id="archive" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Archive Record</h5>
                    <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to archive?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" id="close" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <a href="javascript:;" id="archive_record"><button type="button" class="btn btn-success abcd" data-bs-dismiss="modal">Archive</button></a>
                </div>
            </div>
        </div>
    </div>
<!-- End of Main Content -->
<script>
    $(document).ready(function() {
        $('.delete').on('click', function() {
            $('#delete').modal('show');
            id = $(this).attr('data-id');
            console.log(id);
            $('#abcd').attr('href', '<?php echo base_url(); ?>admin/deletePhotos/' + id);
        })
    })

    var loadFileThumbnail = function(event) {
        //  $("#Previewimg").show();
        var outputThumbnail = document.getElementById('outputThumbnail');

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
                $('#outputicon').attr('src', '<?php echo base_url(); ?>uploads/' + res.image);
            },
            error: function(result) {
                alert("Error,Please try again.");
            }
        });
    }

    function delete_feedback(que_id) {
       // $('#delete_preview').modal('show');
        // $('#add_file').hide();
        // $('#icon_file').attr('required', false);
        // $('#outputicon').attr('src',)
        // $('.del_icon').on('click', function() {
            // $('#delete_preview').hide();
            // $('#add_file').show();
            // // $('#icon_file').add('attr','required');
            // $('#icon_file').attr('required', true);
          //  $('#abcd').attr('href','<?php echo base_url(); ?>admin/delete_feedback/'+que_id);
        // });
        //  $('#editform').modal('show');
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
                            // type: 'POST',
                            url: '<?php echo base_url(); ?>admin/delete_feedback/'+que_id,
                            // data: {
                            //     que_id: que_id,
                            // },
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
       
    }
    // function archive(que_id){
    //     $('#archive').modal('show');
    //     $('#archive_record').attr('href','<?php echo base_url(); ?>admin/archive_feedback/'+que_id);
    // }





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

        $('#photos').DataTable({
           // scrollX:true,
        });
    });

$('#photos').on('click','.archive',function(){
 var id=$(this).attr('data-id');
 Swal.fire({
                    title: 'Are you sure you want to Archive ?',
                    showDenyButton: true,
                    showCancelButton: false,
                    confirmButtonText: 'Archive',
                    denyButtonText: `Cancel`,
                    }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {   
                        $.ajax({
                            //  type: 'POST',
                            url: '<?php echo base_url(); ?>admin/archive_feedback/'+id,
                            // data: {
                            //     que_id: id,
                            // },
                            success: function(result) {
                                Swal.fire("Record Archived Successfully.");
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
});
</script>