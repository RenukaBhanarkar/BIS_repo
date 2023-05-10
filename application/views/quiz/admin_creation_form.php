                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Admin Creation</h1>
                    </div>

                    <?php
                    if ($this->session->flashdata('MSG')) {
                        echo $this->session->flashdata('MSG');
                    }
                    ?>
                    <form id="add_admin" action="<?php echo base_url(); ?>admin/addAdmin" method="post">
                        <!-- Content Row -->
                        <div class="row">
                            <div class="col-12 mt-3">
                                <div class="card border-top">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="mb-2 col-md-4">
                                                <label class="d-block text-font">User UID<sup class="text-danger">*</sup></label>
                                                <div class="d-flex">
                                                    <input type="text" class="form-control input-font" name="uid" id="uid" placeholder="Enter User">
                                                </div>
                                            </div>
                                            <div class="mt-4 ml-3">
                                                <a class="btn btn-primary btn-sm text-white" id="getDetails">Get data</a>
                                            </div>
                                        </div>
                                        <div id="err_uid"></div>
                                        <div class="row">
                                            <div class="mb-2 col-md-4">
                                                <label class="d-block text-font">Name<sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control input-font" name="name" id="name" placeholder="Enter Name">
                                            </div>
                                            <div class="mb-2 col-md-4">
                                                <label class="d-block text-font" text-font>Email<sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control input-font" placeholder="Enter email" name="email" id="email"></input>
                                                <div id="err_email"></div>
                                            </div>
                                            <!-- <div class="mb-2 col-md-4">
                                            <label class="d-block text-font" text-font>Designation<sup class="text-danger">*</sup></label>
                                            <input type="text" class="form-control input-font" placeholder="Enter Designation" name="designation" id="designation" required=""></input>
                                        </div>
                                        <div class="mb-2 col-md-4">
                                            <label class="d-block text-font">Branch<sup class="text-danger">*</sup></label>
                                            <input type="text" class="form-control input-font" name="branch" id="branch" placeholder="Enter Branch">
                                        </div>
                                        <div class="mb-2 col-md-4">
                                            <label class="d-block text-font">Post<sup class="text-danger">*</sup></label>
                                            <input type="text" class="form-control input-font" name="post" id="post" placeholder="Enter Post">
                                        </div>
                                        <div class="mb-2 col-md-4">
                                            <label class="d-block text-font">Department<sup class="text-danger">*</sup></label>
                                            <input type="text" class="form-control input-font" name="department" id="department" placeholder="Enter Department">
                                        </div>
                                        <div class="mb-2 col-md-4">
                                            <label class="d-block text-font">Username<sup class="text-danger">*</sup></label>
                                            <input type="text" class="form-control input-font" name="username" id="username" placeholder="Enter Username">
                                        </div> -->
                                        </div>
                                        <div class="col-md-12 submit_btn p-3">
                                            <button class="btn btn-success btn-sm text-white" onclick="return validateForm();" type="submit" id="Submit">
                                                Submit
                                            </button>
                                            <!-- <a class="btn btn-success btn-sm text-white" onclick="return validateForm();">Submit</a> -->
                                            <a class="btn btn-danger btn-sm text-white" data-bs-toggle="modal" data-bs-target="#cancelForm">Cancel</a>
                                            <a class="btn btn-warning btn-sm text-white" onclick="resetFields()">Reset</a>
                                        </div>
                                        <!-- Modal -->
                                        <div class="modal fade" id="cancelForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Are you sure you want to cancel?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Save changes</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Modal -->
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
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; Bureau of Indian Standards 2022</span>
                        </div>
                    </div>
                </footer>
                <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <script>
            $(document).ready(function() {
                $("#getDetails").click(function() {
                    var focusSet = false;
                    var allFields = true;
                   
                    var uid = $('#uid').val();
                    if (uid == "") {
                        if ($("#err_uid").next(".validation").length == 0) // only add if not added
                        {
                            $("#err_uid").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please enter unique  UID</div>");
                        }
                        allFields = false;
                        if (!focusSet) {
                            $("#uid").focus();
                        } 
                    } else{
                        $("#err_uid").next(".validation").remove(); // remove it
                    }
                    if (uid.length <=7) {
                        if ($("#err_uid").next(".validation").length == 0) // only add if not added
                        {
                            $("#err_uid").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please enter minimum 8 characters</div>");
                        }
                        allFields = false;
                        if (!focusSet) {
                            $("#uid").focus();
                        }                        
                    } else {
                        $("#err_uid").next(".validation").remove(); // remove it
                    }
                    if( allFields){
                        $.post("getDetailsByuserId/", {
                        uid: uid
                    }, function(res) {
                        if (res.status == 0) {
                           // $('.errorbox').show().text("Error,Please try again.");
                           alert("Error,Please try again");
                        } else {
                            //var data = res.data;
                            var res = JSON.parse(res);
                            //  console.log(res.user);
                            // console.log(res.user.vc_name);
                            $('#name').val(res.user.vc_name);
                            $('#email').val(res.user.vc_email);
                            // $("#name").attr("disabled", true);
                            // $("#email").attr("disabled", true);
                            // $('#designation').val(res.data.designation);
                            // $('#branch').val(res.data.branch);
                            // $('#post').val(res.data.post);
                            // $('#department').val(res.data.department);

                        }
                    });
                    }
                  

                });
                $('#add_admin').on('click', '#Submit', function(e) {
                    e.preventDefault();
                    var focusSet = false;
                    var allfields = true;
                    var is_valid = true;
                    var uid = $("#uid").val();
                    var email = $("#email").val();
                    if (uid == "") {
                        if ($("#err_uid").next(".validation").length == 0) // only add if not added
                        {
                            $("#err_uid").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please enter unique  UID</div>");
                        }
                        if (!focusSet) {
                            $("#uid").focus();
                        }
                       
                        allfields = false;
                    } else if (!(uid.length > 6)) {
                        if ($("#err_uid").next(".validation").length == 0) // only add if not added
                        {
                            $("#err_uid").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please enter minimum 6 characters</div>");
                        }
                        if (!focusSet) {
                            $("#uid").focus();
                        }
                        allfields = false;
                    } else {
                        $("#err_uid").next(".validation").remove(); // remove it
                    }
                    if (allfields) {
                        jQuery.ajax({
                            type: "GET",
                            url: 'getUniqueEmail/?email=' + email,
                            dataType: 'json',
                            success: function(res) {

                                if (res.status == 0) {
                                    if ($("#err_email").next(".validation").length == 0) // only add if not added
                                    {
                                        $("#err_email").after("<div class='validation' style='color:red;margin-bottom:15px;'>This email already exist ,please enter unique  email</div>");

                                    }
                                    emailField = false;

                                    emailVerifyfunction(emailField);
                                    if (!focusSet) {
                                        $("#email").focus();
                                    }
                                } else {
                                    emailField = true;
                                    emailVerifyfunction(emailField);
                                    $("#err_email").next(".validation").remove(); // remove it
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
                                $("#add_admin").submit();

                            } else {
                                return false;
                            }

                        }
                    } else {
                        return false;
                    }


                });
            });
        </script>