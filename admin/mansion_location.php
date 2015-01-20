<?php
	require('session_setting.php');
	start_session();

	require('../sql/mysql_connection.php');

	$location = $_POST['location'];
	$ch = $_POST['ch'];
	$check = 1;

	$sql = "SELECT * FROM mansion_location WHERE Chinese_name='$ch'";
	$result = mysqli_query($con, $sql);
	$row = mysqli_fetch_assoc($result);

	if($row) {
		echo $ch . "已存在於資料庫中！！！";
		$check = 0;
	}
	
	if($check == 1) {
		
		$input_sql = "INSERT INTO mansion_location (location, Chinese_name) VALUES('$location', '$ch')";
		$input_result = mysqli_query($con, $input_sql);

		if($input_result) {
			$target = "../mansion/" . $location;
			$pic_dir = "../pic/mansion/" . $location;

			if(!file_exists($target)) {
				mkdir($target);
			}
			if(!file_exists($pic_dir)) {
				mkdir($pic_dir);
			}

			echo "加入成功！";

		}
		else
			echo "Something went wrong！";
	}

	echo "<a href=\"admin_mansion_location.php\">點此返回</a>";
?>
<html>
<head>
<meta charset="utf-8">
</head>
<body>
	
<body>
</html>
