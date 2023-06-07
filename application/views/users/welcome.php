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
<section>
     <div class="container-fluid">
        <div class="row">
            <div class="exchange_section d-flex">
                <div class="col-md-2">
                    <div class="bis_logo">
                       <img src="<?php echo base_url(); ?>assets/images/bis_logo.png" class="opacity_img"> 
                    </div>
                    
                 </div>
         <div class="col-md-8" id="Forum">
                 <div class="bis_welcome">
                     <a href="">
                         <h2>Welcome to Online Exchange Forum</h2>
                     </a>
                 </div>
                <div class="platform">
                         <h4>(A platform for exchange of information and conducting Standards based activities)</h4>
                 </div>
             </div>
        <div class="col-md-2">
                 <div class="bis_logo">
                       <img src="<?php echo base_url(); ?>assets/images/bis_logo.png" class="opacity_img"> 
                  </div>
                 </div>
              </div>
            </div>
        </div>
    </section>
    <section id="bottom_content">
        <div class="container">
            <div class="row">
               <div class="live_data">
                        <!-- <h6>Live Data</h6> -->
                        <div class="row table_data ">
                            
                            <div class="innerBox" style="background-image: url(<?php echo base_url();?>assets/images/standard_club.jpeg); padding: 0px; margin: 0px; background-repeat: round;">
                            <div style="background:#00000099;">
                                <a href="<?=base_url();?>users/standard">
                                <div class="LiveDataBox" style="height: 182px; overflow: hidden;" >
                                     <!-- <img src="<?=base_url();?>assets/images/compliant.png" class="livedata_icons"> -->
                                      <h3 class="text_standard">Standards Club</h3>
                                     <p class="mb-0">(An initiative to nurture the students as Brand Ambassadors of Quality)</p>
                                </div>
                                </a>
                                </div>
                            </div>
                            <div class="innerBox" id="wos" style="background-image: url(<?php echo base_url();?>assets/images/world_standard.jpeg); padding: 0px; margin: 0px; background-repeat: round;">
                            <div style="background:#00000099;">
                                <!-- <a href="<?=base_url();?>users/quality_index"> -->
                                  <div class="LiveDataBox" style="height: 182px; overflow: hidden;">
                                      <!-- <img src="<?=base_url();?>assets/images/warranty.png" class="livedata_icons"> -->
                                       <h3 class="text_standard">World of Standards</h3>
                                       <p class="mb-0">(An initiative to broad-base the stakeholder engagement for development of Standards)</p>
                                 </div>
                                 <!-- </a> -->
                            </div>
                            </div>
                          </div>
                     </div>
                </div>
           </div>
    </section>
      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-xl">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Update Profile</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            
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
                                                        <label class="d-block text-font" style="text-align:left;">Name</label>
                                                        <input type="text" class="form-control input-font" name="Name" id="Name" placeholder="Enter Name">
                                                    </div>
                                                    <div class="mb-2 col-md-4">
                                                        <label class="d-block text-font" style="text-align:left;">Email Id</label>
                                                        <input type="text" class="form-control input-font" name="Name" id="Name" placeholder="Enter Email Id">
                                                    </div>
                                                    <div class="mb-2 col-md-4">
                                                        <label class="d-block text-font" style="text-align:left;">Date of birth</label>
                                                        <input type="date" class="form-control input-font" name="Name" id="Name">
                                                    </div>
                                                    <div class="mb-2 col-md-4">
                                                        <label class="d-block text-font" style="text-align:left;">Gender</label>
                                                        <select id="Gender" name="Gender" class="form-control input-font" value="" fdprocessedid="uat7f">
                                                            <option value="1">Male</option>
                                                            <option value="2">Female</option>
                                                        </select>
                                                    </div>
                                                    <div class="mb-2 col-md-4">
                                                        <label class="d-block text-font" style="text-align:left;">Username</label>
                                                        <input type="text" class="form-control input-font" name="Name" id="Name" placeholder="Enter Username" fdprocessedid="87w216">
                                                    </div>
                                                    <div class="mb-2 col-md-4">
                                                        <label class="d-block text-font" style="text-align:left;">Contact Number</label>
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
                                    <div class="modal fade" id="exampleModal_1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" style="max-width: 442px;">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Do you want to change your Password</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            
                                            <div class="row">
                                                    <div class="mb-2 col-md-12">
                                                    <label class="d-block text-font"style="text-align:left;">Current Password</label>
                                                    <input type="password" class="form-control form-control-md show-hide-password" placeholder="Enter Old/Current Password">
                                                         <i class="fa password fa-eye-slash"></i>
                                                    </div>
                                                    <div class="mb-2 col-md-12">
                                                    <label class="d-block text-font"style="text-align:left;">New Password</label>
                                                    <input type="password" class="form-control form-control-md show-hide-password" placeholder="Enter New Password">
                                                         <i class="fa password fa-eye-slash"></i>
                                                    </div>
                                                    <div class="mb-2 col-md-12">
                                                    <label class="d-block text-font"style="text-align:left;">Confirm Password</label>
                                                    <input type="password" class="form-control form-control-md show-hide-password" placeholder="Enter Confirm Password">
                                                         <i class="fa password fa-eye-slash"></i>
                                                    </div>
                                            </div>
                                            
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="margin-right: 281px;">Skip</button>
                                            <button type="button" class="btn btn-success">Submit</button>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                    <!-- modal -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
        </script>
    <script>
        $(document).ready(function(){
            $('#exampleModal').modal('show');
            $('#change_password_skip').click(function(){
                $('#exampleModal_1').modal('show'); 
            });
            $('#wos').click(function(){
                // alert("kjhkl");
                Swal.fire("This section is under development. The World of Standards will open up for you soon.");
                return false;
            })
        })
    </script>