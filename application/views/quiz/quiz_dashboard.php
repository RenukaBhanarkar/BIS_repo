    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Quiz Dashboard</h1>
            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url().'Admin/dashboard';?>" >Sub Admin Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'admin/exchange_forum';?>" >Exchange Forum</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'quiz/organizing_quiz';?>" >Competitions</a></li>
                <li class="breadcrumb-item active" aria-current="page">Quiz Dashboard</li>
                
                </ol>
            </nav>
        </div>
       
       
        <!-- Content Row -->
        <div class="row">
        <?php if (encryptids("D", $_SESSION['admin_type']) == 3  ){ ?>
            <div class="col-xl-3 col-md-6 mb-4">
                <a href="<?php echo base_url(); ?>Quiz/quiz_list">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center d-flex">
                            <h5 class="font-weight-bold text-success mb-1">New Quiz</h5>
                            

                        </div>
                    </div>
                </div>
                </a>
            </div>
         <?php } ?>
         <?php if (encryptids("D", $_SESSION['admin_type']) == 2 || encryptids("D", $_SESSION['admin_type']) == 3) { ?>
            <div class="col-xl-3 col-md-6 mb-4">
                <a href="<?php echo base_url(); ?>Quiz/manage_quiz_list">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center d-flex">
                            <h5 class="font-weight-bold text-warning mb-1">Manage Quiz</h5>
                            
                        </div>
                    </div>
                </div>
                </a>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <a href="<?php echo base_url(); ?>Quiz/ongoing_quiz_list">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center d-flex">
                            <h5 class="font-weight-bold text-danger mb-1">On Going Quiz</h5>
                            
                        </div>
                    </div>
                </div>
                </a>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <a href="<?php echo base_url(); ?>Quiz/closed_quiz_list">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center d-flex">
                            <h5 class="font-weight-bold text-success mb-1">Closed Quiz</h5>
                            
                        </div>
                    </div>
                </div>
                </a>
            </div>
            <?php } ?>
            <?php if (encryptids("D", $_SESSION['admin_type']) == 2) { ?>
            <div class="col-xl-3 col-md-6 mb-4">
                <a href="<?php echo base_url(); ?>admin/questionBankList">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center d-flex">
                            <h5 class="font-weight-bold text-teal mb-1">Question Bank</h5>
                           
                        </div>
                    </div>
                </div>
                </a>
            </div>
            <?php } ?>
            <?php if (encryptids("D", $_SESSION['admin_type']) == 3) { ?>
            <div class="col-xl-3 col-md-6 mb-4">
                <a href="<?php echo base_url(); ?>subadmin/questionBankList">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center d-flex">
                            <h5 class="font-weight-bold text-teal mb-1">Question Bank</h5>
                            
                        </div>
                    </div>
                </div>
                </a>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <a href="<?php echo base_url(); ?>quiz/result_declaration_list">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center d-flex">
                            <h5 class="font-weight-bold text-info mb-1">Result Declared</h5>
                            
                        </div>
                    </div>
                </div>
                </a>
            </div>
            <?php } ?>
         
          </div>
       </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


