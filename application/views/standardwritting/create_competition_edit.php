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
            <form name="competition_edit" id="competition_edit" action="<?php echo base_url() . 'standardswritting/competition_edit' ?>" method="post" enctype="multipart/form-data">
                <div class="card border-top card-body">
                <div class="row">
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Type of Competition<sup class="text-danger">*</sup></label>
                            <select id="comp_type" name="comp_type" class="form-control input-font" required>
                                <option value="" selected disabled>Select Type of Competition</option>
                                <!-- <?php foreach ($quizlavel as $lavel) { ?>
                                    <option value="<?php echo $lavel['id'] ?>"><?php echo $lavel['title'] ?></option>
                                <?php } ?> -->
                                <option value="1" <?php if($competition['type']==1){echo 'selected'; } ?>>Essay Writing</option>
                                <option value="2" <?php if($competition['type']==2){echo 'selected'; } ?>>Poster Making</option>
                                <option value="3" <?php if($competition['type']==3){echo 'selected'; } ?>>Case Study</option>
                                <option value="4" <?php if($competition['type']==4){echo 'selected'; } ?>>Artical writing</option>
                                <option value="5" <?php if($competition['type']==5){echo 'selected'; } ?>>Paper Writing</option>
                            </select>
                            <div class="invalid-feedback">
                            This value is required
                            </div>
                            <span class="error_text"><?php echo form_error('quiz_level_id'); ?></span>
                        </div>
                </div>
                    <div class="row">
                            <div class="mb-2 col-md-12">
                                <label class="d-block text-font">Name of Competition</label>
                                <input type="text" class="form-control input-font" name="name" id="name" placeholder="Enter Name of Competition" value="<?php echo $competition['competiton_name']; ?>" required="">
                                <span class="error_text" id="err_name"><?php echo form_error('name'); ?></span>
                                <input type="hidden" name="comp_id" value="<?php echo $competition['comp_id']; ?>">
                            </div>
                    </div>
                    <div class="row">
                            <div class="mb-2 col-md-12">
                                <label class="d-block text-font">Name of Competition in Hindi</label>
                                <input type="text" class="form-control input-font" name="name_hindi" id="name_hindi" placeholder="Enter Name of Competition" value="<?php echo $competition['competition_hindi_name']; ?>" required="">
                                <span class="error_text" id="err_name_hindi"><?php echo form_error('name_hindi'); ?></span>
                            </div>
                    </div>
                    <div class="row">
                        <div class="mb-2 col-md-12">
                             <label class="d-block text-font">Description</label>
                             <textarea name="description" id="description"><?php echo $competition['description']; ?></textarea>
                             <div class='validation' id="description_error" style='color:red;margin-bottom:15px;'> </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-2 col-md-12">
                             <label class="d-block text-font">Terms & Conditions</label>
                             <textarea name="terms_conditions" id="terms_conditions"><?php echo $competition['terms_condition']; ?></textarea>
                             <div class='validation' id="terms_conditions_error" style='color:red;margin-bottom:15px;'> </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-2 col-md-4">
                                <label class="d-block text-font">Start Date</label>
                                <input type="date" class="form-control input-font" name="start_date" id="start_date" value="<?php echo $competition['start_date']; ?>" required="">
                                <span class="error_text"><?php echo form_error('start_date'); ?></span>
                        </div>
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Start Time<sup class="text-danger">*</sup></label>
                            <input type="time" class="form-control input-font" name="start_time" id="start_time" placeholder="Select Date" value="<?php echo set_value('start_time', $competition['start_time']); ?>">
                            <span class="error_text"><?php echo form_error('start_time'); ?></span>
                        </div>
                        <div class="mb-2 col-md-4">
                           
                        </div>
                        <div class="mb-2 col-md-4">
                                <label class="d-block text-font">End Date</label>
                                <input type="date" class="form-control input-font" name="end_date" id="end_date" value="<?php echo $competition['end_date']; ?>" required="">
                                <span class="error_text"><?php echo form_error('end_date'); ?></span>
                        </div>
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font"> End Time<sup class="text-danger">*</sup></label>
                            <input type="time" class="form-control input-font" name="end_time" id="end_time" placeholder="Select Date" value="<?php echo set_value('end_time', $competition['end_time']); ?>">
                            <span class="error_text"><?php echo form_error('end_time'); ?></span>
                        </div>
                        <div class="mb-2 col-md-4">
                           
                        </div>
                        <div class="mb-2 col-md-4">
                                <label class="d-block text-font">Upload Thumbnail<sup class="text-danger">*</sup></label>
                                <!-- <div class="d-flex">
                                <div>
                                    <input type="file" id="thumbnail" name="thumbnail" class="form-control-file" accept="image/png, image/jpeg,image/jpg" onchange="loadThumbnail(event)">
                                    <span class="error_text"></span>
                                </div>
                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#ThumbnailModal" fdprocessedid="3a6f0r">
                                    Preview 
                                </button>
                                </div> -->
                                <div class="active" id="thumbnaildelete_preview" p-id="<?php echo $competition['thumbnail']; ?>">
                                    <button class="btn btn-danger btn-sm thumbnaildel_icon">Delete</button>
                                    <button type="button" id="preview" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#thumbnailexampleModal">
                                        Preview 
                                    </button>                               <!-- Modal -->
                                        <div class="modal fade" id="thumbnailexampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" style="max-width:700px;">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Image Preview</h5>

                                                <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                                </button>
                                                </div>
                                                <div class="modal-body">
                                                <img src="<?php echo base_url(); ?><?php echo $competition['thumbnail']; ?>" id="outputicon" width="100%"/>
                                                </div>
                                            </div>
                                            </div>
                                        </div>  
                                </div>
                                <div class="row" id="thumbnailadd_file">
                                    <div class="col-9">
                                        <input type="file" class="form-control input-font" name="thumbnail" id="thumbnailicon_file" value=""  accept="image/*" onchange="loadFileThumbnail(event)">
                                        <input type="hidden" class="form-control input-font" name="thumbnailold_image" id="fimage" value="<?php echo $competition['thumbnail']; ?>">
                                        <input type="hidden" id="id" name="id" value="<?php  ?>" >
                                        <span class="text-danger" id="thumbnailerr_icon_file">
                                            <?php //echo form_error('title'); 
                                            ?>
                                        </span>
                                    </div>
                                    <button type="button" class="btn btn-primary btn-sm mb-4" data-bs-toggle="modal" data-bs-target="#ThumbnailPreviewimg"> Preview </button>
                                </div>
                        </div>
                        <div class="mb-2 col-md-4">
                        <label class="d-block text-font">Total Marks<sup class="text-danger">*</sup></label>
                        <input type="text" class="form-control input-font" name="score" id="score" placeholder="Total Marks" value="<?php echo set_value('end_time', $competition['score']); ?>">
                            <span class="error_text"><?php echo form_error('score'); ?></span>
                        </div>
                        <!-- <div class="mb-2 col-md-4">
                                <label class="d-block text-font">Level of Competition<sup class="text-danger">*</sup></label>
                                <select id="Level" name="Level" class="form-control input-font" value="<?php echo $competition['comp_level']; ?>">
                                    <option value="1">All India Level</option>
                                    <option value="2">Regional Level</option>
                                    <option value="2">Branch Level</option>
                                </select>
                        </div>
                        <div class="mb-2 col-md-4">
                                <label class="d-block text-font">Region<sup class="text-danger">*</sup></label>
                                <select id="Region" name="Region" class="form-control input-font" value="<?php echo $competition['region']; ?>">
                                    <option value="1">All India Level</option>
                                    <option value="2">Regional Level</option>
                                    <option value="2">Branch Level</option>
                                </select>
                        </div>
                        <div class="mb-2 col-md-4">
                                <label class="d-block text-font">Branch<sup class="text-danger">*</sup></label>
                                <select id="Branch" name="Branch" class="form-control input-font" value="<?php echo $competition['branch']; ?>">
                                    <option value="1">All India Level</option>
                                    <option value="2">Regional Level</option>
                                    <option value="2">Branch Level</option>
                                </select>
                        </div> -->
                        <div class="row col-12">
                            <div class="mb-2 col-md-4">
                                <label class="d-block text-font">Level of Competition<sup class="text-danger">*</sup></label>
                                <select id="quiz_level_id" name="Level" class="form-control input-font"  required>
                                    
                                    <?php foreach ($quizlavel as $lavel) { ?>
                                        <option value="<?php echo $lavel['id'] ?>"<?php if ($competition['comp_level'] == $lavel['id']) echo "selected"; ?>><?php echo $lavel['title'] ?></option>
                                    <?php } ?>
                                </select>
                                <div class="invalid-feedback">
                                This value is required
                                </div>
                                <span class="error_text"><?php echo form_error('quiz_level_id'); ?></span>
                            </div>
                            <?php if (!empty($getAllRegions)) { ?>
                            <div class="mb-2 col-md-4" id="region_id_blk">
                                <label class="d-block text-font" id="region_title">Regional Level<sup class="text-danger">*</sup></label>
                                <select id="region_id" name="Region" class="form-control input-font" value="<?php echo $competition['region']; ?>">
                                <?php
                                foreach ($getAllRegions as $region) { ?>
                                <option <?php if ($competition['region'] == $region['pki_region_id']) echo "selected"; ?> value="<?php echo $region['pki_region_id'] ?>"> <?php echo $region['uvc_region_title']; ?> </option>
                                <?php
                                } ?>
                                </select>
                                <span class="error_text"><?php echo form_error('region_id'); ?></span>

                            </div>
                            <?php  }else{ ?>
                                <div class="mb-2 col-md-4" id="region_id_blk" <?php if($competition['region']=='0' || $competition['region']==null){ echo 'Style="display:none;"'; } ?>>
                                <label class="d-block text-font" id="region_title">Regional Level<sup class="text-danger">*</sup></label>
                                <select id="region_id" name="Region" class="form-control input-font" value="<?php echo $competition['region']; ?>">
                                <?php
                                foreach ($getAllRegions as $region) { ?>
                                <option <?php if ($competition['region'] == $region['pki_region_id']) echo "selected"; ?> value="<?php echo $region['pki_region_id'] ?>"> <?php echo $region['uvc_region_title']; ?> </option>
                                <?php
                                } ?>
                                </select>
                                <span class="error_text"><?php echo form_error('region_id'); ?></span>

                            </div>

                                
                            <?php } ?>
                            <?php if (!empty($getAllBranches)) { ?>
                            <div class="mb-2 col-md-4" id="branch_id_blk">
                                <label class="d-block text-font" id="branch_title">Branch<sup class="text-danger">*</sup></label>
                                <select id="branch_id" name="Branch" class="form-control input-font" value="<?php echo $competition['branch']; ?>">
                                <?php
                                foreach ($getAllBranches as $branch) { ?>
                                <option <?php if ($competition['branch'] == $branch['pki_id']) echo "selected"; ?> value="<?php echo $branch['pki_id'] ?>"> <?php echo $branch['uvc_department_name']; ?> </option>
                                <?php } ?>
                                </select>
                                <span class="error_text"><?php echo form_error('branch_id'); ?></span>

                            </div>
                            <?php }else{?>
                                <div class="mb-2 col-md-4" <?php if($competition['branch']=='0' || $competition['branch']==null){ echo 'Style="display:none;"'; } ?> id="branch_id_blk">
                                <label class="d-block text-font" id="branch_title">Branch<sup class="text-danger">*</sup></label>
                                <select id="branch_id" name="branch_id" class="form-control input-font" value="<?php echo $competition['branch']; ?>">
                                
                                </select>
                                <span class="error_text"><?php echo form_error('branch_id'); ?></span>

                            </div>
                            <?php } ?>

                            <?php if (!empty($getAllStates)) { ?>
                            <div class="mb-2 col-md-4" id="state_id_blk">
                                <label class="d-block text-font" id="state_title">State<sup class="text-danger">*</sup></label>
                                <select id="state_id" name="state" class="form-control input-font" value="<?php echo $competition['state']; ?>">
                                <?php
                                foreach ($getAllStates as $branch) { ?>
                                <option <?php if ($competition['state'] == $branch['state_id_lgd']) echo "selected"; ?> value="<?php echo $branch['state_id_lgd'] ?>"> <?php echo $branch['state_name']; ?> </option>
                                <?php } ?>
                                </select>
                                <span class="error_text"><?php echo form_error('branch_id'); ?></span>

                            </div>
                            <?php }else{?>
                                <div class="mb-2 col-md-4" <?php if($competition['state']=='0' || $competition['state']==null){ echo 'Style="display:none;"'; } ?> id="state_id_blk">
                                <label class="d-block text-font" id="state_title">Branch<sup class="text-danger">*</sup></label>
                                <select id="state_id" name="state" class="form-control input-font" value="<?php echo $competition['state']; ?>">
                                
                                </select>
                                <span class="error_text"><?php echo form_error('state_id'); ?></span>

                            </div>
                            <?php } ?>

                        </div>
                        <div class="mb-2 col-md-4">
                                <label class="d-block text-font">Available For<sup class="text-danger">*</sup></label>
                                <select id="Available" name="Available" class="form-control input-font" >
                                    <option value="1" <?php if($competition['available_for']=='1'){ echo 'selected'; } ?> >School</option>
                                    <option value="2" <?php if($competition['available_for']=='2'){ echo 'selected'; } ?> >Higher Qualification</option>
                                </select>
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
                        <?php if ($competition['standard'] != 0) { 
                  $std = explode(',',$competition['standard'] );


                }else{
                  $std = array(0);
                } ?>
              <div class="mb-2 col-8" id="standard_check">
                        <label class="d-block text-font">Standard<sup class="text-danger">*</sup></label>
                                <div class="d-flex">
                                    <div class="custom-control custom-checkbox mr-3">

                                        <input type="checkbox" value="9"name="standard[]"
                                        <?php if (in_array(9,$std)) {echo "checked";}?>
                                          class="custom-control-input"  id="Standard_1"  >
                                        <label class="custom-control-label" for="Standard_1">9<sup>th</sup>Standard</label>
                                    </div>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="10"name="standard[]"   <?php if (in_array(10,$std)) {echo "checked";}?> class="custom-control-input"  id="Standard_2"  >
                                        <label class="custom-control-label" for="Standard_2">10<sup>th</sup>Standard</label>
                                    </div>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="11"name="standard[]"   <?php if (in_array(11,$std)) {echo "checked";}?> class="custom-control-input"  id="Standard_3"  >
                                        <label class="custom-control-label" for="Standard_3">11<sup>th</sup>Standard</label>
                                    </div>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="12" name="standard[]"   <?php if (in_array(12,$std)) {echo "checked";}?> class="custom-control-input"  id="Standard_4">
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
                                <label class="d-block text-font">Number of Prizes</label>
                                <input type="text" class="form-control input-font" name="fprize" id="fprize" placeholder="Enter Prizes" value="<?php echo $competition['fprize_no']; ?>" oninput="this.value = this.value.replace(/[^0-9/]/, '')" required="">
                            </div>
                            <div class="mb-2 col-md-4">
                                <label class="d-block text-font">Name of Prizes</label>
                                <input type="text" class="form-control input-font" name="fdetail" id="fdetail" placeholder="Enter Prizes" value="<?php echo $competition['fprize_name']; ?>" required="">
                            </div>
                            <div class="mb-2 col-md-4">
                                <label class="d-block">Prize Image<sup class="text-danger">*</sup></label>
                                <!-- <div class="d-flex">
                                <div>
                                    <input type="file" id="fprize_image" name="fprize_image" class="form-control-file" accept="image/png, image/jpeg,image/jpg" onchange="loadfPrizeImage(event)" value="<?php echo set_value('fprize_image') ?>">
                                    <span class="error_text"></span>
                                </div>
                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#fprizeModalConsole" fdprocessedid="3a6f0r">
                                    Preview 
                                </button>
                                </div> -->
                                <div class="active" id="fdelete_preview" p-id="<?php echo $competition['fprize_image']; ?>">
                                    <button class="btn btn-danger btn-sm fdel_icon">Delete</button>
                                    <button type="button" id="preview" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#fexampleModal">
                                        Preview 
                                    </button>                               <!-- Modal -->
                                        <div class="modal fade" id="fexampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" style="max-width:700px;">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Image Preview</h5>

                                                <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                                </button>
                                                </div>
                                                <div class="modal-body">
                                                <img src="<?php echo base_url(); ?><?php echo $competition['fprize_image']; ?>" id="outputicon" width="100%"/>
                                                </div>
                                            </div>
                                            </div>
                                        </div>  
                                </div>
                                <div class="row" id="fadd_file">
                                    <div class="col-9">
                                        <input type="file" class="form-control input-font" name="fprize_image" id="ficon_file" value=""  accept="image/*" onchange="loadFileFirst(event)">
                                        <input type="hidden" class="form-control input-font" name="fold_image" id="fimage" value="<?php echo $competition['fprize_image']; ?>">
                                        <input type="hidden" id="id" name="id" value="<?php  ?>" >
                                        <span class="text-danger" id="ferr_icon_file">
                                            <?php //echo form_error('title'); 
                                            ?>
                                        </span>
                                    </div>
                                    <button type="button" class="btn btn-primary btn-sm mb-4" data-bs-toggle="modal" data-bs-target="#FirstPrizePreviewimg"> Preview </button>
                                </div>
                        </div>
                    </div>
                    <div class="col-md-3 prizes-section mt-2" style="margin-left: -21px;">
                                <h4 class="m-2">Second Prize</h4>
                    </div>
                    <div class="row">
                            <div class="mb-2 col-md-4">
                                <label class="d-block text-font">Number of Prizes</label>
                                <input type="text" class="form-control input-font" name="sprize" id="sprize" placeholder="Enter Prizes" value="<?php echo $competition['sprize_no']; ?>" oninput="this.value = this.value.replace(/[^0-9/]/, '')" required="">
                            </div>
                            <div class="mb-2 col-md-4">
                                <label class="d-block text-font">Name of Prizes</label>
                                <input type="text" class="form-control input-font" name="sdetail" id="sdetail" placeholder="Enter Prizes" value="<?php echo $competition['sprize_name']; ?>" required="">
                            </div>
                            <div class="mb-2 col-md-4">
                                <label class="d-block">Prize Image<sup class="text-danger">*</sup></label>
                                <!-- <div class="d-flex">
                                <div>
                                    <input type="file" id="sprize_image" name="sprize_image" class="form-control-file" accept="image/png, image/jpeg,image/jpg" onchange="loadsPrizeImage(event)" value="<?php echo set_value('sprize_image') ?>">
                                    <span class="error_text"></span>
                                </div>
                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#sprizeModalConsole" fdprocessedid="3a6f0r">
                                    Preview 
                                </button>
                                </div> -->
                                <div class="active" id="sdelete_preview" p-id="<?php echo $competition['sprize_image']; ?>">
                                    <button class="btn btn-danger btn-sm sdel_icon">Delete</button>
                                    <button type="button" id="preview" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#sexampleModal">
                                        Preview 
                                    </button>                               <!-- Modal -->
                                        <div class="modal fade" id="sexampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" style="max-width:700px;">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Image Preview</h5>

                                                <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                                </button>
                                                </div>
                                                <div class="modal-body">
                                                <img src="<?php echo base_url(); ?><?php echo $competition['sprize_image']; ?>" id="outputicon" width="100%"/>
                                                </div>
                                            </div>
                                            </div>
                                        </div>  
                                </div>
                                <div class="row" id="sadd_file">
                                    <div class="col-9">
                                        <input type="file" class="form-control input-font" name="sprize_image" id="sicon_file" value=""  accept="image/*" onchange="loadFileSecond(event)">
                                        <input type="hidden" class="form-control input-font" name="sold_image" id="simage" value="<?php echo $competition['sprize_image']; ?>">
                                        <input type="hidden" id="id" name="id" value="<?php  ?>" >
                                        <span class="text-danger" id="serr_icon_file">
                                            <?php //echo form_error('title'); 
                                            ?>
                                        </span>
                                    </div>
                                    <button type="button" class="btn btn-primary btn-sm mb-4" data-bs-toggle="modal" data-bs-target="#SecondPrizePreviewimg"> Preview </button>
                                </div> 
                        </div>
                    </div>
                    <div class="col-md-3 prizes-section mt-2" style="margin-left: -21px;">
                                <h4 class="m-2">Third Prize</h4>
                    </div>
                    <div class="row">
                            <div class="mb-2 col-md-4">
                                <label class="d-block text-font">Number of Prizes</label>
                                <input type="text" class="form-control input-font" name="tprize" id="tprize" placeholder="Enter Prizes" value="<?php echo $competition['tprize_no']; ?>" oninput="this.value = this.value.replace(/[^0-9/]/, '')" required="">
                            </div>
                            <div class="mb-2 col-md-4">
                                <label class="d-block text-font">Name of Prizes</label>
                                <input type="text" class="form-control input-font" name="tdetail" id="tdetail" placeholder="Enter Prizes" value="<?php echo $competition['tprize_name']; ?>" required="">
                            </div>
                            <div class="mb-2 col-md-4">
                                <label class="d-block">Prize Image<sup class="text-danger">*</sup></label>
                                <!-- <div class="d-flex">
                                <div>
                                    <input type="file" id="tprize_image" name="tprize_image" class="form-control-file" accept="image/png, image/jpeg,image/jpg" onchange="loadtPrizeImage(event)" value="<?php echo set_value('tprize_image') ?>">
                                    <span class="error_text"></span>
                                </div>
                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#tprizeModalConsole" fdprocessedid="3a6f0r">
                                    Preview 
                                </button>
                                </div> -->
                                <div class="active" id="tdelete_preview" p-id="<?php echo $competition['tprize_image']; ?>">
                                    <button class="btn btn-danger btn-sm tdel_icon">Delete</button>
                                    <button type="button" id="preview" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#texampleModal">
                                        Preview 
                                    </button>                               <!-- Modal -->
                                        <div class="modal fade" id="texampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" style="max-width:700px;">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Image Preview</h5>

                                                <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                                </button>
                                                </div>
                                                <div class="modal-body">
                                                <img src="<?php echo base_url(); ?><?php echo $competition['tprize_image']; ?>" id="outputicon" width="100%"/>
                                                </div>
                                            </div>
                                            </div>
                                        </div>  
                                </div>
                                <div class="row" id="tadd_file">
                                    <div class="col-9">
                                        <input type="file" class="form-control input-font" name="tprize_image" id="ticon_file" value=""  accept="image/*" onchange="loadFileThird(event)">
                                        <input type="hidden" class="form-control input-font" name="told_image" id="timage" value="<?php echo $competition['tprize_image']; ?>">
                                        <input type="hidden" id="id" name="id" value="<?php  ?>" >
                                        <span class="text-danger" id="terr_icon_file">
                                            <?php //echo form_error('title'); 
                                            ?>
                                        </span>
                                    </div>
                                    <button type="button" class="btn btn-primary btn-sm mb-4" data-bs-toggle="modal" data-bs-target="#ThirdPrizePreviewimg"> Preview </button>
                                </div> 
                        </div>
                    </div>
                    <div class="col-md-3 prizes-section mt-2" style="margin-left: -21px;">
                                <h4 class="m-2">Consolation Prize</h4>
                    </div>
                    <div class="row">
                            <div class="mb-2 col-md-4">
                                <label class="d-block text-font">Number of Prizes</label>
                                <input type="text" class="form-control input-font" name="cprize" id="cprize" placeholder="Enter Prizes" value="<?php echo $competition['cprize_no']; ?>" oninput="this.value = this.value.replace(/[^0-9/]/, '')" required="">
                            </div>
                            <div class="mb-2 col-md-4">
                                <label class="d-block text-font">Name of Prizes</label>
                                <input type="text" class="form-control input-font" name="cdetail" id="cdetail" placeholder="Enter Prizes" value="<?php echo $competition['cprize_name']; ?>" required="">
                            </div>
                            <div class="mb-2 col-md-4">
                                <label class="d-block">Prize Image<sup class="text-danger">*</sup></label>
                                <!-- <div class="d-flex">
                                <div>
                                    <input type="file" id="cprize_image" name="cprize_image" class="form-control-file" accept="image/png, image/jpeg,image/jpg" onchange="loadcPrizeImage(event)" value="<?php echo set_value('cprize_image') ?>">
                                    <span class="error_text"></span>
                                </div>
                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#cprizeModalConsole" fdprocessedid="3a6f0r">
                                    Preview 
                                </button>
                                </div> -->

                                
                                <div class="active" id="cdelete_preview" p-id="<?php echo $competition['cprize_image']; ?>">
                                    <button class="btn btn-danger btn-sm cdel_icon">Delete</button>
                                    <button type="button" id="preview" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        Preview 
                                    </button>                               <!-- Modal -->
                                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" style="max-width:700px;">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Image Preview</h5>

                                                <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                                </button>
                                                </div>
                                                <div class="modal-body">
                                                <img src="<?php echo base_url(); ?><?php echo $competition['cprize_image']; ?>" id="outputicon" width="100%"/>
                                                </div>
                                            </div>
                                            </div>
                                        </div>  
                                </div>
                                <div class="row" id="cadd_file">
                                    <div class="col-9">
                                        <input type="file" class="form-control input-font" name="cprize_image" id="cicon_file" value=""  accept="image/*" onchange="loadFileConsolidated(event)">
                                        <input type="hidden" class="form-control input-font" name="cold_image" id="cimage" value="<?php echo $competition['cprize_image']; ?>">
                                        <input type="hidden" id="id" name="id" value="<?php  ?>" >
                                        <span class="text-danger" id="cerr_icon_file">
                                            <?php //echo form_error('title'); 
                                            ?>
                                        </span>
                                    </div>
                                    <button type="button" class="btn btn-primary btn-sm mb-4" data-bs-toggle="modal" data-bs-target="#ConsolidatedPrizePreviewimg"> Preview </button>
                                </div> 
                        </div>
                    </div>
                    <div class="col-md-12 submit_btn p-3">
                            <!-- <a class="btn btn-success btn-sm text-white" data-bs-toggle="modal" data-bs-target="#submitForm">Update</a> -->
                            <button onclick="return updateCompetition(event)" type="submit" class="btn btn-success btn-sm text-white" >Update</button>
                            <a class="btn btn-danger btn-sm text-white cancel" >Cancel</a>
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
 </body>
 <div class="modal fade" id="ThumbnailPreviewimg" tabindex="-1" aria-labelledby="PreviewimgLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width:700px;">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="PreviewimgLabel">New Uploaded Thumbnail Image Preview</h5>
        <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span></button>
        </div>
        <div class="modal-body">
        <img id="outputThumbnail" width="100%"/>
        </div>        
    </div>
    </div>
</div>
<div class="modal fade" id="FirstPrizePreviewimg" tabindex="-1" aria-labelledby="PreviewimgLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width:700px;">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="PreviewimgLabel">New Uploaded First Prize Image Preview</h5>
        <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span></button>
        </div>
        <div class="modal-body">
        <img id="outputThumbnailFirst" width="100%"/>
        </div>        
    </div>
    </div>
</div>
<div class="modal fade" id="SecondPrizePreviewimg" tabindex="-1" aria-labelledby="PreviewimgLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width:700px;">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="PreviewimgLabel">New Uploaded Second Prize Image Preview</h5>
        <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span></button>
        </div>
        <div class="modal-body">
        <img id="outputThumbnailSecond" width="100%"/>
        </div>        
    </div>
    </div>
</div>
<div class="modal fade" id="ThirdPrizePreviewimg" tabindex="-1" aria-labelledby="PreviewimgLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width:700px;">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="PreviewimgLabel">New Uploaded Third Prize Image Preview</h5>
        <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span></button>
        </div>
        <div class="modal-body">
        <img id="outputThumbnailThird" width="100%"/>
        </div>        
    </div>
    </div>
</div>
<div class="modal fade" id="ConsolidatedPrizePreviewimg" tabindex="-1" aria-labelledby="PreviewimgLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width:700px;">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="PreviewimgLabel">New Uploaded Consolidated Prize Image Preview</h5>
        <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span></button>
        </div>
        <div class="modal-body">
        <img id="outputThumbnailConsolidated" width="100%"/>
        </div>        
    </div>
    </div>
</div>
 <style>
    .error_text{
        color: red;
    }
 </style>                               
<script>
        CKEDITOR.replace( 'description' );
        CKEDITOR.replace( 'terms_conditions' );
</script>
<script>
    $(document).ready(function(){
      var cimg = $('#cdelete_preview').attr('p-id');
      if(cimg==""){
        $('#cdelete_preview').hide();
                                $('#cadd_file').show();
                                // $('#icon_file').add('attr','required');
                                $('#cicon_file').attr('required',true);
      }else{
        $('#cdelete_preview').show();
                    $('#cadd_file').hide();
                    $('#icon_file').attr('required',false);
      }
        // $('#cdelete_preview').show();
        //             $('#cadd_file').hide();
        //             $('#icon_file').attr('required',false);
        //             // $('#outputicon').attr('src',)
            $('.cdel_icon').on('click',function(){
                                $('#cdelete_preview').hide();
                                $('#cadd_file').show();
                                // $('#icon_file').add('attr','required');
                                $('#cicon_file').attr('required',true);
            });


            var timg = $('#tdelete_preview').attr('p-id');
      if(timg==""){
        $('#tdelete_preview').hide();
                                $('#tadd_file').show();
                                // $('#icon_file').add('attr','required');
                                $('#ticon_file').attr('required',true);
      }else{
        $('#tdelete_preview').show();
                    $('#tadd_file').hide();
                    $('#ticon_file').attr('required',false);
      }
      
        $('.tdel_icon').on('click',function(){
                            $('#tdelete_preview').hide();
                            $('#tadd_file').show();
                            // $('#icon_file').add('attr','required');
                            $('#ticon_file').attr('required',true);
        });
 
    // });


    var simg = $('#sdelete_preview').attr('p-id');
      if(simg==""){
        $('#sdelete_preview').hide();
                                $('#sadd_file').show();
                                // $('#icon_file').add('attr','required');
                                $('#sicon_file').attr('required',true);
      }else{
        $('#sdelete_preview').show();
                    $('#sadd_file').hide();
                    $('#sicon_file').attr('required',false);
      }
      
    $('.sdel_icon').on('click',function(){
                        $('#sdelete_preview').hide();
                        $('#sadd_file').show();
                        // $('#icon_file').add('attr','required');
                        $('#sicon_file').attr('required',true);
    });

    var fimg = $('#fdelete_preview').attr('p-id');
      if(fimg==""){
        $('#fdelete_preview').hide();
                                $('#fadd_file').show();
                                // $('#icon_file').add('attr','required');
                                $('#ficon_file').attr('required',true);
      }else{
        $('#fdelete_preview').show();
                    $('#fadd_file').hide();
                    $('#ficon_file').attr('required',false);
      }
      
    $('.fdel_icon').on('click',function(){
                        $('#fdelete_preview').hide();
                        $('#fadd_file').show();
                        // $('#icon_file').add('attr','required');
                        $('#ficon_file').attr('required',true);
    });

    var thumbnailimg = $('#thumbnaildelete_preview').attr('p-id');
      if(thumbnailimg==""){
        $('#thumbnaildelete_preview').hide();
                                $('#thumbnailadd_file').show();
                                // $('#icon_file').add('attr','required');
                                $('#thumbnailicon_file').attr('required',true);
      }else{
        $('#thumbnaildelete_preview').show();
                    $('#thumbnailadd_file').hide();
                    $('#thumbnailicon_file').attr('required',false);
      }
      
    $('.thumbnaildel_icon').on('click',function(){
                        $('#thumbnaildelete_preview').hide();
                        $('#thumbnailadd_file').show();
                        // $('#icon_file').add('attr','required');
                        $('#thumbnailicon_file').attr('required',true);
    });
 
    });




    var loadFileThumbnail = function (event){
        var fileSize = $('#thumbnailicon_file')[0].files[0].size;
       var validExtensions = ['jpg', 'jpeg', 'png']; //array of valid extensions
        var fileName = $("#thumbnailicon_file").val();
        var fileNameExt = fileName.substr(fileName.lastIndexOf('.') + 1);
                   
            console.log(fileSize);
        if(fileSize < 20000){
            $('#thumbnailicon_file').val('');           
            $('#thumbnailerr_icon_file').text('This value is required');
            Swal.fire('File size should be greater than 20KB');
        }else if(fileSize > 204800){
            $('#thumbnailicon_file').val('');
            // $('#greaterSize').modal('show');
            Swal.fire('File size should be less than 200KB')
            $('#thumbnailerr_icon_file').text('This value is required');
        }else if($.inArray(fileNameExt, validExtensions) == -1){
            $('#thumbnailicon_file').val('');
            // $('#invalidfiletype').modal('show');
            Swal.fire('Only jpg,jpeg,png allowed')
            $('#thumbnailerr_icon_file').text('This value is required');
        }else{
            $('#thumbnailerr_icon_file').text('');
        }
       //  $("#Previewimg").show();
        var outputThumbnail = document.getElementById('outputThumbnail');
        
        outputThumbnail.src = URL.createObjectURL(event.target.files[0]);
        console.log(outputThumbnail.src);
        outputThumbnail.onload = function()
        {
            URL.revokeObjectURL(outputThumbnail.src);
        }
    }

    var loadFileFirst = function (event){
        var fileSize = $('#ficon_file')[0].files[0].size;
       var validExtensions = ['jpg', 'jpeg', 'png']; //array of valid extensions
        var fileName = $("#ficon_file").val();
        var fileNameExt = fileName.substr(fileName.lastIndexOf('.') + 1);
                   
            console.log(fileSize);
        if(fileSize < 20000){
            $('#ficon_file').val('');           
            $('#ferr_icon_file').text('This value is required');
            Swal.fire('File size should be greater than 20KB');
        }else if(fileSize > 204800){
            $('#ficon_file').val('');
            // $('#greaterSize').modal('show');
            Swal.fire('File size should be less than 200KB')
            $('#ferr_icon_file').text('This value is required');
        }else if($.inArray(fileNameExt, validExtensions) == -1){
            $('#ficon_file').val('');
            // $('#invalidfiletype').modal('show');
            Swal.fire('Only jpg,jpeg,png allowed')
            $('#ferr_icon_file').text('This value is required');
        }else{
            $('#ferr_icon_file').text('');
        }
       //  $("#Previewimg").show();
        var outputThumbnail = document.getElementById('outputThumbnailFirst');
        
        outputThumbnail.src = URL.createObjectURL(event.target.files[0]);
        console.log(outputThumbnail.src);
        outputThumbnail.onload = function()
        {
            URL.revokeObjectURL(outputThumbnail.src);
        }
    }

    var loadFileSecond = function (event){
        var fileSize = $('#sicon_file')[0].files[0].size;
       var validExtensions = ['jpg', 'jpeg', 'png']; //array of valid extensions
        var fileName = $("#sicon_file").val();
        var fileNameExt = fileName.substr(fileName.lastIndexOf('.') + 1);
                   
            console.log(fileSize);
        if(fileSize < 20000){
            $('#sicon_file').val('');           
            $('#serr_icon_file').text('This value is required');
            Swal.fire('File size should be greater than 20KB');
        }else if(fileSize > 204800){
            $('#sicon_file').val('');
            // $('#greaterSize').modal('show');
            Swal.fire('File size should be less than 200KB')
            $('#serr_icon_file').text('This value is required');
        }else if($.inArray(fileNameExt, validExtensions) == -1){
            $('#sicon_file').val('');
            // $('#invalidfiletype').modal('show');
            Swal.fire('Only jpg,jpeg,png allowed')
            $('#serr_icon_file').text('This value is required');
        }else{
            $('#serr_icon_file').text('');
        }
       //  $("#Previewimg").show();
        var outputThumbnail = document.getElementById('outputThumbnailSecond');
        
        outputThumbnail.src = URL.createObjectURL(event.target.files[0]);
        console.log(outputThumbnail.src);
        outputThumbnail.onload = function()
        {
            URL.revokeObjectURL(outputThumbnail.src);
        }
    }


    var loadFileThird = function (event){
        var fileSize = $('#ticon_file')[0].files[0].size;
       var validExtensions = ['jpg', 'jpeg', 'png']; //array of valid extensions
        var fileName = $("#ticon_file").val();
        var fileNameExt = fileName.substr(fileName.lastIndexOf('.') + 1);
                   
            console.log(fileSize);
        if(fileSize < 20000){
            $('#ticon_file').val('');           
            $('#terr_icon_file').text('This value is required');
            Swal.fire('File size should be greater than 20KB');
        }else if(fileSize > 204800){
            $('#ticon_file').val('');
            // $('#greaterSize').modal('show');
            Swal.fire('File size should be less than 200KB')
            $('#terr_icon_file').text('This value is required');
        }else if($.inArray(fileNameExt, validExtensions) == -1){
            $('#ticon_file').val('');
            // $('#invalidfiletype').modal('show');
            Swal.fire('Only jpg,jpeg,png allowed')
            $('#terr_icon_file').text('This value is required');
        }else{
            $('#terr_icon_file').text('');
        }
       //  $("#Previewimg").show();
        var outputThumbnail = document.getElementById('outputThumbnailThird');
        
        outputThumbnail.src = URL.createObjectURL(event.target.files[0]);
        console.log(outputThumbnail.src);
        outputThumbnail.onload = function()
        {
            URL.revokeObjectURL(outputThumbnail.src);
        }
    }


    var loadFileConsolidated = function (event){
        var fileSize = $('#cicon_file')[0].files[0].size;
       var validExtensions = ['jpg', 'jpeg', 'png']; //array of valid extensions
        var fileName = $("#cicon_file").val();
        var fileNameExt = fileName.substr(fileName.lastIndexOf('.') + 1);
                   
            console.log(fileSize);
        if(fileSize < 20000){
            $('#cicon_file').val('');           
            $('#cerr_icon_file').text('This value is required');
            Swal.fire('File size should be greater than 20KB');
        }else if(fileSize > 204800){
            $('#cicon_file').val('');
            // $('#greaterSize').modal('show');
            Swal.fire('File size should be less than 200KB')
            $('#cerr_icon_file').text('This value is required');
        }else if($.inArray(fileNameExt, validExtensions) == -1){
            $('#cicon_file').val('');
            // $('#invalidfiletype').modal('show');
            Swal.fire('Only jpg,jpeg,png allowed')
            $('#cerr_icon_file').text('This value is required');
        }else{
            $('#cerr_icon_file').text('');
        }
       //  $("#Previewimg").show();
        var outputThumbnail = document.getElementById('outputThumbnailConsolidated');
        
        outputThumbnail.src = URL.createObjectURL(event.target.files[0]);
        console.log(outputThumbnail.src);
        outputThumbnail.onload = function()
        {
            URL.revokeObjectURL(outputThumbnail.src);
        }
    }



    function updateCompetition(event){
        event.preventDefault();
        var name =$('#name').val();
        var name_hindi =$('#name_hindi').val();

        var description = CKEDITOR.instances['description'].getData();
        var terms_conditions = CKEDITOR.instances['terms_conditions'].getData();

        var start_date = $('#start_date').val();
        var end_date = $('#end_date').val();

        var level = $('#level').val();
        var Available = $('#Available').val();

        var fprize =$('#fprize').val();

        var isValid=true;

        if(name==""){
            $('#err_name').text('This value is required');
            isValid=false;
        }else{
            $('#err_name').text('');
        }
        if(name_hindi==""){
            $('#err_name_hindi').text('This value is required');
            isValid=false;
        }else{
            $('#err_name_hindi').text('');
        }

        if(terms_conditions==""){
            $('#terms_conditions_error').text('This value is required');
            isValid=false;
        }else if(terms_conditions.length < 10 || terms_conditions.length >5000){
            $('#terms_conditions_error').text('Character length should be between 10 to 5000');
            isValid=false;
        }else{
            $('#err_name_hindi').text('');
        }
        if(description==""){
            $('#description_error').text('This value is required');
            isValid=false;
        }else if(description.length < 10 || description.length >5000){
            $('#description_error').text('Character length should be between 10 to 5000');
            isValid=false;
        }else{
            $('#description_error').text('');
        }

        if(fprize < 1){
            Swal.fire('Enter first prize');
            isValid=false;
        }else{

        }

        if(isValid){
            // return true;
            Swal.fire({
                    title: 'Are you sure you want to Update?',
                    showDenyButton: true,
                    showCancelButton: false,
                    confirmButtonText: 'Update',
                    denyButtonText: `Cancel`,
                    }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {                       
                        $('#competition_edit').submit();
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
            }else if(quiz_level_id == 4){
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
$('#Available').on('change',function(){
var id = $(this).val();
//alert(id);
if(id==2){
    $('#standard_check').hide();
}
if(id==1){
    $('#standard_check').show();
}
});
var available =$('#Available').val();
if(available==2){
    $('#standard_check').hide();
}
// alert(available);

$('.cancel').on('click',function(){
    Swal.fire({
                    title: 'Are you sure you want to Cancel?',
                    showDenyButton: true,
                    showCancelButton: false,
                    confirmButtonText: 'Cancel',
                    denyButtonText: `Close`,
                    }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {    
                        window.location.replace('<?php echo base_url(); ?>Standardswritting/create_competition_list');                   
                        //$('#competition_edit').submit();
                       // Swal.fire('Saved!', '', 'success')                                
                    } else if (result.isDenied) {
                        // Swal.fire('Changes are not saved', '', 'info')
                    }
                    })
})
</script>