
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
            <div class="col-md-12 col-sm-12 col-lg-12 mt-3">
            <div class="card card-body">
                <table id="example_1" class="table hover table-bordered nowrap table-responsive" style="display: -webkit-box;">
                    <thead>
                        <tr>
                            <th>Sr. No.</th>
                            <th style="width: 215px;">Date and Time</th>
                            <th style="width: 68px;">Type</th>
                            <th style="width: 702px;">Name of activity</th>
                            <th style="width: 93px;">Score</th>
                            <th style="width: 119px;">Action</th>
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
                                    <?php if($list['visible']=="1"){ ?>
                                     <a href="<?php echo base_url().'users/answerkey/'.$list['user_id'].'/'.$list['quiz_id']; ?>" class="btn btn-primary btn-sm mr-2">Answer Key</a>
                                     <?php } ?>
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

                        <?php if(!empty($published_wall)) { if(!($i==0)){ }else{ $i++; } foreach($published_wall as $list){
                            ?>
                   
                      <tr>
                                 <td><?php echo $i; ?></td>
                                 <td><?php echo $list['created_on']; ?></td>
                                 <td>Your Wall</td>
                                 <td><?php echo $list['title']; ?></td>
                                 <td></td>
                                 <td class="border-bottom-0">
                                    <?php if($list['status']==5){ ?>
                                     <!-- <a href="<?php echo base_url().'users/answerkey/'.$list['user_id'].'/'.$list['quiz_id']; ?>" class="btn btn-primary btn-sm mr-2">Answer Key</a> -->
                                     <a href="<?php echo base_url().'users/yourwallview/'.$list['id']; ?>" class="btn btn-primary btn-sm mr-2">View</a>
                                     <?php } ?>
                                 </td>
                        </tr>
                        <?php    $i++;  } } ?>
                        <?php if(!empty($by_the_mentor)) { if(!($i==0)){ }else{ $i++; } foreach($by_the_mentor as $list){
                            ?>
                   
                      <tr>
                                 <td><?php echo $i; ?></td>
                                 <td><?php echo $list['created_on']; ?></td>
                                 <td>By The Mentors</td>
                                 <td><?php echo $list['title']; ?></td>
                                 <td></td>
                                 <td class="border-bottom-0">
                                    <?php if($list['status']==5){ ?>
                                     <!-- <a href="<?php echo base_url().'users/answerkey/'.$list['user_id'].'/'.$list['quiz_id']; ?>" class="btn btn-primary btn-sm mr-2">Answer Key</a> -->
                                     <a href="<?php echo base_url().'users/by_the_mentor_detail/'.$list['id']; ?>" class="btn btn-primary btn-sm mr-2">View</a>
                                     <?php } ?>
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
<script>
    $(document).ready(function () {
    // $('#example').DataTable();
    $('#example_1').DataTable( {
    // responsive: true,
    // scrollX: 5000
} );
    });
</script>
   