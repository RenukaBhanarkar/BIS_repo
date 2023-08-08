<style>
    .heading-underline .right{
        width:10%;
    }
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
</style>
<div id="privacy-content" class="container">
<div class="col-12 mt-1">
  				<div class="breadcrums">
  					<ul>

  						<li><a href="<?php echo base_url().'users/quality_index'?>">Home</a></li>
                          <li><a href="<?php echo base_url().'users/research_projects'?>">Research Projects</a></li>
  						<li><a class="active">Projects in progress</a></li>

  					</ul>
  				</div>
  			</div>
    <div class="col-sx-12 col-sm-12 col-md-12" style="border-left: 3px solid cadetblue; padding: 0px 25px;">
        <div class="static-content">
            <div class="bloginfo">
                <h3 style="margin-bottom: 0px;margin-top:20px;color: #0086b2!important;font-weight: 600;">Projects in progress</h3>
            </div>
            <div class="heading-underline" style="width: 200px;">
                <div class="left"></div><div class="right"></div>
             </div>
             <div class="bloginfo">
                            <!-- <h4 style="margin-bottom: 0px;">Audio &amp; Videos</h4><br>
                            <p>You shall also find links to videos of speeches, interviews given by Chairman of PMRDA at national and international events such as conferences. The videos are drawn from Aadhaar Channel in YouTube.</p> -->
            <div class="col-md-12 mb-3">
            
                <table class="table hover table-bordered pt-2" id="example" style="text-align: center;">
                <thead>
                            		<tr>
                                        <th style="text-align: center;">Sr.No.</th>
                            			<th style="text-align: center;">Technical Department</th>
                            			<th style="text-align: center;">Project in Progress</th>
                            			
                            		</tr>
                            	</thead>
                            	<tbody>
                            		<tr>
                            			<td>1</td>
                            			<td>Department</td>
                            			<td><a href="#" class="count" style="color:blue;">2</a></td>
                            		</tr>
                            		<tr>
                            			<td>2</td>
                            			<td>Department</td>
                            			<td><a href="#" class="count" style="color:blue;">3ss</a></td>
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
    $('#example').DataTable();
    });
    $('.count').on('click',function(){
    Swal.fire({
                    title: 'Are you sure you want to View?',
                    showDenyButton: true,
                    showCancelButton: false,
                    confirmButtonText: 'View',
                    denyButtonText: `Close`,
                    }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {    
                        window.location.replace('<?php echo base_url().'world_of_standard/progress_list'?>');                   
                        //$('#competition_edit').submit();
                       // Swal.fire('Saved!', '', 'success')                                
                    } else if (result.isDenied) {
                        // Swal.fire('Changes are not saved', '', 'info')
                    }
                    })
})
   </script>