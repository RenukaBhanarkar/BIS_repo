<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Legal List</h1>
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
            aria-label="breadcrumb">
            <ol class="breadcrumb">
           
                    <li class="breadcrumb-item"><a href="<?php echo base_url().'admin/dashboard';?>" >Admin Dashboard</a></li>
              
  <li class="breadcrumb-item active" aria-current="page"><a href="<?php echo base_url().'admin/exchange_forum';?>" >Exchange Forum</a></li>
  <li class="breadcrumb-item active" aria-current="page"><a href="<?php echo base_url().'admin/cmsManagenent_dashboard';?>" >CMS</a></li>
  <li class="breadcrumb-item active" aria-current="page"><a href="<?php echo base_url().'admin/footer_links';?>" >Footer Link</a></li>
  <li class="breadcrumb-item active" aria-current="page"><a href="<?php echo base_url().'subadmin/legal';?>" >Legal</a></li>
            </ol>
        </nav>

    </div>


    <!-- Content Row -->

    
    <!-- /.container-fluid -->

    <div class="col-12">
        
        <?php
        if ($this->session->flashdata('MSG')) {
            echo $this->session->flashdata('MSG');
        }
        ?>
        <div class="row">
            <div class="col-12 mt-3">
                <div class="card border-top card-body">
                    <form action="javascript:;" class="was-validated" method="post" id="updateform" >
                    <div class="form-group">
                    <table id="example" class="table table-bordered display nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th class="text-center"> </th>
                                                                
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td>
                                    <label for="validationTextarea" class="d-block text-font" >Terms & Condition</label><br>
                                    <textarea class="form-control" id="terms_condition" rows="3" name="terms_condition" required="" minlength="5" maxlength="10"><?php echo $legal['tc']; ?></textarea>
                                    <!-- <span class="error" id="err_terms_condition"></span> -->
                                    <span class="error_text" id="err_terms_condition" style="color:red;"></span>
                                </td>                                
                            </tr>
                            <tr>
                                <td>
                                    <label class="d-block text-font">Privacy Policy</label><br>
                                    <textarea class="form-control" id="privacy_policy" rows="3" name="privacy_policy"><?php echo $legal['policy_p']; ?></textarea>
                                    <span class="error_text" id="err_privacy_policy" style="color:red;"></span>
                                </td>                                
                            </tr>
                            <tr>
                                <td>
                                    <label>Hyper Linking Policy</label><br>
                                    <textarea class="form-control" id="hlp" rows="3" name="hyper_linking_policy"><?php echo $legal['hlp']; ?></textarea>
                                    <span class="error_text" id="err_hlp" style="color:red;"></span>
                                </td>                                
                            </tr>
                            <tr>
                                <td>
                                    <label>Disclalmer</label><br>
                                    <textarea class="form-control" id="disclamer" rows="3" name="disclamer"><?php echo $legal['disclamer']; ?></textarea>
                                    <span class="error_text" id="err_disclamer" style="color:red;"></span>
                                </td>                                
                            </tr>
                            <tr>
                                <td>
                                    <label>Copyright Policy</label><br>
                                    <textarea class="form-control" id="copyright_policy" rows="3" name="copyright_policy"><?php echo $legal['copyright_policy']; ?></textarea>
                                    <span class="error_text" id="err_copyright_policy" style="color:red;"></span>
                                </td>                                
                            </tr>
                            <tr>
                                <td>
                                    <label>Website Content Contribution , Moderation $ Approval Policy (CMAP)</label><br>
                                    <textarea class="form-control" id="cmap" rows="3" name="cmap"><?php echo $legal['cmap']; ?></textarea>
                                    <span class="error_text" id="err_cmap" style="color:red;"></span>
                                </td>                                
                            </tr>
                            <tr>
                                <td>
                                    <label>Content Archival Policy (CAP)</label><br>
                                    <textarea class="form-control" id="cap" rows="3" name="cap"><?php echo $legal['cap']; ?></textarea>
                                    <span class="error_text" id="err_cap" style="color:red;"></span>
                                </td>                                
                            </tr>
                            <tr>
                                <td>
                                    <label>Content Review Policy (CRP)</label><br>
                                    <textarea class="form-control" id="crp" rows="3" name="crp"><?php echo $legal['crp']; ?></textarea>
                                    <span class="error_text" id="err_crp" style="color:red;"></span>
                                </td>                                
                            </tr>
                            
                            
                        </tbody>
                        <tr>
                                <td>
                                   
                                    
                                   
                                    <button class="btn btn-danger btn-sm text-white mb-2 cancel">Cancel</button>
                                </td>
                            </tr>
    </div>
                    </table>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

<script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
<script>
                        CKEDITOR.replace( 'terms_condition' );
                        CKEDITOR.replace( 'privacy_policy' );
                        CKEDITOR.replace( 'hlp' );
                        CKEDITOR.replace( 'disclamer' );
                        CKEDITOR.replace( 'copyright_policy' );
                        CKEDITOR.replace( 'cmap' );
                        CKEDITOR.replace( 'cap' );
                        CKEDITOR.replace( 'crp' );

$('.cancel').on('click',function(){
    Swal.fire({
                    title: 'Are you sure you want to Cancel?',
                    showDenyButton: true,
                    showCancelButton: false,
                    confirmButtonText: 'Cancel',
                    denyButtonText: `Close`,
                    }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {                       
                        window.location.replace('<?php echo base_url().'admin/footer_links' ?>');
                      
                       // Swal.fire('Saved!', '', 'success')                                
                    } else if (result.isDenied) {
                        // Swal.fire('Changes are not saved', '', 'info')
                    }
                    })
});
</script>

<!-- End of Main Content -->
