<div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">In Conversation with Expert View</h1>
                        <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url().'Admin/dashboard';?>" >Sub Admin Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'admin/exchange_forum';?>" >Exchange Forum</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'Standardsmaking/conversation_dashboard';?>" >In Conversation with Expert</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'Standardsmaking/conversation_list';?>" >Conversation List</a></li>
                <li class="breadcrumb-item active" aria-current="page">Conversation View</li>
                
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
                                    <label class="d-block text-font">Title of Video</label>
                                    <div>
                                        <p><?= $conversationdata['title']?></p> 
                                    </div>    
                                </div>
                            </div>    
                            <div class="row">   
                                <div class="mb-2 col-md-12">
                                    <label class="d-block text-font">About Video (Description)</label>
                                    <div>
                                        <p><?= $conversationdata['description']?></p>
                                    </div>    
                                </div>
                            </div>
                            <div class="row">   
                                <div class="mb-2 col-md-12">
                                    <label class="d-block text-font">Upload Thumbnail</label>
                                    <div> 
                                        <img src="<?= base_url()?><?= $conversationdata['video_thumbnail']?>" style="width: 200px;height: 200px;">
                                    
                                    </div>    
                                </div>
                            </div>
                            <div class="row">   
                                <div class="mb-2 col-md-12">
                                    <label class="d-block text-font">Upload Video</label>
                                    <div>
                                    <video width="100%" height="100%" controls>
                                        <source src="<?= base_url()?><?= $conversationdata['video']?>" type="video/mp4">
                                        <source src="<?= base_url()?><?= $conversationdata['video']?>" type="video/ogg">
                                        </video>
                                    </div>    
                                </div>
                            </div>
                       </div>
                          <div class="col-md-12 submit_btn p-3">
                               <a class="btn btn-primary btn-sm text-white" onclick="location.href='<?php echo base_url();?>Standardsmaking/conversation_list'">Back</a>
                          </div>  
                        </div> 
                      </div>
                    </div>
                    </div>


            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
           