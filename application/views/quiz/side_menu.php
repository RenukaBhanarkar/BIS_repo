<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
    <div class="sidebar-brand-icon">
        <img src="<?php echo base_url(); ?>assets/admin/img/bis_logo.png" width="80%">
    </div>
    <div class="sidebar-brand-text mx-3">Welcom To BIS</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
    <a class="nav-link" href="<?php echo base_url();?>admin/">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>BIS Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">


<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
        aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-cog"></i>
        <span>Super Admin Dashboard</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?php echo base_url();?>admin/admin_creation_list">Admin Creation</a>
            <?php if (encryptids("D", $_SESSION['admin_type']) != 1) {   ?>
            <a class="collapse-item" href="#">Standard Club Members </a>
            <?php } ?>
        </div>
    </div>
</li>
<?php if (encryptids("D", $_SESSION['admin_type']) != 1) {   ?>
<!-- Nav Item - Utilities Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
        aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fas fa-fw fa-wrench"></i>
        <span>User Management</span>
    </a>
    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="#">Admin Creation</a>
            
            <a class="collapse-item" href="#">Sub Admin Creation</a>
            <a class="collapse-item" href="#">Public users</a>
            <a class="collapse-item" href="#">Standard Club Members</a>
         
        </div>
    </div>
</li>

<!-- Divider -->
<!-- <hr class="sidebar-divider"> -->

<!-- Heading -->
<!-- <div class="sidebar-heading">
    Addons
</div> -->

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
        aria-expanded="true" aria-controls="collapsePages">
        <i class="fas fa-fw fa-folder"></i>
        <span>Exchange Forum</span>
    </a>
    <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Quiz</h6>
            <a class="collapse-item" href="#">Discussion forum</a>
            <a class="collapse-item" href="#">Lecture series</a>
            <a class="collapse-item" href="#">Standard Writing</a>
            <!-- <div class="collapse-divider"></div>
            <h6 class="collapse-header">Other Pages:</h6> -->
            <a class="collapse-item" href="#">News and Events</a>
            <a class="collapse-item" href="#">Winners Wall </a>
        </div>
    </div>
</li>
<li class="nav-item">
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
</li>
<?php } ?>
<!-- Nav Item - Charts -->
<!-- <li class="nav-item">
    <a class="nav-link" href="charts.html">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Charts</span></a>
</li> -->

<!-- Nav Item - Tables -->


<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>


</ul>