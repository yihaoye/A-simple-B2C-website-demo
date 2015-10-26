<?php

// Called in index.php

function showItems($data){
	global $db, $userID, $itemID;
	
	switch($data){
		
		case "lists":
			$stmt = $db->prepare("SELECT * FROM items");
			break;
		
		case "fruit":
			$stmt = $db->prepare("SELECT * FROM items WHERE category = ?");
			$stmt->bind_param('s', $data);
			break;
			
		case "drink":
			$stmt = $db->prepare("SELECT * FROM items WHERE category = ?");
			$stmt->bind_param('s', $data);
			break;
			
		case "others":
			$stmt = $db->prepare("SELECT * FROM items WHERE category = ?");
			$stmt->bind_param('s', $data);
			break;
			
		default:
			$stmt = $db->prepare("SELECT * FROM items");
			break;
	}
	
	
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
			
				/*
				if(file_exists("images-movies/$id-tn.png")){
					$image = "image-movies/$id-tn.png";
				}else{
					$image = "images-movies/generic-tn.png";
				}*/
			
				/*
				$output .= "<li>";
                $output .= "<figure>";
				$output .= "<a href='index.php?user_id=$userID&amp;movie_id=$id'>";
				$output .= "<img class='thumbnail' alt='title' src='$image'>";
				$output .= "</a>";
                $output .= "<figcaption>";
                $output .= "<h3><a href='index.php?user_id=$userID&amp;movie_id=$id'>$title</a></h3>";
                $output .= "<div class='description'>$description</div>";
                $output .= "<div class='add_remove favourite'></div>";
                $output .= "</figcaption>";
                $output .= "</figure>";
                $output .= "</li>";
				*/
				
				$output .= "<div class='col-md-4 top_grid1-box1'><a href='single.php?item_id=$id'>";
				$output .= "<div class='grid_1'>";
				$output .= "<div class='b-link-stroke b-animate-go  thickbox'>";
		        $output .= "<img src='$img_source' class='img-responsive' alt='' height='240' width='240' /> </div>";
				$output .= "<div class='grid_2'>";
	     	  	$output .= "<p>$description</p>";
	     	  	$output .= "<ul class='grid_2-bottom'>";
	     	  	$output .= "<li class='grid_2-left'><p>$$price</p></li>";
	     	  	$output .= "<li class='grid_2-right'><div class='btn btn-primary btn-normal btn-inline ' target='_self' title='Get It'>Get It</div></li>";
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
	return($output);
}



?>