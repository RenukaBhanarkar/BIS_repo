<div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Task Recevied for Review</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url().'Admin/dashboard';?>" >Admin Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'Admin/task_recevied_list';?>" >Task Recevied for Review</a></li>
                <li class="breadcrumb-item active" aria-current="page">Task Recevied for Review</li>
                
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
                                    <label class="d-block text-font">Competition Id</label>
                                    <div>
                                        <p><?php echo $records_details['competiton_id']; ?></p>
                                    </div>    
                                </div>
                                <div class="mb-2 col-md-4">
                                    <label class="d-block text-font">Submission Id</label>
                                    <div>
                                        <p><?php echo $records_details['id']; ?></p>
                                    </div>    
                                </div>
                                <div class="mb-2 col-md-4">
                                    <label class="d-block text-font">Title</label>
                                    <div>
                                        <p><?php echo $records_details['competiton_name']; ?></p>
                                    </div>    
                                </div>
                                <div class="mb-2 col-md-4">
                                    <label class="d-block text-font">Start Date</label>
                                    <div>
                                        <p><?php echo $records_details['start_date']; ?></p>
                                    </div>    
                                </div>
                                <div class="mb-2 col-md-4">
                                    <label class="d-block text-font">End Date</label>
                                    <div>
                                        <p><?php echo $records_details['end_date']; ?></p>
                                    </div>    
                                </div>
                            </div>
                            
                          </div>
                          <div class="card-header p-2" style="background-color: #cdd4e0; text-align: center;">
            	              <h4 class="m-0">Task Details</h4>
                         </div>
                         <div class="card-body"> 
                            <div class="row">
                               <div class="mb-2 col-md-12">
                                   <!-- <p>BIS undertakes various activities, events and competitions for their members and standard clubs situated in various states and regions. Wherein BIS arranges various events for their members and standard clubs. BIS now want to have a separate window as an exchange forum which will be publically available or the platform for the users to get connected and share their views across various events and win the exciting prizes. Also various committee members will now be able to participate in various standard writing competitions and other activities and explore various events and information contents with the help of this forum. People will be able to view the details of various standards getting published under Bureau of India Standards and will also be able to join various discussions on the forum and share their views.</p>    -->
                                <p>
                                <?php echo $records_details['answer_text']; ?>
                                </p>
                                </div>
                                <div class="mb-2 col-md-2">
                                    <label class="d-block text-font">Score</label>
                                    <div class="d-flex">
                                     <span><?php echo $records_details['marks']." "; ?>/<?php echo " ".$records_details['score']; ?></span>
                                     
                                     </div>
                                     
                                </div>
                                <div class="col-12">
                                <span class="text-danger" id="err_score"></span>
                                </div>
                            </div>
                                <div class="row">
                                <div class="mb-2 col-md-12">
                                    <label class="d-block text-font">Comment</label>
                                    <div class="d-flex">
                                     <p><?php echo $records_details['comment']; ?></p>
                                     </div>
                                     <span class="text-danger" id="err_comment"></span>
                                </div>  
                            </div>
                            
                          </div>
                          <div class="col-md-12 submit_btn p-3">
                          <!-- <a class="btn btn-success btn-sm text-white submit" data-id="<?php echo $records_details['id']; ?>" out-of="<?php echo $records_details['score']; ?>">Submit</a>
                          <a class="btn btn-danger btn-sm text-white">Cancel</a> -->
                          <a href="<?php echo base_url()."Miscellaneouscompetition/task_recevied_list"; ?>" class="btn btn-primary btn-sm text-white">Back</a>
                       
                          </div>  
                           
                        </div> 
                      </div>
                    </div>
                    </div>
                    <!-- <script>
                        $(document).ready(function(){
                            $('.submit').click(function(){
                               
                                var score = parseInt($('#score').val());
                                var comment = $('#comment').val();
                                var id =$(this).attr('data-id');
                                var out_of= parseInt($(this).attr('out-of'));
                                var isvalid =true;

                                var score1=$('#score').val();
                                if(score1 ==""){
                                    $('#err_score').text('Enter score');
                                    isvalid=false;
                                }

                                if(score > out_of){
                                    $('#score').val("");
                                    isvalid=false;
                                    Swal.fire("Makrs should be less than out of marks");
                                    $('#err_score').text('Makrs should be less than' + out_of);
                                  
                                }else if(score =="NaN"){
                                    isvalid =false;
                                    Swal.fire('Enter Score');
                                }else if(score =="0"){
                               
                                }

                                if(comment > 500){
                                    isvalid=false;
                                    $('#err_comment').text('only 500 characters allowed');
                                }else{
                                    
                                }
                                if(isvalid){
                                    Swal.fire({
                                        title: 'Are you sure you want to Submit?',
                                        showDenyButton: true,
                                        showCancelButton: false,
                                        confirmButtonText: 'Submit',
                                        denyButtonText: `Cancel`,
                                        }).then((result) => {
                                       
                                        if (result.isConfirmed) {                       
                                         
                                         postdata={
                                            'score':score,
                                            'comment':comment,
                                            'id':id,
                                         }
                                            $.ajax({
                                                url: "<?= base_url() ?>Miscellaneouscompetition/submitScore",
                                                data: postdata,
                                                type: "JSON",
                                                method: "post",
                                                success: function(response) {
                                                    Swal.fire('Score updated successuflly');
                                                    $('.submit').hide();
                                                    
                                                    }
                                                });
                                                                 
                                        } else if (result.isDenied) {
                                            
                                        }
                                        })

                                }
                            })
                        })
                    </script> -->

