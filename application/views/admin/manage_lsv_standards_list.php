    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Manage session/Post</h1>
            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Manage session/Post</li>
                </ol>
            </nav>
        </div>
<div class="row" style="padding: 10px;">
	<div class="card p-3 shadow">
		<nav>
			<div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
				<button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">New Requests</button>
				<button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Approved Requests</button>

				<button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Rejected Requests</button>

                 <button class="nav-link" id="nav-published-tab" data-bs-toggle="tab" data-bs-target="#nav-published" type="button" role="tab" aria-controls="nav-published" aria-selected="false">Published Requests</button>

                 <button class="nav-link" id="nav-archived-tab" data-bs-toggle="tab" data-bs-target="#nav-archived" type="button" role="tab" aria-controls="nav-archived" aria-selected="false">Archived Requests</button>

                
			</div>
		</nav>
		<div class="tab-content p-3 border bg-light" id="nav-tabContent">
			<div class="tab-pane fade active show" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
            <div class="col-12 mt-3">
                <div class="card border-top card-body table-responsive text-nowrap">
                    <table id="example" class="hover table-bordered" style="width:100%">
                        <thead>
                        <tr>
                                <th>Sr. No.</th>
                                <th>Title</th>
                                <th>Type of Post</th>
                                <th>Created on</th>
                                <th>Likes</th>
                                <th>Views/Joined</th>
                                <th>Status</th> 
                                <th>Last Updated</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody> 
                            <?php foreach ($newRequest as $key => $value) {?>
                                <tr>
                                    <td><?= $key+1?></td>
                                    <td><?= $value['title']?></td>
                                    <td>
                                    <?php 
                                        if ($value['type_of_post']==1) {  $data='Text Upload'; }
                                        if ($value['type_of_post']==2) { $data='Video Upload'; }
                                        if ($value['type_of_post']==3) { $data='Live session link'; }
                                        ?> <?= $data?>
                                    </td> 
                                  <td><?= date("m-d-Y", strtotime($value['created_on']));?></td>
                                  <td><?= $value['likes']?></td>
                                  <td><?= $value['views']?></td>
                                  <td>Send For Approval</td>
                                  <td><?= date("m-d-Y", strtotime($value['updated_on']));?></td>
                                  <td><a href="lsv_standards_view/<?= encryptids("E",$value['id']);;?>" class="btn btn-primary btn-sm mr-2" title="View">Approva / Reject</a></td>
                              </tr>
                          <?php }?>
                         
                        </tbody>
                    </table>
                </div>
            </div>
			</div>
			<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
            <div class="col-12 mt-3">
                <div class="card border-top card-body table-responsive text-nowrap">
                    <table id="example_1" class="hover table-bordered" style="width:100%">
                        <thead>
                        <tr>
                                <th>Sr. No.</th>
                                <th>Title</th>
                                <th>Type of Post</th>
                                <th>Created on</th>
                                <th>Likes</th>
                                <th>Views/Joined</th>
                                <th>Status</th> 
                                <th>Last Updated</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($ApprovedRequest as $key => $value)  { ?>
                                <tr>
                                    <td><?= $key+1?></td>
                                    <td><?= $value['title']?></td>
                                    <td>
                                    <?php 
                                        if ($value['type_of_post']==1) {  $data='Text Upload'; }
                                        if ($value['type_of_post']==2) { $data='Video Upload'; }
                                        if ($value['type_of_post']==3) { $data='Live session link'; }
                                        ?> <?= $data?>
                                    </td> 
                                  <td><?= date("m-d-Y", strtotime($value['created_on']));?></td>
                                  <td><?= $value['likes']?></td>
                                  <td><?= $value['views']?></td>
                                  <td>Approved</td>
                                  <td><?= date("m-d-Y", strtotime($value['updated_on']));?></td>
                                  <td><a href="lsv_standards_view/<?= encryptids("E",$value['id']);;?>" class="btn btn-primary btn-sm mr-2" title="View">View</a></td>
                              </tr>
                          <?php }?>

                        </tbody>
                    </table>
                </div>
            </div>
			</div>
			<div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
            <div class="col-12 mt-3">
                <div class="card border-top card-body table-responsive text-nowrap">
                    <table id="example_2" class="hover table-bordered" style="width:100%">
                        <thead>
                        <tr>
                                <th>Sr. No.</th>
                                <th>Title</th>
                                <th>Type of Post</th>
                                <th>Created on</th>
                                <th>Likes</th>
                                <th>Views/Joined</th>
                                <th>Status</th>
                                <th>Reason of Rejection</th>
                                <th>Last Updated</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($RejectedRequest as $key => $value) {?>
                                <tr>
                                    <td><?= $key+1?></td>
                                    <td><?= $value['title']?></td>
                                    <td>
                                    <?php 
                                        if ($value['type_of_post']==1) {  $data='Text Upload'; }
                                        if ($value['type_of_post']==2) { $data='Video Upload'; }
                                        if ($value['type_of_post']==3) { $data='Live session link'; }
                                        ?> <?= $data?>
                                    </td> 
                                  <td><?= date("m-d-Y", strtotime($value['created_on']));?></td>
                                  <td><?= $value['likes']?></td>
                                  <td><?= $value['views']?></td>
                                  <td>Rejected</td>
                                  <td><?= $value['reason']?></td>
                                  <td><?= date("m-d-Y", strtotime($value['updated_on']));?></td>
                                  <td> <a href="lsv_standards_view/<?= encryptids("E",$value['id']);;?>" class="btn btn-primary btn-sm mr-2" title="View">View</a></td>
                              </tr>
                          <?php }?>

                        </tbody>
                    </table>
                </div>
            </div>
			</div>
<!-- start -->
            <div class="tab-pane fade" id="nav-published" role="tabpanel" aria-labelledby="nav-published-tab">
            <div class="col-12 mt-3">
                <div class="card border-top card-body table-responsive text-nowrap">
                    <table id="example_3" class="hover table-bordered" style="width:100%">
                        <thead>
                        <tr>
                                <th>Sr. No.</th>
                                <th>Title</th>
                                <th>Type of Post</th>
                                <th>Created on</th>
                                <th>Likes</th>
                                <th>Views/Joined</th>
                                <th>Status</th>
                                <th>Reason of Rejection</th>
                                <th>Last Updated</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($PublishedRequest as $key => $value) {?>
                                <tr>
                                    <td><?= $key+1?></td>
                                    <td><?= $value['title']?></td>
                                    <td>
                                    <?php 
                                        if ($value['type_of_post']==1) {  $data='Text Upload'; }
                                        if ($value['type_of_post']==2) { $data='Video Upload'; }
                                        if ($value['type_of_post']==3) { $data='Live session link'; }
                                        ?> <?= $data?>
                                    </td> 
                                  <td><?= date("m-d-Y", strtotime($value['created_on']));?></td>
                                  <td><?= $value['likes']?></td>
                                  <td><?= $value['views']?></td>
                                  <td>Rejected</td>
                                  <td><?= $value['reason']?></td>
                                  <td><?= date("m-d-Y", strtotime($value['updated_on']));?></td>
                                  <td> <a href="live_session_view/<?= encryptids("E",$value['id']);;?>" class="btn btn-primary btn-sm mr-2" title="View">View</a></td>
                              </tr>
                          <?php }?>

                        </tbody>
                    </table>
                </div>
            </div>
            </div>

          <!-- end -->





          <!-- start -->
            <div class="tab-pane fade" id="nav-archived" role="tabpanel" aria-labelledby="nav-archived-tab">
            <div class="col-12 mt-3">
                <div class="card border-top card-body table-responsive text-nowrap">
                    <table id="example_4" class="hover table-bordered" style="width:100%">
                        <thead>
                        <tr>
                                <th>Sr. No.</th>
                                <th>Title</th>
                                <th>Type of Post</th>
                                <th>Created on</th>
                                <th>Likes</th>
                                <th>Views/Joined</th>
                                <th>Status</th>
                                <th>Reason of Rejection</th>
                                <th>Last Updated</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($ArchiveRequest as $key => $value) {?>
                                <tr>
                                    <td><?= $key+1?></td>
                                    <td><?= $value['title']?></td>
                                    <td>
                                    <?php 
                                        if ($value['type_of_post']==1) {  $data='Text Upload'; }
                                        if ($value['type_of_post']==2) { $data='Video Upload'; }
                                        if ($value['type_of_post']==3) { $data='Live session link'; }
                                        ?> <?= $data?>
                                    </td> 
                                  <td><?= date("m-d-Y", strtotime($value['created_on']));?></td>
                                  <td><?= $value['likes']?></td>
                                  <td><?= $value['views']?></td>
                                  <td>Rejected</td>
                                  <td><?= $value['reason']?></td>
                                  <td><?= date("m-d-Y", strtotime($value['updated_on']));?></td>
                                  <td> <a href="live_session_view/<?= encryptids("E",$value['id']);;?>" class="btn btn-primary btn-sm mr-2" title="View">View</a></td>
                              </tr>
                          <?php }?>

                        </tbody>
                    </table>
                </div>
            </div>
            </div>

          <!-- end -->
        </div>
    </div>
</div>
        <!-- Content Row -->
       
    </div>
    <!-- End of Main Content -->
 </body>
                                   
                              
<script>
    $(document).ready(function () {
    $('#example_1').DataTable();
    $('#example_2').DataTable();
    $('#example_3').DataTable();
    $('#example_4').DataTable();

    });
</script>                                    