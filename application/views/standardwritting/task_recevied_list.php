<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Task Recevied for Review</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url().'Admin/dashboard';?>" >Admin Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Task Recevied for Review</li>
                
            </ol>
        </nav>
    </div>
    
    <!-- Content Row -->
    <div class="row">
        <div class="col-12 mt-3">
            <div class="card border-top card-body ">
                <table id="example" class="table-bordered table-responsive nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>Sr. No.</th>
                            <th>Competition Id</th>
                            <th>Title of Competition</th>
                            <th>Submission Id</th>
                            <th>Class</th>
                            <th>Submission Date & Time</th>
                            <th>Name of Evaluator</th>
                            <th>Total Marks</th>
                            <th>Score</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($getData as $key => $value): ?>
                        <tr>
                            <td><?=$key+1?></td>
                            <td><?=$value['competetion_id']?></td>
                            <td><?=$value['title']?></td>
                            <td><?=$value['id']?></td>
                            <td><?=$value['avail']?></td>
                            <td><?= date("d-m-Y h:i:s", strtotime($value['created_on']));?></td>
                            <td>Name of Evaluator</td>
                            <td><?=$value['total_mark']?></td>
                            <td><?=$value['score']?></td>

                            <?php 
                            if($value['status']==1)
                            {
                                $status="Send For Review";
                            }
                            if($value['status']==2)
                            {
                                $status="Reviewed";
                            }
                            ?>
                            <td><?=$status?></td>
                            <td class="d-flex">
                                <a onclick="reviewSubmitData('<?= $value['id']?>',1)" class="btn btn-success btn-sm mr-2" title="View">Review</a>
                                <a onclick="viewSubmitData('<?= $value['id']?>',2)" class="btn btn-primary btn-sm mr-2" title="View">View</a>
                            </td>
                        </tr>
                        
                        <?php endforeach ?>
                        
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->

<script type="text/javascript">

    function reviewSubmitData(id,data)
    {
        if (data==1) 
        {
            title="Do you want to  Task Recevied for Review ?";
            name="Review";
        }
        if (data==2) 
        {
            title="Do you want to  Task Recevied for view ?";
            name="view";
        }
    Swal.fire({
    title: title,
    showDenyButton: true,
    showCancelButton: false,
    confirmButtonText:name,
    denyButtonText: `Cancel`,
    }).then((result) => {
    if (result.isConfirmed)
    {
    window.location.href = "task_recevied_reviewed/"+id;
    }
    })
    }
     
    function viewSubmitData(id,data)
    {
        window.location.href = "task_recevied_reviewed/"+id;
    }
    </script>