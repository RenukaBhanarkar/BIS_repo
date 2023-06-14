<div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Classroom view</h1>
                        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url().'Admin/dashboard';?>" >Sub Admin Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'admin/exchange_forum';?>" >Exchange Forum</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'learningscience/lsv_standards_dashboard';?>" >Classroom</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'learningscience/lsv_standards_list';?>" >Create new</a></li>
                <li class="breadcrumb-item active" aria-current="page">Classroom view</li>
                
            </ol>
        </nav>
                        
                    </div>
<!-- Content Row -->
                    <div class="row"> 
                        <div class="col-12 mt-3">
                        <div class="card border-top">
                           <div class="card-body"> 
                            <div class="row">
                               <div class="mb-2 col-md-12">
                                    <label class="d-block text-font">Type of Post</label>
                                    <div>
                                        <p> 
                                            <?php 
                                            if ($lsvStandardsView['type_of_post']==1) {  $data='Text Upload'; }
                                            if ($lsvStandardsView['type_of_post']==2) { $data='Video Upload'; }
                                            if ($lsvStandardsView['type_of_post']==3) { $data='Live session link'; }
                                            echo  $data;
                                            ?> 
                                        </p>
                                    </div>    
                                </div>
                            </div>    
                            <div class="row">   
                                <div class="mb-2 col-md-12">
                                    <label class="d-block text-font">Title</label>
                                    <div>
                                        <p><?= $lsvStandardsView['title']?></p>
                                    </div>    
                                </div>
                            </div>
                            <div class="row">   
                                <div class="mb-2 col-md-12">
                                    <label class="d-block text-font">Description</label>
                                    <div>
                                        <p><?= $lsvStandardsView['description']?></p>
                                    </div>    
                                </div>
                            </div>
                            <div class="row">   
                                    <div class="mb-2 col-md-12">
                                        <label class="d-block text-font">Thumbnail Image</label>
                                        <div>
                                            <img src="<?= base_url()?><?= $lsvStandardsView['thumbnail']?>" alt="#" class=""style="width: 200px;">
                                        </div> 
                                    </div>
                                </div>

                             <?php 
                             if ($lsvStandardsView['type_of_post']==1) { ?>
                                <div class="row">   
                                    <div class="mb-2 col-md-12">
                                        <label class="d-block text-font">View Image</label>
                                        <div>
                                            <img src="<?= base_url()?><?= $lsvStandardsView['image']?>" alt="#" class="" style="width: 200px;">
                                        </div> 
                                    </div>
                                </div>
                                <?php if (!empty($lsvStandardsView['doc_pdf'])) {?>
                                    <div class="row">   
                                    <div class="mb-2 col-md-12">
                                        <label class="d-block text-font btn-sm">View PDF</label>
                                        <div> 
                                            <a href="<?= base_url()?><?= $lsvStandardsView['doc_pdf']?>" class="btn btn-primary btn-sm" target="_blank">View PDF</a>
                                        </div> 
                                    </div>
                                </div>
                               <?php }?>

                                
                            <?php }?>
                            <?php 
                             if ($lsvStandardsView['type_of_post']==2) {?>
                                <div class="row">   
                                <div class="mb-2 col-md-12">
                                    <label class="d-block text-font">Upload Thumbnail</label>
                                    <div>
                                    <video width="100%" height="100%" controls>
                                            <source src="<?= base_url()?><?= $lsvStandardsView['video']?>" type="video/mp4">
                                            <source src="movie.ogg" type="video/ogg">
                                           
                                    </video>
                                    </div>    
                                </div>
                            </div>
                        <?php } ?>
                        <?php 
                        if ($lsvStandardsView['type_of_post']==3) { ?>
                            <div class="row">   
                                <div class="mb-2 col-md-12">
                                    <label class="d-block text-font">Live Session Link</label>
                                    <div>
                                        <p><?= $lsvStandardsView['session_link']?></p>
                                    </div>    
                                </div>
                            </div>

                        <?php } ?>
                    </div>
                          <div class="col-md-12 submit_btn p-3">
                          <button onclick="history.back()" class="btn btn-primary btn-sm text-white submit">Back</button>
                          </div>  
                        </div> 
                      </div>
                    </div>
                    </div>


            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
           