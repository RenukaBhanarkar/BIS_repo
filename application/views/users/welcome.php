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
    .avatar-upload {
  position: relative;
  max-width: 205px;
  margin: 22px;
}
.avatar-upload .avatar-edit {
  position: absolute;
  right: 12px;
  z-index: 1;
  top: 139px;
}
.avatar-upload .avatar-edit input {
  display: none;
}
.avatar-upload .avatar-edit input + label {
  display: inline-block;
  width: 34px;
  height: 34px;
  margin-bottom: 0;
  border-radius: 100%;
  background: #FFFFFF;
  border: 1px solid transparent;
  box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
  cursor: pointer;
  font-weight: normal;
  transition: all 0.2s ease-in-out;
  border: 1px solid black;
}
.avatar-upload .avatar-edit input + label:hover {
  background: #f1f1f1;
  border-color: #d6d6d6;
}
.avatar-upload .avatar-edit input + label:after {
  content: "\f040";
  font-family: 'FontAwesome';
  color: #757575;
  position: absolute;
  top: 7px;
  left: 0;
  right: 0;
  text-align: center;
  margin: auto;
}
.avatar-upload .avatar-preview {
  width: 192px;
  height: 192px;
  position: relative;
  border-radius: 100%;
  border: 6px solid #F8F8F8;
  box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
}
.avatar-upload .avatar-preview > div {
  width: 100%;
  height: 100%;
  border-radius: 100%;
  background-size: cover;
  background-repeat: no-repeat;
  background-position: center;
}
    </style>
    <?php
include('C:\xampp\htdocs\BIS\BIS_repo\application\views\users\language.php');
$en_select='';
$hn_select='';
$language=''; 
if((isset($_GET['language']) && $_GET['language']=='en') || !isset($_GET['language'])){
    $en_select='selected';
    $language='en';
}else{
    $hn_select='selected';
    $language='hn';
}
?>
<section>
     <div class="container-fluid">
        <div class="row">
            <div class="exchange_section d-flex">
                <div class="col-md-2">
                    <div class="bis_logo">
                       <img src="<?php echo base_url(); ?>assets/images/bis_logo.png" class="opacity_img"> 
                    </div>
                    
                 </div>
         <div class="col-md-8" id="Forum">
                 <div class="bis_welcome">
                     <a href="">
                         <h2><?php echo $welcome_text[$language]['0'] ?></h2>
                     </a>
                 </div>
                <div class="platform">
                         <h4>(<?php echo $welcome_text[$language]['1'] ?>)</h4>
                 </div>
             </div>
        <div class="col-md-2">
                 <div class="bis_logo">
                       <img src="<?php echo base_url(); ?>assets/images/bis_logo.png" class="opacity_img"> 
                  </div>
                 </div>
              </div>
            </div>
        </div>
    </section>
    <section id="bottom_content">
        <div class="container">
            <div class="row">
               <div class="live_data">
                        <!-- <h6>Live Data</h6> -->
                        <div class="row table_data ">
                            
                            <div class="innerBox" style="background-image: url(<?php echo base_url();?>assets/images/standard_club.jpeg); padding: 0px; margin: 0px; background-repeat: round;">
                            <div style="background:#00000099;">
                                <a href="<?=base_url();?>users/standard">
                                <div class="LiveDataBox" style="height: 182px; overflow: hidden;" >
                                     <!-- <img src="<?=base_url();?>assets/images/compliant.png" class="livedata_icons"> -->
                                      <h3 class="text_standard"><?php echo $welcome_text[$language]['2'] ?></h3>
                                     <p class="mb-0">(<?php echo $welcome_text[$language]['3'] ?>)</p>
                                </div>
                                </a>
                                </div>
                            </div>
                            <div class="innerBox" id="wos" style="background-image: url(<?php echo base_url();?>assets/images/world_standard.jpeg); padding: 0px; margin: 0px; background-repeat: round;">
                            <div style="background:#00000099;">
                                <a href="<?=base_url();?>users/quality_index">
                                  <div class="LiveDataBox" style="height: 182px; overflow: hidden;">
                                      <!-- <img src="<?=base_url();?>assets/images/warranty.png" class="livedata_icons"> -->
                                       <h3 class="text_standard"><?php echo $welcome_text[$language]['4'] ?></h3>
                                       <p class="mb-0">(<?php echo $welcome_text[$language]['5'] ?>)</p>
                                 </div>
                                 </a>
                            </div>
                            </div>
                          </div>
                     </div>
                </div>
           </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  
    <script>
        $(document).ready(function(){
            $('#exampleModal').modal('show');
            $('#change_password_skip').click(function(){
                $('#exampleModal_1').modal('show'); 
            });
            // $('#wos').click(function(){
            //     // alert("kjhkl");
            //     Swal.fire("This section is under development. The World of Standards will open up for you soon.");
            //     return false;
            // })
        })
    </script>