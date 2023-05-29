    <!-- Begin Page Content -->
    <div class="container-fluid">

      <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Manage Quiz</h1>
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url().'Admin/dashboard';?>" >
                <?php if (encryptids("D", $_SESSION['admin_type']) == 3) { ?>
                Sub <?php } ?> Admin Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'admin/exchange_forum';?>" >Exchange Forum</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'quiz/organizing_quiz';?>" >Competitions</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'quiz/quiz_dashboard';?>" >Quiz Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Manage Quiz</li>
                
                </ol>
            </nav>
      </div>
      <?php if (encryptids("D", $_SESSION['admin_type']) == 3) { ?>
        <div class="row">
          <div class="col-12">
            <div class="card border-top card-body">
              <div>
                <button type="button" class="btn btn-primary btn-sm mr-2" onclick="location.href='<?= base_url(); ?>Quiz/quiz_archive'">Archive</button>
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
          <div class="card border-top card-body">
            <table id="listView" class="table-bordered nowrap table-responsive" style="width:100%">
              <thead>
                <tr>
                  <th>Sr. No.</th>
                  <th>Quiz ID</th>
                  <th>Quiz Title</th>
                  <th>Quiz Start Date</th>
                  <th>Quiz End Date</th>
                  <th>Total Questions in Quiz</th>
                  <th>Total Questions in QB</th>
                  <th>Total Marks</th>
                  <th>Status</th>
                  <th>Rejection Reason </th>
                  <th>Created On </th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php if (!empty($allquize)) {
                  $i = 1;
                  foreach ($allquize as $quiz) { ?>
                    <tr id="row<?= $quiz['id'];?>">
                      <td><?= $i++ ?></td>
                      <td><?= $quiz['quiz_id'] ?></td>
                      <td><?= $quiz['title'] ?></td>

                      <td><?= date("d-m-Y", strtotime($quiz['start_date'])); ?></td>
                      <td><?= date("d-m-Y", strtotime($quiz['end_date'])); ?></td>
                      <td><?= $quiz['total_question'] ?></td>
                      <td><?= $quiz['no_of_ques'] ?></td>
                      <td><?= $quiz['total_mark'] ?></td>
                      <td><?= $quiz['status_name'] ?></td>
                      <td><?= $quiz['remark'] ?></td>
                      <td><?= date("d-m-Y H:i:s", strtotime($quiz['created_on'])); ?></td>
                      <td class="d-flex border-bottom-0">
                        <?php if (encryptids("D", $_SESSION['admin_type']) == 2) {
                          if ($quiz['status'] == 2 ) { ?>
                            <a href="quiz_view/<?= $quiz['id'] ?>" class="btn btn-primary btn-sm mr-2">Approve/ Reject</a>
                        <?php }
                        } ?>
                        <?php if (encryptids("D", $_SESSION['admin_type']) == 2) {
                          if ($quiz['status'] == 3 || $quiz['status'] == 4 || $quiz['status'] == 5 || $quiz['status'] == 6) {
                        ?>
                            <a href="quiz_view/<?= $quiz['id'] ?>" class="btn btn-primary btn-sm mr-2">View</a>
                        <?php }
                        } ?>


                        <?php if (encryptids("D", $_SESSION['admin_type']) == 3) { ?>
                          <?php if(in_array(1,$permissions)){ ?> 
                          <a href="quiz_view/<?= $quiz['id'] ?>" class="btn btn-primary btn-sm mr-2">View</a>
                        <?php } } ?>

                        <?php if (encryptids("D", $_SESSION['admin_type']) == 3) { ?>
                           
                          <?php if ($quiz['status'] == 1 ) { ?>
                               <a data-id="<?= $quiz['id'] ?>" class="btn btn-success btn-sm mr-2 send_to_approve">Send For Approval</a>
                          <?php } ?>

                          <?php if ($quiz['status'] == 3 || $quiz['status'] == 6) { ?>
                           
                            <button data-id="<?= $quiz['id'] ?>" class="btn btn-success btn-sm mr-2 publish">Publish</button>

                          <?php } ?>
                          <?php if ($quiz['status'] == 5) { ?>

                            <button data-id="<?= $quiz['id'] ?>" class="btn btn-info btn-sm mr-2 unpublish">UnPublish</button>

                          <?php } ?>
                       
                          <?php if ($quiz['status'] == 6 || $quiz['status'] == 7) { ?>
                           
                            <button type="button" class="btn btn-info btn-sm mr-2" data-id="<?= $quiz['id'] ?>" id="archiveQuiz">Archive</button>
                          <?php } ?>


                          <?php if(in_array(3,$permissions)){ ?>  
                          <?php if ($quiz['status'] == 1 || $quiz['status'] == 3 || $quiz['status'] == 4 || $quiz['status'] == 10) { ?>
                            <a href="editquiz/<?= $quiz['id'] ?>" class="btn btn-info btn-sm mr-2 text-white">Edit</a>                            
                          <?php } }?>

                          <?php if(in_array(4,$permissions)){ ?>  
                          <?php if ($quiz['status'] == 1 || $quiz['status'] == 3 || $quiz['status'] == 4 || $quiz['status'] == 10) { ?>                            
                           
                            <button data-id="<?= $quiz['id'] ?>" class="btn btn-danger btn-sm mr-2 delete">Delete</button> 
                          <?php } }?>




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
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
    <!-- Modal -->
    <div class="modal fade" id="createForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Create</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <p>Are you sure you want to Create?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Save changes</button>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="publish" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Publish Quiz</h5>
                <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to Publish Quiz?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <a href="" id="publishquiz"><button type="button" class="btn btn-primary abcd" data-bs-dismiss="modal">Publish</button></a>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="unpublish" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Unublish Quiz</h5>
                <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to Unublish Quiz?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <a href="" id="unpublishquiz"><button type="button" class="btn btn-primary abcd" data-bs-dismiss="modal">Unublish</button></a>
            </div>
        </div>
    </div>
</div>
    <script>
      $(document).ready(function() {
        $('#listView').DataTable({
        // scrollX: true,
    });
    function publishQuiz(que_id){
      $('#publish').modal('show');  
      $('#publishquiz').attr('href','publishQuiz/'+que_id);
    }

    function unpublishQuiz(que_id){
      $('#unpublish').modal('show');  
      $('#unpublishquiz').attr('href','unPublishQuiz/'+que_id);
    }

    function create(que_id){
      $('#create').modal('show');  
      $('#createquiz').attr('href','sendApprove/'+que_id);
    }
        // function deleteRecord(quiz_id) {
        //     var c = confirm("Are you sure to delete this record ?");
        //     if (c == true) {
        //         // const $loader = $('.igr-ajax-loader');
        //         //$loader.show();
        //         $.ajax({
        //             type: 'POST',
        //             url: '<?php echo base_url(); ?>quiz/deleteQuiz',
        //             data: {
        //                 id: quiz_id,
        //             },
        //             success: function(result) {
        //                 $('#row' + quiz_id).css({
        //                     'display': 'none'
        //                 });
        //             },
        //             error: function(result) {
        //                 alert("Error,Please try again.");
        //             }
        //         });

        //     }
        // }
        function deleteRecord(quiz_id) {
          Swal.fire({
                    title: 'Are you sure you want to Delete?',
                    showDenyButton: true,
                    showCancelButton: false,
                    confirmButtonText: 'Delete',
                    denyButtonText: `Cancel`,
                    }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {                       
                        
                       // Swal.fire('Saved!', '', 'success')                                
                    
                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url(); ?>quiz/deleteQuiz',
                    data: {
                        id: quiz_id,
                    },
                    success: function(result) {
                        $('#row' + quiz_id).css({
                            'display': 'none'
                        });
                    },
                    error: function(result) {
                        alert("Error,Please try again.");
                    }
                });

              } else if (result.isDenied) {
                        // Swal.fire('Changes are not saved', '', 'info')
                    }
                    })

            
        }

        $('#listView').on('click', '#archiveQuiz', function(e) {
          e.preventDefault();
          const $root = $(this);
          var id = $root.data('id');



          Swal.fire({
                    title: 'Are you sure you want to Archive?',
                    showDenyButton: true,
                    showCancelButton: false,
                    confirmButtonText: 'Archive',
                    denyButtonText: `Cancel`,
                    }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {                       
                        
                       // Swal.fire('Saved!', '', 'success')                                
                    
          jQuery.ajax({
            type: "POST",
            url: '<?php echo base_url(); ?>quiz/changeStatus',
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
                window.location.replace("<?php echo base_url(); ?>quiz/manage_quiz_list");
              }
            },
            error: function(xhr, status, error) {
              //toastr.error('Failed to add '+xData.name+' in wishlist.');
              console.log(error);
            }
          });

        } else if (result.isDenied) {
                        // Swal.fire('Changes are not saved', '', 'info')
                    }
                    })


        });
      });
    </script>
    <script>
       $('#listView').on('click', '.publish', function(e) {
        var id =$(this).attr('data-id');
        e.preventDefault();
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
                                  url: '<?php echo base_url(); ?>quiz/publishQuiz/'+id,                                 
                                  success: function(res) {
                                    if (res) {
                                      // Swal.fire(res.message);
                                      location.reload();
                                    } else {
                                      alert(res.message);
                                      window.location.replace("<?php echo base_url(); ?>quiz/manage_quiz_list");
                                    }
                                  },
                                  error: function(xhr, status, error) {                                    
                                    console.log(error);
                                  }
                                });
                       // Swal.fire('Saved!', '', 'success')                                
                    } else if (result.isDenied) {
                        // Swal.fire('Changes are not saved', '', 'info')
                    }
                    })
       });
       $('#listView').on('click', '.unpublish', function(e) {
        var id =$(this).attr('data-id');
        e.preventDefault();
        Swal.fire({
                    title: 'Are you sure you want to Unublish?',
                    showDenyButton: true,
                    showCancelButton: false,
                    confirmButtonText: 'Unublish',
                    denyButtonText: `Cancel`,
                    }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {                       
                      jQuery.ajax({                                  
                                  url: '<?php echo base_url(); ?>quiz/unPublishQuiz/'+id,                                 
                                  success: function(res) {
                                    if (res) {
                                      // Swal.fire(res.message);
                                      location.reload();
                                    } else {
                                      alert(res.message);
                                      window.location.replace("<?php echo base_url(); ?>quiz/manage_quiz_list");
                                    }
                                  },
                                  error: function(xhr, status, error) {                                    
                                    console.log(error);
                                  }
                                });
                       // Swal.fire('Saved!', '', 'success')                                
                    } else if (result.isDenied) {
                        // Swal.fire('Changes are not saved', '', 'info')
                    }
                    })
       })
    </script>
    <script>
      $('#listView').on('click','.delete',function(){
        var quiz_id=$(this).attr('data-id');
        Swal.fire({
                    title: 'Are you sure you want to Delete?',
                    showDenyButton: true,
                    showCancelButton: false,
                    confirmButtonText: 'Delete',
                    denyButtonText: `Cancel`,
                    }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {                       
                              $.ajax({
                                      type: 'POST',
                                      url: '<?php echo base_url(); ?>quiz/deleteQuiz',
                                      data: {
                                          id: quiz_id,
                                      },
                                      success: function(result) {
                                          $('#row' + quiz_id).css({
                                              'display': 'none'
                                          });
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

      });

      $('#listView').on('click','.send_to_approve',function(){
        var quiz_id=$(this).attr('data-id');
        Swal.fire({
                    title: 'Are you sure you want to Send for Approval?',
                    showDenyButton: true,
                    showCancelButton: false,
                    confirmButtonText: 'Submit',
                    denyButtonText: `Cancel`,
                    }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {                       
                              $.ajax({
                                      // type: 'POST',
                                      url: '<?php echo base_url(); ?>quiz/sendApprove/'+quiz_id,
                                      // data: {
                                      //     id: quiz_id,
                                      // },
                                      success: function(result) {
                                          // $('#row' + quiz_id).css({
                                          //     'display': 'none'
                                          // });
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

      });
    </script>