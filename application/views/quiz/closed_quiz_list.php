    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Closed Quiz</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url().'Admin/dashboard';?>" >
                <?php if (encryptids("D", $_SESSION['admin_type']) == 3) { echo "Sub"; } ?>
                 Admin Dashboard</a></li>
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
                <table id="example" class="table-bordered table-responsive nowrap" style="width:100%">
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
                            <th>Total Submission</th>
                            <th>Created On</th>
                            <th>Status</th>
                          
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php if(!empty($ClosedQuiz)){
                            $i=1;
                            foreach($ClosedQuiz as $quiz)
                            {?>
                                <tr id="row<?= $quiz['id']; ?>">
                                 <td><?= $i++?></td>
                                 <td><?= $quiz['quiz_id']?></td>
                                 <td><?= $quiz['title']?></td> 
                                 <td><?= date("d-m-Y", strtotime($quiz['start_date']));?></td>
                                 <td><?= date("d-m-Y", strtotime($quiz['end_date']));?></td>
                                 <td><?= $quiz['total_question']?></td>
                                 <td><?= $quiz['no_of_ques']?></td>
                                 <td><?= $quiz['total_mark']?></td>
                                 <td><?= $quiz['total_sub']?></td>
                                 <td><?= date("d-m-Y H:i:s", strtotime($quiz['created_on'])); ?></td>
                                 <td><?php if ($quiz['result_declared'] == 0) { echo "Closed";} else { echo "Result Declared";} ?>
                                
                                
                                  
                                
                                 </td>
                                 <td class="d-flex border-bottom-0" style="width: 315px; word-break: normal;">
                                     <?php if (encryptids("D", $_SESSION['admin_type']) == 2) { ?>

                                    <a href="<?php echo base_url();?>Quiz/quiz_view/<?= $quiz['id']?>" class="btn btn-primary btn-sm mr-2">View</button></a>
                                    <?php if ($quiz['result_declared'] == 1) { ?>
                                    <button onclick="deleteRecord(<?= $quiz['id'] ?>)" class="btn btn-danger btn-sm mr-2">Delete</button> 

                                    <?php }} ?>


                                    <?php if (encryptids("D", $_SESSION['admin_type']) == 3) { ?>
                                        <?php if(in_array(1,$permissions)){ ?>
                                    <a href="<?php echo base_url();?>Quiz/quiz_view/<?= $quiz['id']?>" class="btn btn-primary btn-sm mr-2">View</button></a>

                                    <?php }} ?>
                                                    
                         


                                    <a href="<?php echo base_url();?>Quiz/closed_quiz_submission/<?= $quiz['id']?>" class="btn btn-warning btn-sm mr-2">View submission</a>   

                                    <?php if (encryptids("D", $_SESSION['admin_type']) == 3) { ?>

                                    <?php if ($quiz['result_declared'] == 0) { ?> 
                                      <?php if ($quiz['total_sub'] > 0 ){ ?> 
                                    <a href="<?php echo base_url();?>Quiz/close_declaration_list/<?= $quiz['id']?>" class="btn btn-success btn-sm mr-2">Result Declaration</a>
                                  <?php }
                                
                                     }}?>
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
    <div class="col-md-12 submit_btn p-3">
        <a class="btn btn-primary btn-sm text-white" onclick="location.href='<?php echo base_url();?>quiz/quiz_dashboard'">Back</a>
    </div>
</div>
<!-- End of Main Content -->
<script>

function deleteRecord(quiz_id) {
        Swal.fire({
          title: 'Are you sure you want to Delete?',
          showDenyButton: true,
          showCancelButton: false,
          confirmButtonText: 'Delete',
          denyButtonText: `Cancel`,
        }).then((result) => {
          /* Read more about isConfirmed, isDenied below */
          if (result.isConfirmed) {

            $.ajax({
              type: 'POST',
              url: '<?php echo base_url(); ?>quiz/deleteQuiz',
              data: {
                id: quiz_id,
              },
              success: function(result) {
                $('#row' + quiz_id).css({
                  'display': 'none'
                });
              },
              error: function(result) {
                alert("Error,Please try again.");
              }
            });
          } else if (result.isDenied) {
            // Swal.fire('Changes are not saved', '', 'info')
          }
        })


      }
</script>
