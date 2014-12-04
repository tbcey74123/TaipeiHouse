<?php
	require("session_setting.php");
	start_session();   //This function declared in 'session_setting.php'.	
	
	$id = $_GET['id'];
	$num = $_GET['num'];
	$tar = $_GET['target'];
	$location = $_GET['location'];

	if($tar == "house")
		$path = "../pic/houses/case-".$id."/";
	else 
		$path = "../pic/mansion/" . $location . "/mansion-" . $id ."/";

	if($id&&$num){
		unlink($path."pic".$num.".jpg");
		$num++;
		while(file_exists($path."pic".$num.".jpg")){
			rename($path."pic".$num.".jpg",$path."pic".($num-1).".jpg");
			$num++;
		}
	}
	if($tar != "house") {
		header("Location:admin_mansion_pic.php?location=" . $location . "&id=".$id);

	}else {
		header("Location:admin_pic_maintain.php?id=".$id);
	}		
?>
