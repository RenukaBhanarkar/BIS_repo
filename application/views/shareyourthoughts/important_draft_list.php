<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Important Draft Standards</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url().'Admin/dashboard';?>" >Sub Admin Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'admin/exchange_forum';?>" >Exchange Forum</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'shareyourthoughts/share_your_thoughts_dashboard';?>" >Share Your Thoughts</a></li>
                <li class="breadcrumb-item active" aria-current="page">Important Draft Standards</li>
                
            </ol>
        </nav>
    </div>
    <!-- Content Row -->
    <div class="row">
        <div class="col-12 mt-3">
            <div class="card border-top card-body table-responsive">
                <table id="example" class="hover table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Sr. No.</th>
                            <th>deptName</th>
                            <th>doc_title</th>
                            <th>Comments</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                         <?php  foreach ($getData as $key => $value) {?>
                              <tr>
                                <?php $id = encryptids("E", $value['doc_no']);?>
                            <td><?= $key+1 ?></td>
                            <td><?= $value['deptName'] ?></td>
                            <td><?= $value['doc_title'] ?></td> 
                            <td><?= $value['comments'] ?></td> 
                            <td> <a href="<?php echo base_url(); ?>Shareyourthoughts/important_draft_view/<?= $id ?>" class="btn btn-primary btn-sm mr-2" title="View">View Comments</a></td>
                                
                            </td>
                       <?php  }?>
 
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
 