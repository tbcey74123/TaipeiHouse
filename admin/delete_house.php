<?php
	require("../sql/mysql_connection.php");
	require("session_setting.php");
	
	session_start();
	if(!$_SESSION['login']) {
		header("Location:../admin.php");
		exit;
	}

	$id = $_GET['id'];
	
	$sql = "DELETE FROM houses WHERE id = '$id'";
	$result = mysqli_query($con, $sql);
	$row = mysqli_fetch_assoc($result);

	if(mysqli_query($con, $sql)) {
		echo "成功刪除！</br>";
		echo "<a href=\"admin_update.php\">點我返回</a>";
	}else {
		echo "Something went wrong";
	}


?>

<meta charset="utf-8">
