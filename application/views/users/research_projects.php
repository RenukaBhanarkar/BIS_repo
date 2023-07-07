<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.js"></script> -->
 <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css" /> -->
<style>
  
.World_of_standers_inner_Box {
    /* width: 23%; */
    background: white;
    margin: 0px 0px 30px;
    padding: 8px 8px 8px;
    border-radius: 2%;
    margin-right: 2%;

    position:relative;

}
.Title_Section {
    position: absolute;
    bottom: 8px;
    margin: 0px;
    background: #ff5828;;
    display: block;
    width: 95%;
    padding: 6px 10px;
    color: white;
    font-weight: 600;
    font-size: 15px;
    text-align: center;
}
.World_of_standers_image_box img {
    object-fit: cover;
    width: 100%;
}
.World_of_standers_inner_Box.shadow:hover {
    transition: all .5s;
    transform: scale(1.2);
}
.carousel-item {
    height: 420px !important;
    background-repeat: no-repeat;
    background-size: 100% 100%;
    background-position: 100%;
}
.nav-pills {
    border-bottom: 1px solid gray;
}
.news .nav-link.active {
    color: #0ea2bd;
    background: none;
    border-bottom: 3px solid #0ea2bd;
}
.nav-pills li+li {
    margin-left: 15px;
}
.news_events{
    background: white;
    box-shadow: 0px 0px 10px 0px lightgrey;
    border-radius: 7px;
    height: 409px;
    padding-top: -9px;
    margin-top: 12px;
    margin-left: -11px;
    margin-right: 14px;
}
.whats_new{
    padding: 13px;
    overflow: auto;
    height: 340px;
}
.get-started{
    font-size: 16px;
    font-weight: 400;
    display: inline-block;
    padding: 3px 16px;
    border-radius: 4px;
    transition: 0.5s;
    color: #ffffff;
    background: #ffc107;
    font-family: #ffc107;

}
.breadcrums ul {
    list-style: none;
    display: block;
    text-align: end;
    margin: 0px;
}
.breadcrums ul li {
    display: inline-block;
}
.breadcrums ul li:not(:last-child)::after {
    content: '\f105';
    font-family: 'fontAwesome';
    margin: 0px 10px;
}
</style>

<section id="quality-outer my-5" style="padding-top: 5px;">
    <div class="quality_section">
        <div class="container-fluid">
            <div class="col-12">
  				<div class="breadcrums">
  					<ul>

  						<li><a href="<?php echo base_url().'users/quality_index'?>">home</a></li>
  						<li><a class="active">Research Projects</a></li>

  					</ul>
  				</div>
  			</div>
            <div class="row" style="padding-top: 11px;">
                <div class="col-md-3">
                   <div class="World_of_standers_inner_Box  shadow">
                    <a href="<?php echo base_url().'users/project_offer_list'?>">
                    <div class="World_of_standers_image_box">
                        <img src="<?=base_url();?>assets/images/startup.JPEG" class="card-img-top" alt="Discussion Forum">
                       
                    </div>
                    <p class="Title_Section">Projects on offer</p>
                    </a>
                  </div>
                </div>
                <div class="col-md-3">
                    <div class="World_of_standers_inner_Box  shadow">
                        <a href="#">
                        <div class="World_of_standers_image_box">
                            <img src="<?=base_url();?>assets/images/research_project.jpeg" class="card-img-top" alt="Discussion Forum">
                        
                        </div>
                        <p class="Title_Section">Projects in progress</p>
                        </a>
                    </div>
                </div>
                <div class="col-md-3">
                <div class="World_of_standers_inner_Box  shadow">
                        <a href="#">
                        <div class="World_of_standers_image_box">
                            <img src="<?=base_url();?>assets/images/seminar.jpeg" class="card-img-top" alt="Discussion Forum">
                        
                        </div>
                        <p class="Title_Section">Projects Completed</p>
                        </a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="World_of_standers_inner_Box  shadow">
                        <a href="#">
                        <div class="World_of_standers_image_box">
                            <img src="<?=base_url();?>assets/images/offer_1.jpeg" class="card-img-top" alt="Discussion Forum">
                        
                        </div>
                        <p class="Title_Section">I have a project</p>
                        </a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="World_of_standers_inner_Box  shadow">
                        <a href="#">
                        <div class="World_of_standers_image_box">
                            <img src="<?=base_url();?>assets/images/membership_pannel.jpeg" class="card-img-top" alt="Discussion Forum">
                        
                        </div>
                        <p class="Title_Section">Our Publications</p>
                        </a>
                    </div>
                </div>
        </div>
    </section>    


