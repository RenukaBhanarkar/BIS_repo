    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Create new post/ live session</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url().'Admin/dashboard';?>" >Sub Admin Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'admin/exchange_forum';?>" >Exchange Forum</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'learningscience/lsv_standards_dashboard';?>" >Classroom</a></li>
                <li class="breadcrumb-item active" aria-current="page">Create new post/ live session</li>
                
                </ol>
            </nav> 
        </div>  
        <div class="row">
            <div class="col-12">
                <div class="card border-top card-body">
                    <div>
                        <button type="button" class="btn btn-primary btn-sm mr-2" onclick="location.href='<?php echo base_url(); ?>learningscience/lsv_standards_form'">Create New Post / Session</button>
                    </div>
                </div>
            </div>
        </div> 
        <?php
          if ($this->session->flashdata('MSG')) {
            echo $this->session->flashdata('MSG');
          }
          ?>
       <div class="row">
            <div class="col-12 mt-3">
                <div class="card border-top card-body table-responsive">
                    <table id="example" class="table-bordered display nowrap " style="width:100%">
                        <thead>
                            <tr>
                                <th>Sr. No.</th>
                                <th>Title</th>
                                <th>Type of Post</th>
                                <th>Created on</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($lsvstandardslist as $key => $value) {?>

                                <tr>
                              <td><?= $key + 1;?></td>
                              <td><?= $value['title']?></td>
                              <td>
                                <?php 
                                if ($value['type_of_post']==1) {  $data='Text Upload'; }
                                if ($value['type_of_post']==2) { $data='Video Upload'; }
                                if ($value['type_of_post']==3) { $data='Live session link'; }
                                ?>

                                <?= $data?></td> 
                              <td><?= $value['created_on']?></td>
                              <td>New Entry</td>
                              <td class="d-flex">

                                <?php $id= encryptids("E", $value['id'] )?>

                                <a href="lsv_standards_view/<?= $id;?>" class="btn btn-primary btn-sm mr-2" title="View">View</a>
                                <a href="lsv_standards_edit/<?= $id;?>" class="btn btn-info btn-sm mr-2" title="View">Edit</a> 
                                  <button onclick="deleteLsvStandards(' <?= $value['id']?> ');" data-id='<?php echo $value['id']; ?>' class="btn btn-danger btn-sm mr-2 delete_img">Delete</button>
                                  <button onclick="updateLsvStandards('<?= $value['id']?>',1);" data-id='<?php echo $value['id']; ?>' class="btn btn-info btn-sm mr-2 delete_img">Create</button> 
                                  <button onclick="updateLsvStandards('<?= $value['id']?>',9);" data-id='<?php echo $value['id']; ?>' class="btn btn-secondary btn-sm mr-2 delete_img">Archives</button> 
                            </td>
                        </tr>
                                
                           <?php }?>


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
  

<div class="modal fade" id="delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Record</h5>
                <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary deletecall" data-bs-dismiss="modal">Delete</button>
            </div>
        </div>
    </div>
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

                                    <!-- Modal -->
<script type="text/javascript">

// function updateLsvStandards(id,status) 
//     {
//         console.log(status)
//         if (status==1)  { $(".sms").text('Create'); } 
//         if (status==9)  { $(".sms").text('Archives'); }
//         $('#updatemodel').modal('show');
//         $('.updatestatus').on('click', function() 
//         {
//             $.ajax({
//                 type: 'POST',
//                 url: '<?php echo base_url(); ?>Learningscience/updateLsvStandards',
//                 data: {
//                     id: id,
//                     status: status,
//                 },
//                 success: function(result) 
//                 {
//                     location.reload();
//                 },
//                 error: function(result) {
//                     alert("Error,Please try again.");
//                 }
//             });
//         });
//     }
    //  function deleteLsvStandards(id) 
    // {
    //     $('#delete').modal('show');
    //     $('.deletecall').on('click', function() 
    //     {
    //         $.ajax({
    //             type: 'POST',
    //             url: '<?php echo base_url(); ?>Learningscience/deleteLsvStandards',
    //             data: {
    //                 id: id,
    //             },
    //             success: function(result) 
    //             {
    //                 location.reload();
    //             },
    //             error: function(result) {
    //                 alert("Error,Please try again.");
    //             }
    //         });
    //     });
    // }

    function deleteLsvStandards(id){

        // if (status==5)  { var title1= 'Do you want to Publish?'; var buttonText = 'Publish' } 
        // if (status==6)  { var title1= 'Do you want to Unublish?'; var buttonText = 'Unublish' } 
        // if (status==9)  { var title1= 'Do you want to Archive?'; var buttonText = 'Archive' }
        Swal.fire({
                    // title: title1,
                    title: 'Are you sure you want to Delete?',
                    showDenyButton: true,
                    showCancelButton: false,
                    // confirmButtonText: buttonText,
                    confirmButtonText: 'Delete',
                    denyButtonText: `Cancel`,
                    }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {                       
                        $.ajax({
                                type: 'POST',
                                url: '<?php echo base_url(); ?>Learningscience/deleteLsvStandards',
                                data: {
                                    id: id,
                                },
                                success: function(result) 
                                {
                                    location.reload();
                                },
                                error: function(result) {
                                    alert("Error,Please try again.");
                                }
                            });
                       // Swal.fire('Saved!', '', 'success')                                
                    } else if (result.isDenied) {
                        // Swal.fire('Changes are not saved', '', 'info')
                    }
                    })
    }



    function updateLsvStandards(id,status) 
    {
        
        if (status==1)  { var title1= 'Do you want to Create?'; var buttonText = 'Create' } 
        
        if (status==9)  { var title1= 'Do you want to Archive?'; var buttonText = 'Archive' }
        Swal.fire({
                    title: title1,
                    showDenyButton: true,
                    showCancelButton: false,
                    confirmButtonText: buttonText,
                    denyButtonText: `Cancel`,
                    }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {                       
                        $.ajax({
                                type: 'POST',
                                url: '<?php echo base_url(); ?>Learningscience/updateLsvStandards',
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
                       // Swal.fire('Saved!', '', 'success')                                
                    } else if (result.isDenied) {
                        // Swal.fire('Changes are not saved', '', 'info')
                    }
                    })
    }
</script>