
<div class="container">
<div class="feedback_content">

<form action="<?php echo base_url(); ?>users/add_feedback_form_data" name="project" id="project" method="post" class="">

<div class="bloginfo">
    
                <h3 style="margin-bottom: 0px;margin-top:20px;color: #0086b2!important;font-weight: 600; font-size: 20px;">Project on offer</h3>
            </div>
            <div class="heading-underline" style="width: 160px;">
                <div class="left"></div><div class="right"></div>
             </div>
    <div class="row">
            <div class="mb-2 col-md-4">
                <label class="d-block text-font">Title of Project</label>
                <input type="text" class="form-control input-font" name="project" id="project" value="" disabled>
                <!-- <span class="text-danger" id="err_name"></span> -->
            </div>
            <div class="mb-2 col-md-4">
                <label class="d-block text-font">Scope of project</label>
                <input type="tel" class="form-control input-font" name="scope" id="scope" disabled>
                <span class="text-danger" id="err_mobile"></span>
            </div>
            <div class="mb-2 col-md-4">
                <label class="d-block text-font">Terms of Reference</label>
                <input type="email" class="form-control input-font" name="reference" id="reference"  disabled>
                <span class="text-danger" id="err_email"></span>
            </div>
            <div class="mb-2 col-md-4">
                <label class="d-block text-font">Department<sup class="text-danger">*</sup></label>
                <input type="text" class="form-control input-font" name="department" id="department" disabled>
                <span class="text-danger" id="err_subject"></span>
            </div>
            <div class="mb-2 col-md-4">
                <label class="d-block text-font">Technical Committee<sup class="text-danger">*</sup></label>
                <input type="text" class="form-control input-font" name="committee" id="committee" disabled>
                <span class="text-danger" id="err_subject"></span>
            </div>
            <div class="mb-2 col-md-4">
                <label class="d-block text-font">Name of Proposer<sup class="text-danger">*</sup></label>
                <input type="text" class="form-control input-font" name="proposer" id="proposer" disabled>
                <span class="text-danger" id="err_subject"></span>
            </div>
            <div class="mb-2 col-md-12">
                    <div class="bloginfo">
                        <h3 style="margin-bottom: 0px;margin-top:20px;color: #0086b2!important;font-weight: 600; font-size: 20px;">Present Occupation</h3>
                    </div>
                    <div class="heading-underline" style="width: 180px;">
                        <div class="left"></div><div class="right"></div>
                    </div>
            </div>
            <div class="mb-2 col-md-4">
                <label class="d-block text-font">Designation</label>
                <input type="text" class="form-control input-font" name="designation" id="designation" placeholder="Enter Designation" required>
                <!-- <span class="text-danger" id="err_subject"></span> -->
                <div class="invalid-feedback">
                       This Value is Required
                </div>
            </div>
            <div class="mb-2 col-md-4">
                <label class="d-block text-font">Organization<sup class="text-danger">*</sup></label>
                <input type="text" class="form-control input-font" name="organization" id="organization" placeholder="Enter Organization" required>
                <!-- <span class="text-danger" id="err_subject"></span> -->
                <div class="invalid-feedback">
                       This Value is Required
                </div>
            </div>
            <div class="mb-2 col-md-12">
                    <div class="bloginfo">
                        <h3 style="margin-bottom: 0px;margin-top:20px;color: #0086b2!important;font-weight: 600; font-size: 20px;">Details of Past Projects Done</h3>
                    </div>
                    <div class="heading-underline" style="width: 265px;">
                        <div class="left"></div><div class="right"></div>
                    </div>
            </div>
            <div class="mb-2 col-md-4">
                <label class="d-block text-font">Title<sup class="text-danger">*</sup></label>
                <input type="text" class="form-control input-font" name="title" id="title" placeholder="Enter Title" required>
                <!-- <span class="text-danger" id="err_subject"></span> -->
                <div class="invalid-feedback">
                       This Value is Required
                </div>
            </div>
            <div class="mb-2 col-md-4">
                    <label class="d-block">Attachments (if Any)</label>
                    <div class="d-flex">
                        <div>
                            <input type="file" id="attachments" name="attachments" class="form-control-file">
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
            <div class="mb-2 col-md-12">
                <label class="d-block text-font">Details of Project</label>
                <textarea type="text" class="form-control input-font" name="description" id="description" placeholder="Enter Details of Project" required></textarea>
                <!-- <span class="text-danger" id="err_description"></span> -->
                <div class="invalid-feedback">
                       This Value is Required
                </div>
            </div>
            <div class="mb-2 col-md-12">
                <label class="d-block text-font">Additional Information</label>
                <textarea type="text" class="form-control input-font" name="information" id="information" placeholder="Enter Additional Information" required></textarea>
                <!-- <span class="text-danger" id="err_description"></span> -->
                <div class="invalid-feedback">
                       This Value is Required
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
    $('#project').addClass('was-validated');
    var isvalid=true;
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
                        window.location.replace('<?php echo base_url().'users/apply_project_list'?>');                   
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
                        window.location.replace('<?php echo base_url().'users/apply_project_offer'?>');                   
                        //$('#competition_edit').submit();
                       // Swal.fire('Saved!', '', 'success')                                
                    } else if (result.isDenied) {
                        // Swal.fire('Changes are not saved', '', 'info')
                    }
                    })
                });
     
     
</script>