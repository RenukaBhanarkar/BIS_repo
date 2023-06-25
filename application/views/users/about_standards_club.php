
<div id="privacy-content" class="container">
    <div class="col-sx-12 col-sm-12 col-md-12" style="border-left: 3px solid cadetblue; padding: 0px 25px;">
        <div class="static-content">
            <div class="bloginfo">
                <h3 style="margin-bottom: 0px;margin-top:20px;color: #0086b2!important;font-weight: 600;">About Standards Club</h3>
            </div>
            <div class="heading-underline" style="width: 150px;">
                <div class="left"></div><div class="right"></div>
             </div>
           
         </div>
    </div>
    <div class="row">
    <div class="col-md-12">
    <?php if(!empty($about_standards_club)){ ?>
            <img src="<?php echo base_url().'uploads/cms/about_standard_club/'.$about_standards_club[0]['image']; ?>" id="about_new">
            
            <p style="text-align: justify;">
            <?php echo $about_standards_club[0]['description']; ?>
             </p>
             <?php } ?>
            </div>
        
              
       
    </div>
  </div>
  
