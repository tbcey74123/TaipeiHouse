<?php
	require("sql/mysql_connection.php");

	$sql = "SELECT id,name FROM houses WHERE hot='1' ORDER BY id";
	$result = mysqli_query($con,$sql);
	$info = mysqli_fetch_all($result);
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
    <script type="text/javascript" src="script/main.js"></script>
    <script type="text/javascript" src="script/Slide.js"></script>
</head>
<body onload="loadPictures(); auto = setInterval(function(){auto_changePic()}, 7000)">
    <div id="left-side">
        <div id="div_page_selection">
            <ul id="ul_page_selection" onmouseover="menu_select(event.target)" onmouseout="menu_leave(event.target)">
		<li class="main-menu" id="AboutMe"><a href="aboutus.html">關於我</a></li>
		<li class="main-menu" id="houses"><a href="houses.php">豪宅導覽</a></li>
		<li class="main-menu" id="Business"><a href="business.html">線上委託</a></li>
		<li class="main-menu" id="ContactMe"><a href="contactme.html">聯絡我</a></li>
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
	   <div id="hot">
	     <div id="search_bar">
		<form action="houses.php" method="GET" onsubmit="return check_search_input();">
		    <input type="text" name="search">
		    <input type="submit" value="查詢">
		</form>
	     </div>
<?php
	echo "<p style=\"color:red\">熱門物件！！！</p>";
	echo "<table>";
	for($i=0;$i<$length;$i++){
		if(($i+1)%2){
			echo "<tr><td><a class=\"left\" href=\"house_info.php?id=".$info[$i][0]."\">".$info[$i][1]."</a>";
			if(file_exists("pic/houses/case-".$info[$i][0]."/pic1.jpg")){
			echo "<img class=\"left\" src=\"pic/houses/case-".$info[$i][0]."/pic1.jpg\" />";
			}
			echo "</td>";
		}else{
			echo "<td><a class=\"right\" href=\"house_info.php?id=".$info[$i][0]."\">".$info[$i][1]."</a>";
			if(file_exists("pic/houses/case-".$info[$i][0]."/pic1.jpg")){
			echo "<img class=\"right\" src=\"pic/houses/case-".$info[$i][0]."/pic1.jpg\" />";
			}
			echo "</td></tr>";
		}
	}
	echo "</table>";
?>
              </div>
        
    	</div>
    
</body>
</html>
