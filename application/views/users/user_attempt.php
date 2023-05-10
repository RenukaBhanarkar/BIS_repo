<!doctype html>
    <?php  
    date_default_timezone_set("Asia/Calcutta");
      $quiz_start_time=$_SESSION['quiz_start_time']=date('h:i:s'); 
    ?>
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
    <link href="<?= base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link href="<?= base_url();?>" rel="stylesheet">
    <!-- CSS File -->
    <link href="<?= base_url();?>assets/css/style.css" rel="stylesheet" />
    <link href="<?= base_url();?>assets/css/style.css" rel="stylesheet" />
    <link rel="shortcut icon" href="<?= base_url();?>assets/images/bis_logo.png" type="image/x-icon">
    <link href="<?= base_url();?>assets/css/quiz_start.css" rel="stylesheet" />
    
</head>
<style>
    h3.quiz_title_heading {
    margin-left: 12px;
    padding: 14px 0px 0px 0px;
    font-weight: 600;
    color: crimson;
}
</style>
<body>
     


    <section id="quizEnd">
        <div class="col-md-12">
            <div class="Quiz_section ">
                <div class="quiz-left-side-main shadow" style="width:100%">
                    <h3 class="quiz_title_heading">Either you have refreshed the screen OR already attempted this quiz.You Can not proceed futher.   </h3>
                </div>
            </div>
        </div> 
    </section> 

    <script src="<?= base_url();?>assets/js/bootstrap.bundle.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="<?= base_url();?>assets/js/owl.carousel.min.js"></script>
    <script src="<?= base_url();?>assets/js/font_resize.js"></script>
    <script src="<?= base_url();?>assets/js/tab.js"></script>
    <script src="<?= base_url();?>assets/js/dark_mode.js"></script> 
    <script>
    </script>
  
</body>

</html>