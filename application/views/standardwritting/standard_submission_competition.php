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
                        <?php foreach ($getData as $key => $value): ?>
                        <tr>
                            <td><?=$key+1?></td>
                            <td><?=$value['comp_id']?></td>
                            <td><?=$value['submission_id']?></td>
                            <td>12345</td>
                            <td>9 th</td>
                            <td><?=$value['total_mark']?></td>
                            <td><?=$value['score']?></td>
                            <td>Anis Mulani</td>
                            <td><?=$value['sssign_date']?></td>
                            <?php
                            if($value['assignStatus']==1)
                            {
                            $assignStatus="Send For Review";
                            }
                            if($value['assignStatus']==2)
                            {
                            $assignStatus="Reviewed";
                            }
                            
                            ?>
                            <td><?=$assignStatus?></td>
                            <td class="d-flex">
                                
                                <a onclick="viewSubmitData('<?= $value['submission_id']?>')" class="btn btn-primary btn-sm mr-2" >View</a>
                                <?php if($value['assignStatus']==1)
                                {?>
                                    <a onclick="viewAssingData('<?= $value['submission_id']?>')"class="btn btn-secondary btn-sm mr-2" >Assign</a>
                                <?php } ?>
                            </td>
                        </tr>
                        
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-12 submit_btn p-3">
            <button class="btn btn-success btn-sm text-white" data-bs-toggle="modal" data-bs-target="#assignForm2">Assign for Review</button>
            <a href="<?php echo base_url(); ?>" class="btn btn-danger btn-sm text-white" >Cancel</a>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
<!-- Modal -->
<form name="standard_submission_competition"id="standard_submission_competition"action="<?php echo base_url() . 'standardswritting/standard_submission_competition'?>/<?=$ids;?>" method="post" enctype="multipart/form-data">
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
                                    <th>
                                        <th>Sr. No.</th>
                                        <th>Name of Evaluator</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    <?php foreach ($getEvaluator as $key => $Evaluator) {?>
                                    <tr>
                                        <td>
                                            <input  class="form-control-input allEvaluator" type="hidden" name="submission_id" id="submission_id">
                                            <input class="form-control-input allEvaluator" type="radio"  name="evaluator"value="<?=$Evaluator['id']?>" id="select-all">
                                        </td>
                                        <td><?=$key+1?></td>
                                        <td><?=$Evaluator['name']?></td>
                                    </tr>
                                    <?php }?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="#" class="btn btn-success btn-sm mr-2" onclick="updateOnlineStatus()" >Assign</a>
                        <!-- <a class="btn btn-primary assign" id="updateOnlineStatus" onclick="updateOnlineStatus()">Assign</a> -->
                        <button type="button" class="btn btn-danger cancel" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </form>


    <form name="standard_submission_competition"id="standard_submission_competition"action="<?php echo base_url() . 'standardswritting/standard_submission_competition'?>/<?=$ids;?>" method="post" enctype="multipart/form-data">
    <div class="modal fade" id="assignForm2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Assign For Review</h5>
                    <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12">
                        <table id="example_2" class="table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>
                                        <th>Sr. No.</th>
                                        <th>Name of Evaluator</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    <?php foreach ($getEvaluator as $key => $Evaluator) {?>
                                    <tr>
                                        <td>
                                             
                                            <input class="form-control-input " type="checkbox"  name="evaluator_id"value="<?=$Evaluator['id']?>" id="select-all">
                                        </td>
                                        <td><?=$key+1?></td>
                                        <td><?=$Evaluator['name']?></td>
                                    </tr>
                                    <?php }?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="#" class="btn btn-success btn-sm mr-2" >Assign</a> <button type="button" class="btn btn-danger cancel" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!-- Modal -->
    <script>
    $(document).ready(function () {
    $('#example_1').DataTable({
    // scrollX: true,
    });
    $('#example_2').DataTable({
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
    //   window.location.replace('<?php echo base_url().'quiz/quiz_list' ?>');
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
    //   window.location.replace('<?php echo base_url().'quiz/quiz_list' ?>');
    } else if (result.isDenied) {
    }
    })
    })
    </script>
    <script type="text/javascript">
    
    function viewSubmitData(id)
    {
    Swal.fire({
    title: 'Do you want to  Assign View ?',
    showDenyButton: true,
    showCancelButton: false,
    confirmButtonText:'View',
    denyButtonText: `Cancel`,
    }).then((result) => {
    if (result.isConfirmed)
    {
    window.location.href = "../standard_submission_view/"+id;
    }
    })
    }
    function viewAssingData(id)
    {
    Swal.fire({
    title: 'Do you want to  Assign View ?',
    showDenyButton: true,
    showCancelButton: false,
    confirmButtonText:'View',
    denyButtonText: `Cancel`,
    }).then((result) => {
    if (result.isConfirmed)
    {
    $("#submission_id").val(id)
    $('#assignForm').modal('show');
    }
    })
    }
    
    function updateOnlineStatus() {
    submission_id=$('input[name=submission_id]').val();
    evaluator=$('input[name="evaluator"]:checked').val();
    
    
    Swal.fire({
    title: 'Do you want to Assign',
    showDenyButton: true,
    showCancelButton: false,
    confirmButtonText: 'Assign',
    denyButtonText: `Cancel`,
    }).then((result) =>
    {
    if (result.isConfirmed)
    {
    $.ajax({
    type: 'POST',
    url: '<?php echo base_url(); ?>standardswritting/updateEvaluatorStatus',
    data: {
    submission_id: submission_id,
    evaluator: evaluator,
    },
    success: function(result)
    {
    Swal.fire('Saved!', '', 'success');
    location.reload();
    },
    error: function(result)
    {
    alert("Error,Please try again.");
    }
    });
    }
    })
    }
    </script>