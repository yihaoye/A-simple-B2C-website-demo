<?php
//global $userID, $category_global;

//for debug
/*session_start();
if(isset($_SESSION["upload"])){
	echo $_SESSION["upload"];
}else{
	echo "have not upload yet";
}*/	

set_include_path('./php-includes' . PATH_SEPARATOR . './functions');

require_once 'connect.inc.php';


if(isset($_POST['theFile1'])){
	$file_global = $_POST['theFile1'];
}
if(isset($_POST['theFile2'])){
	$file_global = $_POST['theFile2'];
}

//check whether a form was submitted
if(isset($_POST['theID'])){
	
	if($_POST['theID'] == "addnewitem"){
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

		$stmt->execute();
		$stmt->close();
		
	}else if($_POST['theID'] == "delete"){
		//$_SESSION["upload"] = $_POST['theID']; // for debug
		
		// delete old images
		if(isset($_POST['deletedID'])){
			$stmt = $db->prepare("SELECT img_source, img_source2 FROM items WHERE item_id = ?;");
			$stmt->bind_param('i', $_POST['deletedID']);
			$stmt->execute();
			$stmt->bind_result($col1, $col2); // attention that only bind_result will not return any data, you need to work with $stmt->fetch() to get data
			while ($stmt->fetch()){
				$delete_file1 = $col1;
				$delete_file2 = $col2;
			}
			if($delete_file1 != "images/" || $delete_file1 != ""){
				unlink($delete_file1);
			}
			if($delete_file2 != "images/" || $delete_file2 != ""){
				unlink($delete_file2);
			}
			$stmt->close();
			
			// delete database item record
			$stmt = $db->prepare("DELETE FROM items WHERE item_id=?;");
			$stmt->bind_param('i', $_POST['deletedID']);
			$stmt->execute();
			$stmt->close();
		}else{
			//$_SESSION["upload"] = "deletedID missed"; // for debug
		}
		
	}else{
		// delete old images
		$stmt = $db->prepare("SELECT img_source, img_source2 FROM items WHERE item_id = ?;");
		$stmt->bind_param('i', $_POST['theID']);
		$stmt->execute();
		$stmt->bind_result($col1, $col2); // attention that only bind_result will not return any data, you need to work with $stmt->fetch() to get data
		while ($stmt->fetch()){
			$delete_file1 = $col1;
			$delete_file2 = $col2;
		}
		if($delete_file1 != "images/" || $delete_file1 != ""){
			unlink($delete_file1);
		}
		if($delete_file2 != "images/" || $delete_file2 != ""){
			unlink($delete_file2);
		}
		$stmt->close();
		
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
		$stmt = $db->prepare("UPDATE items SET title=?, price=?, description=?, number=?, category=?, img_source=?, img_source2=? WHERE item_id = ?;");
		$stmt->bind_param('sdsisssi', $_POST['theTitle'], $_POST['thePrice'], $_POST['theDescription'], $_POST['theNumber'], $_POST['theCategory'], $target_file1, $target_file2, $_POST['theID']);
		$stmt->execute();
		$stmt->close();
	}
	
		
}

?>