<?php
	require("session_setting.php");
	start_session();   //This function declared in 'session_setting.php'.

	require("../sql/mysql_connection.php");

	$check=0;
	$error=0;
	$id = $_POST["house_id"];
	$location = "../pic/houses/case-".$id."/";
	if(!file_exists($location)){
	 	mkdir($location);
	}
	$i=1;
	$j=1;
	while(file_exists($location."pic".$j.".jpg")){
		$j++;
	}
	$width_max = 500;
	$height_max = 300;
	if(!$_FILES) {
		header("Location:admin_pic_maintain.php");
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
			imagejpeg($image_fin, $location."pic".$j.".jpg");
			imagedestroy($image_tmp);
			imagedestroy($image_fin);
		}else{
			$error = 1;
		}
		$i++;
		$j++;
	    }    
	}
	if(file_exists($location."pic1.jpg")){
		$check = 1;
	}

	$sql = "UPDATE houses SET pic='$check' WHERE id='$id'";
	
	if($error){
		echo "請上傳符合尺寸的圖片<br/>";
	}else{
		echo "上傳成功<br/>";
	}
	echo "<a href=\"admin_pic_maintain.php?id=".$id.         "\">點此返回</a>";
?>
<head>
<meta charset="utf-8">
</head>
