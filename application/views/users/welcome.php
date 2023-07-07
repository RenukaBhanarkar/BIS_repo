<link href="<?php echo base_url(); ?>assets/css/welcome.css" rel="stylesheet">
    <?php
// include('C:\xampp\htdocs\BIS\BIS_repo\application\views\users\language.php');
// include 'language.php';
// require('language.php');
require(APPPATH.'views/users/language.php');
$en_select='';
$hn_select='';
$language=''; 
if((isset($_SESSION['language']) && $_SESSION['language']=='en') || !isset($_SESSION['language'])){
    $en_select='selected';
    $language='en';
}else{
    $hn_select='selected';
    $language='hn';
}

if(isset($_SESSION['change_password'])){
  if($_SESSION['change_password']==0){ ?>
    <script>
    $(document).ready(function(){

   
    Swal.fire({
      title: 'Do you want to change password?',
      showDenyButton: true,
      showCancelButton: false,
      confirmButtonText: 'Yes',
      denyButtonText: `Skip for now`,
      }).then((result) => {
     
      if (result.isConfirmed) {         
          window.location.replace('https://www.services.bis.gov.in/php/BIS_2.0/change-password');
      } else if (result.isDenied) {
        
          <?php $this->session->unset_userdata('change_password'); ?>
      }
      })  })
      </script><?php
  }
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
        <div class="container-fluid">
            <div class="row">
               <div class="live_data">
                        <!-- <h6>Live Data</h6> -->
                        <div class="row table_data ">
                        <div class="col-sm-6">    
                            <div class="innerBox mb-2" style="background-image: url(<?php echo base_url();?>assets/images/standard_club.jpeg); padding: 0px; margin: 0px; background-repeat: round; width:100%; height: 250px;">
                            <div style="background:#00000099;height: 100%">
                                <a href="<?=base_url();?>users/standard">
                                <div class="LiveDataBox" >
                                     <!-- <img src="<?=base_url();?>assets/images/compliant.png" class="livedata_icons"> -->
                                      <h3 class="text_standard"><?php echo $welcome_text[$language]['2'] ?></h3>
                                     <p class="mb-0">(<?php echo $welcome_text[$language]['3'] ?>)</p>
                                </div>
                                </a>
                                </div>
                            </div>
                            </div>
                            <div class="col-sm-6">    
                            
                            <div class="innerBox mb-2" id="wos" style="background-image: url(<?php echo base_url();?>assets/images/world_standard.jpeg); padding: 0px; margin: 0px; background-repeat: round; width:100%; height: 250px;">
                            <div style="background:#00000099;height: 100%">
                                <a href="<?=base_url();?>users/quality_index">
                                  <div class="LiveDataBox">
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