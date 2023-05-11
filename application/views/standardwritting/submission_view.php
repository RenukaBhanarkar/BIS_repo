    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">View Submission</h1>
            <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url().'Admin/dashboard';?>" >Sub Admin Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'admin/exchange_forum';?>" >Exchange Forum</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'quiz/organizing_quiz';?>" >Competition</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'Standardswritting/standard_writting_dashboard';?>" >Standard Writting</a></li>
                <li class="breadcrumb-item active" aria-current="page">View Submission</li>
                
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
                                <th>Sr. No.</th>
                                <th>Name</th>
                                <th>ID</th>
                                <th>Email</th>
                                <th>Contact</th>
                                <th>Date & Time</th>
                                <th>PDF</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                           <tr>
                              <td>1</td>
                              <td>Anis</td>
                              <td>12345</td>
                              <td>example123@gmaim.com</td>
                              <td>7057085889</td>
                              <td>12/03/2023 12:00:00</td>
                              <td><img src="<?php echo base_url(); ?>/assets/admin/img/pdf.png" alt="#" class="" width="10%"></td>
                              <td><img src="<?= base_url();?>" alt="#" class="" width="10%"></td>
                              <td class="d-flex">
                                 <a href="<?php echo base_url(); ?>standardswritting/view_standards" class="btn btn-primary btn-sm mr-2" >View</a>
                              </td>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
