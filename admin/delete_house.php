<?php
	require("session_setting.php");
	start_session();   //This function declared in 'session_setting.php'.	
	require("../sql/mysql_connection.php");

	$id = $_GET['id'];
	$dir = "../pic/houses/case-" . $id . "/";

	$sql = "DELETE FROM houses WHERE id = '$id'";
	$result = mysqli_query($con, $sql);
	//$row = mysqli_fetch_assoc($result);
	
	if(mysqli_query($con, $sql)) {
		if(file_exists($dir)) {
			$objs = scandir($dir);

			foreach($objs as $obj) {
				if($obj != "." && $obj != "..")
					unlink($dir . $obj);
			}
			rmdir($dir);
		}
		echo "成功刪除！</br>";
		echo "<a href=\"admin_update.php\">點我返回</a>";
	}else {
		echo "Something went wrong";
	}


?>

<meta charset="utf-8">
