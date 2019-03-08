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


$UserID=$_POST["UserID"];
$target_dir = "../../UploadedFiles/User".$UserID."/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$FileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$target_file = $target_dir."CerereInscriere.".$FileType;
// Check if image file is a actual image or fake image
/*
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
*/

foreach(glob("../../UploadedFiles/User".$UserID."/CerereInscriere.*") as $files){
		unlink($files);
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
	
	
	
	
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
		
		$sql = "SELECT * FROM `files` WHERE User_ID = ".$UserID." AND FileName Like '%CerereInscriere%'";
		$result = $conn->query($sql);


		if ($result->num_rows > 0) {
			echo "The file has been modified";
		}else{
			$stmt = $conn->prepare("INSERT INTO `files` (`User_ID`, `FileName`)
			VALUES (?, 'CerereInscriere');");
			$stmt->bind_param("s", $UserID);
			$stmt->execute();
		}
	
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>