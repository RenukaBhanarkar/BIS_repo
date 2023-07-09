<div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Join the Class Room</h1>
                        
                    </div>
<!-- Content Row -->
                    <div class="row"> 
                        <div class="col-12 mt-3">
                        <div class="card border-top">
                           <div class="card-body"> 
                            <div class="row">
                               <div class="mb-2 col-md-12">
                                    <label class="d-block text-font">Type of Post</label>
                                    <div>
                                        <p> 
                                            <?php 
                                            if ($liveSession['type_of_post']==1) {  $data='Text Upload'; }
                                            if ($liveSession['type_of_post']==2) { $data='Video Upload'; }
                                            if ($liveSession['type_of_post']==3) { $data='Live session link'; }
                                            echo  $data;
                                            ?> 
                                        </p>
                                    </div>    
                                </div>
                            </div>    
                            <div class="row">   
                                <div class="mb-2 col-md-12">
                                    <label class="d-block text-font">Title</label>
                                    <div>
                                        <p><?= $liveSession['title']?></p>
                                    </div>    
                                </div>
                            </div>
                            <div class="row">   
                                <div class="mb-2 col-md-12">
                                    <label class="d-block text-font">Description</label>
                                    <div>
                                        <p><?= $liveSession['description']?></p>
                                    </div>    
                                </div>
                            </div>
                            <div class="row">   
                                    <div class="mb-2 col-md-4">
                                        <label class="d-block text-font">Thumbnail</label>
                                        <div>
                                            <img src="<?= base_url()?><?= $liveSession['thumbnail']?>" alt="#" class=""style="width: 200px;">
                                        </div> 
                                    </div>
                                

                             <?php 
                             if ($liveSession['type_of_post']==1) { ?>
                                  
                                    <div class="mb-2 col-md-4">
                                        <label class="d-block text-font">Image</label>
                                        <div>
                                            <img src="<?= base_url()?><?= $liveSession['image']?>" alt="#" class="" style="width: 200px;">
                                        </div> 
                                    </div>
                                    </div>

                                    <?php if(!empty($liveSession['doc_pdf'])){?>
                                        <div class="row">   
                                    <div class="mb-2 col-md-12">
                                        <!-- <label class="d-block text-font">View PDF</label> -->
                                        <div> 
                                            <a href="<?= base_url()?><?= $liveSession['doc_pdf']?>" class="btn btn-primary" target="_blank">View Details</a>
                                        </div> 
                                    </div>
                                </div>

                                    <?php } ?>

                                

                            <?php }?>
                            <?php   if ($liveSession['type_of_post']==2) { 
                           if ($liveSession['option']==1) {?>
                            <div class="row">   
                                <div class="mb-2 col-md-12">
                                    <label class="d-block text-font">Video</label>
                                    <div>
                                    <video width="100%" height="100%" controls>
                                            <source src="<?= base_url()?><?= $liveSession['video']?>" type="video/mp4">
                                            <source src="movie.ogg" type="video/ogg">
                                            </video>
                                    </div>    
                                </div>
                            </div>


                            <?php } if ($liveSession['option']==2) {?>  
                                
                            <div class="row">   
                                    <div class="mb-2 col-md-12">
                                        <label class="d-block text-font btn-sm"> Viedo Link</label>
                                        <div> 
                                            <a href="<?= $liveSession['video_url']?>" class="btn btn-primary btn-sm" target="_blank">Click Here</a>
                                        </div> 
                                    </div>
                                </div>
                            <?php } } ?> 
                        <?php 
                        if ($liveSession['type_of_post']==3) { ?>
                            <div class="row">   
                                <div class="mb-2 col-md-12">
                                    <label class="d-block text-font">Live Session Link</label>
                                    <div>
                                        <p>
                                            <a href="<?= $liveSession['session_link']?>"><?= $liveSession['session_link']?></a></p>
                                    </div>    
                                </div>
                            </div>

                        <?php } ?>

                       <div class="col-md-12 submit_btn p-3">
                        <?php if (encryptids("D", $_SESSION['admin_type']) == 2) { ?>
                        <?php if( $liveSession['status']==2){?>
                        <input type="submit" name="Approval" value="Approve" class="btn btn-success btn-sm text-white" id="approve" onclick="updateStatus() ">
                        
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
                <h5 class="modal-title" id="exampleModalLabel">Reject Reasone</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <textarea class="form-control input-font" placeholder="Enter Reason" name="reason" id="reason"></textarea>
                
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
        $("#reasondiv").hide();
        $("#reason").val(" ");
    });
    function rejectFun()
     { 
        $("#reasondiv").show(); 
        $("#status_id").val(4);
        $("#reason").val('');

    }
function updateStatus2() {
status=$("#status_id").val();
reason=$("#reason").val();
id="<?=$liveSession['id']?>";
var reason = $('#reason').val();
allfields = true;

if (reason == "" || reason == null || reason.length == 0) {
if ($("#reason").next(".validation").length == 0) {
$("#reason").after("<div class='validation' style='color:red;margin-bottom:15px;'>This value is required. </div>");
}
if (!focusSet) {
$("#reason").focus();
}
allfields = false;
} else {
$("#reason").next(".validation").remove();
}
if(allfields){
$.ajax({
type: 'POST',
url: '<?php echo base_url(); ?>admin/updateLiveAdmin',
data: {
id: id,
status: 4,
reason: reason,
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
reason=$("#reason").val();
id="<?=$liveSession['id']?>";
 
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
url: '<?php echo base_url(); ?>admin/updateLiveAdmin',
data: {
id: id,
status: 3,
reason: '',
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