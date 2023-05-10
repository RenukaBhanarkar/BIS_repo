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
<div class="container">
<div class="row mt-5">
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
            <div class="row mt-5">
                <div class="col-sm-9">
                    <h4>
                <?php echo $wow['title']; ?></h4>
                    <div class="your_wall_main_card_view">
                        <div class="yourWall_image">
                            <img src="<?php echo base_url().'uploads/admin/wall_of_wisdom/'.$wow['image']; ?>" alt="not found" class="w-100 h-100">
                            <span><i class="fa fa-calendar icons"></i><?php echo date("m-d-Y",strtotime($wow['created_on'])); ?></span>
                        </div>
                        <div class="Text-container_view ">
                            <h6 class="yourWall_title_view ">
                            <!-- <?php echo $wow['title']; ?> -->
                                <!-- Lorem ipsum dolor sit amet, consectetur -->
                            </h6>
                            <div class="Your_Wall_Description_view">
                            <?php echo $wow['description']; ?>
                            </div>
                            <p>
                                <b>Likes -</b><?php echo $wow['likes']; ?>
                            </p>

                        </div>
                        
                    </div>



                </div>
                <div class="col-sm-3">
                    <div class="right_side">
                        <div class="title_right">
                            <h6>Upcomming Events</h6>
                            <div class="owl-carousel owl-theme" id="owl-caraousal_news">
                            <?php if(!(empty($events))){ foreach($events as $list){ ?>
                                <div class="item">
                                    <div class="quiz-section">
                                        <div class="quiz-box_live" style="height: 172px;">
                                            <a href="#"><img src="<?php echo base_url().'uploads/cms/events/'.$list['thumbnail'];?>" class="h-100" ></a>
                                        </div>
                                        <p class="quiz-text overflow-hidden p-1" > <a href="#"><?php echo $list['title']; ?></a></p>
                                    </div>
                                </div>
                                <?php }} ?>
                                <!-- <div class="item">
                                    <div class="quiz-section">
                                        <div class="quiz-box_live">
                                            <a href="#"><img src="<?php echo base_url();?>/assets/images/whats_news.jpg"></a>
                                        </div>
                                        <p class="quiz-text overflow-hidden p-1" > <a href="#">Photography Competition- Share the unknown spots of Mizoram</a></p>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="quiz-section">
                                        <div class="quiz-box_live">
                                            <a href="#"><img src="<?php echo base_url();?>/assets/images/whats_news.jpg"></a>
                                        </div>
                                        <p class="quiz-text overflow-hidden p-1" > <a href="#">Photography Competition- Share the unknown spots of Mizoram</a></p>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="quiz-section">
                                        <div class="quiz-box_live">
                                            <a href="#"><img src="<?php echo base_url();?>/assets/images/whats_news.jpg"></a>
                                        </div>
                                        <p class="quiz-text overflow-hidden p-1" > <a href="#">Photography Competition- Share the unknown spots of Mizoram</a></p>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="quiz-section">
                                        <div class="quiz-box_live">
                                            <a href="#"><img src="<?php echo base_url();?>/assets/images/whats_news.jpg"></a>
                                        </div>
                                        <p class="quiz-text overflow-hidden p-1" > <a href="#">Photography Competition- Share the unknown spots of Mizoram</a></p>
                                    </div>
                                </div> -->
                            </div>
                            <!-- <div class="banner_image">
                                <img src="<?php echo base_url();?>/assets/images/whats_news.jpg" class="w-100">
                                <p>Photography Competition- Share the unknown spots of Mizoram</p>
                            </div> -->
                        </div>
                        <div class="title_right mt-3">
                            <h6>Latest News</h6>
                            <div class="banner_image_tending">
                                <?php if(!(empty($news))){ foreach($news as $list){ ?>
                                <div class="tranding_outer_box">
                                    <div class="image_tranding">
                                        <img src="<?php echo base_url().'uploads/letest_news/'.$list['thumbnail'];?>" class="w-100 h-100">
                                    </div>
                                    <div class="text_container_tranding">
                                        <!-- <span class="bg-success text-white Btn-do">Do</span> -->
                                        <a href="#" class="tending_para "><?php echo $list['description']; ?></a>
                                    </div>
                                </div>
                                <?php } } ?>
                                <!-- <div class="tranding_outer_box">
                                    <div class="image_tranding">
                                        <img src="<?php echo base_url();?>/assets/images/2.jpg" class="w-100 h-100">
                                    </div>
                                    <div class="text_container_tranding">
                                        <span class="bg-success text-white Btn-do">Do</span>
                                        <a href="#" class="tending_para d-block">Photography Competition- Share the
                                            unknown
                                            spots of
                                            Mizoram</a>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>

    </div>
</div>