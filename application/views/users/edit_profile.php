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
                    <div class="row">
                            <div class="mb-2 col-md-4">
                                <label class="d-block text-font">Name</label>
                                <input type="text" class="form-control input-font" name="Name" id="Name" placeholder="Enter Name">
                            </div>
                            <div class="mb-2 col-md-4">
                                <label class="d-block text-font">Email Id</label>
                                <input type="text" class="form-control input-font" name="Name" id="Name" placeholder="Enter Email Id">
                            </div>
                            <div class="mb-2 col-md-4">
                                <label class="d-block text-font">Date of birth</label>
                                <input type="date" class="form-control input-font" name="Name" id="Name">
                            </div>
                            <div class="mb-2 col-md-4">
                                <label class="d-block text-font">Gender<sup class="text-danger">*</sup></label>
                                <select id="Gender" name="Gender" class="form-control input-font" value="">
                                    <option value="1">Male</option>
                                    <option value="2">Female</option>
                                </select>
                            </div>
                            <div class="mb-2 col-md-4">
                                <label class="d-block text-font">Username</label>
                                <input type="text" class="form-control input-font" name="Name" id="Name" placeholder="Enter Username">
                            </div>
                            <div class="mb-2 col-md-4">
                                <label class="d-block text-font">Contact Number</label>
                                <input type="text" class="form-control input-font" name="Name" id="Name" placeholder="Enter Contact Number">
                            </div>
                            
                    </div>
                        
             </div>
             <div class="col-md-12 submit_btn p-3" style="text-align: end;">
                               <a class="btn btn-success btn-sm text-white">Update</a>
                               <a class="btn btn-danger btn-sm text-white">Cancel</a>
             </div>  
             </div>
             
        </div>
       </div>
       
    <!-- /.container-fluid -->
    <script src="<?php echo base_url();?>assets/admin/js/jquery.dataTables.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url();?>assets/admin/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script>
    $(document).ready(function () {
    $('#example').DataTable();
    });
   </script>
