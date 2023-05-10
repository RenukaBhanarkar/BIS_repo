<style>
.cards-wrapper {
display: flex;
height: 342px;
}
.winner-content .card{
width: calc(100%/2);
margin: 0 0.5em;
}
.Your_Wall_Description{
display: block;
width: 100px;
overflow: hidden;
white-space: nowrap;
text-overflow: ellipsis;
}
#yourwall_title{
overflow: hidden;
white-space: nowrap;
text-overflow: ellipsis;
}
.cloned{
height:400px;
}
.item .card {
border: none;
border-radius: 0;
box-shadow: 2px 6px 8px 0 rgba(22, 22, 26, 0.18)!important;
}
.heading-underline .left_1 {
width: 25%;
height: 5px;
float: left;
background-color: #014e9d;
}
.owl-dot{
color: black;
}
#yourwall_description{
display:block;
overflow: hidden;
height: 84px;
}
.select-wrapper {
background: url('<?php echo base_url(); ?>assets/images/plus.png') no-repeat;
background-size: cover;
display: block;
position: absolute;
width: 76px;
height: 76px;
/* padding: 35px; */
/* margin-left: 111px; */
/* top: 50%; */
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
#image_src2, #image_src3,#image_src4,#image_src5 {
width: 78px;
height: 49px;
opacity: 0;
filter: alpha(opacity=0);
margin-left: 0px;
margin-top: 13px !important;
}
/* .box_img {
box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
height: 201px;
border-radius: 12px;
} */
.img_mentor {
padding: 8px;
border-radius: 15px;
height: 201px;
}
</style>
<section>
    <div class="container">
        <!-- <pre> -->
        <!-- <?php //print_r($masterWinners)?> -->
        <?php foreach ($masterWinners as $value) {?>
            
            <div class="row my-4">
                <div class="col-md-8">
                    <div class="static-content">
                        <div class="bloginfo">
                            <h3 style="margin-bottom: 5px; color: #0086b2!important;font-weight: 600;"><?= $value['wall_title']?>
                            </h3>
                        </div>
                        <div class="heading-underline" style="width: 113px;">
                            <div class="left_1"></div><div class="right"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="input-group search_icon">
                        <input class="form-control border-end-0 border rounded-pill" type="search" value="search" id="example-search-input">
                        <span class="input-group-append">
                            <button class="search_button btn btn-outline-secondary bg-white border-bottom-0 border rounded-pill ms-n5" type="button">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                </div>
            </div> 
            <div class="winner-content">
                <div class="owl-carousel owl-theme carouselExampleControlswinner" id="">
               <?php foreach($value['Winners'] as $list){  ?>
                    <div class="item">
                        <div class="card" style="width: 100%;">
                            <div class="yourWall_image">
                                <img src="<?php echo base_url().$list['image']; ?>" class="card-img-top" alt="">
                            </div>
                            <div class="card-body-winner">
                              <h5 class="card-title"><?= $list['name']; ?></h5>
                              <p class="card-text-winner"><?= $list['location']; ?></p>
                              <div class="first-Prize">
                                <?php 
                                if ($list['prize']==1) {
                                    $prize=1;
                                    $sup='st';
                                }
                                if ($list['prize']==2) {
                                    $prize=2;
                                    $sup='nd';
                                }

                                if ($list['prize']==3) {
                                    $prize=3;
                                    $sup='rd';
                                }
                                if ($list['prize']==4) {
                                    $prize='Consolation';
                                    $sup='';
                                }
                                ?>
                              <a href="#"><?= $prize?><sup><?= $sup?></sup> Prize</a>
                              </div>
                        </div>
                        </div>
                    </div>
                <?php }?>
                </div>
            </div>
        <?php }?>
    </div>
</section>