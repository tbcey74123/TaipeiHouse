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
		<form action="mansion_add.php" method="POST" enctype="multipart/form-data" onsubmit="return check_input();">
			<select name="location">
				<option disabled="disabled" selected="selected">請選擇</option> 
<?php
	require('../sql/mysql_connection.php');

	$sql = "SELECT * FROM mansion_location ORDER BY id";
	$result = mysqli_query($con, $sql);
	while($tmp = mysqli_fetch_assoc($result)) {
		$Default[] = $tmp;
	}

	foreach($Default as $a) {
		echo "<option value=\"" . $a['location'] . "\">" . $a['Chinese_name'] . "</option>"; 
	}
?>
			<select>
			<br/>
			<input type="file" name="infor" id="infor"><br/>
		<input type="submit" value="送出">
		</form>
		<h1 class="notion">注意：匯入格式需注意以下幾點</h1>
		<h2 class="notion">1.文件開頭需空一行</h2>
		<h2 class="notion">2.資料依序為：編號、豪宅名稱、基本資料、豪宅介紹</h2>
		<h2 class="notion">3.編號從1開始，不同區域的編號請分開計算</h2>
		<h2 class="notion">4.文件尾端不要留空白行！！</h2>
		<img src="sample_input.png">
	</div>
</body>
</html>
