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
                                <p><?=$getData['created_on']?></p>
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
                            <label class="d-block text-font">Indian Standard</label>
                            <div>
                                <p><?=$getData['indian_standard']?></p>
                            </div>
                        </div>
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">IS No.nnnnn</label>
                            <div>
                                <p><?=$getData['is_no']?></p>
                            </div>
                        </div>
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Product</label>
                            <div>
                                <p><?=$getData['product']?></p>
                            </div>
                        </div>
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Name & Address</label>
                            <div>
                                <p><?=$getData['name_address']?></p>
                            </div>
                        </div>
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Mar 2022 Price</label>
                            <div>
                                <p><?=$getData['price']?></p>
                            </div>
                        </div>
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Foreword</label>
                            <div>
                                <p><?=$getData['foreword']?></p>
                            </div>
                        </div>
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">IS No. nnnnn :yyyy Title of the Standard (Product - Specification)</label>
                            <div>
                                <p><?=$getData['product_specification']?></p>
                            </div>
                        </div>
                        <div class="mb-2 col-md-12">
                            <label class="d-block text-font">Scope</label>
                            <div>
                                <p><?=$getData['scope']?></p>
                            </div>
                        </div>
                        <div class="mb-2 col-md-12">
                            <label class="d-block text-font">References</label>
                            <div>
                                <p><?=$getData['reference']?></p>
                            </div>
                        </div>
                        <div class="mb-2 col-md-12">
                            <label class="d-block text-font">DEFINITIONS</label>
                            <div>
                                <p><?=$getData['defination']?></p>
                            </div>
                        </div>
                        <div class="mb-2 col-md-12">
                            <label class="d-block text-font">GRADES, TYPES AND CLASSES</label>
                            <div>
                                <p><?=$getData['classes']?></p>
                            </div>
                        </div>
                        <div class="mb-2 col-md-12">
                            <label class="d-block text-font">MANUFACTURE</label>
                            <div>
                                <p><?=$getData['manufacture']?></p>
                            </div>
                        </div>
                        <div class="mb-2 col-md-12">
                            <label class="d-block text-font">REQUIREMENTS</label>
                            <div>
                                <p><?=$getData['requirements']?></p>
                            </div>
                        </div>
                        <div class="mb-2 col-md-12">
                            <label class="d-block text-font">SAMPLING</label>
                            <div>
                                <p><?=$getData['sampling']?></p>
                            </div>
                        </div>
                        <div class="mb-2 col-md-12">
                            <label class="d-block text-font">METHODS OF TESTS for various Requirements</label>
                            <div>
                                <p><?=$getData['methods']?></p>
                            </div>
                        </div>
                        <div class="mb-2 col-md-12">
                            <label class="d-block text-font">PACKING AND PACKAGING</label>
                            <div>
                                <p><?=$getData['packing']?></p>
                            </div>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="mb-2 col-md-2">
                            <label class="d-block text-font">Score<sup class="text-danger">*</sup></label>
                            <div class="d-flex">
                                <input type="text" class="form-control input-font" name="score" id="score" placeholder="Enter Score" ><span style="font-size: 20px; padding-left: 8px; margin-top: 3px;" >/100</span>
                                
                            </div>
                            
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
                    
                </div>
                <div class="col-md-12 submit_btn p-3">
                    <a class="btn btn-success btn-sm text-white submit">Submit</a>
                    <a class="btn btn-danger btn-sm text-white cancel">Cancel</a>
                    
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