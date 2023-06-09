<style>
.your_wall_main_card_view {
    box-shadow: 0px 1px 20px rgb(225 225 225);
    border-radius: 3px;
    -ms-box-shadow: 0px 1px 20px rgb(225 225 225);
    margin-bottom: 36px;

}

.yourWall_image_view {
    height: 200px;
    margin-bottom: 17px;
    position: relative;
}
.yourWall_image {
    height: 510px;
    margin-bottom: 17px;
    position: relative;
}

.Text-container_view {
    padding: 0px 19px 4px;
    text-align: justify;
    /* min-height: 180px; */
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

    display: -webkit-box;

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
.img_mentor {
    padding: 8px;
    border-radius: 15px;
    height: 201px;
}
.input_box {
    display: flex;
    justify-content: center;
    align-items: center;
    box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
    height: 201px;
    border-radius: 12px;
    position: relative;
}
.owl-nav{
    display: none;
}
</style>
<div class="container-fluid" style="padding:49px;">
    <div class="your_wall_Outer_Box">
        <div class="inner_wall">
            <div class="row mt-5">
                <div class="col-sm-12">
                <h6 class="yourWall_title_view ">
                            <?php echo $published_wall['title']; ?>                                
                            </h6>
                    <div class="your_wall_main_card_view">
                        <div class="yourWall_image"> 

                            <img src="<?php echo base_url().'uploads/your_wall/'.$published_wall['image'] ?>" alt="not found" class="w-100 h-100">
                            <span><i class="fa fa-calendar icons"></i><?php echo date("m-d-Y",strtotime($published_wall['created_on'])); ?></span>
                        </div>
                        <div class="Text-container_view ">
                            
                            <p class="Your_Wall_Description_view">
                            <?php echo $published_wall['description']; ?>                               
                            </p>

                        </div>
                        <!-- <div class="" style="text-align: end; margin-right: 23px;">
                            <button class="btn btn-primary mb-4 mr-4">
                                By <?php echo $published_wall['user_name']; ?>
                            </button>
                        </div> -->
                        <div class="row" style="padding:10px;">
                        <?php if(!($published_wall['other_image1'])==""){ ?>
                        <div class="mb-3 col-md-3">
                            <div class="input_box" >
                                <img src="<?php echo base_url().$published_wall['other_image1']; ?>" id="outputThumbnail" alt="" class="w-100 img_mentor">
                               
                            </div>
                        </div>
                        <?php } ?>
                        <?php if(!($published_wall['other_image2'])==""){ ?>
                        <div class="mb-3 col-md-3">
                            <div class="input_box" >
                                <img src="<?php echo base_url().$published_wall['other_image2']; ?>" id="outputThumbnail" alt="" class="w-100 img_mentor">
                               
                            </div>
                        </div>
                        <?php } ?>
                        <?php if(!($published_wall['other_image3'])==""){ ?>
                        <div class="mb-3 col-md-3">
                            <div class="input_box" >
                                <img src="<?php echo base_url().$published_wall['other_image3']; ?>" id="outputThumbnail" alt="" class="w-100 img_mentor">
                               
                            </div>
                        </div>
                        <?php } ?>
                        <?php if(!($published_wall['other_image4'])==""){ ?>
                        <div class="mb-3 col-md-3">
                            <div class="input_box" >
                                <img src="<?php echo base_url().$published_wall['other_image4']; ?>" id="outputThumbnail" alt="" class="w-100 img_mentor">
                               
                            </div>
                        </div>
                        <?php } ?>

                        <?php if(!($published_wall['document'])==""){ ?>
                        
                        
                        <div class="" style="margin-left: 17px;">
                                <!-- <a class="btn btn-info mb-4 mr-4"  href="<?php echo base_url().$published_wall['document']; ?>" target="_blank"><img  src="<?php echo base_url().'assets/admin/img/pdf.png'; ?>" width="100px"/></a>
                                </a> -->
                                <a class="btn btn-primary mb-4 mr-4"  href="<?php echo base_url().$published_wall['document']; ?>" target="_blank">View Details</a>
                                
                        </div>
                            
                            
                        <?php } ?>
                    </div>
                    </div>



                </div>
                <!-- <div class="col-sm-3">
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
                            </div>
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
                                        
                                        <a href="#" class="tending_para "><?php echo $list['description']; ?></a>
                                    </div>
                                </div>
                                <?php } } ?>
                               
                            </div>
                        </div>
                    </div>

                </div> -->
                <div class="col-md-12 " style="text-align: right;">
                    <a class="btn btn-primary btn-sm text-white" onclick="location.href='<?php echo base_url().'users/your_wall_posts'; ?>'">Back</a>
                </div>
            </div>
        </div>
        
    </div>
</div>