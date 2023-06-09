<style>
    i.fa.password.fa-eye {
        float: right;
        margin-top: -25px;
        margin-right: 16px;
    }

    i.fa.password.fa-eye-slash {
        float: right;
        margin-top: -25px;
        margin-right: 16px;
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
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

        <!-- Sidebar Toggle (Topbar) -->
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
        </button>

        <!-- Topbar Search -->
        <!-- <form
            class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
                <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                    aria-label="Search" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                    </button>
                </div>
            </div>
        </form> -->

        <!-- Topbar Navbar -->
        <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
                <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-search fa-fw"></i>
                </a>
                <!-- Dropdown - Messages -->
                <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                    aria-labelledby="searchDropdown">
                    <form class="form-inline mr-auto w-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small"
                                placeholder="Search for..." aria-label="Search"
                                aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </li>

            <!-- Nav Item - Alerts -->
            

            <!-- Nav Item - Messages -->
           
            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">BIS Admin-
                        <?php if(isset($_SESSION['admin_post'])){ echo encryptids("D", $_SESSION['admin_name']); } ?>
                    </span>
                    <img class="img-profile rounded-circle"
                        src="<?php echo base_url();?>assets/admin/img/undraw_profile.svg">
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                    aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="<?php echo base_url(); ?>admin/profile_list">
                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                        Profile
                    </a>
                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#edit_profile">
                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                        Edit Profile
                    </a>
                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#change_password">
                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                        Change Password
                    </a>
                    <!-- <a class="dropdown-item" href="#">
                        <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                        Settings
                    </a> -->
                    <a class="dropdown-item" href="#">
                        <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                        Activity Log
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo base_url(); ?>admin/logout" data-toggle="modal" data-target="#logoutModal">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        Logout
                    </a>
                </div>
            </li>

        </ul>

    </nav>
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
    <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <a class="btn btn-primary" href="<?php echo base_url(); ?>admin/logout">Logout</a>
    </div>
</div>
</div>
</div>
<!-- profile modal -->
<!-- Modal -->
<div class="modal fade" id="edit_profile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Update Profile</h5>
                                            <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                        </div>
                                        <div class="modal-body">
                                            
                                            <div class="row">
                                            <div class="mb-2 col-md-12" style="text-align: -webkit-center;">
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
                                                    <div class="mb-2 col-md-6">
                                                        <label class="d-block text-font" style="text-align:left;">Name<sup class="text-danger">*</sup></label>
                                                        <input type="text" class="form-control input-font" name="Name" id="Name" placeholder="Enter Name">
                                                    </div>
                                                    <div class="mb-2 col-md-6">
                                                        <label class="d-block text-font" style="text-align:left;">Email Id<sup class="text-danger">*</sup></label>
                                                        <input type="text" class="form-control input-font" name="Email" id="Email" placeholder="Enter Email Id">
                                                    </div>
                                                    <div class="mb-2 col-md-6">
                                                        <label class="d-block text-font" style="text-align:left;">Date of birth<sup class="text-danger">*</sup></label>
                                                        <input type="date" class="form-control input-font" name="Name" id="Name">
                                                    </div>
                                                    <div class="mb-2 col-md-6">
                                                        <label class="d-block text-font" style="text-align:left;">Gender<sup class="text-danger">*</sup></label>
                                                        <select id="Gender" name="Gender" class="form-control input-font" value="" fdprocessedid="uat7f">
                                                            <option value="1">Male</option>
                                                            <option value="2">Female</option>
                                                        </select>
                                                    </div>
                                                    <div class="mb-2 col-md-6">
                                                        <label class="d-block text-font" style="text-align:left;">Contact Number<sup class="text-danger">*</sup></label>
                                                        <input type="text" class="form-control input-font" name="Name" id="Name" placeholder="Enter Contact Number" fdprocessedid="sof5sf">
                                                    </div>
                            
                                                </div>
                                            
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal_1" data-bs-dismiss="modal" id="change_password_skip">Skip</button>
                                            <button type="button" class="btn btn-primary">Update</button>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                    <!-- modal -->
                                    <!-- Modal -->
                                    <div class="modal fade" id="change_password" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" style="max-width: 442px;">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Do you want to change your Password</h5>
                                            <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                        </div>
                                        <div class="modal-body">
                                            
                                            
                                                <form action="<?php echo base_url().'admin/updatePassword'; ?>" id="changePassword" method="post">
                                                <div class="row">
                                                    <div class="mb-2 col-md-12">
                                                    <label class="d-block text-font"style="text-align:left;">Current Password</label>
                                                    <input type="password" class="form-control form-control-md show-hide-password" name="oldpassword" id="OldPassword" placeholder="Enter Old/Current Password">
                                                         <i class="fa password fa-eye-slash"></i>
                                                         <span class="text-danger" id="err_oldpass"></span>
                                                         <span class="text-danger" id="err_currentpass"></span>
                                                    </div>
                                                    <div class="mb-2 col-md-12">
                                                    <label class="d-block text-font"style="text-align:left;">New Password</label>
                                                    <input type="password" class="form-control form-control-md show-hide-password" name="newpassword" id="password" placeholder="Enter New Password">
                                                         <i class="fa password fa-eye-slash"></i>
                                                         <span class="text-danger" id="err_newpass"></span>
                                                    </div>
                                                    <div class="mb-2 col-md-12">
                                                    <label class="d-block text-font"style="text-align:left;">Confirm Password</label>
                                                    <input type="password" class="form-control form-control-md show-hide-password" id="repassword" placeholder="Enter Confirm Password">
                                                         <i class="fa password fa-eye-slash"></i>
                                                         <span class="text-danger" id="err_confpass"></span>
                                                    </div>
                                                    </div>
                                                </form>
                                            
                                            
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="margin-right: 269px;">Skip</button>
                                            <a type="button" class="btn btn-success submit">Submit</a>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                    <!-- modal -->
<script>
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
<script>
        const inputs = document.querySelectorAll('.show-hide-password');
    const icon = document.querySelectorAll('i.password');

    // Experiment 1
    icon.forEach(function(ele) {
        ele.addEventListener('click', function(e) {
            const targetInput = e.target.previousElementSibling.getAttribute('type');
            if (targetInput == 'password') {
                e.target.previousElementSibling.setAttribute('type', 'text');
                ele.classList.remove('fa-eye-slash');
                ele.classList.add('fa-eye');
            } else if (targetInput == 'text') {
                e.target.previousElementSibling.setAttribute('type', 'password');
                ele.classList.add('fa-eye-slash');
                ele.classList.remove('fa-eye');
            }
        });
    });

    $('.submit').click(function(){       
        var old_pass = $('#OldPassword').val();
        var pass = $('#password').val();
        var repass = $('#repassword').val();
        var isvalid =true;


        if(old_pass == ""){
            $('#err_currentpass').text('This value is required');
            isvalid =false;
        }else{
            $('#err_currentpass').text('');
        }
        if(pass == ""){
            $('#err_newpass').text('This value is required');
            isvalid =false;
        }else{
            $('#err_newpass').text('');
        }
        if(repass == ""){
            $('#err_confpass').text('This value is required');
            isvalid =false;
        }else{
            $('#err_confpass').text('');
        }

        if(isvalid){
            if(pass == repass){
                $.ajax({
                                type: 'POST',
                                url: '<?php echo base_url(); ?>admin/update_password',
                                data: {
                                    pass: pass,
                                    old_password:old_pass,                               
                                },
                                success: function(result) {
                                    var res = JSON.parse(result); 
                                    // Swal.fire(res.message);
                                    if(res.status==1){
                                        Swal.fire(res.message);
                                        $('#change_password').modal('hide');
                                    }else{
                                        $('#err_oldpass').text('Old Password not match with record');
                                    
                                    }
                                },
                                error: function(result) {
                                    Swal.fire("Error,Please try again.");
                                }
                            });
            }else{
                $('#err_confpass').text("not match with new password");
                Swal.fire("password and confirm password should be same");
            }
        }
    });
        </script>