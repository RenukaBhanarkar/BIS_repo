<style>
.your_wall_main_card_view {
    box-shadow: 0px 1px 20px rgb(225 225 225);
    border-radius: 3px;
    -ms-box-shadow: 0px 1px 20px rgb(225 225 225);
    margin-bottom: 36px;

}
.yourWall_image {
    height: 331px;
    margin-bottom: 17px;
    position: relative;
}
.yourWall_image_view {
    height: 200px;
    margin-bottom: 17px;
    position: relative;
}

.Text-container_view {
    padding: 0px 19px 4px;
    text-align: justify;
    min-height: 180px;
}

.yourWall_title_view {
    font-weight: 600;
    font-size: 16px;
    color: #000000;
}

.Your_Wall_Description_view {
    font-size: 14px;
    color: #424242;
}

.Your_Wall_Description_view {
    font-size: 15px;
    color: #424242;

    /* display: -webkit-box; */

}

.banner_image {
    border-radius: 4px;
}

.banner_image img {
    border-radius: 4px;
}

.title_right h6 {
    font-size: 17px;
    color: #bb1212;
    font-weight: 600;

}

.banner_image p {
    font-size: 15px;
    margin-top: 10px;
    font-weight: 600;
}

.tranding_outer_box {
    display: flex;
    flex-wrap: wrap;

    margin-bottom: 11px;

}

.image_tranding {
    width: 26%;
    height: 62px;
}

/* .text_container_tranding {
    width: 74%;
    line-height: 20px;
    padding: 0px 14px;
} */
.text_container_tranding {
    width: 74%;
    line-height: 24px;
    padding: 0px 14px;
}
.Btn-do {
    font-size: 12px;
    padding: 3px 4px;
    border-radius: 5px;
}
.owl-nav{
    display: none;
}

/* .tending_para {
    padding: 2px 0px 0px;
    font-size: 13px;
    font-weight: 600;
    display: -webkit-box;
    max-width: 100%;
    height: 40px;
    -webkit-line-clamp: 2;
    overflow: hidden;
    -webkit-box-orient: vertical;
} */

.tending_para {
    /* padding: 2px 0px 0px; */
    font-size: 13px;
    font-weight: 600;
    display: -webkit-box;
    max-width: 100%;
    height: 78px;
    -webkit-line-clamp: 3;
    overflow: hidden;
    -webkit-box-orient: vertical;
    word-break: break-all;
}
.filter-content {
    background: #dedede;
    padding: 15px 14px;
    width: 100%;
    display: -webkit-box;
    display: -ms-flexbox;
    /* display: flex; */
    -webkit-box-pack: justify;
    -ms-flex-pack: justify;
    justify-content: space-between
}
.filter_label {
    margin-left: 9px;
    color: #1d3a7c;
}
.sector_label {
    color: #1d1d1d;
    font-size: 13px;
    font-weight: 400;
    margin-left: 7px;
}
.filter-button{
    border-radius: 10px;
    width: 108px;
    margin-left: 10px;
    font-size: 14px;
    
}
.rounded-pill {
    border-radius: 50rem!important;
    height: 30px;
}
.input-group {
    position: relative;
    display: flex;
    flex-wrap: wrap;
    align-items: stretch;
    width: 28%;
}
.owl-nav{
    display: none;
}
</style>
<div class="container-fluid" style="padding: 22px 39px 29px 39px;">
<div class="row">
              <div class="col-md-3">
               <div class="static-content">
                  <div class="bloginfo">
                       <h3 style="margin-bottom: 0px;margin-top:20px;color: #0086b2!important;font-weight: 600;">Wall of Wisdom</h3>
                   </div>
                   <div class="heading-underline" style="width: 200px;">
                         <div class="left"></div><div class="right"></div>
                   </div>
                </div>
              </div>
               
            </div>
    <div class="your_wall_Outer_Box">
        <div class="inner_wall">
            <div class="row">
                <div class="col-sm-12">
                    <h4 style="    font-weight: 600;text-align: justify;">
                <?php echo $wow['title']; ?></h4>
                    <div class="your_wall_main_card_view">
                        <div class="yourWall_image">
                            <img src="<?php echo base_url().'uploads/admin/wall_of_wisdom/'.$wow['image']; ?>" alt="not found" class="w-100 h-100">
                            <span><i class="fa fa-calendar icons"></i><?php echo date("d-m-Y",strtotime($wow['created_on'])); ?></span>
                        </div>
                        <div class="Text-container_view ">
                            <h6 class="yourWall_title_view ">
                            <!-- <?php echo $wow['title']; ?> -->
                                <!-- Lorem ipsum dolor sit amet, consectetur -->
                            </h6>
                            <div class="Your_Wall_Description_view">
                            <?php echo $wow['description']; ?>
                            </div>
                            <!-- <p>
                                <b>Likes -</b><?php echo $wow['likes']; ?>
                            </p> -->

                        </div>
                        
                    </div>

                    <div>
<button  class="btn btn-primary btn-sm text-white mr-3 mt-2" style="float:right;"><a href="<?=base_url().'wall_of_wisdom/wallOfWisdom';?>">Back</a></button>
</div>

                </div>
                

            </div>
            
        </div>

    </div>
</div>