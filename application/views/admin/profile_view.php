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
                        <h1 class="h3 mb-0 text-gray-800">Profile View</h1>
                        
                    </div>
<!-- Content Row -->
                    <div class="row"> 
                    
                        <div class="col-12 mt-3">
                        <div class="card border-top">
                           
                           <div class="card-body"> 
                            <div class="row">
                            <div class="mb-2 col-md-12" style="text-align: center;">
                                  <img src="<?php echo base_url();?>assets/admin/img/undraw_profile.svg" alt="" width="21%">
                               </div>
                            </div>
                            <div class="row">  
                                 <div class="mb-2 col-md-4">
                                   
                                    <label class="d-block text-font">Name</label>
                                         <p>Anis</p>
                                </div>
                                <div class="mb-2 col-md-4">
                                        <label class="d-block text-font">DOB</label>
                                        
                                        <p>12/03/2023</p>
                                </div>
                                <div class="mb-2 col-md-4">
                                        <label class="d-block text-font">Gender</label>
                                         <p>Male</p>
                                </div>
                                <div class="mb-2 col-md-4">
                                        <label class="d-block text-font">Contact Number</label>
                                        <p>7057085889</p>
                                </div>
                                <div class="mb-2 col-md-4">
                                    <label class="d-block text-font">Email Id</label>
                                       <p>abc@gmail.com</p>
                                      
                                </div>
                                <div class="mb-2 col-md-4">
                                        <label class="d-block text-font">Designation</label>
                                       
                                        <p>-----</p>
                                       
                                </div>
                                
                              
                                <div class="mb-2 col-md-4">
                                        <label class="d-block text-font">Department</label>
                                        <p>bis</p>
                                </div>
                                <div class="mb-2 col-md-4">
                                        <label class="d-block text-font">Branch</label>
                                        
                                        <p>branch</p>
                                       
                                </div>
                        </div>
                    </div>
                    
            </div>
                          <div class="col-md-12 submit_btn p-3">
                               <a class="btn btn-primary btn-sm text-white" onclick="location.href=''">Back</a>
                               
                          </div>  
                        </div> 
                      </div>
                    </div>
          