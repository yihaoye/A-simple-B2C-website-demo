<!DOCTYPE HTML>

<?php

set_include_path('./php-includes' . PATH_SEPARATOR . './functions');

require_once 'connect.inc.php';
session_start();

if(isset($_POST['email'])){
	if(!empty($_POST['email']) && !empty($_POST['pass'])){
		$admin_email_address = $_POST['email'];
		$admin_password = $_POST['pass'];


		$stmt = $db->prepare("SELECT firstname, lastname FROM admin WHERE email_address = ? AND password = ?; ");
		$stmt->bind_param('ss', $admin_email_address, $admin_password);
		$stmt->bind_result($admin_firstname, $admin_lastname); 
		$stmt->execute();
		
		while($stmt->fetch()){
			if(!empty($admin_firstname) && !empty($admin_lastname)){
				//setcookie("admin", "$admin_firstname $admin_lastname", time()+3600, "$admin_firstname $admin_lastname");
				$_SESSION["admin"] = "Welcome: $admin_firstname $admin_lastname";
				echo "successful login";
			}else{
				exit("\nERROR: Incorrect user account and password.\n\n");
			}
		}
		
		$stmt->close();
		
	}else if(!empty($_POST['email']) || !empty($_POST['pass'])){
		exit("\nERROR: Please enter all the informations.\n\n");
		
	}else{
		
	}
}

if(isset($_GET['logout'])){
	//setcookie("admin", "", time()-3600);
	unset($_SESSION["admin"]);
}

?>

<html>
<head>
<title>Admin Login</title>
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
						if(isset($_SESSION["admin"])){
							//$login_name = $_COOKIE['location'];
							$admin_login_name = $_SESSION["admin"];
							echo "<a><li>$admin_login_name</li></a>";
							echo "<a href='adminlogin.php?logout=true'><li>Logout</li></a>";
						}else{
							echo "<a href='adminlogin.php'><li>Sign In</li></a>";
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
					<li><a href="admin.php" data-hover="Wish List">Admin</a></li>
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
         <div class="register">
			   <div class="col-md-6 login-left">
			  	 <h3>Mr Admin</h3>
				 <p>If you are not admin, please leave the page. If you are admin, please login to edit the website.</p>
				 <!--<a class="acount-btn" href="register.php">Create an Account</a>-->
			   </div>
			   <div class="col-md-6 login-right">
			  	<h3>REGISTERED ADMINS</h3>
				<p>If you have an account with us, please log in.</p>
				<form action="adminlogin.php" method="post">
				  <div>
					<span>Email Address<label>*</label></span>
					<input type="text" name="email"> 
				  </div>
				  <div>
					<span>Password<label>*</label></span>
					<input type="password" name="pass"> 
				  </div>
				  <a class="forgot" href="#">Forgot Your Password?</a>
				  <input type="submit" value="Login">
			    </form>
			   </div>	
			   <div class="clearfix"> </div>
		</div>
	</div>
</div>

<?php

require_once 'footer.inc.php';

?>