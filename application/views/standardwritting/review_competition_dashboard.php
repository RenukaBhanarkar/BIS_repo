    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Review Competition Dashboard</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                <?php if (encryptids("D", $_SESSION['admin_type']) == 3) { ?>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'Admin/dashboard';?>" >Sub Admin Dashboard</a></li>
                <?php }else{ ?>
                    <li class="breadcrumb-item"><a href="<?php echo base_url().'Admin/dashboard';?>" >Admin Dashboard</a></li>
                <?php } ?>
                <!-- <li class="breadcrumb-item"><a href="<?php echo base_url().'Admin/dashboard';?>" >Sub Admin Dashboard</a></li> -->
                <li class="breadcrumb-item"><a href="<?php echo base_url().'admin/exchange_forum';?>" >Exchange Forum</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'quiz/organizing_quiz';?>" >Competition</a></li>
                <li class="breadcrumb-item active" aria-current="page">Review Competition Dashboard</li>
                
                </ol>
            </nav>
           
        </div>
       
       
        <!-- Content Row -->
        <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <a href="<?php echo base_url(); ?>Standardswritting/revised_competition_list">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center d-flex">
                            <h5 class="font-weight-bold text-danger mb-1">Competition Details To be Reviewed</h5>
                            

                        </div>
                    </div>
                </div>
                </a>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <a href="<?php echo base_url(); ?>Miscellaneouscompetition/CompetitionUnderReview">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center d-flex">
                            <h5 class="font-weight-bold text-success mb-1">Competition Under Review</h5>
                            

                        </div>
                    </div>
                </div>
                </a>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <a href="<?php echo base_url(); ?>Miscellaneouscompetition/CompetitionReviewed">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center d-flex">
                            <h5 class="font-weight-bold text-info mb-1">Competition Reviewed</h5>
                            

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

