<style>
    table.dataTable.nowrap th, table.dataTable.nowrap td {
    white-space: normal;
}
</style>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">By The Mentors</h1>
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url().'Admin/Dashboard'; ?>">Home</a></li>
                <li class="breadcrumb-item " aria-current="page"><a href="<?php echo base_url().'admin/exchange_forum'; ?>">Exchange forum</a></li>
                <li class="breadcrumb-item " aria-current="page"><a href="<?php echo base_url().'admin/byTheMentors/'; ?>">By The Mentors</a></li>
            </ol>
        </nav>
    </div>
    <!-- Content Row -->
   
        <div class="row" style="padding:10px;">
        <div class="card p-3 shadow" style="width: -webkit-fill-available;">
                <nav>
                    <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                        <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">New Requests</button>
                        <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Approve Requests</button>
                        <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Rejected Requests</button>
                        <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-archive" type="button" role="tab" aria-controls="nav-archive" aria-selected="false">Archive Requests</button>
                    </div>
                </nav>
            <div class="tab-content p-3 border bg-light" id="nav-tabContent">
              <div class="tab-pane fade active show" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                <div class="col-12 mt-3">
                   <div class="card border-top card-body table-responsive">
                    <table id="example5" class="table dataTable table-bordered display now" style="width:100%">
                        <thead>
                            <tr>
                                <th>Sr. No.</th>
                                <th>Name</th> 
                                <th>Email</th>                              
                                <th>Title</th>
                                <th>Created On</th>
                                <th>Image</th>
                                <th>Document</th>                                
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($created)) {
                                $i = 1;
                                foreach ($created as $list_btm1) { ?>

                                    <tr>
                                        <td><?php echo $i++ ?></td> 
                                        <td><?php echo $list_btm1['user_name']; ?></td>  
                                        <td><?php echo $list_btm1['email']; ?></td>                                     
                                        <td><?php echo $list_btm1['title']; ?></td>                                        
                                        <td><?php echo $list_btm1['created_on']; ?></td>                                        
                                        <td><?php if ($list_btm1['image']) { ?>
                                                <img src="<?php echo base_url(); ?><?php echo $list_btm1['image'] ?>" data-toggle="modal" data-target="#viewImage" width="40px">
                                            <?php } else {
                                                echo "No Uploaded";
                                            } ?>
                                        </td>
                                        <td style="text-align: center;"><?php if(empty($list_btm1['document'])){ echo "-"; }else{?>
                                            <a href="<?php echo base_url().'uploads/by_the_mentors/doc/'.$list_btm1['document']; ?>" target="_blank"><img  src="<?php echo base_url().'uploads/pdf.png'; ?>" width="25px"/></a>
                                            <?php } ?>
                                        </td>
                                        <td><?php echo $list_btm1['status_name']; ?> </td>

                                        <td class="d-flex border-bottom-0">
                                            <!-- <button onClick="" class="btn btn-info btn-sm mr-2 text-white" data-toggle="modal"
                                        data-target="#editform"><i class="fa fa-edit" aria-hidden="true"></i></button> -->
                                        <a href="<?php echo base_url(); ?>admin/view_btm/<?php echo $list_btm1['id'] ?>"><button class="btn btn-info btn-sm mr-2">View</button></a>
                                        <?php if (encryptids("D", $_SESSION['admin_type']) == 3) {  ?>
                                            <?php if($list_btm1['status'] == '1'){ ?>
                                                <button onclick="deleteByTheMentor(' <?php echo $list_btm1['id']; ?> ');" data-id='<?php echo $list_btm1['id']; ?>' class="btn btn-danger btn-sm mr-2 delete_img">Delete</button>
                                                <!-- <button class="btn btn-primary btn-sm mr-2" onclick="sendPublish('<?php echo $list_btm1['id']; ?>')" data-id ='<?php echo $list_btm1['id']; ?>'>Publish</button> -->
                                                <button onclick="approve('<?php echo $list_btm1['id']; ?>')" class="btn btn-success btn-sm mr-2 text-white">Approve</button>
                                                <!-- <button class="btn btn-primary btn-sm" onclick="sendReject('<?php echo $list_btm1['id']; ?>')" data-id ='<?php echo $list_btm1['id']; ?>'>Reject</button> -->
                                                <button onclick="reject('<?php echo $list_btm1['id']; ?>')" class="btn btn-danger btn-sm mr-2 text-white">Reject</button>
                                                <button class="btn btn-primary btn-sm ml-2" onclick="sendArchive('<?php echo $list_btm1['id']; ?>')" data-id ='<?php echo $list_btm['id']; ?>'>Archive</button>
                                          
                                                <!-- <button class="btn btn-primary btn-sm" onclick="sendUnPublish('<?php echo $list_btm1['id']; ?>')" data-id ='<?php echo $list_btm1['id']; ?>'>UnPublish</button> -->
                                         <?php } ?>
                                        <?php } ?>
                                            <!-- Modal -->
                                        </td>   
                                    </tr>
                            <?php }
                            } ?>

                        </tbody>
                    </table>
                </div>
            </div>
            </div>
            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-home-tab">
                <div class="col-12 mt-3">
                   <div class="card border-top card-body table-responsive">
                    <table id="example1" class="table-bordered display nowrap" style="width:100%;" >
                        <thead>
                            <tr>
                                <th>Sr. No.</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Title</th>
                                <th>Created On</th>
                                <th>Image</th>
                                <th>Document</th>                                
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($approved)) {
                                $i = 1;
                                foreach ($approved as $list_btm) { ?> 

                                    <tr>
                                        <td><?php echo $i++ ?></td>
                                        <td><?php echo $list_btm['user_name']; ?></td>
                                        <td><?php echo $list_btm['email']; ?></td>        
                                        <td><?php echo $list_btm['title']; ?></td>                                        
                                        <td><?php echo $list_btm['created_on']; ?></td>                                        
                                        <td><?php if ($list_btm['image']) { ?>
                                                <img src="<?php echo base_url(); ?><?php echo $list_btm['image'] ?>" data-toggle="modal" data-target="#viewImage" width="40px">
                                            <?php } else {
                                                echo "No Uploaded";
                                            } ?>
                                        </td>
                                        <td style="text-align: center;"><a href="<?php echo base_url().'uploads/by_the_mentors/doc/'.$list_btm['document']; ?>" target="_blank"><img  src="<?php echo base_url().'uploads/pdf.png'; ?>" width="25px"/></a></td>
                                        <td><?php echo $list_btm['status_name']; ?> </td>

                                        <td class="d-flex border-bottom-0">
                                            <!-- <button onClick="" class="btn btn-info btn-sm mr-2 text-white" data-toggle="modal"
                                        data-target="#editform"><i class="fa fa-edit" aria-hidden="true"></i></button> -->
                                        <a href="<?php echo base_url(); ?>admin/view_btm/<?php echo $list_btm['id'] ?>"><button class="btn btn-info btn-sm mr-2">View</button></a>
                                        <?php if (encryptids("D", $_SESSION['admin_type']) == 3) {  ?>
                                            <?php if(!($list_btm['status_name'] == 'Published')){ ?>
                                                <!-- <button onclick="deleteByTheMentor(' <?php echo $list_btm['id']; ?> ');" data-id='<?php echo $list_btm['id']; ?>' class="btn btn-danger btn-sm mr-2 delete_img">Delete</button> -->
                                                <button class="btn btn-success btn-sm" onclick="sendPublish('<?php echo $list_btm['id']; ?>')" data-id ='<?php echo $list_btm['id']; ?>'>Publish</button>
                                                <button class="btn btn-primary btn-sm ml-2" onclick="sendArchive('<?php echo $list_btm['id']; ?>')" data-id ='<?php echo $list_btm['id']; ?>'>Archive</button>
                                            <?php }else if($list_btm['status_name'] == 'Published'){ ?>
                                                <button class="btn btn-primary btn-sm" onclick="sendUnPublish('<?php echo $list_btm['id']; ?>')" data-id ='<?php echo $list_btm['id']; ?>'>UnPublish</button>
                                         <?php } }?>
                                        
                                            <!-- Modal -->
                                        </td>      
                                    </tr>
                            <?php }
                            } ?>

                        </tbody>
                    </table>
                </div>
            </div>
            </div>
            <div class="tab-pane fade show" id="nav-contact" role="tabpanel" aria-labelledby="nav-home-tab">
                <div class="col-12 mt-3">
                   <div class="card border-top card-body table-responsive">
                    <table id="example2" class="table table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Sr. No.</th>
                                <th>Title</th>
                                <th>Created On</th>
                                <th>Image</th>
                                <th>Document</th>                                
                                <th>Status</th>
                                <th>Reject Reason</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($rejected)) {
                                $i = 1;
                                foreach ($rejected as $list_btm) { ?>

                                    <tr>
                                        <td><?php echo $i++ ?></td>
                                        <td><?php echo $list_btm['title']; ?></td>                                        
                                        <td><?php echo $list_btm['created_on']; ?></td>                                        
                                        <td><?php if ($list_btm['image']) { ?>
                                                <img src="<?php echo base_url(); ?><?php echo $list_btm['image'] ?>" data-toggle="modal" data-target="#viewImage" width="40px">
                                            <?php } else {
                                                echo "No Uploaded";
                                            } ?>
                                        </td>
                                        <td style="text-align: center;"><a href="<?php echo base_url().'uploads/by_the_mentors/doc/'.$list_btm['document']; ?>" target="_blank"><img  src="<?php echo base_url().'uploads/pdf.png'; ?>" width="25px"/></a></td>
                                        <td><?php echo $list_btm['status_name']; ?> </td>
                                        <td><?php echo $list_btm['reject_reason']; ?></td>

                                        <td class="d-flex border-bottom-0">
                                            <!-- <button onClick="" class="btn btn-info btn-sm mr-2 text-white" data-toggle="modal"
                                        data-target="#editform"><i class="fa fa-edit" aria-hidden="true"></i></button> -->
                                        <a href="<?php echo base_url(); ?>admin/view_btm/<?php echo $list_btm['id'] ?>"><button class="btn btn-info btn-sm mr-2">View</button></a>
                                        <?php if (encryptids("D", $_SESSION['admin_type']) == 3) {  ?>
                                           
                                                <button onclick="deleteByTheMentor(' <?php echo $list_btm['id']; ?> ');" data-id='<?php echo $list_btm['id']; ?>' class="btn btn-danger btn-sm mr-2 delete_img">Delete</button>
                                                <!-- <button class="btn btn-primary btn-sm" onclick="sendPublish('<?php echo $list_btm['id']; ?>')" data-id ='<?php echo $list_btm['id']; ?>'>Publish</button> -->
                                                <button class="btn btn-primary btn-sm ml-2" onclick="sendArchive('<?php echo $list_btm['id']; ?>')" data-id ='<?php echo $list_btm['id']; ?>'>Archive</button>
                                          
                                                <!-- <button class="btn btn-primary btn-sm" onclick="sendUnPublish('<?php echo $list_btm['id']; ?>')" data-id ='<?php echo $list_btm['id']; ?>'>UnPublish</button> -->
                                        </td>   
                                 <?php } ?>
                                        
                                            <!-- Modal -->
                                            
                                    </tr>
                            <?php }
                            } ?>

                        </tbody>
                    </table>
                </div>
            </div>
            </div>
            <div class="tab-pane fade show" id="nav-archive" role="tabpanel" aria-labelledby="nav-archive-tab">
                <div class="col-12 mt-3">
                   <div class="card border-top card-body table-responsive">
                    <table id="example3" class="table table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Sr. No.</th>
                                <th>Title</th>
                                <th>Created On</th>
                                <th>Image</th>
                                <th>Document</th>                                
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($archive)) {
                                $i = 1;
                                foreach ($archive as $list_btm1) { ?>

                                    <tr>
                                        <td><?php echo $i++ ?></td>
                                        <td><?php echo $list_btm1['title']; ?></td>                                        
                                        <td><?php echo $list_btm1['created_on']; ?></td>                                        
                                        <td><?php if ($list_btm1['image']) { ?>
                                                <img src="<?php echo base_url(); ?><?php echo $list_btm1['image'] ?>" data-toggle="modal" data-target="#viewImage" width="40px">
                                            <?php } else {
                                                echo "No Uploaded";
                                            } ?>
                                        </td>
                                        <td style="text-align: center;"><?php if(empty($list_btm1['document'])){ echo "-"; }else{?>
                                            <a href="<?php echo base_url().'uploads/by_the_mentors/doc/'.$list_btm1['document']; ?>" target="_blank"><img  src="<?php echo base_url().'uploads/pdf.png'; ?>" width="25px"/></a>
                                            <?php } ?>
                                        </td>
                                        <td><?php echo $list_btm1['status_name']; ?> </td>

                                        <td class="d-flex border-bottom-0">
                                            <!-- <button onClick="" class="btn btn-info btn-sm mr-2 text-white" data-toggle="modal"
                                        data-target="#editform"><i class="fa fa-edit" aria-hidden="true"></i></button> -->
                                        <a href="<?php echo base_url(); ?>admin/view_btm/<?php echo $list_btm1['id'] ?>"><button class="btn btn-info btn-sm mr-2">View</button></a>
                                        <?php if (encryptids("D", $_SESSION['admin_type']) == 3) {  ?>
                                        <button class="btn btn-info btn-sm" onclick="sendUnArchive('<?php echo $list_btm1['id']; ?>')" data-id ='<?php echo $list_btm['id']; ?>'>Restore</button>                                        
                                            <!-- Modal -->
                                            <?php } ?>
                                        </td>
                                    </tr>
                            <?php }
                            } ?>

                        </tbody>
                    </table>
                </div>
            </div>
            </div>
          </div>
        </div>
        </div>
    <!-- </div> -->
    <!-- /.container-fluid -->
    <div class="col-md-12 submit_btn p-3">
                               <a class="btn btn-primary btn-sm text-white" onclick="location.href='<?php echo base_url().'admin/exchange_forum' ?>'">Back</a>
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
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancle</button>
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
                    <p>Are you sure you want to Publish ?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancle</button>
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
                    <p>Are you sure you want to Unpublish ?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancle</button>
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
                    <h5 class="modal-title" id="exampleModalLabel">Restore </h5>
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
                    <form action="<?php echo base_url(); ?>admin/rejectbtTheMentor"  method="post" enctype="multipart/form-data">
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
<!-- End of Main Content -->
<script>
    $(document).ready(function(){
        // $('.delete_img').on('click',function(){
        //     $('#delete').modal('show');
        // })
        $('#example1').DataTable({
            // scrollx:true,
           // responsive: true
        });
        $('#example2').DataTable({
            // scrollx:true,
          //  responsive: true
        });
        $('#example3').DataTable({
            // scrollx:true
        });
        $('#example5').DataTable({
            // scrollx:true
        });
        // $('#example').DataTable({
        //     scrollx:true
        // });
    })
    function reject(que_id){
            $('#rejectModal1').modal('show');
            $('#id2').val(que_id);
        }
    function deleteByTheMentor(que_id) {
        // var c = confirm("Are you sure to delete this survey details? ");
        $('#delete').modal('show');
        $('.abcd').on('click', function() {

            $.ajax({
                type: 'POST',
                url: '<?php echo base_url(); ?>admin/deleteByTheMentor',
                data: {
                    que_id: que_id,
                },
                success: function(result) {
                    location.reload();
                },
                error: function(result) {
                    alert("Error,Please try again.");
                }
            });
        });
    }
    function sendUnArchive(que_id) {
            // var c = confirm("Are you sure to Unpublish By The Mentor details? ");
            // if (c == true) {     
                $('#restore').modal('show');
                $('.restore').on('click', function() {          
                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url(); ?>admin/btm_unarchive',
                    data: {
                        que_id: que_id,
                    },
                    success: function(result) { 
                        console.log(result);                      
                        location.reload();
                    },
                    error: function(result) {
                        alert("Error,Please try again.");
                    }
                });

            });
        }

    function approve(que_id){
            // var c = confirm("Are you sure to Approve activity? ");
            // if (c == true) {
                $('#approve').modal('show');
                $('.approve').on('click', function() {
                // const $loader = $('.igr-ajax-loader');
                //$loader.show();
                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url(); ?>admin/approve_btm',
                    data: {
                        que_id: que_id,
                    },
                    success: function(result) {

                        location.reload();
                    },
                    error: function(result) {
                        alert("Error,Please try again.");
                    }
                });

            })
        }

    function sendArchive(que_id) {
            // var c = confirm("Are you sure to Publish By The Mentor details? ");
            // if (c == true) {
                // const $loader = $('.igr-ajax-loader');
                //$loader.show();
                $('#archive').modal('show');
                $('.archive').on('click', function() {
                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url(); ?>admin/btm_archive',
                    data: {
                        que_id: que_id,
                    },
                    success: function(result) {
                        // $('#row' + que_id).css({
                        //     'display': 'none'
                        // });
                        // alert('success' 'refresh');
                        location.reload();
                    },
                    error: function(result) {
                        alert("Error,Please try again.");
                    }
                });

            });
        }
        
        // function sendReject(que_id) {
        //     // var c = confirm("Are you sure to Publish By The Mentor details? ");
        //     // if (c == true) {
        //         // const $loader = $('.igr-ajax-loader');
        //         //$loader.show();
        //         // $('#rejectModal1').modal('show');
        //         $('.archive').on('click', function() {
        //         $.ajax({
        //             type: 'POST',
        //             url: '<?php echo base_url(); ?>admin/sendReject',
        //             data: {
        //                 que_id: que_id,
        //             },
        //             success: function(result) {
        //                 // $('#row' + que_id).css({
        //                 //     'display': 'none'
        //                 // });
        //                 // alert('success' 'refresh');
        //                 location.reload();
        //             },
        //             error: function(result) {
        //                 alert("Error,Please try again.");
        //             }
        //         });

        //     });
        // }

    function sendPublish(que_id) {
            // var c = confirm("Are you sure to Publish By The Mentor details? ");
            // if (c == true) {
                // const $loader = $('.igr-ajax-loader');
                //$loader.show();
                $('#publish').modal('show');
                $('.publish').on('click', function() {
                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url(); ?>admin/btm_publish',
                    data: {
                        que_id: que_id,
                    },
                    success: function(result) {
                        // $('#row' + que_id).css({
                        //     'display': 'none'
                        // });
                        // alert('success' 'refresh');
                        location.reload();
                    },
                    error: function(result) {
                        alert("Error,Please try again.");
                    }
                });

            });
        }
        function sendUnPublish(que_id) {
            // var c = confirm("Are you sure to Unpublish By The Mentor details? ");
            // if (c == true) {     
                $('#unpublish').modal('show');
                $('.unpublish').on('click', function() {          
                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url(); ?>admin/btm_unpublish',
                    data: {
                        que_id: que_id,
                    },
                    success: function(result) {                       
                        location.reload();
                    },
                    error: function(result) {
                        alert("Error,Please try again.");
                    }
                });

            });
        }
</script>