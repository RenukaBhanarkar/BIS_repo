<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Join the Class Room</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url().'Admin/dashboard';?>" >Sub Admin Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'admin/exchange_forum';?>" >Exchange Forum</a></li>
                <li class="breadcrumb-item active" aria-current="page">Join the Class Room</li>
                
            </ol>
        </nav>
        <!-- <h1 class="h3 mb-0 text-gray-800"><a class="btn btn-primary btn-sm text-white" onclick="location.href='<?php echo base_url();?>admin/Manage_session_list'">Back</a></h1> -->
        
    </div>
    
    
    <!-- Content Row -->
    <div class="row">
        <?php if (encryptids("D", $_SESSION['admin_type']) == 3) { ?>
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="<?php echo base_url(); ?>Standardsmaking/live_session_list">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center d-flex">
                            <h5 class="font-weight-bold text-success mb-1">Create new post/ live session</h5>
                            
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <a href="<?php echo base_url(); ?>Standardsmaking/manage_session_list">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center d-flex">
                            <h5 class="font-weight-bold text-warning mb-1">Manage session/Post</h5>
                            
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <?php }?>
        <!-- Earnings (Monthly) Card Example -->
        <?php if (encryptids("D", $_SESSION['admin_type']) == 2) { ?>
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="<?php echo base_url(); ?>admin/manage_session_list">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center d-flex">
                            <h5 class="font-weight-bold text-warning mb-1">Manage session/Post</h5>
                            
                        </div>
                    </div>
                </div>
            </a>
        </div>
         <?php }?>

        <div class="col-xl-3 col-md-6 mb-4">
            <a href="<?php echo base_url(); ?>Standardsmaking/publish_list">
                <div class="card border-left-pri
                mary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center d-flex">
                            <h5 class="font-weight-bold text-danger mb-1">Published Posts</h5>
                            
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="<?php echo base_url(); ?>Standardsmaking/live_session_archived">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center d-flex">
                            <h5 class="font-weight-bold text-warning mb-1">Archived Posts</h5>
                            
                        </div>
                    </div>
                </div>
            </a>
        </div>
        
        
    </div>
</div>
<div class="col-md-12 submit_btn p-3" >
                               <a class="btn btn-primary btn-sm text-white" style=" margin-right: 37px;" onclick="history.back()">Back</a>
                          </div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->