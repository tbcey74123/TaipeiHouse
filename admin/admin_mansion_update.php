<?php
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
	請選擇欲更改的物件名稱：<select onchange="mansion_change(event.target.value);">
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
