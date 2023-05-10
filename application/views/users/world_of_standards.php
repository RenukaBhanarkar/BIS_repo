<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.js"></script>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css" />
<style>
  
.World_of_standers_inner_Box {
    width: 23%;
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
</style>
<section>
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
</section>
<section id="quality-outer my-5">
    <div class="quality_section">
        <div class="container">
            <div class="row my-5">
                <div class="World_of_standers_inner_Box  shadow">
                    <a href="item_proposal_list">
                    <div class="World_of_standers_image_box">
                        <img src="<?=base_url();?>assets/images/item_proposal.jpeg" class="card-img-top" alt="Discussion Forum">
                       
                    </div>
                    <p class="Title_Section">New Work Item Proposals</p>
                    </a>
                  
                       
                </div>
                <div class="World_of_standers_inner_Box  shadow">
                    <a href="important_draft">
                    <div class="World_of_standers_image_box">
                        <img src="<?=base_url();?>assets/images/draft.jpeg" class="card-img-top" alt="Discussion Forum">
                       
                    </div>
                    <p class="Title_Section">Important Draft Standards</p>
                    </a>
                  
                       
                </div>
                <div class="World_of_standers_inner_Box  shadow">
                    <a href="https://www.services.bis.gov.in/php/BIS_2.0/dgdashboard/Published_Standards_new/new_standards" onclick="publish_pop()" target="blank">
                    <div class="World_of_standers_image_box">
                        <img src="<?=base_url();?>assets/images/new-standard-published.jpg" class="card-img-top" alt="Discussion Forum">
                       
                    </div>
                    <p class="Title_Section">New Standards Published</p>
                    </a>
                  
                       
                </div>
                <div class="World_of_standers_inner_Box  shadow">
                    <a href="https://www.services.bis.gov.in/php/BIS_2.0/dgdashboard/review/"  onclick="review_pop()" target="blank">
                    <div class="World_of_standers_image_box">
                        <img src="<?=base_url();?>assets/images/standard_under.jpeg" class="card-img-top" alt="Discussion Forum">
                       
                    </div>
                    <p class="Title_Section">Standards Under Review</p>
                    </a>
                  
                       
                </div>
                <div class="World_of_standers_inner_Box  shadow">
                    <a href="https://www.services.bis.gov.in/php/BIS_2.0/bisconnect/standard_review/Standard_review/" onclick="standard_pop()" target="blank">
                    <div class="World_of_standers_image_box">
                        <img src="<?=base_url();?>assets/images/world_stander/revised.png" class="card-img-top" alt="Discussion Forum">
                       
                    </div>
                    <p class="Title_Section">Standards Revised</p>
                    </a>
                  
                       
                </div>
                <div class="World_of_standers_inner_Box  shadow">
                    <a href="<?php echo base_url().'users/share_your_thoughts'?>">
                    <div class="World_of_standers_image_box">
                        <img src="<?=base_url();?>assets/images/share_thoughts.jpg" class="card-img-top" alt="Discussion Forum">
                       
                    </div>
                    <p class="Title_Section">Share Your Thoughts</p>
                    </a>
                  
                       
                </div>
                <div class="World_of_standers_inner_Box  shadow">
                <a href="<?php echo base_url().'users/join_the_classroom'?>">
                    <div class="World_of_standers_image_box">
                        <img src="<?=base_url();?>assets/images/join-classroom.jpg" class="card-img-top" alt="Discussion Forum">
                       
                    </div>
                    <p class="Title_Section">Join The Classroom</p>
                    </a>
                  
                       
                </div>
                <div class="World_of_standers_inner_Box  shadow">
                    <a href="<?php echo base_url().'users/conversation_with_experts'?>">
                    <div class="World_of_standers_image_box">
                        <img src="<?=base_url();?>assets/images/experts-conversation.jpg" class="card-img-top" alt="Discussion Forum">
                       
                    </div>
                    <p class="Title_Section">In Conversation with Experts</p>
                    </a>
                  
                       
                </div>
            </div>
          
            
        </div>
    </section>    
    <section style="margin-bottom: 38px;">
        <div class="container">
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
                          <a href="<?php echo base_url().'uploads/'.$list['image'];?>" class="fancylight popup-btn" data-fancybox-group="light"> 
                          <img class="img-fluid" src="<?php echo base_url().'uploads/'.$list['image'];?>" style="height:180px; width:280px;"; alt="">
                          </a>
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
                          <a href="<?php echo base_url().'uploads/'.$list['video'];?>" class="fancylight popup-btn" data-fancybox-group="light"> 
                          <video class="img-fluid" src="<?php echo base_url().'uploads/'.$list['video'];?>" style="height:180px; width:280px; padding:20px;"; alt="">
                          </a>
                      </div>
                      <?php if(count($videos) > 7){ ?>
                      <div class="view-button">
                      <a href="<?php echo base_url().'users/video_gallary' ?>">View All</a>
                    </div>
                    <?php } ?>
                  <?php } }?>
             </div>
              
         </div>
    </section>
    
    <script src="<?=base_url();?>assets/js/bootstrap.bundle.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="<?=base_url();?>assets/js/owl.carousel.min.js"></script>
    <script src="<?=base_url();?>assets/js/font_resize.js"></script>
    <script src="<?=base_url();?>assets/js/dark_mode.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.js"></script>
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