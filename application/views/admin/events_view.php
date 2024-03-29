<div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Event</h1>
                        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url().'admin/';?>" >Home</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="<?php echo base_url().'admin/exchange_forum';?>" >Exchange Forum</a></li>
                <!-- <li class="breadcrumb-item active" aria-current="page"><a href="<?php echo base_url().'admin/cmsManagenent_dashboard';?>" >CMS</a></li> -->
                <li class="breadcrumb-item active" aria-current="page"><a href="<?php echo base_url().'admin/news_event_dashboard';?>" >News and Events</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="<?php echo base_url().'admin/letest_news';?>" >Latest News</a></li>
                <li class="breadcrumb-item active" aria-current="page">View</li>
            </ol>
        </nav>
                        
        </div>
<!-- Content Row -->
<div class="row">
                        <div class="col-12 mt-3">
                        <div class="card border-top">
                           <div class="card-body"> 
                            <div class="row">
                               <div class="mb-2 col-md-4">
                                    <label class="d-block text-font">Title</label>
                                    <div>
                                        <p><?php echo $result['title']; ?></p>
                                    </div>    
                                </div>
                                <div class="mb-2 col-md-4">
                                    <label class="d-block text-font">Image</label>
                                    <div>
                                        <img src="<?php echo base_url().'uploads/cms/events/'.$result['thumbnail']; ?>" alt="Thumbnail Image" class="" width="50%">
                                    </div>    
                                </div>
                                <div class="mb-2 col-md-4">
                                    <label class="d-block text-font">Posted on</label>
                                    <div>
                                        <p><?php echo $result['created_on']; ?></p>
                                    </div>    
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-2 col-md-12">
                                    <label class="d-block text-font">Link</label>
                                    <div>
                                        <p><?php echo $result['link']; ?></p>
                                    </div>    
                                </div>
                            </div>
                          </div>
                          <div class="col-md-12 submit_btn p-3">
                               <a class="btn btn-primary btn-sm text-white" onclick="location.href='<?php echo base_url();?>admin/upcoming_events'">Back</a>
                          </div>  
                           <!-- Modal -->
                                 
                                      <!-- Modal -->
                        </div> 
                      </div>
                    </div>
                    </div>

