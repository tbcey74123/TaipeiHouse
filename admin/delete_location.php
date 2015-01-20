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
		$infor_target = "../mansion/" . $location . "/infor/";
		if(file_exists($infor_target)) {
			$objs = scandir($infor_target);
			
			foreach($objs as $obj) {
				if($obj != "." && $obj !="..")
					unlink($infor_target . $obj);
			}
			rmdir($infor_target);
		}

		$pro_target= "../mansion/" . $location . "/profile/";
		if(file_exists($pro_target)) {
			$objs = scandir($pro_target);
			
			foreach($objs as $obj) {
				if($obj != "." && $obj !="..")
					unlink($pro_target . $obj);
			}
			rmdir($pro_target);
		}
		
		$traffic_target= "../mansion/" . $location . "/traffic/";
		if(file_exists($traffic_target)) {
			$objs = scandir($traffic_target);
			
			foreach($objs as $obj) {
				if($obj != "." && $obj !="..")
					unlink($traffic_target . $obj);
			}
			rmdir($traffic_target);
		}

		$pic_target= "../pic/mansion/" . $location . "/";

		if(file_exists($pic_target)) {

			$objs = scandir($pic_target);
			foreach($objs as $obj) {
				if($obj != "." && $obj !="..") {
					$pics = scandir($pic_target . $obj);
			
					foreach($pics as $pic)
						if($pic != "." && $pic != "..")
							unlink($pic_target . $obj . "/" . $pic);
				}
				rmdir($pic_target . $obj);
			}
			rmdir($pic_target);
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
