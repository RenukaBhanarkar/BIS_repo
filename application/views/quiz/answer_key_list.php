<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Quiz Result Declaration View</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url() . 'Admin/dashboard'; ?>">Sub Admin Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url() . 'admin/exchange_forum'; ?>">Exchange Forum</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url() . 'quiz/organizing_quiz'; ?>">Competitions</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url() . 'quiz/quiz_dashboard'; ?>">Quiz Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url() . 'quiz/result_declaration_list'; ?>">Quiz Result Declaration</a></li>
                <!-- <li class="breadcrumb-item active" aria-current="page">Quiz Result Declaration View</li> -->

            </ol>
        </nav>

    </div>
    <div class="row">
        <div class="col-md-12" style="text-align: end;">
            <a class="btn btn-primary btn-sm mr-2">Export as PDF</a>
            <a class="btn btn-info btn-sm mr-2">Print</a>
        </div>
    </div>
    <!-- Content Row -->
    <div class="row">
        <div class="col-12 mt-3">
            <div class="card border-top">
                <div class="card-body">
                    <?php 
                    $j = 1;
                    foreach($answerKey as $row) { ?> 
                    <div class="row">
                        <div class="mb-2 col-md-12 d-flex">
                            <label class="d-block text-font">Question <?= $j ?>  :</label>
                            <div class="ml-2">
                            <?php if ($row['language_id'] == 1 || $row['language_id'] == 3) { ?>
                                        <p class="qustion-ans"> <?=  $row['que'] ?> </p>        
                                        <?php } else{ ?> 
                                         <p class="qustion-ans"> <?=  $row['que_h'] ?> </p>
                                         <?php }   ?>
                                         <?php if ($row['que_type'] == 2 || $row['que_type'] == 3) { ?>
                                                           
                                                            <img width="100" src="<?php echo base_url(); ?>uploads/que_img/bankid<?php echo $row['que_bank_id']; ?>/<?php echo $row['image']; ?>">
                                                        <?php }  ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-2 col-md-12">
                            <label class="d-block text-font">Options :</label>
                            <?php
                                            if ($row['option1_image'] != "") {
                                                $op1_img = $row['option1_image'];
                                                $opt1_e = '<img width="100" src=' . base_url() . 'uploads/que_img/bankid' . $row['que_bank_id'] . '/' . $op1_img . '>';
                                            } else {
                                                if ($row['opt1_e'] != "") {
                                                    $opt1_e = $row['opt1_e'];
                                                } else {
                                                    $opt1_e = "NA";
                                                }
                                            }
                                            if ($row['option2_image'] != "") {
                                                $op2_img = $row['option2_image'];
                                                $opt2_e = '<img width="100" src=' . base_url() . 'uploads/que_img/bankid' . $row['que_bank_id'] . '/' . $op2_img . '>';
                                            } else {
                                                if ($row['opt2_e'] != "") {
                                                    $opt2_e = $row['opt2_e'];
                                                } else {
                                                    $opt2_e = "NA";
                                                }
                                            }
                                            if ($row['option3_image'] != "") {
                                                $op3_img = $row['option3_image'];
                                                $opt3_e = '<img width="100" src=' . base_url() . 'uploads/que_img/bankid' . $row['que_bank_id'] . '/' . $op3_img . '>';
                                            } else {
                                                if ($row['opt3_e'] != "") {
                                                    $opt3_e = $row['opt3_e'];
                                                } else {
                                                    $opt3_e = "NA";
                                                }
                                            }
                                            if ($row['option4_image'] != "") {
                                                $op4_img = $row['option4_image'];
                                                $opt4_e = '<img width="100" src=' . base_url() . 'uploads/que_img/bankid' . $row['que_bank_id'] . '/' . $op4_img . '>';
                                            } else {

                                                if ($row['opt4_e'] != "") {
                                                    $opt4_e = $row['opt4_e'];
                                                } else {
                                                    $opt4_e = "NA";
                                                }
                                            }
                                            if ($row['option5_image'] != "") {
                                                $op5_img = $row['option5_image'];
                                                $opt5_e = '<img width="100" src=' . base_url() . 'uploads/que_img/bankid' . $row['que_bank_id'] . '/' . $op5_img . '>';
                                            } else {

                                                if ($row['opt5_e'] != "") {
                                                    $opt5_e = $row['opt5_e'];
                                                } else {
                                                    $opt5_e = "NA";
                                                }
                                            }
                                            if ($row['option1_h_image'] != "") {
                                                $op1_h_img = $row['option1_h_image'];
                                                $opt1_h = '<img width="100" src=' . base_url() . 'uploads/que_img/bankid' . $row['que_bank_id'] . '/' . $op1_h_img . '>';
                                            } else {

                                                if ($row['opt1_h'] != "") {
                                                    $opt1_h = $row['opt1_h'];
                                                } else {
                                                    $opt1_h = "NA";
                                                }
                                            }
                                            if ($row['option2_h_image'] != "") {
                                                $op2_h_img = $row['option2_h_image'];
                                                $opt2_h = '<img width="100" src=' . base_url() . 'uploads/que_img/bankid' . $row['que_bank_id'] . '/' . $op2_h_img . '>';
                                            } else {

                                                if ($row['opt2_h'] != "") {
                                                    $opt2_h = $row['opt2_h'];
                                                } else {
                                                    $opt2_h = "NA";
                                                }
                                            }
                                            if ($row['option3_h_image'] != "") {
                                                $op3_h_img = $row['option3_h_image'];
                                                $opt3_h = '<img width="100" src=' . base_url() . 'uploads/que_img/bankid' . $row['que_bank_id'] . '/' . $op3_h_img . '>';
                                            } else {

                                                if ($row['opt3_h'] != "") {
                                                    $opt3_h = $row['opt3_h'];
                                                } else {
                                                    $opt3_h = "NA";
                                                }
                                            }
                                            if ($row['option4_h_image'] != "") {
                                                $op4_h_img = $row['option4_h_image'];
                                                $opt4_h = '<img width="100" src=' . base_url() . 'uploads/que_img/bankid' . $row['que_bank_id'] . '/' . $op4_h_img . '>';
                                            } else {

                                                if ($row['opt4_e'] != "") {
                                                    $opt4_h = $row['opt4_e'];
                                                } else {
                                                    $opt4_h = "NA";
                                                }
                                            }
                                            if ($row['option5_h_image'] != "") {
                                                $op5_h_img = $row['option5_h_image'];
                                                $opt5_h = '<img width="100" src=' . base_url() . 'uploads/que_img/bankid' . $row['que_bank_id'] . '/' . $op5_h_img . '>';
                                            } else {

                                                if ($row['opt5_h'] != "") {
                                                    $opt5_h = $row['opt5_h'];
                                                } else {
                                                    $opt5_h = "NA";
                                                }
                                            }
                                            ?>
                            <div>
                                <?php 
                                      if($row['selected_lang'] == 0){
                                        if($row['language_id'] == 1){
                                            $option1 = $opt1_e; 
                                            $option2 = $opt2_e; 
                                            $option3 = $opt3_e; 
                                            $option4 = $opt4_e; 
                                            $option5 = $opt5_e; 
                                        }else{
                                            $option1 = $opt1_h; 
                                            $option2 = $opt2_h; 
                                            $option3 = $opt3_h; 
                                            $option4 = $opt4_h; 
                                            $option5 = $opt5_h; 
                                        }
                                      }else if($row['selected_lang'] == 1){
                                            $option1 = $opt1_e; 
                                            $option2 = $opt2_e; 
                                            $option3 = $opt3_e; 
                                            $option4 = $opt4_e; 
                                            $option5 = $opt5_e; 
                                          
                                      }else{
                                            $option1 = $opt1_h; 
                                            $option2 = $opt2_h; 
                                            $option3 = $opt3_h; 
                                            $option4 = $opt4_h; 
                                            $option5 = $opt5_h; 
                                      }
                                ?>
                                <ol>
                                    <li><?php echo  $option1 ;?></li>
                                    <li><?php echo  $option2 ;?></li>
                                    <li><?php echo  $option3 ;?></li>
                                    <li><?php echo  $option4 ;?></li>
                                    <li><?php echo  $option5 ;?></li>
                                </ol>
                             
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-2 col-md-4 d-flex">
                            <label class="d-block text-font">Correct Option :</label>
                            <div class="ml-2">
                                <p><?php echo $row['corr_opt_e'];?></p>
                            </div>
                        </div>
                        <div class="mb-2 col-md-4 d-flex">
                            <label class="d-block text-font">Selected Option:</label>
                            <div class="ml-2">
                                <p><?php echo $row['selected_op'];?></p>
                            </div>
                        </div>
                        <!-- <div class="mb-2 col-md-4 d-flex">
                            <label class="d-block text-font">Marked For Review:</label>
                            <div class="ml-2">
                                <?php 
                                   /* $mark =  $row['mark_review'];
                                    if ($mark  == 1){
                                        $showMark = "Yes";
                                    }else{
                                        $showMark = "No";
                                    }*/
                                ?>
                                <p><?php //$showMark ;?></p>
                            </div>
                        </div> -->
                    </div>
                    <?php $j++ ; } ?>
                    <!-- <hr>
                    <div class="row">
                        <div class="mb-2 col-md-6">
                            <label class="d-block text-font">Question 2:</label>
                            <div>
                                <p>Which Symbol is this ?</p>
                            </div>
                            <div>
                                <img src="http://localhost/BIS/BIS_repo/assets/admin/img/bis_logo.png" alt="" class="" width="100%" style="height:227px">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="mb-2 col-md-12">
                            <label class="d-block text-font">Option :</label>
                            <div class="row">
                                <div class="col-md-6">
                                    <img src="http://localhost/BIS/BIS_repo/assets/admin/img/quiz_img.jpeg" alt="" class="" width="100%" style="height:181px">
                                </div>
                                <div class="col-md-6">
                                    <img src="http://localhost/BIS/BIS_repo/assets/admin/img/quiz_img.jpeg" alt="" class="" width="100%" style="height:181px">
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-6">
                                    <img src="http://localhost/BIS/BIS_repo/assets/admin/img/quiz_img.jpeg" alt="" class="" width="100%" style="height:181px">
                                </div>
                                <div class="col-md-6">
                                    <img src="http://localhost/BIS/BIS_repo/assets/admin/img/quiz_img.jpeg" alt="" class="" width="100%" style="height:181px">
                                </div>
                            </div>
                        </div>
                    
                        <div class="row">
                            <div class="mb-2 col-md-8 d-flex">
                                <label class="d-block text-font">Correct Option :</label>
                                <div class="ml-2">
                                    <p>5</p>
                                </div>
                            </div>
                            <div class="mb-2 col-md-4 d-flex">
                                <label class="d-block text-font">Option Select :</label>
                                <div class="ml-2">
                                    <p>100</p>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
                <div class="col-md-12 submit_btn p-3">
                    <a class="btn btn-primary btn-sm text-white" onclick="location.href='<?php echo base_url(); ?>Quiz/closed_quiz_submission/<?php echo  $row['quiz_id'];?>'">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>


</div>
<!-- End of Main Content -->