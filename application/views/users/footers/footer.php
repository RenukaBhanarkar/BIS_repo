<footer>
    <div class="main_footer">
        <div class="triangle"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-sm-4 col-lg-4 footer_text">
                            <h4>Accessibility & Help</h4>
                            <ul>
                                <li><a href="<?php echo base_url(); ?>users/feedback_form">Feedback</a></li>
                                <li><a href="#">Help</a></li>
                                <li><a href="#">Sitemap</a></li>
                                <!-- <li><a href="#">Accessibility</a></li> -->
                            </ul>
                        </div>
                        <div class="col-sm-4 col-lg-4 footer_text">
                            <h4>Legal</h4>
                            <div class="col-lg-12 footer_text">
                                <ul>
                                    <li><a href="<?php echo base_url(); ?>users/terms_condition">Terms & Conditions</a>
                                    </li>
                                    <li><a href="<?php echo base_url(); ?>users/privacy_policy">Privacy Policy</a></li>
                                    <li><a href="<?php echo base_url(); ?>users/hyperlinking_policy">Hyper Linking
                                            Policy</a></li>
                                    <li><a href="<?php echo base_url(); ?>users/disclaimer">Disclaimer</a></li>
                                    <li><a href="<?php echo base_url(); ?>users/copyright">Copyright Policy</a></li>
                                    <li><a href="<?php echo base_url(); ?>users/cmap">Website Content Contribution,
                                            Moderation & Approval Policy (CMAP)</a></li>
                                    <li><a href="<?php echo base_url(); ?>users/cap">Content Archival Policy (CAP)</a>
                                    </li>
                                    <li><a href="<?php echo base_url(); ?>users/content_review_policy">Content Review
                                            Policy (CRP)</a></li>

                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-4 col-lg-4 footer_text">
                            <h4>Other Links</h4>
                            <div class="col-lg-12 footer_text">
                                <ul>
                                    
                                    <li><a href="<?php echo base_url(); ?>users/about_exchange_forum">About Exchange
                                            Forum</a></li>
                                    <li><a href="https://www.services.bis.gov.in/php/BIS_2.0/bisconnect/knowyourstandards/indian_standards/isdetails" onclick="know_pop()" target="blank">Know your Standards</a></li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="row">
                        <div class="col-sm-12 col-lg-12 footer_text">
                            <div class="block-menu">
                                <h4>Useful Links</h4>
                                <ul class="usefull-links">
                                    
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="col-md-12">
                    <div class="social-content">
                        <h4>Follow us</h4>
                       
                    </div>

                </div> -->
                <div class="row">
                <div class="col-2"> <h4>Follow us</h4></div>
                    <div class="social-content col-4">
                   
                       
                    </div>

                </div>
                
<div class="row">
                <div class="col-md-12" style="text-align: center;">
                <hr>  
                    <p>Copyright <i class="fa fa-copyright" aria-hidden="true"></i> 2023 - Bureau of Indian Standards.
                        All rights reserved</p>
                </div>
                </div>
            </div>
        </div>
    </div>
</footer>



<script src="<?php echo base_url(); ?>assets/js/bootstrap.bundle.js"></script>

<!-- <script src="<?php echo base_url();?>assets/js/jquery.dataTables.min.js"></script> -->
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/owl.carousel.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/font_resize.js"></script>
<script src="<?php echo base_url(); ?>assets/js/dark_mode.js"></script>
<script>
    $(document).ready(function () {
    $('#example').DataTable();
    });
   </script>
<script>

$('#carouselExampleControls').owlCarousel({
        loop: true,
        margin: 30,
        dots: true,
        nav: false,
        responsiveClass: true,
        autoplay: true,
        autoPlaySpeed: 1000,
        autoPlayTimeout: 1000,
        autoplayHoverPause: true,
  responsive: {
    0: {
      items: 2,
    //   margin: 10,
    //   stagePadding: 20,
    },
    600: {
      items: 3,
    //   margin: 20,
    //   stagePadding: 50,
    },
    1000: {
      items: 4
    },
    1200: {
      items: 4
    },
    1400: {
      items: 4
    },
    1600: {
      items: 4
    }
    }
});

$('.carouselExampleControlswinner').owlCarousel({
        loop: true,
        margin: 30,
        dots: true,
        nav: false,
        responsiveClass: true,
        autoplay: true,
        autoPlaySpeed: 1000,
        autoPlayTimeout: 1000,
        autoplayHoverPause: true,
  responsive: {
    0: {
      items: 2,
    //   margin: 10,
    //   stagePadding: 20,
    },
    600: {
      items: 3,
    //   margin: 20,
    //   stagePadding: 50,
    },
    1000: {
      items: 4
    },
    1200: {
      items: 4
    },
    1400: {
      items: 4
    },
    1600: {
      items: 4
    }
    }
});


$('#owl-caraousal_1').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:4
        }
    }
})
$('#owl-caraousal_2').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:1
        }
    }
});
$('#owl-caraousal_news').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:1
        }
    }
});
$('#owl-caraousal_3').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:1
        }
    }
})
$('#owl-caraousal_4').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:1
        }
    }
})
$('#owl-caraousal_standard').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:1
        }
    }
})
$('.login_details').hide()
jQuery('.show').on('click', function() {
    jQuery('.login_details').toggle();
});
$('.after_login_details').hide()
jQuery('.after_show').on('click', function() {
    jQuery('.after_login_details').toggle();
});
$(document).ready(function(){
    $.ajax({
    url:"<?php echo base_url(); ?>admin/useful_links_web/",
    type:"JSON",
    method:"get",    
    success:function(result){      
         var res = JSON.parse(result);        
        data = res; 
                var row = '';
                
                for (i in data) { 
                    row += '<li><a href="https://'+data[i].link+'" target="_blank" class="jquery-once" id="'+data[i].id+'"><img src="<?php echo base_url(); ?>uploads/'+data[i].image +'" height="100%" width="100%"></a></li>';       
                                    
                }
                
                $(".usefull-links").html(row);
    },
    error: function(res) {
        alert("Error,Useful Links Not Load.");
    }

});
 });

 $(document).ready(function(){
    $.ajax({
    url:"<?php echo base_url(); ?>admin/followus_links_web/",
    type:"JSON",
    method:"get",    
    success:function(result){      
         var res = JSON.parse(result);        
        data = res; 
                var row = '';
                
                for (i in data) {
                            
                     
row += '<a href="https://' +data[i].link + '"target="_blank" title="'+data[i].title+'" onclick="follow_pop()" class="jquery-once-4-processed"><img src="<?php echo base_url(); ?>uploads/'+data[i].icon +'"class="social_image">Twitter</a>';            
                }
                $(".social-content").html(row);
    },
    error: function(res) {
        alert("Error,FollowUs Links Not Load.");
    }

});
 });
</script>
<script>
        function bis_pop(){
            alert("You are being redirected to an external website. Please note that BIS Website cannot be held responsible for external websites content & privacy policies.");
        }
    </script>
    <script>
        function follow_pop(){
            alert("You are being redirected to an external website. Please note that BIS Website cannot be held responsible for external websites content & privacy policies.");
        }
    </script>
      <script>
        function know_pop(){
            alert("You are being redirected to an external website. Please note that BIS Website cannot be held responsible for external websites content & privacy policies.");
        }
    </script>
</body>

</html>