<style>
        .inner_gallery_box {
            border-radius: 5px;
        }
        
        .inner_gallery_box img{
            border-radius: 5px;
            object-fit: fill;
        }
        .node-status {
    font-size: 0.786em;
    
    float: left;
    
}

.node-status > div {
    display: inline-block;
    border-radius: 4px;
    padding: 2px 5px;
    background: #034e9c;;
    color: #fff;
    font-size: 12px;
}
.card-winners {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    /* border: 1px solid rgba(0,0,0,.125); */
    box-shadow: rgb(0 0 0 / 35%) 0px 5px 15px;
    border-radius: 0.25rem;
    
    height: 100%;
    transition: transform 250ms;
   
}
.card-winners:hover{
    transform: translateY(-10px);
}
.title{
    clear: both;
    padding: 10px 0;
    font-family: "poppinssemibold", sans-serif;
    font-size: 13px;
    line-height: 1.2;
    font-weight: 600;
}
.node-status span{
    font-size: 13px;
}
.last-date{
    font-size: 11px;
}
.last-date span{
    font-size: 11px;
}

.card-winner-button{
    border-top: 1px solid rgba(74, 74, 74, 0.25);
    padding: 4px;
    text-align: center;
    font-size: 0.813em;
    font-family: "montserratbold", sans-serif;
    
    
}
.card-winner-button:hover {
    background: cornflowerblue;
    color: white;
}
.quiz-period {
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
}
.start-time {
    color: #2B8713;
    font-weight: 700;
    font-size: 12px;
}
span{
    font-size: 12px;
}
.end-time {
    color: #B11010;
    font-size: 12px;
}
.ques-block {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 10px 0;
}
.question_detail {
    display: flex;
    justify-content: center;
    text-align: center;
    font-weight: 500;
    color: #000000
}
.quizplay-btn {
    font-size: 19px;
    color: #A71630;
    padding: -7px 7px;
    font-weight: 700;
    border: 1px solid #575757;
    border-radius: 4px;
    width: 35%;
    text-align: center;
}
.item_foo {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 10px;
}
.item_foo a {
    color: #5E5E5E;
}
.get_reward {
    font-weight: 700;
    color: #010101;
    margin-right: 10px;
}
.view_tc {
    font-weight: 500;
    font-size: 11px;
}
.qcount {
    font-weight: 700;
}
.no_of_ques {
    padding: 0 10px;
    border-right: 1px solid #DBDBDB;
}
.time_duration {
    font-weight: 700;
}
.sec-text {
    font-size: 11px;
    font-weight: 500;
}
.quiz_time {
    padding: 0px 10px;
}
a.quizplay-btn:hover {
    background: #A71630;
    color: white;
}

    </style>
<section>
        <div class="container pb-5 pt-5" id="winner-section">
            
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
                              </div><a href="about_quiz/<?= $AllQuize['id']?>" class="quizplay-btn">Play</a>
                                                              
                            </div>
                            <div class="item_foo">
                                <a href="javascript:void(0)" class="get_reward"><i> </i> E-Certificate</a>
                                <a href="#" class="view_tc">View T&amp;C</a>
                            </div>
                    </div>
                </div>
              </div> 
              <?php  } ?>
              
            </div>
        
             
          </div>
    </section>