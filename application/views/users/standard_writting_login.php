<!DOCTYPE html>
<?php
// new code start R
//session_start();
if(!isset($_SESSION['user_session_id']))
{ 
   redirect(base_url() . "Users/login", 'refresh');
}
$start_time = $_SESSION['start_time'] = date('h:i:s'); 
?> 

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
        <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" class=""> -->
        <!-- Bootstrap CSS -->
        <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="" rel="stylesheet">
        <!-- CSS File -->
        <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/css/footer_page.css" rel="stylesheet">
        <!-- OWL carousel CSS -->
        <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css" integrity="sha512-OTcub78R3msOCtY3Tc6FzeDJ8N9qvQn1Ph49ou13xgA9VsH9+LRxoFU6EqLhW4+PKRfU+/HReXmSZXHEkpYoOA==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
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
    <style>
    .your_wall_main_card_view {
    box-shadow: 0px 1px 20px rgb(225 225 225);
    border-radius: 3px;
    -ms-box-shadow: 0px 1px 20px rgb(225 225 225);
    margin-bottom: 36px;
    }
    .yourWall_image {
    height: 331px;
    margin-bottom: 17px;
    position: relative;
    }
    .yourWall_image_view {
    height: 200px;
    margin-bottom: 17px;
    position: relative;
    }
    .Text-container_view {
    padding: 0px 19px 4px;
    text-align: justify;
    min-height: 180px;
    }
    .yourWall_title_view {
    font-weight: 600;
    font-size: 16px;
    color: #000000;
    }
    .Your_Wall_Description_view {
    font-size: 14px;
    color: #424242;
    }
    .Your_Wall_Description_view {
    font-size: 15px;
    color: #424242;
    /* display: -webkit-box; */
    }
    .banner_image {
    border-radius: 4px;
    }
    .banner_image img {
    border-radius: 4px;
    }
    .title_right h6 {
    font-size: 17px;
    color: #bb1212;
    font-weight: 600;
    }
    .banner_image p {
    font-size: 15px;
    margin-top: 10px;
    font-weight: 600;
    }
    .tranding_outer_box {
    display: flex;
    flex-wrap: wrap;
    margin-bottom: 11px;
    }
    .image_tranding {
    width: 26%;
    height: 62px;
    }
    .text_container_tranding {
    width: 74%;
    line-height: 20px;
    padding: 0px 14px;
    }
    .Btn-do {
    font-size: 12px;
    padding: 3px 4px;
    border-radius: 5px;
    }
    .tending_para {
    padding: 2px 0px 0px;
    font-size: 13px;
    font-weight: 600;
    display: -webkit-box;
    max-width: 100%;
    height: 40px;
    -webkit-line-clamp: 2;
    overflow: hidden;
    -webkit-box-orient: vertical;
    }
    .filter-content {
    background: #dedede;
    padding: 15px 14px;
    width: 100%;
    display: -webkit-box;
    display: -ms-flexbox;
    /* display: flex; */
    -webkit-box-pack: justify;
    -ms-flex-pack: justify;
    justify-content: space-between
    }
    .filter_label {
    margin-left: 9px;
    color: #1d3a7c;
    }
    .sector_label {
    color: #1d1d1d;
    font-size: 13px;
    font-weight: 400;
    margin-left: 7px;
    }
    .filter-button{
    border-radius: 10px;
    width: 108px;
    margin-left: 10px;
    font-size: 14px;
    
    }
    .rounded-pill {
    border-radius: 50rem!important;
    height: 30px;
    }
    .input-group {
    position: relative;
    display: flex;
    flex-wrap: wrap;
    align-items: stretch;
    width: 28%;
    }
    .file-upload-wrapper input {
    /* opacity: 0; */
    position: absolute;
    top: 5px;
    right: 0;
    bottom: 0;
    left: 14px;
    z-index: 99;
    height: 40px;
    margin: 0;
    padding: 0;
    display: block;
    cursor: pointer;
    width: 100%;
    }
    #the-count {
    float: right;
    padding: 0.1rem 0 0 0;
    font-size: 0.875rem;
    }
    </style>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="static-content">
                    <div class="bloginfo">
                        <h3 style="margin-bottom: 0px;margin-top:20px;color: #0086b2!important;font-weight: 600;">Standard Writting Competition</h3>
                    </div>
                    <div class="heading-underline" style="width: 200px;">
                        <div class="left"></div><div class="right"></div>
                    </div>
                </div>
            </div>
            
        </div>
        
    </div>
    <div class="container">
        <div class="row">
            <!-- <div class="standard_name"> -->
            <div class="col-md-9">
                <h4 style="color: darkblue;"><?=$getData['title']?></h4>
            </div>
            <div class="col-md-3">
                <img src="<?php echo base_url(); ?>assets/images/user_1.png" style="height:31px;"><span style="margin-left: 10px;"><?= encryptids("D", $_SESSION['admin_name'])?></span><br>
                Time left : <span class="timer" style="background-color: green; border-radius: 4px;"> <span class="countdown" style="padding: 10px; color: white;"></span></span>
                
            </div>
            <div class="time-left">
                                
                            </div>
            <!-- </div> -->
        </div>
        <div class="bg-light p-3">
            
        

                 <form name="standard_writting_login" id="standard_writting_login" action="<?php echo base_url() . 'users/standard_writting_login/'?><?=$getData['id']?>" method="post" enctype="multipart/form-data" class="row g-3 needs-validation" novalidate indian>
                <input type="hidden" name="comp_id" id="comp_id" value="<?=$getData['id']?>">
                <div class="row">
                    <input type="hidden" value="<?= $start_time; ?>" name="start_time">

                    <div class="mb-2 col-sm-12">
                        <div class="form-group" id="yourWall_des"><br>
                            <label class="d-block text-font">Select Answer Type<sup class="text-danger">*</sup></label><br>
                            <input type="radio"  name="uploadtype" value="1" checked>
                             <label for="textupload">Text Upload</label><br>
                             <input type="radio" name="uploadtype" value="2">
                             <label for="fileupload">File Upload</label><br>
                         </div>
                    </div>
                     
                    <div class="mb-2 col-sm-12" id="textupload">
                        <div class="form-group" id="yourWall_des"><br>
                            <label class="d-block text-font">Enter Details<sup class="text-danger">*</sup></label><br>
                            <textarea class="form-control  w-100"  placeholder="" name="details" id="details"></textarea required>
                            <div class="invalid-feedback">
                                This value is Required.
                            </div>
                        </div>
                    </div>

                    <div class="mb-2 col-sm-12" id="fileupload">
                        <div class="form-group" id="yourWall_des"><br>
                            <label class="d-block text-font">Select File<sup class="text-danger">*</sup></label><br>
                            <input type="file" name="file" id="file" accept="application/pdf, image/jpg,image/jpeg,image/png" class="file-control" onchange="loadVideo(event)">
                        </div>
                    </div>

                    
                    
                </div>
                <div class="col-md-12 row">
                    <div class="button-group float-end mt-3" style="text-align: end;">
                        <a class="btn btn-success submit btnbtn" onclick="submitCompetition()">Submit</a>
                        
                        <a class="btn btn-danger btnbtn" onclick="cancle()" >Cancel</a> 
                    <!-- <a href="<?= base_url()?>"  class="btn btn-danger">Back</a> -->
                 
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.bundle.js"></script>
    <!-- <script src="<?php echo base_url();?>assets/js/jquery.dataTables.min.js"></script> -->
    <!-- <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/owl.carousel.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/font_resize.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/dark_mode.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="<?php echo base_url(); ?>assets/js/ckeditor/ckeditor.js"></script>
    <script>
    CKEDITOR.replace('details'); 
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function () {
    'use strict'
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.querySelectorAll('.needs-validation')
    // Loop over them and prevent submission
    Array.prototype.slice.call(forms)
    .forEach(function (form) {
    form.addEventListener('submit', function (event) {
    if (!form.checkValidity()) {
    event.preventDefault()
    event.stopPropagation()
    }
    form.classList.add('was-validated')
    }, false)
    })
    })()
    </script> 


    <script type="text/javascript">CKEDITOR.replace('details',{
   height: '300',
   maxlength: '5000'
});
</script>
<script> 
    $(document).ready(function(){

        // $("#textupload").hide();
        $("#fileupload").hide(); 
$('#abcd').show();
$('.pqr').hide();
$('#abcd').click(function(){
    $('#abcd').hide();
    $('.pqr').show();
})
var editAbstract=CKEDITOR.instances.details;

editAbstract.on("key",function(e) {      
                        
   var maxLength=e.editor.config.maxlength;
      
   e.editor.document.on("keyup",function() {KeyUp(e.editor,maxLength,"letterCount");});
   e.editor.document.on("paste",function() {KeyUp(e.editor,maxLength,"letterCount");});
   e.editor.document.on("blur",function() {KeyUp(e.editor,maxLength,"letterCount");});
},editAbstract.element.$);

//function to handle the count check
function KeyUp(editorID,maxLimit,infoID) {

   //If you want it to count all html code then just remove everything from and after '.replace...'
   var text=editorID.getData().replace(/<("[^"]*"|'[^']*'|[^'">])*>/gi, '').replace(/^\s+|\s+$/g, '');
   $("#"+infoID).text(text.length);

   if(text.length>maxLimit) {   
      Swal.fire("You cannot have more than "+maxLimit+" characters");         
      editorID.setData(text.substr(0,maxLimit));
      editor.cancel();
   } else if (text.length==maxLimit-1) {
      alert("WARNING:\nYou are one character away from your limit.\nIf you continue you could lose any formatting");
      editor.cancel();
   }
}   

});
    // $(".file-upload-wrapper").hide();  
    $(document).ready(function () 
    { 
       
        $("#text_hide").click(function(){
         $(".file-upload-wrapper").show();
      });


    });
   // $(".file-upload-wrapper").hide();
  //  $("#file_show").click(function(){
 // $(".file-upload-wrapper").show();
//});
function submitCompetition(){
    
var isValid=true;
//    var answer =$('#details').val();
   var answer = CKEDITOR.instances['details'].getData();
   var file = $("#file").val();
   var uploadtype = $('input[name="uploadtype"]:checked').val(); 

   if (uploadtype==1) {
    if(answer==""){
        Swal.fire("Please enter answer");
        // alert('enter response');
        isValid=false;
    }else if(answer.length > 5000){
        isValid=false;
        Swal.fire("Only 5000 characters allowed");
    }else{
        
    }
    }
    if (uploadtype==2) 
    {
        if(file==""){
        Swal.fire("Please select file");
        // alert('enter response');
        isValid=false;
    }else if(file.length > 5000){
        isValid=false;
        Swal.fire("Only 5000 characters allowed");
    }else{
        
    }

    }

    if(isValid){
        Swal.fire({
                    title: 'Are you sure you want to Submit?',
                    showDenyButton: true,
                    showCancelButton: false,
                    confirmButtonText: 'Submit',
                    denyButtonText: `Cancel`,
                    }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {                       
                        $('#standard_writting_login').submit();
                       // Swal.fire('Saved!', '', 'success')                                
                    } else if (result.isDenied) {
                        // Swal.fire('Changes are not saved', '', 'info')
                    }
                    })
        // alert('kjh');
       
        return true;
    }
}
</script>
<script type="text/javascript">
function cancle() {


      Swal.fire({
                    title: 'Are you sure you want to Cancle?',
                    showDenyButton: true,
                    showCancelButton: false,
                    confirmButtonText: 'Cancle',
                    denyButtonText: `No`,
                    }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) 
                    { 
                        // window.location.href = "standard_writting_details";
                        window.history.back()

                    } 
                    else if (result.isDenied) {
                        // Swal.fire('Changes are not saved', '', 'info')
                    }
                    })
}
</script>
<script>
    $('textarea').keyup(function() {
    
    var characterCount = $(this).val().length,
        current = $('#current'),
        maximum = $('#maximum'),
        theCount = $('#the-count');
      
    current.text(characterCount);
   
    
    /*This isn't entirely necessary, just playin around*/
    if (characterCount < 70) {
      current.css('color', '#666');
    }
    if (characterCount > 70 && characterCount < 90) {
      current.css('color', '#6d5555');
    }
    if (characterCount > 90 && characterCount < 100) {
      current.css('color', '#793535');
    }
    if (characterCount > 100 && characterCount < 120) {
      current.css('color', '#841c1c');
    }
    if (characterCount > 120 && characterCount < 139) {
      current.css('color', '#8f0001');
    }
    
    if (characterCount >= 140) {
      maximum.css('color', '#8f0001');
      current.css('color', '#8f0001');
      theCount.css('font-weight','bold');
    } else {
      maximum.css('color','#666');
      theCount.css('font-weight','normal');
    }
    
        
  });
</script>
<script type="text/javascript">

        var timer2 = "<?=$getData['duration']?>:00";
        var interval = setInterval(function() {


            var timer = timer2.split(':');
            //by parsing integer, I avoid all extra string processing
            var minutes = parseInt(timer[0], 10);
            var seconds = parseInt(timer[1], 10);
            --seconds;
            minutes = (seconds < 0) ? --minutes : minutes;
            if (minutes < 0) clearInterval(interval);
            seconds = (seconds < 0) ? 59 : seconds;
            seconds = (seconds < 10) ? '0' + seconds : seconds;
            //minutes = (minutes < 10) ?  minutes : minutes;
            $('.countdown').html(minutes + ':' + seconds);
            timer2 = minutes + ':' + seconds;
            if (timer2 == '0:00') { 
                $('#standard_writting_login').submit();
            }
        }, 1000);
</script>

<script type="text/javascript">
        $('input:radio[name="uploadtype"]').change(
            function(){
                if (this.checked && this.value == '1') 
                {
                    $("#textupload").show(); 
                    $("#fileupload").hide(); 
                    $(".btnbtn").show();
                }
                if (this.checked && this.value == '2') 
                {
                    $("#textupload").hide(); 
                    $("#fileupload").show();
                    $(".btnbtn").show();
                }
    });
    </script>

    <script>
        var loadVideo = function(event) { 
    var fileSize = $('#file')[0].files[0].size;
    var validExtensions = ['PDF','pdf','JPG','jpg','JPEG','jpeg','PNG','png']; //array of valid extensions
    var fileName = $("#file").val();;
    var fileNameExt = fileName.substr(fileName.lastIndexOf('.') + 1);
    
    console.log(fileSize);
    if(fileSize < 0){
    $('#file').val('');
    Swal.fire('File size up to 5MB')
    }else if(fileSize > 335544320){
    $('#file').val('');
    Swal.fire('File size should be between 5MB to 40MB')
    //   $('#err_icon_file').text('This value is required');
    }else if($.inArray(fileNameExt, validExtensions) == -1){
    $('#file').val('');
    Swal.fire('Only PDF and Images allowed')
    $('#err_icon_file').text('This value is required');
    }else{
    $('#err_icon_file').text('');
    }
    var loadThumbnail = document.getElementById('outputvideo');
    loadThumbnail.src = URL.createObjectURL(event.target.files[0]);
    loadThumbnail.onload = function() {
    URL.revokeObjectURL(loadThumbnail.src);
    }
    };
    </script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>