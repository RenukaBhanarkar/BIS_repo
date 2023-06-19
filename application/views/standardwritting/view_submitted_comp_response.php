    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">View Response</h1>
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
                <li class="breadcrumb-item"><a href="<?php echo base_url().'Standardswritting/miscellaneous_dashboard';?>" >Miscellaneous Competition</a></li>
                <li class="breadcrumb-item active" aria-current="page">View Submission</li>
                
                </ol>
            </nav>
        </div>

        <!-- Content Row -->
       <div class="row">
            <div class="col-12 mt-3">
                <div class="card border-top card-body ">
                    <div class="col-md-12">
                        <div class="col-md-12">
                            <h3>Submited response</h3>
                        </div>
                        <div class="col-md-12">
                            <p><?php echo $response['answer_text']; ?></p>
                        </div>
                        
                    </div>
                    <div class="col-md-12">
                        <div class="col-md-12">
                            <h3>Submited Files</h3>
                        </div>
                        <div class="col-md-12">
                            <?php if(!($response['image']=="")){ ?>
                            <p><a class="btn btn-primary btn-sm text-white" href="<?php echo base_url().$response['image']; ?>" target="_blank">View Upload</a></p>
                            <?php } ?>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="col-md-12 submit_btn p-3">
            <button onclick="history.back()" class="btn btn-primary btn-sm text-white mr-3 mt-2">Back</button>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
    <!-- Modal -->
    