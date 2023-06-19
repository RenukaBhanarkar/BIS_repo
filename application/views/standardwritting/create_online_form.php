    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Create New Competition</h1>
            <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url().'Admin/dashboard';?>" >Sub Admin Dashboard</a></li>
                 <li class="breadcrumb-item"><a href="<?php echo base_url().'admin/exchange_forum';?>" >Exchange Forum</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'quiz/organizing_quiz';?>" >Competition</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'Standardswritting/standard_offline_dashboard';?>" >Standard Writting Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'Standardswritting/standard_online_dashboard';?>" >Standard Writting</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'Standardswritting/create_online_list';?>" >Create New Competition</a></li>
                <!-- <li class="breadcrumb-item active" aria-current="page">Create New Competition</li> -->
                
                </ol>
            </nav>
        </div>

        <!-- Content Row -->
         <form name="create_online_form" id="create_online_form" action="<?php echo base_url() . 'standardswritting/create_online_form' ?>" method="post" enctype="multipart/form-data">
       <div class="row">
            <div class="col-12 mt-3">
                <div class="card border-top card-body">
                    
                    <div class="row">
                            <div class="mb-2 col-md-12">
                                <label class="d-block text-font">Title of Competition<sup class="text-danger">*</sup></label>
                                <input type="text" class="form-control input-font" name="title" id="title" placeholder="Enter Title of Competition" value="" >
                            </div>
                    </div>
                    <div class="row">
                            <div class="mb-2 col-md-12">
                                <label class="d-block text-font">Title of Competition in Hindi<sup class="text-danger">*</sup></label>
                                <input type="text" class="form-control input-font" name="title_hindi" id="title_hindi" placeholder="Enter Topic of Activity" value="" >
                            </div>
                    </div>
                    <div class="row">
                        <div class="mb-2 col-md-12">
                             <label class="d-block text-font">Description/About Competition<sup class="text-danger">*</sup></label>
                             <textarea class="form-control input-font" placeholder="Enter Description of Quiz" name="description" id="description"></textarea>
                                <div class='validation' id="description_error" style='color:red;margin-bottom:15px;'>This value is required. </div>
                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-2 col-md-12">
                             <label class="d-block text-font">Terms & Conditions<sup class="text-danger">*</sup></label>
                             <textarea class="form-control input-font" placeholder="Enter Tearms and Conditions of Quiz" name="terms_conditions" id="terms_conditions"><?php echo set_value('terms_conditions'); ?></textarea>
                                <div class='validation' id="terms_conditions_error" style='color:red;margin-bottom:15px;'>This value is required. </div>
                             
                        </div>
                    </div>
                    <div class="row">
                            <div class="mb-2 col-md-4">
                                <label class="d-block text-font">Start Date<sup class="text-danger">*</sup></label>
                                <input type="date" class="form-control input-font" name="start_date" id="start_date"  value="" >
                            </div>
                            <div class="mb-2 col-md-4">
                                <label class="d-block text-font">Start Time<sup class="text-danger">*</sup></label>
                                <input type="time" class="form-control input-font" name="start_time"  id="start_time"  value="" >
                            </div>
                            <div class="mb-2 col-md-4">
                                <label class="d-block text-font">End Date<sup class="text-danger">*</sup></label>
                                <input type="date" class="form-control input-font" name="end_date"  id="end_date"  value="" >
                            </div>
                            <div class="mb-2 col-md-4">
                                <label class="d-block text-font">End Time<sup class="text-danger">*</sup></label>
                                <input type="time" class="form-control input-font" name="end_time"  id="end_time"  value="" >
                            </div>
                            <div class="mb-2 col-md-4">
                                <label class="d-block text-font">Upload Thumbnail<sup class="text-danger">*</sup></label>
                                <div class="d-flex">
                                <div class="col-9">
                                    <input type="file" id="banner_img" name="banner_img" class="form-control-file" accept="image/png, image/jpeg,image/jpg"  onchange="loadFileBanner(event)">
                                    <span class="error_text"></span>
                                    <div class="invalid-feedback">
                                    This value is required
                                    </div>
                                </div>
                                <div class="col-2">
                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modal_1">
                                    Preview 
                                </button>
                                </div>
                                </div>
                            </div>
                           
                            <div class="mb-2 col-md-4">
                                <label class="d-block text-font">Total Marks<sup class="text-danger">*</sup></label>
                                <input type="text" class="form-control input-font" name="total_mark" id="total_mark" placeholder="Enter Total Marks" value="" oninput="this.value = this.value.replace(/[^0-9]/, '')">
                            </div>
                            <div class="mb-2 col-md-4">
                                <label class="d-block text-font">Qualifying Marks<sup class="text-danger">*</sup></label>
                                <input type="text" class="form-control input-font" name="qualifying_mark" id="qualifying_mark" placeholder="Enter Qualifying Marks" value="" oninput="this.value = this.value.replace(/[^0-9]/, '')">
                            </div>
                            <div class="mb-2 col-4">
                                <label class="d-block text-font">Level of Competition<sup class="text-danger">*</sup></label>
                                
                                <select id="quiz_level_id" name="quiz_level_id" class="form-control input-font">
                                    <option value="" selected disabled>Select Level of Quiz</option>
                                    <?php foreach ($quizlavel as $lavel) { ?>
                                        <option value="<?php echo $lavel['id'] ?>"><?php echo $lavel['title'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="mb-2 col-md-4" id="region_id_blk">
                                <label class="d-block text-font" id="region_title">Regional Level<sup class="text-danger">*</sup></label>
                                <select id="region_id" name="region_id" class="form-control input-font">
                                 </select>
                                <span class="error_text"><?php echo form_error('region_id'); ?></span>
                            </div>
                            <div class="mb-2 col-md-4" id="branch_id_blk">
                                <label class="d-block text-font" id="branch_title">Branch<sup class="text-danger">*</sup></label>
                                <select id="branch_id" name="branch_id" class="form-control input-font">
                                 
                                </select>
                                <span class="error_text"><?php echo form_error('branch_id'); ?></span>

                            </div>
                            <div class="mb-2 col-md-4" id="state_id_blk">
                                <label class="d-block text-font" id="state_title">State<sup class="text-danger">*</sup></label>
                                <select id="state_id" name="state_id" class="form-control input-font">
                                 
                                </select>
                                <!-- <span class="error_text"><?php //echo form_error('branch_id'); ?></span> -->
                            </div>

                    </div>
                    <div class="row">
                            <div class="mb-2 col-4">
                                <label class="d-block text-font">Availabile for<sup class="text-danger">*</sup></label>
                                <select id="availability_id" name="availability_id" class="form-control input-font">
                                    <option value="" selected disabled>Select Option</option>
                                    <?php foreach ($getAvailability as $Availability) { ?>
                                        <option value="<?php echo $Availability['id'] ?>"><?php echo $Availability['title'] ?></option>
                                    <?php } ?>

                                </select>
                            </div>
                             <div class="mb-2 col-8" id="standard_check">
                                <label class="d-block text-font">Standard<sup class="text-danger">*</sup></label>
                                        <div class="d-flex">
                                            <div class="custom-control custom-checkbox mr-3">
                                                <input type="checkbox" value="9" name="standard[]" class="custom-control-input"  id="Standard_1"  >
                                                <label class="custom-control-label" for="Standard_1">9<sup>th</sup>Standard</label>
                                            </div>
                                            <div class="custom-control custom-checkbox mr-3">
                                                <input type="checkbox" value="10" name="standard[]" class="custom-control-input"  id="Standard_2"  >
                                                <label class="custom-control-label" for="Standard_2">10<sup>th</sup>Standard</label>
                                            </div>
                                            <div class="custom-control custom-checkbox mr-3">
                                                <input type="checkbox" value="11" name="standard[]" class="custom-control-input"  id="Standard_3"  >
                                                <label class="custom-control-label" for="Standard_3">11<sup>th</sup>Standard</label>
                                            </div>
                                            <div class="custom-control custom-checkbox mr-3">
                                                <input type="checkbox" value="12" name="standard[]" class="custom-control-input"  id="Standard_4">
                                                <label class="custom-control-label" for="Standard_4">12<sup>th</sup>Standard</label>
                                            </div>
                                        </div>
                        </div>
                    </div>
                </div>
                <div class="card-header p-2" style="background-color: #cdd4e0; text-align: center;">
            	     <h4 class="m-0">Prize Details</h4>
                </div>
                <div class="card card-body">
                    <div class="col-md-3 prizes-section" style="margin-left: -21px;">
                                <h4 class="m-2">First Prize</h4>
                    </div>
                    <div class="row">
                            <div class="mb-2 col-md-4">
                                <label class="d-block text-font">Number of Prize<sup class="text-danger">*</sup></label>
                                <input type="text" class="form-control input-font" name="fprize" id="fprize" placeholder="Enter Prizes" value=""oninput="this.value = this.value.replace(/[^0-9]/, '')" >
                            </div>
                            <div class="mb-2 col-md-4">
                                <label class="d-block text-font">Name of Prize<sup class="text-danger">*</sup></label>
                                <input type="text" class="form-control input-font" name="fdetails" id="fdetails" placeholder="Enter Prizes" value="" >
                            </div>
                            <div class="mb-2 col-md-4">
                                <label class="d-block">Upload Image</label>
                                <div class="d-flex">
                                <div>
                                    <input type="file" id="fprize_img" name="fprize_img" class="form-control-file" accept="image/png, image/jpeg,image/jpg" onchange="loadFileFirst(event)">
                                    <span class="error_text"></span>
                                </div>
                                <div>
                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modal_2"> Preview</button>
                                
                                </div>
                                </div>
                                
                        </div>
                    </div>
                    <div class="col-md-3 prizes-section mt-2" style="margin-left: -21px;">
                                <h4 class="m-2">Second Prize</h4>
                    </div>
                    <div class="row">
                            <div class="mb-2 col-md-4">
                                <label class="d-block text-font">Number of Prize</label>
                                <input type="text" class="form-control input-font" name="sprize" id="sprize" placeholder="Enter Prizes" value="" oninput="this.value = this.value.replace(/[^0-9]/, '')">
                            </div>
                            <div class="mb-2 col-md-4">
                                <label class="d-block text-font">Name of Prize</label>
                                <input type="text" class="form-control input-font" name="sdetails" id="sdetails" placeholder="Enter Prizes" value="" >
                            </div>
                            <div class="mb-2 col-md-4">
                                <label class="d-block">Upload Image </label>
                                <div class="d-flex">
                                <div>
                                    <input type="file" id="sprize_img" name="sprize_img" class="form-control-file" accept="image/png, image/jpeg,image/jpg" onchange="loadFileSecond(event)">
                                    <span class="error_text"></span>
                                </div>
                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modal_3">
                                    Preview 
                                </button>
                                </div>
                        </div>
                    </div>
                    <div class="col-md-3 prizes-section mt-2" style="margin-left: -21px;">
                                <h4 class="m-2">Third Prize</h4>
                    </div>
                    <div class="row">
                            <div class="mb-2 col-md-4">
                                <label class="d-block text-font">Number of Prize</label>
                                <input type="text" class="form-control input-font" name="tprize" id="tprize" placeholder="Enter Prizes" value="" oninput="this.value = this.value.replace(/[^0-9]/, '')">
                            </div>
                            <div class="mb-2 col-md-4">
                                <label class="d-block text-font">Name of Prize</label>
                                <input type="text" class="form-control input-font" name="tdetails" id="tdetails" placeholder="Enter Prizes" value="" >
                            </div>
                            <div class="mb-2 col-md-4">
                                <label class="d-block">Upload Image </label>
                                <div class="d-flex">
                                <div>
                                    <input type="file" id="tprize_img" name="tprize_img" class="form-control-file" accept="image/png, image/jpeg,image/jpg" onchange="loadFileThird(event)">
                                    <span class="error_text"></span>
                                </div>
                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modal_4">
                                    Preview 
                                </button>
                                </div>
                        </div>
                    </div>
                    <div class="col-md-3 prizes-section mt-2" style="margin-left: -21px;">
                                <h4 class="m-2">Consolation Prize</h4>
                    </div>
                    <div class="row"> 
                            <div class="mb-2 col-md-4">
                                <label class="d-block text-font">Number of Prize</label>
                                <input type="text" class="form-control input-font" name="cprize" id="cprize" placeholder="Enter Prizes" value=""oninput="this.value = this.value.replace(/[^0-9]/, '')" >
                            </div>
                            <div class="mb-2 col-md-4">
                                <label class="d-block text-font">Name of Prize</label>
                                <input type="text" class="form-control input-font" name="cdetails" id="cdetails" placeholder="Enter Prizes" value="" >
                            </div>
                            <div class="mb-2 col-md-4">
                                <label class="d-block">Upload Image </label>
                                <div class="d-flex">
                                <div>
                                    <input type="file" id="cprize_img" name="cprize_img" class="form-control-file" accept="image/png, image/jpeg,image/jpg" onchange="loadFileConsol(event)">
                                    <span class="error_text"></span>
                                </div>
                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modal_5" fdprocessedid="3a6f0r">
                                    Preview 
                                </button>
                                </div>
                        </div>
                    </div>
                    <div class="col-md-12 submit_btn p-3">
                            <!-- <a class="btn btn-success btn-sm text-white" data-bs-toggle="modal" data-bs-target="#submitForm">Submit</a> -->

                            <input type="submit" name="Submit" class="btn btn-success btn-sm text-white btnsubmit" id="btnsubmit">
                            <a class="btn btn-danger btn-sm text-white cancelQuiz">Cancel</a>
                            <input type="reset" name="Reset" class="btn btn-warning btn-sm text-white">
                    </div>
                </div>
                
                
            </div>
            
        </div>
        
    </div>
    <div class="modal fade"id="modal_1"tabindex="-1"aria-labelledby="exampleModalLabelImg"aria-hidden="true">
    <div class="modal-dialog" style="max-width:1000px;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabelImg">Thumbnail Preview</h5>
                <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span></button>
            </div>
           <div class="modal-body">
            <img id="outputbanner"width="100%"/>
        </div>
    </div>
    </div>
    </div>
    <div class="modal fade" id="modal_2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="max-width:1000px;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Upload Preview</h5>
        <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span></button>
      </div>
      <div class="modal-body">
            <img id="outputFirst"width="100%"/>
        </div>
    </div>
  </div>
</div>
<div class="modal fade" id="modal_3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="max-width:1000px;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Upload Preview</h5>
        <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span></button>
      </div>
      <div class="modal-body">
        <img id="outputSecond"width="100%"/>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="modal_4" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="max-width:1000px;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Upload Preview</h5>
        <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span></button>
      </div>
      <div class="modal-body">
        <img id="outputThird"width="100%"/>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="modal_5" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="max-width:1000px;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Upload Preview</h5>
        <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span></button>
      </div>
      <div class="modal-body">
       <img id="outputConsol"width="100%"/>
      </div>
    </div>
  </div>
</div>
</form>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
  
 <script type="text/javascript">
    window.onload=function(){//from ww  w . j  a  va2s. c  o  m
var today = new Date().toISOString().split('T')[0];
document.getElementsByName("start_date")[0].setAttribute('min', today);
document.getElementsByName("end_date")[0].setAttribute('min', today);
    }

      </script>

<script>
    CKEDITOR.replace('description');
    CKEDITOR.replace('terms_conditions');


    //Banner Image Preview
    var loadFileBanner = function(event) {
        $("#outputbanner").show();
        var fileSize = $('#banner_img')[0].files[0].size;
       var validExtensions = ['jpg', 'jpeg', 'png','JPG', 'JPEG', 'PNG']; //array of valid extensions
        var fileName = $("#banner_img").val();;
        var fileNameExt = fileName.substr(fileName.lastIndexOf('.') + 1);
                   
            console.log(fileSize);
        if(fileSize < 20000){
            $('#banner_img').val('');
            // $('#lessSize').modal('show');
           // $('#err_icon_file').text('This value is required');
            Swal.fire('File size should be between 20KB to 200KB')
        }else if(fileSize > 204800){
            $('#banner_img').val('');
            // $('#greaterSize').modal('show');
            Swal.fire('File size should be between 20KB to 200KB')
            $('#err_icon_file').text('This value is required');
        }else if($.inArray(fileNameExt, validExtensions) == -1){
            $('#banner_img').val('');
            // $('#invalidfiletype').modal('show');
            Swal.fire('Only jpg,jpeg,png allowed')
            $('#err_icon_file').text('This value is required');
        }else{
            $('#err_icon_file').text('');
        }
        var outputbanner = document.getElementById('outputbanner');
        outputbanner.src = URL.createObjectURL(event.target.files[0]);
        outputbanner.onload = function() {
            URL.revokeObjectURL(outputbanner.src);
        }
    };
 
    function resetbanner() {
        $("#banner_img").val('');
        $("#outputbanner").hide();
    }
    //end

    //First Prize Image Preview
    var loadFileFirst = function(event) {
        $("#outputFirst").show();
        var fileSize = $('#fprize_img')[0].files[0].size;
       var validExtensions = ['jpg', 'jpeg', 'png','JPG', 'JPEG', 'PNG']; //array of valid extensions
        var fileName = $("#fprize_img").val();;
        var fileNameExt = fileName.substr(fileName.lastIndexOf('.') + 1);
                   
            console.log(fileSize);
        if(fileSize < 20480){
            $('#fprize_img').val('');            
            Swal.fire('File size should be between 20KB to 200KB')
        }else if(fileSize > 204800){
            $('#fprize_img').val('');          
            Swal.fire('File size should be between 20KB to 200KB')
         //   $('#err_icon_file').text('This value is required');
        }else if($.inArray(fileNameExt, validExtensions) == -1){
            $('#fprize_img').val('');           
            Swal.fire('Only jpg,jpeg,png allowed')
            $('#err_icon_file').text('This value is required');
        }else{
            $('#err_icon_file').text('');
        }
        var outputFirst = document.getElementById('outputFirst');
        outputFirst.src = URL.createObjectURL(event.target.files[0]);
        outputFirst.onload = function() {
            URL.revokeObjectURL(outputFirst.src);
        }
    };

    function resetFirst() {
        $("#fprize_img").val('');
        $("#outputFirst").hide();
    }
    //end

    //Second Prize Image Preview
    var loadFileSecond = function(event) {
        $("#outputSecond").show();
        var fileSize = $('#sprize_img')[0].files[0].size;
       var validExtensions = ['jpg', 'jpeg', 'png','JPG', 'JPEG', 'PNG']; //array of valid extensions
        var fileName = $("#sprize_img").val();;
        var fileNameExt = fileName.substr(fileName.lastIndexOf('.') + 1);
                   
            console.log(fileSize);
        if(fileSize < 20480){
            $('#sprize_img').val('');            
            Swal.fire('File size should be between 20KB to 200KB')
        }else if(fileSize > 204800){
            $('#sprize_img').val('');          
            Swal.fire('File size should be between 20KB to 200KB')
         //   $('#err_icon_file').text('This value is required');
        }else if($.inArray(fileNameExt, validExtensions) == -1){
            $('#sprize_img').val('');           
            Swal.fire('Only jpg,jpeg,png allowed')
            $('#err_icon_file').text('This value is required');
        }else{
            $('#err_icon_file').text('');
        }
        var outputSecond = document.getElementById('outputSecond');
        outputSecond.src = URL.createObjectURL(event.target.files[0]);
        outputSecond.onload = function() {
            URL.revokeObjectURL(outputSecond.src);
        }
    };

    function resetSecond() {
        $("#sprize_img").val('');
        $("#outputSecond").hide();
    }
    //end

    //third Prize Image Preview
    var loadFileThird = function(event) {
        $("#outputThird").show();
        var fileSize = $('#tprize_img')[0].files[0].size;
       var validExtensions = ['jpg', 'jpeg', 'png','JPG', 'JPEG', 'PNG']; //array of valid extensions
        var fileName = $("#tprize_img").val();;
        var fileNameExt = fileName.substr(fileName.lastIndexOf('.') + 1);
                   
            console.log(fileSize);
        if(fileSize < 20480){
            $('#tprize_img').val('');            
            Swal.fire('File size should be between 20KB to 200KB')
        }else if(fileSize > 204800){
            $('#tprize_img').val('');          
            Swal.fire('File size should be between 20KB to 200KB')
         //   $('#err_icon_file').text('This value is required');
        }else if($.inArray(fileNameExt, validExtensions) == -1){
            $('#tprize_img').val('');           
            Swal.fire('Only jpg,jpeg,png allowed')
            $('#err_icon_file').text('This value is required');
        }else{
            $('#err_icon_file').text('');
        }
        var outputThird = document.getElementById('outputThird');
        outputThird.src = URL.createObjectURL(event.target.files[0]);
        outputThird.onload = function() {
            URL.revokeObjectURL(outputThird.src);
        }
    };

    function resetThird() {
        $("#tprize_img").val('');
        $("#outputThird").hide();
    }


    //Consolation Prize Image Preview
    var loadFileConsol = function(event) {
        $("#outputConsol").show();
        var fileSize = $('#cprize_img')[0].files[0].size;
       var validExtensions = ['jpg', 'jpeg', 'png','JPG', 'JPEG', 'PNG']; //array of valid extensions
        var fileName = $("#cprize_img").val();;
        var fileNameExt = fileName.substr(fileName.lastIndexOf('.') + 1);
                   
            console.log(fileSize);
        if(fileSize < 20480){
            $('#cprize_img').val('');            
            Swal.fire('File size should be between 20KB to 200KB')
        }else if(fileSize > 204800){
            $('#cprize_img').val('');          
            Swal.fire('File size should be between 20KB to 200KB')
         //   $('#err_icon_file').text('This value is required');
        }else if($.inArray(fileNameExt, validExtensions) == -1){
            $('#cprize_img').val('');           
            Swal.fire('Only jpg,jpeg,png allowed')
            $('#err_icon_file').text('This value is required');
        }else{
            $('#err_icon_file').text('');
        }
        var outputConsol = document.getElementById('outputConsol');
        outputConsol.src = URL.createObjectURL(event.target.files[0]);
        outputConsol.onload = function() {
            URL.revokeObjectURL(outputConsol.src);
        }
    };

    function resetConsol() {
        $("#cprize_img").val('');
        $("#outputConsol").hide();
    }
    $(document).ready(function() {
        $(".timepicker").timepicker();
        $("#terms_conditions_error").hide();
        $("#description_error").hide();

        $("#region_id_blk").hide();
        $("#branch_id_blk").hide();
        $("#state_id_blk").hide();
        $(document).on("change", "#quiz_level_id", function(e) {
            e.preventDefault();
            var quiz_level_id = $("#quiz_level_id :selected").val();
            if (quiz_level_id == 1) {
                $("#region_id_blk").hide();
                $("#branch_id_blk").hide();
                $("#state_id_blk").hide();
            } else if (quiz_level_id == 2) {
                $("#region_id_blk").show();
                $("#branch_id_blk").hide();
                $("#state_id_blk").hide();
                $("#region_title").text("Regional Level");
                var postdata = "id=2";  
            $.ajax({
                url: "<?= base_url() ?>quiz/getAllRegions",
                data: postdata,
                type: "JSON",
                method: "post",
                success: function(response) {
                    var res = JSON.parse(response);
                    var selectbox = $('#region_id');
                    selectbox.empty();
                    $("#region_id").next(".validation").remove();
                    $('#region_id').append('<option value="" selected disabled>Select Region </option>');
                    $.each(res.region, function(index, value) {
                        $('#region_id').append('<option value="' + value.pki_region_id + '">' + value.uvc_region_title + '</option>');
                    });

                }
            });

            } else if (quiz_level_id == 3) {
                $("#region_id_blk").hide();
                $("#branch_id_blk").show();
                $("#state_id_blk").hide();
                $("#branch_title").text("Branch Level");
                var postdata = "id=3";  


            $.ajax({
                url: "<?= base_url() ?>quiz/getAllBranches",
                data: postdata,
                type: "JSON",
                method: "post",
                success: function(response) {
                    var res = JSON.parse(response);
                    var selectbox = $('#branch_id');
                    selectbox.empty();
                    $("#branch_id").next(".validation").remove();
                    $('#branch_id').append('<option value="" selected disabled>Select Branch </option>');
                    $.each(res.region, function(index, value) {
                        $('#branch_id').append('<option value="' + value.pki_id + '">' + value.uvc_department_name + '</option>');
                    });
                }
            });
            }else if (quiz_level_id == 4) {
                $("#region_id_blk").hide();
                $("#branch_id_blk").hide();
                $("#state_id_blk").show();
                $("#state_title").text("State Level");
                var postdata = "id=4";  


            $.ajax({
                url: "<?= base_url() ?>quiz/getAllStates",
                data: postdata,
                type: "JSON",
                method: "post",
                success: function(response) {

                    var res = JSON.parse(response);
                    console.log(res);
                    var selectbox = $('#state_id');
                    selectbox.empty();
                    $("#state_id").next(".validation").remove();
                    $('#state_id').append('<option value="" selected disabled>Select State</option>');
                    $.each(res.state, function(index, value) {
                        $('#state_id').append('<option value="' + value.state_id + '">' + value.state_name + '</option>');
                    });
                }
            });
            }
        });
        $("#standard_check").hide();
        $(document).on("change", "#availability_id", function(e) {
            e.preventDefault();
            var availability_id = $("#availability_id :selected").val();
            if (availability_id == 1) {
                $("#standard_check").show();
              
            } else if (availability_id == 2) {
                $("#standard_check").hide();
              
            }
        });
 
        
    });
    //end
     
 

    $('#create_online_form').submit(function(e) {
        e.preventDefault();
        var focusSet = false;
        var allfields = true;
        var title = $("#title").val();

        if (title == "" || title == null) {
            if ($("#title").next(".validation").length == 0) {
                $("#title").after("<div class='validation' style='color:red;margin-bottom:15px;'>This value is required. </div>");
            }
            if (!focusSet) {
                $("#title").focus();
            }
            allfields = false;
        } else {
            $("#title").next(".validation").remove();
        }

        var title_hindi = $("#title_hindi").val();

        if (title_hindi == "" || title_hindi == null) {
            if ($("#title_hindi").next(".validation").length == 0) {
                $("#title_hindi").after("<div class='validation' style='color:red;margin-bottom:15px;'>This value is required.</div>");
            }
            if (!focusSet) {
                $("#title_hindi").focus();
            }
            allfields = false;
        } else {
            $("#title_hindi").next(".validation").remove();
        }

        var description = CKEDITOR.instances['description'].getData();

        if (description == "" || description == null) {
            if ($("#description").next(".validation").length == 0) {
                $("#description_error").show();
            }
            if (!focusSet) {
                $("#description").focus();
            }
            allfields = false;
        } else {
            $("#description_error").hide();

        }

        var terms_conditions = CKEDITOR.instances['terms_conditions'].getData();

        if (terms_conditions == "" || terms_conditions == null) {
            if ($("#terms_conditions").next(".validation").length == 0) {
                $("#terms_conditions_error").show();
            }
            if (!focusSet) {
                $("#terms_conditions").focus();
            }
            allfields = false;
        } else {
            $("#terms_conditions_error").hide();
        }

        var qualifying_mark = $("#qualifying_mark").val();
        if (qualifying_mark == "" || qualifying_mark == null) {
            if ($("#qualifying_mark").next(".validation").length == 0) {
                $("#qualifying_mark").after("<div class='validation' style='color:red;margin-bottom:15px;'>This value is required.</div>");
            }
            if (!focusSet) {
                $("#qualifying_mark").focus();
            }
            allfields = false;
        } else {
            $("#qualifying_mark").next(".validation").remove();
        }

        var total_mark = $("#total_mark").val();
        if (total_mark == "" || total_mark == null) {
            if ($("#total_mark").next(".validation").length == 0) {
                $("#total_mark").after("<div class='validation' style='color:red;margin-bottom:15px;'>This value is required. </div>");
            }
            if (!focusSet) {
                $("#total_mark").focus();
            }
            allfields = false;
        } else {
            $("#total_mark").next(".validation").remove();
        }

        

        var start_date = $("#start_date").val();
        if (start_date == "" || start_date == null) {
            if ($("#start_date").next(".validation").length == 0) {
                $("#start_date").after("<div class='validation' style='color:red;margin-bottom:15px;'>This value is required.</div>");
            }
            if (!focusSet) {
                $("#start_date").focus();
            }
            allfields = false;
        } else {
            $("#start_date").next(".validation").remove();
        }

        var start_time = $("#start_time").val();
        if (start_time == "" || start_time == null) {
            if ($("#start_time").next(".validation").length == 0) {
                $("#start_time").after("<div class='validation' style='color:red;margin-bottom:15px;'>This value is required.</div>");
            }
            if (!focusSet) {
                $("#start_time").focus();
            }
            allfields = false;
        } else {
            $("#start_time").next(".validation").remove();
        }

        var end_date = $("#end_date").val();
        if (end_date == "" || end_date == null) {
            if ($("#end_date").next(".validation").length == 0) {
                $("#end_date").after("<div class='validation' style='color:red;margin-bottom:15px;'>This value is required.</div>");
            }
            if (!focusSet) {
                $("#end_date").focus();
            }
            allfields = false;
        } else {
            $("#end_date").next(".validation").remove();
        }

        var end_time = $("#end_time").val();
        if (end_time == "" || end_time == null) {
            if ($("#end_time").next(".validation").length == 0) {
                $("#end_time").after("<div class='validation' style='color:red;margin-bottom:15px;'>This value is required.</div>");
            }
            if (!focusSet) {
                $("#end_time").focus();
            }
            allfields = false;
        } else {
            $("#end_time").next(".validation").remove();
        }

        

        var banner_img = $("#banner_img").val();
        if (banner_img == "" || banner_img == null) {
            if ($("#banner_img").next(".validation").length == 0) {
                $("#banner_img").after("<div class='validation' style='color:red;margin-bottom:15px;'>This value is required.</div>");
            }
            if (!focusSet) {
                $("#banner_img").focus();
            }
            allfields = false;
        } else {
            $("#banner_img").next(".validation").remove();
        }

        var fprize = $("#fprize").val();
        if (fprize == "" || fprize == null) {
            if ($("#fprize").next(".validation").length == 0) {
                $("#fprize").after("<div class='validation' style='color:red;margin-bottom:15px;'>This value is required. </div>");
            }
            if (!focusSet) {
                $("#fprize").focus();
            }
            allfields = false;
        } else {
            $("#fprize").next(".validation").remove();
        }

        var fdetails = $("#fdetails").val();
        if (fdetails == "" || fdetails == null) {
            if ($("#fdetails").next(".validation").length == 0) {
                $("#fdetails").after("<div class='validation' style='color:red;margin-bottom:15px;'>This value is required.</div>");
            }
            if (!focusSet) {
                $("#fdetails").focus();
            }
            allfields = false;
        } else {
            $("#fdetails").next(".validation").remove();
        }

         
        var sprizes = $("#sprizes").val();
        if (sprizes > 0) {
            var sdetails = $("#sdetails").val();
            if (sdetails == "" || sdetails == null) {
                if ($("#sdetails").next(".validation").length == 0) {
                    $("#sdetails").after("<div class='validation' style='color:red;margin-bottom:15px;'>This value is required.</div>");
                }
                if (!focusSet) {
                    $("#sdetails").focus();
                }
                allfields = false;
            } else {
                $("#sdetails").next(".validation").remove();
            }
        }


        var tprize = $("#tprize").val();
        if (tprize > 0) {
            var tdetails = $("#tdetails").val();
            if (tdetails == "" || tdetails == null) {
                if ($("#tdetails").next(".validation").length == 0) {
                    $("#tdetails").after("<div class='validation' style='color:red;margin-bottom:15px;'>This value is required.</div>");
                }
                if (!focusSet) {
                    $("#tdetails").focus();
                }
                allfields = false;
            } else {
                $("#tdetails").next(".validation").remove();
            }
        }
        
 
        var cprize = $("#cprize").val();
        if (cprize > 0) {
            var cdetails = $("#cdetails").val();
            if (cdetails == "" || cdetails == null) {
                if ($("#cdetails").next(".validation").length == 0) {
                    $("#cdetails").after("<div class='validation' style='color:red;margin-bottom:15px;'>This value is required.</div>");
                }
                if (!focusSet) {
                    $("#cdetails").focus();
                }
                allfields = false;
            } else {
                $("#cdetails").next(".validation").remove();
            }
        }
        var availability_id = $("#availability_id").val();
        if (availability_id == "" || availability_id == null) {
            if ($("#availability_id").next(".validation").length == 0) {
                $("#availability_id").after("<div class='validation' style='color:red;margin-bottom:15px;'>This value is required.</div>");
            }
            if (!focusSet) {
                $("#availability_id").focus();
            }
            allfields = false;
        } else {
            $("#availability_id").next(".validation").remove();
        }

        if(availability_id != "" && availability_id != null){
            if(availability_id == 1){
                var standard = $('input[name="standard[]"]:checked').val();
                if (standard == "" || standard == undefined || standard == null) {
                if ($("#availability_id").next(".validation").length == 0) {
                    $("#availability_id").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please select atleast one standard. </div>");
                }
                
                allfields = false;
            } else {
                $("#availability_id").next(".validation").remove();
            }
            }
        }
 
        var quiz_level_id = $("#quiz_level_id :selected").val();
        if (quiz_level_id == "" || quiz_level_id == null) {
            if ($("#quiz_level_id").next(".validation").length == 0) {
                $("#quiz_level_id").after("<div class='validation' style='color:red;margin-bottom:15px;'>This value is required.</div>");
            }
            if (!focusSet) {
                $("#quiz_level_id").focus();
            }
            allfields = false;
        } else {
            $("#quiz_level_id").next(".validation").remove();
        }
        if (quiz_level_id == 2 ) {
            var region_id = $("#region_id :selected").val();
            if (region_id == "" || region_id == null) {
                if ($("#region_id").next(".validation").length == 0) {
                    $("#region_id").after("<div class='validation' style='color:red;margin-bottom:15px;'>This value is required.</div>");
                }
                if (!focusSet) {
                    $("#region_id").focus();
                }
                allfields = false;
            } else {
                $("#region_id").next(".validation").remove();
            }
        }
        if (quiz_level_id == 3) {
            var branch_id = $("#branch_id :selected").val();
            if (branch_id == "" || branch_id == null) {
                if ($("#branch_id").next(".validation").length == 0) {
                    $("#branch_id").after("<div class='validation' style='color:red;margin-bottom:15px;'>This value is required.</div>");
                }
                if (!focusSet) {
                    $("#branch_id").focus();
                }
                allfields = false;
            } else {
                $("#branch_id").next(".validation").remove();
            }
        }
        if (quiz_level_id == 4) {
            var state_id = $("#state_id :selected").val();
            if (state_id == "" || state_id == null) {
                if ($("#state_id").next(".validation").length == 0) {
                    $("#state_id").after("<div class='validation' style='color:red;margin-bottom:15px;'>This value is required.</div>");
                }
                if (!focusSet) {
                    $("#state_id").focus();
                }
                allfields = false;
            } else {
                $("#state_id").next(".validation").remove();
            }
        }
        // var fprize_img = $("#fprize_img").val();
        // if (fprize_img == "" || fprize_img== null) {
        //     if ($("#fprize_img").next(".validation").length == 0) 
        //     {
        //         $("#fprize_img").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please Select First Prize Image Icon </div>");
        //     }
        //     if (!focusSet) { $("#fprize_img").focus(); }
        //     allfields = false;
        // } else {
        //     $("#fprize_img").next(".validation").remove(); 
        // }

        if (allfields) {
            // $('#create_online_form').submit();
            Swal.fire({
                    title: 'Are you sure you want to Create ?',
                    showDenyButton: true,
                    showCancelButton: false,
                    confirmButtonText: 'Submit',
                    denyButtonText: `Cancel`,
                    }).then((result) => {
                    if (result.isConfirmed) {                       
                        $('#create_online_form').submit();                              
                    } else if (result.isDenied) {

                    }
                    })
        } else {
            return false;
        }
    });

    $('.cancelQuiz').on('click',function(){
        Swal.fire({
                    title: 'Are you sure you want to Cancel?',
                    showDenyButton: true,
                    showCancelButton: false,
                    confirmButtonText: 'Cancel',
                    denyButtonText: `Close`,
                    }).then((result) => { 
                    if (result.isConfirmed) {               
                       window.location.replace('<?php echo base_url().'Standardswritting/create_online_list' ?>');                           
                    } else if (result.isDenied) { 
                    }
                    })
    })
    
</script>

 