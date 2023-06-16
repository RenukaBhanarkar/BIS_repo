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
</style><?php if(!($is_allow==1)){ redirect(base_url() . "users/about_competition/". $quiz_id, 'refresh'); } ?>
<?php
// new code start R
//session_start();
if(!isset($_SESSION['user_session_id'])){ 
    
    
   redirect(base_url() . "Users/login", 'refresh');
}
$start_time = $_SESSION['start_time'] = date('h:i:s'); 

?> 
<div class="container">
<div class="row">
              <div class="col-md-3">
               <div class="static-content">
                  <div class="bloginfo">
                       <h3 style="margin-bottom: 0px;margin-top:20px;color: #0086b2!important;font-weight: 600;">Start Competition</h3>
                   </div>
                   <div class="heading-underline" style="width: 200px;">
                         <div class="left"></div><div class="right"></div>
                   </div>
                </div>
              </div>
               
            </div>
    <div class="your_wall_Outer_Box">
        <div class="inner_wall">
            <div class="row mt-5">
                <div class="col-sm-12">
                    <!-- <h4>Lorem ipsum dolor sit amet, consectetur</h4>competition -->
                    <h4><?php echo $competition['competiton_name']; ?></h4>
                    <div class="your_wall_main_card_view">
                        <div class="yourWall_image">
                            <img src="<?=base_url().$competition['thumbnail'];?>" alt="not found" class="w-100 h-100">
                            
                        </div>
                        <div class="Text-container_view ">
                            <!-- <h6 class="yourWall_title_view ">
                                 Lorem ipsum dolor sit amet, consectetur
                            </h6> -->
                            <div class="Your_Wall_Description_view">
                                 <!-- Safe and high-quality packaging can have a positive impact on consumers by offering protection, health & safety, convenience, environmental benefits. Therefore, investing in safe and high-quality packaging is a must for any business that wants to ensure safety of its customers, protect its products, build its brand. Safe and high-quality packaging can have a positive impact on consumers by offering protection, health & safety, convenience, environmental benefits. Therefore, investing in safe and high-quality packaging is a must for any business that wants to ensure safety of its customers, protect its products, build its brand. Safe and high-quality packaging can have a positive impact on consumers by offering protection, health & safety, convenience, environmental benefits. Therefore, investing in safe and high-quality packaging is a must for any business that wants to ensure safety of its customers, protect its products, build its brand. -->
                            <?php echo $competition['description']; ?>
                            </div>
                            

                        </div>
                        
                    </div>



                </div>
                <!-- <div class="col-sm-3">
                    <div class="right_side">
                        <div class="title_right">
                            <h6>What's New</h6>
                            <div class="banner_image">
                                <img src="<?php echo base_url();?>/assets/images/whats_news.jpg" class="w-100">
                                <p>Photography Competition- Share the unknown spots of Mizoram</p>
                            </div>
                        </div>
                        <div class="title_right mt-3">
                            <h6>Trending</h6>
                            <div class="banner_image_tending">
                                <div class="tranding_outer_box">
                                    <div class="image_tranding">
                                        <img src="<?php echo base_url();?>/assets/images/2.jpg" class="w-100 h-100">
                                    </div>
                                    <div class="text_container_tranding">
                                        <span class="bg-success text-white Btn-do">Do</span>
                                        <a href="#" class="tending_para d-block">Photography Competition- Share the
                                            unknown
                                            spots of
                                            Mizoram</a>
                                    </div>
                                </div>
                                <div class="tranding_outer_box">
                                    <div class="image_tranding">
                                        <img src="<?php echo base_url();?>/assets/images/2.jpg" class="w-100 h-100">
                                    </div>
                                    <div class="text_container_tranding">
                                        <span class="bg-success text-white Btn-do">Do</span>
                                        <a href="#" class="tending_para d-block">Photography Competition- Share the
                                            unknown
                                            spots of
                                            Mizoram</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div> -->

            </div>
        </div>

    </div>
</div>

<div class="container">
        <?php
            if ($this->session->flashdata('MSG')) {
                echo $this->session->flashdata('MSG');
            }
        ?>
        <div id="abcd"><a class="btn btn-primary btn-sm mr-2" style="margin-bottom: 10px;">Start Task</a></div>
                <div class="bg-light-comment p-3">
                    <!-- <div class="Comment_image">
                        <img src="../assets/images/user_image.png">
                    </div> -->
                    
                    <div class="row pqr">
                        <form action="<?php echo base_url().'users/competition_response_record/'; ?>" id="comp_form" name="competition_response" method="post" enctype="multipart/form-data">
                        <div class="col-sm-12">
                                <div class="form-group text_hide" style="text-align:end;">
                                    <textarea class="form-control w-100" rows="1" id="myTextArea" placeholder="Share Your Comments......" name="myTextArea"></textarea>
                                    <input type="hidden" value="<?= $start_time; ?>" name="start_time">
                                    <!-- <div id="the-count">
                                            <span id="current">0</span>
                                            <span id="maximum">/ 5000</span>
                                    </div> -->
                                    <strong>Letter count: <span id="letterCount"></span><span>/5000</span></strong>

                                    <input type="hidden" name="comp_id" value="<?php echo $competition['competitionn_id']; ?>">
                                    
                                </div>
                        </div>
                        
                        <div class="col-sm-6 mt-3">
                            <div class="file-upload-wrapper" data-text="Select your file">
                                <input type="file" class="file-upload-field" name="image" id="image" value="" onchange="loadThumbnail(event)">
                                <!-- <span class="text-danger" id="err_image"></span> -->
                            </div>
                        </div>
                        <div class="button-group  mt-5" style="text-align:end;">
                                        <button onclick="return submitCompetition(event)" type="submit" class="btn btn-success">Submit</button>
                                    </div>
                        
                    </form>
                        
                    </div>
                    
                </div>
</div>
<script src="<?php echo base_url(); ?>assets/js/ckeditor/ckeditor.js"></script>

<!-- <script>
   CKEDITOR.replace('answer1',{
    language:'fr',
    uiCoclor:'#9AB8F3'
   });

</script> -->
<script type="text/javascript">CKEDITOR.replace('myTextArea',{
   height: '300',
   maxlength: '5000'
});
</script>
<script>
    $(document).ready(function(){
$('#abcd').show();
$('.pqr').hide();
$('#abcd').click(function(){
    $('#abcd').hide();
    $('.pqr').show();
})
var editAbstract=CKEDITOR.instances.myTextArea;

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

var loadThumbnail = function(event) {
        // $("#outputConsol").show();
        var fileSize = $('#image')[0].files[0].size;
       var validExtensions = ['jpg', 'jpeg', 'png']; //array of valid extensions
        var fileName = $("#image").val();;
        var fileNameExt = fileName.substr(fileName.lastIndexOf('.') + 1);
        var validExtensions1 = ['pdf']; 
                   
            console.log(fileSize);
        if(fileSize < 20480){
            $('#image').val('');           
           Swal.fire("Image size should be between 20 to 400KB");
        }else if(fileSize > 409600){
            $('#image').val('');           
           Swal.fire("Image size should be between 20 to 400KB");
        }else if($.inArray(fileNameExt, validExtensions) == -1){
            
            if(!($.inArray(fileNameExt, validExtensions1) == -1)){            
            if(fileSize > 500000){
                $('#image').val('');  
                Swal.fire("Document file size should be less than 5MB");
            }else{

            }
        }else{
            $('#image').val('');  
            Swal.fire("Only Image and pdf files allowed");
        }
                     
           
        }

        var outputConsol = document.getElementById('thumbnail_img');
        outputConsol.src = URL.createObjectURL(event.target.files[0]);
        outputConsol.onload = function() {
            URL.revokeObjectURL(outputConsol.src);
        }
    };

function submitCompetition(event){
    event.preventDefault();
var isValid=true;
//    var answer =$('#myTextArea').val();
   var answer = CKEDITOR.instances['myTextArea'].getData();
    if(answer==""){
        Swal.fire("Please enter answer");
        // alert('enter response');
        isValid=false;
    }else if(answer.length > 5000){
        isValid=false;
        Swal.fire("Only 5000 characters allowed");
    }else{
        
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
                        $('#comp_form').submit();
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>