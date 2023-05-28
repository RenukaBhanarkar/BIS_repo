<style>
    @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap');
    .header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  height: 70px;
  padding: 15px;
} 

.header__left {
  display: flex;
  align-items: center;
}

.header__left img {
  width: 100px;
  margin-left: 15px;
}

.header i {
  padding: 0 7px;
  cursor: pointer;
}

.header__search form {
  border: 1px solid #ddd;
  height: 35px;
  margin: 0;
  padding: 0;
  display: flex;
}

.header__search input {
  width: 500px;
  padding: 10px;
  margin: 0;
  border-radius: 0;
  border: none;
  height: 100%;
}

.header__search button {
  padding: 0;
  margin: 0;
  height: 100%;
  border: none;
  border-radius: 0;
}

/* Sidebar */
.mainBody {
  height: calc(100vh - 70px);
  display: flex;
  overflow: hidden;
}

.sidebar {
  height: 100%;
  width: 230px;
  background-color: white;
  overflow-y: scroll;
}

.sidebar__categories {
  width: 100%;
  display: flex;
  flex-direction: column;
  margin-bottom: 15px;
  margin-top: 15px;
}

.sidebar__category {
  display: flex;
  align-items: center;
  padding: 12px 25px;
}

.sidebar__category span {
  margin-left: 15px;
}

.sidebar__category:hover {
  background: #e5e5e5;
  cursor: pointer;
}

.sidebar::-webkit-scrollbar {
  display: none;
}

hr {
  height: 1px;
  background-color: #e5e5e5;
  border: none;
}

/* videos */

.videos {
    background-color: #f9f9f9;
    width: 100%;
    height: 100%;
    padding: 30px 30px;
    border-top: 1px solid #ddd;
    overflow-y: scroll;
}

.videos__container {
  display: flex;
  flex-direction: row;
  justify-content: space-around;
  flex-wrap: wrap;
}

.video {
  width: 310px;

  margin-bottom: 30px;
}

.video__thumbnail {
  width: 100%;
  height: 170px;
}

.video__thumbnail img {
    object-fit: cover;
    height: 100%;
    width: 100%;
    border-radius: 5px;
}

.author img {
  object-fit: cover;
  border-radius: 50%;
  height: 40px;
  width: 40px;
  margin-right: 10px;
}

.video__details {
  display: flex;
  margin-top: 10px;
}

.title {
  display: flex;
  flex-direction: column;
}

.title h3 {
    color: rgb(3, 3, 3);
    line-height: 18px;
    font-size: 14px;
    margin-bottom: 6px;
    font-weight: 600;
}

.title a, span {
    text-decoration: none;
    /* color: rgb(96, 96, 96); */
    font-size: 14px;
}

h1 {
  font-size: 20px;
  margin-bottom: 10px;
  color: rgb(3, 3, 3);
}

@media (max-width: 425px) {
  .header__search {
    display: none;
  }

  .header__icons .material-icons {
    display: none;
  }

  .header__icons .display-this {
    display: inline;
  }

  .sidebar {
    display: none;
  }
}

@media (max-width: 768px) {
  .header__search {
    display: none;
  }

  .sidebar {
    display: none;
  }

  .show-sidebar {
    display: inline;
    position: fixed;
    top: 4.4rem;
    height: auto;
  }
}

@media (max-width: 941px) {
  .header__search input {
    width: 300px;
  }
}
</style>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
   <!-- Header Starts -->
   <div class="header">
      <div class="header__left">
        <!-- <i id="menu" class="material-icons">menu</i> -->
        <img
          src="https://www.youtube.com/about/static/svgs/icons/brand-resources/YouTube-logo-full_color_light.svg?cache=72a5d9c"
          alt=""
        />
      </div>
      <div class="header__search">

        <form name="" id="" action="<?php echo base_url().'users/conversation_with_experts'?>" method="post"enctype="multipart/form-data"> 
          <input type="text" placeholder="Search" name="search" />
          <button><i class="material-icons">search</i></button>
        </form>
      </div>

      <!-- <div class="header__icons">
        <i class="material-icons display-this">search</i>
        <i class="material-icons">videocam</i>
        <i class="material-icons">apps</i>
        <i class="material-icons">notifications</i>
        <i class="material-icons display-this">account_circle</i>
      </div> -->
    </div>
    <!-- Header Ends -->

    <!-- Main Body Starts -->
    <div class="mainBody ">
      <!-- Sidebar Starts -->
      
      <!-- Sidebar Ends -->

      <!-- Videos Section -->
      <div class="videos ">
        <h1 style="font-weight: 600; font-size: 26px; color: brown;">In Conversation with Experts</h1>

        <div class="videos__container">
          <!-- Single Video starts -->
          <?php foreach ($Conversation as $key => $value) {?>
             <div class="video">
            <a href="<?php echo base_url().'users/conversation_video/'?><?php echo encryptids("E", $value['id'] )?>">
              <div class="video__thumbnail">
              <img src="<?= base_url()?><?= $value['video_thumbnail']?>" alt="" />
            </div>
          </a>
            <div class="video__details">
              <div class="title">
                <h3>
                <a href="<?php echo base_url().'users/conversation_video/'?><?php echo encryptids("E", $value['id'] )?>"> <?= $value['title']?></a>
                </h3>
                
                <span><?= $value['views']?> Views • <?= time_elapsed_string($value['created_on'])?></span>
              </div>
            </div>
          </div>
         <?php }?>

 
        </div>
      </div>
    </div>
    <script>
        const menu = document.querySelector('#menu');
console.log(menu);
const sidebar = document.querySelector('.sidebar');
console.log(sidebar);

menu.addEventListener('click', function () {
  sidebar.classList.toggle('show-sidebar');
});
    </script>    


    <?php

function time_elapsed_string($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}

?>