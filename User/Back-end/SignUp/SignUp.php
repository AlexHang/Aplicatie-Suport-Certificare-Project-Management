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


$sql = "SELECT * FROM `users` WHERE `Email` Like '%".$_POST["Email"]."%'";
$result = $conn->query($sql);
//echo $sql;


if ($result->num_rows > 0) {
	http_response_code(500);
}
else{
	// prepare and bind
	$stmt = $conn->prepare("INSERT INTO `users` (`FirstName`, `LastName`, `Email`, `Company`, `Password`)
							VALUES (?, ?, ?, ?, ?);");
	$stmt->bind_param("sssss", $firstname, $lastname, $email,$company, $password);

	// set parameters and execute
	$firstname = $_POST["FirstName"];
	$lastname = $_POST["LastName"];
	$email = $_POST["Email"];
	$company = $_POST["Company"];
	$password = $_POST["Password"];
	$stmt->execute();
	echo "OK";
	
	mkdir("../../UploadedFiles/User".$stmt->insert_id);
	
	
	$stmt->close();
	$conn->close();
}



?>