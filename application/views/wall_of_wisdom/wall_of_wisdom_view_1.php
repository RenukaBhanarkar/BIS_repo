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
    margin-left: 10px;
    margin-bottom: 4px;
    float: left;
    
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
              
            </div>
        <div class="row" id="wow_card">
        <?php foreach($wow as $list){ ?>
            <div class="col-md-4 mb-4">
            
                <div class="card-winners">
                <a href="<?php echo base_url().'users/wall_of_wisdom_view/'.$list['id']; ?>">
                            <img src="<?php echo base_url().'uploads/admin/wall_of_wisdom/'.$list['image']; ?>" class="card-img-top" alt="Discussion Forum">
                            <div class="winner-body p-2">
                                <!-- <div class="node-status"><span>Status : </span>
                                    <div class="status-open">Open</div>
                                </div> -->
                                
                                <div class="title">
                                    <p style="height:41px; overflow:hidden; margin-bottom:0px; text-align: justify; font-size: 17px;"><?php echo substr_replace($list['title'], '...', '150'); ?></p>
                                </div>
                                <div class="field-item even">
                                    <span class="time_left">
                                        <span class="last-date"><?php echo substr_replace($list['description'], '...', '190'); ?></span>
                                    </span>
                                 </div>
                             </div>
                             </a>
                             <div id="abcd" ct="<?php echo $list['is_like']; ?>" u-id="<?php if(!isset($_SESSION['admin_id'])){ echo "0"; }else{ echo $_SESSION['admin_id']; } ?>" data-likes="<?php echo $list['likes']; ?>" lid="like_<?=$list['id'];?>" c-id="<?php echo $list['id']; ?>"  class="node-status like_review"><span><i onclick="myFunction(this)" class="<?php if($list['is_like']==1){ echo "fa fa-heart"; }else{ echo "fa fa-heart fa-heart-o"; } ?>" style="width:18px; font-size: 21px; color:red;"></i><span class="span" style="    margin-left: 10px;font-size: 15px;">Like</span></span>
                            
                             <!-- <div id="abcd" data-likes="<?php echo $list['likes']; ?>" lid="like_<?=$list['id'];?>" c-id="<?php echo $list['id']; ?>"  class="node-status like_review"> -->
                             <!-- <span><i onclick="myFunction(this)" class="<?php  echo "fa fa-heart fa-heart-o";  ?>" style="width:18px; font-size: 21px; color:red;"></i><span class="span" style="    margin-left: 10px;font-size: 15px;">Like</span></span> -->
                             <div style="    float: right; margin-right: 10px;"><a href="<?php echo base_url().'users/wall_of_wisdom_view/'.$list['id']; ?>"><span>Read More</span></a></div>
                          </div>
                        </div>
                    
                    </div> 
        
        
                    <?php } ?>
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
      window.location.replace('<?php echo base_url().'users/login'; ?>')
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