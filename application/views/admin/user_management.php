                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">User Management</h1>
                        <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url().'Admin/dashboard'; ?>">Super Admin Dashboard</a></li>
                        
                        <li class="breadcrumb-item active" aria-current="page"><a href="">Admin Creation</a></li>
                        </ol>
                    </div>


                    <!-- Content Row -->
                    <div class="row">
                    <?php if (encryptids("D", $_SESSION['admin_type']) == 1) {   ?>
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <a href="<?php echo base_url(); ?>admin/admin_creation_list">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center d-flex">
                                            <h5 class="font-weight-bold text-success mb-1">Admin Creation</h5>
                                            

                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <?php } ?>
                         <?php if (encryptids("D", $_SESSION['admin_type']) == 2) {   ?>
                           
                            <div class="col-xl-3 col-md-6 mb-4">
                                <a href="<?php echo base_url(); ?>subadmin/admin_creation_list">
                                    <div class="card border-left-primary shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center d-flex">
                                                <h5 class="font-weight-bold text-info mb-1">Subadmin Creation</h5>
                                               

                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <?php }else{ ?>
                            <!-- <div class="col-xl-3 col-md-6 mb-4">
                                <a href="#">
                                    <div class="card border-left-primary shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center d-flex">
                                                <h5 class="font-weight-bold text-warning mb-1">Standard Club Members</h5>
                                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>

                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div> -->
                           
                            <!-- <div class="col-xl-3 col-md-6 mb-4">
                                <a href="#">
                                    <div class="card border-left-primary shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center d-flex">
                                                <h5 class="font-weight-bold text-danger mb-1">Member Secretary</h5>
                                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>

                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div> -->
                        <?php } ?>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Bureau of Indian Standards 2022</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>