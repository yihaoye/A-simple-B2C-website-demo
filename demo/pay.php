<!DOCTYPE HTML>

<?php

set_include_path('./php-includes' . PATH_SEPARATOR . './functions');
session_start();
// Functions


// Includes
require_once 'connect.inc.php';
require_once 'get-variables.inc.php';
require_once 'fetch-item-info.inc.php';

if(isset($_GET['logout'])){
	//setcookie("user", "", time()-3600);
	unset($_SESSION["user"]);
}
?>

<html>
<head>
<title>Pay</title>
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
<script type="text/javascript" src="js/hover_pack.js"></script>
<link rel="stylesheet" href="css/etalage.css">
<script src="js/jquery.etalage.min.js"></script>
<link href="https://secureir.ebaystatic.com/rs/v/worerzzqlq4wjkisrhcditod5yi.css" type="text/css" rel="stylesheet"><link href="https://secureir.ebaystatic.com/rs/v/txc5aju3ki0hjkqrry01y5xfxyy.css" type="text/css" rel="stylesheet">
<script>
			jQuery(document).ready(function($){

				$('#etalage').etalage({
					thumb_image_width: 300,
					thumb_image_height: 400,
					source_image_width: 900,
					source_image_height: 1200,
					show_hint: true,
					click_callback: function(image_anchor, instance_id){
						alert('Callback example:\nYou clicked on an image with the anchor: "'+image_anchor+'"\n(in Etalage instance: "'+instance_id+'")');
					}
				});

			});
		</script>
<script src="js/easyResponsiveTabs.js" type="text/javascript"></script>
		    <script type="text/javascript">
			    $(document).ready(function () {
			        $('#horizontalTab').easyResponsiveTabs({
			            type: 'default', //Types: default, vertical, accordion           
			            width: 'auto', //auto or any width like 600px
			            fit: true   // 100% fit in a container
			        });
			    });
            </script>	

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
							echo "<a href='single.php?logout=true'><li>Logout</li></a>";
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

<div class="main">
  <div class="content_top">
  	<div class="container">
		<div id="centralarea" class="row-fluid mt10">
					<form method="post" action="https://checkout.ebay.com/xo/view?pagename=rypsubmit&sessionid=383856508019" name="pageform"
						id="pageform">
						<div id="leftsection" class="span8">
							<div id="topsection" class="row-fluid  m-cnt">
								<div id="shippingaddress" class="span6 shippingaddress">
									<h2 class="font4 topsecborder">
			<span class="i-shipto"></span>Ship to</h2>
		<div>Mr/Mrs XXX</div>
		<div>42d hillcrest, hamilton</div>
		<div>hamilton, waikato 3216</div>
		<div>New Zealand</div>
		<div>02xxxxxxx00</div>
		<div class="mt10" aria-haspopup="true">
			<a href="javascript:;" class="changeaddress" id="chgShipping" title="change address - opens in a new layer" frameurl="https://checkout.payments.ebay.com/ws/eBayISAPI.dll?UserAddressCmd" rurl="https://checkout.ebay.com/xo/view?pagename=setshipaddr&sessionid=383856508019" addressid="3472969324019" role="button">
				Change address</a>
		</div>
		<div data-load="saddr"></div></div>
								<div id="turbopaymentmethods" class="span6 paymentmethods">
									</div>
								
								<div id="paymentmethods" class="span6 paymentmethods">
									<h2 class="font4 topsecborder" id="payment-sec-ttl">
				<span class="i-paywith"></span>Pay with</h2>

			<div id="deflay">
				<ul class="mb10">

					<li><input type="radio" name="pmtmthd"
										aria-describedby="payment-sec-ttl"
										id="PAYPAL_NOLINK"
										
												aria-label="Credit Cards processed by PayPal"
											checked="checked"
										value="PAYPAL_NOLINK"
										 actiontype="ChgPaymentMtd">
								<label for="PAYPAL_NOLINK" >
									<img src="https://secureir.ebaystatic.com/pictures/aw/pics/checkout/payments/paypal/ppguest_1.gif" border="0"
										
												alt="PAYPAL_NOLINK"
												title="PAYPAL_NOLINK"
											 actiontype="ChgPaymentMtd" /></label>
								<div class="bmldiv" style="padding-left: 28px;">
							Processed by PayPal</div>
							</li>
					<li><input type="radio" name="pmtmthd"
										aria-describedby="payment-sec-ttl"
										id="PAYPAL"
										
												aria-label="PAYPAL"
											
										value="PAYPAL"
										 actiontype="ChgPaymentMtd">
								<label for="PAYPAL" >
									<img src="https://secureir.ebaystatic.com/pictures/aw/pics/checkout/payments/paypal/pymt_paypal.png" border="0"
										
												alt="PAYPAL"
												title="PAYPAL"
											 actiontype="ChgPaymentMtd" /></label>
								</li>
					</ul>

				</div>
		</div>
		
      </div>
		<br/>
	  
	  <div class="row-fluid itemimg" id="is_s0_i0"
		itemid="251556132558">
		<div class="span2 mb15 imgIdx1">
							<span style="width:96px; height:96px;" class="l-shad lftd">
		<span style="width:96px; height:96px;">
			<span style="width:96px; height:96px;" class="imgt">
				<img border="0" data-size="96" style="max-width:96px; max-height:96px;" 
					
							src="<?php echo "$img_source_global" ?>"
							onload="ABOVEFOLD.load(0);"
							onerror="ABOVEFOLD.load(1);"
							ATF="true"
							
							data-event-type="onImageLoad" 
						
				/>
			</span>
			</span> 
		</span></div>
		
	<div class="span10">
		<div class=" fc000 mb15" id="its_s0_i0">
			<input type="hidden" name="cid_s0_i0" id="cid_s0_i0"
				value='BId-{&#034;ItemId&#034;:251556132558};Domain-ebay;LId-20728131307' /> <input
				type="hidden" name="qty_s0_i0" id="qty_s0_i0"
				value="1" />
			<div class="row-fluid">
				<div class="span8 font3 titpad" id="ititle_s0_i0">
					<div class="itmtitle"><?php echo "$item_name_global" ?></div>
					</div>
				<div class="span1 font1 qty nowrap">
					Qty: 1</div>
				<div class="span3 itmprice">
					<span><?php echo "$$price_global" ?></span>
					<span style="padding-left: 15px; display: inline-block">&nbsp;</span>
						</div>
			</div>
			<div class="itmerror ">
			<p class="mi-er">
						<span><i class="gspr icser"></i></span> <span
							class="ml5" style="width:96%">Please <a class="changeaddress" href="javascript:;">change your address</a> or contact the seller to request an exception</span>
					</p>
				</div>
	</div>
	  
	</div>
</div>

<br/>
<div>
	<a class="btn bt1 btn-primary btn-normal btn-inline " target="_self">Pay It</a>
</div>
<br/>

<?php

require_once 'footer.inc.php';

?>