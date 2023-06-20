<style>
.inner_gallery_box {
border-radius: 5px;
}
.inner_gallery_box img {
border-radius: 5px;
object-fit: fill;
}
p {
text-align: center;
}
/* .item {
height: 319px;
} */
#owl-caraousal_standard .owl-theme .owl-dots {
text-align: center;
-webkit-tap-highlight-color: transparent;
display: none;
}
#events_slider .owl-dots,
#news_slider .owl-dots {
position: absolute;
top: -45px;
right: 0px;
}
#events_slider .owl-nav,
#news_slider .owl-nav {
display: none;
}
.owl-carousel .owl-item img {
  width: 75%;
height: 193px;
display: inherit;
}
.get-involved-links {
display: flex;
justify-content: space-between;
border-bottom: 1px solid #DDDDDD;
}
/* .get-involved-links li{
margin-bottom: 30px;
width: 9%;
background: #FFFFFF;
box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.12);
border-radius: 2px;
position: relative;
} */
.tab-link {
margin-bottom: 30px;
min-width: 31%;
background: #FFFFFF;
box-shadow: 20px 20px 20px rgba(0, 0, 0, 0.12);
border-radius: 2px;
position: relative;
height: 230px;
padding-right: 0px;
    padding-left: 0px;
    margin-right: 23px;
    padding: 18px;
}



.nav-link {
text-align: center;
height: 100%;
text-decoration: none;
color: darkblue
}
.nav-pills .nav-link.active, .nav-pills .show>.nav-link {
color: white;
background-color: #0d6efd;
}
/* li.tab-link:hover {
background: gold;
} */
.owl-nav{
display: none;
}
.owl-dots{
display: none;
}
li.tab-link:hover {
transition: all .5s;
transform: scale(1.1);
z-index: 1;
}
.row1 >* {
padding-right: 0;
padding-left: 0;
}
#banner-align{
padding-right: 5px;
padding-left: 5px;
}
.section-header {
    margin-bottom: 37px;
    position: relative;
    padding-bottom: 20px;
}
.section-header::before {
    content: "";
    position: absolute;
    display: block;
    width: 60px;
    height: 5px;
    background: #f82249;
    bottom: 0;
    left: calc(50% - 25px);
}
.section-header h2 {
    font-size: 36px;
    text-transform: uppercase;
    text-align: center;
    font-weight: 700;
    margin-bottom: 10px;
    color: #0e1b4d;
}
.section-header p {
    text-align: center;
    padding: 0;
    margin: 0;
    font-size: 18px;
    font-weight: 500;
    color: #9195a2;
}

</style>
<?php
// include('C:\xampp\htdocs\BIS\BIS_repo\application\views\users\language.php');
require(APPPATH.'views/users/language.php');
$en_select='';
$hn_select='';
$language=''; 
if((isset($_GET['language']) && $_GET['language']=='en') || !isset($_GET['language'])){
    $en_select='selected';
    $language='en';
}else{
    $hn_select='selected';
    $language='hn';
}
?>
 
<section style="background-image: url(<?php echo base_url();?>assets/images/whats-new-bg.png);">
  <div class="container-fluid pt-5">
    <!-- <div class="row text-center">
      <h3 style="font-weight: 600; color: brown;"><?php echo $standard_club_section[$language]['2'] ?></h3>
      <h3 style="font-weight: 600; color: brown;">Winner Wall </h3>
      
    </div> -->
    <div class="section-header">
          <h2>Winners Wall</h2>
          <!-- <p>Here are some of our speakers</p> -->
        </div>
    <ul class="row get-involved-links nav nav-pills mb-3" role="tablist" style="padding: 21px;">
      <li class="col-md-3 tab-link">
        <a class="nav-link"   href="<?php echo base_url(); ?>users/winners">
          <img src="<?php echo base_url(); ?>/assets/images/prize_2.avif" style="width: 125px; height: 125px; border-radius: 50%;">
          <!-- <h3 class="tabl_title"><?php echo $standard_club_section[$language]['3'] ?></h3> -->
          <h3 class="tabl_title">winners wall of Quiz</h3>
        </a>
      </li>
      <li class="col-md-3 tab-link">
        <a class="nav-link"   href="<?php echo base_url(); ?>users/standard_writting_winners">
          <img src="<?php echo base_url(); ?>/assets/images/prize_2.avif" style="width: 125px; height: 125px; border-radius: 50%;">
          <!-- <h3 class="tabl_title"><?php echo $standard_club_section[$language]['3'] ?></h3> -->
          <h3 class="tabl_title">Winners wall of Standard writting </h3>
        </a>
      </li>

      <li class="col-md-3 tab-link">
        <a class="nav-link"   href="<?php echo base_url(); ?>users/miscellaneous_winners">
          <img src="<?php echo base_url(); ?>/assets/images/first_prize_1.jpg" style="width: 125px; height: 125px; border-radius: 50%;">
          <!-- <h3 class="tabl_title"><?php echo $standard_club_section[$language]['3'] ?></h3> -->
          <h3 class="tabl_title">Winners wall of other competitions</h3>

        </a>
      </li>

    </ul>
    <div class="tab-content">
      <div class="tab-pane fade active show" id="tab1" role="tabpanel">
        <div class="" >
         
        </div>
        </div>
      </div>
    </div>
  </section>
 
          
           
           
           
          
            <!-- <button type="button" id="preview" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#thumbnailexampleModal">
            Preview
            </button>   -->
            <!-- Modal -->
           
            <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.js"></script>
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
            function abcd() {
            $('.vdo').addClass('active');
            $('.img').removeClass('active');
            $('#photo_gallary').hide();
            $('#video_gallary').show();
            }
            function gal_images() {
            $('.img').addClass('active');
            $('.vdo').removeClass('active');
            $('#photo_gallary').show();
            $('#video_gallary').hide();
            }
            
            // $('.portfolio-item').isotope({
              //    itemSelector: '.item',
              //    layoutMode: 'fitRows'
            //  });
            $('.portfolio-menu ul li').click(function() {
            $('.portfolio-menu ul li').removeClass('active');
            $(this).addClass('active');
            var selector = $(this).attr('data-filter');
            $('.portfolio-item').isotope({
            filter: selector
            });
            return false;
            });
            $(document).ready(function() {
            var popup_btn = $('.popup-btn');
            popup_btn.magnificPopup({
            type: 'image',
            gallery: {
            enabled: true
            }
            });
            });
            $('#events_slider').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            dots: true,
            responsive: {
            0: {
            items: 1
            },
            600: {
            items: 2
            },
            1000: {
            items: 2
            }
            }
            });
            $('#news_slider').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            dots: true,
            responsive: {
            0: {
            items: 1
            },
            600: {
            items: 2
            },
            1000: {
            items: 2
            }
            }
            })
            </script>