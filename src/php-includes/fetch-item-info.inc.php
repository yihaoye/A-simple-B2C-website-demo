<?php

// Called in single.php


	$stmt = $db->prepare("SELECT * FROM items WHERE item_id = ?");
	$stmt->bind_param('i', $item_id_global);

	$stmt->bind_result($id, $title, $price, $description, $number, $category, $img_source, $img_source2); //$img_source = "image-movies/XXX.jpeg"
	$stmt->execute();
	
	while($stmt->fetch()){
		$id_global = $id;
		$item_name_global = $title;
		$price_global = $price;
		$description_global = $description;
		$item_number_global = $number;
		$img_source_global = $img_source;
		$img_source2_global = $img_source2;
	}

	$stmt->close();


?>