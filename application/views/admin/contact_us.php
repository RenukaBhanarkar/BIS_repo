<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Contact Us</h1>
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url().'admin/';?>" >Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="<?php echo base_url().'admin/exchange_forum';?>" >Exchange Forum</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="<?php echo base_url().'admin/cmsManagenent_dashboard';?>" >CMS</a></li>
            </ol>
        </nav>

    </div>


    <!-- Content Row -->

    <div class="col-12">
    <?php if (encryptids("D", $_SESSION['admin_type']) == 3) {   ?>
        <?php  if(count($contact_us) < 1){?> 
        <div class="card border-top card-body">
            <div>
                
                <button type="button" class="btn btn-primary btn-sm mr-2" data-toggle="modal" data-target="#newform">Add Contact Us Details</button>
             
                <form id="add_admin" action="<?php echo base_url(); ?>admin/add_contact_us" method="post" enctype="multipart/form-data" class="was-validated">
                    <div class="modal fade " id="newform" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add Contact Us Details</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="mb-2 col-md-4">
                                            <label class="d-block text-font">Contact Number<sup class="text-danger">*</sup></label>
                                            <input type="text" class="form-control input-font" name="contact_no" id="contact" required="" minlength="10" maxlength="100" value="">
                                            <span class="error_text">
                                                <?php //echo form_error('title'); 
                                                ?>
                                            </span>
                                            <div class="invalid-feedback">
                                            Character length should be 6 to 50
                                            </div>
                                        </div>
                                        <div class="mb-2 col-md-4">
                                            <label class="d-block text-font">Address<sup class="text-danger">*</sup></label>
                                            <input type="text" class="form-control input-font" name="address" id="address" required="" minlength="10" maxlength="100" value="">
                                            <span class="error_text">
                                                <?php //echo form_error('title'); 
                                                ?>
                                            </span>
                                            <div class="invalid-feedback">
                                            Character length should be 6 to 100
                                            </div>
                                        </div>
                                        <div class="mb-2 col-md-4">
                                            <label class="d-block text-font">TELE FAX<sup class="text-danger">*</sup></label>
                                            <input type="text" class="form-control input-font" name="tele_tax" id="tele_fax" required="" minlength="6" maxlength="20" value="">
                                            <span class="error_text">
                                                <?php //echo form_error('title'); 
                                                ?>
                                            </span>
                                            <div class="invalid-feedback">
                                            Enter prpoer detail
                                            </div>
                                        </div>
                                        <div class="mb-2 col-md-4">
                                            <label class="d-block text-font">Email<sup class="text-danger">*</sup></label>
                                            <input type="email" class="form-control input-font" name="email" id="email" required="">
                                            <span class="error_text">
                                                <?php //echo form_error('title'); 
                                                ?>
                                            </span>
                                            <div class="invalid-feedback">
                                            Enter Valid email address
                                            </div>
                                        </div>
                                        
                                        <!-- <div class="mb-2 col-md-4">
                                            <label class="d-block text-font">Location URL</label>
                                            <input type="text" class="form-control input-font" name="location_url" id="">
                                            <span class="error_text">
                                                <?php //echo form_error('title'); 
                                                ?>
                                            </span>
                                        </div> -->
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                        <button onclick="return addContact(event)" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>
        <?php  } ?>
        <?php } ?>
        <?php
        if ($this->session->flashdata('MSG')) {
            echo $this->session->flashdata('MSG');
        }
        ?>
        <div class="row">
            <div class="col-12 mt-3">
                <div class="card border-top card-body table-responsive">
                    <table id="example" class="table table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Sr. No.</th>
                                <th>Contact no.</th>
                                <th>Address</th>
                                <th>TELE FAX</th>
                                <th>Email</th>
                                <!-- <th>Location URL</th> -->
                                <?php if (encryptids("D", $_SESSION['admin_type']) == 3) {   ?>
                                <th>Action</th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($contact_us)) {
                                $i = 1;
                                foreach ($contact_us as $list_contact) { ?>
                                    <tr>
                                        <td><?php echo $i++; ?></td>
                                        <td><?php echo $list_contact['contact_no']; ?></td>
                                        <td><?php echo $list_contact['address']; ?></td>
                                        <td><?php echo $list_contact['tele_fax']; ?></td>
                                        <td><?php echo $list_contact['email']; ?></td>
                                        <!-- <td style="word-break: break-all;"><?php echo $list_contact['location']; ?></td> -->
                                        <?php if (encryptids("D", $_SESSION['admin_type']) == 3) {   ?>
                                        <td class="d-flex border-bottom-0">
                                        
                                            <button onclick="edit('<?php echo $list_contact['id']; ?>')" class="btn btn-info btn-sm mr-2 text-white" data-toggle="modal" data-target="#editform">Edit</button>
                                            <!-- <button onClick="" class="btn btn-danger btn-sm mr-2"><i class="fa fa-trash" aria-hidden="true"></i></button> -->
                                            <button onclick="deleteContactus(' <?php echo $list_contact['id']; ?> ');" data-id='<?php echo $list_contact['id']; ?>' class="btn btn-danger btn-sm mr-2 delete_img">Delete</button>

                                            <div class="modal fade " id="editform" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-xl" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Update Contact Us
                                                            </h5>
                                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="javascript:;" class="was-validated" method="post" enctype="multipart/form-data" id="updateform">
                                                            <div class="row">
                                                                <div class="mb-2 col-md-4">
                                                                    <label class="d-block text-font">Contact Number<sup class="text-danger">*</sup></label>
                                                                    <input type="text" class="form-control input-font" name="contact_no" id="contact1" required="" minlength="10" maxlength="100" value="">
                                                                    <input type="hidden" class="form-control input-font" name="id" id="id1">
                                                                    <span class="error_text" id="err_contact">
                                                                        <?php //echo form_error('title'); 
                                                                        ?>
                                                                    </span>
                                                                    <div class="invalid-feedback">
                                                                        Character length should be 10 to 100
                                                                        </div>
                                                                </div>
                                                                <div class="mb-2 col-md-4">
                                                                    <label class="d-block text-font">Address<sup class="text-danger">*</sup></label>
                                                                    <input type="text" class="form-control input-font" name="address" id="address1" rows="8" maxlength="100" minlength="6" required="">
                                                                    <span class="error_text" id="err_address">
                                                                        <?php //echo form_error('title'); 
                                                                        ?>
                                                                    </span>
                                                                    <div class="invalid-feedback">
                                                                        Character length should be 6 to 100
                                                                        </div>

                                                                </div>
                                                                <div class="mb-2 col-md-4">
                                                                    <label class="d-block text-font">TELE FAX<sup class="text-danger">*</sup></label>
                                                                    <input type="text" class="form-control input-font" name="tele_tax" id="tele_fax1" maxlength="20" minlength="6" required="">
                                                                    <span class="error_text" id="err_tele">
                                                                        <?php //echo form_error('title'); 
                                                                        ?>
                                                                    </span>
                                                                    <div class="invalid-feedback">
                                                                        Enter prpoer detail
                                                                        </div>
                                                                </div>
                                                                <div class="mb-2 col-md-4">
                                                                    <label class="d-block text-font">Email<sup class="text-danger">*</sup></label>
                                                                    <input type="email" class="form-control input-font" name="email" id="email1" required>
                                                                    <span class="error_text" id="err_email">
                                                                        <?php //echo form_error('title'); 
                                                                        ?>
                                                                    </span>
                                                                    <div class="invalid-feedback">
                                                                        Enter valid email address
                                                                        </div>
                                                                </div>
                                                                <!-- <div class="mb-2 col-md-4">
                                                                    <label class="d-block text-font">Location URL</label>
                                                                    <input type="text" class="form-control input-font" name="location_url" id="location_url1">
                                                                    <span class="error_text" id="err_url">
                                                                        <?php //echo form_error('title'); 
                                                                        ?>
                                                                    </span>
                                                                </div> -->
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                                                <button onclick="return submitButton(event)" class="btn btn-primary">Update</button>
                                                            </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <?php } ?>
                                    </tr>
                            <?php }
                            } ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
    <div class="col-md-12 submit_btn p-3">
                               <a class="btn btn-primary btn-sm text-white" onclick="location.href='<?php echo base_url();?>admin/cmsManagenent_dashboard'">Back</a>
    </div> 
</div>
<div class="modal fade" id="delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Record</h5>
                <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary abcd" data-bs-dismiss="modal">Delete</button>
            </div>
        </div>
    </div>
</div>
<script>
    function edit(que_id){
        $("#err_address").text("");
        $("#err_contact").text("");
        $("#err_url").text("");
        $("#err_email").text("");
        $("#err_tele").text("");
         //  $('#editform').modal('show');
            $.ajax({
                            url: '<?php echo base_url(); ?>admin/edit_contactus/'+que_id,
                            type:"JSON",
                            method:"get",
                            success: function(result) {
                                var res = JSON.parse(result); 
                                console.log(res);
                                $('#id1').val(res.id);
                                $('#contact1').val(res.contact_no);
                                $('#address1').val(res.address);
                                $('#email1').val(res.email);
                                $('#location_url1').val(res.location);
                                $('#tele_fax1').val(res.tele_fax);
                               
                              var img=res.image;
                              $('#old_img').attr('href','<?php echo base_url()."uploads/admin//"; ?>'+img);
                            },
                            error: function(result) {
                                alert("Error,Please try again.");
                            }
                        });          
        }

        function submitButton(event) {
            event.preventDefault();
             var contact = $("#contact1").val();
             var address= $("#address1").val();
             var tele_fax= $("#tele_fax1").val();
             var email= $("#email1").val();
             var url= $("#location_url1").val();
             var is_valid = true;
             
                        
             if (address == "") {
                 $("#err_address").text("This value is required");
                 $("#address1").focus();
                 is_valid = false;
             
             } else if (!(address.length > 2)) {
                 $("#err_address").text("Please Enter minimum 3 Characters");
                 $("#address1").focus();
                 is_valid = false;
             } else {
                 $("#err_address").text("");
             }

             if (contact=="") {
                 $("#err_contact").text("This value is required");
                 $("#contact1").focus();
                 is_valid = false;
             
             } else {
                 $("#err_contact").text("");
             } 
             if (tele_fax=="") {
                 $("#err_tele").text("This value is required");
                 $("#tele_fax1").focus();
                 is_valid = false;
             
             } else {
                 $("#err_tele").text("");
             }

             if (email=="") {
                 $("#err_email").text("This value is required");
                 $("#email1").focus();
                 is_valid = false;
             
             } else {
                 $("#err_email").text("");
             }

             if (url=="") {
                 $("#err_url").text("This value is required");
                 $("#location_url1").focus();
                 is_valid = false;
             
             } else {
                 $("#err_url").text("");
             }
             
             

             if (is_valid) { 
                $('#updateform').attr('action','<?php echo base_url(); ?>admin/update_contactus');                
                //  return true;
                 Swal.fire({
                            title: 'Do you want to Submit?',
                            showDenyButton: true,
                            showCancelButton: false,
                            confirmButtonText: 'Submit',
                            denyButtonText: `Cancel`,
                            }).then((result) => {
                            /* Read more about isConfirmed, isDenied below */
                            if (result.isConfirmed) {
                                Swal.fire('Saved!', '', 'success')
                                // return true;
                                $('#updateform').submit();
                                // return true
                            } else if (result.isDenied) {
                                Swal.fire('Changes are not saved', '', 'info')
                            }
                            })



             } else {
                 return false;
             }
        };


        function addContact(event){
            event.preventDefault();

            is_valid = true;
                //  var id =   $('#id1').val();
                 var contact =    $('#contact_no').val();
                 var address =    $('#address').val();
                 var email =    $('#email').val();
                //  var url =    $('#location_url1').val();
                 var tele_fax =   $('#tele_fax').val();

                            
             if (address == "") {
                 $("#err_address").text("This value is required");
                 $("#address").focus();
                 is_valid = false;
             
             } else if (!(address.length > 2)) {
                 $("#err_address").text("Please Enter minimum 3 Characters");
                 $("#address").focus();
                 is_valid = false;
             } else {
                 $("#err_address").text("");
             }

             if (contact=="") {
                //  $("#err_contact").text("This value is required");
                 $("#contact").focus();
                 is_valid = false;
             
             } else {
                 $("#err_contact").text("");
             } 
             if (tele_fax=="") {
                 $("#err_tele").text("This value is required");
                 $("#tele_fax").focus();
                 is_valid = false;
             
             } else {
                 $("#err_tele").text("");
             }

             if (email=="") {
                 $("#err_email").text("This value is required");
                 $("#email").focus();
                 is_valid = false;
             
             } else {
                 $("#err_email").text("");
             }

            //  if (url=="") {
            //      $("#err_url").text("This value is required");
            //      $("#location_url1").focus();
            //      is_valid = false;
             
            //  } else {
            //      $("#err_url").text("");
            //  }
            if (is_valid) { 
                // $('#updateform').attr('action','<?php echo base_url(); ?>admin/update_contactus');                
                //  return true;
                 Swal.fire({
                            title: 'Do you want to Submit?',
                            showDenyButton: true,
                            showCancelButton: false,
                            confirmButtonText: 'Submit',
                            denyButtonText: `Cancel`,
                            }).then((result) => {
                            /* Read more about isConfirmed, isDenied below */
                            if (result.isConfirmed) {
                                Swal.fire('Saved!', '', 'success')
                                // return true;
                                $('#add_admin').submit();
                                // return true
                            } else if (result.isDenied) {
                                Swal.fire('Changes are not saved', '', 'info')
                            }
                            })



             } else {
                 return false;
             }
        }
        

         function deleteContactus(que_id) {
        // var c = confirm("Are you sure to delete this survey details? ");
        // $('#delete').modal('show');
        // $('.abcd').on('click', function() {

        //     $.ajax({
        //         type: 'POST',
        //         url: '<?php echo base_url(); ?>admin/deletContactus',
        //         data: {
        //             que_id: que_id,
        //         },
        //         success: function(result) {
        //             location.reload();
        //         },
        //         error: function(result) {
        //             alert("Error,Please try again.");
        //         }
        //     });
        // });



        Swal.fire({
                            title: 'Do you want to Delete?',
                            showDenyButton: true,
                            showCancelButton: false,
                            confirmButtonText: 'Delete',
                            denyButtonText: `Cancel`,
                            }).then((result) => {
                            /* Read more about isConfirmed, isDenied below */
                            if (result.isConfirmed) {
                                
                                $.ajax({
                                        type: 'POST',
                                        url: '<?php echo base_url(); ?>admin/deletContactus',
                                        data: {
                                            que_id: que_id,
                                        },
                                        success: function(result) {
                                            location.reload();
                                        },
                                        error: function(result) {
                                            alert("Error,Please try again.");
                                        }
                                    });
                                

                                Swal.fire('Saved!', '', 'success')
                                // return true;
                                // $('#updateform').submit();
                                // return true
                            } else if (result.isDenied) {
                                Swal.fire('Changes are not saved', '', 'info')
                            }
                            })
    }

         (() => {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  const forms = document.querySelectorAll('.needs-validation')
  
  // Loop over them and prevent submission
  Array.from(forms).forEach(form => {
    form.addEventListener('submit', event => {
      if (!form.checkValidity()) {
        event.preventDefault()
        event.stopPropagation()
      }

       form.classList.add('was-validated')
    }, false)
  })
})()
</script>
<style>
    .error_text{
        color:red;
    }
</style>
<!-- End of Main Content -->