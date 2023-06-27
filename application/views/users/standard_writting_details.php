<style>
#banner-section {
padding: 37px 37px 37px 37px;
background: #ebe6e6;
margin-top: 35px;
border-radius: 10px;
}
.quiz-image {
width: 100%;
height: 300px;
overflow-y: hidden;
border-radius: 10px;
}
.quiz-image img {
width: 100%;
object-fit: fill;
height: 100%;
}
.Quiz_text {
padding: 40px 0px 11px 50px;
}
.startQuiz {
background: #db2721;
color: white;
padding: 7px 25px 7px;
margin-top: 25px;
overflow: hidden;
}
.startQuiz:hover {
color: white;
}
.number-quiz {
margin-right: 13px;
font-size: 16px;
font-weight: 600;
WIDTH: 139px;
display: inline-block;
background: #162b65;
padding: 14px;
text-align: center;
border-radius: 5px;
height: 100px;
}
.main-title {
font-size: 25px;
font-weight: 600;
margin-bottom: 12px;
}
.quiz-text {
font-size: 14px;
color: white;
font-weight: 500;
width: 100%;
display: block;
margin-top: 5px;
}
.start-end-time-title {
font-size: 16px;
font-weight: 600;
padding: 10px;
background: mintcream;
border-radius: 10px;
}
.startQuiz span {
cursor: pointer;
display: inline-block;
position: relative;
transition: 0.5s;
}
.startQuiz span:after {
content: "\00bb";
position: absolute;
opacity: 0;
top: 0;
right: -20px;
transition: 0.5s;
}
.startQuiz:hover span {
padding-right: 25px;
}
.startQuiz:hover span:after {
opacity: 1;
right: 0;
}
.about-section {
font-size: 20px;
font-weight: 600;
margin-bottom: 20px;
}
.about-inner {
border: 1px solid #f1f1f1;
border-radius: 5px;
padding: 20px;
}
.About_point p {
font-size: 14px;
line-height: 30px;
}
.About_point ol li {
line-height: 30px;
}
.question_no {
font-size: 25px;
}
.join_section {
display: flex;
overflow: hidden;
}
.join_content {
background-color: #f9f9f9;
width: 100%;
height: 100%;
padding: 30px 30px;
border-top: 1px solid #ddd;
}
.join_container {
display: flex;
flex-direction: row;
justify-content: space-around;
flex-wrap: wrap;
height: 578px;
overflow: auto;
}
.view_join_content {
width: 310px;
/* margin-bottom: 30px; */
/* padding: 0 0 50px; */
min-height: 150px;
position: relative;
padding: 0 0 50px;
text-align: center;
color: brown;
}
.start_content {
width: 100%;
height: 170px;
}
.join_body {
display: flex;
margin-top: 10px;
}
.join_img {
object-fit: cover;
height: 100%;
width: 100%;
border-radius: 5px;
}
.title_join {
text-align: center;
margin-top: 10px;
color: black;
padding: 3px;
}
span.span_description {
display: block;
height: 88px;
/* width: 330px; */
overflow: hidden;
/* white-space: nowrap; */
text-overflow: ellipsis;
}
.discuss_caption {
background: #b51b00;
text-align: center;
color: white;
font-weight: 600;
padding: 9px;
margin-top: 5px;
display: none;
position: absolute;
width: 100%;
}

.view_join_content:hover .discuss_caption {
display: block;
}
span.date-time {
font-size: 18px;
font-weight: 500;
}
span.last-date {
font-size: 18px;
font-weight: 600;
color: black;
}
.quiz-text-date {
font-size: 14px;
color: red;
font-weight: 500;
width: 100%;
margin-top: 5px;
}

#countdown{
/* text-align: end; */
padding-top:10px;
}

.countdown {
margin-right: 13px;
font-size: 16px;
font-weight: 600;
WIDTH: 160px;
margin-top: 10px;
display: inline-block;
background: #162b65;
padding: 14px;
text-align: center;
border-radius: 5px;
height: 60px;
color: #ffffff;
}
.view_join_content:hover .discuss_caption {
display: block;
}
span.date-time {
font-size: 18px;
font-weight: 500;
}
span.last-date {
font-size: 18px;
font-weight: 600;
color: black;
}
.quiz-text-date {
font-size: 14px;
color: red;
font-weight: 500;
width: 100%;
margin-top: 5px;
}
#countdown{
/* text-align: end; */
padding-top:10px;
}
.count_down_new{
display: inline-block;
font-size: 13px;
list-style-type: none;
padding: 1em;
text-transform: uppercase;
text-align: center;
background: black;
color: white;
border-radius: 12px;
}




}
.view_join_content:hover .discuss_caption {
display: block;
}
span.date-time {
font-size: 18px;
font-weight: 500;
}
span.last-date {
font-size: 18px;
font-weight: 600;
color: black;
}
.quiz-text-date {
font-size: 14px;
color: red;
font-weight: 500;
width: 100%;
margin-top: 5px;
}
.count_down_new{
display: inline-block;
font-size: 13px;
list-style-type: none;
padding: 1em;
text-transform: uppercase;
text-align: center;
background: black;
color: white;
border-radius: 12px;
}
li span {
display: block;
font-size: 23px;
}
.emoji {
display: none;
padding: 1rem;
}
.emoji span {
font-size: 4rem;
padding: 0 .5rem;
}
@media all and (max-width: 768px) {
h1 {
font-size: calc(1.5rem * var(--smaller));
}

li {
font-size: calc(1.125rem * var(--smaller));
}

li span {
font-size: calc(3.375rem * var(--smaller));
}
}
/* about quiz end */
</style>
<div class="container-fluid d-flex">
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
                                <span class="start-end-time-title mr-2">Start Date<span class="quiz-text-date m-2"><?= date("d-m-Y", strtotime($getData['start_date']));?> </span></span>
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
                            You have Already attempt this quiz competition.
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