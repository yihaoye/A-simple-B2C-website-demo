<!DOCTYPE HTML>

<?php

set_include_path('./php-includes' . PATH_SEPARATOR . './functions');
session_start();


// Functions


// Includes
require_once 'connect.inc.php';

if(isset($_GET['logout'])){
	//setcookie("admin", "", time()-3600);
	unset($_SESSION["admin"]);
}

?>

<html>
<head>
<title>Admin</title>
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
<script type="text/javascript" src="AjaxInteraction.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<!--<script src="http://code.jquery.com/jquery-1.9.1.js"></script>-->
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>-->

</head>
<body onload="process()">
<div class="header">
	<div class="header_top">
		<div class="container">
			<div class="logo">
				<a href="index.php"><img src="images/logo.png" alt=""/></a>
			</div>
			<ul class="shopping_grid">
			      
					<?php 
						if(isset($_SESSION["admin"])){
							//$login_name = $_COOKIE['location'];
							$admin_login_name = $_SESSION["admin"];
							echo "<a><li>$admin_login_name</li></a>";
							echo "<a href='admin.php?logout=true'><li>Logout</li></a>";
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
					<li><a href="adminlogin.php" data-hover="Wish List">Login</a></li>
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


<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Item</h4>
        </div>
        <div class="modal-body">
          <form id="uploadform" method="post" enctype="multipart/form-data">
			  ID		 :	<input name="theID" type="text" id="modal-edit-id" /><br>
			  Item Name  : 	<input name="theTitle" type="text" /><br>
			  Price      : 	<input name="thePrice" type="text" /><br>
			  Description:  <input name="theDescription" type="text" /><br>
			  Number     : 	<input name="theNumber" type="text" /><br>
			  Category   : 	<input name="theCategory" type="text" /><br>
			  Image1     : 	<input name="theFile1" type="file" id="file1ToUpload" /><br>
			  Image2     : 	<input name="theFile2" type="file" id="file2ToUpload" /><br>
		  <input name="submit" type="submit" value="Upload">
		</form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" onclick="process()" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
<?php  
/*	maybe useful for futher improvement, remember to delete <?php ?> tag to remove comment

<!-- Modal -->
  <div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Delete Item</h4>
        </div>
        <div class="modal-body">
          <form id="uploadform2" method="post">
			  <p>Are you sure to delete the item?</p>
		  <input name="submit" type="submit" value="YES">
		</form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" onclick="process()" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
*/
?>
  
<script>
	$("#uploadform").submit(function(e){

			e.preventDefault();
			var formData = new FormData($(this)[0]);

			$.ajax({
				url: 'editing.php',
				type: 'POST',
				data: formData,
				async: false,
				cache: false,
				contentType: false,
				processData: false,
				success: function () {
					alert("succeed");
				},
				error: function(data){
					alert("fail");
				}
			});
			//alert("do it");
			return false; // why do not exit with return false?
			//alert("it");
		});
		
		
		/***************************************************/
		var item_id = false;
		document.getElementById('modal-edit-id').value = item_id;
		
		function reply_click(clicked_id)
		{
			item_id = clicked_id;
			document.getElementById('modal-edit-id').value = item_id;
		}
		
		
		/***************************************************/
		function delete_click(clicked_name, clicked_id)
		{
			//alert(clicked_id); // for debug
			$.ajax({
				type: "POST",
				url: "editing.php",
				data: { theID: clicked_name, deletedID: clicked_id },
				//dataType: "text",
				cache: false,
				success: function()
					{
						alert("delete Submitted");
						//alert(data);
					}
			});
			
			/*setTimeout(function(){
			  //delay 0.5 sec
			}, 500);*/
			setTimeout('process()', 1000);
		}
		
</script>

<?php
if(isset($_SESSION["admin"])){
	echo "<h4 class='head'><span class='m_2'>Edit</span> the following items</h4>";
	require_once 'upload-form.inc.php';
}else{
	echo "<br><br><br><br><br>";
	echo "<h1>Please login as administrator, </h1>";
	echo "<h1>or you can not open this web page edit the items.</h1>";
	echo "<br><br><br><br><br>";
}

require_once 'footer.inc.php';

?>