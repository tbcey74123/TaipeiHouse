<?php
	require("session_setting.php");
	start_session();   //This function declared in 'session_setting.php'.	
	
	$id = $_GET['id'];
	$num = $_GET['num'];
	$path = "../pic/houses/case-".$id."/";

	if($id&&$num){
		unlink($path."pic".$num.".jpg");
		$num++;
		while(file_exists($path."pic".$num.".jpg")){
			rename($path."pic".$num.".jpg",$path."pic".($num-1).".jpg");
			$num++;
		}
	}
	header("Location:admin_pic_maintain.php?id=".$id);
?>
