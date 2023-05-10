<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<style>
h1 {
font-size: 20px;
margin-bottom: 10px;
color: rgb(3, 3, 3);
}
.video_content {
padding: 39px 55px;
}
.video__details {
display: flex;
/* margin-top: 10px; */
margin-left: 10px;
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
.recent_img{
width: 57%;
border-radius: 5px;
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
button {
width: 100%;
}
button {
position: relative;
padding: 0.375rem 0.75rem;
color: #eee;
background-color: #009ade;
border: 0;
line-height: 1.5;
border-radius: 0.25rem;
outline: none;
}
button:first-child {
margin-bottom: 0.5rem;
}
button:not(:disabled):hover,
button:not(:disabled):active {
cursor: pointer;
background-color: #0079cd;
color: #fff;
}
button:not(:disabled):active {
transform: scale(0.95, 0.95);
}
button:disabled {
opacity: 0.75;
}
.buttons {
display: flex;
flex-wrap: wrap;
justify-content: center;
width: 100%;
margin-top: 1rem;
}
@media only screen and (min-width: 370px) {
button {
width: initial;
}
button:first-child {
margin: 0 1rem 0 0;
}
}
</style>
<section>
    <div class="container-fluid">
        <div class="video_content">
            <div class="row">
                <div class="col-md-8">
                    <h1><?= $Conversation['title']?></h1>
                    <div class="play_video">
                        <p class="error"></p>
                        <video loop width="100%" height="100%" controls autoplay>
                            <source src="<?php echo base_url(); ?><?= $Conversation['video']?>">
                            <source src="movie.ogg" type="video/ogg">
                            Your browser does not support the video tag.
                        </video>
                        <!-- <div class="buttons">
                            <button class="playPause">Play video</button>
                            <button class="pip">Enter picture-in-picture mode</button>
                        </div> -->
                    </div>
                    <div class="video__details">
                        <div class="title-text">
                            <h3> <?= $Conversation['title']?> </h3>
                            <span><?= $Conversation['views']?> Views • <?= time_elapsed_string($Conversation['created_on'])?></span>
                            <input type="hidden" value="<?= $Conversation['likes']?>" id="oldlikes">

                            <span id="newlikes"> </span><span> likes </span>
                            <span class="like_button" type="button" onclick="submitLike('<?= $Conversation["id"]?>')"><i  id="heart" style="width:18px; font-size: 21px; margin-right: 9px; color:red;"></i>Like</span>
                            <a href="<?php echo base_url().'users/conversation_video/'?><?php echo encryptids("E", $Conversation['id'] )?>" data-toggle="tooltip" title="Copy Link and Share" class="share_button" type="button"><i class="fa fa-share" style="margin:4px;"></i>Share</a>
                            
                        </div>
                    </div>
                    <div class="description_text">
                        <p class=""><?= $Conversation['description']?></p>
                    </div>
                </div>
                <div class="col-md-4">
                    <h1>Recent Search</h1>
                    <?php foreach ($getRecentSearch as $key => $value) {?>
                    <div class="video_recent">
                        <!-- <a href="<?php echo base_url().'users/conversation_video/'?><?php echo encryptids("E", $value['id'] )?>">  -->
                        <img src="<?= base_url()?><?= $value['video_thumbnail']?>" alt="" class="recent_img"/>
                        <!-- </a>  -->
                        <div class="video__details">
                            <div class="title">
                                <h3><a href="<?php echo base_url().'users/conversation_video/'?><?php echo encryptids("E", $value['id'] )?>"> <?= $value['title']?></a></h3>
                                
                                <span><?= $value['views']?> Views • <?= time_elapsed_string($value['created_on'])?></span>
                            </div>
                        </div>
                    </div>
                    <?php }?>
                    
                    
                </div>
            </div>
        </section>
        <div class="modal fade" id="updatemodel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><span class="sms"></span> Copy Link  </h5>
                <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
            </div>
            <div class="modal-body">
                <p>Copy this video Link</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary updatestatus" data-bs-dismiss="modal">Copy</button>
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
        var likes="<?= $Conversation['likes']?>"; 
        $("#newlikes").text(likes);
        var id="<?= $Conversation['id']?>";
        Checklike(id);


    });
 </script>
        <script>
        const error = document.querySelector(".error");
        const video = document.querySelector("video");
        const playPause = document.querySelector(".playPause");
        const pip = document.querySelector(".pip");
        video.addEventListener("pause", e => {
        playPause.innerText = "Play video";
        });
        video.addEventListener("play", e => {
        playPause.innerText = "Pause video";
        });
        video.addEventListener("leavepictureinpicture", e => {
        pip.innerText = "Enter picture-in-picture mode";
        });
        video.addEventListener("enterpictureinpicture", e => {
        pip.innerText = "Leave picture-in-picture mode";
        });
        pip.addEventListener("click", async e => {
        pip.disabled = true;
        try {
        if (!document.pictureInPictureEnabled) {
        return (error.innerText =
        "Picture-in-picture is not supported in your browser");
        }
        if (video !== document.pictureInPictureElement) {
        await video.requestPictureInPicture();
        return video.play();
        }
        await document.exitPictureInPicture();
        } catch (err) {
        error.innerText = "Error, try again!";
        } finally {
        pip.disabled = false;
        }
        });
        playPause.addEventListener("click", async e => {
        playPause.disabled = true;
        try {
        if (video.paused) {
        video.play();
        return (playPause.innerText = "Pause video");
        }
        video.pause();
        playPause.innerText = "Play video";
        } catch (err) {
        error.innerText = "Error, try again!";
        } finally {
        playPause.disabled = false;
        }
        });
 

    </script>


    <script type="text/javascript">
        $('.share_button').click(function (e) 
        { 
            e.preventDefault();
            var copyText = $(this).attr('href');
            document.addEventListener('copy', function(e) {
                e.clipboardData.setData('text/plain', copyText);
                e.preventDefault();
            }, true);
            document.execCommand('copy');
            $('#updatemodel').modal('show');
        });

        function submitLike(id)
        { 
        $.ajax({
        type: 'POST',
        url: '<?php echo base_url(); ?>Users/updateLikes',
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
                Checklike(id)
            }
        },
        error: function(result) {
        alert("Error,Please try again.");
        }
        });
        } 


        function Checklike(id)
        {  
        $.ajax({
        type: 'POST',
        url: '<?php echo base_url(); ?>Users/Checklike',
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
        
        </script>