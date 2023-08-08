<style>
    .breadcrums ul {
    list-style: none;
    display: block;
    text-align: end;
    margin: 0px;
}
.breadcrums ul li {
    display: inline-block;
}
.breadcrums ul li:not(:last-child)::after {
    content: '\f105';
    font-family: 'fontAwesome';
    margin: 0px 10px;
}
.border-top {
    border-top: 3px solid #2957a3!important;
    box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
}
</style>    
<div class="container-fluid">
<div class="feedback_content">
<div class="col-12 mt-1">
  				<div class="breadcrums">
  					<!-- <ul>

  						<li><a href="<?php echo base_url().'users/quality_index'?>">Home</a></li>
                        <li><a href="<?php echo base_url().'users/membership_panels'?>">Offers for the Membership of Working Panels</a></li>
                        <li><a class="active">Apply for Membership</a></li>

  					</ul> -->
  				</div>
  			</div>
<form  name="project" id="project" method="post" class="">

<div class="bloginfo">
    
                <h3 style="margin-bottom: 0px;margin-top:20px;color: #0086b2!important;font-weight: 600; font-size: 20px;">Need Information :</h3>
            </div>
            <div class="heading-underline" style="width: 160px;">
                <div class="left"></div><div class="right"></div>
             </div>
             <div class="row">
                <div class="col-12">
                    <div class="card border-top card-body">
                        <div class="d-flex">
                        <h3 style="margin-bottom: 0px;color: #0086b2!important;font-weight: 600; font-size: 20px;">Write us here : </h3>
                                <button type="button" class="btn btn-success  mr-2" data-bs-toggle="modal" data-bs-target="#click_here" style="margin-left: 12px;">Click Here</button>
                                <!-- <a href="http://localhost/BIS/BIS_repo/wall_of_wisdom/archive" type="button" class="btn btn-primary btn-sm mr-2">Archive</a> -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="click_here" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Need Information</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="row">
            <div class="mb-2 col-md-12">
                <label class="d-block text-font">Enter your query here<sup class="text-danger">*</sup></label>
                <textarea type="text" class="form-control input-font" name="query" id="query" required></textarea>
                <!-- <span class="text-danger" id="err_subject"></span> -->
                <div class="invalid-feedback">
                       This value is required
                </div>
            </div>  
      </div>
    </div>
        <div class="modal-footer">
            <div class="col-md-12 p-3 text-end">
                        <button type="submit" onclick="return submitFeedback(event)"  name="submit1" class="btn btn-success" >Submit</button>
                        <button class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                        <!-- <button class="btn btn-warning">Reset</button> -->
            </div>
      </div>
    </div>
  </div>
</div>
            <div class="row">
                <div class="col-12 mt-3">
                    <div class="card border-top card-body">
                    <table class="table hover table-bordered pt-2 table-responsive" id="example">
                                <thead>
                            		<tr>
                                        <th>Sr.No.</th>
                            			<th>ID</th>
                            			<th>Query</th>
                                        <th>Status</th>
                                        <th>Submited on</th>
                                        <th>Action</th>
                            			
                            		</tr>
                            	</thead>
                            	<tbody>
                            		<tr>
                            			<td>1</td>
                            			<td>12345</td>
                                        <td>Query</td>
                                        <td>Status</td>
                                        <td>12/03/2023 12:00:00</td>
                                        <td>
                                            <a href="#" class="btn btn-primary btn-sm mt-2">View</a>
                                            <a href="#" class="btn btn-warning btn-sm mt-2">View Reply</a>
                                        </td>
                            		</tr>
                            	</tbody>
                            </table>
                    </div>
                </div>
            </div>
     </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
   function submitFeedback(e){
    e.preventDefault();
    var isvalid=true;
    $('#project').addClass('was-validated');
    var name = $('#query').val();
    if(name==""){
        isvalid=false;
    }
    
    if(isvalid){
        
    Swal.fire({
                    title: 'Are you sure you want to Submit?',
                    showDenyButton: true,
                    showCancelButton: false,
                    confirmButtonText: 'Submit',
                    denyButtonText: `Close`,
                    }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {    
                        window.location.replace('<?php echo base_url().'world_of_standard/need_information'?>');                   
                        //$('#competition_edit').submit();
                       // Swal.fire('Saved!', '', 'success')                                
                    } else if (result.isDenied) {
                        // Swal.fire('Changes are not saved', '', 'info')
                    }
                    })
                }
     }
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
                        // window.location.replace('<?php echo base_url().'users/apply_project_offer'?>');                   
                        //$('#competition_edit').submit();
                       // Swal.fire('Saved!', '', 'success')                                
                    } else if (result.isDenied) {
                        // Swal.fire('Changes are not saved', '', 'info')
                    }
                    })
                }); 
     
     
</script>