
<?php

$dbConnect = array(
	'server' => 'localhost',
	'user' => 'root',
	'pass' => '',
	'name' => 'onlineshop'
); // create an array to store 4 parameters information required for mysqli class/object

$db = new mysqli(	
	$dbConnect['server'],
	$dbConnect['user'],
	$dbConnect['pass'],
	$dbConnect['name']
);// create a mysqli object "$db", and connect to the database (using 4 parameters, see the above array) 
  // and get the information to store in $db

//echo $db -> host_info;	// object build in method, get host information
//echo "<br> error number is ";
//echo $db -> connect_errno;	// check if connected
//echo "<br>";

if ($db->connect_errno>0){
	echo "Database connection error" . $db->connect_error;	// check if connected
	exit;
}

?>