
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

.last-date{
    /* text-overflow: ellipsis;
  white-space: nowrap; */
  display: block;
  overflow: hidden;
  /* width: 20em; */
  height: 90px;
}
    </style>
<section>
        <div class="container pb-5 pt-5" id="winner-section">
            <div class="row">
              <div class="col-md-8">
               <div class="static-content">
                  <div class="bloginfo">
                       <h3 style="margin-bottom: 0px;margin-top:20px;color: #0086b2!important;font-weight: 600;">Wall of Wisdom</h3>
                   </div>
                   <div class="heading-underline" style="width: 200px;">
                         <div class="left"></div><div class="right"></div>
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
        <div class="row" id="wow_card">
        <?php foreach($wow as $list){ ?>
            
            <div class="col-md-4 mb-4">
            <!-- <a href="<?php echo base_url().'users/wall_of_wisdom_view/'.$list['id']; ?>"> -->
                  <div class="card-winners">
                  <a href="<?php echo base_url().'users/wall_of_wisdom_view/'.$list['id']; ?>">
                      <img src="<?php echo base_url().'uploads/admin/wall_of_wisdom/'.$list['image']; ?>" class="card-img-top" alt="Discussion Forum"></a>
                      <div class="winner-body p-2">
                          <!-- <div class="node-status"><span>Status : </span>
                              <div class="status-open">Open</div>
                          </div> -->
                          <div class="title">
                              <p style="height:37px; overflow:hidden; margin-bottom:0px;"><?php echo substr_replace($list['title'],"...",150); ?></p>
                          </div>
                          <div class="field-item even">
                              <span class="time_left">
                                  <!-- <span class="last-date"><?php echo substr_replace($list['description'],"...",150);  ?> </span> -->
                                  <span class="last-date"><?php echo $list['description'];  ?> </span>
                              </span>
                          </div>
                          
                          <div id="abcd" u-id="<?php if(!isset($_SESSION['admin_id'])){ echo "0"; }else{ echo $_SESSION['admin_id']; } ?>" c-id="<?php echo $list['id']; ?>" ct="<?php echo $list['card_status']; ?>" class="node-status like_review"><span><i onclick="myFunction(this)" class="<?php if($list['card_status']=='1'){ echo "fa fa-heart"; }else{ echo "fa fa-heart fa-heart-o"; } ?>" style="width:18px; font-size: 21px; color:red;"></i><span class="span" style="    margin-left: 10px;font-size: 15px;">Like</span></span>
                              <div  class="status-open likes" wow-id='<?php echo $list['id']; ?>' style="margin-left:10px;" id="<?php echo $list['id']; ?>"><?php echo $list['likes']; ?></div>
                          </div>
                          
                      </div>
                  </div>
                  <!-- </a> -->
                </div>
         
                    <?php }  ?>
        </div>
        <?php if(count($wow) > 5){ ?>
        <div class="view-button">
                <a href="<?php echo base_url(); ?>users/all_wall_of_wisdom">View All</a>
            </div> 
            <?php } ?>     
             </div>
            
        
    </section>
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
    console.log(uid);
    
    if(uid=="0"){
        alert("Please Login");
      //  location.reload();
        return false;
        
    }

    if(cardstatus){
        $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url(); ?>Wall_of_wisdom/unlikes',
                    data: {
                       cid: cid,
                       uid: uid,
                    },
                    success: function(result) {
                        console.log(result);
                       location.reload();
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
                        console.log(result);
                       location.reload();
                    //  $('.id').html('hello');
                    },
                    error: function(result) {
                        alert("Error,Please try again.");
                    }
                });
            }

});
        });

//         function myFunction(x) {
        
//   x.classList.toggle("fa-heart-o");
// }
        // function like(que_id){
        //     id=$(this).attr('wow-id')
        //     uid=$(this).attr('u-id')
        //     console.log(uid);
        //     // var c = confirm("Are you sure to Approve activity? ");
        //     // if (c == true) {
        //         // $('#approve').modal('show');
        //         // $('.approve').on('click', function() {
        //         // const $loader = $('.igr-ajax-loader');
        //         //$loader.show();
        //         $.ajax({
        //             type: 'POST',
        //             url: '<?php echo base_url(); ?>Wall_of_wisdom/like',
        //             data: {
        //                 que_id: que_id,
        //             },
        //             success: function(result) {
        //                 console.log(result);
        //                //location.reload();
        //              $('.id').html('hello');
        //             },
        //             error: function(result) {
        //                 alert("Error,Please try again.");
        //             }
        //         });

        //     // })
        // }
    </script>