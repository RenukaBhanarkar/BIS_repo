    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Task Evaluated</h1>
            <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <?php if (encryptids("D", $_SESSION['admin_type']) == 3) { ?>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'Admin/dashboard';?>" >Sub Admin Dashboard</a></li>
                <?php }else{ ?>
                    <li class="breadcrumb-item"><a href="<?php echo base_url().'Admin/dashboard';?>" >Admin Dashboard</a></li>
                <?php } ?>
                <!-- <li class="breadcrumb-item"><a href="<?php echo base_url().'Admin/dashboard';?>" >Admin Dashboard</a></li> -->
                <li class="breadcrumb-item"><a href="<?php echo base_url().'Miscellaneouscompetition/evaluator_dashboard';?>" >Evaluator Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Task Evaluated</li>
                
                </ol>
            </nav>
        </div>
        <!-- <?php print_r($records); ?> -->

        <!-- Content Row -->
       <div class="row">
            <div class="col-12 mt-3">
                <div class="card border-top card-body ">
                    <table id="example" class="table-bordered table-responsive nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>Sr. No.</th>
                                <th>Competition Id</th>
                                <th>Name of Competition</th>
                                <th>Submission Id</th>
                                <th>Class</th>
                                <th>Submission Date & Time</th>
                                <th>Name of Evaluator</th>
                                <th>Total Marks</th>
                                <th>Score</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                           <!-- <tr>
                              <td>1</td>
                              <td>12345</td>
                              <td>Name of Competition</td>
                              <td>3660</td>
                              <td>Class Standard</td>
                              <td>12/03/2023 12:00:00</td>
                              <td>Name of Evaluator</td>
                              <td>100</td>
                              <td>90</td>
                              <td>Pending</td>
                              <td class="d-flex">
                                 <a href="<?php echo base_url(); ?>admin/standard_under_view" class="btn btn-primary btn-sm mr-2" title="View">View</a>
                              </td>
                           </tr> -->
                           <?php if(!empty($records)){ $i=1; foreach($records as $list){ ?>
                            <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $list['competiton_id']; ?></td>
                            <td><?php echo $list['competiton_name']; ?></td>
                            <td><?php echo $list['id']; ?></td>
                            <td><?php echo $list['StdClubMemberClass']; ?></td>
                            <td><?php echo $list['created_on']; ?></td>
                            <td><?php echo $list['name']; ?></td>
                            <td><?php echo $list['score']; ?></td>
                            <td><?php echo $list['marks']; ?></td>
                            <td><?php if($list['status']==3){ echo "Reviewed";} ?></td>
                            <td class="d-flex">
                                 <a href="<?php echo base_url(); ?>Miscellaneouscompetition/viewRecord/<?php echo encryptids('E', $list['id']) ?>" class="btn btn-primary btn-sm mr-2" title="View">View</a>
                              </td>
                              </tr>
                          <?php $i++; } } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
 