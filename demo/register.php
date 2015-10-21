<!DOCTYPE HTML>

<?php

set_include_path('./php-includes' . PATH_SEPARATOR . './functions');

$success_register = false;
// Functions


// Includes
require_once 'connect.inc.php';
session_start();

if(isset($_POST['fname'])){
	if(!empty($_POST['fname']) && !empty($_POST['lname']) && !empty($_POST['email']) && !empty($_POST['pass']) && !empty($_POST['cpass'])){
		$first_name = $_POST['fname'];
		$last_name = $_POST['lname'];
		$email_address = $_POST['email'];
		$user_password = $_POST['pass'];
		$user_cpassword = $_POST['cpass'];
			//check if password avaiable or if username duplicate
			if($user_password != $user_cpassword){
				exit("\nERROR: The password you enter is different, please register again.\n\n");
			}
			$sql = "SELECT user_id FROM useraccount WHERE email_address = '$email_address' ";
			$username_result = $db->query($sql);
			if($username_result->num_rows > 0) {
				exit("\nERROR: Your email address has been used, please use another one.\n\n");
			}
		
		$stmt = $db->prepare("INSERT INTO `onlineshop`.`useraccount` (`user_id`, `firstname`, `lastname`, `email_address`, `password`) VALUES (NULL, ?, ?, ?, ?);");
		$stmt->bind_param('ssss', $first_name, $last_name, $email_address, $user_password);
		$stmt->execute();
		$stmt->close();
		
		$success_register = true;
		
	}else if(!empty($_POST['fname']) || !empty($_POST['lname']) || !empty($_POST['email']) || !empty($_POST['pass']) || !empty($_POST['cpass'])){
		exit("\nERROR: Please enter all the informations.\n\n");
		
	}else{
		
	}
}

if(isset($_GET['logout'])){
	//setcookie("user", "", time()-3600);
	unset($_SESSION["user"]);
}

?>

<html>
<head>
<title>Register</title>
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
				<a href="index.php"><img src="images/logo.png" alt=""/></a>
			</div>
			<ul class="shopping_grid">
			      
				  <?php 
						if(isset($_SESSION["user"])){
							//$login_name = $_COOKIE['location'];
							$login_name = $_SESSION["user"];
							echo "<a><li>$login_name</li></a>";
							echo "<a href='register.php?logout=true'><li>Logout</li></a>";
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
      <div class="register">
		  	  
			  <?php
				
				if(!$success_register){
					require_once 'register-form.inc.php';
				}else{
					echo "<h1>Congratulation! You are successfully registered. You can sign in and then use upload page.</h1>";
				}
				
				?>
			  
				<div class="clearfix"> </div>
				<!--<div class="register-but">
				   <form>
					   <input type="submit" value="submit">
					   <div class="clearfix"> </div>
				   </form>
				</div>-->
		   </div>
	</div>
</div>

<?php

require_once 'footer.inc.php';

?>