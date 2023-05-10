    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">In Conversation with Expert</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url().'Admin/dashboard';?>" >Sub Admin Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'admin/exchange_forum';?>" >Exchange Forum</a></li>
                <li class="breadcrumb-item active" aria-current="page">In Conversation with Expert</li>
                
                </ol>
            </nav>
           
        </div>
       
       
        <!-- Content Row -->
        <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <a href="<?php echo base_url().'Standardsmaking/conversation_list'; ?>">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center d-flex">
                            <h5 class="font-weight-bold text-success mb-1">In Conversation with Expert</h5>
                            

                        </div>
                    </div>
                </div>
                </a>
            </div>

            <!-- Earnings (Monthly) Card Example -->
             <?php if (encryptids("D", $_SESSION['admin_type']) == 3  ){ ?>
            <div class="col-xl-3 col-md-6 mb-4">
                <a href="<?php echo base_url().'Standardsmaking/conversation_Archives'; ?>">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center d-flex">
                            <h5 class="font-weight-bold text-warning mb-1">In Conversation with Expert Archives</h5>
                            

                        </div>
                    </div>
                </div>
                </a>
            </div>
        <?php }?>
</div>
       </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

