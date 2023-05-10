<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Winners Wall List</h1>
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url().'admin/';?>" >Home</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="<?php echo base_url().'admin/exchange_forum';?>" >Exchange Forum</a></li>
            </ol>
        </nav>

    </div>
    
    
    <!-- Content Row -->
    <!-- Content Row -->
        <div class="row">
            <div class="col-12">
                 <div class="card border-top card-body">
                    <div>
                           <button type="button" class="btn btn-primary btn-sm mr-2" onclick="location.href='<?php echo base_url();?>winnerwall/winner_wall_form'">Create New Winner Wall</button> 
                           <button type="button" class="btn btn-primary btn-sm mr-2" onclick="location.href='<?php echo base_url();?>winnerwall/winner_wall_archive'">Archive</button> 
                    </div>
                 </div>   
            </div>     
        </div>
    
    <div class="row">
        <div class="col-12 mt-3">
            <div class="card border-top card-body table-responsive"> 
                <table id="example" class="table-bordered display nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>Sr. No.</th>
                            <th>Name of Competition</th>
                            <th>Date of Competion</th>
                            <th>Title</th>
                            <th>Created on</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php  foreach($winnerwall as $key => $value){ ?>
                        <tr>
                            <td><?= $key+1;?></td>
                            <td><?= $value['title'];?></td>
                            <td><?= date("d-m-Y", strtotime($value['quiz_date']));?></td>
                            <td><?= $value['wall_title'];?></td>
                            <td><?= date("d-m-Y h:i:s", strtotime($value['created_on']));?></td>
                            <td class="d-flex border-bottom-0">
                                <?php $id= encryptids("E", $value['id'] )?>
                                <a href="winner_wall_view/<?= $id;?>" class="btn btn-primary btn-sm mr-2" title="View">View</a>
                                <a href="winner_wall_edit/<?= $id;?>" class="btn btn-info btn-sm mr-2" title="View">Edit</a>
                                

                                
                                <?php if ($value['status']==5) {?>
                                    <button onclick="updateWinnerWall('<?= $value['id']?>',6);" data-id='<?php echo $value['id']; ?>' class="btn btn-warning btn-sm mr-2 delete_img">UnPublish</button> 
                                <?php }?>

                                <?php if ($value['status']!=5) {?>
                                    <button onclick="updateWinnerWall('<?= $value['id']?>',5);" data-id='<?php echo $value['id']; ?>' class="btn btn-info btn-sm mr-2 delete_img">Publish</button> 

                                    <button onclick="updateWinnerWall('<?= $value['id']?>',9);" data-id='<?php echo $value['id']; ?>' class="btn btn-secondary btn-sm mr-2 delete_img">Archives</button>

                                    <button onclick="deleteWinnerWall('<?= $value['id']?>','<?= $value['quiz_id']?>');" data-id='<?php echo $value['id']; ?>' class="btn btn-danger btn-sm mr-2 delete_img">Delete</button> 
                                <?php }?>

                            </td> 
                        </tr>
                    <?php } ?>
                    </tbody>
                     
                </table>
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

    
</div>
<!-- /.container-fluid -->
<div class="col-md-12 submit_btn p-3">
    <a class="btn btn-primary btn-sm text-white" onclick="location.href='<?php echo base_url();?>admin/exchange_forum'">Back</a>
</div>
</div>
<!-- End of Main Content -->
<script type="text/javascript">

function updateWinnerWall(id,status) 
    {
        console.log(status)
        // if (status==5)  { $(".sms").text('Publish'); } 
        // if (status==6)  { $(".sms").text('UnPublish'); } 
        // if (status==9)  { $(".sms").text('Archives'); }
        // $('#updatemodel').modal('show');
        // $('.updatestatus').on('click', function() 
        // {
        //     $.ajax({
        //         type: 'POST',
        //         url: '<?php // echo base_url(); ?>winnerwall/updateWinnerWall',
        //         data: {
        //             id: id,
        //             status: status,
        //         },
        //         success: function(result) 
        //         {
        //             location.reload();
        //         },
        //         error: function(result) {
        //             alert("Error,Please try again.");
        //         }
        //     });
        // });
        if (status==5)  { var title1= 'Do you want to Publish?'; var buttonText = 'Publish' } 
        if (status==6)  { var title1= 'Do you want to Unublish?'; var buttonText = 'Unublish' } 
        if (status==9)  { var title1= 'Do you want to Archive?'; var buttonText = 'Archive' }
        Swal.fire({
                    title: title1,
                    showDenyButton: true,
                    showCancelButton: false,
                    confirmButtonText: buttonText,
                    denyButtonText: `Cancel`,
                    }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {                       
                        $.ajax({
                                type: 'POST',
                                url: '<?php echo base_url(); ?>winnerwall/updateWinnerWall',
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
    function deleteWinnerWall(id,quiz_id) 
    {
        // $('#delete').modal('show');
        // $('.deletecall').on('click', function() 
        // {
        //     $.ajax({
        //         type: 'POST',
        //         url: '<?php echo base_url(); ?>winnerwall/deleteWinnerWall',
        //         data: {
        //             id: id,
        //             quiz_id: quiz_id,
        //         },
        //         success: function(result) 
        //         {
        //             location.reload();
        //         },
        //         error: function(result) {
        //             alert("Error,Please try again.");
        //         }
        //     });
        // });

        Swal.fire({
                    title: 'Do you want to Delete?',
                    showDenyButton: true,
                    showCancelButton: false,
                    confirmButtonText: 'Delete',
                    denyButtonText: `Cancel`,
                    }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {                       
                        $.ajax({
                                type: 'POST',
                                url: '<?php echo base_url(); ?>winnerwall/deleteWinnerWall',
                                data: {
                                    id: id,
                                    quiz_id: quiz_id,
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