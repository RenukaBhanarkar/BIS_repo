<div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Join the Class Room</h1>
                        <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url().'Admin/dashboard';?>" >Sub Admin Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'admin/exchange_forum';?>" >Exchange Forum</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'Standardsmaking/join_the_classroom_dashboard';?>" >Join the Class Room</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'Standardsmaking/live_session_list';?>" >Create new post/ live session</a></li>
                <!-- <li class="breadcrumb-item active" aria-current="page">Create new post/ live session</li> -->
                
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
                                            if ($liveSession['type_of_post']==1) {  $data='Text Upload'; }
                                            if ($liveSession['type_of_post']==2) { $data='Video Upload'; }
                                            if ($liveSession['type_of_post']==3) { $data='Live session link'; }
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
                                        <p><?= $liveSession['title']?></p>
                                    </div>    
                                </div>
                            </div>
                            <div class="row">   
                                <div class="mb-2 col-md-12">
                                    <label class="d-block text-font">Description</label>
                                    <div>
                                        <p><?= $liveSession['description']?></p>
                                    </div>    
                                </div>
                            </div>
                            <div class="row">   
                                    <div class="mb-2 col-md-12">
                                        <label class="d-block text-font">Thumbnail Image</label>
                                        <div>
                                            <img src="<?= base_url()?><?= $liveSession['thumbnail']?>" alt="#" class=""style="width: 200px;">
                                        </div> 
                                    </div>
                                </div>

                             <?php 
                             if ($liveSession['type_of_post']==1) { ?>
                                <div class="row">   
                                    <div class="mb-2 col-md-12">
                                        <label class="d-block text-font">View Image</label>
                                        <div>
                                            <img src="<?= base_url()?><?= $liveSession['image']?>" alt="#" class="" style="width: 200px;">
                                        </div> 
                                    </div>
                                </div>

                                <div class="row">   
                                    <div class="mb-2 col-md-12">
                                        <label class="d-block text-font">View PDF</label>
                                        <div> 
                                            <a href="<?= base_url()?><?= $liveSession['doc_pdf']?>" class="btn btn-primary" target="_blank">view PDF</a>
                                        </div> 
                                    </div>
                                </div>
                            <?php }?>
                            <?php 
                             if ($liveSession['type_of_post']==2) {?>
                                <div class="row">   
                                <div class="mb-2 col-md-12">
                                    <label class="d-block text-font">Upload Thumbnail</label>
                                    <div>
                                    <video width="100%" height="100%" controls>
                                            <source src="<?= base_url()?><?= $liveSession['video']?>" type="video/mp4">
                                            <source src="movie.ogg" type="video/ogg">
                                           
                                    </video>
                                    </div>    
                                </div>
                            </div>
                        <?php } ?>
                        <?php 
                        if ($liveSession['type_of_post']==3) { ?>
                            <div class="row">   
                                <div class="mb-2 col-md-12">
                                    <label class="d-block text-font">Live Session Link</label>
                                    <div>
                                        <p><?= $liveSession['session_link']?></p>
                                    </div>    
                                </div>
                            </div>

                        <?php } ?>
                    </div>
                          <div class="col-md-12 submit_btn p-3">
                               <a class="btn btn-primary btn-sm text-white" onclick="location.href='<?php echo base_url();?>Standardsmaking/live_session_list'">Back</a>
                          </div>  
                        </div> 
                      </div>
                    </div>
                    </div>


            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
           