<div class="container-fluid">
          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Create Vacancies</h1>
            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url().'Admin/dashboard';?>" >Sub Admin Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'admin/exchange_forum';?>" >Exchange Forum</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'membership_panel/working_panel_dashboard';?>" >Offers for the Membership of Working Panels</a></li>
                <li class="breadcrumb-item active" aria-current="page">Create Vacancies</li>
            </ol>
            </nav>

          </div>


          <!-- Content Row -->
          <div class="row">
            <div class="col-12">
              <div class="card border-top card-body">
                <div>
                  <button type="button" class="btn btn-primary btn-sm mr-2" onclick="location.href='<?php echo base_url(); ?>membership_panel/create_vacancies_form'">Create New Vacancies</button>
                  
                </div>
              </div>
            </div>
          </div>
        <div class="row">
            <div class="col-12 mt-3">
              <div class="card border-top card-body">
                <table id="example" class="table-bordered table-responsive nowrap" style="width:100%">
                  <thead>
                    <tr>
                      <th>Sr. No.</th>
                      <th>Id</th>
                      <th>Department</th>
                      <th>Technical Committee</th>
                      <th>Working Panel</th>
                      <th>No.of Vacancies</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                        <tr>
                            <td>1</td>
                            <td>12345</td>
                            <td>Department</td>
                            <td>Committee</td>
                            <td>Panel</td>
                            <td>100</td>
                            <td>
                                <a href="#" class="btn btn-primary btn-sm mt-2 view">View</a>
                                <a href="#" class="btn btn-secondary btn-sm mt-2 edit">Edit</a>
                                <a href="#" class="btn btn-success btn-sm mt-2 create">Create</a>
                                <a href="#" class="btn btn-danger btn-sm mt-2 delete">Delete</a>
                            </td>
                        </tr>

                  </tbody>
                </table>
              </div>
            </div>
          </div>
          
        </div>
        <div class="col-md-12 submit_btn p-3" >
                               <a class="btn btn-primary btn-sm text-white" style=" margin-right: 37px;" onclick="history.back()">Back</a>
        </div>
<script>

$('.create').on('click',function(){
    Swal.fire({
                    title: 'Do you want to create?',
                    showDenyButton: true,
                    showCancelButton: false,
                    confirmButtonText: 'Create',
                    denyButtonText: `Close`,
                    }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {    
                        //window.location.replace('<?php echo base_url();?>subadmin/admin_creation_list');                   
                        //$('#competition_edit').submit();
                       // Swal.fire('Saved!', '', 'success')                                
                    } else if (result.isDenied) {
                        // Swal.fire('Changes are not saved', '', 'info')
                    }
                    })
})
</script>
    