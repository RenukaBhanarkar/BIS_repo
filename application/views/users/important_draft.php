<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.js"></script> -->
 <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css" /> -->
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
</style>
<section id="quality-outer my-5">
    <div class="quality_section">
        <div class="container">
            <div class="row my-5">
                <div class="World_of_standers_inner_Box  shadow">
                    <a href="https://login.iec.ch/auth/realms/iecsso/login-actions/authenticate?execution=085b5fbd-01cf-44c4-9e4f-2996983710b6&client_id=comment&tab_id=v6ELwtEU0RI" target="_blank" onclick="iec_pop()">
                    <div class="World_of_standers_image_box">
                        <img src="<?=base_url();?>assets/images/iec.jpeg" class="card-img-top" alt="Discussion Forum">
                       
                    </div>
                    <p class="Title_Section">IEC</p>
                    </a>
                  
                       
                </div>
                <div class="World_of_standers_inner_Box  shadow">
                    <a href="https://www.iso.org/advanced-search/x/title/status/U/docNumber/docPartNo/docType/0/langCode/ics/currentStage/true/searchAbstract/true/stage/40.20/stageDateStart/stageDateEnd/committee/sdg" target="_blank" onclick="iso_pop()">
                    <div class="World_of_standers_image_box">
                        <img src="<?=base_url();?>assets/images/iso.jpeg" class="card-img-top" alt="Discussion Forum">
                       
                    </div>
                    <p class="Title_Section">ISO</p>
                    </a>
                  
                       
                </div>
                <div class="World_of_standers_inner_Box  shadow">
                    <a  target="_blank" id="wide_pop" style="cursor:pointer;">
                    <div class="World_of_standers_image_box">
                        <img src="<?=base_url();?>assets/images/world_stander/Draft1.png" class="card-img-top" alt="Discussion Forum">
                       
                    </div>
                    <p class="Title_Section">Wide Circulation Drafts</p>
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
    </script>
    <script src="<?=base_url();?>assets/js/bootstrap.bundle.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="<?=base_url();?>assets/js/owl.carousel.min.js"></script>
    <script src="<?=base_url();?>assets/js/font_resize.js"></script>
    <script src="<?=base_url();?>assets/js/dark_mode.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.js"></script>
    <script>
        function iec_pop(){
            alert("You are being redirected to an external website. Please note that BIS Website cannot be held responsible for external websites content & privacy policies.");
        }
    </script>
    <script>
        function iso_pop(){
            alert("You are being redirected to an external website. Please note that BIS Website cannot be held responsible for external websites content & privacy policies.");
        }
    </script>
    <!-- <script>
        function wide_pop(){
            alert("You are being redirected to an external website. Please note that BIS Website cannot be held responsible for external websites content & privacy policies.");
        }
    </script> -->
    <script>
    $('#wide_pop').click(function() {
        var answer = confirm("You are being redirected to an external website. Please note that BIS Website cannot be held responsible for external websites content & privacy policies.");
        if (answer) {
            window.open('https://www.services.bis.gov.in/php/BIS_2.0/dgdashboard/draft/wcdraftDepartment', '_blank');
        } else {}
    })
</script>

<script>
    
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