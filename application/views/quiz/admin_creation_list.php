<link href="<?php echo base_url(); ?>assets/admin/css/jquery.dataTables.min.css" rel="stylesheet">


        <div class="container-fluid">
          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Create New Admin</h1>
            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Library</li>
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
              <div class="card border-top card-body table-responsive">
                <table id="example" class="hover table-bordered" style="width:100%">
                  <thead>
                    <tr>
                      <th>Sr. No.</th>
                      <th>Name</th>
                      <th>Email id</th>
                      <!-- <th>Designation</th>
                      <th>Branch</th>
                      <th>Post</th>
                      <th>Department</th> -->
                      <th>Created On</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $i = 1;

                    foreach ($allRecords as $row) {

                    ?>
                      <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['email_id']; ?></td>
                        <!-- <td><?php echo $row['designation']; ?></td>
                        <td><?php echo $row['branch']; ?></td>
                        <td><?php echo $row['post']; ?></td>
                        <td><?php echo $row['department']; ?></td> -->
                        <td><?php echo date('d-m-Y h:i:s', strtotime($row['created_on'])) ?></td>
                        <td class="d-flex border-bottom-0">
                          <!-- <a class="btn btn-primary btn-sm mr-2" onclick="location.href='<?php echo base_url(); ?>admin/admin_creation_view'"><i class="fa fa-eye" aria-hidden="true"></i></a> -->
                          <a class="btn btn-primary btn-sm mr-2" ><i class="fa fa-eye" aria-hidden="true"></i></a>
                          <a class="btn btn-info btn-sm mr-2 text-white" data-bs-toggle="modal" data-bs-target="#edit"><i class="fa fa-edit" aria-hidden="true"></i></a>
                          <a class="btn btn-danger btn-sm mr-2" data-bs-toggle="modal" data-bs-target="#delete"><i class="fa fa-trash" aria-hidden="true"></i></a>

                        </td>
                      </tr>

                    <?php $i++;
                    } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <!-- Modal -->
          <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Edit Form</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <p>Are you sure you want to edit?</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Save changes</button>
                </div>
              </div>
            </div>
          </div>
          <!-- Modal -->
          <!-- Modal -->
          <div class="modal fade" id="delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">delete Form</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <p>Are you sure you want to delete?</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Save changes</button>
                </div>
              </div>
            </div>
          </div>
          <!-- Modal -->
        </div>
      </div>
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Bureau of Indian Standards 2022</span>
          </div>
        </div>
      </footer>
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