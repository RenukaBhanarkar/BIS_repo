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
</style>
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
                <div class="bg-light-comment p-3" style="background: #b6b2b2;">
                    <!-- <div class="Comment_image">
                        <img src="../assets/images/user_image.png">
                    </div> -->
                    
                    <div class="row">
                        <form action="<?php echo base_url().'users/competition_response_record/'; ?>" id="comp_form" name="competition_response" method="post" enctype="multipart/form-data">
                        <div class="col-sm-12">
                                <div class="form-group ">
                                    <textarea class="form-control w-100" rows="8" id="answer" placeholder="Share Your Comments......" name="answer"></textarea>

                                    <input type="hidden" name="comp_id" value="<?php echo $competition['competitionn_id']; ?>">
                                    
                                </div>
                        </div>
                        
                        <div class="col-sm-6 mt-3">
                            <div class="file-upload-wrapper" data-text="Select your file">
                                <input type="file" class="file-upload-field" name="image" id="image" value="">
                            </div>
                        </div>
                        <div class="button-group  mt-3" style="text-align:end;">
                                        <button onclick="return submitCompetition(event)" type="submit" class="btn btn-success">Save</button>
                                    </div>
                        
                    </form>
                        
                    </div>
                    
                </div>
</div>
<script>
     $(".file-upload-wrapper").hide();
    $(document).ready(function () 
    { 
       
        $("#answer").click(function(){
         $(".file-upload-wrapper").show();
      });


    });
   // $(".file-upload-wrapper").hide();
  //  $("#file_show").click(function(){
 // $(".file-upload-wrapper").show();
//});
function submitCompetition(event){
    event.preventDefault();
var isValid=true;
   var answer =$('#answer').val();
    if(answer==""){
        Swal.fire("Please enter answer");
        // alert('enter response');
        isValid=false;
    }

    if(isValid){
        Swal.fire({
                    title: 'Are you sure you want to Delete?',
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>