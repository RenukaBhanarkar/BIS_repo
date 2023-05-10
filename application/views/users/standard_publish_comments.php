<style>
.proposal_view {
position: relative;
display: flex;
flex-direction: column;
min-width: 0;
word-wrap: break-word;
background-color: #fff;
background-clip: border-box;
border: 1px solid #e3e6f0;
border-radius: 0.35rem;
border-top: 3px solid #2957a3!important;
}
</style>
<link href="<?php echo base_url();?>assets/admin/css/jquery.dataTables.min.css" rel="stylesheet">
<!-- Begin Page Content -->
<div class="container">
    <!-- Content Row -->
    
    <div class="row mt-5">
        <div class="bloginfo">
            <h3 style="margin-bottom: 0px;margin-top:20px;color: #0086b2!important;font-weight: 600;">Important Draft Standards View</h3>
        </div>
        <div class="heading-underline" style="width: 200px;">
            <div class="left"></div><div class="right"></div>
        </div>
        <div class="proposal_view mb-5">
            <div class="col-12 mt-3">
                <div class="row">
                    <div class="mb-2 col-md-4">
                        <label class="d-block text-font" style="font-weight: 600;">pk is id</label>
                        <div>
                            <p><?= $getData['pk_is_id']?></p>
                        </div>
                    </div>
                    <div class="mb-2 col-md-4">
                        <label class="d-block text-font" style="font-weight: 600;">Is Number</label>
                        <div>
                            <p><?= $getData['IsNumber']?></p>
                        </div>
                    </div>
                    <div class="mb-2 col-md-4">
                        <label class="d-block text-font" style="font-weight: 600;">is title</label>
                        <div>
                            <p><?= $getData['is_title']?></p>
                        </div>
                    </div>
                     
                    <div class="mb-2 col-md-4">
                        <label class="d-block text-font" style="font-weight: 600;">Committee Id</label>
                        <div>
                            <p><?= $getData['commttid']?></p>
                        </div>
                    </div>
                    <div class="mb-2 col-md-4">
                        <label class="d-block text-font" style="font-weight: 600;">dep Name</label>
                        <div>
                            <p><?= $getData['depName']?></p>
                        </div>
                    </div>
                    <div class="mb-2 col-md-4">
                        <label class="d-block text-font" style="font-weight: 600;">Date Of Publish</label>
                        <div>
                            <p><?= $getData['date_of_published']?></p>
                        </div>
                    </div>
                    
                </div>
                
            </div>
            <div class="col-md-12 submit_btn p-3" style="text-align: end;">
                <a class="btn btn-primary btn-sm text-white" onclick="location.href='<?php echo base_url();?>users/important_draft_list'">Back</a>
            </div>
        </div>
        
    </div>
</div>
<?php  $admin_id = encryptids("D", $this->session->userdata('admin_id')); 
if($admin_id==''){?>
    <div class="container mb-4">
    <div class="artical-comment">
        <div class="view_content">
            <label class="d-block text-font" style="font-weight: 600;padding: 10px;">Login for post Your Comments</label>

            <a href="<?= base_url()?>users/login">
                <div class="common_content" style="background: white; border-radius: 10px;">
                    <div class="comment_user">
                        <img src="<?= base_url();?>/assets/images/user_1.png" alt="Default Profile Picture" width="5%" style="margin-left: 8px; padding: 2px;"><span style="margin-left: 15px; font-size: 17px;">Login</span>
                    </div>
                </div>
            </a>
            
        </div>
    </div>
</div>

<?php }  
 else { ?>

<div style="background-image: url(<?php echo base_url(); ?>/assets/images/whats-new-bg.png);">
    <div class="container">
        <?php
    if ($this->session->flashdata('MSG')) {
    echo $this->session->flashdata('MSG');
    }
    ?>
        <form name="standard_publish_comments" id="standard_publish_comments" action="<?php echo base_url().'Users/standard_publish_comments/'?><?= $getData['pk_is_id']?>" method="post"enctype="multipart/form-data">
            <div class="bg-light-comment p-3">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group ">
                            <input type="hidden" name="admin_id" value="<?= $admin_id?>">
                            <textarea class="form-control  w-100" rows="8" placeholder="Share Your Comments......" name="description"></textarea>
                        </div>
                    </div>
                    <div class="button-group  mt-3" style="text-align:end;">
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<?php } ?>
<div style="background-image: url(<?php echo base_url(); ?>/assets/images/whats-new-bg.png);">
    <div class="container"> 
          <?php foreach ($commnets as $key => $value): ?>
        <div class="artical-comment-view">
            <div class="view_content">
                <a href="">
                    <div class="common_content">
                        <div class="comment_user">
                            <img src="<?php echo base_url(); ?>/assets/images/people.png" alt="Default Profile Picture" width="5%">
                            <span style="margin-left: 15px; font-size: 17px; font-weight: 600;"><?= $value['user_name']?></span>
                            <!-- <span class="float-right" style="float:right;">1 hour 47 minutes ago</span> -->
                            <span class="float-right" style="float:right;"><?= $value['created_on']?></span>
                            
                        </div>
                        <div class="mt-1"><?= $value['description']?></div>
                    </div>
                </a>
                
            </div>
        </div>
        <hr>
            
        <?php endforeach ?> 
    </div>
</div>


<!-- /.container-fluid -->