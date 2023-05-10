    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Wall Of Wisdom</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url().'Admin/dashboard';?>" >Sub Admin Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'admin/exchange_forum';?>" >Exchange Forum</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'wall_of_wisdom';?>" >Wall Of Wisdom</a></li>
                <li class="breadcrumb-item active" aria-current="page">Archive</li>
                
                </ol>
            </nav>

        </div>
        <?php if (encryptids("D", $_SESSION['admin_type']) == 3) { ?>
            <!-- Content Row -->

            <!-- Content Row -->
            <div class="row">
                <div class="col-12">
                    <div class="card border-top card-body">
                        <div>
                            <!-- <button type="button" class="btn btn-primary btn-sm mr-2" data-bs-toggle="modal" data-bs-target="#exampleModal1" data-bs-whatever="@mdo">Add New Post</button> -->
                            <a href="<?php echo base_url(); ?>wall_of_wisdom/" type="button" class="btn btn-primary btn-sm mr-2" >Wall of Wisdom</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
        <?php
        if ($this->session->flashdata('MSG')) {
            echo $this->session->flashdata('MSG');
        }
        ?>
        <div class="row">
            <div class="col-12 mt-3">
                <div class="card border-top card-body">
                    <table id="wow_table" class="hover table-bordered " style="width:100%">
                        <thead>
                            <tr>
                                <th>Sr. No.</th>
                                <th>Title</th>
                                <!-- <th>Desciption</th> -->
                                <th>Image</th>
                                <th>Status</th>
                                <!-- <th>Reject Reason</th> -->
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($archive)) {
                                $i = 1;
                                foreach ($archive as $list_wow) { ?>
                                    <tr>
                                        <td><?php echo $i++ ?></td>
                                        <td><?php echo $list_wow['title'] ?></td>
                                        <!-- <td><?php echo $list_wow['description'] ?></td> -->
                                        <td><?php if ($list_wow['image']) { ?>
                                                <img src="<?php echo base_url(); ?>uploads/admin/wall_of_wisdom/<?php echo $list_wow['image'] ?>" width="50px" style="text-align:center;">
                                            <?php } else {
                                                echo "No Uploaded";
                                            } ?>
                                        </td>
                                        <td><?php echo $list_wow['status_name']; ?></td>
                                        
                                        <td class="d-flex border-bottom-0" style=" width: 350px;">
                                            <a href="<?php echo base_url().'wall_of_wisdom/detail/'.$list_wow['id']; ?>" >
                                                <button class="btn btn-primary btn-sm mr-2">View</button>
                                            </a>
                                            <?php 
                                            if (encryptids("D", $_SESSION['admin_type']) == 3) { ?>
                                            <!-- <button class="btn btn-primary btn-sm ml-2" onclick="sendArchive('<?php echo $list_wow['id']; ?>')" data-id ='<?php echo $list_btm['id']; ?>'>Archive</button> -->
                                            <button class="btn btn-info btn-sm restore" onclick="sendUnArchive('<?php echo $list_wow['id']; ?>')" data-id ='<?php echo $list_wow['id']; ?>'>Restore</button> 
                                            
                                           
                                           
                                             <?php }  ?>                                           
                                        </td>
                                        <!-- Modal -->
                                    </tr>

                            <?php }
                            } ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    
    <!-- /.container-fluid -->
    <div class="col-md-12 submit_btn p-3">
                               <a class="btn btn-primary btn-sm text-white" onclick="location.href='<?php echo base_url().'admin/exchange_forum' ?>'">Back</a>
                          </div>
    </div>
    </div>
    
    <!-- --------- edit modal ----------- -->
    
    <!-- End of Main Content -->
    <!-- ----------- Start of reject modal------- -->
    

                            
    <!-- ----------- end of reject modal------- -->
    <div class="modal fade" id="archive" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Archive Activity</h5>
                    <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to Archive ?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancle</button>
                    <button type="button" class="btn btn-primary archive" data-bs-dismiss="modal">Archive</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="restore" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Restore </h5>
                    <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to Restore ?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancle</button>
                    <button type="button" class="btn btn-primary restore" data-bs-dismiss="modal">Restore</button>
                </div>
            </div>
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
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary delete" data-bs-dismiss="modal">Delete</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="publish" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Publish Activity</h5>
                    <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to Publish activity?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancle</button>
                    <button type="button" class="btn btn-primary publish" data-bs-dismiss="modal">Publish</button>
                </div>
            </div>
        </div>
    </div>

    

    <script type="text/javascript">
        // function sendUnArchive(que_id) {
        //     console.log(que_id);
        //     // var c = confirm("Are you sure to Unpublish By The Mentor details? ");
        //     // if (c == true) {     
        //         $('#restore').modal('show');
        //         $('.restore').on('click', function() {          
        //         $.ajax({
        //             type: 'POST',
        //             url: '<?php echo base_url(); ?>Wall_of_wisdom/restore',
        //             data: {
        //                 que_id: que_id,
        //             },
        //             success: function(result) { 
        //                 console.log(result);                      
        //                 location.reload();
        //             },
        //             error: function(result) {
        //                 alert("Error,Please try again.");
        //             }
        //         });

        //     });
        // }
var loadFileThumbnail = function(event) 
    {
       //  $("#Previewimg").show();
        var outputThumbnail = document.getElementById('outputThumbnail');
        
        outputThumbnail.src = URL.createObjectURL(event.target.files[0]);
        console.log(outputThumbnail.src);
        outputThumbnail.onload = function()
        {
            URL.revokeObjectURL(outputThumbnail.src);
        }
    };
    var loadFileThumbnail1 = function(event) 
    {
       //  $("#Previewimg").show();
        var outputThumbnail = document.getElementById('outputThumbnail1');
        
        outputThumbnail.src = URL.createObjectURL(event.target.files[0]);
        console.log(outputThumbnail.src);
        outputThumbnail.onload = function()
        {
            URL.revokeObjectURL(outputThumbnail.src);
        }
    };
    function resetimg()
    {
         
        $("#outputThumbnail").hide(); 
    }
    </script> 
    <!-- Page level plugins -->
    <script>
        //check size of doc and type  if newly uploaded
        function submitButton() {
           
            var title = $("#title").val();
            // var description = $("#description").val();
            var description= CKEDITOR.instances['description'].getData(); 
            var is_valid = true;
            //var numbers = /[0-9]/g;
            //var upperCaseLetters = /[A-Z]/g;
            //var lowerCaseLetters = /[a-z]/g;

            if (title == "") {
                $("#err_title").text("This value is required");
                $("#u_email").focus();
                var  is_valid = false;
            } else if (!(title.length > 4)) {
                $("#err_title").text("Please Enter minimum 5 Characters");
                $("#u_title").focus();
                var is_valid = false;
            }else if (title.length > 250) {
                $("#err_title").text("Maximum 250 characters allowed");
                $("#u_title").focus();
                var is_valid = false;
            } else {
                $("#err_title").text("");
            }
            if (description == "") {
                $("#err_description").text("This value is required");
                $("#description").focus();
                var is_valid = false;
            } else if ((description.length < 10)) {
                $("#err_description").text("Please Enter minimum 5 Characters");
                $("#description").focus();
                var is_valid = false;
            } else if ((description.length > 1000)) {
                $("#err_description").text("Maximum 1000 characters allowed");
                $("#description").focus();
                var is_valid = false;
            } else {
                $("#err_description").text("");
            }
            


        if ($("#document1").val() != '') {
                    var fileSize = $('#document1')[0].files[0].size;

                    if (fileSize > 256000) {
                        var is_valid = false;
                        $('#greaterSize').modal('show');
                        $("#document1").val();
                        if ($("#imgError1").next(".validation").length == 0) // only add if not added
                        {
                            var is_valid = false;
                            // alert("Please select file size greater than 500 KB");
                            return false;
                            $("#imgError1").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please select file size less than 500 KB </div>");
                        }
                        var is_valid = false;
                        if (!focusSet) {
                            $("#document1").focus();
                        }
                    } else if(fileSize < 51200){
                        is_valid = false;
                        $("#document1").val();
                        if ($("#imgError1").next(".validation").length == 0) 
                        {
                        is_valid = false;
                        $('#lessSize').modal('show');
                        //    alert("Please select file size greater than 20 KB");
                        //    $("#imgError1").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please select file size greater than 20 KB </div>");
                        return false;
                        }
                        is_valid = false;
                        if (!focusSet) {
                            $("#document1").focus();
                        }
                    }else{
                        $("#imgError1").next(".validation").remove(); // remove it
                    }
                    // check type  start 
                    var validExtensions = ['jpg', 'jpeg', 'png']; //array of valid extensions
                    var fileName = $("#document1").val();;
                    var fileNameExt = fileName.substr(fileName.lastIndexOf('.') + 1);
                    if ($.inArray(fileNameExt, validExtensions) == -1) {
                        $('#document1').val('');
                        // alert("Invalid file type");
                        $('#invalidfiletype').modal('show');
                        var  is_valid = false;
                        if ($("#imgError1").next(".validation").length == 0) // only add if not added
                        {
                            $("#imgError1").text('Please upload .jpg / .jpeg/.png image ');
                            // $("#imgError1").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please upload .jpg / .jpeg/.png image </div>");
                        }
                        allFields = false;
                        if (!focusSet) {
                            $("#document1").focus();
                        }
                    } else {
                        is_valid = true;
                        $("#imgError1").next(".validation").remove(); // remove it
                    }
                }else{
                    $("#imgError1").text('Please select file');
                    $("#document1").focus();
                }




                if (is_valid) {
                return true;
            } else {
                return false;
            }
            };
    </script>
    <script>
        $('#wow_table').DataTable();
        function updateButton() {
           
           var title = $("#title1").val();
           // var description = $("#description").val();
           var description= CKEDITOR.instances['description1'].getData(); 
           var is_valid = true;
           //var numbers = /[0-9]/g;
           //var upperCaseLetters = /[A-Z]/g;
           //var lowerCaseLetters = /[a-z]/g;

           if (title == "") {
               $("#err_title").text("This value is required");
               $("#u_email").focus();
               var  is_valid = false;
           } else if (!(title.length > 4)) {
               $("#err_title").text("Please Enter minimum 5 Characters");
               $("#u_title").focus();
               var is_valid = false;
           }else if (title.length > 250) {
               $("#err_title").text("Maximum 250 characters allowed");
               $("#u_title").focus();
               var is_valid = false;
           } else {
               $("#err_title").text("");
           }
           if (description == "") {
               $("#err_description").text("This value is required");
               $("#description").focus();
               var is_valid = false;
           } else if ((description.length < 10)) {
               $("#err_description").text("Please Enter minimum 5 Characters");
               $("#description").focus();
               var is_valid = false;
           } else if ((description.length > 1000)) {
               $("#err_description").text("Maximum 1000 characters allowed");
               $("#description").focus();
               var is_valid = false;
           } else {
               $("#err_description").text("");
           }
           


       if ($("#document2").val() != '') {
                   var fileSize = $('#document2')[0].files[0].size;

                   if (fileSize > 256000) {
                       var is_valid = false;
                       $('#greaterSize').modal('show');
                       $("#document2").val();
                       if ($("#imgerror3").next(".validation").length == 0) // only add if not added
                       {
                           var is_valid = false;
                           // alert("Please select file size greater than 500 KB");
                           return false;
                           $("#imgerror3").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please select file size less than 500 KB </div>");
                       }
                       var is_valid = false;
                       if (!focusSet) {
                           $("#document2").focus();
                       }
                   } else if(fileSize < 51200){
                       is_valid = false;
                       $("#document2").val();
                       if ($("#imgerror3").next(".validation").length == 0) 
                       {
                       is_valid = false;
                       $('#lessSize').modal('show');
                       //    alert("Please select file size greater than 20 KB");
                       //    $("#imgError1").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please select file size greater than 20 KB </div>");
                       return false;
                       }
                       is_valid = false;
                       if (!focusSet) {
                           $("#document2").focus();
                       }
                   }else{
                       $("#imgerror3").next(".validation").remove(); // remove it
                   }
                   // check type  start 
                   var validExtensions = ['jpg', 'jpeg', 'png']; //array of valid extensions
                   var fileName = $("#document2").val();
                   var fileNameExt = fileName.substr(fileName.lastIndexOf('.') + 1);
                   if ($.inArray(fileNameExt, validExtensions) == -1) {
                       $('#document2').val('');
                       // alert("Invalid file type");
                       $('#invalidfiletype').modal('show');
                       var  is_valid = false;
                       if ($("#imgerror3").next(".validation").length == 0) // only add if not added
                       {
                           $("#imgerror3").text('Please upload .jpg / .jpeg/.png image ');
                           // $("#imgError1").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please upload .jpg / .jpeg/.png image </div>");
                       }
                       allFields = false;
                       if (!focusSet) {
                           $("#document2").focus();
                       }
                   } else {
                       is_valid = true;
                       $("#imgerror3").next(".validation").remove(); // remove it
                   }
               }else{
                   $("#imgerror3").text('Please select file');
                   $("#document2").focus();
               }




               if (is_valid) {
               return true;
           } else {
               return false;
           }
           };
    </script>
    <script>
        // function sendapproval(){

        // }
        function edit(que_id){
            $('#editModal1').modal('show');
            $('#delete_preview').show();
                    $('#add_file').hide();
                    // $('#icon_file').attr('required',false);
                    // $('#outputicon').attr('src',)
            $('.del_icon').on('click',function(){
                                $('#delete_preview').hide();
                                $('#add_file').show();
                                $('#document2').val('');
                                $('#document2').attr('required',true);

                                // $('#document2').attr('required');
                                return false;
                                
                                // $('#icon_file').add('attr','required');
                                // $('#document2').attr('required',true);
            });
            $.ajax({
                            url: '<?php echo base_url(); ?>Wall_of_wisdom/get_wow/'+que_id,
                            type:"JSON",
                            method:"get",
                            success: function(result) {
                                var res = JSON.parse(result); 
                                console.log(res.id);
                                $('#id1').val(res.id);
                                // $('#description1').val(res.description);
                                CKEDITOR.instances['description1'].setData(res.description)
                                $('#image1').val(res.image);
                                $('#title1').val(res.title);
                               
                              var img=res.image;
                              $('#old_img').attr('href','<?php echo base_url()."uploads/admin/wall_of_wisdom/"; ?>'+img);
                            },
                            error: function(result) {
                                alert("Error,Please try again.");
                            }
                        });          
        }
        $('#preview1').on('click',function(){
           var link = $('#image1').val();
           var img='<?php echo base_url().'uploads/admin/wall_of_wisdom/';?>'+link;
            $('#outputbanner').attr('src',img);
        });

        function reject(que_id){
            $('#rejectModal1').modal('show');
            $('#id2').val(que_id);
        }



        function sendapproval(que_id) {
            // var c = confirm("Are you sure to Approve this survey details? ");
            // if (c == true) {
                $('#sendforapproval').modal('show');
                $('.sendforapproval').on('click', function() {
                // const $loader = $('.igr-ajax-loader');
                //$loader.show();
                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url(); ?>Wall_of_wisdom/approvewall_of_wisdom',
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

            })
        }

        function approve(que_id){
            // var c = confirm("Are you sure to Approve activity? ");
            // if (c == true) {
                $('#approve').modal('show');
                $('.approve').on('click', function() {
                // const $loader = $('.igr-ajax-loader');
                //$loader.show();
                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url(); ?>Wall_of_wisdom/approve_activity',
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

            })
        }

        function sendPublish(que_id) {           
                $('#publish').modal('show');
                $('.publish').on('click', function() {

                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url(); ?>wall_of_wisdom/wowPublish',
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

           });
        }

        function sendUnPublish(que_id) {

            // var c = confirm("Are you sure to Unpublish By The Mentor details? ");
            // if (c == true) {
                $('#unpublish').modal('show');
                $('.unpublish').on('click', function() {
                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url(); ?>wall_of_wisdom/wowUnpublish',
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

                })
        }

        function deleteWOW(que_id) {
            $('.delete').on('click', function() {
                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url(); ?>wall_of_wisdom/wowDelete',
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
            });
        }
    </script>
    <script>
        $(document).ready(function() {
            $('#wow_table').DataTable();            
        });



        $('#updatepost').submit( 'click',function() { 
            // alert("cvx");
                    // e.preventDefault();
                    var focusSet = false;
                    var allfields = true;
                    var title = $("#title").val();
                    var description = $("#description").val(); 

                    if ($("#document2").val() == '') {
                        alert('please select Image');
                        $("#document1").val('');
                       false;
                        allfields = false;
                    }
                   








                    if (title == "" || title== null) {
                        if ($("#title").next(".validation").length == 0) // only add if not added
                        {
                            $("#title").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please Enter Quiz Title </div>");
                        }
                        if (!focusSet) { $("#title").focus(); }
                        allfields = false;
                    } else {
                        allfields =true;
                        $("#title").next(".validation").remove(); // remove it
                    } 

                    if (description == "" || description== null) {
                        // if ($("#description").next(".validation").length == 0) // only add if not added
                        // {
                        //     $("#description_error").show();
                        // }
                        // if (!focusSet) { $("#description").focus(); }
                        allfields = false;
                    } else {
                        allfields =true;
                            $("#description_error").hide();

                    } 

                    if (allfields) { 
                        $('#addwall').submit();
                        return true;
                    } else {
                        return false;
                    }
                    // $('#addwall').submit();
                });

        $('#wow_table').on('click','.restore',function(){
            var id=$(this).attr('data-id');
            
            Swal.fire({
                    title: 'Are you sure you want to Restore ?',
                    showDenyButton: true,
                    showCancelButton: false,
                    confirmButtonText: 'Restore',
                    denyButtonText: `Cancel`,
                    }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {   
                        $.ajax({
                             type: 'POST',
                            url: '<?php echo base_url(); ?>wall_of_wisdom/restore',
                            data: {
                                que_id: id,
                            },
                            success: function(result) {
                                Swal.fire("Record Restored Successfully.");
                                location.reload();
                            },
                            error: function(result) {
                                alert("Error,Please try again.");
                            }
                        });
                        Swal.fire('Saved!', '', 'success')                                
                    } else if (result.isDenied) {
                        // Swal.fire('Changes are not saved', '', 'info')
                    }
                    })

        });

    </script>
    </body>