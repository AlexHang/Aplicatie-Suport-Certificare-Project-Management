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
	
	if($matching = glob($path."/CerereInscriere.*")){
		//echo "yes";
		$cerere=new UserFile(1,"http://localhost/MyWebsites/ManageFiles/User/UploadedFiles/User".$UserId."/CerereInscriere.".pathinfo($matching[0])['extension']);
		
	}else{
		//echo "no";
		$cerere=new UserFile(0," ");
	}
	
	
	if($matching = glob($path."/CV.*")){
		//echo "yes";
		$CV=new UserFile(1,"http://localhost/MyWebsites/ManageFiles/User/UploadedFiles/User".$UserId."/CV.".pathinfo($matching[0])['extension']);
		
	}else{
		//echo "no";
		$CV=new UserFile(0," ");
	}
	
	
	if($matching = glob($path."/AutoEvaluare.*")){
		//echo "yes";
		$AutoEvaluare=new UserFile(1,"http://localhost/MyWebsites/ManageFiles/User/UploadedFiles/User".$UserId."/AutoEvaluare.".pathinfo($matching[0])['extension']);
		
	}else{
		//echo "no";
		$AutoEvaluare=new UserFile(0," ");
	}
	if($matching = glob($path."/Recomadare.*")){
		//echo "yes";
		$Recomadare=new UserFile(1,"http://localhost/MyWebsites/ManageFiles/User/UploadedFiles/User".$UserId."/Recomadare.".pathinfo($matching[0])['extension']);
		
	}else{
		//echo "no";
		$Recomadare=new UserFile(0," ");
	}
	
	$files["Cerere"]=$cerere;
	$files["CV"]=$CV;
	$files["FormularAutoEvaluare"]=$AutoEvaluare;
	$files["Recomadare"]=$Recomadare;
	//print_r($files);
	echo json_encode($files);
	
	
	
?>