    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Closed Quiz</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url().'Admin/dashboard';?>" >Sub Admin Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'admin/exchange_forum';?>" >Exchange Forum</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'quiz/organizing_quiz';?>" >Competitions</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'quiz/quiz_dashboard';?>" >Quiz Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Closed Quiz</li>
                
                </ol>
            </nav>
           
        </div>
       
       
        <!-- Content Row -->
        
        <div class="row">
            <div class="col-12 mt-3">
            <div class="card border-top card-body">
                <table id="example" class="table-bordered table-responsive" style="width:100%">
                    <thead>
                        <tr>
                            <th>Sr. No.</th>
                            <th>Quiz ID</th>
                            <th>Quiz Title</th>
                            <th>Quiz Start Date</th>
                            <th>Quiz End Date</th>
                            <th>Total Questions in Quiz</th>
                            <th>Total Questions in QB</th>
                            <th>Total Marks</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php if(!empty($ClosedQuiz)){
                            $i=1;
                            foreach($ClosedQuiz as $quiz)
                            {?>
                                <tr>
                                 <td><?= $i++?></td>
                                 <td><?= $quiz['quiz_id']?></td>
                                 <td><?= $quiz['title']?></td> 
                                 <td><?= date("d-m-Y", strtotime($quiz['start_date']));?></td>
                                 <td><?= date("d-m-Y", strtotime($quiz['end_date']));?></td>
                                 <td><?= $quiz['total_question']?></td>
                                 <td><?= $quiz['qbquestion']?></td>
                                 <td><?= $quiz['total_mark']?></td>
                                 <td>Closed</td>
                                 <td class="d-flex border-bottom-0" style="width: 315px; word-break: normal;">
                                    <!-- <button onClick="location.href='closed_quiz_view'" class="btn btn-primary btn-sm mr-2">View</button> -->
                                    <a href="<?php echo base_url();?>Quiz/quiz_view/<?= $quiz['id']?>" class="btn btn-primary btn-sm mr-2">View</button></a>
                                    <a href="<?php echo base_url();?>Quiz/closed_quiz_submission/<?= $quiz['id']?>" class="btn btn-warning btn-sm mr-2">View submission</a>
                                   
                                    <?php if ($quiz['status']!= 11) { ?> 
                                    <a href="<?php echo base_url();?>Quiz/close_declaration_list/<?= $quiz['id']?>" class="btn btn-success btn-sm mr-2">Result Declaration</a>
                                  <?php }else{
                                    echo "Result declared";
                                  } ?>
                                  </td>
                                 </tr>

                             <?php } } ?>
                      
                               
                                  
                                  
                            
                                    <!-- Modal -->
                        
                        
                        
                           
                    </tbody>
                </table>
            </div>    
          </div>
        </div>
       </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
