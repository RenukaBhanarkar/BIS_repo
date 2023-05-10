    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Winners Wall List</h1>
            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url().'admin/';?>" >Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page"><a href="<?php echo base_url().'admin/exchange_forum';?>" >Exchange Forum</a></li>
                </ol>
              </nav>
           
        </div>
       
       
        <!-- Content Row -->
       
        <div class="row">
            <div class="col-12 mt-3">
            <div class="card border-top card-body">
                <table id="example" class="table-bordered display nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>Sr. No.</th>
                            <th>Name of Competition</th>
                            <th>Date of Competion</th>
                            <th>Title</th>
                            <th>Created on</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <tr>
                                <td>1</td>
                                <td>Poster Making</td>
                                <td>12/03/2023</td>
                                <td>Winners of Poster Making</td>
                                <td>12/032023 12:00:00</td>
                                 <td class="d-flex border-bottom-0">
                                    <button onclick="submit()" class="btn btn-primary btn-sm mr-2">View</button>
                                    <button onClick="location.href='#'" class="btn btn-info btn-sm mr-2">Edit</button>
                                    <button onClick="location.href='#'" class="btn btn-success btn-sm mr-2">PUblish</button>
                                    <button onClick="location.href='#'" class="btn btn-primary btn-sm mr-2">Archive</button>
                                    <button onClick="location.href='#'" class="btn btn-info btn-sm mr-2">Unpublish</button>
                                    <button  class="btn btn-danger btn-sm mr-2">Delete</button>
                                 </td>
                                  
                            
                                    <!-- Modal -->
                        </tr>
                    </tbody>
                    <!-- <tbody>
                      <?php $i=1; foreach($winner_wall_list as $list){ ?>
                                <tr>
                                <td><?php echo $i; ?></td>
                                 <td><?php echo $list['name']; ?></td>
                                <td><?php echo $list['location']; ?></td>
                                <td><?php echo $list['contact_no']; ?></td>
                                <td><?php echo $list['email']; ?></td>
                                <td><?php echo $list['title']; ?></td>
                                 <td class="d-flex border-bottom-0">
                                    <button onclick="submit()" class="btn btn-primary btn-sm mr-2">View</button>
                                    <button onClick="location.href='#'" class="btn btn-info btn-sm mr-2">Edit</button>
                                    <button onclick="deleterecord('<?php echo $list['id']; ?>')" class="btn btn-danger btn-sm mr-2">Delete</button>
                                 </td>
                                  
                            
                                   
                        </tr>
                        <?php $i++; } ?>
                        
                           
                    </tbody> -->
                </table>
            </div>    
          </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="deleteform" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Delete Record</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to Delete?</p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary savedata" data-bs-dismiss="modal">Delete</button>
                    </div>
                  </div>
                </div>
              </div>       
                          <!-- Modal -->  
               <!-- Modal -->
               <div class="modal fade" id="cancelForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to cancel?</p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Save changes</button>
                    </div>
                  </div>
                </div>
              </div>
       </div>
    <!-- /.container-fluid -->
    <div class="col-md-12 submit_btn p-3">
          <a class="btn btn-primary btn-sm text-white" onclick="location.href='<?php echo base_url();?>admin/exchange_forum'">Back</a>
    </div> 
</div>
<!-- End of Main Content -->
<script>
    $(document).ready(function(){

    });
    function deleterecord(que_id){
        $(document).ready(function(){
            $('#deleteform').modal('show');
            $('.savedata').on('click', function(){
                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url(); ?>subadmin/deleteWinner',
                    data: {
                        que_id: que_id,
                    },
                    success: function(result) {
                        
                        location.reload();
                    },
                    error: function(result) {
                        alert("Error,Please try again.");
                    }
                });
            });
        });
    }
</script>
