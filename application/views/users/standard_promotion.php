
<div id="privacy-content" class="container">
    <div class="col-sx-12 col-sm-12 col-md-12" style="border-left: 3px solid cadetblue; padding: 0px 25px;">
        <div class="static-content">
            <div class="bloginfo">
                <h3 style="margin-bottom: 0px;margin-top:20px;color: #0086b2!important;font-weight: 600;">Standard Promotion</h3>
            </div>
            <div class="heading-underline" style="width: 240px;">
                <div class="left"></div><div class="right"></div>
             </div>
           
         </div>
    </div>
    <div class="row">
            <div class="col-md-12">
            <!-- <img src="<?php echo base_url(); ?>/assets/images/img_2.jpg" id="about_new"> -->
            <?php if(!empty($standard_promotion)){ ?>
            <p style="text-align: justify;">
            <?php echo $standard_promotion[0]['description']; ?>
             </p>
             <?php } ?>
            </div>
        
              
       
    </div>
  </div>
  
