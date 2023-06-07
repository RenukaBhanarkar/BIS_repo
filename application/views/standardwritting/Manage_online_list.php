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
                <li class="breadcrumb-item"><a href="<?php echo base_url().'Standardswritting/standard_offline_dashboard';?>" >Standard Writting Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'Standardswritting/standard_online_dashboard';?>" >Standard Writting</a></li>
                <li class="breadcrumb-item active" aria-current="page">Manage Competition</li>
                
                </ol>
            </nav>
        </div>
<!-- <div class="row">
        <div class="col-12">
            <div class="card border-top card-body">
                <div>
                    <a href="<?php echo base_url(); ?>standardswritting/create_online_form" class="btn btn-primary btn-sm mr-2" title="View">Create New Competition</a>
                    <a href="<?php echo base_url(); ?>standardswritting/create_online_archive" class="btn btn-primary btn-sm mr-2" title="View">Archived</a>
                </div>
            </div>
        </div>
  </div> -->
        <!-- Content Row -->
       <div class="row">
            <div class="col-12 mt-3">
                <div class="card border-top card-body ">
                    <table id="example" class="hover table-bordered nowrap table-responsive" style="width:100%">
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
                                <th>Available For</th>
                                <th>Level of Competition</th>
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
                              <td><?=$value['start_date']?></td>
                              <td><?=$value['start_time']?></td>

                              <td><?=$value['end_date']?></td>
                              <td><?=$value['end_time']?></td> 
                              <td><img src="<?= base_url()?><?=$value['banner_img']?>" alt="#" class="" width="100%"></td>
                              <td><?=$value['availability']?></td>
                              <td><?=$value['level']?></td> 
                              <td><?=$value['status_name']?></td>  
                              <td class="d-flex">

                                 <a  class="btn btn-primary btn-sm mr-2" onclick="viewData('<?= $value['id']?>')" >View</a>



                                <?php if (encryptids("D", $_SESSION['admin_type']) == 3) { ?>

                                  <?php if ($value['status']!=2 && $value['status']!=5 ) {?>
                                  <a class="btn btn-info btn-sm mr-2"onclick="editData('<?= $value['id']?>')" >Edit</a>
                                  <a class="btn btn-danger btn-sm mr-2"onclick="deleteOnlineData('<?= $value['id']?>')" >Delete</a>
                                  <a class="btn btn-primary btn-sm mr-2" onclick="updateOnlineStatus('<?= $value['id']?>',9)" >Archive</a>
                                  <?php }?>


                            

                            <?php if ($value['status']==1) {?>
                                <a class="btn btn-success btn-sm mr-2"onclick="updateOnlineStatus('<?= $value['id']?>',2)"  >Send for approval</a>
                           <?php }?>

                           <?php if ($value['status']==6 || $value['status']==3 ) {?>
                                <a class="btn btn-success btn-sm mr-2" onclick="updateOnlineStatus('<?= $value['id']?>',5)" >Publish</a>
                           <?php }?>

                           <?php if ($value['status']==5) {?>
                                <a class="btn btn-warning btn-sm mr-2" onclick="updateOnlineStatus('<?= $value['id']?>',6)" >Unpublish</a>
                           <?php }?>

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
  function updateOnlineStatus(id,status) {
    if (status==2) { statusdata='Sent to admin for approval';title="Do you want to Send it for approval ?"; }
    if (status==5) { statusdata='Published'; title="Do you want to Publish ?";}
    if (status==6) { statusdata='UnPublished'; title="Do you want to Unpublish ?";}
    if (status==9) { statusdata='Archive'; title="Do you want to Archive ?";}
    Swal.fire({
      title: title,
      showDenyButton: true,
      showCancelButton: false,
      confirmButtonText: statusdata,
      denyButtonText: `Cancel`,
    }).then((result) => 
    { 
      if (result.isConfirmed) 
      { 
        $.ajax({
        type: 'POST',
        url: '<?php echo base_url(); ?>standardswritting/updateOnlineStatus',
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
</script>
 
                                   