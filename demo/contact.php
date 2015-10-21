<!DOCTYPE HTML>

<?php

set_include_path('./php-includes' . PATH_SEPARATOR . './functions');

require_once 'connect.inc.php';
session_start();


if(isset($_GET['logout'])){
	//setcookie("user", "", time()-3600);
	unset($_SESSION["user"]);
}

?>

<html>
<head>
<title>Contact Us</title>
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
							echo "<a href='contact.php?logout=true'><li>Logout</li></a>";
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
					<li><a href="index.php" data-hover="Home">Home</a></li>
					<li><a href="about.php" data-hover="About Us">About Us</a></li>
					<li><a href="contact.php" data-hover="Contact Us">Contact Us</a></li>
					<li><a href="register.php" data-hover="Company Registration">Registration</a></li>
					<li><a href="admin.php" data-hover="Admin">Admin</a></li>
				 </ul>
				 <script type="text/javascript" src="js/nav.js"></script>
	      </div><!-- end h_menu4 -->
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
<div class="about">
 <div class="container">
  <div class="singel_right">
			     <div class="col-md-8">
				      <div class="contact-form">
				  	        <form method="post" action="contact-post.php">
					    	    <p class="comment-form-author"><label for="author">Your Name:</label>
					    	    	<input type="text" class="textbox" value="Enter your name here..." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Enter your name here...';}">
						    	</p>
						        <p class="comment-form-author"><label for="author">Email:</label>
						     	   <input type="text" class="textbox" value="Enter your email here..." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}">
						        </p>
						        <p class="comment-form-author"><label for="author">Message:</label>
						    	  <textarea value="Enter your message here..." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Message';}">Enter your message here...</textarea>
						        </p>
						        <input name="submit" type="submit" id="submit" value="Submit">
					        </form>
				       </div>
			     </div>
			     <div class="col-md-4 contact_right">
					<h3>Address</h3>
				    <div class="address">
						<i class="pin_icon"></i>
					    <div class="contact_address">
						  University of Waikato, Hamilton, New zealand. 
					    </div>
					    <div class="clearfix"></div>
					</div>
					<div class="address">
						<i class="phone"></i>
					    <div class="contact_address">
						   02108340900
					    </div>
					    <div class="clearfix"></div>
					</div>
					<div class="address">
						<i class="mail"></i>
					    <div class="contact_email">
						  <a href="malito:mail@demolink.org">newzealandtrade.com</a>
					    </div>
					    <div class="clearfix"></div>
					</div>
		        </div>
		        <div class="clearfix"></div>
		</div>
		<div class="map">
           <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3150859.767904157!2d-96.62081048651531!3d39.536794757966845!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1408111832978"> </iframe>
        </div>
     </div>
</div>

<?php

require_once 'footer.inc.php';

?>