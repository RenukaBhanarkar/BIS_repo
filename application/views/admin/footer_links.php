<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Footer Links</h1>
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
            aria-label="breadcrumb">
            <ol class="breadcrumb">
            <?php if (encryptids("D", $_SESSION['admin_type']) == 3) { ?>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'Admin/dashboard';?>" >Sub Admin Dashboard</a></li>
                <?php }else{ ?>
                    <li class="breadcrumb-item"><a href="<?php echo base_url().'Admin/dashboard';?>" >Admin Dashboard</a></li>
                <?php } ?>
            <!-- <li class="breadcrumb-item"><a href="<?php echo base_url().'admin/';?>" >Home</a></li> -->
  <li class="breadcrumb-item active" aria-current="page"><a href="<?php echo base_url().'admin/exchange_forum';?>" >Exchange Forum</a></li>
  <li class="breadcrumb-item"><a href="<?php echo base_url().'admin/cmsManagenent_dashboard';?>" >CMS</a></li>
  <li class="breadcrumb-item"><a href="<?php echo base_url().'admin/cmsManagenent_dashboard';?>" >Footer Links</a></li>
            </ol>
        </nav>

    </div>

    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <!-- <div class="col-xl-3 col-md-6 mb-4">
            <a href="<?php echo base_url(); ?>admin/accessibility_Help">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center d-flex">
                            <h5 class="font-weight-bold text-success mb-1">Accessibility & Help</h5>
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>

                        </div>
                    </div>
                </div>
            </a>
        </div> -->
        <?php if (encryptids("D", $_SESSION['admin_type']) == 3) {   ?>
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="<?php echo base_url(); ?>subadmin/legal">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center d-flex">
                            <h5 class="font-weight-bold text-warning mb-1">Legal</h5>
                            <!-- <i class="fas fa-dollar-sign fa-2x text-gray-300"></i> -->

                        </div>
                    </div>
                </div>
            </a>
        </div>
       <?php } ?>
       <?php if (encryptids("D", $_SESSION['admin_type']) == 2) {   ?>
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="<?php echo base_url(); ?>admin/legal_view">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center d-flex">
                            <h5 class="font-weight-bold text-warning mb-1">Legal</h5>
                            <!-- <i class="fas fa-dollar-sign fa-2x text-gray-300"></i> -->

                        </div>
                    </div>
                </div>
            </a>
        </div>
       <?php } ?>
        <!-- <div class="col-xl-3 col-md-6 mb-4">
            <a href="<?php echo base_url(); ?>admin/other_links">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center d-flex">
                            <h5 class="font-weight-bold text-secondary mb-1">Other Links</h5>
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>

                        </div>
                    </div>
                </div>
            </a>
        </div> -->

        <div class="col-xl-3 col-md-6 mb-4">
            <a href="<?php echo base_url(); ?>admin/useful_links">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center d-flex">
                        <h5 class="font-weight-bold text-danger mb-1">Useful Links</h5>
                            <!-- <i class="fas fa-dollar-sign fa-2x text-gray-300"></i> -->

                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <a href="<?php echo base_url(); ?>admin/follow_us">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center d-flex">
                        <h5 class="font-weight-bold text-dark mb-1">Follow Us</h5>
                            <!-- <i class="fas fa-dollar-sign fa-2x text-gray-300"></i> -->

                        </div>
                    </div>
                </div>
            </a>
        </div>

    </div>
    <!-- Content Row -->


    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
