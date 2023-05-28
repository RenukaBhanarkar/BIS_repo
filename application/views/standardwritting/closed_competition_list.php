    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Closed Competition</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url().'Admin/dashboard';?>" >Sub Admin Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'admin/exchange_forum';?>" >Exchange Forum</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'quiz/organizing_quiz';?>" >Competition</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'Standardswritting/miscellaneous_dashboard';?>" >Miscellaneous Competition</a></li>
                <!-- <li class="breadcrumb-item active" aria-current="page">Manage New Competition</li> -->
                
                </ol>
            </nav>
        </div>

        <!-- Content Row -->
       <div class="row">
            <div class="col-12 mt-3">
                <div class="card border-top card-body table-responsive">
                    <table id="example" class="table-bordered nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>Sr. No.</th>
                                <th>Competition ID</th>
                                <th>Name of Competition</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Banner</th>
                               
                                <th>Submitted Task</th>
                                <th>Task Under Review</th>
                                <th>Task Reviewed</th>
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
                              <td>task</td>
                              <td>Review</td>
                              <td class="d-flex">
                                 <a href="<?php echo base_url(); ?>" class="btn btn-primary btn-sm mr-2" >View Submission</a>
                                 <a href="<?php echo base_url(); ?>" class="btn btn-info btn-sm mr-2" >View Details</a>
                                 <a href="<?php echo base_url(); ?>" class="btn btn-info btn-sm mr-2" >Sent For Review</a>
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
                            
                            <td>Submited task</td>
                            <td></td>
                            <td></td>
                            <!-- <td><?php echo $list['status_name'];  ?></td> -->
                            <td><?php echo $list['review_status'];  ?></td>
                            <td>
                            <a href="<?php echo base_url().'standardswritting/competition_submission_view/'.$list['comp_id']; ?>" class="btn btn-primary btn-sm mr-2" >View Submission</a>
                                 <a href="<?php echo base_url(); ?>" class="btn btn-info btn-sm mr-2" >View Details</a>
                                 <?php if(!$list['review_status']==1){ ?>
                                 <button comp-id="<?php echo $list['comp_id']; ?>" class="btn btn-success btn-sm mr-2 send_for_review" >Send for review</button>
                                 <?php } ?>
                            </td>
                             </tr>
                            <?php $i++; } } ?>
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
 <script>
    $(document).ready(function(){
        $('#example').on('click','.send_for_review',function(){
            var id=$(this).attr('comp-id');
            Swal.fire({
                title: 'Are you sure you want to Send For Review?',
                showDenyButton: true,
                showCancelButton: false,
                confirmButtonText: 'Send For Review',
                denyButtonText: `Cancel`,
                }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {                       
                    jQuery.ajax({
                                type: "POST",
                                url: '<?php echo base_url(); ?>Standardswritting/update_competition_status',
                                // dataType: 'json',
                                data: {
                                "id": id,
                                "status": 1
                                },
                                success: function(res) {
                                if (res) {
                                   // 
                                   swal.fire("Competition Send for reviewed successfully");
                                   location.reload();
                                } else {
                                    alert("error");
                                }
                                },
                                error: function(xhr, status, error) {
                                console.log(error);
                                }
                            });
                                            
                } else if (result.isDenied) {
                    // Swal.fire('Changes are not saved', '', 'info')
                }
                })
        })
    });
 </script>
                               