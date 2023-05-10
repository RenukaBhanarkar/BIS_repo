<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Admin Creation Edit</h1>
</div>
 <?php
    if ($this->session->flashdata('MSG')) {
        echo $this->session->flashdata('MSG');
    }
    ?>
    <!-- Content Row -->
     <form id="edit_admin" action="<?php echo base_url(); ?>subadmin/editSubAdminDetails" method="post">
    <div class="row">
        <div class="col-12 mt-3">
            <div class="card border-top">
                <div class="card-body">
                        <?php if (!empty($record)) { ?>
                    <div class="row">
                          <input type="hidden" value="<?php echo $record['id'] ?>" name="admin_id" />
                           <input type="hidden" value="<?php echo $record['email_id'] ?>" name="old_email_id" id="old_email_id" />
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Name<sup class="text-danger">*</sup></label>
                             <input type="text" value="<?php echo $record['name'] ?>" class="form-control input-font" name="username" id="username" placeholder="Enter Username">
                        </div>
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font" text-font>Email<sup class="text-danger">*</sup></label>
                            <input type="email" value="<?php echo $record['email_id'] ?>" class="form-control input-font" placeholder="Enter email" name="email" id="email"></input>
                        </div>
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font" text-font>Department<sup class="text-danger">*</sup></label>
                            <input type="text" value="<?php echo $record['department'] ?>"  class="form-control input-font" placeholder="Enter Department" name="department" id="department"></input>
                        </div>
                        <div class="mb-2 col-md-4">
                                                <label class="d-block text-font">Assign Role<sup class="text-danger">*</sup></label>
                                                <select id="role" name="role" class="form-control input-font">
                                                    <option value="" selected disabled>Select Role</option>
                                                    <?php foreach ($roles as $role) { ?>
                                                        <option value="<?php echo $role['admin_type'] ?>" 
                                                            <?php if($role['admin_type'] == $record['designation']) { echo "selected"; } ?> >
                                                        <?php echo $role['role'] ?></option>
                                                    <?php } ?>

                                                </select>
                                            </div>
                    </div>
                <?php } ?>
                    <div class="col-md-12 submit_btn p-3">
                         <button class="btn btn-success btn-sm text-white update"  type="submit" id="Submit">
                                                Update
                                            </button>
                      <!--   <a class="btn btn-success btn-sm text-white update" >Update</a> -->
                        <a class="btn btn-danger btn-sm text-white cancel">Cancel</a>
                         <!-- <a class="btn btn-warning btn-sm text-white" onclick="resetFields()">Reset</a> -->
                         <a class="btn btn-warning btn-sm text-white reset" >Reset</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- /.container-fluid -->

<!-- </div>
</div>
</div>
</div> -->
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Footer -->
<script>
    $('.update').on('click',function(e){
         e.preventDefault();
        Swal.fire({
                    title: 'Do you want to Update?',
                    showDenyButton: true,
                    showCancelButton: false,
                    confirmButtonText: 'Update',
                    denyButtonText: `Cancel`,
                    }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                     if (result.isConfirmed) {

                var focusSet = false;
                var allfields = true;

                var username = $("#username").val();
                var email = $("#email").val();
                 var department = $("#department").val();
                 var designation = $("#role").val();

                var old_email_id = $("#old_email_id").val();
                if (username == "") {
                    if ($("#username").next(".validation").length == 0) // only add if not added
                    {
                        $("#username").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please enter unique  UID</div>");
                    }
                    if (!focusSet) {
                        $("#username").focus();
                    }

                    allfields = false;
                } else if (!(username.length > 6)) {
                    if ($("#username").next(".validation").length == 0) // only add if not added
                    {
                        $("#username").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please enter minimum 6 characters</div>");
                    }
                    if (!focusSet) {
                        $("#username").focus();
                    }
                    allfields = false;
                } else {
                    $("#username").next(".validation").remove(); // remove it
                }
                if (email == "") {
                    if ($("#email").next(".validation").length == 0) // only add if not added
                    {
                        $("#email").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please enter email </div>");
                    }
                    if (!focusSet) {
                        $("#email").focus();
                    }

                    allfields = false;
                } else {
                    $("#email").next(".validation").remove(); // remove it
                }
                if (department == "") {
                    if ($("#department").next(".validation").length == 0) // only add if not added
                    {
                        $("#department").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please enter department </div>");
                    }
                    if (!focusSet) {
                        $("#department").focus();
                    }

                    allfields = false;
                } else {
                    $("#department").next(".validation").remove(); // remove it
                }
                if (designation == "") {
                    if ($("#role").next(".validation").length == 0) // only add if not added
                    {
                        $("#role").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please select role </div>");
                    }
                    if (!focusSet) {
                        $("#role").focus();
                    }

                    allfields = false;
                } else {
                    $("#role").next(".validation").remove(); // remove it
                }
                if (allfields) {
                    if (email != old_email_id) {
                        jQuery.ajax({
                            type: "GET",
                            url: 'getUniqueEmail/?email=' + email,
                            dataType: 'json',
                            success: function(res) {

                                if (res.status == 0) {
                                    if ($("#email").next(".validation").length == 0) // only add if not added
                                    {
                                        $("#email").after("<div class='validation' style='color:red;margin-bottom:15px;'>This email already exist ,please enter unique  email</div>");

                                    }
                                    emailField = false;

                                    emailVerifyfunction(emailField);
                                    if (!focusSet) {
                                        $("#email").focus();
                                    }
                                } else {
                                    emailField = true;
                                    emailVerifyfunction(emailField);
                                    $("#email").next(".validation").remove(); // remove it
                                }

                            },
                            error: function(xhr, status, error) {
                                //toastr.signuperr('Failed to add '+xData.name+' in wishlist.');
                                console.log(error);
                            }
                        });

                        function emailVerifyfunction(para) {
                            is_valid = para;
                            if (is_valid == true) {
                                $("#edit_admin").submit();
                            } else {
                                return false;
                            }
                        }
                    }else{
                        $("#edit_admin").submit();
                    }

                } else {
                    return false;
                }


            } else if (result.isDenied) {
                // Swal.fire('Changes are not saved', '', 'info')
            }
                    })
    })
    
</script>
<script>
    $('.cancel').on('click',function(){
        Swal.fire({
                    title: 'Do you want to Cancel?',
                    showDenyButton: true,
                    showCancelButton: false,
                    confirmButtonText: 'Cancel',
                    denyButtonText: `Close`,
                    }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {                       
                        window.location.replace('<?php echo base_url().'subadmin/admin_creation_list' ?>');
                       // Swal.fire('Saved!', '', 'success')                                
                    } else if (result.isDenied) {
                        // Swal.fire('Changes are not saved', '', 'info')
                    }
                    })
    })

    $('.reset').on('click',function(){
        Swal.fire({
                    title: 'Do you want to Reset?',
                    showDenyButton: true,
                    showCancelButton: false,
                    confirmButtonText: 'Reset',
                    denyButtonText: `Close`,
                    }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {                       
                        // $('#edit_admin').get(0).reset();
                        $('#username').val('');
                        $('#email').val('');
                        $('#department').val('');
                        $('#role').val('');

                       // Swal.fire('Saved!', '', 'success')                                
                    } else if (result.isDenied) {
                        // Swal.fire('Changes are not saved', '', 'info')
                    }
                    })
    })
    
</script>


