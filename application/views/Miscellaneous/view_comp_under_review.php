    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">View Submission</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <?php if (encryptids("D", $_SESSION['admin_type']) == 3) { ?>
                        <li class="breadcrumb-item"><a href="<?php echo base_url() . 'Admin/dashboard'; ?>">Sub Admin Dashboard</a></li>
                    <?php } else { ?>
                        <li class="breadcrumb-item"><a href="<?php echo base_url() . 'Admin/dashboard'; ?>">Admin Dashboard</a></li>
                    <?php } ?>
                    <!-- <li class="breadcrumb-item"><a href="<?php echo base_url() . 'Admin/dashboard'; ?>" >Sub Admin Dashboard</a></li> -->
                    <li class="breadcrumb-item"><a href="<?php echo base_url() . 'admin/exchange_forum'; ?>">Exchange Forum</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo base_url() . 'quiz/organizing_quiz'; ?>">Competition</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo base_url() . 'Standardswritting/miscellaneous_dashboard'; ?>">Miscellaneous Competition</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo base_url().'Standardswritting/review_competition_dashboard';?>" >Review Competition Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">View Submission</li>

                </ol>
            </nav>
        </div>

        <!-- Content Row -->
        <div class="row">
            <div class="col-12 mt-3">
                <div class="card border-top card-body ">
                    <table id="example_1" class="table-bordered nowrap table-responsive" style="width:100%">
                        <thead>
                            <tr>
                                <th>Sr. No.</th>
                                <th>Competition Id</th>
                                <th>Submission Id</th>
                                <!-- <th>Writting Task</th> -->
                                <th>Score</th>
                                <th>Total Marks</th>
                                <th>Status</th>
                                <th>Name of Evaluator</th>
                                <th>Date Assign</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                           
                            <?php if (!empty($competition)) {
                                $i = 1;
                                foreach ($competition as $list) { ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $list['comp_id']; ?></td>
                                        <td><?php echo $list['id']; ?></td>
                                        <!-- <td></td> -->
                                        <td><?php echo $list['score']; ?></td>
                                        <td><?php echo $list['total_marks']; ?></td>
                                        <td><?php if ($list['submission_status'] == 1) {
                                                echo "Send for review";
                                            } else if ($list['submission_status'] == 3) {
                                                echo "Evaluated";
                                            } else if ($list['submission_status'] == 2) {
                                                echo 'Assigned for review';
                                            }  ?></td>
                                        <td><?php echo $list['name'];?></td>
                                      
                                        <td><?php echo $list['ev_assigned_on']; ?></td>

                                        <td class="d-flex">
                                            <a href="<?php echo base_url() . 'Standardswritting/view_submitted_comp_response/' . $list['id']; ?>" class="btn btn-primary btn-sm mr-2">View</a>
                                            <?php if (($list['submission_status'] == "1") || ($list['submission_status'] == "0")) { ?>
                                                <a href="#" class="btn btn-info btn-sm mr-2 abcd" sub-id="<?php echo $list['id']; ?>" comp-id="<?php echo $list['competiton_id']; ?>" user_id="<?php echo $list['user_id']; ?>" data-bs-toggle="modal" data-bs-target="#assignForm">Assign</a>
                                            <?php } ?>
                                        </td>
                                    </tr>
                            <?php $i++;
                                }
                            } ?>

                        </tbody>
                    </table>
                </div>
            </div>
            
        </div>
    </div>
    <button onclick="history.back()" class="btn btn-primary btn-sm text-white mr-5 mt-2" style="float:right;">Back</button>
    
                                   
                                


   

    <script>$(document).ready(function(){
 $('#example_1').DataTable();
            
    });
    
    </script>