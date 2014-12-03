<?php
	require("sql/mysql_connection.php");

	$sql = "SELECT * FROM houses ORDER BY id";
	$result = mysqli_query($con,$sql);
	//$info = mysqli_fetch_all($result);
	while($row = mysqli_fetch_assoc($result)) {
		$info[] = $row;
	}	
	$length = count($info);
?>
<!DOCTYPE html>
<html>
<head>
    <title>TaipeiHouse</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="Slide.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script type="text/javascript" src="script/Slide.js"></script>
</head>
<body onload="loadPictures(); auto = setInterval(function(){auto_changePic()}, 7000)">
    <div id="left-side">
        <div id="div_page_selection">
            <ul id="ul_page_selection" onmouseover="menu_select(event.target)" onmouseout="menu_leave(event.target)">
		<li class="main-menu" id="AboutMe"><a href="aboutus.html">關於我</a></li>
		<li class="main-menu" id="mansion"><a href="mansion.php">豪宅導覽</a></li>
		<li class="main-menu" id="Business"><a href="business.html">線上委託</a></li>
            </ul>
        </div>
    </div>
	<div id="right-side">
	  <div id="main">
             <div id="Slide" >
            	<div id="pic_selector">
              	    <ul onclick="changePic(event.target);">
               	 	<li id="pic1" class="current"><button type="button"></button></li>
               	 	<li id="pic2"><button type="button"></button></li>
               	 	<li id="pic3"><button type="button"></button></li>
               	 	<li id="pic4"><button type="button"></button></li>
                    </ul>
            	</div>
		<div id="Slide_prev" onclick="change_prev_pic();" onmouseover="show(event.target);" onmouseout="hide(event.target)">
		</div>
		<div id="Slide_next" onclick="change_next_pic();" onmouseover="show(event.target);" onmouseout="hide(event.target)">
		</div>
	     </div>
           </div> 
	     <div id="search_bar">
		<form action="houses.php" method="GET" onsubmit="return check_search_input();">
		    <input type="text" name="search">
		    <input type="submit" value="查詢">
		</form>
	     </div>
	   <div id="hot">
<?php
	for($i=0;$i<$length;$i++){
		echo "<div class=\"house_unit\" id=\"house-" . $info[$i]['id'] . "\">";

		echo "<div class=\"house_img\"><img src=\"pic/alt_pic.png\" ></div>";
		echo "<div class=\"house_intro\">";
		echo "<h1>" . $info[$i]["name"] . "</h1>";
		echo "<div class=\"intro_left\">";
		echo "<p>" . $info[$i]["structure"] . "</p>";
		echo "<p>" . $info[$i]["location"] . "</p>";
		echo "</div><div class=\"intro_right\">";
		echo "<p>建物面積：" . $info[$i]["acreage"] . "平方公尺</p>";
		echo "<p>地坪：" . $info[$i]["floor"] . "</p>";

		echo "</div></div></div>";
/*
			echo "<tr><td><a class=\"left\" href=\"house_info.php?id=".$info[$i]["id"]."\">".$info[$i]["name"]."</a>";
			if(file_exists("pic/houses/case-".$info[$i]["id"]."/pic1.jpg")){
			echo "<img class=\"left\" src=\"pic/houses/case-".$info[$i]["id"]."/pic1.jpg\" />";
			}
			echo "</td>";
		}else{
			echo "<td><a class=\"right\" href=\"house_info.php?id=".$info[$i]["id"]."\">".$info[$i]["name"]."</a>";
			if(file_exists("pic/houses/case-".$info[$i]["id"]."/pic1.jpg")){
			echo "<img class=\"right\" src=\"pic/houses/case-".$info[$i]["id"]."/pic1.jpg\" />";
			}
			echo "</td></tr>";
		}*/
	}
?>
              </div>
        
    	</div>
    
</body>
</html>
