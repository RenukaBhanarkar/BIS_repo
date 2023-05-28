    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Log & Self Audit Report</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url().'Admin/Dashboard';?>" >Super Admin Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo base_url().'admin/log_dashboard';?>" >Log Report</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Log & Self Audit Report</li>
                </ol>
            </nav>
        </div>

       <div class="row">
                
            <div class="col-12 mt-3">
                <div class="card border-top card-body table-responsive">
                    <!-- <div class="row">
                            
                            <div class="mb-2 col-md-4">
                                <label class="d-block text-font">User</label>
                                <input type="text" class="form-control input-font" name="Username_new" id="Username_new" placeholder="Enter Username">
                            </div>
                            <div class="mb-2 col-md-4">
                                <label class="d-block text-font">Date</label>
                                <input type="date" class="form-control input-font" name="banner_caption" id="banner_caption" placeholder="Enter discussion Title" value="" required="">
                            </div>
                    </div> -->
                            <hr>
                    <table id="example" class="hover table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Sr. No.</th>
                                <th>Module</th>
                                <th>User Role</th>
                                <th>Name</th>
                                <th>DateStamp</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                          
                           <?php $j=1; 
                                 foreach ($allRecords as $row) { 
                               
                                ?>
                                 <tr>
                                <td><?= $j ?></td>
                                <td><?= $row['module_name'];?></td>
                                <td><?= $row['role'];?></td>
                                <td><?= $row['name'];?></td>
                                <td><?= $row['created_on'];?></td>
                                <td><?= $row['action_name'];?></td>
                             
                           </tr>
                           <?Php $j++;} ?> 
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
 <!-- </body> -->
                                
                                  
                                    