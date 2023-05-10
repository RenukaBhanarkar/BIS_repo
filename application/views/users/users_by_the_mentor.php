<style>
.card-winners {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    /* border: 1px solid rgba(0,0,0,.125); */
    box-shadow: rgb(0 0 0 / 35%) 0px 5px 15px;
    border-radius: 0.25rem;
    height: 350px;
    transition: transform 250ms;
}
#last-date{
    /* display: block;
    overflow: hidden; */
    /* height: 80px; */
    /* width: 400px;
    text-overflow: ellipsis;
    white-space: nowrap; */

    display: block;
    height: 71px;
  /* width: 330px; */
  overflow: hidden;
  /* white-space: nowrap; */
  text-overflow: ellipsis;
  padding: 0px;
}
.title{
    display: block;
    overflow: hidden;
  /* white-space: nowrap; */
  text-overflow: ellipsis;
  /* width: 331px; */
    height: 25px;
    overflow: hidden;

}
h5{
    height:20px;
    overflow: hidden;
    display: block;
    text-overflow: ellipsis;
}
.select-wrapper {
    background: url('<?php echo base_url(); ?>/assets/images/plus.png') no-repeat;
    background-size: cover;
    display: block;
    position: absolute;
    width: 76px;
    height: 76px;
    /* padding: 35px; */
    /* margin-left: 111px; */
    /* top: 50%; */
}
.input_box {
    box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
    height: 201px;
    border-radius: 12px;
    position: relative;
    justify-content: center;
    align-items: center;
    display: flex;
}
#image_src2, #image_src3,#image_src4,#image_src5 {
    width: 78px;
    height: 49px;
    opacity: 0;
    filter: alpha(opacity=0);
}
/* .box_img {
    box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
    height: 201px;
    border-radius: 12px;
} */
.img_mentor {
    padding: 8px;
    border-radius: 15px;
    height: 201px;
}
.img {
    border-radius: 8px;
    overflow: hidden;
}
.img-fluid {
    width: 100%;
    /* height: auto; */
    transition: all ease-in-out 0.6s;
    height: 261px;
}
.img-fluid:hover {
    transform: scale(1.2);
}
.details {
    padding: 40px 30px 18px;
    margin: -100px 30px 0 30px;
    transition: all ease-in-out 0.3s;
    background: white;
    position: relative;
    /* background: rgba(var(--color-white-rgb), 0.9); */
    /* text-align: center; */
    border-radius: 8px;
    box-shadow: rgba(0,0,0,0.35) 0px 5px 15px;
}
.icon {
    margin: 0;
    width: 72px;
    height: 72px;
    background: #0ea2bd;
    border-radius: 50px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 20px;
    color: var(--color-white);
    font-size: 28px;
    transition: ease-in-out 0.3s;
    position: absolute;
    top: -36px;
    left: calc(50% - 36px);
    border: 6px solid white;
}
.service-item:hover .details .icon {
    background: white;
    border: 2px solid #0ea2bd;
}
.title_mentor {
    overflow: hidden;
    height: 62px;
    font-weight: 600;
    text-align: center;
}
.des_mentor{
    overflow: hidden;
    height: 94px;
}
</style>
<div id="privacy-content" class="container">
<div class="bloginfo">
                <h3 style="margin-bottom: 0px;margin-top:20px;color: #0086b2!important;font-weight: 600;">By The Mentors</h3>
            </div>
            <div class="heading-underline" style="width: 200px;">
                <div class="left"></div><div class="right"></div>
             </div>
             <div class="row">

         

         


          


          


          

          <?php foreach($by_the_mentor as $list){ ?>
          <div class="col-xl-4 col-md-6 aos-init aos-animate" data-aos="zoom-in" data-aos-delay="200">
            <div class="service-item">
              <div class="img">
                <img src="<?php echo base_url().$list['image'];?>" class="img-fluid" alt="">
              </div>
              <div class="details position-relative">
                <div class="icon">
                  <!-- <i class="bi bi-activity"></i> -->
                  <!-- <i class="fa fa-trophy"></i> -->
                 <img src="<?php echo base_url();?>/assets/images/mentoring.png" alt="" class="" style="width: 36px;"> 
                </div>
                <a href="<?php echo base_url().'users/by_the_mentor_detail/'.$list['id']; ?>" class="stretched-link">
                  <h3 class="title_mentor"><?php echo $list['title'];?></h3>
                </a>
                <div class="des_mentor"><?php echo $list['description'];?></div>
                <hr style="margin:0px;">
                <div class="">Posted By..<b><?php echo $list['user_name']; ?></b></div>
              </div>
              
            </div>
          </div><!-- End Service Item -->
          <?php } ?>


        </div>
    

    
    <?php if((count($by_the_mentor) > 5)){ ?>
    <div class="view-button">
                <a href="<?php echo base_url(); ?>users/all_by_the_mentors">View All</a>
            </div>    
            <?php } ?>
    <div class="col-sx-12 col-sm-12 col-md-12" style="border-left: 3px solid cadetblue; padding: 0px 25px;">
    <div class="bloginfo">
    <?php if($this->session->flashdata()){               
                echo $this->session->flashdata('MSG');
            } ?>
        <?php if(isset($_SESSION['admin_id'])){ ?>
                        <?php if(!($_SESSION['admin_type']=="ZjJYY3VISndBMytwaStIQjhmSkV5QT09")){ ?>
                            <h3 style="margin-bottom: 0px;margin-top:20px;color: #0086b2!important;font-weight: 600;" id="notauthorise">Post Here...</h3>
                    <?php }else{ ?> 
                        <h3 style="margin-bottom: 0px;margin-top:20px;color: #0086b2!important;font-weight: 600;" id="mentorForm_show">Post Here...</h3>
                        <?php } ?>
            <?php }else{?>
                        <a href="<?php echo base_url().'users/login'; ?>">
                        <h3 style="margin-bottom: 0px;margin-top:20px;color: #0086b2!important;font-weight: 600;">Post Here...</h3>
                    
                    </a>
        <?php } ?>
            </div>
            <div class="heading-underline" style="width: 200px;">
                <div class="left"></div><div class="right"></div>
             </div>
        <div class="static-content" id="mentorForm_hide">
           <?php if($this->session->flashdata()){
                echo $this->session->flashdata('MSG');
            } ?>
            <form action="javascript:;" class="" method="post" id="updateform" enctype="multipart/form-data">
            <div class="row">
                  <div class="mb-3 col-md-4">
                          <label class="d-block text-font">Title<sup class="text-danger">*</sup></label>
                              <div class="d-flex">
                                    <input type="text" class="form-control input-font" name="title" id="title" placeholder="Enter Title" placeholder="Enter Title"  minlength="5" maxlength="200">
                              </div>
                              <span style="color:red;" id="err_title"></span>
                  </div>
                  <div class="mb-3 col-md-4">
                          <label class="d-block text-font">Upload Thumbnail<sup class="text-danger">*</sup></label>
                              <div class="">
                                    <input type="file" class="form-control input-font" name="image" id="document2" required accept="image/*">
                                    <span style="color:red;" id="err_image"></span>
                              </div>
                  </div>
                  <div class="mb-3 col-md-4">
                          <label class="d-block text-font">Upload Document</label>
                              <div class="">
                                    <input type="file" class="form-control input-font" name="document" id="upload_pdf" accept="pdf/*">
                                    <span style="color:red;" id="err_doc"></span>
                              </div>
                              
                  </div>
                  <!-- <div class="mb-3 col-md-4">
                          <label class="d-block text-font">Upload Thumbnail for Document</label>
                              <div class="d-flex">
                                    <input type="file" class="form-control input-font" name="thumbnail" id="thumbnail" accept="image/*">
                              </div>
                  </div> -->
                  <div class="mb-3 col-md-12">
                          <label class="d-block text-font">Description<sup class="text-danger">*</sup></label>
                          <textarea class="form-control input-font" name="description" id="description" required minlength="5" maxlength="2000"></textarea>
                              <span style="color:red;"  id="err_description"></span>
                  </div>
                </div>
                <div class="row">
                    <div class="mb-3 col-md-3">
                          <div class="input_box" >
                              <span class="select-wrapper" id="img_2">
                                    <input type="file" class="form-control input-font" name="image2" id="image_src2" required="" accept="image/*" onchange="loadFileThumbnail(event)">
                               </span>
                               <span id="display_img_2" style="display:none;">
                               <img src="" id="outputThumbnail" alt="" class="w-100 img_mentor">
                               </span>
                          </div>
                    </div>
                    <div class="mb-3 col-md-3">
                          <div class="input_box">
                              <span class="select-wrapper" id="img_3">
                                    <input type="file" class="form-control input-font" name="image3" id="image_src3" required="" accept="image/*" onchange="loadFileThumbnail1(event)">
                               </span>
                               <span id="display_img_3" style="display:none;">
                               <img src="" id="outputThumbnail1" alt="" class="w-100 img_mentor">
                               </span>
                          </div>
                    </div>
                    <div class="mb-3 col-md-3">
                          <div class="input_box">
                              <span class="select-wrapper" id="img_4">
                                    <input type="file" class="form-control input-font" name="image4" id="image_src4" required="" accept="image/*" onchange="loadFileThumbnail2(event)">
                               </span>
                               <span id="display_img_4" style="display:none;">
                               <img src="" id="outputThumbnail2" alt="" class="w-100 img_mentor">
                               </span>
                          </div>
                    </div>
                    <div class="mb-3 col-md-3">
                          <div class="input_box">
                              <span class="select-wrapper" id="img_5">
                                    <input type="file" class="form-control input-font" name="image5" id="image_src5" required="" accept="image/*" onchange="loadFileThumbnail3(event)">
                               </span>
                               <span id="display_img_5" style="display:none;">
                               <img src="" id="outputThumbnail3" alt="" class="w-100 img_mentor">
                               </span>
                          </div>
                    </div>
                    
                   
                   
            </div>
                  <div class="mb-3 col-md-12">
                       <div class="mentor_submit">
                          <button onclick="return submitButton(event)" type="submit" class="btn btn-success btn-sm mr-2">Submit</button>
                          <button  type="reset" class="btn btn-warning btn-sm mr-2">Reset</button>
                          <!-- <button  data-bs-toggle="modal" data-bs-target="#sure" type="submit" class="btn btn-primary btn-sm mr-2">Submit</button> -->
                       </div> 
                  </div> 
             </div> 
            </form>
         </div>
    </div>
  </div>

  <div class="modal fade" id="sure" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel" style="color:red;">Warning!</h5>
                    <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to submit?</p>
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                    <button  type="submit" class="btn btn-success sure" data-bs-dismiss="modal">Submit</button>
                </div>
            </div>
        </div>
    </div>

  <div class="modal fade" id="invalidfiletype" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel" style="color:red;">Warning!</h5>
                    <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Only jpg,png,jpeg files accepted.</p>
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                    <button type="button" class="btn btn-primary ok" data-bs-dismiss="modal">Ok</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="lessSize" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel" style="color:red;">Warning!</h5>
                    <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>File size should be 20KB or more</p>
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                    <button type="button" class="btn btn-primary ok" data-bs-dismiss="modal">Ok</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="greaterSize" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel" style="color:red;">Warning!</h5>
                    <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>File size should be less than 200KB </p>
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                    <button type="button" class="btn btn-primary ok" data-bs-dismiss="modal">Ok</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="greaterSize_pdf" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel" style="color:red;">Warning!</h5>
                    <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>File size should be less than 5MB </p>
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                    <button type="button" class="btn btn-primary ok" data-bs-dismiss="modal">Ok</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="invalidfiletype_pdf" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel" style="color:red;">Warning!</h5>
                    <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Only pdf files accepted.</p>
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                    <button type="button" class="btn btn-primary ok" data-bs-dismiss="modal">Ok</button>
                </div>
            </div>
        </div>
    </div>
    <script src="<?php echo base_url();?>assets/js/jquery-3.5.1.js"></script>
    <script>
        
       $(document).ready(function(){
        $('#mentorForm_hide').hide();
   
    }); 
</script>
<script>
        $("#mentorForm_show").click(function(){
        $("#mentorForm_hide").show();
     });
    
</script>
  <script>
  
    $(document).ready(function(){
        $('#title').change('change',function(){
console.log('clicked');
});
    });

    $("#notauthorise").click(function(){
//         $("#notauthorise_alert").modal('show');
        Swal.fire("You are not authorised mentor to post here");
     });
  </script>
  <script type="text/javascript"> 
//   $('#display_img_2').hide();

  var loadFileThumbnail = function(event) 
    {
        var fileSize = $('#image_src2')[0].files[0].size;
       var validExtensions = ['jpg', 'jpeg', 'png']; //array of valid extensions
        var fileName = $("#image_src2").val();;
        var fileNameExt = fileName.substr(fileName.lastIndexOf('.') + 1);
                   
            console.log(fileSize);
        if(fileSize < 20000){
            $('#image_src2').val('');
            $('#lessSize').modal('show');
        }else if(fileSize > 200000){
            $('#image_src2').val('');
            $('#greaterSize').modal('show');
        }else if($.inArray(fileNameExt, validExtensions) == -1){
            $('#image_src2').val('');
            $('#invalidfiletype').modal('show');
        }
       //  $("#Previewimg").show();
        var outputThumbnail = document.getElementById('outputThumbnail');
        
        outputThumbnail.src = URL.createObjectURL(event.target.files[0]);
        console.log(outputThumbnail.src);
        outputThumbnail.onload = function()
        {
            URL.revokeObjectURL(outputThumbnail.src);
        }
        $('#display_img_2').show();
        $('#img_2').hide();
    };

    var loadFileThumbnail1 = function(event) 
    {

        var fileSize = $('#image_src3')[0].files[0].size;
       var validExtensions = ['jpg', 'jpeg', 'png']; //array of valid extensions
        var fileName = $("#image_src3").val();;
        var fileNameExt = fileName.substr(fileName.lastIndexOf('.') + 1);
                   
            console.log(fileSize);
        if(fileSize < 20000){
            $('#image_src3').val('');
            $('#lessSize').modal('show');
        }else if(fileSize > 200000){
            $('#image_src3').val('');
            $('#greaterSize').modal('show');
        }else if($.inArray(fileNameExt, validExtensions) == -1){
            $('#image_src3').val('');
            $('#invalidfiletype').modal('show');
        }

       //  $("#Previewimg").show();
        var outputThumbnail1 = document.getElementById('outputThumbnail1');
        
        outputThumbnail1.src = URL.createObjectURL(event.target.files[0]);
        console.log(outputThumbnail.src);
        outputThumbnail1.onload = function()
        {
            URL.revokeObjectURL(outputThumbnail1.src);
        }
        $('#display_img_3').show();
        $('#img_3').hide();
    };

    var loadFileThumbnail2 = function(event) 
    {

        var fileSize = $('#image_src4')[0].files[0].size;
       var validExtensions = ['jpg', 'jpeg', 'png']; //array of valid extensions
        var fileName = $("#image_src4").val();;
        var fileNameExt = fileName.substr(fileName.lastIndexOf('.') + 1);
                   
            console.log(fileSize);
        if(fileSize < 20000){
            $('#image_src4').val('');
            $('#lessSize').modal('show');
        }else if(fileSize > 200000){
            $('#image_src4').val('');
            $('#greaterSize').modal('show');
        }else if($.inArray(fileNameExt, validExtensions) == -1){
            $('#image_src4').val('');
            $('#invalidfiletype').modal('show');
        }

       //  $("#Previewimg").show();
        var outputThumbnail2 = document.getElementById('outputThumbnail2');
        
        outputThumbnail2.src = URL.createObjectURL(event.target.files[0]);
        console.log(outputThumbnail.src);
        outputThumbnail2.onload = function()
        {
            URL.revokeObjectURL(outputThumbnail2.src);
        }
        $('#display_img_4').show();
        $('#img_4').hide();
    };

    var loadFileThumbnail3 = function(event) 
    {

        var fileSize = $('#image_src5')[0].files[0].size;
       var validExtensions = ['jpg', 'jpeg', 'png']; //array of valid extensions
        var fileName = $("#image_src5").val();;
        var fileNameExt = fileName.substr(fileName.lastIndexOf('.') + 1);
                   
            console.log(fileSize);
        if(fileSize < 20000){
            $('#image_src5').val('');
            $('#lessSize').modal('show');
        }else if(fileSize > 200000){
            $('#image_src5').val('');
            $('#greaterSize').modal('show');
        }else if($.inArray(fileNameExt, validExtensions) == -1){
            $('#image_src5').val('');
            $('#invalidfiletype').modal('show');
        }


       //  $("#Previewimg").show();
        var outputThumbnail3 = document.getElementById('outputThumbnail3');
        
        outputThumbnail3.src = URL.createObjectURL(event.target.files[0]);
        console.log(outputThumbnail.src);
        outputThumbnail3.onload = function()
        {
            URL.revokeObjectURL(outputThumbnail3.src);
        }
        $('#display_img_5').show();
        $('#img_5').hide();
    };





  function sure(){
    $('.sure').modal('show');

  }
  function submitButton(event) {
    event.preventDefault();
             var title = $("#title").val();
             var document = $("#document").val();
            //  var description= $("#description").val();
             var description = CKEDITOR.instances['description'].getData(); 
             var is_valid = true;
                        // console.log(description.length)
             if (title == "") {
                 $("#err_title").text("This value is required");
                 $("#title").focus();
                 is_valid = false;
             
             } else if (!(title.length > 4)) {
                 $("#err_title").text("Please Enter minimum 5 Characters");
                 $("#title").focus();
                 is_valid = false;
             } else {
                 $("#err_title").text("");
             }

             if (description== "") {
                 $("#err_description").text("This value is required");
                 $("#link1").focus();
                 is_valid = false;
             } else if (description.length < 10 ) {
                 $("#err_description").text("Description should be 10 to 2000 characters");
                 $("#description").focus();
                 is_valid = false;
             } else if (description.length > 2000 ){
                // return false;
                console.log(description.length)
                // alert("character length excedded")
                Swal.fire('Description suould lessthan 2000 characters')
                
                $("#err_description").text("Description should be 5 to 2000 characters");
                 $("#description").focus();
                is_valid = false;
                  return false;
             }else {
                 $("#err_description").text("");

             }     
             
             



             if ($("#document2").val() != '') {
                   var fileSize = $('#document2')[0].files[0].size;

                   if (fileSize > 200000) {
                       var is_valid = false;
                       $('#greaterSize').modal('show');
                       $("#document2").val();
                       if ($("#imgerror3").next(".validation").length == 0) // only add if not added
                       {
                           var is_valid = false;
                           // alert("Please select file size greater than 500 KB");
                           return false;
                           $("#imgerror3").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please select file size less than 200 KB </div>");
                       }
                       var is_valid = false;
                       if (!focusSet) {
                           $("#document2").focus();
                       }
                   } else if(fileSize < 20000){
                       is_valid = false;
                       $("#document2").val();
                       if ($("#imgerror3").next(".validation").length == 0) 
                       {
                       is_valid = false;
                       $('#lessSize').modal('show');
                       //    alert("Please select file size greater than 20 KB");
                       //    $("#imgError1").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please select file size greater than 20 KB </div>");
                       return false;
                       }
                       is_valid = false;
                       if (!focusSet) {
                           $("#document2").focus();
                       }
                   }else{
                       $("#imgerror3").next(".validation").remove(); // remove it
                   }
                   // check type  start 
                   var validExtensions = ['jpg', 'jpeg', 'png']; //array of valid extensions
                   var fileName = $("#document2").val();;
                   var fileNameExt = fileName.substr(fileName.lastIndexOf('.') + 1);
                   if ($.inArray(fileNameExt, validExtensions) == -1) {
                       $('#document2').val('');
                       // alert("Invalid file type");
                       $('#invalidfiletype').modal('show');
                       var  is_valid = false;
                       if ($("#imgerror3").next(".validation").length == 0) // only add if not added
                       {
                           $("#err_image").text('Please upload .jpg / .jpeg/.png image ');
                           // $("#imgError1").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please upload .jpg / .jpeg/.png image </div>");
                       }
                       allFields = false;
                       if (!focusSet) {
                           $("#document2").focus();
                       }
                    //    return false;
                   } else {
                    // return true;
                       is_valid = true;
                       $("#imgerror3").next(".validation").remove(); // remove it
                   }
               }else{
                   $("#err_image").text('This value is required');
                   $("#document2").focus();
                   return false;
               }




        //        if (is_valid) {
        //        return true;
        //    } else {
        //        return false;
        //    }








        if ($("#upload_pdf").val() != '') {
                   var fileSize = $('#upload_pdf')[0].files[0].size;

                   if (fileSize > 5242880) {
                       var is_valid = false;
                       $('#greaterSize_pdf').modal('show');
                       $("#upload_pdf").val();
                       if ($("#imgerror3").next(".validation").length == 0) // only add if not added
                       {
                           var is_valid = false;
                           // alert("Please select file size greater than 500 KB");
                           return false;
                           $("#imgerror3").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please select file size less than 500 KB </div>");
                       }
                       var is_valid = false;
                       if (!focusSet) {
                           $("#upload_pdf").focus();
                       }
                   } else if(fileSize < 1024){
                       is_valid = false;
                       $("#upload_pdf").val();
                       if ($("#imgerror3").next(".validation").length == 0) 
                       {
                       is_valid = false;
                       $('#lessSize').modal('show');
                       //    alert("Please select file size greater than 20 KB");
                       //    $("#imgError1").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please select file size greater than 20 KB </div>");
                       return false;
                       }
                       is_valid = false;
                       if (!focusSet) {
                           $("#upload_pdf").focus();
                       }
                   }else{
                       $("#imgerror3").next(".validation").remove(); // remove it
                   }
                   // check type  start 
                   var validExtensions = ['pdf']; //array of valid extensions
                   var fileName = $("#upload_pdf").val();;
                   var fileNameExt = fileName.substr(fileName.lastIndexOf('.') + 1);
                   if ($.inArray(fileNameExt, validExtensions) == -1) {
                       $('#upload_pdf').val('');
                       // alert("Invalid file type");
                       $('#invalidfiletype_pdf').modal('show');
                       var  is_valid = false;
                       if ($("#imgerror3").next(".validation").length == 0) // only add if not added
                       {
                           $("#err_image").text('Please upload .jpg / .jpeg/.png image ');
                           // $("#imgError1").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please upload .jpg / .jpeg/.png image </div>");
                       }
                       allFields = false;
                       if (!focusSet) {
                           $("#upload_pdf").focus();
                       }
                   } else {
                       is_valid = true;
                       $("#imgerror3").next(".validation").remove(); // remove it
                   }
               }else{
                //    $("#err_image").text('Please select file');
                //    $("#upload_pdf").focus();
               }

























             if (is_valid) { 
                // return false;
                $('#updateform').attr('action','<?php echo base_url().'users/add_btm'?>'); 
                // $('#sure').modal('show');

                Swal.fire({
                            title: 'Do you want to Submit?',
                            showDenyButton: true,
                            showCancelButton: false,
                            confirmButtonText: 'Submit',
                            denyButtonText: `Cancel`,
                            }).then((result) => {
                            /* Read more about isConfirmed, isDenied below */
                            if (result.isConfirmed) {
                                Swal.fire('Saved!', '', 'success')
                                $('#updateform').submit();
                            } else if (result.isDenied) {
                                Swal.fire('Changes are not saved', '', 'info')
                            }
                            })
                
                // $('.sure').on('click',function(e){
                //     e.preventDefault();
                //     $('#updateform').submit();

                // })
                              
                //  return true;
             } else {
                 return false;
             }
         };
</script>

<!-- <script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script> -->
<script src="<?php echo base_url(); ?>assets/js/ckeditor/ckeditor.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
         CKEDITOR.replace( 'description' );
            </script>
