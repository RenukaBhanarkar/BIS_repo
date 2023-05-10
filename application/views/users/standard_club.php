<style>
  .inner_gallery_box {
    border-radius: 5px;
  }

  .inner_gallery_box img {
    border-radius: 5px;
    object-fit: fill;
  }

  p {
    text-align: center;
  }

  /* .item {
    height: 319px;
} */
  #owl-caraousal_standard .owl-theme .owl-dots {
    text-align: center;
    -webkit-tap-highlight-color: transparent;
    display: none;
  }

  #events_slider .owl-dots,
  #news_slider .owl-dots {
    position: absolute;
    top: -45px;
    right: 0px;
  }

  #events_slider .owl-nav,
  #news_slider .owl-nav {
    display: none;
  }
</style>
<section id="exchange_forum">
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
              <h2>An initiative to nurture the students as Brand Ambassadors of Quality & standards</h2>
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
</section>
<section id="winners_content">
  <div class="container-fluid">
    <div class="row">
      <div class="inner_content d-flex p-0">
        <div class="col-sm-3">
          <div class="card pt-3" style="background: #014e9c; color:white;">
            <div class="card-body new-card text-center">
              <h5 class="card-title">Winners of the Quiz</h5>
              <hr>
              <img src="<?= base_url(); ?>assets/images/background_img.webp" class="inner_image">
              <p class="card-text"><strong>Anis Mulani</strong></p>
              <p class="mb-0">k.b.p.v School Satara,Maharashtra</p>
              <div class="more_button">
                <button class="btn_common mt-1" onclick="location.href='<?php echo base_url(); ?>users/winners'">More<i class="fa fa-long-arrow-right ms-2" aria-hidden="true"></i></button>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-9">
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
                  <img src="<?= base_url() . 'uploads/' . $key['banner_images']; ?>" class="background-banner-image">
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
      </div>
    </div>
  </div>
</section>

<section>
  <div class="container pt-4 pb-5" id="start-quiz">
    <div class="row text-center">
      <h3>Quiz Competition</h3>
      <p>Quizzes For You</p>
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
</section>
<div class="" style="background-image: url(<?php echo base_url();?>assets/images/competition_bg.png);">
<section style="background: #ffffffba;">
  <div class="container-fluid pt-4 pb-5" id="start-quiz" style="padding: 66px;">
    <div class="row text-center">
      <h3 style="font-weight: 700; color: brown;">Creative Task</h3>
      <p>Miscellaneous For You</p>
    </div>
   <div class="row">
        
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
</div>
<section id="cta" class="cta">
  
  <div class="container aos-init aos-animate" data-aos="zoom-out" style="background: #FFF9E9; padding: 0px !important" >
  <div style="background-image: url(<?php echo base_url();?>assets/images/whats-new-bg.png); padding: 80px">
<div class="row g-5">

  <div class="col-lg-8 col-md-6 content d-flex flex-column justify-content-center order-last order-md-first">
    <h3>Standard Writting</h3>
    <p> In the Common Core, the first three anchor writing standards require students to write in three important modes: argument/persuasive, informative/explanatory, and narrative. (The bolding is added to the standards.)</p>
    <a class="cta-btn align-self-start" href="#">View All</a>
  </div>

  <div class="col-lg-4 col-md-6 order-first order-md-last d-flex align-items-center">
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
     <!-- <div class="img">
          <img src="<?= base_url(); ?>assets/images/standard.avif" alt="" class="img-standard">
        </div> -->
  </div>

</div>

</div>
  </div>
  
</section> 

<section style="background-color: #e3effb94;">
  <div class="container">
    <div class="row">
      <div class="new-content d-flex" style="margin-left: -37px;">
        <div class="col-md-3 col-lg-3 col-sm-3 m-2">
          <a href="<?php echo base_url() . 'wall_of_wisdom/wallOfWisdom' ?>">
            <div class="card image-card" style="width:100%;">
              <img src="<?= base_url(); ?>assets/images/wall_1.jpg" class="card-img-top" alt="...">
              <div class="card-body-new">
                <p class="card-text">Wall Of Wisdom</p>
              </div>
            </div>
          </a>
        </div>
        <div class="col-md-3 col-lg-3 col-sm-3 m-2">
          <a href="<?php echo base_url() . 'users/learning_standerd' ?>">


            <div class="card image-card" style="width:100%;">

              <img src="<?= base_url(); ?>assets/images/learning_new.jpeg" class="card-img-top" alt="...">
              <div class="card-body-new">
                <p class="card-text">Classroom</p>
              </div>
            </div>
          </a> 
        </div>
        <div class="col-md-3 col-lg-3 col-sm-3 m-2">
          <a href="<?php echo base_url() . 'users/yourwall' ?>">
            <div class="card image-card" style="width:100%;">
              <img src="<?= base_url(); ?>assets/images/wall_3.jpg" class="card-img-top" alt="...">
              <div class="card-body-new">
                <p class="card-text">Your Wall</p>
              </div>
            </div>
          </a>
        </div>
        <div class="col-md-3 col-lg-3 col-sm-3 m-2">
          <a href="<?php echo base_url() . "users/byTheMentor" ?>">
            <div class="card image-card" style="width:100%;">

              <img src="<?= base_url(); ?>assets/images/wall_4.jpg" class="card-img-top" alt="...">
              <div class="card-body-new">
                <p class="card-text">By the Mentors</p>
              </div>

            </div>
          </a>
        </div>

      </div>
    </div>
  </div>

</section>
<div class="creative-discussion" style="background-image: url(<?php echo base_url();?>assets/images/whats-new-bg.png);">
  <div class="container">
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
              <!-- <div class="views-row views-row-1 views-row-odd views-row-first">

                <div class="views-field views-field-nothing"> <span class="field-content"><img src="https://mygov.in/sites/default/files/master_image/odopthumbnail.jpg" width="510" height="340" alt=" ODOP Wall Grand Challenge" title=" ODOP Wall Grand Challenge">
                    <a href="/task/odop-wall-grand-challenge/" title="Make Your Contribution">Make Your Contribution</a></span> </div>
                <div class="views-field views-field-title-field">
                  <div class="field-content"><a href="/task/odop-wall-grand-challenge/" title=" ODOP Wall Grand Challenge"> ODOP Wall Grand Challenge</a></div>
                </div>
                <div class="views-field views-field-field-deadline"> <span class="views-label views-label-field-deadline">Last Date: </span>
                  <div class="field-content nodtranslate"><span class="date-display-single">May 11 2023 - 5:15am</span></div>
                </div>
              </div>
              <div class="views-row views-row-2 views-row-even">

                <div class="views-field views-field-nothing"> <span class="field-content"><img src="https://mygov.in/sites/default/files/master_image/thumbnailkhelomascot.jpg" width="510" height="340" alt="Suggest a Name of the Mascot for Khelo India University Games 2022" title="Suggest a Name of the Mascot for Khelo India University Games 2022">
                    <a href="/task/suggest-name-mascot-khelo-india-university-games-2022/" title="Make Your Contribution">Make Your Contribution</a></span> </div>
                <div class="views-field views-field-title-field">
                  <div class="field-content"><a href="/task/suggest-name-mascot-khelo-india-university-games-2022/" title="Suggest a Name of the Mascot for Khelo India University Games 2022">Suggest a Name of the Mascot for Khelo India University Games 2022</a></div>
                </div>
                <div class="views-field views-field-field-deadline"> <span class="views-label views-label-field-deadline">Last Date: </span>
                  <div class="field-content nodtranslate"><span class="date-display-single">May 1 2023 - 10:45am</span></div>
                </div>
              </div> -->
              <!-- <div class="views-row views-row-3 views-row-odd">

                <div class="views-field views-field-nothing"> <span class="field-content"><img src="https://mygov.in/sites/default/files/master_image/slogan_thumbnail.png" width="510" height="340" alt="Suggest a Slogan for Khelo India University Games 2022" title="Suggest a Slogan for Khelo India University Games 2022">
                    <a href="/task/suggest-slogan-khelo-india-university-games-2022/" title="Make Your Contribution">Make Your Contribution</a></span> </div>
                <div class="views-field views-field-title-field">
                  <div class="field-content"><a href="/task/suggest-slogan-khelo-india-university-games-2022/" title="Suggest a Slogan for Khelo India University Games 2022">Suggest a Slogan for Khelo India University Games 2022</a></div>
                </div>
                <div class="views-field views-field-field-deadline"> <span class="views-label views-label-field-deadline">Last Date: </span>
                  <div class="field-content nodtranslate"><span class="date-display-single">May 1 2023 - 10:45am</span></div>
                </div>
              </div> -->
              <!-- <div class="views-row views-row-4 views-row-even views-row-last">

                <div class="views-field views-field-nothing"> <span class="field-content"><img src="https://mygov.in/sites/default/files/master_image/thumbnail_anthem.jpg" width="510" height="340" alt="Compose an Anthem for Khelo India University Games 2022" title="Compose an Anthem for Khelo India University Games 2022">
                    <a href="/task/compose-anthem-khelo-india-university-games-2022/" title="Make Your Contribution">Make Your Contribution</a></span> </div>
                <div class="views-field views-field-title-field">
                  <div class="field-content"><a href="/task/compose-anthem-khelo-india-university-games-2022/" title="Compose an Anthem for Khelo India University Games 2022">Compose an Anthem for Khelo India University Games 2022</a></div>
                </div>
                <div class="views-field views-field-field-deadline"> <span class="views-label views-label-field-deadline">Last Date: </span>
                  <div class="field-content nodtranslate"><span class="date-display-single">May 1 2023 - 10:45am</span></div>
                </div>
              </div> -->
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
                <!-- <div class="item">
                  <div class="views-row views-row-2 views-row-even">

                    <div class="views-field views-field-nothing"> <span class="field-content"><img src="https://mygov.in/sites/default/files/master_image/thumbnail_5.jpg" width="510" height="340" alt="Share your inputs on the Role of Manthan in empowering women entrepreneurs and startups to scale up innovation for a larger social Impact" title="Share your inputs on the Role of Manthan in empowering women entrepreneurs and startups to scale up innovation for a larger social Impact">
                        <a href="/group-issue/share-your-inputs-role-manthan-empowering-women-entrepreneurs-and-startups-scale/" title="Share your views">Share your views</a></span> </div>
                    <div class="views-field views-field-title-field">
                      <div class="field-content">Share your inputs on the Role of Manthan in empowering women entrepreneurs and startups to scale</div>
                    </div>
                    <div class="views-field views-field-field-deadline"> <span class="views-label views-label-field-deadline">Last Date: </span>
                      <div class="field-content nodtranslate"><span class="date-display-single">May 1 2023 - 5:15am</span></div>
                    </div>
                  </div>
                </div>
                <div class="item">
                  <div class="views-row views-row-1 views-row-odd views-row-first">

                    <div class="views-field views-field-nothing"> <span class="field-content"><img src="https://mygov.in/sites/default/files/master_image/thumbnail_2_1.png" width="510" height="340" alt="Inviting ideas for preparing India’s workforce for the Future of Work" title="Inviting ideas for preparing India’s workforce for the Future of Work">
                        <a href="/group-issue/inviting-ideas-preparing-india%E2%80%99s-workforce-future-work/" title="Share your views">Share your views</a></span> </div>
                    <div class="views-field views-field-title-field">
                      <div class="field-content">Inviting ideas for preparing India’s workforce for the Future of Work</div>
                    </div>
                    <div class="views-field views-field-field-deadline"> <span class="views-label views-label-field-deadline">Last Date: </span>
                      <div class="field-content nodtranslate"><span class="date-display-single">Jun 1 2023 - 10:45am</span></div>
                    </div>
                  </div>
                </div>
                <div class="item">
                  <div class="views-row views-row-2 views-row-even">

                    <div class="views-field views-field-nothing"> <span class="field-content"><img src="https://mygov.in/sites/default/files/master_image/thumbnail_5.jpg" width="510" height="340" alt="Share your inputs on the Role of Manthan in empowering women entrepreneurs and startups to scale up innovation for a larger social Impact" title="Share your inputs on the Role of Manthan in empowering women entrepreneurs and startups to scale up innovation for a larger social Impact">
                        <a href="/group-issue/share-your-inputs-role-manthan-empowering-women-entrepreneurs-and-startups-scale/" title="Share your views">Share your views</a></span> </div>
                    <div class="views-field views-field-title-field">
                      <div class="field-content">Share your inputs on the Role of Manthan in empowering women entrepreneurs and startups to scale</div>
                    </div>
                    <div class="views-field views-field-field-deadline"> <span class="views-label views-label-field-deadline">Last Date: </span>
                      <div class="field-content nodtranslate"><span class="date-display-single">May 1 2023 - 5:15am</span></div>
                    </div>
                  </div>
                </div> -->
              </div>





            </div>






          </div>
        </div>
<hr>
        <!-- <div class="section-title">
          <h2>Latest News</h2>
          <span>Share your suggestions and ideas with us</span>
        </div> -->
        <!-- <div class="discussion-list">
          <div class="view view-new-home-page-block view-id-new_home_page_block view-display-id-block_5 view-dom-id-5ec1710fc29296967f3f63d10ae4c525">




            <div class="view-content">

              <div class="owl-carousel owl-theme" id="news_slider">
                <div class="item">
                  <div class="views-row views-row-1 views-row-odd views-row-first">

                    <div class="views-field views-field-nothing"> <span class="field-content"><img src="https://mygov.in/sites/default/files/master_image/thumbnail_2_1.png" width="510" height="340" alt="Inviting ideas for preparing India’s workforce for the Future of Work" title="Inviting ideas for preparing India’s workforce for the Future of Work">
                        <a href="/group-issue/inviting-ideas-preparing-india%E2%80%99s-workforce-future-work/" title="Share your views">Share your views</a></span> </div>
                    <div class="views-field views-field-title-field">
                      <div class="field-content">Inviting ideas for preparing India’s workforce for the Future of Work</div>
                    </div>
                    <div class="views-field views-field-field-deadline"> <span class="views-label views-label-field-deadline">Last Date: </span>
                      <div class="field-content nodtranslate"><span class="date-display-single">Jun 1 2023 - 10:45am</span></div>
                    </div>
                  </div>
                </div>
                <div class="item">
                  <div class="views-row views-row-2 views-row-even">

                    <div class="views-field views-field-nothing"> <span class="field-content"><img src="https://mygov.in/sites/default/files/master_image/thumbnail_5.jpg" width="510" height="340" alt="Share your inputs on the Role of Manthan in empowering women entrepreneurs and startups to scale up innovation for a larger social Impact" title="Share your inputs on the Role of Manthan in empowering women entrepreneurs and startups to scale up innovation for a larger social Impact">
                        <a href="/group-issue/share-your-inputs-role-manthan-empowering-women-entrepreneurs-and-startups-scale/" title="Share your views">Share your views</a></span> </div>
                    <div class="views-field views-field-title-field">
                      <div class="field-content">Share your inputs on the Role of Manthan in empowering women entrepreneurs and startups to scale up innovation for a larger social Impact</div>
                    </div>
                    <div class="views-field views-field-field-deadline"> <span class="views-label views-label-field-deadline">Last Date: </span>
                      <div class="field-content nodtranslate"><span class="date-display-single">May 1 2023 - 5:15am</span></div>
                    </div>
                  </div>
                </div>
                <div class="item">
                  <div class="views-row views-row-1 views-row-odd views-row-first">

                    <div class="views-field views-field-nothing"> <span class="field-content"><img src="https://mygov.in/sites/default/files/master_image/thumbnail_2_1.png" width="510" height="340" alt="Inviting ideas for preparing India’s workforce for the Future of Work" title="Inviting ideas for preparing India’s workforce for the Future of Work">
                        <a href="/group-issue/inviting-ideas-preparing-india%E2%80%99s-workforce-future-work/" title="Share your views">Share your views</a></span> </div>
                    <div class="views-field views-field-title-field">
                      <div class="field-content">Inviting ideas for preparing India’s workforce for the Future of Work</div>
                    </div>
                    <div class="views-field views-field-field-deadline"> <span class="views-label views-label-field-deadline">Last Date: </span>
                      <div class="field-content nodtranslate"><span class="date-display-single">Jun 1 2023 - 10:45am</span></div>
                    </div>
                  </div>
                </div>
                <div class="item">
                  <div class="views-row views-row-2 views-row-even">

                    <div class="views-field views-field-nothing"> <span class="field-content"><img src="https://mygov.in/sites/default/files/master_image/thumbnail_5.jpg" width="510" height="340" alt="Share your inputs on the Role of Manthan in empowering women entrepreneurs and startups to scale up innovation for a larger social Impact" title="Share your inputs on the Role of Manthan in empowering women entrepreneurs and startups to scale up innovation for a larger social Impact">
                        <a href="/group-issue/share-your-inputs-role-manthan-empowering-women-entrepreneurs-and-startups-scale/" title="Share your views">Share your views</a></span> </div>
                    <div class="views-field views-field-title-field">
                      <div class="field-content">Share your inputs on the Role of Manthan in empowering women entrepreneurs and startups to scale up innovation for a larger social Impact</div>
                    </div>
                    <div class="views-field views-field-field-deadline"> <span class="views-label views-label-field-deadline">Last Date: </span>
                      <div class="field-content nodtranslate"><span class="date-display-single">May 1 2023 - 5:15am</span></div>
                    </div>
                  </div>
                </div>
              </div>





            </div>






          </div>
        </div> -->


        <!--a href="/home/58/do/" class="seeMore">See All</a-->
      </div>
    </div>
  </div>
</div>

<section style="margin-bottom: 38px;">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center my-2 pt-5">
        <h4>Images & Gallery</h4>
      </div>
    </div>
    <div class="portfolio-menu mt-2 mb-4">
      <ul>
        <!-- <li class="btn btn-outline-dark active" data-filter="*" id="img">Images</li> -->
        <li style="padding: 0px;"><button onclick="gal_images()" class="btn btn-outline-dark active img" id="img">Images</button></li>
        <!-- <li class="btn btn-outline-dark" data-filter=".gts">Girls T-shirt</li>
                  <li class="btn btn-outline-dark" data-filter=".lap">Laptops</li> -->
        <li style="padding: 0px;"><button onclick="abcd()" class="btn btn-outline-dark vdo" id="vdo">Video</button></li>
      </ul>
    </div>
    <div class="portfolio-item row" id="photo_gallary">
      <?php if (!empty($images)) {
        foreach ($images as $list) { ?>
          <div class="item selfie col-lg-3 col-md-4 col-6 col-sm">
            <a href="<?php echo base_url() . 'uploads/' . $list['image']; ?>" class="fancylight popup-btn" data-fancybox-group="light">
              <img class="img-fluid" src="<?php echo base_url() . 'uploads/' . $list['image']; ?>" style="height:180px; width:280px;" ; alt="">
            </a>
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
              <video class="img-fluid" src="<?php echo base_url() . 'uploads/' . $list['video']; ?>" style="height:180px; width:280px; padding:20px;" ; alt="">
            </a> -->
            <video class="img-fluid" controls>
              <source src="<?php echo base_url() . 'uploads/' . $list['video']; ?>" type="video/mp4">
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




<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.js"></script>
<script>
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
  //  	itemSelector: '.item',
  //  	layoutMode: 'fitRows'
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