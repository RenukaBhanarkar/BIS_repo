    <!-- Begin Page Content -->
    <div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Evaluator Dashboard</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url().'Admin/dashboard';?>" >Admin Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'Admin/task_recevied_list';?>" >Task Recevied for Review</a></li>
                <li class="breadcrumb-item active" aria-current="page">Task Recevied for Review</li>
                
                </ol>
            </nav>
        </div>
        <?php
        if ($this->session->flashdata('MSG')) {
            echo $this->session->flashdata('MSG');
        }
        ?>
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">
                <?php
                if (encryptids("D", $_SESSION['admin_type']) == 1) { ?> Super Admin Dashboard <?php } else  if (encryptids("D", $_SESSION['admin_type']) == 2) { ?> Evaluator Dashboard <?php } else { ?> Sub Admin Dashboard<?php } ?></h1>

        </div>
        <!-- Content Row -->
        <div class="row mt-3 ">

          
                
                
                <div class="col-xl-3 col-md-6 mb-4">
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
                                    <h5 class="font-weight-bold text-danger mb-1">Task Evaluated</h5>
                                    
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
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
           
            
            
            
       </div>
    <!-- /.container-fluid -->


  