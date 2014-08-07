<?php
	require($_SERVER['DOCUMENT_ROOT']."/sql/mysql_connection.php");

	$check=0;
	$id = $_POST['id'];
	$location = $_SERVER['DOCUMENT_ROOT']."/pic/houses/case-".$id."/";
	$i=1;
	$j=1;
	while(file_exists($location."pic".$j.".jpg")){
		$j++;
	}
	while($_FILES["pic".$i]){
		move_uploaded_file($_FILES["pic".$i]["tmp_name"],$location."pic".$j.".jpg");	
		$i++;
		$j++;
		
	}
	if(file_exists($location."pic1.jpg")){
		$check = 1;
	}

	$sql = "UPDATE houses SET pic='$check' WHERE id='$id'";
	
	if(mysqli_query($con,$sql)){
		echo "匯入成功!<br/>";
		echo "<a href=\"/admin/admin_pic_maintain.php?id=".$id"\">點此返回</a>";
	}
?>
<head>
<meta charset="utf-8">
</head>
