<?php
	require('session_setting.php');
	start_session();

	require('../sql/mysql_connection.php');
	$location = $_POST['location'];

	$Lsql = "DELETE FROM mansion_location WHERE location = '$location'";
	$Lresult = mysqli_query($con, $Lsql);

	$sql = "DELETE FROM mansion WHERE location = '$location'";
	$result = mysqli_query($con, $sql);

	if($Lresult && $result) {
		$intro_target = "../mansion/intro/" . $location . "/";
		if(file_exists($intro_target)) {
			$objs = scandir($intro_target);
			
			foreach($objs as $obj) {
				if($obj != "." && $obj !="..")
					unlink($intro_target . $obj);
			}
			rmdir($intro_target);
		}

		$pro_target= "../mansion/profile/" . $location . "/";
		if(file_exists($pro_target)) {
			$objs = scandir($pro_target);
			
			foreach($objs as $obj) {
				if($obj != "." && $obj !="..")
					unlink($pro_target . $obj);
			}
			rmdir($pro_target);
		}
		

		echo "刪除成功！<br/>";
	}else {
		echo "Something went wrong！<br/>";
	}
	echo "<a href=\"admin_mansion_location.php\">點此返回</a>";

?>
<head>
<meta charset="utf-8">
</head>
