<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Quiz Result Declaration</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url().'Admin/dashboard';?>" >Sub Admin Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'admin/exchange_forum';?>" >Exchange Forum</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'quiz/organizing_quiz';?>" >Competitions</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'quiz/quiz_dashboard';?>" >Quiz Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Quiz Result Declaration</li>
                
            </ol>
        </nav>
        
    </div>
    
    
    <!-- Content Row -->
    
    <div class="row">
        <div class="col-12 mt-3">
            <div class="card border-top card-body table-responsive">
                <table id="example" class="table-bordered display nowrap" style="width:100%">
                    <thead>
                        <tr>
                            
                            <th>Sr. No.</th>
                            <th>Name of Quiz</th>
                            <th>Quiz ID</th>
                            <th>Quiz Date</th>
                            <th>Total Marks</th>
                            <th>Total Submission</th>
                            <th>Total Winners</th>
                            <th>Declared on</th>
                            <th>Action</th>
                            
                            
                        </tr>
                    </thead>
                    <!-- <?php print_r($UsersDetails)?> -->
                    <tbody>
                        <?php foreach ($DeclarationList as $key => $value): ?>
                        <tr>
                            <td><?= $key+1?></td>
                            <td><?= $value['title']?></td>
                            <td><?= $value['quizId']?></td>
                            <td><?= $value['startDate']?></td>
                            <td><?= $value['total_mark']?></td>
                            <td><?= $value['total_submission']?></td>
                            <td><?= $value['total_winner']?></td>
                            <td><?= $value['declare_on']?></td>
                            <td>
                                <?php $id= encryptids("E", $value['id'] )?>
                                <a href="<?php echo base_url();?>Quiz/result_declaration_view/<?= $id;?>" class="btn btn-primary btn-sm mr-2">View</a>
                            </td>
                            
                        </tr>
                        
                        <?php endforeach ?>
                        
                        
                        
                        
                        
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->