<link href="<?= base_url(); ?>assets/css/about_quiz.css" rel="stylesheet" />
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-9">
            <section id="banner-section">
            <?php $user_type = encryptids("D", $this->session->userdata('admin_type'));
                if ($user_type != "") { ?>
                <?php if ($quizdata['language_id'] == 3) { ?>
                    <div class="float-end" id="QuizLang">
                        <label class="d-block text-font mr-3">Please Select Language</label>
                        <select class="form-control input-font" id="selectedLang" id="selectedLang" placeholder="Language">
                            <option value="1">English</option>
                            <option value="2">Hindi</option>
                        </select>
                    </div>
                <?php } ?>
                <?php } ?>

                <div class="row">
                    <div class="col-md-5">
                        <div class="quiz-image shadow">
                            <img src="../../<?= $quizdata['banner_img']; ?>" class="image-section" alt="Bis Quiz Images" />
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="Quiz_text">
                            <h3 class="main-title"><?= $quizdata['title']; ?></h3>
                            <p class="time-and-qus" style="color:white;">
                                <span class="number-quiz"><span class="question_no"><?= $quizdata['total_question']; ?></span><span class="quiz-text">Questions</span>
                                </span>
                                <span class="number-quiz"><span class="question_no"><?= $quizdata['duration']; ?></span><span class="quiz-text">Minutes</span>
                                </span>
                            </p>
                            <div class="d-flex">
                                <p class="time-start-end d-flex" style="margin-bottom:0px;">
                                    <span class="start-end-time-title mr-2">Start Date<span class="quiz-text-date m-2"><?= date("d-m-Y", strtotime($quizdata['start_date'])); ?><span style="margin-left: 12px;"><?= $quizdata['start_time']; ?></span></span>
                                    </span>
                                </p>
                                <p class="time-start-end d-flex" style="margin-bottom:0px; margin-left: 8px;">
                                    <span class="start-end-time-title">Marks<span class="quiz-text-date m-2"><?= $quizdata['total_mark']; ?></span>
                                    </span>
                                </p>
                            </div>
                            <div class="d-flex">
                                <p class="time-start-end d-flex" style="margin-bottom:0px; margin-top: 10px;">
                                    <span class="start-end-time-title">End Date <span class="quiz-text-date m-2"><?= date("d-m-Y", strtotime($quizdata['end_date'])); ?><span style="margin-left: 12px;"><?= $quizdata['end_time']; ?></span></span>
                                    </span>
                                </p>
                                <?php if ($quizdata['region'] != "") { ?>
                                    <p class="time-start-end d-flex" style="margin-bottom:0px; margin-top: 10px; margin-left: 10px;">
                                        <span class="start-end-time-title">Region
                                            <span class="quiz-text-date m-2"><?= $quizdata['region']; ?></span>
                                        </span>

                                    </p>
                                <?php } ?>
                                <?php if ($quizdata['branch'] != "") { ?>
                                    <p class="time-start-end d-flex" style="margin-bottom:0px; margin-top: 10px; margin-left: 10px;">
                                        <span class="start-end-time-title">Branch
                                            <span class="quiz-text-date m-2"><?= $quizdata['branch']; ?></span>
                                        </span>

                                    </p>
                                <?php } ?>
                                <?php if ($quizdata['state'] != "") { ?>
                                    <p class="time-start-end d-flex" style="margin-bottom:0px; margin-top: 10px; margin-left: 10px;">
                                        <span class="start-end-time-title">State
                                            <span class="quiz-text-date m-2"><?= $quizdata['state']; ?></span>
                                        </span>

                                    </p>
                                <?php } ?>
                                <?php if ($quizdata['standard'] != "") { ?>
                                    <p class="time-start-end d-flex" style="margin-bottom:0px; margin-top: 10px; margin-left: 10px;">
                                        <span class="start-end-time-title">Class
                                            <span class="quiz-text-date m-2"><?= $quizdata['standard']; ?></span>
                                        </span>

                                    </p>
                                <?php } ?>
                            </div>

                            <?php
                            date_default_timezone_set("Asia/Calcutta");
                            $start_date = $quizdata['start_date'];
                            $end_date = $quizdata['end_date'];
                            $current_date = date('Y-m-d');

                            $start_time = strtotime($quizdata['start_time']);
                            $end_time = strtotime($quizdata['end_time']);
                            $current_time = strtotime(date('H:i:s'));
                            $status = 0;
                            if ($current_date > $start_date && $current_date < $end_date) {
                                $status = 1;
                                $user_type = encryptids("D", $this->session->userdata('admin_type'));
                                if ($user_type != "") {
                                    if ($quizdata['language_id'] != 3) { ?>
                                        <a href="<?= base_url(); ?>users/quiz_start/<?= encryptids("E", $quizdata['id']); ?>" class="btn startQuiz"> <span>Start Quiz </span></a>
                                    <?php  } else { ?>

                                        <a href="#" class="btn startQuiz" id="startQuizLang"> <span>Start Quiz </span></a>
                                    <?php  }
                                } else { ?>
                                    <a href="<?= base_url(); ?>users/loginQuiz/<?= encryptids("E", $quizdata['id']); ?>" class="btn startQuiz"> <span>Login to Participate </span></a>
                                    <?php }
                            }
                            if ($current_date == $start_date  && $current_date == $end_date) {

                                if ($current_time >= $start_time && $current_time <= $end_time) {
                                    $status = 1;
                                    $user_type = encryptids("D", $this->session->userdata('admin_type'));

                                    if ($user_type != "") {
                                        if ($quizdata['language_id'] != 3) { ?>
                                            <!-- <a href="<?= base_url(); ?>users/quiz_start/<?= $quizdata['id']; ?>" class="btn startQuiz"> <span>Start Quiz </span></a> -->
                                            <a href="<?= base_url(); ?>users/quiz_start/<?= encryptids("E", $quizdata['id']); ?>" class="btn startQuiz"> <span>Start Quiz </span></a>
                                        <?php  } else { ?>

                                            <a href="#" class="btn startQuiz" id="startQuizLang"> <span>Start Quiz </span></a>
                                        <?php  }
                                    } else { ?>
                                        <a href="<?= base_url(); ?>users/loginQuiz/<?= encryptids("E",$quizdata['id']); ?>" class="btn startQuiz"> <span>Login to Participate </span></a>
                                        <?php }
                                }
                            }
                            if ($current_date == $start_date  && $current_date < $end_date) {

                                if ($current_time >= $start_time) {
                                    $status = 1;
                                    $user_type = encryptids("D", $this->session->userdata('admin_type'));

                                    if ($user_type != "") {
                                        if ($quizdata['language_id'] != 3) { ?>
                                            <a href="<?= base_url(); ?>users/quiz_start/<?= encryptids("E",$quizdata['id']); ?>" class="btn startQuiz"> <span>Start Quiz </span></a>
                                        <?php  } else { ?>

                                            <a href="#" class="btn startQuiz" id="startQuizLang"> <span>Start Quiz </span></a>
                                        <?php  }
                                    } else { ?>
                                        <a href="<?= base_url(); ?>users/loginQuiz/<?= encryptids("E",$quizdata['id']); ?>" class="btn startQuiz"> <span>Login to Participate </span></a>
                                        <?php }
                                }
                            }
                            if ($current_date > $start_date  && $current_date == $end_date) {

                                if ($current_time <= $end_time) {
                                    $status = 1;
                                    $user_type = encryptids("D", $this->session->userdata('admin_type'));

                                    if ($user_type != "") {
                                        if ($quizdata['language_id'] != 3) { ?>
                                            <a href="<?= base_url(); ?>users/quiz_start/<?= encryptids("E", $quizdata['id']); ?>" class="btn startQuiz"> <span>Start Quiz </span></a>
                                        <?php  } else { ?>

                                            <a href="#" class="btn startQuiz" id="startQuizLang"> <span>Start Quiz </span></a>
                                        <?php  }
                                    } else { ?>
                                        <a href="<?= base_url(); ?>users/loginQuiz/<?= encryptids("E", $quizdata['id']); ?>" class="btn startQuiz"> <span>Login to Participate </span></a>
                                <?php }
                                }
                            }

                            if ($status == 0) { ?>


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
                                        if ($quizdata['language_id'] != 3) { ?>
                                            <a href="<?= base_url(); ?>users/quiz_start/<?= encryptids("E", $quizdata['id']); ?>" class="btn startQuiz"> <span>Start Quiz </span></a>
                                        <?php  } else { ?>

                                            <a href="#" class="btn startQuiz" id="startQuizLang"> <span>Start Quiz </span></a>
                                        <?php  }
                                    } else { ?>
                                        <a href="<?= base_url(); ?>users/loginQuiz/<?= encryptids("E", $quizdata['id']); ?>" class="btn startQuiz"> <span>Login to Participate </span></a>
                                    <?php } ?>
                                </p>

                            <?php } ?>




                            <!-- <p id="countdown" class="countdown"> </p>
                                <p id="ShowLoginButton" style="display:none">
                                <?php //$user_type = encryptids("D", $this->session->userdata('admin_type'));

                                //if ($user_type != "") { 
                                //if($quizdata['language_id'] != 3){ 
                                ?>
                                            <a href="<?= base_url(); ?>users/quiz_start/<?= $quizdata['id']; ?>" class="btn startQuiz"> <span>Start Quiz</span></a>
                                        <?php  // }else{ 
                                        ?>
                                        
                                            <a href="#" class="btn startQuiz" id="startQuizLang"> <span>Start Quiz</span></a>
                                        <?php // } } else { 
                                        ?>
                                        <a href="<?= base_url(); ?>users/login" class="btn startQuiz"> <span>Login to Participate</span></a>
                                    <?php // } 
                                    ?>
                                </p> -->




                            <?php
                            if ($this->session->flashdata('MSG')) {
                                echo $this->session->flashdata('MSG');
                            }
                            ?>
                        </div>
                    </div>
                </div>

            </section>

            <section id="quiz-about" class="mb-5">
                <div class="about-inner ">
                    <h2 class="about-section">About Quiz</h2>
                    <div class="About_point">
                        <?= $quizdata['description']; ?>
                    </div>
                </div>
            </section>
            <section id="quiz-about" class="mb-5">
                <div class="about-inner">
                    <h2 class="about-section">Terms and Conditions</h2>
                    <div class="About_point ">
                        <?= $quizdata['terms_conditions']; ?>

                    </div>
            </section>
        </div>
        <div class="col-lg-3">
            <section class="-join_section">
                <div class="join_content">
                    <div class="bloginfo">
                        <h3 style="margin-bottom: 14px; /* margin-top: 20px; */ color: #0086b2!important; font-weight: 600; margin-left: 24px;">Prize Details</h3>
                    </div>

                    <div class="join_container">
                        <?php foreach ($prizeDetails as $row) { ?>
                            <?php if ($row['prize_id'] == 1) { ?>
                                <div class="view_join_content">
                                    <h3>First Prize</h3>

                                    <div class="start_content">
                                        <?php if ($row['prize_img'] == "") { ?>
                                            <img src="<?php echo base_url(); ?>assets/images/prize_2.avif" alt="" class="join_img">
                                        <?php } else { ?>
                                            <img src="<?php echo base_url(); ?><?php echo $row['prize_img']; ?>" alt="" class="join_img">
                                        <?php } ?>
                                    </div>

                                    <div class="#">
                                        <div class="title_join">
                                            <h3><?php echo $row['prize_details']; ?></h3>
                                            <span class="last-date">Number of Prizes :<span class="date-time" style="margin-left:5px;"><?php echo $row['no_of_prize']; ?></span></span>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if ($row['prize_id'] == 2) { ?>
                                <div class="view_join_content">
                                    <h3>Second Prize</h3>

                                    <div class="start_content">
                                        <?php if ($row['prize_img'] == "") { ?>
                                            <img src="<?php echo base_url(); ?>assets/images/prize_2.avif" alt="" class="join_img">
                                        <?php } else { ?>
                                            <img src="<?php echo base_url(); ?><?php echo $row['prize_img']; ?>" alt="" class="join_img">
                                        <?php } ?>
                                    </div>

                                    <div class="#">
                                        <div class="title_join">
                                            <h3><?php echo $row['prize_details']; ?></h3>
                                            <span class="last-date">Number of Prizes :<span class="date-time" style="margin-left:5px;"><?php echo $row['no_of_prize']; ?></span></span>

                                        </div>

                                    </div>
                                </div>
                            <?php } ?>
                            <?php if ($row['prize_id'] == 3) { ?>
                                <div class="view_join_content">
                                    <h3>Third Prize</h3>

                                    <div class="start_content">
                                        <?php if ($row['prize_img'] == "") { ?>
                                            <img src="<?php echo base_url(); ?>assets/images/prize_2.avif" alt="" class="join_img">
                                        <?php } else { ?>
                                            <img src="<?php echo base_url(); ?><?php echo $row['prize_img']; ?>" alt="" class="join_img">
                                        <?php } ?>

                                    </div>

                                    <div class="#">
                                        <div class="title_join">
                                            <h3><?php echo $row['prize_details']; ?></h3>
                                            <span class="last-date">Number of Prizes :<span class="date-time" style="margin-left:5px;"><?php echo $row['no_of_prize']; ?></span></span>

                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if ($row['prize_id'] == 4) { ?>
                                <div class="view_join_content">
                                    <h3>Consolation Prize</h3>

                                    <div class="start_content">
                                        <?php if ($row['prize_img'] == "") { ?>
                                            <img src="<?php echo base_url(); ?>assets/images/prize_2.avif" alt="" class="join_img">
                                        <?php } else { ?>
                                            <img src="<?php echo base_url(); ?><?php echo $row['prize_img']; ?>" alt="" class="join_img">
                                        <?php } ?>

                                    </div>

                                    <div class="#">
                                        <div class="title_join">
                                            <h3><?php echo $row['prize_details']; ?></h3>
                                            <span class="last-date">Number of Prizes :<span class="date-time" style="margin-left:5px;"><?php echo $row['no_of_prize']; ?></span></span>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        <?php } ?>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>


<script>
    // Set the date we're counting down to
    <?php date_default_timezone_set("Asia/Calcutta"); ?>

    var current_time = '<?php echo date('Y-m-d H:i:s'); ?>';

    var startTime = '<?php echo $quizdata['start_date']; ?> <?php echo $quizdata['start_time']; ?>';

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
            $('#ShowLoginButton').css('display', 'block');
            $('#countdown').css('display', 'none');
            countdown

        }
    }, 1000);
</script>

<script>
    $('.Quiz_text').on('click', '#startQuizLang', function(e) {
        e.preventDefault();

        var lang = $('#selectedLang').val();

        $.post("<?php echo base_url(); ?>users/setSelectedLang/", {
            lang: lang,
        }, function(res) {
            if (res.status == 0) {
                $('.errorbox').show().text("Error,Please try again.");
            } else {

               // window.location.replace("<?= base_url(); ?>users/quiz_start/<?= $quizdata['id']; ?>");
               window.location.replace("<?= base_url(); ?>users/quiz_start/<?= encryptids("E", $quizdata['id']); ?>");
               <?= encryptids("E", $quizdata['id']); ?>
            }
        });

    });
</script>
<!-- countdown code -->
<script>
    
</script>