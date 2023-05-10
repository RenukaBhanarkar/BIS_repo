    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Published Posts</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url().'Admin/dashboard';?>" >Sub Admin Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'admin/exchange_forum';?>" >Exchange Forum</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'Standardsmaking/join_the_classroom_dashboard';?>" >Join the Class Room</a></li>
                <li class="breadcrumb-item active" aria-current="page">Published Posts</li>
                
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
                                <th>Title</th>
                                <th>Type of Post</th>
                                <th>Created on</th>
                                <th>Likes</th>
                                <th>Views/Joined</th>
                                <th>Status</th>
                                <th>Reason of Rejection</th>
                                <th>Last Updated</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($liveSessionList as $key => $value) {?>

                                <tr>
                              <td><?= $key + 1;?></td>
                              <td><?= $value['title']?></td>
                              <td>
                                <?php 
                                if ($value['type_of_post']==1) {  $data='Text Upload'; }
                                if ($value['type_of_post']==2) { $data='Video Upload'; }
                                if ($value['type_of_post']==3) { $data='Live session link'; }
                                ?>

                                <?= $data?></td> 
                              <td><?= $value['created_on']?></td>

                              <td>567</td>
                              <td>45</td>
                              <td><?= $value['status_name']?></td>
                              <td><?= $value['reason']?></td>
                              <td><?= $value['updated_on']?></td>
                              <td class="" style="width:559px;">
                                 <?php $id= encryptids("E", $value['id'] )?>

                                <a href="live_session_view/<?= $id;?>" class="btn btn-primary btn-sm mr-2" title="View">View</a>
                                 <?php if (encryptids("D", $_SESSION['admin_type']) == 3) { ?>
                                    <button onclick="updateStatusLiveSession('<?= $value['id']?>',6);" data-id='<?php echo $value['id']; ?>' class="btn btn-warning btn-sm mr-2 delete_img">Unpublish</button>
                                <button onclick="updateStatusLiveSession('<?= $value['id']?>',9);" data-id='<?php echo $value['id']; ?>' class="btn btn-secondary btn-sm mr-2 delete_img">Archives</button> 
                                <?php }?>

                              </td>
                              
                               
                        </tr>
                                
                           <?php }?>
                            

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

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
    <!-- /.container-fluid -->

    </div>
<script type="text/javascript">
    function deleteLiveSession(id) 
    {
        $('#delete').modal('show');
        $('.deletecall').on('click', function() 
        {
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url(); ?>Standardsmaking/deleteLiveSession',
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

    function updateStatusLiveSession(id,status) 
    { 
        // if (status==2)  { $(".sms").text('Send For Approval'); }
        // if (status==5)  { $(".sms").text('Publish'); }
        // if (status==6)  { $(".sms").text('UnPublish'); }
        // if (status==9)  { $(".sms").text('Archives'); }
        // $('#updatemodel').modal('show');
        // $('.updatestatus').on('click', function() 
        // {
        //     $.ajax({
        //         type: 'POST',
        //         url: '<?php echo base_url(); ?>Standardsmaking/updateStatusLiveSession',
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

        if (status==2)  { var titletext= "Are you sure you want to Send For Approval ?"; var buttontext ="Send For Approval"; }
        if (status==5)  { var titletext= "Are you sure you want to Publish ?"; var buttontext ="Publish"; }
        if (status==6)  { var titletext= "Are you sure you want to UnPublish ?"; var buttontext ="UnPublish"; }
        if (status==9)  { var titletext= "Are you sure you want to Archives ?"; var buttontext ="Archives"; }
        Swal.fire({
                    title: titletext,
                    showDenyButton: true,
                    showCancelButton: false,
                    confirmButtonText: buttontext,
                    denyButtonText: `Cancel`,
                    }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {                       
                        $.ajax({
                                type: 'POST',
                                url: '<?php echo base_url(); ?>Standardsmaking/updateStatusLiveSession',
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
    <!-- End of Main Content -->
 </body>