<?php
	require("session_setting.php");
	start_session();   //This function declared in 'session_setting.php'.
	
	require("../sql/mysql_connection.php");

	$id = $_POST['id'];
	$name = $_POST['name'];
	$address = $_POST['address'];
	$structure = $_POST['structure'];
	$acreage = $_POST['acreage'];
	$location = $_POST['location'];
	$floor = $_POST['floor'];
	$hot = $_POST['hot'];

	if(!$id) {
		header("Location:admin_update.php");
	}
	if(!$hot) {
		$hot=0;
	}
	$sql="UPDATE `houses` SET `name`='$name', `address`='$address', `structure`='$structure', `acreage`='$acreage', `location`='$location', `floor`='$floor', `hot`='$hot' WHERE `id`='$id'";
	if(mysqli_query($con,$sql)){
		echo "更新成功!<br/>";
		echo "<a href=\"admin_update.php?id=".$id."\">點此返回</a>";
	}
?>
<head>
<meta charset="utf-8">
</head>
