    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Create New Competition</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url().'Admin/dashboard';?>" >Sub Admin Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'admin/exchange_forum';?>" >Exchange Forum</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'quiz/organizing_quiz';?>" >Competition</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'Standardswritting/miscellaneous_dashboard';?>" >Miscellaneous Competition</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'Standardswritting/create_competition_list';?>" >Create New Competition</a></li>
                <li class="breadcrumb-item active" aria-current="page">Create New Competition</li>
                
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
                                <th>Competition ID</th>
                                <th>Name of Competition</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Banner</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                           <!-- <tr>
                              <td>1</td>
                              <td>12345</td>
                              <td>Miscellaneous Competition</td>
                              <td>12/03/2023</td>
                              <td>12/03/2023</td>
                              <td><img src="#" alt="#" class="" width="10%"></td>
                              <td>Pending</td>
                              <td class="d-flex">
                                 <a href="<?php echo base_url(); ?>" class="btn btn-primary btn-sm mr-2" >View</a>
                                 <a href="<?php echo base_url(); ?>" class="btn btn-info btn-sm mr-2" >Restore</a>
                              </td>

                           </tr> -->
                           <?php if(!empty($competition)){ $i=1;
                            foreach($competition as $list){ ?>
                            <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $list['comp_id']; ?></td>
                            <td><?php echo $list['competiton_name']; ?></td>
                            <td><?php echo $list['start_date']; ?></td>
                            <td><?php echo $list['end_date']; ?></td>
                            <td><img src="<?php echo base_url().$list['thumbnail']; ?>" alt="#" class="" width="100%"></td>
                            <!-- <td><?php if($list['status']==1){ echo "Created"; } ?></td> -->
                            <td>Archived</td>
                            <td>

                            <!-- <button href="<?php echo base_url().'standardswritting/view_competition/'.$list['id']; ?>" class="btn btn-primary btn-sm mr-2" >View</button> -->
                            <a href="<?php echo base_url().'standardswritting/view_competition/'.$list['comp_id']; ?>" class="btn btn-primary btn-sm mr-2">View</a>
                                 <button data-id="<?php echo $list['comp_id']; ?>" class="btn btn-info btn-sm mr-2 restore">Restore</button>
                            </td>
                            </tr>
                            <?php $i++; } } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12 submit_btn p-3" >
                               <a class="btn btn-primary btn-sm text-white" style=" margin-right: 37px;" onclick="history.back()">Back</a>
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
<script>
    $('#example').on('click','.restore', function(){

        id =$(this).attr('data-id');
        Swal.fire({
                        title: 'Are you sure you want to Restore?',
                        showDenyButton: true,
                        showCancelButton: false,
                        confirmButtonText: 'Restore',
                        denyButtonText: `Cancel`,
                        }).then((result) => {
                        /* Read more about isConfirmed, isDenied below */
                        if (result.isConfirmed) {                       
                            jQuery.ajax({
                                        type: "POST",
                                        url: '<?php echo base_url(); ?>Standardswritting/update_status',
                                        // dataType: 'json',
                                        data: {
                                        "id": id,
                                        "status": 0
                                        },
                                        success: function(res) {
                                        if (res) {
                                            location.reload();

                                        } else {
                                            alert("error");
                                        }
                                        },
                                        error: function(xhr, status, error) {
                                        //toastr.error('Failed to add '+xData.name+' in wishlist.');
                                        console.log(error);
                                        }
                                    });
                        // Swal.fire('Saved!', '', 'success')                                
                        } else if (result.isDenied) {
                            // Swal.fire('Changes are not saved', '', 'info')
                        }
                        })
    });
    
</script>