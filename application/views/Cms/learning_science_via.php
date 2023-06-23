    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Learning Science via Standards</h1>
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
            <?php if (encryptids("D", $_SESSION['admin_type']) == 3) { ?>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'admin/dashboard';?>" >Sub Admin Dashboard</a></li>
                <?php }else{ ?>
                    <li class="breadcrumb-item"><a href="<?php echo base_url().'admin/dashboard';?>" >Admin Dashboard</a></li>
              <?php  } ?>
            <li class="breadcrumb-item active" aria-current="page"><a href="<?php echo base_url().'admin/exchange_forum';?>" >Exchange Forum</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="<?php echo base_url().'admin/cmsManagenent_dashboard';?>" >CMS</a></li>
            <li class="breadcrumb-item" aria-current="page">Learning Science via Standards</li>
            
            </ol>
        </nav>
    </div>
        
        <div class="row">
                <div class="col-12">
                    <div class="card border-top card-body">
                        <div>
                           <button type="button" class="btn btn-primary btn-sm mr-2" data-bs-toggle="modal" data-bs-target="#add_new">Add New</button>
                           <!-- <a href="<?php echo base_url(); ?>" type="button" class="btn btn-primary btn-sm mr-2" >Archive</a> -->
                        </div>
                    </div>
                </div>
         </div>
<!-- Modal -->

<div class="modal fade" id="add_new" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Learning Science via Standards</h5>
        <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
      </div>
      <div class="modal-body">
        <div class="row">
                <div class="mb-2 col-md-4">
                    <div class="row">
                    <label class="col-12 d-block text-font">Image</label>
                    <div class="col-9">
                            <input type="file" class="form-control-file input-font" name="image" id="image1"  accept="image/*" required="required">
                            
                    </div>
                    <div class="col-3">
                    <button type="button" class="btn btn-primary btn-sm mb-4" data-bs-toggle="modal" data-bs-target="#Previewimg"> 
                            Preview 
                        </button>
                    </div>
                    </div>
                </div>
        </div>
                <div class="row">
                <div class="mb-2 col-md-12">
                    <label class="d-block text-font">Description</label>
                    <textarea class="form-control input-font" placeholder="Enter Description" name="description" id="description"></textarea>
                </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm cancel">Cancel</button>
        <button type="button" class="btn btn-success btn-sm submit">Submit</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="Previewimg" tabindex="-1" aria-labelledby="PreviewimgLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width:700px;">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="PreviewimgLabel">Image Preview</h5>

        <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span></button>
        </div>
        <div class="modal-body">
        <img id="outputThumbnail" width="100%"/>
        </div>
        <!-- <div class="modal-footer">
        <button type="button"  onclick="resetbanner()" class="btn btn-secondary" data-bs-dismiss="modal">ReSet</button>
        <button type="button" class="btn btn-primary"data-bs-dismiss="modal">Save</button>
        </div> -->
    </div>
    </div>
</div>

         <div class="row">
            <div class="col-12 mt-3">
                <div class="card table-responsive border-top card-body">
                    <table id="example" class="table-bordered  ">
                        <thead>
                            <tr>
                                <th>Sr. No.</th>
                                <th>Image</th>
                                <th>Desciption</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                                <tr>
                                        <td>1</td>
                                        <td>
                                            <img src="#" width="50px" style="text-align:center;">
                                        </td>
                                        <td>BIS undertakes various activities, events and competitions for their members and standard clubs situated in various states and regions. Wherein BIS arranges various events for their members and standard clubs. BIS now want to have a separate window as an exchange forum which will be publically available or the platform for the users to get connected and share their views across various events and win the exciting prizes. Also various committee members will now be able to participate in various standard writing competitions and other activities and explore various events and information contents with the help of this forum. People will be able to view the details of various standards getting published under Bureau of India Standards and will also be able to join various discussions on the forum and share their views.</td>
                                        
                                        <td class="d-flex border-bottom-0">
                                            <a href="#" class="btn btn-info btn-sm mr-2 edit">Edit</a>
                                            <a href="#" class="btn btn-danger btn-sm mr-2 delete">Delete</a>
                                        </td>
                                </tr>
                                
                                
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
<script>
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
                        //window.location.replace('<?php echo base_url(); ?>Standardswritting/create_competition_list');                   
                        //$('#competition_edit').submit();
                       // Swal.fire('Saved!', '', 'success')                                
                    } else if (result.isDenied) {
                        // Swal.fire('Changes are not saved', '', 'info')
                    }
                    })
})

</script>        

        