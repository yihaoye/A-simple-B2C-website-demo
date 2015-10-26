<?php
// the php file generate a xml file and then send to client side
header('Content-Type: text/xml'); // generate a xml file
echo '<?xml version="1.0" encoding="UTF-8" standalone="yes" ?>';

set_include_path('./php-includes' . PATH_SEPARATOR . './functions');
require_once 'connect.inc.php';
$stmt = $db->prepare("SELECT * FROM items");
$stmt->bind_result($id, $title, $price, $description, $number, $category, $img_source, $img_source2); //$img_source = "image-movies/XXX.jpeg"
$stmt->execute();
	
$output = "";
$count = 0;
	
while($stmt->fetch()){
	//$title = htmlentities($title, ENT_QUOTES, "UTF-8");
	//$description = htmlentities($description, ENT_QUOTES, "UTF-8");
		
			if($count == 0){
				$output .= "<div class='top_grid2'>";
			}
			
			$output .= "<div class='col-md-4 top_grid1-box1'><a>";
			$output .= "<div class='grid_1'>";
			$output .= "<div class='b-link-stroke b-animate-go  thickbox'>";
			$output .= "<img src='$img_source' class='img-responsive' alt='' height='280' width='280' /> </div>";
			$output .= "<div class='grid_2'>";
			$output .= "<p>$description</p>";
			$output .= "<ul class='grid_2-bottom'>";
			$output .= "<li class='grid_2-left'><p>$$price</p></li>";
			$output .= "<li class='grid_2-right'><div class='btn btn-primary btn-normal btn-inline ' target='_self' title='delete' id='$id' onClick='delete_click(this.title, this.id)' >Delete</div></li>";
			$output .= "<li class='grid_2-right'><div class='btn btn-primary btn-normal btn-inline ' target='_self' title='edit' id='$id' onClick='reply_click(this.id)' data-toggle='modal' data-target='#myModal' >Edit</div></li>";
			$output .= "<div class='clearfix'> </div>";
			$output .= "</ul>";
			$output .= "</div>";
			$output .= "</div>";
			$output .= "</a></div>";
			
			$count++;
			if($count == 3){
				$output .= "<div class='clearfix'> </div>";
				$output .= "</div> ";
				$count = 0;
			}
}
$stmt->close();



echo '<response>'; // make a xml element, it is necessary to add this tag to contain the following contents
		echo $output;
echo '</response>';

?>