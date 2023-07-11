<link href="<?= base_url(); ?>assets/css/standard_writting.css" rel="stylesheet" />
<div class="container-fluid row">
    <div class="col-md-9">
        <section id="banner-section">
            
            <div class="row">
                <div class="col-sm-5">
                    <div class="quiz-image shadow">
                        <img src="<?= base_url(); ?><?=$getData['banner_img']?>" class="image-section" alt="Bis Quiz Images"/>
                    </div>
                </div>
                <div class="col-sm-7">
                    <div class="Quiz_text">
                        <h3 class="main-title"><?=$getData['title']?></h3>
                        
                        <div class="d-flex">
                            <p class="time-start-end d-flex" style="margin-bottom:0px;">
                              <!--   <span class="start-end-time-title mr-2">Start Date<span class="quiz-text-date m-2"><?= date("d-m-Y", strtotime($getData['start_date']));?> </span></span> -->

                                 <span class="start-end-time-title mr-2">Start Date <span class="quiz-text-date m-2"><?= date("d-m-Y", strtotime($getData['start_date']));?> <?=$getData['start_time']?></span></span>


                            </p>
                            <p class="time-start-end d-flex" style="margin-bottom:0px; margin-left: 8px;">
                                <span class="start-end-time-title">Marks<span class="quiz-text-date m-2"><?=$getData['total_mark']?></span>
                            </span>
                        </p>
                    </div>
                    <div class="d-flex">
                        <p class="time-start-end d-flex" style="margin-bottom:0px; margin-top: 10px;">
                            <span class="start-end-time-title">End Date <span class="quiz-text-date m-2"><?= date("d-m-Y", strtotime($getData['end_date']));?>        <?=$getData['end_time']?></span></span>
                        </p>
                        
                        <p class="time-start-end d-flex" style="margin-bottom:0px; margin-top: 10px; margin-left: 10px;">
                            <span class="start-end-time-title">level
                                
                                <span class="quiz-text-date m-2">  <?=$getData['level']?> </span>
                            </span>
                            
                        </p>
                        <?php if($getData['region'] !="") { ?>
                        <p class="time-start-end d-flex" style="margin-bottom:0px; margin-top: 10px; margin-left: 10px;">
                            <span class="start-end-time-title">Region
                                <span class="quiz-text-date m-2"><?= $getData['region'];?></span>
                            </span>
                            
                        </p>
                        <?php }?>
                        <?php if($getData['branch'] !="") { ?>
                        <p class="time-start-end d-flex" style="margin-bottom:0px; margin-top: 10px; margin-left: 10px;">
                            <span class="start-end-time-title">Branch
                                <span class="quiz-text-date m-2"><?= $getData['branch'];?></span>
                            </span>
                            
                        </p>
                        <?php }?>
                        <?php if($getData['state'] !="") { ?>
                        <p class="time-start-end d-flex" style="margin-bottom:0px; margin-top: 10px; margin-left: 10px;">
                            <span class="start-end-time-title">State
                                <span class="quiz-text-date m-2"><?= $getData['state'];?></span>
                            </span>
                            
                        </p>
                        <?php }?>
                        <?php if ($getData['standard']!=0) {?>
                        <p class="time-start-end d-flex" style="margin-bottom:0px; margin-top: 10px; margin-left: 10px;">
                            <span class="start-end-time-title">Class
                                <span class="quiz-text-date m-2">
                                    <?php  $class = explode(",",$getData['standard']);
                                    foreach ($class as $classdata)
                                    {?>
                                    <?=$classdata?><sup>th</sup>
                                    <?php } ?>
                                </span>
                            </span>
                            
                        </p>
                        <?php }?>
                        
                        
                    </div>
                    <p id="ShowLoginButton" style="display:none">
                        <?php  if (!isset($_SESSION['user_session_id']))
                        { ?>
                        <a href="<?php echo base_url() . "users/login"?>" class="btn startQuiz" id="startQuizLang"> <span>Login to Participate</span></a>
                        <?php
                        } else
                        {
                        if ($allFilds1==1 && $allFilds2==1)
                        { ?>
                        <?php if(empty($attempt)){?>
                        <a href="<?php echo base_url() . "users/standard_writting_login/"?><?php echo  $id= encryptids("E", $getData['id'] )?>" class="btn startQuiz" id="startQuizLang"> <span>Start</span></a>
                        <?php } else {?>
                        <div class="alert alert-primary background-success">
                            You have Already attempt this competition.
                        </div>
                        <?php }?>
                        <?php }
                        else
                        { ?>
                        <div class="alert alert-danger background-danger">
                            Access denied
                        </div>
                        <?php }
                        }?>
                    </p>
                    <!-- <p id="countdown" class="countdown"> </p> -->
                    <div id="countdown">
                        <ul style="padding-left:0px">
                            <li class="count_down_new"><span id="days"></span>days</li>
                            <li class="count_down_new"><span id="hours"></span>Hours</li>
                            <li class="count_down_new"><span id="minutes"></span>Minutes</li>
                            <li class="count_down_new"><span id="seconds"></span>Seconds</li>
                        </ul>
                    </div>
                    
                    
                    
                    
                </div>
            </div>
        </div>
    </section>
    
    <section id="quiz-about" class="mb-5">
        <div class="about-inner ">
            <h2 class="about-section">About Competition</h2>
            <div class="About_point">
                <?=$getData['description']?>
            </div>
        </div>
    </section>
    <section id="quiz-about" class="mb-5">
        <div class="about-inner">
            <h2 class="about-section">Terms and Conditions</h2>
            <div class="About_point ">
                <?=$getData['terms_conditions']?>
            </div>
        </section>
    </div>
    <div class="col-md-3">
        <section class="-join_section">
            <div class="join_content">
                <div class="bloginfo">
                    <h3 style="margin-bottom: 14px; /* margin-top: 20px; */ color: #0086b2!important; font-weight: 600; margin-left: 24px;">Prize Details</h3>
                </div>
                
                <div class="join_container">
                    
                    <div class="view_join_content">
                        <h3>First Prize</h3>
                        <?php if (!empty($getData['fprize_img'])) {?>
                        <div class="start_content">
                            <img src="<?php echo base_url(); ?><?=$getData['fprize_img']?>" alt="" class="join_img">
                        </div>
                        <?php }
                        else{?>
                        <div class="start_content">
                            <img src="<?php echo base_url(); ?>assets/images/winners.jpg" alt="" class="join_img">
                        </div>
                        <?php }
                        ?>
                        
                        <div class="#">
                            <div class="title_join">
                                <h3><?=$getData['fdetails']?></h3>
                                <span class="last-date">Number of Prizes :<span class="date-time" style="margin-left:5px;"><?=$getData['fprize']?></span></span>
                            </div>
                        </div>
                    </div>
                    <?php if ($getData['sprize']!='') {?>
                    <div class="view_join_content">
                        <h3>Second Prize</h3>
                        <?php if (!empty($getData['sprize_img'])) {?>
                        <div class="start_content">
                            <img src="<?php echo base_url(); ?><?=$getData['sprize_img']?>" alt="" class="join_img">
                        </div>
                        <?php }
                        else{?>
                        <div class="start_content">
                            <img src="<?php echo base_url(); ?>assets/images/winners.jpg" alt="" class="join_img">
                        </div>
                        <?php }
                        ?>
                        
                        <div class="#">
                            <div class="title_join">
                                <h3><?=$getData['sdetails']?></h3>
                                <span class="last-date">Number of Prizes :<span class="date-time" style="margin-left:5px;"><?=$getData['sprize']?></span></span>
                            </div>
                        </div>
                    </div>
                    <?php }?>
                    <?php if ($getData['tprize']!='') {?>
                    <div class="view_join_content">
                        <h3>Third Prize</h3>
                        <?php if (!empty($getData['tprize_img'])) {?>
                        <div class="start_content">
                            <img src="<?php echo base_url(); ?><?=$getData['tprize_img']?>" alt="" class="join_img">
                        </div>
                        <?php }
                        else{?>
                        <div class="start_content">
                            <img src="<?php echo base_url(); ?>assets/images/winners.jpg" alt="" class="join_img">
                        </div>
                        <?php }
                        ?>
                        
                        <div class="#">
                            <div class="title_join">
                                <h3><?=$getData['tdetails']?></h3>
                                <span class="last-date">Number of Prizes :<span class="date-time" style="margin-left:5px;"><?=$getData['tprize']?></span></span>
                            </div>
                        </div>
                    </div>
                    <?php }?>
                    <?php if ($getData['cprize']!='') {?>
                    <div class="view_join_content">
                        <h3>Consolation Prize</h3>
                        <?php if (!empty($getData['cprize_img'])) {?>
                        <div class="start_content">
                            <img src="<?php echo base_url(); ?><?=$getData['cprize_img']?>" alt="" class="join_img">
                        </div>
                        <?php }
                        else{?>
                        <div class="start_content">
                            <img src="<?php echo base_url(); ?>assets/images/winners.jpg" alt="" class="join_img">
                        </div>
                        <?php }
                        ?>
                        
                        <div class="#">
                            <div class="title_join">
                                <h3><?=$getData['cdetails']?></h3>
                                <span class="last-date">Number of Prizes :<span class="date-time" style="margin-left:5px;"><?=$getData['cprize']?></span></span>
                            </div>
                        </div>
                    </div>
                    <?php }?>
                    
                    
                    
                    
                    
                    
                    
                </div>
            </div>
        </section>
    </div>
</div>
<script>

<?php date_default_timezone_set("Asia/Calcutta"); ?>
var current_time = '<?php echo date('Y-m-d H:i:s');?>';
var startTime = '<?php echo $getData['start_date'];?> <?php echo $getData['start_time'];?>';
// if(current_time < startTime){
//var countDownDate = new Date("2023-05-24 22:00:00").getTime();
var countDownDate = new Date(startTime).getTime();
var x = setInterval(function() {

var now = new Date().getTime();


var distance = countDownDate - now;


var days = Math.floor(distance / (1000 * 60 * 60 * 24));
var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
var seconds = Math.floor((distance % (1000 * 60)) / 1000);


//   document.getElementById("countdown").innerHTML = days + "d " + hours + "h "
//   + minutes + "m " + seconds + "s ";
document.getElementById("days").innerHTML = days + "d ";
document.getElementById("hours").innerHTML = hours + "h ";
document.getElementById("minutes").innerHTML = minutes + "m ";
document.getElementById("seconds").innerHTML = seconds + "s ";


if (distance < 0) {
clearInterval(x);
$('#ShowLoginButton').css('display','block');
$('#countdown').css('display','none');
countdown

}
}, 1000);

</script>