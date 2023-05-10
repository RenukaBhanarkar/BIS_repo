    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Question Bank Archive</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url().'Admin/dashboard';?>" >Sub Admin Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'admin/exchange_forum';?>" >Exchange Forum</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'quiz/organizing_quiz';?>" >Competitions</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'quiz/quiz_dashboard';?>" >Quiz Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'subadmin/questionBankList';?>" >Question Bank List</a></li>
                <li class="breadcrumb-item active" aria-current="page">Question Bank Archive</li>
                
                </ol>
            </nav>
        </div>

        <!-- Content Row -->
       
        <div class="row">
            <div class="col-12 mt-3">
                <div class="card border-top card-body table-responsive">
                    <table id="listView" class="table-bordered display nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>Sr. No.</th>
                                <th>Quiz Bank ID</th>
                                <th>Question Bank Title</th>
                                <th>Number of Questions</th>
                                <th>Total Marks</th>
                                <th>Date Created</th>
                                <th>Last Edited</th>
                                <th>Linked Quiz</th>
                              
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
                                        <td><?php echo $row['total_marks']; ?></td>
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
                                            <a class="btn btn-primary btn-sm mr-2" href="<?php echo base_url(); ?>subadmin/viewQuestionBank?id=<?php echo encryptids('E', $row['que_bank_id']) ?>" title="View">View</a>

                                           <button type="button" class="btn btn-info btn-sm mr-2" data-id="<?php echo $row['que_bank_id']; ?>" id="RestoreQueBank">Restore</button>                                         
                                            
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
            var c = confirm("Are you sure to delete this record ?");
            if (c == true) {
                // const $loader = $('.igr-ajax-loader');
                //$loader.show();
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
                    },
                    error: function(result) {
                        alert("Error,Please try again.");
                    }
                });

            }
        }
        $(document).ready(function() {
            $('#listView').on('click', '#RestoreQueBank', function(e) {
                e.preventDefault();
                const $root = $(this);
                var id = $root.data('id');
                // jQuery.ajax({
                //     type: "POST",
                //     url: '<?php echo base_url(); ?>subadmin/changeStatus',
                //     dataType: 'json',
                //     data: {
                //         "id": id,
                //         "status": 1
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

                // -- sweet alert start
                Swal.fire({
                    title: 'Are you sure you want to Restore?',
                    showDenyButton: true,
                    showCancelButton: false,
                    confirmButtonText: 'Restore',
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
                                        "status": 1
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
                // -- sweet alert end

            });
        });
    </script>


    </body>