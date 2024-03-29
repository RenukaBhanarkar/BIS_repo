    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Exchange Forum</h1>
            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                <ol class="breadcrumb">
                <?php if (encryptids("D", $_SESSION['admin_type']) == 3) { ?>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'Admin/dashboard';?>" >Sub Admin Dashboard</a></li>
                <?php }else{ ?><?php } ?>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'Admin/dashboard';?>" >Admin Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Exchange Forum</li>
                
                </ol>
            </nav>
           
        </div>
       <!-- Content Row -->
        <div class="row standard_club">
            
                <h2 class="h3 mb-0 text-gray-800">Standards Club</h2>
           
         </div>   
        <div class="row mt-3">

            <!-- Earnings (Monthly) Card Example -->
            <!-- <div class="col-xl-3 col-md-6 mb-4">
                <a href="<?php echo base_url(); ?>quiz/organizing_quiz">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center d-flex">
                            <h5 class="font-weight-bold text-success mb-1">Quiz</h5>
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
                </a>
            </div> -->

            <!-- Earnings (Monthly) Card Example -->
            

            <?php if (encryptids("D", $_SESSION['admin_type']) == 3) { ?>
            <?php //if(in_array(1, $_SESSION['main_mod_per'])){ ?> 
            <div class="col-xl-3 col-md-6 mb-4">
                <a href="<?php echo base_url(); ?>quiz/organizing_quiz">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center d-flex">
                            <h5 class="font-weight-bold text-warning mb-1">Competitions</h5>
                            <!-- <i class="fas fa-dollar-sign fa-2x text-gray-300"></i> -->
                        </div>
                    </div>
                </div>
                </a>
            </div>
            <?php // } ?>
            <?php if(in_array(4, $_SESSION['main_mod_per'])){ ?> 
            <div class="col-xl-3 col-md-6 mb-4">
            <a href="<?php echo base_url().'wall_of_wisdom/'; ?>">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center d-flex">
                            <h5 class="font-weight-bold text-info mb-1">Wall of Wisdom</h5>
                            <!-- <i class="fas fa-dollar-sign fa-2x text-gray-300"></i> -->

                        </div>
                    </div>
                </div>
                </a>
            </div>
            <?php } ?>
            <?php if(in_array(5, $_SESSION['main_mod_per'])){ ?> 
            <div class="col-xl-3 col-md-6 mb-4">
            <a href="<?php echo base_url().'admin/your_wall_list/'; ?>">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center d-flex">
                            <h5 class="font-weight-bold text-success mb-1">Your Wall</h5>
                            <!-- <i class="fas fa-dollar-sign fa-2x text-gray-300"></i> -->

                        </div>
                    </div>
                </div>
                </a>
            </div>
            <?php } ?>
            <?php if(in_array(6, $_SESSION['main_mod_per'])){ ?> 
            <div class="col-xl-3 col-md-6 mb-4">
 
                <a href="<?php echo base_url().'learningscience/lsv_standards_dashboard/'; ?>">
 
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center d-flex">
                            <h5 class="font-weight-bold text-teal mb-1">Classroom</h5>
                            <!-- <i class="fas fa-dollar-sign fa-2x text-gray-300"></i> -->

                        </div>
                    </div>
                </div>
                </a>
            </div>
            <?php } ?>
            <?php if(in_array(7, $_SESSION['main_mod_per'])){ ?> 
            <div class="col-xl-3 col-md-6 mb-4">
            <a href="<?php echo base_url().'admin/byTheMentors/'; ?>">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center d-flex">
                            <h5 class="font-weight-bold text-info mb-1">By the Mentors</h5>
                            <!-- <i class="fas fa-dollar-sign fa-2x text-gray-300"></i> -->

                        </div>
                    </div>
                </div>
                </a>
            </div>
            <?php } ?>
            <?php if(in_array(8, $_SESSION['main_mod_per'])){ ?> 
            <div class="col-xl-3 col-md-6 mb-4">
                <a href="<?php echo base_url(); ?>admin/cmsManagenent_dashboard">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center d-flex">
                            <h5 class="font-weight-bold text-dark mb-1">Content Management System</h5>
                            <!-- <i class="fas fa-dollar-sign fa-2x text-gray-300"></i> -->

                        </div>
                    </div>
                </div>
                </a>
            </div>
            <?php } ?>
            <?php if(in_array(9, $_SESSION['main_mod_per'])){ ?> 
            <div class="col-xl-3 col-md-6 mb-4">
                <a href="<?php echo base_url().'winnerwall/winner_wall_dashbaord' ?>">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center d-flex">
                            <h5 class="font-weight-bold text-danger mb-1">Winners Wall</h5>
                            <!-- <i class="fas fa-dollar-sign fa-2x text-gray-300"></i> -->

                        </div>
                    </div>
                </div>
                </a>
            </div>
            <?php } ?>
            <?php } else { ?>
                
            <div class="col-xl-3 col-md-6 mb-4">
                <a href="<?php echo base_url(); ?>quiz/organizing_quiz">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center d-flex">
                            <h5 class="font-weight-bold text-warning mb-1">Competitions</h5>
                            <!-- <i class="fas fa-dollar-sign fa-2x text-gray-300"></i> -->
                        </div>
                    </div>
                </div>
                </a>
            </div>
           
           
            <div class="col-xl-3 col-md-6 mb-4">
            <a href="<?php echo base_url().'wall_of_wisdom/'; ?>">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center d-flex">
                            <h5 class="font-weight-bold text-info mb-1">Wall of Wisdom</h5>
                            <!-- <i class="fas fa-dollar-sign fa-2x text-gray-300"></i> -->

                        </div>
                    </div>
                </div>
                </a>
            </div>
          
            
            <div class="col-xl-3 col-md-6 mb-4">
            <a href="<?php echo base_url().'admin/your_wall_list/'; ?>">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center d-flex">
                            <h5 class="font-weight-bold text-success mb-1">Your Wall</h5>
                            <!-- <i class="fas fa-dollar-sign fa-2x text-gray-300"></i> -->

                        </div>
                    </div>
                </div>
                </a>
            </div>
            
            <div class="col-xl-3 col-md-6 mb-4">
 
                <a href="<?php echo base_url().'learningscience/lsv_standards_dashboard/'; ?>">
 
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center d-flex">
                            <h5 class="font-weight-bold text-teal mb-1">Classroom</h5>
                            <!-- <i class="fas fa-dollar-sign fa-2x text-gray-300"></i> -->

                        </div>
                    </div>
                </div>
                </a>
            </div>
           
            <div class="col-xl-3 col-md-6 mb-4">
            <a href="<?php echo base_url().'admin/byTheMentors/'; ?>">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center d-flex">
                            <h5 class="font-weight-bold text-info mb-1">By the Mentors</h5>
                            <!-- <i class="fas fa-dollar-sign fa-2x text-gray-300"></i> -->

                        </div>
                    </div>
                </div>
                </a>
            </div>
          
            <div class="col-xl-3 col-md-6 mb-4">
                <a href="<?php echo base_url(); ?>admin/cmsManagenent_dashboard">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center d-flex">
                            <h5 class="font-weight-bold text-dark mb-1">Content Management System</h5>
                            <!-- <i class="fas fa-dollar-sign fa-2x text-gray-300"></i> -->

                        </div>
                    </div>
                </div>
                </a>
            </div>
           
            <div class="col-xl-3 col-md-6 mb-4">
                <a href="<?php echo base_url().'winnerwall/winner_wall_list' ?>">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center d-flex">
                            <h5 class="font-weight-bold text-danger mb-1">Winners Wall</h5>
                            <!-- <i class="fas fa-dollar-sign fa-2x text-gray-300"></i> -->

                        </div>
                    </div>
                </div>
                </a>
            </div>
            

            <?php } ?>
         </div>
         <div class="row standard_club">
            
                <h2 class="h3 mb-0 text-gray-800">World of Standards</h2>
           
         </div> 
            <div class="row mt-3"> 
            <?php if (encryptids("D", $_SESSION['admin_type']) == 3) { ?>
            <?php if(in_array(10, $_SESSION['main_mod_per'])){ ?>              
            <div class="col-xl-3 col-md-6 mb-4">
                <a href="<?php echo base_url(); ?>Shareyourthoughts/share_your_thoughts_dashboard">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center d-flex">
                            <h5 class="font-weight-bold text-danger mb-1">Share your thoughts</h5>
                            <!-- <i class="fas fa-dollar-sign fa-2x text-gray-300"></i> -->
                        </div>
                    </div>
                </div>
                </a>
            </div>
            <?php } ?>
            <?php if(in_array(11, $_SESSION['main_mod_per'])){ ?> 
            <div class="col-xl-3 col-md-6 mb-4">
                <a href="<?php echo base_url(); ?>Standardsmaking/join_the_classroom_dashboard">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center d-flex">
                            <h5 class="font-weight-bold text-success mb-1">Join the Class Room</h5>
                            <!-- <i class="fas fa-dollar-sign fa-2x text-gray-300"></i> -->

                        </div>
                    </div>
                </div>
                </a>
            </div>
            <?php } ?>
            <?php if(in_array(12, $_SESSION['main_mod_per'])){ ?> 
            <div class="col-xl-3 col-md-6 mb-4">
                <a href="<?php echo base_url().'Standardsmaking/conversation_dashboard'; ?>">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center d-flex">
                            <h5 class="font-weight-bold text-primary mb-1">In Conversation with Expert</h5>
                            <!-- <i class="fas fa-dollar-sign fa-2x text-gray-300"></i> -->

                        </div>
                    </div>
                </div>
                </a>
            </div>
            <?php } ?>
            <?php if(in_array(13, $_SESSION['main_mod_per'])){ ?>
                <div class="col-xl-3 col-md-6 mb-4">
                <a href="<?php echo base_url().'admin/news_event_dashboard'; ?>"> 
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center d-flex">
                            <h5 class="font-weight-bold text-success mb-1">News and Events</h5>
                            <!-- <i class="fas fa-dollar-sign fa-2x text-gray-300"></i> -->
                        </div>
                    </div>
                </div>
                </a>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <a href="<?php echo base_url().'subadmin/WordOfStandardBanner'; ?>"> 
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center d-flex">
                            <h5 class="font-weight-bold text-secondary mb-1">Banner Image world of standard</h5>
                            <!-- <i class="fas fa-dollar-sign fa-2x text-gray-300"></i> -->
                        </div>
                    </div>
                </div>
                </a>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <a href="<?php echo base_url().'membership_panel/working_panel_dashboard'; ?>"> 
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center d-flex">
                            <h5 class="font-weight-bold text-success mb-1">Offers for the Membership of Working Panels</h5>
                            <!-- <i class="fas fa-dollar-sign fa-2x text-gray-300"></i> -->
                        </div>
                    </div>
                </div>
                </a>
            </div>
            <?php } ?>
           <?php }else{  ?> 
                      
            <div class="col-xl-3 col-md-6 mb-4">
                <a href="<?php echo base_url(); ?>Shareyourthoughts/share_your_thoughts_dashboard">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center d-flex">
                            <h5 class="font-weight-bold text-danger mb-1">Share your thoughts</h5>
                            <!-- <i class="fas fa-dollar-sign fa-2x text-gray-300"></i> -->
                        </div>
                    </div>
                </div>
                </a>
            </div>
            
            
            <div class="col-xl-3 col-md-6 mb-4">
                <a href="<?php echo base_url(); ?>Standardsmaking/join_the_classroom_dashboard">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center d-flex">
                            <h5 class="font-weight-bold text-success mb-1">Join the Class Room</h5>
                            <!-- <i class="fas fa-dollar-sign fa-2x text-gray-300"></i> -->

                        </div>
                    </div>
                </div>
                </a>
            </div>
           
            
            <div class="col-xl-3 col-md-6 mb-4">
                <a href="<?php echo base_url().'Standardsmaking/conversation_dashboard'; ?>">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center d-flex">
                            <h5 class="font-weight-bold text-primary mb-1">In Conversation with Expert</h5>
                            <!-- <i class="fas fa-dollar-sign fa-2x text-gray-300"></i> -->

                        </div>
                    </div>
                </div>
                </a>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <a href="<?php echo base_url().'subadmin/WordOfStandardBanner'; ?>"> 
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center d-flex">
                            <h5 class="font-weight-bold text-danger mb-1">Banner Image world of standard</h5>
                            <!-- <i class="fas fa-dollar-sign fa-2x text-gray-300"></i> -->
                        </div>
                    </div>
                </div>
                </a>
            </div>
            
            <?php } ?>
          </div>
       </div>
       <div class="col-md-12 submit_btn p-3" style="margin-left: -63px;">
                               <a class="btn btn-primary btn-sm text-white" onclick="history.back()">Back</a>
                          </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

