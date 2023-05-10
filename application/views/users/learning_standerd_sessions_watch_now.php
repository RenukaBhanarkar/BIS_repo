
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<style>
h1 {
    font-size: 20px;
    margin-bottom: 10px;
    color: rgb(3, 3, 3);
}
.join_video_content {
    padding: 39px 65px;
} 
.news__details {
    display: flex;
    margin-top: 10px; 
    
}
.like_button {
background: #ffd600;
margin-left: 273px;
padding: 3px;
width: 76px;
text-align: center;
border-radius: 10px;
font-weight: 700;
font-size: 14px;
}
.author img {
    object-fit: cover;
    border-radius: 50%;
    height: 40px;
    width: 40px;
    margin-right: 10px;
}
.title {
    display: flex;
    flex-direction: column;
}
.title h3 {
    color: rgb(3, 3, 3);
    font-size: 14px;
    margin-bottom: 6px;
    font-weight: 600;
    line-height: 1.5em;
    height: 3em;
    overflow: hidden;
    
}
.title-text h3 {
    color: rgb(3, 3, 3);
    font-size: 14px;
    margin-bottom: 6px;
    font-weight: 600;
    line-height: 1.5em;
    /* height: 3em; */
    overflow: hidden;
    
}
.title a, span {
    text-decoration: none;
    /* color: rgb(96, 96, 96); */
    font-size: 14px;
}
.video_recent {
    display: flex;
    flex-direction: row;
    padding: 5px;
}
img.news_img {
    width: 100%;
    height: 244px;
}
.description_text {
    padding: 10px;
    /* font-size: 8px; */
}
.description_text p{
   font-size:14px;
   
}
.share_button {
    background: #ffd600;
    
    padding: 3px;
    width: 76px;
    text-align: center;
    border-radius: 10px;
    font-weight: 700;
    font-size: 14px;
}
.like_button {
    background: #ffd600;
    margin-left: 273px;
    padding: 3px;
    width: 76px;
    text-align: center;
    border-radius: 10px;
    font-weight: 700;
    font-size: 14px;
}   
</style>    
<section>
    <div class="container-fluid">
    <div class="join_video_content">
        <div class="row">
        <div class="col-md-4">
                <h1>Whats News</h1>
                <hr>     
                   <div class="whats_new">
                        <a href="#"> <img src="<?php echo base_url(); ?>/assets/images/whats_news.jpg" alt="#" class="news_img"/>
                        </a>
                         <div class="news__details">
                                <div class="title">
                                    <h3><a href="#">The Great Wall reflects collision and exchanges between agricultural civilizations and nomadic civilizations</a></h3>
                                    <span>10M Views</span>
                                </div>
                            </div>  
                        </div>
            </div> 
            <div class="col-md-8">  
                <div class="play_video">
                    <!-- <p><?= $WatchNow['session_link']?></p> -->
                </div> 
                <div class="video__details">
                    <div class="title-text"> 
                        <h3><?= $WatchNow['title']?></h3> 
                         <img style="height: 320px;width: 832px;" src="<?php echo base_url(); ?><?= $WatchNow['thumbnail']?>" alt="" class="join_img">
                       <p style="padding: 10px;"> Link: - <a href="<?= $WatchNow['session_link']?>" class="btn btn-info btn-sm" ><?= $WatchNow['session_link']?></a></p>
                        <span>Date : <?= date("d M Y", strtotime($WatchNow['created_on']));?></span>

                        <span><?= $WatchNow['views']?> Views • <?= time_elapsed_string($WatchNow['created_on'])?></span>
                            <input type="hidden" value="<?= $WatchNow['likes']?>" id="oldlikes">

                            <span id="newlikes"> </span><span> likes </span>
                            <span class="like_button" type="button" onclick="submitLike('<?= $WatchNow["id"]?>')"><i  id="heart" style="width:18px; font-size: 21px; margin-right: 9px; color:red;"></i>Like</span>
                        
                    </div> 
                </div>
                <div class="video__details">
                    <div class="title-text">
                        <p><?= $WatchNow['description']?></p> 
                    </div> 
                </div>
                
            </div>


              
    </div>      
</section>   





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
        var likes="<?= $WatchNow['likes']?>"; 
        $("#newlikes").text(likes);
        var id="<?= $WatchNow['id']?>";
        console.log(id)
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
                var newlikes=parseInt(oldlikes)+parseInt(likes);
                $("#newlikes").text(newlikes);
                Checkleasrninglike(id)
            }
        },
        error: function(result) {
        alert("Error,Please try again.");
        }
        });
        }


        function Checkleasrninglike(id)
        {  
            // console.log(id)
        $.ajax({
        type: 'POST',
        url: '<?php echo base_url(); ?>Users/Checkleasrninglike',
        data: {
        id: id, 
        },
        success: function(result)
        {
            // console.log(result)
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
        
        </script>


