<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<style>

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
.your_wall_main_card_view {
    box-shadow: 0px 1px 20px rgb(225 225 225);
    border-radius: 3px;
    -ms-box-shadow: 0px 1px 20px rgb(225 225 225);
    margin-bottom: 36px;
 
}
.like_button {
background: #ffd600;
/* margin-left: 273px; */
padding: 3px;
width: 76px;
text-align: center;
border-radius: 10px;
font-weight: 700;
font-size: 14px;
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
<div class="container-fluid" style="padding:20px;">
<div class="row">
    <div class="col-md-3">
        <div class="static-content">
            <div class="bloginfo">
                <h3 style="margin-bottom: 0px;margin-top:20px;color: #0086b2!important;font-weight: 600;">Latest Post</h3>
            </div>
            <div class="heading-underline m-0" style="width: 150px;">
                <div class="left"></div><div class="right"></div>
            </div>
        </div>
    </div>
</div>
<div class="your_wall_Outer_Box">
    <div class="inner_wall">
        <div class="row mt-5">
            <div class="col-sm-12">
                <h4><?= $ReadMore['title']?></h4>
                <div class="your_wall_main_card_view">
                    <div class="yourWall_image">
                        <img src="<?php echo base_url();?><?= $ReadMore['image']?>" alt="not found" class="w-100" style="height:321px;">
                        <span><i class="fa fa-calendar icons"> <?= date("d/m/Y h:i A", strtotime($ReadMore['created_on']));?></i></span>
                    </div>
                    <div class="Text-container_view ">
                        <h6 class="yourWall_title_view "><?= $ReadMore['title']?> </h6>

                        <span><?= $ReadMore['views']?> Views • <?= time_elapsed_string($ReadMore['created_on'])?></span>
                            <input type="hidden" value="<?= $ReadMore['likes']?>" id="oldlikes">

                            <span id="newlikes"> </span><span> likes </span>

                            <?php  $admin_id = encryptids("D", $this->session->userdata('admin_id')); 
                        if($admin_id==''){?>
                            <a class="like_button" type="button" href="../login"><i  id="heart" style="width:18px; font-size: 21px; margin-right: 9px; color:red;"></i>Like</a>
                        <?php } else { ?>
                             <span class="like_button" type="button" onclick="submitLike('<?= $ReadMore["id"]?>')"><i  id="heart" style="width:18px; font-size: 21px; margin-right: 9px; color:red;"></i>Like</span>
                        <?php } ?>
                        
                            <!-- <span class="like_button" type="button" onclick="submitLike('<?= $ReadMore["id"]?>')"><i  id="heart" style="width:18px; font-size: 21px; margin-right: 9px; color:red;"></i>Like</span> -->

                        <p class="Your_Wall_Description_view"><?= $ReadMore['description']?> </p>

                         <?php if(!empty($ReadMore['doc_pdf']))
                                {?>
                                    <a href="<?php echo base_url(); ?><?= $ReadMore['doc_pdf']?>" class="view-btn" title="PDF View" style="margin-right: 16px;" target="_blank">Read Document</a>

                                <?php } ?>


                         
                    </div>
                </div>
            </div>
            <div class="" style="text-align:end;">
                <!-- <a href="<?php echo base_url(); ?>users/standard" class="btn-primary btn-sm">Back</a> -->
                <button class="btn btn-primary btn-sm text-white mr-3 mt-2"><a href="<?php echo base_url(); ?>users/learning_standerd_posts_all">Back</a></button>
            </div>
                

            </div>
        </div>

    </div>
</div>




<?php
        function time_elapsed_string($datetime, $full = false) {
        // echo $datetime;
        $now = new DateTime;
        $ago = new DateTime($datetime);
        $diff = $now->diff($ago);
        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;
        $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
        );
        foreach ($string as $k => &$v) {
        if ($diff->$k) {
        $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
        unset($string[$k]);
        }
        }
        if (!$full) $string = array_slice($string, 0, 1);
        return $string ? implode(', ', $string) . ' ago' : 'just now';
        }
        ?>



        <script>
    $(document).ready(function () 
    { 
        var likes="<?= $ReadMore['likes']?>"; 
        $("#newlikes").text(likes);
        var id="<?= $ReadMore['id']?>";
        Checkleasrninglike(id);


    });
 </script>
         
<script type="text/javascript">
 
        function submitLike(id)
        { 
        $.ajax({
        type: 'POST',
        url: '<?php echo base_url(); ?>Users/updateUpdateleasrningLikes',
        data: {
        id: id, 
        },
        success: function(result)
        {
            var msg = JSON.parse(result)
            if (msg.data.status==1) 
            {
                var oldlikes=$("#oldlikes").val();
                var likes=msg.data.likes;
                var newlikes=parseInt(oldlikes)+1;
                $("#newlikes").text(newlikes);
                Checkleasrninglike(id)
            }
            else
            {
               Deleteleasrninglike(id)
            }
        },
        error: function(result) {
        alert("Error,Please try again.");
        }
        });
        }

         function Checkleasrninglike(id)
        {  
        $.ajax({
        type: 'POST',
        url: '<?php echo base_url(); ?>Users/Checkleasrninglike',
        data: {
        id: id, 
        },
        success: function(result)
        {
            var msg = JSON.parse(result)
            if (msg.data.status==1) 
            {   $('#heart').removeClass('fa fa-heart-o');
                $("#heart").addClass('fa fa-heart');
            }
            else
            { 
                $("#heart").addClass('fa fa-heart-o');
            }
        },
        error: function(result) {
        alert("Error,Please try again.");
        }
        });
        };


        function Deleteleasrninglike(id)
        {  
        $.ajax({
        type: 'POST',
        url: '<?php echo base_url(); ?>Users/Deleteleasrninglike',
        data: {
        id: id, 
        },
        success: function(result)
        {
            var msg = JSON.parse(result)
            if (msg.data.status==1) 
            { 
            $("#heart").addClass('fa fa-heart-o');
            var oldlikes=$("#oldlikes").val(); 
                var newlikes=parseInt(oldlikes);
                $("#newlikes").text(newlikes);   
            }
            else
            { $('#heart').removeClass('fa fa-heart-o');
                $("#heart").addClass('fa fa-heart');
                
            }
        },
        error: function(result) {
        alert("Error,Please try again.");
        }
        });
        };
        
        </script>

<!-- <script type="text/javascript">
var countDownDate = new Date(startTime).getTime();
var x = setInterval(function() {
    var now = new Date().getTime();
    var distance = countDownDate - now;
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

</script> -->
