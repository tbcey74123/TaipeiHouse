<!DOCTYPE>
<html>
<head><meta charset="utf-8"></head>
<body></body>
</html>
<?php
	require("delete_mansion_func.php");
	require("session_setting.php");
	start_session();

	require("../sql/mysql_connection.php");
	$id = $_POST['id'];
	$location = $_POST['location'];

	if(!$id || !$location) {
		header("Location:admin.php");
	}
	
	if(delete_mansion($id, $location, $con) == 1) {
		echo "刪除成功<br>";
		echo "<a href=\"admin_mansion_update.php\">點此返回</a>";
	}else {
		echo "Something went wrong";
	}

?>
