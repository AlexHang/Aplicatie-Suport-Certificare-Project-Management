<?php
	class UserFile{
		public $exists;
		public $path;
		public function __construct($e, $p){
			$this->exists=$e;
			$this->path=$p;
		}
		
	}
	$UserId=12;
	$path    = '../../UploadedFiles/User'.$UserId;
	
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
	
	if(file_exists($path."/CerereInscriere.pdf")){
		echo "yes";
		$cerere=new UserFile(1,"http://localhost/MyWebsites/ManageFiles/User/UploadedFiles/User".$UserId."/CerereInscriere.pdf");
		
	}else{
		echo "no";
		$cerere=new UserFile(0," ");
	}
	
	
	if(file_exists($path."/CV.pdf")){
		//echo "yes";
		$CV=new UserFile(1,"http://localhost/MyWebsites/ManageFiles/User/UploadedFiles/User".$UserId."/CV.pdf");
		
	}else{
		//echo "no";
		$CV=new UserFile(0," ");
	}
	
	$files["Cerere"]=$cerere;
	$files["CV"]=$CV;
	//print_r($files);
	echo json_encode($files);
	
	
	
?>