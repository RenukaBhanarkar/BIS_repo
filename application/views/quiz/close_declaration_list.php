    <!-- Begin Page Content -->
<!-- <form name="close_declaration_list" id="close_declaration_list" action="<?php echo base_url().'quiz/close_declaration_list/'?><?=$Quizinfo['id'] ?>" method="post"enctype="multipart/form-data"> -->

    <form name="close_declaration_list" id="close_declaration_list" action="<?php echo base_url().'quiz/close_declaration_list/'?><?= $Quizinfo['id'] ?>" method="post"enctype="multipart/form-data">
    <div class="container-fluid"> 
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Quiz Result Declaration</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url().'Admin/dashboard';?>" >Sub Admin Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo base_url().'admin/exchange_forum';?>" >Exchange Forum</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo base_url().'quiz/organizing_quiz';?>" >Competitions</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo base_url().'quiz/quiz_dashboard';?>" >Quiz Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo base_url().'Quiz/closed_quiz_list';?>" >Closed Quiz</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Quiz Result Declaration</li>
                    
                </ol>
            </nav>
            
        </div>
        
        
        <!-- Content Row -->
        
        <div class="row">
            <div class="col-12 mt-3">
                <div class="card border-top card-body table-responsive">
                    <table id="example" class="table-bordered display nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th><input class="form-control-input" type="checkbox" value="" id="flexCheckDefault"></th>
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
                            <?php $j = 1;
                                 foreach ($UsersDetails as $key => $user): ?>
                            <tr>
                                <td><input class="form-control-input" type="checkbox" value="<?= $user['user_id']?>" id="flexCheckDefault" name="check[]"></td>
                                <input type="hidden" name="user_id[]"value="<?= $user['user_id']?>">
                                <input type="hidden" name="quiz_id"value="<?= $user['quiz_id']?>">
                                <td><?= $j;?></td>
                                <td><?= $user['user_name']?></td>
                                <td><?= $user['email']?></td>
                                <td><?= $user['user_mobile']?></td>
                                <td><?= $user['created_on']?></td>
                                <td><?= $user['start_time']?></td>
                                <td><?= $user['score']?></td>
                                <td>
                                    <select id="prize" name="prize[]" class="form-control input-font" value="prize">
                                        <option value="0">Select Option</option>
                                        <option value="1">First Prize</option>
                                        <option value="2">Second Prize</option>
                                        <option value="3">Third Prize</option>
                                       
                                        <option value="5">Consolation Prize</option>
                                    </select>
                                </td>
                                
                            </tr>
                            
                            <?php $j++; endforeach ?>
                            
                            
                            
                            
                            
                            
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-12" style="text-align: end; padding: 31px;">
                <a class="btn btn-success btn-sm text-white" data-bs-toggle="modal" data-bs-target="#submitForm">Declared</a>
            </div>
            <div class="modal fade" id="submitForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Submit Form</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span></button>
                            </div>
                            <div class="modal-body">
                                <p>Are you sure you want to Submit?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"  id="closeform"data-dismiss="modal">Close</button>
                                <input type="submit" name="Submit" class="btn btn-success btn-sm text-white" id="btnsubmit">
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</form>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->