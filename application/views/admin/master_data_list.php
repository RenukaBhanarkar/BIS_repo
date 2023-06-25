<link href="<?php echo base_url(); ?>assets/admin/css/jquery.dataTables.min.css" rel="stylesheet">


        <div class="container-fluid">
          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Master Data</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url().'Admin/Dashboard';?>" >Super Admin Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Master Data</li>
                </ol>
            </nav>
          </div>

          <!-- Content Row -->
          <div class="row">
            <div class="col-12">
              <div class="card border-top card-body">
                <div>
                  <button type="button" class="btn btn-primary btn-sm mr-2" data-bs-toggle="modal" data-bs-target="#add-new">Add New</button>
                </div>
                    <div class="modal fade" id="add-new" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl" style="width: 978px;">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add Master Data</h5>
                                <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            </div>
                            <div class="modal-body">
                                <form class="row g-3 needs-validation" id="addpostform">
                                     <div class="mb-2 col-md-4">
                                        <label class="d-block text-font">Role<sup class="text-danger">*</sup></label>
                                        <input type="text" class="form-control input-font" name="role" id="role" placeholder="Enter Role" required>
                                            <div class="invalid-feedback">
                                               This Value is Required.
                                            </div>
                                     </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary btn-sm cancel">Cancel</button>
                                <button type="submit" class="btn btn-success btn-sm submit">Submit</button>
                            </div>
                            </div>
                        </div>
                    </div>
              </div>
            </div>
          </div>
       
          <div class="row">
            <div class="col-12 mt-3">
              <div class="card border-top card-body table-responsive">
                <table id="example" class="table-bordered">
                  <thead>
                    <tr>
                      <th>Sr. No.</th>
                      <th>Role Name</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    
                      <!-- <tr>
                        <td>1</td>
                        <td>Role</td>
                        <td class="d-flex border-bottom-0">
                            <a href="#" class="btn btn-info btn-sm mr-2 edit">Edit</a>
                            <a class="btn btn-danger btn-sm mr-2 delete">delete</a>                    

                        </td>
                      </tr> -->
                      <?php if(!empty($roles)){ $i=1; foreach($roles as $list){ ?>
                        <tr>
                        <td><?=$i;?></td>
                        <td><?=$list['role'];?></td>
                        <td class="d-flex border-bottom-0">
                            <!-- <a href="#" class="btn btn-info btn-sm mr-2 edit">Edit</a> -->
                            <a class="btn btn-danger btn-sm mr-2 delete" data-id="<?=$list['id'];?>">Delete</a>                    

                        </td>
                        </tr>
                        <?php $i++; } } ?>

                   
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        
        </div>
     
 
<script>
$('.submit').on('click',function(){
    $('#addpostform').addClass('was-validated');
})
$('.cancel').on('click',function(){
    Swal.fire({
                    title: 'Are you sure you want to Cancel?',
                    showDenyButton: true,
                    showCancelButton: false,
                    confirmButtonText: 'Cancel',
                    denyButtonText: `Close`,
                    }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {    
                      //  window.location.replace('<?php echo base_url(); ?>Standardswritting/create_competition_list');                   
                        //$('#competition_edit').submit();
                       // Swal.fire('Saved!', '', 'success')                                
                    } else if (result.isDenied) {
                        // Swal.fire('Changes are not saved', '', 'info')
                    }
                    })
})
$('#example').on('click','.delete',function(){
  var id = $(this).attr('data-id');
    Swal.fire({
                    title: 'Are you sure you want to delete?',
                    showDenyButton: true,
                    showCancelButton: false,
                    confirmButtonText: 'Delete',
                    denyButtonText: `Close`,
                    }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) { 
                      postdata={
                        id :id,
                      }
                      $.ajax({
                        url: "<?= base_url() ?>admin/deleteRole",
                        data: postdata,
                        // type: "JSON",
                        method: "post",
                        success: function(response) {
                            console.log(response);
                          var res = JSON.parse(response);
                            if (res.status==1) {
                                Swal.fire('Deleted');
                                location.reload();
                            }
                        }
                    }); 
                       // window.location.replace('<?php echo base_url(); ?>Standardswritting/create_competition_list');                   
                        //$('#competition_edit').submit();
                       // Swal.fire('Saved!', '', 'success')                                
                    } else if (result.isDenied) {
                        // Swal.fire('Changes are not saved', '', 'info')
                    }
                    })
})
$('.edit').on('click',function(){
    Swal.fire({
                    title: 'Are you sure you want to edit?',
                    showDenyButton: true,
                    showCancelButton: false,
                    confirmButtonText: 'Edit',
                    denyButtonText: `Close`,
                    }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {    
                       // window.location.replace('<?php echo base_url(); ?>Standardswritting/create_competition_list');                   
                        //$('#competition_edit').submit();
                       // Swal.fire('Saved!', '', 'success')                                
                    } else if (result.isDenied) {
                        // Swal.fire('Changes are not saved', '', 'info')
                    }
                    })
})
$('.submit').click(function(){
  var role = $('#role').val();
  var isvalid=true;

  if(role==""){
    isvalid=false;
  }
if(isvalid){

          postdata = {
                        'role': role,
                        'admin_type':<?php $abc =count($roles); $count = $abc+1; echo $count; ?>
                        // 'comp_id': comp_id,
                        // 'evaluator': id,
                        // 'submission_id':submission_id
                    };
                    $.ajax({
                        url: "<?= base_url() ?>admin/addRole",
                        data: postdata,
                        // type: "JSON",
                        method: "post",
                        success: function(response) {
                            console.log(response);

                            if (response) {
                                Swal.fire('Success');
                                // location.reload();
                            }
                        }
                    });
                  }
})
</script>
 