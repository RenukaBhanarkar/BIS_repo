<!-- <link href="<?php echo base_url();?>assets/admin/css/jquery.dataTables.min.css" rel="stylesheet"> -->
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Content Row -->
      
        <div class="row">
        <div class="bloginfo">
                <h3 style="margin-bottom: 0px;margin-top:20px;color: #0086b2!important;font-weight: 600;">New Work Item Proposals</h3>
            </div> 
            <div class="heading-underline" style="width: 200px;">
                <div class="left"></div><div class="right"></div>
             </div>
            <div class="col-12 mt-3">
            <div class="card card-body">
                <table id="example" class="hover table-bordered table-responsive" style="width:100%; height:91px;">
                    <thead>
                        <tr style="text-align: center;">
                            <th style="text-align: center;">Sr. No.</th>
                            <th style="text-align: center;">Subject</th>
                            <th style="text-align: center;">Name of proposer</th>
                            <th style="text-align: center;">Organization Type</th>
                            <th style="text-align: center;">Date of receipt</th>
                            <th style="text-align: center;">Current Stage</th>
                            <th style="text-align: center;">Concerned Bis Department</th>
                           
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody style="text-align: center;">
                        <?php foreach ($getAll as $key => $value) {?>
                           <tr>
                                 <td><?=  $key+1 ;?></td>
                                 <td><?= $value['standard_subject'];?></td>
                                 <td><?= $value['proposer_name'];?></td>
                                 <td><?= $value['org_type'];?></td>
                                 <td><?= $value['date_of_receipt'];?></td>
                                 <td><?= $value['current_stage'];?></td>
                                 <td><?= $value['current_bis_dept'];?></td>
                                 <td  style="padding: 18px;">
                                    <a class="btn btn-primary btn-sm mr-2" href="<?php echo base_url().'users/item_proposal_view/'?><?php echo encryptids("E", $value['id'] )?>"> View Details</a>

                                    <!-- <button onClick="location.href='item_proposal_view'" class="btn btn-primary btn-sm mr-2">View Details</button> -->
                                    
                                 </td>
                                 </tr>
                        <?php }?>
                      
                                
 
                    </tbody>
                </table>
            </div>    
          </div>
        </div>
       </div>
    <!-- /.container-fluid -->
    <!-- <script src="<?php echo base_url();?>assets/admin/js/jquery.dataTables.min.js"></script> -->

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url();?>assets/admin/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script>
    $(document).ready(function () {
    $('#example').DataTable();
    });
   </script>
