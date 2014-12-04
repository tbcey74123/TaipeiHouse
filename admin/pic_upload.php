<?php
	require_once("session_setting.php");
	start_session();   //This function declared in 'session_setting.php'.

	//require("../sql/mysql_connection.php");

	$target = $_POST['target'];

	$check=0;
	$error=0;
	
	if(!$id)	
		$id = $_POST["house_id"];

	if($target == "house") 
		$dir = "../pic/houses/case-".$id."/";
	else {
		$location = $_POST['location'];
		$dir = "../pic/mansion/" . $location . "/mansion-" . $id . "/";
	}

	if(!file_exists($dir)){
	 	mkdir($dir);
	}
	$i=1;
	$j=1;
	while(file_exists($dir."pic".$j.".jpg")){
		$j++;
	}
	$width_max = 500;
	$height_max = 300;
	if(!$_FILES) {
		if($target == "house")
			header("Location:admin_pic_maintain.php");
		else 
			header("location:admin_mansion_pic.php");
	}

	foreach($_FILES as $files){
	    if($files["tmp_name"]) {
		$image_orin = $files["tmp_name"];
		
		$size = getimagesize($image_orin);
		$width_orin = $size[0];
		$height_orin = $size[1];
		if ( $width_orin >= $width_max && $height_orin >= $height_max) {

			$image_tmp = imagecreatefromjpeg($image_orin);
			$image_fin = imagecreatetruecolor($width_max, $height_max); 
			ImageCopyResampled($image_fin, $image_tmp, 0, 0, 0, 0, $width_max, $height_max, $width_orin, $height_orin);
			imagejpeg($image_fin, $dir . "pic" . $j. ".jpg");
			imagedestroy($image_tmp);
			imagedestroy($image_fin);
		}else{
			$error = 1;
		}
		$i++;
		$j++;
	    }    
	}
	if(file_exists($dir . "pic1.jpg")){
		$check = 1;
	}

	//$sql = "UPDATE houses SET pic='$check' WHERE id='$id'";
	
	if($error){
		echo "請上傳符合尺寸的圖片<br/>";
	}else{
		echo "圖片上傳成功<br/>";
	}
	
	if($add != 1) {
		if($target == "house") {
			echo "<a href=\"admin_pic_maintain.php?id=".$id.         "\">點此返回</a>";
		}else { 
			echo "<a href=\"admin_mansion_pic.php?location=" . $location . "&id=" . $id . "\">點此返回</a>";
		}
	}
?>
<head>
<meta charset="utf-8">
</head>
