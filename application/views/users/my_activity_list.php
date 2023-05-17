
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Content Row -->
       <div class="row">
        <div class="bloginfo">
                <h3 style="margin-bottom: 0px;margin-top:20px;color: #0086b2!important;font-weight: 600;">My Activity</h3>
            </div>
            <div class="heading-underline" style="width: 200px;">
                <div class="left"></div><div class="right"></div>
             </div>
            <div class="col-md-12 mt-3">
            <div class="card card-body">
                <table id="example" class="table hover table-bordered table-responsive">
                    <thead>
                        <tr>
                            <th>Sr. No.</th>
                            <th>Date and Time</th>
                            <th>Type</th>
                            <th>Name of activity</th>
                            <th>Score</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=0; if(!empty($quiz)) { $i=1; foreach($quiz as $list){
                            ?>
                   
                      <tr>
                                 <td><?php echo $i; ?></td>
                                 <td><?php echo $list['created_on']; ?></td>
                                 <td>Quiz</td>
                                 <td><?php echo $list['title']; ?></td>
                                 <td><?php echo $list['score']; ?></td>
                                 <td class="border-bottom-0">
                                     <a href="<?php echo base_url().'users/answerkey/'.$list['user_id'].'/'.$list['quiz_id']; ?>" class="btn btn-primary btn-sm mr-2">Answer Key</a>
                                 </td>
                        </tr>
                        <?php    $i++;  } } ?>
                        <?php if(!empty($competition)) { if(!($i==0)){ }else{ $i++; } foreach($competition as $list){
                            ?>
                   
                      <tr>
                                 <td><?php echo $i; ?></td>
                                 <td><?php echo $list['created_on']; ?></td>
                                 <td>Competition</td>
                                 <td><?php echo $list['competiton_name']; ?></td>
                                 <td><?php echo $list['score']; ?></td>
                                 <td class="border-bottom-0">
                                     <!-- <a href="<?php echo base_url().'users/answerkey/'.$list['user_id'].'/'.$list['quiz_id']; ?>" class="btn btn-primary btn-sm mr-2">Answer Key</a> -->
                                 </td>
                        </tr>
                        <?php    $i++;  } } ?>
                    </tbody>
                </table>
            </div>    
          </div>
        </div>
       </div>
    <!-- /.container-fluid -->
   