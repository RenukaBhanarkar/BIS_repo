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
                    <?php foreach ($ResultData as $row) { ?> 
                    <div class="row">
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Name of Quiz</label>
                            <div>
                                <p><?=$row['title']?></p>
                            </div>
                        </div>
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Quiz Id</label>
                            <div>
                                <p><?=$row['quiz_id']?></p>
                            </div>
                        </div>
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Quiz Start Date</label>
                            <div>
                                <p><?=$row['start_date']?></p>
                            </div>
                        </div>
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Total Marks</label>
                            <div>
                                <p><?=$row['total_mark']?></p>
                            </div>
                        </div>
                        
                        <?php if($row['quizlevel'] !="" ){ ?>
                            <div class="mb-2 col-md-4">
                                <label class="d-block text-font">Available For</label>
                                    <div>
                                        <p><?=$row['quizlevel']?></p>
                                    </div>
                            </div>
                        <?php } ?>
                        <?php if($row['branch'] !="" ){ ?>
                            <div class="mb-2 col-md-4">
                                <label class="d-block text-font">Branch</label>
                                    <div>
                                        <p><?=$row['branch']?></p>
                                    </div>
                            </div>
                        <?php } ?>
                        <?php if($row['region'] !="" ){ ?>
                            <div class="mb-2 col-md-4">
                                <label class="d-block text-font">region</label>
                                    <div>
                                        <p><?=$row['Region']?></p>
                                    </div>
                            </div>
                        <?php } ?>
                        <?php if($row['statename'] !="" ){ ?>
                            <div class="mb-2 col-md-4">
                                <label class="d-block text-font">State</label>
                                    <div>
                                        <p><?=$row['statename']?></p>
                                    </div>
                            </div>
                        <?php } ?>                           
                            
                         
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Total Submission</label>
                            <div>
                                <p><?=$row['total_submissions']?></p>
                            </div>
                        </div>
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Total Winners</label>
                            <div>
                                <p><?=$row['total_winners']?></p>
                            </div>
                        </div>
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Declared on</label>
                            <div>
                                <p><?=$row['declared_on']?></p>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    <div class="row">
                        <div class="col-12 mt-3 table-responsive">
                            <table id="result_quiz" class="table-bordered display nowrap" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Sr. No.</th>
                                        <th>Name</th>
                                        <th>Email ID</th>
                                        <th>Contact No.</th>
                                        <th>Member Id</th>
                                        <th>Class</th>
                                        <th>Date</th>
                                        <th>Time Taken</th>
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
                                        <td><?= $value['member_id']?></td> 

                                        <td><?= $value['stdClubMemberClass']?></td> 
                                        <td><?= $value['created_on']?></td>
                                        <?php 
                                            $t =  $value['time_taken'];
                                            $h = (int)$t/3600;
                                            $m= (int)$t/60%60;
                                            $s= (int)$t%60;

                                            $timeTaken = sprintf('%02d:%02d:%02d', ($h),($m),($s) );
                                            ?>

                                <td><?= $timeTaken ?> </td> 
                                        <!-- <td><?= $value['time_taken']?></td> -->
                                        <td><?= $value['score']?></td>
                                        <td><?= $value['userprize']?></td>
                                        <!-- <td>
                                            <?php 
                                            // if ($value['userprize']==1) { $prize='First Prize'; } 
                                            // if ($value['userprize']==2) { $prize='Second Prize'; } 
                                            // if ($value['userprize']==3) { $prize='Third Prize'; } 
                                            // if ($value['userprize']==4) { $prize='Consolation Prize'; } 
                                            ?>
                                           
                                        </td> -->
                                        <!-- <td>First Prize</td> -->
                                        
                                    </tr>
                                    <?php } ?>
                                    
                                    
                                    
                                    
                                    
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 submit_btn p-3">
                    <a class="btn btn-primary btn-sm text-white" onclick="history.back()">Back</a>
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
<script>
    $(document).ready(function(){
            $('#result_quiz').DataTable({
            // scrollX:true,
            // responsive:true
            dom: 'Bfrtip',
        buttons: [
            'csv', 'excel'
        ]
        
        });
        })
</script>