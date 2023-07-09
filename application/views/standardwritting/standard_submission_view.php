<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">View Submission</h1>
        <!-- <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url().'Admin/dashboard';?>" >Admin Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'Admin/task_recevied_list';?>" >Task Recevied for Review</a></li>
                <li class="breadcrumb-item active" aria-current="page">Task Recevied for Review</li>
                
            </ol>
        </nav> -->
    </div>
    <!-- Content Row -->
    <div class="row">
        <div class="col-12 mt-3">
            <div class="card border-top">
                <div class="card-body">
                    <div class="row">
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Name</label>
                            <div>
                                <p><?=$getData['user_name']?></p>
                            </div>
                        </div>
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Submission Id</label>
                            <div>
                                <p><?=$getData['id']?></p>
                            </div>
                        </div>
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Email</label>
                            <div>
                                <p><?=$getData['email']?></p>
                            </div>
                        </div>
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Contact</label>
                            <div>
                                <p><?=$getData['user_mobile']?></p>
                            </div>
                        </div>
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Timestamp</label>
                            <div>
                                <p><?= date("d-m-Y h:i:s", strtotime($getData['created_on']));?></p>
                            </div>
                        </div>
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Class</label>
                            <div>
                                <p><?=$getData['stdClubMemberClass']?></p>
                            </div>
                        </div>
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Member Id</label>
                            <div>
                                <p><?=$getData['member_id']?></p>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="card-header p-2" style="background-color: #cdd4e0; text-align: center;">
                    <h4 class="m-0">Task Details</h4>
                </div>
                <?php if ($getData['uploadtype']==1) {?>
                <div class="card-body">
                    <div class="row">
                        <div class="mb-12 col-md-12">
                            <label class="d-block text-font">Submission Details</label>
                            <div> 
                                <?php if (!empty($getData['details'])) {?>
                                <p><?=$getData['details']?></p>
                                <?php } else { echo "Not uploaded any Text Answer";}?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
                <?php if ($getData['uploadtype']==2) {?>
                <?php if ($getData['filetype']=='pdf') {?>
                <div class="card-body">
                    <div class="row">
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">View Pdf Submission Details</label>
                            <div>
                                <p>
                                    <?php if (!empty($getData['file'])) {?>
                                    <a href="<?= base_url()?><?=$getData['file']?>" target="_blank" class="btn btn-primary btn-sm">View PDF File </a>
                                    <?php } else { echo "Not uploaded any document Answer";}?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } } ?>
                <?php if ($getData['uploadtype']==2) {?>
                <?php if ($getData['filetype']=='image') {?>
                <div class="card-body">
                    <div class="row">
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">View Image Submission Details</label>
                            <div>
                                <?php if (!empty($getData['file'])) {?>
                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modal_1">
                                Preview
                                </button>
                                <?php } else { echo "Not uploaded any document Answer";}?>
                                <div class="modal fade"id="modal_1"tabindex="-1"aria-labelledby="exampleModalLabelImg"aria-hidden="true">
                                    <div class="modal-dialog" style="max-width:1000px;">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabelImg">Image Answer</h5>
                                                <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span></button>
                                            </div>
                                            <div class="modal-body">
                                                <img src="<?= base_url()?><?=$getData['file']?>" width="100%"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } } ?>
                
                
                <div class="col-md-12 submit_btn p-3">
                    <button onclick="history.back()" class="btn btn-primary btn-sm text-white submit">Back</button>
                </div>
                
            </div>
        </div>
    </div>
</div>