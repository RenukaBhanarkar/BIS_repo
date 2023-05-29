    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Quiz submission Details</h1>
            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url().'Admin/dashboard';?>" >Sub Admin Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'admin/exchange_forum';?>" >Exchange Forum</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'quiz/organizing_quiz';?>" >Competitions</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'quiz/quiz_dashboard';?>" >Quiz Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'Quiz/closed_quiz_list';?>" >Closed Quiz</a></li>
                <li class="breadcrumb-item active" aria-current="page">Quiz submission Details</li>
                
                </ol>
              </nav>           
        </div>      
       
        <!-- Content Row -->
        
        <div class="row">
            <div class="col-12 mt-3">
            <div class="card border-top card-body table-responsive">
                <table id="example" class="hover table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <!-- <th><input class="form-control-input" type="checkbox" value="" id="flexCheckDefault"></th> -->
                            <th>Sr. No.</th>
                            <th>Name</th>
                            <th>Email ID</th>
                            <th>Contact No.</th>
                            <th>Date</th>
                           
                            <th>Score</th>
                            <th>Time Taken</th>
                            <th>Action</th>                            
                        </tr>
                    </thead>
                    <tbody>                  

                         <?php if(!empty($UsersDetails)){
                            $i=1;
                            foreach($UsersDetails as $users)
                           // echo json_encode($UsersDetails);exit();
                            {?>
                                <tr>
                                <!-- <td><input class="form-control-input" type="checkbox" value="" id="flexCheckDefault"></td> -->
                                 <td><?= $i++?></td>
                                 <td><?= $users['user_name']?></td>
                                 <td><?= $users['email']?></td>
                                 <td><?= $users['user_mobile']?></td> 
                                 <td><?= date("d-m-Y H:i:s", strtotime($users['created_on']));?></td> 
                                
                                 <td><?= $users['score']?></td>
                                 <?php 
                                 $t =  $users['time_taken'];
                                 $h = (int)$t/3600;
                                 $m= (int)$t/60%60;
                                 $s= (int)$t%60;

                                 $timeTaken = sprintf('%02d:%02d:%02d', ($h),($m),($s) );
                                 ?>

                                <td><?= $timeTaken ?> </td> 
                                 <!-- <td><?= $users['time_taken'] ?> Seconds</td>  -->
                                 <!-- <td><?php //echo $users['prize']?></td> -->
                                <td><a href="<?php echo base_url();?>Quiz/answer_key_list/<?= $users['user_id'] ;?>/<?= $users['quiz_id'] ;?>" class="btn btn-primary btn-sm mr-2">Answer Key</a></td>
                                  
                                 </tr>

                             <?php } } ?>
                        
                        
                           
                    </tbody>
                </table>
            </div>    
          </div>
          <div class="col-md-12 submit_btn p-3">
                    <a class="btn btn-primary btn-sm text-white" onclick="location.href='<?php echo base_url(); ?>Quiz/closed_quiz_list'">Back</a>
                </div>
        </div>
       </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
