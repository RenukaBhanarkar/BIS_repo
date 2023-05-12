<style>
    .error_text {
        color: red;
    }
</style>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Quiz Creation</h1>

    </div>
    <?php
    if ($this->session->flashdata('MSG')) {
        echo $this->session->flashdata('MSG');
    }
    ?>


    <!-- Content Row -->
    <form id="editquiz" name="quiz_reg" action="<?php echo base_url() . 'Quiz/editquiz/' . $quizdata['id'] ?>" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-12 mt-3">
                <div class="card border-top">
                    <div class="card-body">
                        <div class="row">
                            <div class="mb-2 col-md-4">
                                <label class="d-block text-font">Title of Quiz<sup class="text-danger">*</sup></label>
                                <input type="text" class="form-control input-font" name="title" id="title" value="<?php echo set_value('title', $quizdata['title']) ?>" placeholder="Enter Quiz Title">
                                <span class="error_text"><?php echo form_error('title'); ?></span>

                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-2 col-md-12">
                                <label class="d-block text-font">Hindi Title of Quiz<sup class="text-danger">*</sup></label>
                                <input type="text" class="form-control input-font" name="title_hindi" id="title_hindi" value="<?php echo set_value('title_hindi', $quizdata['title_hindi']) ?>" placeholder="Enter Hindi Title Of Quiz" />
                                <span class="error_text"><?php echo form_error('title_hindi'); ?></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-2 col-md-12">
                                <label class="d-block text-font" text-font>Description of Quiz<sup class="text-danger">*</sup></label>
                                <textarea class="form-control input-font" placeholder="Description of Quiz" name="description" id="description"><?php echo set_value('description', $quizdata['description']) ?></textarea>
                                <span class="error_text"><?php echo form_error('description'); ?></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-2 col-md-12">
                                <label class="d-block text-font" text-font>Tearms and Conditions of Quiz<sup class="text-danger">*</sup></label>
                                <textarea class="form-control input-font" placeholder="Tearms and Conditions of Quiz" name="terms_conditions" id="terms_conditions"><?php echo set_value('terms_conditions', $quizdata['terms_conditions']); ?></textarea>
                                <span class="error_text"><?php echo form_error('terms_conditions'); ?></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-2 col-md-4">
                                <label class="d-block text-font">Quiz Duration (In Minutes):<sup class="text-danger">*</sup></label>
                                <input type="text" class="form-control input-font" name="duration" id="duration" value="<?php echo set_value('duration', $quizdata['duration']); ?>" oninput="this.value = this.value.replace(/[^0-9/]/, '')">
                                <span class="error_text"><?php echo form_error('duration'); ?></span>

                            </div>
                            <div class="mb-2 col-md-4">
                                <label class="d-block text-font">Total Number of Questions<sup class="text-danger">*</sup></label>
                                <input type="text" class="form-control input-font" name="total_question" id="total_question" placeholder="Total Number of Questions" value="<?php echo set_value('total_question', $quizdata['total_question']); ?>" oninput="this.value = this.value.replace(/[^0-9/]/, '')">
                                <span class="error_text"><?php echo form_error('total_question'); ?></span>
                            </div>
                            <div class="mb-2 col-md-4">
                                <label class="d-block text-font">Total Marks<sup class="text-danger">*</sup></label>
                                <input type="text" class="form-control input-font" name="total_mark" id="total_mark" placeholder="Total Marks" value="<?php echo set_value('total_mark', $quizdata['total_mark']); ?>" oninput="this.value = this.value.replace(/[^0-9/]/, '')">
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
                                <input type="date" class="form-control input-font" name="start_date" id="start_date" placeholder="Select Date" value="<?php echo set_value('start_date', $quizdata['start_date']); ?>">
                                <span class="error_text"><?php echo form_error('start_date'); ?></span>
                            </div>
                            <div class="mb-2 col-md-4">
                                <label class="d-block text-font">Start Time<sup class="text-danger">*</sup></label>
                                <input type="time" class="form-control input-font" name="start_time" id="start_time" placeholder="Select Date" value="<?php echo set_value('start_time', $quizdata['start_time']); ?>">
                                <span class="error_text"><?php echo form_error('start_time'); ?></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-2 col-md-4">
                                <label class="d-block text-font">End Date<sup class="text-danger">*</sup></label>
                                <input type="date" class="form-control input-font" name="end_date" id="end_date" placeholder="Select Date" value="<?php echo set_value('end_date', $quizdata['end_date']); ?>">
                                <span class="error_text"><?php echo form_error('end_date'); ?></span>
                            </div>
                            <div class="mb-2 col-md-4">
                                <label class="d-block text-font"> End Time<sup class="text-danger">*</sup></label>
                                <input type="time" class="form-control input-font" name="end_time" id="end_time" placeholder="Select Date" value="<?php echo set_value('end_time', $quizdata['end_time']); ?>">
                                <span class="error_text"><?php echo form_error('end_time'); ?></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-2 col-md-4">
                                <label class="d-block text-font">Level of Quiz<sup class="text-danger">*</sup></label>
                                <select id="quiz_level_id" name="quiz_level_id" class="form-control input-font">
                                    <?php
                                    foreach ($quizlavel as $lavel) { ?>
                                        <option <?php if ($quizdata['quiz_level_id'] == $lavel['id']) echo "selected"; ?> value="<?php echo $lavel['id'] ?>"> <?php echo $lavel['title']; ?> </option>
                                    <?php
                                    } ?>
                                </select>
                                <span class="error_text"><?php echo form_error('quiz_level_id'); ?></span>

                            </div>
                            <?php if (!empty($getAllRegions)) { ?>
                                <div class="mb-2 col-md-4" id="region_id_blk">
                                    <label class="d-block text-font" id="region_title">Regional Level<sup class="text-danger">*</sup></label>
                                    <select id="region_id" name="region_id" class="form-control input-font">
                                        <?php
                                        foreach ($getAllRegions as $region) { ?>
                                            <option <?php if ($quizdata['region_id'] == $region['pki_region_id']) echo "selected"; ?> value="<?php echo $region['pki_region_id'] ?>"> <?php echo $region['uvc_region_title']; ?> </option>
                                        <?php
                                        } ?>

                                    </select>
                                    <span class="error_text"><?php echo form_error('region_id'); ?></span>

                                </div>
                            <?php } ?>
                            <?php if (!empty($getAllBranches)) { ?>
                                <div class="mb-2 col-md-4" id="branch_id_blk">
                                    <label class="d-block text-font" id="branch_title">Branch Level<sup class="text-danger">*</sup></label>
                                    <select id="branch_id" name="branch_id" class="form-control input-font">
                                        <?php
                                        foreach ($getAllBranches as $branch) { ?>
                                            <option <?php if ($quizdata['branch_id'] == $branch['pki_id']) echo "selected"; ?> value="<?php echo $branch['pki_id'] ?>"> <?php echo $branch['uvc_department_name']; ?> </option>
                                        <?php
                                        } ?>

                                    </select>
                                    <span class="error_text"><?php echo form_error('branch_id'); ?></span>

                                </div>
                            <?php } ?>
                            <div class="mb-2 col-md-4">
                                <label class="d-block text-font">Launguage of Quiz<sup class="text-danger">*</sup></label>
                                <select id="language_id" name="language_id" class="form-control input-font" value="<?php echo set_value('language_id'); ?>">
                                    <?php
                                    foreach ($getQuizLanguage as $QuizLanguage) { ?>
                                        <option <?php if ($quizdata['language_id'] == $QuizLanguage['id']) echo "selected"; ?> value="<?php echo $QuizLanguage['id'] ?>"> <?php echo $QuizLanguage['title']; ?> </option>
                                    <?php
                                    } ?>
                                </select>

                                <span class="error_text"><?php echo form_error('language_id'); ?></span>

                            </div>
                            <div class="mb-2 col-md-4">
                                <label class="d-block text-font">Question Switching Type<sup class="text-danger">*</sup></label>
                                <select id="switching_type" name="switching_type" class="form-control input-font" value="<?php echo set_value('switching_type'); ?>">
                                    <option <?php if ($quizdata['switching_type'] == 1) echo "selected"; ?>value="1">Random</option>
                                    <option <?php if ($quizdata['switching_type'] == 2) echo "selected"; ?>value="2">Serially</option>

                                </select>
                                <span class="error_text"><?php echo form_error('switching_type'); ?></span>

                            </div>
                        </div>

                        <div class="row">
                            <div class="mb-2 col-md-6">
                                <label class="d-block">Upload Quiz Banner<sup class="text-danger">*</sup></label>
                                <div class="active" id="delete_preview">
                                    <button class="btn btn-danger btn-sm del_icon">Delete</button>

                                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#exampleModalView">
                                        View
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModalView" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Last Uoloaded Banner Image Preview</h5>

                                                    <!-- <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button> -->
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <img src="../../<?php echo $quizdata['banner_img']; ?>" style="width:450px;" />
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal -->
                                </div>

                                <div class="row" id="add_file">
                                    <div class="col-6">
                                        <input type="file" id="banner_img" accept="image/jpeg,image/png,image/jpg" name="banner_img" class="form-control-file" id="icon_file" onchange="loadFileBanner(event)">
                                        <input type="hidden" name="lastbanner" value="<?php echo $quizdata['banner_img']; ?>">
                                        <span class="error_text">
                                            accept only jpg,jpeg,png
                                        </span>

                                        <span class="error_text">
                                            <?php //echo form_error('title'); 
                                            ?>
                                        </span>
                                    </div>


                                </div>


                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Banner Image Preview</h5>

                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <img id="outputbanner" style="width:450px;" />
                                            </div>
                                            <div class="modal-footer">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal -->
                            </div>


                        </div>
                        <!--  1st PRIZE start  -->
                        <div class="row mt-2">
                            <div class="col-md-4 prizes-section">
                                <h4 class="m-2">First Prize</h4>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="mb-2 col-md-4">
                                <label class="d-block text-font">Number of Prizes<sup class="text-danger">*</sup></label>

                                <input type="text" class="form-control input-font" name="fprize" id="fprizes" placeholder="Enter Prizes" value="<?php if (!empty($firstprize['no_of_prize'])) {
                                                                                                                                                    echo  $firstprize['no_of_prize'];
                                                                                                                                                } else {
                                                                                                                                                    echo 0;
                                                                                                                                                } ?>" oninput="this.value = this.value.replace(/[^0-9/]/, '')">
                                <span class="error_text"><?php echo form_error('fprizes'); ?></span>
                            </div>
                            <div class="mb-2 col-md-4">
                                <label class="d-block text-font">Prize Details<sup class="text-danger">*</sup></label>
                                <input type="text" class="form-control input-font" name="cdetails" id="cdetails" placeholder="Enter Details" value="<?php if (!empty($firstprize['prize_details'])) {
                                                                                                                                                        echo  $firstprize['prize_details'];
                                                                                                                                                    } else {
                                                                                                                                                        echo "";
                                                                                                                                                    } ?>">

                                <span class="error_text"><?php echo form_error('fdetails'); ?></span>
                            </div>
                            <div class="mb-2 col-md-4">
                                <label class="d-block text-font">Icon (Image upload)</label>

                                <div class="active" id="delete_preview1">
                                    <button class="btn btn-danger btn-sm del_icon1">Delete</button>
                                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#exampleModalFirstView">
                                        View
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModalView" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Last Uoloaded Banner Image Preview</h5>


                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <img src="../../<?php echo $firstprize['prize_img']; ?>" style="width:450px;" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="exampleModalFirstView" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Last Uploaded First Prize Icon Image</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <img src="../../<?php echo $firstprize['prize_img']; ?>" style="width: 450px;" />
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal -->
                                </div>

                                <div class="row" id="add_file1">
                                    <div class="col-6">
                                        <input type="file" id="fprize_img" accept="image/jpeg,image/png,image/jpg" name="fprize_img" class="form-control-file" id="icon_file1" onchange="loadFileFirst(event)">
                                        <input type="hidden" name="lastfprize_img" value="<?php echo $firstprize['prize_img']; ?>">
                                        <span class="error_text">
                                            accept only jpg,jpeg,png
                                        </span>

                                        <span class="error_text">
                                            <?php //echo form_error('title'); 
                                            ?>
                                        </span>
                                    </div>


                                </div>

                                <div class="modal fade" id="exampleModalFirst" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">First Prize Icon</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <img id="outputFirst" style="width: 450px;" />
                                            </div>
                                            <div class="modal-footer">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal -->
                            </div>

                        </div>
                        <!-- FIRST PRIZE end -->
                        <!-- 2nd PRIZE -->
                        <div class="row mt-2">
                            <div class="col-md-4 prizes-section">
                                <h4 class="m-2">2<sup>nd</sup>Prize</h4>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="mb-2 col-md-4">
                                <label class="d-block text-font">Number of Prizes</label>

                                <input type="text" class="form-control input-font" name="sprize" id="sprizes" placeholder="Enter Prizes" value="<?php if (!empty($secondprize['no_of_prize'])) { echo  $secondprize['no_of_prize'];   } else { echo 0;} ?>" oninput="this.value = this.value.replace(/[^0-9/]/, '')">

                                <span class="error_text"><?php echo form_error('sprizes'); ?></span>
                            </div>
                            <div class="mb-2 col-md-4">
                                <label class="d-block text-font">Prize Details</label>


                                <input type="text" class="form-control input-font" name="cdetails" id="cdetails" placeholder="Enter Details" value="<?php if (!empty($secondprize['prize_details'])) {  echo  $secondprize['prize_details']; } else {     echo ""; } ?>">

                            </div>
                            <div class="mb-2 col-md-4">
                                <label class="d-block text-font">Icon (Image upload)</label>

                                <div class="active" id="delete_preview2">
                                    <button class="btn btn-danger btn-sm del_icon2">Delete</button>
                                    <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModalSecondView">
                                        View
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModalSecondView" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Last Uploaded Second Prize Image Preview</h5>


                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <img src="../../<?php echo $secondprize['prize_img']; ?>" style="width:450px;" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row" id="add_file2">
                                    <div class="col-6">
                                        <input type="file" id="sprize_img" accept="image/jpeg,image/png,image/jpg" name="sprize_img" class="form-control-file" id="icon_file2" onchange="loadFileSecond(event)">
                                        <input type="hidden" name="lastsprize_img" value="<?php echo $secondprize['prize_img']; ?>">
                                        <span class="error_text">
                                            accept only jpg,jpeg,png
                                        </span>

                                        <span class="error_text">
                                            <?php //echo form_error('title'); 
                                            ?>
                                        </span>
                                    </div>



                                    <div class="modal fade" id="exampleModalSecond" tabindex="-1" aria-labelledby="exampleModalSecond" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Second Prize Icon Image</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <img id="outputSecond" style="width: 450px;" />
                                                </div>
                                                <div class="modal-footer">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                        <!-- 2nd end -->

                          <!-- 2nd PRIZE -->
                          <div class="row mt-2">
                            <div class="col-md-4 prizes-section">
                                <h4 class="m-2">2<sup>nd</sup>Prize</h4>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="mb-2 col-md-4">
                                <label class="d-block text-font">Number of Prizes</label>

                                <input type="text" class="form-control input-font" name="sprize" id="sprizes" placeholder="Enter Prizes" value="<?php if (!empty($secondprize['no_of_prize'])) { echo  $secondprize['no_of_prize'];   } else { echo 0;} ?>" oninput="this.value = this.value.replace(/[^0-9/]/, '')">

                                <span class="error_text"><?php echo form_error('sprizes'); ?></span>
                            </div>
                            <div class="mb-2 col-md-4">
                                <label class="d-block text-font">Prize Details</label>


                                <input type="text" class="form-control input-font" name="cdetails" id="cdetails" placeholder="Enter Details" value="<?php if (!empty($secondprize['prize_details'])) {  echo  $secondprize['prize_details']; } else {     echo ""; } ?>">

                            </div>
                            <div class="mb-2 col-md-4">
                                <label class="d-block text-font">Icon (Image upload)</label>

                                <div class="active" id="delete_preview2">
                                    <button class="btn btn-danger btn-sm del_icon2">Delete</button>
                                    <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModalSecondView">
                                        View
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModalSecondView" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Last Uploaded Second Prize Image Preview</h5>


                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <img src="../../<?php echo $secondprize['prize_img']; ?>" style="width:450px;" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row" id="add_file2">
                                    <div class="col-6">
                                        <input type="file" id="sprize_img" accept="image/jpeg,image/png,image/jpg" name="sprize_img" class="form-control-file" id="icon_file2" onchange="loadFileSecond(event)">
                                        <input type="hidden" name="lastsprize_img" value="<?php echo $secondprize['prize_img']; ?>">
                                        <span class="error_text">
                                            accept only jpg,jpeg,png
                                        </span>

                                        <span class="error_text">
                                            <?php //echo form_error('title'); 
                                            ?>
                                        </span>
                                    </div>



                                    <div class="modal fade" id="exampleModalSecond" tabindex="-1" aria-labelledby="exampleModalSecond" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Second Prize Icon Image</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <img id="outputSecond" style="width: 450px;" />
                                                </div>
                                                <div class="modal-footer">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                        <!-- 2nd end -->
                                                                                                                                                        







                    </div><!-- ********** main ************* -->



                    <!-- Modal -->
                    <div class="modal fade" id="submitForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Submit Form</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>Are you sure you want to Submit?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary updatequiz" data-bs-dismiss="modal">Submit</button>
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
                                    <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                                    <button class="close" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>Are you sure you want to cancel?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <a href="<?php echo base_url() . 'quiz/quiz_list'; ?>"><button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button></a>
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
</script>

<script>
    // function submit(event){
    //   event.preventDefault();
    //   $('#submitForm').modal('show');
    // }
    $(document).ready(function() {
        // $('.updatequiz').click('name="quiz_reg"','submit');
        $('.updatequiz').on('click', function() {
            $('#editquiz').submit();
        })
    })
    $(document).ready(function() {
        var id = "<?php echo $quizdata['que_bank_id']; ?>"
        getQuestionListByQueBankId(id);
        getQBDetails(id);
        //$("#region_id_blk").hide();
        $(document).on("change", "#quiz_level_id", function(e) {
            e.preventDefault();
            var quiz_level_id = $("#quiz_level_id :selected").val();
            if (quiz_level_id == 1) {
                $("#region_id_blk").hide();
                $("#branch_id_blk").hide();
            } else if (quiz_level_id == 2) {
                $("#region_id_blk").show();
                $("#branch_id_blk").hide();
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
            }
        });

        // FETCH QUE BANK
        $(document).on("click", "#fetch_que_bank", function(e) {
            e.preventDefault();
            var total_question = $("#total_question").val();
            var language_id = $("#language_id :selected").val();
            if (total_question > 0 && language_id != "") {

                $.ajax({
                    url: "<?= base_url() ?>quiz/fetchQueBankForQuiz",
                    data: {
                        'total_question': total_question,
                        'language_id': language_id
                    },
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
</script>



<script type="text/javascript">
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
                        var type = "Text and Image";
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
                        if (data[i].no_of_options == 5) {
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
                        '<td>' + type + '</td>' +
                        dynamicImg +
                        dynamicImgHindi +

                        '<td>' + op1 + '</td>' +
                        '<td>' + op1_h + '</td>' +
                        '<td>' + op2 + '</td>' +
                        '<td>' + op2_h + '</td>' +
                        '<td>' + op3 + '</td>' +
                        '<td>' + op3_h + '</td>' +
                        '<td>' + op4 + '</td>' +
                        '<td>' + op4_h + '</td>' +
                        '<td>' + op5 + '</td>' +
                        '<td>' + op5_h + '</td>' +
                        '<td>' + data[i].corr_opt_e + '</td></tr>';
                }



                $("#que_body").html(row);
            }
        });

    }


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
                getQuestionListByQueBankId(id)
            }
        });

    }
</script>


<script>
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

    //Second Prize Image Preview
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
    //end
    // 4 Prize Image Preview
    var loadFileFourth = function(event) {
        $("#outputFourth").show();
        var outputFourth = document.getElementById('outputFourth');
        outputFourth.src = URL.createObjectURL(event.target.files[0]);
        outputFourth.onload = function() {
            URL.revokeObjectURL(outputFourth.src);
        }
    };

    function resetFourth() {
        $("#cprize_img").val('');
        $("#outputFourth").hide();
    }
    //end




    $('#delete_preview').show();
    $('#add_file').hide();
    $('#icon_file').attr('required', false);
    // $('#outputicon').attr('src',)
    $('.del_icon').on('click', function() {
        $('#delete_preview').hide();
        $('#add_file').show();
        // $('#icon_file').add('attr','required');
        $('#banner_img').attr('required', true);
    });


    $('#delete_preview1').show();
    $('#add_file1').hide();
    $('#icon_file1').attr('required', false);
    // $('#outputicon').attr('src',)
    $('.del_icon1').on('click', function() {
        $('#delete_preview1').hide();
        $('#add_file1').show();
        // $('#icon_file').add('attr','required');
        $('#fprize_img').attr('required', true);
    });



    $('#delete_preview2').show();
    $('#add_file2').hide();
    $('#icon_file2').attr('required', false);
    // $('#outputicon').attr('src',)
    $('.del_icon2').on('click', function() {
        $('#delete_preview2').hide();
        $('#add_file2').show();
        // $('#icon_file').add('attr','required');
        $('#sprize_img').attr('required', true);
    });


    $('#delete_preview3').show();
    $('#add_file3').hide();
    $('#tprize_img').attr('required', false);
    // $('#outputicon').attr('src',)
    $('.del_icon3').on('click', function() {
        $('#delete_preview3').hide();
        $('#add_file3').show();
        // $('#icon_file').add('attr','required');
        $('#tprize_img').attr('required', true);
    });


    $('#delete_preview4').show();
    $('#add_file4').hide();
    $('#icon_file4').attr('required', false);
    // $('#outputicon').attr('src',)
    $('.del_icon4').on('click', function() {
        $('#delete_preview4').hide();
        $('#add_file4').show();
        // $('#icon_file').add('attr','required');
        $('#cprize_img').attr('required', true);
    });
</script>