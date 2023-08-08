<!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">CMS Management</h1>
            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
            <?php if (encryptids("D", $_SESSION['admin_type']) == 3) { ?>
            <li class="breadcrumb-item"><a href="<?php echo base_url().'Admin/dashboard';?>" >Sub Admin Dashboard</a></li>
            <?php }else{ ?>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'Admin/dashboard';?>" >Admin Dashboard</a></li>
                <?php } ?>
  <li class="breadcrumb-item active" aria-current="page"><a href="<?php echo base_url().'admin/exchange_forum';?>" >Exchange Forum</a></li>
  <li class="breadcrumb-item active" aria-current="page"><a href="<?php echo base_url().'admin/cmsManagenent_dashboard';?>" >CMS</a></li>
            </ol>
        </nav>
           
        </div>
       
       
        <!-- Content Row -->
        <div class="row">
        <?php if (encryptids("D", $_SESSION['admin_type']) == 3) { ?>
        <?php  if(in_array(21,$permissions)){ ?>
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <a href="<?php echo base_url(); ?>admin/banner_image_list">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center d-flex">
                            <h5 class="font-weight-bold text-success mb-1">Banner Image</h5>
                          

                        </div>
                    </div>
                </div>
                </a>
            </div>
            <?php } }else if(encryptids("D", $_SESSION['admin_type']) == 2){?>
                <div class="col-xl-3 col-md-6 mb-4">
                <a href="<?php echo base_url(); ?>admin/banner_image_list">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center d-flex">
                            <h5 class="font-weight-bold text-success mb-1">Banner Image</h5>
                          

                        </div>
                    </div>
                </div>
                </a>
            </div>
            <?php } ?>

            <!-- Earnings (Monthly) Card Example -->
            <?php if (encryptids("D", $_SESSION['admin_type']) == 3) { ?>
        <?php  if(in_array(22,$permissions)){ ?>
            <div class="col-xl-3 col-md-6 mb-4">
                <a href="<?php echo base_url(); ?>admin/about_exchange_forum">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center d-flex">
                            <h5 class="font-weight-bold text-warning mb-1">About Manak Rath</h5>
                            

                        </div>
                    </div>
                </div>
                </a>
            </div>
            <?php } }else if(encryptids("D", $_SESSION['admin_type']) == 2){ ?>
                <div class="col-xl-3 col-md-6 mb-4">
                <a href="<?php echo base_url(); ?>admin/about_exchange_forum">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center d-flex">
                            <h5 class="font-weight-bold text-warning mb-1">About Exchange forum</h5>
                            

                        </div>
                    </div>
                </div>
                </a>
            </div>
                <?php } ?>

            <?php if (encryptids("D", $_SESSION['admin_type']) == 3) { ?>
            <?php  if(in_array(23,$permissions)){ ?>
            <div class="col-xl-3 col-md-6 mb-4">
                <a href="<?php echo base_url(); ?>admin/contact_us">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center d-flex">
                            <h5 class="font-weight-bold text-secondary mb-1">Contact Us</h5>
                            

                        </div>
                    </div>
                </div>
                </a>
            </div>
            <?php } }else if(encryptids("D", $_SESSION['admin_type']) == 2){ ?>
                <div class="col-xl-3 col-md-6 mb-4">
                <a href="<?php echo base_url(); ?>admin/contact_us">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center d-flex">
                            <h5 class="font-weight-bold text-secondary mb-1">Contact Us</h5>
                            

                        </div>
                    </div>
                </div>
                </a>
            </div>
                <?php } ?>

            <?php if (encryptids("D", $_SESSION['admin_type']) == 3) { ?>
            <?php  if(in_array(24,$permissions)){ ?>
            <div class="col-xl-3 col-md-6 mb-4">
                <a href="<?php echo base_url(); ?>admin/footer_links">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center d-flex">
                            <h5 class="font-weight-bold text-danger mb-1">Footer Links</h5>
                           

                        </div>
                    </div>
                </div>
                </a>
            </div>
            <?php } }else if(encryptids("D", $_SESSION['admin_type']) == 2){ ?>
                <div class="col-xl-3 col-md-6 mb-4">
                <a href="<?php echo base_url(); ?>admin/footer_links">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center d-flex">
                            <h5 class="font-weight-bold text-danger mb-1">Footer Links</h5>
                           

                        </div>
                    </div>
                </div>
                </a>
            </div>
                <?php } ?>


            <?php if (encryptids("D", $_SESSION['admin_type']) == 3) { ?>
            <?php  if(in_array(25,$permissions)){ ?>
            <div class="col-xl-3 col-md-6 mb-4">
                <a href="<?php echo base_url(); ?>admin/gallery">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center d-flex">
                            <h5 class="font-weight-bold text-dark mb-1">Gallery</h5>
                           
                        </div>
                    </div>
                </div>
                </a>
            </div>
            <?php } }else if(encryptids("D", $_SESSION['admin_type']) == 2){ ?>
                <div class="col-xl-3 col-md-6 mb-4">
                <a href="<?php echo base_url(); ?>admin/gallery">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center d-flex">
                            <h5 class="font-weight-bold text-dark mb-1">Gallery</h5>
                           
                        </div>
                    </div>
                </div>
                </a>
            </div>
                <?php } ?>

            <?php if (encryptids("D", $_SESSION['admin_type']) == 3) { ?>
            <?php  if(in_array(26,$permissions)){ ?>
            <div class="col-xl-3 col-md-6 mb-4">
                <a href="<?php echo base_url(); ?>admin/feedback">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center d-flex">
                            <h5 class="font-weight-bold text-teal mb-1">Feedback</h5>
                           
                        </div>
                    </div>
                </div>
                </a>
            </div>
            
            <?php } }else if(encryptids("D", $_SESSION['admin_type']) == 2){ ?>
                <div class="col-xl-3 col-md-6 mb-4">
                <a href="<?php echo base_url(); ?>admin/feedback">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center d-flex">
                            <h5 class="font-weight-bold text-teal mb-1">Feedback</h5>
                           
                        </div>
                    </div>
                </div>
                </a>
            </div>
                <?php } ?>




                <?php if (encryptids("D", $_SESSION['admin_type']) == 3) { ?>
            <?php  if(in_array(41,$permissions)){ ?>
                <div class="col-xl-3 col-md-6 mb-4">
                <a href="<?php echo base_url(); ?>cms/consumer_list">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center d-flex">
                            <h5 class="font-weight-bold text-teal mb-1">Consumer and BIS</h5>
                           
                        </div>
                    </div>
                </div>
                </a>
            </div>
            <?php } }else if(encryptids("D", $_SESSION['admin_type']) == 2){ ?>
                <div class="col-xl-3 col-md-6 mb-4">
                <a href="<?php echo base_url(); ?>cms/consumer_list">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center d-flex">
                            <h5 class="font-weight-bold text-teal mb-1">Consumer and BIS</h5>
                           
                        </div>
                    </div>
                </div>
                </a>
            </div>
            <?php } ?>

            <?php if (encryptids("D", $_SESSION['admin_type']) == 3) { ?>
            <?php  if(in_array(42,$permissions)){ ?>
            <div class="col-xl-3 col-md-6 mb-4">
                <a href="<?php echo base_url(); ?>cms/standard_promotion_list">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center d-flex">
                            <h5 class="font-weight-bold text-teal mb-1">Standard Promotion</h5>
                           
                        </div>
                    </div>
                </div>
                </a>
            </div>
            <?php } }else if(encryptids("D", $_SESSION['admin_type']) == 2){ ?>
                <div class="col-xl-3 col-md-6 mb-4">
                <a href="<?php echo base_url(); ?>cms/standard_promotion_list">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center d-flex">
                            <h5 class="font-weight-bold text-teal mb-1">Standard Promotion</h5>
                           
                        </div>
                    </div>
                </div>
                </a>
            </div>
            <?php } ?>

            <?php if (encryptids("D", $_SESSION['admin_type']) == 3) { ?>
            <?php  if(in_array(43,$permissions)){ ?>
            <div class="col-xl-3 col-md-6 mb-4">
                <a href="<?php echo base_url(); ?>cms/about_standard_club">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center d-flex">
                            <h5 class="font-weight-bold text-teal mb-1">About Standard Club</h5>
                           
                        </div>
                    </div>
                </div>
                </a>
            </div>
            <?php } }else if(encryptids("D", $_SESSION['admin_type']) == 2){ ?>
                <div class="col-xl-3 col-md-6 mb-4">
                    <a href="<?php echo base_url(); ?>cms/about_standard_club">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center d-flex">
                                    <h5 class="font-weight-bold text-teal mb-1">About Standard Club</h5>
                                
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            <?php } ?>

            <?php if (encryptids("D", $_SESSION['admin_type']) == 3) { ?>
            <?php  if(in_array(44,$permissions)){ ?>
            <div class="col-xl-3 col-md-6 mb-4">
                <a href="<?php echo base_url(); ?>cms/learning_science_via">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center d-flex">
                            <h5 class="font-weight-bold text-teal mb-1">Learning Science via Standards</h5>
                           
                        </div>
                    </div>
                </div>
                </a>
            </div>
            <?php } }else if(encryptids("D", $_SESSION['admin_type']) == 2){ ?>
                <div class="col-xl-3 col-md-6 mb-4">
                <a href="<?php echo base_url(); ?>cms/learning_science_via">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center d-flex">
                            <h5 class="font-weight-bold text-teal mb-1">Learning Science via Standards</h5>
                           
                        </div>
                    </div>
                </div>
                </a>
            </div>
            <?php } ?>







            <?php if (encryptids("D", $_SESSION['admin_type']) == 3) { ?>
            <?php  if(in_array(27,$permissions)){ ?>
            <!-- <div class="col-xl-3 col-md-6 mb-4">
                <a href="<?php echo base_url(); ?>admin/letest_news">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center d-flex">
                            <h5 class="font-weight-bold text-danger mb-1">Latest News</h5>
                           
                        </div>
                    </div>
                </div>
                </a>
            </div> -->
            <?php } }else if(encryptids("D", $_SESSION['admin_type']) == 2){ ?>
                <div class="col-xl-3 col-md-6 mb-4">
                <a href="<?php echo base_url(); ?>admin/letest_news">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center d-flex">
                            <h5 class="font-weight-bold text-danger mb-1">Latest News</h5>
                           
                        </div>
                    </div>
                </div>
                </a>
            </div>
                <?php } ?>
            <?php if (encryptids("D", $_SESSION['admin_type']) == 3) { ?>
            <?php  if(in_array(28,$permissions)){ ?>
            <!-- <div class="col-xl-3 col-md-6 mb-4">
                <a href="<?php echo base_url(); ?>admin/upcoming_events">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center d-flex">
                            <h5 class="font-weight-bold text-teal mb-1">Upcoming Events</h5>
                           
                        </div>
                    </div>
                </div>
                </a>
            </div> -->
            <?php } }else if(encryptids("D", $_SESSION['admin_type']) == 2){ ?>
                <div class="col-xl-3 col-md-6 mb-4">
                <a href="<?php echo base_url(); ?>admin/upcoming_events">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center d-flex">
                            <h5 class="font-weight-bold text-teal mb-1">Upcoming Events</h5>
                           
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