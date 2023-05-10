    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">In Conversation with Expert</h1>
            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">In Conversation with Expert</li>
                </ol>
            </nav>
        </div> 
        <?php
          if ($this->session->flashdata('MSG')) {
            echo $this->session->flashdata('MSG');
          }
          ?>

        <!-- Content Row -->
       <div class="row">
            <div class="col-12 mt-3">
                <div class="card border-top card-body table-responsive">
                    <table id="example" class="hover table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Sr. No.</th>
                                <th>Title</th>
                                <th>About Video</th>
                                <th>Video</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                           <?php foreach ($Conversation as $key => $value) {?>
                            <tr>
                            <td><?= $key+1;?></td>
                              <td><?= $value['title'];?></td>
                              <td><?= $value['description'];?></td>
                              <td><a href="<?= base_url()?><?= $value['video']?>"><i class="fa fa-video"></i></a></td>
                              <td><?= $value['status_name'];?></td>
                              <td class="d-flex">
                               
                                      <a href="conversation_view/<?= $value['id'];?>" class="btn btn-primary btn-sm mr-2" title="View">View</a>
                                      <button onclick="updateStatusConversation('<?= $value['id']?>',1);" data-id='<?php echo $value['id']; ?>' class="btn btn-info btn-sm mr-2 delete_img">Restore</button>

                              </td>
                          </tr>
                      <?php } ?>

                        </tbody>

 
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

    </div>
    <div class="modal fade" id="updatemodel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"><span class="sms"></span> Record</h5>
            <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">
            <p>Are you sure you want to <span class="sms"> </span> ?</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary updatestatus" data-bs-dismiss="modal"><span class="sms"> </span></button>
        </div>
    </div>
</div>
</div>

    <script type="text/javascript">
      function updateStatusConversation(id,status) 
    {
        console.log(status)
        if (status==1)  { $(".sms").text('Restore'); }  
        $('#updatemodel').modal('show');
        $('.updatestatus').on('click', function() 
        {
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url(); ?>Standardsmaking/updateStatusConversation',
                data: {
                    id: id,
                    status: status,
                },
                success: function(result) 
                {
                    location.reload();
                },
                error: function(result) {
                    alert("Error,Please try again.");
                }
            });
        });
    }
    </script>>
    <!-- End of Main Content -->
 </body>