<style>
    .item {
    height: 100%;
    
}
a.view-btn {
    background: linear-gradient(233.19deg, #43879d -256.88%, #c5232c -167.3%, #2d329a -81.23%, #c25757 -2.2%, #000000 80.36%);
    border: 0.5px solid rgba(74, 74, 74, 0.25);
    border-radius: 4px;
    padding: 3px 12px;
    display: inline-flex;
    margin: 9px auto;
    color: #fff;
    text-align: center;
    
}
.live_content {
    text-align: center;
}
h2.up_coming {
    font-weight: 600;
    /* margin-top: 43px; */
    margin-bottom: 16px;
    /* FONT-WEIGHT: 600; */
    color: white;
    /* font-family: emoji; */
    font-size: 30px;
    padding: 12px;
}
section.background_coming {
    background: #000000e8;
    color: white;
}
#owl-caraousal_1 .owl-prev {
    width: 15px;
    height: 100px;
    position: absolute;
    top:20%;
    margin-left: -20px;
    display: block !important;
    border:0px solid black;
}

#owl-caraousal_1 .owl-next {
    width: 15px;
    height: 100px;
    position: absolute;
    top:20%;
    right: -25px;
    display: block !important;
    border:0px solid black;
}

 .owl-prev {
    width: 15px;
    height: 100px;
    position: absolute;
    top:40%;
    left: 0px;
    display: block !important;
    border:0px solid black;
}

 .owl-next {
    width: 15px;
    height: 100px;
    position: absolute;
    top:40%;

    right: 0px;
    display: block !important;
    border:0px solid black;
}
.owl-prev i, .owl-next i {transform : scale(1,6); color: #ccc;}
.owl-dots {
 display:none;
}

.view-button {
	background: #ffffff;
	border: 1px solid rgba(74, 74, 74, 0.25);
	border-radius: 4px;
	color: #3e4f5a;
	width: 120px;
	margin: 30px auto 0;
	padding: 5px;
	text-align: center;
	font-size: 0.813em;
	font-family: "montserratbold", sans-serif;
}
.view-button:hover {
	background: black;
	color: white;
}
.centered {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}
#pic {
  position: relative;
  text-align: center;
  color: white;
}
</style>
<section id="photo">
<div class="container-fluid" id="pic" style="height:300px; width:100%">
<img src="<?php echo base_url(); ?>assets/images/learning_new.jpeg" style="height: 100%;
   width: 100%;" class="img-fluid" alt="...">

<!-- <div class="centered">Learning and Science of standerd</div> -->

</div>


</section>


<section class="">
        <div class="container" style="padding:54px 0px 33px 0px;">
            <h2 class="" style="font-weight: 600;">Live Posts/Sessions</h2>
            <div class="coming_content" style="margin-top:32px;">
                <div class="owl-carousel owl-theme" id="owl-caraousal_1">
                    <?php foreach ($LiveSessions as $key => $value) {?>
                        <div class="item">
                            <div class="quiz-section">
                                <div class="quiz-box">
                                    <a href="<?php echo base_url().'users/learning_standerd_sessions_watch_now/'?><?php echo encryptids("E", $value['id'] )?>">
                                    <img src="<?php echo base_url(); ?><?= $value['thumbnail']?>" class="w-100 border-2"></a>
                                </div> 
                                <p class="quiz-text overflow-hidden p-1"><a href="<?php echo base_url().'users/learning_standerd_sessions_watch_now/'?><?php echo encryptids("E", $value['id'] )?>"><?= $value['title']?></a></p>
                            </div>
                        </div>
                    <?php } ?>
                 
               <!--  <div class="item">
                    <div class="quiz-section">
                            <div class="quiz-box">
                                <img src="<?php echo base_url(); ?>assets/images/img_1.jpg" class="w-100 border-2">
                            </div> 
                            <p class="quiz-text overflow-hidden p-1">Title of the Post Date</p>
                        </div>
                </div> -->

                
            </div>  
            
            <div class="view-button  mb-3">
                <a href="learning_standerd_sessions_view_all">View All</a>
            </div>
        </div>
    </div>    
</section>
<section class="">
    <div class="container-fluid">
        <div class="live_session d-flex row">
            <div class="col-lg-6 col-md-6 " style="background: linear-gradient(180.83deg, rgb(0 182 242 / 76%) 1.43%, rgba(194, 87, 155, 0.1) 98.57%);">
                <div class="live_content" style="padding: 47px;">
                    <div class="live_section_title">
                        <h2 style="font-weight: 600;">Text Posts</h2>
                    </div>
                    <div class="owl-carousel owl-theme" id="owl-caraousal_2" style="padding: 25px 60px 0px 60px;">
                        <?php foreach ($LatestPosts as $key => $value) {?>
                        <div class="item">
                            <div class="quiz-section">
                                <div class="quiz-box_live">
                                     <a href="<?php echo base_url().'users/learning_standerd_post_readMore/'?><?php echo encryptids("E", $value['id'] )?>"><img src="<?php echo base_url(); ?><?= $value['thumbnail']?>" class="live_img border-2"></a>
                                </div>
                                <p class="quiz-text overflow-hidden p-1" > <a href="<?php echo base_url().'users/learning_standerd_post_readMore/'?><?php echo encryptids("E", $value['id'] )?>"><?= $value['title']?></a></p>

                                <a href="<?php echo base_url(); ?><?= $value['doc_pdf']?>" class="view-btn" title="PDF View" style="margin-right: 16px;" target="_blank">View PDF</a>

                                <a href="learning_standerd_posts_all" class="view-btn" title="View All">View All</a>
                            </div>
                        </div>
                      <?php }?>
                    </div>
                    
                </div>
            </div>
            <div class="col-lg-6 col-md-6 " style="background: linear-gradient(180.83deg, rgb(229 186 0 / 73%) 1.43%, rgba(194, 87, 155, 0.1) 98.57%);">
                <div class="live_content" style="padding: 47px;">
                    <div class="live_section_title">
                        <h2 style="font-weight: 600;">Informative Videos</h2>
                    </div>
                    <div class="owl-carousel owl-theme" id="owl-caraousal_3" style="padding: 25px 60px 0px 60px;">
                        <?php foreach ($InformativeVideo as $key => $value) {?>
                        <div class="item">
                            <div class="quiz-section">
                                <div class="quiz-box_live">
                                    <a href="<?php echo base_url().'users/learning_standerd_informative_video_watch/'?><?php echo encryptids("E", $value['id'] )?>">
                                        <img src="<?php echo base_url(); ?><?= $value['thumbnail']?>" class="live_img border-2">
                                    </a>
                                </div> 
                                <p class="quiz-text overflow-hidden p-1" >
                                    <a href="<?php echo base_url().'users/learning_standerd_informative_video_watch/'?><?php echo encryptids("E", $value['id'] )?>">
                                        <?= $value['title']?></a>
                                    </p>
                            </div>
                        </div>
                        <?php }?>
                    </div>
                    <a href="learning_standerd_informative_video_all" class="view-btn" title="View All">View All</a>
                </div>
            </div>
        </div>    
    </div>
</section>     
