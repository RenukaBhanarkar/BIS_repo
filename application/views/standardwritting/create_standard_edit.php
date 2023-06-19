<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Create New Competition</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url().'Admin/dashboard';?>" >Sub Admin Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'admin/exchange_forum';?>" >Exchange Forum</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'quiz/organizing_quiz';?>" >Competition</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'Standardswritting/standard_writting_dashboard';?>" >Standard Writting</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'Standardswritting/create_standard_list';?>" >Create New Competition</a></li>
                <!-- <li class="breadcrumb-item active" aria-current="page">Create New Competition</li> -->
                
            </ol>
        </nav>
    </div>
    <!-- Content Row -->
    <div class="row">
        <div class="col-12 mt-3">
            <div class="card border-top card-body">
                <form name="create_standard_edit" id="create_standard_edit" action="<?php echo base_url().'standardswritting/create_standard_edit'?>/<?= $getData['id']?>" method="post"enctype="multipart/form-data">
                    <input type="hidden" id="id" name="id" value="<?= $getData['id']?>" >
                    <div class="row">
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Branch Id<sup class="text-danger">*</sup></label>
                            <input type="text" class="form-control input-font" name="branch_id" id="branch_id" placeholder="Enter Branch Id" value="<?= $getData['branch_id']?>" >
                        </div>
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Department Id<sup class="text-danger">*</sup>  </label>
                            <input type="text" class="form-control input-font" name="dept_id" id="dept_id" placeholder="Enter Department Id" value="<?= $getData['dept_id']?>" >
                        </div>
                        <div class="mb-2 col-md-4">
                            <a class="btn btn-primary btn-sm text-white" style="margin-top: 30px;" onclick="getStandardClub()">Fetch Details</a>
                        </div>
                        <div class="mb-2 col-4">
                            <label class="d-block text-font">Standard Club<sup class="text-danger">*</sup></label>
                            <select id="standard_club" name="standard_club" class="form-control input-font">
                                <?php
                                foreach ($StdClb as $list) { ?>
                                <option  <?php if ($getData['standard_club'] == $list['StdClubName']) echo "selected"; ?> value="<?php echo $list['StdClubName'] ?>"> <?php echo $list['StdClubName']; ?> </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-2 col-md-12">
                            <label class="d-block text-font">Name of Activity<sup class="text-danger">*</sup></label>
                            <input type="text" class="form-control input-font" name="topic_of_activity" id="topic_of_activity" placeholder="Enter Topic of Activity" value="<?= $getData['topic_of_activity']?>" >
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Date of Activity<sup class="text-danger">*</sup></label>
                            <input type="date" class="form-control input-font" name="date_of_activity" id="date_of_activity"  value="<?= $getData['date_of_activity']?>" >
                        </div>
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Number of Participants<sup class="text-danger">*</sup></label>
                            <input type="text" class="form-control input-font" name="number_of_participants" placeholder="Enter Number of Participate" id="number_of_participants"  value="<?= $getData['number_of_participants']?>" oninput="this.value = this.value.replace(/[^0-9]/,'')">
                        </div>
                    </div>
                </div>
                <div class="card-header p-2" style="background-color: #cdd4e0; text-align: center;">
                    <h4 class="m-0">Winners Details</h4>
                </div>
                <div class="card card-body">
                    <div class="col-md-3 prizes-section" style="margin-left: -21px;">
                        <h4 class="m-2">First Prize</h4>
                    </div>
                    <div class="row">
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Name of Paticipant<sup class="text-danger">*</sup></label>
                            <input type="text" class="form-control input-font" name="first_paticipant" id="first_paticipant" placeholder="Enter name" value="<?= $getData['first_paticipant']?>" >
                        </div>
                        <div class="mb-2 col-md-4">
                            <input type="hidden" id="first_fileold" name="first_fileold" value="<?= $getData['first_file']?>" >
                            
                            <?php if(empty($getData['first_file'])){?>
                            <label class="d-block">Uploads<sup class="text-danger">*</sup></label>
                            <div class="d-flex">
                                <div>
                                    <input type="file" id="first_file" name="first_file" class="form-control-file" accept="application/pdf" >
                                    
                                </div>
                                
                            </div>
                            <?php }
                            else {?>
                            <label class="d-block">&nbsp;</label>
                            <div class="d-flex">
                                <a href="#"  class="btn btn-danger btn-sm" onclick="deleteFile('<?= $getData['id']?>',1)" >Delete</a>&nbsp;&nbsp;
                                <a href="<?= base_url()?><?= $getData['first_file']?>" target="_blank" class="btn btn-primary btn-sm">Preview</a>
                            </div>
                            <?php }?>
                        </div>
                    </div>
                    <div class="col-md-3 prizes-section mt-2" style="margin-left: -21px;">
                        <h4 class="m-2">Second Prize</h4>
                    </div>
                    <div class="row">
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Name of Paticipant</label>
                            <input type="text" class="form-control input-font" name="second_paticipant" id="second_paticipant" placeholder="Enter name" value="<?= $getData['second_paticipant']?>" >
                        </div>
                        <div class="mb-2 col-md-4">
                            <input type="hidden" id="second_fileold" name="second_fileold" value="<?= $getData['second_file']?>" >
                            <?php if(empty($getData['second_file'])){?>
                            <label class="d-block">Uploads<sup class="text-danger">*</sup></label>
                            <div class="d-flex">
                                <div>
                                    <input type="file" id="second_file" name="second_file" class="form-control-file" accept="application/pdf" >
                                    
                                </div>
                                
                            </div>
                            <?php }
                            else {?>
                            <label class="d-block">&nbsp;</label>
                            <div class="d-flex">
                                <a href="#"  class="btn btn-danger btn-sm" onclick="deleteFile('<?= $getData['id']?>',2)">Delete</a>&nbsp;&nbsp;
                                <a href="<?= base_url()?><?= $getData['second_file']?>" target="_blank" class="btn btn-primary btn-sm">Preview</a>
                            </div>
                            <?php }?>
                        </div>
                    </div>
                    <div class="col-md-3 prizes-section mt-2" style="margin-left: -21px;">
                        <h4 class="m-2">Third Prize</h4>
                    </div>
                    <div class="row">
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Name of Paticipants</label>
                            <input type="text" class="form-control input-font" name="third_paticipant" id="third_paticipant" placeholder="Enter name" value="<?= $getData['third_paticipant']?>" >
                        </div>
                        <div class="mb-2 col-md-4">
                            <input type="hidden" id="third_fileold" name="third_fileold" value="<?= $getData['third_file']?>" >
                            <?php if(empty($getData['third_file'])){?>
                            <label class="d-block">Uploads<sup class="text-danger">*</sup></label>
                            <div class="d-flex">
                                <div>
                                    <input type="file" id="third_file" name="third_file" class="form-control-file" accept="application/pdf" >
                                </div>  </div>
                                <?php }
                                else {?>
                                <label class="d-block">&nbsp;</label>
                                <div class="d-flex">
                                    <a href="#"   class="btn btn-danger btn-sm" onclick="deleteFile('<?= $getData['id']?>',3)">Delete</a>&nbsp;&nbsp;
                                    <a href="<?= base_url()?><?= $getData['third_file']?>" target="_blank" class="btn btn-primary btn-sm">Preview</a>
                                </div>
                                <?php }?>
                            </div>
                        </div>
                        <div class="col-md-3 prizes-section mt-2" style="margin-left: -21px;">
                            <h4 class="m-2">Consolation Prize</h4>
                        </div>
                        <div class="row">
                            <div class="mb-2 col-md-4">
                                <label class="d-block text-font">Name of Paticipant</label>
                                <input type="text" class="form-control input-font" name="consolation_paticipant" id="consolation_paticipant" placeholder="Enter name" value="<?= $getData['consolation_paticipant']?>" >
                            </div>
                            <div class="mb-2 col-md-4">
                                <input type="hidden" id="consolation_fileold" name="consolation_fileold" value="<?= $getData['consolation_file']?>" >
                                <?php if(empty($getData['consolation_file'])){?>
                                <label class="d-block">Uploads<sup class="text-danger">*</sup></label>
                                <div class="d-flex">
                                    <div>
                                        <input type="file" id="consolation_file" name="consolation_file" class="form-control-file" accept="application/pdf" >
                                    </div>
                                    
                                </div>
                                <?php }
                                else {?>
                                <label class="d-block">&nbsp;</label>
                                <div class="d-flex">
                                    <a href="#" class="btn btn-danger btn-sm" onclick="deleteFile('<?= $getData['id']?>',4)">Delete</a>&nbsp;&nbsp;
                                    <a href="<?= base_url()?><?= $getData['consolation_file']?>" target="_blank" class="btn btn-primary btn-sm">Preview</a>
                                </div>
                                <?php }?>
                            </div>
                        </div>
                        <div class="col-md-12 submit_btn p-3">
                            <a class="btn btn-success btn-sm text-white" id="btnsubmitdata">Update</a>
                            <a class="btn btn-danger btn-sm text-white cancel" data-bs-toggle="modal" data-bs-target="#cancelForm">Cancel</a>
                        </div>
                    </form>
                </div>
                
                
            </div>
            
        </div>
        
    </div>
    <!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
<script>
$(document).ready(function(){
$('.cancel').on('click',function(){
Swal.fire({
title: 'Do you want to cancel?',
showDenyButton: true,
showCancelButton: false,
confirmButtonText: 'cancel',
denyButtonText: `Close`,
}).then((result) => {
/* Read more about isConfirmed, isDenied below */
if (result.isConfirmed) {

window.location.href = "../create_standard_list";
} else if (result.isDenied) {
// Swal.fire('Changes are not saved', '', 'info')
}
})
})

});
$(document).ready(function(){
$('.submit').on('click',function(){
Swal.fire({
title: 'Do you want to Submit?',
showDenyButton: true,
showCancelButton: false,
confirmButtonText: 'Update',
denyButtonText: `Cancel`,
}).then((result) => {
/* Read more about isConfirmed, isDenied below */
if (result.isConfirmed) {

// Swal.fire('Saved!', '', 'success')
} else if (result.isDenied) {
// Swal.fire('Changes are not saved', '', 'info')
}
})
})

});
function deleteFile(id,delete_id) {

Swal.fire({
title: 'Do you want to Delete?',
showDenyButton: true,
showCancelButton: false,
confirmButtonText: 'Delete',
denyButtonText: `Cancel`,
}).then((result) =>
{
if (result.isConfirmed)
{
$.ajax({
type: 'POST',
url: '<?php echo base_url(); ?>standardswritting/deleteFile',
data: {
id: id,
delete_id: delete_id,
},
success: function(result)
{
Swal.fire('Saved!', '', 'success');
location.reload();
},
error: function(result)
{
alert("Error,Please try again.");
}
});
}
})
}
</script>

<script type="text/javascript">
$('#btnsubmitdata').click(function(e) {
e.preventDefault();
var focusSet = false;
var allfields = true;
var standard_club = $("#standard_club").val();
if (standard_club == "" || standard_club== null) {
if ($("#standard_club").next(".validation").length == 0) // only add if not added
{
$("#standard_club").after("<div class='validation' style='color:red;margin-bottom:15px;'>thise value is required</div>");
}
if (!focusSet) { $("#standard_club").focus(); }
allfields = false;
} else {
$("#standard_club").next(".validation").remove(); // remove it
}
var topic_of_activity = $("#topic_of_activity").val();
if (topic_of_activity == "" || topic_of_activity== null) {
if ($("#topic_of_activity").next(".validation").length == 0) // only add if not added
{
$("#topic_of_activity").after("<div class='validation' style='color:red;margin-bottom:15px;'>thise value is required</div>");
}
if (!focusSet) { $("#topic_of_activity").focus(); }
allfields = false;
} else {
$("#topic_of_activity").next(".validation").remove(); // remove it
}
var date_of_activity = $("#date_of_activity").val();
if (date_of_activity == "" || date_of_activity== null) {
if ($("#date_of_activity").next(".validation").length == 0) // only add if not added
{
$("#date_of_activity").after("<div class='validation' style='color:red;margin-bottom:15px;'>thise value is required</div>");
}
if (!focusSet) { $("#date_of_activity").focus(); }
allfields = false;
} else {
$("#date_of_activity").next(".validation").remove(); // remove it
}
var number_of_participants = $("#number_of_participants").val();
if (number_of_participants == "" || number_of_participants== null) {
if ($("#number_of_participants").next(".validation").length == 0) // only add if not added
{
$("#number_of_participants").after("<div class='validation' style='color:red;margin-bottom:15px;'>thise value is required</div>");
}
if (!focusSet) { $("#number_of_participants").focus(); }
allfields = false;
} else {
$("#number_of_participants").next(".validation").remove(); // remove it
}
var first_paticipant = $("#first_paticipant").val();
if (first_paticipant == "" || first_paticipant== null) {
if ($("#first_paticipant").next(".validation").length == 0) // only add if not added
{
$("#first_paticipant").after("<div class='validation' style='color:red;margin-bottom:15px;'>thise value is required</div>");
}
if (!focusSet) { $("#first_paticipant").focus(); }
allfields = false;
} else {
$("#first_paticipant").next(".validation").remove(); // remove it
}
 
var first_file=$("#first_file").val();
var firstfile= '<?= $getData["first_file"]?>';
if (firstfile=='' || firstfile=='NA') {
if (first_file == "" || first_file== null) {
if ($("#first_file").next(".validation").length == 0) // only add if not added
{
$("#first_file").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please Upload file </div>");
}
if (!focusSet) { $("#first_file").focus(); }
allfields = false;
} else {
$("#first_file").next(".validation").remove(); // remove it
}


if ($("#first_file").val() != '')
{
console.log("hi");
var fileSize = $('#first_file')[0].files[0].size;
$("#first_file").next(".validation").remove();
if (fileSize > 41943040)
{
if ($("#first_file").next(".validation").length == 0) // only add if not added
{
$("#first_file").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please select  file of size less than 5 MB </div>");
}
allfields = false;
if (!focusSet) {
$("#first_file").focus();
}
}
else
{
$("#first_file").next(".validation").remove(); // remove it
}
var validExtensions = ['pdf','PDF']; //array of valid extensions
var fileName = $("#first_file").val();;
var fileNameExt = fileName.substr(fileName.lastIndexOf('.') + 1);
$("#first_file").next(".validation").remove();
if ($.inArray(fileNameExt, validExtensions) == -1)
{
if ($("#first_file").next(".validation").length == 0) // only add if not added
{
$("#first_file").after("<div class='validation' style='color:red;margin-bottom:15px;'>Only .PDF  file allowed. </div>");
}
allfields = false;
if (!focusSet)
{
$("#first_file").focus();
}
}
else
{
$("#first_file").next(".validation").remove(); // remove it
}
}
}
//second
 


if ($("#second_file").val() != '')
{
var fileSize = $('#second_file')[0].files[0].size;
$("#second_file").next(".validation").remove();
if (fileSize > 41943040)
{
if ($("#second_file").next(".validation").length == 0) // only add if not added
{
$("#second_file").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please select  file of size less than 5 MB </div>");
}
allfields = false;
if (!focusSet) {
$("#second_file").focus();
}
}
else
{
$("#second_file").next(".validation").remove(); // remove it
}
var validExtensions = ['pdf','PDF']; //array of valid extensions
var fileName = $("#second_file").val();;
var fileNameExt = fileName.substr(fileName.lastIndexOf('.') + 1);
$("#second_file").next(".validation").remove();
if ($.inArray(fileNameExt, validExtensions) == -1)
{
if ($("#second_file").next(".validation").length == 0) // only add if not added
{
$("#second_file").after("<div class='validation' style='color:red;margin-bottom:15px;'>Only .PDF  file allowed. </div>");
}
allfields = false;
if (!focusSet)
{
$("#second_file").focus();
}
}
else
{
$("#second_file").next(".validation").remove(); // remove it
}
}
 
//third
 
if ($("#third_file").val() != '')
{
var fileSize = $('#third_file')[0].files[0].size;
$("#third_file").next(".validation").remove();
if (fileSize > 41943040)
{
if ($("#third_file").next(".validation").length == 0) // only add if not added
{
$("#third_file").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please select  file of size less than 5 MB </div>");
}
allfields = false;
if (!focusSet) {
$("#third_file").focus();
}
}
else
{
$("#third_file").next(".validation").remove(); // remove it
}
var validExtensions = ['pdf','PDF']; //array of valid extensions
var fileName = $("#third_file").val();;
var fileNameExt = fileName.substr(fileName.lastIndexOf('.') + 1);
$("#third_file").next(".validation").remove();
if ($.inArray(fileNameExt, validExtensions) == -1)
{
if ($("#third_file").next(".validation").length == 0) // only add if not added
{
$("#third_file").after("<div class='validation' style='color:red;margin-bottom:15px;'>Only .PDF  file allowed. </div>");
}
allfields = false;
if (!focusSet)
{
$("#third_file").focus();
}
}
else
{
$("#third_file").next(".validation").remove(); // remove it
}
}

//consolation
 


if ($("#consolation_file").val() != '')
{
var fileSize = $('#consolation_file')[0].files[0].size;
$("#consolation_file").next(".validation").remove();
if (fileSize > 41943040)
{
if ($("#consolation_file").next(".validation").length == 0) // only add if not added
{
$("#consolation_file").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please select  file of size less than 5 MB </div>");
}
allfields = false;
if (!focusSet) {
$("#consolation_file").focus();
}
}
else
{
$("#consolation_file").next(".validation").remove(); // remove it
}
var validExtensions = ['pdf','PDF']; //array of valid extensions
var fileName = $("#consolation_file").val();;
var fileNameExt = fileName.substr(fileName.lastIndexOf('.') + 1);
$("#consolation_file").next(".validation").remove();
if ($.inArray(fileNameExt, validExtensions) == -1)
{
if ($("#consolation_file").next(".validation").length == 0) // only add if not added
{
$("#consolation_file").after("<div class='validation' style='color:red;margin-bottom:15px;'>Only .PDF  file allowed. </div>");
}
allfields = false;
if (!focusSet)
{
$("#consolation_file").focus();
}
}
else
{
$("#consolation_file").next(".validation").remove(); // remove it
}
}

if (allfields) {
Swal.fire({
title: 'Do you want to Update?',
showDenyButton: true,
showCancelButton: false,
confirmButtonText: 'Update',
denyButtonText: `Cancel`,
}).then((result) => {
if (result.isConfirmed) {
$('#create_standard_edit').submit();
} else if (result.isDenied) {

}
})
} else {
$('#closeform').trigger('click');
return false;
}
});</script>

<script type="text/javascript">

function getStandardClub () {
    var branch_id = $("#branch_id").val();
var dept_id = $("#dept_id").val();

var focusSet = false;
var allfields = true; 
if (branch_id == "" || branch_id== null) {
if ($("#branch_id").next(".validation").length == 0) // only add if not added
{
$("#branch_id").after("<div class='validation' style='color:red;margin-bottom:15px;'>This value is required</div>");
}
if (!focusSet) { $("#branch_id").focus(); }
allfields = false;
} else {
$("#branch_id").next(".validation").remove(); // remove it
}

if (dept_id == "" || dept_id== null) {
if ($("#dept_id").next(".validation").length == 0) // only add if not added
{
$("#dept_id").after("<div class='validation' style='color:red;margin-bottom:15px;'>This value is required</div>");
}
if (!focusSet) { $("#dept_id").focus(); }
allfields = false;
} else {
$("#dept_id").next(".validation").remove(); // remove it
}
if (allfields) {
     $.ajax({
        url: "<?= base_url() ?>standardswritting/getStandardClub",
        data: {'branch_id':branch_id,'dept_id':dept_id},
        type: "JSON",
        method: "post",
        success: function(StdClb) 
        {
            var res = JSON.parse(StdClb);
            console.log(res.result)
            if (res.result=='success') {
            var stringToAppend = "<option disabled selected value=''> Select Standard Club</option> ";
            $.each(res.data, function (key, val) {
                stringToAppend += "<option value='" + val.StdClubName + "'>" + val.StdClubName + "</option>";
            });
            $("#standard_club").html(stringToAppend);
        }
        else
        {
            $("#standard_club").html('');
    Swal.fire({
    title: 'Data Not Found ?',
    showDenyButton: false,
    showCancelButton: false,
    confirmButtonText:'Back', 
  }).then((result) => { 
    if (result.isConfirmed) 
    { 
       
    }  
  })
        }
        }
    });
 }
 }

  </script>