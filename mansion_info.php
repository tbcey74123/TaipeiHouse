<?php
    $location = $_GET["location"];
    $id = $_GET["id"];

    if(!$id || !$location){
	    header("Location:mansion.php");
	    exit;
    }
    require("sql/mysql_connection.php");
    require("left_side.php");

    	$sql = "SELECT name FROM mansion WHERE mansion_id = $id AND location = '$location'"; 
    	$result = mysqli_query($con, $sql);
	$row = mysqli_fetch_assoc($result)
?>
<!DOCTYPE html>
<html>
<head>
    <title>TaipeiHouse</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="single_house.css">
    <script type="text/javascript" src="script/main.js"></script>
</head>
<body onload="set_position();" onresize="set_position();">
<!--
    <div id="left-side">
        <div id="div_page_selection">
            <ul id="ul_page_selection" onmouseover="menu_select(event.target)" onmouseout="menu_leave(event.target)">
                <li class="main-menu" id="home"><a href="index.php">首頁</a></li>
                <li class="main-menu" id="AboutMe"><a href="aboutus.html">關於我</a></li>
                <li class="main-menu" id="mansion"><a href="mansion.php">豪宅導覽</a></li>
                <li class="main-menu" id="Business"><a href="business.html">線上委託</a></li>
            </ul>
        </div>
    </div>
-->
<?php
	output_leftside();
?>
    <div id="right-side">
	<div class="shadow" id="left_part">
		<div id="house_picture">
<?php
		$pic_dir = "pic/mansion/" . $location . "/mansion-" . $id . "/";
		if(file_exists($pic_dir . "pic1.jpg"))
			echo   "<img id=\"pic\" src=\"" . $pic_dir . "pic1.jpg\" />";
		else
			echo   "<img id=\"pic\" src=\"pic/alt_pic.png\">";
?>
		</div>
		<div id="thumbnail">
			<ul onclick="changePic_houses(event.target);">
<?php 
	$i = 1;
	
	while(file_exists($pic_dir . "pic" . $i. ".jpg")){
		echo "<li><img src=\"" . $pic_dir . "pic" . $i . ".jpg\"></li>";
		$i++;
	}
	    	
?>
			</ul>	
		</div>
		<div id="mansion_profile">
<?php
    	$profile = "mansion/" . $location . "/profile/mansion-" . $id;
	
    	$pro_file = fopen($profile, "r");
	while(!feof($pro_file)) {
		$tmp = fgetc($pro_file);
		if($tmp != ",")
			echo $tmp;
		else 
			echo "<br/>";
	}
	fclose($pro_file);

	echo "</div>";
	
	echo "<a class=\"order_button\" href=\"business.php?type=mansion&name=" . $row['name'] . "\"><button>立即委託</button></a>";
		
	echo "</div>";
?>
	<div id="right_part">
		<div class="shadow" id="infor">
			<h1 class="title">社區特色</h1>
			<p>
<?php
	$infor = "mansion/" . $location . "/infor/mansion-" . $id;

	$infor_file = fopen($infor, "r");
	echo fgets($infor_file);

	fclose($infor_file);
?>		
			</p>
		</div>
		<div class="shadow" id="traffic">
			<h1 class="title">交通位置</h1>
			<p>
<?php
	$traffic = "mansion/" . $location . "/traffic/mansion-" . $id;

	$traffic_file = fopen($traffic, "r");
	echo fgets($traffic_file);

	fclose($traffic_file);
?>
			</p>
		</div>
	</div>
	<div id="bottom">
	</div>
        
    </div>
    
</body>
</html>
