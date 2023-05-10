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
                                <label class="d-block text-font">Name of Competition</label>
                                <input type="text" class="form-control input-font" name="name" id="name" placeholder="Enter Name of Competition" value="<?php echo $competition['competiton_name']; ?>" required="">
                                <span class="error_text" id="err_name"><?php echo form_error('name'); ?></span>
                            </div>
                    </div>
                    <div class="row">
                            <div class="mb-2 col-md-4">
                                <label class="d-block text-font">Name of Competition in Hindi</label>
                                <input type="text" class="form-control input-font" name="name_hindi" id="name_hindi" placeholder="Enter Name of Competition" value="<?php echo $competition['competition_hindi_name']; ?>" required="">
                                <span class="error_text" id="err_name_hindi"><?php echo form_error('name_hindi'); ?></span>
                            </div>
                    </div>
                    <div class="row">
                        <div class="mb-2 col-md-12">
                             <label class="d-block text-font">Description</label>
                             <textarea name="description" id="description"><?php echo $competition['description']; ?></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-2 col-md-12">
                             <label class="d-block text-font">Terms & Conditions</label>
                             <textare aname="terms_conditions" id="terms_conditions"><?php echo $competition['terms_condition']; ?></textare>
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
                                <label class="d-block text-font">End Date</label>
                                <input type="date" class="form-control input-font" name="end_date" id="end_date" value="<?php echo $competition['end_date']; ?>" required="">
                                <span class="error_text"><?php echo form_error('end_date'); ?></span>
                        </div>
                        <div class="mb-2 col-md-4">
                                <label class="d-block">Upload Thumbnail<sup class="text-danger">*</sup></label>
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
                        </div>
                        <div class="mb-2 col-md-4">
                                <label class="d-block text-font">Available For<sup class="text-danger">*</sup></label>
                                <select id="Available" name="Available" class="form-control input-font" value="<?php echo $competition['available_for']; ?>">
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


</script>