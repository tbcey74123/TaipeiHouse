<?php
	require("sesstion_setting.php");
	start_session();   //This function declared in 'session_setting.php'.

	require("../sql/mysql_connection.php");

	$name = $_POST['name'];
	$address = $_POST['address'];
	$structure = $_POST['structure'];
	$acreage = $_POST['acreage'];
	$location = $_POST['location'];
	$floor = $_POST['floor'];
	$housetype = $_POST['housetype'];

	if(!$name) {
		header("Location:admin_add.php");
	}
	$sql="INSERT INTO `houses` (`name`, `address`, `structure`, `acreage`, `location`, `floor`, `housetype`) VALUES('$name','$address','$structure','$acreage','$location','$floor','$housetype')";
	if(mysqli_query($con,$sql)){
		echo "匯入成功!<br/>";
		echo "<a href=\"admin_add.php\">點此返回</a>";
	}
?>
<head>
<meta charset="utf-8">
</head>
