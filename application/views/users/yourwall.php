<style>
.card {
		margin: 0 0.5em;
		width: calc(100% / 2);
	}
</style>
<section>
    <div class="container">
        <div class="row my-4">
            <div class="col-md-8">

            </div>
            <div class="col-md-4">
                <div class="input-group search_icon">
                    <input class="form-control border-end-0 border rounded-pill me-3" type="search" value="search"
                        id="example-search-input">
                    <span class="input-group-append">
                        <button
                            class="search_button btn btn-outline-secondary bg-white border-bottom-0 border rounded-pill ms-n5"
                            type="button">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                </div>
            </div>
        </div>
        <div class="winner-content">
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="cards-wrapper">
                            <?php foreach($published_wall as $list){ ?>
                            <div class="card">
                                <div class="your_wall_main_card">
                                    <div class="yourWall_image">
                                        <img src="<?php echo base_url()."uploads/yourwall/".$list['image']; ?>"
                                            alt="" class="w-100 h-100">
                                        <span><i class="fa fa-calendar icons"></i><?php echo $list['created_on']; ?></span>
                                    </div>
                                    <div class="Text-container">
                                        <h6 class="yourWall_title" id="yourwall_title">
                                        <?php echo $list['title']; ?>
                                        </h6>
                                        <p class="Your_Wall_Description">
                                        <?php echo $list['description']; ?>                                        </p>
                                        <div class="button_container">
                                            <a href="<?php echo base_url().'users/yourwallview/'.$list['id']; ?>" id="view_wall" class="btn btn_viewAll">View</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>                           
                        </div>
                    </div>
                    <!-- <div class="carousel-item ">
                        <div class="cards-wrapper">
                            <div class="card">
                                <div class="your_wall_main_card">
                                    <div class="yourWall_image">
                                        <img src="https://cdn-dynmedia-1.microsoft.com/is/image/microsoftcorp/RE2wSVH_RE4dchU:VP1-539x349?resMode=sharp2&op_usm=1.5,0.65,15,0&qlt=90&fmt=png-alpha"
                                            alt="" class="w-100 h-100">
                                        <span><i class="fa fa-calendar icons"></i>03-03-2023</span>
                                    </div>
                                    <div class="Text-container">
                                        <h6 class="yourWall_title">
                                            Lorem ipsum dolor sit amet, consectetur
                                        </h6>
                                        <p class="Your_Wall_Description">
                                            "Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium
                                            doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore
                                            veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim
                                            ipsam
                                            voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia
                                            consequuntur
                                            magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro
                                            quisquam est,
                                            qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia
                                            non
                                            numquam eius modi tempora incidunt ut labore et dolore magnam aliquam
                                            quaerat
                                            voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam
                                            corporis
                                            suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem
                                            vel eum
                                            iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae
                                            consequatur,
                                            vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?"
                                        </p>
                                        <div class="button_container">
                                            <a href="yourwallview" id="view_wall" class="btn btn_viewAll">View</a>

                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="card">
                                <div class="your_wall_main_card">
                                    <div class="yourWall_image">
                                        <img src="https://cdn-dynmedia-1.microsoft.com/is/image/microsoftcorp/RE2wSVH_RE4dchU:VP1-539x349?resMode=sharp2&op_usm=1.5,0.65,15,0&qlt=90&fmt=png-alpha"
                                            alt="" class="w-100 h-100">
                                        <span><i class="fa fa-calendar icons"></i>03-03-2023</span>
                                    </div>
                                    <div class="Text-container">
                                        <h6 class="yourWall_title">
                                            Lorem ipsum dolor sit amet, consectetur
                                        </h6>
                                        <p class="Your_Wall_Description">
                                            "Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium
                                            doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore
                                            veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim
                                            ipsam
                                            voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia
                                            consequuntur
                                            magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro
                                            quisquam est,
                                            qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia
                                            non
                                            numquam eius modi tempora incidunt ut labore et dolore magnam aliquam
                                            quaerat
                                            voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam
                                            corporis
                                            suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem
                                            vel eum
                                            iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae
                                            consequatur,
                                            vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?"
                                        </p>
                                        <div class="button_container">
                                            <a href="yourwallview" id="view_wall" class="btn btn_viewAll">View</a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="card">
                                <div class="your_wall_main_card">
                                    <div class="yourWall_image">
                                        <img src="https://cdn-dynmedia-1.microsoft.com/is/image/microsoftcorp/RE2wSVH_RE4dchU:VP1-539x349?resMode=sharp2&op_usm=1.5,0.65,15,0&qlt=90&fmt=png-alpha"
                                            alt="" class="w-100 h-100">
                                        <span><i class="fa fa-calendar icons"></i>03-03-2023</span>
                                    </div>
                                    <div class="Text-container">
                                        <h6 class="yourWall_title">
                                            Lorem ipsum dolor sit amet, consectetur
                                        </h6>
                                        <p class="Your_Wall_Description">
                                            "Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium
                                            doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore
                                            veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim
                                            ipsam
                                            voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia
                                            consequuntur
                                            magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro
                                            quisquam est,
                                            qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia
                                            non
                                            numquam eius modi tempora incidunt ut labore et dolore magnam aliquam
                                            quaerat
                                            voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam
                                            corporis
                                            suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem
                                            vel eum
                                            iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae
                                            consequatur,
                                            vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?"
                                        </p>
                                        <div class="button_container">
                                            <a href="yourwallview" id="view_wall" class="btn btn_viewAll">View</a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="carousel-item ">
                        <div class="cards-wrapper">
                            <div class="card">
                                <div class="your_wall_main_card">
                                    <div class="yourWall_image">
                                        <img src="https://cdn-dynmedia-1.microsoft.com/is/image/microsoftcorp/RE2wSVH_RE4dchU:VP1-539x349?resMode=sharp2&op_usm=1.5,0.65,15,0&qlt=90&fmt=png-alpha"
                                            alt="" class="w-100 h-100">
                                        <span><i class="fa fa-calendar icons"></i>03-03-2023</span>
                                    </div>
                                    <div class="Text-container">
                                        <h6 class="yourWall_title">
                                            Lorem ipsum dolor sit amet, consectetur
                                        </h6>
                                        <p class="Your_Wall_Description">
                                            "Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium
                                            doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore
                                            veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim
                                            ipsam
                                            voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia
                                            consequuntur
                                            magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro
                                            quisquam est,
                                            qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia
                                            non
                                            numquam eius modi tempora incidunt ut labore et dolore magnam aliquam
                                            quaerat
                                            voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam
                                            corporis
                                            suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem
                                            vel eum
                                            iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae
                                            consequatur,
                                            vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?"
                                        </p>
                                        <div class="button_container">
                                            <a href="yourwallview" id="view_wall" class="btn btn_viewAll">View</a>

                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="card">
                                <div class="your_wall_main_card">
                                    <div class="yourWall_image">
                                        <img src="https://cdn-dynmedia-1.microsoft.com/is/image/microsoftcorp/RE2wSVH_RE4dchU:VP1-539x349?resMode=sharp2&op_usm=1.5,0.65,15,0&qlt=90&fmt=png-alpha"
                                            alt="" class="w-100 h-100">
                                        <span><i class="fa fa-calendar icons"></i>03-03-2023</span>
                                    </div>
                                    <div class="Text-container">
                                        <h6 class="yourWall_title">
                                            Lorem ipsum dolor sit amet, consectetur
                                        </h6>
                                        <p class="Your_Wall_Description">
                                            "Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium
                                            doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore
                                            veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim
                                            ipsam
                                            voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia
                                            consequuntur
                                            magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro
                                            quisquam est,
                                            qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia
                                            non
                                            numquam eius modi tempora incidunt ut labore et dolore magnam aliquam
                                            quaerat
                                            voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam
                                            corporis
                                            suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem
                                            vel eum
                                            iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae
                                            consequatur,
                                            vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?"
                                        </p>
                                        <div class="button_container">
                                            <a href="yourwallview" id="view_wall" class="btn btn_viewAll">View</a>

                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="card">
                                <div class="your_wall_main_card">
                                    <div class="yourWall_image">
                                        <img src="https://cdn-dynmedia-1.microsoft.com/is/image/microsoftcorp/RE2wSVH_RE4dchU:VP1-539x349?resMode=sharp2&op_usm=1.5,0.65,15,0&qlt=90&fmt=png-alpha"
                                            alt="" class="w-100 h-100">
                                        <span><i class="fa fa-calendar icons"></i>03-03-2023</span>
                                    </div>
                                    <div class="Text-container">
                                        <h6 class="yourWall_title">
                                            Lorem ipsum dolor sit amet, consectetur
                                        </h6>
                                        <p class="Your_Wall_Description">
                                            "Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium
                                            doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore
                                            veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim
                                            ipsam
                                            voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia
                                            consequuntur
                                            magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro
                                            quisquam est,
                                            qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia
                                            non
                                            numquam eius modi tempora incidunt ut labore et dolore magnam aliquam
                                            quaerat
                                            voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam
                                            corporis
                                            suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem
                                            vel eum
                                            iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae
                                            consequatur,
                                            vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?"
                                        </p>
                                        <div class="button_container">
                                            <a href="yourwallview" id="view_wall" class="btn btn_viewAll">View</a>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div> -->
                </div>
                <button class="carousel-control-prev scroll-prev" type="button"
                    data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next scroll-next" type="button"
                    data-bs-target="#carouselExampleControls" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>

        <div class="container">
            <?php if($this->session->flashdata()){
                echo $this->session->flashdata('MSG');
            } ?>
            <form  action="<?php echo base_url(); ?>users/add_your_wall" method="post" enctype="multipart/form-data">
                <h2 class="YourWallForm">Your Wall </h2>
                <div class="bg-light p-3">
                    <!-- <div class="Comment_image">
                        <img src="../assets/images/user_image.png">
                    </div> -->
                    
                    <div class="row">
                        <div class="col-sm-6 mt-3">

                            <input type="text" class="form-control title-height mb-4" name="title" placeholder="Title" />

                        </div>
                        <div class="col-sm-6 mt-3">
                            <div class="file-upload-wrapper" data-text="Select your file">
                                <input  type="file" class="file-upload-field" name="image" value="">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group ">
                                <textarea class="form-control  w-100" rows="8"
                                    placeholder="Share Your Description......" name="description"></textarea>

                                <div class="button-group float-end mt-3">
                                    <button type="submit" class="btn btn-danger">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>


            </form>

            <ul class="posts">
            </ul>
        </div>
    </div>
</section>
<style>
    .Your_Wall_Description{
        display: block;
  width: 100px;
  overflow: hidden;
  white-space: nowrap;
  text-overflow: ellipsis;
    }
    #yourwall_title{
        overflow: hidden;
  white-space: nowrap;
  text-overflow: ellipsis;
    }
</style>
<script>
$('.login_details').hide()
jQuery('.show').on('click', function() {
    jQuery('.login_details').toggle();
});
</script>
<script>
$('#closeBtn').hide();
$('#closeBtn1').hide();
$('#closeBtn2').hide();
$('#closeBtn3').hide();
var btnViewClick = function(e) {
    $('.Your_Wall_Description').removeClass();
    $('.Text-container p').addClass('Your_Wall_Description_view_all_after');
    $('#view_wall').hide();
    $('#closeBtn').show();
}
var btnCloseClick = function(e) {
    $('.Your_Wall_Description_view_all_after').removeClass();
    $('.Text-container p').addClass('Your_Wall_Description');
    $('#view_wall').show();
    $('#closeBtn').hide();
}
$('#view_wall').on('click', btnViewClick);
$('#closeBtn').on('click ', btnCloseClick);
</script>
