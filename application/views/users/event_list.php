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
.sidebar{
	height: 37%;
    border-radius: 5px;
	box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
}
.right_content{
	box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
    padding: 10px;
	border-radius: 5px;
}
</style>
<section id="main_content">
  	<div class="container-xxl">
  		<div class="row">
  			<div class="col-12">
  				<div class="breadcrums">
  					<ul>

  						<li><a href="#">home</a></li>
  						<li><a class="active">Events</a></li>

  					</ul>
  				</div>
  			</div>
  			<div class="col-md-3">
  				<div class="sidebar">
  					<div class="related_links">
  						<h5>Navigation</h5>
  						<ul>
  							<li ><a href="<?php echo base_url().'users/news_list'?>">News</a></li>
  							<li class="active"><a href="<?php echo base_url().'users/event_list'?>">Events</a></li>
  						</ul>
  					</div>
                </div>
  			</div>
	  		<div class="col-md-9">
	  			<div class="right_content">
	  				<h3>Events</h3>
	  				
	  			</div>
	  		</div>
  		</div>
  	</div>
  </section>