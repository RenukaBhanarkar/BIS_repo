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
    /* margin-left: 10px; */
    /* margin-bottom: 4px;
    float: left; */
    flex: auto;
    
}

.node-status > div {
    /* display: inline-block;
    border-radius: 4px;
    padding: 2px 5px;
    background: #034e9c;; */
    color: #0046d0;
    /* font-size: 10px; */
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
    width: 28%;
}
.last-date{
    /* text-overflow: ellipsis;
  white-space: nowrap; */
  display: block;
  overflow: hidden;
  /* width: 20em; */
  height: 86px;
}
.new_select{
    margin-left: 17px;
    border: 1px solid black;
    border-radius: 5px;
    padding: 1px;
    width: 116px;
    background: none;
}
    </style>
<section>
        <div class="container-fluid" id="winner-section" style="padding: 19px 37px 50px 37px;">
            <div class="row">
              <div class="col-md-3">
               <div class="static-content">
                  <div class="bloginfo">
                       <h3 style="margin-bottom: 0px;margin-top:20px;color: #0086b2!important;font-weight: 600;">Wall of Wisdom</h3>
                   </div>
                   <div class="heading-underline" style="width: 200px;">
                         <div class="left"></div><div class="right"></div>
                   </div>
                </div>
              </div>
              <div class="col-md-9">
                <div class="col-md-12">
                <div class="row">
                       <div class="filter-content">
                           <img src="http://localhost/BIS/BIS_repo/assets/images/filter_icon.png">
                           <label class="filter_label">Filters : </label>
                           <label class="sector_label">Under</label>

                           <!-- Example single danger button -->
                                <!-- <div class="btn-group">
                                     <button type="button" class="filter-button dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">All Sector</button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="#">Action</a></li>
                                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                                                <li><hr class="dropdown-divider"></li>
                                                <li><a class="dropdown-item" href="#">Separated link</a></li>
                                            </ul>
                                </div> -->
                                <select class="new_select" aria-label="Default select example">
                                        <option value="1">Last 7 days</option>
                                        <option value="2">Last Week</option>
                                        <option value="3">Last Month</option>
                                        <option value="3">Last Year</option>
                                </select>
                                <div class="input-group search_icon" style="top: -2px;">
                                        <input class="form-control border-end-0 border rounded-pill" type="search" value="search" id="example-search-input">
                                        <span class="input-group-append">
                                            <button class="search_button btn btn-outline-secondary bg-white border-bottom-0 border rounded-pill ms-n5" type="button">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </span>
                                </div>
                                <label class="sector_label" style="margin-left: -141px;">Sort By:</label>

                           <!-- Example single danger button -->
                                <!-- <div class="btn-group">
                                     <button type="button" class="filter-button dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Newest First</button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="#">Newest First</a></li>
                                                <li><a class="dropdown-item" href="#">Oldest First</a></li>
                                                <li><a class="dropdown-item" href="#">Most Popular</a></li>
                                                <li><hr class="dropdown-divider"></li>

                                            </ul>
                                </div> -->
                                <select class="new_select" aria-label="Default select example">
                                        <option value="1">Newest First</option>
                                        <option value="2">Oldest First</option>
                                       
                                </select>
                       </div>
                </div>
                </div>
             </div>
              
            </div>
        <div class="row" id="wow_card">
        <?php foreach($wow as $list){ ?>
            <div class="col-md-4 mb-4">
            
                <div class="card-winners">
                <a href="<?php echo base_url().'users/wall_of_wisdom_view/'.$list['id']; ?>">
                            <img src="<?php echo base_url().'uploads/admin/wall_of_wisdom/'.$list['image']; ?>" class="card-img-top" alt="Discussion Forum"></a>
                            <div class="winner-body p-2">
                               
                            <a href="<?php echo base_url().'users/wall_of_wisdom_view/'.$list['id']; ?>">
                                <div class="title">
                                    <p style="height:41px; overflow:hidden; margin-bottom:0px; text-align: justify; font-size: 17px;"><?php echo substr_replace($list['title'], '...', '150'); ?></p>
                                </div>
                                <div class="field-item even">
                                    <span class="time_left">
                                        <span class="last-date"><?php echo $list['description']; ?></span>
                                    </span>
                                 </div>
                            </a>
                            <div class="row d-flex">
                                <div id="abcd" ct="<?php echo $list['is_like']; ?>" u-id="<?php if(!isset($_SESSION['admin_id'])){ echo "0"; }else{ echo $_SESSION['admin_id']; } ?>" data-likes="<?php echo $list['likes']; ?>" lid="like_<?=$list['id'];?>" c-id="<?php echo $list['id']; ?>"  class="col-6 node-status like_review">
                                    <span><i onclick="myFunction(this)" class="<?php if($list['is_like']==1){ echo "fa fa-heart"; }else{ echo "fa fa-heart fa-heart-o"; } ?>" style="width:18px; font-size: 21px; color:red;"></i>
                                    </span>
                                    <span class="span" style="    margin-left: 10px;font-size: 15px;">Like</span>
                                </div>
                             
                            
                             <div class="col-6" style="    float: right; text-align: end;   color: blue; "><a href="<?php echo base_url().'users/wall_of_wisdom_view/'.$list['id']; ?>"><span>Continue Reading</span></a>
                            </div>
                          </div>
                             </div>
                             
                             
                        </div>
                    
                    </div> 
        
        
                    <?php } ?>
                    <div class="" style="text-align:end;">
                <!-- <a href="<?php echo base_url(); ?>users/standard" class="btn-primary btn-sm">Back</a> -->
                <button class="btn btn-primary btn-sm text-white mr-3 mt-2" style="float:right;"><a href="<?php echo base_url(); ?>wall_of_wisdom/wallOfWisdom">Back</a></button>
            </div>
                    </div>
                </div>
            
            
           
        
        
    </section>
    <script>
        function myFunction(x) {
        
        x.classList.toggle("fa-heart-o");
      }
    </script>
    <script
  src="https://code.jquery.com/jquery-3.6.4.js"
  integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E="
  crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
            $('#wow_card').delegate('#abcd','click',function(){
    uid=$(this).attr('u-id')
    cid=$(this).attr('c-id')
    cardstatus=$(this).attr('ct');
    likes=$(this).attr('data-likes');
    lid=$(this).attr('lid');
    console.log(cardstatus);
    
    if(uid=="0"){
        // alert("Please Login");
      //  location.reload();
      window.location.replace('<?php echo base_url().'users/login'; ?>');
        return false;
        
    }

    if(cardstatus==1){
        $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url(); ?>Wall_of_wisdom/unlikes',
                    data: {
                       cid: cid,
                       uid: uid,
                    },
                    success: function(result) {
                        // console.log(result);
                     //  location.reload();
                     //$('.id').html('hello');
                    },
                    error: function(result) {
                        alert("Error,Please try again.");
                    }
                });
    }else{

                console.log(cid);
            $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url(); ?>Wall_of_wisdom/likes',
                    data: {
                       cid: cid,
                       uid: uid,
                    },
                    success: function(result) {
                        // console.log(result);
                     //  location.reload();
                    //  $('.id').html('hello');
                    like=parseInt(likes)+1;
                    $('.'+lid).text(like);
                    },
                    error: function(result) {
                        alert("Error,Please try again.");
                    }
                });
            }

});
        });

        function myFunction(x) {
        
  x.classList.toggle("fa-heart-o");
}
       
    </script>