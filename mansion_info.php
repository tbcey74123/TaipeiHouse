<?php
    $location = $_GET["location"];
    $id = $_GET["id"];

    if(!$id || !$location){
	    header("Location:mansion.php");
	    exit;
    }
    require("sql/mysql_connection.php");
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
<body>
    <div id="left-side">
        <div id="div_page_selection">
            <ul id="ul_page_selection" onmouseover="menu_select(event.target)" onmouseout="menu_leave(event.target)">
                <li class="main-menu" id="home"><a href="index.php">首頁</a></li>
                <li class="main-menu" id="AboutMe"><a href="aboutus.html">關於我</a></li>
                <li class="main-menu" id="mansion"><a href="mansion.php">豪宅導覽</li>
                <li class="main-menu" id="Business"><a href="business.html">線上委託</a></li>
            </ul>
        </div>
    </div>
    
    <div id="right-side">
	<div id="left_part">
		<div id="house_picture">
<?php
		/*$location = "pic/houses/case-".$id."/";
		if(file_exists($location."pic1.jpg")) {
			echo   "<img id=\"pic\" src=\"pic/houses/case-".$id."/pic1.jpg\" />";
		}*/
			echo   "<img id=\"pic\" src=\"pic/alt_pic.png\">";
?>
		</div>
		<div id="thumbnail">
			<ul onclick="changePic_houses(event.target);">
<?php 
	/*$i = 1;
	
	while(file_exists($location."pic".$i.".jpg")){
		echo "<li><img src='pic/houses/case-".$id."/pic".$i.".jpg' /></li>";
		$i++;
	}*/
    for($i = 0; $i < 3; $i++)
		echo "<li><img src='pic/alt_pic.png'></li>";
	    	
?>
			</ul>	
		</div>
		<div id="mansion_profile">
<?php
    	$profile = "mansion/profile/" . $location . "/mansion-" . $id;
	
    	$pro_file = fopen($profile, "r");
	while(!feof($pro_file)) {
		$tmp = fgetc($pro_file);
		if($tmp != ",")
			echo $tmp;
		else 
			echo "<br/>";
	}
	fclose($pro_file);

?>
		</div>
	</div>
	<div id="right_part">
<?php
	$intro = "mansion/intro/" . $location . "/mansion-" . $id;

	$intro_file = fopen($intro, "r");
	echo fgets($intro_file);

	fclose($intro_file);
?>
	</div>
	<div id="bottom">
	</div>
        
    </div>
    
</body>
</html>
