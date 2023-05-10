<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Ongoing Discussion</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url().'Admin/dashboard';?>" >Sub Admin Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'admin/exchange_forum';?>" >Exchange Forum</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'admin/share_your_dashboard';?>" >Share Your Thoughts</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'admin/discussion_forum_dashboard';?>" >Discussion Forum</a></li>
                <li class="breadcrumb-item active" aria-current="page">Ongoing Discussion</li>
                
            </ol>
        </nav>
    </div>
    <!-- Content Row -->
    <div class="row">
        <div class="col-12 mt-3">
            <div class="card border-top card-body table-responsive">
                <table id="example" class="hover table-bordered nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>Sr. No.</th>
                            <th>Title</th>
                            <th>Start Date</th>
                            <th>End Date</th> 
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($getData as $key => $value): ?>
                        <tr>
                            <td><?= $key+1;?></td>
                            <td><?= $value['title']?></td>
                            <td><?= date("d-m-Y", strtotime($value['start_date']));?></td>
                            <td><?= date("d-m-Y", strtotime($value['end_date']));?></td>  
                            <td class="d-flex">
                                <a href="<?php echo base_url(); ?>" class="btn btn-primary btn-sm mr-2" title="View">View Comments</a>
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
</body>