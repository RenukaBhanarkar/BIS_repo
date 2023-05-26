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
    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
      <ol class="breadcrumb">
        <?php if (encryptids("D", $_SESSION['admin_type']) == 3) { ?>
          <li class="breadcrumb-item"><a href="<?php echo base_url() . 'admin/dashboard'; ?>">Sub Admin Dashboard</a></li>
        <?php } else { ?>
          <li class="breadcrumb-item"><a href="<?php echo base_url() . 'admin/dashboard'; ?>">Admin Dashboard</a></li>
        <?php  } ?>
        <li class="breadcrumb-item"><a href="<?php echo base_url() . 'admin/exchange_forum'; ?>">Exchange Forum</a></li>
        <li class="breadcrumb-item"><a href="<?php echo base_url() . 'quiz/organizing_quiz'; ?>">Competitions</a></li>
        <li class="breadcrumb-item"><a href="<?php echo base_url() . 'quiz/quiz_dashboard'; ?>">Quiz Dashboard</a></li>
        <li class="breadcrumb-item"><a href="<?php echo base_url() . 'Quiz/quiz_list'; ?>">Quiz Creation</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit Quiz Creation</li>

      </ol>
    </nav>

  </div>
  <?php
  if ($this->session->flashdata('MSG')) {
    echo $this->session->flashdata('MSG');
  }
  ?>


  <!-- Content Row -->
  <form id="editquiz" name="quiz_reg" action="<?php echo base_url() . 'Quiz/editquizsubmit/' . $quizdata['id'] ?>" method="post" enctype="multipart/form-data">
    <div class="row">
      <div class="col-12 mt-3">
        <div class="card border-top">
          <div class="card-body">
            <div class="row">
              <div class="mb-2 col-md-12">
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
             <!-- upload quiz banner start -->
            <div class="row">
              <div class="mb-2 col-md-6">
                <label class="d-block">Upload Quiz Banner<sup class="text-danger">*</sup></label>


                <div class="active" id="delete_preview">
                  <button class="btn btn-danger btn-sm del_icon" data-id="<?=$quizdata['id'];?>" data-imgname="<?php echo $quizdata['banner_img']; ?>">Delete</button>
                 
                  <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#exampleModalView">
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
                          <img src="../../<?php echo $quizdata['banner_img']; ?>" style="width:450px;" />
                        </div>

                      </div>
                    </div>
                  </div>
                  <!-- Modal -->
                </div>

                <div class="row" id="add_file">
                  <div class="col-6">
                  <input type="hidden" id="ban_img" value ="0"/>
                    <input type="file" id="banner_img" accept="image/jpeg,image/png,image/jpg" name="banner_img" class="form-control-file" id="icon_file" onchange="loadFileBanner(event)">
                    <input type="hidden" name="lastbanner" value="<?php echo $quizdata['banner_img']; ?>">
                    <span class="error_text">
                      accept only jpg,jpeg,png.Maximum size is 200 kb
                    </span>

                    <span class="error_text">
                      <?php //echo form_error('title'); 
                      ?>
                    </span>
                  </div>

                  <button type="button" class="btn btn-primary btn-sm mb-4" data-bs-toggle="modal" data-bs-target="#exampleModal"> Preview
                  </button>
                </div>
                 <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Banner Image Preview</h5>

                        <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
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
             <!-- upload quiz banner end -->
             <input type="hidden" id="exist_fp" value ="<?= $exist_fp;?>"/>
             <input type="hidden" id="exist_sp" value ="<?= $exist_sp;?>"/>
             <input type="hidden" id="exist_tp" value ="<?= $exist_tp;?>"/>
             <input type="hidden" id="exist_cp" value ="<?= $exist_cp;?>"/>
                           
            <!--  1st PRIZE -->
            <div class="row mt-2">
              <div class="col-md-4 prizes-section">
                <h4 class="m-2">First Prize</h4>
              </div>
            </div>

            <div class="row mt-2">
              <div class="mb-2 col-md-4">
                <label class="d-block text-font">Number of Prizes<sup class="text-danger">*</sup></label>

                <input type="text" class="form-control input-font" name="fprize" id="fprizes" placeholder="Enter Prizes" value="<?php if (!empty($firstprize['no_of_prize'])) {
               echo  $firstprize['no_of_prize'];                                                                                                        } else {                                                                                                                    echo 0;                                                                                                                                } ?>" oninput="this.value = this.value.replace(/[^0-9/]/, '')">
                <span class="error_text"><?php echo form_error('fprizes'); ?></span>
              </div>
              <div class="mb-2 col-md-4">
                <label class="d-block text-font">Prize Details<sup class="text-danger">*</sup></label>
                <input type="text" class="form-control input-font" name="fdetails" id="fdetails" placeholder="Enter Details" value="<?php if (!empty($firstprize['prize_details'])) {  echo  $firstprize['prize_details'];       } else {       echo "";         } ?>">

                <span class="error_text"><?php echo form_error('fdetails'); ?></span>
              </div>


              <div class="mb-2 col-md-4">
                <label class="d-block text-font">Icon (Image upload)</label>
                <?php if ($exist_fp == 1) {  ?>
                  <div class="active" id="delete_preview1">
                 
                  <input type="hidden" id="fp_img0"  name="fp_img" value="0">
                  <input type="hidden" id="lastfprize_img0" name="lastfprize_img" value="<?php echo $firstprize['prize_img']; ?>">
                    <button class="btn btn-danger btn-sm del_icon_prize_img" data-id="<?=$firstprize['quiz_id'];?>"  data-prizeid="<?=$firstprize['prize_id'];?>" data-imgname="<?php echo $firstprize['prize_img']; ?>" data-prize="1">Delete</button>
                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#exampleModalFirstView">
                      View
                    </button>
                   
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
                <?php }  ?>
                  <div class="row" id="add_file1" >
                    <div class="col-12">
                    <input type="hidden" id="fp_img1"  name="fp_img" value="1">
                      <input type="file" id="fprize_img" accept="image/jpeg,image/png,image/jpg" name="fprize_img" class="form-control-file" id="icon_file1" onchange="loadFileFirst(event)">
                      <input type="hidden" id="lastfprize_img1" name="lastfprize_img" value="<?php echo $firstprize['prize_img']; ?>">
                      <span class="error_text">
                        accept only jpg,jpeg,png.Maximum size is 200 kb
                      </span>

                      <span class="error_text">
                        <?php //echo form_error('title'); 
                        ?>
                      </span>
                    </div>

                    <button type="button" class="btn btn-primary btn-sm mb-4" data-bs-toggle="modal" data-bs-target="#exampleModalFirst"> Preview
                    </button>
                  

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
                  </div>
                  <!-- Modal -->
                
              </div>

            </div>
            <!-- 2nd PRIZE -->
            <div class="row mt-2">
              <div class="col-md-4 prizes-section">
                <h4 class="m-2">2<sup>nd</sup>Prize</h4>
              </div>
            </div>

            <div class="row mt-2">
              <div class="mb-2 col-md-4">
                <label class="d-block text-font">Number of Prizes</label>

                <input type="text" class="form-control input-font" name="sprize" id="sprizes" placeholder="Enter Prizes" value="<?php if (!empty($secondprize['no_of_prize'])) {      echo  $secondprize['no_of_prize'];  } else {   echo 0; } ?>" oninput="this.value = this.value.replace(/[^0-9/]/, '')">

                <span class="error_text"><?php echo form_error('sprizes'); ?></span>
              </div>
              <div class="mb-2 col-md-4">
                <label class="d-block text-font">Prize Details</label>


                <input type="text" class="form-control input-font" name="sdetails" id="sdetails" placeholder="Enter Details" value="<?php if (!empty($secondprize['prize_details'])) {echo  $secondprize['prize_details'];  } else {  echo ""; } ?>">

              </div>



              <div class="mb-2 col-md-4">
                <label class="d-block text-font">Icon (Image upload)</label>
                <?php if ($exist_sp == 1) {  ?>
                  <div class="active" id="delete_preview2">
                  <input type="hidden" id="sp_img0"  name="sp_img" value="0">
                  <input type="hidden" id="lastsprize_img0"name="lastsprize_img" value="<?php echo $secondprize['prize_img']; ?>">
                    <button class="btn btn-danger btn-sm del_icon_prize_img" data-id="<?=$secondprize['quiz_id'];?>"  data-prizeid="<?=$secondprize['prize_id'];?>" data-imgname="<?php echo $secondprize['prize_img']; ?>" data-prize="2">Delete</button>
                    <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModalSecondView">
                      View
                    </button>

                    <!-- View Modal -->
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
                    <!-- end View Modal -->
                  </div>
                <?php } ?>
                  <div class="row" id="add_file2" >
                    <div class="col-12">
                    <input type="hidden" id="sp_img1"  name="sp_img" value="1">
                      <input type="file" id="sprize_img" accept="image/jpeg,image/png,image/jpg" name="sprize_img" class="form-control-file" id="icon_file2" onchange="loadFileSecond(event)">

                      <input type="hidden" id="lastsprize_img1" name="lastsprize_img" value="<?php if (!empty($secondprize['prize_img'])) {
                                                                          echo $secondprize['prize_img'];
                                                                        } ?>">

                      <span class="error_text">
                        accept only jpg,jpeg,png.Maximum size is 200 kb
                      </span>

                      <span class="error_text">
                        <?php //echo form_error('title'); 
                        ?>
                      </span>
                      <button type="button" class="btn btn-primary btn-sm mb-4" data-bs-toggle="modal" data-bs-target="#exampleModalSecond"> Preview
                      </button>

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
            <!-- 3rd prize -->
            <div class="row mt-2">
              <div class="col-md-4 prizes-section">
                <h4 class="m-2">3<sup>rd</sup>Prize</h4>
              </div>
            </div>
            <div class="row mt-2">
              <div class="mb-2 col-md-4">
                <label class="d-block text-font">Number of Prizes</label>

                <input type="text" class="form-control input-font" name="tprize" id="tprize" placeholder="Enter Prizes" value="<?php if (!empty($thirdprize['no_of_prize'])) {       echo  $thirdprize['no_of_prize']; } else { echo 0;  } ?>" oninput="this.value = this.value.replace(/[^0-9/]/, '')">
                <span class="error_text"><?php echo form_error('tprize'); ?></span>
              </div>
              <div class="mb-2 col-md-4">
                <label class="d-block text-font">Prize Details</label>

                <input type="text" class="form-control input-font" name="tdetails" id="tdetails" placeholder="Enter Details" value="<?php if (!empty($thirdprize['prize_details'])) {echo  $thirdprize['prize_details'];      } else { echo ""; } ?>">
                <span class="error_text"><?php echo form_error('tdetails'); ?></span>
              </div>

              <div class="mb-2 col-md-4">
                <label class="d-block text-font">Icon (Image upload)</label>
                <?php if ($exist_tp == 1) {  ?>
                  <div class="active" id="delete_preview3">
                  <input type="hidden" id="tp_img0"  name="tp_img" value="0">
                  <input type="hidden" id="lasttprize_img0" name="lasttprize_img" value="<?php echo $thirdprize['prize_img']; ?>">
                    <button class="btn btn-danger btn-sm del_icon_prize_img" data-id="<?=$thirdprize['quiz_id'];?>"  data-prizeid="<?=$thirdprize['prize_id'];?>" data-imgname="<?php echo $thirdprize['prize_img']; ?>" data-prize="3">Delete</button>
                    <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModalThirdView">
                      View
                    </button>

                    <!-- View Modal -->
                    <div class="modal fade" id="exampleModalThirdView" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Last Uploaded Second Prize Image Preview</h5>


                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">×</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <img src="../../<?php echo $thirdprize['prize_img']; ?>" style="width:450px;" />
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- end View Modal -->
                  </div>
                <?php } ?>
                  <div class="row" id="add_file3" >
                    <div class="col-12">
                    <input type="hidden" id="tp_img1"  name="tp_img" value="1">
                      <input type="file" id="tprize_img" accept="image/jpeg,image/png,image/jpg" name="tprize_img" class="form-control-file" id="icon_file3" onchange="loadFileThird(event)">

                      <input type="hidden" id="lasttprize_img0" name="lasttprize_img" value="<?php if (!empty($thirdprize['prize_img'])) {
                                                                          echo $thirdprize['prize_img'];
                                                                        } ?>">
                      <span class="error_text">
                        accept only jpg,jpeg,png.Maximum size is 200 kb
                      </span>

                      <span class="error_text">
                        <?php //echo form_error('title'); 
                        ?>
                      </span>
                      <button type="button" class="btn btn-primary btn-sm mb-4" data-bs-toggle="modal" data-bs-target="#exampleModalThird"> Preview
                      </button>

                    </div>



                    <div class="modal fade" id="exampleModalThird" tabindex="-1" aria-labelledby="exampleModalThird" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Third Prize Icon Image</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <img id="outputThird" style="width: 450px;" />
                          </div>
                          <div class="modal-footer">

                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
               

              </div>


            </div>

            <!-- 3rd end -->
            <div class="row mt-2">
              <div class="col-md-4 prizes-section">
                <h4 class="m-2">Consolation Prizes</h4>
              </div>
            </div>
            <div class="row mt-2">
              <div class="mb-2 col-md-4">
                <label class="d-block text-font">Number of Prizes</label>

                <input type="text" class="form-control input-font" name="cprize" id="cprize" placeholder="Enter Prizes" value="<?php if (!empty($fourthprize['no_of_prize'])) { echo  $fourthprize['no_of_prize'];                                                                                                      } else {                                                                                                                      echo 0;                                                                                                                                } ?>" oninput="this.value = this.value.replace(/[^0-9/]/, '')">
                <span class="error_text"><?php echo form_error('cprize'); ?></span>
              </div>
              <div class="mb-2 col-md-4">
                <label class="d-block text-font">Prize Details<sup class="text-danger">*</sup></label>


                <input type="text" class="form-control input-font" name="cdetails" id="cdetails" placeholder="Enter Details" value="<?php if (!empty($fourthprize['prize_details'])) {                                                                                                                      echo  $fourthprize['prize_details'];                                                                                                       } else {                                                                                                                       echo "";                                                                                                                   } ?>">

                <span class="error_text"><?php echo form_error('cdetails'); ?></span>
              </div>

              <div class="mb-2 col-md-4">
                <label class="d-block text-font">Icon (Image upload)</label>
                <?php if ($exist_cp == 1) {  ?>
                  <div class="active" id="delete_preview4">
                  <input type="hidden" id="cp_img0"  name="cp_img" value="0">
                  <input type="hidden" id="lastcprize_img0"name="lastcprize_img" value="<?php echo $fourthprize['prize_img']; ?>">
                    <button class="btn btn-danger btn-sm del_icon_prize_img" data-id="<?=$fourthprize['quiz_id'];?>"  data-prizeid="<?=$fourthprize['prize_id'];?>" data-imgname="<?php echo $fourthprize['prize_img']; ?>" data-prize="4">Delete</button>
                    <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModalFourthView">
                      View
                    </button>

                    <!-- View Modal -->
                    <div class="modal fade" id="exampleModalFourthView" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Last Uploaded Consolation Prize Image Preview</h5>


                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">×</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <img src="../../<?php echo $fourthprize['prize_img']; ?>" style="width:450px;" />
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- end View Modal -->
                  </div>
                <?php } ?>
                  <div class="row" id="add_file4" >
                    <div class="col-12">
                    <input type="hidden" id="cp_img1"  name="cp_img" value="1">
                      <input type="file" id="cprize_img" accept="image/jpeg,image/png,image/jpg" name="cprize_img" class="form-control-file" id="icon_file4" onchange="loadFileFourth(event)">

                      <input type="hidden" id="lastcprize_img1" name="lastcprize_img" value="<?php if (!empty($fouthprize['prize_img'])) {
                                                                          echo $fourthprize['prize_img'];
                                                                        } ?>">
                      <span class="error_text">
                        accept only jpg,jpeg,png.Maximum size is 200 kb
                      </span>

                      <span class="error_text">
                        <?php //echo form_error('title'); 
                        ?>
                      </span>
                      <button type="button" class="btn btn-primary btn-sm mb-4" data-bs-toggle="modal" data-bs-target="#exampleModalFourth"> Preview
                      </button>

                    </div>



                    <div class="modal fade" id="exampleModalFourth" tabindex="-1" aria-labelledby="exampleModalFourth" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Consolation Prize Icon Image</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <img id="outputFourth" style="width: 450px;" />
                          </div>
                          <div class="modal-footer">

                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
              

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
                  <?php
                  foreach ($getAvailability as $Availability) { ?>
                    <option <?php if ($quizdata['availability_id'] == $Availability['id']) echo "selected"; ?> value="<?php echo $Availability['id'] ?>"> <?php echo $Availability['title']; ?> </option>
                  <?php
                  } ?>
                </select>
                <span class="error_text"><?php echo form_error('availability_id'); ?></span>
              </div>
              <div class="mb-2 col-8">
                        <label class="d-block text-font">Standard<sup class="text-danger">*</sup></label>
                                <div class="d-flex">
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="1" name="" class="custom-control-input"  id="Standard_1"  >
                                        <label class="custom-control-label" for="Standard_1">9<sup>th</sup>Standard</label>
                                    </div>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="1" name="" class="custom-control-input"  id="Standard_2"  >
                                        <label class="custom-control-label" for="Standard_2">10<sup>th</sup>Standard</label>
                                    </div>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="1" name="" class="custom-control-input"  id="Standard_3"  >
                                        <label class="custom-control-label" for="Standard_3">11<sup>th</sup>Standard</label>
                                    </div>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input type="checkbox" value="1" name="" class="custom-control-input"  id="Standard_4">
                                        <label class="custom-control-label" for="Standard_4">12s<sup>th</sup>Standard</label>
                                    </div>
                                </div>
                        </div>
            </div>
            <div class="row mt-2">
              <div class="col-md-4 prizes-section">
                <h4 class="m-2">Load Questions</h4>
              </div>
            </div>
            <div class="row mt-2">
              <div class="mb-2 col-md-4">
                <label class="d-block text-font">Select Question Bank<sup class="text-danger">*</sup></label>
                <select class="form-control input-font" aria-label="Default select example" name="que_bank_id" id="que_bank_id" onchange="getQBDetails(this.value);">
                  <option value="<?= $quizdata['que_bank_id']; ?>"><?= $quizdata['title']; ?></option>
                </select>
                <button type="button" class="btn btn-sm  btn-primary text-white" id="fetch_que_bank">Fetch Question Banks</button>
              </div>
            </div>
            <div class="row">
              <div class="mb-2 col-md-4">
                <label class="d-block text-font">Question Bank Id<sup class="text-danger">*</sup></label>
                <input type="hidden" class="form-control input-font" name="old_que_bank_id" id="old_que_bank_id" value="<?= $quizdata['que_bank_id']; ?>">
                <input type="text" class="form-control input-font" name="qbid" id="qbid" placeholder="Enter Question Bank ID" readonly>
                <span class="error_text"><?php echo form_error('cdetails'); ?></span>
              </div>
            </div>
            <div class="row">
              <div class="mb-2 col-md-4">
                <label class="d-block text-font">Title<sup class="text-danger">*</sup></label>
                <input type="text" class="form-control input-font" name="qbtitle" id="qbtitle" placeholder="Enter Title" readonly>
              </div>
              <div class="mb-2 col-md-4">
                <label class="d-block text-font">Number of Question<sup class="text-danger">*</sup></label>
                <input type="text" class="form-control input-font" name="qbquestion" id="qbquestion" placeholder="Enter Number of Question" readonly>
              </div>
            </div>
            <div class="row mt-2">
              <div class="mb-2 col-md-12 table-responsive">
                <table id="example" class="hover table-bordered" style="width:100%">
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
            <div class="row">
              <div class="col-md-12 submit_btn p-3">
                 <a class="btn btn-success btn-sm text-white submit">Submit</a>
                 <!-- <input type="submit" name="DoEdit" class="btn btn-info btn-sm" value="Submitttt"> -->
                <!-- <button id="submitForm"  class="btn btn-info btn-sm">Submit</button> -->
                <a class="btn btn-danger btn-sm text-white cancel">Cancel</a>
                <input type="reset" name="Reset" class="btn btn-warning btn-sm text-white">
              </div>
            </div>
          </div>
          <!-- 4th PRIZE -->       
         
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

  // function resetbanner() {
  //   $("#banner_img").val('');
  //   $("#outputbanner").hide();
  // }
  // //end

  //First Prize Image Preview
  var loadFileFirst = function(event) {
    $("#outputFirst").show();
    var outputFirst = document.getElementById('outputFirst');
    outputFirst.src = URL.createObjectURL(event.target.files[0]);
    outputFirst.onload = function() {
      URL.revokeObjectURL(outputFirst.src);
    }
  };

 

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
  $(document).ready(function() {
    $('#add_file1').hide();
    $('#add_file2').hide();
    $('#add_file3').hide();
    $('#add_file4').hide();
    
    var exist_fp = $('#exist_fp').val();
    if(exist_fp == 0){
      $('#add_file1').show();
    }

    var exist_sp = $('#exist_sp').val();
    if(exist_sp == 0){
      $('#add_file2').show();
    }

    var exist_tp = $('#exist_tp').val();
    if(exist_tp == 0){
      $('#add_file3').show();
    }

    var exist_cp = $('#exist_cp').val();
    if(exist_cp == 0){
      $('#add_file4').show();
    }

    $('#delete_preview').show();
    $('#add_file').hide();
    $('#icon_file').attr('required', false);
    // $('#outputicon').attr('src',)

    $('.del_icon').on('click', function(e) {
      e.preventDefault();
      const $root = $(this);
      var id = $root.data('id');
      var img_name = $root.data('imgname');

       // -- sweet alert start
       Swal.fire({
                    title: 'Are you sure you want to delete?',
                    showDenyButton: true,
                    showCancelButton: false,
                    confirmButtonText: 'Delete',
                    denyButtonText: `Cancel`,
                    }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {                       
                                        jQuery.ajax({
                                        type: "POST",
                                        url: '<?php echo base_url(); ?>quiz/deleteBanner',
                                        dataType: 'json',
                                        data: {
                                        "id": id,
                                        "img_name" :img_name
                    },
                    success: function(res) {
                        if (res.status == 0) {
                            Swal.fire(res.message);

                        } else {
                            Swal.fire(res.message);
                            $('#delete_preview').hide();
                            $('#add_file').show();
                            $('#ban_img').val(1);
                            
                            // $('#icon_file').add('attr','required');
                           // $('#banner_img').attr('required', true);
                            //window.location.replace("<?php //echo base_url(); ?>subadmin/questionBankList");
                        }
                    },
                    error: function(xhr, status, error) {
                        //toastr.error('Failed to add '+xData.name+' in wishlist.');
                        console.log(error);
                    }
                });
                       // Swal.fire('Saved!', '', 'success')                                
                    } else if (result.isDenied) {
                        // Swal.fire('Changes are not saved', '', 'info')
                    }
                    })
                // -- sweet alert end
     
    });
    $('.del_icon_prize_img').on('click', function(e) {
      e.preventDefault();
      const $root = $(this);
      var quiz_id = $root.data('id');
      var img_name = $root.data('imgname');
      var prize_id = $root.data('prizeid');
      var prize = $root.data('prize');

       // -- sweet alert start
       Swal.fire({
                    title: 'Are you sure you want to delete?',
                    showDenyButton: true,
                    showCancelButton: false,
                    confirmButtonText: 'Delete',
                    denyButtonText: `Cancel`,
                    }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {                       
                                        jQuery.ajax({
                                        type: "POST",
                                        url: '<?php echo base_url(); ?>quiz/deletePrizeImg',
                                        dataType: 'json',
                                        data: {
                                        "quiz_id": quiz_id,
                                        "img_name" :img_name,
                                        "prize_id": prize_id, 
                                      },
                    success: function(res) {
                        if (res.status == 0) {
                            Swal.fire(res.message);

                        } else {
                            Swal.fire(res.message);
                            if(prize == 1){
                              $('#delete_preview1').hide();
                              $('#add_file1').show();
                              $('#lastfprize_img0').val('');
                              $('#lastfprize_img1').val('');
                            }
                            if(prize == 2){
                              $('#delete_preview2').hide();
                               $('#add_file2').show();
                               $('#lastsprize_img0').val('');
                              $('#lastsprize_img1').val('');
                            }
                            if(prize == 3){
                                $('#delete_preview3').hide();
                                $('#add_file3').show();
                                $('#lasttprize_img0').val('');
                              $('#lasttprize_img1').val('');    
                            }
                            if(prize == 4){
                              $('#delete_preview4').hide();
                              $('#add_file4').show(); 
                              $('#lastcprize_img0').val('');
                              $('#lastcprize_img1').val('');   
                            }
                          
                        }
                    },
                    error: function(xhr, status, error) {
                        //toastr.error('Failed to add '+xData.name+' in wishlist.');
                        console.log(error);
                    }
                });
                       // Swal.fire('Saved!', '', 'success')                                
                    } else if (result.isDenied) {
                        // Swal.fire('Changes are not saved', '', 'info')
                    }
                    })
                // -- sweet alert end
     
    });
  
  });


  
  $('.cancel').on('click', function() {
    Swal.fire({
      title: 'Are you sure you want to Cancel?',
      showDenyButton: true,
      showCancelButton: false,
      confirmButtonText: 'Cancel',
      denyButtonText: `Close`,
    }).then((result) => {
      /* Read more about isConfirmed, isDenied below */
      if (result.isConfirmed) {
        window.location.replace('<?php echo base_url() . 'Quiz/quiz_list' ?>');
      } else if (result.isDenied) {
        // Swal.fire('Changes are not saved', '', 'info')
      }
    })
  })

  $('.submit').on('click', function(e) {
    e.preventDefault();
    Swal.fire({
      title: 'Are you sure you want to Submit?',
      showDenyButton: true,
      showCancelButton: false,
      confirmButtonText: 'Submit',
      denyButtonText: `Cancel`,
    }).then((result) => {
      /* Read more about isConfirmed, isDenied below */
      if (result.isConfirmed) {
        // window.location.replace('<?php //echo base_url() . 'Quiz/quiz_list' ?>');
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

        var duration = $("#duration").val();
        if (duration == "" || duration == null) {
            if ($("#duration").next(".validation").length == 0) {
                $("#duration").after("<div class='validation' style='color:red;margin-bottom:15px;'>This value is required.</div>");
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
                $("#total_mark").after("<div class='validation' style='color:red;margin-bottom:15px;'>This value is required. </div>");
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
                $("#total_question").after("<div class='validation' style='color:red;margin-bottom:15px;'>This value is required.</div>");
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

        var language_id = $("#language_id").val();
        if (language_id == "" || language_id == null) {
            if ($("#language_id").next(".validation").length == 0) {
                $("#language_id").after("<div class='validation' style='color:red;margin-bottom:15px;'>This value is required. </div>");
            }
            if (!focusSet) {
                $("#language_id").focus();
            }
            allfields = false;
        } else {
            $("#language_id").next(".validation").remove();
        }
        var ban_img = $("#ban_img").val(); 
        alert(ban_img);
        if(ban_img == 1)  {
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

        }
       
        var fprizes = $("#fprizes").val();
        if (fprizes == "" || fprizes == null) {
            if ($("#fprizes").next(".validation").length == 0) {
                $("#fprizes").after("<div class='validation' style='color:red;margin-bottom:15px;'>This value is required. </div>");
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

        var que_bank_id = $("#que_bank_id").val();
        if (que_bank_id == "" || que_bank_id == null) {
            if ($("#que_bank_id").next(".validation").length == 0) {
                $("#que_bank_id").after("<div class='validation' style='color:red;margin-bottom:15px;'>This value is required.</div>");
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
        
        if (allfields) {

        $('#editquiz').submit();

        }
      } else if (result.isDenied) {
        // Swal.fire('Changes are not saved', '', 'info')
      }
    })
  })
</script>