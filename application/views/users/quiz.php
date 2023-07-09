<link href="<?php echo base_url(); ?>assets/css/quiz_view.css" rel="stylesheet">
<section>
        <div class="container-fluid pb-5 pt-5" id="winner-section" style="padding: 31px;">
            
            <div class="row">
                <?php  foreach ($getUserAllQuize as $key => $AllQuize) {?> 
               
              <div class="col-md-3">
                <div class="card-winners">
                    <img src="<?php echo base_url(); ?><?= $AllQuize['banner_img']?>" style="height: 176px;">
                    <div class="winner-body p-2">
                    <div class="title">
                            <a href="about_quiz/<?= $AllQuize['id']?>" title="Inviting suggestion on Vivad se Vishwas II – Settling Contractual ..."><?= $AllQuize['title']?></a>
                        </div>
                            <div class="quiz-period">
                                <div class="start-time"><span>From :</span><?= date(" M , d Y", strtotime($AllQuize['start_date']));?> </div>
                                <div class="end-time"><span>To :</span> <?= date(" M , d Y", strtotime($AllQuize['end_date']));?></div>
                            </div>
                            <div class="ques-block">
                              <div class="question_detail">
                                <div class="no_of_ques">
                                    <div class="qcount"><?= $AllQuize['total_question']?></div><span class="last-date">Questions</span>
                                </div>
                                <div class="quiz_time">
                                    <div class="time_duration"><?= $AllQuize['duration']?><span class="sec-text"> Min</span></div><span class="last-date">Duration</span>
                                </div>
                              </div>
                              <a href="about_quiz/<?= encryptids("E", $AllQuize['id']); ?>" class="quizplay-btn">Participate</a>
                                                              
                            </div>
                            <div class="item_foo">
                                <!-- <a href="javascript:void(0)" class="get_reward"><i> </i> E-Certificate</a> -->
                                <a href="<?= base_url(); ?>users/about_quiz/<?php echo $AllQuize['id']; ?>" class="view_tc">View T&amp;C</a>
                            </div>
                    </div>
                </div>
              </div> 
              <?php  } ?>
              
            </div>
        
             
          </div>
    </section>