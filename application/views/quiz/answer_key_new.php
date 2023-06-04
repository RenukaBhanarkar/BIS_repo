<style>
    .green {
        color: darkgreen !important;
    }

    .greenBorder {
        border: 2px solid green;
        padding: 10px;
    }

    .redBorder {
        border: 2px solid red;
        padding: 10px;
    }

    .red {
        color: red !important;
    }

    .card-body {
        padding: 21px 21px 20px 114px;
    }

    .correct_answer {
    position: absolute;
    margin-left: -166px;
    margin-top: -5px;
    padding: 5px;
    /* border: 2px solid green; */
    border-radius: 0px 9px 9px 0px;
    background: green;
    color: white;
    text-align: center;
    width: 118px;
    
}
span.correct_answer:after {
    content: '';
    display: block;
    position: absolute;
    top: 6px;
    left: 99%;
    width: 0;
    height: 0;
    border-color: transparent transparent transparent #008000;
    border-style: solid;
    border-width: 10px;
}
.incorrect_answer {
    position: absolute;
    margin-left: -166px;
    margin-top: -5px;
    padding: 5px;
    /* border: 2px solid green; */
    border-radius: 0px 9px 9px 0px;
    background: red;
    color: white;
    text-align: center;
}
span.incorrect_answer:after {
    content: '';
    display: block;
    position: absolute;
    top: 6px;
    left: 99%;
    width: 0;
    height: 0;
    border-color: transparent transparent transparent #ff0000;
    border-style: solid;
    border-width: 10px;
}
</style>
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Answer Key List</h1>
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
    <!-- <div class="row">
        <div class="col-md-12" style="text-align: end;">
            <a class="btn btn-primary btn-sm mr-2">Export as PDF</a>
            <a class="btn btn-info btn-sm mr-2">Print</a>
        </div>
    </div> -->
    <!-- Content Row -->
    <div class="row">
        <div class="col-12 mt-3">
            <div class="card border-top">
                <?php if (!empty($answerKey)) { ?>
                    <div class="card-body">
                        <?php
                        $j = 1;
                        foreach ($answerKey as $row) { ?>
                            <div class="row" style="background: aliceblue;">
                                <div class="mb-2 col-md-12 d-flex">
                                    <label class="d-block text-font mt-2">Question <?= $j ?> :</label>
                                    <div class="ml-2 mt-2">
                                        <?php if ($row['language_id'] == 1 || $row['language_id'] == 3) { ?>
                                            <div class="qustion-ans"> <?= $row['que'] ?> </div>
                                        <?php } else { ?>
                                            <div class="qustion-ans"> <?= $row['que_h'] ?> </div>
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
                                    <div> <?php
                                            if ($row['selected_lang'] == 0) {
                                                if ($row['language_id'] == 1) {
                                                    $option1 = $opt1_e;
                                                    $option2 = $opt2_e;
                                                    $option3 = $opt3_e;
                                                    $option4 = $opt4_e;
                                                    $option5 = $opt5_e;
                                                } else {
                                                    $option1 = $opt1_h;
                                                    $option2 = $opt2_h;
                                                    $option3 = $opt3_h;
                                                    $option4 = $opt4_h;
                                                    $option5 = $opt5_h;
                                                }
                                            } else if ($row['selected_lang'] == 1) {
                                                $option1 = $opt1_e;
                                                $option2 = $opt2_e;
                                                $option3 = $opt3_e;
                                                $option4 = $opt4_e;
                                                $option5 = $opt5_e;
                                            } else {
                                                $option1 = $opt1_h;
                                                $option2 = $opt2_h;
                                                $option3 = $opt3_h;
                                                $option4 = $opt4_h;
                                                $option5 = $opt5_h;
                                            }
                                            ?>
                                        <ol>
                                            <?php $correct1 = 0;
                                            $incorrect1 = 0;
                                            $correct2 = 0;
                                            $incorrect2 = 0;
                                            $correct3 = 0;
                                            $incorrect3 = 0;
                                            $correct4 = 0;
                                            $incorrect4 = 0;
                                            $correct5 = 0;
                                            $incorrect5 = 0;


                                            ?>


                                            <li <?php if ($row['corr_opt_e'] == 1) {
                                                    echo "class='greenBorder'";
                                                    $correct1++;
                                                } ?> <?php if (($row['corr_opt_e'] == $row['selected_op']) && ($row['corr_opt_e'] == 1)) {
                                                echo "class='greenBorder' ";
                                                $correct1++;
                                            }

                                            if (($row['corr_opt_e'] != $row['selected_op']) && ($row['selected_op'] == 1)) {
                                                echo "class='redBorder'";
                                                $incorrect1++;
                                            } ?>>

                                                
                                                <?php if ($correct1 > 0) { ?>
                                                    <span class="correct_answer">Correct Answer</span>
                                                <?php } ?>
                                                <?php if ($incorrect1 > 0) { ?>
                                                    <span class="incorrect_answer">Incorrect Answer</span>
                                                <?php } ?>

                                                <?php echo  $option1; ?>


                                            </li>








                                            <li <?php if ($row['corr_opt_e'] == 2) {
                                                    echo "class='greenBorder'";
                                                    $correct2++;
                                                } ?> <?php if (($row['corr_opt_e'] == $row['selected_op']) && ($row['corr_opt_e'] == 2)) {
                                                echo "class='greenBorder'";
                                                $correct2++;
                                            }
                                            if (($row['corr_opt_e'] != $row['selected_op']) && ($row['selected_op'] == 2)) {
                                                echo "class='redBorder'";
                                                $incorrect2++;
                                            } ?>>

                                                <?php if ($correct2 > 0) { ?>
                                                    <span class="correct_answer">Correct Answer</span>
                                                <?php } ?>
                                                <?php if ($incorrect2 > 0) { ?>
                                                    <span class="incorrect_answer">Incorrect Answer</span>
                                                <?php } ?>
                                                <?php echo  $option2; ?>
                                            </li>






                                            <li <?php if ($row['corr_opt_e'] == 3) {
                                                    echo "class='greenBorder'";
                                                    $correct3++;
                                                } ?> <?php if (($row['corr_opt_e'] == $row['selected_op']) && ($row['corr_opt_e'] == 3)) {
                                                echo "class='greenBorder'";
                                                $correct3++;
                                            }
                                            if (($row['corr_opt_e'] != $row['selected_op']) && ($row['selected_op'] == 3)) {
                                                echo "class='redBorder'";
                                                $incorrect3++;
                                            } ?>> 

                                                <?php if ($correct3 > 0) { ?>
                                                    <span class="correct_answer">Correct Answer</span>
                                                <?php } ?>
                                                <?php if ($incorrect3 > 0) { ?>
                                                    <span class="incorrect_answer">Incorrect Answer</span>
                                                <?php } ?>
                                                <?php echo  $option3; ?>
                                            </li>




                                            <li <?php if ($row['corr_opt_e'] == 4) {
                                                    echo "class='greenBorder '";
                                                    $correct4++;
                                                } ?> <?php if (($row['corr_opt_e'] == $row['selected_op']) && ($row['corr_opt_e'] == 4)) {
                                                echo "class='greenBorder'";
                                                $correct4++;
                                            }
                                            if (($row['corr_opt_e'] != $row['selected_op']) && ($row['selected_op'] == 4)) {
                                                echo "class='redBorder'";
                                                $incorrect4++;
                                            } ?>> 
                                                <?php if ($correct4 > 0) { ?>
                                                    <span class="correct_answer">Correct Answer</span>
                                                <?php } ?>
                                                <?php if ($incorrect4 > 0) { ?>
                                                    <span class="incorrect_answer">Incorrect Answer</span>
                                                <?php } ?>
                                                <?php echo  $option4; ?>

                                            </li>








                                            <li <?php if ($row['corr_opt_e'] == 5) {
                                                    echo "class='greenBorder '";
                                                    $correct5++;
                                                } ?> <?php if (($row['corr_opt_e'] == $row['selected_op']) && ($row['corr_opt_e'] == 5)) {
                                                echo "class='greenBorder'";
                                                $correct5++;
                                            }
                                            if (($row['corr_opt_e'] != $row['selected_op']) && ($row['selected_op'] == 5)) {
                                                echo "class='redBorder '";
                                                $incorrect5++;
                                            } ?>> 

                                                <?php if ($correct5 > 0) { ?>
                                                    <span class="correct_answer">Correct Answer</span>
                                                <?php } ?>
                                                <?php if ($incorrect5 > 0) { ?>
                                                    <span class="incorrect_answer">Incorrect Answer</span>
                                                <?php } ?>
                                                <?php echo  $option5; ?>
                                            </li>


                                            <!-- <li class="greenBorder">Mango<span class="correct_answer">Correct Answer</span></li>
                                    <li>NA</li>
                                    <li class="redBorder">Apple<span class="incorrect_answer">Correct Answer</span></li>
                                    <li>NA</li> -->






                                        </ol>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-2 col-md-4 d-flex">
                                    <div class="d-flex">
                                        <label class="d-block text-font">Correct Option :</label>
                                        <div class="ml-2">
                                            <p><?php echo $row['corr_opt_e']; ?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-2 col-md-4 d-flex">
                                    <div class="d-flex">
                                        <label class="d-block text-font">Selected Option:</label>
                                        <div class="ml-2">
                                            <p><?php echo $row['selected_op']; ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        <?php $j++;
                        } ?>

                        <!-- <div class="row" style="background: aliceblue;">
                        <div class="mb-2 col-md-12 d-flex">
                            <label class="d-block text-font mt-2">Question 2  :</label>
                            <div class="ml-2 mt-2">
                                <p class="qustion-ans"> sdds </p>        
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-2 col-md-12">
                            <label class="d-block text-font">Options :</label>
                                                        <div>
                                <ol>
                                    <li>fwewef</li>
                                    <li style="border:2px solid green; padding:10px;">Mango<span class="correct_answer">Correct Answer</span></li>
                                    <li>NA</li>
                                    <li style="border:2px solid red; padding:10px;">Apple<span class="incorrect_answer">Correct Answer</span></li>
                                    <li>NA</li>
                                </ol>
                            </div>
                           
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-2 col-md-4 d-flex">
                            <div class="d-flex">
                            <label class="d-block text-font">Correct Option :</label>
                            <div class="ml-2">
                                <p>1</p>
                            </div>
                            </div>
                        </div>
                        <div class="mb-2 col-md-4 d-flex">
                        <div class="d-flex">
                            <label class="d-block text-font">Selected Option:</label>
                            <div class="ml-2">
                                <p>1</p>
                            </div>
                        </div>
                        </div>
                    </div> -->

                    </div>
                    <div class="col-md-12 submit_btn p-3">
                        <a class="btn btn-primary btn-sm text-white" onclick="location.href='<?php echo base_url(); ?>Quiz/closed_quiz_submission/<?= encryptids('E', $row['quiz_id']); ?>'">Back</a>
                    </div>

                <?php } else {  ?>
                    <p>Records are not available</p>
                <?php } ?>


            </div>
        </div>
    </div>
</div>


</div>
<!-- End of Main Content -->