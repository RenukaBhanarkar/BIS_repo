<link href="<?php echo base_url(); ?>assets/admin/css/jquery.dataTables.min.css" rel="stylesheet">


        <div class="container-fluid">
          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Subadmin Creation</h1>
            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><a href="<?php echo base_url().'Admin/dashboard'; ?>">Admin Dashboard</a></li>
                <li class="breadcrumb-item"><a href="#"><a href="<?php echo base_url().'admin/users'; ?>">User Management</a></li>
                <li class="breadcrumb-item active" aria-current="page">Subadmin Creation</li>
              </ol>
            </nav>

          </div>


          <!-- Content Row -->
          <div class="row">
            <div class="col-12">
              <div class="card border-top card-body">
                <div>
                  <button type="button" class="btn btn-primary btn-sm mr-2" onclick="location.href='<?php echo base_url(); ?>subadmin/admin_creation_form'">Create New Sub Admin</button>
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
                <table id="example" class="hover table-bordered table-responsive nowrap" style="width:100%">
                  <thead>
                    <tr>
                      <th>Sr. No.</th>
                      <th>Name</th>
                      <th>Email id</th>
                      <th>Department</th>
                      <th>Branch</th>
                      <th>Role/Designation</th>
                    
                      <!--<th>Post</th>
                      -->
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
                        <td><?php echo $row['uvc_department_name']; ?></td>
                        <td><?php echo $row['branchnew']; ?></td>
                         <td><?php echo $row['role']; ?></td>
                        <!--<td><?php echo $row['branch']; ?></td>
                        <td><?php echo $row['post']; ?></td>
                        </td> -->
                        <td><?php echo date('d-m-Y h:i:s', strtotime($row['created_on'])) ?></td>
                        <td class="d-flex border-bottom-0">
                         
                          <a class="btn btn-primary btn-sm mr-2" href="<?php echo base_url().'subadmin/admin_creation_view/'.encryptids('E', $row['id']) ; ?>" >View</a>
                          <a class="btn btn-warning btn-sm mr-2 text-white" href="<?php echo base_url(); ?>subadmin/editsubAdmin?id=<?php echo encryptids('E', $row['id']) ?>"> Edit </a>
                          <button class="btn btn-danger btn-sm mr-2" onclick="deleteRecord(<?php echo $row['id']; ?>)">Delete</button>
                          <button class="btn btn-primary btn-sm mr-2" onclick="resetPassword(<?php echo $row['id']; ?>,<?php echo $row['email_id']; ?>)">Reset Password</button>
                         
                          <a class="btn btn-success btn-sm mr-2 " href="<?php echo base_url(); ?>admin/set_permission?id=<?php echo encryptids('E', $row['id']) ?>"> Set Permission</a>
                          

                          <!-- <?php if($row['set_permissions'] == 1){ ?> 
                            <p><strong style="color:blue"> Permissions Granted</strong></p>
                          <?php } ?>  -->

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
     <!--  <footer class="sticky-footer bg-white">
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
  <!-- <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a> -->
 <!--  <script>
  $('#example').on('click', '.delete', function(e) {
        var id =$(this).attr('data-id');
        e.preventDefault();
        Swal.fire({
                    title: 'Are you sure you want to Delete?',
                    showDenyButton: true,
                    showCancelButton: false,
                    confirmButtonText: 'Delete',
                    denyButtonText: `Cancel`,
                    }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {                       
                      jQuery.ajax({                                  
                                  url: '<?php echo base_url(); ?>'+id,                                 
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
     </script> -->
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
                                    Swal.fire('Subadmin deleted Successfully');
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
                        
                        $.ajax({
                                type: 'POST',
                                url: '<?php echo base_url(); ?>admin/resetPassword',
                                data: {
                                    id: id,
                                    email:email,
                                },
                                success: function(result) {
                                  
                                    Swal.fire('Reset password Successfully.Mail sent.');
                                },
                                error: function(result) {
                                    Swal.fire("Error,Please try again.");
                                }
                            });
                                                  
                   
        } 
  </script>