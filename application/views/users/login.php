<style>
    i.fa.password.fa-eye {
        float: right;
        margin-top: -25px;
        margin-right: 16px;
    }

    i.fa.password.fa-eye-slash {
        float: right;
        margin-top: -25px;
        margin-right: 16px;
    }
    #captcha{
        margin-top: -35px;
    margin-left: -58px;
    margin-bottom: -68px;
    z-index: -3;
    }
    .captcha{
        display: flex;
    }
    #refreshButton{
        margin: 7px;
    }
    /* .captcha {
    height: 50px;
    width: 162px;
    z-index: -1;
}
.captcha {
    position: absolute;
    bottom: -55px;
    display: flex;
}
.captcha #captcha {
    height: fit-content;
    position: absolute;
    top: 60%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 185px;
}
#refreshButton {
    position: relative;
    left: 150px;
} */
</style>
<div id="login_main_section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-4">
                <div class="left_side">
                    <div class="main_logo">
                        <img src="<?php echo base_url(); ?>assets/images/bis_logo.png" alt="BIS logo">
                    </div>
                    <p class="login_title">
                        Log In to your Bureau of Indian Standards Account
                    </p>
                    <div class="input_type">
                        <?php
                        /*  if ($this->session->flashdata('MSG')) {
                                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>';
                                    echo $this->session->flashdata('MSG');
                                    echo '</strong></button></div>';
                                }*/
                        ?>
                        <?php
                        if ($this->session->flashdata('MSG')) {
                            echo $this->session->flashdata('MSG');
                        }
                        ?>
                        <form action="<?php echo base_url(); ?>users/authUser" method="post">
                            <div class="from-group mb-4">
                                <input type="text" class="form-control form-control-md" name="username" id="username" placeholder="Email">
                                <span id="err_username" class="text-danger"></span>
                            </div>
                            <div class="from-group mb-2">
                                <input type="password" class="form-control form-control-md show-hide-password" name="password" id="password" placeholder="Password">
                                <i class="fa fa-eye-slash password"></i>
                                <span id="err_password" class="text-danger"></span>
                            </div>
                            <div class="captcha">
                                    <canvas id="captcha">captcha text</canvas>
                                    <button class="btn btn-secondary" id="refreshButton" type="button"
                                        title="Refresh Captcha"><i class="fa fa-refresh"></i></button>
                                </div>
                            <div class="from-group mb-2">
                                <input type="text" class="form-control form-control-md" name="text" id="textBox" autocomplete="off"
                                    oninput="this.value = this.value.replace(/[^A-Za-z0-9]/, '')" maxlength="7">
                                <span class="focus-border focus_p"></span>
                                

                                <span class="text-danger" id="output"></span>
                            </div>
                            <?php if(isset($id) && !empty($id)){ ?>
                                <input type="hidden" id="quizid" name="quizid" value="<?= $id;?>"/>
                            <?php }else if(isset($comp_id) && !empty($comp_id)){ ?>
                                <input type="hidden" id="compid" name="compid" value="<?= $comp_id;?>"/>
                           <?php } ?> 
                         

                            <!-- <a href="<?php echo base_url(); ?>users/forget_password" class="forgetPassword">Forgot Password ?</a> -->
                            <a href="https://www.services.bis.gov.in/php/BIS_2.0/forget-password" class="forgetPassword">Forgot Password ?</a>
                            
                            <div class="button_section text-center mt-3" style="margin-bottom: 13px; padding-top: 10px;">
                                <button class="btn btn_green" onclick="return submitButton()" type="submit">
                                    log in
                                </button>
                                <a class="btn btn-primary" href="<?php echo base_url().'users/welcome/'; ?>">Back to Home</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-8 px-0">
                <div class="right_side">
                    <div class="blue_color">
                        <div class="text_title">
                            <h2 class="Welcome_Bis">BIS Exchange Forum</h2>
                            <!-- <p class="mb-0 d-block">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc maximus, nulla ut commodo sagittis, sapien dui mattis dui, non pulvinar lorem felis nec erat</p> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- <script src="<?php echo base_url();?>assets/js/jquery-3.5.1.js"></script> -->
<script>
     var message = "Not Allowed Right Click";

function rtclickcheck(keyp) {
    if (navigator.appName == "Netscape" && keyp.which == 3) {
        alert(message);
       
        return false;
    }
    if (navigator.appVersion.indexOf("MSIE") != -1 && event.button == 2) {
        alert(message);
      
        return false;
    }
}
document.onmousedown = rtclickcheck;
    function submitButton() {

        var username = $("#username").val();
        var password = $("#password").val();
        var is_valid = true;
        var numbers = /[0-9]/g;
        var upperCaseLetters = /[A-Z]/g;
        var lowerCaseLetters = /[a-z]/g;
        //var random = $("#random").val();
        //random = random.trim();
        //var getSelectedValue = document.querySelector('input[name="lg_type"]:checked');
        // if (getSelectedValue == null) {
        //     $("#err_radio").text("Please select PC Auditor / PC Director ");
        // } else {
        //     $("#err_radio").text("");
        // }
        if (username == "") {
            $("#err_username").text("Please Enter email");
            $("#u_email").focus();
            is_valid = false;
        } else if (!(username.length > 2)) {
            $("#err_username").text("Please Enter minimum 3 Characters");
            $("#u_email").focus();
            is_valid = false;
        } else {
            $("#err_username").text("");
        }
        if (password == "") {
            $("#err_password").text("Please Enter Password");
            $("#password").focus();
            is_valid = false;
        } else if ((password.length < 6)) {
            $("#err_password").text("Please Enter minimum 6 Characters");
            $("#password").focus();
            is_valid = false;
        } else if (!(password.match(numbers))) {
            $("#err_password").text("Please Enter atleast one number");
            $("#password").focus();
            is_valid = false;
        }
        /*
        else if (!(password.match(upperCaseLetters))) {
            $("#err_password").text("Please Enter atleast one Capital Letter");
            $("#password").focus();
            is_valid = false;
        } else if (!(password.match(lowerCaseLetters))) {
            $("#err_password").text("Please Enter atleast one small Letter");
            $("#password").focus();
            is_valid = false;
        }*/
        else {
            $("#err_password").text("");
        }

        // if (textBox == "") {
        //     $("#output").text("Please Enter Captcha");
        //     $("#textBox").focus();
        //     is_valid = false;
        // } else if ((textBox != random)) {
        //     $("#output").text("Captcha not match");
        //     $("#textBox").focus();
        //     is_valid = false;
        // } else {
        //     $("#output").text("");
        // }

        if (is_valid) {

            /*var u_email = $("#u_email").val();
            var password= $("#password").val();

            var u = btoa(u_email);
            var p = btoa(pass);

            $("#u_email").val(u);
            $("#password").val(p);*/
            return true;
        } else {
            return false;
        }
    };
    const inputs = document.querySelectorAll('.show-hide-password');
    const icon = document.querySelectorAll('i.password');

    // Experiment 1
    icon.forEach(function(ele) {
        ele.addEventListener('click', function(e) {
            const targetInput = e.target.previousElementSibling.getAttribute('type');
            if (targetInput == 'password') {
                e.target.previousElementSibling.setAttribute('type', 'text');
                ele.classList.remove('fa-eye-slash');
                ele.classList.add('fa-eye');
            } else if (targetInput == 'text') {
                e.target.previousElementSibling.setAttribute('type', 'password');
                ele.classList.add('fa-eye-slash');
                ele.classList.remove('fa-eye');
            }
        });
    });

     // captcha start 

    // document.querySelector() is used to select an element from the document using its ID
    let captchaText = document.querySelector('#captcha');
    var ctx = captchaText.getContext("2d");
    ctx.font = "40px Roboto";
    ctx.fillStyle = "#000000";
    let userText = document.querySelector('#textBox');

    let output = document.querySelector('#output');
    let refreshButton = document.querySelector('#refreshButton');


    // alphaNums contains the characters with which you want to create the CAPTCHA
    let alphaNums = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', '0', '2', '3', '4', '5', '6', '7', '8', '9'];
    let emptyArr = [];

    // This loop generates a random string of 7 characters using alphaNums
    // Further this string is displayed as a CAPTCHA
    for (let i = 1; i <= 7; i++) {
        emptyArr.push(alphaNums[Math.floor(Math.random() * alphaNums.length)]);
    }
    var c = emptyArr.join('');
    ctx.fillText(emptyArr.join(''), captchaText.width / 4, captchaText.height / 2);


    // This event listener is stimulated whenever the user press the "Enter" button
    // "Correct!" or "Incorrect, please try again" message is
    // displayed after validating the input text with CAPTCHA
    userText.addEventListener('keyup', function (e) {
        // Key Code Value of "Enter" Button is 13
        if (e.keyCode === 13) {
            if (userText.value !== c) {
                output.classList.add("incorrectCaptcha");
                output.innerHTML = "Incorrect, please try again";
            }
            // if (userText.value === c) {
            //     output.classList.add("correctCaptcha");
            //     output.innerHTML = "Correct!";
            // } else {
            //     output.classList.add("incorrectCaptcha");
            //     output.innerHTML = "Incorrect, please try again";
            // }
        }
    });
    refreshButton.addEventListener('click', function () {
        userText.value = "";
        let refreshArr = [];
        for (let j = 1; j <= 7; j++) {
            refreshArr.push(alphaNums[Math.floor(Math.random() * alphaNums.length)]);
        }
        ctx.clearRect(0, 0, captchaText.width, captchaText.height);
        c = refreshArr.join('');
        ctx.fillText(refreshArr.join(''), captchaText.width / 4, captchaText.height / 2);
        output.innerHTML = "";
    });
</script>