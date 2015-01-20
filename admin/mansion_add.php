<!DOCTYPE>
<html>
<head>
<meta charset="utf-8">
</head>
<body>
<body>
</html>
<?php
	require("delete_mansion_func.php");
	require("session_setting.php");
	start_session();   //This function declared in 'session_setting.php'.

	require("../sql/mysql_connection.php");

	$input = $_FILES['infor']['tmp_name'];
	$file = fopen($input, "r");


	$location = $_POST['location'];

	$target = "../mansion/" . $location . "/";
//	if(!file_exists($target)) {
//		mkdir($target);
//	}
	$profile_target = $target . "profile";
	$infor_target = $target . "infor";
	$traffic_target = $target . "traffic";

	if(!file_exists($profile_target))
		mkdir($profile_target);
	if(!file_exists($infor_target))
		mkdir($infor_target);
	if(!file_exists($traffic_target))
		mkdir($traffic_target);

	fgets($file);
	while(!feof($file)) {
		$id =  fgetc($file);
		fgets($file);

		$Check_sql = "SELECT * FROM mansion WHERE mansion_id = $id AND location = '$location'";
		if(mysqli_query($con, $Check_sql)) {
			delete_mansion($id, $location, $con);
		}
		
		$name = fgets($file);
		$sql = "INSERT INTO `mansion` (`mansion_id`, `name`, `location`) VALUES('$id', '$name', '$location')"; 

		if(mysqli_query($con, $sql)) {
			$p_target = $profile_target . "/mansion-" . $id;
			$i_target = $infor_target . "/mansion-" . $id;
			$t_target = $traffic_target . "/mansion-" . $id;
			
			$profile = fopen($p_target, "w") or die("無法開啟文件"); 
			fwrite($profile, fgets($file));
			fclose($profile);

			$infor = fopen($i_target, "w") or die("無法開啟文件");
			fwrite($infor, fgets($file));
			fclose($infor);

			$traffic = fopen($t_target, "w") or die("無法開啟文件");
			fwrite($traffic, fgets($file));
			fclose($traffic);

			echo $name . "資料匯入成功<br/>";
		}
	}

	echo "匯入結束<br/>";
	echo "<a href=\"admin_mansion_add.php\">點此返回</a>";
?>
