<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Set Permission</h1>
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="<?php echo base_url() . 'admin/'; ?>">Home</a></li>
				<li class="breadcrumb-item active" aria-current="page">Set Permission</li>
			</ol>
		</nav>

	</div>
	<div class="row">
		<div class="col-12 mt-3">
		
		<div class="card card-body">
		         <div class="card-header p-2" style="background-color: #cdd4e0; text-align: center;">
            	     <h4 class="m-0">Profile Information</h4>
                </div>
			<div class="row mt-3">
			        <div class="mb-2 col-md-4">
                        <label class="d-block text-font">Name</label>
                            <div>
                                <p>Anis Mulani</p>
						    </div>    
					</div>
					<div class="mb-2 col-md-4">
                        <label class="d-block text-font">Email Id</label>
                            <div>
                                <p>anismulani@gmail.com</p>
						    </div>    
					</div>
					<div class="mb-2 col-md-4">
                        <label class="d-block text-font">Department</label>
                            <div>
                                <p>IDSD Department</p>
						    </div>    
					</div>
					<div class="mb-2 col-md-4">
                        <label class="d-block text-font">Role</label>
                            <div>
                                <p>IDSD Department</p>
						    </div>    
					</div>
			</div>
		</div>
			<div class="card border-top card-body mt-2">
				<table id="hpListTable" class="table table-bordered scroll">
					<thead>
						<tr> <!-- <th>Master</th> -->
							<th>Module</th>
							<th>Sub-Module</th>
							<th>View</th>
							<th>Add</th>
							<th>Update</th>
							<th>Delete</th>
						</tr>


					</thead>
					<tbody>






						<tr>
							<td rowspan="6">
								<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input" id="163_mainModuleChk" onclick="checkSubmodules(this);" checked="">
									<label class="custom-control-label" for="163_mainModuleChk">Quiz Competition</label>
								</div>
							</td>


							<td>
								<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 163_mainModuleChk" data-moduleid="163_mainModuleChk" data-submoduleid="173_subModuleChk" id="173_subModuleChk" onclick="checkSubmodules(this);" checked="">
									<label class="custom-control-label" for="173_subModuleChk">Create Quiz</label>
								</div>
							</td>


							<td>
								<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 163_mainModuleChk 173_subModuleChk accessSelected" data-moduleid="163_mainModuleChk" data-submoduleid="173_subModuleChk" id="173_viewChk" onclick="checkAccess(this);" value="173#View" checked="">
									<label class="custom-control-label" for="173_viewChk"></label>
								</div>
							</td>


							<td></td>



							<td></td>



							<td></td>








						</tr>


						<tr>


							<td>
								<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 163_mainModuleChk" data-moduleid="163_mainModuleChk" data-submoduleid="174_subModuleChk" id="174_subModuleChk" onclick="checkSubmodules(this);" checked="">
									<label class="custom-control-label" for="174_subModuleChk">Manage Quiz</label>
								</div>
							</td>


							<td>
								<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 163_mainModuleChk 174_subModuleChk accessSelected" data-moduleid="163_mainModuleChk" data-submoduleid="174_subModuleChk" id="174_viewChk" onclick="checkAccess(this);" value="174#View" checked="">
									<label class="custom-control-label" for="174_viewChk"></label>
								</div>
							</td>



							<td>
								<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 163_mainModuleChk 174_subModuleChk accessSelected" data-moduleid="163_mainModuleChk" data-submoduleid="174_subModuleChk" id="174_addChk" onclick="checkAccess(this);" value="174#Add" checked="">
									<label class="custom-control-label" for="174_addChk"></label>
								</div>
							</td>



							<td>
								<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 163_mainModuleChk 174_subModuleChk accessSelected" data-moduleid="163_mainModuleChk" data-submoduleid="174_subModuleChk" id="174_updateChk" onclick="checkAccess(this);" value="174#Update" checked="">
									<label class="custom-control-label" for="174_updateChk"></label>
								</div>
							</td>



							<td>
								<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 163_mainModuleChk 174_subModuleChk accessSelected" data-moduleid="163_mainModuleChk" data-submoduleid="174_subModuleChk" id="174_deleteChk" onclick="checkAccess(this);" value="174#Delete" checked="">
									<label class="custom-control-label" for="174_deleteChk"></label>
								</div>
							</td>







						</tr>


						<tr>


							<td>
								<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 163_mainModuleChk" data-moduleid="163_mainModuleChk" data-submoduleid="176_subModuleChk" id="176_subModuleChk" onclick="checkSubmodules(this);" checked="">
									<label class="custom-control-label" for="176_subModuleChk">On Going Quiz</label>
								</div>
							</td>


							<td>
								<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 163_mainModuleChk 176_subModuleChk accessSelected" data-moduleid="163_mainModuleChk" data-submoduleid="176_subModuleChk" id="176_viewChk" onclick="checkAccess(this);" value="176#View" checked="">
									<label class="custom-control-label" for="176_viewChk"></label>
								</div>
							</td>



							<td>
								<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 163_mainModuleChk 176_subModuleChk accessSelected" data-moduleid="163_mainModuleChk" data-submoduleid="176_subModuleChk" id="176_addChk" onclick="checkAccess(this);" value="176#Add" checked="">
									<label class="custom-control-label" for="176_addChk"></label>
								</div>
							</td>



							<td>
								<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 163_mainModuleChk 176_subModuleChk accessSelected" data-moduleid="163_mainModuleChk" data-submoduleid="176_subModuleChk" id="176_updateChk" onclick="checkAccess(this);" value="176#Update" checked="">
									<label class="custom-control-label" for="176_updateChk"></label>
								</div>
							</td>



							<td>
								<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 163_mainModuleChk 176_subModuleChk accessSelected" data-moduleid="163_mainModuleChk" data-submoduleid="176_subModuleChk" id="176_deleteChk" onclick="checkAccess(this);" value="176#Delete" checked="">
									<label class="custom-control-label" for="176_deleteChk"></label>
								</div>
							</td>







						</tr>


						<tr>


							<td>
								<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 163_mainModuleChk" data-moduleid="163_mainModuleChk" data-submoduleid="177_subModuleChk" id="177_subModuleChk" onclick="checkSubmodules(this);" checked="">
									<label class="custom-control-label" for="177_subModuleChk">Closed Quiz</label>
								</div>
							</td>


							<td>
								<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 163_mainModuleChk 177_subModuleChk accessSelected" data-moduleid="163_mainModuleChk" data-submoduleid="177_subModuleChk" id="177_viewChk" onclick="checkAccess(this);" value="177#View" checked="">
									<label class="custom-control-label" for="177_viewChk"></label>
								</div>
							</td>


							<td></td>



							<td></td>



							<td></td>








						</tr>


						<tr>


							<td>
								<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 163_mainModuleChk" data-moduleid="163_mainModuleChk" data-submoduleid="178_subModuleChk" id="178_subModuleChk" onclick="checkSubmodules(this);" checked="">
									<label class="custom-control-label" for="178_subModuleChk">Question Bank</label>
								</div>
							</td>


							<td>
								<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 163_mainModuleChk 178_subModuleChk accessSelected" data-moduleid="163_mainModuleChk" data-submoduleid="178_subModuleChk" id="178_viewChk" onclick="checkAccess(this);" value="178#View" checked="">
									<label class="custom-control-label" for="178_viewChk"></label>
								</div>
							</td>


							<td></td>



							<td></td>



							<td></td>








						</tr>


						<tr>


							<td>
								<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 163_mainModuleChk" data-moduleid="163_mainModuleChk" data-submoduleid="179_subModuleChk" id="179_subModuleChk" onclick="checkSubmodules(this);" checked="">
									<label class="custom-control-label" for="179_subModuleChk">Result Declared</label>
								</div>
							</td>


							<td>
								<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 163_mainModuleChk 179_subModuleChk accessSelected" data-moduleid="163_mainModuleChk" data-submoduleid="179_subModuleChk" id="179_viewChk" onclick="checkAccess(this);" value="179#View" checked="">
									<label class="custom-control-label" for="179_viewChk"></label>
								</div>
							</td>



							<td>
								<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 163_mainModuleChk 179_subModuleChk accessSelected" data-moduleid="163_mainModuleChk" data-submoduleid="179_subModuleChk" id="179_addChk" onclick="checkAccess(this);" value="179#Add" checked="">
									<label class="custom-control-label" for="179_addChk"></label>
								</div>
							</td>



							<td>
								<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 163_mainModuleChk 179_subModuleChk accessSelected" data-moduleid="163_mainModuleChk" data-submoduleid="179_subModuleChk" id="179_updateChk" onclick="checkAccess(this);" value="179#Update" checked="">
									<label class="custom-control-label" for="179_updateChk"></label>
								</div>
							</td>



							<td>
								<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 163_mainModuleChk 179_subModuleChk accessSelected" data-moduleid="163_mainModuleChk" data-submoduleid="179_subModuleChk" id="179_deleteChk" onclick="checkAccess(this);" value="179#Delete" checked="">
									<label class="custom-control-label" for="179_deleteChk"></label>
								</div>
							</td>







						</tr>


						<tr>
							<td rowspan="5">
								<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input" id="263_mainModuleChk" onclick="checkSubmodules(this);" checked="">
									<label class="custom-control-label" for="263_mainModuleChk">Standard Writting</label>
								</div>
							</td>


							<td>
								<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 263_mainModuleChk" data-moduleid="263_mainModuleChk" data-submoduleid="273_subModuleChk" id="273_subModuleChk" onclick="checkSubmodules(this);" checked="">
									<label class="custom-control-label" for="273_subModuleChk">Create Competition</label>
								</div>
							</td>


							<td>
								<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 263_mainModuleChk 273_subModuleChk accessSelected" data-moduleid="263_mainModuleChk" data-submoduleid="273_subModuleChk" id="273_viewChk" onclick="checkAccess(this);" value="273#View" checked="">
									<label class="custom-control-label" for="273_viewChk"></label>
								</div>
							</td>


							<td>
							<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 263_mainModuleChk 273_subModuleChk accessSelected" data-moduleid="263_mainModuleChk" data-submoduleid="273_subModuleChk" id="273_addChk" onclick="checkAccess(this);" value="273#View" checked="">
									<label class="custom-control-label" for="273_addChk"></label>
								</div>
							</td>



							<td>
							<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 263_mainModuleChk 273_subModuleChk accessSelected" data-moduleid="263_mainModuleChk" data-submoduleid="273_subModuleChk" id="273_updateChk" onclick="checkAccess(this);" value="273#View" checked="">
									<label class="custom-control-label" for="273_updateChk"></label>
								</div>
							</td>



							<td>
							<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 263_mainModuleChk 273_subModuleChk accessSelected" data-moduleid="263_mainModuleChk" data-submoduleid="273_subModuleChk" id="273_deleteChk" onclick="checkAccess(this);" value="273#View" checked="">
									<label class="custom-control-label" for="273_deleteChk"></label>
								</div>
							</td>








						</tr>


						<tr>


							<td>
								<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 263_mainModuleChk" data-moduleid="263_mainModuleChk" data-submoduleid="274_subModuleChk" id="274_subModuleChk" onclick="checkSubmodules(this);" checked="">
									<label class="custom-control-label" for="274_subModuleChk">Manage Competition</label>
								</div>
							</td>


							<td>
								<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 263_mainModuleChk 274_subModuleChk accessSelected" data-moduleid="263_mainModuleChk" data-submoduleid="274_subModuleChk" id="274_viewChk" onclick="checkAccess(this);" value="274#View" checked="">
									<label class="custom-control-label" for="274_viewChk"></label>
								</div>
							</td>



							<td>
								<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 263_mainModuleChk 274_subModuleChk accessSelected" data-moduleid="263_mainModuleChk" data-submoduleid="274_subModuleChk" id="274_addChk" onclick="checkAccess(this);" value="274#Add" checked="">
									<label class="custom-control-label" for="274_addChk"></label>
								</div>
							</td>



							<td>
								<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 263_mainModuleChk 274_subModuleChk accessSelected" data-moduleid="263_mainModuleChk" data-submoduleid="274_subModuleChk" id="274_updateChk" onclick="checkAccess(this);" value="274#Update" checked="">
									<label class="custom-control-label" for="274_updateChk"></label>
								</div>
							</td>



							<td>
								<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 263_mainModuleChk 274_subModuleChk accessSelected" data-moduleid="263_mainModuleChk" data-submoduleid="274_subModuleChk" id="274_deleteChk" onclick="checkAccess(this);" value="274#Delete" checked="">
									<label class="custom-control-label" for="274_deleteChk"></label>
								</div>
							</td>







						</tr>


						<tr>


							<td>
								<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 263_mainModuleChk" data-moduleid="263_mainModuleChk" data-submoduleid="276_subModuleChk" id="276_subModuleChk" onclick="checkSubmodules(this);" checked="">
									<label class="custom-control-label" for="276_subModuleChk">Ongoing Competition</label>
								</div>
							</td>


							<td>
								<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 263_mainModuleChk 276_subModuleChk accessSelected" data-moduleid="263_mainModuleChk" data-submoduleid="276_subModuleChk" id="276_viewChk" onclick="checkAccess(this);" value="276#View" checked="">
									<label class="custom-control-label" for="276_viewChk"></label>
								</div>
							</td>



							<td>
								<!-- <div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 263_mainModuleChk 276_subModuleChk accessSelected" data-moduleid="263_mainModuleChk" data-submoduleid="276_subModuleChk" id="276_addChk" onclick="checkAccess(this);" value="276#Add" checked="">
									<label class="custom-control-label" for="276_addChk"></label>
								</div> -->
							</td>



							<td>
								<!-- <div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 263_mainModuleChk 276_subModuleChk accessSelected" data-moduleid="263_mainModuleChk" data-submoduleid="276_subModuleChk" id="276_updateChk" onclick="checkAccess(this);" value="276#Update" checked="">
									<label class="custom-control-label" for="276_updateChk"></label>
								</div> -->
							</td>



							<td>
								<!-- <div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 263_mainModuleChk 276_subModuleChk accessSelected" data-moduleid="263_mainModuleChk" data-submoduleid="276_subModuleChk" id="276_deleteChk" onclick="checkAccess(this);" value="276#Delete" checked="">
									<label class="custom-control-label" for="276_deleteChk"></label>
								</div> -->
							</td>







						</tr>


						<tr>


							<td>
								<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 263_mainModuleChk" data-moduleid="263_mainModuleChk" data-submoduleid="277_subModuleChk" id="277_subModuleChk" onclick="checkSubmodules(this);" checked="">
									<label class="custom-control-label" for="277_subModuleChk">Closed Competition</label>
								</div>
							</td>


							<td>
								<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 263_mainModuleChk 277_subModuleChk accessSelected" data-moduleid="263_mainModuleChk" data-submoduleid="277_subModuleChk" id="277_viewChk" onclick="checkAccess(this);" value="277#View" checked="">
									<label class="custom-control-label" for="277_viewChk"></label>
								</div>
							</td>


							<td></td>



							<td>
							<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 263_mainModuleChk 277_subModuleChk accessSelected" data-moduleid="263_mainModuleChk" data-submoduleid="277_subModuleChk" id="277_updateChk" onclick="checkAccess(this);" value="277#View" checked="">
									<label class="custom-control-label" for="277_updateChk"></label>
								</div>
							</td>



							<td></td>








						</tr>


						<tr>


							<td>
								<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 263_mainModuleChk" data-moduleid="263_mainModuleChk" data-submoduleid="278_subModuleChk" id="278_subModuleChk" onclick="checkSubmodules(this);" checked="">
									<label class="custom-control-label" for="278_subModuleChk">Review Management</label>
								</div>
							</td>


							<td>
								<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 263_mainModuleChk 278_subModuleChk accessSelected" data-moduleid="263_mainModuleChk" data-submoduleid="278_subModuleChk" id="278_viewChk" onclick="checkAccess(this);" value="278#View" checked="">
									<label class="custom-control-label" for="278_viewChk"></label>
								</div>
							</td>


							<td>
							<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 263_mainModuleChk 278_subModuleChk accessSelected" data-moduleid="263_mainModuleChk" data-submoduleid="278_subModuleChk" id="278_addChk" onclick="checkAccess(this);" value="278#View" checked="">
									<label class="custom-control-label" for="278_addChk"></label>
								</div>
							</td>



							<td>
							<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 263_mainModuleChk 278_subModuleChk accessSelected" data-moduleid="263_mainModuleChk" data-submoduleid="278_subModuleChk" id="278_updateChk" onclick="checkAccess(this);" value="278#View" checked="">
									<label class="custom-control-label" for="278_updateChk"></label>
								</div>
							</td>



							<td>
							<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 263_mainModuleChk 278_subModuleChk accessSelected" data-moduleid="263_mainModuleChk" data-submoduleid="278_subModuleChk" id="278_deleteChk" onclick="checkAccess(this);" value="278#View" checked="">
									<label class="custom-control-label" for="278_deleteChk"></label>
								</div>
							</td>

                        </tr>
						<tr>
							<td rowspan="5">
								<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input" id="264_mainModuleChk" onclick="checkSubmodules(this);" checked="">
									<label class="custom-control-label" for="264_mainModuleChk">Miscellaneous Competition</label>
								</div>
							</td>


							<td>
								<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 264_mainModuleChk" data-moduleid="264_mainModuleChk" data-submoduleid="373_subModuleChk" id="373_subModuleChk" onclick="checkSubmodules(this);" checked="">
									<label class="custom-control-label" for="373_subModuleChk">Create Competition</label>
								</div>
							</td>


							<td>
								<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 264_mainModuleChk 373_subModuleChk accessSelected" data-moduleid="264_mainModuleChk" data-submoduleid="373_subModuleChk" id="273_new_viewChk" onclick="checkAccess(this);" value="273#View" checked="">
									<label class="custom-control-label" for="273_new_viewChk"></label>
								</div>
							</td>


							<td>
							<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 264_mainModuleChk 373_subModuleChk accessSelected" data-moduleid="264_mainModuleChk" data-submoduleid="373_subModuleChk" id="273_new_addChk" onclick="checkAccess(this);" value="273#View" checked="">
									<label class="custom-control-label" for="273_new_addChk"></label>
								</div>
							</td>



							<td>
							<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 264_mainModuleChk 373_subModuleChk accessSelected" data-moduleid="264_mainModuleChk" data-submoduleid="373_subModuleChk" id="273_new_updateChk" onclick="checkAccess(this);" value="273#View" checked="">
									<label class="custom-control-label" for="273_new_updateChk"></label>
								</div>
							</td>



							<td>
							<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 264_mainModuleChk 373_subModuleChk accessSelected" data-moduleid="264_mainModuleChk" data-submoduleid="373_subModuleChk" id="273__newdeleteChk" onclick="checkAccess(this);" value="273#View" checked="">
									<label class="custom-control-label" for="273__newdeleteChk"></label>
								</div>
							</td>








						</tr>


						<tr>


							<td>
								<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 264_mainModuleChk" data-moduleid="264_mainModuleChk" data-submoduleid="374_subModuleChk" id="374_subModuleChk" onclick="checkSubmodules(this);" checked="">
									<label class="custom-control-label" for="374_subModuleChk">Manage Competition</label>
								</div>
							</td>


							<td>
								<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 264_mainModuleChk 374_subModuleChk accessSelected" data-moduleid="264_mainModuleChk" data-submoduleid="374_subModuleChk" id="374_viewChk" onclick="checkAccess(this);" value="374#View" checked="">
									<label class="custom-control-label" for="374_viewChk"></label>
								</div>
							</td>



							<td>
								<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 264_mainModuleChk 374_subModuleChk accessSelected" data-moduleid="264_mainModuleChk" data-submoduleid="374_subModuleChk" id="374_addChk" onclick="checkAccess(this);" value="374#Add" checked="">
									<label class="custom-control-label" for="374_addChk"></label>
								</div>
							</td>



							<td>
								<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 264_mainModuleChk 374_subModuleChk accessSelected" data-moduleid="264_mainModuleChk" data-submoduleid="374_subModuleChk" id="374_updateChk" onclick="checkAccess(this);" value="374#Update" checked="">
									<label class="custom-control-label" for="374_updateChk"></label>
								</div>
							</td>



							<td>
								<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 264_mainModuleChk 374_subModuleChk accessSelected" data-moduleid="264_mainModuleChk" data-submoduleid="374_subModuleChk" id="374_deleteChk" onclick="checkAccess(this);" value="374#Delete" checked="">
									<label class="custom-control-label" for="374_deleteChk"></label>
								</div>
							</td>







						</tr>


						<tr>


							<td>
								<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 264_mainModuleChk" data-moduleid="264_mainModuleChk" data-submoduleid="376_subModuleChk" id="376_subModuleChk" onclick="checkSubmodules(this);" checked="">
									<label class="custom-control-label" for="376_subModuleChk">Ongoing Competition</label>
								</div>
							</td>


							<td>
								<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 264_mainModuleChk 376_subModuleChk accessSelected" data-moduleid="264_mainModuleChk" data-submoduleid="376_subModuleChk" id="376_viewChk" onclick="checkAccess(this);" value="376#View" checked="">
									<label class="custom-control-label" for="376_viewChk"></label>
								</div>
							</td>



							<td>
								<!-- <div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 264_mainModuleChk 376_subModuleChk accessSelected" data-moduleid="264_mainModuleChk" data-submoduleid="376_subModuleChk" id="376_addChk" onclick="checkAccess(this);" value="376#Add" checked="">
									<label class="custom-control-label" for="376_addChk"></label>
								</div> -->
							</td>



							<td>
								<!-- <div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 264_mainModuleChk 376_subModuleChk accessSelected" data-moduleid="264_mainModuleChk" data-submoduleid="376_subModuleChk" id="376_updateChk" onclick="checkAccess(this);" value="376#Update" checked="">
									<label class="custom-control-label" for="376_updateChk"></label>
								</div> -->
							</td>



							<td>
								<!-- <div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 264_mainModuleChk 376_subModuleChk accessSelected" data-moduleid="264_mainModuleChk" data-submoduleid="376_subModuleChk" id="376_deleteChk" onclick="checkAccess(this);" value="376#Delete" checked="">
									<label class="custom-control-label" for="376_deleteChk"></label>
								</div> -->
							</td>







						</tr>


						<tr>


							<td>
								<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 264_mainModuleChk" data-moduleid="264_mainModuleChk" data-submoduleid="377_subModuleChk" id="377_subModuleChk" onclick="checkSubmodules(this);" checked="">
									<label class="custom-control-label" for="377_subModuleChk">Closed Competition</label>
								</div>
							</td>


							<td>
								<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 264_mainModuleChk 377_subModuleChk accessSelected" data-moduleid="264_mainModuleChk" data-submoduleid="377_subModuleChk" id="377_viewChk" onclick="checkAccess(this);" value="377#View" checked="">
									<label class="custom-control-label" for="377_viewChk"></label>
								</div>
							</td>


							<td></td>



							<td>
							<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 264_mainModuleChk 377_subModuleChk accessSelected" data-moduleid="264_mainModuleChk" data-submoduleid="377_subModuleChk" id="377_updateChk" onclick="checkAccess(this);" value="377#View" checked="">
									<label class="custom-control-label" for="377_updateChk"></label>
								</div>
							</td>



							<td></td>








						</tr>


						<tr>


							<td>
								<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 264_mainModuleChk" data-moduleid="264_mainModuleChk" data-submoduleid="378_subModuleChk" id="378_subModuleChk" onclick="checkSubmodules(this);" checked="">
									<label class="custom-control-label" for="378_subModuleChk">Review Management</label>
								</div>
							</td>


							<td>
								<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 264_mainModuleChk 378_subModuleChk accessSelected" data-moduleid="264_mainModuleChk" data-submoduleid="378_subModuleChk" id="378_viewChk" onclick="checkAccess(this);" value="378#View" checked="">
									<label class="custom-control-label" for="378_viewChk"></label>
								</div>
							</td>


							<td>
							<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 264_mainModuleChk 378_subModuleChk accessSelected" data-moduleid="264_mainModuleChk" data-submoduleid="378_subModuleChk" id="378_addChk" onclick="checkAccess(this);" value="378#View" checked="">
									<label class="custom-control-label" for="378_addChk"></label>
								</div>
							</td>



							<td>
							<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 264_mainModuleChk 378_subModuleChk accessSelected" data-moduleid="264_mainModuleChk" data-submoduleid="378_subModuleChk" id="378_updateChk" onclick="checkAccess(this);" value="378#View" checked="">
									<label class="custom-control-label" for="378_updateChk"></label>
								</div>
							</td>



							<td>
							<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 264_mainModuleChk 378_subModuleChk accessSelected" data-moduleid="264_mainModuleChk" data-submoduleid="378_subModuleChk" id="378_deleteChk" onclick="checkAccess(this);" value="378#View" checked="">
									<label class="custom-control-label" for="378_deleteChk"></label>
								</div>
							</td>








						</tr>


						<!-- <tr>


							<td>
								<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 263_mainModuleChk" data-moduleid="263_mainModuleChk" data-submoduleid="279_subModuleChk" id="279_subModuleChk" onclick="checkSubmodules(this);" checked="">
									<label class="custom-control-label" for="279_subModuleChk">Result Declared</label>
								</div>
							</td>


							<td>
								<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 263_mainModuleChk 279_subModuleChk accessSelected" data-moduleid="263_mainModuleChk" data-submoduleid="279_subModuleChk" id="279_viewChk" onclick="checkAccess(this);" value="279#View" checked="">
									<label class="custom-control-label" for="279_viewChk"></label>
								</div>
							</td>



							<td>
								<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 263_mainModuleChk 279_subModuleChk accessSelected" data-moduleid="263_mainModuleChk" data-submoduleid="279_subModuleChk" id="279_addChk" onclick="checkAccess(this);" value="279#Add" checked="">
									<label class="custom-control-label" for="279_addChk"></label>
								</div>
							</td>



							<td>
								<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 263_mainModuleChk 279_subModuleChk accessSelected" data-moduleid="263_mainModuleChk" data-submoduleid="279_subModuleChk" id="279_updateChk" onclick="checkAccess(this);" value="279#Update" checked="">
									<label class="custom-control-label" for="279_updateChk"></label>
								</div>
							</td>



							<td>
								<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 263_mainModuleChk 279_subModuleChk accessSelected" data-moduleid="263_mainModuleChk" data-submoduleid="279_subModuleChk" id="279_deleteChk" onclick="checkAccess(this);" value="279#Delete" checked="">
									<label class="custom-control-label" for="279_deleteChk"></label>
								</div>
							</td>







						</tr -->


						<tr>


							<td>
								<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 266_mainModuleChk" data-moduleid="266_mainModuleChk" data-submoduleid="181_subModuleChk" id="181_subModuleChk" onclick="checkSubmodules(this);" checked="">
									<label class="custom-control-label" for="181_subModuleChk">Wall of Wisdom</label>
								</div>
							</td>


							


							<td></td>

							<td>
								<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 266_mainModuleChk 181_subModuleChk accessSelected" data-moduleid="266_mainModuleChk" data-submoduleid="181_subModuleChk" id="281_viewChk" onclick="checkAccess(this);" value="281#View" checked="">
									<label class="custom-control-label" for="281_viewChk"></label>
								</div>
							</td>

							<td>
								<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 266_mainModuleChk 181_subModuleChk accessSelected" data-moduleid="266_mainModuleChk" data-submoduleid="181_subModuleChk" id="282_addChk" onclick="checkAccess(this);" value="282#Add" checked="">
									<label class="custom-control-label" for="282_addChk"></label>
								</div>
							</td><td>
								<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 266_mainModuleChk 181_subModuleChk accessSelected" data-moduleid="266_mainModuleChk" data-submoduleid="181_subModuleChk" id="283_updateChk" onclick="checkAccess(this);" value="283#Update" checked="">
									<label class="custom-control-label" for="283_updateChk"></label>
								</div>
							</td>
							<td>
								<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 266_mainModuleChk 181_subModuleChk accessSelected" data-moduleid="266_mainModuleChk" data-submoduleid="181_subModuleChk" id="284_deleteChk" onclick="checkAccess(this);" value="284#Delete" checked="">
									<label class="custom-control-label" for="284_deleteChk"></label>
								</div>
							</td>








						</tr>


						<tr>


							<td>
								<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 366_mainModuleChk" data-moduleid="366_mainModuleChk" data-submoduleid="481_subModuleChk" id="481_subModuleChk" onclick="checkSubmodules(this);" checked="">
									<label class="custom-control-label" for="481_subModuleChk">Your Wall</label>
								</div>
							</td>


							


							<td></td>

							<td>
								<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 366_mainModuleChk 481_subModuleChk accessSelected" data-moduleid="366_mainModuleChk" data-submoduleid="481_subModuleChk" id="481_viewChk" onclick="checkAccess(this);" value="481#View" checked="">
									<label class="custom-control-label" for="481_viewChk"></label>
								</div>
							</td>

							<td>
								<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 366_mainModuleChk 481_subModuleChk accessSelected" data-moduleid="366_mainModuleChk" data-submoduleid="481_subModuleChk" id="482_addChk" onclick="checkAccess(this);" value="482#Add" checked="">
									<label class="custom-control-label" for="482_addChk"></label>
								</div>
							</td><td>
								<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 366_mainModuleChk 481_subModuleChk accessSelected" data-moduleid="366_mainModuleChk" data-submoduleid="481_subModuleChk" id="483_updateChk" onclick="checkAccess(this);" value="483#Update" checked="">
									<label class="custom-control-label" for="483_updateChk"></label>
								</div>
							</td>
							<td>
								<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 366_mainModuleChk 481_subModuleChk accessSelected" data-moduleid="366_mainModuleChk" data-submoduleid="481_subModuleChk" id="484_deleteChk" onclick="checkAccess(this);" value="484#Delete" checked="">
									<label class="custom-control-label" for="484_deleteChk"></label>
								</div>
							</td>








						</tr>


						<tr>
							<td rowspan="4">
								<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input" id="64_mainModuleChk" onclick="checkSubmodules(this);" checked="">
									<label class="custom-control-label" for="64_mainModuleChk">Classroom</label>
								</div>
							</td>


							<td>
								<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 64_mainModuleChk" data-moduleid="64_mainModuleChk" data-submoduleid="73_subModuleChk" id="73_subModuleChk" onclick="checkSubmodules(this);" checked="">
									<label class="custom-control-label" for="73_subModuleChk">Create Post</label>
								</div>
							</td>


							<td>
								<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 64_mainModuleChk 73_subModuleChk accessSelected" data-moduleid="64_mainModuleChk" data-submoduleid="73_subModuleChk" id="73_viewChk" onclick="checkAccess(this);" value="73#View" checked="">
									<label class="custom-control-label" for="73_viewChk"></label>
								</div>
							</td>


							<td>
							<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 64_mainModuleChk 73_subModuleChk accessSelected" data-moduleid="64_mainModuleChk" data-submoduleid="73_subModuleChk" id="73_addChk" onclick="checkAccess(this);" value="73#View" checked="">
									<label class="custom-control-label" for="73_addChk"></label>
								</div>
							</td>



							<td>
							<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 64_mainModuleChk 73_subModuleChk accessSelected" data-moduleid="64_mainModuleChk" data-submoduleid="73_subModuleChk" id="73_updateChk" onclick="checkAccess(this);" value="73#View" checked="">
									<label class="custom-control-label" for="73_updateChk"></label>
								</div>
							</td>



							<td>
							<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 64_mainModuleChk 73_subModuleChk accessSelected" data-moduleid="64_mainModuleChk" data-submoduleid="73_subModuleChk" id="73_deleteChk" onclick="checkAccess(this);" value="73#View" checked="">
									<label class="custom-control-label" for="73_deleteChk"></label>
								</div>
							</td>








						</tr>


						<tr>


							<td>
								<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 64_mainModuleChk" data-moduleid="64_mainModuleChk" data-submoduleid="74_subModuleChk" id="74_subModuleChk" onclick="checkSubmodules(this);" checked="">
									<label class="custom-control-label" for="74_subModuleChk">Manage Post</label>
								</div>
							</td>


							<td>
								<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 64_mainModuleChk 74_subModuleChk accessSelected" data-moduleid="64_mainModuleChk" data-submoduleid="74_subModuleChk" id="74_viewChk" onclick="checkAccess(this);" value="74#View" checked="">
									<label class="custom-control-label" for="74_viewChk"></label>
								</div>
							</td>



							<td>
								<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 64_mainModuleChk 74_subModuleChk accessSelected" data-moduleid="64_mainModuleChk" data-submoduleid="74_subModuleChk" id="74_addChk" onclick="checkAccess(this);" value="74#Add" checked="">
									<label class="custom-control-label" for="74_addChk"></label>
								</div>
							</td>



							<td>
								<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 64_mainModuleChk 74_subModuleChk accessSelected" data-moduleid="64_mainModuleChk" data-submoduleid="74_subModuleChk" id="74_updateChk" onclick="checkAccess(this);" value="74#Update" checked="">
									<label class="custom-control-label" for="74_updateChk"></label>
								</div>
							</td>



							<td>
								<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 64_mainModuleChk 74_subModuleChk accessSelected" data-moduleid="64_mainModuleChk" data-submoduleid="74_subModuleChk" id="74_deleteChk" onclick="checkAccess(this);" value="74#Delete" checked="">
									<label class="custom-control-label" for="74_deleteChk"></label>
								</div>
							</td>







						</tr>


						<tr>


							<td>
								<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 64_mainModuleChk" data-moduleid="64_mainModuleChk" data-submoduleid="76_subModuleChk" id="76_subModuleChk" onclick="checkSubmodules(this);" checked="">
									<label class="custom-control-label" for="76_subModuleChk">Published Post</label>
								</div>
							</td>


							<td>
								<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 64_mainModuleChk 76_subModuleChk accessSelected" data-moduleid="64_mainModuleChk" data-submoduleid="76_subModuleChk" id="76_viewChk" onclick="checkAccess(this);" value="76#View" checked="">
									<label class="custom-control-label" for="76_viewChk"></label>
								</div>
							</td>



							<td>
								<!-- <div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 64_mainModuleChk 76_subModuleChk accessSelected" data-moduleid="64_mainModuleChk" data-submoduleid="76_subModuleChk" id="76_addChk" onclick="checkAccess(this);" value="76#Add" checked="">
									<label class="custom-control-label" for="76_addChk"></label>
								</div> -->
							</td>



							<td>
								<!-- <div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 64_mainModuleChk 76_subModuleChk accessSelected" data-moduleid="64_mainModuleChk" data-submoduleid="76_subModuleChk" id="76_updateChk" onclick="checkAccess(this);" value="76#Update" checked="">
									<label class="custom-control-label" for="76_updateChk"></label>
								</div> -->
							</td>



							<td>
								<!-- <div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 64_mainModuleChk 76_subModuleChk accessSelected" data-moduleid="64_mainModuleChk" data-submoduleid="76_subModuleChk" id="76_deleteChk" onclick="checkAccess(this);" value="76#Delete" checked="">
									<label class="custom-control-label" for="76_deleteChk"></label>
								</div> -->
							</td>







						</tr>


						<tr>


							<td>
								<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 64_mainModuleChk" data-moduleid="64_mainModuleChk" data-submoduleid="77_subModuleChk" id="77_subModuleChk" onclick="checkSubmodules(this);" checked="">
									<label class="custom-control-label" for="77_subModuleChk">Archived Post</label>
								</div>
							</td>


							<td>
								<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 64_mainModuleChk 77_subModuleChk accessSelected" data-moduleid="64_mainModuleChk" data-submoduleid="77_subModuleChk" id="77_viewChk" onclick="checkAccess(this);" value="77#View" checked="">
									<label class="custom-control-label" for="77_viewChk"></label>
								</div>
							</td>


							<td></td>



							<td></td>



							<td></td>








						</tr>


						


						<tr>


	<td>
		<div class="custom-control custom-checkbox mr-3">
			<input type="checkbox" class="custom-control-input 6_mainModuleChk" data-moduleid="6_mainModuleChk" data-submoduleid="1_subModuleChk" id="1_subModuleChk" onclick="checkSubmodules(this);" checked="">
			<label class="custom-control-label" for="1_subModuleChk">By the Mentors</label>
		</div>
	</td>


	


	<td></td>

	<td>
		<div class="custom-control custom-checkbox mr-3">
			<input type="checkbox" class="custom-control-input 6_mainModuleChk 1_subModuleChk accessSelected" data-moduleid="6_mainModuleChk" data-submoduleid="1_subModuleChk" id="1_viewChk" onclick="checkAccess(this);" value="1#View" checked="">
			<label class="custom-control-label" for="1_viewChk"></label>
		</div>
	</td>

	<td>
		<div class="custom-control custom-checkbox mr-3">
			<input type="checkbox" class="custom-control-input 6_mainModuleChk 1_subModuleChk accessSelected" data-moduleid="6_mainModuleChk" data-submoduleid="1_subModuleChk" id="2_addChk" onclick="checkAccess(this);" value="2#Add" checked="">
			<label class="custom-control-label" for="2_addChk"></label>
		</div>
	</td><td>
		<div class="custom-control custom-checkbox mr-3">
			<input type="checkbox" class="custom-control-input 6_mainModuleChk 1_subModuleChk accessSelected" data-moduleid="6_mainModuleChk" data-submoduleid="1_subModuleChk" id="3_updateChk" onclick="checkAccess(this);" value="3#Update" checked="">
			<label class="custom-control-label" for="3_updateChk"></label>
		</div>
	</td>
	<td>
		<div class="custom-control custom-checkbox mr-3">
			<input type="checkbox" class="custom-control-input 6_mainModuleChk 1_subModuleChk accessSelected" data-moduleid="6_mainModuleChk" data-submoduleid="1_subModuleChk" id="4_deleteChk" onclick="checkAccess(this);" value="4#Delete" checked="">
			<label class="custom-control-label" for="4_deleteChk"></label>
		</div>
	</td>








</tr>
<tr>
							<td rowspan="8">
								<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input" id="7_mainModuleChk" onclick="checkSubmodules(this);" checked="">
									<label class="custom-control-label" for="7_mainModuleChk">CMS</label>
								</div>
							</td>


							<td>
								<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 7_mainModuleChk" data-moduleid="7_mainModuleChk" data-submoduleid="2_subModuleChk" id="2_subModuleChk" onclick="checkSubmodules(this);" checked="">
									<label class="custom-control-label" for="2_subModuleChk">Banner Image</label>
								</div>
							</td>


							<td>
								<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 7_mainModuleChk 2_subModuleChk accessSelected" data-moduleid="7_mainModuleChk" data-submoduleid="2_subModuleChk" id="2_new_viewChk" onclick="checkAccess(this);" value="73#View" checked="">
									<label class="custom-control-label" for="2_new_viewChk"></label>
								</div>
							</td>


							<td>
							<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 7_mainModuleChk 2_subModuleChk accessSelected" data-moduleid="7_mainModuleChk" data-submoduleid="2_subModuleChk" id="2_new_addChk" onclick="checkAccess(this);" value="73#View" checked="">
									<label class="custom-control-label" for="2_new_addChk"></label>
								</div>
							</td>



							<td>
							<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 7_mainModuleChk 2_subModuleChk accessSelected" data-moduleid="7_mainModuleChk" data-submoduleid="2_subModuleChk" id="2_new_updateChk" onclick="checkAccess(this);" value="73#View" checked="">
									<label class="custom-control-label" for="2_new_updateChk"></label>
								</div>
							</td>



							<td>
							<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 7_mainModuleChk 2_subModuleChk accessSelected" data-moduleid="7_mainModuleChk" data-submoduleid="2_subModuleChk" id="2_new_deleteChk" onclick="checkAccess(this);" value="73#View" checked="">
									<label class="custom-control-label" for="2_new_deleteChk"></label>
								</div>
							</td>








						</tr>


						<tr>


							<td>
								<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 7_mainModuleChk" data-moduleid="7_mainModuleChk" data-submoduleid="3_subModuleChk" id="3_subModuleChk" onclick="checkSubmodules(this);" checked="">
									<label class="custom-control-label" for="3_subModuleChk">About Exchange forum</label>
								</div>
							</td>


							<td>
								<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 7_mainModuleChk 3_subModuleChk accessSelected" data-moduleid="7_mainModuleChk" data-submoduleid="3_subModuleChk" id="3_new_viewChk" onclick="checkAccess(this);" value="74#View" checked="">
									<label class="custom-control-label" for="3_new_viewChk"></label>
								</div>
							</td>



							<td>
								<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 7_mainModuleChk 3_subModuleChk accessSelected" data-moduleid="7_mainModuleChk" data-submoduleid="3_subModuleChk" id="4_new_addChk" onclick="checkAccess(this);" value="74#Add" checked="">
									<label class="custom-control-label" for="4_new_addChk"></label>
								</div>
							</td>



							<td>
								<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 7_mainModuleChk 3_subModuleChk accessSelected" data-moduleid="7_mainModuleChk" data-submoduleid="3_subModuleChk" id="5_updateChk" onclick="checkAccess(this);" value="74#Update" checked="">
									<label class="custom-control-label" for="5_updateChk"></label>
								</div>
							</td>



							<td>
								<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 7_mainModuleChk 3_subModuleChk accessSelected" data-moduleid="7_mainModuleChk" data-submoduleid="3_subModuleChk" id="6_deleteChk" onclick="checkAccess(this);" value="74#Delete" checked="">
									<label class="custom-control-label" for="6_deleteChk"></label>
								</div>
							</td>







						</tr>


						<tr>


							<td>
								<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 7_mainModuleChk" data-moduleid="7_mainModuleChk" data-submoduleid="4_subModuleChk" id="4_subModuleChk" onclick="checkSubmodules(this);" checked="">
									<label class="custom-control-label" for="4_subModuleChk">Contact Us</label>
								</div>
							</td>


							<td>
								<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 7_mainModuleChk 4_subModuleChk accessSelected" data-moduleid="7_mainModuleChk" data-submoduleid="4_subModuleChk" id="7_viewChk" onclick="checkAccess(this);" value="76#View" checked="">
									<label class="custom-control-label" for="7_viewChk"></label>
								</div>
							</td>



							<td>
								<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 7_mainModuleChk 4_subModuleChk accessSelected" data-moduleid="7_mainModuleChk" data-submoduleid="4_subModuleChk" id="8_addChk" onclick="checkAccess(this);" value="76#Add" checked="">
									<label class="custom-control-label" for="8_addChk"></label>
								</div>
							</td>



							<td>
								<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 7_mainModuleChk 4_subModuleChk accessSelected" data-moduleid="7_mainModuleChk" data-submoduleid="4_subModuleChk" id="9_updateChk" onclick="checkAccess(this);" value="76#Update" checked="">
									<label class="custom-control-label" for="9_updateChk"></label>
								</div>
							</td>



							<td>
								<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 7_mainModuleChk 4_subModuleChk accessSelected" data-moduleid="7_mainModuleChk" data-submoduleid="4_subModuleChk" id="10_deleteChk" onclick="checkAccess(this);" value="76#Delete" checked="">
									<label class="custom-control-label" for="10_deleteChk"></label>
								</div>
							</td>







						</tr>


						<tr>


							<td>
								<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 7_mainModuleChk" data-moduleid="7_mainModuleChk" data-submoduleid="6_subModuleChk" id="6_subModuleChk" onclick="checkSubmodules(this);" checked="">
									<label class="custom-control-label" for="6_subModuleChk">Footer Links</label>
								</div>
							</td>


							<td>
								<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 7_mainModuleChk 6_subModuleChk accessSelected" data-moduleid="7_mainModuleChk" data-submoduleid="6_subModuleChk" id="11_viewChk" onclick="checkAccess(this);" value="77#View" checked="">
									<label class="custom-control-label" for="11_viewChk"></label>
								</div>
							</td>


							<td>
							<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 7_mainModuleChk 6_subModuleChk accessSelected" data-moduleid="7_mainModuleChk" data-submoduleid="6_subModuleChk" id="12_addChk" onclick="checkAccess(this);" value="77#View" checked="">
									<label class="custom-control-label" for="12_addChk"></label>
								</div>
							</td>



							<td>
							<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 7_mainModuleChk 6_subModuleChk accessSelected" data-moduleid="7_mainModuleChk" data-submoduleid="6_subModuleChk" id="13_updateChk" onclick="checkAccess(this);" value="77#View" checked="">
									<label class="custom-control-label" for="13_updateChk"></label>
								</div>
							</td>



							<td>
							<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 7_mainModuleChk 6_subModuleChk accessSelected" data-moduleid="7_mainModuleChk" data-submoduleid="6_subModuleChk" id="14_deleteChk" onclick="checkAccess(this);" value="77#View" checked="">
									<label class="custom-control-label" for="14_deleteChk"></label>
								</div>
							</td>








						</tr>
						<tr>


							<td>
								<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 7_mainModuleChk" data-moduleid="7_mainModuleChk" data-submoduleid="7_subModuleChk" id="7_subModuleChk" onclick="checkSubmodules(this);" checked="">
									<label class="custom-control-label" for="7_subModuleChk">Gallery</label>
								</div>
							</td>


							<td>
								<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 7_mainModuleChk 6_subModuleChk accessSelected" data-moduleid="7_mainModuleChk" data-submoduleid="7_subModuleChk" id="15_viewChk" onclick="checkAccess(this);" value="77#View" checked="">
									<label class="custom-control-label" for="15_viewChk"></label>
								</div>
							</td>


							<td>
							<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 7_mainModuleChk 6_subModuleChk accessSelected" data-moduleid="7_mainModuleChk" data-submoduleid="7_subModuleChk" id="16_addChk" onclick="checkAccess(this);" value="77#View" checked="">
									<label class="custom-control-label" for="16_addChk"></label>
								</div>
							</td>



							<td>
							<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 7_mainModuleChk 6_subModuleChk accessSelected" data-moduleid="7_mainModuleChk" data-submoduleid="7_subModuleChk" id="17_updateChk" onclick="checkAccess(this);" value="77#View" checked="">
									<label class="custom-control-label" for="17_updateChk"></label>
								</div>
							</td>



							<td>
							<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 7_mainModuleChk 6_subModuleChk accessSelected" data-moduleid="7_mainModuleChk" data-submoduleid="7_subModuleChk" id="18_deleteChk" onclick="checkAccess(this);" value="77#View" checked="">
									<label class="custom-control-label" for="18_deleteChk"></label>
								</div>
							</td>








						</tr>
						<tr>


							<td>
								<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 7_mainModuleChk" data-moduleid="7_mainModuleChk" data-submoduleid="8_subModuleChk" id="8_subModuleChk" onclick="checkSubmodules(this);" checked="">
									<label class="custom-control-label" for="8_subModuleChk">Feedback</label>
								</div>
							</td>


							<td>
								<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 7_mainModuleChk 6_subModuleChk accessSelected" data-moduleid="7_mainModuleChk" data-submoduleid="8_subModuleChk" id="19_viewChk" onclick="checkAccess(this);" value="77#View" checked="">
									<label class="custom-control-label" for="19_viewChk"></label>
								</div>
							</td>


							<td>
							<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 7_mainModuleChk 6_subModuleChk accessSelected" data-moduleid="7_mainModuleChk" data-submoduleid="8_subModuleChk" id="20_addChk" onclick="checkAccess(this);" value="77#View" checked="">
									<label class="custom-control-label" for="20_addChk"></label>
								</div>
							</td>



							<td>
							<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 7_mainModuleChk 6_subModuleChk accessSelected" data-moduleid="7_mainModuleChk" data-submoduleid="8_subModuleChk" id="21_updateChk" onclick="checkAccess(this);" value="77#View" checked="">
									<label class="custom-control-label" for="21_updateChk"></label>
								</div>
							</td>



							<td>
							<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 7_mainModuleChk 6_subModuleChk accessSelected" data-moduleid="7_mainModuleChk" data-submoduleid="8_subModuleChk" id="22_deleteChk" onclick="checkAccess(this);" value="77#View" checked="">
									<label class="custom-control-label" for="22_deleteChk"></label>
								</div>
							</td>
                    </tr>
					<tr>


							<td>
								<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 7_mainModuleChk" data-moduleid="7_mainModuleChk" data-submoduleid="9_subModuleChk" id="9_subModuleChk" onclick="checkSubmodules(this);" checked="">
									<label class="custom-control-label" for="9_subModuleChk">Latest News</label>
								</div>
							</td>


							<td>
								<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 7_mainModuleChk 6_subModuleChk accessSelected" data-moduleid="7_mainModuleChk" data-submoduleid="9_subModuleChk" id="23_viewChk" onclick="checkAccess(this);" value="77#View" checked="">
									<label class="custom-control-label" for="23_viewChk"></label>
								</div>
							</td>


							<td>
							<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 7_mainModuleChk 6_subModuleChk accessSelected" data-moduleid="7_mainModuleChk" data-submoduleid="9_subModuleChk" id="24_addChk" onclick="checkAccess(this);" value="77#View" checked="">
									<label class="custom-control-label" for="24_addChk"></label>
								</div>
							</td>



							<td>
							<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 7_mainModuleChk 6_subModuleChk accessSelected" data-moduleid="7_mainModuleChk" data-submoduleid="9_subModuleChk" id="25_updateChk" onclick="checkAccess(this);" value="77#View" checked="">
									<label class="custom-control-label" for="25_updateChk"></label>
								</div>
							</td>



							<td>
							<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 7_mainModuleChk 6_subModuleChk accessSelected" data-moduleid="7_mainModuleChk" data-submoduleid="9_subModuleChk" id="26_deleteChk" onclick="checkAccess(this);" value="77#View" checked="">
									<label class="custom-control-label" for="26_deleteChk"></label>
								</div>
							</td>
                    </tr>
					<tr>


							<td>
								<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 7_mainModuleChk" data-moduleid="7_mainModuleChk" data-submoduleid="10_subModuleChk" id="10_subModuleChk" onclick="checkSubmodules(this);" checked="">
									<label class="custom-control-label" for="10_subModuleChk">Upcoming Events</label>
								</div>
							</td>


							<td>
								<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 7_mainModuleChk 6_subModuleChk accessSelected" data-moduleid="7_mainModuleChk" data-submoduleid="10_subModuleChk" id="27_viewChk" onclick="checkAccess(this);" value="77#View" checked="">
									<label class="custom-control-label" for="27_viewChk"></label>
								</div>
							</td>


							<td>
							<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 7_mainModuleChk 6_subModuleChk accessSelected" data-moduleid="7_mainModuleChk" data-submoduleid="10_subModuleChk" id="28_addChk" onclick="checkAccess(this);" value="77#View" checked="">
									<label class="custom-control-label" for="28_addChk"></label>
								</div>
							</td>



							<td>
							<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 7_mainModuleChk 6_subModuleChk accessSelected" data-moduleid="7_mainModuleChk" data-submoduleid="10_subModuleChk" id="29_updateChk" onclick="checkAccess(this);" value="77#View" checked="">
									<label class="custom-control-label" for="29_updateChk"></label>
								</div>
							</td>



							<td>
							<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 7_mainModuleChk 6_subModuleChk accessSelected" data-moduleid="7_mainModuleChk" data-submoduleid="10_subModuleChk" id="30_deleteChk" onclick="checkAccess(this);" value="77#View" checked="">
									<label class="custom-control-label" for="30_deleteChk"></label>
								</div>
							</td>
                    </tr>
					<tr>
							<td>
								<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input" id="8_mainModuleChk" onclick="checkSubmodules(this);" checked="">
									<label class="custom-control-label" for="8_mainModuleChk">Winners Wall</label>
								</div>
							</td>


							<td></td>


							<td>
								<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 8_mainModuleChk 11_subModuleChk accessSelected" data-moduleid="8_mainModuleChk" data-submoduleid="11_subModuleChk" id="31_viewChk" onclick="checkAccess(this);" value="31#View" checked="">
									<label class="custom-control-label" for="31_viewChk"></label>
								</div>
							</td>


							<td>
							    <div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 8_mainModuleChk 11_subModuleChk accessSelected" data-moduleid="8_mainModuleChk" data-submoduleid="11_subModuleChk" id="32_addChk" onclick="checkAccess(this);" value="32#Add" checked="">
									<label class="custom-control-label" for="32_addChk"></label>
								</div>
							</td>



							<td>
							    <div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 8_mainModuleChk 11_subModuleChk accessSelected" data-moduleid="8_mainModuleChk" data-submoduleid="11_subModuleChk" id="33_updateChk" onclick="checkAccess(this);" value="33#Update" checked="">
									<label class="custom-control-label" for="33_updateChk"></label>
								</div>
							</td>



							<td>
							<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 8_mainModuleChk 11_subModuleChk accessSelected" data-moduleid="8_mainModuleChk" data-submoduleid="11_subModuleChk" id="34_viewChk" onclick="checkAccess(this);" value="34#Delete" checked="">
									<label class="custom-control-label" for="34_viewChk"></label>
								</div>
							</td>








						</tr>
						<tr>
							<td rowspan="6">
								<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input" id="9_mainModuleChk" onclick="checkSubmodules(this);" checked="">
									<label class="custom-control-label" for="9_mainModuleChk">Share your thoughts</label>
								</div>
							</td>


							<td>
							<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 9_mainModuleChk" data-moduleid="9_mainModuleChk" data-submoduleid="12_subModuleChk" id="12_subModuleChk" onclick="checkSubmodules(this);" checked="">
									<label class="custom-control-label" for="12_subModuleChk">New Work item Proposal</label>
								</div>
							</td>


							<td>
								<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 9_mainModuleChk 12_subModuleChk accessSelected" data-moduleid="9_mainModuleChk" data-submoduleid="12_subModuleChk" id="35_viewChk" onclick="checkAccess(this);" value="73#View" checked="">
									<label class="custom-control-label" for="35_viewChk"></label>
								</div>
							</td>


							<td>
							    <!-- <div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 9_mainModuleChk 12_subModuleChk accessSelected" data-moduleid="9_mainModuleChk" data-submoduleid="12_subModuleChk" id="36_addChk" onclick="checkAccess(this);" value="73#View" checked="">
									<label class="custom-control-label" for="36_addChk"></label>
								</div> -->
							</td>



							<td>
							    <div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 9_mainModuleChk 12_subModuleChk accessSelected" data-moduleid="9_mainModuleChk" data-submoduleid="12_subModuleChk" id="37_updateChk" onclick="checkAccess(this);" value="73#View" checked="">
									<label class="custom-control-label" for="37_updateChk"></label>
								</div>
							</td>



							<td>
							<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 9_mainModuleChk 12_subModuleChk accessSelected" data-moduleid="9_mainModuleChk" data-submoduleid="12_subModuleChk" id="38_viewChk" onclick="checkAccess(this);" value="73#View" checked="">
									<label class="custom-control-label" for="38_viewChk"></label>
								</div>
							</td>








						</tr>


						<tr>


							<td>
								<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 9_mainModuleChk" data-moduleid="9_mainModuleChk" data-submoduleid="13_subModuleChk" id="13_subModuleChk" onclick="checkSubmodules(this);" checked="">
									<label class="custom-control-label" for="13_subModuleChk">Important Draft Standards</label>
								</div>
							</td>


							<td>
								<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 9_mainModuleChk 13_subModuleChk accessSelected" data-moduleid="9_mainModuleChk" data-submoduleid="13_subModuleChk" id="39_viewChk" onclick="checkAccess(this);" value="74#View" checked="">
									<label class="custom-control-label" for="39_viewChk"></label>
								</div>
							</td>



							<td>
								<!-- <div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 9_mainModuleChk 13_subModuleChk accessSelected" data-moduleid="9_mainModuleChk" data-submoduleid="13_subModuleChk" id="40_addChk" onclick="checkAccess(this);" value="74#Add" checked="">
									<label class="custom-control-label" for="40_addChk"></label>
								</div> -->
							</td>



							<td>
								<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 9_mainModuleChk 13_subModuleChk accessSelected" data-moduleid="9_mainModuleChk" data-submoduleid="13_subModuleChk" id="41_updateChk" onclick="checkAccess(this);" value="74#Update" checked="">
									<label class="custom-control-label" for="41_updateChk"></label>
								</div>
							</td>



							<td>
								<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 9_mainModuleChk 13_subModuleChk accessSelected" data-moduleid="9_mainModuleChk" data-submoduleid="13_subModuleChk" id="42_deleteChk" onclick="checkAccess(this);" value="74#Delete" checked="">
									<label class="custom-control-label" for="42_deleteChk"></label>
								</div>
							</td>







						</tr>


						<tr>


							<td>
								<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 9_mainModuleChk" data-moduleid="9_mainModuleChk" data-submoduleid="14_subModuleChk" id="14_subModuleChk" onclick="checkSubmodules(this);" checked="">
									<label class="custom-control-label" for="14_subModuleChk">New Standards Published</label>
								</div>
							</td>


							<td>
								<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 9_mainModuleChk 14_subModuleChk accessSelected" data-moduleid="9_mainModuleChk" data-submoduleid="14_subModuleChk" id="43_viewChk" onclick="checkAccess(this);" value="76#View" checked="">
									<label class="custom-control-label" for="43_viewChk"></label>
								</div>
							</td>



							<td>
								<!-- <div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 9_mainModuleChk 14_subModuleChk accessSelected" data-moduleid="9_mainModuleChk" data-submoduleid="14_subModuleChk" id="44_addChk" onclick="checkAccess(this);" value="76#Add" checked="">
									<label class="custom-control-label" for="44_addChk"></label>
								</div> -->
							</td>



							<td>
								<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 9_mainModuleChk 14_subModuleChk accessSelected" data-moduleid="9_mainModuleChk" data-submoduleid="14_subModuleChk" id="45_updateChk" onclick="checkAccess(this);" value="76#Update" checked="">
									<label class="custom-control-label" for="45_updateChk"></label>
								</div>
							</td>



							<td>
								<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 9_mainModuleChk 14_subModuleChk accessSelected" data-moduleid="9_mainModuleChk" data-submoduleid="14_subModuleChk" id="46_deleteChk" onclick="checkAccess(this);" value="76#Delete" checked="">
									<label class="custom-control-label" for="46_deleteChk"></label>
								</div>
							</td>







						</tr>


						<tr>


							<td>
								<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 9_mainModuleChk" data-moduleid="9_mainModuleChk" data-submoduleid="15_subModuleChk" id="15_subModuleChk" onclick="checkSubmodules(this);" checked="">
									<label class="custom-control-label" for="15_subModuleChk">Standards Under Review</label>
								</div>
							</td>


							<td>
								<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 9_mainModuleChk 15_subModuleChk accessSelected" data-moduleid="9_mainModuleChk" data-submoduleid="15_subModuleChk" id="47_viewChk" onclick="checkAccess(this);" value="77#View" checked="">
									<label class="custom-control-label" for="47_viewChk"></label>
								</div>
							</td>


							<td>
							<!-- <div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 9_mainModuleChk 15_subModuleChk accessSelected" data-moduleid="9_mainModuleChk" data-submoduleid="15_subModuleChk" id="48_addChk" onclick="checkAccess(this);" value="77#View" checked="">
									<label class="custom-control-label" for="48_addChk"></label>
								</div> -->
							</td>



							<td>
							<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 9_mainModuleChk 15_subModuleChk accessSelected" data-moduleid="9_mainModuleChk" data-submoduleid="15_subModuleChk" id="49_updateChk" onclick="checkAccess(this);" value="77#View" checked="">
									<label class="custom-control-label" for="49_updateChk"></label>
								</div>
							</td>



							<td>
							<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 9_mainModuleChk 15_subModuleChk accessSelected" data-moduleid="9_mainModuleChk" data-submoduleid="15_subModuleChk" id="50_deleteChk" onclick="checkAccess(this);" value="77#View" checked="">
									<label class="custom-control-label" for="50_deleteChk"></label>
								</div>
							</td>








						</tr>
						<tr>


							<td>
								<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 9_mainModuleChk" data-moduleid="9_mainModuleChk" data-submoduleid="16_subModuleChk" id="16_subModuleChk" onclick="checkSubmodules(this);" checked="">
									<label class="custom-control-label" for="16_subModuleChk">Revised Standards</label>
								</div>
							</td>


							<td>
								<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 9_mainModuleChk 16_subModuleChk accessSelected" data-moduleid="9_mainModuleChk" data-submoduleid="16_subModuleChk" id="51_viewChk" onclick="checkAccess(this);" value="77#View" checked="">
									<label class="custom-control-label" for="51_viewChk"></label>
								</div>
							</td>


							<td>
							    <!-- <div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 9_mainModuleChk 16_subModuleChk accessSelected" data-moduleid="9_mainModuleChk" data-submoduleid="16_subModuleChk" id="52_addChk" onclick="checkAccess(this);" value="77#View" checked="">
									<label class="custom-control-label" for="52_addChk"></label>
								</div> -->
							</td>



							<td>
							<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 9_mainModuleChk 16_subModuleChk accessSelected" data-moduleid="9_mainModuleChk" data-submoduleid="16_subModuleChk" id="53_updateChk" onclick="checkAccess(this);" value="77#View" checked="">
									<label class="custom-control-label" for="53_updateChk"></label>
								</div>
							</td>



							<td>
							<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 9_mainModuleChk 16_subModuleChk accessSelected" data-moduleid="9_mainModuleChk" data-submoduleid="16_subModuleChk" id="54_deleteChk" onclick="checkAccess(this);" value="77#View" checked="">
									<label class="custom-control-label" for="54_deleteChk"></label>
								</div>
							</td>








						</tr>
						<tr>


							<td>
								<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 9_mainModuleChk" data-moduleid="9_mainModuleChk" data-submoduleid="17_subModuleChk" id="17_subModuleChk" onclick="checkSubmodules(this);" checked="">
									<label class="custom-control-label" for="17_subModuleChk">Discussion Forum</label>
								</div>
							</td>


							<td>
								<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 9_mainModuleChk 17_subModuleChk accessSelected" data-moduleid="9_mainModuleChk" data-submoduleid="17_subModuleChk" id="55_viewChk" onclick="checkAccess(this);" value="77#View" checked="">
									<label class="custom-control-label" for="55_viewChk"></label>
								</div>
							</td>


							<td>
							<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 9_mainModuleChk 17_subModuleChk accessSelected" data-moduleid="9_mainModuleChk" data-submoduleid="17_subModuleChk" id="56_addChk" onclick="checkAccess(this);" value="77#View" checked="">
									<label class="custom-control-label" for="56_addChk"></label>
								</div>
							</td>



							<td>
							<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 9_mainModuleChk 17_subModuleChk accessSelected" data-moduleid="9_mainModuleChk" data-submoduleid="17_subModuleChk" id="57_updateChk" onclick="checkAccess(this);" value="77#View" checked="">
									<label class="custom-control-label" for="57_updateChk"></label>
								</div>
							</td>



							<td>
							<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 9_mainModuleChk 17_subModuleChk accessSelected" data-moduleid="9_mainModuleChk" data-submoduleid="17_subModuleChk" id="58_deleteChk" onclick="checkAccess(this);" value="77#View" checked="">
									<label class="custom-control-label" for="58_deleteChk"></label>
								</div>
							</td>
                    </tr>
					<tr>
							<td rowspan="4	">
								<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input" id="10_mainModuleChk" onclick="checkSubmodules(this);" checked="">
									<label class="custom-control-label" for="10_mainModuleChk">Join the Class Room</label>
								</div>
							</td>


							<td>
							<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 10_mainModuleChk" data-moduleid="10_mainModuleChk" data-submoduleid="18_subModuleChk" id="18_subModuleChk" onclick="checkSubmodules(this);" checked="">
									<label class="custom-control-label" for="18_subModuleChk">Create new post/ live session</label>
								</div>
							</td>


							<td>
								<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 10_mainModuleChk 18_subModuleChk accessSelected" data-moduleid="10_mainModuleChk" data-submoduleid="18_subModuleChk" id="59_viewChk" onclick="checkAccess(this);" value="73#View" checked="">
									<label class="custom-control-label" for="59_viewChk"></label>
								</div>
							</td>


							<td>
							    <div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 10_mainModuleChk 18_subModuleChk accessSelected" data-moduleid="10_mainModuleChk" data-submoduleid="18_subModuleChk" id="60_addChk" onclick="checkAccess(this);" value="73#View" checked="">
									<label class="custom-control-label" for="60_addChk"></label>
								</div>
							</td>



							<td>
							    <div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 10_mainModuleChk 18_subModuleChk accessSelected" data-moduleid="10_mainModuleChk" data-submoduleid="18_subModuleChk" id="61_updateChk" onclick="checkAccess(this);" value="73#View" checked="">
									<label class="custom-control-label" for="61_updateChk"></label>
								</div>
							</td>



							<td>
							<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 10_mainModuleChk 18_subModuleChk accessSelected" data-moduleid="10_mainModuleChk" data-submoduleid="18_subModuleChk" id="62_deleteChk" onclick="checkAccess(this);" value="73#View" checked="">
									<label class="custom-control-label" for="62_deleteChk"></label>
								</div>
							</td>








						</tr>


						<tr>


							<td>
								<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 10_mainModuleChk" data-moduleid="10_mainModuleChk" data-submoduleid="19_subModuleChk" id="19_subModuleChk" onclick="checkSubmodules(this);" checked="">
									<label class="custom-control-label" for="19_subModuleChk">Manage session/Post</label>
								</div>
							</td>


							<td>
								<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 10_mainModuleChk 19_subModuleChk accessSelected" data-moduleid="10_mainModuleChk" data-submoduleid="19_subModuleChk" id="63_viewChk" onclick="checkAccess(this);" value="74#View" checked="">
									<label class="custom-control-label" for="63_viewChk"></label>
								</div>
							</td>



							<td>
								<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 10_mainModuleChk 19_subModuleChk accessSelected" data-moduleid="10_mainModuleChk" data-submoduleid="19_subModuleChk" id="64_addChk" onclick="checkAccess(this);" value="74#Add" checked="">
									<label class="custom-control-label" for="64_addChk"></label>
								</div>
							</td>



							<td>
								<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 10_mainModuleChk 19_subModuleChk accessSelected" data-moduleid="10_mainModuleChk" data-submoduleid="19_subModuleChk" id="65_updateChk" onclick="checkAccess(this);" value="74#Update" checked="">
									<label class="custom-control-label" for="65_updateChk"></label>
								</div>
							</td>



							<td>
								<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 10_mainModuleChk 19_subModuleChk accessSelected" data-moduleid="10_mainModuleChk" data-submoduleid="19_subModuleChk" id="66_deleteChk" onclick="checkAccess(this);" value="74#Delete" checked="">
									<label class="custom-control-label" for="66_deleteChk"></label>
								</div>
							</td>







						</tr>


						<tr>


							<td>
								<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 10_mainModuleChk" data-moduleid="10_mainModuleChk" data-submoduleid="20_subModuleChk" id="20_subModuleChk" onclick="checkSubmodules(this);" checked="">
									<label class="custom-control-label" for="20_subModuleChk">Published Posts</label>
								</div>
							</td>


							<td>
								<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 10_mainModuleChk 20_subModuleChk accessSelected" data-moduleid="10_mainModuleChk" data-submoduleid="20_subModuleChk" id="67_viewChk" onclick="checkAccess(this);" value="76#View" checked="">
									<label class="custom-control-label" for="67_viewChk"></label>
								</div>
							</td>



							<td>
								<!-- <div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 10_mainModuleChk 20_subModuleChk accessSelected" data-moduleid="10_mainModuleChk" data-submoduleid="20_subModuleChk" id="68_addChk" onclick="checkAccess(this);" value="76#Add" checked="">
									<label class="custom-control-label" for="68_addChk"></label>
								</div> -->
							</td>



							<td>
								<!-- <div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 10_mainModuleChk 20_subModuleChk accessSelected" data-moduleid="10_mainModuleChk" data-submoduleid="20_subModuleChk" id="69_updateChk" onclick="checkAccess(this);" value="76#Update" checked="">
									<label class="custom-control-label" for="69_updateChk"></label>
								</div> -->
							</td>



							<td>
								<!-- <div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 10_mainModuleChk 20_subModuleChk accessSelected" data-moduleid="10_mainModuleChk" data-submoduleid="20_subModuleChk" id="70_deleteChk" onclick="checkAccess(this);" value="76#Delete" checked="">
									<label class="custom-control-label" for="70_deleteChk"></label>
								</div> -->
							</td>







						</tr>


						<tr>


							<td>
								<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 10_mainModuleChk" data-moduleid="10_mainModuleChk" data-submoduleid="21_subModuleChk" id="21_subModuleChk" onclick="checkSubmodules(this);" checked="">
									<label class="custom-control-label" for="21_subModuleChk">Archived Posts</label>
								</div>
							</td>


							<td>
								<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 10_mainModuleChk 21_subModuleChk accessSelected" data-moduleid="10_mainModuleChk" data-submoduleid="21_subModuleChk" id="71_viewChk" onclick="checkAccess(this);" value="77#View" checked="">
									<label class="custom-control-label" for="71_viewChk"></label>
								</div>
							</td>


							<td>
							<!-- <div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 10_mainModuleChk 21_subModuleChk accessSelected" data-moduleid="10_mainModuleChk" data-submoduleid="21_subModuleChk" id="72_addChk" onclick="checkAccess(this);" value="77#View" checked="">
									<label class="custom-control-label" for="72_addChk"></label>
								</div> -->
							</td>



							<td>
							<!-- <div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 10_mainModuleChk 21_subModuleChk accessSelected" data-moduleid="10_mainModuleChk" data-submoduleid="21_subModuleChk" id="73_updateChk" onclick="checkAccess(this);" value="77#View" checked="">
									<label class="custom-control-label" for="73_updateChk"></label>
								</div> -->
							</td>



							<td>
							    <!-- <div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 10_mainModuleChk 21_subModuleChk accessSelected" data-moduleid="10_mainModuleChk" data-submoduleid="21_subModuleChk" id="74_new_deleteChk" onclick="checkAccess(this);" value="77#View" checked="">
									<label class="custom-control-label" for="74_new_deleteChk"></label>
								</div> -->
							</td>








						</tr>
						<tr>
							<td rowspan="2">
								<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input" id="11_mainModuleChk" onclick="checkSubmodules(this);" checked="">
									<label class="custom-control-label" for="11_mainModuleChk">In Conversation with Expert</label>
								</div>
							</td>


							<td>
							<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 11_mainModuleChk" data-moduleid="11_mainModuleChk" data-submoduleid="22_subModuleChk" id="22_subModuleChk" onclick="checkSubmodules(this);" checked="">
									<label class="custom-control-label" for="22_subModuleChk">In Conversation with Expert</label>
								</div>
							</td>


							<td>
								<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 11_mainModuleChk 22_subModuleChk accessSelected" data-moduleid="11_mainModuleChk" data-submoduleid="22_subModuleChk" id="75_viewChk" onclick="checkAccess(this);" value="73#View" checked="">
									<label class="custom-control-label" for="75_viewChk"></label>
								</div>
							</td>


							<td>
							    <div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 11_mainModuleChk 22_subModuleChk accessSelected" data-moduleid="11_mainModuleChk" data-submoduleid="22_subModuleChk" id="76_new_addChk" onclick="checkAccess(this);" value="73#View" checked="">
									<label class="custom-control-label" for="76_new_addChk"></label>
								</div>
							</td>



							<td>
							    <div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 11_mainModuleChk 22_subModuleChk accessSelected" data-moduleid="11_mainModuleChk" data-submoduleid="22_subModuleChk" id="77_updateChk" onclick="checkAccess(this);" value="73#View" checked="">
									<label class="custom-control-label" for="77_updateChk"></label>
								</div>
							</td>



							<td>
							<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 11_mainModuleChk 22_subModuleChk accessSelected" data-moduleid="11_mainModuleChk" data-submoduleid="22_subModuleChk" id="78_deleteChk" onclick="checkAccess(this);" value="73#View" checked="">
									<label class="custom-control-label" for="78_deleteChk"></label>
								</div>
							</td>








						</tr>


						<tr>


							<td>
								<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 11_mainModuleChk" data-moduleid="11_mainModuleChk" data-submoduleid="23_subModuleChk" id="23_subModuleChk" onclick="checkSubmodules(this);" checked="">
									<label class="custom-control-label" for="23_subModuleChk">In Conversation with Expert Archives</label>
								</div>
							</td>


							<td>
								<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 11_mainModuleChk 23_subModuleChk accessSelected" data-moduleid="11_mainModuleChk" data-submoduleid="23_subModuleChk" id="79_viewChk" onclick="checkAccess(this);" value="74#View" checked="">
									<label class="custom-control-label" for="79_viewChk"></label>
								</div>
							</td>



							<td>
								<!-- <div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 11_mainModuleChk 23_subModuleChk accessSelected" data-moduleid="11_mainModuleChk" data-submoduleid="23_subModuleChk" id="80_addChk" onclick="checkAccess(this);" value="74#Add" checked="">
									<label class="custom-control-label" for="80_addChk"></label>
								</div> -->
							</td>



							<td>
								<!-- <div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 11_mainModuleChk 23_subModuleChk accessSelected" data-moduleid="11_mainModuleChk" data-submoduleid="23_subModuleChk" id="81_updateChk" onclick="checkAccess(this);" value="74#Update" checked="">
									<label class="custom-control-label" for="81_updateChk"></label>
								</div> -->
							</td>



							<td>
								<!-- <div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 11_mainModuleChk 23_subModuleChk accessSelected" data-moduleid="11_mainModuleChk" data-submoduleid="23_subModuleChk" id="82_deleteChk" onclick="checkAccess(this);" value="74#Delete" checked="">
									<label class="custom-control-label" for="82_deleteChk"></label>
								</div> -->
							</td>
                        </tr>
						<tr>
							<td>
								<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input" id="12_mainModuleChk" onclick="checkSubmodules(this);" checked="">
									<label class="custom-control-label" for="12_mainModuleChk">Banner Image world of standard</label>
								</div>
							</td>


							<td>
							<!-- <div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 12_mainModuleChk" data-moduleid="12_mainModuleChk" data-submoduleid="24_subModuleChk" id="24_subModuleChk" onclick="checkSubmodules(this);" checked="">
									<label class="custom-control-label" for="24_subModuleChk">In Conversation with Expert</label>
								</div> -->
							</td>


							<td>
								<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 12_mainModuleChk 24_subModuleChk accessSelected" data-moduleid="12_mainModuleChk" data-submoduleid="24_subModuleChk" id="83_viewChk" onclick="checkAccess(this);" value="73#View" checked="">
									<label class="custom-control-label" for="83_viewChk"></label>
								</div>
							</td>


							<td>
							    <div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 12_mainModuleChk 24_subModuleChk accessSelected" data-moduleid="12_mainModuleChk" data-submoduleid="24_subModuleChk" id="84_addChk" onclick="checkAccess(this);" value="73#View" checked="">
									<label class="custom-control-label" for="84_addChk"></label>
								</div>
							</td>



							<td>
							    <div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 12_mainModuleChk 24_subModuleChk accessSelected" data-moduleid="12_mainModuleChk" data-submoduleid="24_subModuleChk" id="85_updateChk" onclick="checkAccess(this);" value="73#View" checked="">
									<label class="custom-control-label" for="85_updateChk"></label>
								</div>
							</td>



							<td>
							<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input 12_mainModuleChk 24_subModuleChk accessSelected" data-moduleid="12_mainModuleChk" data-submoduleid="24_subModuleChk" id="86_deleteChk" onclick="checkAccess(this);" value="73#View" checked="">
									<label class="custom-control-label" for="86_deleteChk"></label>
								</div>
							</td>
                        </tr>


                    </tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<!-- /.container-fluid -->
<div class="col-md-12 submit_btn p-3">
	<a class="btn btn-primary btn-sm text-white" onclick="location.href='<?php echo base_url(); ?>admin/cmsManagenent_dashboard'">Back</a>
</div>
</div>
<script>

$(document).ready(function() { 
	$('input[type=checkbox]').removeAttr('checked');
    	});

	function checkSubmodules(module) {
		var moduleId = $(module).attr('id');
		// alert(moduleId);
		// alert($(module).data('moduleid'));
		var mainModuleId = $(module).data('moduleid');
		// alert(mainModuleId);


		if (module.checked) {

			$('.' + moduleId).each(function() {
				this.checked = true;
				checkAllAccess(this);
			});
			$('#' + mainModuleId).prop('checked', true);

		} else {
			//alert($('.'+mainModuleId+':checkbox:checked').length);

			$('.' + moduleId).each(function() {
				this.checked = false;
				checkAllAccess(this);
			});

			if ($('.' + mainModuleId + ':checkbox:checked').length == 0) {

				$('#' + mainModuleId).prop('checked', false);
			}
		}

	}

	function checkAllAccess(module) {
		var moduleId = $(module).attr('id')
		if (module.checked) {
			$('.' + moduleId).each(function() {
				this.checked = true;
			});
		} else {
			$('.' + moduleId).each(function() {
				this.checked = false;
			});
		}

	}

	function checkAccess(module) {
		var mainModuleId = $(module).data('moduleid');
		var subModuleId = $(module).data('submoduleid');
		if (module.checked) {
			$('#' + mainModuleId).prop('checked', true);
			$('#' + subModuleId).prop('checked', true);
		} else {

			//1_mainModuleChk 27_subModuleChk

			//if($('.'+mainModuleId+':checkbox:checked').length==0)

			if ($('.' + subModuleId + ':checkbox:checked').length == 0) {
				$('#' + subModuleId).prop('checked', false);
				if ($('.' + mainModuleId + ':checkbox:checked').length == 0) {
					$('#' + mainModuleId).prop('checked', false);
				}


			}



		}

	}
</script>