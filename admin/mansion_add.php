<?php
	require("session_setting.php");
	start_session();   //This function declared in 'session_setting.php'.

	require("../sql/mysql_connection.php");

	$input = $_FILES['infor']['tmp_name'];
	$file = fopen($input, "r");


	$location = $_POST['location'];

	$profile_target = "../mansion/profile/" . $location . "/";
	$intro_target = "../mansion/intro/" . $location . "/";
	
	if(!file_exists($profile_target)) {
		mkdir($profile_target);
	}
	if(!file_exists($intro_target)) {
		mkdir($intro_target);
	}


	fgets($file);
	while(!feof($file)) {
		$id =  fgetc($file);
		fgets($file);
		
		$name = fgets($file);

		$sql = "INSERT INTO `mansion` (`mansion_id`, `name`, `location`) VALUES('$id', '$name', '$location')"; 

		if(mysqli_query($con, $sql)) {
			$p_target = $profile_target . "/mansion-" . $id;
			$i_target = $intro_target . "/mansion-" . $id;
			
				
			$profile = fopen($p_target, "w") or die("無法開啟文件"); 
			fwrite($profile, fgets($file));
			fclose($profile);

			$intro = fopen($i_target, "w") or die("無法開啟文件");
			fwrite($intro, fgets($file));
			fclose($intro);
			echo $name . "資料匯入成功<br/>";
		}
	}

	echo "匯入結束<br/>";
	echo "<a href=\"admin_mansion_add.php\">點此返回</a>";
?>
<!DOCTYPE>
<html>
<head>
<meta charset="utf-8">
</head>
<body>
<body>
</html>
