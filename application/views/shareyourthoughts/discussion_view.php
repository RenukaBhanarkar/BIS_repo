<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Discussion Foram View</h1>
        
    </div>
    <!-- Content Row -->
    <div class="row">
        <div class="col-12 mt-3">
            <div class="card border-top">
                <div class="card-body">
                    
                    <div class="row">
                        <div class="mb-2 col-md-12">
                            <label class="d-block text-font">Title</label>
                            <div>
                                <p><?= $getData['title']?></p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-2 col-md-12">
                            <label class="d-block text-font">Description</label>
                            <div>
                                <p><?= $getData['description']?></p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-2 col-md-12">
                            <label class="d-block text-font">Thumbnail Image</label>
                            <div>
                                <img src="<?= base_url()?><?= $getData['image']?>" alt="#" class=""style="width: 200px;">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-2 col-md-6">
                            <label class="d-block text-font">Start date</label>
                            <div>
                                <p><?= $getData['start_date']?></p>
                            </div>
                        </div>
                        <div class="mb-2 col-md-6">
                            <label class="d-block text-font">End Date</label>
                            <div>
                                <p><?= $getData['end_date']?></p>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="col-md-12 submit_btn p-3">
                    <a class="btn btn-primary btn-sm text-white" onclick="location.href='<?php echo base_url();?>Shareyourthoughts/manage_discussion_list'">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
