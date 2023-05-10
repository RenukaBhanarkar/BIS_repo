<style>
.join_section{
    display: flex;
    overflow: hidden;
}
.join_content{
    background-color: #f9f9f9;
    width: 100%;
    height: 100%;
    padding: 30px 30px;
    border-top: 1px solid #ddd;
}
.join_container{
    display: flex;
    flex-direction: row;
    justify-content: space-around;
    flex-wrap: wrap;

}
.view_join_content {
    width: 310px;
    /* margin-bottom: 30px; */
    /* padding: 0 0 50px; */
    min-height: 150px;
    position: relative;
    padding: 0 0 50px;
}
.start_content{
    width: 100%;
    height: 170px;
}
.join_body{
    display: flex;
    margin-top: 10px;   
}
.join_img{
    object-fit: cover;
    height: 100%;
    width: 100%;
    border-radius: 5px;
}
.join_container .title_join h3{
    color: rgb(3, 3, 3);
    line-height: 18px;
    margin-bottom: 6px;
    font-weight: 600;
}
.join_container .title_join a{
    overflow: hidden;
    /* white-space: nowrap; */
    text-overflow: ellipsis;
    display: block;
    height: 37px;
}
span.span_description {
    display: block;
    height: 88px;
    /* width: 330px; */
    overflow: hidden;
    /* white-space: nowrap; */
    text-overflow: ellipsis;
}
.discuss_caption{
    background: #b51b00;
    text-align: center;
    color: white;
    font-weight: 600;
    padding: 9px;
    margin-top: 5px;
    display: none;
    position: absolute;
    width: 100%;
}
.view_join_content:hover .discuss_caption{
    display: block;
}
span.date-time {
    font-size: 12px;
    font-weight: 500;
}
span.last-date {
    font-weight: 600;
}
</style>
<section class="-join_section">
    <div class="join_content">
        <div class="bloginfo">
            <h3 style="margin-bottom: 14px; /* margin-top: 20px; */ color: #0086b2!important; font-weight: 600; margin-left: 24px;">Live Sessions
            </h3>
        </div>
        <div class="join_container">
            <?php foreach ($LiveSessions as $key => $value): ?>
                <div class="view_join_content">
                    <a href="<?php echo base_url().'users/join_the_classroom_watch_now/'?><?php echo encryptids("E", $value['id'] )?>">
                        <div class="start_content">
                            <img src="<?php echo base_url(); ?><?= $value['thumbnail']?>" alt="" class="join_img">
                        </div>
                    </a>
                    <div class="join_body">
                        <div class="title_join">
                            <h3><a href="<?php echo base_url().'users/join_the_classroom_watch_now/'?><?php echo encryptids("E", $value['id'] )?>"><?= $value['title']?></a> </h3>
                            <span class="last-date">Date:<span class="date-time" style="margin-left: 5px;"> 
                            <?= date("d-m-Y", strtotime($value['created_on']));?></span></span>
                            <a href="<?php echo base_url().'users/join_the_classroom_watch_now/'?><?php echo encryptids("E", $value['id'] )?>"><div class="discuss_caption"><span href="#" title=" Discuss" style="padding:8px;"></span><span class="">Watch Now</span></div></a>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>

           

        </div>
    </div>
</section>