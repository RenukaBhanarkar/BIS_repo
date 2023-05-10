<style>
.error_text
{
color: red;
}
</style>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Winner Wall Form</h1>
        
    </div>
    
    
    <!-- Content Row -->
    
    
    <div class="row">
        <form action="<?php echo base_url().'subadmin/insertWinner'; ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" class="form-control input-font" name="submit_id" id="submit_id" value="<?= random_strings(10)?>">
            <div class="col-12 mt-3">
                <div class="card border-top">
                    <div class="card-body">
                        <div class="row">
                            <div class="mb-2 col-md-4">
                                <label class="d-block text-font">Name of Competition<sup class="text-danger">*</sup></label>
                                <select class="form-control input-font" name="quiz_id" id="quiz_id" aria-label="Default select example">
                                    <option selected value="" disabled>--select--</option>
                                    <?php foreach($competation as $list){ ?>
                                    <option value="<?php echo $list['id']; ?>"><?php echo $list['title']; ?></option>
                                    <?php } ?>
                                </select>
                                <span class="error_competition"><?php echo form_error('competation');?></span>
                            </div>
                            <div class="mb-2 col-md-4">
                                <label class="d-block text-font">Title<sup class="text-danger">*</sup></label>
                                <input type="text" class="form-control input-font" name="wall_title" id="wall_title" placeholder="Title of Competition" >
                                <span class="error_text"><?php echo form_error('title');?></span>
                                
                            </div>
                            <div class="mb-2 col-md-4">
                                <label class="d-block text-font">Date of Competition<sup class="text-danger">*</sup></label>
                                <input type="date" class="form-control input-font" name="quiz_date" id="quiz_date" placeholder="Name of Competition Date" >
                                <span class="error_text"><?php echo form_error('title');?></span>
                                
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="prizes-section">
                                <h4 class="m-2">Add Winners</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-2 col-md-4">
                                <label class="d-block text-font">Select Prize<sup class="text-danger">*</sup></label>
                                <select class="form-control input-font" id="prize" name="prize" aria-label="Default select example" >
                                    <option selected value="" disabled>--select--</option>
                                    <?php foreach($prises as $p_list){ ?>
                                    
                                    <option value="<?php echo $p_list['id']; ?>"><?php echo $p_list['title']; ?></option>
                                    <?php } ?>
                                </select>
                                
                            </div>
                            <div class="mb-2 col-md-4">
                                <label class="d-block text-font">Name<sup class="text-danger">*</sup></label>
                                <input type="text" class="form-control input-font" name="name" id="name" placeholder="Enter Name" >
                                <span class="error_text"><?php echo form_error('title');?></span>
                                
                            </div>
                            <div class="mb-2 col-md-4">
                                <label class="d-block text-font">Email ID<sup class="text-danger">*</sup></label>
                                <input type="text" class="form-control input-font" name="email" id="email" placeholder="Enter Email ID" >
                                <span class="error_text"><?php echo form_error('title');?></span>
                                
                            </div>
                            <div class="mb-2 col-md-4">
                                <label class="d-block text-font">Mobile Number<sup class="text-danger">*</sup></label>
                                <input type="text" class="form-control input-font" name="contact_no" id="contact_no" placeholder="Enter Mobile Number" >
                                <span class="error_text"><?php echo form_error('contact_no');?></span>
                                
                            </div>
                            <div class="mb-2 col-md-4">
                                <label class="d-block text-font">Photo</label>
                                <div class="d-flex">
                                    <div>
                                        <input type="file" id="image" accept="image/jpeg,image/png,image/jpg"  name="image" class="form-control-file">
                                        <span class="error_text"><?php echo form_error('fprize_img'); ?></span>
                                    </div>
                                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModalFirst">
                                    Preview
                                    </button>
                                </div>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModalFirst" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" style="max-width: 700px;">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Photo Preview</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <img id="outputFirst" width="100%" />
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal -->
                            </div>
                            <div class="mb-2 col-md-4">
                                <label class="d-block text-font">Location<sup class="text-danger">*</sup></label>
                                <input type="text" class="form-control input-font" name="location" id="location" placeholder="Enter Location"  >
                                <span class="error_text"><?php echo form_error('location');?></span>
                                
                            </div>
                        </div>
                        <div class="col-md-12 submit_btn p-3" style="text-align: center;">
                            <button  class="btn btn-success btn-sm text-white"  id="addbtn">Add</button>
                        </div>
                        <div class="row">
                            <div class="col-12 mt-3 table-responsive">
                                <table id="example" class="table-bordered display nowrap" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Sr. No.</th>
                                            <th>Prize</th>
                                            <th>Name</th>
                                            <th>Email id</th>
                                            <th>Mobile</th>
                                            <th>Photo</th>
                                            <th>Location</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="que_body">
                                    </tbody>
                                    </table>

                                    
                                </div>
                            </div>
                            <div class="col-md-12 submit_btn p-3">
                                <a class="btn btn-success btn-sm text-white" onclick="return formubmit(event)">Submit</a>
                                <a class="btn btn-danger btn-sm text-white" data-bs-toggle="modal" data-bs-target="#cancelForm">Cancel</a>
                                <input type="reset" name="Reset" class="btn btn-warning btn-sm text-white">
                            </div>
                            
                            
                            <!-- Modal -->
                        </div>
                    </div>
                </div>
            </form>
        </div>
        
        <!-- /.container-fluid -->
    </div>
    <!-- End of Main Content -->
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
            <button type="button" class="btn btn-primary deletecall" data-bs-dismiss="modal">Delete</button>
        </div>
    </div>
</div>
</div>

<div class="modal fade" id="submit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Submit Record</h5>
            <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">
            <p>Are you sure you want to Submit?</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary submitcall" data-bs-dismiss="modal">Submit</button>
        </div>
    </div>
</div>
</div>
<?php 
 function random_strings($length_of_string)
    {
        $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
        return substr(str_shuffle($str_result), 0, $length_of_string );
    }
?>
<script type="text/javascript">
    $(document).ready(function () {

});
var loadFileThumbnail = function(event) 
    {
        $("#outputThumbnail").show();
        var outputThumbnail = document.getElementById('outputThumbnail');
        outputThumbnail.src = URL.createObjectURL(event.target.files[0]);
        outputThumbnail.onload = function()
        {
            URL.revokeObjectURL(outputThumbnail.src);
        }
    };
    function resetvideo()
    {
        $("#video").val(''); 
        $("#outputvideo").hide(); 
    }
        </script>

        <script type="text/javascript">
    $('#addbtn').click(function(e) { 
                    e.preventDefault();
                    var focusSet = false;
                    var allfields = true;  


                    var quiz_id = $("#quiz_id").val(); 
                    if (quiz_id == "" || quiz_id== null) {
                        if ($("#quiz_id").next(".validation").length == 0) // only add if not added
                        {
                            $("#quiz_id").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please Select Quiz </div>");
                        }
                        if (!focusSet) { $("#quiz_id").focus(); }
                        allfields = false;
                    } else {
                        $("#quiz_id").next(".validation").remove(); // remove it
                    } 
                    var quiz_date = $("#quiz_date").val();  

                    if (quiz_date == "" || quiz_date== null) {
                        if ($("#quiz_date").next(".validation").length == 0) // only add if not added
                        {
                            $("#quiz_date").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please Enter Quiz date </div>");
                        }
                        if (!focusSet) { $("#quiz_date").focus(); }
                        allfields = false;
                    } else {
                        $("#quiz_date").next(".validation").remove(); // remove it
                    }

                    var prize = $("#prize").val();
                    if (prize == "" || prize== null) {
                        if ($("#prize").next(".validation").length == 0) // only add if not added
                        {
                            $("#prize").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please Select Prize</div>");
                        }
                        if (!focusSet) { $("#prize").focus(); }
                        allfields = false;
                    } else {
                        $("#prize").next(".validation").remove(); // remove it
                    }

                    var name = $("#name").val();
                    if (name == "" || name== null) {
                        if ($("#name").next(".validation").length == 0) // only add if not added
                        {
                            $("#name").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please Enter name</div>");
                        }
                        if (!focusSet) { $("#name").focus(); }
                        allfields = false;
                    } else {
                        $("#name").next(".validation").remove(); // remove it
                    }

                    var email = $("#email").val();
                    if (email == "" || email== null) {
                        if ($("#email").next(".validation").length == 0) // only add if not added
                        {
                            $("#email").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please Enter email</div>");
                        }
                        if (!focusSet) { $("#email").focus(); }
                        allfields = false;
                    } else {
                        $("#email").next(".validation").remove(); // remove it
                    }

                    var contact_no = $("#contact_no").val();
                    if (contact_no == "" || contact_no== null) {
                        if ($("#contact_no").next(".validation").length == 0) // only add if not added
                        {
                            $("#contact_no").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please Enter contact no</div>");
                        }
                        if (!focusSet) { $("#contact_no").focus(); }
                        allfields = false;
                    } else {
                        $("#contact_no").next(".validation").remove(); // remove it
                    }

                    var image = $("#image").val();
                    if (image == "" || image== null) {
                        if ($("#image").next(".validation").length == 0) // only add if not added
                        {
                            $("#image").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please Select image</div>");
                        }
                        if (!focusSet) { $("#image").focus(); }
                        allfields = false;
                    } else {
                        $("#image").next(".validation").remove(); // remove it
                    }
 

                    if ($("#image").val() != '') 
                {
                    var fileSize = $('#image')[0].files[0].size;
                    $("#image").next(".validation").remove();
                    if (fileSize > 41943040) 
                    {
                        if ($("#image").next(".validation").length == 0) // only add if not added
                        {
                            $("#image").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please select  file of size less than 5 MB </div>");
                        }
                        allfields = false;
                        if (!focusSet) {
                            $("#image").focus();
                        }
                    } 
                    else 
                    {
                        $("#image").next(".validation").remove(); // remove it
                    }
                    var validExtensions = ['jpeg','jpg','png']; //array of valid extensions
                    var fileName = $("#image").val();;
                    var fileNameExt = fileName.substr(fileName.lastIndexOf('.') + 1);
                    $("#image").next(".validation").remove();
                    if ($.inArray(fileNameExt, validExtensions) == -1) 
                    {
                        if ($("#image").next(".validation").length == 0) // only add if not added
                        {
                            $("#image").after("<div class='validation' style='color:red;margin-bottom:15px;'>Only Jpeg, jpg,png  file allowed. </div>");
                        }
                        allfields = false;
                        if (!focusSet) 
                        {
                            $("#image").focus();
                        }
                    } 
                    else 
                    {
                        $("#image").next(".validation").remove(); // remove it
                    }
                }

                var location = $("#location").val();
                    if (location == "" || location== null) {
                        if ($("#location").next(".validation").length == 0) // only add if not added
                        {
                            $("#location").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please Enter location</div>");
                        }
                        if (!focusSet) { $("#location").focus(); }
                        allfields = false;
                    } else {
                        $("#location").next(".validation").remove(); // remove it
                    }

                    var wall_title = $("#wall_title").val();
                    if (wall_title == "" || wall_title== null) {
                        if ($("#wall_title").next(".validation").length == 0) // only add if not added
                        {
                            $("#wall_title").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please Enter wall_title</div>");
                        }
                        if (!focusSet) { $("#wall_title").focus(); }
                        allfields = false;
                    } else {
                        $("#wall_title").next(".validation").remove(); // remove it
                    }


                    var submit_id = $("#submit_id").val();
                    if (submit_id == "" || submit_id== null) {
                        if ($("#submit_id").next(".validation").length == 0) // only add if not added
                        {
                            $("#submit_id").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please Enter submit_id</div>");
                        }
                        if (!focusSet) { $("#submit_id").focus(); }
                        allfields = false;
                    } else {
                        $("#submit_id").next(".validation").remove(); // remove it
                    }
 

            if (allfields) {  
                var fd = new FormData();
                var files = $('#image')[0].files;
                // Check file selected or not
                if (files.length > 0) {
                    fd.append('image', files[0]);
                    fd.append('quiz_id', quiz_id);
                    fd.append('wall_title', wall_title);
                    fd.append('quiz_date', quiz_date);
                    fd.append('prize', prize);
                    fd.append('name', name);
                    fd.append('email', email);
                    fd.append('contact_no', contact_no);
                    fd.append('location', location);
                    fd.append('submit_id', submit_id);
                    $.ajax({

                        url: '<?php echo base_url(); ?>winnerwall/winner_wall_form',
                        type: 'post',
                        data: fd,
                     
                        contentType: false,
                        processData: false,
                        success: function(response) { 
                            res = JSON.parse(response);
                            if (res.status == 0) {
                                alert(res.message)
                            }
                            $("#image").val(''); 
                            $('#quiz_date').prop('readonly', true); 
                            $('#wall_title').prop('readonly', true); 
                            $("#quiz_id").prop( "disabled", true );
                            $("#prize").val("");
                            $("#name").val("");
                            $("#contact_no").val("");
                            $("#location").val("");
                            $("#email").val("");
                            displayWall(submit_id);
                        },
                    });
                } else {
                    alert("Please select a file.");
                }
            }
            else {
                return false;
            }
        });
    </script>
    <script type="text/javascript">
        function displayWall(submit_id) {
            // console.log(submit_id)
        $.post("<?php echo base_url(); ?>winnerwall/displayWall", {
            submit_id: submit_id
        }, function(result) {
            if (result.status == 0) 
            {
                 $('.errorbox').show().text("Error,Please try again."); 
            } 
            else 
            {
                res = JSON.parse(result);
                console.log(res.data)
                data = res.data;
                var row = '';
                j = 0
                for (i in data) {
                    j++;
                    row += '<tr id="row' + data[i].id + '">' +
                        '<td>' + j + '</td>' +
                        '<td>' + data[i].prize  + '</td>' +
                        '<td>' + data[i].name  + '</td>' +
                        '<td>' + data[i].email + '</td>' +
                        '<td>' + data[i].contact_no + '</td>' +
                        '<td> <img src="../'+data[i].image +'" style="height:100px;"></td>' +
                        '<td>' + data[i].location + '</td>' + 
                        '<td><a onclick="DeleteData('+ data[i].id +')" class="btn btn-danger btn-sm mr-2">Delete</a></td></tr>';
                }
                $("#que_body").html(row);
            }
        });

    }
    function DeleteData(id) 
    {
        $('#delete').modal('show');
        $('.deletecall').on('click', function() 
        {
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url(); ?>winnerwall/DeleteData',
                data: {
                    id: id,
                },
                success: function(result) 
                {
                    var submit_id = $("#submit_id").val();
                    displayWall(submit_id)
                },
                error: function(result) {
                    alert("Error,Please try again.");
                }
            });
        });
    }

    // function formubmit(id) 
    // {
    //     var submit_id = $("#submit_id").val();
    //     $('#submit').modal('show');
    //     $('.submitcall').on('click', function() 
    //     {
    //         $.ajax({
    //             type: 'POST',
    //             url: '<?php echo base_url(); ?>winnerwall/submitWinnerWall',
    //             data: {
    //                 submit_id: submit_id,
    //             },
    //             success: function(result) 
    //             { 
    //                     $('.errorbox').show().text("Error,Please try again.");
    //                     alert('Submitted Successfully');
    //                     window.location.href = "winner_wall_list"; 
    //             },
    //             error: function(result) {
    //                 alert("Error,Please try again.");
    //             }
    //         });
    //     });
    // }

    function formubmit(event) 
    {
        event.preventDefault();

        var submit_id = $("#submit_id").val();
        Swal.fire({
                    title: 'Do you want to Submit?',
                    showDenyButton: true,
                    showCancelButton: false,
                    confirmButtonText: 'Submit',
                    denyButtonText: `Cancel`,
                    }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {                       
                        $.ajax({
                                type: 'POST',
                                url: '<?php echo base_url(); ?>winnerwall/submitWinnerWall',
                                data: {
                                    submit_id: submit_id,
                                },
                                success: function(result) 
                                { 
                                        // $('.errorbox').show().text("Error,Please try again.");
                                        // alert('Submitted Successfully');
                                        Swal.fire('Submitted Successfully');
                                        window.location.href = "winner_wall_list"; 
                                },
                                error: function(result) {
                                    alert("Error,Please try again.");
                                }
                            });
                                                   
                    } else if (result.isDenied) {
                        Swal.fire('Changes are not saved', '', 'info')
                    }
                })
    }
    

    </script> 