    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"> Competition Reviewed</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                <?php if (encryptids("D", $_SESSION['admin_type']) == 3) { ?>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'Admin/dashboard';?>" >Sub Admin Dashboard</a></li>
                <?php }else{ ?>
                    <li class="breadcrumb-item"><a href="<?php echo base_url().'Admin/dashboard';?>" >Admin Dashboard</a></li>
                <?php } ?>
                <!-- <li class="breadcrumb-item"><a href="<?php echo base_url().'Admin/dashboard';?>" >Sub Admin Dashboard</a></li> -->
                <li class="breadcrumb-item"><a href="<?php echo base_url().'admin/exchange_forum';?>" >Exchange Forum</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'quiz/organizing_quiz';?>" >Competition</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'Standardswritting/miscellaneous_dashboard';?>" >Miscellaneous Competition</a></li>
                <!-- <li class="breadcrumb-item active" aria-current="page">Manage New Competition</li> -->
                
                </ol>
            </nav>
        </div>

        <!-- Content Row -->
       <div class="row">
            <div class="col-12 mt-3">
                <div class="card border-top card-body ">
                    <table id="example" class="table-bordered nowrap table-responsive" style="width:100%">
                    <thead>
                            <tr>
                                <th>Sr. No.</th>
                                <th>Competition ID</th>
                                <th>Title of Competition</th>
                                <th>Start Date</th>
                                <th>Start Time</th>
                                <th>End Date</th>
                                <th>End Time</th>
                                <th>Banner</th>
                                <th>Available For</th>
                                <th>Level of Competition</th>
                                <th>Total Task</th>
                                <th>Total Task Under Review</th>
                                <th>Task Reviewed</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                           <tr>
                              <td>1</td>
                              <td>12345</td>
                              <td>Standard Online Competition</td>
                              <td>12/03/2023</td>
                              <td>12:00:00</td>
                              <td>12/03/2023</td>
                              <td>12:00:00</td>
                              <td><img src="#" alt="#" class="" width="10%"></td>
                              <td>Available</td>
                              <td>State level</td>
                              <td>10</td>
                              <td>10</td>
                              <td>Reviewed</td>
                              <td class="d-flex">
                                 <a href="<?php echo base_url(); ?>" class="btn btn-success btn-sm mr-2" >Assign For Review</a>
                                 <a href="<?php echo base_url(); ?>Standardswritting/view_submission_competition" class="btn btn-primary btn-sm mr-2" >View Submission</a>
                                 <a href="<?php echo base_url(); ?>" class="btn btn-primary btn-sm mr-2" >View Details</a>
                                 <a href="<?php echo base_url(); ?>" class="btn btn-info btn-sm mr-2" >Task Under Review</a>
                                 <a href="<?php echo base_url(); ?>" class="btn btn-primary btn-sm mr-2" >View Details</a>
                                 <a href="<?php echo base_url(); ?>" class="btn btn-warning btn-sm mr-2" >Task Review</a>
                              </td>
                           </tr>
                           <!-- <?php if(!empty($competition)){ $i=1; foreach($competition as $list){ ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $list['comp_id']; ?></td>
                                <td><?php echo $list['competiton_name']; ?></td>
                                <td><?php echo $list['start_date']; ?></td>                                
                                <td><?php echo $list['start_time']; ?></td>
                                <td><?php echo $list['end_date']; ?></td>
                                <td><?php echo $list['end_time']; ?></td>
                                <td><img src="<?php echo base_url().$list['thumbnail']; ?>" width="60px"></td>
                                <td><?php echo $list['avai_for']; ?></td>
                                <td><?php echo $list['title']; ?></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                
                                <td>
                                <a href="<?php echo base_url().'Standardswritting/view_submission_competition/'.$list['comp_id']; ?>" class="btn btn-primary btn-sm mr-2" >View Submission</a>
                                 <!-- <a href="<?php echo base_url(); ?>" class="btn btn-primary btn-sm mr-2" >View Details</a> -->
                                 <a href="<?php echo base_url().'Standardswritting/view_competition/'.$list['comp_id']; ?>" class="btn btn-info btn-sm mr-2" >View Details</a>
                                </td>
                            </tr>
                            <?php $i++; } } ?> -->

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
 </body>
                                  <!-- Modal -->
                                    <div class="modal fade" id="archivesForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Archive</h5>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Are you sure you want to Archive?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                                    <button type="button" class="btn btn-primary" data-dismiss="modal" id="saveQueBank">Archive</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal -->
                                      <!-- Modal -->
                                      <div class="modal fade" id="createForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Create Form</h5>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Are you sure you want to Create?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                                    <button type="button" class="btn btn-primary" data-dismiss="modal" id="saveQueBank">Create</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal -->
                                      <!-- Modal -->
                                      <div class="modal fade" id="editForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Edit Form</h5>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Are you sure you want to Edit?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                                    <button type="button" class="btn btn-primary" data-dismiss="modal" id="saveQueBank">Edit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal -->
                                      <!-- Modal -->
                                      <div class="modal fade" id="deleteForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">delete</h5>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Are you sure you want to delete?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                                    <button type="button" class="btn btn-primary" data-dismiss="modal" id="saveQueBank">delete</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal -->