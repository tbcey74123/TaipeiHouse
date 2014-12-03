<?php
	require("../sql/mysql_connection.php");
	require("session_setting.php");

	session_start();
	if(!$_SESSION['login']){
		header("Location:../admin.php");
	}
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
	請選擇欲豪宅區域：<select onchange="location_change(event.target.value);">
<?php
	$location = $_GET['location'];

	$Default = array("test", "DaAn");
	if($location) {
		echo "<option disabled=\"disabled\">請選擇</option>";
	}else {
		echo "<option seleted=\"seleted\">請選擇</option>";
	}

	foreach($Default as $a) {
		if($a == $location) {
			echo "<option value=\"" . $a . "\"selected=\"selected\">";
		}else {
			echo "<option value=\"" . $a . "\">";
		}
		switch($a) {
			case 'test':
				echo "test";
				break;
			case 'DaAn':
				echo "大安";
				break;
		}
		echo "</option>";

	}
?>
	</select>
	請選擇豪宅：<select onchange="mansion_change(event.target.value);">
<?php
	$id = $_GET['id'];
	$sql = "SELECT mansion_id, name FROM mansion WHERE location='$location' ORDER BY id";
	$result = mysqli_query($con, $sql);
	while($tmp = mysqli_fetch_assoc($result)) {
		$row[] = $tmp;
	}

	if($location && $id) {
		echo "<option disabled=\"disabled\">請選擇</option>";
	}else {
		echo "<option seleted=\"seleted\">請選擇</option>";
	}

	foreach($row as $mansion) {
		if($id && $id == $mansion['mansion_id']) {
			echo "<option value=\"" . $mansion['mansion_id'] . "\" selected=\"selected\">" . $mansion['name'] . "</option>";
		}else {
			echo "<option value=\"" . $mansion['mansion_id'] . "\">" . $mansion['name'] . "</option>";
		}
	}
	echo "</select><br/>";
	
	if($location && $id) { 	
		$profile_target = "../mansion/profile/" . $location . "/mansion-" . $id;
		$intro_target = "../mansion/intro/" . $location . "/mansion-" . $id;
		
		echo "<div id=\"mansion_profile\"><p>";
		
		$profile = fopen($profile_target, "r");
		echo fgets($profile);
		fclose($profile);

		echo "</p></div>";
		echo "<div id=\"mansion_intro\"><p>";

		$intro = fopen($intro_target, "r");
		echo fgets($intro);
		fclose($intro);

		echo "</p></div>";
	}
?>

