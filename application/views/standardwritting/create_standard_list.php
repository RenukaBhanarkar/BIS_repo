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
                <li class="breadcrumb-item"><a href="<?php echo base_url().'Standardswritting/standard_writting_dashboard';?>" >Standard Writting</a></li>
                <li class="breadcrumb-item active" aria-current="page">Create New Competition</li>
                
                </ol>
            </nav>
        </div>
<div class="row">
        <div class="col-12">
            <div class="card border-top card-body">
                <div>
                    <a href="<?php echo base_url(); ?>standardswritting/create_standard_form" class="btn btn-primary btn-sm mr-2" title="View">Create New Competition</a>
                    <a href="<?php echo base_url(); ?>standardswritting/create_standard_archive" class="btn btn-primary btn-sm mr-2" title="View">Archive</a>
                </div>
            </div>
        </div>
  </div>

        <!-- Content Row -->
       <div class="row">
            <div class="col-12 mt-3">
                <div class="card border-top card-body ">
                    <table id="example" class="hover table-bordered table-responsive nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>Sr. No.</th> 
                                <th>Standard Club</th>
                                <th>Name of Topic</th>
                                <th>Date of Activity</th> 
                                <th>Number of Participants</th>
                                <th>Status</th> 
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php foreach ($getData as $key => $data) {?>
                           <tr>
                              <td><?=  $key+1; ?></td>
                              <td><?= $data['standard_club']?></td>
                              <td><?= $data['topic_of_activity']?></td>
                              <td><?= $data['date_of_activity']?></td>
                              <td><?= $data['number_of_participants']?></td>
                              <td>New Created</td> 
                              
                              <td class="d-flex">
                                <a  class="btn btn-primary btn-sm mr-2" onclick="viewData('<?= $data['id']?>')" >View</a>

                                 <a  class="btn btn-info btn-sm mr-2"onclick="editData('<?= $data['id']?>')" >Edit</a>
                                 <a href="#" class="btn btn-success btn-sm mr-2" onclick="updateStatus('<?= $data['id']?>',1)" >Create</a>
                                 <a href="#" class="btn btn-danger btn-sm mr-2 " onclick="deleteData('<?= $data['id']?>')" >Delete</a>
                                 <a href="#" class="btn btn-primary btn-sm mr-2" onclick="updateStatus('<?= $data['id']?>',9)" >Archive</a>
                                  
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
    <!-- End of Main Content -->
 <script>
  function updateStatus(id,status) {
    if (status==1) { statusdata='Create'; }
    if (status==9) { statusdata='Archive'; }
    Swal.fire({
      title: 'Do you want to Create?',
      showDenyButton: true,
      showCancelButton: false,
      confirmButtonText: statusdata,
      denyButtonText: `Cancel`,
    }).then((result) => 
    { 
      if (result.isConfirmed) 
      { 
        $.ajax({
        type: 'POST',
        url: '<?php echo base_url(); ?>standardswritting/updateStatus',
        data: {
          id: id,
          status: status, 
        },
        success: function(result)
        {
          Swal.fire('Saved!', '', 'success');
          location.reload();
        },
        error: function(result) 
        {
          alert("Error,Please try again.");
        }
      });
      } 
    })
  }
 
 

 function deleteData(id) 
 { 
  Swal.fire({
                    title: 'Do you want to Create?',
                    showDenyButton: true,
                    showCancelButton: false,
                    confirmButtonText:'Delete',
                    denyButtonText: `Cancel`,
                    }).then((result) => { 
                    if (result.isConfirmed) 
                    { 
                      $.ajax({
                      type: 'POST',
                      url: '<?php echo base_url(); ?>standardswritting/deleteData',
                      data: {
                        id: id, 
                      },
                      success: function(result)
                      {
                        Swal.fire('Saved!', '', 'success')
                        location.reload();
                      },
                      error: function(result) {
                        alert("Error,Please try again.");
                      }
                    });
                  }  
                })
  }


function editData(id) 
{
  Swal.fire({
    title: 'Do you want to Edit ?',
    showDenyButton: true,
    showCancelButton: false,
    confirmButtonText:'Edit',
    denyButtonText: `Cancel`,
  }).then((result) => { 
    if (result.isConfirmed) 
    { 
      window.location.href = "create_standard_edit/"+id; 
    }  
  })
}
 function viewData(id) 
{ 
  Swal.fire({
    title: 'Do you want to View ?',
    showDenyButton: true,
    showCancelButton: false,
    confirmButtonText:'View',
    denyButtonText: `Cancel`,
  }).then((result) => { 
    if (result.isConfirmed) 
    { 
      window.location.href = "view_standards/"+id; 
    }  
  })
}
</script>
 