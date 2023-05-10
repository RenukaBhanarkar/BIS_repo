<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Useful Links List</h1>
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
            aria-label="breadcrumb">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url().'admin/';?>" >Home</a></li>
  <li class="breadcrumb-item active" aria-current="page"><a href="<?php echo base_url().'admin/exchange_forum';?>" >Exchange Forum</a></li>
  <li class="breadcrumb-item"><a href="<?php echo base_url().'admin/cmsManagenent_dashboard';?>" >CMS</a></li>
  <li class="breadcrumb-item active" aria-current="page"><a href="<?php echo base_url().'admin/footer_links';?>" >Footer Link</a></li>
            </ol>
        </nav>
    </div>


    <!-- Content Row -->

    <div class="col-12">
    <?php if (encryptids("D", $_SESSION['admin_type']) == 3) {   ?>
        <div class="card border-top card-body">
            <div>
                <button type="button" class="btn btn-primary btn-sm mr-2" data-toggle="modal" data-target="#newform">Add New Useful Links</button>
                <div class="modal fade " id="newform" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-xl" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add Useful Links</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="<?php echo base_url(); ?>admin/add_useful_links" class="was-validated"  method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="mb-2 col-md-4">
                                        <label class="d-block text-font">Image</label>
                                        <input type="file" class="form-control input-font" name="image" id="" required="" accept="image/jpeg" title="please select File">
                                        <span class="error_text">only .jpg, .jpeg and .png allowed
                                            <?php //echo form_error('title'); ?>
                                        </span>
                                        <div class="invalid-feedback">Please Select File
                                                                        </div>
                                    </div>
                                    <div class="mb-2 col-md-4">
                                        <label class="d-block text-font">Title</label>
                                        <input type="text" class="form-control input-font" name="title" id="" minlength="5" maxlength="20" required="" placeholder="Please Enter title">
                                        <span class="error_text">
                                            <?php //echo form_error('title'); ?>
                                        </span>
                                        <div class="invalid-feedback">Title length should be 5 to 20 characters
                                                                        </div>
                                    </div>
                                    <div class="mb-2 col-md-4">
                                        <label class="d-block text-font">Link</label>
                                        <input type="text" class="form-control input-font" name="link" id="" minlength="5" maxlength="200" required="" placeholder="https://www.bis.gov.in">
                                        <span class="error_text">
                                            <?php //echo form_error('title'); ?>
                                        </span>
                                        <div class="invalid-feedback">enter valid URL starts with https://
                                                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                    <button class="btn btn-primary">Submit</button>
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
                    <table id="example" class="table table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Sr. No.</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Link</th>
                                <?php if (encryptids("D", $_SESSION['admin_type']) == 3) {   ?>
                                <th>Action</th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if(!empty($useful_link)){
                            $i=1;
                            foreach($useful_link as $list_ul)
                            {?>
                            <tr>
                                <td><?php echo $i++?></td>
                                <td><?php if($list_ul['image']){ ?>                                 
                                    <img src="<?php echo base_url(); ?>uploads/<?php echo $list_ul['image']?>" width="50">
                                    <?php }else{ echo "No Uploaded";} ?>
                                </td> 
                                <td><?php echo $list_ul['title']; ?></td>
                                <td><?php echo $list_ul['link']; ?></td>
                                <?php if (encryptids("D", $_SESSION['admin_type']) == 3) {   ?>
                                <td class="d-flex border-bottom-0">
                                    <button onclick="edit('<?php echo $list_ul['id']; ?>')" class="btn btn-info btn-sm mr-2 text-white" data-toggle="modal"
                                        data-target="#editform">Edit</button>
                                    <button onclick="deleteUsefulLinks(' <?php echo $list_ul['id']; ?> ');" data-id ='<?php echo $list_ul['id']; ?>' class="btn btn-danger btn-sm mr-2">Delete</button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="viewImage" tabindex="-1" role="dialog"
                                        aria-labelledby="viewImageLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="viewImageLabel">Image Preview</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <img src="<?php echo base_url(); ?>assets/admin/img/bis_logo.png"
                                                        alt="" width="100%">
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade " id="editform" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-xl" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Update Useful Links
                                                    </h5>
                                                    <button class="close" type="button" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                <form action="javascript:;" class="was-validated" method="post" enctype="multipart/form-data" id="updateform">
                                                    <div class="row">

                                                        <div class="mb-2 col-md-4">
                                                            <label class="d-block text-font">Image</label>
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
                                                                                        <button type="button"  onclick="resetbanner()" class="btn btn-secondary" data-bs-dismiss="modal">ReSet</button>
                                                                                        <button type="button" class="btn btn-primary"data-bs-dismiss="modal">Save changes</button>
                                                                                        </div> 
                                                                                    </div>
                                                                                    </div>
                                                                                </div>       
                                                                                            <!-- Modal -->
                                                            </div>
                                                            <div class="" id="add_file">
                                                            <!-- <input type="file" class="form-control input-font" name="follow_us"
                                                                id="icon_file" value=""  accept="image/*">
                                                                <?php //echo form_error('title'); ?>
                                                            <input type="hidden" id="old_img" name="old_img" value="">                                                            <span class="error_text">
                                                            <input type="hidden" id="id" name="id" value="">   -->


                                                            <input type="file" class="form-control input-font" name="image"
                                                                id="icon_file" value=""  accept="image/*">
                                                            <input type="hidden" name="old_img" id="image" value="">
                                                            <input type="hidden" name="id" id="id" value="">
                                                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#Previewimg1"> Preview 
                                                            </button>
                                                            <span class="error_text">
                                                                <?php //echo form_error('title'); ?>
                                                            </span>

                                                            <div class="modal fade" id="Previewimg1" tabindex="-1" aria-labelledby="PreviewimgLabel" aria-hidden="true">
                                    <div class="modal-dialog" style="max-width:700px;">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="PreviewimgLabel">Image Preview</h5>

                                        <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span></button>
                                        </div>
                                        <div class="modal-body">
                                        <img id="icon_file"width="100%"/>
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button"  onclick="resetbanner()" class="btn btn-secondary" data-bs-dismiss="modal">ReSet</button>
                                        <button type="button" class="btn btn-primary"data-bs-dismiss="modal">Save</button>
                                        </div>
                                    </div>
                                    </div>
                                </div> 
                                                            
                                                            </div>
                                                           
                                                        </div>
                                                        <div class="mb-2 col-md-4">
                                                            <label class="d-block text-font">Title</label>
                                                            <input type="text" class="form-control input-font" name="title"
                                                                id="title">
                                                            <span class="error_text" id="err_title" style="color:red;">
                                                                <?php //echo form_error('title'); ?>
                                                            </span>
                                                        </div>
                                                        <div class="mb-2 col-md-4">
                                                            <label class="d-block text-font">Link</label>
                                                            <input type="text" class="form-control input-font" name="link"
                                                                id="link" minlength="6" maxlength="200" required="">
                                                            <span class="error_text" id="err_password" style="color:red;">
                                                                <?php //echo form_error('title'); ?>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-secondary" type="button"
                                                            data-dismiss="modal">Cancel</button>
                                                        <button onclick="submitButton()" class="btn btn-primary">Update</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                    <?php } ?>


                            </tr>
<?php }} ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Record</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
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
    <!-- /.container-fluid -->
    <div class="col-md-12 submit_btn p-3">
    <a class="btn btn-primary btn-sm text-white" onclick="location.href='<?php echo base_url();?>admin/footer_links'">Back</a>
    </div>
</div>
<script type="text/javascript">
    var loadFileThumbnail = function(event) 
    {
        // $("#outputThumbnail").show();
        var icon_file = document.getElementById('icon_file');
        icon_file.src = URL.createObjectURL(event.target.files[0]);
        icon_file.onload = function()
        {
            URL.revokeObjectURL(icon_file.src);
        }
    };

    function resetimg()
    {
        // $("#video_thumbnail").val(''); 
        $("#outputThumbnail").hide(); 
    }


    function deleteUsefulLinks(que_id) {
        // var c = confirm("Are you sure to delete this survey details? ");
        // if (c == true) {
            $('#delete').modal('show');
        $('.abcd').on('click', function() {
            // const $loader = $('.igr-ajax-loader');
            //$loader.show();
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url(); ?>admin/deleteUsefulLinks',
                data: {
                    que_id: que_id,
                },
                success: function(result) {
                    // $('#row' + que_id).css({
                    //     'display': 'none'
                    // });
                    // alert('success' 'refresh');
                    location.reload();
                },
                error: function(result) {
                    alert("Error,Please try again.");
                }
            });

        })
    }

    function edit(que_id){
    // $('#editform').reset('modal');
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

            $("#err_title").text("");
             $("#err_password").text("");
        $.ajax({
                url: '<?php echo base_url(); ?>admin/edit_useful_links/'+que_id,
                type:"JSON",
                method:"get",
                success: function(result) {
                    var res = JSON.parse(result); 
                    console.log(res);
                    $('#id').val(res.id);
                    $('#image').val(res.image);
                    $('#title').val(res.title);
                    $('#link').val(res.link);
                
                var img=res.image;
                $('#old_img').attr('href','<?php echo base_url()."uploads/admin"; ?>'+img);
                $('#outputicon').attr('src','<?php echo base_url(); ?>uploads/'+res.image);
                },
                error: function(result) {
                    alert("Error,Please try again.");
                }
            });          
    }


    function submitButton() {
             var title = $("#title").val();
             var link= $("#link").val();
             var is_valid = true;
             
                        
             if (title == "") {
                 $("#err_title").text("This value is required");
                 $("#title1").focus();
                 is_valid = false;
             
             } else if (!(title.length > 2)) {
                 $("#err_title").text("Please Enter minimum 3 Characters");
                 $("#title1").focus();
                 is_valid = false;
             } else {
                 $("#err_title").text("");
             }
             if (link== "") {
                 $("#err_password").text("This value is required");
                 $("#link").focus();
                 is_valid = false;
             } else if ((link.length < 6)) {
                 $("#err_password").text("Please Enter minimum 6 Characters");
                 $("#link").focus();
                 is_valid = false;
             } else {
                 $("#err_password").text("");
             }            

             if (is_valid) { 
                $('#updateform').attr('action','<?php echo base_url(); ?>admin/update_useful_links');                
                 return true;
             } else {
                 return false;
             }
         };
                
            </script>
<!-- End of Main Content -->
