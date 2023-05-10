<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Quiz Result Declaration View</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url().'Admin/dashboard';?>" >Sub Admin Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'admin/exchange_forum';?>" >Exchange Forum</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'quiz/organizing_quiz';?>" >Competitions</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'quiz/quiz_dashboard';?>" >Quiz Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'quiz/result_declaration_list';?>" >Quiz Result Declaration</a></li>
                <!-- <li class="breadcrumb-item active" aria-current="page">Quiz Result Declaration View</li> -->
                
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
                            <label class="d-block text-font">Name of Quiz</label>
                            <div>
                                <p><?=$ResultDatas['title']?></p>
                            </div>
                        </div>
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Quiz Id</label>
                            <div>
                                <p><?=$ResultDatas['quizId']?></p>
                            </div>
                        </div>
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Quiz Date</label>
                            <div>
                                <p><?=$ResultDatas['startDate']?></p>
                            </div>
                        </div>
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Total Marks</label>
                            <div>
                                <p><?=$ResultDatas['total_mark']?></p>
                            </div>
                        </div>
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Total Submission</label>
                            <div>
                                <p><?=$ResultDatas['total_submission']?></p>
                            </div>
                        </div>
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Total Winners</label>
                            <div>
                                <p><?=$ResultDatas['total_winner']?></p>
                            </div>
                        </div>
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Declared on</label>
                            <div>
                                <p><?=$ResultDatas['declare_on']?></p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mt-3 table-responsive">
                            <table id="example" class="table-bordered display nowrap" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Sr. No.</th>
                                        <th>Name</th>
                                        <th>Email ID</th>
                                        <th>Contact No.</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>Score</th>
                                        <th>Prize</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($UsersDetails as $key => $value) {?>
                                    <tr>
                                        <td><?= $key+1?></td>
                                        <td><?= $value['user_name']?></td>
                                        <td><?= $value['email']?></td>
                                        <td><?= $value['user_mobile']?></td>
                                        <td><?= $value['created_on']?></td>
                                        <td><?= $value['start_time']?></td>
                                        <td><?= $value['score']?></td>
                                        <td>
                                            <?php 
                                            if ($value['userprize']==1) { $prize='First Prize'; } 
                                            if ($value['userprize']==2) { $prize='Second Prize'; } 
                                            if ($value['userprize']==3) { $prize='Third Prize'; } 
                                            if ($value['userprize']==4) { $prize='Consolation Prize'; } 
                                            ?>
                                            <?= $prize?>
                                        </td>
                                        <!-- <td>First Prize</td> -->
                                        
                                    </tr>
                                    <?php } ?>
                                    
                                    
                                    
                                    
                                    
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 submit_btn p-3">
                    <a class="btn btn-primary btn-sm text-white" onclick="location.href='<?php echo base_url();?>admin/admin_creation_list'">Back</a>
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
    </div>
</div>
</div>
<!-- End of Main Content -->