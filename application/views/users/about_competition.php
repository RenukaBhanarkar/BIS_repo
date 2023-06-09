<style>
    #banner-section {
        padding: 37px 0px 37px 37px;
        background: #ebe6e6;
        margin-top: 35px;
        border-radius: 10px;
    }

    .quiz-image {
        width: 96%;
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
        padding: 40px 0px 11px 0px;
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
    /* object-fit: cover; */
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
#countdown{
    margin-top: 20px;
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

<div class="container-fluid">
<section id="banner-section" class="row">
        <div class="col-md 9">  
        
       <!-- <div class="float-end" id="QuizLang">
            <label class="d-block text-font mr-3">Select Language</label>
            <select class="form-control input-font" id="selectedLang" id="selectedLang" placeholder="Language">                
                <option value="1">English</option>
                <option value="2">Hindi</option>
            </select>
        </div> -->
        
        
        <div class="row">
            <div class="col-sm-12">
                <div class="quiz-image shadow">
                    <img src="<?php echo base_url().$competition['thumbnail']; ?>" class="image-section" alt="Bis Quiz Images" />
                </div>
            </div>
            <div class="col-sm-12">
                <div class="Quiz_text">
                    <h3 class="main-title"><?php echo $competition['competiton_name']; ?></h3>
                    <!-- <p class="time-and-qus" style="color:white;">
                        <span class="number-quiz"><span class="question_no">10</span><span class="quiz-text">Questions</span>
                        </span>
                        <span class="number-quiz"><span class="question_no">50</span><span class="quiz-text">Minutes</span>
                        </span>
                    </p> -->
                    <div class="d-flex mb-2">
                        <p class="time-start-end d-flex" style="margin-bottom:0px;">
                            <span class="start-end-time-title mr-2">Start Date<span class="quiz-text-date m-2"><?php echo $competition['start_date']; ?><span style="margin-left: 12px;"><?php echo $competition['start_time']; ?></span></span>
                            </span>
                        </p>
                        <p class="time-start-end d-flex" style="margin-bottom:0px; margin-left:10px;">
                            <span class="start-end-time-title">End Date <span class="quiz-text-date m-2"><?php echo $competition['end_date']; ?><span style="margin-left: 12px;"><?php echo $competition['end_time']; ?></span>
                            </span>
                        </p>
                        
                    </div>
                    <div class="d-flex">
                    <p class="time-start-end d-flex" style="margin-bottom:0px; margin-top: 10px; margin-left: 0px;">
                            <span class="start-end-time-title">Marks<span class="quiz-text-date m-2"><?php echo $competition['score']; ?></span>
                            </span>
                        </p>
                        <?php if($competition['region'] !="0") { ?> 
                        <p class="time-start-end d-flex" style="margin-bottom:0px; margin-top: 10px; margin-left: 10px;">
                            <span class="start-end-time-title">Regional Level 
                                <span class="quiz-text-date m-2"><?= $competition['uvc_region_title'];?></span>
                            </span>
                            
                        </p>
                        <?php }?>
                        <?php if($competition['branch'] !="0") { ?> 
                        <p class="time-start-end d-flex" style="margin-bottom:0px; margin-top: 10px; margin-left: 10px;">
                            <span class="start-end-time-title">Branch Level
                                <span class="quiz-text-date m-2"><?= $competition['uvc_department_name'];?></span>
                            </span>
                            
                        </p>
                        <?php } ?>
                        <?php if($competition['state'] !="0") { ?> 
                        <p class="time-start-end d-flex" style="margin-bottom:0px; margin-top: 10px; margin-left: 10px;">
                            <span class="start-end-time-title">State 
                                <span class="quiz-text-date m-2"><?= $competition['state_name'];?></span>
                            </span>
                            
                        </p>
                        <?php }?>
                        <?php if($competition['comp_level'] =="1") { ?> 
                        <p class="time-start-end d-flex" style="margin-bottom:0px; margin-top: 10px; margin-left: 10px;">
                            <span class="start-end-time-title">Level 
                                <span class="quiz-text-date m-2">All India Level</span>
                            </span>
                            
                        </p>
                        <?php }?>
                        <?php if($competition['standard'] !="0") { ?> 
                        <p class="time-start-end d-flex" style="margin-bottom:0px; margin-top: 10px; margin-left: 10px;">
                            <span class="start-end-time-title">Class 
                                <span class="quiz-text-date m-2">
                                    <!-- <?= $competition['standard'];?> -->
                                <?php  $class = explode(",",$competition['standard']); 
                                    foreach ($class as $classdata) 
                                    {?>
                                         <?=$classdata?><sup>th</sup>
                                    <?php } ?>
                                    </span>
                            </span>
                            
                        </p>
                        <?php }?> 
                    </div>


                    <?php   
                            date_default_timezone_set("Asia/Calcutta");
                            $start_date = $competition['start_date'];
                            $end_date = $competition['end_date'];
                            $current_date = date('Y-m-d');

                            $start_time = strtotime($competition['start_time']);
                            $end_time = strtotime($competition['end_time']);
                            $current_time = strtotime (date('H:i:s'));
                            $status = 0;
                            if($current_date > $start_date && $current_date < $end_date ){
                                $status = 1;
                                $user_type = encryptids("D", $this->session->userdata('admin_type'));                    
                                if ($user_type != "") { 
                                      ?>
                                         <a href="<?= base_url().'users/start_competition/'.$competition['competitionn_id']; ?>" class="btn startQuiz"> <span>Start Competition </span></a>
                                    <?php  }else{ ?>                                 
                                        
                                    
                                    <a href="<?= base_url().'users/loginCompetition/'.$competition['competitionn_id'];?>" class="btn startQuiz"> <span>Login to Participate </span></a>
                                    <?php  
                                  }  ?>
                                <?php                           
                             
                             }
                             if($current_date == $start_date  && $current_date == $end_date ){

                                if($current_time >= $start_time && $current_time <= $end_time  ){
                                    $status = 1;
                                    $user_type = encryptids("D", $this->session->userdata('admin_type'));
                        
                                    if ($user_type != "") { 
                                         ?>
                                             <!-- <a href="<?= base_url(); ?>users/quiz_start/<?= $competition['id']; ?>" class="btn startQuiz"> <span>Start Quiz </span></a> -->
                                             <a href="<?= base_url().'users/start_competition/'.$competition['competitionn_id']; ?>" class="btn startQuiz"> <span>Start Competition </span></a>
                                     
                                        
                                           
                                        <?php  
                                      } else { ?>
                                        <a href="<?= base_url().'users/loginCompetition/'.$competition['competitionn_id'];?>" class="btn startQuiz"> <span>Login to Participate</span></a>
                                    <?php }
                                 }
                                 
                                 }
                                 if($current_date == $start_date  && $current_date < $end_date  ){

                                    if($current_time >= $start_time  ){
                                        $status = 1;
                                        $user_type = encryptids("D", $this->session->userdata('admin_type'));
                            
                                        if ($user_type != "") { 
                                              ?>
                                                 <a href="<?= base_url().'users/start_competition/'.$competition['competitionn_id']; ?>" class="btn startQuiz"> <span>Start Competition </span></a>
                                           
                                            <?php  
                                          } else { ?>
                                            <a href="<?= base_url(); ?>users/loginCompetition/<?=$competition['competitionn_id']?>" class="btn startQuiz"> <span>Login to Participate </span></a>
                                        <?php }
                                     } 
                                     
                                }
                                if($current_date > $start_date  && $current_date == $end_date  ){

                                        if($current_time <= $end_time  ){
                                            $status = 1;
                                            $user_type = encryptids("D", $this->session->userdata('admin_type'));
                                
                                            if ($user_type != "") { 
                                                 ?>
                                                      <a href="<?= base_url().'users/start_competition/'.$competition['competitionn_id']; ?>" class="btn startQuiz"> <span>Start Competition </span></a>
                                              
                                             <?php } else { ?>
                                                <a href="<?= base_url().'users/loginCompetition/'.$competition['competitionn_id'];?>" class="btn startQuiz"> <span>Login to Participate </span></a>
                                            <?php }
                                         }
                                         
                                }
                               
                                if($status == 0) { ?>

                                               
                                                <!-- <p id="countdown1" class="countdown1"> </p> -->
                                                <div id="countdown">
                            <ul style="padding-left:0px">
                            <li class="count_down_new"><span id="days"></span>days</li>
                            <li class="count_down_new"><span id="hours"></span>Hours</li>
                            <li class="count_down_new"><span id="minutes"></span>Minutes</li>
                            <li class="count_down_new"><span id="seconds"></span>Seconds</li>
                            </ul>
                      </div>
                                                <p id="ShowLoginButton" style="display:none">
                                                <?php $user_type = encryptids("D", $this->session->userdata('admin_type'));
                                    
                                                    if ($user_type != "") { 
                                                        { ?>
                                                            <!-- <a href="<?= base_url(); ?>users/quiz_start/<?= encryptids("E", $competition['id']); ?>" class="btn startQuiz"> <span>Start Quiz </span></a> -->
                                                            <a href="<?= base_url().'users/start_competition/'.$competition['competitionn_id']; ?>" class="btn startQuiz mb-2"> <span>Start Competition</span></a>
                                                        <?php  } { ?>
                                                        
                                                            <!-- <a href="#" class="btn startQuiz" id="startQuizLang"> <span>Start Quiz </span></a> -->
                                                        <?php  }
                                                    } else { ?>
                                                        <a href="<?= base_url(); ?>users/loginCompetition/<?= encryptids("E", $competition['id']); ?>" class="btn startQuiz"> <span>Login to Participate </span></a>
                                                    <?php } ?>
                                                </p>

                                        <?php } ?>




                      <!-- <a href="<?= base_url(); ?>users/start_competition" class="btn startQuiz"> <span>Login to Participate</span></a> -->
                    
                      <!-- <div id="countdown">
                            <ul style="padding-left:0px">
                            <li class="count_down_new"><span id="days"></span>days</li>
                            <li class="count_down_new"><span id="hours"></span>Hours</li>
                            <li class="count_down_new"><span id="minutes"></span>Minutes</li>
                            <li class="count_down_new"><span id="seconds"></span>Seconds</li>
                            </ul>
                      </div> -->
                  
                    <?php
                    if ($this->session->flashdata('MSG')) {
                        echo $this->session->flashdata('MSG');
                    }
                    ?>
                </div>
            </div>
        
        
        </div>
       
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

                <div class="start_content">
                    <?php if($competition['fprize_image']==""){ ?>
                        <img src="<?php echo base_url().'assets/images/prize_2.avif'; ?>" alt="" class="join_img">
                    <?php }else{?> 
                <img src="<?php echo base_url().$competition['fprize_image']; ?>" alt="" class="join_img">
                <?php } ?>
                </div>

                <div class="#">
                    <div class="title_join">
                        <h3><?php echo $competition['fprize_name']; ?></h3>
                        <span class="last-date">Number of Prizes :<span class="date-time" style="margin-left:5px;"><?php echo $competition['fprize_no']; ?></span></span> 
                    </div>
                </div>
            </div>
            <?php if(!empty($competition['sprize_name'])){ ?>
            <div class="view_join_content">
                <h3>Second Prize</h3>
                <div class="start_content">
                <?php if($competition['sprize_image']==""){ ?>
                        <img src="<?php echo base_url().'assets/images/prize_2.avif'; ?>" alt="" class="join_img">
                    <?php }else{?> 
                <div class="start_content">
                    <img src="<?php echo base_url().$competition['sprize_image']; ?>" alt="" class="join_img">
                </div>
                <?php } ?>
                </div>
                <div class="#">
                    <div class="title_join">
                        <h3><?php echo $competition['sprize_name']; ?></h3>
                        <span class="last-date">Number of Prizes :<span class="date-time" style="margin-left:5px;"><?php echo $competition['sprize_no']; ?></span></span> 
                    </div>
                </div>
            </div>
            <?php }else{ 
               // echo "Second Prize not available";
                 } ?>
            <?php if(!empty($competition['tprize_name'])){ ?>
            <div class="view_join_content">
                <h3>Third Prize</h3>
                <div class="start_content">
                <?php if($competition['tprize_image']==""){ ?>
                        <img src="<?php echo base_url().'assets/images/prize_2.avif'; ?>" alt="" class="join_img">
                    <?php }else{?> 
                <div class="start_content">
                    <img src="<?php echo base_url().$competition['tprize_image']; ?>" alt="" class="join_img">
                </div>
                        <?php } ?>
                </div>
                <div class="#">
                    <div class="title_join">
                        <h3><?php echo $competition['tprize_name']; ?></h3>
                        <span class="last-date">Number of Prizes :<span class="date-time" style="margin-left:5px;"><?php echo $competition['tprize_no']; ?></span></span> 
                    </div>
                </div>
            </div>
            <?php } ?>
            <?php if(!empty($competition['cprize_name'])){ ?>
            <div class="view_join_content">
                <h3>Consolation Prize</h3>
                <div class="start_content">
                <?php if($competition['cprize_image']==""){ ?>
                        <img src="<?php echo base_url().'assets/images/prize_2.avif'; ?>" alt="" class="join_img">
                    <?php }else{?> 
                <div class="start_content">
                    <img src="<?php echo base_url().$competition['cprize_image']; ?>" alt="" class="join_img">
                </div>
                <?php } ?>
                </div>
                <div class="#">
                    <div class="title_join">
                        <h3><?php echo $competition['cprize_name']; ?></h3>
                        <span class="last-date">Number of Prizes :<span class="date-time" style="margin-left:5px;"><?php echo $competition['cprize_no']; ?></span></span> 
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</section>
        </div>
        </section>
    <section id="quiz-about" class="mb-5">
        <div class="about-inner ">
            <h2 class="about-section">About Competition</h2>
            <div class="About_point">
            <?php echo $competition['description']; ?>
            </div>
            <!-- <div class="col-md-12">
                <h1>title of Competition
            </div> -->
        </div>
    </section>
    <section id="quiz-about" class="mb-5">
        <div class="about-inner">
            <h2 class="about-section">Team's and Conditions</h2>
            <div class="About_point ">
            <?php echo $competition['terms_condition']; ?>
            </div>
            <div class="" style="text-align:end;">
                <!-- <a href="<?php echo base_url(); ?>users/standard" class="btn-primary btn-sm">Back</a> -->
                <button class="btn btn-primary btn-sm text-white mr-3 mt-2"><a href="<?php echo base_url(); ?>users/standard">Back</a></button>
            </div>
    </section>
    
</div>
<script>
// Set the date we're counting down to
<?php date_default_timezone_set("Asia/Calcutta"); ?>

var current_time = '<?php echo date('Y-m-d H:i:s');?>';

var startTime = '<?php echo $competition['start_date'];?> <?php echo $competition['start_time'];?>';

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



