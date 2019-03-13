<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "filehandle";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);

	// Check connection
	if ($conn->connect_error) {
		http_response_code(500);
		die("Connection failed: " . $conn->connect_error);
	}else{
		//echo "Connected successfully";
	}
		
	$sql = "UPDATE `files` SET `Reviewed` = '".$_GET["Reviewed"]."' WHERE `files`.`FileId` = ".$_GET["FileId"].";";

	if ($conn->query($sql) === TRUE) {
		echo "Record updated successfully";
	} else {
		echo "Error updating record: " . $conn->error;
	}

	$conn->close();

?>