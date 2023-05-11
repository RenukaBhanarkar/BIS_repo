    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Task Under Review</h1>
            <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url().'Admin/dashboard';?>" >Sub Admin Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'admin/exchange_forum';?>" >Exchange Forum</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'quiz/organizing_quiz';?>" >Competition</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'Standardswritting/standard_writting_dashboard';?>" >Standard Writting</a></li>
                <li class="breadcrumb-item active" aria-current="page">Task Under Review</li>
                
                </ol>
            </nav>
        </div>

        <!-- Content Row -->
       <div class="row">
            <div class="col-12 mt-3">
                <div class="card border-top card-body table-responsive">
                    <table id="example" class="table-bordered nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <!-- <th><input class="form-control-input" type="checkbox" value="" id="flexCheckDefault"></th> -->
                                <th>Sr. No.</th>
                                <th>ID</th>
                                <th>Description</th>
                                <th>PDF</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Name Of Evaluator</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                           <tr>
                              <!-- <td><input class="form-control-input" type="checkbox" value="" id="flexCheckDefault"></td> -->
                              <td>1</td>
                              <td>12346</td>
                              <td>XYZ</td>
                              <td><img src="<?php echo base_url(); ?>/assets/admin/img/pdf.png" alt="#" class="" width="5%"></td>
                              <td><img src="<?= base_url();?>" alt="#" class="" width="10%"></td>
                              <td>Pending</td>
                              <td>XYZ</td>
                              <td class="d-flex">
                                 <a href="<?php echo base_url(); ?>standardswritting/view_standards" class="btn btn-primary btn-sm mr-2" >View Details</a>
                              </td>

                        </tbody>
                    </table>
                </div>
            </div>
                <div class="col-md-12 submit_btn p-3">
                    <a href="<?php echo base_url(); ?>" class="btn btn-primary btn-sm text-white" >Back</a>
                </div>
        </div>
    </div>
    <!-- /.container-fluid -->
