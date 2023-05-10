<style>
    .inner_gallery_box {
        border-radius: 5px;
    }

    .inner_gallery_box img {
        border-radius: 5px;
        object-fit: fill;
    }

    .node-status {
        font-size: 0.786em;

        float: left;

    }

    .node-status>div {
        display: inline-block;
        border-radius: 4px;
        padding: 2px 5px;
        background: #034e9c;
        ;
        color: #fff;
        font-size: 10px;
    }

    .card-winners {
        position: relative;
        display: flex;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        /* border: 1px solid rgba(0,0,0,.125); */
        box-shadow: rgb(0 0 0 / 35%) 0px 5px 15px;
        border-radius: 0.25rem;

        height: 100%;
        transition: transform 250ms;

    }

    .card-winners:hover {
        transform: translateY(-10px);
    }

    .title {
        clear: both;
        padding: 10px 0;
        font-family: "poppinssemibold", sans-serif;
        font-size: 13px;
        line-height: 1.2;
        font-weight: 600;
    }

    .node-status span {
        font-size: 13px;
    }

    .last-date {
        font-size: 11px;
          overflow: hidden;
        white-space: nowrap; 
    }
        /* text-overflow: ellipsis;
    }

    .last-date span {
        font-size: 11px;
    }

    .card-winner-button {
        border-top: 1px solid rgba(74, 74, 74, 0.25);
        padding: 4px;
        text-align: center;
        font-size: 0.813em;
        font-family: "montserratbold", sans-serif;


    }

    .card-winner-button:hover {
        background: cornflowerblue;
        color: white;
    }

    .node-status.like_review {
    /* margin-left: 187px; */
    .fifty-chars {
        display: block;
  width: 330px;
  overflow: hidden;
  white-space: nowrap;
  text-overflow: ellipsis;
}


</style>
<section>
    <div class="container pb-5 pt-5" id="winner-section">
        <div class="row">
            <div class="col-md-8 col-lg-6">
                <div class="static-content">
                    <div class="bloginfo">
                        <h3 style="margin-bottom: 0px;margin-top:20px;color: #0086b2!important;font-weight: 600;">Wall of Wisdom</h3>
                    </div>
                    <div class="heading-underline" style="width: 200px;">
                        <div class="left"></div>
                        <div class="right"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="input-group search_icon">
                    <input class="form-control border-end-0 border rounded-pill" type="search" value="search" id="example-search-input">
                    <span class="input-group-append">
                        <button class="search_button btn btn-outline-secondary bg-white border-bottom-0 border rounded-pill ms-n5" type="button">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                </div>
            </div>
        </div>
        <div class="row">
           <?php foreach($wow as $list){ ?>
            <div class="col-md-4">
                <div class="card-winners">
                    <img src="<?php echo base_url().'uploads/admin/wall_of_wisdom/'.$list['image']; ?>" class="card-img-top" alt="Discussion Forum">
                    <div class="winner-body p-2" >
                        <!-- <div class="node-status"><span>Status : </span>
                            <div class="status-open">Open</div>
                        </div> -->
                        <div class="node-status like_review"><span><img src="<?php echo base_url(); ?>/assets/images/thumb-up.jpeg" style="width:18px;"></span>
                            <div class="status-open" style="margin-left:10px;">50</div>
                        </div>
                        <div class="title">
                            <a href="/task/inviting-suggestion-vivad-se-vishwas-ii-%E2%80%93-settling-contractual-disputes/" title="Inviting suggestion on Vivad se Vishwas II – Settling Contractual ..."><?php echo $list['title']; ?></a>
                        </div>
                        <div class="field-item even">
                            <span class="time_left">
                                <span class="fifty-chars"><?php echo $list['description']; ?></span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
            
            
        </div>
        <!-- <div class="row mt-4">
                    <div class="view-button">
            <a href="<?php echo base_url(); ?>users/wall_of_wisdom_view">View All</a>
        </div>

</section>