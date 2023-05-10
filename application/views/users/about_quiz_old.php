<style>

#banner-section {
    padding: 30px 0px;
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
    font-size: 16px;
    font-weight: 600;
}

.main-title {
    font-size: 25px;
    font-weight: 600;
    margin-bottom: 12px;
}

.quiz-text {
    font-size: 14px;
    color: red;
    font-weight: 500;
    margin: 0px 28px 0px 4px;
}

.start-end-time-title {
    font-size: 16px;
    font-weight: 600;
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


/* about quiz end */
    </style>
<div class="container">
        <section id="banner-section">

            <div class="row">
                <div class="col-sm-5">
                    <div class="quiz-image shadow">
                        <img src="<?= base_url();?>assets/images/Swachh-Bharat-QUIZ.png" class="image-section" alt="Bis Quiz Images" />
                    </div>
                </div>
                <div class="col-sm-7">
                    <div class="Quiz_text">
                        <h3 class="main-title">Swachh Bharat Quiz 2023</h3>
                        <p class="time-and-qus">
                            <span class="number-quiz">100 <span class="quiz-text">Questions</span>
                            </span>
                            <span class="number-quiz">300 <span class="quiz-text">Sec</span>
                            </span>
                        </p>
                        <p class="time-start-end">
                            <span class="start-end-time-title">Start Date  <span class="quiz-text">10-02-2023</span>
                            </span>
                            <span class="start-end-time-title">End Date <span class="quiz-text">10-02-2023</span>
                            </span>
                        </p>
                        <a href="<?= base_url();?>users/quiz_start" class="btn startQuiz"> <span>Start Quiz</span></a>
                    </div>
                </div>
            </div>

        </section>
        <section id="quiz-about" class="mb-5">
            <div class="about-inner ">
                <h2 class="about-section">About Quiz</h2>
                <div class="About_point">
                    <p>To accelerate the efforts to achieve universal sanitation coverage, Swachh Bharat Mission was launched on 2nd October 2014. Under the mission, all villages, Gram Panchayats, Districts, States and Union Territories in India declared
                        themselves “open-defecation free” (ODF) by 2 October 2019, the 150th birth anniversary of Mahatma Gandhi, by constructing over 100 million toilets in rural India. To ensure that the open defecation free behaviour are sustained,
                        no one is left behind, and that solid and liquid waste management facilities are accessible, the Mission is moving towards the next Phase II of SBMG i.e. ODF-Plus.</p>
                    <p>ODF Plus activities under Phase II of Swachh Bharat Mission (Grameen) will reinforce ODF behaviours and focus on ODF sustainability and providing interventions for the safe management of solid and liquid waste in villages i.e. to convert
                        the villages from ODF to ODF Plus by 2024-25. </p>
                    <p>There is a huge scope and greater need for creating mass awareness on various components of ODF Plus among the common masses and students. The Quiz competition is designed to instil among the masses an awareness and understanding of
                        Sanitation and SBM-G Phase II, its importance in triggering behavior change and desirable actions and practices for promoting ODF Plus.</p>
                </div>
            </div>
        </section>
        <section id="quiz-about" class="mb-5">
            <div class="about-inner">
                <h2 class="about-section">Team's and Conditions</h2>
                <div class="About_point ">
                    <ol>
                        <li>Entry to the Quiz is open to all Indian citizens</li>
                        <li>This is a timed quiz with 10 questions to be answered in 2 minutes and 30 seconds</li>
                        <li>The organizer’s decision on the Quiz shall be final and binding and no correspondence will be entered into regarding the same.</li>
                        <li> The Participants who are scoring 10/10 correct answers in the given time will be declared as winners and will receive certificate for the quiz.</li>
                        <li>One participant will be eligible to win only once in a particular quiz. Multiple entries from the same entrant will not qualify them for multiple wins during the same quiz.</li>
                        <li>You will be required to provide your name, email address, telephone number, and postal address. By submitting your contact details, you will give consent to these details being used for the purpose of the Quiz and also for receiving
                            promotional content.</li>

                        <li>You will be required to provide your name, email address, telephone number, and postal address. By submitting your contact details, you will give consent to these details being used for the purpose of the Quiz and also for receiving
                            promotional content.</li>
                        <li>There will be no negative marking</li>
                        <li> The quiz will start as soon as the participant clicks the Start Quiz button</li>
                        <li> Once submitted an entry cannot be withdrawn</li>

                        <li> In case it’s detected that the participant has used unfair means to complete the quiz in unduly reasonable time, the entry may get rejected</li>
                        <li>Organizers will not accept any responsibility for entries that are lost, are late or incomplete or have not been transmitted due to computer error or any other error beyond the organizer’s reasonable control. Please note proof
                            of submission of the entry is not proof of receipt of the same</li>
                        <li> In the event of unforeseen circumstances, organizers reserve the right to amend or withdraw the Quiz at any time. For the avoidance of doubt this includes the right to amend these terms and conditions</li>
                        <li>The Participant shall abide by all the rules and regulations of participating in the Quiz from time to time
                        </li>
                        <li>Organizers reserve all rights to disqualify or refuse participation to any participant if they deem participation or association of any participant which is detrimental to the Quiz or the Organizers or partners of the Quiz. The
                            registrations shall be void if the information received by the Organizers is illegible, incomplete.</li>
                        <li> By entering the Quiz, the Participant accepts and agrees to be bound by these Terms and Conditions, mentioned above</li>
                    </ol>

                </div>
        </section>
        </div>