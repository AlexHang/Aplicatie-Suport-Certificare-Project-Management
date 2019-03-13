<?php
	class UserFile{
		public $exists;
		public $path;
		public $reviewed;
		public $id;
		public function __construct($e,$r,$p,$i){
			$this->exists=$e;
			$this->reviewed=$r;
			$this->path=$p;
			$this->id=$i;
		}
		
	}
	$UserId=$_GET["UserID"];
	$path    = '../../../User/UploadedFiles/User'.$UserId;
	
	
	
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
		
	
	
	/*
	$files = scandir($path);
	$files = array_diff(scandir($path), array('.', '..'));
	//print_r($files);
	$response = array();
	foreach($files as $f){
		array_push($response, "http://localhost/MyWebsites/ManageFiles/User/UploadedFiles/User12/".$f);
	}
	echo json_encode($response);  
	*/
	
	if($matching = glob($path."/CerereInscriere.*")){
		//echo "yes";
		
		$sql = "SELECT * FROM `files` WHERE User_ID = ".$UserId." AND FileName LIKE '%CerereInscriere%'";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				$id=$row["FileId"];
				if($row["Reviewed"]=="1")
					$reviewed=1;
				else if($row["Reviewed"]=="-1") 
					$reviewed=-1;
					else $reviewed=0;
		 	}
			$cerere=new UserFile(1,$reviewed,"http://localhost/MyWebsites/ManageFiles/User/UploadedFiles/User".$UserId."/CerereInscriere.".pathinfo($matching[0])['extension'],$id);
		}
	}else{
		//echo "no";
		$cerere=new UserFile(0,0," ",0);
	}
	
	
	if($matching = glob($path."/CV.*")){
		//echo "yes";
		
		$sql = "SELECT * FROM `files` WHERE User_ID = ".$UserId." AND FileName LIKE '%CV%'";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				$id=$row["FileId"];
				if($row["Reviewed"]=="1")
					$reviewed=1;
				else if($row["Reviewed"]=="-1") 
					$reviewed=-1;
					else $reviewed=0;
			}
			$CV=new UserFile(1,$reviewed,"http://localhost/MyWebsites/ManageFiles/User/UploadedFiles/User".$UserId."/CV.".pathinfo($matching[0])['extension'],$id);
		}
	}else{
		//echo "no";
		$CV=new UserFile(0,0," ",0);
	}
	
	
	if($matching = glob($path."/AutoEvaluare.*")){
		//echo "yes";
		
		$sql = "SELECT * FROM `files` WHERE User_ID = ".$UserId." AND FileName LIKE '%AutoEvaluare%'";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				$id=$row["FileId"];
				if($row["Reviewed"]=="1")
					$reviewed=1;
				else if($row["Reviewed"]=="-1") 
					$reviewed=-1;
					else $reviewed=0;
			}
			$AutoEvaluare=new UserFile(1,$reviewed,"http://localhost/MyWebsites/ManageFiles/User/UploadedFiles/User".$UserId."/AutoEvaluare.".pathinfo($matching[0])['extension'],$id);
		}
	}else{
		//echo "no";
		$AutoEvaluare=new UserFile(0,0," ",0);
	}
	if($matching = glob($path."/Recomadare.*")){
		//echo "yes";
		
		$sql = "SELECT * FROM `files` WHERE User_ID = ".$UserId." AND FileName LIKE '%Recomadare%'";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				$id=$row["FileId"];
				if($row["Reviewed"]=="1")
					$reviewed=1;
				else if($row["Reviewed"]=="-1") 
					$reviewed=-1;
					else $reviewed=0;
			}
			$Recomadare=new UserFile(1,$reviewed,"http://localhost/MyWebsites/ManageFiles/User/UploadedFiles/User".$UserId."/Recomadare.".pathinfo($matching[0])['extension'],$id);
		}
	}else{
		//echo "no";
		$Recomadare=new UserFile(0,0," ",0);
	}
	
	$files["Cerere"]=$cerere;
	$files["CV"]=$CV;
	$files["FormularAutoEvaluare"]=$AutoEvaluare;
	$files["Recomadare"]=$Recomadare;
	//print_r($files);
	echo json_encode($files);
	
	
	
?>