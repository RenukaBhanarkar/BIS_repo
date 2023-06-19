<link href="<?php echo base_url(); ?>assets/admin/css/jquery.dataTables.min.css" rel="stylesheet">


        <div class="container-fluid">
          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Admin Creation</h1>
            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
              <ol class="breadcrumb">
              <?php if (encryptids("D", $_SESSION['admin_type']) == 1) { ?>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'Admin/dashboard';?>" >Super Admin Dashboard</a></li>
                <?php } ?>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'admin/users';?>" >User Management</a></li>
                <li class="breadcrumb-item active" aria-current="page">Admin Creation</li>
              </ol>
            </nav>
          </div>

          <!-- Content Row -->
          <div class="row">
            <div class="col-12">
              <div class="card border-top card-body">
                <div>
                  <button type="button" class="btn btn-primary btn-sm mr-2" onclick="location.href='<?php echo base_url(); ?>admin/admin_creation_form'">Create New Admin</button>
                </div>
              </div>
            </div>
          </div>
          <?php
          if ($this->session->flashdata('MSG')) {
            echo $this->session->flashdata('MSG');
          }
          ?>
          <div class="row">
            <div class="col-12 mt-3">
              <div class="card border-top card-body">
                <table id="example" class="hover table-bordered" style="width:100%">
                  <thead>
                    <tr>
                      <th>Sr. No.</th>
                      <th>Name</th>
                      <th>Email id</th>
                      <!-- <th>Designation</th> <th>Post</th>-->
                      <th>Branch</th>
                   
                      <th>Department</th>
                      <th>Created On</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $i = 1;

                    foreach ($allRecords as $row) {

                    ?>
                      <tr id="row<?php echo $row['id'];?>">
                        <td><?php echo $i; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['email_id']; ?></td>

                        <!-- <td><?php echo $row['designation']; ?></td><td><?php echo $row['post']; ?></td>-->
                        <td><?php echo $row['branchnew']; ?></td>
                        
                        <td><?php echo $row['uvc_department_name']; ?></td>

                        <td><?php echo date('d-m-Y h:i:s', strtotime($row['created_on'])) ?></td>
                        <td class="d-flex border-bottom-0">
                         
                         
                          <!-- <a href="<?php echo base_url().'admin/admin_creation_view/'.$row['id']; ?>" class="btn btn-primary btn-sm mr-2">View</a> -->

                          <a href="<?php echo base_url().'admin/admin_creation_view/'.encryptids('E', $row['id']); ?>" class="btn btn-primary btn-sm mr-2">View</a>
                          
                          <a class="btn btn-warning btn-sm mr-2 text-white" href="<?php echo base_url(); ?>admin/editAdmin?id=<?php echo encryptids('E', $row['id']) ?>"> Edit </a>
                          <button class="btn btn-danger btn-sm mr-2" onclick="deleteRecord(<?php echo $row['id']; ?>)">Delete</button>

                          <button class="btn btn-primary btn-sm mr-2" onclick="resetPassword(<?php echo $row['id']; ?>,'<?php echo $row['email_id']; ?>')">Reset Password</button>
                          

                          <!-- <a class="btn btn-danger btn-sm mr-2" data-bs-toggle="modal" data-bs-target="#delete">delete</a>                     -->

                        </td>
                      </tr>

                    <?php $i++;
                    } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        
        </div>
      </div>
      <!-- <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Bureau of Indian Standards 2022</span>
          </div>
        </div>
      </footer> -->
    </div>
  </div>
  <!-- /.container-fluid -->

  </div>
  <!-- End of Main Content -->

  <!-- Footer -->

  <!-- End of Footer -->

  </div>
  </div>
  <!-- /.container-fluid -->

  </div>
  <!-- End of Main Content -->


  <!-- </div> -->
  <!-- End of Content Wrapper -->

  <!-- </div> -->
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <script>
          function deleteRecord(id) {
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
                                url: '<?php echo base_url(); ?>admin/deleteAdmin',
                                data: {
                                    id: id,
                                },
                                success: function(result) {
                                    $('#row' + id).css({
                                        'display': 'none'
                                    });
                                    Swal.fire('Admin deleted Successfully');
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
        
        
        function resetPassword(id,email) {
                        
                        // $.ajax({
                        //         type: 'POST',
                        //         url: '<?php echo base_url(); ?>admin/resetPassword',
                        //         data: {
                        //             id: id,
                        //             email:email,
                        //         },
                        //         success: function(result) {
                                  
                        //             Swal.fire('Reset password Successfully.Mail sent.');
                        //         },
                        //         error: function(result) {
                        //             Swal.fire("Error,Please try again.");
                        //         }
                        //     });

                        Swal.fire({
                    title: 'Do you want to reset password?',
                    showDenyButton: true,
                    showCancelButton: false,
                    confirmButtonText: 'Reset',
                    denyButtonText: `Cancel`,
                    }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {                       
                        $.ajax({
                                type: 'POST',
                                url: '<?php echo base_url(); ?>admin/resetPassword',
                                data: {
                                    id: id,
                                    email:email,
                                },
                                success: function(result) {
                                    
                                    Swal.fire('Reset Password Successfully');
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
        
  </script>