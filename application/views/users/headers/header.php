<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="DVBETBF, DVBETBF, Government of NCT of Delhi">
    <meta name="description" content="DVBETBF, DVBETBF, Government of NCT of Delhi">
    <!-- FontAwesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" crossorigin="anonymous" />
    <!-- <link href="<?php echo base_url(); ?>assets/css/jquery.dataTables.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" class="">
    <!-- Bootstrap CSS -->
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="" rel="stylesheet">
    <!-- CSS File -->
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/footer_page.css" rel="stylesheet">
    <!-- OWL carousel CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css" integrity="sha512-OTcub78R3msOCtY3Tc6FzeDJ8N9qvQn1Ph49ou13xgA9VsH9+LRxoFU6EqLhW4+PKRfU+/HReXmSZXHEkpYoOA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="<?php echo base_url();?>assets/js/jquery-3.5.1.js"></script>
    <title>Bureau of indian standard</title>
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/bis_logo.png" type="image/x-icon">
    <style>
        .inner_gallery_box {
            border-radius: 5px;
        }

        .inner_gallery_box img {
            border-radius: 5px;
            object-fit: fill;
        }
        .profile-top {
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 17px;
    background: linear-gradient( 133.16deg, rgba(193, 86, 154, 0.2) 0%, rgba(236, 112, 38, 0.2) 112.68% );
}
.after_login_details ul {
    margin: 0px;
    padding: 0px;
    list-style: none;
}
.after_login_details li {
    border-bottom: 1px solid #e9e9e9;
    cursor: default;
    margin-bottom: 0;
}
.after_login_details ul li a {
    font-size: 12px;
    line-height: 16px;
    color: #333 !important;
    cursor: pointer;
    display: block;
    padding: 11px 15px;
}
.after_login_details ul li a:hover {
    background: #f7f7f7;
}

    </style>
</head>

<body style="overflow-x: hidden;">
    <header>
        <div class="sub_header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block">
                        <div class="contact">
                            <ul>
                                <li><a href="#">हिन्दी</a></li>
                                <li><a href="#" onclick="increaseFontSize();" class="me-2">A+</a><a href="#" onclick="normalFontSize();" class="me-2">A</a> <a href="#" onclick="decreaseFontSize();" class="me-2">A-</a></li>
                                <li>
                                    <a href="#" id="blue_theme"><i class="fa fa-square" aria-hidden="true"></i></i></a>
                                    <a href="#" id="bright_contrast"><i class="fa fa-square" aria-hidden="true"></i></i></a>
                                    <a href="#" id="orange_theme"><i class="fa fa-square" aria-hidden="true"></i></i></a>
                                    <a href="#" id="red_theme"><i class="fa fa-square" aria-hidden="true"></i></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="accessibility">
                            <ul>
                                <li> <span class="mr-2 d-none d-lg-inline text-gray-600 small">BIS -
                                        <?php if (isset($_SESSION['admin_name'])) {
                                            echo encryptids("D", $_SESSION['admin_name']);
                                        } ?>
                                    </span>
                                </li>
                                <?php if (!isset($_SESSION['admin_name'])) { ?>
                                <li><a href="#" class="show"><img src="<?php echo base_url(); ?>assets/images/user.png" style="height:31px;"></a></li>
                                <?php } else{ ?>
                                <li><a href="#" class="after_show"><img src="<?php echo base_url(); ?>assets/images/user.png" style="height:31px;"></a></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="login_details">
            <span>Welcome To Bureau of Indian Standards</span>
            <div class="login-link-wrapper">
                <a href="<?php echo base_url(); ?>users/login" class="ac-login jquery-once-2-processed" title="Login">Login</a>
                <a href="https://www.services.bis.gov.in/php/BIS_2.0/outsider-registration" class="ac-register jquery-once-2-processed" title="Register">Register</a>
            </div>
        </div>
        <div class="after_login_details">
            <div class="profile-top nodtranslate">
                <div class="profile-pic"><img src="https://auth.mygov.in/avatar/20fb3fcb-8a0e-4151-82ae-4df1d6639867" width="86px;"></div>
                <span class="mt-2"><?php echo encryptids("D", $_SESSION['admin_name']); ?></span>
            </div>
		    <ul>
		      <li>
			<a class="capital" title="Edit Profile" data-bs-toggle="modal" data-bs-target="#editProfile">Edit Profile</a>
		      </li>
		      <li>
			<a class="capital" title="My Activity" href="/user/115324241">My Activity</a>
		      </li>
		      <li>
		    	<a class="capital" title="Notifications" href="/notification/list">Notifications</a>
		      </li>
              <li>
		    	<a href="<?php echo base_url(); ?>admin/logout" class="capital" title="Notifications" href="/notification/list">Logout</a>
		      </li>
		      
		    </ul>
	  	  </div>
          <div class="modal fade" id="editProfile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Form</h5>
                                <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span></button>
                            </div>
                            <div class="modal-body">
                                <p>Are you sure you want to Edit?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <input type="submit" name="Submit" class="btn btn-success btn-sm text-white" id="btnsubmit" > 
                            </div>
                        </div>
                    </div>
          </div>
        <div class="menu_header" id="menu_header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <nav class="navbar navbar-expand-lg navbar-light">
                            <div class="container-fluid">
                                <a class="navbar-brand d-flex" href="<?php echo base_url(); ?>">
                                    <img src="<?php echo base_url(); ?>assets/images/logo-strip.png" class="main_logo" alt="BIS logo">
                                </a>
                                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>

                            </div>
                        </nav>
                    </div>

                </div>
            </div>
        </div>
    </header>
    <section id="welcome_text">
        <div>
            <div class="row">
                <nav class="navbar navbar-expand-lg navbar-light navbar_padding">
                    <div>

                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="<?php echo base_url(); ?>" style="color: white;">Home</a>
                                </li>
                                <li class="nav-item">
                                    <!-- <a class="nav-link active" target="_blank" aria-current="page" href="https://www.bis.gov.in/" style="color: white;">BIS</a> -->
                                     <a class="nav-link active" href="https://www.bis.gov.in/" target="_blank" aria-current="page" onclick="bis_pop()" style="color: white;">BIS</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url(); ?>users/about_exchange_forum" style="color: white;">About Exchange Forum</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" target="_blank" href="https://www.services.bis.gov.in/php/BIS_2.0/bisconnect/knowyourstandards/indian_standards/isdetails" onclick="know_pop()" style="color: white;">Know Your Standards</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url(); ?>users/contact_us" style="color: white;">Contact Us</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" target="_blank" href="https://www.bis.gov.in/wp-content/uploads/2023/02/Brochure_NBC_10022023.pdf" style="color: white;">NBC</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" target="_blank" href="https://www.bis.gov.in/wp-content/uploads/2023/03/Brochure_CC_NEC_merged.pdf" style="color: white;">NEC</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" target="_blank" href="https://www.bis.gov.in/standards-national-action-plan-snap-2022/" style="color: white;">SNAP 2022 - 27</a>
                                </li>
                                <li class="nav-item guidance_quest">
                                    <a class="nav-link"  target="_blank" href="https://www.bis.gov.in/wp-content/uploads/2023/03/Brochure_CC_NEC_merged.pdf" style="color: white;">User Manual</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </section>
    <script>
        function bis_pop(){
            alert("You are being redirected to an external website. Please note that BIS Website cannot be held responsible for external websites content & privacy policies.");
        }
    </script>