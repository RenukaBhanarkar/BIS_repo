    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Important Draft Standards View</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url().'Admin/dashboard';?>" >Sub Admin Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'admin/exchange_forum';?>" >Exchange Forum</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'admin/share_your_dashboard';?>" >Share Your Thoughts</a></li>
                <li class="breadcrumb-item active" aria-current="page">Important Draft Standards View</li>
                
                </ol>
            </nav>
        </div>

        <!-- Content Row -->
       <div class="row">
            <div class="col-12 mt-3">
                <div class="card border-top card-body table-responsive">
                    <table id="example" class="hover table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Sr. No.</th>
                                <th>Email</th>
                                <th>Contact</th>
                                <th>Name</th>
                                <th>Comments</th>
                                <th>Date of Post</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                           <tr>
                              <td>1</td>
                              <td>example1@gmail.com</td>
                              <td>7057085889</td>
                              <td>AKshay</td>
                              <td>Comments</td>
                              <td>12/03/2023</td>
                              <td class="d-flex">
                                 <a href="#" class="btn btn-primary btn-sm mr-2">Unpublish</a>
                                 <a href="#" class="btn btn-success btn-sm mr-2">Publish</a>
                                 <a href="#" class="btn btn-danger btn-sm mr-2">Delete</a>
                                 <a href="#" class="btn btn-info btn-sm mr-2">Archived</a>
                            </td>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
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
                                    <!-- Modal -->