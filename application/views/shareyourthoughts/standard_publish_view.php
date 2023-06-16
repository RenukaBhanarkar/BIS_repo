<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">New Standards Published View</h1>
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="<?php echo base_url().'Admin/dashboard';?>" >Sub Admin Dashboard</a></li>
				<li class="breadcrumb-item"><a href="<?php echo base_url().'admin/exchange_forum';?>" >Exchange Forum</a></li>
				<li class="breadcrumb-item"><a href="<?php echo base_url().'Shareyourthoughts/share_your_thoughts_dashboard';?>" >Share Your Thoughts</a></li>
				<li class="breadcrumb-item active" aria-current="page">New Standards Published View</li>
				
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
                                    <button onclick="updateStandardPublishComments('<?= $value['id']?>',5);" data-id='<?php echo $value['id']; ?>' class="btn btn-info btn-sm mr-2 delete_img">Publish</button>
                                <?php } 

                                if ($value['status']==5 ) {?>
                                    <button onclick="updateStandardPublishComments('<?= $value['id']?>',6);" data-id='<?php echo $value['id']; ?>' class="btn btn-warning btn-sm mr-2 delete_img">Unpublish</button>
                                <?php } 
                                if ($value['status']==1 || $value['status']==6 ) { ?>
                                <button onclick="updateStandardPublishComments('<?= $value['id']?>',9);" data-id='<?php echo $value['id']; ?>' class="btn btn-secondary btn-sm mr-2 delete_img">Archived</button>

                                <button onclick="deleteStandardPublishComments(' <?= $value['id']?> ');" data-id='<?php echo $value['id']; ?>' class="btn btn-danger btn-sm mr-2 delete_img">Delete</button>
                            <?php } 
                            if ($value['status']==9  ) { ?>
                                <button onclick="updateStandardPublishComments('<?= $value['id']?>',1);" data-id='<?php echo $value['id']; ?>' class="btn btn-secondary btn-sm mr-2 delete_img">Restore</button>

                                <button onclick="deleteStandardPublishComments(' <?= $value['id']?> ');" data-id='<?php echo $value['id']; ?>' class="btn btn-danger btn-sm mr-2 delete_img">Delete</button>


                            <?php } ?>
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
 
 
<!-- Modal -->
 

<script type="text/javascript">
    function deleteStandardPublishComments(id) 
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
url: '<?php echo base_url(); ?>Shareyourthoughts/deleteStandardPublishComments',
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

  function updateStandardPublishComments(id,status)
{ 
    if (status==5)  { stsdata='Publish'; }
if (status==6)  { stsdata='UnPublish';  }
if (status==9)  { stsdata='Archives';  }
if (status==1)  { stsdata='Restore';  }
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
url: '<?php echo base_url(); ?>Shareyourthoughts/updateStandardPublishComments',
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