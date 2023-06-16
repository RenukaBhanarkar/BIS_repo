<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon">
            <img src="<?php echo base_url(); ?>assets/admin/img/bis_logo.png" width="80%">
        </div>
        <div class="sidebar-brand-text mx-3">Manak Rath</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url(); ?>admin/">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span> <?php
                if (encryptids("D", $_SESSION['admin_type']) == 1) { ?> Super Admin Dashboard <?php } else  if (encryptids("D", $_SESSION['admin_type']) == 2) { ?> Admin Dashboard <?php } else { ?> Sub Admin Dashboard<?php } ?>
            </span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">


    <!-- Nav Item - Pages Collapse Menu -->
   

    <!-- Nav Item - Utilities Collapse Menu -->
    <?php if (encryptids("D", $_SESSION['admin_type']) == 1 || encryptids("D", $_SESSION['admin_type']) == 2) {   ?>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fas fa-fw fa-wrench"></i>
                <span>User Management</span>
            </a>
            <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <?php if (encryptids("D", $_SESSION['admin_type']) == 1) {   ?>
                        <a class="collapse-item" href="<?php echo base_url(); ?>admin/admin_creation_list">Admin Creation</a>
                    <?php } ?>
                    <?php if (encryptids("D", $_SESSION['admin_type']) == 2) {   ?>
                        <a class="collapse-item" href="<?php echo base_url(); ?>subadmin/admin_creation_list">Subadmin Creation</a>
                    <?php } ?>

                </div>
            </div>
        </li>
        <?php if (encryptids("D", $_SESSION['admin_type']) == 1) {   ?>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities_1" aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fas fa-fw fa-wrench"></i>
                <span>Log Reports</span>
            </a>
            <div id="collapseUtilities_1" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <?php if (encryptids("D", $_SESSION['admin_type']) == 1) {   ?>
                        <a class="collapse-item" href="<?php echo base_url(); ?>admin/login_report_list">Login Report</a>
                    <?php } ?>
                    <?php if (encryptids("D", $_SESSION['admin_type']) == 1) {   ?>
                        <a class="collapse-item" href="<?php echo base_url(); ?>admin/log_report_list">Logs Report</a>
                    <?php } ?>

                </div>
            </div>
        </li>
        <?php } ?>
    <?php } ?>


    <?php if (encryptids("D", $_SESSION['admin_type']) == 2 || encryptids("D", $_SESSION['admin_type']) == 3) {   ?>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                <i class="fas fa-fw fa-folder"></i>
                <span>Exchange Forum</span>
            </a>

            <!-- <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">

                    <h6 class="collapse-header">Standards Club</h6>
                    <a class="collapse-item" href="<?php echo base_url(); ?>quiz/organizing_quiz">Competitions</a>
                    <a class="collapse-item" href="#">Wall of Wisdom</a>
                    <a class="collapse-item" href="#">Your Wall</a>
                    <a class="collapse-item" href="#">learning Science via Standards</a>
                    <a class="collapse-item" href="#">By the Mentors</a>
                    <a class="collapse-item" href="<?php echo base_url(); ?>admin/cmsManagenent_dashboard">CMS</a>
                    <a class="collapse-item" href="#">Winners Wall</a>
                    <h6 class="collapse-header">Standards Making</h6>
                    <a class="collapse-item" href="#">Shared your through</a>
                    <a class="collapse-item" href="#">Join the Class Room</a>
                    <a class="collapse-item" href="#">In Conversation with Expert</a>
                </div>
            </div> -->
            <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">

                    <h6 class="collapse-header">Standards Club</h6>
                    <a class="collapse-item" href="<?php echo base_url(); ?>quiz/organizing_quiz">Competitions</a>
                    <a class="collapse-item" href="<?php echo base_url(); ?>wall_of_wisdom">Wall of Wisdom</a>
                    <a class="collapse-item" href="<?php echo base_url(); ?>admin/your_wall_list/">Your Wall</a>
                    <a class="collapse-item" href="<?php echo base_url(); ?>learningscience/lsv_standards_dashboard/">Classroom</a>
                    <a class="collapse-item" href="<?php echo base_url(); ?>admin/byTheMentors">By the Mentors</a>
                    <a class="collapse-item" href="<?php echo base_url(); ?>admin/cmsManagenent_dashboard">CMS</a>
                    <a class="collapse-item" href="<?php echo base_url(); ?>subadmin/winner_wall">Winners Wall</a>
                    <h6 class="collapse-header">Standards Making</h6>
                    <a class="collapse-item" href="#">Shared your through</a>
                    <a class="collapse-item" href="<?php echo base_url(); ?>Standardsmaking/join_the_classroom_dashboard">Join the Class Room</a>
                    <a class="collapse-item" href="<?php echo base_url(); ?>Standardsmaking/conversation_dashboard">In Conversation with Expert</a>
                </div>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages_1" aria-expanded="true" aria-controls="collapsePages">
                <i class="fas fa-fw fa-folder"></i>
                <span>Evaluator Dashboard</span>
            </a>

            
            <div id="collapsePages_1" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">

                    <!-- <h6 class="collapse-header">Standards Club</h6> -->
                    <a class="collapse-item" href="<?php echo base_url(); ?>Miscellaneouscompetition/task_recevied_list">Miscellaneous Competition</a>
                    <a class="collapse-item" href="<?php echo base_url(); ?>Miscellaneouscompetition/task_reviewed">Standard Writing Competition</a>
                    
                </div>
            </div>
        </li>
    <?php } ?>



    <!-- <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#quizPages"
        aria-expanded="true" aria-controls="collapsePages">
        <i class="fas fa-fw fa-folder"></i>
        <span>Quiz Dashboard</span>
    </a>
    <div id="quizPages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Create Quiz </h6>
            <a class="collapse-item" href="#">Manage Quiz</a>
        </div>
    </div>
</li> -->




    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>


</ul>