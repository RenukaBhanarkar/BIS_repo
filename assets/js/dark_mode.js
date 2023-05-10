$(document).ready(function() {
    var theam = parseInt(sessionStorage.getItem("theam"));
    if (theam === 1) {
        contrast();
    }
    if (theam === 0) {
        normal();
    }
    if (theam === 2) {
        orange();
    }
    if (theam === 3) {
        green();
    }
});
var theam;

function contrast() {
    $('html *:not(script, style, noscript)').each(function() {
        $("body").css("background-color", "#343434");
        $("section#welcome_text").css("background-color", "#6abcbe");
        $(".content_heading").css("background-color", "#343434");
        $("#bottom_content").css("background-color", "#343434");
        $("#middle_part .news_section .content_heading").css("background-color", "#4abdac");
        $("footer .social_visitor").css("background-color", "#4abdac");
        $("#middle_part .news_section").css("background-color", "#4abdac");
        $(".live_data h6").css("background-color", "#4abdac");
        $(".row.table_data").css("border-color", "#4abdac");
        $("#facility .facility").css("background-color", "#767676");
        $("#important_notice .links").css("background-color", "#767676");
        $(".table_data .col-md-6").css("background-color", "#767676");
        $("#bottom_content .item").css("background-color", "#767676");
        $(".navbar .dropdown-menu").css("background-color", "#767676");
        $(".table_data .col-md-6").css("color", "#dddddd");
        $("ul li").css("color", "#dddddd");
        $("table td").css("color", "#dddddd");
        $("p").css("color", "#dddddd");
        $("a").css("color", "#dddddd");
        $("h1").css("color", "yellow");
        $("h2").css("color", "yellow");
        $("h3").css("color", "yellow");
        $("h4").css("color", "yellow");
        $("h5").css("color", "yellow");
        $("h6").css("color", "yellow");
        $("header .navbar-light .navbar-nav .nav-link").css("color", "white");
        $("header .navbar-light .navbar-nav .nav-link.active").css("color", "yellow");
        $("header .sub_header").css("background-color", "#095169");
        $("footer .main_footer").css("background-color", "#095169");
        $(".content_heading").removeClass("orange");
        $(".content_heading").removeClass("red");
        $(".content_heading").addClass("blue");
        $(".news_section .content_heading").css("color", "#000066");
        $(".news_section .news_div .other p").css("color", "#000066");
        $(".social_visitor .social_links h4").css("color", "#000066");
        $(".social_visitor .numbers h5").css("color", "#000066");
        $("#bottom_content .live_data h6").css("color", "#000066");
        $(".sidebar .tab a.active").css("background-color", "#095169");
        $("table thead").css("background-color", "#095169");
        $("#main_page .contact_info").css("background-color", "#095169");
        $(".btn-submit").css("background-color", "#095169");
        $(".navbar .dropdown-menu .dropdown-item").mouseenter(function() {
            $(this).css("color", "#212529");
        });

        $(".navbar .dropdown-menu .dropdown-item").mouseleave(function() {
            $(this).css("color", "#dddddd");
        });


    });
    sessionStorage.setItem("theam", 1);
}

function normal() {

    $('html *:not(script, style, noscript)').each(function() {
        $("body").css("background-color", "white");
        $("section#welcome_text").css("background-image", "linear-gradient(to right, #004f9e, #941212)");
        $("header .sub_header").css("background-image", "linear-gradient(to right, #004f9e, #941212)");
        $("footer .main_footer").css("background-image", "linear-gradient(to right, #004f9e, #941212)");
        $(".platform").css("color", "#2957a3");
        $("footer .main_footer").css("background-image", "linear-gradient(to right, #004f9e, #941212)");
        
        
         
    });
    sessionStorage.setItem("theam", 0);
}

function orange() {

    $('html *:not(script, style, noscript)').each(function() {

        $("body").css("background-color", "white");
        $("header .sub_header").css("background-image", "linear-gradient(to right, #6600cc 0%, #ff6600 100%)");
         $("section#welcome_text").css("background-image", "linear-gradient(to right, #6600cc 0%, #ff6600 100%)");
         $("section#welcome_text").css("background-image", "linear-gradient(to right, #6600cc 0%, #ff6600 100%)");
         $("footer .main_footer").css("background-image", "linear-gradient(to right, #6600cc 0%, #ff6600 100%)");
         $(".platform").css("color", "#000000");
        
      
    });
    sessionStorage.setItem("theam", 2);
}

function green() {

    $('html *:not(script, style, noscript)').each(function() {

        $("body").css("background-color", "white");
         $("header .sub_header").css("background-image", "none");
         $("header .sub_header").css("background-color", "black");
         $("section#welcome_text").css("background-color", "#8bc34a");
         $("section#welcome_text").css("background-image", "none");
         $("footer .main_footer").css("background-image", "none");
         $("footer .main_footer").css("background-color", "#8bc34a");
         $(".platform").css("color", "#000000");
         
        
        
    });
    sessionStorage.setItem("theam", 3);
}

$('#bright_contrast').click(function() {
    contrast();
});

$('#blue_theme').click(function() {
    normal();
});

$('#orange_theme').click(function() {
    orange();
});

$('#red_theme').click(function() {
    green();
});