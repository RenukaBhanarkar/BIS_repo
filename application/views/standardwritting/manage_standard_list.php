    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Manage Competition</h1>
            <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url().'Admin/dashboard';?>" >Sub Admin Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'admin/exchange_forum';?>" >Exchange Forum</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'quiz/organizing_quiz';?>" >Competition</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'Standardswritting/standard_writting_dashboard';?>" >Standard Writting</a></li>
                <li class="breadcrumb-item active" aria-current="page">Manage Competition</li>
                
                </ol>
            </nav>
        </div>
        <div class="row">
        <div class="col-12">
            <div class="card border-top card-body">
                <div>
                    
                    <a href="<?php echo base_url(); ?>standardswritting/create_standard_archive" class="btn btn-primary btn-sm mr-2" title="View">Archived</a>
                </div>
            </div>
        </div>
  </div>
        <!-- Content Row -->
       <div class="row">
            <div class="col-12 mt-3">
                <div class="card border-top card-body ">
                    <table id="example" class="table-bordered nowrap table-responsive" style="width:100%">
                    <thead>
                            <tr>
                                <th>Sr. No.</th>
                                <th>Competition ID</th>
                                <th>Standard Club</th>
                                <th>Date of Activity</th>
                                <th>Topic</th>
                                <th>Number of Participate</th>
                                <th>Date Created</th>
                                <th>Status</th>
                                <th>Reason of Rejection</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                           <tr>
                              <td>1</td>
                              <td>12345</td>
                              <td>Miscellaneous Competition</td>
                              <td>12/03/2023</td>
                              <td>Topic</td>
                              <td>12</td>
                              <td>12/03/2023 12:00:00</td>
                              <td>Pending</td>
                              <td>Reason of Rejection</td>
                              <td class="d-flex">
                                 <a href="<?php echo base_url(); ?>standardswritting/view_standards" class="btn btn-primary btn-sm mr-2" >View</a>
                                 <a href="<?php echo base_url(); ?>standardswritting/create_standard_edit" class="btn btn-info btn-sm mr-2 edit" >Edit</a>
                                 <a href="<?php echo base_url(); ?>" class="btn btn-danger btn-sm mr-2 delete" >Delete</a>
                                 <a href="<?php echo base_url(); ?>" class="btn btn-primary btn-sm mr-2 archive" >Archive</a>
                                 <a href="<?php echo base_url(); ?>" class="btn btn-info btn-sm mr-2 sent">Sent for Approval</a>
                                 <a href="<?php echo base_url(); ?>" class="btn btn-success btn-sm mr-2 approve">Approve</a>
                                 <a href="<?php echo base_url(); ?>" class="btn btn-danger btn-sm mr-2 reject" >Reject</a>
                              </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
<script>
       $(document).ready(function(){
   $('.edit').on('click',function(){
    Swal.fire({
                    title: 'Do you want to Edit?',
                    showDenyButton: true,
                    showCancelButton: false,
                    confirmButtonText: 'Edit',
                    denyButtonText: `Cancel`,
                    }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {                       
                        
                       // Swal.fire('Saved!', '', 'success')                                
                    } else if (result.isDenied) {
                        // Swal.fire('Changes are not saved', '', 'info')
                    }
                    })
   }) 
   
})
$(document).ready(function(){
   $('.delete').on('click',function(){
    Swal.fire({
                    title: 'Do you want to Delete?',
                    showDenyButton: true,
                    showCancelButton: false,
                    confirmButtonText: 'Delete',
                    denyButtonText: `Cancel`,
                    }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {                       
                        
                       // Swal.fire('Saved!', '', 'success')                                
                    } else if (result.isDenied) {
                        // Swal.fire('Changes are not saved', '', 'info')
                    }
                    })
   }) 
   
})
$(document).ready(function(){
   $('.archive').on('click',function(){
    Swal.fire({
                    title: 'Do you want to Archive?',
                    showDenyButton: true,
                    showCancelButton: false,
                    confirmButtonText: 'Archive',
                    denyButtonText: `Cancel`,
                    }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {                       
                        
                       // Swal.fire('Saved!', '', 'success')                                
                    } else if (result.isDenied) {
                        // Swal.fire('Changes are not saved', '', 'info')
                    }
                    })
   }) 
   
})
$(document).ready(function(){
   $('.archive').on('click',function(){
    Swal.fire({
                    title: 'Do you want to Archive?',
                    showDenyButton: true,
                    showCancelButton: false,
                    confirmButtonText: 'Archive',
                    denyButtonText: `Cancel`,
                    }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {                       
                        
                       // Swal.fire('Saved!', '', 'success')                                
                    } else if (result.isDenied) {
                        // Swal.fire('Changes are not saved', '', 'info')
                    }
                    })
   }) 
   
})
$(document).ready(function(){
   $('.sent').on('click',function(){
    Swal.fire({
                    title: 'Do you want to Archive?',
                    showDenyButton: true,
                    showCancelButton: false,
                    confirmButtonText: 'Archive',
                    denyButtonText: `Cancel`,
                    }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {                       
                        
                       // Swal.fire('Saved!', '', 'success')                                
                    } else if (result.isDenied) {
                        // Swal.fire('Changes are not saved', '', 'info')
                    }
                    })
   }) 
   
})
</script>