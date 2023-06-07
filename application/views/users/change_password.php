<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="Bureau of Indian standard">
    <meta name="description" content="Bureau of Indian standard">
    <!-- FontAwesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" crossorigin="anonymous" />
    <!-- Bootstrap CSS -->
    <title>Bureau of Indian standard | Forget Password</title>
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link href="" rel="stylesheet">
    <!-- CSS File -->
    <link href="<?php echo base_url(); ?>assets/css/blueThemestyle.css" rel="stylesheet" />
    <link rel="shortcut icon" href="assets/images/bis_logo.png" type="image/x-icon">
    <style>

    </style>
</head>
<style>
    .left_side {
    width: 80%;
    margin: 14px auto 0px 40px;
}
label.d-block.text-font {
    font-size: 14px;
}
.form-control{
    font-size: 13px;
}
i.fa.password.fa-eye-slash {
    float: right;
    margin-top: -25px;
    margin-right: 16px;
}
i.fa.password.fa-eye {
    float: right;
    margin-top: -25px;
    margin-right: 16px;
}
    </style>
<body>
    <div id="login_main_section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-4">
                    <div class="left_side">
                        <div class="main_logo">
                            <img src="<?php echo base_url(); ?>assets/images/bis_logo.png" alt="BIS logo">
                        </div>
                        <p class="login_title mb-0 pb-1">
                            Change Password
                        </p>
                        <!-- <p class="sub_login_title"> Reset Password will be sent to register mail</p> -->
                        <div class="input_type mt-4">
                            <div class="from-group mb-2">
                            <label class="d-block text-font">Old/Current Password</label>
                                <input type="password" class="form-control form-control-md show-hide-password" placeholder="Enter Old/Current Password">
                                <i class="fa password fa-eye-slash"></i>
                            </div>
                            <div class="from-group mb-2">
                            <label class="d-block text-font">New Password</label>
                                <input type="password" class="form-control form-control-md show-hide-password" placeholder="Enter New Password">
                                <i class="fa password fa-eye-slash"></i>
                            </div>
                            <div class="from-group mb-4">
                            <label class="d-block text-font">Confirm Password</label>
                                <input type="password" class="form-control form-control-md show-hide-password" placeholder="Enter Confirm Password">
                                <i class="fa password fa-eye-slash"></i>
                            </div>
                            <div class="from-group mb-2">
                            <input type="button" class="btn btn-brand-02 btn-block w-100" value="Submit" style="background-color: green; color: white;" onclick="">
                            </div>
                            <div class="from-group mb-2">
                            <input type="button" class="btn btn-brand-02 btn-block w-100" value="Cancel" style="background-color: gray; color: white;" onclick="">
                            </div>
                            


                            <!-- <div class="button_section text-center mt-3">
                                <button class="btn btn_green" type="button">
                            Continue
                            </button>
                            </div> -->
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
</body>

</html>
<script>
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
    </script>