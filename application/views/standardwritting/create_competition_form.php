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
                                <label class="d-block text-font">Name of Competition<sup class="text-danger">*</sup></label>
                                <input type="text" class="form-control input-font" name="name" id="name" placeholder="Enter Name of Competition" value="<?php echo set_value('name') ?>" required="">
                                <span class="error_text" id="err_name"><?php echo form_error('name'); ?></span>
                            </div>
                    </div>
                    <div class="row">
                            <div class="mb-2 col-md-4">
                                <label class="d-block text-font">Name of Competition in Hindi<sup class="text-danger">*</sup></label>
                                <input type="text" class="form-control input-font" name="name_hindi" id="name_hindi" placeholder="Enter Name of Competition" value="<?php echo set_value('name_hindi') ?>" required="">
                                <span class="error_text" id="err_name_hindi"><?php echo form_error('name_hindi'); ?></span>
                            </div>
                    </div>
                    <div class="row">
                        <div class="mb-2 col-md-12">
                             <label class="d-block text-font">Description<sup class="text-danger">*</sup></label>
                             <textarea name="description" id="description"><?php echo set_value('description') ?></textarea>
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
                        </div>
                        <div class="mb-2 col-md-4">
                                <label class="d-block text-font">End Date</label>
                                <input type="date" class="form-control input-font" name="end_date" id="end_date" value="<?php echo set_value('end_date') ?>" required="">
                                <span class="error_text"><?php echo form_error('end_date'); ?></span>
                        </div>
                        <div class="mb-2 col-md-4">
                                <label class="d-block">Upload Thumbnail<sup class="text-danger">*</sup><sup class="text-danger">*</sup></label>
                                <div class="d-flex">
                                <div>
                                    <input type="file" id="thumbnail" name="thumbnail" class="form-control-file" accept="image/png, image/jpeg,image/jpg" onchange="loadThumbnail(event)">
                                    <span class="error_text"></span>
                                </div>
                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#ThumbnailModal" fdprocessedid="3a6f0r">
                                    Preview 
                                </button>
                                </div>
                        </div>
                        <div class="mb-2 col-md-4">
                                <label class="d-block text-font">Level of Competition<sup class="text-danger">*</sup></label>
                                <!-- <select id="Level" name="Level" class="form-control input-font" value="">
                                    <option value="1">All India Level</option>
                                    <option value="2">Regional Level</option>
                                    <option value="2">Branch Level</option>
                                </select> -->
                                <select id="competition_level_id" name="competition_level_id" class="form-control input-font">
                                    <option value="" selected disabled>Select Level of Competition</option>
                                    <?php foreach ($quizlavel as $lavel) { ?>
                                        <option value="<?php echo $lavel['id'] ?>"><?php echo $lavel['title'] ?></option>
                                    <?php } ?>
                                </select>
                                <span class="error_text"><?php echo form_error('quiz_level_id'); ?></span>
                        </div>
                        <div class="mb-2 col-md-4">
                                <label class="d-block text-font">Region<sup class="text-danger">*</sup></label>
                                <select id="Region" name="Region" class="form-control input-font" value="">
                                    <option value="1">All India Level</option>
                                    <option value="2">Regional Level</option>
                                    <option value="2">Branch Level</option>
                                </select>
                        </div>
                        <div class="mb-2 col-md-4">
                                <label class="d-block text-font">Branch<sup class="text-danger">*</sup></label>
                                <select id="Branch" name="Branch" class="form-control input-font" value="">
                                    <option value="1">All India Level</option>
                                    <option value="2">Regional Level</option>
                                    <option value="2">Branch Level</option>
                                </select>
                        </div>
                        <div class="mb-2 col-md-4">
                                <label class="d-block text-font">Available For<sup class="text-danger">*</sup></label>
                                <select id="Available" name="Available" class="form-control input-font" value="">
                                    <option value="1">School</option>
                                    <option value="2">Higher Qualification</option>
                                </select>
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
                                <label class="d-block text-font">Number of Prizes</label>
                                <input type="text" class="form-control input-font" name="fprize" id="fprize" placeholder="Enter Prizes" value="<?php echo set_value('fprize') ?>" oninput="this.value = this.value.replace(/[^0-9/]/, '')" required="">
                            </div>
                            <div class="mb-2 col-md-4">
                                <label class="d-block text-font">Name of Prizes</label>
                                <input type="text" class="form-control input-font" name="fdetail" id="fdetail" placeholder="Enter Prizes" value="<?php echo set_value('fdetail') ?>" required="">
                            </div>
                            <div class="mb-2 col-md-4">
                                <label class="d-block">Prize Image<sup class="text-danger">*</sup></label>
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
                                <input type="text" class="form-control input-font" name="sprize" id="sprize" placeholder="Enter Prizes" value="<?php echo set_value('sprize') ?>" oninput="this.value = this.value.replace(/[^0-9/]/, '')" required="">
                            </div>
                            <div class="mb-2 col-md-4">
                                <label class="d-block text-font">Name of Prizes</label>
                                <input type="text" class="form-control input-font" name="sdetail" id="sdetail" placeholder="Enter Prizes" value="<?php echo set_value('sdetail') ?>" required="">
                            </div>
                            <div class="mb-2 col-md-4">
                                <label class="d-block">Prize Image<sup class="text-danger">*</sup></label>
                                <div class="d-flex">
                                <div>
                                    <input type="file" id="sprize_image" name="sprize_image" class="form-control-file" accept="image/png, image/jpeg,image/jpg" onchange="loadsPrizeImage(event)" value="<?php echo set_value('sprize_image') ?>">
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
                                <input type="text" class="form-control input-font" name="tprize" id="tprize" placeholder="Enter Prizes" value="<?php echo set_value('tprize') ?>" oninput="this.value = this.value.replace(/[^0-9/]/, '')" required="">
                            </div>
                            <div class="mb-2 col-md-4">
                                <label class="d-block text-font">Name of Prizes</label>
                                <input type="text" class="form-control input-font" name="tdetail" id="tdetail" placeholder="Enter Prizes" value="<?php echo set_value('tdetail') ?>" required="">
                            </div>
                            <div class="mb-2 col-md-4">
                                <label class="d-block">Prize Image<sup class="text-danger">*</sup></label>
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
                                <input type="text" class="form-control input-font" name="cprize" id="cprize" placeholder="Enter Prizes" value="<?php echo set_value('cprize') ?>" oninput="this.value = this.value.replace(/[^0-9/]/, '')" required="">
                            </div>
                            <div class="mb-2 col-md-4">
                                <label class="d-block text-font">Name of Prizes</label>
                                <input type="text" class="form-control input-font" name="cdetail" id="cdetail" placeholder="Enter Prizes" value="<?php echo set_value('cdetail') ?>" required="">
                            </div>
                            <div class="mb-2 col-md-4">
                                <label class="d-block">Prize Image<sup class="text-danger">*</sup></label>
                                <div class="d-flex">
                                <div>
                                    <input type="file" id="cprize_image" name="cprize_image" class="form-control-file" accept="image/png, image/jpeg,image/jpg" onchange="loadcPrizeImage(event)" value="<?php echo set_value('cprize_image') ?>">
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
                            <a class="btn btn-danger btn-sm text-white" data-bs-toggle="modal" data-bs-target="#cancelForm">Cancel</a>
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
    var loadcPrizeImage = function(event) {
        // $("#outputConsol").show();
        var outputConsol = document.getElementById('outputConsol');
        outputConsol.src = URL.createObjectURL(event.target.files[0]);
        outputConsol.onload = function() {
            URL.revokeObjectURL(outputConsol.src);
        }
    };

    var loadtPrizeImage = function(event) {
        // $("#outputConsol").show();
        var outputConsol = document.getElementById('outputConsol1');
        outputConsol.src = URL.createObjectURL(event.target.files[0]);
        outputConsol.onload = function() {
            URL.revokeObjectURL(outputConsol.src);
        }
    };

    var loadsPrizeImage = function(event) {
        // $("#outputConsol").show();
        var outputConsol = document.getElementById('outputConsol2');
        outputConsol.src = URL.createObjectURL(event.target.files[0]);
        outputConsol.onload = function() {
            URL.revokeObjectURL(outputConsol.src);
        }
    };
    var loadfPrizeImage = function(event) {
        // $("#outputConsol").show();
        var outputConsol = document.getElementById('outputConsol3');
        outputConsol.src = URL.createObjectURL(event.target.files[0]);
        outputConsol.onload = function() {
            URL.revokeObjectURL(outputConsol.src);
        }
    };

    var loadThumbnail = function(event) {
        // $("#outputConsol").show();
        var outputConsol = document.getElementById('thumbnail_img');
        outputConsol.src = URL.createObjectURL(event.target.files[0]);
        outputConsol.onload = function() {
            URL.revokeObjectURL(outputConsol.src);
        }
    };
</script>                          
<script>
        CKEDITOR.replace( 'description' );
        CKEDITOR.replace( 'terms_conditions' );
</script>
<script>
    function submitForm(event){
        event.preventDefault();
        var name =$('#name').val();
        var name_hindi =$('#name_hindi').val();
        var start_date =$('#start_date').val();
        var end_date =$('#end_date').val();

       var isvalid =true;
       if(name==""){
        isvalid =false;
       }else{

       }
       if(name_hindi==""){
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
</script>