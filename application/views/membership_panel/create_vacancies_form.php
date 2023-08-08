<div class="container-fluid">
          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Add New Vacancies</h1>
            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url().'Admin/dashboard';?>" >Sub Admin Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'admin/exchange_forum';?>" >Exchange Forum</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'membership_panel/working_panel_dashboard';?>" >Offers for the Membership of Working Panels</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'membership_panel/create_vacancies_list';?>" >Create Vacancies</a></li>
                <li class="breadcrumb-item active" aria-current="page">Create Vacancies</li>
            </ol>
            </nav>

          </div>
<!-- Content Row -->
          
        <div class="row">
            <div class="col-12 mt-3">
              <div class="card border-top card-body">
                    <div class="row">
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Department<sup class="text-danger">*</sup></label>
                            <select id="department" name="department" class="form-control input-font">
                                <option value="" disabled selected>--select--</option>
                                <option value="1">Department</option>
                                <option value="2">Department</option>
                                <option value="3">Department</option>
                            </select>
                        </div>
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Technical Committee<sup class="text-danger">*</sup></label>
                            <select id="department" name="department" class="form-control input-font">
                                <option value="" disabled selected>--select--</option>
                                <option value="1">Committee</option>
                                <option value="2">Committee</option>
                                <option value="3">Committee</option>
                            </select>
                        </div>
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Working Panel<sup class="text-danger">*</sup></label>
                            <select id="department" name="department" class="form-control input-font">
                                <option value="" disabled selected>--select--</option>
                                <option value="1">Panel</option>
                                <option value="2">Panel</option>
                                <option value="3">Panel</option>
                            </select>
                        </div>
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">No.of Vacancies<sup class="text-danger">*</sup></label>
                            <input type="text" class="form-control input-font" name="vacancies" id="vacancies" placeholder="Enter No.of Vacancies"></input>
                        </div>
                        <div class="mb-2 col-md-4">
                                        <label class="d-block">Eligibility Criteria<sup class="text-danger">*</sup></label>
                                        <div class="d-flex">
                                            <div>
                                                <input type="file" id="image" name="image" class="form-control-file">
                                            </div>
                                            <div>
                                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#ImageModal">
                                                Preview
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal -->
                                    <div class="modal fade" id="ImageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" style="max-width:700px;">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="imageModalLabel">Eligibility Criteria</h5>
                                                    <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span></button>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- <img id="outpuimage"width="100%"/> -->
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                        <div class="mb-2 col-md-12">
                            <label class="d-block text-font">Detailed of Task Assigned<sup class="text-danger">*</sup></label>
                            <textarea type="text" class="form-control input-font" name="assigned" id="assigned" placeholder="Enter Detailed of Task Assigned"></textarea>
                        </div>
                    </div>
                    <div class="row">
                            <div class="col-md-12 submit_btn p-3">
                                    <a class="btn btn-success btn-sm text-white submit">Submit</a>
                                    <button onclick="history.back()" class="btn btn-danger btn-sm text-white cancel">Cancel</button> 
                                    <!-- <input type="reset" class="btn btn-warning btn-sm text-white"  name="Reset"> -->
                            </div>
                    </div>
              </div>
            </div>
          </div>
          
        </div>
        
<script>

$('.submit').on('click',function(){
    Swal.fire({
                    title: 'Do you want to create?',
                    showDenyButton: true,
                    showCancelButton: false,
                    confirmButtonText: 'Create',
                    denyButtonText: `Close`,
                    }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {    
                        window.location.replace('<?php echo base_url();?>membership_panel/create_vacancies_list');                   
                        //$('#competition_edit').submit();
                       // Swal.fire('Saved!', '', 'success')                                
                    } else if (result.isDenied) {
                        // Swal.fire('Changes are not saved', '', 'info')
                    }
                    })
})
</script>
    