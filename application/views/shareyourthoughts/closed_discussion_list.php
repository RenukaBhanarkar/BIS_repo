    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Closed Discussion</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="<?php echo base_url().'Admin/dashboard';?>" >Sub Admin Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'admin/exchange_forum';?>" >Exchange Forum</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'Shareyourthoughts/share_your_dashboard';?>" >Share Your Thoughts</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'Shareyourthoughts/discussion_forum_dashboard';?>" >Discussion Forum</a></li>
                <li class="breadcrumb-item active" aria-current="page">Closed Discussion</li>
                
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
                                <?php $id = encryptids("E", $value['id']);?>
                                <a onclick="viewData('<?= $id?>')" class="btn btn-primary btn-sm mr-2" title="View">View Comments</a>
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
<script type="text/javascript">
    function viewData(id) 
{ 
  Swal.fire({
    title: 'Do you want to View Comments ?',
    showDenyButton: true,
    showCancelButton: false,
    confirmButtonText:'View Comments',
    denyButtonText: `Cancel`,
  }).then((result) => { 
    if (result.isConfirmed) 
    { 
      window.location.href = "discussion_comments_view/"+id; 
    }  
  })
}
</script>
</body>