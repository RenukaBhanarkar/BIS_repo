    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Your Wall</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url().'Admin/dashboard';?>" >Sub Admin Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'admin/exchange_forum';?>" >Exchange Forum</a></li>
                <li class="breadcrumb-item active" aria-current="page">Your Wall</li>
                
                </ol>
            </nav>
        </div>
<div class="row" style="padding: 10px;">
	<div class="card p-3 shadow" style="width: -webkit-fill-available;">
		<nav>
			<div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
				<button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">New Requests</button>
				<button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Approved Requests</button>
				<button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Rejected Requests</button>
                <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#archive-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Archive Requests</button>
			</div>
		</nav>
		<div class="tab-content p-3 border bg-light" id="nav-tabContent" style="padding: 0px !important;">
			<div class="tab-pane fade active show" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
            <div class="col-12 mt-3">
                <div class="card border-top card-body table-responsive">
                    <table id="example_1" class="table-bordered display nowrap" style="width:100%">
                        <thead>
                        <tr>
                                <th>Sr. No.</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Title</th>
                                <th>Created On</th>
                                <th>Image</th>                               
                                <th>Status</th>
                                <!-- <th>Reason of Rejection</th>                                 -->
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if (!empty($created)) {
                                $i = 1;
                                foreach ($created as $list_yw) { ?>
                        <tr>
                              <td><?php echo $i++ ?></td>
                              <td><?php echo $list_yw['user_name']; ?></td>
                              <td><?php echo $list_yw['email']; ?></td>
                              <td><?php echo $list_yw['title']; ?></td>
                              <td><?php echo $list_yw['created_on']; ?></td>
                              <td><img src="<?php echo base_url(); ?>uploads/your_wall/<?php echo $list_yw['image'] ?>" data-toggle="modal" data-target="#viewImage" width="40px"></td>
                              <td><?php echo $list_yw['status_name']; ?></td>
                              
                              
                              <td class="" style="width:559px;">
                              
                              <?php if (encryptids("D", $_SESSION['admin_type']) == 2) {  ?>
                                <a href="<?php echo base_url(); ?>admin/your_wall_view/<?php echo encryptids("E", $list_yw['id'] )?>"><button class="btn btn-primary btn-sm mr-2" title="View">View</button></a>
                                <?php }else{ ?>                                    
                                    <a href="<?php echo base_url(); ?>admin/your_wall_view/<?php echo encryptids("E", $list_yw['id'] )?>"><button class="btn btn-primary btn-sm mr-2" title="View">View</button></a>    
                              <button onclick="deleteYourwall(' <?php echo $list_yw['id']; ?> ');" data-id='<?php echo $list_yw['id']; ?>' class="btn btn-danger btn-sm mr-2 delete_img">Delete</button>
                              <button onclick="approve('<?php echo $list_yw['id']; ?>')" data-id='<?php echo $list_yw['id']; ?>' class="btn btn-success btn-sm mr-2 approve">Approve</button>
                              <button onclick="reject('<?php echo $list_yw['id']; ?>')" class="btn btn-danger btn-sm mr-2 text-white">Reject</button>
                                                <button class="btn btn-secondary btn-sm archive" onclick="sendArchive('<?php echo $list_yw['id']; ?>')" data-id ='<?php echo $list_yw['id']; ?>'>Archive</button>
                                                <?php } ?>
                                 <!-- <a href="conversation_view" class="btn btn-primary btn-sm mr-2" title="View">View</a> -->
                                  <!-- <a href="conversation_edit" class="btn btn-info btn-sm mr-2" title="View">Sent for Approval</a>
                                  <a class="btn btn-success btn-sm mr-2" title="View">Publish</a>
                                  <a class="btn btn-warning btn-sm mr-2" title="View">Unpublish</a>
                                  <a class="btn btn-warning btn-sm mr-2" title="View" style="margin-top:13px;">Edit</a>
                                  <a class="btn btn-danger btn-sm mr-2" title="View" style="margin-top:13px;">Delete</a>
                                  <a class="btn btn-secondary btn-sm mr-2" title="View" style="margin-top:13px;">Archives</a> -->

                              </td>
                            </tr>
                            <?php }
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
			</div>
			<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
            <div class="col-12 mt-3">
                <div class="card border-top card-body table-responsive">
                    <table id="example_2" class="table-bordered display nowrap" style="width:100%">
                        <thead>
                        <tr>
                                <th>Sr. No.</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Title</th>
                                <th>Created On</th>
                                <th>Image</th>                               
                                <th>Status</th>
                                <!-- <th>Reason of Rejection</th>                                 -->
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if (!empty($approved)) {
                                $i = 1;
                                foreach ($approved as $list_yw) { ?>
                        <tr>
                            <td><?php echo $i++ ?></td>
                              <td><?php echo $list_yw['user_name']; ?></td>
                              <td><?php echo $list_yw['email']; ?></td>
                              <td><?php echo $list_yw['title']; ?></td>
                              <td><?php echo $list_yw['created_on']; ?></td>
                              <td><img src="<?php echo base_url(); ?>uploads/your_wall/<?php echo $list_yw['image'] ?>" data-toggle="modal" data-target="#viewImage" width="40px"></td>
                              <td><?php echo $list_yw['status_name']; ?></td>
                              <td class="" style="width:559px;">
                              <?php if (encryptids("D", $_SESSION['admin_type']) == 2) {  ?>
                                 <a href="<?php echo base_url(); ?>admin/your_wall_view/<?php echo encryptids("E", $list_yw['id'] )?>"><button class="btn btn-primary btn-sm mr-2" title="View">View</button></a>
                                 <!-- <button class="btn btn-success btn-sm mr-2" onclick="sendPublish('<?php echo $list_yw['id']; ?>')" data-id ='<?php echo $list_yw['id']; ?>' title="View">Publish</button> -->
                                 <?php }else{ ?>  
                                    <a href="<?php echo base_url(); ?>admin/your_wall_view/<?php echo encryptids("E", $list_yw['id'] )?>"><button class="btn btn-primary btn-sm mr-2" title="View">View</button></a>
                                 <?php if($list_yw['status']=="5"){ ?>
                                    <button class="btn btn-warning btn-sm mr-2 unpublish" onclick="sendUnPublish('<?php echo $list_yw['id']; ?>')" data-id ='<?php echo $list_yw['id']; ?>' title="View">UnPublish</button>
                                    <?php }else if($list_yw['status']=="6" || $list_yw['status']=="3"){ ?>
                                        <button class="btn btn-success btn-sm mr-2 publish" onclick="sendPublish('<?php echo $list_yw['id']; ?>')" data-id ='<?php echo $list_yw['id']; ?>' title="View">Publish</button>
                                        <button class="btn btn-secondary btn-sm archive" onclick="sendArchive('<?php echo $list_yw['id']; ?>')" data-id ='<?php echo $list_yw['id']; ?>'>Archive</button>
                                        <?php } ?>
                                        <?php } ?>
                                 <!-- <button class="btn btn-info btn-sm" onclick="sendUnArchive('<?php echo $list_yw['id']; ?>')" data-id ='<?php echo $list_yw['id']; ?>'>Restore</button>    -->
                                  <!-- <a href="conversation_edit" class="btn btn-info btn-sm mr-2" title="View">Sent for Approval</a>
                                  <a class="btn btn-success btn-sm mr-2" title="View">Publish</a>
                                  <a class="btn btn-warning btn-sm mr-2" title="View">Unpublish</a>
                                  <a class="btn btn-warning btn-sm mr-2" title="View" style="margin-top:13px;">Edit</a>
                                  <a class="btn btn-danger btn-sm mr-2" title="View" style="margin-top:13px;">Delete</a>
                                  <a class="btn btn-secondary btn-sm mr-2" title="View" style="margin-top:13px;">Archives</a> -->

                              </td>
                        </tr>
                            <?php }
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
			</div>
			<div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
            <div class="col-12 mt-3">
                <div class="card border-top card-body table-responsive">
                    <table id="example_3" class="table-bordered display nowrap" style="width:100%">
                        <thead>
                        <tr>
                        <th>Sr. No.</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Title</th>
                                <th>Created On</th>
                                <th>Image</th>                               
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if (!empty($rejected)) {
                                $i = 1;
                                foreach ($rejected as $list_yw) { ?>
                        <tr>
                                <td><?php echo $i++ ?></td>
                              <td><?php echo $list_yw['user_name']; ?></td>
                              <td><?php echo $list_yw['email']; ?></td>
                              <td><?php echo $list_yw['title']; ?></td>
                              <td><?php echo $list_yw['created_on']; ?></td>
                              <td><img src="<?php echo base_url(); ?>uploads/your_wall/<?php echo $list_yw['image'] ?>" data-toggle="modal" data-target="#viewImage" width="40px"></td>
                              <td><?php echo $list_yw['status_name']; ?></td>
                             
                              <td style="width:559px;">
                              <a href="<?php echo base_url(); ?>admin/your_wall_view/<?php echo encryptids("E", $list_yw['id'] )?>"><button class="btn btn-primary btn-sm mr-2" title="View">View</button></a>
                              <?php if (encryptids("D", $_SESSION['admin_type']) == 3) {  ?>
                              <button onclick="deleteYourwall(' <?php echo $list_yw['id']; ?> ');" data-id='<?php echo $list_yw['id']; ?>' class="btn btn-danger btn-sm mr-2 delete_img">Delete</button>
                              <button class="btn btn-secondary btn-sm " onclick="sendArchive('<?php echo $list_yw['id']; ?>')" data-id ='<?php echo $list_yw['id']; ?>'>Archive</button>
                              <?php } ?>
                                 <!-- <a href="conversation_view" class="btn btn-primary btn-sm mr-2" title="View">View</a>
                                  <a href="conversation_edit" class="btn btn-info btn-sm mr-2" title="View">Sent for Approval</a>
                                  <a class="btn btn-success btn-sm mr-2" title="View">Publish</a>
                                  <a class="btn btn-warning btn-sm mr-2" title="View">Unpublish</a>
                                  <a class="btn btn-warning btn-sm mr-2" title="View" style="margin-top:13px;">Edit</a>
                                  <a class="btn btn-danger btn-sm mr-2" title="View" style="margin-top:13px;">Delete</a>
                                  <a class="btn btn-secondary btn-sm mr-2" title="View" style="margin-top:13px;">Archives</a> -->

                              </td>
                            </tr>
                                    <?php } } ?>
                        </tbody>
                    </table>
                </div>
            </div>
			</div>
            <div class="tab-pane fade" id="archive-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
            <div class="col-12 mt-3">
                <div class="card border-top card-body table-responsive">
                    <table id="example_4" class="table-bordered display nowrap" style="width:100%">
                        <thead>
                        <tr>
                        <th>Sr. No.</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Title</th>
                                <th>Created On</th>
                                <th>Image</th>                               
                                <th>Status</th>                                
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if (!empty($archive)) {
                                $i = 1;
                                foreach ($archive as $list_yw) { ?>
                        <tr>
                        <td><?php echo $i++ ?></td>
                              <td><?php echo $list_yw['user_name']; ?></td>
                              <td><?php echo $list_yw['email']; ?></td>
                              <td><?php echo $list_yw['title']; ?></td>
                              <td><?php echo $list_yw['created_on']; ?></td>
                              <td><img src="<?php echo base_url(); ?>uploads/your_wall/<?php echo $list_yw['image'] ?>" data-toggle="modal" data-target="#viewImage" width="40px"></td>
                              <td><?php echo $list_yw['status_name']; ?></td>                              
                              <td class="" style="width:559px;">
                              <a href="<?php echo base_url(); ?>admin/your_wall_view/<?php echo encryptids("E", $list_yw['id'] )?>"><button class="btn btn-primary btn-sm mr-2" title="View">View</button></a>
                              <?php if (encryptids("D", $_SESSION['admin_type']) == 3) {  ?>
                              <button class="btn btn-info btn-sm restore" onclick="sendUnArchive('<?php echo $list_yw['id']; ?>')" data-id ='<?php echo $list_yw['id']; ?>'>Restore</button>   
                              <?php } ?>
                                 <!-- <a href="conversation_view" class="btn btn-primary btn-sm mr-2" title="View">View</a>
                                  <a href="conversation_edit" class="btn btn-info btn-sm mr-2" title="View">Sent for Approval</a>
                                  <a class="btn btn-success btn-sm mr-2" title="View">Publish</a>
                                  <a class="btn btn-warning btn-sm mr-2" title="View">Unpublish</a>
                                  <a class="btn btn-warning btn-sm mr-2" title="View" style="margin-top:13px;">Edit</a>
                                  <a class="btn btn-danger btn-sm mr-2" title="View" style="margin-top:13px;">Delete</a>
                                  <a class="btn btn-secondary btn-sm mr-2" title="View" style="margin-top:13px;">Archives</a> -->

                              </td>
                            </tr>
                            <?php } } ?>
                        </tbody>
                    </table>
                </div>
            </div>
			</div>
		</div>
	</div>
</div>
        <!-- Content Row -->
        <div class="col-md-12 submit_btn p-3">
        <a class="btn btn-primary btn-sm text-white" onclick="location.href='<?php echo base_url();?>admin/exchange_forum'">Back</a>
    </div>
       
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
                <button type="button" class="btn btn-primary abcd" data-bs-dismiss="modal">Delete</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="publish" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Publish Activity</h5>
                    <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to Publish activity?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary publish" data-bs-dismiss="modal">Publish</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="unpublish" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Unpublish Activity</h5>
                    <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to Unpublish activity?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary unpublish" data-bs-dismiss="modal">Unpublish</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="archive" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Archive Activity</h5>
                    <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to Archive ?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancle</button>
                    <button type="button" class="btn btn-primary archive" data-bs-dismiss="modal">Archive</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="approve" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Approve Activity</h5>
                    <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to Approve ?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancle</button>
                    <button type="button" class="btn btn-success approve" data-bs-dismiss="modal">Approve</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="restore" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Unarchive </h5>
                    <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to Restore ?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancle</button>
                    <button type="button" class="btn btn-primary restore" data-bs-dismiss="modal">Restore</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="rejectModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fs-5" id="exampleModalLabel">Reject</h5>
                    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                    <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo base_url(); ?>admin/reject_yourwall"  method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Reason of Rejection<sup class="text-danger">*</sup></label>
                            <!-- <input type="text" class="form-control" id="reseon" name="reason" required> -->
                            <textarea class="form-control" id="reseon" name="reason" required></textarea>
                            <input type="hidden" id="id2" name="id">
                            <span id="err_title" class="text-danger"></span>
                        </div>
                       

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger" >Reject</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    
    
    
    <!-- Modal -->
<script>
 
$(document).ready(function () {
    $('#example_1').DataTable({
        // scrollX: true,
    });
});
$(document).ready(function () {
    $('#example_2').DataTable({
        // scrollX: true,
    });
});
$(document).ready(function () {
    $('#example_3').DataTable({
        // scrollX: true,
    });
});
$(document).ready(function () {
    $('#example_4').DataTable({
        // scrollX: true,
    });
});
</script>   
<script>
    // $(document).ready(function(){
    //     $('.delete_img').on('click',function(){
    //         $('#delete').modal('show');
    //     })
    // })
    function reject(que_id){
            $('#rejectModal1').modal('show');
            $('#id2').val(que_id);
        }

    $('#example_1').on('click','.delete_img',function(){            
        var id=$(this).attr('data-id'); 

        Swal.fire({
                    title: 'Do you want to Delete?',
                    showDenyButton: true,
                    showCancelButton: false,
                    confirmButtonText: 'Delete',
                    denyButtonText: `Cancel`,
                    }).then((result) => {                   
                    if (result.isConfirmed) {
                        $.ajax({
                             type: 'POST',
                            url: '<?php echo base_url(); ?>admin/deletYourwall/',
                            data: {
                                que_id: id,
                            },
                            success: function(result) {
                                Swal.fire("Record Deleted Successfully.");
                                location.reload();
                            },
                            error: function(result) {
                                alert("Error,Please try again.");
                            }
                        });
                        Swal.fire('Saved!', '', 'success')                                
                    } else if (result.isDenied) {
                        // Swal.fire('Changes are not saved', '', 'info')
                    }
                    })

    });

    // function deleteYourwall(que_id) {
    //     // var c = confirm("Are you sure to delete this survey details? ");
    //     // $('#delete').modal('show');
    //     // $('.abcd').on('click', function() {

    //     //     $.ajax({
    //     //         type: 'POST',
    //     //         url: '<?php echo base_url(); ?>admin/deletYourwall',
    //     //         data: {
    //     //             que_id: que_id,
    //     //         },
    //     //         success: function(result) {
    //     //             location.reload();
    //     //         },
    //     //         error: function(result) {
    //     //             alert("Error,Please try again.");
    //     //         }
    //     //     });
    //     // });

        

    //     Swal.fire({
    //                 title: 'Do you want to Delete?',
    //                 showDenyButton: true,
    //                 showCancelButton: false,
    //                 confirmButtonText: 'Delete',
    //                 denyButtonText: `Cancel`,
    //                 }).then((result) => {
    //                 /* Read more about isConfirmed, isDenied below */
    //                 if (result.isConfirmed) {                               

    //                     $.ajax({
    //                          type: 'POST',
    //                         url: '<?php echo base_url(); ?>admin/deletYourwall/',
    //                         data: {
    //                             que_id: que_id,
    //                         },
    //                         success: function(result) {
    //                             Swal.fire("Record Deleted Successfully.");
    //                             location.reload();
    //                         },
    //                         error: function(result) {
    //                             alert("Error,Please try again.");
    //                         }
    //                     });
    //                     Swal.fire('Saved!', '', 'success')                                
    //                 } else if (result.isDenied) {
    //                     // Swal.fire('Changes are not saved', '', 'info')
    //                 }
    //                 })
    // }

    $('#example_2').on('click','.publish',function(){            
        var id=$(this).attr('data-id'); 

        Swal.fire({
                    title: 'Are you sure you want to Publish ?',
                    showDenyButton: true,
                    showCancelButton: false,
                    confirmButtonText: 'Publish',
                    denyButtonText: `Cancel`,
                    }).then((result) => {                   
                    if (result.isConfirmed) {
                        $.ajax({
                             type: 'POST',
                            url: '<?php echo base_url(); ?>admin/yourwallPublish/',
                            data: {
                                que_id: id,
                            },
                            success: function(result) {
                                Swal.fire("Record Published Successfully.");
                                location.reload();
                            },
                            error: function(result) {
                                alert("Error,Please try again.");
                            }
                        });
                        Swal.fire('Saved!', '', 'success')                                
                    } else if (result.isDenied) {
                        // Swal.fire('Changes are not saved', '', 'info')
                    }
                    })

    });


    $('#example_2').on('click','.unpublish',function(){            
        var id=$(this).attr('data-id'); 

        Swal.fire({
                    title: 'Are you sure you want to Unublish ?',
                    showDenyButton: true,
                    showCancelButton: false,
                    confirmButtonText: 'Unublish',
                    denyButtonText: `Cancel`,
                    }).then((result) => {                   
                    if (result.isConfirmed) {
                        $.ajax({
                             type: 'POST',
                            url: '<?php echo base_url(); ?>admin/yourwallUnpublish/',
                            data: {
                                que_id: id,
                            },
                            success: function(result) {
                                Swal.fire("Record Unublished Successfully.");
                                location.reload();
                            },
                            error: function(result) {
                                alert("Error,Please try again.");
                            }
                        });
                        Swal.fire('Saved!', '', 'success')                                
                    } else if (result.isDenied) {
                        // Swal.fire('Changes are not saved', '', 'info')
                    }
                    })

    });
    

    // function sendPublish(que_id) {
    //         $('#publish').modal('show');
    //         $('.publish').on('click', function() {
    //         // var c = confirm("Are you sure to Publish this survey details? ");
    //         // if (c == true) {
    //             // const $loader = $('.igr-ajax-loader');
    //             //$loader.show();
    //             $.ajax({
    //                 type: 'POST',
    //                 url: '<?php echo base_url(); ?>admin/yourwallPublish',
    //                 data: {
    //                     que_id: que_id,
    //                 },
    //                 success: function(result) {
    //                     // $('#row' + que_id).css({
    //                     //     'display': 'none'
    //                     // });
    //                     // alert('success' 'refresh');
    //                     location.reload();
    //                 },
    //                 error: function(result) {
    //                     alert("Error,Please try again.");
    //                 }
    //             });

    //         });
    //     }

        // function sendUnPublish(que_id) {
        //     // var c = confirm("Are you sure to Unpublish this survey details? ");
        //     // if (c == true) {            
        //         $('#unpublish').modal('show');
        //         $('.unpublish').on('click', function() {   
        //         $.ajax({
        //             type: 'POST',
        //             url: '<?php echo base_url(); ?>admin/yourwallUnpublish',
        //             data: {
        //                 que_id: que_id,
        //             },
        //             success: function(result) {                       
        //                 location.reload();
        //             },
        //             error: function(result) {
        //                 alert("Error,Please try again.");
        //             }
        //         });

        //     })
        // }

        $('#example_4').on('click','.restore',function(){            
        var id=$(this).attr('data-id'); 

        Swal.fire({
                    title: 'Are you sure you want to Restore ?',
                    showDenyButton: true,
                    showCancelButton: false,
                    confirmButtonText: 'Restore',
                    denyButtonText: `Cancel`,
                    }).then((result) => {                   
                    if (result.isConfirmed) {
                        $.ajax({
                             type: 'POST',
                            url: '<?php echo base_url(); ?>admin/restore_yourwall/',
                            data: {
                                que_id: id,
                            },
                            success: function(result) {
                                Swal.fire("Record Restored Successfully.");
                                location.reload();
                            },
                            error: function(result) {
                                alert("Error,Please try again.");
                            }
                        });
                        Swal.fire('Saved!', '', 'success')                                
                    } else if (result.isDenied) {
                        // Swal.fire('Changes are not saved', '', 'info')
                    }
                    })

    });

        // function sendUnArchive(que_id) {
        //     // var c = confirm("Are you sure to Unpublish By The Mentor details? ");
        //     // if (c == true) {     
        //         $('#restore').modal('show');
        //         $('.restore').on('click', function() {          
        //         $.ajax({
        //             type: 'POST',
        //             url: '<?php echo base_url(); ?>admin/restore_yourwall',
        //             data: {
        //                 que_id: que_id,
        //             },
        //             success: function(result) { 
        //                 console.log(result);                      
        //                 location.reload();
        //             },
        //             error: function(result) {
        //                 alert("Error,Please try again.");
        //             }
        //         });

        //     });
        // }

    // function approve(que_id){            
    //             $('#approve').modal('show');
    //             $('.approve').on('click', function() {                
    //             $.ajax({
    //                 type: 'POST',
    //                 url: '<?php echo base_url(); ?>admin/approve_yourwall',
    //                 data: {
    //                     que_id: que_id,
    //                 },
    //                 success: function(result) {
    //                     location.reload();
    //                 },
    //                 error: function(result) {
    //                     alert("Error,Please try again.");
    //                 }
    //             });
    //         })
    //     }
    
        $('#example_1').on('click','.approve',function(){            
        var id=$(this).attr('data-id'); 

        Swal.fire({
                    title: 'Are you sure you want to Approve ?',
                    showDenyButton: true,
                    showCancelButton: false,
                    confirmButtonText: 'Approve',
                    denyButtonText: `Cancel`,
                    }).then((result) => {                   
                    if (result.isConfirmed) {
                        $.ajax({
                             type: 'POST',
                            url: '<?php echo base_url(); ?>admin/approve_yourwall/',
                            data: {
                                que_id: id,
                            },
                            success: function(result) {
                                Swal.fire("Record Approved Successfully.");
                                location.reload();
                            },
                            error: function(result) {
                                alert("Error,Please try again.");
                            }
                        });
                        Swal.fire('Saved!', '', 'success')                                
                    } else if (result.isDenied) {
                        // Swal.fire('Changes are not saved', '', 'info')
                    }
                    })

    });

    // function sendArchive(que_id) {
    //         // var c = confirm("Are you sure to Publish By The Mentor details? ");
    //         // if (c == true) {
    //             // const $loader = $('.igr-ajax-loader');
    //             //$loader.show();
    //             $('#archive').modal('show');
    //             $('.archive').on('click', function() {
    //             $.ajax({
    //                 type: 'POST',
    //                 url: '<?php echo base_url(); ?>admin/archive_yourwall',
    //                 data: {
    //                     que_id: que_id,
    //                 },
    //                 success: function(result) {
    //                     // $('#row' + que_id).css({
    //                     //     'display': 'none'
    //                     // });
    //                     // alert('success' 'refresh');
    //                     location.reload();
    //                 },
    //                 error: function(result) {
    //                     alert("Error,Please try again.");
    //                 }
    //             });

    //         });
    //     }


        $('#example_2').on('click','.archive',function(){            
        var id=$(this).attr('data-id'); 

        Swal.fire({
                    title: 'Are you sure you want to Archive ?',
                    showDenyButton: true,
                    showCancelButton: false,
                    confirmButtonText: 'Archive',
                    denyButtonText: `Cancel`,
                    }).then((result) => {                   
                    if (result.isConfirmed) {
                        $.ajax({
                             type: 'POST',
                            url: '<?php echo base_url(); ?>admin/archive_yourwall/',
                            data: {
                                que_id: id,
                            },
                            success: function(result) {
                                Swal.fire("Record Archived Successfully.");
                                location.reload();
                            },
                            error: function(result) {
                                alert("Error,Please try again.");
                            }
                        });
                        Swal.fire('Saved!', '', 'success')                                
                    } else if (result.isDenied) {
                        // Swal.fire('Changes are not saved', '', 'info')
                    }
                    })

    });

    $('#example_1').on('click','.archive',function(){            
        var id=$(this).attr('data-id'); 

        Swal.fire({
                    title: 'Are you sure you want to Archive ?',
                    showDenyButton: true,
                    showCancelButton: false,
                    confirmButtonText: 'Archive',
                    denyButtonText: `Cancel`,
                    }).then((result) => {                   
                    if (result.isConfirmed) {
                        $.ajax({
                             type: 'POST',
                            url: '<?php echo base_url(); ?>admin/archive_yourwall/',
                            data: {
                                que_id: id,
                            },
                            success: function(result) {
                                Swal.fire("Record Archived Successfully.");
                                location.reload();
                            },
                            error: function(result) {
                                alert("Error,Please try again.");
                            }
                        });
                        Swal.fire('Saved!', '', 'success')                                
                    } else if (result.isDenied) {
                        // Swal.fire('Changes are not saved', '', 'info')
                    }
                    })

    });



</script>                                 