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

    /* about quiz end */
</style>
<div class="container">
    <section id="banner-section">
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
                    <img src="<?php echo base_url(); ?>/assets/images/img_2.jpg" class="image-section" alt="Bis Quiz Images" />
                </div>
            </div>
            <div class="col-sm-7">
                <div class="Quiz_text">
                    <h3 class="main-title">Miscellaneous Competition</h3>
                    <!-- <p class="time-and-qus" style="color:white;">
                        <span class="number-quiz"><span class="question_no">10</span><span class="quiz-text">Questions</span>
                        </span>
                        <span class="number-quiz"><span class="question_no">50</span><span class="quiz-text">Minutes</span>
                        </span>
                    </p> -->
                    <div class="d-flex">
                        <p class="time-start-end d-flex" style="margin-bottom:0px;">
                            <span class="start-end-time-title mr-2">Start Date<span class="quiz-text-date m-2">12/03/2023<span style="margin-left: 12px;">12:00:00</span></span>
                            </span>
                        </p>
                        <!-- <p class="time-start-end d-flex" style="margin-bottom:0px; margin-left: 8px;">
                            <span class="start-end-time-title">Marks<span class="quiz-text-date m-2">50</span>
                            </span>
                        </p> -->
                    </div>
                    <div class="d-flex">
                        <p class="time-start-end d-flex" style="margin-bottom:0px; margin-top: 10px;">
                            <span class="start-end-time-title">End Date <span class="quiz-text-date m-2">12/03/2023<span style="margin-left: 12px;">12:00:00</span>
                            </span>
                        </p>
                       <!--  <p class="time-start-end d-flex" style="margin-bottom:0px; margin-top: 10px; margin-left: 10px;">
                            <span class="start-end-time-title">Branch<span class="quiz-text-date m-2">12</span>
                            </span>
                        </p> -->
                    </div>
                      <a href="<?= base_url(); ?>users/start_competition" class="btn startQuiz"> <span>Login to Participate</span></a>
                   
                </div>
            </div>
        </div>

    </section>
    <section id="quiz-about" class="mb-5">
        <div class="about-inner ">
            <h2 class="about-section">About Competition</h2>
            <div class="About_point">
            AVIF is a new and high-efficient image format based on the AV1 video format. The format is open-source and royalty-free, developed by a collaboration of Google, Cisco, and Xiph.org AVIF is a new and high-efficient image format based on the AV1 video format. The format is open-source and royalty-free, developed by a collaboration of Google, Cisco, and Xiph.org AVIF is a new and high-efficient image format based on the AV1 video format. The format is open-source and royalty-free, developed by a collaboration of Google, Cisco, and Xiph.org AVIF is a new and high-efficient image format based on the AV1 video format. The format is open-source and royalty-free, developed by a collaboration of Google, Cisco, and Xiph.org AVIF is a new and high-efficient image format based on the AV1 video format. The format is open-source and royalty-free, developed by a collaboration of Google, Cisco, and Xiph.org AVIF is a new and high-efficient image format based on the AV1 video format. The format is open-source and royalty-free, developed by a collaboration of Google, Cisco, and Xiph.org
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
            AVIF is a new and high-efficient image format based on the AV1 video format. The format is open-source and royalty-free, developed by a collaboration of Google, Cisco, and Xiph.org AVIF is a new and high-efficient image format based on the AV1 video format. The format is open-source and royalty-free, developed by a collaboration of Google, Cisco, and Xiph.org AVIF is a new and high-efficient image format based on the AV1 video format. The format is open-source and royalty-free, developed by a collaboration of Google, Cisco, and Xiph.org AVIF is a new and high-efficient image format based on the AV1 video format. The format is open-source and royalty-free, developed by a collaboration of Google, Cisco, and Xiph.org AVIF is a new and high-efficient image format based on the AV1 video format. The format is open-source and royalty-free, developed by a collaboration of Google, Cisco, and Xiph.org AVIF is a new and high-efficient image format based on the AV1 video format. The format is open-source and royalty-free, developed by a collaboration of Google, Cisco, and Xiph.org AVIF is a new and high-efficient image format based on the AV1 video format. The format is open-source and royalty-free, developed by a collaboration of Google, Cisco, and Xiph.org AVIF is a new and high-efficient image format based on the AV1 video format. The format is open-source and royalty-free, developed by a collaboration of Google, Cisco, and Xiph.org

            </div>
    </section>

</div>
<section class="-join_section">
    <div class="join_content">
        <div class="bloginfo">
            <h3 style="margin-bottom: 14px; /* margin-top: 20px; */ color: #0086b2!important; font-weight: 600; margin-left: 24px;">Prize Details</h3>
        </div>
        
        <div class="join_container">
            <div class="view_join_content">
                <h3>First Prize</h3>

                <div class="start_content">
                    <img src="<?php echo base_url(); ?>/assets/images/prize_2.avif" alt="" class="join_img">
                </div>

                <div class="#">
                    <div class="title_join">
                        <h3>Laptop</h3>
                        <span class="last-date">Number of Prizes :<span class="date-time" style="margin-left:5px;">1</span></span> 
                    </div>
                </div>
            </div>
            <div class="view_join_content">
                <h3>Second Prize</h3>

                <div class="start_content">
                    <img src="<?php echo base_url(); ?>/assets/images/prize_2.avif" alt="" class="join_img">
                </div>

                <div class="#">
                    <div class="title_join">
                        <h3>Laptop</h3>
                        <span class="last-date">Number of Prizes :<span class="date-time" style="margin-left:5px;">1</span></span> 
                    </div>
                </div>
            </div>
            <div class="view_join_content">
                <h3>Third Prize</h3>

                <div class="start_content">
                    <img src="<?php echo base_url(); ?>/assets/images/prize_2.avif" alt="" class="join_img">
                </div>

                <div class="#">
                    <div class="title_join">
                        <h3>Laptop</h3>
                        <span class="last-date">Number of Prizes :<span class="date-time" style="margin-left:5px;">1</span></span> 
                    </div>
                </div>
            </div>
            <div class="view_join_content">
                <h3>Consolation Prize</h3>

                <div class="start_content">
                    <img src="<?php echo base_url(); ?>/assets/images/prize_2.avif" alt="" class="join_img">
                </div>

                <div class="#">
                    <div class="title_join">
                        <h3>Laptop</h3>
                        <span class="last-date">Number of Prizes :<span class="date-time" style="margin-left:5px;">1</span></span> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

