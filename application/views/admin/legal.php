<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Legal List</h1>
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
            aria-label="breadcrumb">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url().'admin/';?>" >Home</a></li>
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
                                    <!-- <button onclick="submitButton()" class="btn btn-primary mb-2" type="submit">Submit</button>
                                    <button onclick="" class="btn btn-danger mb-2" type="submit">Submit</button> -->

                                    <button onclick="return submitButton(event)" class="btn btn-primary mb-2" type="submit">Submit</button>
                                    <!-- <button onclick="location.reload('<?php echo base_url(); ?>admin/footer_links')"  class="btn btn-danger mb-2" type="cancle">Cancle</button> -->
                                    <a href="<?php echo base_url(); ?>admin/footer_links" class="btn btn-danger mb-2">Cancle</a>
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
<div class="modal fade" id="delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Save Record</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to save?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary abcd" data-bs-dismiss="modal">Save</button>
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
// $(document).ready(function(){
//     console.log("jj");
//     $('#terms_condition').on('change',function(){
//         console.log("jj");
//         var terms_condition = $('#terms_condition').val();
//         if (terms_condition == "") {
//                  $("#err_terms_condition").text("This value is required");
//                  $("#terms_condition").focus();
//                  is_valid = false;             
//              }
//     });
// });

function submitButton(event) {
    event.preventDefault();
    // CKEDITOR.instances[**fieldname**].setData(**your data**)
    var terms_condition = CKEDITOR.instances['terms_condition'].getData();
    var copyright_policy = CKEDITOR.instances['copyright_policy'].getData();
    var hlp = CKEDITOR.instances['hlp'].getData();
    var privacy_policy = CKEDITOR.instances['privacy_policy'].getData();
    var disclamer = CKEDITOR.instances['disclamer'].getData();
    var cmap = CKEDITOR.instances['cmap'].getData();
    var cap = CKEDITOR.instances['cap'].getData();
    var crp = CKEDITOR.instances['crp'].getData();



            //  var terms_condition = $("#terms_condition").val();
            //  var privacy_policy= $("#privacy_policy").val();
            //  var hlp= $("#hlp").val();
            //  var disclamer= $("#disclamer").val();
            //  var copyright_policy= $("#copyright_policy").val();
            //  var cmap= $("#cmap").val();
            //  var cap= $("#cap").val();
            //  var crp= $("#crp").val();


             var is_valid = true;
             
                        
             if (terms_condition == "") {
                 $("#err_terms_condition").text("This value is required");
                 $("#terms_condition").focus();
                 is_valid = false;             
             } else if(privacy_policy == ""){
                $("#err_privacy_policy").text("This value is required");
                 $("#privacy_policy").focus();
                 is_valid = false;  
             } else if(hlp == ""){
                $("#err_hlp").text("This value is required");
                 $("#hlp").focus();
                 is_valid = false;  
             }else if(disclamer == ""){
                $("#err_disclamer").text("This value is required");
                 $("#disclamer").focus();
                 is_valid = false;  
             }else if(copyright_policy == ""){
                $("#err_copyright_policy").text("This value is required");
                 $("#copyright_policy").focus();
                 is_valid = false;  
             }else if(cmap == ""){
                $("#err_cmap").text("This value is required");
                 $("#cmap").focus();
                 is_valid = false;  
             }else if(cap == ""){
                $("#err_cap").text("This value is required");
                 $("#cap").focus();
                 is_valid = false;  
             }else if(crp == ""){
                $("#err_crp").text("This value is required");
                 $("#crp").focus();
                 is_valid = false;  
             }
             
             
            //  $('#delete').modal('show');
            //  $('.abcd').on('click', function() {
                    
            //       $('#updateform').attr('action','<?php echo base_url(); ?>subadmin/update_legal'); 
                
            //     });

             if (is_valid) {
                $('#updateform').attr('action','<?php echo base_url(); ?>subadmin/update_legal');  
                Swal.fire({
                    title: 'Are you sure you want to Submit ?',
                    showDenyButton: true,
                    showCancelButton: false,
                    confirmButtonText: 'Submit',
                    denyButtonText: `Cancel`,
                    }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {   
                        // $('#updateform').attr('action','<?php echo base_url(); ?>subadmin/update_legal'); 
                        $('#updateform').submit();
                return true; 
                        // $.ajax({
                        //     //  type: 'POST',
                        //     url: '<?php echo base_url(); ?>admin/archive_feedback/'+id,
                        //     // data: {
                        //     //     que_id: id,
                        //     // },
                        //     success: function(result) {
                        //         Swal.fire("Record Archived Successfully.");
                        //         location.reload();
                        //     },
                        //     error: function(result) {
                        //         alert("Error,Please try again.");
                        //     }
                        // });
                        Swal.fire('Saved!', '', 'success')                                
                    } else if (result.isDenied) {
                        // Swal.fire('Changes are not saved', '', 'info')
                    }
                    })
              
                
             } else {
                 return false;
             }
         };
                
           
</script>
<!-- End of Main Content -->
