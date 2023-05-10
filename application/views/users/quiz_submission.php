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
    <title>Bureau of Indian standard | Quiz Start</title>
    <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link href="<?php echo base_url();?>" rel="stylesheet">
    <!-- CSS File -->
    <link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet" />
    <link rel="shortcut icon" href="<?php echo base_url();?>assets/images/bis_logo.png" type="image/x-icon">
    <link href="<?php echo base_url();?>assets/css/quiz_start.css" rel="stylesheet" />
    
</head>

<body> 
    <div class="row">
<div class=" col-md-offset-2 col-md-8"style="margin-left: 20%"> 
<div class="Quiz_section">
                <div class="quiz-left-side-main shadow">
                	<div class="thank_you_box" id="thankYou">
                		<img src="assets/images/certificate.png" alt="">
                        <div class="text_box">
                            <h4>Thank You </h4>
                            <p>For Participating In The Quiz </p>
                            <p class="Certificate-link"><a href="#">Click here</a> to download the Certificate</p>
                        </div>
                    </div>
                </div>
            </div>  
            </div>  
            </div> 
    <script src="assets/js/bootstrap.bundle.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/font_resize.js"></script>
    <script src="assets/js/tab.js"></script>
    <script src="assets/js/dark_mode.js"></script> 
    <script>
    </script>
    <script> 

        var currentTab = 0; // Current tab is set to be the first tab (0)
        showTab(currentTab); // Display the current tab
        document.getElementById("submit_button").style.display = "none";


        function showTab(n) {
            // This function will display the specified tab of the form...
            var x = document.getElementsByClassName("tab");
            x[n].style.display = "block";

            //... and fix the Previous/Next buttons:
            if (n == 0) {
                document.getElementById("prevBtn").style.display = "none";
            } else {
                document.getElementById("prevBtn").style.display = "inline";
            }
            if (n == (x.length - 1)) {
                // document.getElementById("nextBtn").innerHTML = "Submit";
                document.getElementById("nextBtn").style.display = "none";
                document.getElementById("submit_button").style.display = "block";

            } else {
                document.getElementById("nextBtn").innerHTML = "Next";
            }
            //... and run a function that will display the correct step indicator:
            fixStepIndicator(n)
        }

        function nextPrev(n) {
            var valid = true;
            // This function will figure out which tab to display
            var x = document.getElementsByClassName("tab");
            // Exit the function if any field in the current tab is invalid:
            // if (n == 1 && !validateForm()) return false;
            // Hide the current tab:
            x[currentTab].style.display = "none";
            // Increase or decrease the current tab by 1:
            currentTab = currentTab + n;
            // if you have reached the end of the form...
            if (currentTab >= x.length) {
                // ... the form gets submitted:
                // $("#myForm").submit();
                // document.getElementById("regForm").submit();
                document.getElementById("afterSubmitHide").style.display = "none";
                // $('#afterSubmitHide').hide();
                console.log('hello')
                return false;

            }
            // Otherwise, display the correct tab:
            showTab(currentTab);
            if (valid) {
                document.getElementsByClassName("step")[currentTab].className += " finish";
            }
        }

        function validateForm() {
            // This function deals with validation of the form fields
            var x, y, i, valid = true;


            return valid; // return the valid status
        }

        function fixStepIndicator(n) {
            // This function removes the "active" class of all steps...
            var i, x = document.getElementsByClassName("step");
            for (i = 0; i < x.length; i++) {
                x[i].className = x[i].className.replace(" active", "");
            }
            //... and adds the "active" class on the current step:
            //  x[n].className += " active";
        }
         

    </script>
    <script>
        $('.login_details').hide()
jQuery('.show').on('click',function(){
  jQuery('.login_details').toggle();
});
</script>

 
</body>

</html>