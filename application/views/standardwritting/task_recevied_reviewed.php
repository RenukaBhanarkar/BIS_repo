<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Task Recevied for Review</h1>
        <!-- <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url().'Admin/dashboard';?>" >Admin Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'Admin/task_recevied_list';?>" >Task Recevied for Review</a></li>
                <li class="breadcrumb-item active" aria-current="page">Task Recevied for Review</li>
                
            </ol>
        </nav> -->
    </div>
    <!-- Content Row -->
    <div class="row">
        <div class="col-12 mt-3">
            <div class="card border-top">
                <div class="card-body">
                    <div class="row">
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Competition Id</label>
                            <div>
                                <p><?=$getData['comp']?></p>
                            </div>
                        </div>
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Title of Competition</label>
                            <div>
                                <p><?=$getData['title']?></p>
                            </div>
                        </div>
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Submission Id</label>
                            <div>
                                <p><?=$getData['id']?></p>
                            </div>
                        </div>
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Class</label>
                            <div>
                                <p><?=$getData['standard']?></p>
                            </div>
                        </div>
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Submission Date & Time</label>
                            <div>
                                <p><?= date("d-m-Y h:i:s", strtotime($getData['created_on']));?></p>
                            </div>
                        </div>
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Name of Evaluator</label>
                            <div>
                                <p>Name of Evaluator</p>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="card-header p-2" style="background-color: #cdd4e0; text-align: center;">
                    <h4 class="m-0">Task Details</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Submission Details</label>
                            <div>
                                <p><?=$getData['details']?></p>
                            </div>
                        </div>
                    </div>
                    <?php if ($getData['status']==2 || $getData['status']==3) {?>

                    <div class="row">
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Score</label>
                            <div>
                                <p><?=$getData['score']?></p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Comment</label>
                            <div>
                                <p><?=$getData['comment']?></p>
                            </div>
                        </div>
                    </div>
                         <?php }?>

                    <?php if ($getData['status']==1) {?> 
                   
                    <div class="row">
                        <div class="mb-2 col-md-2">
                            <label class="d-block text-font">Score<sup class="text-danger">*</sup></label>
                            <div class="d-flex">
                                <input type="text" class="form-control input-font" name="score" id="score" placeholder="Enter Score" oninput="this.value = this.value.replace(/[^0-9]/, '')" ><span style="font-size: 20px; padding-left: 8px; margin-top: 3px;" > /<?= $getData['total_mark']?></span>
                            </div>
                            <span class="text-danger" id="err_score"></span>
                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-2 col-md-12">
                            <label class="d-block text-font">Comment</label>
                            <div class="d-flex">
                                <textarea type="text" class="form-control input-font" name="comment" id="comment" placeholder="Comments"></textarea>
                            </div>
                            <span class="text-danger" id="err_comment"></span>
                        </div>
                    </div>
                     <?php }?>
                 </div>

                <div class="col-md-12 submit_btn p-3">

                     <?php if ($getData['status']==1) {?> 
                     <a href="#" class="btn btn-success btn-sm mr-2" onclick="updateStatus()" >Submit</a>

                    <a class="btn btn-danger btn-sm text-white cancel">Cancel</a>
                     <?php }?>
                     <button onclick="history.back()"  class="btn btn-success btn-sm mr-2"> Back</button>
                    
                </div>
                
            </div>
        </div>
    </div>
</div>
<script>
$('.cancel').on('click',function(){
Swal.fire({
title: 'Are you sure you want to Cancel?',
showDenyButton: true,
showCancelButton: false,
confirmButtonText: 'Cancel',
denyButtonText: `Close`,
}).then((result) => {
if (result.isConfirmed) {
window.location.replace('<?php echo base_url().'quiz/quiz_list' ?>');
} else if (result.isDenied) {
}
})
})
$('.submit').on('click',function(){
Swal.fire({
title: 'Are you sure you want to Submit?',
showDenyButton: true,
showCancelButton: false,
confirmButtonText: 'Cancel',
denyButtonText: `Close`,
}).then((result) => {
if (result.isConfirmed) {
// window.location.replace('<?php echo base_url().'quiz/quiz_list' ?>');
} else if (result.isDenied) {
}
})
})
</script>
<script>
  function updateStatus() { 

    var focusSet = false;
        var allfields = true;
        var score = $("#score").val();

        if (score == "" || score == null) {
            if ($("#score").next(".validation").length == 0) {
                $("#err_score").after("<div class='validation' style='color:red;margin-bottom:15px;'>This value is required. </div>");
            }
            if (!focusSet) {
                $("#score").focus();
            }
            allfields = false;
        } else {
            $("#score").next(".validation").remove();
        }

        var comment = $("#comment").val();

        if (comment == "" || comment == null) {
            if ($("#comment").next(".validation").length == 0) {
                $("#err_comment").after("<div><div class='validation' style='color:red;margin-bottom:15px;'>This value is required. </div></div>");
            }
            if (!focusSet) {
                $("#comment").focus();
            }
            allfields = false;
        } else {
            $("#comment").next(".validation").remove();
        }
        if (allfields) {

            var id="<?=$getData['id']?>"; 
            var comp_id="<?=$getData['comp_id']?>"; 

    Swal.fire({
      title: 'Do you want to Submit ?',
      showDenyButton: true,
      showCancelButton: false,
      confirmButtonText: 'Submit',
      denyButtonText: `Cancel`,
    }).then((result) => 
    { 
      if (result.isConfirmed) 
      { 
        $.ajax({
        type: 'POST',
        url: '<?php echo base_url(); ?>standardswritting/updateScore',
        data: {
          id: id,
          comp_id: comp_id,
          score: score, 
          comment: comment, 
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
  }
 </script>