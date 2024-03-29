<style>
    .heading-underline .right{
        width:10%;
    }
</style>
<div id="privacy-content" class="container">
    <div class="col-sx-12 col-sm-12 col-md-12" style="border-left: 3px solid cadetblue; padding: 0px 25px;">
        <div class="static-content">
            <div class="bloginfo">
                <h3 style="margin-bottom: 0px;margin-top:20px;color: #0086b2!important;font-weight: 600;">Offers for the Membership of Working Panels</h3>
            </div>
            <div class="heading-underline" style="width: 200px;">
                <div class="left"></div><div class="right"></div>
             </div>
             <div class="bloginfo">
                            <!-- <h4 style="margin-bottom: 0px;">Audio &amp; Videos</h4><br>
                            <p>You shall also find links to videos of speeches, interviews given by Chairman of PMRDA at national and international events such as conferences. The videos are drawn from Aadhaar Channel in YouTube.</p> -->
            <div class="col-md-12 mt-3">
            
                <table id="example_1"class="table hover table-bordered table-responsive nowrap" style="display:-webkit-box;">
                <thead>
                            		<tr>
                                        <th>Sr.No.</th>
                                        <th>Working Panel</th>
                                        <th>Technical Committee</th>
                            			<th>Technical Department</th>
                            			<th>No. of Vacancies</th>
                                        <th>Action</th>
                            			
                            		</tr>
                            	</thead>
                            	<tbody>
                                    <tr>
                            			<td>1</td>
                                        <td>Panel</td>
                                        <td>Committee</td>
                            			<td>Department</td>
                            			<td><a href="#">2</a></td>
                                        <td>
                                            <a href="#" class="btn btn-primary btn-sm mt-2">See the Scope of TC</a>
                                            <a href="#" class="btn btn-secondary btn-sm mt-2">Details of Task Assigned</a>
                                            <a href="#" class="btn btn-info btn-sm mt-2">Eligibility Criteria</a>
                                            <a href="#" class="btn btn-success btn-sm mt-2 apply">Apply for Membership</a>
                                            <a href="#" class="btn btn-warning btn-sm mt-2 need">Need Information</a>
                                        </td>
                            		</tr>
                            		<tr>
                            			<td>1</td>
                                        <td>Panel</td>
                                        <td>Committee</td>
                            			<td>Department</td>
                            			<td><a href="#">2</a></td>
                                        <td>
                                            <a href="#" class="btn btn-primary btn-sm mt-2">See the Scope of TC</a>
                                            <a href="#" class="btn btn-secondary btn-sm mt-2">Details of Task Assigned</a>
                                            <a href="#" class="btn btn-info btn-sm mt-2">Eligibility Criteria</a>
                                            <a href="#" class="btn btn-success btn-sm mt-2 apply">Apply for Membership</a>
                                            <a href="#" class="btn btn-warning btn-sm mt-2 need">Need Information</a>
                                        </td>
                            		</tr>
                            	</tbody>
                            </table>
                        </div>    
                    </div>
                   
                </div>
         </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    $(document).ready(function () {
    $('#example_1').DataTable();
    });
    $('.apply').on('click',function(){
    Swal.fire({
                    title: 'Are you sure you want to Apply?',
                    showDenyButton: true,
                    showCancelButton: false,
                    confirmButtonText: 'Apply',
                    denyButtonText: `Close`,
                    }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {    
                        window.location.replace('<?php echo base_url().'world_of_standard/membership_panels_form'?>');                   
                        //$('#competition_edit').submit();
                       // Swal.fire('Saved!', '', 'success')                                
                    } else if (result.isDenied) {
                        // Swal.fire('Changes are not saved', '', 'info')
                    }
                    })
})
$('.need').on('click',function(){
    Swal.fire({
                    title: 'Are you sure you want to Need Information?',
                    showDenyButton: true,
                    showCancelButton: false,
                    confirmButtonText: 'Apply',
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
})
   </script>