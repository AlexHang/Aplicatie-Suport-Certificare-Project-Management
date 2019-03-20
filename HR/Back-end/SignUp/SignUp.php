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


$sql = "SELECT * FROM `HR` WHERE `Email` Like '%".$_POST["Email"]."%'";
$result = $conn->query($sql);
//echo $sql;


if ($result->num_rows > 0) {
	http_response_code(500);
}
else{
	// prepare and bind
	$stmt = $conn->prepare("INSERT INTO `HR` (`Email`, `Password`, `Company`) 
							VALUES ( ? , ? , ?);");
	$stmt->bind_param("sss", $email, $password, $company);

	// set parameters and execute
	$email = $_POST["Email"];
	$password = $_POST["Password"];
	$company = $_POST["Company"];
	
	$stmt->execute();
	echo "OK";
	
	//mkdir("../../UploadedFiles/User".$stmt->insert_id);
	
	
	$stmt->close();
	$conn->close();
}



?>