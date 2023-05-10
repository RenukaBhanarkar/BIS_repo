
<style>
        .error_text
        {
            color: red;
        }
    </style>
        <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Winner Wall Form</h1> 
            
        </div> 
       
       
        <!-- Content Row -->
       
        <div class="row">
            <div class="col-12 mt-3">
            <div class="card border-top">
               <div class="card-body"> 
                <div class="row">
                <div class="mb-2 col-md-4">
                        <label class="d-block text-font">Name of Competition<sup class="text-danger">*</sup></label>
                        <input type="text" class="form-control input-font" name="competition" id="competition" placeholder="Enter Name of Competition">
                        <span class="error_text"><?php echo form_error('title');?></span>
                        
                  </div>
                <div class="mb-2 col-md-4">
                        <label class="d-block text-font">Date of Competition<sup class="text-danger">*</sup></label>
                        <input type="date" class="form-control input-font" name="competition" id="competition" placeholder="Name of Competition Date">
                        <span class="error_text"><?php echo form_error('title');?></span>
                        
                    </div>
                    <div class="mb-2 col-md-4">
                                    <label class="d-block text-font">Select Prize<sup class="text-danger">*</sup></label>
                                    <select class="form-control input-font" id="no_of_options" name="no_of_options" aria-label="Default select example">
                                        <option selected>--select--</option>
                                        <option value="1">First Prize</option>
                                        <option value="2">Second Prize</option>
                                        <option value="3">Third Prize</option>
                                        <option value="4">Fourth Prize</option>
                                    </select>
                    </div>
                    <div class="mb-2 col-md-4">
                        <label class="d-block text-font">Name<sup class="text-danger">*</sup></label>
                        <input type="text" class="form-control input-font" name="name" id="name" placeholder="Enter Name">
                        <span class="error_text"><?php echo form_error('title');?></span>
                        
                    </div>
                    <div class="mb-2 col-md-4">
                        <label class="d-block text-font">Email ID<sup class="text-danger">*</sup></label>
                        <input type="text" class="form-control input-font" name="email" id="email" placeholder="Enter Email ID">
                        <span class="error_text"><?php echo form_error('title');?></span>
                        
                    </div>
                    <div class="mb-2 col-md-4">
                        <label class="d-block text-font">Mobile Number<sup class="text-danger">*</sup></label>
                        <input type="text" class="form-control input-font" name="number" id="number" placeholder="Enter Mobile Number">
                        <span class="error_text"><?php echo form_error('title');?></span>
                        
                    </div>
                    <div class="mb-2 col-md-4">
                        <label class="d-block text-font">Photo<sup class="text-danger">*</sup></label>
                        <input type="file" class="form-control-file input-font" name="photo" id="photo">
                        <span class="error_text"><?php echo form_error('title');?></span>
                        
                    </div>
                    <div class="mb-2 col-md-4">
                        <label class="d-block text-font">Location<sup class="text-danger">*</sup></label>
                        <input type="text" class="form-control input-font" name="location" id="location" placeholder="Enter Location">
                        <span class="error_text"><?php echo form_error('title');?></span>
                        
                    </div>
                </div>
                <div class="col-md-12 submit_btn p-3">
                       <a class="btn btn-success btn-sm text-white" data-bs-toggle="modal" data-bs-target="#submitForm">Submit</a>
                       <a class="btn btn-danger btn-sm text-white" data-bs-toggle="modal" data-bs-target="#cancelForm">Cancel</a> 
                       <input type="reset" name="Reset" class="btn btn-warning btn-sm text-white">
               </div>
                
                <!-- Modal -->
                <div class="modal fade" id="submitForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Submit Form</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to Submit?</p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Save</button>
                    </div>
                  </div>
                </div>
              </div>       
                          <!-- Modal -->  
               <!-- Modal -->
               <div class="modal fade" id="cancelForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to cancel?</p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Save changes</button>
                    </div>
                  </div>
                </div>
              </div>       
                          <!-- Modal -->
            </div> 
          </div>
        </div>
    </form>
       </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Footer -->


<!-- Logout Modal-->
<!-- <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
        <a class="btn btn-primary" href="login.html">Logout</a>
    </div>
</div>
</div>
</div> -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="<?php echo base_url();?>assets/admin/js/jquery-3.5.1.js"></script>
    <script src="<?php echo base_url();?>assets/admin/js/jquery.dataTables.min.js"></script>


<script>
    $(document).ready(function () {
    $('#example').DataTable();
});
var myModal = document.getElementById('myModal')
var myInput = document.getElementById('myInput')

myModal.addEventListener('shown.bs.modal', function () {
  myInput.focus()
})
   </script> -->

 