    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Question Bank List</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url().'Admin/dashboard';?>" >Sub Admin Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'admin/exchange_forum';?>" >Exchange Forum</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'quiz/organizing_quiz';?>" >Competitions</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'quiz/quiz_dashboard';?>" >Quiz Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Question Bank List</li>
                
                </ol>
            </nav>
        </div>

        <!-- Content Row -->
        <?php if (encryptids("D", $_SESSION['admin_type']) == 3) { ?>
        <div class="row">
            <div class="col-12">
                <div class="card border-top card-body">
                    <div>
                        <button type="button" class="btn btn-primary btn-sm mr-2" onclick="location.href='<?php echo base_url(); ?>subadmin/question_bank_form'">Create New Bank</button>
                        <button type="button" class="btn btn-primary btn-sm mr-2" onclick="location.href='<?php echo base_url(); ?>subadmin/question_bank_archive'">Archive</button>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
        <?php
        if ($this->session->flashdata('MSG')) {
            echo $this->session->flashdata('MSG');
        }
        ?>
        <div class="row">
            <div class="col-12 mt-3">
                <div class="card border-top card-body ">
                    <table id="listView" class="table-bordered display nowrap table-responsive" style="width:100%">
                        <thead>
                            <tr>
                                <th>Sr. No.</th>
                                <th>Quiz Bank ID</th>
                                <th>Question Bank Title</th>
                                <th>Number of Questions</th>
                              
                                <th>Date Created</th>
                                <th>Last Edited</th>
                                <th>Linked Quiz </th>
                                
                                <th>Status</th>
                                <th>Reason of Rejection</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($allRecords)) {
                                $i = 1;
                                foreach ($allRecords as $row) { ?>
                                   
                                    <tr id="row<?php echo $row['que_bank_id']; ?>">
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $row['que_bank_id']; ?></td>
                                        <td><?php echo $row['title']; ?></td>
                                        <td><?php echo $row['no_of_ques']; ?></td>
                                        
                                        <td><?php echo date('d-m-Y', strtotime($row["created_on"])) ?></td>
                                        <?php if ($row["modified_on"]) { ?>
                                            <td><?php echo date('d-m-Y', strtotime($row["modified_on"])) ?></td>
                                        <?php } else { ?>
                                            <td>--</td>
                                        <?php } ?>
                                        <td><?php echo $row['quiz_title']; ?></td>
                                        
                                        <td><?php echo $row['status_name']; ?></td>
                                        <?php if ($row["rejection_reason"] != "") { ?>
                                        <td><?php echo $row['rejection_reason']; ?></td>
                                        <?php }else{ ?> 
                                        <td>--</td>
                                        <?php } ?>
                                        <td class="d-flex border-bottom-0">

                                        <?php if (encryptids("D", $_SESSION['admin_type']) == 2) { ?>
                                            <?php if (($row['status'] == 2) ) {  ?>
                                            <a class="btn btn-primary btn-sm mr-2" href="<?php echo base_url(); ?>subadmin/viewQuestionBank?id=<?php echo encryptids('E', $row['que_bank_id']) ?>" title="View">Approve / Reject</a> 

                                            <?php } else{ ?>
                                                <a class="btn btn-primary btn-sm mr-2" href="<?php echo base_url(); ?>subadmin/viewQuestionBank?id=<?php echo encryptids('E', $row['que_bank_id']) ?>" title="View">View</a> 

                                                <?php } ?>
                                        <?php }?>
                                        <?php if (encryptids("D", $_SESSION['admin_type']) == 3)  { ?>
                                            <a class="btn btn-primary btn-sm mr-2" href="<?php echo base_url(); ?>subadmin/viewQuestionBank?id=<?php echo encryptids('E', $row['que_bank_id']) ?>" title="View">View</a> 
                                            <?php } ?>
                                           
                                            <?php if (encryptids("D", $_SESSION['admin_type']) == 3) { ?>

                                                <a class="btn btn-success btn-sm mr-2" href="<?php echo base_url(); ?>subadmin/replicateQuestionBank?id=<?php echo encryptids('E', $row['que_bank_id']) ?>" >Replicate</a>                                           
                                                <?php if (($row['status'] == 1) || ($row['status'] == 3) ||  ($row['status'] == 4 )) { 
                                                    
                                                    if($row['quiz_title'] == "" ){ ?>
                                                     
                                                    <a class="btn btn-warning btn-sm mr-2 text-white" href="<?php echo base_url(); ?>subadmin/editQuestionBank?id=<?php echo encryptids('E', $row['que_bank_id']) ?>" title="Edit">
                                                        Edit
                                                    </a>
                                                    <button class="btn btn-danger btn-sm mr-2" onclick="deleteRecord(<?php echo $row['que_bank_id']; ?>)">Delete</button>

                                                    <button type="button" class="btn btn-info btn-sm mr-2" data-id="<?php echo $row['que_bank_id']; ?>" id="archiveQueBank">Archive</button>


                                            <?php } } } ?>
                                            
                                           

                                            <?php if (encryptids("D", $_SESSION['admin_type']) == 3) { ?>
                                                <?php if (($row['status'] == 1) || ($row['status'] == 4 ))  { ?>
                                                    <button type="button" class="btn btn-info btn-sm mr-2" data-id="<?php echo $row['que_bank_id']; ?>" id="sendForApproval">Send For Approval</button>
                                            <?php  } } ?>

                                        </td>
                                <?php $i++;
                                }
                            } ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
    <script>
         $(document).ready(function () {
    $('#listView').DataTable({
        // scrollX: true,
    });
    });
        function deleteRecord(que_bank_id) {
            // var c = confirm("Are you sure to delete this record ?");
            // if (c == true) {
            //     // const $loader = $('.igr-ajax-loader');
            //     //$loader.show();
            //     $.ajax({
            //         type: 'POST',
            //         url: '<?php echo base_url(); ?>subadmin/deleteQueBank',
            //         data: {
            //             que_bank_id: que_bank_id,
            //         },
            //         success: function(result) {
            //             $('#row' + que_bank_id).css({
            //                 'display': 'none'
            //             });
            //         },
            //         error: function(result) {
            //             alert("Error,Please try again.");
            //         }
            //     });

            // }
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
                                url: '<?php echo base_url(); ?>subadmin/deleteQueBank',
                                data: {
                                    que_bank_id: que_bank_id,
                                },
                                success: function(result) {
                                    $('#row' + que_bank_id).css({
                                        'display': 'none'
                                    });
                                    Swal.fire('Questionbank deleted Successfully');
                                },
                                error: function(result) {
                                    Swal.fire("Error,Please try again.");
                                }
                            });
                       // Swal.fire('Saved!', '', 'success')                                
                    } else if (result.isDenied) {
                        // Swal.fire('Changes are not saved', '', 'info')
                    }
                    })
        }
        $(document).ready(function() {
            $('#listView').on('click', '#sendForApproval', function(e) {
                e.preventDefault();
                const $root = $(this);
                var id = $root.data('id');
                // jQuery.ajax({
                //     type: "POST",
                //     url: '<?php echo base_url(); ?>subadmin/changeStatus',
                //     dataType: 'json',
                //     data: {
                //         "id": id,
                //         "status": 2
                //     },
                //     success: function(res) {
                //         if (res.status == 0) {
                //             alert(res.message);

                //         } else {
                //             alert(res.message);
                //             window.location.replace("<?php echo base_url(); ?>subadmin/questionBankList");
                //         }
                //     },
                //     error: function(xhr, status, error) {
                //         //toastr.error('Failed to add '+xData.name+' in wishlist.');
                //         console.log(error);
                //     }
                // });

                // ------- sweet alert start ----
                Swal.fire({
                    title: 'Are you sure you want to Send for Approval?',
                    showDenyButton: true,
                    showCancelButton: false,
                    confirmButtonText: 'Send for Approval',
                    denyButtonText: `Cancel`,
                    }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {                       
                        jQuery.ajax({
                    type: "POST",
                    url: '<?php echo base_url(); ?>subadmin/changeStatus',
                    dataType: 'json',
                    data: {
                        "id": id,
                        "status": 2
                    },
                    success: function(res) {
                        if (res.status == 0) {
                            Swal.fire(res.message);

                        } else {
                            Swal.fire(res.message);
                            window.location.replace("<?php echo base_url(); ?>subadmin/questionBankList");
                        }
                    },
                    error: function(xhr, status, error) {
                        //toastr.error('Failed to add '+xData.name+' in wishlist.');
                        console.log(error);
                    }
                });
                       // Swal.fire('Saved!', '', 'success')                                
                    } else if (result.isDenied) {
                        // Swal.fire('Changes are not saved', '', 'info')
                    }
                    })
                  // ------- sweet alert End ----

            });
            $('#listView').on('click', '#archiveQueBank', function(e) {
                e.preventDefault();
                const $root = $(this);
                var id = $root.data('id');
                // jQuery.ajax({
                //     type: "POST",
                //     url: '<?php echo base_url(); ?>subadmin/changeStatus',
                //     dataType: 'json',
                //     data: {
                //         "id": id,
                //         "status": 9
                //     },
                //     success: function(res) {
                //         if (res.status == 0) {
                //             alert(res.message);

                //         } else {
                //             alert(res.message);
                //             window.location.replace("<?php echo base_url(); ?>subadmin/questionBankList");
                //         }
                //     },
                //     error: function(xhr, status, error) {
                //         //toastr.error('Failed to add '+xData.name+' in wishlist.');
                //         console.log(error);
                //     }
                // });
// -----sweet alert start ----
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
                                    url: '<?php echo base_url(); ?>subadmin/changeStatus',
                                    dataType: 'json',
                                    data: {
                                        "id": id,
                                        "status": 9
                                    },
                                    success: function(res) {
                                        if (res.status == 0) {
                                            Swal.fire(res.message);

                                        } else {
                                            Swal.fire(res.message);                                           
                                            window.location.replace("<?php echo base_url(); ?>subadmin/questionBankList");
                                        }
                                    },
                                    error: function(xhr, status, error) {
                                        //toastr.error('Failed to add '+xData.name+' in wishlist.');
                                        console.log(error);
                                    }
                                    });
                       // Swal.fire('Saved!', '', 'success')                                
                    } else if (result.isDenied) {
                        // Swal.fire('Changes are not saved', '', 'info')
                    }
                    })
// -----sweet alert End ----
            });
        });
    </script>


    </body>