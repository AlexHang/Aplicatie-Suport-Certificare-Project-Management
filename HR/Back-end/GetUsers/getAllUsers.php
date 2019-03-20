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

$sql = "SELECT * FROM `users` WHERE `Company` LIKE '%".$_GET["Company"]."%'";
$result = $conn->query($sql);
$response=array();
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
       $response[]=$row;
    }
	echo json_encode($response);
	
	
} else {
    echo "0 results";
}
$conn->close();




?>