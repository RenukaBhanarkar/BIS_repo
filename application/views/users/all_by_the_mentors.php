<style>
        .inner_gallery_box {
            border-radius: 5px;
        }
        
        .inner_gallery_box img{
            border-radius: 5px;
            object-fit: fill;
        }
        .node-status {
    font-size: 0.786em;
    
    float: left;
    
}

.node-status > div {
    display: inline-block;
    border-radius: 4px;
    padding: 2px 5px;
    background: #034e9c;;
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
    /* height: 371px; */
    /* height: 100%; */
    transition: transform 250ms;
   
}
.card-winners:hover{
    transform: translateY(-10px);
}
.title{
    clear: both;
    padding: 10px 0;
    font-family: "poppinssemibold", sans-serif;
    font-size: 13px;
    line-height: 1.2;
    font-weight: 600;
    max-height: 48px;
    overflow: hidden;
}
.node-status span{
    font-size: 13px;
}
.last-date{
    font-size: 11px;
}
.last-date span{
    font-size: 11px;
}

.card-winner-button{
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

.filter-content {
    background: #dedede;
    padding: 15px 14px;
    width: 100%;
    display: -webkit-box;
    display: -ms-flexbox;
    /* display: flex; */
    -webkit-box-pack: justify;
    -ms-flex-pack: justify;
    justify-content: space-between
}
.filter_label {
    margin-left: 9px;
    color: #1d3a7c;
}
.sector_label {
    color: #1d1d1d;
    font-size: 13px;
    font-weight: 400;
    margin-left: 7px;
}
.filter-button{
    border-radius: 10px;
    width: 108px;
    margin-left: 10px;
    font-size: 14px;
    
}
.rounded-pill {
    border-radius: 50rem!important;
    height: 30px;
}
.input-group {
    position: relative;
    display: flex;
    flex-wrap: wrap;
    align-items: stretch;
    /* width: 28%; */
}
.last-date{
    /* text-overflow: ellipsis;
  white-space: nowrap; */
  display: block;
  overflow: hidden;
  /* width: 20em; */
  height: 80px;
}
    </style>
<section>
        <div class="container pb-5 pt-5" id="winner-section">
            <div class="row">
              <div class="col-md-3">
               <div class="static-content">
                  <div class="bloginfo">
                       <h3 style="margin-bottom: 0px;margin-top:20px;color: #0086b2!important;font-weight: 600;">By The Mentors</h3>
                   </div>
                   <div class="heading-underline" style="width: 200px;">
                         <div class="left"></div><div class="right"></div>
                   </div>
                </div>
              </div>
              <div class="col-md-9">
                <div class="row">
                       
                       <form id="wow_search" action="<?php echo base_url(); ?>users/searchBtm" method="post">
                       <div class="filter-content">
                        <div class="col-md-4 responsive_content_1">
                            <div class="search_content">
                           <img src="<?php echo base_url(); ?>assets/images/filter_icon.png">
                           <label class="filter_label">Filters : </label>
                           <label class="sector_label">Under</label>
                           
                         
                                <select class="new_select" name="select_period" id="select_period" aria-label="Default select example">
                                        <option value="0" readonly>Select Period</option>
                                        <option value="1">Last Week</option>
                                        <option value="2">Last Month</option>
                                        <option value="3">Last Year</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 responsive_content_2">
                        <div class="search_content">
                                <div class="input-group search_icon" style="top: -2px;">
                                       
                                        <input class="form-control border-end-0 border rounded-pill" type="text" placeholder="search" name="search_text" id="search_text">

                                        <span class="input-group-append">
                                            <button class="search_button btn btn-outline-secondary bg-white border-bottom-0 border rounded-pill ms-n5" type="submit" id="search_btn"  >
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </span>
                                </div>
                        </div>
                        </div>
                        <div class="col-md-4 responsive_content_3" style="text-align: end;">
                        <div class="search_content">
                                <label class="sector_label">Sort By:</label>

                         
                                <select class="new_select" aria-label="Default select example" name="select_type" id="select_type">
                                        <option value="0" readonly>Select Order</option>
                                        <option value="1">Newest First</option>
                                        <option value="2">Oldest First</option>
                                       
                                </select>
                        </div>
                        </div>
                       </div>
</form>
                </div>
             </div> 
            </div>
        <div class="row">
        <?php foreach($by_the_mentor as $list){ ?>
            <div class="col-md-4 mb-4">
            <a href="<?php echo base_url().'users/by_the_mentor_detail/'.$list['id']; ?>">
                <div class="card-winners">
                        
                            <img src="<?php echo base_url().''.$list['image']; ?>" class="card-img-top" alt="Discussion Forum">
                            <div class="winner-body p-2">
                                <!-- <div class="node-status"><span>Status : </span>
                                    <div class="status-open">Open</div>
                                </div> -->
                                
                                <div class="title"> 
                                    <p><?php echo substr_replace($list['title'],"...",70); ?></p>
                                </div>
                                <div class="field-item even">
                                    <span class="time_left">
                                        <span class="last-date"><?php echo ($list['description']); ?></span>
                                    </span>
                                 </div>
                                 <div class="node-status like_review"><span></span>
                              <!-- <div class="status-open" style="margin-left:10px;">50</div> -->
                          </div>
                            </div>
                         
                    </div>
                    </a>
                </div>
            <?php } ?>
            
           
        </div>
        
        <div class="" style="text-align:end;">
                <!-- <a href="http://43.231.124.177/BIS/BIS_repo/users/standard" class="btn-primary btn-sm">Back</a> -->
                <button class="btn btn-primary btn-sm text-white mr-3 mt-2"><a href="<?php echo base_url() . 'users/byTheMentor'; ?>">Back</a></button>
            </div>
            
            
             </div>
             
        
    </section>
    <script>
        
$("#select_type").change(function () { 
    if($("#select_type").val() != 0 ){$("#wow_search").submit(); }});
$("#select_period").change(function () { 
    if($("#select_period").val() != 0 ){$("#wow_search").submit(); }});

    </script>