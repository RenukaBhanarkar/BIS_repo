<!-- Begin Page Content -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Archived Events</h1>
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url().'admin/';?>" >Home</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="<?php echo base_url().'admin/exchange_forum';?>" >Exchange Forum</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="<?php echo base_url().'admin/cmsManagenent_dashboard';?>" >CMS</a></li>
                <li class="breadcrumb-item active" aria-current="page">Upcomming Events</li>
            </ol>
        </nav>

    </div>


    <!-- Content Row -->
  <div class="row">
        <div class="col-12">
            <div class="card border-top card-body">
                <div>
                    <a href="<?php echo base_url().'admin/upcoming_events' ?>" type="button" class="btn btn-primary btn-sm mr-2" >Upcomming Events</a>
                </div>

            </div>
            </div>
  </div>
        <div class="row">
            <div class="col-12 mt-3">
                <div class="card border-top card-body table-responsive">
                    <table id="example" class="table-bordered " style="width: 100%;">
                        <thead>
                            <tr>
                                <th>Sr. No.</th>
                                <th>Title</th>
                                <th>Image</th>
                                <th>Posted on</th>
                                <th>Action</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                               
                              
                                    <?php if(!(empty($events))){ $i=1;
                                        foreach($events as $list){ ?>
                                              <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $list['title']; ?></td>
                                    <td><img src="<?php echo base_url().'uploads/cms/events/'.$list['thumbnail']; ?>" alt="#" class="" width="50%"></td>
                                    <td><?php echo $list['created_on']; ?></td>
                                    <td class="d-flex border-bottom-0">
                                    <a  href="letest_news_view/<?=encryptids("E",$list['id']);?>" class="btn btn-primary btn-sm mr-2 text-white">View</a>
                                    <?php if(encryptids("D", $_SESSION['admin_type']) == 3){ ?>
                                        <button  class="btn btn-info btn-sm mr-2 text-white restore" data-id="<?=encryptids("E",$list['id']);?>" >Restore</button>
                                    <?php  } ?>
                                      <?php $i++; } } ?>
                                        </td>
                                      </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        </div>
       
        <!-- /.container-fluid -->
        <div class="col-md-12 submit_btn p-3">
    <a class="btn btn-primary btn-sm text-white" onclick="location.href='<?php echo base_url();?>admin/upcoming_events'">Back</a>
</div>
</div>
<script>
    $('#example').on('click','.restore',function(){
        var id=$(this).attr('data-id');
        Swal.fire({
                    title: 'Do you want to Restore?',
                    showDenyButton: true,
                    showCancelButton: false,
                    confirmButtonText: 'Restore',
                    denyButtonText: `Cancel`,
                    }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {   
                        $.ajax({
                             type: 'POST',
                            url: '<?php echo base_url(); ?>admin/restoreEvent/'+id,
                            // data: {
                            //     que_id: id,
                            // },
                            success: function(result) {
                                Swal.fire("Record Restored Successfully.");
                                location.reload();
                            },
                            error: function(result) {
                                Swal.fire({
                                            icon: 'error',
                                            title: 'Oops...',
                                            text: 'Something went wrong!'                                            
                                            })
                                return false;
                            }
                        });
                        // Swal.fire('Saved!', '', 'success')                                
                    } else if (result.isDenied) {
                        // Swal.fire('Changes are not saved', '', 'info')
                    }
                    })
    });
  
</script>