<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">News and Events</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url().'Admin/dashboard';?>" >Sub Admin Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'admin/exchange_forum';?>" >Exchange Forum</a></li>
                <li class="breadcrumb-item active" aria-current="page">News and Events</li>
                
            </ol>
        </nav>
        <!-- <h1 class="h3 mb-0 text-gray-800"><a class="btn btn-primary btn-sm text-white" onclick="location.href='<?php echo base_url();?>admin/Manage_session_list'">Back</a></h1> -->
        
    </div>
    
    
    <!-- Content Row -->
    <div class="row">
       <div class="col-xl-3 col-md-6 mb-4">
            <a href="<?php echo base_url(); ?>admin/letest_news">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center d-flex">
                            <h5 class="font-weight-bold text-success mb-1">Latest News</h5>
                            
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <a href="<?php echo base_url(); ?>admin/upcoming_events">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center d-flex">
                            <h5 class="font-weight-bold text-warning mb-1">Upcoming Events</h5>
                            
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