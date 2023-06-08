    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Competition Reviewed</h1>
            <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url().'Admin/dashboard';?>" >Sub Admin Dashboard</a></li>
            <li class="breadcrumb-item"><a href="<?php echo base_url().'Admin/dashboard';?>" >Sub Admin Dashboard</a></li>
                 <li class="breadcrumb-item"><a href="<?php echo base_url().'admin/exchange_forum';?>" >Exchange Forum</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'quiz/organizing_quiz';?>" >Competition</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'Standardswritting/standard_offline_dashboard';?>" >Standard Writting</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'Standardswritting/standard_online_dashboard';?>" >Standard Writting Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'Standardswritting/review_management_dashboard';?>" >Review Competition Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Competition Reviewed</li>
                
                </ol>
            </nav> 
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
                                <th>Title of Competition</th>
                                <th>Start Date</th>
                                <th>Start Time</th>
                                <th>End Date</th>
                                <th>End Time</th>
                                <th>Banner</th>
                                <th>Available for</th>
                                <th>Level of Competition</th>
                                <th>Total Task</th>
                                <th>Task Under Review</th>
                                <th>Task Reviewed</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
 
                       <tbody> 

                            <?php foreach ($getData as $key => $value) {?>
                            <tr>
                              <td><?=$key+1?></td>
                              <td><?=$value['comp_id']?></td>
                              <td><?=$value['title']?></td>
                              <td><?= date("d-m-Y", strtotime($value['start_date']));?></td>
                              <td><?=$value['start_time']?></td>
                              <td><?= date("d-m-Y", strtotime($value['end_date']));?></td>
                              <td><?=$value['end_time']?></td> 
                              <td><img src="<?= base_url()?><?=$value['banner_img']?>" alt="#" class="" width="100%"></td>
                              <td><?=$value['availability']?></td>
                              <td><?=$value['level']?></td> 
                              <!-- <td><?=$value['status_name']?></td> -->
                              <td><?=$value['totalcount']?></td>
                              <td><?=$value['sendReview']?></td>  
                              <td><?=$value['Reviewd']?></td>  
                              <td>Status</td>  
                              <td class="d-flex">

                           <a onclick="viewSubmissionData(<?=$value['id']?>)" class="btn btn-primary btn-sm mr-2" >View Submission</a>
                                 <a onclick="viewData(<?=$value['id']?>)" class="btn btn-info btn-sm mr-2" >View Details</a>
 
                                  
                              </td>
                           </tr>
                         <?php } ?>
 
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

    
    <script type="text/javascript">

    function viewData(id) 
{ 
  Swal.fire({
    title: 'Do you want to View ?',
    showDenyButton: true,
    showCancelButton: false,
    confirmButtonText:'View',
    denyButtonText: `Cancel`,
  }).then((result) => { 
    if (result.isConfirmed) 
    { 
      window.location.href = "create_online_view/"+id; 
    }  
  })
} standard_submission_competition

function viewSubmissionData(id) 
{ 
  Swal.fire({
    title: 'Do you want to View Submission ?',
    showDenyButton: true,
    showCancelButton: false,
    confirmButtonText:'View',
    denyButtonText: `Cancel`,
  }).then((result) => { 
    if (result.isConfirmed) 
    { 
      window.location.href = "task_reviewed_list/"+id; 
    }  
  })
}

</script>