    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">About eBIS</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                <?php if (encryptids("D", $_SESSION['admin_type']) == 3) { ?>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'Admin/dashboard';?>" >Sub Admin Dashboard</a></li>
                <?php }else{ ?>
                    <li class="breadcrumb-item"><a href="<?php echo base_url().'Admin/dashboard';?>" >Admin Dashboard</a></li>
                <?php } ?>
                
                <li class="breadcrumb-item"><a href="<?php echo base_url().'admin/exchange_forum';?>" >Exchange Forum</a></li>
                <li class="breadcrumb-item active" aria-current="page">About eBIS</li>
                
                </ol>
            </nav>

        </div>
        <?php if (encryptids("D", $_SESSION['admin_type']) == 3) {   ?>
            <?php if(count($about_ebis) < 1){?>
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
<!-- Modal -->
<form id="add_admin" class="was-validated"  action="<?php echo base_url(); ?>admin/add_ebis" method="post" enctype="multipart/form-data">
<div class="modal fade" id="add_new" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">About eBIS</h5>
        <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
      </div>
      <div class="modal-body">
        <div class="row">
                <div class="mb-2 col-md-4">
                    <div class="row">
                    <label class="col-12 d-block text-font">Image</label>
                    <div class="col-9">
                            <input type="file" class="form-control input-font" name="image" id="image1"  accept="image/*" required="required" onchange="loadFileThumbnail1(event)">
                            
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
                    <label class="d-block text-font">Description</label>
                    <textarea class="form-control input-font" placeholder="Enter Description" name="description" id="description"></textarea>
                </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm cancel">Cancel</button>
        <button type="button" class="btn btn-success btn-sm submit">Submit</button>
      </div>
    </div>
  </div>
</div>
</form>
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
<?php } } ?>
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
                                <!-- <tr>
                                        <td>1</td>
                                        <td>
                                            <img src="#" width="50px" style="text-align:center;">
                                        </td>
                                        <td>BIS undertakes various activities, events and competitions for their members and standard clubs situated in various states and regions. Wherein BIS arranges various events for their members and standard clubs. BIS now want to have a separate window as an exchange forum which will be publically available or the platform for the users to get connected and share their views across various events and win the exciting prizes. Also various committee members will now be able to participate in various standard writing competitions and other activities and explore various events and information contents with the help of this forum. People will be able to view the details of various standards getting published under Bureau of India Standards and will also be able to join various discussions on the forum and share their views.</td>
                                        
                                        <td class="d-flex border-bottom-0">
                                            <a href="#" class="btn btn-info btn-sm mr-2 edit">Edit</a>
                                            <a href="#" class="btn btn-danger btn-sm mr-2 delete">Delete</a>
                                        </td>
                                </tr> -->
                                <?php if (!empty($about_ebis)) {
                                $i = 1;
                                foreach ($about_ebis as $list_aef) { ?>
                                <tr>
                                        <td><?php echo $i++ ?></td>
                                        <td><?php if ($list_aef['image']) { ?>
                                                <img src="<?php echo base_url(); ?>uploads/cms/ebis/<?php echo $list_aef['image'] ?>" data-toggle="modal" data-target="#viewImage" width="40px">
                                            <?php } else {
                                                echo "No Uploaded";
                                            } ?>
                                        </td>

                                        <td><?php echo $list_aef['description']; ?></td>
                                        <td class="d-flex">
                                        <button onclick="abcd()" class="btn btn-info btn-sm mr-2 text-white edit" >Edit</button>
                                        <button onclick="deleteExngForum(' <?php echo $list_aef['id']; ?>','<?php echo $list_aef['image']; ?> ');" data-id='<?php echo $list_aef['id']; ?>' class="btn btn-danger btn-sm mr-2 delete_img">Delete</button>
                                        </td>
                                </tr>
                                <?php } } ?>
                                
                      </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="modal fade " id="editform" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Update About Exchange forum
                            </h5>
                            <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
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
                                                 
                                </div>
                                    <div class="row" id="add_file">
                                        <div class="col-9">
                                            <input type="file" class="form-control input-font" name="image" id="icon_file" value=""  accept="image/*" onchange="loadFileThumbnail(event)">
                                            <input type="hidden" class="form-control input-font" name="old_image" id="image" value="<?php echo $about_ebis[0]['image']; ?>">
                                            <input type="hidden" id="id" name="id" value="<?php echo $about_ebis[0]['id']; ?>" >
                                            <span class="text-danger" id="err_icon_file"></span>
                                        </div>
                                        <button type="button" class="btn btn-primary btn-sm mb-4" data-bs-toggle="modal" data-bs-target="#Previewimg"> Preview </button>
                                    </div>     
                                                          
                            </div>
                             
                                    
                        </div>
                                <div class="mb-2 col-md-12">
                                    <label class="d-block text-font">Description</label>
                                    <!-- <textarea name="description10" class="form-control" id="description10"></textarea> -->
                                    <textarea class="form-control input-font" placeholder="Enter Description" name="description" id="description"><?php echo $about_ebis[0]['description']; ?></textarea>
                                    <span class="text-danger" id="err_description">
                                        <?php //echo form_error('title'); 
                                        ?>
                                    </span>
                                    <div class="invalid-feedback">
                                        Character length should be 5 to 1000
                                        </div>
                                </div>
                                <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                <button onclick="return updateButton(event)" type="submit" class="btn btn-primary" >Update</button>
                            </div>
                            </div>
                            
                            </form>
                        </div>
                    </div>
                </div>
    
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
                                                        <img src="<?php echo base_url(); ?>uploads/cms/ebis/<?php echo $about_ebis[0]['image'] ?>" id="outputicon" width="100%"/>
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
    <script>
            CKEDITOR.replace( 'description' )
        
            
    </script>
    <script>
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
             var description = CKEDITOR.instances['description'].getData();
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
             } else if((description.length) > 20000){
                $("#err_description").text("Only 20000 Characters Allowed");
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
           
                $('#updateform').attr('action','<?php echo base_url(); ?>admin/update_ebis');                
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



         function deleteExngForum(que_id,image) {
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
                                    url: '<?php echo base_url(); ?>admin/deletEbisForum',
                                    data: {
                                        que_id: que_id,
                                        image: image,
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
                        }
        $('.edit').on('click',function(){
    Swal.fire({
                    title: 'Are you sure you want to edit?',
                    showDenyButton: true,
                    showCancelButton: false,
                    confirmButtonText: 'Edit',
                    denyButtonText: `Close`,
                    }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {   
                        $('#editform').modal('show');
           
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
                                
                       // window.location.replace('<?php echo base_url(); ?>Standardswritting/create_competition_list');                   
                        //$('#competition_edit').submit();
                       // Swal.fire('Saved!', '', 'success')                                
                    } else if (result.isDenied) {
                        // Swal.fire('Changes are not saved', '', 'info')
                    }
                    })
})
$('.delete').on('click',function(){
    Swal.fire({
                    title: 'Are you sure you want to delete?',
                    showDenyButton: true,
                    showCancelButton: false,
                    confirmButtonText: 'Delete',
                    denyButtonText: `Close`,
                    }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {    
                       // window.location.replace('<?php echo base_url(); ?>Standardswritting/create_competition_list');                   
                        //$('#competition_edit').submit();
                       // Swal.fire('Saved!', '', 'success')                                
                    } else if (result.isDenied) {
                        // Swal.fire('Changes are not saved', '', 'info')
                    }
                    })
})
$('.submit').on('click',function(){
    Swal.fire({
                    title: 'Are you sure you want to Submit?',
                    showDenyButton: true,
                    showCancelButton: false,
                    confirmButtonText: 'Submit',
                    denyButtonText: `Close`,
                    }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {    
                       // window.location.replace('<?php echo base_url(); ?>Standardswritting/create_competition_list');                   
                        $('#add_admin').submit();
                       // Swal.fire('Saved!', '', 'success')                                
                    } else if (result.isDenied) {
                        // Swal.fire('Changes are not saved', '', 'info')
                    }
                    })
})
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
                       // window.location.replace('<?php echo base_url(); ?>Standardswritting/create_competition_list');                   
                        //$('#competition_edit').submit();
                       // Swal.fire('Saved!', '', 'success')                                
                    } else if (result.isDenied) {
                        // Swal.fire('Changes are not saved', '', 'info')
                    }
                    })
})
    </script>
   