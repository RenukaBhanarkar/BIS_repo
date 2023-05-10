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
                                     <input type="text" class="form-control form-control-md" name="username" id="username" placeholder="Email / Mobile Number">
                                     <span id="err_username" class="text-danger"></span>
                                 </div>
                                 <div class="from-group mb-2">
                                     <input type="password" class="form-control form-control-md show-hide-password" name="password" id="password" placeholder="Password">
                                     <i class="fa fa-eye-slash password"></i>
                                     <span id="err_password" class="text-danger"></span>
                                 </div>
                              
                                 <a href="<?php echo base_url(); ?>users/forget_password" class="forgetPassword">Forgot Password ?</a>

                                 <div class="button_section text-center mt-3">
                                     <button class="btn btn_green" onclick="return submitButton()" type="submit">
                                         log in
                                     </button>
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
     <script>
         function submitButton() {

             var username = $("#username").val();
             var password= $("#password").val();
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
             if (password== "") {
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
icon.forEach(function (ele) {
   ele.addEventListener('click', function (e) {
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

