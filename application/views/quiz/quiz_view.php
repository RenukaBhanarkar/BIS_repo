<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Quiz View</h1>
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url().'Admin/dashboard';?>" >Sub Admin Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'admin/exchange_forum';?>" >Exchange Forum</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'quiz/organizing_quiz';?>" >Competitions</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'quiz/quiz_dashboard';?>" >Quiz Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'Quiz/quiz_list';?>" >Quiz Creation</a></li>
                <li class="breadcrumb-item active" aria-current="page">Quiz View</li>
                
                </ol>
            </nav>
    </div>
    <!-- Content Row -->
    <div class="row">
        <div class="col-12 mt-3">
            <div class="card border-top">
                <div class="card-body">
                    <div class="row">
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Quiz ID</label>
                            <div>

                                <p><?= $quizdata['quiz_id']; ?></p>
                            </div>
                        </div>
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Quiz Title</label>
                            <div>
                                <p><?= $quizdata['title']; ?></p>
                            </div>
                        </div>
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Hindi Title</label>
                            <div>
                                <p><?= $quizdata['title_hindi']; ?></p>
                            </div>
                        </div>
                        <div class="mb-2 col-md-12">
                            <label class="d-block text-font">Description</label>
                            <div>
                                <p><?= $quizdata['description']; ?></p>
                            </div>
                        </div>
                        <div class="mb-2 col-md-12">
                            <label class="d-block text-font">Terms and Conditions</label>
                            <div>
                                <p><?= $quizdata['terms_conditions']; ?></p>
                            </div>
                        </div>

                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Quiz Start Date</label>
                            <div>
                                
                                <p><?= date("d-m-Y", strtotime($quizdata['start_date']));?></p>
                                 
                            </div>
                        </div>
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Quiz end Date</label>
                            <div>
                                <p><?= date("d-m-Y", strtotime($quizdata['end_date']));?></p>
                            </div>
                        </div>
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Start Time</label>
                            <div>
                                <p><?= $quizdata['start_time']; ?></p>
                            </div>
                        </div>
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">End Time</label>
                            <div>
                                <p><?= $quizdata['end_time']; ?></p>
                            </div>
                        </div>
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Total Question in Quiz</label>
                            <div>
                                <p><?= $quizdata['total_question']; ?></p>
                            </div>
                        </div>
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Total Question in QB<sup class="text-danger">*</sup></label>
                            <div>
                                <p><?= $quizdata['no_of_ques']; ?></p>
                            </div>
                        </div>
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Total Marks<sup class="text-danger">*</sup></label>
                            <div>
                                <p><?= $quizdata['total_mark']; ?></p>
                            </div>
                        </div>
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Level of Quiz<sup class="text-danger">*</sup></label>
                            <div>
                                <p><?= $quizdata['level']; ?></p>
                            </div>
                        </div>
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Language of Quiz<sup class="text-danger">*</sup></label>
                            <div>
                                <p><?= $quizdata['language']; ?></p>
                            </div>
                        </div>
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Switching Type<sup class="text-danger">*</sup></label>
                            <div>
                                <?php if ($quizdata['switching_type'] == 1){
                                    echo "Random"; }else {echo "Serially";}?>
                                
                            </div>
                        </div>
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Upload Quiz Banner</label>
                            <div>
                                <p><img src="../../<?= $quizdata['banner_img']; ?>" style="width:200px;"></p>
                            </div>
                        </div>
                    </div>
                    <?php if (!empty ($firstprize) ){ ?> 
                    <div class="row mt-2">
                        <div class="col-md-4 prizes-section">
                            <h4 class="m-2">1<sup>st</sup> Prize</h4>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="mb-2 col-md-4 ">
                            <label class="d-block text-font">Number of Prizes</label>
                            <div>
                                <p><?= $firstprize['no_of_prize']; ?></p>
                            </div>
                        </div>
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Prize Details</label>
                            <div>
                                <p><?= $firstprize['prize_details']; ?></p>
                            </div>
                        </div>
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Image</label>
                            <div>
                            <?php if($firstprize['prize_img']== '') { 
                                echo "NA";
                             } else { ?>
                                  <p><img src="../../<?= $firstprize['prize_img']; ?>" style="width:200px;"></p>
                            <?php  } ?>
                              
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    <?php if (!empty ($secondprize) ){ ?> 
                    <div class="row mt-2">
                        <div class="col-md-4 prizes-section">
                            <h4 class="m-2">2<sup>nd</sup>Prizes</h4>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Number of Prizes</label>
                            <div>
                                <p><?= $secondprize['no_of_prize']; ?></p>
                            </div>
                        </div>
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Prize Details</label>
                            <div>
                                <p><?= $secondprize['prize_details']; ?></p>
                            </div>
                        </div>
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Image</label>
                            <div>
                            <?php if($secondprize['prize_img']== '') { 
                                echo "NA";
                             } else { ?>
                                  <p><img src="../../<?= $secondprize['prize_img']; ?>" style="width:200px;"></p>
                            <?php  } ?>
                              
                            </div>
                        </div>
                    </div>
                    <?php }  else { echo "Second Prizes not available"; } ?>
                    <?php if (!empty ($thirdprize) ){ ?> 
                    <div class="row mt-2">
                        <div class="col-md-4 prizes-section">
                            <h4 class="m-2">3<sup>nd</sup>Prizes</h4>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Number of Prizes</label>
                            <div>
                                <p><?= $thirdprize['no_of_prize']; ?></p>
                            </div>
                        </div>
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Prize Details</label>
                            <div>
                                <p><?= $thirdprize['prize_details']; ?></p>
                            </div>
                        </div>
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Image</label>
                            <div>
                            <?php if($thirdprize['prize_img']== '') { 
                                echo "NA";
                             } else { ?>
                                  <p><img src="../../<?= $fourthprize['prize_img']; ?>" style="width:200px;"></p>
                            <?php  } ?>
                              
                            </div>
                        </div>
                    </div>
                    <?php }  else { echo "Third Prizes not available"; } ?>
                    <?php if (!empty ($fourthprize) ){ ?> 
                    <div class="row mt-2">
                        <div class="col-md-4 prizes-section">
                            <h4 class="m-2">Consolation Prizes</h4>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Number of Prizes</label>
                            <div>
                                <p><?= $fourthprize['no_of_prize']; ?></p>
                            </div>
                        </div>
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Prize Details</label>
                            <div>
                                <p><?= $fourthprize['prize_details']; ?></p>
                            </div>
                        </div>
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Image</label>
                            <div>
                            <?php if($fourthprize['prize_img']== '') { 
                                echo "NA";
                             } else { ?>
                                  <p><img src="../../<?= $fourthprize['prize_img']; ?>" style="width:200px;"></p>
                            <?php  } ?>
                              
                            </div>
                        </div>
                    </div>
                    <?php } else { echo "Consolation Prizes not available"; } ?>
                    <div class="row mt-2">
                        <div class="col-md-4 prizes-section">
                            <h4 class="m-2">Available for</h4>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="mb-2 col-md-4">                           
                            <div>
                                <p><?= $quizdata['availability']; ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-4 prizes-section">
                            <h4 class="m-2">Load Question</h4>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Question Bank Id</label>
                            <div>
                                <p id="qbid"></p>
                            </div>
                        </div>
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Title</label>
                            <div>
                                <p id="qbtitle"></p>
                            </div>
                        </div>
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Number of Question</label>
                            <div>
                                <p id="qbquestion"></p>
                            </div>
                        </div>
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Language</label>
                            <div>
                                <p id="qbquestion"></p>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
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
                </div>
                <div class="col-md-12 submit_btn p-3">
                    <a class="btn btn-primary btn-sm text-white" onclick="location.href='<?= base_url(); ?>Quiz/quiz_list'">Back</a>
                </div>
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
                                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal -->
            </div>
        </div>
        <?php if (encryptids("D", $_SESSION['admin_type']) == 2) { ?>
            <div class="col-12 mt-3">
                <form name="quiz_reg" action="<?= base_url() . 'Admin/updateQuizStatus/' . $quizdata['id'] ?>" method="post" enctype="multipart/form-data">
                    <div class="row" id="remarkdiv">
                        <div class="mb-2 col-md-8">
                            <label class="d-block text-font" text-font>Remarks<sup class="text-danger">*</sup></label>
                            <textarea class="form-control input-font" placeholder="Enter Remark" name="remark" id="remark"><?= set_value('terms_conditions'); ?></textarea>
                            <span class="error_text"><?= form_error('terms_conditions'); ?></span>
                            <input type="hidden" name="status_id" value="3" id="status_id">
                        </div>
                    </div>
            </div>
            <?php if( $quizdata['status']==2){?>
            <div class="col-md-12 submit_btn p-3">
                <!-- <a id="approve" class="btn btn-success btn-sm text-white" data-toggle="modal" data-target="#approval">Approval</a> -->
                <input type="submit" name="Approval" value="Approve" class="btn btn-success btn-sm text-white" id="approve">
                <input type="submit" name="Approval" value="Submit" class="btn btn-success btn-sm text-white" id="submit">
                <!-- <a class="btn btn-success btn-sm text-white" data-toggle="modal" data-target="#approval" id="submit">Submit</a> -->
                <a class="btn btn-primary btn-sm text-white" id="reject" onclick="rejectFun()">Reject</a>
            </div>
            <?php } ?>
            </form>


<?php } ?>
</div>
</div>


</div>


</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>
<script type="text/javascript">
     $(document).ready(function () 
    {   
        var id="<?= $quizdata['que_bank_id'];?>"
        getQuestionListByQueBankId(id);
        getQBDetails(id);
        $("#submit").hide();
        $("#remarkdiv").hide();
    });
    function rejectFun()
     {
        $("#submit").show();
        $("#remarkdiv").show();
        $("#approve").hide();
        $("#reject").hide();
        $("#status_id").val(4);

    }
</script>

<script type="text/javascript">
    function getQuestionListByQueBankId(id) {
        $.post("<?= base_url(); ?>subadmin/getQuestionListByQueBankId/", {
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

    function getQBDetails(id) {
        $.ajax({

            url: "<?= base_url(); ?>Quiz/getQbdata/" + id,
            type: "JSON",
            method: "get",
            success: function(result) {
                var res = JSON.parse(result);
                console.log(res)
                $("#qbid").text(res.result.que_bank_id);
                $("#qbtitle").text(res.result.title);
                $("#qbquestion").text(res.result.no_of_ques);
                getQuestionListByQueBankId(id)
            }
        });
        // body...
    }
</script>