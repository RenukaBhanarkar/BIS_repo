<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.js"></script> -->
 <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css" /> -->
<style>
  
.World_of_standers_inner_Box {
    /* width: 23%; */
    background: white;
    margin: 0px 0px 30px;
    padding: 8px 8px 8px;
    border-radius: 2%;
    margin-right: 2%;

    position:relative;

}
.Title_Section {
    position: absolute;
    bottom: 8px;
    margin: 0px;
    background: rgb(201 0 5 / 74%);
    display: block;
    width: 94%;
    padding: 6px 10px;
    color: white;
    font-weight: 600;
    font-size: 15px;
    text-align: center;
}
.World_of_standers_image_box img {
    object-fit: cover;
    width: 100%;
}
.World_of_standers_inner_Box.shadow:hover {
    transition: all .5s;
    transform: scale(1.2);
}
.carousel-item {
    height: 420px !important;
    background-repeat: no-repeat;
    background-size: 100% 100%;
    background-position: 100%;
}
.nav-pills {
    border-bottom: 1px solid gray;
}
.news .nav-link.active {
    color: #0ea2bd;
    background: none;
    border-bottom: 3px solid #0ea2bd;
}
.nav-pills li+li {
    margin-left: 15px;
}
.news_events{
    background: white;
    box-shadow: 0px 0px 10px 0px lightgrey;
    border-radius: 7px;
    height: 409px;
    padding-top: -9px;
    margin-top: 12px;
    margin-left: -11px;
    margin-right: 14px;
}
.whats_new{
    padding: 13px;
    overflow: auto;
    height: 340px;
}
.get-started{
    font-size: 16px;
    font-weight: 400;
    display: inline-block;
    padding: 3px 16px;
    border-radius: 4px;
    transition: 0.5s;
    color: #ffffff;
    background: #ffc107;
    font-family: #ffc107;

}
.news_list a{
    word-break: break-all;
    color: blue;
}
.news_list h3{
    font-weight: 600;
    font-size: 17px;
}
</style>
<section>
    <div class=row>
    <div class="col-md-9">
    <div class="world_standard_banner">
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                    <?php  foreach($banner_data as $list=>$key){ ?>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="<?php echo $list; ?>" class="active" <?php if($list==0){ echo 'aria-current="true"';} ?> aria-label="Slide <?php echo $list=$list+1; ?>"></button>
                        <?php }?>
                        <!-- <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button> -->
                    </div>
                            <div class="carousel-inner">
                                <!-- <div class="carousel-item active">
                                <img src="<?=base_url();?>assets/images/banner1.jpg" class="d-block w-100 standard_banner_scroll" alt="...">
                                </div>
                                <div class="carousel-item">
                                <img src="<?=base_url();?>assets/images/banner2.jpg" class="d-block w-100 standard_banner_scroll" alt="...">
                                </div> -->
                                <?php  foreach($banner_data as $list=>$key){ ?>
                                <div class="carousel-item <?php if($list==0){echo "active"; } ?>">
                                <img src="<?=base_url().'uploads/cms/banner/'.$key['banner_images'];?>" class="d-block w-100 standard_banner_scroll"  alt="...">
                                </div>
                                <?php } ?>
                            </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                </div>

    </div>
    </div>
    <div class="col-md-3">
        <div class="news_events">
        <div class="news">
            <ul class="nav nav-pills mb-3" role="tablist">
              <li><a class="nav-link active" data-bs-toggle="pill" href="#tab1" aria-selected="true" role="tab" style="font-size: 20px; color: brown;">News</a></li>
              <li><a class="nav-link" data-bs-toggle="pill" href="#tab2" aria-selected="false" role="tab" tabindex="-1" style="font-size: 20px; color: brown;">Events</a></li>
            </ul>
        </div>
        <div class="tab-content">
                <div class="tab-pane fade active show" id="tab1" role="tabpanel">
                <div class="whats_new">
                    <div class="news_list">
                        <p><a href="http://43.231.124.177/BIS/BIS_repo/users/standard">Metropolitan Commissioner News And Events</a></p>
                        <p><strong>Date :</strong>12/03/2023</p>
                        <hr>
                        <p><a href="http://43.231.124.177/BIS/BIS_repo/users/standard">Metropolitan Commissioner News And Events</a></p>
                        <p><strong>Date :</strong>12/03/2023</p>
                        <hr>
                        <p><a href="http://43.231.124.177/BIS/BIS_repo/users/standard">Metropolitan Commissioner News And Events</a></p>
                        <p><strong>Date :</strong>12/03/2023</p>
                        <hr>
                        <p><a href="http://43.231.124.177/BIS/BIS_repo/users/standard">Metropolitan Commissioner News And Events</a></p>
                        <p><strong>Date :</strong>12/03/2023</p>
                        <hr>
                        <p><a href="http://43.231.124.177/BIS/BIS_repo/users/standard">Metropolitan Commissioner News And Events</a></p>
                        <p><strong>Date :</strong>12/03/2023</p>
                        <hr>
                        <p><a href="http://43.231.124.177/BIS/BIS_repo/users/standard">Metropolitan Commissioner News And Events</a></p>
                        <p><strong>Date :</strong>12/03/2023</p>
                        <hr>
                        <p><a href="http://43.231.124.177/BIS/BIS_repo/users/standard">Metropolitan Commissioner News And Events</a></p>
                        <p><strong>Date :</strong>12/03/2023</p>
                        <hr>
                        <p><a href="http://43.231.124.177/BIS/BIS_repo/users/standard">Metropolitan Commissioner News And Events</a></p>
                        <p><strong>Date :</strong>12/03/2023</p>
                        <hr>
                        <p><a href="http://43.231.124.177/BIS/BIS_repo/users/standard">Metropolitan Commissioner News And Events</a></p>
                        <p><strong>Date :</strong>12/03/2023</p>
                        <hr>
                    </div>
                    
                    
                    <div>
                        <a href="<?php echo base_url().'users/news_list'?>" class="btn-sm get-started" style="text-align: end;">View All</a>
                    </div>
                </div> 
                </div><!-- End Tab 1 Content -->

              <div class="tab-pane fade" id="tab2" role="tabpanel">
              <div class="whats_new">
                    <div class="news_list">
                        <p><a href="http://43.231.124.177/BIS/BIS_repo/users/standard">Metropolitan Commissioner News And Events</a></p>
                        <p><strong>Date :</strong>12/03/2023</p>
                        <hr>
                        <p><a href="http://43.231.124.177/BIS/BIS_repo/users/standard">Metropolitan Commissioner News And Events</a></p>
                        <p><strong>Date :</strong>12/03/2023</p>
                        <hr>
                        <p><a href="http://43.231.124.177/BIS/BIS_repo/users/standard">Metropolitan Commissioner News And Events</a></p>
                        <p><strong>Date :</strong>12/03/2023</p>
                        <hr>
                        <p><a href="http://43.231.124.177/BIS/BIS_repo/users/standard">Metropolitan Commissioner News And Events</a></p>
                        <p><strong>Date :</strong>12/03/2023</p>
                        <hr>
                        <p><a href="http://43.231.124.177/BIS/BIS_repo/users/standard">Metropolitan Commissioner News And Events</a></p>
                        <p><strong>Date :</strong>12/03/2023</p>
                        <hr>
                        <p><a href="http://43.231.124.177/BIS/BIS_repo/users/standard">Metropolitan Commissioner News And Events</a></p>
                        <p><strong>Date :</strong>12/03/2023</p>
                        <hr>
                        <p><a href="http://43.231.124.177/BIS/BIS_repo/users/standard">Metropolitan Commissioner News And Events</a></p>
                        <p><strong>Date :</strong>12/03/2023</p>
                        <hr>
                        <p><a href="http://43.231.124.177/BIS/BIS_repo/users/standard">Metropolitan Commissioner News And Events</a></p>
                        <p><strong>Date :</strong>12/03/2023</p>
                        <hr>
                        <p><a href="http://43.231.124.177/BIS/BIS_repo/users/standard">Metropolitan Commissioner News And Events</a></p>
                        <p><strong>Date :</strong>12/03/2023</p>
                        <hr>
                    </div>
                    
                    
                    <div>
                        <a href="<?php echo base_url().'users/news_list'?>" class="btn-sm get-started" style="text-align: end;">View All</a>
                    </div>
                </div>
               </div><!-- End Tab 2 Content -->
            </div>
    </div>
    </div>
    </div>
</section>
<section id="quality-outer my-5" style="padding-top: 49px;">
    <div class="quality_section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                   <div class="World_of_standers_inner_Box  shadow">
                    <a href="<?php echo base_url().'users/meeting_startup'?>">
                    <div class="World_of_standers_image_box">
                        <img src="<?=base_url();?>assets/images/startup.JPEG" class="card-img-top" alt="Discussion Forum">
                       
                    </div>
                    <p class="Title_Section">Meeting the Start-ups</p>
                    </a>
                  </div>
                </div>
                <div class="col-md-3">
                    <div class="World_of_standers_inner_Box  shadow">
                        <a href="<?php echo base_url().'users/research_projects'?>">
                        <div class="World_of_standers_image_box">
                            <img src="<?=base_url();?>assets/images/research_project.jpeg" class="card-img-top" alt="Discussion Forum">
                        
                        </div>
                        <p class="Title_Section">Research Projects</p>
                        </a>
                    </div>
                </div>
                <div class="col-md-3">
                <div class="World_of_standers_inner_Box  shadow">
                        <a href="<?php echo base_url().'users/workshops_seminars'?>">
                        <div class="World_of_standers_image_box">
                            <img src="<?=base_url();?>assets/images/seminar.jpeg" class="card-img-top" alt="Discussion Forum">
                        
                        </div>
                        <p class="Title_Section">Workshops and Seminars</p>
                        </a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="World_of_standers_inner_Box  shadow">
                        <a href="<?php echo base_url().'users/technical_committees'?>">
                        <div class="World_of_standers_image_box">
                            <img src="<?=base_url();?>assets/images/offer_1.jpeg" class="card-img-top" alt="Discussion Forum">
                        
                        </div>
                        <p class="Title_Section">Offers for the membership of Technical Committees</p>
                        </a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="World_of_standers_inner_Box  shadow">
                        <a href="<?php echo base_url().'users/membership_panels'?>">
                        <div class="World_of_standers_image_box">
                            <img src="<?=base_url();?>assets/images/membership_pannel.jpeg" class="card-img-top" alt="Discussion Forum">
                        
                        </div>
                        <p class="Title_Section">Offers for the membership of Working Panels</p>
                        </a>
                    </div>
                </div>
                <div class="col-md-3">
                <div class="World_of_standers_inner_Box  shadow">
                    <a href="important_draft">
                    <div class="World_of_standers_image_box">
                        <img src="<?=base_url();?>assets/images/draft.jpeg" class="card-img-top" alt="Discussion Forum">
                       
                    </div>
                    <p class="Title_Section">Wide Circulation Drafts</p>
                    </a>
                  
                       
                </div>
                </div>
                <!-- <div class="col-md-3">
                    <div class="World_of_standers_inner_Box  shadow">
                        <a href="#">
                        <div class="World_of_standers_image_box">
                            <img src="<?=base_url();?>assets/images/offer_sustainable.JPEG" class="card-img-top" alt="Discussion Forum">
                        
                        </div>
                        <p class="Title_Section">Join the Sustainability Programme</p>
                        </a>
                    </div>
                </div> -->
                
                <div class="col-md-3">
                <div class="World_of_standers_inner_Box  shadow">
                    <a href="#">
                    <div class="World_of_standers_image_box">
                        <img src="<?=base_url();?>assets/images/item_proposal.jpeg" class="card-img-top" alt="Discussion Forum">
                       
                    </div>
                    <p class="Title_Section">New Work Item Proposals (Indigenous)</p>
                    </a>
                  
                       
                </div>
                </div>
                <div class="col-md-3">
                <div class="World_of_standers_inner_Box  shadow">
                    <a href="item_proposal_list">
                    <div class="World_of_standers_image_box">
                        <img src="<?=base_url();?>assets/images/item_proposal.jpeg" class="card-img-top" alt="Discussion Forum">
                       
                    </div>
                    <p class="Title_Section">New Work Item Proposals (ISO/IEC)</p>
                    </a>
                  
                       
                </div>
                </div>
                <div class="col-md-3">
                <div class="World_of_standers_inner_Box  shadow">
                    <a href="item_proposal_list">
                    <div class="World_of_standers_image_box">
                        <img src="<?=base_url();?>assets/images/item_proposal.jpeg" class="card-img-top" alt="Discussion Forum">
                       
                    </div>
                    <p class="Title_Section">Communication Window</p>
                    </a>
                  
                       
                </div>
                </div>
                
               <!-- <div class="col-md-3">
                <div class="World_of_standers_inner_Box  shadow">
                    <a href="https://www.services.bis.gov.in/php/BIS_2.0/dgdashboard/Published_Standards_new/new_standards" onclick="publish_pop()" target="blank">
                    <div class="World_of_standers_image_box">
                        <img src="<?=base_url();?>assets/images/new-standard-published.jpg" class="card-img-top" alt="Discussion Forum">
                       
                    </div>
                    <p class="Title_Section">New Standards Published</p>
                    </a>
                  
                       
                </div>
                </div>
                <div class="col-md-3">
                <div class="World_of_standers_inner_Box  shadow">
                    <a href="https://www.services.bis.gov.in/php/BIS_2.0/dgdashboard/review/"  onclick="review_pop()" target="blank">
                    <div class="World_of_standers_image_box">
                        <img src="<?=base_url();?>assets/images/standard_under.jpeg" class="card-img-top" alt="Discussion Forum">
                       
                    </div>
                    <p class="Title_Section">Standards Under Review</p>
                    </a>
                  
                       
                </div>
                </div>
            </div> -->
                
                <!-- <div class="col-md-3">
                <div class="World_of_standers_inner_Box  shadow">
                    <a href="https://www.services.bis.gov.in/php/BIS_2.0/bisconnect/standard_review/Standard_review/" onclick="standard_pop()" target="blank">
                    <div class="World_of_standers_image_box">
                        <img src="<?=base_url();?>assets/images/world_stander/revised.png" class="card-img-top" alt="Discussion Forum">
                       
                    </div>
                    <p class="Title_Section">Standards Revised</p>
                    </a>
                  
                       
                </div>
                </div> -->
                <div class="col-md-3">
                <div class="World_of_standers_inner_Box  shadow">
                    <a href="<?php echo base_url().'users/share_your_thoughts'?>">
                    <div class="World_of_standers_image_box">
                        <img src="<?=base_url();?>assets/images/share_thoughts.jpg" class="card-img-top" alt="Discussion Forum">
                       
                    </div>
                    <p class="Title_Section">Share Your Thoughts</p>
                    </a>
                  
                       
                </div>
                </div>
                <div class="col-md-3">
                <div class="World_of_standers_inner_Box  shadow">
                <a href="<?php echo base_url().'users/join_the_classroom'?>">
                    <div class="World_of_standers_image_box">
                        <img src="<?=base_url();?>assets/images/join-classroom.jpg" class="card-img-top" alt="Discussion Forum">
                       
                    </div>
                    <p class="Title_Section">Classroom</p>
                    </a>
                  
                       
                </div>
                </div>
                <div class="col-md-3">
                <div class="World_of_standers_inner_Box  shadow">
                    <a href="<?php echo base_url().'users/conversation_with_experts'?>">
                    <div class="World_of_standers_image_box">
                        <img src="<?=base_url();?>assets/images/experts-conversation.jpg" class="card-img-top" alt="Discussion Forum">
                       
                    </div>
                    <p class="Title_Section">In conversation with Experts</p>
                    </a>
                  
                       
                </div>
                </div>
           
          
            
        </div>
    </section>    
    <section style="margin-bottom: 38px;">
        <div class="container-fluid" style="padding: 0px 36px 0px 36px;">
            <div class="row">
               <div class="col-lg-12 text-center my-2 pt-5">
                   <h4>Images & Gallery</h4>
               </div>
            </div>
            <div class="portfolio-menu mt-2 mb-4">
               <ul>                 
                  <li style="padding: 0px;"><button onclick="gal_images()" class="btn btn-outline-dark active img" id="img">Images</button></li>
                  <li style="padding: 0px;"><button onclick="abcd()" class="btn btn-outline-dark vdo" id="vdo">Video</button></li>
               </ul>
            </div>
            
                <div class="portfolio-item row" id="photo_gallary">
                  <?php if(!empty($images)){ foreach($images as $list){ ?>
                      <div class="item selfie col-lg-3 col-md-4 col-6 col-sm">
                          <!-- <a href="<?php echo base_url().'uploads/'.$list['image'];?>" class="fancylight popup-btn" data-fancybox-group="light">  -->
                          <!-- <img class="img-fluid" src="<?php echo base_url().'uploads/'.$list['image'];?>" style="height:180px; width:100%"; alt=""> -->
                          <img class="img-fluid" id="gal_img" title="<?php echo $list['title']; ?>" src="<?php echo base_url() . 'uploads/cms/gallary/photo/' . $list['image']; ?>" style="height:180px; width:100%;" ; alt="" data-bs-toggle="modal" data-bs-target="#thumbnailexampleModal">
                          <!-- </a> -->
                      </div>
                  <?php } ?>
                  <?php if(count($images) > 7){ ?>
                  <div class="view-button">
                    <a href="<?php echo base_url().'users/photo_gallary' ?>">View All</a>
                  </div>
                  <?php } } ?>
               
             </div>
             <div class="portfolio-item row" id="video_gallary" style="display:none;">
             <?php if(!empty($videos)){ foreach($videos as $list){ ?>
                <div class="item selfie col-lg-3 col-md-4 col-6 col-sm">
            <!-- <a href="<?php echo base_url() . 'uploads/' . $list['video']; ?>" class="fancylight popup-btn" data-fancybox-group="light">
              <video class="img-fluid" src="<?php echo base_url() . 'uploads/cms/gallary/video/' . $list['video']; ?>" style="height:180px; width:280px; padding:20px;" ; alt="">
            </a> -->
            <video class="img-fluid" title="<?php echo $list['title']; ?>" controls>
              <source src="<?php echo base_url() . 'uploads/cms/gallary/video/' . $list['video']; ?>" type="video/mp4" >
            </video>
          </div>
          <?php if (count($videos) > 7) { ?>
            <div class="view-button">
              <a href="<?php echo base_url() . 'users/video_gallary' ?>">View All</a>
            </div>
          <?php } ?>
                  <?php } }?>
             </div>
              
         </div>
    </section>
    <div class="modal fade" id="thumbnailexampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" style="max-width:700px;">
      <div class="modal-content">
          <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Image Preview</h5>

          <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
          </button>
          </div>
          <div class="modal-body">
          <img src="" id="outputicon" width="100%"/>
          </div>
      </div>
      </div>
  </div> 
    
    <!-- <script src="<?=base_url();?>assets/js/bootstrap.bundle.js"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->
    <!-- <script src="<?=base_url();?>assets/js/owl.carousel.min.js"></script> -->
    <!-- <script src="<?=base_url();?>assets/js/font_resize.js"></script> -->
    <!-- <script src="<?=base_url();?>assets/js/dark_mode.js"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.js"></script> -->
    <script>
        function publish_pop(){
            alert("You are being redirected to an external website. Please note that BIS Website cannot be held responsible for external websites content & privacy policies.");
        }
    </script>
    <script>
        function review_pop(){
            alert("You are being redirected to an external website. Please note that BIS Website cannot be held responsible for external websites content & privacy policies.");
        }
    </script>
    <script>
        function standard_pop(){
            alert("You are being redirected to an external website. Please note that BIS Website cannot be held responsible for external websites content & privacy policies.");
        }
    </script>
<script>
     $(document).ready(function(){
 
 $('#photo_gallary').on('click','#gal_img',function(){
   console.log("jhgjh");
   var id= $(this).attr('src');
   //alert(id);
   console.log(id);
  $('#outputicon').attr('src',id);

 })
})
     $('#photo_gallary').show();
      function abcd(){         
              $('.vdo').addClass('active');
              $('.img').removeClass('active');
              $('#photo_gallary').hide();
              $('#video_gallary').show();                                
        }
     
      function gal_images(){        
              $('.img').addClass('active');
              $('.vdo').removeClass('active');
              $('#photo_gallary').show();
              $('#video_gallary').hide();                                
      }
    
    $('.portfolio-menu ul li').click(function(){
         	$('.portfolio-menu ul li').removeClass('active');
         	$(this).addClass('active');
         	
         	var selector = $(this).attr('data-filter');
         	$('.portfolio-item').isotope({
         		filter:selector
         	});
         	return  false;
         });
         $(document).ready(function() {
         var popup_btn = $('.popup-btn');
         popup_btn.magnificPopup({
         type : 'image',
         gallery : {
         	enabled : true
         }
         });
         });
    
    </script>