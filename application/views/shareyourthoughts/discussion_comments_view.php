<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Discussion Foram Comments</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url().'Admin/dashboard';?>" >Sub Admin Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'admin/exchange_forum';?>" >Exchange Forum</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'Shareyourthoughts/share_your_dashboard';?>" >Share Your Thoughts</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'Shareyourthoughts/discussion_forum_dashboard';?>" >Discussion Forum</a></li>
                <li class="breadcrumb-item active" aria-current="page">Discussion Foram Comments</li>
                
            </ol>
        </nav>
    </div>
    <!-- Content Row -->
    <div class="row">
        <div class="col-12 mt-3">
            <div class="card border-top card-body table-responsive">
                <table id="example" class="hover table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Sr. No.</th>
                            <th>Email</th>
                            <th>Contact</th>
                            <th>Name</th>
                            <th>Comments</th>
                            <th>Date of Post</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php  foreach ($getData as $key => $value) {?>
                        <tr>
                            <td><?= $key+1?></td>
                            <td><?=$value['email']?></td>
                            <td><?=$value['user_mobile']?></td>
                            <td><?=$value['user_name']?></td>
                            <td><?=$value['description']?></td>
                            <td><?= date("d-m-Y", strtotime($value['created_on']));?></td>
                            <td class="d-flex">
                                <?php if ($value['status']==1 || $value['status']==6 ) { ?>
                                <button onclick="updateDiscussionComments('<?= $value['id']?>',5);" data-id='<?php echo $value['id']; ?>' class="btn btn-info btn-sm mr-2 delete_img">Publish</button>
                                <?php } else {?>
                                <button onclick="updateDiscussionComments('<?= $value['id']?>',6);" data-id='<?php echo $value['id']; ?>' class="btn btn-warning btn-sm mr-2 delete_img">Unpublish</button>
                                <?php } ?>
                                <!-- <button onclick="updateDiscussionComments('<?= $value['id']?>',9);" data-id='<?php echo $value['id']; ?>' class="btn btn-secondary btn-sm mr-2 delete_img">Archived</button> -->
                                <button onclick="deleteDiscussionComments(' <?= $value['id']?> ');" data-id='<?php echo $value['id']; ?>' class="btn btn-danger btn-sm mr-2 delete_img">Delete</button>
                            </td>
                        </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
<div class="modal fade" id="delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Delete Record</h5>
            <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">
            <p>Are you sure you want to delete?</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary deletecall" data-bs-dismiss="modal">Delete</button>
        </div>
    </div>
</div>
</div>
<div class="modal fade" id="updatemodel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"><span class="sms"></span> Record</h5>
            <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">
            <p>Are you sure you want to <span class="sms"> </span> ?</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary updatestatus" data-bs-dismiss="modal"><span class="sms"> </span></button>
        </div>
    </div>
</div>
</div>
<!-- Modal -->
<script type="text/javascript">
 

  function deleteDiscussionComments(id)
{ 
  Swal.fire({
    title: 'Do you want to Delete ?',
    showDenyButton: true,
    showCancelButton: false,
    confirmButtonText:'Delete',
    denyButtonText: `Cancel`,
  }).then((result) => { 
    if (result.isConfirmed) 
    { 
      $.ajax({
type: 'POST',
url: '<?php echo base_url(); ?>Shareyourthoughts/deleteDiscussionComments',
data: {
id: id,
},
success: function(result)
{
location.reload();
},
error: function(result) {
alert("Error,Please try again.");
}
}); 
    }  
  })
}

  function updateDiscussionComments(id,status)
{ 
    if (status==5)  { stsdata='Publish'; }
    if (status==6)  { stsdata='UnPublish'; }
  Swal.fire({
    title: 'Do you want to '+stsdata+' ?',
    showDenyButton: true,
    showCancelButton: false,
    confirmButtonText:stsdata,
    denyButtonText: `Cancel`,
  }).then((result) => { 
    if (result.isConfirmed) 
    { 
      $.ajax({
type: 'POST',
url: '<?php echo base_url(); ?>Shareyourthoughts/updateDiscussionComments',
data: {
id: id,
status: status,
},
success: function(result)
{
location.reload();
},
error: function(result) {
alert("Error,Please try again.");
}
}); 
    }  
  })
}
</script>