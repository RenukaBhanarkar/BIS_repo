<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">About Exchange forum</h1>
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url().'admin/';?>" >Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="<?php echo base_url().'admin/exchange_forum';?>" >Exchange Forum</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="<?php echo base_url().'admin/cmsManagenent_dashboard';?>" >CMS</a></li>
            </ol>
        </nav>
    </div>
    <!-- Content Row -->

    <div class="col-12">
    <?php if (encryptids("D", $_SESSION['admin_type']) == 3) {   ?>
        <?php if(count($about_exchange_forum) < 1){?>
        <div class="card border-top card-body">
            <div>
               
                <button type="button" class="btn btn-primary btn-sm mr-2" data-toggle="modal" data-target="#newform">Add
                    New About Exchange forum</button>
                   
                <form id="add_admin" class="was-validated"  action="<?php echo base_url(); ?>admin/add_about_exchange_forum" method="post" enctype="multipart/form-data">
                    <div class="modal fade " id="newform" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add About Exchange forum</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="mb-2 col-md-4">
                                            <div class="row">                                                
                                            <label class="d-block text-font ml-3">Upload Image<sup class="text-danger">*</sup></label>
                                            <div class="col-9">
                                            <div class="row"></div>
                                            <input type="file" class="form-control input-font" name="image" id="image1"  accept="image/*" required="required" onchange="loadFileThumbnail1(event)">
                                            <span class="text-danger" id="err_image">
                                                <?php //echo form_error('title'); 
                                                ?>
                                            </span>
                                            </div>


                                            <div class="col-3">
                                            <button type="button" class="btn btn-primary btn-sm mb-4" data-bs-toggle="modal" data-bs-target="#Previewimg"> 
                                                Preview 
                                            </button>
                                            </div>
                                            
                                            </div>

                                        </div>
                                        <div class="mb-2 col-md-8">
                                            <label class="d-block text-font">Description</label>
                                            <textarea class="form-control" id="description" name="description" rows="5" required="" minlength="5" maxlength="1000"></textarea>
                                            <span class="text-danger" id="err_descriptions">
                                                <?php //echo form_error('title'); 
                                                ?>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                        <button onclick="return submitForm(event)" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>
        <?php } ?>
        
        <?php
        if ($this->session->flashdata('MSG')) {          
            echo $this->session->flashdata('MSG');
            // echo "<script>Swal.fire('Success')</script>";
        }
        ?>
        <?php } ?>
        <div class="row">
            <div class="col-12 mt-3">
                <div class="card border-top card-body">
                    <table id="example" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Sr. No.</th>
                                <th>Image</th>
                                <th>Description</th>
                                <?php if (encryptids("D", $_SESSION['admin_type']) == 3) {   ?>
                                <th>Action</th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($about_exchange_forum)) {
                                $i = 1;
                                foreach ($about_exchange_forum as $list_aef) { ?>

                                    <tr>
                                        <td><?php echo $i++ ?></td>
                                        <td><?php if ($list_aef['image']) { ?>
                                                <img src="<?php echo base_url(); ?>uploads/cms/about_exchange_forum/<?php echo $list_aef['image'] ?>" data-toggle="modal" data-target="#viewImage" width="40px">
                                            <?php } else {
                                                echo "No Uploaded";
                                            } ?>
                                        </td>

                                        <td><?php echo $list_aef['description']; ?></td>
                                        <?php if (encryptids("D", $_SESSION['admin_type']) == 3) {   ?>
                                        <td class="d-flex border-bottom-0">
                                            <button onclick="abcd()" class="btn btn-info btn-sm mr-2 text-white" data-toggle="modal" data-target="#editform">Edit</button>
                                            <button onclick="deleteExngForum(' <?php echo $list_aef['id']; ?> ');" data-id='<?php echo $list_aef['id']; ?>' class="btn btn-danger btn-sm mr-2 delete_img">Delete</button>
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
                                                            <img src="<?php echo base_url(); ?>uploads/cms/about_exchange_forum/<?php echo $list_aef['image'] ?>" alt="" width="100%">
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal fade " id="editform" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-xl" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Update About Exchange forum
                                                            </h5>
                                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="javascript:;" method="post" class="was-validated"  enctype="multipart/form-data" id="updateform">
                                                            <!-- <div class="row"> -->
                                                                <div class="mb-2 col-md-4">
                                                                <div class="mb-2 col-md-12">
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
                                                                                        <img src="<?php echo base_url(); ?>uploads/cms/about_exchange_forum/<?php echo $about_exchange_forum[0]['image'] ?>" id="outputicon" width="100%"/>
                                                                                        </div>
                                                                                        <!-- <div class="modal-footer">
                                                                                        <button type="button"  onclick="resetbanner()" class="btn btn-secondary" data-bs-dismiss="modal">ReSet</button>
                                                                                        <button type="button" class="btn btn-primary"data-bs-dismiss="modal">Save changes</button>
                                                                                        </div>  -->
                                                                                    </div>
                                                                                    </div>
                                                                                </div>  
                                                             </div>
                                                                                <div class="row" id="add_file">
                                                                                <div class="col-9">


                                                           

                                                            <input type="file" class="form-control input-font" name="image" id="icon_file" value=""  accept="image/*" onchange="loadFileThumbnail(event)">
                                                                    <input type="hidden" class="form-control input-font" name="old_image" id="image" value="<?php echo $about_exchange_forum[0]['image']; ?>">
                                                                    <input type="hidden" id="id" name="id" value="<?php echo $about_exchange_forum[0]['id']; ?>" >
                                                                    <span class="text-danger" id="err_icon_file">
                                                                        <?php //echo form_error('title'); 
                                                                        ?>
                                                                    </span>
                                                                                </div>
                                                                                <button type="button" class="btn btn-primary btn-sm mb-4" data-bs-toggle="modal" data-bs-target="#Previewimg"> Preview 
                                                            </button>



                                                            
                                                            </div>     
                                                                                            <!-- Modal -->
                                                            </div>








                                                                    
                                                                </div>
                                                                <!-- <div class="mb-2 col-md-12"><br>
                                                                <img src="<?php echo base_url(); ?>uploads/<?php echo $about_exchange_forum[0]['image'] ?>" data-toggle="modal" data-target="#viewImage" width="334px">
                                                                </div> -->
                                                                <!-- </div> -->
                                                                <div class="mb-2 col-md-12">
                                                                    <label class="d-block text-font">Description</label>
                                                                    <textarea name="description" class="form-control" id="description1" rows="8" maxlength="1000" minlength="6" required=""><?php echo $about_exchange_forum[0]['description']; ?></textarea>
                                                                    <span class="text-danger" id="err_description">
                                                                        <?php //echo form_error('title'); 
                                                                        ?>
                                                                    </span>
                                                                    <div class="invalid-feedback">
                                                                        Character length should be 5 to 1000
                                                                        </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                                                <button onclick="return updateButton(event)" type="submit" class="btn btn-primary" >Update</button>
                                                            </div>
                                                            </form>
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
    <div class="col-md-12 submit_btn p-3">
        <a class="btn btn-primary btn-sm text-white" onclick="location.href='<?php echo base_url();?>admin/cmsManagenent_dashboard'">Back</a>
    </div> 

</div>
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
        <h5 class="modal-title" id="PreviewimgLabel">Image Preview</h5>

        <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span></button>
        </div>
        <div class="modal-body">
        <img id="outputThumbnail" width="100%"/>
        </div>
        <!-- <div class="modal-footer">
        <button type="button"  onclick="resetbanner()" class="btn btn-secondary" data-bs-dismiss="modal">ReSet</button>
        <button type="button" class="btn btn-primary"data-bs-dismiss="modal">Save</button>
        </div> -->
    </div>
    </div>
</div> 
<script type="text/javascript">
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
        var outputThumbnail = document.getElementById('outputThumbnail');
        
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


    function submitForm(event){
        event.preventDefault();
        is_valid=true;
        var description = CKEDITOR.instances['description'].getData();
        var image = $('#image1').val();

        if (description == "") {                
                $("#err_descriptions").text("This value is required");
                $("#description1").focus();
                is_valid = false;   
                          
            } else if(!(description.length > 5)){
               $("#err_descriptions").text("Enter atleast 5 character");
                // $("#description").focus();
               
                is_valid = false;  
            } else if((description.length) > 1000){
               $("#err_descriptions").text("Only 1000 Characters Allowed");                
                is_valid = false;  
            }else{
                $("#err_descriptions").text("");   
            }


                if(image=="" || image==null){
                is_valid = false;   
                    Swal.fire('Please select file')
                    $('#err_image').text('This value is required');
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
                                Swal.fire('Saved!', '', 'success')
                                // return true;
                                $('#add_admin').submit();
                                // return true
                            } else if (result.isDenied) {
                                Swal.fire('Changes are not saved', '', 'info')
                            }
                            })
                }





    }


    function resetimg()
    {    
        $("#outputThumbnail").hide(); 
    }
   
    function deleteExngForum(que_id) {
        // var c = confirm("Are you sure to delete this survey details? ");

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
                                    url: '<?php echo base_url(); ?>admin/deletExngForum',
                                    data: {
                                        que_id: que_id,
                                    },
                                    success: function(result) {
                                        location.reload();
                                    },
                                    error: function(result) {
                                        alert("Error,Please try again.");
                                    }
                                });

                                Swal.fire('Saved!', '', 'success')
                                // return true;
                                // $('#updateform').submit();
                                // return true
                            } else if (result.isDenied) {
                                Swal.fire('Changes are not saved', '', 'info')
                            }
                            })










        // $('#delete').modal('show');
        // $('.abcd').on('click', function() {

        //     $.ajax({
        //         type: 'POST',
        //         url: '<?php echo base_url(); ?>admin/deletExngForum',
        //         data: {
        //             que_id: que_id,
        //         },
        //         success: function(result) {
        //             location.reload();
        //         },
        //         error: function(result) {
        //             alert("Error,Please try again.");
        //         }
        //     });
        // });
    }

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
    function updateButton(event) {
        event.preventDefault();
       


            //  var description = $("#description1").val();
             var description = CKEDITOR.instances['description1'].getData();
            //  var privacy_policy= $("#privacy_policy").val();
            //  var hlp= $("#hlp").val();
            //  var disclamer= $("#disclamer").val();
            //  var copyright_policy= $("#copyright_policy").val();
            //  var cmap= $("#cmap").val();
            //  var cap= $("#cap").val();
            //  var crp= $("#crp").val();
console.log(description.length);

             var is_valid = true;
             
                        
             if (description == "") {
                
                 $("#err_description").text("This value is required");
                 $("#description1").focus();
                 is_valid = false;   
                           
             } else if(!(description.length > 5)){
                $("#err_description").text("Enter atleast 5 character");
                 $("#description1").focus();
                 $('#updateform').addClass('');
                 is_valid = false;  
             } else if((description.length) > 1000){
                $("#err_description").text("Only 1000 Characters Allowed");
                 $("#description1").focus();
                 is_valid = false;  
             }
             
             var abc=$('#icon_file').attr('required');
             console.log(abc);
             if(abc=="required"){
                var image = $('#icon_file').val();
                if(image=="" || image==null){
                    is_valid = false;   
                    Swal.fire('Please select file')
                    $('#err_icon_file').text('This value is required');
                }else{

                }
             }else{

             }
             



             if (is_valid) { 
           
                $('#updateform').attr('action','<?php echo base_url(); ?>admin/update_about_exchange_forum');                
                //  return true;

                 Swal.fire({
                            title: 'Do you want to Submit?',
                            showDenyButton: true,
                            showCancelButton: false,
                            confirmButtonText: 'Submit',
                            denyButtonText: `Cancel`,
                            }).then((result) => {
                            /* Read more about isConfirmed, isDenied below */
                            if (result.isConfirmed) {
                                Swal.fire('Saved!', '', 'success')
                                // return true;
                                $('#updateform').submit();
                                // return true
                            } else if (result.isDenied) {
                                Swal.fire('Changes are not saved', '', 'info')
                            }
                            })



             } else {
                 return false;
             }
         };


         (() => {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  const forms = document.querySelectorAll('.needs-validation')
  var description = $("#description1").val();
  // Loop over them and prevent submission
  Array.from(forms).forEach(form => {
    form.addEventListener('submit', event => {
      if (!form.checkValidity()) {
        event.preventDefault()
        event.stopPropagation()
      }

       form.classList.add('was-validated')
    }, false)
  })
})()
</script>
<script>
                        CKEDITOR.replace( 'description1' );
                        CKEDITOR.replace( 'description' );

</script> 
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>