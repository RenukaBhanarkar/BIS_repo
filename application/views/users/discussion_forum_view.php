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
.text_container_tranding {
width: 74%;
line-height: 20px;
padding: 0px 14px;
}
.Btn-do {
font-size: 12px;
padding: 3px 4px;
border-radius: 5px;
}
.tending_para {
padding: 2px 0px 0px;
font-size: 13px;
font-weight: 600;
display: -webkit-box;
max-width: 100%;
height: 40px;
-webkit-line-clamp: 2;
overflow: hidden;
-webkit-box-orient: vertical;
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
</style>
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="static-content">
                <div class="bloginfo">
                    <h3 style="margin-bottom: 0px;margin-top:20px;color: #0086b2!important;font-weight: 600;">Discussion Forum</h3>
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
                <div class="col-sm-12">
                    <h4>
                    <?=$getData['title']?></h4>
                    <div class="your_wall_main_card_view">
                        <div class="yourWall_image">
                            <img src="<?= base_url();?><?= $getData['image']?>" alt="not found" class="w-100 h-100">
                            <span><i class="fa fa-calendar icons"></i><?php echo date("m-d-Y",strtotime($getData['created_on'])); ?></span> 
                        </div>
                        <div class="Text-container_view ">
                            <h6 class="yourWall_title_view ">
                           <?=$getData['title']?>
                            </h6>
                            <div class="Your_Wall_Description_view">
                                <?=$getData['description']?>
                            </div>
                            
                        </div>
                        
                    </div>
                </div>
                 
            </div>
        </div>
    </div>


<?php  $admin_id = encryptids("D", $this->session->userdata('admin_id')); 
if($admin_id==''){?>
    <div class="container mb-4">
    <div class="artical-comment">
        <div class="view_content">
            <label class="d-block text-font" style="font-weight: 600;padding: 10px;">Login for post Your Comments</label>

            <a href="<?= base_url()?>users/login">
                <div class="common_content" style="background: white; border-radius: 10px;">
                    <div class="comment_user">
                        <img src="<?= base_url();?>/assets/images/user_1.png" alt="Default Profile Picture" width="5%" style="margin-left: 8px; padding: 2px;"><span style="margin-left: 15px; font-size: 17px;">Login</span>
                    </div>
                </div>
            </a>
            
        </div>
    </div>
</div>

<?php }  
 else { ?>

<div style="background-image: url(<?php echo base_url(); ?>/assets/images/whats-new-bg.png);">
    <div class="container">
        <?php
    if ($this->session->flashdata('MSG')) {
    echo $this->session->flashdata('MSG');
    }
    ?>
        <form name="discussion_forum_view" id="discussion_forum_view" action="<?php echo base_url().'Users/discussion_forum_view/'?><?= $getData['id']?>" method="post"enctype="multipart/form-data">
            <div class="bg-light-comment p-3">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group ">
                            <input type="hidden" name="admin_id" value="<?= $admin_id?>">
                            <textarea class="form-control  w-100" rows="8" placeholder="Share Your Comments......" name="description"></textarea>
                        </div>
                    </div>
                    <div class="button-group  mt-3" style="text-align:end;">
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<?php } ?>
<div style="background-image: url(<?php echo base_url(); ?>/assets/images/whats-new-bg.png);">
    <div class="container"> 
          <?php foreach ($commnets as $key => $value): ?>
        <div class="artical-comment-view">
            <div class="view_content">
                <a href="">
                    <div class="common_content">
                        <div class="comment_user">
                            <img src="<?php echo base_url(); ?>/assets/images/people.png" alt="Default Profile Picture" width="5%">
                            <span style="margin-left: 15px; font-size: 17px; font-weight: 600;"><?= $value['user_name']?></span>
                            <!-- <span class="float-right" style="float:right;">1 hour 47 minutes ago</span> -->
                            <span class="float-right" style="float:right;"><?= $value['created_on']?></span>
                            
                        </div>
                        <div class="mt-1"><?= $value['description']?></div>
                    </div>
                </a>
                
            </div>
        </div>
        <hr>
            
        <?php endforeach ?> 
    </div>
</div>


<!-- /.container-fluid -->

</div>
 