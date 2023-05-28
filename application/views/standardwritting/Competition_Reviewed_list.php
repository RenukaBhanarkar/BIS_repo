    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Competition Reviewed</h1>
            <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url().'Admin/dashboard';?>" >Sub Admin Dashboard</a></li>
            <li class="breadcrumb-item"><a href="<?php echo base_url().'Admin/dashboard';?>" >Sub Admin Dashboard</a></li>
                 <li class="breadcrumb-item"><a href="<?php echo base_url().'admin/exchange_forum';?>" >Exchange Forum</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'quiz/organizing_quiz';?>" >Competition</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'Standardswritting/standard_offline_dashboard';?>" >Standard Writting</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'Standardswritting/standard_online_dashboard';?>" >Standard Writting Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'Standardswritting/review_management_dashboard';?>" >Review Competition Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Competition Reviewed</li>
                
                </ol>
            </nav>
        </div>

        <!-- Content Row -->
       <div class="row">
            <div class="col-12 mt-3">
                <div class="card border-top card-body ">
                    <table id="example" class="table-bordered nowrap table-responsive" style="width:100%">
                        <thead>
                        <tr>
                                <th>Sr. No.</th>
                                <th>Competition ID</th>
                                <th>Title of Competition</th>
                                <th>Start Date</th>
                                <th>Start Time</th>
                                <th>End Date</th>
                                <th>End Time</th>
                                <th>Banner</th>
                                <th>Available for</th>
                                <th>Level of Competition</th>
                                <th>Total Task</th>
                                <th>Task Under Review</th>
                                <th>Task Reviewed</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                           <tr>
                              <td>1</td>
                              <td>12345</td>
                              <td>Standard Competition</td>
                              <td>12/03/2023</td>
                              <td>12:00:00</td>
                              <td>12/03/2023</td>
                              <td>12:00:00</td>
                              <td><img src="#" alt="#" class="" width="10%"></td>
                              <td>Available</td>
                              <td>Level of Competition</td>
                              <td>Pending</td>
                              <td>Review</td>
                              <td>task Reviewed</td>
                              <td>Pending</td>
                              <td class="d-flex">
                                 <a href="<?php echo base_url(); ?>Standardswritting/standard_submission_competition" class="btn btn-primary btn-sm mr-2" >View Submission</a>
                                 <a href="<?php echo base_url(); ?>Standardswritting/assign_review/" class="btn btn-primary btn-sm mr-2" >View Details</a>
                                 
                              </td>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

    