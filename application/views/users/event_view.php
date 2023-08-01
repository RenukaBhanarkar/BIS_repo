<style>
    .news_view h3{
        font-family: 'Georgia', serif;
    }
    .news_view h6{
        font-family: 'Georgia', serif;
        margin-top: 10px;
    font-weight: 600;
    }
</style>
<div class="container">
    <div class="news_view">
        <div class="col-md-12">
            <div class="row p-2">
                <div class="col-md-10 col-lg-10 col-sm-10">
                    <h3><?php echo $event_detail['title']; ?></h3>
                </div>
                <div class="col-md-2 col-md-2 col-md-2">
                    <h6><?php echo date('d-m-Y',strtotime($event_detail['created_on'])); ?></h6>
                </div>
                <hr>
            </div>
            <div class="row" style="padding-bottom: 24px;">
                <div class="col-md-12">
                    <img src="<?=base_url();?>uploads/cms/events/<?php echo $event_detail['thumbnail']; ?>" id="about_new">
                    <p style="text-align: justify;"><?php echo $event_detail['description']; ?></p>
                    
                    
                </div>
            </div>
            <hr>
            <div class="" style="text-align:end;">
                <a href="<?php echo base_url().'users/event_list'?>" class="btn btn-primary btn-sm text-white mr-3 mt-2">Back</a>
                <!-- <button class="btn btn-primary btn-sm text-white mr-3 mt-2" onclick="history.back()">Back</button> -->
            </div>
        </div>
    </div>
</div>