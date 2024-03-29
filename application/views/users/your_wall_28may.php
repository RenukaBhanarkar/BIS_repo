<style>
    .cards-wrapper {
        display: flex;
        height: 342px;
    }

    .winner-content .card {
        width: calc(100%/2);
        margin: 0 0.5em;

    }

    .Your_Wall_Description {
        display: block;
        width: 100px;
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
    }

    #yourwall_title {
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
    }

    .cloned {
        height: 400px;
    }

    .item .card {
        border: none;
        border-radius: 0;
        box-shadow: 2px 6px 8px 0 rgba(22, 22, 26, 0.18) !important;
    }

    .heading-underline .left_1 {
        width: 25%;
        height: 5px;
        float: left;
        background-color: #014e9d;
    }

    .owl-dot {
        color: black;
    }

    #yourwall_description {
        display: block;
        overflow: hidden;
        height: 84px;
    }

    .select-wrapper {
        background: url('<?php echo base_url(); ?>assets/images/plus.png') no-repeat;
        background-size: cover;
        display: block;
        position: absolute;
        width: 76px;
        height: 76px;
        /* padding: 35px; */
        /* margin-left: 111px; */
        /* top: 50%; */
    }

    .input_box {
        display: flex;
        justify-content: center;
        align-items: center;
        box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
        height: 201px;
        border-radius: 12px;
        position: relative;
    }

    #image_src2,
    #image_src3,
    #image_src4,
    #image_src5 {
        width: 78px;
        height: 49px;
        opacity: 0;
        filter: alpha(opacity=0);
        margin-left: 0px;
        margin-top: 13px !important;
    }

    /* .box_img {
    box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
    height: 201px;
    border-radius: 12px;
} */
    .img_mentor {
        padding: 8px;
        border-radius: 15px;
        height: 201px;
    }

    .blog-details {
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
        padding: 30px;
        border-radius: 10px;
    }

    .blog-details .post-img {
        margin: -30px -30px 20px -30px;
        overflow: hidden;
        border-radius: 10px 10px 0 0;
    }

    .blog-details .title {
        font-size: 28px;
        font-weight: 700;
        padding: 0;
        margin: 20px 0 0 0;
        color: var(--color-default);
    }

    .blog-details .meta-top {
        margin-top: 20px;
        color: #6c757d;
    }

    .blog-details .content {
        margin-top: 20px;
    }

    .img-fluid {
        /* max-width: 100%; */
        /* height: auto; */
        width: 100%;
        height: 510px;
    }

    .blog-details .meta-top ul {
        display: flex;
        flex-wrap: wrap;
        list-style: none;
        align-items: center;
        padding: 0;
        margin: 0;
    }

    .blog-details .meta-top i {
        font-size: 16px;
        margin-right: 8px;
        line-height: 0;
        color: #008374;
    }

    .blog-details .meta-top a {
        color: #6c757d;
        font-size: 14px;
        display: inline-block;
        line-height: 1;
    }
    .sorting_asc{
        display: none;
    }

    .loader-div{
        display: none;
        position: fixed;
        margin: 0px;
        padding: 0px;
        right: 0px;
        top:0px;
        width: 100%;
        height: 100%;
        background-color: #fff;
        z-index: 300001;
        opacity: 0.8;
    }
    .loader-img{
        position: absolute;
        top: 0;
        bottom: 0;
        left:0;
        right: 0;
        margin: auto;
    }
    .loader{
            /* display: none; */
        position: fixed;
        margin: 0px;
        padding: 0px;
        right: 0px;
        top:0px;
    width: 100%;
height: 100%;
background-color: #fff;
z-index: 300001;
opacity: 0.2;
/* background:url('https://i.gifer.com/ZKZg.gif') 50% 50% no-repeat; */


        }
        
    </style>
</style>

<section>
    <div class="container-fluid" style="padding:49px;">
        <div class="row my-4">
            <div class="col-md-8">
                <div class="static-content">
                    <div class="bloginfo">
                        <h3 style="margin-bottom: 5px; color: #0086b2!important;font-weight: 600;">Your Wall</h3>
                    </div>
                    <?php if ($this->session->flashdata()) {
                        echo $this->session->flashdata('MSG');
                    } ?>
                    <div class="heading-underline" style="width: 113px;">
                        <div class="left_1"></div>
                        <div class="right"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">                
                <div class="bloginfo">
                    <?php if (isset($_SESSION['admin_id'])) { ?>
                        <?php if ($daily_limit > 0) { ?>
                            <button class="btn btn-primary flex-end YourWallForm" id="your_wall_exahust_limit">Post Here...</button>
                            <!-- <h3 style="margin-bottom: 0px;margin-top:20px;color: #0086b2!important;font-weight: 600; cursor:pointer; width:200px;" class="YourWallForm" id="your_wall_exahust_limit">Post Here...</h3>  -->
                        <?php } else { ?>
                            <!-- <h3 style="margin-bottom: 0px;margin-top:20px;color: #0086b2!important;font-weight: 600; cursor:pointer; width:200px;" class="YourWallForm" id="your_wall_show">Post Here...</h3> -->
                            <button class="btn btn-primary YourWallForm" id="your_wall_show">Post Here...</button>
                        <?php } ?>
                    <?php } else { ?>
                        <a href="<?php echo base_url() . 'users/login'; ?>">
                            <button class="btn btn-primary YourWallForm">Post Here...</button>
                            <!-- <h3 style="margin-bottom: 0px;margin-top:20px;color: #0086b2!important;font-weight: 600; cursor:pointer; width:200px;" class="YourWallForm" >Post Here...</h3> -->
                        </a>
                    <?php } ?>
                </div>
                
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <table id="example">
                    <thead>
                        <th></th>
                    </thead>
                    <tbody>       
                                <?php if (!empty($published_wall)) {
                                    foreach ($published_wall as $list) { ?>
                                        <tr>
                                                <td>
                                                    <article class="blog-details">
                                                        <div class="post-img">
                                                            <img src="<?= base_url() . 'uploads/your_wall/' . $list['image']; ?>" alt="" class="img-fluid">
                                                        </div>
                                                        <h2 class="title"><?php echo $list['title']; ?></h2>
                                                        <div class="meta-top">
                                                            <ul>
                                                                <li class="d-flex align-items-center"><i class="fa fa-user" aria-hidden="true"></i> <?php echo $list['user_name']; ?></li>
                                                                <li class="d-flex align-items-center" style="margin-left:10px;"><i class="fa fa-university" aria-hidden="true"></i> <?php echo $list['standard_club_name']; ?></li>
                                                                <li class="d-flex align-items-center" style="margin-left:10px;"><i class="fa fa-calendar" aria-hidden="true"></i> <time datetime="2020-01-01"><?= date("d M Y", strtotime($list['created_on'])); ?></time></li>
                                                                
                                                            </ul>
                                                        </div>
                                                        <div class="content">
                                                            <?php echo substr_replace($list['description'], "...", 550); ?>
                                                        </div>
                                                        <a href="<?php echo base_url() . 'users/yourwallview/' . $list['id']; ?>" class="btn-primary btn-sm text-white" tyle="button" style="background: black; padding: 10px;">Read More</a>
                                                    </article>
                                                </td>
                                        </tr>
                    
                                <?php  } } ?>
                    </tbody> 
                </table>
            </div>
        </div>
        <div class="" style="text-align:end;">
                <!-- <a href="http://43.231.124.177/BIS/BIS_repo/users/standard" class="btn-primary btn-sm">Back</a> -->
                <button class="btn btn-primary btn-sm text-white mr-3 mt-2"><a href="<?php echo base_url() . 'users/standard'; ?>">Back</a></button>
            </div>
    </div>
    
</section>




    <div class="modal fade" id="your_wall_form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New Post</h5>
                    <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div>


                        <form action="<?php echo base_url(); ?>users/add_your_wall" method="post" name="addwall" id="addwall" class="was-validated" enctype="multipart/form-data">

                            <!-- <h2 class="YourWallForm" id="your_wall_show">Your Wall</h2> -->
                            <div class="bg-light p-3">
                            

                                <div class="row">
                                    <div class="col-sm-4">
                                        <label class="d-block text-font">Title<sup class="text-danger">*</sup></label>
                                        <input type="text" class="form-control title-height" name="title" id="title_id" placeholder="Title" minlength="5" maxlength="200">
                                        <span id="err_title" class="text-danger"></span>

                                    </div>
                                    <div class="mb-2 col-md-4">
                                        <label class="d-block text-font">Upload Image<sup class="text-danger">*</sup></label>
                                        <div class="d-flex">
                                            <div class="col-9">
                                                <input type="file" class="file-control" name="image" id="image_thumb" value="" required accept="image/*" onchange="loadFileThumbnail5(event)">
                                                <span class="text-danger" id="err_thumb"></span>

                                            </div>
                                            <div class="col-2">
                                                <button type="button" class="btn btn-primary btn-sm previre_img">
                                                    Preview
                                                </button>
                                            </div>
                                        </div>
                                        <!-- <span id="err_image" class="text-danger"></span> -->

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModalFirst" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" style="max-width: 700px;">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Uplaod Image</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <img id="outputThumbnail8" width="100%" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Modal -->
                                    </div>
                                    <div class="mb-2 col-md-4">
                                        <label class="d-block text-font">Upload Document</label>
                                        <div class="">
                                            <div class="col-12">
                                                <input type="file" class="file-upload-field" name="document" id="document" value="" accept="pdf/*">
                                            </div>
                                            <div class="col-12">
                                                <span id="err_document" class="text-danger"></span>
                                            </div>

                                        </div>
                                        <!-- <span id="err_image" class="text-danger"></span> -->

                                    </div>
                                    
                                    <div class="col-sm-12 mt-2">
                                        <div class="form-group" id="yourWall_des">
                                            <label class="d-block text-font">Description<sup class="text-danger">*</sup></label>
                                            <textarea class="form-control  w-100" rows="8" placeholder="Share Your Description......" name="description" id="description" required minlength="5" maxlength="2000"></textarea>
                                            <span class="text-danger" id="des_error"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="mb-3 col-md-3">
                                        <div class="input_box">
                                            <div class="select-wrapper" id="img_2">
                                                <input type="file" class="form-control input-font" name="image2" id="image_src2" accept="image/*" onchange="loadFileThumbnail(event)">
                                            </div>
                                            <span id="display_img_2" style="display:none;">
                                                <img src="" id="outputThumbnail" alt="" class="w-100 img_mentor">
                                            </span>
                                        </div>
                                    </div>
                                    <div class="mb-3 col-md-3">
                                        <div class="input_box">
                                            <span class="select-wrapper" id="img_3">
                                                <input type="file" class="form-control input-font" name="image3" id="image_src3" accept="image/*" onchange="loadFileThumbnail1(event)">
                                            </span>
                                            <span id="display_img_3" style="display:none;">
                                                <img src="" id="outputThumbnail1" alt="" class="w-100 img_mentor">
                                            </span>
                                        </div>
                                    </div>
                                    <div class="mb-3 col-md-3">
                                        <div class="input_box">
                                            <span class="select-wrapper" id="img_4">
                                                <input type="file" class="form-control input-font" name="image4" id="image_src4" accept="image/*" onchange="loadFileThumbnail2(event)">
                                            </span>
                                            <span id="display_img_4" style="display:none;">
                                                <img src="" id="outputThumbnail2" alt="" class="w-100 img_mentor">
                                            </span>
                                        </div>
                                    </div>
                                    <div class="mb-3 col-md-3">
                                        <div class="input_box">
                                            <span class="select-wrapper" id="img_5">
                                                <input type="file" class="form-control input-font" name="image5" id="image_src5" accept="image/*" onchange="loadFileThumbnail3(event)">
                                            </span>
                                            <span id="display_img_5" style="display:none;">
                                                <img src="" id="outputThumbnail3" alt="" class="w-100 img_mentor">
                                            </span>
                                        </div>
                                    </div>
                                    <div class="row mb-5">
                                        <span class="text-danger">The image size should be between 20 to 200KB only</span>
                                    </div>


                                </div>
                                <div class="col-md-12 row">
                                    <div class="button-group float-end mt-3" style="text-align: end;">
                                        <button onclick="return submitButton(event)" type="submit" class="btn btn-success submit">Submit</button>
                                        <button class="btn btn-danger cancel">Cancel</button>

                                    </div>
                                </div>


                            </div>


                        </form>

                        <ul class="posts">
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="loader-div">
            <img class="loader-img" src="https://i.gifer.com/ZKZg.gif" alt="kjhjklhkh" style="height:120px; width:auto;" />
        </div>
        <div class="loader">
            <img class="loader-img" src="https://i.gifer.com/ZKZg.gif" alt="kjhjklhkh" style="height:120px; width:auto;" />
        </div>








<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script>
    $('.cancel').on('click', function() {
        Swal.fire({
            title: 'Do you want to Cancel?',
            showDenyButton: true,
            showCancelButton: false,
            confirmButtonText: 'Cancel',
            denyButtonText: `Close`,
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                // Swal.fire('Saved!', '', 'success')
                window.location.replace('<?php echo base_url() . 'users/your_wall_posts'; ?>');
            } else if (result.isDenied) {
                // Swal.fire('Changes are not saved', '', 'info')
            }
        })
    })

    $(document).ready(function() {
        $('#your_wall_hide').hide();

    });
</script>
<script>
    $("#your_wall_show").click(function() {
        //          $("#your_wall_hide").show();
        $("#your_wall_form").modal('show');
    });
</script>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
        $('#addwall').removeClass('was-validated');

        $('.previre_img').click(function() {
            $('#exampleModalFirst').modal('show');
            var abc = $(this).attr('data-id');
            //     Swal.fire({
            // title: 'Sweet!',
            // text: 'Modal with a custom image.',
            // imageUrl: abc,
            // imageWidth: 400,
            // imageHeight: 200,
            // imageAlt: 'Custom image',
            // })
        });

        // $('#image_thumb').on('change',function(){
        //     alert('jkgjh');
        // })
        $('#image_thumb').on('change', function() {

            var focusSet = false;
            var is_valid = true;
            if ($("#image_thumb").val() != '') {
                var fileSize = $('#image_thumb')[0].files[0].size;
                var validExtensions = ['jpg', 'jpeg', 'png', 'JPG', 'JPEG']; //array of valid extensions
                var fileName = $("#image_thumb").val();;
                var fileNameExt = fileName.substr(fileName.lastIndexOf('.') + 1);
                if (fileSize > 204800) {
                    is_valid = false;
                    allfields = false;
                    $("#image_thumb").val('');
                    $('#err_thumb').text('This value is required')
                    // alert("Please select file size less than 500 KB");
                    // $('#greaterSize').modal('show');
                    Swal.fire('File size should be between 20 to 200KB')

                    if (!focusSet) {
                        $("#image").focus();
                    }
                    return false;
                } else if (fileSize < 20480) {
                    $("#image_thumb").val('');
                    $('#err_thumb').text('This value is required')
                    // $('#lessSize').modal('show');
                    Swal.fire('File size should be between 20 to 200KB')
                    is_valid = false;
                    allfields = false;


                } else if ($.inArray(fileNameExt, validExtensions) == -1) {
                    $('#image_thumb').val('');
                    $('#err_thumb').text('This value is required')
                    // alert("Invalid file type");
                    // $('#invalidfiletype').modal('show');
                    Swal.fire('only jpg,jpeg,png files allowed')

                    allFields = false;
                    //$("#err_image").text("This value is required");

                } else {
                    // is_valid = true;
                    $("#err_image").text("");
                    // $("#imgError1").next(".validation").remove(); // remove it
                }

            } else {
                $("#err_image").text('This value is required');
                $("#image_thumb").focus();
                return false;
            }

        });
    });

    var loadFileThumbnail5 = function(event) {
        var outputThumbnail8 = document.getElementById('outputThumbnail8');

        outputThumbnail8.src = URL.createObjectURL(event.target.files[0]);
        console.log(outputThumbnail8.src);
        outputThumbnail8.onload = function() {
            URL.revokeObjectURL(outputThumbnail8.src);
        }
        // $('#display_img_2').show();
        // $('#img_2').hide();
    };





    var loadFileThumbnail = function(event) {
        //  $("#Previewimg").show();
        var fileSize = $('#image_src2')[0].files[0].size;
        var validExtensions = ['jpg', 'jpeg', 'png']; //array of valid extensions
        var fileName = $("#image_src2").val();;
        var fileNameExt = fileName.substr(fileName.lastIndexOf('.') + 1);

        console.log(fileSize);
        if (fileSize < 20000) {
            $('#image_src2').val('');
            // $('#lessSize').modal('show');
            Swal.fire("Image size should be between 20 to 200KB");
        } else if (fileSize > 200000) {
            $('#image_src2').val('');
            //$('#greaterSize').modal('show');
            Swal.fire("Image size should be between 20 to 200KB");
        } else if ($.inArray(fileNameExt, validExtensions) == -1) {
            $('#image_src2').val('');
            // $('#invalidfiletype').modal('show');
            Swal.fire("Only jpg,jpeg,png files allowed");
        }

        var outputThumbnail = document.getElementById('outputThumbnail');

        outputThumbnail.src = URL.createObjectURL(event.target.files[0]);
        console.log(outputThumbnail.src);
        outputThumbnail.onload = function() {
            URL.revokeObjectURL(outputThumbnail.src);
        }
        $('#display_img_2').show();
        $('#img_2').hide();
    };

    var loadFileThumbnail1 = function(event) {

        var fileSize = $('#image_src3')[0].files[0].size;
        var validExtensions = ['jpg', 'jpeg', 'png']; //array of valid extensions
        var fileName = $("#image_src3").val();;
        var fileNameExt = fileName.substr(fileName.lastIndexOf('.') + 1);

        console.log(fileSize);
        if (fileSize < 20000) {
            $('#image_src3').val('');
            // $('#lessSize').modal('show');
            Swal.fire("Image size should be between 20 to 200KB");
        } else if (fileSize > 204800) {
            $('#image_src3').val('');
            // $('#greaterSize').modal('show');
            Swal.fire("Image size should be between 20 to 200KB");
        } else if ($.inArray(fileNameExt, validExtensions) == -1) {
            $('#image_src3').val('');
            // $('#invalidfiletype').modal('show');
            Swal.fire("Only jpg,jpeg,png files allowed");
        }



        //  $("#Previewimg").show();
        var outputThumbnail1 = document.getElementById('outputThumbnail1');

        outputThumbnail1.src = URL.createObjectURL(event.target.files[0]);
        console.log(outputThumbnail.src);
        outputThumbnail1.onload = function() {
            URL.revokeObjectURL(outputThumbnail1.src);
        }
        $('#display_img_3').show();
        $('#img_3').hide();
    };

    var loadFileThumbnail2 = function(event) {
        var fileSize = $('#image_src4')[0].files[0].size;
        var validExtensions = ['jpg', 'jpeg', 'png']; //array of valid extensions
        var fileName = $("#image_src4").val();;
        var fileNameExt = fileName.substr(fileName.lastIndexOf('.') + 1);

        console.log(fileSize);
        if (fileSize < 20000) {
            $('#image_src4').val('');
            //$('#lessSize').modal('show');
            Swal.fire("Image size should be between 20 to 200KB");
        } else if (fileSize > 200000) {
            $('#image_src4').val('');
            //$('#greaterSize').modal('show');
            Swal.fire("Image size should be between 20 to 200KB");
        } else if ($.inArray(fileNameExt, validExtensions) == -1) {
            $('#image_src4').val('');
            //$('#invalidfiletype').modal('show');
            Swal.fire("Only jpg,jpeg,png files allowed");
        }


        //  $("#Previewimg").show();
        var outputThumbnail2 = document.getElementById('outputThumbnail2');

        outputThumbnail2.src = URL.createObjectURL(event.target.files[0]);
        console.log(outputThumbnail.src);
        outputThumbnail2.onload = function() {
            URL.revokeObjectURL(outputThumbnail2.src);
        }
        $('#display_img_4').show();
        $('#img_4').hide();
    };

    var loadFileThumbnail3 = function(event) {

        var fileSize = $('#image_src5')[0].files[0].size;
        var validExtensions = ['jpg', 'jpeg', 'png']; //array of valid extensions
        var fileName = $("#image_src5").val();;
        var fileNameExt = fileName.substr(fileName.lastIndexOf('.') + 1);

        console.log(fileSize);
        if (fileSize < 20000) {
            $('#image_src5').val('');
            // $('#lessSize').modal('show');
            Swal.fire("Image size should be between 20 to 200KB");
        } else if (fileSize > 200000) {
            $('#image_src5').val('');
            // $('#greaterSize').modal('show');
            Swal.fire("Image size should be between 20 to 200KB");
        } else if ($.inArray(fileNameExt, validExtensions) == -1) {
            $('#image_src5').val('');
            // $('#invalidfiletype').modal('show');
            Swal.fire("Only jpg,jpeg,png files allowed");
        }
        //  $("#Previewimg").show();
        var outputThumbnail3 = document.getElementById('outputThumbnail3');

        outputThumbnail3.src = URL.createObjectURL(event.target.files[0]);
        console.log(outputThumbnail.src);
        outputThumbnail3.onload = function() {
            URL.revokeObjectURL(outputThumbnail3.src);
        }
        $('#display_img_5').show();
        $('#img_5').hide();
    };

    // $('#addwall').submit( 'click',function(e) {
    // $('.submit').on( 'click',function(e) {
    function submitButton(event) {
        event.preventDefault();
        // e.preventDefault();
        //    var is_valid = true;
        var allfields = true;
        // e.preventDefault();
        $('#addwall').addClass('was-validated');
        var focusSet = false;
        // var allfields = true;
        var title = $("#title_id").val();
        console.log(title);
        // var description = $("#description").val(); 
        var description = CKEDITOR.instances['description'].getData();
        console.log(description.length);
        // var image = $("#image").val(); 

        if (title == "" || title == null) {
            $('#err_title').text("This value is required");
            $('#title_id').attr('required', true);
            if ($("#title_id").next(".validation").length == 0) // only add if not added
            {
                $('#title_id').attr('required', true);
                // $("#title_id").after("<div class='validation' style='color:red;margin-bottom:15px;'>This value is required </div>");
            }
            if (!focusSet) {
                $("#title_id").focus();
            }
            allfields = false;
        } else if (title.length < 5 || title.length > 200) {
            $('#err_title').text("Only 5 to 200 Characters allowed");
            $('#title_id').attr('required', true);
            if (!focusSet) {
                $("#title_id").focus();
            }
            allfields = false;
        } else {
            // allfields =true;
            // is_valid = true;
            $('#err_title').text("");
            $("#title_id").next(".validation").remove(); // remove it
        }

        if ($("#image_thumb").val() == '') {
            $('#image_thumb').attr('required', true);
            if ($("#image_thumb").next(".validation").length == 0) // only add if not added
            {
                //$("#image").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please upload .jpg / .jpeg/.png image </div>");
                // $("#imgError1").text('Please upload .jpg / .jpeg/.png image ');
                // $("#imgError1").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please upload .jpg / .jpeg/.png image </div>");
            }
            // alert('please select Image');
            $("#image_thumb").val('');
            //  $("#image").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please upload .jpg / .jpeg/.png image </div>");
            $("#err_thumb").text("This value is required");
            is_valid = false;
            allfields = false;
            // return false;
        } else {
            $("#err_image").text("");
        }




        if ($("#image_thumb").val() != '') {
            $("#err_image").text('');
        } else {

            $("#err_image").text('This value is required');
            $("#image_thumb").focus();
            allfields = false;
            $("#image_thumb").val('');
            //    return false;
        }







        if (description.length == "" || description.length == null) {
            $("#des_error").text("This value is required");
            $('#description').attr('required', true);

            // if ($("#description").next(".validation").length == 0) // only add if not added
            // {
            //     $('#description').attr('required',true);
            //     $("#yourWall_des").after("<div class='validation' style='color:red;margin-bottom:15px;'>This value is required </div>");
            // }
            // if (!focusSet) { $("#description").focus(); }
            allfields = false;
        } else if (description.length < 10) {
            allfields = false;
            $("#des_error").text("You entered " + description.length + " Characters. Description should be 10 to 5000 characters");
            //$("#des_error").text("Only 10 to 2000 characters allowed");      
            if ($("#description").next(".validation").length == 0) // only add if not added
            {
                $('#description').attr('required', true);
                // $("#yourWall_des").after("<div class='validation' style='color:red;margin-bottom:15px;'>Character length between 10 to 2000 </div>");
            }
            // if (!focusSet) { $("#description").focus(); }

            // is_valid = true;
            // allfields =true;
            // $("#description_error").hide();
            return false;
        } else if (description.length > 5000) {

            allfields = false;
            $("#des_error").text("You entered " + description.length + " Characters. Description should be 10 to 5000 characters");
        } else {
            // allfields = true;
            var remain_length = 5000 - description.length;
            $("#des_error").text("You can enter " + remain_length + " more characters");
            // allfields = true;
            $("#yourWall_des").after("<div class='validation' style='color:red;margin-bottom:15px;'></div>");
        }

        


        if (allfields) {

            // $('#addwall').submit();
            // $('#submit_alert').modal('show');
            Swal.fire({
                title: 'Do you want to Submit?',
                showDenyButton: true,
                showCancelButton: false,
                confirmButtonText: 'Submit',
                denyButtonText: `Cancel`,
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    $('.loader-div').show(); // Loder Display
                    // Swal.fire('Saved!', '', 'success')
                    // return true;
                    $('#addwall').submit();
                    // return true
                } else if (result.isDenied) {
                    Swal.fire('Changes are not saved', '', 'info')
                }
            })
            // return true;
        } else {
            return false;
        }
        








    }
    $(document).ready(function(e){
$(".loader").fadeOut("slow");
// $('.loader-div').fadeOut("slow");
        });
</script>
<script>
    $('#image_src2').on('change', function() {

        var focusSet = false;
        var is_valid = true;
        if ($("#image_src2").val() != '') {
            var fileSize = $('#image_src2')[0].files[0].size;

            if (fileSize > 204800) {
                is_valid = false;
                allfields = false;
                $("#image_src2").val('');

                $('#greaterSize').modal('show');
                if (!focusSet) {
                    $("#image_src2").focus();
                }
                return false;
            } else if (fileSize < 20480) {
                $("#image_src2").val('');
                is_valid = false;
                allfields = false;
                $('#lessSize').modal('show');

            } else {
                $("#err_image").next(".validation").remove(); // remove it
                $("#err_image").after("");
            }
            // check type  start

            var validExtensions = ['jpg', 'jpeg', 'png']; //array of valid extensions
            var fileName = $("#image").val();;
            var fileNameExt = fileName.substr(fileName.lastIndexOf('.') + 1);
            if ($.inArray(fileNameExt, validExtensions) == -1) {
                $('#image_src2').val('');
                // alert("Invalid file type");
                $('#invalidfiletype').modal('show');
                is_valid = false;

                allFields = false;

            } else {
                // is_valid = true;
                $("#imgError1").next(".validation").remove(); // remove it
            }

        } else {
            return true;
        }

        if (is_valid) {
            return true;
        } else {
            // alert('is_valid');
            return false;
        }
    });


    $('#document').on('change', function() {
        if ($("#document").val() != '') {
            var fileSize = $('#document')[0].files[0].size;

            if (fileSize > 5242880) {
                //    var is_valid = false;
                //$('#greaterSize_pdf').modal('show');
                Swal.fire('File Size should be less than 5MB');
                $("#document").val();
                if ($("#document").next(".validation").length == 0) // only add if not added
                {
                    //    var is_valid = false;
                    // alert("Please select file size greater than 500 KB");
                    //    return false;
                    $("#document").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please select file size less than 500 KB </div>");
                }
                //    var is_valid = false;
                if (!focusSet) {
                    $("#document").focus();
                }
            } else if (fileSize < 1024) {
                //    is_valid = false;
                $("#document").val();
                if ($("#document").next(".validation").length == 0) {
                    //    is_valid = false;
                    $('#lessSize').modal('show');
                    //    alert("Please select file size greater than 20 KB");
                    //    $("#imgError1").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please select file size greater than 20 KB </div>");
                    //    return false;
                }
                //    is_valid = false;
                if (!focusSet) {
                    $("#upload_pdf").focus();
                }
            } else {
                $("#document").next(".validation").remove(); // remove it
            }
            // check type  start 
            var validExtensions = ['pdf']; //array of valid extensions
            var fileName = $("#document").val();;
            var fileNameExt = fileName.substr(fileName.lastIndexOf('.') + 1);
            if ($.inArray(fileNameExt, validExtensions) == -1) {
                $('#document').val('');
                // alert("Invalid file type");
                $('#invalidfiletype_pdf').modal('show');
                //    var  is_valid = false;
                if ($("#document").next(".validation").length == 0) // only add if not added
                {
                    $("#err_document").text('Please upload .pdf');
                    // $("#imgError1").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please upload .jpg / .jpeg/.png image </div>");
                }
                //    allFields = false;
                if (!focusSet) {
                    $("#document").focus();
                }
            } else {
                //    is_valid = true;
                $("#imgerror3").next(".validation").remove(); // remove it
            }
        } else {

        }
    });
</script>
<!-- <script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script> -->
<script src="<?php echo base_url(); ?>assets/js/ckeditor/ckeditor.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    CKEDITOR.replace('description');
</script>
<script>
    $('.item').on('click', '.delete', function() {
        var id = $(this).attr('data-id');
        // alert(id);
        Swal.fire({
            title: 'Are you sure you want to Delete?',
            showDenyButton: true,
            showCancelButton: false,
            confirmButtonText: 'Delete',
            denyButtonText: `Cancel`,
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                jQuery.ajax({
                    // type: "POST",
                    url: '<?php echo base_url(); ?>users/delete_yourwall/' + id,
                    // dataType: 'json',
                    // data: {
                    // "id": id,
                    // "status": 5
                    // },
                    success: function(res) {
                        if (res) {
                            Swal.fire('Record Deleted Successfully');
                            location.reload();
                        } else {
                            alert("error");
                        }
                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                    }
                });
                // Swal.fire('Saved!', '', 'success')                                
            } else if (result.isDenied) {
                // Swal.fire('Changes are not saved', '', 'info')
            }
        })
    });

    $('#your_wall_exahust_limit').on('click', function() {
        Swal.fire("You have exahusted daily limit to post more");
    })
</script>