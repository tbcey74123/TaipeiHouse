<?php
	require("session_setting.php");
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
	請選擇欲豪宅區域：<select onchange="location_change(event.target.value);">
<?php
	require("../sql/mysql_connection.php");
	$location = $_GET['location'];
	
	$Lsql = "SELECT * FROM mansion_location ORDER BY id";
	$Lresult = mysqli_query($con, $Lsql);
	while($tmp = mysqli_fetch_assoc($Lresult)){
		$Default[] = $tmp;
	}

	if($location) {
		echo "<option disabled=\"disabled\">請選擇</option>";
	}else {
		echo "<option seleted=\"seleted\">請選擇</option>";
	}

	foreach($Default as $a) {
		if($a['location'] == $location) {
			echo "<option value=\"" . $location . "\"selected=\"selected\">";
		}else {
			echo "<option value=\"" . $a['location'] . "\">";
		}
		echo $a['Chinese_name'];
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
		$profile_target = "../mansion/" . $location . "/profile/mansion-" . $id;
		$infor_target = "../mansion/" . $location . "/infor/mansion-" . $id;
		$traffic_target = "../mansion/" . $location. "/traffic/mansion-" . $id;

		echo "<div id=\"mansion_profile\"><p>";
		
		$profile = fopen($profile_target, "r");
		echo fgets($profile);
		fclose($profile);

		echo "</p></div>";
		echo "<div id=\"mansion_infor\"><p>";

		$infor = fopen($infor_target, "r");
		echo fgets($infor);
		fclose($infor);
		
		echo "</p></div>";

		echo "<div id=\"mansion_traffic\"><p>";

		$traffic = fopen($traffic_target, "r");
		echo fgets($traffic);
		fclose($traffic);

		echo "</p></div>";
	}
?>

