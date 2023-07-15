<link href="<?php echo base_url(); ?>assets/css/standard_club.css" rel="stylesheet">
<?php
// include('C:\xampp\htdocs\BIS\BIS_repo\application\views\users\language.php');
require(APPPATH.'views/users/language.php');
$en_select='';
$hn_select='';
$language=''; 
if((isset($_SESSION['language']) && $_SESSION['language']=='en') || !isset($_SESSION['language'])){
    $en_select='selected';
    $language='en';
}else{
    $hn_select='selected';
    $language='hn';
}
?>
<!-- <section id="exchange_forum">
  <div class="container-fluid">
    <div class="row">
      <div class="exchange_section d-flex">
        <div class="col-md-2">
          <div class="bis_logo">
            <img src="<?= base_url(); ?>assets/images/bis_logo.png" class="opacity_img">
          </div>
        </div>
        <div class="col-md-8" id="Forum">
          <div class="bis_welcome">
            <a href="">
              <h2>'An initiative to nurture the students as Brand Ambassadors of Quality'</h2>
            </a>
          </div>
        </div>
        <div class="col-md-2">
          <div class="bis_logo">
            <img src="<?= base_url(); ?>assets/images/bis_logo.png" class="opacity_img">
          </div>
        </div>
      </div>
    </div>
  </div>
</section> -->
<section id="winners_content">
  <div class="container-fluid">
    <div class="row d-flex row1 p-0" >
      <!-- <div class="inner_content d-flex p-0"> -->
      <div class="col-md-3">
        <div class="card" style="background: #014e9c; color:white;">
          <div class="card-body new-card text-center mt-2">
            <h5 class="card-title">Winners Wall</h5>
            <hr>
            <div class="owl-carousel owl-theme" id="owl-caraousal_standard">
              <?php foreach ($Winnerwall as $key => $value) {?>
              
              <div class="item">
                <div class="quiz-section">
                  <div class="quiz-box_live">
                    <a href="#">
                      <img src="<?= base_url(); ?><?= $value['image']?>" class="inner_image">
                      <p class="card-text p-1"><strong><?= $value['name']?></strong></p>
                      <p class="mb-0"><?= $value['location']?></p>
                    </a>
                  </div>
                  
                </div>
              </div>
              
              <?php } ?>
            </div>
            
            
            <div class="more_button">
              <button class="btn_common mt-1" onclick="location.href='<?php echo base_url(); ?>users/winner_wall'"><?php echo $standard_club_section[$language]['1'] ?><i class="fa fa-long-arrow-right ms-2" aria-hidden="true"></i></button>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-9">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-indicators">
            <?php foreach ($banner_data as $list => $key) { ?>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="<?php echo $list; ?>" class="active" <?php if ($list == 0) {
            echo 'aria-current="true"';
            } ?> aria-label="Slide <?php echo $list = $list + 1; ?>"></button>
            <?php } ?>
            <!-- <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button> -->
          </div>
          <div class="carousel-inner">
            <?php foreach ($banner_data as $list => $key) { ?>
            <div class="carousel-item <?php if ($list == 0) {
              echo "active";
              } ?>">
              <a <?php if(!empty($key['url'])){ ?>href="https://<?php echo $key['url']; ?>"<?php } ?> target="_blank">
              <img src="<?= base_url() . 'uploads/cms/banner/' . $key['banner_images']; ?>" class="background-banner-image">
              </a>
            </div>
            <?php } ?>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
      <!-- </div> -->
    </div>
  </div>
</section>
<!-- <section class="container">
  <ul class="nav nav-pills mb-3" role="tablist">
    <li><a class="nav-link active" data-bs-toggle="pill" href="#tab1" aria-selected="true" role="tab">Quiz</a></li>
    <li><a class="nav-link" data-bs-toggle="pill" href="#tab2" aria-selected="false" role="tab" tabindex="-1">Standards Writing</a></li>
    <li><a class="nav-link" data-bs-toggle="pill" href="#tab3" aria-selected="false" role="tab" tabindex="-1">Essay Writing</a></li>
    <li><a class="nav-link" data-bs-toggle="pill" href="#tab4" aria-selected="false" role="tab" tabindex="-1">Poster Making</a></li>
    <li><a class="nav-link" data-bs-toggle="pill" href="#tab5" aria-selected="false" role="tab" tabindex="-1">More</a></li>
  </ul>
</section> -->
<section style="background-image: url(<?php echo base_url();?>assets/images/whats-new-bg.png);">
  <div class="container-fluid pt-5">
    <div class="row text-center">
      <h3 style="font-weight: 600; color: brown;"><?php echo $standard_club_section[$language]['2'] ?></h3>
      
    </div>
    <ul class="row get-involved-links nav nav-pills mb-3" role="tablist" style="padding: 21px;">
      <li class="col-md-2 tab-link"><a class="nav-link active" data-bs-toggle="pill" href="#tab1" aria-selected="true" role="tab"><img src="<?php echo base_url(); ?>/assets/images/quiz.png" width="40%" height="77%"><h3 class="tabl_title"><?php echo $standard_club_section[$language]['3'] ?></h3></a></li>
      <li class="col-md-2 tab-link"><a class="nav-link" data-bs-toggle="pill" href="#tab2" aria-selected="false" role="tab" tabindex="-1"><img src="<?php echo base_url(); ?>/assets/images/standard-writing.png" width="40%" height="77%"><h3 class="tabl_title"><?php echo $standard_club_section[$language]['4'] ?></h3></a></li>
      <li class="col-md-2 tab-link"><a class="nav-link" data-bs-toggle="pill" href="#tab3" aria-selected="false" role="tab" tabindex="-1"><img src="<?php echo base_url(); ?>/assets/images/essay-writing.png" width="40%" height="77%"><h3 class="tabl_title"><?php echo $standard_club_section[$language]['5'] ?></h3></a></li>
      <li class="col-md-2 tab-link"><a class="nav-link" data-bs-toggle="pill" href="#tab4" aria-selected="false" role="tab" tabindex="-1"><img src="<?php echo base_url(); ?>/assets/images/poster.jpg" width="40%" height="77%"><h3 class="tabl_title"><?php echo $standard_club_section[$language]['6'] ?></h3></a></li>
      <li class="col-md-2 tab-link"><a class="nav-link" data-bs-toggle="pill" href="#tab5" aria-selected="false" role="tab" tabindex="-1"><img src="<?php echo base_url(); ?>/assets/images/view-more.jpg" width="40%" height="77%"><h3 class="tabl_title"><?php echo $standard_club_section[$language]['7'] ?></h3></a></li>
    </ul>
    <div class="tab-content">
      <div class="tab-pane fade active show" id="tab1" role="tabpanel">
        <div class="" >
          <section>
            <div class="container-fluid pt-4 pb-5" id="start-quiz">
              <div class="row text-center">
                <!-- <h3 style="font-weight: 700; color: black;"><?php echo $standard_club_section[$language]['3'] ?></h3> -->
                <!-- <p>Miscellaneous For You</p> -->
              </div>
              <div class="row" id="banner-align">
                <?php if (empty($allquize)) { ?>
                <div class="alert alert-danger">
                  <strong>Sorry!</strong> Quizes are not available.
                </div>
                <?php  } else {  ?>
                
                  <?php foreach ($allquize as $key => $quize) {  ?>
                  <div class="col-md-3">
                    <div class="quiz-section">
                      <div class="quiz-box">
                        <img src="<?= base_url(); ?><?php echo $quize['banner_img'] ?>" class="w-100 border-2">
                      </div>
                      <div class="Quiz-button"><a href="aboutquiz.html">
                        <a href="<?= base_url(); ?>users/about_quiz/<?= encryptids("E", $quize['id']); ?>" class="btn startQuiz"> <span>Start Quiz</span></a>
                      </div>
                      <p class="quiz-text overflow-hidden p-1"><?php echo $quize['title'] ?></p>
                    </div>
                  </div>
                  <?php  } ?>
                
                <?php } ?>
              </div>
              <div class="view-button">
                <a href="<?= base_url(); ?>users/quiz">View All</a>
              </div>
            </div>
          </section>
        </div>
        </div><!-- End Tab 1 Content -->
        <div class="tab-pane fade" id="tab2" role="tabpanel">
          <div class="" >
            <section>
              <div class="container-fluid pt-4 pb-5" id="start-quiz">
                <div class="row text-center">
                  <!-- <h3 style="font-weight: 700; color: black;"><?php echo $standard_club_section[$language]['4'] ?></h3> -->
                  <!-- <p>Miscellaneous For You</p> -->
                </div>
                <div class="row">
                  
                  
                  
                  <div class="row">
                    <?php foreach ($getOnlineCompData as $key => $OnlineCompData) {?>
                     <div class="col-md-3 ml-1">
                      <div class="quiz-section">
                        <div class="quiz-box">
                          <img src="<?= base_url(); ?><?=$OnlineCompData['banner_img']?>" class="w-100 border-2">
                        </div>
                        
                        <div class="Quiz-button"><a href="#">
                          <a href="<?php echo base_url() . "users/standard_writting_details/"?><?php echo  $id= encryptids("E", $OnlineCompData['id'] )?>" class="btn startQuiz"> <span>Participate</span></a>
                        </div>
                        <p class="quiz-text overflow-hidden p-1"><?=$OnlineCompData['title']?></p>
                      </div>
                    </div>
                   <?php  }?>
                    
                    
                 
                  </div>
                  
                </div>
                <div class="view-button">
                  <a href="<?= base_url(); ?>users/standard_writting_all">View All</a>
                </div>
              </div>
            </section>
          </div>
          </div><!-- End Tab 2 Content -->
          <div class="tab-pane fade" id="tab3" role="tabpanel">
            <div class="" >
              <section>
                <div class="container-fluid pt-4 pb-5" id="start-quiz">
                  <div class="row text-center">
                    <!-- <h3 style="font-weight: 700; color: black;"><?php echo $standard_club_section[$language]['5'] ?></h3> -->
                    <!-- <p>Miscellaneous For You</p> -->
                  </div>
                  <div class="row">
                    <?php if (empty($essy_writing)) { ?>
                    <div class="alert alert-danger">
                      <strong>Sorry!</strong> Competition are not available.
                    </div>
                    <?php  } else {  ?>
                    <div class="row">
                      <?php foreach ($essy_writing as $list) {  ?>
                      <div class="col-md-3">
                        <div class="quiz-section">
                          <div class="quiz-box">
                            <img src="<?php echo base_url().$list['thumbnail']; ?>" class="w-100 border-2">
                          </div>
                          <div class="Quiz-button"><a href="aboutquiz.html">
                            <a href="<?php echo base_url().'users/about_competition/'.$list['competitionn_id']; ?>" class="btn startQuiz"> <span>Participate</span></a>
                          </div>
                          <p class="quiz-text overflow-hidden p-1"><?php echo $list['competiton_name'] ?></p>
                        </div>
                      </div>
                      <?php  } ?>
                    </div>
                    <?php } ?>
                  </div>
                  <?php if(count($essy_writing) >= 4){ ?>
                  <div class="view-button">
                    <a href="<?= base_url(); ?>users/essay_writting_all">View All</a>
                  </div>
                  <?php } ?>
                </div>
              </section>
            </div>
            </div><!-- End Tab 3 Content -->
            <div class="tab-pane fade" id="tab4" role="tabpanel">
              <div class="" >
                <section>
                  <div class="container-fluid pt-4 pb-5" id="start-quiz">
                    <div class="row text-center">
                      <!-- <h3 style="font-weight: 700; color: black;"><?php echo $standard_club_section[$language]['6'] ?></h3> -->
                      <!-- <p>Miscellaneous For You</p> -->
                    </div>
                    <div class="row">
                      <?php if (empty($poster)) { ?>
                      <div class="alert alert-danger">
                        <strong>Sorry!</strong> Competition are not available.
                      </div>
                      <?php  } else {  ?>
                      <div class="row">
                        <?php foreach ($poster as $list) {  ?>
                        <div class="col-md-3">
                          <div class="quiz-section">
                            <div class="quiz-box">
                              <img src="<?php echo base_url().$list['thumbnail']; ?>" class="w-100 border-2">
                            </div>
                            <div class="Quiz-button"><a href="aboutquiz.html">
                              <a href="<?php echo base_url().'users/about_competition/'.$list['competitionn_id']; ?>" class="btn startQuiz"> <span>Participate</span></a>
                            </div>
                            <p class="quiz-text overflow-hidden p-1"><?php echo $list['competiton_name']; ?></p>
                          </div>
                        </div>
                        <?php  } ?>
                      </div>
                      <?php } ?>
                    </div>
                    <?php if(count($poster) >= 4){ ?>
                    <div class="view-button">
                      <a href="<?= base_url(); ?>users/more_copetition">View All</a>
                    </div>
                    <?php } ?>
                  </div>
                </section>
              </div>
              </div><!-- End Tab 4 Content -->
              <div class="tab-pane fade" id="tab5" role="tabpanel">
                <div class="" >
                  <section>
                    <div class="container-fluid pt-4 pb-5" id="start-quiz">
                      <div class="row text-center">
                        <!-- <h3 style="font-weight: 700; color: black;"><?php echo $standard_club_section[$language]['7'] ?></h3> -->
                        <!-- <p>Miscellaneous For You</p> -->
                      </div>
                      <div class="row">
                        <?php if (empty($competition)) { ?>
                        <div class="alert alert-danger">
                          <strong>Sorry!</strong> Competitions are not available.
                        </div>
                        <?php  } else {  ?>
                        <div class="row">
                          <?php foreach ($competition as $list) {  ?>
                          <div class="col-md-3">
                            <div class="quiz-section">
                              <div class="quiz-box">
                                <img src="<?php echo base_url().$list['thumbnail']; ?>" class="w-100 border-2">
                              </div>
                              <div class="Quiz-button"><a href="aboutquiz.html">
                                <a href="<?php echo base_url().'users/about_competition/'.$list['competitionn_id']; ?>" class="btn startQuiz"> <span>Participate</span></a>
                              </div>
                              <p class="quiz-text overflow-hidden p-1"><?php echo $list['competiton_name']; ?></p>
                            </div>
                          </div>
                          <?php  } ?>
                        </div>
                        <?php } ?>
                      </div>
                      <?php if(count($competition) >= 4){ ?>
                      <div class="view-button">
                        <a href="<?= base_url(); ?>users/more_copetition">View All</a>
                      </div>
                      <?php } ?>
                      
                    </div>
                  </section>
                </div>
                </div><!-- End Tab 4 Content -->
              </div>
            </div>
          </section>
          
          <!-- <section>
            <div class="container-fluid pt-4 pb-5" id="start-quiz" style="padding:3%">
              <div class="row text-center">
                <h3>Events</h3>
                <hr>
              </div>
              <?php if (empty($allquize)) { ?>
              <div class="alert alert-danger">
                <strong>Sorry!</strong> Quizes are not available.
              </div>
              <?php  } else {  ?>
              <div class="row">
                <?php foreach ($allquize as $key => $quize) {  ?>
                <div class="col-md-3">
                  <div class="quiz-section">
                    <div class="quiz-box">
                      <img src="<?= base_url(); ?><?php echo $quize['banner_img'] ?>" class="w-100 border-2">
                    </div>
                    <div class="Quiz-button"><a href="aboutquiz.html">
                      <a href="<?= base_url(); ?>users/about_quiz/<?php echo $quize['id']; ?>" class="btn startQuiz"> <span>Start Quiz</span></a>
                    </div>
                    <p class="quiz-text overflow-hidden p-1"><?php echo $quize['title'] ?></p>
                  </div>
                </div>
                <?php  } ?>
              </div>
              <div class="view-button">
                <a href="<?= base_url(); ?>users/quiz">View All</a>
              </div>
              <?php } ?>
            </div>
          </section> -->
          <!-- <div class="" style="background-image: url(<?php echo base_url();?>assets/images/creative_img.webp);">
            <section>
              <div class="container-fluid pt-4 pb-5" id="start-quiz">
                <div class="row text-center">
                  <h3 style="font-weight: 700; color: white;">Creative Task</h3>
                  <p>Miscellaneous For You</p>
                </div>
                <div class="row">
                  <?php if(!empty($competition)){
                  foreach($competition as $list){ ?>
                  <div class="col-md-3">
                    <div class="quiz-section">
                      <div class="quiz-box">
                        <img src="<?php echo base_url().$list['thumbnail']; ?>" class="w-100 border-2">
                      </div>
                      <div class="Quiz-button">
                        <a href="<?php echo base_url().'users/about_competition/'.$list['competitionn_id']; ?>" class="btn startQuiz"> <span>Start Competition</span></a>
                      </div>
                      <p class="quiz-text overflow-hidden p-1" style="font-weight: 600; color:white;"><?php echo $list['competiton_name']; ?></p>
                    </div>
                  </div>
                  <?php  }} ?>
                  
                  <div class="col-md-3">
                    <div class="quiz-section">
                      <div class="quiz-box">
                        <img src="<?php echo base_url(); ?>/assets/images/img_2.jpg" class="w-100 border-2">
                      </div>
                      <div class="Quiz-button">
                        <a href="<?php echo base_url(); ?>users/about_competition" class="btn startQuiz"> <span>Start Competition</span></a>
                      </div>
                      <p class="quiz-text overflow-hidden p-1" style="font-weight: 600;">Competition Title</p>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="quiz-section">
                      <div class="quiz-box">
                        <img src="<?php echo base_url(); ?>/assets/images/img_2.jpg" class="w-100 border-2">
                      </div>
                      <div class="Quiz-button">
                        <a href="#" class="btn startQuiz"> <span>Start Competition</span></a>
                      </div>
                      <p class="quiz-text overflow-hidden p-1" style="font-weight: 600;">Competition Title</p>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="quiz-section">
                      <div class="quiz-box">
                        <img src="<?php echo base_url(); ?>/assets/images/img_2.jpg" class="w-100 border-2">
                      </div>
                      <div class="Quiz-button">
                        <a href="#" class="btn startQuiz"> <span>Start Competition</span></a>
                      </div>
                      <p class="quiz-text overflow-hidden p-1" style="font-weight: 600;">Competition Title</p>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="quiz-section">
                      <div class="quiz-box">
                        <img src="<?php echo base_url(); ?>/assets/images/img_2.jpg" class="w-100 border-2">
                      </div>
                      <div class="Quiz-button">
                        <a href="#" class="btn startQuiz"> <span>Start Competition</span></a>
                      </div>
                      <p class="quiz-text overflow-hidden p-1" style="font-weight: 600;">Competition Title</p>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="quiz-section">
                      <div class="quiz-box">
                        <img src="<?php echo base_url(); ?>/assets/images/img_2.jpg" class="w-100 border-2">
                      </div>
                      <div class="Quiz-button">
                        <a href="#" class="btn startQuiz"> <span>Start Competition</span></a>
                      </div>
                      <p class="quiz-text overflow-hidden p-1" style="font-weight: 600;">Competition Title</p>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="quiz-section">
                      <div class="quiz-box">
                        <img src="<?php echo base_url(); ?>/assets/images/img_2.jpg" class="w-100 border-2">
                      </div>
                      <div class="Quiz-button">
                        <a href="#" class="btn startQuiz"> <span>Start Competition</span></a>
                      </div>
                      <p class="quiz-text overflow-hidden p-1" style="font-weight: 600;">Competition Title</p>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="quiz-section">
                      <div class="quiz-box">
                        <img src="<?php echo base_url(); ?>/assets/images/img_2.jpg" class="w-100 border-2">
                      </div>
                      <div class="Quiz-button">
                        <a href="#" class="btn startQuiz"> <span>Start Competition</span></a>
                      </div>
                      <p class="quiz-text overflow-hidden p-1" style="font-weight: 600;">Competition Title</p>
                    </div>
                  </div>
                  
                  
                </div>
                <div class="view-button">
                  <a href="<?php echo base_url(); ?>users/all_creative_task">View All</a>
                </div>
                
              </div>
            </section>
          </div> -->
          <!-- <section id="cta" class="cta">
            
            <div class="container-fluid aos-init aos-animate" data-aos="zoom-out" style="background: #FFF9E9; padding: 0px !important" >
              <div style="background-image: url(<?php echo base_url();?>assets/images/whats-new-bg.png); padding: 80px">
                <div class="row g-5">
                  <div class="col-lg-7 col-md-6 content d-flex flex-column justify-content-center order-last order-md-first">
                    <h3>Standard Writting</h3>
                    <p> In the Common Core, the first three anchor writing standards require students to write in three important modes: argument/persuasive, informative/explanatory, and narrative.</p>
                    <a class="cta-btn align-self-start" href="#">View All</a>
                  </div>
                  <div class="col-lg-5 col-md-6 order-first order-md-last d-flex align-items-center">
                    <div class="owl-carousel owl-theme" id="owl-caraousal_standard">
                      <div class="item">
                        <div class="quiz-section">
                          <div class="quiz-box_live">
                            <a href="#">
                              <img src="<?php echo base_url(); ?>/assets/images/standard_writting.jpeg" class="stand_img">
                            </a>
                          </div>
                          <p class="quiz-text overflow-hidden p-1">
                            <a href="#"></a>
                          </p>
                        </div>
                      </div>
                    </div>
                    <div class="img">
                      <img src="<?= base_url(); ?>assets/images/standard.avif" alt="" class="img-standard">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
          </section>  -->
          <section style="background-color: #80808087;">
            <div class="container-fluid" style="padding: 0% 6% 0% 6%;">
              <div class="row new-content d-flex">
                <!-- <div class="new-content d-flex" style="margin-left: -37px;"> -->
                <div class="col-md-3 col-lg-3 p-2 ">
                  <a href="<?php echo base_url() . 'wall_of_wisdom/wallOfWisdom' ?>">
                    <div class="card image-card" style="width:100%;">
                      <img src="<?= base_url(); ?>assets/images/wisdom.jpeg" class="card-img-top" alt="...">
                      <div class="card-body-new">
                        <p class="card-text" style="font-size: 17px;"><?php echo $standard_club_section[$language]['8'] ?></p>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="col-md-3 col-lg-3 p-2 ">
                  <a href="<?php echo base_url() . 'users/learning_standerd' ?>">
                    <div class="card image-card" style="width:100%;">
                      <img src="<?= base_url(); ?>assets/images/classroom.jpg" class="card-img-top" alt="...">
                      <div class="card-body-new">
                        <p class="card-text" style="font-size: 17px;"><?php echo $standard_club_section[$language]['9'] ?></p>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="col-md-3 col-lg-3 p-2 ">
                  <a href="<?php echo base_url() . 'users/your_wall_posts' ?>">
                    <div class="card image-card" style="width:100%;">
                      <img src="<?= base_url(); ?>assets/images/wall_of_wisdom.jpeg" class="card-img-top" alt="...">
                      <div class="card-body-new">
                        <p class="card-text" style="font-size: 17px;"><?php echo $standard_club_section[$language]['10'] ?></p>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="col-md-3 col-lg-3 p-2 ">
                  <a href="<?php echo base_url() . "users/byTheMentor" ?>">
                    <div class="card image-card" style="width:100%;">
                      <img src="<?= base_url(); ?>assets/images/mentors1.jpg" class="card-img-top" alt="...">
                      <div class="card-body-new">
                        <p class="card-text" style="font-size: 17px;"><?php echo $standard_club_section[$language]['11'] ?></p>
                      </div>
                    </div>
                  </a>
                </div>
                <!-- </div> -->
              </div>
            </div>
          </section>
          <!-- <div class="creative-discussion" style="background-image: url(<?php echo base_url();?>assets/images/whats-new-bg.png);">
            <div class="container-fluid" style="padding:3%">
              <div class="creative-wrapper">
                <div class="creative-content">
                  <div class="section-title">
                    <h2>Latest News</h2>
                    <span>Your creativity can make a big impact</span>
                  </div>
                  <div class="creative-list">
                    <div class="view view-new-home-page-block view-id-new_home_page_block view-display-id-block_4 view-dom-id-34b0dfa3878c31dc7e3a1ca86b1f55eb">
                      <div class="view-content">
                        <?php if(!empty($news)){
                        foreach($news as $list){ ?>
                        <div class="views-row views-row-1 views-row-odd views-row-first">
                          <div class="views-field views-field-nothing"> <span class="field-content"><img src="<?php echo base_url().'uploads/letest_news/'.$list['thumbnail']; ?>" width="510" height="340" alt=" ODOP Wall Grand Challenge" title=" ODOP Wall Grand Challenge">
                            <a href="/task/odop-wall-grand-challenge/" title="Make Your Contribution">Make Your Contribution</a></span> </div>
                            <div class="views-field views-field-title-field">
                              <div class="field-content"><a href="/task/odop-wall-grand-challenge/" title=" ODOP Wall Grand Challenge"> <?php echo $list['title'];  ?></a></div>
                            </div>
                            <div class="views-field views-field-field-deadline"> <span class="views-label views-label-field-deadline">Last Date: </span>
                            <div class="field-content nodtranslate"><span class="date-display-single">May 11 2023 - 5:15am</span></div>
                          </div>
                        </div>
                        <?php } } ?>
                        
                      </div>
                    </div>
                  </div>
                  <a href="#" class="btn btn-primary seeMore" title="See All">See All</a>
                </div>
                <div class="discussion-content">
                  <div class="section-title">
                    <h2>Upcoming Events</h2>
                    <span>Share your suggestions and ideas with us</span>
                  </div>
                  <div class="discussion-list">
                    <div class="view view-new-home-page-block view-id-new_home_page_block view-display-id-block_5 view-dom-id-5ec1710fc29296967f3f63d10ae4c525">
                      <div class="view-content">
                        <div class="owl-carousel owl-theme" id="events_slider">
                          <?php if(!empty($events)){
                          foreach($events as $list){ ?>
                          <div class="item">
                            <div class="views-row views-row-1 views-row-odd views-row-first">
                              <div class="views-field views-field-nothing"> <span class="field-content"><img src="<?php echo base_url().'uploads/cms/events/'.$list['thumbnail']; ?>" width="510" height="340" alt="Inviting ideas for preparing India’s workforce for the Future of Work" title="Inviting ideas for preparing India’s workforce for the Future of Work">
                                <a href="/group-issue/inviting-ideas-preparing-india%E2%80%99s-workforce-future-work/" title="Share your views">Share your views</a></span> </div>
                                <div class="views-field views-field-title-field">
                                  <div class="field-content"><?php echo $list['title']; ?></div>
                                </div>
                                <div class="views-field views-field-field-deadline"> <span class="views-label views-label-field-deadline">Last Date: </span>
                                <div class="field-content nodtranslate"><span class="date-display-single">Jun 1 2023 - 10:45am</span></div>
                              </div>
                            </div>
                          </div>
                          <?php } } ?>
                          
                        </div>
                      </div>
                    </div>
                  </div>
                  <hr>
                </div>
              </div>
            </div>
          </div> -->
          <section style="margin-bottom: 38px;">
            <div class="container-fluid">
              <div class="row">
                <div class="col-lg-12 text-center my-2 pt-3">
                  <h4><?php echo $standard_club_section[$language]['12'] ?></h4>
                </div>
              </div>
              <div class="portfolio-menu mt-2 mb-4">
                <ul>
                  <!-- <li class="btn btn-outline-dark active" data-filter="*" id="img">Images</li> -->
                  <li style="padding: 0px;"><button onclick="gal_images()" class="btn btn-outline-dark active img" id="img"><?php echo $standard_club_section[$language]['13'] ?></button></li>
                  <!-- <li class="btn btn-outline-dark" data-filter=".gts">Girls T-shirt</li>
                  <li class="btn btn-outline-dark" data-filter=".lap">Laptops</li> -->
                  <li style="padding: 0px;"><button onclick="abcd()" class="btn btn-outline-dark vdo" id="vdo"><?php echo $standard_club_section[$language]['14'] ?></button></li>
                </ul>
              </div>
              <div class="portfolio-item row" id="photo_gallary" style="margin-left: 10px;">
                <?php if (!empty($images)) {
                foreach ($images as $list) { ?>
                <div class="item selfie col-lg-3 col-md-4 col-6 col-sm">
                  <!-- <a href="<?php echo base_url() . 'uploads/cms/gallary/photo/' . $list['image']; ?>" class="fancylight popup-btn" data-fancybox-group="light"> -->
                  <img class="img-fluid" id="gal_img" title="<?php echo $list['title']; ?>" src="<?php echo base_url() . 'uploads/cms/gallary/photo/' . $list['image']; ?>" style="height:180px; width:100%;" ; alt="" data-bs-toggle="modal" data-bs-target="#thumbnailexampleModal">
                  <!-- </a> -->
                </div>
                <?php } ?>
                <?php if (count($images) > 7) { ?>
                <div class="view-button">
                  <a href="<?php echo base_url() . 'users/photo_gallary' ?>">View All</a>
                </div>
                <?php }
                } ?>
                <!-- <a class="content-right" href="">view More...</a> -->
              </div>
              <div class="portfolio-item row" id="video_gallary" style="display:none;">
                <?php if (!empty($videos)) {
                foreach ($videos as $list) { ?>
                <div class="item selfie col-lg-3 col-md-4 col-6 col-sm">
                  <!-- <a href="<?php echo base_url() . 'uploads/' . $list['video']; ?>" class="fancylight popup-btn" data-fancybox-group="light">
                    <video class="img-fluid" src="<?php echo base_url() . 'uploads/cms/gallary/video/' . $list['video']; ?>" style="height:180px; width:280px; padding:20px;" ; alt="">
                    </a> -->
                    <video class="img-fluid" title="<?php echo $list['title']; ?>" controls>
                      <source src="<?php echo base_url() . 'uploads/cms/gallary/video/' . $list['video']; ?>" type="video/mp4" >
                    </video>
                  </div>
                  <?php if (count($videos) > 7) { ?>
                  <div class="view-button">
                    <a href="<?php echo base_url() . 'users/video_gallary' ?>">View All</a>
                  </div>
                  <?php } ?>
                  <?php }
                  } ?>
                </div>
              </div>
            </section>
            <!-- <button type="button" id="preview" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#thumbnailexampleModal">
            Preview
            </button>   -->
            <!-- Modal -->
            <div class="modal fade" id="thumbnailexampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" style="max-width:700px;">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Image Preview</h5>
                    <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <img src="" id="outputicon" width="100%"/>
                  </div>
                </div>
              </div>
            </div>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.js"></script>
            <script>
            $(document).ready(function(){
            
            $('#photo_gallary').on('click','#gal_img',function(){
            console.log("jhgjh");
            var id= $(this).attr('src');
            //alert(id);
            console.log(id);
            $('#outputicon').attr('src',id);
            })
            })
            $('#photo_gallary').show();
            function abcd() {
            $('.vdo').addClass('active');
            $('.img').removeClass('active');
            $('#photo_gallary').hide();
            $('#video_gallary').show();
            }
            function gal_images() {
            $('.img').addClass('active');
            $('.vdo').removeClass('active');
            $('#photo_gallary').show();
            $('#video_gallary').hide();
            }
            
            // $('.portfolio-item').isotope({
              //    itemSelector: '.item',
              //    layoutMode: 'fitRows'
            //  });
            $('.portfolio-menu ul li').click(function() {
            $('.portfolio-menu ul li').removeClass('active');
            $(this).addClass('active');
            var selector = $(this).attr('data-filter');
            $('.portfolio-item').isotope({
            filter: selector
            });
            return false;
            });
            $(document).ready(function() {
            var popup_btn = $('.popup-btn');
            popup_btn.magnificPopup({
            type: 'image',
            gallery: {
            enabled: true
            }
            });
            });
            $('#events_slider').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            dots: true,
            responsive: {
            0: {
            items: 1
            },
            600: {
            items: 2
            },
            1000: {
            items: 2
            }
            }
            });
            $('#news_slider').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            dots: true,
            responsive: {
            0: {
            items: 1
            },
            600: {
            items: 2
            },
            1000: {
            items: 2
            }
            }
            })
            </script>