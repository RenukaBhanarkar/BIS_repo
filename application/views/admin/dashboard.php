    <!-- Begin Page Content -->
    <div class="container-fluid">
        <?php
        if ($this->session->flashdata('MSG')) {
            echo $this->session->flashdata('MSG');
        }
        ?>
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">
                <?php
                if (encryptids("D", $_SESSION['admin_type']) == 1) { ?> Super Admin Dashboard <?php } else  if (encryptids("D", $_SESSION['admin_type']) == 2) { ?> Admin Dashboard <?php } else if (encryptids("D", $_SESSION['admin_type']) == 3) { ?><?php if(encryptids("D", $_SESSION['admin_designation']) == 4){?> Evaluator Dashhoard <?php }else{ ?> Sub Admin Dashboard<?php } } ?></h1>

        </div>
        <!-- Content Row -->
        <div class="row mt-3 ">

            <?php if (encryptids("D", $_SESSION['admin_type']) == 1 || encryptids("D", $_SESSION['admin_type']) == 2) { ?>
                <div class="col-xl-3 col-md-6 mb-4">
                    <a href="<?php echo base_url(); ?>admin/users">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center d-flex">
                                    <h5 class="font-weight-bold text-success mb-1">User Management</h5>
                                    
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                
                <!-- <div class="col-xl-3 col-md-6 mb-4">
                    <a href="<?php echo base_url(); ?>Miscellaneouscompetition/task_recevied_list">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center d-flex">
                                    <h5 class="font-weight-bold text-warning mb-1">Task Recevied for Review</h5>
                                    
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-xl-3 col-md-6 mb-4">
                    <a href="<?php echo base_url(); ?>Miscellaneouscompetition/task_reviewed">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center d-flex">
                                    <h5 class="font-weight-bold text-danger mb-1">Task Reviewed</h5>
                                    
                                </div>
                            </div>
                        </div>
                    </a>
                </div> -->
                <!-- <div class="col-xl-3 col-md-6 mb-4">
                    <a href="<?php echo base_url(); ?>admin/log_dashboard">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center d-flex">
                                    <h5 class="font-weight-bold text-primary mb-1">Log Reports</h5>
                                    
                                </div>
                            </div>
                        </div>
                    </a>
                </div> -->
            <?php } ?>
            <?php if (encryptids("D", $_SESSION['admin_type']) == 2 || encryptids("D", $_SESSION['admin_type']) == 3) {   ?>
                <?php if(!(encryptids("D", $_SESSION['admin_designation']) == 4)){  ?>
                <div class="col-xl-3 col-md-6 mb-4">
                    <a href="<?php echo base_url(); ?>admin/exchange_forum">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center d-flex">
                                    <h5 class="font-weight-bold text-primary mb-1">Exchange forum</h5>
                                    
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
              
            <?php } } ?>
            <?php if (encryptids("D", $_SESSION['admin_type']) == 1) {   ?>
                <div class="col-xl-3 col-md-6 mb-4">
                    <a href="<?php echo base_url(); ?>admin/log_dashboard">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center d-flex">
                                    <h5 class="font-weight-bold text-primary mb-1">Log Reports</h5>
                                    
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-xl-3 col-md-6 mb-4">
                    <a href="<?php echo base_url(); ?>admin/master_data_list">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center d-flex">
                                    <h5 class="font-weight-bold text-danger mb-1">Master Data</h5>
                                    
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            <?php } ?>

            <?php if (encryptids("D", $_SESSION['admin_type']) == 3 && encryptids("D", $_SESSION['admin_designation']) == 4) {   ?>
            <div class="col-xl-3 col-md-6 mb-4">
                    <a href="<?php echo base_url(); ?>Miscellaneouscompetition/evaluator_dashboard">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center d-flex">
                                    <h5 class="font-weight-bold text-warning mb-1">Task Assessment for Miscellaneous Competition</h5>
                                    
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-xl-3 col-md-6 mb-4">
                    <a href="<?php echo base_url(); ?>Standardswritting/evaluator_dashboard">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center d-flex">
                                    <h5 class="font-weight-bold text-danger mb-1">Task Assessment for Standard Writing Competition </h5>
                                    
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <?php } ?>
            
            
       </div>
    <!-- /.container-fluid -->


  