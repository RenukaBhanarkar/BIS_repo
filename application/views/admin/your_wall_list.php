<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Your Wall</h1>
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>Admin/dashboard">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="<?php echo base_url(); ?>admin/exchange_forum">Exchange forum</a></li>
            </ol>
        </nav>
    </div>
    <!-- Content Row -->

    <div class="col-12">

        <?php
        if ($this->session->flashdata('MSG')) {
            echo $this->session->flashdata('MSG');
        }
        ?>
        <div class="row">
            <div class="col-12 mt-3">
                <div class="card border-top card-body">
                    <table id="example" class="table table-bordered display nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>Sr. No.</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Created Date</th>
                                <th>Title</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($yourwall)) {
                                $i = 1;
                                foreach ($yourwall as $list_yw) { ?>

                                    <tr>
                                        <td><?php echo $i++ ?></td>
                                        <td><?php echo $list_yw['name']; ?></td>
                                        <td><?php echo $list_yw['email_id']; ?></td>
                                        <td><?php echo $list_yw['created_on']; ?></td>
                                        <td><?php echo $list_yw['title']; ?></td>
                                        <td><?php if ($list_yw['image']) { ?>
                                                <img src="<?php echo base_url(); ?>uploads/your_wall/<?php echo $list_yw['image'] ?>" data-toggle="modal" data-target="#viewImage" width="40px">
                                            <?php } else {
                                                echo "No Uploaded";
                                            } ?>
                                        </td>
                                        <td><?php echo $list_yw['status_name']; ?> </td>

                                        <td class="d-flex border-bottom-0">
                                            <!-- <button onClick="" class="btn btn-info btn-sm mr-2 text-white" data-toggle="modal"
                                        data-target="#editform"><i class="fa fa-edit" aria-hidden="true"></i></button> -->
                                            <?php if(encryptids("D", $_SESSION['admin_type']) == 2){

                                            }else if(encryptids("D", $_SESSION['admin_type']) == 3){                                              
                                            
                                            
                                            if (!($list_yw['status'] == "5")) { ?>
                                                <button onclick="deleteYourwall(' <?php echo $list_yw['id']; ?> ');" data-id='<?php echo $list_yw['id']; ?>' class="btn btn-danger btn-sm mr-2 delete_img">Delete</button>
                                                <button class="btn btn-primary btn-sm mr-2" onclick="sendPublish('<?php echo $list_yw['id']; ?>')" data-id ='<?php echo $list_yw['id']; ?>'>Publish</button>
                                            <?php }else if($list_yw['status'] == "5"){ ?>
                                                <button class="btn btn-primary btn-sm mr-2" onclick="sendUnPublish('<?php echo $list_yw['id']; ?>')" data-id ='<?php echo $list_yw['id']; ?>'>UnPublish</button>
                                          <?php  } } ?>
                                            <a href="<?php echo base_url(); ?>admin/your_wall_view/<?php echo encryptids("E", $list_yw['id'] )?>"><button class="btn btn-info btn-sm mr-2">View</button></a>
                                            <!-- Modal -->
                                            <div class="modal fade" id="viewImage" tabindex="-1" role="dialog" aria-labelledby="viewImageLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="viewImageLabel">Image Preview</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <img src="<?php echo base_url(); ?>uploads/<?php echo $list_yw['image']; ?>" alt="not found" width="100%">
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

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
    <div class="col-md-12 submit_btn p-3">
                               <a class="btn btn-primary btn-sm text-white" onclick="location.href='<?php echo base_url();?>admin/exchange_forum'">Back</a>
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
<!-- End of Main Content -->
<script>
    // $(document).ready(function(){
    //     $('.delete_img').on('click',function(){
    //         $('#delete').modal('show');
    //     })
    // })
    function deleteYourwall(que_id) {
        // var c = confirm("Are you sure to delete this survey details? ");
        $('#delete').modal('show');
        $('.abcd').on('click', function() {

            $.ajax({
                type: 'POST',
                url: '<?php echo base_url(); ?>admin/deletYourwall',
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

    function sendPublish(que_id) {
            $('#publish').modal('show');
            $('.publish').on('click', function() {
            // var c = confirm("Are you sure to Publish this survey details? ");
            // if (c == true) {
                // const $loader = $('.igr-ajax-loader');
                //$loader.show();
                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url(); ?>admin/yourwallPublish',
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
            // var c = confirm("Are you sure to Unpublish this survey details? ");
            // if (c == true) {            
                $('#unpublish').modal('show');
                $('.unpublish').on('click', function() {   
                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url(); ?>admin/yourwallUnpublish',
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
</script>