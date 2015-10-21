<!DOCTYPE HTML>

<?php

set_include_path('./php-includes' . PATH_SEPARATOR . './functions');
session_start();

// Functions
require_once 'show-items.fn.php';

// Includes
require_once 'connect.inc.php';
require_once 'get-variables.inc.php';

$ItemList = showItems($category_global); 

if(isset($_GET['logout'])){
	//setcookie("user", "", time()-3600);
	unset($_SESSION["user"]);
}
?>


<html>
<head>
<title>Home</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Fashionpress Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!-- Custom Theme files -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<!--webfont-->
<link href='http://fonts.useso.com/css?family=Lato:100,200,300,400,500,600,700,800,900' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
<script src="js/responsiveslides.min.js"></script>
<script>
    $(function () {
      $("#slider").responsiveSlides({
      	auto: true,
      	nav: true,
      	speed: 500,
        namespace: "callbacks",
        pager: true,
      });
    });
</script>
<script type="text/javascript" src="js/hover_pack.js"></script>
</head>
<body>
<div class="header">
	<div class="header_top">
		<div class="container">
			<div class="logo">
				<a href="index.html"><img src="images/logo.png" alt=""/></a>
			</div>
			<ul class="shopping_grid">
			      
				  <?php 
						if(isset($_SESSION["user"])){
							//$login_name = $_COOKIE['location'];
							$login_name = $_SESSION["user"];
							echo "<a><li>$login_name</li></a>";
							echo "<a href='index.php?logout=true'><li>Logout</li></a>";
						}else{
							echo "<a href='login.php'><li>Sign In</li></a>";
						}
					?>
				  
			      <div class="clearfix"> </div>
			</ul>
		    <div class="clearfix"> </div>
		</div>
	</div>
	<div class="h_menu4"><!-- start h_menu4 -->
		<div class="container">
				<a class="toggleMenu" href="#">Menu</a>
				<ul class="nav">
					<li class="active"><a href="index.php" data-hover="Home">Home</a></li>
					<li><a href="about.php" data-hover="About Us">About Us</a></li>
					<li><a href="contact.php" data-hover="Contact Us">Contact Us</a></li>
					<li><a href="register.php" data-hover="Company Registration">Registration</a></li>
					<li><a href="admin.php" data-hover="Admin">Admin</a></li>
				 </ul>
				 <script type="text/javascript" src="js/nav.js"></script>
	      </div><!-- end h_menu4 -->
     </div>
</div>
<div class="slider">
	  <div class="callbacks_container">
	      <ul class="rslides" id="slider">
	        <li><img src="images/banner2-3.jpg" class="img-responsive" alt=""/>
	        <div class="banner_desc">
				<h1>Local Newzealand Products.</h1>
				<h2> </h2>
			</div>
	        </li>
	        <li><img src="images/banner2-4.jpg" class="img-responsive" alt=""/>
	         <div class="banner_desc">
				<h1>Famous Honey.</h1>
				<h2> </h2>
			 </div>
	        </li>
	        <li><img src="images/banner2-5.jpg" class="img-responsive" alt=""/>
	          <div class="banner_desc">
				<h1>Safe Products.</h1>
				<h2>Do not worry about the quality</h2>
			  </div>
	        </li>
	      </ul>
	  </div>
</div>
<div class="column_center">
  <div class="container">
	<div class="search">
	  <div class="stay">Search Product</div>
	  <div class="stay_right">
		  <input type="text" value="" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}">
		  <input type="submit" value="">
	  </div>
	  <div class="clearfix"> </div>
	</div>
    <div class="clearfix"> </div>
  </div>
</div>
<div class="main">
  <div class="content_top">
  	<div class="container">
	   <div class="col-md-3 sidebar_box">
	   	 <div class="sidebar">
			<div class="menu_box">
		    <h3 class="menu_head">Products Category</h3>
			  <ul class="menu">
				<li class="item1"><a href="#"><img class="arrow-img" src="images/f_menu.png" alt=""/>Food</a>
					<ul class="cute">
						<li class="subitem1"><a href="index.php?category=fruit">Fruit </a></li>
						<li class="subitem2"><a href="index.php?category=drink">Drink </a></li>
					</ul>
				</li>
				<li class="item2"><a href="index.php?category=others">Others</a>
				</li>
				<li class="item2"><a href="index.php">All</a>
				</li>
			</ul>
		</div>
				<!--initiate accordion-->
		<script type="text/javascript">
			$(function() {
			    var menu_ul = $('.menu > li > ul'),
			           menu_a  = $('.menu > li > a');
			    menu_ul.hide();
			    menu_a.click(function(e) {
			        e.preventDefault();
			        if(!$(this).hasClass('active')) {
			            menu_a.removeClass('active');
			            menu_ul.filter(':visible').slideUp('normal');
			            $(this).addClass('active').next().stop(true,true).slideDown('normal');
			        } else {
			            $(this).removeClass('active');
			            $(this).next().stop(true,true).slideUp('normal');
			        }
			    });
			
			});
		</script>
       </div>
		    <div class="delivery">
				<img src="images/delivery.jpg" class="img-responsive" alt=""/>
				<h3>Delivering</h3>
				<h4>World Wide</h4>
			</div>
			<div class="clients">
				<h3>Our Happy Clients</h3>
				<h4>Newzealand Trade is a wonderful website which you can buy all newzealand local product you can image, the quality is satisifed as well.</h4>
			   <ul class="user">
			   	<i class="user_icon"></i>
			   	<li class="user_desc"><a href="#"><p>Yihao Ye, Company Info</p></a></li>
			   	<div class="clearfix"> </div>
			   </ul>
			</div>
	   </div> 
	   
	   <div class="col-md-9 content_right">		
	    <h4 class="head"><span class="m_2">Popular</span> Products Now</h4>
		
		<?php echo $ItemList; ?>
		
       </div>
	   
	  </div>  	    
	</div>
</div>

<?php

require_once 'footer.inc.php';

?>