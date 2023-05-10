<style>
    .error_text {
        color: red;
    }
</style>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Quiz Creation</h1>
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url().'Admin/dashboard';?>" >Sub Admin Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'admin/exchange_forum';?>" >Exchange Forum</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'quiz/organizing_quiz';?>" >Competitions</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'quiz/quiz_dashboard';?>" >Quiz Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'Quiz/quiz_list';?>" >Quiz Creation</a></li>
                <li class="breadcrumb-item active" aria-current="page">Quiz Creation</li>
                
                </ol>
            </nav>

    </div>
    <?php
    if ($this->session->flashdata('MSG')) {
        echo $this->session->flashdata('MSG');
    }
    ?>


    <!-- Content Row -->
    <form name="quiz_reg" id="quiz_reg" action="<?php echo base_url() . 'Quiz/quiz_reg' ?>" method="post" enctype="multipart/form-data">
     
        <div class="row">
            <div class="col-12 mt-3">
                <div class="card border-top">
                    <div class="card-body">
                        <div class="row">
                            <div class="mb-2 col-md-12">
                                <label class="d-block text-font">Title of Quiz<sup class="text-danger">*</sup></label>
                                <textarea type="text" class="form-control input-font" name="title" id="title" value="<?php echo set_value('title') ?>" placeholder="Enter Quiz Title"></textarea>
                                <span class="error_text"><?php echo form_error('title'); ?></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-2 col-md-12">
                                <label class="d-block text-font">Hindi Title of Quiz<sup class="text-danger">*</sup></label>
                                <textarea type="text" class="form-control input-font" name="title_hindi" id="title_hindi" value="<?php echo set_value('title_hindi') ?>" placeholder="Enter Hindi Title Of Quiz"></textarea>
                                <span class="error_text"><?php echo form_error('title_hindi'); ?></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-2 col-md-12">
                                <label class="d-block text-font" text-font>Description of Quiz<sup class="text-danger">*</sup></label>
                                <textarea class="form-control input-font" placeholder="Enter Description of Quiz" name="description" id="description"></textarea>
                                <div class='validation' id="description_error" style='color:red;margin-bottom:15px;'>Please Enter Quiz Description </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-2 col-md-12">
                                <label class="d-block text-font" text-font>Tearms and Conditions of Quiz<sup class="text-danger">*</sup></label>
                                <textarea class="form-control input-font" placeholder="Enter Tearms and Conditions of Quiz" name="terms_conditions" id="terms_conditions"><?php echo set_value('terms_conditions'); ?></textarea>
                                <div class='validation' id="terms_conditions_error" style='color:red;margin-bottom:15px;'>Please Enter Quiz Term & Condition </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-2 col-md-4">
                                <label class="d-block text-font">Quiz Duration (In Minutes):<sup class="text-danger">*</sup></label>
                                <input type="text" class="form-control input-font" name="duration" id="duration" value="<?php echo set_value('duration'); ?>" oninput="this.value = this.value.replace(/[^0-9/]/, '')">
                                <span class="error_text"><?php echo form_error('duration'); ?></span>

                            </div>
                            <div class="mb-2 col-md-4">
                                <label class="d-block text-font">Total Number of Questions<sup class="text-danger">*</sup></label>
                                <input type="text" class="form-control input-font" name="total_question" id="total_question" placeholder="Total Number of Questions" value="<?php echo set_value('total_question'); ?>" oninput="this.value = this.value.replace(/[^0-9/]/, '')">
                                <span class="error_text"><?php echo form_error('total_question'); ?></span>
                            </div>
                            <div class="mb-2 col-md-4">
                                <label class="d-block text-font">Total Marks<sup class="text-danger">*</sup></label>
                                <input type="text" class="form-control input-font" name="total_mark" id="total_mark" placeholder="Total Marks" value="<?php echo set_value('total_mark'); ?>" oninput="this.value = this.value.replace(/[^0-9/]/, '')">
                                <span class="error_text"><?php echo form_error('total_mark'); ?></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-2 col-md-12">
                                <label class="d-block text-font">Quiz Availabile On<sup class="text-danger">*</sup></label>

                                <span id="employee_type_error" class="validationError"></span>
                                <span id="displayMsgRdbEmployeeType"></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-2 col-md-4">
                                <label class="d-block text-font">Start Date<sup class="text-danger">*</sup></label>
                                <input type="date" class="form-control input-font" name="start_date" id="start_date" placeholder="Select Date" value="<?php echo set_value('start_date'); ?>">
                                <span class="error_text"><?php echo form_error('start_date'); ?></span>
                            </div>
                            <div class="mb-2 col-md-4">
                                <label class="d-block text-font">Start Time<sup class="text-danger">*</sup></label>
                                <input type="text" class="form-control input-font timepicker" name="start_time" id="start_time" placeholder="Select Date" value="<?php echo set_value('start_time'); ?>">
                                <span class="error_text"><?php echo form_error('start_time'); ?></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-2 col-md-4">
                                <label class="d-block text-font">End Date<sup class="text-danger">*</sup></label>
                                <input type="date" class="form-control input-font" name="end_date" id="end_date" placeholder="Select Date" value="<?php echo set_value('end_date'); ?>">
                                <span class="error_text"><?php echo form_error('end_date'); ?></span>
                            </div>
                            <div class="mb-2 col-md-4">
                                <label class="d-block text-font"> End Time<sup class="text-danger">*</sup></label>
                                <input type="text" class="form-control input-font timepicker" name="end_time" id="end_time" placeholder="Select Date" value="<?php echo set_value('end_time'); ?>">
                                <span class="error_text"><?php echo form_error('end_time'); ?></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-2 col-md-4">
                                <label class="d-block text-font">Level of Quiz<sup class="text-danger">*</sup></label>
                                <select id="quiz_level_id" name="quiz_level_id" class="form-control input-font">
                                    <option value="" selected disabled>Select Level of Quiz</option>
                                    <?php foreach ($quizlavel as $lavel) { ?>
                                        <option value="<?php echo $lavel['id'] ?>"><?php echo $lavel['title'] ?></option>
                                    <?php } ?>
                                </select>
                                <span class="error_text"><?php echo form_error('quiz_level_id'); ?></span>
                            </div>
                            <div class="mb-2 col-md-4" id="region_id_blk">
                                <label class="d-block text-font" id="region_title">Regional Level<sup class="text-danger">*</sup></label>
                                <select id="region_id" name="region_id" class="form-control input-font">
                                    <!-- <option value="" selected disabled>--select--</option>
                                    <option value="#">Maharashtra</option>
                                    <option value="#">Karnataka</option> -->

                                </select>
                                <span class="error_text"><?php echo form_error('region_id'); ?></span>

                            </div>

                        </div>

                        <div class="row">
                            <div class="mb-2 col-md-4">
                                <label class="d-block">Upload Quiz Banner<sup class="text-danger">*</sup></label>
                                <div class="d-flex">
                                    <div>
                                        <input type="file" id="banner_img" accept="image/jpeg,image/png" name="banner_img" class="form-control-file" onchange="loadFileBanner(event)" value="<?php echo set_value('banner_img'); ?>" />
                                        <span class="error_text"><?php echo form_error('banner_img'); ?></span>
                                    </div>

                                    <!-- 
                          <input type="time" class="form-control input-font" name="start_time" id="start_time" placeholder="Select Date" value="<?php echo set_value('start_time'); ?>">
                         <span class="error_text"><?php echo form_error('start_time'); ?></span> -->



                                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        Preview
                                    </button>
                                </div>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" style="max-width:700px;">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Banner Image Preview</h5>

                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <img id="outputbanner" width="100%" />
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" onclick="resetbanner()" class="btn btn-secondary" data-bs-dismiss="modal">ReSet</button>
                                                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Save changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal -->
                            </div>
                            <div class="mb-2 col-md-4">
                                <label class="d-block text-font">Launguage of Quiz<sup class="text-danger">*</sup></label>
                                <select id="language_id" name="language_id" class="form-control input-font" value="<?php echo set_value('language_id'); ?>">
                                    <option value="" selected disabled>Select Launguage of Quiz</option>
                                    <?php foreach ($getQuizLanguage as $QuizLanguage) { ?>
                                        <option value="<?php echo $QuizLanguage['id'] ?>"><?php echo $QuizLanguage['title'] ?></option>
                                    <?php } ?>

                                </select>

                                <span class="error_text"><?php echo form_error('language_id'); ?></span>

                            </div>
                            <div class="mb-2 col-md-4">
                                <label class="d-block text-font">Question Switching Type<sup class="text-danger">*</sup></label>
                                <select id="switching_type" name="switching_type" class="form-control input-font" value="<?php echo set_value('switching_type'); ?>">
                                    <option value="1">Random</option>
                                    <option value="2">Serially</option>

                                </select>
                                <span class="error_text"><?php echo form_error('switching_type'); ?></span>

                            </div>

                        </div>

                        <div class="row mt-2">
                            <div class="col-md-4 prizes-section">
                                <h4 class="m-2">First Prize</h4>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="mb-2 col-md-4">
                                <label class="d-block text-font">Number of Prizes<sup class="text-danger">*</sup></label>
                                <input type="text" class="form-control input-font" name="fprize" id="fprizes" placeholder="Enter Prizes" value="<?php echo set_value('fprize'); ?>" oninput="this.value = this.value.replace(/[^0-9/]/, '')">
                                <span class="error_text"><?php echo form_error('fprizes'); ?></span>
                            </div>
                            <div class="mb-2 col-md-4">
                                <label class="d-block text-font">Prize Details<sup class="text-danger">*</sup></label>
                                <input type="text" class="form-control input-font" name="fdetails" id="fdetails" placeholder="Enter Details" value="<?php echo set_value('fdetails'); ?>">
                                <span class="error_text"><?php echo form_error('fdetails'); ?></span>
                            </div>
                            <div class="mb-2 col-md-4">
                                <label class="d-block text-font">Icon (Image upload)</label>
                                <div class="d-flex">
                                    <div>
                                        <input type="file" id="fprize_img" accept="image/jpeg,image/png,image/jpg" onchange="loadFileFirst(event)" name="fprize_img" class="form-control-file">
                                        <span class="error_text"><?php echo form_error('fprize_img'); ?></span>
                                    </div>
                                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModalFirst">
                                        Preview
                                    </button>
                                </div>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModalFirst" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" style="max-width: 700px;">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">First Prize Icon</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <img id="outputFirst" width="100%" />
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" onclick="resetFirst();" data-bs-dismiss="modal">ReSet</button>
                                                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Save changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal -->
                            </div>

                        </div>
                        <div class="row mt-2">
                            <div class="col-md-4 prizes-section">
                                <h4 class="m-2">Second Prize</h4>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="mb-2 col-md-4">
                                <label class="d-block text-font">Number of Prizes</label>
                                <input type="text" class="form-control input-font" name="sprize" id="sprizes" placeholder="Total Number of Questions" value="<?php echo set_value('sprizes') ?>" oninput="this.value = this.value.replace(/[^0-9/]/, '')">
                                <span class="error_text"><?php echo form_error('sprizes'); ?></span>
                            </div>
                            <div class="mb-2 col-md-4">
                                <label class="d-block text-font">Prize Details</label>
                                <input type="text" class="form-control input-font" name="sdetails" id="sdetails" placeholder="Enter Details" value="<?php echo set_value('sdetails') ?>">
                                <span class="error_text"><?php echo form_error('sdetails'); ?></span>
                            </div>
                            <div class="mb-2 col-md-4">
                                <label class="d-block text-font">Icon (Image upload)</label>
                                <div class="d-flex">
                                    <div>
                                        <input type="file" id="sprize_img" accept="image/jpeg,image/png,image/jpg" onchange="loadFileSecond(event)" name="sprize_img" class="form-control-file">
                                        <span class="error_text"><?php echo form_error('sprize_img'); ?></span>
                                    </div>
                                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModalSecond">
                                        Preview
                                    </button>
                                </div>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModalSecond" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" style="max-width: 700px;">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <img id="outputSecond" width="100%" />
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" onclick="resetSecond();" data-bs-dismiss="modal">ReSet</button>
                                                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Save changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal -->
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-4 prizes-section">
                                <h4 class="m-2">Third Prize</h4>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="mb-2 col-md-4">
                                <label class="d-block text-font">Number of Prizes</label>
                                <input type="text" class="form-control input-font" name="tprize" id="tprize" placeholder="Total Number of Questions" value="<?php echo set_value('tprize') ?>" oninput="this.value = this.value.replace(/[^0-9/]/, '')">
                                <span class="error_text"><?php echo form_error('tprize'); ?></span>
                            </div>
                            <div class="mb-2 col-md-4">
                                <label class="d-block text-font">Prize Details</label>
                                <input type="text" class="form-control input-font" name="tdetails" id="tdetails" placeholder="Enter Details" value="<?php echo set_value('tdetails') ?>">
                                <span class="error_text"><?php echo form_error('tdetails'); ?></span>
                            </div>
                            <div class="mb-2 col-md-4">
                                <label class="d-block text-font">Icon (Image upload)</label>
                                <div class="d-flex">
                                    <div>
                                        <input type="file" id="tprize_img" accept="image/jpeg,image/png,image/jpg" onchange="loadFileThird(event)" name="tprize_img" class="form-control-file">
                                        <span class="error_text"><?php echo form_error('tprize_img'); ?></span>
                                    </div>
                                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModalThird">
                                        Preview
                                    </button>
                                </div>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModalThird" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" style="max-width: 700px;">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <img id="outputThird" width="100%" />
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" onclick="resetThird();" data-bs-dismiss="modal">ReSet</button>
                                                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Save changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal -->
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-4 prizes-section">
                                <h4 class="m-2">Consolation Prizes</h4>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="mb-2 col-md-4">
                                <label class="d-block text-font">Number of Prizes</label>
                                <input type="text" class="form-control input-font" name="cprize" id="cprize" placeholder="Enter Number of prizes" value="<?php echo set_value('cprize') ?>" oninput="this.value = this.value.replace(/[^0-9/]/, '')">
                                <span class="error_text"><?php echo form_error('cprize'); ?></span>
                            </div>
                            <div class="mb-2 col-md-4">
                                <label class="d-block text-font">Prize Details</label>
                                <input type="text" class="form-control input-font" name="cdetails" id="cdetails" placeholder="Enter Details" value="<?php echo set_value('cdetails') ?>">
                                <span class="error_text"><?php echo form_error('cdetails'); ?></span>
                            </div>
                            <div class="mb-2 col-md-4">
                                <label class="d-block text-font">Icon (Image upload)</label>
                                <div class="d-flex">
                                    <div>
                                        <input type="file" id="cprize_img" accept="image/jpeg,image/png,image/jpg" onchange="loadFileConsol(event)" name="cprize_img" class="form-control-file">
                                        <span class="error_text"><?php echo form_error('cprize_img'); ?></span>
                                    </div>
                                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModalConsole">
                                        Preview
                                    </button>
                                </div>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModalConsole" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" style="max-width: 700px;">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <img id="outputConsol" width="100%" />
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" onclick="resetConsol();" data-bs-dismiss="modal">ReSet</button>
                                                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Save changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal -->
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-4 prizes-section">
                                <h4 class="m-2">Available for</h4>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="mb-2 col-md-4">
                                <label class="d-block text-font">Select Option<sup class="text-danger">*</sup></label>
                                <!-- <input type="text" class="form-control input-font" name="Members" id="Members" placeholder="Enter Standard Club Member"> -->
                                <select id="availability_id" name="availability_id" class="form-control input-font">
                                    <option value="" selected disabled>Select Option</option>
                                    <?php foreach ($getAvailability as $Availability) { ?>
                                        <option value="<?php echo $Availability['id'] ?>"><?php echo $Availability['title'] ?></option>
                                    <?php } ?>

                                </select>
                                <span class="error_text"><?php echo form_error('availability_id'); ?></span>
                            </div>
                        </div>
                        <hr>
                        <div class="row mt-2">
                            <div class="col-md-4 prizes-section">
                                <h4 class="m-2">Load Questions</h4>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="mb-2 col-md-4">
                                <label class="d-block text-font">Select Question Bank<sup class="text-danger">*</sup></label>
                                <select class="form-control input-font" aria-label="Default select example" name="que_bank_id" id="que_bank_id" onchange="getQBDetails(this.value);">
                                  
                                </select>

                                <span class="error_text"><?php echo form_error('que_bank_id'); ?></span>
                            </div>
                            <button type="button" class="btn btn-sm  btn-primary text-white"  id="fetch_que_bank">Fetch Question Banks</button>
                        </div>
                        <div class="row">
                            <div class="mb-2 col-md-4">
                                <label class="d-block text-font">Question Bank Id<sup class="text-danger">*</sup></label>
                                <input type="text" class="form-control input-font" name="qbid" id="qbid" placeholder="Enter Question Bank ID" readonly>
                            </div>
                            <div class="mb-2 col-md-4">
                                <label class="d-block text-font">Language<sup class="text-danger">*</sup></label>
                                <input type="text" class="form-control input-font" name="bank_language" id="bank_language" placeholder="Enter Language" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-2 col-md-4">
                                <label class="d-block text-font">Title<sup class="text-danger">*</sup></label>
                                <input type="text" class="form-control input-font" placeholder="Enter Title" id="qbtitle" readonly>
                            </div>
                            <div class="mb-2 col-md-4">
                                <label class="d-block text-font">Number of Question<sup class="text-danger">*</sup></label>
                                <input type="text" class="form-control input-font" placeholder="Enter Number of Question" readonly id='qbquestion' name="qbquestion">
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="mb-2 col-md-12">
                                <table id="example" class="table-bordered display nowrap" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Question No.</th>
                                            <th>Type</th>
                                            <th>Question</th>
                                            <th>Question in Hindi</th>
                                            <th>Eng Option 1</th>
                                            <th>Hindi Option 1</th>
                                            <th>Eng Option 2</th>
                                            <th>Hindi Option 2</th>
                                            <th>Eng Option 3</th>
                                            <th>Hindi Option 3</th>
                                            <th>Eng Option 4</th>
                                            <th>Hindi Option 4</th>
                                            <th>Eng Option 5</th>
                                            <th>Hindi Option 5</th>
                                            <th>Correct Option</th>
                                        </tr>
                                    </thead>
                                    <tbody id="que_body">
                                    </tbody>
                                </table>
                            </div>
                        </div>


                        <div class="col-md-12 submit_btn p-3">
                            <!-- <a class="btn btn-success btn-sm text-white" data-bs-toggle="modal" data-bs-target="#submitForm">Submit</a> -->
                            <input type="submit" name="Submit" class="btn btn-success btn-sm text-white" id="btnsubmit">
                            <a class="btn btn-danger btn-sm text-white" data-bs-toggle="modal" data-bs-target="#cancelForm">Cancel</a>
                            <input type="reset" name="Reset" class="btn btn-warning btn-sm text-white">
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="submitForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Submit Form</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Are you sure you want to Submit?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal -->
                        <!-- Modal -->
                        <div class="modal fade" id="cancelForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Are you sure you want to cancel?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="location.href='<?php echo base_url();?>Quiz/quiz_list'" >Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal -->
                    </div>
                </div>
            </div>
    </form>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<script>
    CKEDITOR.replace('description');
    CKEDITOR.replace('terms_conditions');


    //Banner Image Preview
    var loadFileBanner = function(event) {
        $("#outputbanner").show();
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
        $(document).on("change", "#quiz_level_id", function(e) {
            e.preventDefault();
            var quiz_level_id = $("#quiz_level_id :selected").val();
            if (quiz_level_id == 1) {
                $("#region_id_blk").hide();
            } else if (quiz_level_id == 2) {
                $("#region_id_blk").show();
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
                $("#region_id_blk").show();
                $("#region_title").text("Branch Level");
            }
        });

        // FETCH QUE BANK
        $(document).on("click", "#fetch_que_bank", function(e) {
            e.preventDefault();
            var total_question = $("#total_question").val();
            var language_id = $("#language_id :selected").val();
            if (total_question> 0 && language_id != "") {
               
                      

            $.ajax({
                url: "<?= base_url() ?>quiz/fetchQueBankForQuiz",
                data: {'total_question':total_question,'language_id':language_id},
                type: "JSON",
                method: "post",
                success: function(response) {
                    var res = JSON.parse(response);
                    var selectbox = $('#que_bank_id');
                    selectbox.empty();
                    $("#que_bank_id").next(".validation").remove();
                    $('#que_bank_id').append('<option value="" selected disabled>Select Question Bank</option>');
                    $.each(res.queBanks, function(index, value) {
                        $('#que_bank_id').append('<option value="' + value.que_bank_id + '">' + value.title + '</option>');
                    });

                }
            });

            } else if (quiz_level_id == 3) {
                $("#region_id_blk").show();
                $("#region_title").text("Branch Level");
            }
        });


        
    });
    //end
    function getQBDetails(id) {
        $.ajax({

            url: "<?php echo base_url(); ?>Quiz/getQbdata/" + id,
            type: "JSON",
            method: "get",
            success: function(result) {
                var res = JSON.parse(result);
                console.log(res)
                $("#qbid").val(res.result.que_bank_id);
                $("#qbtitle").val(res.result.title);
                $("#qbquestion").val(res.result.no_of_ques);
                if(res.result.language == 1){
                    var lang ="English";
                }else if(res.result.language == 2){
                    var lang ="Hindi";
                }else if(res.result.language == 3){
                    var lang ="English & Hindi";
                }
                $("#bank_language").val(lang);
                getQuestionListByQueBankId(id)
            }
        });
        // body...
    }

    function getQuestionListByQueBankId(id) {
        $.post("<?php echo base_url(); ?>subadmin/getQuestionListByQueBankId/", {
            que_bank_id: id
        }, function(result) {
            if (result.status == 0) {
                $('.errorbox').show().text("Error,Please try again.");
            } else {

                res = JSON.parse(result);
                //console.log(res.data)
                data = res.data;

                var row = '';
                j = 0
                for (i in data) {
                    j++;
                    var op1 = "NA";
                            var op2 = "NA";
                            var op3 = "NA";
                            var op4 = "NA";
                            var op5 = "NA";
                            var op1_h = "NA";
                            var op2_h = "NA";
                            var op3_h = "NA";
                            var op4_h = "NA";
                            var op5_h = "NA";
                            if (data[i].que_type == 1) {
                                var type = "Text";
                            } else if (data[i].que_type == 2) {
                                var type = "Image";
                            } else {
                                var type = "Both";
                            }
                            if (data[i].que_type == 2) {
                                if (data[i].que == 0 || data[i].que == '') {
                                    var engQue = "";
                                } else {
                                    var engQue = data[i].que;
                                }
                            } else {
                                if (data[i].que == 0 || data[i].que == '') {
                                    var engQue = "NA";
                                } else {
                                    var engQue = data[i].que;
                                }
                            }
                            if (data[i].que_type == 2) {
                                if (data[i].que_h == 0 || data[i].que_h == '') {
                                    var hindiQue = "";
                                } else {
                                    var hindiQue = data[i].que_h;
                                }
                            } else {
                                if (data[i].que_h == 0 || data[i].que_h == '') {
                                    var hindiQue = "NA";
                                } else {
                                    var hindiQue = data[i].que_h;
                                }
                            }
                            if (data[i].language == 1 || data[i].language == 3) {
                                if (data[i].image != '') {
                                    var img = data[i].image;
                                    var dynamicImg = '<td>' + engQue + '<br>' +
                                        '<img width="100" src="<?php echo base_url(); ?>uploads/que_img/bankid' + data[i].que_bank_id +
                                        '/' + img + '"></td>';
                                } else {
                                    var dynamicImg = '<td>' + engQue + '</td>';
                                }
                            } else {
                                var dynamicImg = '<td>--</td>';
                            }
                            if (data[i].language == 2 || data[i].language == 3) {
                                if (data[i].image != '') {
                                    var img = data[i].image;
                                    var dynamicImgHindi = '<td>' + hindiQue + '<br>' +
                                        '<img width="100" src="<?php echo base_url(); ?>uploads/que_img/bankid' + data[i].que_bank_id +
                                        '/' + img + '"></td>';
                                } else {
                                    var dynamicImgHindi = '<td>' + hindiQue + '</td>';
                                }
                            } else {
                                var dynamicImgHindi = '<td>--</td>';
                            }
                            /////////////////////////////////////////////// 
                            if (data[i].language == 1 || data[i].language == 3) {
                                if (data[i].no_of_options == 2 || data[i].no_of_options == 3 || data[i].no_of_options == 4 || data[i].no_of_options == 5) {

                                    if (data[i].opt1_e == 0 || data[i].opt1_e == "") {

                                        var op1_img = data[i].option1_image;
                                        var op1 = '<img width="100" src="<?php echo base_url(); ?>uploads/que_img/bankid' + data[i].que_bank_id + '/' + op1_img + '">';
                                    } else {
                                        var op1 = data[i].opt1_e;
                                    }
                                    if (data[i].opt2_e == 0 || data[i].opt2_e == "") {
                                        var op2_img = data[i].option2_image;
                                        var op2 = '<img width="100" src="<?php echo base_url(); ?>uploads/que_img/bankid' + data[i].que_bank_id + '/' + op2_img + '">';
                                    } else {
                                        var op2 = data[i].opt2_e;
                                    }

                                }
                                if (data[i].no_of_options == 3 || data[i].no_of_options == 4 || data[i].no_of_options == 5) {
                                    if (data[i].opt3_e == 0 || data[i].opt3_e == "") {
                                        var op3_img = data[i].option3_image;
                                        var op3 = '<img width="100" src="<?php echo base_url(); ?>uploads/que_img/bankid' + data[i].que_bank_id + '/' + op3_img + '">';
                                    } else {
                                        var op3 = data[i].opt3_e;
                                    }
                                }
                                if (data[i].no_of_options == 4 || data[i].no_of_options == 5) {
                                    if (data[i].opt4_e == 0 || data[i].opt4_e == '') {
                                        var op4_img = data[i].option4_image;
                                        var op4 = '<img width="100" src="<?php echo base_url(); ?>uploads/que_img/bankid' + data[i].que_bank_id + '/' + op4_img + '">';
                                    } else {
                                        var op4 = data[i].opt4_e;
                                    }
                                }
                                if ( data[i].no_of_options == 5) {
                                    if (data[i].opt5_e == 0 || data[i].opt5_e == '') {
                                        var op5_img = data[i].option5_image;
                                        var op5 = '<img width="100" src="<?php echo base_url(); ?>uploads/que_img/bankid' + data[i].que_bank_id + '/' + op5_img + '">';
                                    } else {
                                        var op5 = data[i].opt5_e;
                                    }

                                }


                            }
                            if (data[i].language == 2 || data[i].language == 3) {
                                if (data[i].no_of_options == 2 || data[i].no_of_options == 3 || data[i].no_of_options == 4 || data[i].no_of_options == 5) {
                                    if (data[i].opt1_h == '' || data[i].opt1_h == 0) {
                                        var op1_h_img = data[i].option1_h_image;
                                        var op1_h = '<img width="100" src="<?php echo base_url(); ?>uploads/que_img/bankid' + data[i].que_bank_id + '/' + op1_h_img + '">';
                                    } else {
                                        var op1_h = data[i].opt1_h;
                                    }
                                    if (data[i].opt2_h == '' || data[i].opt2_h == 0) {
                                        var op2_h_img = data[i].option2_h_image;
                                        var op2_h = '<img width="100" src="<?php echo base_url(); ?>uploads/que_img/bankid' + data[i].que_bank_id + '/' + op2_h_img + '">';
                                    } else {
                                        var op2_h = data[i].opt2_h;
                                    }
                                }
                                if (data[i].no_of_options == 3 || data[i].no_of_options == 4 || data[i].no_of_options == 5) {
                                    if (data[i].opt3_h == '' || data[i].opt3_h == 0) {
                                        var op3_h_img = data[i].option3_h_image;
                                        var op3_h = '<img width="100" src="<?php echo base_url(); ?>uploads/que_img/bankid' + data[i].que_bank_id + '/' + op3_h_img + '">';
                                    } else {
                                        var op3_h = data[i].opt3_h;
                                    }
                                }
                                if (data[i].no_of_options == 4 || data[i].no_of_options == 5) {
                                    if (data[i].opt4_h == '' || data[i].opt4_h == 0) {
                                        var op4_h_img = data[i].option4_h_image;
                                        var op4_h = '<img width="100" src="<?php echo base_url(); ?>uploads/que_img/bankid' + data[i].que_bank_id + '/' + op4_h_img + '">';
                                    } else {
                                        var op4_h = data[i].opt4_h;
                                    }
                                }
                                if (data[i].no_of_options == 5) {
                                    if (data[i].opt5_h == '' || data[i].opt5_h == 0) {
                                        var op5_h_img = data[i].option5_h_image;
                                        var op5_h = '<img width="100" src="<?php echo base_url(); ?>uploads/que_img/bankid' + data[i].que_bank_id + '/' + op5_h_img + '">';
                                    } else {
                                        var op5_h = data[i].opt5_h;
                                    }
                                }

                            }

                    row += '<tr id="row' + data[i].que_id + '">' +
                        '<td>' + j + '</td>' +
                        '<td>' + type+ '</td>' +
                          dynamicImg +
                          dynamicImgHindi + 
                       
                        '<td>' + op1 + '</td>' +
                        '<td>' + op1_h + '</td>' +
                        '<td>' + op2 + '</td>' +
                        '<td>' + op2_h + '</td>' +
                        '<td>' + op3 + '</td>' +
                        '<td>' + op3_h + '</td>' +
                        '<td>' + op4+ '</td>' +
                        '<td>' + op4_h + '</td>' +
                        '<td>' + op5 + '</td>' +
                        '<td>' + op5_h + '</td>' +
                        '<td>' + data[i].corr_opt_e + '</td></tr>';
                }
               


                $("#que_body").html(row);
            }
        });

    }

    $('#quiz_reg').submit(function(e) {
        e.preventDefault();
        var focusSet = false;
        var allfields = true;
        var title = $("#title").val();

        if (title == "" || title == null) {
            if ($("#title").next(".validation").length == 0) {
                $("#title").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please Enter Quiz Title </div>");
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
                $("#title_hindi").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please Enter Quiz title_hindi </div>");
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

        var duration = $("#duration").val();
        if (duration == "" || duration == null) {
            if ($("#duration").next(".validation").length == 0) {
                $("#duration").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please Enter Quiz Duration (In Minutes) </div>");
            }
            if (!focusSet) {
                $("#duration").focus();
            }
            allfields = false;
        } else {
            $("#duration").next(".validation").remove();
        }

        var total_mark = $("#total_mark").val();
        if (total_mark == "" || total_mark == null) {
            if ($("#total_mark").next(".validation").length == 0) {
                $("#total_mark").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please Enter Quiz Total Marks </div>");
            }
            if (!focusSet) {
                $("#total_mark").focus();
            }
            allfields = false;
        } else {
            $("#total_mark").next(".validation").remove();
        }

        var total_question = $("#total_question").val();
        if (total_question == "" || total_question == null) {
            if ($("#total_question").next(".validation").length == 0) {
                $("#total_question").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please Enter Total Number of Questions In Quiz</div>");
            }
            if (!focusSet) {
                $("#total_question").focus();
            }
            allfields = false;
        } else {
            $("#total_question").next(".validation").remove();
        }

        var start_date = $("#start_date").val();
        if (start_date == "" || start_date == null) {
            if ($("#start_date").next(".validation").length == 0) {
                $("#start_date").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please Select Quiz Start Date</div>");
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
                $("#start_time").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please Select Quiz Start Time</div>");
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
                $("#end_date").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please Select Quiz End Date</div>");
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
                $("#end_time").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please Select Quiz Start Time</div>");
            }
            if (!focusSet) {
                $("#end_time").focus();
            }
            allfields = false;
        } else {
            $("#end_time").next(".validation").remove();
        }

        var language_id = $("#language_id").val();
        if (language_id == "" || language_id == null) {
            if ($("#language_id").next(".validation").length == 0) {
                $("#language_id").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please Select Quiz Language </div>");
            }
            if (!focusSet) {
                $("#language_id").focus();
            }
            allfields = false;
        } else {
            $("#language_id").next(".validation").remove();
        }

        var banner_img = $("#banner_img").val();
        if (banner_img == "" || banner_img == null) {
            if ($("#banner_img").next(".validation").length == 0) {
                $("#banner_img").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please Select Quiz Banner Image</div>");
            }
            if (!focusSet) {
                $("#banner_img").focus();
            }
            allfields = false;
        } else {
            $("#banner_img").next(".validation").remove();
        }

        var fprizes = $("#fprizes").val();
        if (fprizes == "" || fprizes == null) {
            if ($("#fprizes").next(".validation").length == 0) {
                $("#fprizes").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please Enter First Prize </div>");
            }
            if (!focusSet) {
                $("#fprizes").focus();
            }
            allfields = false;
        } else {
            $("#fprizes").next(".validation").remove();
        }

        var fdetails = $("#fdetails").val();
        if (fdetails == "" || fdetails == null) {
            if ($("#fdetails").next(".validation").length == 0) {
                $("#fdetails").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please Enter First Prize Details</div>");
            }
            if (!focusSet) {
                $("#fdetails").focus();
            }
            allfields = false;
        } else {
            $("#fdetails").next(".validation").remove();
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

        // var sprizes = $("#sprizes").val();
        // if (sprizes == "" || sprizes == null) {
        //     if ($("#sprizes").next(".validation").length == 0) 
        //     {
        //         $("#sprizes").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please Enter Second Prize</div>");
        //     }
        //     if (!focusSet) {
        //         $("#sprizes").focus();
        //     }
        //     allfields = false;
        // } else {
        //     $("#sprizes").next(".validation").remove(); 
        // }
        var sprizes = $("#sprizes").val();
        if (sprizes > 0) {
            var sdetails = $("#sdetails").val();
            if (sdetails == "" || sdetails == null) {
                if ($("#sdetails").next(".validation").length == 0) {
                    $("#sdetails").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please Enter Second Prize Details</div>");
                }
                if (!focusSet) {
                    $("#sdetails").focus();
                }
                allfields = false;
            } else {
                $("#sdetails").next(".validation").remove();
            }
        }


        // var sprize_img = $("#sprize_img").val();
        // if (sprize_img == "" || sprize_img== null) {
        //     if ($("#sprize_img").next(".validation").length == 0) 
        //     {
        //         $("#sprize_img").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please Select Second Prize Image Icon</div>");
        //     }
        //     if (!focusSet) { $("#sprize_img").focus(); }
        //     allfields = false;
        // } else {
        //     $("#sprize_img").next(".validation").remove(); 
        // }

        // if (tprize == "" || tprize == null) {
        //     if ($("#tprize").next(".validation").length == 0) 
        //     {
        //         $("#tprize").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please Enter Third Prize</div>");
        //     }
        //     if (!focusSet) {
        //         $("#tprize").focus();
        //     }
        //     allfields = false;
        // } else {
        //     $("#tprize").next(".validation").remove(); 
        // }

        var tprize = $("#tprize").val();
        if (tprize > 0) {
            var tdetails = $("#tdetails").val();
            if (tdetails == "" || tdetails == null) {
                if ($("#tdetails").next(".validation").length == 0) {
                    $("#tdetails").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please Enter Third Prize Details</div>");
                }
                if (!focusSet) {
                    $("#tdetails").focus();
                }
                allfields = false;
            } else {
                $("#tdetails").next(".validation").remove();
            }
        }
        // var tprize_img = $("#tprize_img").val();
        // if (tprize_img == "" || tprize_img== null) {
        //     if ($("#tprize_img").next(".validation").length == 0) 
        //     {
        //         $("#tprize_img").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please Enter Third Prize Image Icon</div>");
        //     }
        //     if (!focusSet) { $("#tprize_img").focus(); }
        //     allfields = false;
        // } else {
        //     $("#tprize_img").next(".validation").remove(); 
        // }           




        // if (cprize == "" || cprize == null) {
        //     if ($("#cprize").next(".validation").length == 0) 
        //     {
        //         $("#cprize").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please Enter Consolation Prizes </div>");
        //     }
        //     if (!focusSet) {
        //         $("#cprize").focus();
        //     }
        //     allfields = false;
        // } else {
        //     $("#cprize").next(".validation").remove(); 
        // }
        var cprize = $("#cprize").val();
        if (cprize > 0) {
            var cdetails = $("#cdetails").val();
            if (cdetails == "" || cdetails == null) {
                if ($("#cdetails").next(".validation").length == 0) {
                    $("#cdetails").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please Enter Consolation Prizes Details</div>");
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
                $("#availability_id").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please Select Available for</div>");
            }
            if (!focusSet) {
                $("#availability_id").focus();
            }
            allfields = false;
        } else {
            $("#availability_id").next(".validation").remove();
        }

        var que_bank_id = $("#que_bank_id").val();
        if (que_bank_id == "" || que_bank_id == null) {
            if ($("#que_bank_id").next(".validation").length == 0) {
                $("#que_bank_id").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please  Select Question Bank</div>");
            }
            if (!focusSet) {
                $("#que_bank_id").focus();
            }
            allfields = false;
        } else {
            $("#que_bank_id").next(".validation").remove();
        }

        var quiz_level_id = $("#quiz_level_id :selected").val();
        if (quiz_level_id == "" || quiz_level_id == null) {
            if ($("#quiz_level_id").next(".validation").length == 0) {
                $("#quiz_level_id").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please  Select quiz livel</div>");
            }
            if (!focusSet) {
                $("#quiz_level_id").focus();
            }
            allfields = false;
        } else {
            $("#quiz_level_id").next(".validation").remove();
        }
        if (quiz_level_id == 2 || quiz_level_id == 3) {
            var region_id = $("#region_id :selected").val();
            if (region_id == "" || region_id == null) {
                if ($("#region_id").next(".validation").length == 0) {
                    $("#region_id").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please  select level </div>");
                }
                if (!focusSet) {
                    $("#region_id").focus();
                }
                allfields = false;
            } else {
                $("#region_id").next(".validation").remove();
            }
        }

        if (allfields) {
            $('#quiz_reg').submit();
        } else {
            return false;
        }
    });
</script>