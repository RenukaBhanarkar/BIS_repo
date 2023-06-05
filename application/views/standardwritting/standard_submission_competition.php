    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">View Submission</h1>
            <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url().'Admin/dashboard';?>" >Sub Admin Dashboard</a></li>
                 <li class="breadcrumb-item"><a href="<?php echo base_url().'admin/exchange_forum';?>" >Exchange Forum</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'quiz/organizing_quiz';?>" >Competition</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'Standardswritting/standard_offline_dashboard';?>" >Standard Writting</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'Standardswritting/standard_online_dashboard';?>" >Standard Writting Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'Standardswritting/review_management_dashboard';?>" >Review Competition Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">View Submission</li>
                
                </ol>
            </nav>
        </div>

        <!-- Content Row -->
       <div class="row">
            <div class="col-12 mt-3">
                <div class="card border-top card-body table-responsive">
                    <table id="example" class="table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Sr. No.</th>
                                <th>Competition Id</th>
                                <th>Submission Id</th>
                                <th>Member Id</th>
                                <th>Class</th>
                                <th>Total Marks</th>
                                <th>Score</th>
                                <th>Name of Evaluator</th>
                                <th>Date Assign</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                           <tr>
                              <td>1</td>
                              <td>12345</td>
                              <td>12345</td>
                              <td>12345</td>
                              <td>9 th</td>
                              <td>100</td>
                              <td>100</td>
                              <td>Anis Mulani</td>
                              <td>12/03/2023</td>
                              <td>xyx</td>
                              <td class="d-flex">
                                 <a href="<?php echo base_url(); ?>Standardswritting/standard_submission_view   /" class="btn btn-primary btn-sm mr-2" >View</a>
                                 <a href="#" class="btn btn-secondary btn-sm mr-2" data-bs-toggle="modal" data-bs-target="#assignForm">Assign</a>
                              </td>

                        </tbody>
                    </table>
                </div>
            </div>
                <div class="col-md-12 submit_btn p-3">
                    <button class="btn btn-success btn-sm text-white" data-bs-toggle="modal" data-bs-target="#assignForm">Assign for Review</button>
                    <a href="<?php echo base_url(); ?>" class="btn btn-danger btn-sm text-white" >Cancel</a>
                </div>
        </div>
    </div>
    <!-- /.container-fluid -->
    <!-- Modal -->
    <div class="modal fade" id="assignForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-xl">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Assign For Review</h5>
                                                    <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="col-md-12">
                                                <table id="example_1" class="table-bordered" style="width:100%">
                                                            <thead>
                                                                <tr>
                                                                    <th><input class="form-control-input" type="checkbox" value="" id="flexCheckDefault"></th>
                                                                    <th>Sr. No.</th>
                                                                    <th>Name of Evaluator</th>
                                                                    
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td><input class="form-control-input" type="checkbox" value="" id="flexCheckDefault"></td>
                                                                    <td>1</td>
                                                                    <td>Name</td>
                                                            </tbody>
                                                        </table>
                                                        </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-primary assign">Assign</button>
                                                    <button type="button" class="btn btn-danger cancel" data-bs-dismiss="modal">Cancel</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal -->
<script>
    $(document).ready(function () {
    $('#example_1').DataTable({
        // scrollX: true,
    });
});
$('.assign').on('click',function(){
        Swal.fire({
                    title: 'Are you sure you want to Assign ?',
                    showDenyButton: true,
                    showCancelButton: false,
                    confirmButtonText: 'Assign',
                    denyButtonText: `Close`,
                    }).then((result) => { 
                    if (result.isConfirmed) {               
                       window.location.replace('<?php echo base_url().'quiz/quiz_list' ?>');                           
                    } else if (result.isDenied) { 
                    }
                    })
    })
    $('.cancel').on('click',function(){
        Swal.fire({
                    title: 'Are you sure you want to Cancel?',
                    showDenyButton: true,
                    showCancelButton: false,
                    confirmButtonText: 'Cancel',
                    denyButtonText: `Close`,
                    }).then((result) => { 
                    if (result.isConfirmed) {               
                       window.location.replace('<?php echo base_url().'quiz/quiz_list' ?>');                           
                    } else if (result.isDenied) { 
                    }
                    })
    })
</script>