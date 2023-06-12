    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Closed Competition</h1>
            <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url().'Admin/dashboard';?>" >Sub Admin Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'admin/exchange_forum';?>" >Exchange Forum</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'quiz/organizing_quiz';?>" >Competition</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'Standardswritting/standard_offline_dashboard';?>" >Standard Writting Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'Standardswritting/standard_online_dashboard';?>" >Standard Writting</a></li>
                <li class="breadcrumb-item active" aria-current="page">Closed Competition</li>
                
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
                              <td><?=$value['count']?></td>

                              <?php 
                              if($value['review_status']==0)
                                { $task="Task Under Review";}
                            else
                                {$task="Sent For Review";}

                                ?>
                                <td><?=$task?></td>
                              <td>Reviewed</td>
                              <!-- <td><?=$value['status_name']?></td>   -->
                              <?php if($value['result_declared'] == 0 ){ ?>

                                <td><?php echo "Closed"; ?></td>  

                                <?php } else { ?>
                                  <td><?php echo "Result Declared"; ?></td>  
                                  <?php } ?>
                              <td class="d-flex">
                                 <a onclick="viewSubmissionData(<?=$value['id']?>)" class="btn btn-warning btn-sm mr-2" >View Submission</a>
                                 <a onclick="viewData(<?=$value['id']?>)" class="btn btn-info btn-sm mr-2" >View Details</a>
                                 <?php if (encryptids("D", $_SESSION['admin_type']) == 3) { ?>
                                 <a  class="btn btn-primary btn-sm mr-2" onclick="updateOnlineStatusReview(<?=$value['id']?>)" >Sent for Review</a>

                                <?php if($value['result_declared'] == 0 ){ ?>
                                 <a href="<?php echo base_url(); ?>Standardswritting/result_declared_list/<?= encryptids('E',$value['id']); ?>" class="btn btn-success btn-sm mr-2" >Result Declaration</a>
                                 <?php } ?>

                               <?php } ?>     
                                  
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

    </div>
    <!-- End of Main Content -->
 </body>
<script>
/*function viewData(id) 
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
}
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
      window.location.href = "submission_view/"+id; 
    }  
  })
}*/
</script>

<script>
/*  function updateOnlineStatusReview(id) {
    if (status==1) { statusdata='Update'; }
    if (status==9) { statusdata='Update'; }
    Swal.fire({
      title: 'Do you want to Create?',
      showDenyButton: true,
      showCancelButton: false,
      confirmButtonText: 'Update',
      denyButtonText: `Cancel`,
    }).then((result) => 
    { 
      if (result.isConfirmed) 
      { 
        $.ajax({
        type: 'POST',
        url: '<?php echo base_url(); ?>standardswritting/updateOnlineStatusReview',
        data: {
          id: id,
          status: status, 
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
 
 

 function deleteOnlineData(id) 
 { 
  Swal.fire({
                    title: 'Do you want to Create?',
                    showDenyButton: true,
                    showCancelButton: false,
                    confirmButtonText:'Delete',
                    denyButtonText: `Cancel`,
                    }).then((result) => { 
                    if (result.isConfirmed) 
                    { 
                      $.ajax({
                      type: 'POST',
                      url: '<?php echo base_url(); ?>standardswritting/deleteOnlineData',
                      data: {
                        id: id, 
                      },
                      success: function(result)
                      {
                        Swal.fire('Saved!', '', 'success')
                        location.reload();
                      },
                      error: function(result) {
                        alert("Error,Please try again.");
                      }
                    });
                  }  
                })
  }


function editData(id) 
{
  Swal.fire({
    title: 'Do you want to Edit ?',
    showDenyButton: true,
    showCancelButton: false,
    confirmButtonText:'Edit',
    denyButtonText: `Cancel`,
  }).then((result) => { 
    if (result.isConfirmed) 
    { 
      window.location.href = "create_online_edit/"+id; 
    }  
  })
} 
$('.sent_approve').on('click',function(){
    Swal.fire({
                    title: 'Do you want to Sent for Review?',
                    showDenyButton: true,
                    showCancelButton: false,
                    confirmButtonText: 'Cancel',
                    denyButtonText: `Close`,
                    }).then((result) => {
                    //* Read more about isConfirmed, isDenied below 
                    if (result.isConfirmed) {    
                        window.location.replace('<?php echo base_url(); ?>Standardswritting/review_management_dashboard');                   
                        //$('#competition_edit').submit();
                       // Swal.fire('Saved!', '', 'success')                                
                    } else if (result.isDenied) {
                        // Swal.fire('Changes are not saved', '', 'info')
                    }
                    })
})*/
</script>