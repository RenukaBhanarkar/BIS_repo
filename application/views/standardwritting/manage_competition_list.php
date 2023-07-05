    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Manage Competition</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                <?php if (encryptids("D", $_SESSION['admin_type']) == 3) { ?>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'Admin/dashboard';?>" >Sub Admin Dashboard</a></li>
                <?php }else{ ?>
                    <li class="breadcrumb-item"><a href="<?php echo base_url().'Admin/dashboard';?>" >Admin Dashboard</a></li>
                <?php } ?>
                <!-- <li class="breadcrumb-item"><a href="<?php echo base_url().'Admin/dashboard';?>" >Sub Admin Dashboard</a></li> -->
                <li class="breadcrumb-item"><a href="<?php echo base_url().'admin/exchange_forum';?>" >Exchange Forum</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'quiz/organizing_quiz';?>" >Competition</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'Standardswritting/miscellaneous_dashboard';?>" >Miscellaneous Competition</a></li>
                <li class="breadcrumb-item active" aria-current="page">Manage Competition</li>
                
                </ol>
            </nav>
        </div>

        <div class="row">
                <div class="col-12">
                    <div class="card border-top card-body">
                        <div>
                            <!-- <a href="<?php echo base_url(); ?>standardswritting/create_competition_form" class="btn btn-primary btn-sm mr-2" title="View">Create New Competition</a> -->
                            <a href="<?php echo base_url(); ?>standardswritting/create_competition_archive" class="btn btn-primary btn-sm mr-2" title="View">Archived</a>
                        </div>
                    </div>
                </div>
        </div>

        <!-- Content Row -->
       <div class="row">
            <div class="col-12 mt-3">
                <div class="card border-top card-body ">
                    <table id="example" class="table-bordered table-responsive nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>Sr. No.</th>
                                <th>Competition ID</th>
                                <th>Name of Competition</th>
                                <th>Start Date</th>
                                <th>Start Time</th>
                                <th>End Date</th>
                                <th>End Time</th>
                                <th>Banner</th>
                                <th>Type of Competition</th>
                                <th>Available For</th>
                                <th>Level of Competition</th>
                                <th>Status</th>
                                <th>Reason of Rejection</th>
                                <!-- <th>Total Submission</th> -->
                                <!-- <th>Reason of Rejection</th> -->
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                           <!-- <tr>
                              <td>1</td>
                              <td>12345</td>
                              <td>Miscellaneous Competition</td>
                              <td>12/03/2023</td>
                              <td>12/03/2023</td>
                              <td><img src="#" alt="#" class="" width="10%"></td>
                              <td>Pending</td>
                              <td>Reason</td>
                              <td class="d-flex">
                                 <a href="<?php echo base_url(); ?>" class="btn btn-primary btn-sm mr-2" >View</a>
                                 <a href="<?php echo base_url(); ?>" class="btn btn-info btn-sm mr-2" >Edit</a>
                                 <a href="<?php echo base_url(); ?>" class="btn btn-danger btn-sm mr-2" >Delete</a>
                                 <a href="<?php echo base_url(); ?>" class="btn btn-primary btn-sm mr-2" >Archive</a>
                                 <a href="<?php echo base_url(); ?>" class="btn btn-info btn-sm mr-2" >Sent for Approval</a>
                                 <a href="<?php echo base_url(); ?>" class="btn btn-success btn-sm mr-2" >Publish</a>
                                 <a href="<?php echo base_url(); ?>" class="btn btn-warning btn-sm mr-2" >Unpublish</a>
                              </td>
                           </tr> -->
                           <?php if(!empty($competition)){ $i=1;
                            foreach($competition as $list){ ?>
                            <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $list['comp_id'];; ?></td>
                            <td><?php echo $list['competiton_name']; ?></td>
                            <td><?php echo $list['start_date']; ?></td>
                            <td><?php echo $list['start_time']; ?></td>
                            <td><?php echo $list['end_date']; ?></td>
                            <td><?php echo $list['end_time']; ?></td>
                            <td><img src="<?php echo base_url().$list['thumbnail']; ?>" alt="#" class="" width="100%"></td>
                            <td><?php echo $list['comp_type_name']; ?></td>
                            <td><?php echo $list['avai_for']; ?></td>
                            <td><?php echo $list['title']; ?></td>
                            <td><?php echo $list['status_name'];  ?></td>
                            <td><?php echo $list['reject_reason'];  ?></td>
                            <td>

                            <!-- <button href="<?php echo base_url(); ?>" class="btn btn-primary btn-sm mr-2" >View</button> -->
                                 <!-- <button data-id="<?php echo $list['id']; ?>" class="btn btn-info btn-sm mr-2 restore">Restore</button> -->
                                 <?php if (encryptids("D", $_SESSION['admin_type']) == 2) { ?>
                                    <a href="<?php echo base_url().'Standardswritting/view_competition/'.$list['comp_id']; ?>" class="btn btn-primary btn-sm mr-2">View</a>
                        <?php  if ($list['status'] == 2) { ?>
                            <a href="<?php echo base_url().'Standardswritting/view_competition/'.$list['comp_id'] ?>" class="btn btn-info btn-sm mr-2">Approve/ Reject</a>
                        <?php }
                        } ?>
                        <!-- <?php if (encryptids("D", $_SESSION['admin_type']) == 2) { ?>
                             
                        
                            <a href="<?php echo base_url().'Standardswritting/view_competition/'.$list['id']; ?>" class="btn btn-primary btn-sm mr-2">View</a>
                        <?php 
                        } ?> -->
                        <?php if (encryptids("D", $_SESSION['admin_type']) == 3) { ?>
                            <a href="<?php echo base_url().'Standardswritting/view_competition/'.$list['comp_id']; ?>" class="btn btn-primary btn-sm mr-2">View</a>
                          <?php  if($list['status']==5){ ?>
                            <button data-id="<?php echo $list['comp_id']; ?>" class="btn btn-warning btn-sm mr-2 unpublish" >Unpublish</button>
                          <?php  }else if(!(($list['status']==5) || ($list['status']==2) || ($list['status']==1))){ ?>
                              
                       

                                 <a href="<?php echo base_url().'standardswritting/create_competition_edit/'.$list['comp_id']; ?>" class="btn btn-info btn-sm mr-2" >Edit</a>
                                 <button data-id="<?php echo $list['comp_id']; ?>" img_name="<?php echo $list['thumbnail']; ?>" class="btn btn-danger btn-sm mr-2 delete" >Delete</button>
                                 <button data-id="<?php echo $list['comp_id']; ?>" class="btn btn-primary btn-sm mr-2 archive" >Archive</button>
                                 <?php if(!($list['status']==4)){  ?>
                                 <button data-id="<?php echo $list['comp_id']; ?>" class="btn btn-success btn-sm mr-2 publish" >Publish</button>
                                 <?php } ?>
                                 <?php   }else if($list['status']==1){ ?>
                                      
                                        <button data-id="<?php echo $list['comp_id']; ?>" class="btn btn-success btn-sm mr-2 send_for_approval" >Sent for approval</button>
                                        <button data-id="<?php echo $list['comp_id']; ?>" class="btn btn-primary btn-sm mr-2 archive" >Archive</button>
                                        <a href="<?php echo base_url().'standardswritting/create_competition_edit/'.$list['comp_id']; ?>" class="btn btn-info btn-sm mr-2" >Edit</a>
                                 <button data-id="<?php echo $list['comp_id']; ?>" img_name="<?php echo $list['thumbnail']; ?>" class="btn btn-danger btn-sm mr-2 delete" >Delete</button>
                                   
                                <?php }                            
                            ?>
                            </td>
                            </tr>
                            <?php  } $i++; } } ?>
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
 </body>
                                  <!-- Modal -->
                                    <div class="modal fade" id="archivesForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Archive</h5>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Are you sure you want to Archive?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                                    <button type="button" class="btn btn-primary" data-dismiss="modal" id="saveQueBank">Archive</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal -->
                                      <!-- Modal -->
                                      <div class="modal fade" id="createForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Create Form</h5>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Are you sure you want to Create?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                                    <button type="button" class="btn btn-primary" data-dismiss="modal" id="saveQueBank">Create</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal -->
                                      <!-- Modal -->
                                      <div class="modal fade" id="editForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Edit Form</h5>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Are you sure you want to Edit?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                                    <button type="button" class="btn btn-primary" data-dismiss="modal" id="saveQueBank">Edit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal -->
                                      <!-- Modal -->
                                      <div class="modal fade" id="deleteForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">delete</h5>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Are you sure you want to delete?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                                    <button type="button" class="btn btn-primary" data-dismiss="modal" id="saveQueBank">delete</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
 <script>
     $('#example').on('click','.archive', function(){
    id =$(this).attr('data-id');
    Swal.fire({
                title: 'Are you sure you want to Archive?',
                showDenyButton: true,
                showCancelButton: false,
                confirmButtonText: 'Archive',
                denyButtonText: `Cancel`,
                }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {                       
                    jQuery.ajax({
                                type: "POST",
                                url: '<?php echo base_url(); ?>Standardswritting/update_status',
                                // dataType: 'json',
                                data: {
                                "id": id,
                                "status": 9
                                },
                                success: function(res) {
                                if (res) {
                                    location.reload();
                                } else {
                                    alert("error");
                                }
                                },
                                error: function(xhr, status, error) {
                                console.log(error);
                                }
                            });
                                            
                } else if (result.isDenied) {
                    // Swal.fire('Changes are not saved', '', 'info')
                }
                })
});
$('#example').on('click','.publish', function(){
    id =$(this).attr('data-id');
    Swal.fire({
                title: 'Are you sure you want to Publish?',
                showDenyButton: true,
                showCancelButton: false,
                confirmButtonText: 'Publish',
                denyButtonText: `Cancel`,
                }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {                       
                    jQuery.ajax({
                                type: "POST",
                                url: '<?php echo base_url(); ?>Standardswritting/update_status',
                                // dataType: 'json',
                                data: {
                                "id": id,
                                "status": 5
                                },
                                success: function(res) {
                                if (res) {
                                    location.reload();
                                } else {
                                    alert("error");
                                }
                                },
                                error: function(xhr, status, error) {
                                console.log(error);
                                }
                            });
                                            
                } else if (result.isDenied) {
                    // Swal.fire('Changes are not saved', '', 'info')
                }
                })
});

$('#example').on('click','.unpublish', function(){
    id =$(this).attr('data-id');
    Swal.fire({
                title: 'Are you sure you want to Unpublish?',
                showDenyButton: true,
                showCancelButton: false,
                confirmButtonText: 'Unpublish',
                denyButtonText: `Cancel`,
                }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {                       
                    jQuery.ajax({
                                type: "POST",
                                url: '<?php echo base_url(); ?>Standardswritting/update_status',
                                // dataType: 'json',
                                data: {
                                "id": id,
                                "status": 6
                                },
                                success: function(res) {
                                if (res) {
                                    location.reload();
                                } else {
                                    alert("error");
                                }
                                },
                                error: function(xhr, status, error) {
                                console.log(error);
                                }
                            });
                                            
                } else if (result.isDenied) {
                    // Swal.fire('Changes are not saved', '', 'info')
                }
                })
});

$('#example').on('click','.send_for_approval', function(){
    id =$(this).attr('data-id');
    Swal.fire({
                title: 'Do you want to send this for approval?',
                showDenyButton: true,
                showCancelButton: false,
                confirmButtonText: 'Send for approval',
                denyButtonText: `Cancel`,
                }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {                       
                    jQuery.ajax({
                                type: "POST",
                                url: '<?php echo base_url(); ?>Standardswritting/update_status',
                                // dataType: 'json',
                                data: {
                                "id": id,
                                "status": 2
                                },
                                success: function(res) {
                                if (res) {
                                    location.reload();
                                } else {
                                    alert("error");
                                }
                                },
                                error: function(xhr, status, error) {
                                console.log(error);
                                }
                            });
                                            
                } else if (result.isDenied) {
                    // Swal.fire('Changes are not saved', '', 'info')
                }
                })
});
$('#example').on('click','.delete', function(){
    id =$(this).attr('data-id');
    img_name =$(this).attr('img_name');
    Swal.fire({
                title: 'Are you sure you want to Delete?',
                showDenyButton: true,
                showCancelButton: false,
                confirmButtonText: 'Delete',
                denyButtonText: `Close`,
                }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {                       
                    jQuery.ajax({
                                type: "POST",
                                url: '<?php echo base_url(); ?>Standardswritting/delete_comp',
                                 dataType: 'json',
                                data: {
                                "id": id,
                                "img_name":img_name
                               
                                },
                                success: function(res) {
                                if (res) {
                                    location.reload();
                                } else {
                                    alert("error");
                                }
                                },
                                error: function(xhr, status, error) {
                                console.log(error);
                                }
                            });
                                            
                } else if (result.isDenied) {
                    // Swal.fire('Changes are not saved', '', 'info')
                }
                })
});
 </script>                                   