    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">View Submission</h1>
            <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
            <?php if (encryptids("D", $_SESSION['admin_type']) == 3) { ?>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'Admin/dashboard';?>" >Sub Admin Dashboard</a></li>
                <?php }else{ ?>
                    <li class="breadcrumb-item"><a href="<?php echo base_url().'Admin/dashboard';?>" >Admin Dashboard</a></li>
                <?php } ?>
            <!-- <li class="breadcrumb-item"><a href="<?php echo base_url().'Admin/dashboard';?>" >Sub Admin Dashboard</a></li> -->
                <li class="breadcrumb-item"><a href="<?php echo base_url().'admin/exchange_forum';?>" >Exchange Forum</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'quiz/organizing_quiz';?>" >Competition</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'Standardswritting/miscellaneous_dashboard';?>" >Miscellaneous Competition</a></li>
                <li class="breadcrumb-item active" aria-current="page">View Submission</li>
                
                </ol>
            </nav>
        </div>

        <!-- Content Row -->
       <div class="row">
            <div class="col-12 mt-3">
                <div class="card border-top card-body ">
                    <table id="example_1" class="table-bordered nowrap table-responsive" style="width:100%">
                        <thead>
                            <tr>
                                <th>Sr. No.</th>
                                <th>Competition Id</th>
                                <th>Submission Id</th>
                                <!-- <th>Writting Task</th> -->
                                <th>Score</th>
                                <th>Total Marks</th>
                                <th>Status</th>
                                <th>Name of Evaluator</th>
                                <th>Date Assign</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                           <!-- <tr>
                              <td>1</td>
                              <td>12345</td>
                              <td>12345</td>
                              <td>View Task</td>
                              <td>100</td>
                              <td>100</td>
                              <td>xyx</td>
                              <td>Anis Mulani</td>
                              <td>12/03/2023</td>
                              <td class="d-flex">
                                 <a href="#" class="btn btn-primary btn-sm mr-2" >View</a>
                                 <a href="#" class="btn btn-primary btn-sm mr-2" data-bs-toggle="modal" data-bs-target="#assignForm">Assign</a>
                              </td>
                            </tr> -->
                            <?php if(!empty($competition)){ $i=1; foreach($competition as $list){ ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $list['comp_id']; ?></td>
                                <td><?php echo $list['id']; ?></td>
                                <!-- <td></td> -->
                                <td><?php echo $list['score']; ?></td>
                                <td><?php echo $list['total_marks']; ?></td>
                                <td><?php if($list['submission_status']==1){echo "Send for review";}else if($list['submission_status']==3){ echo "Evaluated"; }  ?></td>
                                <td><?php echo $list['ev_name'];  ?></td>
                                <!-- <td><?php if($list['evaluator_name']=="IT Services Department"){echo "not assigned";}else{ echo $list['evaluator_name']; } ?></td> -->
                                <td><?php echo $list['ev_assigned_on']; ?></td>
                                
                                <td class="d-flex">
                                 <a href="<?php echo base_url().'Standardswritting/view_submitted_comp_response/'.$list['id']; ?>" class="btn btn-primary btn-sm mr-2" >View</a>
                                 <?php if($list['submission_status']!="3"){ ?>
                                 <a href="#" class="btn btn-primary btn-sm mr-2 abcd" sub-id="<?php echo $list['id']; ?>" comp-id="<?php echo $list['competiton_id']; ?>" user_id="<?php echo $list['user_id']; ?>" data-bs-toggle="modal" data-bs-target="#assignForm">Assign</a>
                                 <?php } ?>
                                </td>
                            </tr>
                            <?php $i++; } } ?>

                        </tbody>
                    </table>
                </div>
            </div>
                <div class="col-md-12 submit_btn p-3">
                    <button class="btn btn-success btn-sm text-white" data-bs-toggle="modal" data-bs-target="#assignForm">Assign for Review</button>
                    <a href="<?php echo base_url(); ?>" class="btn btn-primary btn-sm text-white" >Cancel</a>
                </div>
        </div>
    </div>
    <!-- /.container-fluid -->
    <!-- Modal -->
    <div class="modal fade" id="assignForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-xl">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Assign For Review</h5>
                                                    <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="col-md-12">
                                                <table id="example" class="table-bordered" style="width:100%">
                                                            <thead>
                                                                <tr>
                                                                    <th><input class="form-control-input" type="checkbox" value="" id="flexCheckDefault"></th>
                                                                    <th>Sr. No.</th>
                                                                    <th>Name of Evaluator</th>
                                                                    
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php if(!empty($evaluators)){ $i=1; foreach($evaluators as $list){ ?>
                                                                <tr>
                                                                    <td><input class="form-control-input" type="radio" name="evaluator" value="<?php echo $list['user_uid']; ?>" id="flexCheckDefault"></td>
                                                                    <td><?php echo $i; ?></td>
                                                                    <td><?php echo $list['name']; ?></td>
                                                                </tr>
                                                                <?php $i++; } } ?>
                                                            </tbody>
                                                        </table>
                                                        </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-primary assign" data-bs-dismiss="modal">Assign</button>
                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal -->
<script>
    $(document).ready(function() {
        $('.abcd').on('click',function(){
            user_id = $(this).attr('user_id');
            comp_id = $(this).attr('comp-id');
            submission_id =$(this).attr('sub-id');

            // console.log(user_id);
            // console.log(comp_id);
       
        $('.assign').click(function(){
           var id = $('input[name="evaluator"]:checked').val();
        //    if(id=="undefined"){
        //     alert("please select");
        //    }
        postdata={
            'user_id':user_id,
            'comp_id':comp_id,
            'evaluator':id,
            // 'submission_id':submission_id
        };
        $.ajax({
                url: "<?= base_url() ?>standardswritting/assign_eveluator",
                data: postdata,
                // type: "JSON",
                method: "post",
                success: function(response) {
                    console.log(response);
                    // var res = JSON.parse(response);
                    // var selectbox = $('#state_id');
                    // alert("kjgh");
                    // location.reload();
                    if(response){
                        Swal.fire('Evaluator Assigned');
                    location.reload();
                    }
                   
                    // selectbox.empty();
                    // $("#state_id").next(".validation").remove();
                    // $('#state_id').append('<option value="" selected disabled>Select State </option>');
                    // $.each(res.states, function(index, value) {
                    //     $('#state_id').append('<option value="' + value.state_id_lgd + '">' + value.state_name + '</option>');
                    // });
                }
            });
        });

    })
    $('#example_1').DataTable();
});
</script>