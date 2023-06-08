<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Result Declared List</h1>
            <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url().'Admin/dashboard';?>" >Sub Admin Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'admin/exchange_forum';?>" >Exchange Forum</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'quiz/organizing_quiz';?>" >Competition</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'Standardswritting/standard_offline_dashboard';?>" >Standard Writting Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'Standardswritting/standard_online_dashboard';?>" >Standard Writting</a></li>
                <li class="breadcrumb-item active" aria-current="page">Result Declared List</li>
                
                </ol>
            </nav>
        
    </div>
    
    
    <!-- Content Row -->
    
    <div class="row">
        <div class="col-12 mt-3">
            <div class="card border-top card-body ">
                <table id="example" class="table-bordered display nowrap table-responsive" style="width:100%">
                    <thead>
                        <tr>                            
                            <th>Sr. No.</th>
                            <th>Name of Competition</th>
                            <th>Competition ID</th>
                            <th>Competition Date</th>
                            <th>Total Marks</th>
                            <th>Total Submission</th>
                            <th>Total Winners</th>
                            <th>Declared on</th>
                            <th>Action</th>                        
                            
                        </tr>
                    </thead>
                   
                    <tbody>
                        
                        <tr>
                            <td>1</td>
                            <td>title</td>
                            <td>1234</td>
                            <td>12/03/2023</td>
                            <td>100</td>
                            <td>10</td>
                            <td>9</td>
                            <td>12/03/2023 12:00:00</td>
                            <td>
                           
                                <a href="<?php echo base_url();?>standardswritting/result_declared_view" class="btn btn-primary btn-sm mr-2">View</a>
                            

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