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
                                <!-- <th><input class="form-control-input" type="checkbox" value="" id="flexCheckDefault"></th> -->
                                <th>Sr. No.</th>
                                <th>Name</th>
                                <th>Email ID</th>
                                <th>Contact No.</th>
                                <th>Member Id</th>
                                <th>Class</th>
                                <th>Date</th>                                
                                <th>Score</th>
                                <th>Time Taken</th>
                                <th>Prize</th>
                                <!-- <th>Prize</th> -->
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php $j = 1;
                                 foreach ($UsersDetails as $key => $user): ?>
                            <tr>
                                <!-- <td><input class="form-control-input" type="checkbox" value="<?= $user['user_id']?>" id="flexCheckDefault" name="check[]"></td> -->
                                <input type="hidden" name="user_id[]"value="<?= $user['user_id']?>">
                                <input type="hidden" name="quiz_id"value="<?= $user['quiz_id']?>">
                                <td><?= $j;?></td>
                                <td><?= $user['user_name']?></td>
                                <td><?= $user['email']?></td>
                                <td><?= $user['user_mobile']?></td>
                                <td><?= $user['member_id']?></td> 

                                <td><?= $user['stdClubMemberClass']?></td> 
                                <td><?= $user['created_on']?></td>
                               
                                
                                <td><?= $user['score']?></td>
                                <?php 
                                 $t =  $user['time_taken'];
                                 $h = (int)$t/3600;
                                 $m= (int)$t/60%60;
                                 $s= (int)$t%60;

                                 $timeTaken = sprintf('%02d:%02d:%02d', ($h),($m),($s) );
                                 ?>

                                <td><?= $timeTaken ?> </td> 
                                 <td><?= $user['prize']?></td>
                              
                                
                            </tr>
                             
                            <?php $j++; endforeach ?>
                            
                            
                            
                            
                            
                            
                        </tbody>
                    </table>
                </div>
            </div>
            
            
        </div>
    </div>
</form>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->