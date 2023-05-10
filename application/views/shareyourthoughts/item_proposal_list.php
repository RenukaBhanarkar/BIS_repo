<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">New Work Item Proposal</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url().'Admin/dashboard';?>" >Sub Admin Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'admin/exchange_forum';?>" >Exchange Forum</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'shareyourthoughts/share_your_thoughts_dashboard';?>" >Share Your Thoughts</a></li>
                <li class="breadcrumb-item active" aria-current="page">New Work Item Proposal</li>
                
            </ol>
        </nav>
    </div>
    <!-- Content Row -->
    <div class="row">
        <div class="col-12 mt-3">
            <div class="card border-top card-body ">
                <table id="example" class="hover table-bordered table-responsive" style="width:100%">
                    <thead>
                        <tr>
                            <th>Sr. No.</th>
                            <th>Standard Subject Name</th>
                            <th>Proposer Name</th>
                            <th>Proposer Email</th>
                            <th>Date of receipt</th>
                            <th>Org Type</th>
                            <th>Current Stage</th>
                            <th>Current bis dept</th>
                            <th>Comments</th>
                            <th>Created On</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php  foreach ($getData as $key => $value) {?>
                        <tr>
                            <?php $id = encryptids("E", $value['id']);?>
                            <td><?= $key+1 ?></td>
                            <td><?= $value['standard_subject'] ?></td>
                            <td><?= $value['proposer_name'] ?></td>
                            <td><?= $value['proposer_email'] ?></td>
                            <td><?= date("d-m-Y", strtotime($value['date_of_receipt']));?></td>
                            <td><?= $value['org_type'] ?></td>
                            <td><?= $value['current_stage'] ?></td>
                            <td><?= $value['current_bis_dept'] ?></td>
                            <td><?= $value['comments'] ?></td>
                            <td><?= date("d-m-Y", strtotime($value['created_on']));?></td>
                            <td> <a href="<?php echo base_url(); ?>Shareyourthoughts/item_proposal_view/<?= $id ?>" class="btn btn-primary btn-sm mr-2" title="View">View Comments</a></td>
                            
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