<style>
    .proposal_view {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 1px solid #e3e6f0;
    border-radius: 0.35rem;
    border-top: 3px solid #2957a3!important;
}
.avatar-upload {
  position: relative;
  max-width: 205px;
  margin: 22px;
}
.avatar-upload .avatar-edit {
  position: absolute;
  right: 12px;
  z-index: 1;
  top: 139px;
}
.avatar-upload .avatar-edit input {
  display: none;
}
.avatar-upload .avatar-edit input + label {
  display: inline-block;
  width: 34px;
  height: 34px;
  margin-bottom: 0;
  border-radius: 100%;
  background: #FFFFFF;
  border: 1px solid transparent;
  box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
  cursor: pointer;
  font-weight: normal;
  transition: all 0.2s ease-in-out;
  border: 1px solid black;
}
.avatar-upload .avatar-edit input + label:hover {
  background: #f1f1f1;
  border-color: #d6d6d6;
}
.avatar-upload .avatar-edit input + label:after {
  content: "\f040";
  font-family: 'FontAwesome';
  color: #757575;
  position: absolute;
  top: 7px;
  left: 0;
  right: 0;
  text-align: center;
  margin: auto;
}
.avatar-upload .avatar-preview {
  width: 192px;
  height: 192px;
  position: relative;
  border-radius: 100%;
  border: 6px solid #F8F8F8;
  box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
}
.avatar-upload .avatar-preview > div {
  width: 100%;
  height: 100%;
  border-radius: 100%;
  background-size: cover;
  background-repeat: no-repeat;
  background-position: center;
}
</style>    
<link href="<?php echo base_url();?>assets/admin/css/jquery.dataTables.min.css" rel="stylesheet">
    <!-- Begin Page Content -->
    <div class="container"> 
        <div class="row mt-5">
           <div class="bloginfo">
                <h3 style="margin-bottom: 0px;margin-top:20px;color: #0086b2!important;font-weight: 600;">Edit Profile</h3>
            </div>
            <div class="heading-underline" style="width: 200px;">
                <div class="left"></div><div class="right"></div>
             </div>
            <div class="proposal_view mb-5">
            <div class="col-12 mt-3">
                <form action="<?php echo base_url().'Users/update_profile'; ?>" name="" id="update_user_profile" method="post" enctype="multipart/form-data">
                    <div class="row">
                    <div class="mb-2 col-md-12">
                           <!-- <img src="<?php echo base_url(); ?>/assets/images/login.png" class="border-2" width="22%"> -->
                            <div class="avatar-upload">
                                    <div class="avatar-edit">
                                        <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" />
                                        <label for="imageUpload"></label>
                                    </div>
                                    <div class="avatar-preview">
                                        <div id="imagePreview" style="background-image: url('<?php echo base_url(); ?>/assets/images/login.png');">
                                        </div>
                                    </div>
                            </div>
                    </div>
                            <div class="mb-2 col-md-4">
                                <label class="d-block text-font">Name</label>
                                <input type="text" class="form-control input-font" name="user_name" id="Name" value="<?php echo $user_profile['user_name']; ?>" placeholder="Enter Name">
                            </div>
                            <div class="mb-2 col-md-4">
                                <label class="d-block text-font">Email Id</label>
                                <input type="text" class="form-control input-font" name="email" id="Name" value="<?php echo $user_profile['email']; ?>" placeholder="Enter Email Id">
                            </div>
                            <div class="mb-2 col-md-4">
                                <label class="d-block text-font">Date of birth</label>
                                <input type="date" class="form-control input-font" name="date_of_birth" id="Name" value="<?php echo $user_profile['date_of_birth']; ?>">
                            </div>
                            <div class="mb-2 col-md-4">
                                <label class="d-block text-font">Gender<sup class="text-danger">*</sup></label>
                                <select id="Gender" name="gender" class="form-control input-font" value="<?php echo $user_profile['gender']; ?>">
                                    <option value="1" <?php if($user_profile['gender']==1){ echo "selected"; } ?>>Male</option>
                                    <option value="2" <?php if($user_profile['gender']==2){ echo "selected"; } ?>>Female</option>
                                </select>
                            </div>
                            <!-- <div class="mb-2 col-md-4">
                                <label class="d-block text-font">Username</label>
                                <input type="text" class="form-control input-font" name="Name" id="Name" placeholder="Enter Username">
                            </div> -->
                            <div class="mb-2 col-md-4">
                                <label class="d-block text-font">Contact Number</label>
                                <input type="text" class="form-control input-font" name="user_mobile" id="Name" value="<?php echo $user_profile['user_mobile']; ?>" placeholder="Enter Contact Number">
                            </div>
                            
                    </div>
                </form>
                        
             </div>
             <div class="col-md-12 submit_btn p-3" style="text-align: end;">
                               <a class="btn btn-success btn-sm text-white update">Update</a>
                               <a class="btn btn-danger btn-sm text-white cancel">Cancel</a>
             </div>  
             </div>
             
        </div>
       </div>
       
    <!-- /.container-fluid -->
    <script src="<?php echo base_url();?>assets/admin/js/jquery.dataTables.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url();?>assets/admin/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
    $(document).ready(function () {
    $('#example').DataTable();
    $('.update').click(function(){
        
        Swal.fire({
                    title: 'Are you sure you want to Update?',
                    showDenyButton: true,
                    showCancelButton: false,
                    confirmButtonText: 'Update',
                    denyButtonText: `Close`,
                    }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {    
                       // window.location.replace('<?php echo base_url(); ?>Users/welcome');     
                        $('#update_user_profile').submit();              
                        //$('#competition_edit').submit();
                       // Swal.fire('Saved!', '', 'success')                                
                    } else if (result.isDenied) {
                        // Swal.fire('Changes are not saved', '', 'info')
                    }
                    })
    })
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
                        window.location.replace('<?php echo base_url(); ?>Users/welcome');                   
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
                    confirmButtonText: 'Cancel',
                    denyButtonText: `Close`,
                    }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {    
                        window.location.replace('<?php echo base_url(); ?>Users/welcome');                   
                        //$('#competition_edit').submit();
                       // Swal.fire('Saved!', '', 'success')                                
                    } else if (result.isDenied) {
                        // Swal.fire('Changes are not saved', '', 'info')
                    }
                    })
})
   function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#imagePreview').css('background-image', 'url('+e.target.result +')');
            $('#imagePreview').hide();
            $('#imagePreview').fadeIn(650);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$("#imageUpload").change(function() {
    readURL(this);
});
   </script>
