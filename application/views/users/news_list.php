<style>
    .sidebar .related_links h5 {
    background: #0592a9;
    padding: 5px;
    color: white;
}
.sidebar .related_links ul {
    list-style: none;
    padding-left: 0px;
}
.sidebar .related_links ul li {
    border: 1px solid lightgray;
    margin: 3px 0px;
    padding: 5px 10px;
}
.sidebar .related_links ul li.active {
    background: #a91605;
    color: white;
}
.sidebar ul li:hover {
    background: #f1f1f1;
    transition: all 0.2s linear;
}
.sidebar .related_links ul li a {
    display: block;
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
.right_content h3 {
    font-family: 'Georgia', serif;
}
</style>
<section id="main_content">
  	<div class="container-xxl">
  		<div class="row">
  			<div class="col-12">
  				<div class="breadcrums">
  					<ul>

  						<li><a href="">home</a></li>
  						<li><a class="active">News</a></li>

  					</ul>
  				</div>
  			</div>
  			<div class="col-md-3">
  				<div class="sidebar">
  					<div class="related_links">
  						<h5>Navigation</h5>
  						<ul>
  							<li class="active"><a href="<?php echo base_url().'users/news_list'?>">News</a></li>
  							<li ><a href="<?php echo base_url().'users/event_list'?>">Events</a></li>
  						</ul>
  					</div>
                </div>
  			</div>
	  		<div class="col-md-9">
	  			<div class="right_content">
	  				<h3>News</h3>
	  				
	  			</div>
	  		</div>
  		</div>
  	</div>
  </section>