<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Competition View</h1>
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url().'Admin/dashboard';?>" >Sub Admin Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'Admin/dashboard';?>" >Sub Admin Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'admin/exchange_forum';?>" >Exchange Forum</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'quiz/organizing_quiz';?>" >Competition</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'Standardswritting/standard_offline_dashboard';?>" >Standard Writting Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'Standardswritting/standard_online_dashboard';?>" >Standard Writting</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'Standardswritting/create_online_list';?>" >Competition</a></li>
                <!-- <li class="breadcrumb-item active" aria-current="page">Create New Competition</li> -->
                
            </ol>
        </nav>
    </div>
    <!-- Content Row -->
    <div class="row">
        <div class="col-12 mt-3">
            <div class="card border-top">
                <div class="card-body">
                    <div class="row">
                        
                        <div class="mb-2 col-md-12">
                            <label class="d-block text-font">Title of Competition</label>
                            <div>
                                <p><?=$getData['title']?></p>
                            </div>
                        </div>
                        <div class="mb-2 col-md-12">
                            <label class="d-block text-font">Title of Competition in Hindi</label>
                            <div>
                                <p><?=$getData['title_hindi']?></p>
                            </div>
                        </div>
                        <div class="mb-2 col-md-12">
                            <label class="d-block text-font">Description/About Competition</label>
                            <div>
                                <p><?=$getData['description']?></p>
                            </div>
                        </div>
                        <div class="mb-2 col-md-12">
                            <label class="d-block text-font">Terms & Conditions</label>
                            <div>
                                <p><?=$getData['terms_conditions']?></p>
                            </div>
                        </div>
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Start Date</label>
                            <div>
                                <p><?= date("d-m-Y", strtotime($getData['start_date']));?></p>
                            </div>
                        </div>
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Start Time</label>
                            <div>
                                <p><?=$getData['start_time']?></p>
                            </div>
                        </div>
                        
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">End Date</label>
                            <div>
                                <p><?= date("d-m-Y", strtotime($getData['end_date']));?></p>
                            </div>
                        </div>
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">End Time</label>
                            <div>
                                <p><?=$getData['end_time']?></p>
                            </div>
                        </div>
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Upload Banner</label>
                            <div>
                                <p><img src="<?=base_url()?><?=$getData['banner_img']?>" alt="" width="60%"></p>
                            </div>
                        </div>
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Total Marks</label>
                            <div>
                                <p><?=$getData['total_mark']?></p>
                            </div>
                        </div>
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Qualifying Marks</label>
                            <div>
                                <p><?=$getData['qualifying_mark']?></p>
                            </div>
                        </div>
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Level of Competition</label>
                            <div>
                                <p><?=$getData['level']?></p>
                            </div>
                        </div>
                        <?php if(!empty($getData['region'])) {?>
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">region</label>
                            <div>
                                <p><?=$getData['region']?></p>
                            </div>
                        </div>
                        <?php }?>
                        <?php if(!empty($getData['branch'])) {?>
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Branch</label>
                            <div>
                                <p><?=$getData['branch']?></p>
                            </div>
                        </div>
                        <?php }?>
                        <?php if(!empty($getData['state'])) {?>
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">state</label>
                            <div>
                                <p><?=$getData['state']?></p>
                            </div>
                        </div>
                        <?php }?>
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Availabile for</label>
                            <div>
                                <p><?=$getData['availability']?></p>
                            </div>
                        </div>
                        <?php if(!empty($getData['availability_id']==1)) {?>
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Class</label>
                            <div>
                                <span class="quiz-text-date m-2">
                                    <?php  $class = explode(",",$getData['standard']);
                                    foreach ($class as $classdata)
                                    {?>
                                    <?=$classdata?><sup>th</sup>,
                                    <?php } ?>
                                </span>
                            </div>
                        </div>
                        <?php }?>
                    </div>
                </div>
                <div class="card-header p-2" style="background-color: #cdd4e0; text-align: center;">
                    <h4 class="m-0">Prize Details</h4>
                </div>
                <div class="card-body">
                    <div class="row mt-2">
                        <div class="col-md-4 prizes-section">
                            <h4 class="m-2">1<sup>st</sup> Prize</h4>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="mb-2 col-md-4 ">
                            <label class="d-block text-font">Number of Prize</label>
                            <div>
                                <p><?=$getData['fprize']?></p>
                            </div>
                        </div>
                        <div class="mb-2 col-md-4 ">
                            <label class="d-block text-font">Name of Prize</label>
                            <div>
                                <p><?=$getData['fdetails']?></p>
                            </div>
                        </div>
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Prize Image</label>
                            <div>
                                <p>
                                    <?php if (!empty($getData['fprize_img'])){ ?>
                                        <img src="<?php echo base_url(); ?><?=$getData['fprize_img']?>" alt="#" width="60%">
                                    <?php } else {?>
                                         <img src="<?php echo base_url(); ?>assets/images/winners.jpg" alt="" class="join_img"width="20%">

                                        <?php } ?> 
                                    </p>
                            </div>
                        </div>
                            
                        

                    </div>
                    <?php if (!empty($getData['sprize'])): ?>
                    <div class="row mt-2">
                        <div class="col-md-4 prizes-section">
                            <h4 class="m-2">2<sup>nd</sup>Prizes</h4>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Number of Prize</label>
                            <div>
                                <p><?=$getData['sdetails']?></p>
                            </div>
                        </div>
                        <div class="mb-2 col-md-4 ">
                            <label class="d-block text-font">Name of Prize</label>
                            <div>
                                <p><?=$getData['sprize']?></p>
                            </div>
                        </div>

                        <?php if (!empty($getData['sprize_img'])): ?>
                             <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Prize Image</label>
                            <div>

                                <p>
                                    <?php if (!empty($getData['sprize_img'])){ ?>
                                        <img src="<?php echo base_url(); ?><?=$getData['sprize_img']?>" alt="#" width="60%">
                                    <?php } else {?>
                                         <img src="<?php echo base_url(); ?>assets/images/winners.jpg" alt="" class="join_img"width="20%">

                                        <?php } ?> 
                                    </p> 
                            </div>
                        </div>
                            
                        <?php endif ?>


                       
                    </div>
                    
                    <?php endif ?>
                    <?php if (!empty($getData['tprize'])): ?>
                    
                    <div class="row mt-2">
                        <div class="col-md-4 prizes-section">
                            <h4 class="m-2">3<sup>nd</sup>Prizes</h4>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Number of Prize</label>
                            <div>
                                <p><?=$getData['tprize']?></p>
                            </div>
                        </div>
                        <div class="mb-2 col-md-4 ">
                            <label class="d-block text-font">Name of Prize</label>
                            <div>
                                <p><?=$getData['tdetails']?></p>
                            </div>
                        </div>

                          <?php if (!empty($getData['tprize_img'])): ?>
                            <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Prize Image</label>
                            <div>

                                <p>
                                    <?php if (!empty($getData['tprize_img'])){ ?>
                                        <img src="<?php echo base_url(); ?><?=$getData['tprize_img']?>" alt="#" width="60%">
                                    <?php } else {?>
                                         <img src="<?php echo base_url(); ?>assets/images/winners.jpg" alt="" class="join_img"width="20%">

                                        <?php } ?> 
                                    </p>

                            </div>
                        </div>
                            
                        <?php endif ?>


                        
                    </div>
                    <?php endif ?>
                    <?php if (!empty($getData['cprize'])): ?>
                    <div class="row mt-2">
                        <div class="col-md-4 prizes-section">
                            <h4 class="m-2">Consolation Prizes</h4>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Number of Prize</label>
                            <div>
                                <p><?=$getData['cprize']?></p>
                            </div>
                        </div>
                        <div class="mb-2 col-md-4 ">
                            <label class="d-block text-font">Name of Prize</label>
                            <div>
                                <p><?=$getData['tdetails']?></p>
                            </div>
                        </div> 
                        <?php if (!empty($getData['cprize_img'])) {?>
                             <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Prize Image</label>
                            <div>

                                 <p>
                                    <?php if (!empty($getData['cprize_img'])){ ?>
                                        <img src="<?php echo base_url(); ?><?=$getData['cprize_img']?>" alt="#" width="60%">
                                    <?php } else {?>
                                         <img src="<?php echo base_url(); ?>assets/images/winners.jpg" alt="" class="join_img"width="20%">

                                        <?php } ?> 
                                    </p>

                                 
                            </div>
                        </div>
                        <?php } ?>
                       
                    </div>
                    <?php endif ?>
                    
                    
                    <div class="col-md-12 submit_btn p-3">
                        <?php if (encryptids("D", $_SESSION['admin_type']) == 2) { ?>
                        <?php if( $getData['status']==2){?>
                        <input type="submit" name="Approval" value="Approve" class="btn btn-success btn-sm text-white" id="approve" onclick="updateStatus() ">
                        <!-- <input type="submit" name="Approval" value="Submit" class="btn btn-success btn-sm text-white" id="submit" onclick="updateStatus() "> -->
                        <!-- <a class="btn btn-primary btn-sm text-white" id="reject" onclick="rejectFun()">Reject</a> -->
                        <a class="btn btn-secondary btn-sm text-white" data-toggle="modal" data-target="#rejectForm" id="reject"onclick="rejectFun()" >Reject</a>
                        <?php } ?>
                        <?php } ?>
                        <button onclick="history.back()" class="btn btn-primary btn-sm text-white">Back</button>
                    </div>
                    
                    
                </div>
                
                <!-- Modal -->
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="rejectForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Reject Quiz</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <textarea class="form-control input-font" placeholder="Enter Reason" name="remark" id="remark"></textarea>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="updateStatus2()" id="rejectBtn">Reject</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
 $(document).ready(function () 
    {  
        $("#submit").hide();
        $("#remarkdiv").hide();
        $("#remark").val(" ");
    });
    function rejectFun()
     { 
        $("#remarkdiv").show(); 
        $("#status_id").val(4);
        $("#remark").val('');

    }
function updateStatus2() {
status=$("#status_id").val();
remark=$("#remark").val();
id="<?=$getData['id']?>";
var remark = $('#remark').val();
allfields = true;

if (remark == "" || remark == null || remark.length == 0) {
if ($("#remark").next(".validation").length == 0) {
$("#remark").after("<div class='validation' style='color:red;margin-bottom:15px;'>This value is required. </div>");
}
if (!focusSet) {
$("#remark").focus();
}
allfields = false;
} else {
$("#remark").next(".validation").remove();
}
if(allfields){
$.ajax({
type: 'POST',
url: '<?php echo base_url(); ?>standardswritting/updateOnlineStatusAdmin',
data: {
id: id,
status: 4,
remark: remark,
},
success: function(result)
{
Swal.fire('Saved!', '', 'success');
// location.reload();
history.back();
},
error: function(result)
{
alert("Error,Please try again.");
}
});
}
}
function updateStatus(data) {
status=$("#status_id").val();
remark=$("#remark").val();
id="<?=$getData['id']?>";
 
Swal.fire({
title: 'Do you want to Approve  ? ',
showDenyButton: true,
showCancelButton: false,
confirmButtonText: 'Approve',
denyButtonText: `Cancel`,
}).then((result) =>
{
if (result.isConfirmed)
{
$.ajax({
type: 'POST',
url: '<?php echo base_url(); ?>standardswritting/updateOnlineStatusAdmin',
data: {
id: id,
status: 3,
remark: '',
},
success: function(result)
{
Swal.fire('Saved!', '', 'success');
// location.reload();
history.back();
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