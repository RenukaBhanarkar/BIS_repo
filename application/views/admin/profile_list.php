<style>
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
<div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Profile</h1>
                        
                    </div>
<!-- Content Row -->
                    <div class="row"> 
                    <?php
                        if ($this->session->flashdata('MSG')) {
                            echo $this->session->flashdata('MSG');
                        }
                        ?>
                        <div class="col-12 mt-3">
                        <div class="card border-top">
                            <form action="<?php echo base_url().'admin/update_profile/'; ?>" id="updateprofile" method="post" enctype="multipart/form-data">
                           <div class="card-body"> 
                            <div class="row">  
                            <div class="mb-2 col-md-12">
                                                    <!-- <img src="<?php echo base_url(); ?>/assets/images/login.png" class="border-2" width="22%"> -->
                                                    <div class="avatar-upload">
                                                            <div class="avatar-edit">
                                                                <input type='file' id="imageUpload" name="bannerimg" accept=".png, .jpg, .jpeg" />
                                                                <input type="hidden" name="old_img" id="old_img">
                                                                <label for="imageUpload"></label>
                                                            </div>
                                                            <div class="avatar-preview">
                                                            <?php if($details['photo']==""){ ?>
                                                                <div id="imagePreview" style="background-image: url('<?php echo base_url(); ?>/assets/images/login.png');">

                                                                <?php  }else{ ?>
                                                                  
                                                                  <div id="imagePreview" style="background-image: url('<?php echo base_url(); ?>/uploads/admin/profile/<?php echo $details['photo']; ?>');">
                                                                  <?php  } ?>
                                                                </div>
                                                            </div>
                                                        </div>       
                                                </div>
                                <?php if($admin_type  == 1 || $admin_type  == 2 || $admin_type  == 3) { ?> 
                                <div class="mb-2 col-md-4">
                                   
                                    <label class="d-block text-font">Name</label>
                                    
                                        <input class="form-control input-font" type="text" name="name" id="name" value="<?= $details['name'];?>">
                                        <!-- <p><?= $details['name'];?></p> -->
                                   
                                  
                                </div>
                                
                                <div class="mb-2 col-md-4">
                                        <label class="d-block text-font">DOB</label>
                                        
                                        <!-- <p><?= $details['dob'];?></p> -->
                                        <input class="form-control input-font" type="date" name="dob" id="dob" value="<?= $details['dob'];?>">
                                        
                                </div>
                                <div class="mb-2 col-md-4">
                                        <label class="d-block text-font">Gender</label>
                                      
                                        <!-- <p><?= $details['gender'];?></p> -->
                                        <select class="form-control input-font" name="gender" id="gender">
                                            <option>-select-</option>
                                            <option value="1" <?php if($details['gender']==1){ echo "selected";} ?>>Male</option>
                                            <option value="2" <?php if($details['gender']==2){ echo "selected";} ?>>Female</option>
                                        </select>
                                       
                                </div>
                                <div class="mb-2 col-md-4">
                                        <label class="d-block text-font">Contact Number</label>
                                        <div>
                                        <!-- <p><?= $details['contact_number'];?></p> -->
                                        <input class="form-control input-font" type="text" name="contact_number" id="contact_number" value="<?= $details['contact_number'];?>">
                                        </div> 
                                </div>
                                <div class="mb-2 col-md-4">
                                    <label class="d-block text-font">Email Id</label>
                                    <div>
                                    <p><?= $details['email_id'];?></p>
                                    </div>    
                                </div>
                                <div class="mb-2 col-md-4">
                                        <label class="d-block text-font">Designation</label>
                                        <div>
                                        <p><?= $details['role'];?></p>
                                        </div> 
                                </div>
                                
                                <?php } ?>   
                                <?php if( $admin_type  == 3) { ?> 
                                <div class="mb-2 col-md-4">
                                        <label class="d-block text-font">Department</label>
                                        <div>
                                        <p><?= $details['uvc_department_name'];?></p>
                                        </div> 
                                </div>
                                <div class="mb-2 col-md-4">
                                        <label class="d-block text-font">Branch</label>
                                        <div>
                                        <p><?= $details['branchnew'];?></p>
                                        </div> 
                                </div>
                                
                               
                              
                                <?php } ?>  
                         </div>
                    </div>
                    </form>
            </div>
                          <div class="col-md-12 submit_btn p-3">
                               <a class="btn btn-primary btn-sm text-white" onclick="location.href='<?php echo base_url();?>Admin/Dashboard'">Back</a>
                               <a class="btn btn-success btn-sm text-white update" >Update</a>
                          </div>  
                        </div> 
                      </div>
                    </div>
        <script>
            $(document).ready(function(){
                $('.update').click(function(){
                    var name = $('#name').val();
                    var dob = $('#dob').val();
                    var gender = $('#gender').val();
                    var mobile = $('#contact_number').val();
                    var isvalid=true;


                    if(isvalid){
                        $('#updateprofile').submit();
                    }


                })
            })
        </script>
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
                   