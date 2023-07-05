<!-- Begin Page Content -->
<div class="container-fluid">
    
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">In Conversation with Expert</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url().'Admin/dashboard';?>" >Sub Admin Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'admin/exchange_forum';?>" >Exchange Forum</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'Standardsmaking/conversation_dashboard';?>" >In Conversation with Expert</a></li>
                <li class="breadcrumb-item active" aria-current="page">Conversation List</li>
                
            </ol>
        </nav>
    </div>
    <!-- Content Row -->
    <?php if (encryptids("D", $_SESSION['admin_type']) == 3  ){ ?>
    <?php if (in_array(2, $permissions)) { ?>
    <div class="row">
        <div class="col-12">
            <div class="card border-top card-body">
                <div>
                    <button type="button" class="btn btn-primary btn-sm mr-2" onclick="location.href='<?php echo base_url(); ?>Standardsmaking/conversation_form'">Add New Video</button>
                </div>
            </div>
        </div>
    </div>
    <?php }?>
    <?php }?>
    <?php
    if ($this->session->flashdata('MSG')) {
    echo $this->session->flashdata('MSG');
    }
    ?>
    <div class="row">
        <div class="col-12 mt-3">
            <div class="card border-top card-body ">
                <table id="example" class="hover table-bordered table-responsive" style="width:100%">
                    <thead>
                        <tr>
                            <th>Sr. No.</th>
                            <th>Title</th>
                            <th>About Video</th>
                            <th>Video</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($Conversation as $key => $value) {?>
                        <tr>
                            <td><?= $key+1;?></td>
                            <td><?= $value['title'];?></td>
                            <td><?= $value['description'];?></td>
                            <td><a href="<?= base_url()?><?= $value['video']?>"><i class="fa fa-video"></i></a></td>
                            <?php $id= encryptids("E", $value['id'] )?>
                            <td><?= $value['status_name'];?></td>
                            <td class="d-flex">
                                <?php  $user_id=encryptids("D", $_SESSION['admin_type']);?>
                                <?php if ($user_id!=3) {?>
                                    <a onclick="viewData('<?= $id?>')" class="btn btn-primary btn-sm mr-2" title="View">View</a>
                                <?php  }  else { ?>


                                <?php if (in_array(1, $permissions)) { ?>
                                <a onclick="viewData('<?= $id?>')" class="btn btn-primary btn-sm mr-2" title="View">View</a>
                                <?php } ?>
                                <?php if ($user_id == 3  ){ ?>
                                <?php if ($value['status']!=5) {?>

                                <?php if (in_array(3, $permissions)) { ?>
                                    <a onclick="editData('<?= $id?>')" onclick="viewData('<?= $id?>')" class="btn btn-info btn-sm mr-2" title="View">Edit</a>
                                <?php } ?>

                                <?php if (in_array(4, $permissions)) { ?>
                                     <button onclick="deleteConversation(' <?= $value['id']?> ');" data-id='<?php echo $value['id']; ?>' class="btn btn-danger btn-sm mr-2 delete_img">Delete</button>
                                <?php } ?>

                                
                               
                                
                                <button onclick="updateStatusConversation('<?= $value['id']?>',5);" data-id='<?php echo $value['id']; ?>' class="btn btn-success btn-sm mr-2 delete_img">Publish</button>
                                <?php }?>
                                
                                <?php if ($value['status'] == 5) {?>
                                <button onclick="updateStatusConversation('<?= $value['id']?>',6);" data-id='<?php echo $value['id']; ?>' class="btn btn-warning btn-sm mr-2 delete_img">Unpublish</button>
                                <?php }?>
                                
                                <button onclick="updateStatusConversation('<?= $value['id']?>',9);" data-id='<?php echo $value['id']; ?>' class="btn btn-primary btn-sm mr-2 delete_img">Archives</button>
                                <?php } }?>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="col-md-12 submit_btn p-3" >
                               <a class="btn btn-primary btn-sm text-white" style=" margin-right: 37px;" onclick="history.back()">Back</a>
                          </div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
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
</body>
<!-- Modal -->
<script type="text/javascript">
 

 

function updateStatusConversation(id,status)
{ 
if (status==5)  { var titletext='Publish'; }
if (status==6)  { var titletext='Unpublish'; }
if (status==9)  { var titletext='Archives'; }

Swal.fire({
title: 'Are you sur you want to '+ titletext +' ?',
showDenyButton: true,
showCancelButton: false,
confirmButtonText: titletext,
denyButtonText: `Cancel`,
}).then((result) => {
/* Read more about isConfirmed, isDenied below */
if (result.isConfirmed) {
$.ajax({
type: 'POST',
url: '<?php echo base_url(); ?>Standardsmaking/updateStatusConversation',
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
// Swal.fire('Saved!', '', 'success')
} else if (result.isDenied) {
// Swal.fire('Changes are not saved', '', 'info')
}
})
}
</script>

<script type="text/javascript">
function viewData(id) 
{ 
  window.location.href = "conversation_view/"+id;
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
      window.location.href = "conversation_edit/"+id; 
    }  
  })
}

function deleteConversation(id) 
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
url: '<?php echo base_url(); ?>Standardsmaking/deleteConversation',
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

</script>