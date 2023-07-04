<?php
// include('C:\xampp\htdocs\BIS\BIS_repo\application\views\users\language.php');
// include '../Users/language.php';
// require('..\users\language.php');
// $this->load->view('users/language');
require(APPPATH . 'views/users/language.php');
$en_select = '';
$hn_select = '';
$language = '';
if ((isset($_SESSION['language']) && $_SESSION['language'] == 'en') || !isset($_SESSION['language'])) {
    $en_select = 'selected';
    $language = 'en';
} else {
    $hn_select = 'selected';
    $language = 'hn';
}
if (!function_exists('count_visitor')) {
    function count_visitor()
    {
        if (!isset($_SESSION['hasVisited'])) {
            $_SESSION['hasVisited'] = "yes";
            $filecounter = (APPPATH . 'counter.txt');
            $kunjungan = file($filecounter);
            $kunjungan[0]++;
            $file = fopen($filecounter, 'w');
            fputs($file, $kunjungan[0]);
            fclose($file);
            $_SESSION['visiter_counter'] = $kunjungan[0];
            return $_SESSION['visiter_counter'];
        } else {
            $filecounter = (APPPATH . 'counter.txt');
            $kunjungan = file($filecounter);
            $_SESSION['visiter_counter'] = $kunjungan[0];
            return $_SESSION['visiter_counter'];
        }
    }
    count_visitor();
}

?>
<style class="">
    a.dropdown-item:hover {
        background: none;
    }

    i.fa.fa-chevron-down {
        padding-top: 20px;
        margin-left: 9px;
    }
</style>
<footer>
    <div class="main_footer">
        <div class="triangle"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-9 p-3">
                    <div class="row">
                        <div class="col-sm-6 col-lg-6 footer_text">
                            <!-- <div class="dropdown">
                                <a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false" style="color: white;">Accessibility & Help</a>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink" style="background: none; border: 0px solid rgba(0,0,0,.15); color:white;">
                                        <li><a class="dropdown-item" href="<?php echo base_url(); ?>users/feedback_form" style="color: white;">Feedback</a></li>
                                        <li><a class="dropdown-item" href="#" style="color: white;">Help</a></li>
                                        <li><a class="dropdown-item" href="#" style="color: white;">Sitemap</a></li>
                                         <li><a href="#">Accessibility</a></li>
                                    </ul>
                            </div> -->
                            <div class="d-flex">
                                <h4 id="helf_toggle" style="cursor: pointer;"><?php echo $footer_content[$language]['0'] ?></h4>
                                <i class="fa fa-chevron-down" aria-hidden="true"></i>
                            </div>
                            <ul id="toggle_show" style="display:none;">
                                <li><a href="<?php echo base_url(); ?>users/feedback_form"><?php echo $footer_content[$language]['1'] ?></a></li>
                                <li><a href="<?php echo base_url(); ?>users/help"><?php echo $footer_content[$language]['2'] ?></a></li>
                                <li><a href="<?php echo base_url(); ?>users/sitemap"><?php echo $footer_content[$language]['3'] ?></a></li>
                                <!-- <li><a href="#">Accessibility</a></li> -->
                            </ul>
                        </div>
                        <div class="col-sm-6 col-lg-6 footer_text">
                            <!-- <div class="dropdown col-lg-12 footer_text">
                                <a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false" style="color: white;">Legal</a>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink" style="background: none; border: 0px solid rgba(0,0,0,.15); color:white;" data-popper-placement="bottom-start">
                                            <li><a class="dropdown-item" href="<?php echo base_url(); ?>users/terms_condition">Terms & Conditions</a>
                                            </li>
                                            <li><a class="dropdown-item" href="<?php echo base_url(); ?>users/privacy_policy">Privacy Policy</a></li>
                                            <li><a class="dropdown-item" href="<?php echo base_url(); ?>users/hyperlinking_policy">Hyper Linking
                                                    Policy</a></li>
                                            <li><a class="dropdown-item" href="<?php echo base_url(); ?>users/disclaimer">Disclaimer</a></li>
                                            <li><a class="dropdown-item" href="<?php echo base_url(); ?>users/copyright">Copyright Policy</a></li>
                                            <li><a class="dropdown-item" href="<?php echo base_url(); ?>users/cmap">Website Content Contribution,
                                                    Moderation & Approval Policy (CMAP)</a></li>
                                            <li><a class="dropdown-item" href="<?php echo base_url(); ?>users/cap">Content Archival Policy (CAP)</a>
                                            </li>
                                            <li><a class="dropdown-item" href="<?php echo base_url(); ?>users/content_review_policy">Content Review Policy (CRP)</a></li>
                                    </ul>
                            </div> -->
                            <div class="d-flex">
                                <h4 id="legal_toggle" style="cursor: pointer;"><?php echo $footer_content[$language]['4'] ?></h4>
                                <i class="fa fa-chevron-down" aria-hidden="true"></i>
                            </div>
                            <div class="col-lg-12 footer_text">
                                <ul id="legal_show" style="display:none;">
                                    <li><a href="<?php echo base_url(); ?>users/terms_condition"><?php echo $footer_content[$language]['5'] ?></a>
                                    </li>
                                    <li><a href="<?php echo base_url(); ?>users/privacy_policy"><?php echo $footer_content[$language]['6'] ?></a></li>
                                    <li><a href="<?php echo base_url(); ?>users/hyperlinking_policy"><?php echo $footer_content[$language]['7'] ?></a></li>
                                    <li><a href="<?php echo base_url(); ?>users/disclaimer"><?php echo $footer_content[$language]['8'] ?></a></li>
                                    <li><a href="<?php echo base_url(); ?>users/copyright"><?php echo $footer_content[$language]['9'] ?></a></li>
                                    <li><a href="<?php echo base_url(); ?>users/cmap"><?php echo $footer_content[$language]['10'] ?></a></li>
                                    <li><a href="<?php echo base_url(); ?>users/cap"><?php echo $footer_content[$language]['11'] ?></a>
                                    </li>
                                    <li><a href="<?php echo base_url(); ?>users/content_review_policy"><?php echo $footer_content[$language]['12'] ?></a></li>

                                </ul>
                            </div>
                        </div>
                        <!-- <div class="col-sm-4 col-lg-4 footer_text">
                            <h4>Other Links</h4>
                            <div class="col-lg-12 footer_text">
                                <ul>
                                    
                                    <li><a href="<?php echo base_url(); ?>users/about_exchange_forum">About Exchange
                                            Forum</a></li>
                                    <li><a href="https://www.services.bis.gov.in/php/BIS_2.0/bisconnect/knowyourstandards/indian_standards/isdetails" onclick="know_pop()" target="blank">Know your Standards</a></li>

                                </ul>
                            </div>
                        </div> -->
                    </div>
                </div>
                <div class="col-md-3 p-3">
                    <div class="row">
                        <div class="col-sm-12 col-lg-12 footer_text">
                            <div class="block-menu">
                                <h4><?php echo $footer_content[$language]['13'] ?></h4>
                                <ul class="usefull-links">

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="col-md-12">
                    <div class="social-content">
                        <h4>Follow us</h4>
                       
                    </div>

                </div> -->
            <div class="row">
                <div class="col-2">
                    <h4><?php echo $footer_content[$language]['14'] ?></h4>
                </div>
                <div class="social-content col-4 followus_123">


                </div>

            </div>

            <div class="row">
                <div class="col-md-12" style="text-align: center;">
                    <hr>
                    <p>Copyright <i class="fa fa-copyright" aria-hidden="true"></i> 2023 - Bureau of Indian Standards.
                        All rights reserved</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12" style="text-align: center;">
                    <div class="visitfooter"><span class="visit_count">Total Visitors : <?php echo $_SESSION['visiter_counter']; ?></span></div>
                </div>
                <!-- <div class="col-md-6">
                            <div class="visitfooter"><span class="visit_count">Today's Visits : 1000</span></div>                                                             
                    </div> -->
            </div>
        </div>
    </div>
    </div>
</footer>



<script src="<?php echo base_url(); ?>assets/js/bootstrap.bundle.js"></script>

<!-- <script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js"></script> -->
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/owl.carousel.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/font_resize.js"></script>
<script src="<?php echo base_url(); ?>assets/js/dark_mode.js"></script>
<!-- <script type="text/javascript">
   function preventBack(){
    window.history.forward();
   }
   setTimeout("preventBack()",0);
   window.onunload =function(){null};
</script> -->
<!-- <script type="text/javascript">
      history.pushState({ page: 0 }, "Title 1", "#no-back");
window.onhashchange = function (event) {
  window.location.hash = "no-back";
};
 </script> -->




<!-- <script type = "text/javascript">  
    window.onload = function () {  
        document.onkeydown = function (e) {  
            return (e.which || e.keyCode) != 116;  
        };  
    }  
</script>  -->

<script>
    $('body').bind('copy paste cut drag drop', function(e) {
        e.preventDefault();
    });
    var message = "This function is not allowed here";

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

    // code for preventing from back

    history.pushState(null, null, window.location.href);

    history.back();

    window.onpopstate = () => history.forward();

    // code for preventing from refresh
    function disableF5(e) {
        if ((e.which || e.keyCode) == 116) e.preventDefault();
    };
    $(document).ready(function() {

        $(document).on("keydown", disableF5);

    });
</script>
<script>
    document.onmousedown = rtclickcheck;
    $(document).ready(function() {
        $("#helf_toggle").click(function() {
            $("#toggle_show").toggle();
        });
        $("#legal_toggle").click(function() {
            $("#legal_show").toggle();
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>
<script>
    $('#carouselExampleControls').owlCarousel({
        loop: true,
        margin: 30,
        dots: true,
        nav: false,
        responsiveClass: true,
        autoplay: true,
        autoPlaySpeed: 1000,
        autoPlayTimeout: 1000,
        autoplayHoverPause: true,
        responsive: {
            0: {
                items: 2,
                //   margin: 10,
                //   stagePadding: 20,
            },
            600: {
                items: 3,
                //   margin: 20,
                //   stagePadding: 50,
            },
            1000: {
                items: 4
            },
            1200: {
                items: 4
            },
            1400: {
                items: 4
            },
            1600: {
                items: 4
            }
        }
    });

    $('.carouselExampleControlswinner').owlCarousel({
        loop: true,
        margin: 30,
        dots: true,
        nav: false,
        responsiveClass: true,
        autoplay: true,
        autoPlaySpeed: 1000,
        autoPlayTimeout: 1000,
        autoplayHoverPause: true,
        responsive: {
            0: {
                items: 2,
                //   margin: 10,
                //   stagePadding: 20,
            },
            600: {
                items: 3,
                //   margin: 20,
                //   stagePadding: 50,
            },
            1000: {
                items: 4
            },
            1200: {
                items: 4
            },
            1400: {
                items: 4
            },
            1600: {
                items: 4
            }
        }
    });


    $('#owl-caraousal_1').owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1000: {
                items: 4
            }
        }
    })
    $('#owl-caraousal_2').owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    });
    $('#owl-caraousal_news').owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    });
    $('#owl-caraousal_3').owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    })
    $('#owl-caraousal_10').owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    })
    $('#owl-caraousal_4').owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    })
    $('#owl-caraousal_6').owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    })
    $('#owl-caraousal_standard').owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        autoplay: true,
        autoplayTimeout: 1000,
        autoplayHoverPause: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    })
    // $('.login_details').hide()
    // jQuery('.show').on('click', function() {
    //     jQuery('.login_details').toggle();
    // });
    $('.after_login_details').hide()
    jQuery('.after_show').on('click', function() {
        jQuery('.after_login_details').toggle();
    });
    $(document).ready(function() {
        $.ajax({
            url: "<?php echo base_url(); ?>admin/useful_links_web/",
            type: "JSON",
            method: "get",
            success: function(result) {
                var res = JSON.parse(result);
                data = res;
                var row = '';

                for (i in data) {
                    // row += '<li><a href="https://'+data[i].link+'" target="_blank" onclick="useful_link()" title="'+data[i].title+'" class="jquery-once" id="'+data[i].id+'"><img src="<?php echo base_url(); ?>uploads/cms/useful_links/'+data[i].image +'" height="100%" width="100%"></a></li>';       
                    row += '<li><button href="https://' + data[i].link + '"  title="' + data[i].title + '" class="jquery-once abc" id="' + data[i].id + '"><img src="<?php echo base_url(); ?>uploads/cms/useful_links/' + data[i].image + '" height="100%" width="100%"></button></li>';
                }

                $(".usefull-links").html(row);
            },
            error: function(res) {
                alert("Error,Useful Links Not Load.");
            }

        });
    });

    $(document).ready(function() {
        $.ajax({
            url: "<?php echo base_url(); ?>admin/followus_links_web/",
            type: "JSON",
            method: "get",
            success: function(result) {
                var res = JSON.parse(result);
                data = res;
                var row = '';

                for (i in data) {


                    row += '<button href="https://' + data[i].link + '"target="_blank" title="' + data[i].title + '"  class="jquery-once-4-processed pqr"><img src="<?php echo base_url(); ?>uploads/cms/followus/' + data[i].icon + '"class="social_image">Twitter</button>';
                }
                $(".social-content").html(row);
            },
            error: function(res) {
                alert("Error,FollowUs Links Not Load.");
            }

        });
    });
</script>
<script>
    function bis_pop() {
        confirm("You are being redirected to an external website. Please note that BIS Website cannot be held responsible for external websites content & privacy policies.");
    }
</script>
<script>
    function follow_pop() {
        var answer = confirm("You are being redirected to an external website. Please note that BIS Website cannot be held responsible for external websites content & privacy policies.");
        // window.open('https://www.services.bis.gov.in/php/BIS_2.0/bisconnect/knowyourstandards/indian_standards/isdetails','_blank');
        if (answer) {
            window.open(uid, '_blank');
        } else {}
    }
    $('.followus_123').delegate('.pqr', 'click', function() {
        uid = $(this).attr('href');
        var answer = confirm("You are being redirected to an external website. Please note that BIS Website cannot be held responsible for external websites content & privacy policies.");
        // window.open('https://www.services.bis.gov.in/php/BIS_2.0/bisconnect/knowyourstandards/indian_standards/isdetails','_blank');
        if (answer) {
            window.open(uid, '_blank');
        } else {}
    })
    $('.usefull-links').delegate('.abc', 'click', function() {
        uid = $(this).attr('href');
        var answer = confirm("You are being redirected to an external website. Please note that BIS Website cannot be held responsible for external websites content & privacy policies.");
        // window.open('https://www.services.bis.gov.in/php/BIS_2.0/bisconnect/knowyourstandards/indian_standards/isdetails','_blank');
        if (answer) {
            window.open(uid, '_blank');
        } else {}
    })
</script>
<script>
    $('#know_pop').click(function() {
        var answer = confirm("You are being redirected to an external website. Please note that BIS Website cannot be held responsible for external websites content & privacy policies.");
        if (answer) {
            window.open('https://www.services.bis.gov.in/php/BIS_2.0/bisconnect/knowyourstandards/indian_standards/isdetails', '_blank');
        } else {}
    })
</script>
<script>
    function useful_link() {
        confirm("You are being redirected to an external website. Please note that BIS Website cannot be held responsible for external websites content & privacy policies.");
    }
</script>
<script>
    <?php
    if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
        $url = "https://";
    else
        $url = "http://";
    // Append the host(domain name, ip) to the URL.   
    $url .= $_SERVER['HTTP_HOST'];
    $url .= $_SERVER['REQUEST_URI'];   ?>

    function set_language() {
        var language = jQuery('#language').val();
        // window.location.href = '?language=' + language;
        $.ajax({
            url: "<?php echo base_url(); ?>users/language_set/"+language,
            // type: "JSON",
            method: "get",
            success: function(result) {
               location.reload(); 
            },
            error: function(res) {
                alert("Error,FollowUs Links Not Load.");
            }

        });
    }

    $(document).ready(function() {
        $(".tab-link").click(function() {
            $('html, body').animate({
                scrollTop: $(".tab-content").offset().top
            }, 0);
        });
    });
</script>
</body>

</html>