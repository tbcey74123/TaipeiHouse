<?php
	require('session_setting.php');
	start_session();   //This function declared in 'session_setting.php'.
?>
<html>
<head>
	<title>TaipeiHouse</title>
	<meta charset="utf-8">
	<link type="text/css" rel="stylesheet" href="admin.css">
	<script type="text/javascript" src="admin.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="admin-jquery.js"></script>
</head>

<body>
	<div id="left-part">
		<a href="admin.php">返回</a>
	</div>
	<div id="right-part">
		<div id="add_location">
			<form action="mansion_location.php" method="POST">
				區域名字：<input type="text" name="ch">
				區域英文名字：<input type="text" name="location">
				<input type="submit" value="送出">
			</form>
		</div>
		<div id="delete_location">
			<p>刪除區域</p>
			<form action="delete_location.php" method="POST" onsubmit="return delete_location();">
				請選擇區域：<select name="location">
					<option disabled="disabled" selected="selected">請選擇</option>
<?php
	require('../sql/mysql_connection.php');

	$Lsql = "SELECT * FROM mansion_location ORDER BY id";
	$Lresult = mysqli_query($con, $Lsql);
	while($tmp = mysqli_fetch_assoc($Lresult)) {
		$Default[] = $tmp;
        }
	
	foreach($Default as $a) {
		echo "<option value=\"" . $a['location'] . "\">" . $a['Chinese_name'] . "</option>";
	}
?>
				</select>
				<input type="submit" value="刪除這個區域">
			</form>
			<h1 class="notion">注意：刪除區域將導致該區域下的豪宅全部消失！！！！</h1>
		</div>
	</div>
</body>
</html>
