    <!-- Begin Page Content -->
    <style>
        input[type=number]::-webkit-inner-spin-button, 
input[type=number]::-webkit-outer-spin-button { 
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    margin: 0; 
}
.correct_hide:valid{
    /* border-color: #1cc88a; */
    padding-right: calc(1.5em + 0.75rem);
    background-image: url()!important;
    background-repeat: no-repeat;
    background-position: right calc(0.375em + 0.1875rem) center;
    background-size: calc(0.75em + 0.375rem) calc(0.75em + 0.375rem);
}
.lbl_clor,input[type=checkbox]{
    color: #0f1010!important;
    border-color:#0f1010!important;
}

    </style>
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Create New Competition</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                <?php if (encryptids("D", $_SESSION['admin_type']) == 3) { ?>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'Admin/dashboard';?>" >Sub Admin Dashboard</a></li>
                <?php }else{ ?>
                    <li class="breadcrumb-item"><a href="<?php echo base_url().'Admin/dashboard';?>" >Admin Dashboard</a></li>
                <?php } ?>
                <!-- <li class="breadcrumb-item"><a href="<?php echo base_url().'Admin/dashboard';?>" >Sub Admin Dashboard</a></li> -->
                <li class="breadcrumb-item"><a href="<?php echo base_url().'admin/exchange_forum';?>" >Exchange Forum</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'quiz/organizing_quiz';?>" >Competition</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'Standardswritting/miscellaneous_dashboard';?>" >Miscellaneous Competition</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'Standardswritting/create_competition_list';?>" >Create New Competition</a></li>
                <!-- <li class="breadcrumb-item active" aria-current="page">Create New Competition</li> -->
                
                </ol>
            </nav>
        </div>
       
        <!-- Content Row -->
       <div class="row">
            <div class="col-12 mt-3">
            <form name="competition_reg" id="competition_reg" action="<?php echo base_url() . 'standardswritting/competition_reg' ?>" method="post" enctype="multipart/form-data">
                <div class="card border-top card-body">
                <div class="row">
                <div class="mb-2 col-md-4">
                                <label class="d-block text-font">Type of Competition<sup class="text-danger">*</sup></label>
                                <select id="comp_type" name="comp_type" class="form-control input-font" required>
                                    <option value="" selected disabled>Select Type of Competition</option>
                                    <!-- <?php foreach ($quizlavel as $lavel) { ?>
                                        <option value="<?php echo $lavel['id'] ?>"><?php echo $lavel['title'] ?></option>
                                    <?php } ?> -->
                                    <option value="1">Essay Writing</option>
                                    <option value="2">Poster Making</option>
                                    <option value="3">Case Study</option>
                                    <option value="4">Artical writing</option>
                                    <option value="5">Paper Writing</option>
                                </select>
                                <div class="invalid-feedback">
                                This value is required
                                </div>
                                <span class="error_text"><?php echo form_error('quiz_level_id'); ?></span>
                            </div>
                </div>
                    <div class="row">
                            <div class="mb-2 col-md-12">
                                <label class="d-block text-font">Title of Competition<sup class="text-danger">*</sup></label>
                                <input type="text" class="form-control input-font" name="name" id="name" placeholder="Enter Name of Competition" value="<?php echo set_value('name') ?>" required="">
                                <div class="invalid-feedback">
                                    This value is required
                                </div>
                                <span class="error_text" id="err_name"><?php echo form_error('name'); ?></span>
                                
                            </div>
                    </div>
                    <div class="row">
                            <div class="mb-2 col-md-12">
                                <label class="d-block text-font">Title of Competition in Hindi<sup class="text-danger">*</sup></label>
                                <input type="text" class="form-control input-font" name="name_hindi" id="name_hindi" placeholder="Enter Title of Competition in Hindi" value="<?php echo set_value('name_hindi') ?>" required="">
                                <div class="invalid-feedback">
                                    This value is required
                                </div>
                                <span class="error_text" id="err_name_hindi"><?php echo form_error('name_hindi'); ?></span>
                            </div>
                    </div>
                    <div class="row">
                        <div class="mb-2 col-md-12">
                             <label class="d-block text-font">Description<sup class="text-danger">*</sup></label>
                             <textarea name="description" id="description" required><?php echo set_value('description') ?></textarea>
                             <div class="invalid-feedback">
                                    This value is required
                                </div>
                             <div class='validation' id="description_error" style='color:red;margin-bottom:15px;'> </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-2 col-md-12">
                             <label class="d-block text-font">Terms & Conditions<sup class="text-danger">*</sup></label>
                             <textarea name="terms_conditions" id="terms_conditions" ><?php echo set_value('terms_conditions') ?></textarea>
                             <div class='validation' id="terms_conditions_error" style='color:red;margin-bottom:15px;'> </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-2 col-md-4">
                                <label class="d-block text-font">Start Date<sup class="text-danger">*</sup></label>
                                <input type="date" class="form-control input-font" name="start_date" id="start_date" value="<?php echo set_value('start_date') ?>" required="">
                                <span class="error_text"><?php echo form_error('start_date'); ?></span>
                                <div class="invalid-feedback">
                                This value is required
                                </div>
                        </div>
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Start Time<sup class="text-danger">*</sup></label>
                            <input type="text" class="form-control input-font timepicker" name="start_time" id="start_time" placeholder="Select Date" value="">
                            <span class="error_text"><?php echo form_error('start_time'); ?></span>
                        </div>
                        <div class="mb-2 col-md-4">
                           
                        </div>
                        <div class="mb-2 col-md-4">
                                <label class="d-block text-font">End Date<sup class="text-danger">*</sup></label>
                                <input type="date" class="form-control input-font" name="end_date" id="end_date" value="" required="">
                                <span class="error_text"><?php echo form_error('end_date'); ?></span>
                                <div class="invalid-feedback">
                                This value is required
                                </div>
                        </div>
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font"> End Time<sup class="text-danger">*</sup></label>
                            <input type="text" class="form-control input-font timepicker" name="end_time" id="end_time" placeholder="Select Date" value="">
                            
                            <span class="error_text"><?php echo form_error('end_time'); ?></span>
                        </div>
                        <div class="mb-2 col-md-4">
                           
                        </div>
                        <div class="mb-2 col-md-4">
                                <label class="d-block text-font">Upload Thumbnail<sup class="text-danger">*</sup></label>
                                <div class="d-flex">
                                <div class="col-9">
                                    <input type="file" id="thumbnail" name="thumbnail" class="form-control-file" accept="image/png, image/jpeg,image/jpg" required onchange="loadThumbnail(event)">
                                    <span class="error_text"></span>
                                    <div class="invalid-feedback">
                                    This value is required
                                    </div>
                                </div>
                                <div class="col-2">
                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#ThumbnailModal" fdprocessedid="3a6f0r">
                                    Preview 
                                </button>
                                </div>
                                </div>
                        </div>
                        <div class="mb-2 col-md-4">
                        <label class="d-block text-font">Total Marks<sup class="text-danger">*</sup></label>
                        <input type="text" class="form-control input-font" name="score" id="score" placeholder="Total Score" value="" oninput="this.value = this.value.replace(/[^0-9/]/, '')" required>
                            <span class="text-danger" id="err_score"><?php echo form_error('score'); ?></span>
                        </div>
                        
                        <!-- <div class="mb-2 col-md-4">
                                <label class="d-block text-font">Level of Competition<sup class="text-danger">*</sup></label>
                                
                                <select id="competition_level_id" name="competition_level_id" class="form-control input-font">
                                    <option value="" selected disabled>Select Level of Competition</option>
                                    <?php foreach ($quizlavel as $lavel) { ?>
                                        <option value="<?php echo $lavel['id'] ?>"><?php echo $lavel['title'] ?></option>
                                    <?php } ?>
                                </select>
                                <span class="error_text"><?php echo form_error('quiz_level_id'); ?></span>
                        </div> -->
                        <!-- <div class="mb-2 col-md-4">
                                <label class="d-block text-font">Region<sup class="text-danger">*</sup></label>
                                <select id="Region" name="Region" class="form-control input-font" value="">
                                    <option value="1">All India Level</option>
                                    <option value="2">Regional Level</option>
                                    <option value="2">Branch Level</option>
                                </select>
                        </div> -->
                        <!-- <div class="mb-2 col-md-4">
                                <label class="d-block text-font">Branch<sup class="text-danger">*</sup></label>
                                <select id="Branch" name="Branch" class="form-control input-font" value="">
                                    <option value="1">All India Level</option>
                                    <option value="2">Regional Level</option>
                                    <option value="2">Branch Level</option>
                                </select>
                        </div> -->
                        <div class="row col-12">
                            <div class="mb-2 col-md-4">
                                <label class="d-block text-font">Level of Competition<sup class="text-danger">*</sup></label>
                                <select id="quiz_level_id" name="quiz_level_id" class="form-control input-font" required>
                                    <option value="" selected disabled>Select Level of Competition</option>
                                    <?php foreach ($quizlavel as $lavel) { ?>
                                        <option value="<?php echo $lavel['id'] ?>"><?php echo $lavel['title'] ?></option>
                                    <?php } ?>
                                </select>
                                <div class="invalid-feedback">
                                This value is required
                                </div>
                                <span class="error_text"><?php echo form_error('quiz_level_id'); ?></span>
                            </div>
                            <div class="mb-2 col-md-4" id="region_id_blk">
                                <label class="d-block text-font" id="region_title">Regional Level<sup class="text-danger">*</sup></label>
                                <select id="region_id" name="region_id" class="form-control input-font" required="">
                                    <!-- <option value="" selected disabled>--select--</option>
                                    <option value="#">Maharashtra</option>
                                    <option value="#">Karnataka</option> -->

                                </select>
                                <div class="invalid-feedback">
                                This value is required
                                </div>
                                <span class="error_text"><?php echo form_error('region_id'); ?></span>

                            </div>
                            <div class="mb-2 col-md-4" id="state_id_blk">
                                <label class="d-block text-font" id="state_title">State Level<sup class="text-danger">*</sup></label>
                                <select id="state_id" name="state_id" class="form-control input-font">
                                    <!-- <option value="" selected disabled>--select--</option>
                                    <option value="#">Maharashtra</option>
                                    <option value="#">Karnataka</option> -->

                                </select>
                                <span class="error_state"><?php echo form_error('state_id'); ?></span>
                                <div class="invalid-feedback">
                                This value is required
                                </div>

                            </div>
                            <div class="mb-2 col-md-4" id="branch_id_blk">
                                <label class="d-block text-font" id="branch_title">Branch<sup class="text-danger">*</sup></label>
                                <select id="branch_id" name="branch_id" class="form-control input-font">
                                 
                                </select>
                                <span class="error_text"><?php echo form_error('branch_id'); ?></span>
                                <div class="invalid-feedback">
                                This value is required
                                </div>

                            </div>

                        </div>
                        <div class="mb-2 col-4">
                                <label class="d-block text-font">Available For<sup class="text-danger">*</sup></label>
                                <select id="Available" name="Available" class="form-control input-font" value="" required>
                                    <option value="" selected disabled>--select-- </option>
                                    <option value="1">School</option>
                                    <option value="2">Higher Qualification</option>
                                </select>
                                <div class="invalid-feedback">
                                This value is required
                                </div>
                        </div>
                        <div class="mb-2 col-8" id="standard_check">
                                <label class="d-block text-font">Standard<sup class="text-danger">*</sup></label>
                                        <div class="d-flex">
                                            <div class="custom-control custom-checkbox mr-3">
                                                <input type="checkbox" value="9" name="standard[]" class="custom-control-input"  id="Standard_1"  >
                                                <label class="custom-control-label lbl_clor" for="Standard_1">9<sup>th</sup>Standard</label>
                                            </div>
                                            <div class="custom-control custom-checkbox mr-3">
                                                <input type="checkbox" value="10" name="standard[]" class="custom-control-input"  id="Standard_2"  >
                                                <label class="custom-control-label lbl_clor" for="Standard_2">10<sup>th</sup>Standard</label>
                                            </div>
                                            <div class="custom-control custom-checkbox mr-3">
                                                <input type="checkbox" value="11" name="standard[]" class="custom-control-input"  id="Standard_3"  >
                                                <label class="custom-control-label lbl_clor" for="Standard_3">11<sup>th</sup>Standard</label>
                                            </div>
                                            <div class="custom-control custom-checkbox mr-3">
                                                <input type="checkbox" value="12" name="standard[]" class="custom-control-input"  id="Standard_4">
                                                <label class="custom-control-label lbl_clor" for="Standard_4">12<sup>th</sup>Standard</label>
                                            </div>
                                        </div>
                                        <span class="text-danger" id="err_school"></span>
                        </div>
                        <!-- <div class="mb-2 col-4">
                                <label class="d-block text-font">Standard<sup class="text-danger">*</sup></label>
                                <select id="Available" name="Available" class="form-control input-font" value="">
                                <option value="" selected disabled>--select--</option>
                                    <option value="1">8<sup>th</sup>Standard</option>
                                    <option value="1">9<sup>th</sup>Standard</option>
                                    <option value="1">10<sup>th</sup>Standard</option>
                                    <option value="1">11<sup>th</sup>Standard</option>
                                    <option value="1">12<sup>th</sup>Standard</option>
                                </select>
                        </div> -->
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
                                <label class="d-block text-font">Number of Prizes<sup class="text-danger">*</sup></label>
                                <input type="number" class="form-control input-font" name="fprize" id="fprize" placeholder="Enter Prizes" value="<?php echo set_value('fprize') ?>" min="1" oninput="this.value = this.value.replace(/[^0-9/]/, '')" required="" >
                                <!-- <input type="number" class="form-control input-font" name="fprize" id="fprize" placeholder="Enter Prizes" value="<?php echo set_value('fprize') ?>"  required="" min="1"> -->
                                <div class="invalid-feedback" id="fprize_no">
                                This value is required
                                </div>
                                
                            </div>
                            <div class="mb-2 col-md-4">
                                <label class="d-block text-font">Name of Prizes<sup class="text-danger">*</sup></label>
                                <input type="text" class="form-control input-font" name="fdetail" id="fdetail" placeholder="Enter Prizes" value="<?php echo set_value('fdetail') ?>" required="">
                                <div class="invalid-feedback">
                                This value is required
                                </div>
                            </div>
                            <div class="mb-2 col-md-4">
                                <label class="d-block">Prize Image</label>
                                <div class="d-flex">
                                <div>
                                    <input type="file" id="fprize_image" name="fprize_image" class="form-control-file" accept="image/png, image/jpeg,image/jpg" onchange="loadfPrizeImage(event)" value="<?php echo set_value('fprize_image') ?>">
                                    <span class="error_text"></span>
                                </div>
                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#fprizeModalConsole" fdprocessedid="3a6f0r">
                                    Preview 
                                </button>
                                </div>
                        </div>
                    </div>
                    <div class="col-md-3 prizes-section mt-2" style="margin-left: -21px;">
                                <h4 class="m-2">Second Prize</h4>
                    </div>
                    <div class="row">
                            <div class="mb-2 col-md-4">
                                <label class="d-block text-font">Number of Prizes</label>
                                <input type="text" class="form-control input-font correct_hide" name="sprize" id="sprize" placeholder="Enter Prizes" value="<?php echo set_value('sprize') ?>" oninput="this.value = this.value.replace(/[^0-9/]/, '')" >
                            </div>
                            <div class="mb-2 col-md-4">
                                <label class="d-block text-font">Name of Prizes</label>
                                <input type="text" class="form-control input-font correct_hide" name="sdetail" id="sdetail" placeholder="Enter Prizes" value="<?php echo set_value('sdetail') ?>" >
                                <div class="invalid-feedback" id="">
                                This value is required
                                </div>
                            </div>
                            <div class="mb-2 col-md-4">
                                <label class="d-block">Prize Image</label>
                                <div class="d-flex">
                                <div>
                                    <input type="file" id="sprize_image" name="sprize_image" class="form-control-file correct_hide" accept="image/png, image/jpeg,image/jpg" onchange="loadsPrizeImage(event)" value="<?php echo set_value('sprize_image') ?>">
                                    <span class="error_text"></span>
                                </div>
                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#sprizeModalConsole" fdprocessedid="3a6f0r">
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
                                <label class="d-block text-font">Number of Prizes</label>
                                <input type="text" class="form-control input-font correct_hide" name="tprize" id="tprize" placeholder="Enter Prizes" value="<?php echo set_value('tprize') ?>" oninput="this.value = this.value.replace(/[^0-9/]/, '')" >
                            </div>
                            <div class="mb-2 col-md-4">
                                <label class="d-block text-font">Name of Prizes</label>
                                <input type="text" class="form-control input-font correct_hide" name="tdetail" id="tdetail" placeholder="Enter Prizes" value="<?php echo set_value('tdetail') ?>" >
                                <div class="invalid-feedback" id="">
                                This value is required
                                </div>
                            </div>
                            <div class="mb-2 col-md-4">
                                <label class="d-block">Prize Image</label>
                                <div class="d-flex">
                                <div>
                                    <input type="file" id="tprize_image" name="tprize_image" class="form-control-file" accept="image/png, image/jpeg,image/jpg" onchange="loadtPrizeImage(event)" value="<?php echo set_value('tprize_image') ?>">
                                    <span class="error_text"></span>
                                </div>
                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#tprizeModalConsole" fdprocessedid="3a6f0r">
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
                                <label class="d-block text-font">Number of Prizes</label>
                                <input type="text" class="form-control input-font correct_hide" name="cprize" id="cprize" placeholder="Enter Prizes" value="<?php echo set_value('cprize') ?>" oninput="this.value = this.value.replace(/[^0-9/]/, '')" >
                            </div>
                            <div class="mb-2 col-md-4">
                                <label class="d-block text-font">Name of Prizes</label>
                                <input type="text" class="form-control input-font correct_hide" name="cdetail" id="cdetail" placeholder="Enter Prizes" value="<?php echo set_value('cdetail') ?>" >
                                <div class="invalid-feedback" id="">
                                This value is required
                                </div>
                            </div>
                            <div class="mb-2 col-md-4">
                                <label class="d-block">Prize Image</label>
                                <div class="d-flex">
                                <div>
                                    <input type="file" id="cprize_image" name="cprize_image" class="form-control-file correct_hide" accept="image/png, image/jpeg,image/jpg" onchange="loadcPrizeImage(event)" value="<?php echo set_value('cprize_image') ?>">
                                    <span class="error_text"></span>
                                </div>
                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#cprizeModalConsole" fdprocessedid="3a6f0r">
                                    Preview 
                                </button>
                                </div>
                        </div>
                    </div>
                    <div class="col-md-12 submit_btn p-3">
                            <!-- <a class="btn btn-success btn-sm text-white" data-bs-toggle="modal" data-bs-target="#submitForm">Submit</a> -->
                            <button onclick="return submitForm(event)" type="submit" class="btn btn-success btn-sm text-white" >Submit</button>
                            <a class="btn btn-danger btn-sm text-white cancel">Cancel</a>
                            <input type="reset" name="Reset" class="btn btn-warning btn-sm text-white">
                    </div>
                </div>
                
                </form>
            </div>
            
        </div>
        
    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
        <div class="modal fade" id="cprizeModalConsole" tabindex="-1" aria-labelledby="cprizeModalConsole" aria-hidden="true">
            <div class="modal-dialog" style="max-width: 700px;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Consolation Prize Image</h5>
                        <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <img id="outputConsol" width="100%" />
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="tprizeModalConsole" tabindex="-1" aria-labelledby="tprizeModalConsole" aria-hidden="true">
            <div class="modal-dialog" style="max-width: 700px;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Third Prize Image</h5>
                        <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <img id="outputConsol1" width="100%" />
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="sprizeModalConsole" tabindex="-1" aria-labelledby="sprizeModalConsole" aria-hidden="true">
            <div class="modal-dialog" style="max-width: 700px;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Second Prize Image</h5>
                        <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <img id="outputConsol2" width="100%" />
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="fprizeModalConsole" tabindex="-1" aria-labelledby="fprizeModalConsole" aria-hidden="true">
            <div class="modal-dialog" style="max-width: 700px;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">First Prize Image</h5>
                        <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <img id="outputConsol3" width="100%" />
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="ThumbnailModal" tabindex="-1" aria-labelledby="ThumbnailModal" aria-hidden="true">
            <div class="modal-dialog" style="max-width: 700px;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Thumbnail Image</h5>
                        <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <img id="thumbnail_img" width="100%" />
                    </div>
                </div>
            </div>
        </div>
 </body>
<script>
    $('#region_id_blk').hide();
    $('#branch_id_blk').hide();
    $('#state_id_blk').hide();
    var loadcPrizeImage = function(event) {
        // $("#outputConsol").show();
        var fileSize = $('#cprize_image')[0].files[0].size;
       var validExtensions = ['jpg', 'jpeg', 'png','JPG', 'JPEG', 'PNG']; //array of valid extensions
        var fileName = $("#cprize_image").val();;
        var fileNameExt = fileName.substr(fileName.lastIndexOf('.') + 1);
                   
            console.log(fileSize);
        if(fileSize < 20480){
            $('#cprize_image').val('');
           // $('#lessSize').modal('show');
           Swal.fire("Image size should be between 20 to 200KB");
        }else if(fileSize > 204800){
            $('#cprize_image').val('');
           // $('#greaterSize').modal('show');
           Swal.fire("Image size should be between 20 to 200KB");
        }else if($.inArray(fileNameExt, validExtensions) == -1){
            $('#cprize_image').val('');
           // $('#invalidfiletype').modal('show');
           Swal.fire("Only jpg,jpeg,png files allowed");
        }

        var outputConsol = document.getElementById('outputConsol');
        outputConsol.src = URL.createObjectURL(event.target.files[0]);
        outputConsol.onload = function() {
            URL.revokeObjectURL(outputConsol.src);
        }
    };

    var loadtPrizeImage = function(event) {
        // $("#outputConsol").show();
        var fileSize = $('#tprize_image')[0].files[0].size;
       var validExtensions = ['jpg', 'jpeg', 'png','JPG', 'JPEG', 'PNG']; //array of valid extensions
        var fileName = $("#tprize_image").val();;
        var fileNameExt = fileName.substr(fileName.lastIndexOf('.') + 1);
                   
            console.log(fileSize);
        if(fileSize < 20480){
            $('#tprize_image').val('');           
           Swal.fire("Image size should be between 20 to 200KB");
        }else if(fileSize > 204800){
            $('#tprize_image').val('');           
           Swal.fire("Image size should be between 20 to 200KB");
        }else if($.inArray(fileNameExt, validExtensions) == -1){
            $('#tprize_image').val('');           
           Swal.fire("Only jpg,jpeg,png files allowed");
        }

        var outputConsol = document.getElementById('outputConsol1');
        outputConsol.src = URL.createObjectURL(event.target.files[0]);
        outputConsol.onload = function() {
            URL.revokeObjectURL(outputConsol.src);
        }
    };

    var loadsPrizeImage = function(event) {
        // $("#outputConsol").show();
        var fileSize = $('#sprize_image')[0].files[0].size;
       var validExtensions = ['jpg', 'jpeg', 'png','JPG', 'JPEG', 'PNG']; //array of valid extensions
        var fileName = $("#sprize_image").val();;
        var fileNameExt = fileName.substr(fileName.lastIndexOf('.') + 1);
                   
            console.log(fileSize);
        if(fileSize < 20480){
            $('#sprize_image').val('');           
           Swal.fire("Image size should be between 20 to 200KB");
        }else if(fileSize > 204800){
            $('#sprize_image').val('');           
           Swal.fire("Image size should be between 20 to 200KB");
        }else if($.inArray(fileNameExt, validExtensions) == -1){
            $('#sprize_image').val('');           
           Swal.fire("Only jpg,jpeg,png files allowed");
        }

        var outputConsol = document.getElementById('outputConsol2');
        outputConsol.src = URL.createObjectURL(event.target.files[0]);
        outputConsol.onload = function() {
            URL.revokeObjectURL(outputConsol.src);
        }
    };
    var loadfPrizeImage = function(event) {
        // $("#outputConsol").show();
        var fileSize = $('#fprize_image')[0].files[0].size;
       var validExtensions = ['jpg', 'jpeg', 'png','JPG', 'JPEG', 'PNG']; //array of valid extensions
        var fileName = $("#fprize_image").val();;
        var fileNameExt = fileName.substr(fileName.lastIndexOf('.') + 1);
                   
            console.log(fileSize);
        if(fileSize < 20480){
            $('#fprize_image').val('');           
           Swal.fire("Image size should be between 20 to 200KB");
        }else if(fileSize > 204800){
            $('#fprize_image').val('');           
           Swal.fire("Image size should be between 20 to 200KB");
        }else if($.inArray(fileNameExt, validExtensions) == -1){
            $('#fprize_image').val('');           
           Swal.fire("Only jpg,jpeg,png files allowed");
        }

        var outputConsol = document.getElementById('outputConsol3');
        outputConsol.src = URL.createObjectURL(event.target.files[0]);
        outputConsol.onload = function() {
            URL.revokeObjectURL(outputConsol.src);
        }
    };

    var loadThumbnail = function(event) {
        // $("#outputConsol").show();
        var fileSize = $('#thumbnail')[0].files[0].size;
       var validExtensions = ['jpg', 'jpeg', 'png','JPG', 'JPEG', 'PNG']; //array of valid extensions
        var fileName = $("#thumbnail").val();;
        var fileNameExt = fileName.substr(fileName.lastIndexOf('.') + 1);
                   
            console.log(fileSize);
        if(fileSize < 20480){
            $('#thumbnail').val('');           
           Swal.fire("Image size should be between 20 to 200KB");
        }else if(fileSize > 204800){
            $('#thumbnail').val('');           
           Swal.fire("Image size should be between 20 to 200KB");
        }else if($.inArray(fileNameExt, validExtensions) == -1){
            $('#thumbnail').val('');           
           Swal.fire("Only jpg,jpeg,png files allowed");
        }

        var outputConsol = document.getElementById('thumbnail_img');
        outputConsol.src = URL.createObjectURL(event.target.files[0]);
        outputConsol.onload = function() {
            URL.revokeObjectURL(outputConsol.src);
        }
    };

    $('#sprize').keyup(function(){
        var count = $(this).val();       
        if(count >= 1){
            $('#sdetail').attr('required',true);           
        }
    })
    $('#tprize').keyup(function(){
        var count1 = $(this).val();       
        if(count1 >= 1){
            $('#tdetail').attr('required',true);           
        }
    })
    $('#cprize').keyup(function(){
        var count2 = $(this).val();       
        if(count2 >= 1){
            $('#cdetail').attr('required',true);           
        }
    })
    $('#quiz_level_id').change(function(){
        var level = $(this).val();   
        // alert(level);    
        if(level=="2"){
            $('#region_id').attr('required',true);           
        }else if(level=="3"){
            $('#branch_id').attr('required',true);
        }else if(level=="4"){
            $('#state_id').attr('required',true);
        }
    })
</script>                          
<script>
        CKEDITOR.replace( 'description' );
        CKEDITOR.replace( 'terms_conditions' );
</script>
<script type="text/javascript">
    window.onload=function(){//from ww  w . j  a  va2s. c  o  m
        var today = new Date().toISOString().split('T')[0];
        document.getElementsByName("start_date")[0].setAttribute('min', today);
        document.getElementsByName("end_date")[0].setAttribute('min', today);
    }
</script>
<script>   
    function submitForm(event){
        $('#competition_reg').addClass('was-validated');
        event.preventDefault();
        var name =$('#name').val();
        var name_hindi =$('#name_hindi').val();
        var start_date =$('#start_date').val();
        var end_date =$('#end_date').val();
        var description = CKEDITOR.instances['description'].getData();
        var terms_conditions = CKEDITOR.instances['terms_conditions'].getData();
        var thumbnail =$('#thumbnail').val();
        var fprizedatail=$('#fdetail').val();
        var quiz_level_id=$('#quiz_level_id').val();
        var available_for = $('#Available').val();
        var score =$('#score').val();
        var fprize =$('#fprize').val();

        var isvalid =true;

        var sprize = $('#sprize').val();
        if(sprize=="" || sprize==0){
            $('#sdetail').attr('required',false);
            
        }else{
            var sdet = $('#sdetail').val();
            if(sdet==""){
                isvalid =false;
            }
           
        }

        var tprize = $('#tprize').val();
        if(tprize=="" || tprize==0){
            $('#tdetail').attr('required',false);
            
        }else{
            $('#tdetail').attr('required',true);
            var tdet = $('#tdetail').val();
            if(tdet==""){
                isvalid =false;
            }
            // isvalid =false;
        }

        var cprize = $('#cprize').val();
        if(cprize=="" || cprize==0){
            $('#cdetail').attr('required',false);
           
        }else{
            // isvalid =false;
            $('#cdetail').attr('required',true);
            var cdet = $('#cdetail').val();
            if(cdet==""){
                isvalid =false;
            }
        }

       
       if(name==""){
        isvalid =false;
       }else{

       }
       if(name_hindi==""){
        isvalid =false;
       }else{

       }
       if(description==""){
        $('#description_error').text('This value is required');
        isvalid =false;
       }else{
        $('#description_error').text('');
       }
       if(terms_conditions==""){
        $('#terms_conditions_error').text('This value is required');
        isvalid =false;
       }else{
        $('#terms_conditions_error').text('');
       }

       if(score=="" || score <= 0){
       $('#err_score').text('Score should be greater than 0');
       
        isvalid =false;
       }else{
        $('#err_score').text('');
       }
       if(thumbnail==""){
        isvalid =false;
       }else{

       }
    //    alert(fprize);
       if(fprize==""){
       $('#fprize_no').text('This value is required');
    //    $('#fprize_no').text('Enter value should be equal or more than 1');
    //    Swal.fire('First prize number should be greater than or equal to 1');
        isvalid =false;
       }else if(fprize < 1){
        $('#fprize_no').text('Enter value should be equal or more than 1');
        Swal.fire('First prize number should be greater than or equal to 1');
        isvalid =false;
       }else{

       }
    if(fprizedatail==""){
       // $('#terms_conditions_error').text('This value is required');
        isvalid =false;
       }else{

       }

       if(start_date==""){
        isvalid =false;
       }else{

       }
       if(end_date==""){
        isvalid =false;
       }else{

       }
// alert(quiz_level_id);
       if(quiz_level_id=="" || quiz_level_id==null){
        isvalid =false;
       }else{
        
       }
       if(quiz_level_id=="2"){        
        var region = $('#region_id').val();   
        if(region=="" || region==null){          
            isvalid =false;
        }
       }else if(quiz_level_id=="3"){
        var branch = $('#branch_id').val();  
        if(branch=="" || branch==null){          
            isvalid =false;
        }
       }else if(quiz_level_id=="4"){
        var state = $('#state_id').val();  
        if(state=="" || state==null){          
            isvalid =false;
        }
       }
    //    alert(isvalid);
// console.log(available_for); alert(available_for);
       if(available_for=="1"){
        checked = $("input[type=checkbox]:checked").length;

        if(!checked) {
            // Swal.fire("You must check at least one checkbox of standard.");
            $('#err_school').text('Please Select atleast one checkbox');
            isvalid =false;
        }else{
            $('#err_school').text('');
        }
       }else{

       }

       if(isvalid){
        Swal.fire({
                    title: 'Are you sure you want to Submit?',
                    showDenyButton: true,
                    showCancelButton: false,
                    confirmButtonText: 'Submit',
                    denyButtonText: `Cancel`,
                    }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {                       
                        // return true;
                        $('#competition_reg').submit();
                       // Swal.fire('Saved!', '', 'success')                                
                    } else if (result.isDenied) {
                        // Swal.fire('Changes are not saved', '', 'info')
                    }
                    })
                }
    }

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
                $("#state_id_blk").hide();
                $("#branch_id_blk").show();
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
            } else if(quiz_level_id == 4){
                $("#region_id_blk").hide();
                $("#branch_id_blk").hide();
                $("#state_id_blk").show();
                $("#state_title").text("State Level");
                var postdata = "id=3";  


            $.ajax({
                url: "<?= base_url() ?>standardswritting/getAllStates",
                data: postdata,
                type: "JSON",
                method: "post",
                success: function(response) {
                    var res = JSON.parse(response);
                    var selectbox = $('#state_id');
                    selectbox.empty();
                    $("#state_id").next(".validation").remove();
                    $('#state_id').append('<option value="" selected disabled>Select State </option>');
                    $.each(res.states, function(index, value) {
                        $('#state_id').append('<option value="' + value.state_id_lgd + '">' + value.state_name + '</option>');
                    });
                }
            });

            }
        });


    // ------------------
    $(document).on("change", "#Available", function(e) {
            e.preventDefault();
            var available_for = $("#Available :selected").val();
            if (available_for == 2) {
                $("#standard").hide();
               // $("#branch_id_blk").hide();
            } else if (available_for == 1) {
                 $("#standard").show();
                // $("#branch_id_blk").hide();
                // $("#region_title").text("Regional Level");
                // var postdata = "id=2";  
            }
        })


    // ------------------
    
$(document).ready(function(){
    $(".timepicker").click(function(){
        $(".bootstrap-timepicker-widget .glyphicon-chevron-up").html("<i class='fa fa-chevron-up' aria-hidden='true'></i>");
    $(".bootstrap-timepicker-widget .glyphicon-chevron-down").html("<i class='fa fa-chevron-down' aria-hidden='true'></i>");
    });
    $(".timepicker").timepicker();
});
$('#standard_check').hide();
$('#Available').on('change',function(){
var id = $(this).val();
//alert(id);
if(id==2){
    $('#standard_check').hide();
}
if(id==1){
    $('#standard_check').show();
    
    checked = $("input[type=checkbox]:checked").length;

        if(!checked) {
            // Swal.fire("You must check at least one checkbox of standard.");
            return false;
        }
}
});
var available =$('#Available').val();
if(available==2){
    $('#standard_check').hide();
}

$('.cancel').click(function(){
    Swal.fire({
                    title: 'Are you sure you want to Cancel?',
                    showDenyButton: true,
                    showCancelButton: false,
                    confirmButtonText: 'Cancel',
                    denyButtonText: `Close`,
                    }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {                       
                        // return true;
                        // $('#competition_reg').submit();
                       // Swal.fire('Saved!', '', 'success')  
                       window.location.replace('<?php echo base_url().'Standardswritting/create_competition_list'; ?>');                              
                    } else if (result.isDenied) {
                        // Swal.fire('Changes are not saved', '', 'info')
                    }
                    })
})
        
</script>