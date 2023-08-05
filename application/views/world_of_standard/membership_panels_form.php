<style>
    .breadcrums ul {
    list-style: none;
    display: block;
    text-align: end;
    margin: 0px;
}
.breadcrums ul li {
    display: inline-block;
}
.breadcrums ul li:not(:last-child)::after {
    content: '\f105';
    font-family: 'fontAwesome';
    margin: 0px 10px;
}
</style>    
<div class="container">
<div class="feedback_content">
<div class="col-12 mt-1">
  				<div class="breadcrums">
  					<ul>

  						<li><a href="<?php echo base_url().'users/quality_index'?>">Home</a></li>
                        <li><a href="<?php echo base_url().'users/membership_panels'?>">Offers for the Membership of Working Panels</a></li>
                        <li><a class="active">Apply for Membership</a></li>

  					</ul>
  				</div>
  			</div>
<form action="<?php echo base_url(); ?>users/add_feedback_form_data" name="project" id="project" method="post" class="">

<div class="bloginfo">
    
                <h3 style="margin-bottom: 0px;margin-top:20px;color: #0086b2!important;font-weight: 600; font-size: 20px;">Apply for Membership</h3>
            </div>
            <div class="heading-underline" style="width: 160px;">
                <div class="left"></div><div class="right"></div>
             </div>
    <div class="row">
            <div class="mb-2 col-md-4">
                <label class="d-block text-font">Name<sup class="text-danger">*</sup></label>
                <input type="text" class="form-control input-font" name="name" id="name" value="" required>
                <!-- <span class="text-danger" id="err_name"></span> -->
                <div class="invalid-feedback">
                       This Value is Required
                </div>
            </div>
            <div class="mb-2 col-md-4">
                <label class="d-block text-font">Present Occupation<sup class="text-danger">*</sup></label>
                <input type="tel" class="form-control input-font" name="occupation" id="occupation" required>
                <!-- <span class="text-danger" id="err_mobile"></span> -->
                <div class="invalid-feedback">
                       This Value is Required
                </div>
            </div>
            <div class="mb-2 col-md-4">
                <label class="d-block text-font">Name of Orgnization<sup class="text-danger">*</sup></label>
                <input type="email" class="form-control input-font" name="orgnization" id="orgnization" required>
                <!-- <span class="text-danger" id="err_email"></span> -->
                <div class="invalid-feedback">
                       This Value is Required
                </div>
            </div>
            <div class="mb-2 col-md-4">
                <label class="d-block text-font">Designation<sup class="text-danger">*</sup></label>
                <input type="text" class="form-control input-font" name="designation" id="designation" required>
                <!-- <span class="text-danger" id="err_subject"></span> -->
                <div class="invalid-feedback">
                       This Value is Required
                </div>
            </div>
            <div class="mb-2 col-md-4">
                <label class="d-block text-font">Education Qualification<sup class="text-danger">*</sup></label>
                <input type="text" class="form-control input-font" name="qualification" id="qualification" required>
                <!-- <span class="text-danger" id="err_subject"></span> -->
                <div class="invalid-feedback">
                       This Value is Required
                </div>
            </div>
            <div class="mb-2 col-md-4">
                    <label class="d-block">Upload CV(PDF only)</label>
                    <div class="d-flex">
                        <div>
                            <input type="file" id="attachments" name="attachments" class="form-control-file" required   >
                            <!-- <span class="error_text"></span> -->
                            <div class="invalid-feedback">
                                   This Value is Required
                            </div>
                        </div>
                        <div>
                            <input type="button" value="Preview" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModalImg">
                        </div>
                    </div>
            </div>
    </div>
    <div class="row">
            <div class="col-md-12 p-3 text-end">
                <button type="submit" onclick="return submitFeedback(event)"  name="submit1" class="btn btn-success" >Submit</button>
                <button class="btn btn-danger cancel" type="button" >Cancel</button>
                <button class="btn btn-warning reset" >Reset</button>
            </div>
    </div>
    </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
   function submitFeedback(e){
    e.preventDefault();
    var isvalid=true;
    $('#project').addClass('was-validated');
    var name = $('#name').val();
    if(name==""){
        isvalid=false;
    }
    
    if(isvalid){
        
    Swal.fire({
                    title: 'Are you sure you want to Apply?',
                    showDenyButton: true,
                    showCancelButton: false,
                    confirmButtonText: 'Apply',
                    denyButtonText: `Close`,
                    }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {    
                        // window.location.replace('<?php echo base_url().'users/apply_project_list'?>');                   
                        //$('#competition_edit').submit();
                       // Swal.fire('Saved!', '', 'success')                                
                    } else if (result.isDenied) {
                        // Swal.fire('Changes are not saved', '', 'info')
                    }
                    })
                }
     }
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
                        // window.location.replace('<?php echo base_url().'users/apply_project_offer'?>');                   
                        //$('#competition_edit').submit();
                       // Swal.fire('Saved!', '', 'success')                                
                    } else if (result.isDenied) {
                        // Swal.fire('Changes are not saved', '', 'info')
                    }
                    })
                }); 
     
     
</script>