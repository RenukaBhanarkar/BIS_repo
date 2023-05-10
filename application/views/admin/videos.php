<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Videos List</h1>
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url().'admin/';?>" >Home</a></li>
  <li class="breadcrumb-item active" aria-current="page"><a href="<?php echo base_url().'admin/exchange_forum';?>" >Exchange Forum</a></li>
  <li class="breadcrumb-item"><a href="<?php echo base_url().'admin/cmsManagenent_dashboard';?>" >CMS</a></li>
  <li class="breadcrumb-item active" aria-current="page"><a href="<?php echo base_url().'admin/gallery';?>" >Gallery</a></li>
            </ol>
        </nav>

    </div>


    <!-- Content Row -->

    <div class="col-12">
        <?php if (encryptids("D", $_SESSION['admin_type']) == 3) {   ?>
            <div class="card border-top card-body">
                <div>
                    <button type="button" class="btn btn-primary btn-sm mr-2" data-toggle="modal" data-target="#newform" id="addvideo">Add New Video</button>
                    <div class="modal fade " id="newform" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl" role="document">
                            <div class="modal-content">
                                <form action="<?php echo base_url() . 'admin/add_video'; ?>" method="post" class="was-validated" enctype="multipart/form-data" id="add_videos">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Add Video</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="mb-2 col-md-4">
                                                <label class="d-block text-font">Upload Video<sup class="text-danger">*</sup></label>
                                                <input type="file" class="form-control input-font" name="video" id="video" required="" accept="video/mp4,video/x-m4v,video/*" onchange="loadFileThumbnail1(event)">
                                                <span class="text-danger" id="err_video">
                                                    <?php //echo form_error('title'); 
                                                    ?>
                                                </span>
                                            </div>
                                            <div class="mb-2 col-md-4">
                                                <label class="d-block text-font">Caption</label>
                                                <input type="text" class="form-control input-font" name="title" id="caption" required="">
                                                <span class="text-danger" id="err_caption">
                                                    <?php //echo form_error('title'); 
                                                    ?>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                            <button class="btn btn-primary save">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        <?php } ?>
        <?php
        if ($this->session->flashdata('MSG')) {
            echo $this->session->flashdata('MSG');
        }
        ?>
        <div class="row">
            <div class="col-12 mt-3">
                <div class="card border-top card-body">
                    <table id="videos" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Sr. No.</th>
                                <th>Video</th>
                                <th>Caption</th>
                                <?php if (encryptids("D", $_SESSION['admin_type']) == 3) {   ?>
                                    <th>Action</th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1;
                            foreach ($video as $list_v) { ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><button class="btn btn-primary" data-toggle="modal" data-target="#viewImage">View Video</button></td>
                                    <td><?php echo $list_v['title'] ?></td>
                                    <?php if (encryptids("D", $_SESSION['admin_type']) == 3) {   ?>
                                        <td class="d-flex border-bottom-0">
                                            <!-- <button onClick="" class="btn btn-info btn-sm mr-2 text-white" data-toggle="modal" data-target="#editform"><i class="fa fa-edit" aria-hidden="true"></i></button> -->
                                            <!-- <button onclick="deleteVideo('<?php echo $list_v['id']; ?>')" data-id="<?php echo $list_v['id']; ?>" class="btn btn-danger btn-sm mr-2"><i class="fa fa-trash" aria-hidden="true"></i></button> -->
                                            <button  data-id="<?php echo encryptids("E", $list_v['id']); ?>" class="btn btn-danger btn-sm mr-2 delete">Delete</button>
                                            <!-- Modal -->
                                            <div class="modal fade" id="viewImage" tabindex="-1" role="dialog" aria-labelledby="viewImageLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="viewImageLabel">Video Preview</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <video width="320" height="240" controls>
                                                                <source src="<?php echo base_url() . 'uploads/cms/gallary/video/' . $list_v['video']; ?>" type=video/mp4>
                                                            </video>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal fade " id="editform" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-xl" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Update Video
                                                            </h5>
                                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="mb-2 col-md-4">
                                                                    <label class="d-block text-font">Upload Video<sup class="text-danger">*</sup></label>
                                                                    <input type="file" class="form-control input-font" name="" id="">
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
                            <?php $i++;
                            } ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12 submit_btn p-3">
    <a class="btn btn-primary btn-sm text-white" onclick="location.href='<?php echo base_url();?>admin/gallery'">Back</a>
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
                <button type="button" id="close" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <a href="javascript:;" id="abcd"><button type="button" class="btn btn-primary abcd"  data-bs-dismiss="modal">Delete</button></a>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="invalidfiletype" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel" style="color:red;">Warning!</h5>
                    <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Only mp4 files accepted.</p>
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                    <button type="button" class="btn btn-primary ok" data-bs-dismiss="modal">Ok</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End of Main Content -->
<script>
    // function deleteBanner(id){
    //     $('#delete').modal('show');
    //     var id=$(this).attr('data-id');  
        
    //     $('#abcd').attr('href','<?php echo base_url(); ?>admin/delete_video/'+id); 
    // }
    var loadFileThumbnail1 = function(event) 
    {
        var fileSize = $('#video')[0].files[0].size;
       var validExtensions = ['mp4']; //array of valid extensions
        var fileName = $("#video").val();
        var fileNameExt = fileName.substr(fileName.lastIndexOf('.') + 1);
                   
            console.log(fileSize);
            if(fileName=="" || fileName==null){
                $('#err_video').text('This value is required');
            }else if($.inArray(fileNameExt, validExtensions) == -1){
            $('#video').val('');
            $('#invalidfiletype').modal('show');
            $('#err_video').text('This value is required');
        }else{
            $('#err_video').text(''); 
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

    $(document).ready(function(){
        $('#videos').DataTable();
        $('#add_videos').removeClass('was-validated');

        $('.save').on('click',function(){
        $('#add_videos').addClass('was-validated');
    })

    $('#addvideo').on('click', function(){
        $('#add_videos')[0].reset();

    }) 

$('#videos').on('click','.delete',function() { 
    // alert('delete clicked');
      //  $('#delete').modal('show');
        var id=$(this).attr('data-id');  
        // var eid=encryptids("D",$id);        
       // $('#abcd').attr('href','<?php echo base_url(); ?>admin/delete_video/'+id);


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
                            url: '<?php echo base_url(); ?>admin/delete_video/'+id,
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
    });
});
$('#newform').on('click','.save',function(){
    video = $("#video").val();
    caption = $("#caption").val();

    if(video=="" || video==null){
        $('#err_video').text('This value is required');
    }else if(caption=="" || caption==null){
        $('#err_caption').text('This value is required');
    }else{
        $('#err_caption').text('');
        $('#err_video').text('');
    }
});
</script>