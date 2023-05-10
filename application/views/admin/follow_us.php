<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Follow Us List</h1>
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
                <button type="button" class="btn btn-primary btn-sm mr-2" data-toggle="modal" data-target="#newform">Add  New Follow Us link</button>
                <div class="modal fade " id="newform" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-xl" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add Follow Us Link</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <form action="<?php echo base_url(); ?>admin/add_follow_us" method="post" class="was-validated" enctype="multipart/form-data">
                            <div class="modal-body">
                                <div class="row">

                                    <div class="mb-2 col-md-4">
                                        <label class="d-block text-font">Icon</label>
                                        <input type="file" class="form-control input-font" name="follow_us" id="follow_us" required="">
                                        <span class="error_text">
                                            Only jpg,jpeg,png allowed
                                            <?php //echo form_error('title'); ?>
                                        </span>
                                    </div>
                                    <div class="mb-2 col-md-4">
                                        <label class="d-block text-font">Title</label>
                                        <input type="text" class="form-control input-font" name="title" id="title" minlength="3" maxlength="20" required="">
                                        <span class="error_text">
                                            <?php //echo form_error('title'); ?>
                                        </span>
                                        <div class="invalid-feedback">
                                            Title length should be 3 to 20 characters
                                            </div>
                                    </div>
                                    <div class="mb-2 col-md-4">
                                        <label class="d-block text-font">Link</label>
                                        <input type="text" class="form-control input-font" name="link" id="link" required="">
                                        <span class="error_text">
                                            <?php //echo form_error('title'); ?>
                                        </span>
                                        <div class="invalid-feedback">
                                            Enter valid URL
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
                    <table id="followus" class="table table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Sr. No.</th>
                                <th>Icon</th>
                                <th>Title</th>
                                <th>Link</th>
                                <?php if (encryptids("D", $_SESSION['admin_type']) == 3) {   ?>
                                <th>Action</th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if(!empty($follow_us)){
                            $i=1;
                            foreach($follow_us as $list_follow)
                            {?>
                            <tr>
                                <td>1</td>
                                <td><?php if($list_follow['icon']){ ?>                                 
                                    <img src="<?php echo base_url(); ?>uploads/<?php echo $list_follow['icon']?>" width="50">
                                    <?php }else{ echo "No Uploaded";} ?></td>
                                    <td><?php echo $list_follow['title']; ?></td>
                                <td><?php echo $list_follow['link']; ?></td>
                                <?php if (encryptids("D", $_SESSION['admin_type']) == 3) {   ?>
                                <td class="d-flex border-bottom-0">
                                    <button onclick="edit('<?php echo $list_follow['id']; ?>')" class="btn btn-info btn-sm mr-2 text-white" data-toggle="modal"
                                        data-target="#editform">Edit</button>
                                    <button onclick="deleteFollowUs(' <?php echo $list_follow['id']; ?> ');" data-id ='<?php echo $list_follow['id']; ?>'
                                    class="btn btn-danger btn-sm mr-2">Delete</button>
                                    <!-- Modal -->
            
                                    <div class="modal fade " id="editform" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-xl" role="document">
                                            <div class="modal-content">
                                            <form action="javascript:;" method="post" class="was-validated" enctype="multipart/form-data" id="updateform">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Update Follow Us Link
                                                    </h5>
                                                    <button class="close" type="button" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">

                                                        <div class="mb-2 col-md-4">
                                                            <label class="d-block text-font">Icon</label>
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
                                                            <input type="file" class="form-control input-font" name="follow_us"
                                                                id="icon_file" value=""  accept="image/*">
                                                                <?php //echo form_error('title'); ?>
                                                            <input type="hidden" id="old_img" name="old_img" value="">                                                            <span class="error_text">
                                                            <input type="hidden" id="id" name="id" value="">  
                                                            
                                                        </div>
                                                        </div>
                                                        <div class="mb-2 col-md-4">
                                                            <label class="d-block text-font">Title</label>
                                                            <input type="text" class="form-control input-font" name="title"
                                                                id="title1" value="" required="">
                                                                <span class="error_text" id="err_title" style="color: red;">
                                                            </span>
                                                        </div>
                                                        <div class="mb-2 col-md-4">
                                                            <label class="d-block text-font">Link</label>
                                                            <input type="text" class="form-control input-font" name="link"
                                                                id="link1" value="" required="">
                                                            <span class="error_text" id="err_password" style="color: red;">
                                                                <?php //echo form_error('title'); ?>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button  class="btn btn-secondary" type="button"
                                                            data-dismiss="modal">Cancel</button>
                                                        <button onclick="submitButton()" class="btn btn-primary">Update</button>
                                                    </div>
                                                </div>
                                                </form>
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
    <!-- /.container-fluid -->
    <div class="col-md-12 submit_btn p-3">
    <a  href="<?php echo base_url().'admin/footer_links' ?>" class="btn btn-primary btn-sm text-white" >Back</a>
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
<!-- End of Main Content -->
<script>
    $(document).ready(function(){
        $('#followus').DataTable();
    });
function deleteFollowUs(que_id) {
    $('#delete').modal('show');
        $('.abcd').on('click', function() {
                    // var c = confirm("Are you sure to delete this survey details? ");
                    // if (c == true) {
                        // const $loader = $('.igr-ajax-loader');
                        //$loader.show();
                        $.ajax({
                            type: 'POST',
                            url: '<?php echo base_url(); ?>admin/deleteFollowUs',
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
    //  $('#editform').modal('show');
        $.ajax({
                url: '<?php echo base_url(); ?>admin/edit_followus/'+que_id,
                type:"JSON",
                method:"get",
                success: function(result) {
                    var res = JSON.parse(result); 
                    console.log(res);
                    $('#id').val(res.id);
                    $('#old_img').val(res.icon);
                    $('#title1').val(res.title);
                    $('#link1').val(res.link);
                   
                var img=res.image;
                
                $('#old_img').attr('href','<?php echo base_url(); ?>"uploads/admin/wall_of_wisdom/"; ?>'+img);
                $('#outputicon').attr('src','<?php echo base_url(); ?>uploads/'+res.icon);
                },
                error: function(result) {
                    alert("Error,Please try again.");
                }
            });          
    }

    function submitButton() {
             var title = $("#title1").val();
             var link= $("#link1").val();
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
                 $("#link1").focus();
                 is_valid = false;
             } else if ((link.length < 6)) {
                 $("#err_password").text("Please Enter minimum 6 Characters");
                 $("#link1").focus();
                 is_valid = false;
             } else {
                 $("#err_password").text("");
             }            

             if (is_valid) { 
                $('#updateform').attr('action','<?php echo base_url(); ?>admin/update_followus');                
                 return true;
             } else {
                 return false;
             }
         };
            </script>