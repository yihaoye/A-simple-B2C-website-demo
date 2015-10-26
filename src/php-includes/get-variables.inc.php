<?php
//global $userID, $category_global;

if(isset($_GET['user_id'])){
	$userID = $_GET['user_id'];
}

if(isset($_GET['category'])){
	$category_global = $_GET['category'];
}else{
	$category_global = 'lists';
}

if(isset($_GET['item_id'])){
	$item_id_global = $_GET['item_id'];
}else{
	
}

if(isset($_POST['theFile1'])){
	$file_global = $_POST['theFile1'];
}
if(isset($_POST['theFile2'])){
	$file_global = $_POST['theFile2'];
}

//check whether a form was submitted
if(isset($_POST['Submit'])){
 
    //retreive post variables
    $fileName1 = $_FILES['theFile1']['name'];
    $fileTempName1 = $_FILES['theFile1']['tmp_name'];
	$fileName2 = $_FILES['theFile2']['name'];
    $fileTempName2 = $_FILES['theFile2']['tmp_name'];

	$target_dir = "images/";
	$target_file1 = $target_dir . basename($fileName1);
	$target_file2 = $target_dir . basename($fileName2);
	$uploadOk = 1;
	// Check if file already exists
	if (file_exists($target_file1)) {
		echo "Sorry, file1 already exists.";
		$uploadOk = 0;
	}
	if (file_exists($target_file2)) {
		echo "Sorry, file2 already exists.";
		$uploadOk = 0;
	}
	
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
		echo "Sorry, your file was not uploaded.";
	// if everything is ok, try to upload file
	} else {
		if (move_uploaded_file($fileTempName1, $target_file1)) {
			echo "The file ". basename( $fileTempName1). " has been uploaded.";
		} else {
			echo "Sorry, there was an error uploading your file1.";
		}
		if (move_uploaded_file($fileTempName2, $target_file2)) {
			echo "The file ". basename( $fileTempName2). " has been uploaded.";
		} else {
			echo "Sorry, there was an error uploading your file2.";
		}
	}

	// insert data to database
	$stmt = $db->prepare("INSERT INTO items(title, price, description, number, category, img_source, img_source2) VALUES(?,?,?,?,?,?,?);");
	$stmt->bind_param('sdsisss', $_POST['theTitle'], $_POST['thePrice'], $_POST['theDescription'], $_POST['theNumber'], $_POST['theCategory'], $target_file1, $target_file2);

	//$stmt->bind_result($id, $title, $price, $description, $number, $category, $img_source, $img_source2); //$img_source = "image-movies/XXX.jpeg"
	$stmt->execute();

	$stmt->close();
	
}

?>