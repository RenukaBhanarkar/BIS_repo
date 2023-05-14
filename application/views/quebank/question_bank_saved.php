    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Saved Question Bank</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url().'Admin/dashboard';?>" >Sub Admin Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'admin/exchange_forum';?>" >Exchange Forum</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'quiz/organizing_quiz';?>" >Competitions</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'quiz/quiz_dashboard';?>" >Quiz Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'subadmin/questionBankList';?>" >Question Bank List</a></li>
                <li class="breadcrumb-item active" aria-current="page">Saved Question Bank </li>
                
                </ol>
            </nav>
        </div>

        <!-- Content Row -->
       
        <div class="row">
            <div class="col-12 mt-3">
                <div class="card border-top card-body table-responsive">
                    <table id="listView" class="table-bordered display nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>Sr. No.</th>
                                <th>Quiz Bank ID</th>
                                <th>Question Bank Title</th>
                                <th>Number of Questions</th>
                              
                                <th>Date Created</th>
                               
                                <th>Status</th>
                              
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($allRecords)) {
                                $i = 1;
                                foreach ($allRecords as $row) { ?>
                                    <tr id="row<?php echo $row['que_bank_id']; ?>">
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $row['que_bank_id']; ?></td>
                                        <td><?php echo $row['title']; ?></td>
                                        <td><?php echo $row['no_of_ques']; ?></td>
                                       
                                        <td><?php echo date('d-m-Y', strtotime($row["created_on"])) ?></td>
                                                                        
                                       
                                        <td>Saved</td>
                                       
                                        <td class="d-flex border-bottom-0">
                                            <a class="btn btn-primary btn-sm mr-2" href="<?php echo base_url(); ?>subadmin/viewQuestionBank?id=<?php echo encryptids('E', $row['que_bank_id']) ?>" title="View">View</a>
                                            <?php if (in_array(3, $permissions)) { ?>
                                               <a class="btn btn-warning btn-sm mr-2 text-white" href="<?php echo base_url(); ?>subadmin/editQuestionBank?id=<?php echo encryptids('E', $row['que_bank_id']) ?>" title="Edit"> Edit </a>                                                       
                                              <?php } ?>
                                                                              
                                            
                                        </td>
                                <?php $i++;
                                }
                            } ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
    <script>
         $(document).ready(function () {
    $('#listView').DataTable({
        // scrollX: true,
    });
    });
        
       
    </script>


    </body>