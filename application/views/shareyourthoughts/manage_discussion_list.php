    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Manage Discussion</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url().'Admin/dashboard';?>" >Sub Admin Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'admin/exchange_forum';?>" >Exchange Forum</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'admin/share_your_dashboard';?>" >Share Your Thoughts</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'Shareyourthoughts/discussion_forum_dashboard';?>" >Discussion Forum</a></li>
                <li class="breadcrumb-item active" aria-current="page">Manage Discussion</li>
                
                </ol>
            </nav>
        </div>

        <!-- Content Row -->
       <div class="row">
            <div class="col-12 mt-3">
                <div class="card border-top card-body table-responsive">
                    <table id="example" class="hover table-bordered nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>Sr. No.</th>
                                <th>Title</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Created on</th>
                                <th>Status</th>
                                <th>Reason of Rejection</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                         
                        <tbody>
                        <?php foreach ($getData as $key => $value): ?>
                            <tr>
                            <td><?= $key+1;?></td>
                            <td><?= $value['title']?></td>
                            <td><?= date("d-m-Y", strtotime($value['start_date']));?></td>
                            <td><?= date("d-m-Y", strtotime($value['end_date']));?></td>
                            <td><?= date("d-m-Y", strtotime($value['created_on']));?></td>
                            <td><?= $value['status']?></td> 
                            <td><?= $value['remark']?></td>
                            <?php $id = encryptids("E", $value['id']);?> 
                            <td class="d-flex">
                                <a href="<?php echo base_url(); ?>Shareyourthoughts/discussion_view/<?= $id ?>" class="btn btn-primary btn-sm mr-2" title="View">View</a>

                                 <?php  if ($value['status']==1 || $value['status']==4 || $value['status']==6 ) {?>
                                    <a href="<?php echo base_url(); ?>Shareyourthoughts/discussion_foram_edit/<?= $id ?>" class="btn btn-info btn-sm mr-2" title="View">Edit</a>
                                <?php } ?>


                                <?php  if ($value['status']==1) {?>
                                    <button onclick="updateStatusDiscussionForum('<?= $value['id']?>',2);" data-id='<?php echo $value['id']; ?>' class="btn btn-success btn-sm mr-2 delete_img">Sent For Approval</button>
                                <?php }?>

                                 <?php  if ($value['status']==5) {?>
                                    <button onclick="updateStatusDiscussionForum('<?= $value['id']?>',6);" data-id='<?php echo $value['id']; ?>' class="btn btn-warning btn-sm mr-2 delete_img">Unpublish</button>
                                <?php }?>

                                 <?php  if ($value['status']==3 || $value['status']==6) {?>
                                     <button onclick="updateStatusDiscussionForum('<?= $value['id']?>',5);" data-id='<?php echo $value['id']; ?>' class="btn btn-info btn-sm mr-2 delete_img">Publish</button>
                                <?php }?>

                                <button onclick="updateStatusDiscussionForum('<?= $value['id']?>',9);" data-id='<?php echo $value['id']; ?>' class="btn btn-secondary  btn-sm mr-2 delete_img">Archive</button>

                                <button onclick="deleteDiscussionForum(' <?= $value['id']?> ');" data-id='<?php echo $value['id']; ?>' class="btn btn-danger btn-sm mr-2 delete_img">Delete</button>
                                
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
function updateStatusDiscussionForum(id,status)
{
console.log(status)
if (status==2)  { $(".sms").text('Send For Approval'); }
if (status==5)  { $(".sms").text('Publish'); }
if (status==6)  { $(".sms").text('UnPublish'); }
if (status==9)  { $(".sms").text('Archives'); }
$('#updatemodel').modal('show');
$('.updatestatus').on('click', function()
{
$.ajax({
type: 'POST',
url: '<?php echo base_url(); ?>Shareyourthoughts/updateStatusDiscussionForum',
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
});
}
function deleteDiscussionForum(id)
{
$('#delete').modal('show');
$('.deletecall').on('click', function()
{
$.ajax({
type: 'POST',
url: '<?php echo base_url(); ?>Shareyourthoughts/deleteDiscussionForum',
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
});
}
</script>