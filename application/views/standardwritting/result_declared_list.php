    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Result Declared List</h1>
            <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url().'Admin/dashboard';?>" >Sub Admin Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'admin/exchange_forum';?>" >Exchange Forum</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'quiz/organizing_quiz';?>" >Competition</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'Standardswritting/standard_offline_dashboard';?>" >Standard Writting Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'Standardswritting/standard_online_dashboard';?>" >Standard Writting</a></li>
                <li class="breadcrumb-item active" aria-current="page">Result Declared List</li>
                
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
                                <th>Name</th>
                                <th>Email Id</th>
                                <th>Contact No.</th>
                                <th>Member Id</th>
                                <th>Class</th>
                                <th>Date</th>
                                <th>Score</th>
                                <th>Time Taken</th>
                              
                                <th>Prize</th>   
                            </tr>
                        </thead>
                     
                        <tbody>
                            <?php $j = 1;
                                 foreach ($UsersDetails as $key => $user): ?>
                            <tr>
                              
                                <td><?= $j;?></td>
                                <td><?= $user['user_name']?></td>
                                <td><?= $user['email']?></td>
                                <td><?= $user['user_mobile']?></td>
                                <td><?= $user['member_id']?></td> 

                                <td><?= $user['stdClubMemberClass']?></td> 
                                <td><?= date("d-m-Y h:i:s", strtotime($user['created_on']));?></td>
                               
                                
                                <td><?= $user['score']?></td>
                                <?php 
                                 $t =  $user['time_taken'];
                                 $h = (int)$t/3600;
                                 $m= (int)$t/60%60;
                                 $s= (int)$t%60;

                                 $timeTaken = sprintf('%02d:%02d:%02d', ($h),($m),($s) );
                                 ?>

                                <td><?= $timeTaken ?> </td> 
                                 <td><?= $user['prize']?></td>
                              
                              
                            </tr>
                             
                            <?php $j++; endforeach ?>
                            
                            
                            
                            
                            
                            
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
  /*
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
}

  function updateOnlineStatusReview(id) {
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
                    // Read more about isConfirmed, isDenied below 
                    if (result.isConfirmed) {    
                        window.location.replace('<?php echo base_url(); ?>Standardswritting/review_management_dashboard');                   
                        //$('#competition_edit').submit();
                       // Swal.fire('Saved!', '', 'success')                                
                    } else if (result.isDenied) {
                        // Swal.fire('Changes are not saved', '', 'info')
                    }
                    });
});
*/
</script>