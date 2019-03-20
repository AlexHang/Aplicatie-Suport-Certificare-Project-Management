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


	$sql = "SELECT * FROM `admins` WHERE `Email` Like '%".$_POST["Email"]."%' 
									AND `Password` LIKE '".$_POST["Password"]."'";
	$result = $conn->query($sql);
	//echo $sql;


	if ($result->num_rows > 0) {
		http_response_code(200);
		while($row = $result->fetch_assoc()) {
			echo $row["Admin_ID"];
		}
	}else{
		http_response_code(500);
	}





?>