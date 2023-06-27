    <!-- Begin Page Content -->
    <div class="container-fluid" id="consumer_page">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Consumer and BIS</h1>
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
            <?php if (encryptids("D", $_SESSION['admin_type']) == 3) { ?>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'admin/dashboard';?>" >Sub Admin Dashboard</a></li>
                <?php }else{ ?>
                    <li class="breadcrumb-item"><a href="<?php echo base_url().'admin/dashboard';?>" >Admin Dashboard</a></li>
              <?php  } ?>
            <li class="breadcrumb-item active" aria-current="page"><a href="<?php echo base_url().'admin/exchange_forum';?>" >Exchange Forum</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="<?php echo base_url().'admin/cmsManagenent_dashboard';?>" >CMS</a></li>
            <li class="breadcrumb-item" aria-current="page">Consumer and BIS</li>
            
            </ol>
        </nav>
    </div>
        <?php if(count($aboutConsumerBisData) == 0){   ?>
            <?php  if(in_array(2,$permissions)){ ?>
        <div class="row">
                <div class="col-12">
                    <div class="card border-top card-body">
                        <div>
                           <button type="button" class="btn btn-primary btn-sm mr-2" data-bs-toggle="modal" data-bs-target="#add_new">Add New</button>
                           <!-- <a href="<?php echo base_url(); ?>" type="button" class="btn btn-primary btn-sm mr-2" >Archive</a> -->
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
<!-- Modal -->

<div class="modal fade" id="add_new" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Consumer and BIS</h5>
        <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
      </div>
      <form id="add_admin" class="was-validated"  action="<?php echo base_url(); ?>cms/add_consumer_list" method="post" enctype="multipart/form-data">
      <div class="modal-body">
        <div class="row">
                <div class="mb-2 col-md-4">
                    <div class="row">
                    <label class="col-12 d-block text-font">Image<sup class="text-danger">*</sup></label>
                    <div class="col-9">
                            <input type="file" class="form-control input-font" name="image" id="image1"  accept="image/*" required="required" onchange="loadFileThumbnail1(event)">
                            <div class="invalid-feedback"> This value require</div>
                            
                    </div>
                    <div class="col-3">
                    <button type="button" class="btn btn-primary btn-sm mb-4" data-bs-toggle="modal" data-bs-target="#Previewimg"> 
                            Preview 
                        </button>
                    </div>
                    </div>
                </div>
        </div>
                <div class="row">
                    <div class="mb-2 col-md-12">
                        <label class="d-block text-font">Description<sup class="text-danger">*</sup></label>
                        <textarea class="form-control input-font" placeholder="Enter Description" name="description" id="description"></textarea>
                        <span class="text-danger" id="err_des"></span>
                    </div>
               </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm cancel">Cancel</button>
        <button  onclick="return submitform(event)"  class="btn btn-success btn-sm submit">Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="Previewimg" tabindex="-1" aria-labelledby="PreviewimgLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width:700px;">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="PreviewimgLabel">Image Preview</h5>

        <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span></button>
        </div>
        <div class="modal-body">
        <img id="outputThumbnail" width="100%" style="width: 100%; max-height: 500px;"/>
        </div>
        
    </div>
    </div>
</div>

         <div class="row">
            <div class="col-12 mt-3">
                <div class="card table-responsive border-top card-body">
                    <table id="example" class="table-bordered  ">
                        <thead>
                            <tr>
                                <th>Sr. No.</th>
                                <th>Image</th>
                                <th>Desciption</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(!empty($aboutConsumerBisData[0])){ ?>
                                <tr>
                                        <td>1</td>
                                        <td>
                                            <img src="<?php echo base_url().'uploads/cms/consumer_bis/'.$aboutConsumerBisData[0]['image']; ?>" width="50px" style="text-align:center;">
                                        </td>
                                        <td><?php echo $aboutConsumerBisData[0]['description']; ?></td>
                                        
                                        <td class="d-flex border-bottom-0">  
                                        <?php if (encryptids("D", $_SESSION['admin_type']) == 3) { ?>
                                            <?php  if(in_array(3,$permissions)){ ?>                                       
                                                <button type="button" class="btn btn-info btn-sm mr-2" data-bs-toggle="modal" data-bs-target="#edit_form">Edit</button>  
                                            <?php } ?>
                                            <?php  if(in_array(4,$permissions)){ ?>                                          
                                                <button  data-id='<?php echo $aboutConsumerBisData[0]['id']; ?>' data-img="<?php echo $aboutConsumerBisData[0]['image']; ?>" class="btn btn-danger btn-sm mr-2 delete_img">Delete</button>
                                            <?php } ?>
                                        <?php } ?>
                                        </td>
                                </tr>
                            <?php } ?>
                                
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- modal -->
<div class="modal fade" id="edit_form" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Edit Consumer and BIS</h5>
        <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
      </div>
      
      <form action="<?php echo base_url().'cms/update_consumer_list'; ?>" id="update_ban" class="was-validated" method="post" enctype="multipart/form-data" >
      <div class="modal-body">
      <div class="row">
                <div class="mb-2 col-md-4">
                   
                    <label class="col-12 d-block text-font">Image<sup class="text-danger">*</sup></label>
                    <div class="d-flex">
                        <div>
                            <input type="file" class="form-control input-font input" name="image" id="icon_file"  accept="image/*" onchange="loadFileThumbnail(event)">
                            <input type="hidden" name="old_image" value="<?php echo $aboutConsumerBisData[0]['image']; ?>">
                            <input type="hidden" name="id" value="<?php echo $aboutConsumerBisData[0]['id']; ?>">
                            <div class="invalid-feedback"> This value require </div>
                        </div>  
                        <div class="ml-2">  
                            <button type="button" class="btn btn-primary btn-sm mb-4" id="preview_new" data-bs-toggle="modal" data-bs-target="#Previewimg_1"> 
                                Preview 
                            </button>
                            <button type="button" class="btn btn-primary btn-sm mb-4" id="edit_preview"data-bs-toggle="modal" data-bs-target="#Previewimg_5"> 
                                Preview
                            </button>
                            <button type="button" class="btn btn-danger btn-sm mb-4" id="delete"> 
                                Delete 
                            </button>
                        </div>
                    </div>
                    
                </div>
        </div>
                <div class="row">
                    <div class="mb-2 col-md-12">
                        <label class="d-block text-font">Description<sup class="text-danger">*</sup></label>
                        <textarea class="form-control input-font" placeholder="Enter Description" name="description" id="description_edit"><?php echo $aboutConsumerBisData[0]['description']; ?></textarea>
                        <span class="text-danger" id="err_des_edit"></span>
                    </div>
               </div>
      </div>
      </form>
      <div class="modal-footer">        
        <button class="btn btn-secondary btn-sm cancel" >Cancel</button>
        <button type="submit" class="btn btn-success btn-sm update">Update</button>
      </div>
                           
    </div>
  </div>
</div>
<!-- modal -->
<!-- modal -->
<div class="modal fade" id="Previewimg_1" tabindex="-1" aria-labelledby="PreviewimgLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width:700px;">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="PreviewimgLabel">Image Preview Edit</h5>

        <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span></button>
        </div>
        <div class="modal-body">
        <img id="outputThumbnail5" src="<?php echo base_url().'uploads/cms/consumer_bis/'.$aboutConsumerBisData[0]['image'] ?>" style="width: 100%; max-height: 500px;"/>
        </div>
        
    </div>
    </div>
</div>
<!-- modal -->
<!-- modal -->
<div class="modal fade" id="Previewimg_5" tabindex="-1" aria-labelledby="PreviewimgLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width:700px;">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="PreviewimgLabel">Image Preview Uploaded</h5>

        <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span></button>
        </div>
        <div class="modal-body">
        <img id="outputThumbnail6" style="width: 100%; max-height: 500px;"/>
        </div>
        
    </div>
    </div>
</div>
<button onclick="history.back()" class="btn btn-primary btn-sm text-white mr-3 mt-2" style="float:right;">Back</button>
<!-- modal -->
        <script>
            CKEDITOR.replace( 'description' );
            CKEDITOR.replace( 'description_edit' );
        </script>
<script>
     $(".input").hide();
     $("#edit_preview").hide();
    $("#delete").click(function(){
  $(".input").show();
  $("#delete").hide();
  $("#preview_new").hide();
  $("#edit_preview").show();
});
    $('.cancel').on('click',function(){
    Swal.fire({
                    title: 'Are you sure you want to Cancel?',
                    showDenyButton: true,
                    showCancelButton: false,
                    confirmButtonText: 'Cancel',
                    denyButtonText: `Close`,
                    }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {  
                       location.reload();                            
                    } else if (result.isDenied) {
                        // Swal.fire('Changes are not saved', '', 'info')
                    }
                    })
})

function abcd(){
$(document).ready(function(){
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
});
}

var loadFileThumbnail = function(event) 
    {
        var fileSize = $('#icon_file')[0].files[0].size;
       var validExtensions = ['jpg', 'jpeg', 'png']; //array of valid extensions
        var fileName = $("#icon_file").val();;
        var fileNameExt = fileName.substr(fileName.lastIndexOf('.') + 1);
                   
            console.log(fileSize);
        if(fileSize < 20000){
            $('#icon_file').val('');
            // $('#lessSize').modal('show');
            $('#err_icon_file').text('This value is required');
            Swal.fire('File size should be greater than 20KB')
        }else if(fileSize > 204800){
            $('#icon_file').val('');
            // $('#greaterSize').modal('show');
            Swal.fire('File size should be less than 200KB')
            $('#err_icon_file').text('This value is required');
        }else if($.inArray(fileNameExt, validExtensions) == -1){
            $('#icon_file').val('');
            // $('#invalidfiletype').modal('show');
            Swal.fire('Only jpg,jpeg,png allowed')
            $('#err_icon_file').text('This value is required');
        }else{
            $('#err_icon_file').text('');
        }
       //  $("#Previewimg").show();
        var outputThumbnail = document.getElementById('outputThumbnail6');
        console.log(outputThumbnail);
        outputThumbnail.src = URL.createObjectURL(event.target.files[0]);
        console.log(outputThumbnail.src);
        outputThumbnail.onload = function()
        {
            URL.revokeObjectURL(outputThumbnail.src);
        }
    };

    var loadFileThumbnail1 = function (event){
        var fileSize = $('#image1')[0].files[0].size;
       var validExtensions = ['jpg', 'jpeg', 'png']; //array of valid extensions
        var fileName = $("#image1").val();;
        var fileNameExt = fileName.substr(fileName.lastIndexOf('.') + 1);
                   
            console.log(fileSize);
        if(fileSize < 20000){
            $('#image1').val('');
            // $('#lessSize').modal('show');
            $('#err_image').text('This value is required');
            Swal.fire('File size should be greater than 20KB');
        }else if(fileSize > 204800){
            $('#image1').val('');
            // $('#greaterSize').modal('show');
            Swal.fire('File size should be less than 200KB')
            $('#err_image').text('This value is required');
        }else if($.inArray(fileNameExt, validExtensions) == -1){
            $('#image1').val('');
            // $('#invalidfiletype').modal('show');
            Swal.fire('Only jpg,jpeg,png allowed')
            $('#err_image').text('This value is required');
        }else{
            $('#err_image').text('');
        }
       //  $("#Previewimg").show();
        var outputThumbnail = document.getElementById('outputThumbnail');
        
        outputThumbnail.src = URL.createObjectURL(event.target.files[0]);
        console.log(outputThumbnail.src);
        outputThumbnail.onload = function()
        {
            URL.revokeObjectURL(outputThumbnail.src);
        }
    }

    $('#example').on('click','.delete_img',function(){
        var id =$(this).attr('data-id');
        var image =$(this).attr('data-img');
        Swal.fire({
                    title: 'Are you sure you want to Delete ?',
                    showDenyButton: true,
                    showCancelButton: false,
                    confirmButtonText: 'Delete',
                    denyButtonText: `Cancel`,
                    }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {   
                        $.ajax({
                             type: 'POST',
                            url: '<?php echo base_url(); ?>cms/delet_consumer_list',
                            data: {
                                que_id: id,
                                banner:image,
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
    $('#delete').click(function(){
            $('#icon_file').attr('required',true);
        });
    $('.update').click(function(){
       var image = $('#icon_file').val();
       var imgatr = $('#icon_file').attr('required');
       var description = CKEDITOR.instances['description_edit'].getData();
       var isvalid = true;
        // alert(imgatr=="required");
        if(imgatr=="required"){
            if(image==""){
                isvalid=false;
            }
        }
        if(description==""){
            isvalid=false;
            $('#err_des_edit').text('This value required');
        }
       if(isvalid){
       
        Swal.fire({
                    title: 'Are you sure you want to Update ?',
                    showDenyButton: true,
                    showCancelButton: false,
                    confirmButtonText: 'Update',
                    denyButtonText: `Cancel`,
                    }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {  
                        
                       $('#update_ban').submit();
                                                   
                    } else if (result.isDenied) {
                        // Swal.fire('Changes are not saved', '', 'info')
                    }
                    })
                }
    })

  function submitform(event){
    event.preventDefault();
    var image = $('#image1').val();
    var description = CKEDITOR.instances['description'].getData();
    // console.log(description);
    // console.log(description);
   var isvalid = true;
   if(image==""){
    isvalid = false;
   }
   if(description==""){
    isvalid = false;
    $('#err_des').text('This value required');
   }else{
    $('#err_des').text('');
   }
    if(isvalid){
       
       Swal.fire({
                   title: 'Are you sure you want to Submit ?',
                   showDenyButton: true,
                   showCancelButton: false,
                   confirmButtonText: 'Submit',
                   denyButtonText: `Cancel`,
                   }).then((result) => {
                   /* Read more about isConfirmed, isDenied below */
                   if (result.isConfirmed) {
                    
                      $('#add_admin').submit();
                    
                                                
                   } else if (result.isDenied) {
                       // Swal.fire('Changes are not saved', '', 'info')
                   }
                   })
               }
  }  


</script>        

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>