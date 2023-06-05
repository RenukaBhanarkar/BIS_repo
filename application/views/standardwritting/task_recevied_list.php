    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Task Recevied for Review</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url().'Admin/dashboard';?>" >Admin Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Task Recevied for Review</li>
                
                </ol>
            </nav>
        </div>

        <!-- Content Row -->
       <div class="row">
            <div class="col-12 mt-3">
                <div class="card border-top card-body ">
                    <table id="example" class="table-bordered table-responsive nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>Sr. No.</th>
                                <th>Competition Id</th>
                                <th>Title of Competition</th>
                                <th>Submission Id</th>
                                <th>Class</th>
                                <th>Submission Date & Time</th>
                                <th>Name of Evaluator</th>
                                <th>Total Marks</th>
                                <th>Score</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                              <td>1</td>
                              <td>12345</td>
                              <td>Name of Competition</td>
                              <td>3660</td>
                              <td>Class Standard</td>
                              <td>12/03/2023 12:00:00</td>
                              <td>Name of Evaluator</td>
                              <td>100</td>
                              <td>90</td>
                              <td>Pending</td>
                              <td class="d-flex">
                                 <a href="<?php echo base_url(); ?>standardswritting/task_recevied_reviewed" class="btn btn-success btn-sm mr-2" title="View">Review</a>
                                 <a href="<?php echo base_url(); ?>standardswritting/task_recevied_view" class="btn btn-primary btn-sm mr-2" title="View">View</a>
                              </td>
                           </tr> 
                         
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
 